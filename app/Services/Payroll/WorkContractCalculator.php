<?php

namespace App\Services\Payroll;

use App\Models\EmployeeContract;

class WorkContractCalculator
{
    public function calculate(array $r, EmployeeContract $c, array $p, int $nominal, int $vacation): array
    {
        $r['missing'][] = 'Dzieło: wymagany odbiór rezultatu, uzgodniona kwota i termin należności. Czas RCP nie jest podstawą zapłaty za dzieło.';
        return $r;
    }
}
