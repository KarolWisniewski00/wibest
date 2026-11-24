<?php

namespace App\Services\Payroll;

use InvalidArgumentException;

final class Money
{
    public static function cents(string $value): int
    {
        if (!preg_match('/^([0-9]{1,10})(?:[.,]([0-9]{1,2}))?$/D', $value, $m)) throw new InvalidArgumentException('Nieprawidłowa kwota.');
        return (int) $m[1] * 100 + (int) str_pad($m[2] ?? '', 2, '0');
    }

    public static function divide(int $numerator, int $denominator): int
    {
        if ($numerator < 0 || $denominator <= 0) throw new InvalidArgumentException('Nieprawidłowe zaokrąglenie.');
        return intdiv($numerator + intdiv($denominator, 2), $denominator);
    }

    public static function rate(int $cents, int $basisPoints): int { return self::divide($cents * $basisPoints, 10000); }
    public static function zloty(int $cents): int { return self::divide($cents, 100) * 100; }
    public static function decimal(int $cents): string { return ($cents < 0 ? '-' : '').intdiv(abs($cents), 100).'.'.str_pad((string) (abs($cents) % 100), 2, '0', STR_PAD_LEFT); }
    public static function display(int $cents): string { return str_replace('.', ',', self::decimal($cents)).' zł'; }
}
