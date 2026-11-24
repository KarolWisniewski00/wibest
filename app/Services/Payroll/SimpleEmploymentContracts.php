<?php

namespace App\Services\Payroll;

use App\Models\{EmployeeContract, EmployeeTaxSetting, User, UserCompanyHistory};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SimpleEmploymentContracts
{
    public function store(Request $request, User $user): void
    {
        $v = $request->validate([
            'edit_contract_id' => ['nullable','integer','min:1'],
            'term' => ['required', Rule::in(['trial','fixed','indefinite'])],
            'starts_on' => ['required','date_format:Y-m-d'],
            'ends_on' => ['nullable','required_unless:term,indefinite','date_format:Y-m-d','after_or_equal:starts_on','prohibited_if:term,indefinite'],
            'effective_from' => ['required','date_format:Y-m-d','after_or_equal:starts_on'],
            'birth_date' => ['required','date_format:Y-m-d','before:today','before:starts_on'],
            'pay_basis' => ['required',Rule::in(['monthly_gross','monthly_net','hourly_gross','hourly_net'])],
            'amount' => ['required','regex:/^\d{1,7}(?:[.,]\d{1,2})?$/D'],
            'fte' => ['required','numeric','gt:0','lte:1'],
            'night_start' => ['required',Rule::in([21,22,23])],
            'pit_zero' => ['required',Rule::in(['none','young','return','family4','senior'])],
            'young_opt_out' => ['nullable','boolean'],
            'exemption_until' => ['nullable','required_if:pit_zero,return,family4,senior','date_format:Y-m-d','after_or_equal:effective_from'],
            'ppk' => ['required','boolean'],
            'ppk_rate' => ['nullable','required_if:ppk,1',Rule::in(['2','0.5','4'])],
            'ppk_reduced_confirmed' => ['sometimes','accepted'],
            'pit_reduction' => ['required',Rule::in([0,100,150,300])],
            'kup' => ['required',Rule::in([0,250,300])],
            'confirmed' => ['accepted'],
        ]);
        if (Money::cents($v['amount']) <= 0) throw ValidationException::withMessages(['amount'=>'Podaj kwotę większą od zera.']);
        if (!empty($v['ends_on']) && $v['effective_from'] > $v['ends_on']) throw ValidationException::withMessages(['effective_from'=>'Warunki muszą obowiązywać przed zakończeniem umowy.']);
        $young = Carbon::parse($v['birth_date'])->addYears(26)->gte(Carbon::parse($v['effective_from']));
        if ($young && empty($v['young_opt_out'])) $v['pit_zero'] = 'young';
        elseif ($v['pit_zero'] === 'young') $v['pit_zero'] = 'none';
        if ($v['pit_zero'] === 'senior') {
            $age = Carbon::parse($v['birth_date'])->diffInYears(Carbon::parse($v['effective_from']));
            if (!in_array($user->gender,['male','female'],true) || $age < ($user->gender === 'female' ? 60 : 65)) throw ValidationException::withMessages(['pit_zero'=>'Ulga dla seniorów wymaga potwierdzonej płci i osiągnięcia wieku 60 lat (kobieta) lub 65 lat (mężczyzna). Uzupełnij profil lub wybierz właściwe zwolnienie.']);
        }
        if ($v['pit_zero'] === 'return' && Carbon::parse($v['exemption_until'])->year > Carbon::parse($v['effective_from'])->year + 3) throw ValidationException::withMessages(['exemption_until'=>'Ulga na powrót obejmuje maksymalnie cztery kolejne lata podatkowe.']);
        if ($v['ppk'] && $v['ppk_rate'] === '0.5' && empty($v['ppk_reduced_confirmed'])) throw ValidationException::withMessages(['ppk_reduced_confirmed'=>'Potwierdź deklarację obniżenia wpłaty PPK. Limit przychodów trzeba sprawdzić także w miesiącu wypłaty.']);
        DB::transaction(function () use ($v, $user) {
            User::whereKey($user->id)->lockForUpdate()->firstOrFail();
            $key = ['company_id'=>$user->company_id,'user_id'=>$user->id];
            $editing = null;
            if (!empty($v['edit_contract_id'])) {
                $editing = EmployeeContract::where($key)->whereKey($v['edit_contract_id'])->where('type','employment')->firstOrFail();
                $current = EmployeeContract::where($key)->orderByDesc('effective_from')->orderByDesc('id')->first();
                if ($current->id !== $editing->id) throw ValidationException::withMessages(['contract'=>'Umowa została zmieniona. Odśwież profil i edytuj najnowszą wersję.']);
            }
            if (!$editing && EmployeeContract::where($key)->whereDate('effective_from',$v['effective_from'])->exists()) throw ValidationException::withMessages(['effective_from'=>'Istnieje już wersja z tą datą. Podaj datę zmiany warunków.']);
            $latest = EmployeeContract::where($key)->max('effective_from');
            if ($latest && $v['effective_from'] < substr($latest,0,10)) throw ValidationException::withMessages(['effective_from'=>'Nie można dopisać warunków przed istniejącą późniejszą wersją.']);
            $history = UserCompanyHistory::where($key)->whereNull('unassigned_at')->orderByDesc('id')->lockForUpdate()->first();
            if (!$history) $history = new UserCompanyHistory($key + ['assigned_at'=>now()]);
            $history->employment_start = $v['starts_on'];
            $history->employment_end = $v['term'] === 'indefinite' ? null : $v['ends_on'];
            $history->save();
            $monthly = str_starts_with($v['pay_basis'],'monthly');
            $net = str_ends_with($v['pay_basis'],'_net');
            EmployeeContract::create($key + ['created_by'=>auth()->id(),'type'=>'employment','effective_from'=>$v['effective_from'],
                'starts_on'=>$v['starts_on'],'ends_on'=>$history->employment_end,'settlement'=>$monthly ? 'monthly' : 'hourly',
                'fte'=>$v['fte'],'monthly_gross'=>$monthly && !$net ? Money::decimal(Money::cents($v['amount'])) : null,
                'hourly_rate'=>!$monthly && !$net ? Money::decimal(Money::cents($v['amount'])) : null,
                'night_start'=>$v['night_start'],'overtime_rule'=>'monthly_basic','configuration_status'=>'complete',
                'details'=>['form_version'=>2,'replaces_contract_id'=>$editing?->id,'term'=>$v['term'],'birth_date'=>$v['birth_date'],'pay_basis'=>$v['pay_basis'],
                    'amount'=>Money::decimal(Money::cents($v['amount'])),'history_id'=>$history->id,
                    'time_system'=>'basic','period_months'=>1,'daily_norm'=>8,'weekly_norm'=>40]]);
            EmployeeTaxSetting::create($key + ['created_by'=>auth()->id(),'effective_from'=>$v['effective_from'],
                'kup_cents'=>(int)$v['kup'] * 100,'pit_reduction_cents'=>(int)$v['pit_reduction'] * 100,
                'health_legacy_reduction_cents'=>0,'exemption'=>$v['pit_zero'],
                'ppk_employee_bp'=>$v['ppk'] ? Money::cents($v['ppk_rate']) : 0,'ppk_employer_bp'=>$v['ppk'] ? 150 : 0,
                'declarations'=>['birth_date'=>$v['birth_date'],'young_opt_out'=>!empty($v['young_opt_out']),
                    'exemption_kind'=>$v['pit_zero'],'exemption_until'=>$v['exemption_until'] ?? null,
                    'ppk_reduced_confirmed'=>!empty($v['ppk_reduced_confirmed']),
                    'enhanced_kup'=>$v['kup'] == 300 ? 'confirmed' : 'absent','health_legacy_unconfirmed'=>true,
                    'submitted_on'=>now()->toDateString(),'source'=>'Formularz umowy — potwierdzenie administratora',
                    'action'=>'submitted','ppk_status'=>$v['ppk'] ? 'participating' : 'not_covered']]);
        });
    }
}
