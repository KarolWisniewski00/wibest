<?php

namespace App\Services\Payroll;

use Carbon\Carbon;

class PayrollParameters
{
    public function forMonth(Carbon $month): ?array
    {
        foreach (array_reverse(config('payroll.versions', []), true) as $from => $parameters) {
            if ($month->toDateString() >= $from && $month->copy()->endOfMonth()->toDateString() <= $parameters['until']) {
                return $parameters;
            }
        }
        return null;
    }

    public function holidays(int $year): array
    {
        // Reuse WIBEST's holiday calendar, supplement January holidays omitted there.
        return app(\App\Livewire\Calendar::class)->getPublicHolidays($year)
            ->merge(["$year-01-01", "$year-01-06"])->unique()->values()->all();
    }

    public function nominalSeconds(Carbon $month): int
    {
        $holidays = $this->holidays($month->year);
        $days = 0;
        for ($date = $month->copy(); $date->month === $month->month; $date->addDay()) {
            $days += $date->isWeekday() ? 1 : 0;
            $days -= !$date->isSunday() && in_array($date->toDateString(), $holidays, true) ? 1 : 0;
        }
        return $days * 8 * 3600;
    }
}
