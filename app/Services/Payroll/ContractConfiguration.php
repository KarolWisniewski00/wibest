<?php
namespace App\Services\Payroll;

use App\Models\EmployeeContract;

class ContractConfiguration
{
    public function missing(EmployeeContract $contract): array
    {
        $d = $contract->details ?? [];
        $missing = [];
        if (($d['form_version'] ?? null) === 2) {
            foreach (['term','birth_date','pay_basis','amount'] as $field) if (empty($d[$field])) $missing[] = 'Uzupełnij dane umowy: '.$field;
            if (($d['term'] ?? '') !== 'indefinite' && !$contract->ends_on) $missing[] = 'Brak daty zakończenia.';
            if (!$contract->fte || $contract->night_start === null) $missing[] = 'Uzupełnij wymiar etatu i porę nocną.';
            return $missing;
        }
        foreach (['term'=>'rodzaj umowy o pracę','signed_on'=>'data zawarcia','position'=>'stanowisko','workplaces'=>'miejsce pracy',
            'time_system'=>'system czasu pracy','period_months'=>'okres rozliczeniowy','period_start'=>'początek okresu','daily_norm'=>'norma dobowa',
            'weekly_norm'=>'norma tygodniowa','norm_basis'=>'podstawa norm','schedule_link'=>'powiązanie z grafikiem'] as $key=>$label) {
            if (!isset($d[$key]) || $d[$key] === '') $missing[] = 'Brak: '.$label.'.';
        }
        if (!$contract->fte) $missing[] = 'Brak wymiaru etatu.';
        if ($contract->settlement === 'monthly' ? !$contract->monthly_gross : !$contract->hourly_rate) $missing[] = 'Brak stawki wynagrodzenia.';
        if (($d['term'] ?? '') !== 'indefinite' && !$contract->ends_on) $missing[] = 'Brak daty zakończenia.';
        if (($d['time_system'] ?? '') === 'task' && empty($d['tasks'])) $missing[] = 'Brak opisu zadań lub dokumentu ustalającego zadania.';
        if ((float) $contract->fte < 1 && empty($d['part_time_terms'])) $missing[] = 'Brak warunków godzin ponadwymiarowych.';
        return $missing;
    }
}
