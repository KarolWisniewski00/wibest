<?php

namespace App\Services\Payroll;

use App\Models\{EmployeeContract, PayrollSnapshot, User, WorkBlock};
use App\Repositories\WorkSessionRepository;
use App\Services\Objects\ObjectWorkReport;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PayrollReport
{
    public function __construct(private PayrollParameters $parameters, private WorkSessionRepository $planning) {}

    /** All reads are tenant-scoped and bounded to one month and one page of employees. */
    public function build(int $companyId, Collection $users, Carbon $month): Collection
    {
        $end = $month->copy()->addMonth();
        $ids = $users->pluck('id');
        $payments = \App\Models\PayrollPayment::where('company_id',$companyId)->whereIn('user_id',$ids)
            ->where('period',$month->toDateString())->orderBy('id')->get()->groupBy('user_id');
        $contracts = EmployeeContract::where('company_id', $companyId)->whereIn('user_id', $ids)
            ->where('effective_from', '<', $end)->where('starts_on', '<', $end)
            ->where(fn ($query) => $query->whereNull('ends_on')->orWhere('ends_on', '>=', $month->toDateString()))
            ->orderByDesc('effective_from')->orderByDesc('id')->get()->groupBy('user_id');
        $snapshots = PayrollSnapshot::where('company_id', $companyId)->whereIn('user_id', $ids)
            ->where('month', $month->toDateString())->get()->keyBy('user_id');
        $costInputs = DB::table('payroll_cost_inputs')->where('company_id', $companyId)->whereIn('user_id', $ids)
            ->where('month', $month->toDateString())->get()->keyBy('user_id');
        $sessions = DB::table('work_sessions as s')
            ->leftJoin('events as a', fn ($join) => $join->on('a.id', '=', 's.event_start_id')
                ->on('a.user_id', '=', 's.user_id')->where('a.company_id', $companyId))
            ->leftJoin('events as b', fn ($join) => $join->on('b.id', '=', 's.event_stop_id')
                ->on('b.user_id', '=', 's.user_id')->where('b.company_id', $companyId))
            ->leftJoin('locations as sl', 'sl.id', '=', 'a.location_id')
            ->leftJoin('locations as el', 'el.id', '=', 'b.location_id')
            ->where('s.company_id', $companyId)->whereIn('s.user_id', $ids)
            ->where(function ($q) use ($month, $end) {
                $q->where(fn ($q) => $q->where('a.time', '<', $end)
                    ->where(fn ($q) => $q->where('b.time', '>', $month)->orWhereNull('b.time')->orWhere('a.time', '>=', $month)))
                    ->orWhere(fn ($q) => $q->whereNull('a.time')->where('s.created_at', '>=', $month)->where('s.created_at', '<', $end));
            })->select('s.*', 'a.time as start_time', 'b.time as stop_time', 'a.company_id as start_company',
                'b.company_id as stop_company', 'a.user_id as start_user', 'b.user_id as stop_user',
                'sl.latitude as start_lat','sl.longitude as start_lng','el.latitude as stop_lat','el.longitude as stop_lng')
            ->orderBy('a.time')->get()->groupBy('user_id');
        $blocks = WorkBlock::where('company_id', $companyId)->whereIn('user_id', $ids)
            ->where('starts_at', '>=', $month)->where('starts_at', '<', $end)->orderBy('id')->get()->groupBy('user_id');
        // Query Builder avoids Leave's retrieved side effects.
        $leaves = DB::table('leaves')->where('company_id', $companyId)->whereIn('user_id', $ids)
            ->where('start_date', '<', $end)->where('end_date', '>=', $month)
            ->whereIn('status', ['zaakceptowane', 'zrealizowane'])->get()->groupBy('user_id');
        return $users->map(function ($user) use ($contracts, $snapshots, $costInputs, $sessions, $blocks, $leaves, $month, $payments) {
            $paid = $payments->get($user->id,collect());
            $expected = $paid->last()?->payload['period_gross_cents'] ?? null;
            $total = $paid->sum(fn ($payment) => $payment->payload['amounts']['cash']);
            $paymentStatus = $paid->isEmpty() ? 'Nierozliczono' : ($expected !== null && $total >= $expected ? 'Rozliczono' : 'Częściowo rozliczono');
            $paymentSummary = ['payment_status' => $paymentStatus, 'paid_gross_cents' => $total,
                'paid_net_cents' => $paid->sum(fn ($payment) => $payment->payload['amounts']['net']),
                'settled_at' => $paymentStatus === 'Rozliczono' ? $paid->last()->created_at->toDateTimeString() : null];
            if ($snapshot = $snapshots->get($user->id)) {
                return array_merge($snapshot->payload, ['saved_at' => $snapshot->created_at->toDateTimeString()], $paymentSummary);
            }
            $row = $this->calculate($user, $contracts->get($user->id, collect())->first(), $month,
                $sessions->get($user->id, collect()), $blocks->get($user->id, collect()), $leaves->get($user->id, collect()));
            return (new EmployerCostCalculator())->apply($row, ($input = $costInputs->get($user->id)) ? (array) $input : null) + $paymentSummary;
        });
    }

    public function calculate(User $user, ?EmployeeContract $contract, Carbon $month, Collection $sessions, Collection $blocks, Collection $leaves): array
    {
        $parameters = $this->parameters->forMonth($month);
        $fullNominal = $this->parameters->nominalSeconds($month);
        $r = ['user_id' => $user->id, 'name' => $user->name, 'month' => $month->format('Y-m'),
            'contract' => $contract?->toArray(), 'parameters' => $parameters, 'saved_at' => null,
            'nominal' => $contract?->type === 'employment' ? (int) round($fullNominal * (float) $contract->fte) : null,
            'planned' => 0, 'worked' => 0, 'extra' => 0, 'night' => 0, 'absence' => 0,
            'gross' => null, 'cost' => null, 'lines' => [], 'days' => [], 'sessions' => [], 'leaves' => [],
            'missing' => [], 'attention' => [], 'cost_reason' => 'Brak indywidualnych danych ZUS: tytuły ubezpieczeń, podstawa narastająca, stopa wypadkowa, zwolnienia FP/FGŚP i PPK.'];
        if (!$contract) $r['missing'][] = 'Brak konfiguracji zatrudnienia.';
        if ($contract && $contract->type !== 'employment') $r['missing'][] = 'Ten etap rozliczeń obsługuje wyłącznie umowę o pracę.';
        if ($contract && $contract->configuration_status === null) $r['missing'][] = 'Dotychczasowa umowa wymaga uzupełnienia nowych danych i potwierdzenia kompletności.';
        if ($contract && $contract->configuration_status !== null) {
            if ($contract->configuration_status !== 'complete') $r['missing'][] = 'Umowa jest zapisem roboczym.';
            $r['missing'] = array_merge($r['missing'], app(ContractConfiguration::class)->missing($contract));
            $details = $contract->details ?? [];
            if (($details['time_system'] ?? '') === 'task') $r['attention'][] = 'System zadaniowy wymaga zatwierdzenia wykonania zadań i kwalifikacji nadgodzin; automatyczne naliczanie jest zablokowane.';
            if (($details['period_months'] ?? 1) != 1 || ($details['daily_norm'] ?? 8) != 8 || ($details['weekly_norm'] ?? 40) != 40) $r['attention'][] = 'Inny okres rozliczeniowy lub obniżone normy wymagają indywidualnego rozliczenia.';
            if (Money::cents((string) ($details['fixed_allowance'] ?? '0')) > 0) $r['attention'][] = 'Stały dodatek wymaga ustalenia podstaw składek i podatku; nie jest automatycznie dodawany do pensji.';
        }
        if (!$parameters) $r['missing'][] = 'Brak zatwierdzonych parametrów prawnych dla wybranego roku.';
        if ($month->copy()->endOfMonth()->gte(now('Europe/Warsaw'))) $r['attention'][] = 'Miesiąc jeszcze się nie zakończył.';
        if ($contract && ($contract->effective_from->gt($month) || $contract->starts_on->gt($month)
            || ($contract->ends_on && $contract->ends_on->lt($month->copy()->endOfMonth()->startOfDay())))) {
            $r['attention'][] = 'Umowa lub zmiana warunków obejmuje tylko część miesiąca — wymaga indywidualnego rozliczenia.';
        }
        $daily = [];
        $previousStop = null;
        foreach ($sessions as $s) {
            $r['sessions'][] = ['id' => $s->id, 'start' => $s->start_time, 'stop' => $s->stop_time, 'duration' => $s->time_in_work, 'status' => $s->status,
                'start_location'=>isset($s->start_lat,$s->start_lng),'stop_location'=>isset($s->stop_lat,$s->stop_lng)];
            if ($s->status !== 'Praca zakończona' || !$s->start_time || !$s->stop_time
                || (int) $s->start_company !== (int) $user->company_id || (int) $s->stop_company !== (int) $user->company_id
                || (int) $s->start_user !== (int) $user->id || (int) $s->stop_user !== (int) $user->id) {
                $r['attention'][] = "Sesja #{$s->id}: niekompletne lub niespójne zdarzenia RCP.";
                continue;
            }
            $start = Carbon::parse($s->start_time);
            $stop = Carbon::parse($s->stop_time);
            if ($stop->lte($start) || ($previousStop && $start->lt($previousStop))) {
                $r['attention'][] = "Sesja #{$s->id}: nieprawidłowa kolejność lub nakładanie sesji.";
                continue;
            }
            $previousStop = $stop;
            if ($start->lt($month) || $stop->gt($month->copy()->addMonth())) {
                $r['attention'][] = "Sesja #{$s->id} przekracza granicę miesiąca — wymaga podziału czasu.";
                continue;
            }
            $seconds = ObjectWorkReport::seconds($s->time_in_work);
            if ($seconds <= 0 || $seconds !== $start->diffInSeconds($stop)) {
                $r['attention'][] = "Sesja #{$s->id}: czas RCP różni się od START/STOP; nie można przypisać przerw do godzin nocnych.";
            }
            $r['worked'] += $seconds;
            $daily[$start->toDateString()] = ($daily[$start->toDateString()] ?? 0) + $seconds;
            if ($contract && $contract->night_start !== null) {
                for ($d = $start->copy()->startOfDay()->subDay(); $d->lte($stop); $d->addDay()) {
                    $a = $d->copy()->setTime((int) $contract->night_start, 0);
                    $b = $a->copy()->addHours(8);
                    if ($a->lt($stop) && $b->gt($start)) $r['night'] += max(0, $a->max($start)->diffInSeconds($b->min($stop), false));
                }
            }
        }
        $holidayDates = $this->parameters->holidays($month->year);
        $blocksByDay = $blocks->groupBy(fn ($b) => $b->starts_at->toDateString());
        $planValid = $user->working_hours_regular === 'zmienny planing' || ($user->working_hours_custom
            && in_array($user->working_hours_start_day, ['poniedziałek','wtorek','środa','czwartek','piątek','sobota','niedziela'])
            && in_array($user->working_hours_stop_day, ['poniedziałek','wtorek','środa','czwartek','piątek','sobota','niedziela']));
        if ($contract?->type === 'employment' && !$planValid && ($contract->details['time_system'] ?? '') !== 'task') $r['missing'][] = 'Uzupełnij grafik pracownika.';
        foreach ($leaves as $leave) $r['leaves'][] = ['id' => $leave->id, 'type' => $leave->type, 'status' => $leave->status, 'start' => $leave->start_date, 'end' => $leave->end_date];
        $paidVacation = 0;
        for ($d = $month->copy(); $d->month === $month->month; $d->addDay()) {
            $date = $d->toDateString();
            $dayBlocks = $blocksByDay->get($date, collect());
            if ($dayBlocks->count() > 1) $r['attention'][] = "$date: wiele bloków grafiku — wymaga sprawdzenia normy.";
            $planned = $planValid ? $this->planning->plannedSecondsForData($user, $d->format('d.m.y'), $dayBlocks->first()) : 0;
            if ($contract?->type === 'employment' && $contract->overtime_rule === 'monthly_basic' && $planned > 8 * 3600) {
                $r['attention'][] = "$date: grafik przekracza 8 godzin w zadeklarowanym podstawowym systemie czasu pracy.";
            }
            if ($user->working_hours_regular !== 'zmienny planing' && $user->public_holidays && in_array($date, $holidayDates, true)) $planned = 0;
            $worked = $daily[$date] ?? 0;
            $dayLeaves = $leaves->filter(fn ($l) => substr($l->start_date, 0, 10) <= $date && substr($l->end_date, 0, 10) >= $date);
            $absence = $dayLeaves->isNotEmpty() ? $planned : 0;
            if ($dayLeaves->count() > 1 || ($dayLeaves->isNotEmpty() && $worked > 0)) $r['attention'][] = "$date: nakładające się wnioski lub praca podczas nieobecności.";
            foreach ($dayLeaves as $leave) {
                if (in_array($leave->type, ['urlop wypoczynkowy', 'urlop wypoczynkowy "na żądanie"'], true)) $paidVacation += $planned;
                else $r['attention'][] = "Wniosek #{$leave->id} ({$leave->type}) wymaga indywidualnego ustalenia wpływu na płacę.";
            }
            $extra = max(0, $worked - $planned);
            $r['planned'] += $planned;
            $r['extra'] += $extra;
            $r['absence'] += $absence;
            $r['days'][] = compact('date', 'planned', 'worked', 'extra', 'absence');
            if ($contract?->type === 'employment' && ($contract->details['time_system'] ?? '') !== 'task' && $worked + $absence < $planned) $r['attention'][] = "$date: brak pełnego pokrycia grafiku czasem pracy lub zaakceptowanym wnioskiem — wymaga wyjaśnienia, bez automatycznego potrącenia.";
        }
        if ($contract && $parameters) {
            $calculator = match ($contract->type) {
                'employment' => new EmploymentCalculator(),
                'mandate' => new MandateCalculator(),
                default => new WorkContractCalculator(),
            };
            $r = $calculator->calculate($r, $contract, $parameters, $fullNominal, $paidVacation);
        }
        $r['missing'] = array_values(array_unique($r['missing']));
        $r['attention'] = array_values(array_unique($r['attention']));
        $r['status'] = $r['missing'] ? 'Wymaga danych' : ($r['attention'] ? 'Wymaga uwagi' : 'Gotowe');
        if ($r['status'] !== 'Gotowe') $r['gross'] = null;
        return $r;
    }
}
