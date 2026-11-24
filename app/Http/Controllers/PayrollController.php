<?php

namespace App\Http\Controllers;

use App\Models\{EmployeeContract, PayrollSnapshot, User};
use App\Services\Payroll\PayrollReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PayrollController extends Controller
{
    public function __construct(private PayrollReport $report)
    {
        $this->middleware(['auth', 'can:manage-payroll']);
    }

    private function month(Request $request): Carbon
    {
        $data = $request->validate(['month' => ['nullable', 'date_format:Y-m']]);
        return Carbon::createFromFormat('!Y-m', $data['month'] ?? now('Europe/Warsaw')->format('Y-m'));
    }

    private function employee(User $user): void
    {
        $this->authorize('manage-payroll');
        abort_unless((int) $user->company_id === (int) auth()->user()->company_id, 404);
    }

    public function index(Request $request)
    {
        $dates = $request->validate([
            'month' => ['nullable', 'date_format:Y-m'],
            'start_date' => ['nullable', 'date_format:Y-m-d'],
            'end_date' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:start_date'],
        ]);
        $legacy = !empty($dates['month']) && empty($dates['start_date']) ? Carbon::createFromFormat('!Y-m', $dates['month']) : null;
        $startDate = $dates['start_date'] ?? $legacy?->toDateString() ?? session('start_date', now()->startOfMonth()->toDateString());
        $endDate = $dates['end_date'] ?? $legacy?->copy()->endOfMonth()->toDateString() ?? session('end_date', now()->endOfMonth()->toDateString());
        abort_if($endDate < $startDate, 422);
        [$startDate, $endDate] = app(\App\Services\FilterDateService::class)->fullMonth($request, $startDate, $endDate);
        session(['start_date' => $startDate, 'end_date' => $endDate]);
        $request->merge(['start_date' => $startDate, 'end_date' => $endDate]);
        $month = Carbon::parse($startDate)->startOfMonth();
        $search = trim($request->validate(['search'=>['nullable','string','max:255']])['search'] ?? '');
        $eligibleUsers = function (string $from, string $until) use ($search) {
            return User::where('company_id', auth()->user()->company_id)->whereNotNull('role')
            ->when($search !== '', fn ($query) => $query->where('name','like','%'.$search.'%'))
            ->whereExists(function ($query) use ($from, $until) {
                $query->selectRaw('1')->from('employee_contracts as ec')
                    ->whereColumn('ec.user_id', 'users.id')->whereColumn('ec.company_id', 'users.company_id')
                    ->where('ec.effective_from', '<=', $until)->where('ec.starts_on', '<=', $until)
                    ->where(fn ($query) => $query->whereNull('ec.ends_on')->orWhere('ec.ends_on', '>=', $from))
                    ->where(function ($query) {
                        $query->where(function ($query) {
                            $query->where('ec.type', 'employment')->whereNotNull('ec.fte')->whereNotNull('ec.night_start')
                                ->where(function ($query) {
                                    $query->where(fn ($query) => $query->where('ec.settlement', 'monthly')->whereNotNull('ec.monthly_gross'))
                                        ->orWhere(fn ($query) => $query->where('ec.settlement', 'hourly')->whereNotNull('ec.hourly_rate'))
                                        ->orWhereIn('ec.details->pay_basis', ['monthly_net','hourly_net']);
                                });
                        })->orWhere(function ($query) {
                            $query->where('ec.type', 'mandate')->where('ec.settlement', 'hourly')->whereNotNull('ec.hourly_rate');
                        });
                    });
            });
        };
        $users = $eligibleUsers($startDate, $endDate)->paginate(25)->withQueryString();
        $hasContracts = EmployeeContract::where('company_id', auth()->user()->company_id)->whereIn('user_id', User::select('id')->where('company_id', auth()->user()->company_id))->exists();
        $rows = collect();
        for ($period = $month->copy(); $period->lte(Carbon::parse($endDate)->startOfMonth()); $period->addMonth()) {
            if ($users->isEmpty()) break;
            $ids = $eligibleUsers($period->toDateString(), $period->copy()->endOfMonth()->toDateString())
                ->whereIn('users.id', $users->getCollection()->modelKeys())->pluck('users.id');
            $monthlyUsers = $users->getCollection()->whereIn('id', $ids);
            if ($monthlyUsers->isNotEmpty()) $rows = $rows->concat($this->report->build(auth()->user()->company_id, $monthlyUsers, $period->copy()));
        }
        $data = compact('rows', 'users', 'month', 'hasContracts', 'startDate', 'endDate');
        if ($request->header('X-Payroll-Results') === '1') {
            return response()->view('admin.payroll.partials.results', $data)
                ->header('X-Payroll-Results', '1')->header('Cache-Control', 'private, no-store');
        }
        return response()->view('admin.payroll.index', $data)->header('Cache-Control', 'private, no-store');
    }

    public function show(Request $request, User $user)
    {
        $this->employee($user);
        $month = $this->month($request);
        $row = $this->report->build(auth()->user()->company_id, collect([$user]), $month)->first();
        return response()->view('admin.payroll.show', compact('row', 'user', 'month'))->header('Cache-Control', 'private, no-store');
    }

    public function storeContract(Request $request, User $user)
    {
        $this->employee($user);
        if ($request->input('form_version') === '2') {
            app(\App\Services\Payroll\SimpleEmploymentContracts::class)->store($request, $user);
            return redirect()->route('team.user.show', $user)->with('success', 'Zapisano umowę i ustawienia podatkowe. Możesz przejść do rozliczenia miesiąca.');
        }
        $data = $request->validate([
            'effective_from' => ['required', 'date_format:Y-m-d'],
            'starts_on' => ['required', 'date_format:Y-m-d'],
            'ends_on' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:starts_on'],
            'type' => ['required', Rule::in(['employment'])],
            'settlement' => ['required', Rule::in(['monthly', 'hourly', 'result'])],
            'fte' => ['nullable', 'required_if:type,employment', 'numeric', 'gt:0', 'lte:1'],
            'monthly_gross' => ['nullable', 'required_if:settlement,monthly', 'numeric', 'gt:0', 'max:9999999999.99'],
            'hourly_rate' => ['nullable', 'required_if:settlement,hourly', 'numeric', 'gt:0', 'max:99999999.99'],
            'overtime_rule' => ['required', Rule::in(['review', 'monthly_basic'])],
            'night_start' => ['nullable', 'integer', Rule::in([21, 22, 23])],
        ]);
        $extra = $request->validate([
            'configuration_status' => ['required', Rule::in(['draft','complete'])],
            'details.term' => ['nullable', Rule::in(['trial','fixed','indefinite'])],
            'details.signed_on' => ['nullable','date_format:Y-m-d','before_or_equal:starts_on'],
            'details.position' => ['nullable','string','max:255'], 'details.workplaces' => ['nullable','string','max:2000'],
            'details.time_system' => ['nullable',Rule::in(['basic','task'])],
            'details.period_months' => ['nullable','integer','min:1','max:12'], 'details.period_start' => ['nullable','date_format:Y-m-d'],
            'details.daily_norm' => ['nullable','numeric','gt:0','max:8'], 'details.weekly_norm' => ['nullable','numeric','gt:0','max:40'],
            'details.norm_basis' => ['nullable','string','max:1000'], 'details.schedule_link' => ['nullable',Rule::in(['existing','tasks'])],
            'details.tasks' => ['nullable','string','max:4000'], 'details.part_time_terms' => ['nullable','string','max:4000'],
            'details.fixed_allowance' => ['nullable','regex:/^\d{1,8}(?:[.,]\d{1,2})?$/D'],
        ]);
        $data += $extra;
        $candidate = new EmployeeContract($data);
        if ($data['configuration_status'] === 'complete' && ($missing = app(\App\Services\Payroll\ContractConfiguration::class)->missing($candidate))) {
            throw \Illuminate\Validation\ValidationException::withMessages(['contract' => $missing]);
        }
        if (($data['details']['term'] ?? '') === 'indefinite' && !empty($data['ends_on'])) throw \Illuminate\Validation\ValidationException::withMessages(['ends_on'=>'Umowa bezterminowa nie może mieć planowanej daty zakończenia.']);
        abort_unless(($data['type'] === 'work') === ($data['settlement'] === 'result'), 422);
        $data['monthly_gross'] = $data['settlement'] === 'monthly' ? $data['monthly_gross'] : null;
        $data['hourly_rate'] = $data['settlement'] === 'hourly' ? $data['hourly_rate'] : null;
        // Append immutable versions. Serialize against snapshot creation for this employee.
        DB::transaction(function () use ($user, $data) {
            User::whereKey($user->id)->lockForUpdate()->firstOrFail();
            if (EmployeeContract::where('company_id', $user->company_id)->where('user_id',$user->id)->whereDate('effective_from',$data['effective_from'])->exists()) {
                throw \Illuminate\Validation\ValidationException::withMessages(['effective_from'=>'Istnieje już wersja z tą datą. Wybierz datę kolejnej zmiany.']);
            }
            EmployeeContract::create($data + ['user_id' => $user->id, 'company_id' => auth()->user()->company_id, 'created_by' => auth()->id()]);
        });
        return redirect()->route('team.user.show', $user)->with('success', 'Zapisano nową wersję zatrudnienia. Zapisane zestawienia pozostają bez zmian.');
    }

    public function snapshot(Request $request, User $user)
    {
        $this->employee($user);
        $month = $this->month($request);
        DB::transaction(function () use ($user, $month) {
            User::whereKey($user->id)->lockForUpdate()->firstOrFail();
            $row = $this->report->build(auth()->user()->company_id, collect([$user]), $month)->first();
            abort_unless($row['status'] === 'Gotowe', 422, 'Uzupełnij dane i wyjaśnij uwagi przed zapisaniem zestawienia.');
            PayrollSnapshot::firstOrCreate(['company_id' => auth()->user()->company_id, 'user_id' => $user->id, 'month' => $month->toDateString()],
                ['created_by' => auth()->id(), 'payload' => $row]);
        });
        return redirect()->route('raport.payroll.show', ['user' => $user, 'month' => $month->format('Y-m')])->with('success', 'Zapisano niezmienne zestawienie miesiąca.');
    }

    public function costInputs(Request $request, User $user)
    {
        $this->employee($user);
        $month = $this->month($request);
        $parameters = app(\App\Services\Payroll\PayrollParameters::class)->forMonth($month);
        abort_unless($parameters, 422, 'Brak parametrów dla wybranego miesiąca.');
        $data = $request->validate([
            'pension_base_before_month' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'accident_percent' => ['required', 'numeric', 'gt:0', 'max:10'],
            'fp_fs' => ['required', 'boolean'], 'fgsp' => ['required', 'boolean'],
            'ppk_percent' => ['required', 'numeric', 'min:0', 'max:'.$parameters['ppk_employer_max_percent']],
            'standard_employment_confirmed' => ['accepted'],
        ]);
        abort_if($data['ppk_percent'] > 0 && $data['ppk_percent'] < $parameters['ppk_employer_min_percent'], 422);
        unset($data['standard_employment_confirmed']);
        DB::transaction(function () use ($user, $month, $data) {
            User::whereKey($user->id)->lockForUpdate()->firstOrFail();
            $key = ['company_id' => auth()->user()->company_id, 'user_id' => $user->id, 'month' => $month->toDateString()];
            abort_if(PayrollSnapshot::where($key)->exists(), 422, 'Zestawienie jest już zapisane.');
            DB::table('payroll_cost_inputs')->updateOrInsert($key, $data + ['confirmed_by' => auth()->id(), 'created_at' => now(), 'updated_at' => now()]);
        });
        return redirect()->route('raport.payroll.show', ['user' => $user, 'month' => $month->format('Y-m')]);
    }
}
