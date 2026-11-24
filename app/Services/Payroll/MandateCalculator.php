<?php

namespace App\Services\Payroll;

use App\Models\EmployeeContract;

class MandateCalculator
{
    public function calculate(array $r, EmployeeContract $c, array $p, int $nominal, int $vacation): array
    {
        if ($c->settlement !== 'hourly' || !$c->hourly_rate) $r['missing'][] = 'Zlecenie wymaga stawki godzinowej; inne sposoby rozliczania wymagają dodatkowych warunków umowy.';
        if ((float) $c->hourly_rate < $p['minimum_hourly_mandate']) $r['attention'][] = 'Stawka poniżej minimalnej stawki zlecenia; brak danych o ustawowym wyłączeniu.';
        if ($r['leaves']) $r['attention'][] = 'Nieobecności na zleceniu wymagają sprawdzenia warunków umowy.';
        $r['gross'] = round($r['worked'] / 3600 * (float) $c->hourly_rate, 2);
        $r['lines'][] = ['label' => 'Wynagrodzenie za wykonanie zlecenia', 'formula' => $r['worked'].' s / 3600 × '.$c->hourly_rate.' zł; bez kodeksowych dodatków za nadgodziny i noc.', 'amount' => $r['gross']];
        return $r;
    }
}
