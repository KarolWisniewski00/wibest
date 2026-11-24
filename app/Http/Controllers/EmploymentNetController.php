<?php

namespace App\Http\Controllers;

use App\Models\{EmployeeTaxSetting, PayrollPayment, User};
use App\Services\Payroll\{EmploymentNetCalculator, Money, PayrollPayments};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EmploymentNetController extends Controller
{
    public function __construct(private PayrollPayments $payments, private EmploymentNetCalculator $calculator)
    {
        $this->middleware(['auth', 'can:manage-payroll']);
    }

    private function employee(User $user): void
    {
        $this->authorize('manage-payroll');
        abort_unless(auth()->user()->company_id !== null && (int) $user->company_id === (int) auth()->user()->company_id, 404);
    }

    private function page(User $user, string $period, ?array $result = null, array $input = [])
    {
        $row = app(\App\Services\Payroll\PayrollReport::class)->build($user->company_id,collect([$user]),Carbon::createFromFormat('!Y-m',$period))->first();
        $remainingGross = $row['gross'] === null ? 0 : max(0, Money::cents((string) $row['gross']) - $row['paid_gross_cents']);
        $input += ['gross'=>Money::decimal($remainingGross), 'benefit'=>'0', 'ppk_transferred'=>'0'];
        $settings = EmployeeTaxSetting::where('company_id', $user->company_id)->where('user_id', $user->id)->orderByDesc('effective_from')->orderByDesc('id')->limit(12)->get();
        $openings = DB::table('payroll_opening_balances')->where('company_id', $user->company_id)->where('user_id', $user->id)->orderByDesc('year')->limit(5)->get();
        $year = substr($input['paid_on'] ?? $period,0,4);
        $payments = PayrollPayment::where('company_id', $user->company_id)->where('user_id', $user->id)->whereYear('paid_on', $year)->orderByDesc('paid_on')->orderByDesc('id')->paginate(10)->withQueryString();
        return response()->view('admin.payroll.net', compact('user', 'period', 'result', 'input', 'settings', 'openings', 'payments','row','year'))->header('Cache-Control', 'private, no-store');
    }

    public function show(Request $request, User $user)
    {
        $this->employee($user);
        $data = $request->validate(['month' => ['nullable', 'date_format:Y-m']]);
        return $this->page($user, $data['month'] ?? now()->format('Y-m'));
    }

    private function input(Request $request): array
    {
        $money = ['required', 'regex:/^\d{1,8}(?:[.,]\d{1,2})?$/D'];
        return $request->validate(['period' => ['required', 'date_format:Y-m'], 'paid_on' => ['required', 'date_format:Y-m-d'],
            'gross' => $money, 'benefit' => $money, 'ppk_transferred' => $money,
            'scope_confirmed' => ['accepted'], 'reduced_ppk_month_confirmed'=>['sometimes','accepted'],
            'employer_confirmed'=>['sometimes','accepted'],
            'health_legacy_reduction_cents'=>['nullable','integer',Rule::in([0,4376])],
            'accident_percent'=>['nullable','required_with:employer_confirmed','regex:/^\d{1,2}(?:[.,]\d{1,2})?$/D'],
            'fp_fs'=>['nullable','required_with:employer_confirmed','boolean'],
            'fgsp'=>['nullable','required_with:employer_confirmed','boolean']]);
    }

    public function preview(Request $request, User $user)
    {
        $this->employee($user); $input = $this->input($request);
        $result = $this->payments->calculate($user, $input['period'], $input['paid_on'], $input);
        if ($request->expectsJson()) return response()->json($result)->header('Cache-Control', 'private, no-store');
        return $this->page($user, $input['period'], $result, $input);
    }

    public function approve(Request $request, User $user)
    {
        $this->employee($user); $input = $this->input($request);
        $data = $request->validate(['request_key' => ['required', 'uuid'], 'preview_hash' => ['required', 'string', 'size:64'], 'history_confirmed' => ['accepted']]);
        $this->payments->approve($user, $input['period'], $input['paid_on'], $input, $data['request_key'], $data['preview_hash']);
        $row = app(\App\Services\Payroll\PayrollReport::class)->build($user->company_id, collect([$user]), Carbon::createFromFormat('!Y-m', $input['period']))->first();
        $message = $row['payment_status'] === 'Rozliczono'
            ? '✅ Miesiąc '.$input['period'].' rozliczono. Zapisano dane i rozliczenie wypłaty.'
            : '✅ Zapisano częściowe rozliczenie wypłaty. Miesiąc pozostaje częściowo rozliczony.';
        return redirect()->route('raport.payroll.net', ['user' => $user, 'month' => $input['period']])->with('success', $message.' To nie jest zlecenie przelewu.');
    }

    public function settings(Request $request, User $user)
    {
        $this->employee($user);
        $request->validate(['effective_from' => ['required', 'date_format:Y-m-d']]);
        $p = $this->calculator->parameters($request->input('effective_from'));
        foreach (['employee', 'employer'] as $party) {
            $percent = 'ppk_'.$party.'_percent';
            if ($request->has($percent)) {
                $request->validate([$percent => ['required', 'regex:/^\d{1,2}(?:[.,]\d{1,2})?$/D']]);
                $request->merge(['ppk_'.$party.'_bp' => Money::cents($request->input($percent))]);
            }
        }
        $data = $request->validate([
            'effective_from' => ['required', 'date_format:Y-m-d'],
            'kup_cents' => ['required', 'integer', Rule::in($p['kup_options'])],
            'pit_reduction_cents' => ['required', 'integer', Rule::in($p['pit_reductions'])],
            'health_legacy_reduction_cents' => ['required', 'integer', Rule::in($p['health_legacy_reductions'])],
            'exemption' => ['required', Rule::in(['none', 'unsupported'])],
            'ppk_employee_bp' => ['required', 'integer', 'min:0', 'max:'.$p['ppk_employee_max_bp']],
            'ppk_employer_bp' => ['required', 'integer', 'min:0', 'max:'.$p['ppk_employer_max_bp']],
            'declarations_confirmed' => ['accepted'],
            'declarations.submitted_on' => ['nullable','date_format:Y-m-d'],
            'declarations.source' => ['nullable','string','max:1000'],
            'declarations.action' => ['nullable',Rule::in(['submitted','changed','withdrawn','absent'])],
            'declarations.enhanced_kup' => ['nullable',Rule::in(['confirmed','absent','withdrawn'])],
            'declarations.ppk_status' => ['nullable',Rule::in(['participating','resigned','not_covered','pending'])],
            'declarations.exemption_kind' => ['nullable',Rule::in(['none','young','return','family4','senior'])],
            'declarations.exemption_until' => ['nullable','date_format:Y-m-d','after_or_equal:effective_from'],
            'declarations.conditions' => ['nullable','string','max:4000'],
        ]);
        if (($data['kup_cents'] ?? 0) == 30000 && ($data['declarations']['enhanced_kup'] ?? '') !== 'confirmed') {
            throw ValidationException::withMessages(['declarations.enhanced_kup'=>'Podwyższone KUP wymagają potwierdzenia właściwego oświadczenia.']);
        }
        unset($data['declarations_confirmed']);
        DB::transaction(function () use ($user, $data) {
            User::whereKey($user->id)->lockForUpdate()->firstOrFail();
            EmployeeTaxSetting::create($data + ['user_id' => $user->id, 'company_id' => $user->company_id, 'created_by' => auth()->id()]);
        });
        return back()->with('success', 'Zapisano nową wersję oświadczeń. Historyczne wypłaty pozostają bez zmian.');
    }

    public function opening(Request $request, User $user)
    {
        $this->employee($user);
        $money = ['required', 'regex:/^\d{1,8}(?:[.,]\d{1,2})?$/D'];
        $data = $request->validate(['starts_on' => ['required', 'date_format:Y-m-d'], 'payer_income' => $money,
            'pension_base' => $money, 'health_legacy_income' => $money, 'opening_confirmed' => ['accepted'],
            'exempt_revenue'=>['nullable','regex:/^\d{1,8}(?:[.,]\d{1,2})?$/D']]);
        $date = Carbon::parse($data['starts_on']);
        if ($date->day !== 1) throw ValidationException::withMessages(['starts_on' => 'Historia musi rozpoczynać się pierwszego dnia miesiąca, przed wszystkimi wypłatami tego miesiąca.']);
        $this->calculator->parameters($data['starts_on']);
        DB::transaction(function () use ($user, $data, $date) {
            User::whereKey($user->id)->lockForUpdate()->firstOrFail();
            $key = ['company_id' => $user->company_id, 'user_id' => $user->id, 'year' => $date->year];
            if (DB::table('payroll_opening_balances')->where($key)->exists()
                || PayrollPayment::where('company_id', $user->company_id)->where('user_id', $user->id)->whereYear('paid_on', $date->year)->exists()) {
                throw ValidationException::withMessages(['opening' => 'Saldo początkowe jest już ustalone. Zmiana wymaga kontrolowanej korekty historii.']);
            }
            $exempt = isset($data['exempt_revenue']) ? ['exempt_revenue_cents'=>Money::cents($data['exempt_revenue'])] : [];
            DB::table('payroll_opening_balances')->insert($key + $exempt + ['starts_on' => $data['starts_on'], 'created_by' => auth()->id(),
                'payer_income_cents' => Money::cents($data['payer_income']), 'pension_base_cents' => Money::cents($data['pension_base']),
                'health_legacy_income_cents' => Money::cents($data['health_legacy_income']), 'created_at' => now(), 'updated_at' => now()]);
        });
        return back()->with('success', 'Potwierdzono początkowe dane roku.');
    }

    public function companyParameters(Request $request, User $user)
    {
        $this->employee($user);
        $data = $request->validate(['effective_from'=>['required','date_format:Y-m-d'], 'accident_percent'=>['required','regex:/^\d{1,2}(?:[.,]\d{1,2})?$/D']]);
        $rate = Money::cents($data['accident_percent']);
        abort_unless($rate > 0 && $rate <= 1000,422);
        DB::table('company_payroll_parameters')->insert(['company_id'=>$user->company_id,'created_by'=>auth()->id(),
            'effective_from'=>$data['effective_from'],'accident_bp'=>$rate,'created_at'=>now(),'updated_at'=>now()]);
        return back()->with('success','Zapisano wersję parametrów firmy.');
    }

    public function payslip(User $user, PayrollPayment $payment)
    {
        $this->employee($user);
        abort_unless((int)$payment->company_id === (int)$user->company_id && (int)$payment->user_id === (int)$user->id,404);
        $calculation = $payment->payload;
        return \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.payroll.payslip',compact('calculation','payment'))
            ->setPaper('a4')->download('pasek-wyplaty-'.$payment->period.'-'.$payment->id.'.pdf')
            ->header('Cache-Control','private, no-store');
    }
}
