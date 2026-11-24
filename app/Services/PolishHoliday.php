<?php

namespace App\Services;

use Carbon\Carbon;

class PolishHoliday
{
    public static function name(Carbon $date): ?string
    {
        $year = $date->year;

        $fixedHolidays = [
            '01-01' => 'Nowy Rok',
            '01-06' => 'Święto Trzech Króli',
            '05-01' => 'Święto Państwowe (1 maja)',
            '05-03' => 'Święto Narodowe Trzeciego Maja',
            '08-15' => 'Wniebowzięcie Najświętszej Maryi Panny',
            '11-01' => 'Wszystkich Świętych',
            '11-11' => 'Narodowe Święto Niepodległości',
            '12-24' => 'Wigilia Bożego Narodzenia',
            '12-25' => 'Boże Narodzenie (pierwszy dzień)',
            '12-26' => 'Boże Narodzenie (drugi dzień)',
        ];

        $key = $date->format('m-d');

        if (isset($fixedHolidays[$key])) {
            return $fixedHolidays[$key];
        }

        // Wielkanoc zależy od roku.
        $easter = Carbon::create($year, 3, 21)->startOfDay()->addDays(easter_days($year));

        $movableHolidays = [
            $easter->toDateString() => 'Niedziela Wielkanocna',
            $easter->copy()->addDay()->toDateString()
            => 'Poniedziałek Wielkanocny',
            $easter->copy()->addDays(49)->toDateString()
            => 'Zielone Świątki',
            $easter->copy()->addDays(60)->toDateString()
            => 'Boże Ciało',
        ];

        return $movableHolidays[$date->toDateString()] ?? null;
    }
}
