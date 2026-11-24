<?php

namespace App\Services\Payroll;

use App\Models\{EmployeeTaxSetting, PayrollPayment, PayrollSnapshot, User};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PayrollPayments
{
    public function __construct(private EmploymentNetCalculator $calculator, private PayrollReport $report) {}

    public function calculate(User $user, string $period, string $paidOn, array $input, bool $approve = false): array
    {
        $company = (int) $user->company_id;
        $row = $this->report->build($company, collect([$user]), Carbon::createFromFormat('!Y-m', $period))->first();
        if (($row['contract']['type'] ?? '') !== 'employment') $this->fail('Najpierw skonfiguruj umowę o pracę. Inne umowy mają odrębne zasady.');
        if ($row['missing']) $this->fail(implode(' ', $row['missing']));
        $settings = EmployeeTaxSetting::where('company_id', $company)->where('user_id', $user->id)
            ->where('effective_from', '<=', $paidOn)->orderByDesc('effective_from')->orderByDesc('id')->first();
        if (!$settings) $this->fail('Brak potwierdzonych ustawień podatkowych na datę wypłaty.');
        if (($settings->declarations['ppk_status'] ?? '') === 'pending') $this->fail('Status PPK oczekuje na ustalenie.');
        $year = substr($paidOn, 0, 4); $paymentMonth = substr($paidOn, 0, 7).'-01';
        $opening = DB::table('payroll_opening_balances')->where('company_id', $company)->where('user_id', $user->id)->where('year', $year)->first();
        $payments = PayrollPayment::where('company_id', $company)->where('user_id', $user->id)
            ->where('paid_on', '>=', "$year-01-01")->where('paid_on', '<=', "$year-12-31")->orderBy('paid_on')->orderBy('id')->get();
        if ($payments->last() && $payments->last()->paid_on > $paidOn) $this->fail('Nie można dopisać wypłaty przed już zatwierdzoną późniejszą wypłatą. Wymagana świadoma korekta historii.');
        if ($opening && $paidOn < $opening->starts_on) $this->fail('Data wypłaty poprzedza początek potwierdzonej historii.');
        $assumptions = [];
        if ($paidOn > now('Europe/Warsaw')->toDateString()) $assumptions[] = 'Przyszła data wypłaty: dostępna jest wyłącznie symulacja.';
        if ($paidOn < $period.'-01') $assumptions[] = 'Wypłaty przed okresem wynagrodzenia (zaliczki na przyszłe okresy) wymagają odrębnej obsługi.';
        if (!$opening) $assumptions[] = 'Brak sald początkowych: symulacja zakłada zerowy dochód i podstawę składek przed pierwszą wypłatą w systemie.';
        if ($row['status'] !== 'Gotowe') $assumptions[] = 'Brutto wpisane do symulacji nie jest zatwierdzone przez ewidencję: '.implode(' ', array_merge($row['missing'], $row['attention']));
        if ($approve && $assumptions) $this->fail(implode(' ', $assumptions));
        $balances = [
            'payer_income_cents' => (int) ($opening->payer_income_cents ?? 0),
            'pension_base_cents' => (int) ($opening->pension_base_cents ?? 0),
            'health_legacy_income_cents' => (int) ($opening->health_legacy_income_cents ?? 0),
        ];
        if (isset($opening->exempt_revenue_cents)) $balances['exempt_revenue_cents'] = (int)$opening->exempt_revenue_cents;
        $taxSettings = $settings->toArray();
        if (isset($input['health_legacy_reduction_cents'])) {
            $taxSettings['health_legacy_reduction_cents'] = (int)$input['health_legacy_reduction_cents'];
            $taxSettings['declarations']['health_legacy_unconfirmed'] = false;
        }
        $relief = $settings->declarations['exemption_kind'] ?? $settings->exemption;
        if ($relief === 'young') {
            $birth = $settings->declarations['birth_date'] ?? null;
            if (!$birth) $this->fail('Brak daty urodzenia dla ulgi dla młodych.');
            if (Carbon::parse($birth)->addYears(26)->lt(Carbon::parse($paidOn)) || !empty($settings->declarations['young_opt_out'])) $relief = 'none';
        } elseif (in_array($relief,['return','family4','senior'],true)) {
            $until = $settings->declarations['exemption_until'] ?? null;
            if (!$until) $this->fail('Uzupełnij okres obowiązywania oświadczenia PIT-0.');
            if ($paidOn > $until) $relief = 'none';
        }
        $taxSettings['exemption'] = $relief;
        $taxSettings['reduced_ppk_month_confirmed'] = !empty($input['reduced_ppk_month_confirmed']);
        if ($relief !== 'none' && !isset($balances['exempt_revenue_cents'])) {
            $balances['exempt_revenue_cents'] = 0;
            $assumptions[] = 'Brak potwierdzonego wykorzystania limitu PIT-0: symulacja zakłada 0 zł.';
        }
        $previous = [];
        foreach ($payments as $payment) {
            $payload = $payment->payload;
            if ($payment->paid_on < $paymentMonth) {
                $balances['payer_income_cents'] += $payload['amounts']['income'];
                $balances['pension_base_cents'] += $payload['amounts']['social_base'];
                $balances['health_legacy_income_cents'] += $payload['amounts']['legacy_income'];
                if (isset($balances['exempt_revenue_cents'])) $balances['exempt_revenue_cents'] += $payload['amounts']['exempt_revenue'] ?? 0;
            } else {
                if ($payload['settings']['id'] !== $settings->id) $this->fail('Zmiana oświadczeń w miesiącu z wypłatami wymaga indywidualnej korekty. Dodaj warunki od kolejnego miesiąca.');
                $previous = $payload['month_totals'];
                if (($payload['settings']['exemption'] ?? 'none') !== $relief) $this->fail('Zmiana uprawnienia PIT-0 między wypłatami w miesiącu wymaga indywidualnego rozdzielenia podstaw.');
                if ($payload['settings']['health_legacy_reduction_cents'] !== $taxSettings['health_legacy_reduction_cents']) $this->fail('Zmiana zasad ograniczenia zdrowotnej w miesiącu wymaga korekty.');
            }
        }
        $components = [
            ['type' => 'salary_cash', 'cents' => Money::cents($input['gross'])],
            ['type' => 'benefit_fully_insured', 'cents' => Money::cents($input['benefit'])],
            ['type' => 'employer_ppk_transferred', 'cents' => Money::cents($input['ppk_transferred'])],
        ];
        $cost = DB::table('payroll_cost_inputs')->where('company_id', $company)->where('user_id', $user->id)->where('month', $paymentMonth)->first();
        $employer = $cost ? ['accident_bp' => Money::cents((string) $cost->accident_percent), 'fp_fs' => (bool) $cost->fp_fs, 'fgsp' => (bool) $cost->fgsp] : null;
        if (!empty($input['employer_confirmed'])) {
            $accident = Money::cents($input['accident_percent']);
            if ($accident <= 0 || $accident > 1000) $this->fail('Stopa wypadkowa musi być większa od 0% i nie wyższa niż 10%.');
            $employer = ['accident_bp'=>$accident,'fp_fs'=>(bool)$input['fp_fs'],'fgsp'=>(bool)$input['fgsp']];
        }
        $companyParameters = DB::table('company_payroll_parameters')->where('company_id',$company)->where('effective_from','<=',$paidOn)->orderByDesc('effective_from')->first();
        if ($employer && $companyParameters) $employer['accident_bp'] = (int) $companyParameters->accident_bp;
        if ($payments->where('paid_on', '>=', $paymentMonth)->isNotEmpty()) {
            $oldCost = $payments->last()->payload['employer_configuration'] ?? null;
            if ($oldCost !== $employer) $this->fail('Zmiana konfiguracji kosztu pracodawcy w trakcie miesiąca wymaga korekty wcześniejszych wypłat.');
        }
        if ($approve && $assumptions) $this->fail(implode(' ', $assumptions));
        if (isset($row['target_net'])) {
            if ($components[1]['cents'] || $components[2]['cents'] || $previous) $this->fail('Umowa netto ze świadczeniami, przekazaniem PPK lub kilkoma wypłatami w miesiącu wymaga indywidualnego naliczenia.');
            $maxGross = $taxSettings['ppk_employee_bp'] === 50 ? $this->calculator->parameters($paidOn)['ppk_reduced_monthly_limit'] : 10000000000;
            $result = app(NetSalaryResolver::class)->resolve($row['target_net'], fn (int $gross) => $this->calculator->calculate($paidOn,'employment',$taxSettings,[['type'=>'salary_cash','cents'=>$gross]],$balances,[],$employer),$maxGross);
            $components = $result['components'];
            $minimum = Money::divide(Money::cents((string)$row['parameters']['minimum_monthly']) * (int)str_replace('.','',$row['contract']['fte']),10000);
            if ($result['amounts']['cash'] < $minimum) $this->fail('Wyliczone brutto jest niższe od minimum proporcjonalnego do etatu.');
        } else {
            $result = $this->calculator->calculate($paidOn, 'employment', $taxSettings, $components, $balances, $previous, $employer);
        }
        // Never pay the same gross twice, even when payment dates fall in different tax years.
        $alreadyPaid = PayrollPayment::where('company_id', $company)->where('user_id', $user->id)->where('period', $period.'-01')
            ->get()->sum(fn ($payment) => $payment->payload['amounts']['cash']);
        $periodGross = isset($row['target_net']) ? $result['amounts']['cash'] : ($row['gross'] === null ? null : Money::cents((string)$row['gross']));
        if ($approve && $alreadyPaid >= $periodGross && $row['payment_status'] === 'Rozliczono') $this->fail('Ten miesiąc został już rozliczony.');
        if ($approve && $alreadyPaid + $components[0]['cents'] > $periodGross) $this->fail('Suma wypłat przekracza ustalone brutto za okres.');
        return $result + ['period' => $period, 'paid_on' => $paidOn, 'source_report' => $row, 'opening' => $opening ? (array) $opening : null,
            'employee_name'=>$user->name, 'company_name'=>$user->company->name,
            'period_gross_cents'=>$periodGross,
            'assumptions' => $assumptions, 'employer_configuration' => $employer, 'status' => $approve ? 'Zatwierdzone' : 'Symulacja'];
    }

    public function approve(User $user, string $period, string $paidOn, array $input, string $requestKey, string $previewHash): PayrollPayment
    {
        return DB::transaction(function () use ($user, $period, $paidOn, $input, $requestKey, $previewHash) {
            User::whereKey($user->id)->where('company_id', $user->company_id)->lockForUpdate()->firstOrFail();
            $existing = PayrollPayment::where('company_id', $user->company_id)->where('request_key', $requestKey)->first();
            if ($existing) {
                if ((int) $existing->user_id !== (int) $user->id) $this->fail('Identyfikator wypłaty jest już wykorzystany.');
                if (($existing->payload['preview_hash'] ?? null) !== $previewHash) $this->fail('Identyfikator dotyczy innego podglądu wypłaty.');
                return $existing;
            }
            $result = $this->calculate($user, $period, $paidOn, $input, true);
            $comparison = array_replace($result, ['status' => 'Symulacja']);
            if (!hash_equals(hash('sha256', json_encode($comparison)), $previewHash)) $this->fail('Dane zmieniły się od podglądu. Oblicz symulację ponownie.');
            $result['preview_hash'] = $previewHash;
            $result['input'] = $input;
            $result['history_confirmed'] = true;
            // Freeze the report together with the payment, so reopening the month uses its saved sources.
            PayrollSnapshot::firstOrCreate(['company_id' => $user->company_id, 'user_id' => $user->id, 'month' => $period.'-01'],
                ['created_by' => auth()->id(), 'payload' => $result['source_report']]);
            return PayrollPayment::create(['company_id' => $user->company_id, 'user_id' => $user->id, 'created_by' => auth()->id(),
                'period' => $period.'-01', 'paid_on' => $paidOn, 'request_key' => $requestKey, 'payload' => $result]);
        });
    }

    private function fail(string $message): never { throw ValidationException::withMessages(['payroll' => $message]); }
}
