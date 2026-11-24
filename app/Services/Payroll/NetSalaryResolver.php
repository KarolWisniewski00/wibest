<?php
namespace App\Services\Payroll;

use Illuminate\Validation\ValidationException;

/** Inverts the same payroll engine; no separate JavaScript or approximate tax formula. */
class NetSalaryResolver
{
    public function resolve(int $target, callable $calculate, int $maximum = 10000000000): array
    {
        $low = $target; $high = min($maximum,max(10000, $target * 3));
        while ($calculate($high)['amounts']['net'] < $target && $high < $maximum) $high = min($maximum,$high * 2);
        if ($calculate($high)['amounts']['net'] < $target) throw ValidationException::withMessages(['amount'=>'Kwota netto przekracza zakres kalkulatora lub limit obniżonej wpłaty PPK.']);
        while ($high - $low > 1) {
            $middle = intdiv($low + $high, 2);
            if ($calculate($middle)['amounts']['net'] < $target) $low = $middle; else $high = $middle;
        }
        // PIT rounding can cause a local decrease of up to one zloty. Verify neighbouring grosz.
        $best = null;
        for ($gross = max($target, $low - 300); $gross <= min($maximum,$high + 300); $gross++) {
            $result = $calculate($gross);
            if ($result['amounts']['net'] === $target) return $result + ['target_net'=>$target];
            if ($result['amounts']['net'] > $target && ($best === null || $result['amounts']['net'] < $best['amounts']['net'])) $best = $result;
        }
        if (!$best) throw ValidationException::withMessages(['amount'=>'Nie można ustalić brutto dla podanego netto.']);
        return $best + ['target_net'=>$target];
    }
}
