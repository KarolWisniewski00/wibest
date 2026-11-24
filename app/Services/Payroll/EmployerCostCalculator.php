<?php

namespace App\Services\Payroll;

class EmployerCostCalculator
{
    public function apply(array $row, ?array $input): array
    {
        $row['cost_input'] = $input;
        $row['cost_lines'] = [];
        if (!$input || $row['gross'] === null || ($row['contract']['type'] ?? '') !== 'employment') return $row;
        $gross = Money::cents((string) $row['gross']);
        $p = config('payroll_net.'.($row['parameters']['tax_year'] ?? ''));
        if (!$p) return $row;
        $limited = min($gross, max(0, $p['pension_cap'] - Money::cents((string) $input['pension_base_before_month'])));
        $lines = app(EmploymentNetCalculator::class)->employerContributions($gross, $limited, $p,
            ['accident_bp' => Money::cents((string) $input['accident_percent']), 'fp_fs' => $input['fp_fs'], 'fgsp' => $input['fgsp']]);
        $ppkRate = Money::cents((string) $input['ppk_percent']);
        $lines['PPK pracodawcy'] = ['base' => $gross, 'bp' => $ppkRate, 'amount' => Money::rate($gross, $ppkRate)];
        foreach ($lines as $label => $line) {
            $row['cost_lines'][] = ['label' => $label, 'formula' => Money::display($line['base']).' × '.Money::decimal($line['bp']).'%', 'amount' => Money::decimal($line['amount'])];
        }
        $row['cost'] = Money::decimal($gross + array_sum(array_column($lines, 'amount')));
        $row['cost_reason'] = 'Szacunek dla standardowej umowy o pracę na podstawie miesięcznego potwierdzenia ubezpieczeń; brutto + osobno zaokrąglone składki pracodawcy i PPK.';
        return $row;
    }
}
