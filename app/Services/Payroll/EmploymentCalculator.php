<?php

namespace App\Services\Payroll;

use App\Models\EmployeeContract;

class EmploymentCalculator
{
    public function calculate(array $r, EmployeeContract $c, array $p, int $nominal, int $vacation): array
    {
        if (!$c->fte || $c->night_start === null) $r['missing'][] = 'Uzupełnij wymiar etatu i zakładową porę nocną.';
        $net = str_ends_with($c->details['pay_basis'] ?? '', '_net');
        if (!$net && !$c->monthly_gross && !$c->hourly_rate) $r['missing'][] = 'Brak podstawy wynagrodzenia.';
        if ($c->overtime_rule !== 'monthly_basic') $r['missing'][] = 'Potwierdź podstawowy system czasu pracy z miesięcznym okresem rozliczeniowym.';
        if ($r['planned'] !== $r['nominal']) $r['attention'][] = 'Grafik różni się od nominalnego wymiaru czasu pracy. Sprawdź także dni wolne za święta w sobotę.';
        if ($r['extra'] > 0) $r['attention'][] = 'Nadwyżka względem grafiku wymaga kwalifikacji: godziny ponadwymiarowe, dodatek 50%/100% lub czas wolny. Tolerancja RCP nie pomniejsza praw pracownika.';
        if ($c->settlement === 'hourly' && $vacation > 0) $r['missing'][] = 'Urlop przy stawce godzinowej wymaga historycznych składników podstawy urlopowej.';
        if ($net) {
            $r['target_net'] = $c->settlement === 'monthly' ? Money::cents($c->details['amount']) : Money::divide($r['worked'] * Money::cents($c->details['amount']),3600);
            if ($r['night'] > 0) $r['attention'][] = 'Umowa netto z dodatkiem nocnym wymaga ustalenia zakresu gwarantowanego netto; naliczanie zablokowane.';
            $r['lines'][] = ['label'=>'Uzgodnione netto','formula'=>'Brutto zostanie ustalone według daty wypłaty, oświadczeń i limitów.','amount'=>Money::decimal($r['target_net'])];
            return $r;
        }
        $baseCents = $c->settlement === 'monthly' ? Money::cents((string) ($c->monthly_gross ?? '0'))
            : Money::divide($r['worked'] * Money::cents((string) ($c->hourly_rate ?? '0')), 3600);
        $minimumCents = Money::cents((string) $p['minimum_monthly']);
        $fte = (int) str_replace('.', '', $c->fte ?? '0.0000');
        if ($baseCents < Money::divide($minimumCents * $fte, 10000)) $r['attention'][] = 'Podstawa poniżej minimum proporcjonalnego do etatu — wymagane ustalenie wyrównania.';
        $base = Money::decimal($baseCents);
        $r['lines'][] = ['label' => 'Wynagrodzenie podstawowe', 'formula' => $c->settlement === 'monthly' ? 'Stała stawka miesięczna; urlop wypoczynkowy w stałym składniku.' : $r['worked'].' s / 3600 × '.$c->hourly_rate.' zł', 'amount' => $base];
        if ($vacation > 0) $r['lines'][] = ['label' => 'Urlop wypoczynkowy', 'formula' => ($vacation / 3600).' h — zawarty w stałej podstawie, bez podwójnego naliczenia.', 'amount' => 0];
        $nightCents = $nominal > 0 ? Money::divide($r['night'] * $minimumCents * $p['night_bonus_bp'], $nominal * 10000) : 0;
        $night = Money::decimal($nightCents);
        if ($r['night'] > 0) $r['lines'][] = ['label' => 'Dodatek nocny', 'formula' => $r['night'].' s / 3600 × '.$p['minimum_monthly'].' zł / '.($nominal / 3600).' h × 20%', 'amount' => $night];
        $r['gross'] = Money::decimal($baseCents + $nightCents);
        return $r;
    }
}
