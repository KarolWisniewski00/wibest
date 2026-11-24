<?php

namespace App\Services\Payroll;

use Illuminate\Validation\ValidationException;

/** One backend calculation for previews and immutable payments. All amounts are integer grosz. */
class EmploymentNetCalculator
{
    public function parameters(string $paidOn): array
    {
        $p = config('payroll_net.'.substr($paidOn, 0, 4));
        if (!$p || $paidOn < $p['from'] || $paidOn > $p['until']) $this->fail('Brak parametrów netto dla daty wypłaty.');
        return $p;
    }

    public function calculate(string $paidOn, string $contractType, array $settings, array $components, array $year, array $previous = [], ?array $employer = null): array
    {
        $p = $this->parameters($paidOn);
        if ($contractType !== 'employment') $this->fail('Netto jest obsługiwane wyłącznie dla umowy o pracę.');
        $exemption = $settings['exemption'] ?? null;
        if (!in_array($exemption, ['none','young','return','family4','senior'], true)) $this->fail('Nieobsługiwane zwolnienie PIT.');
        foreach (['kup_cents' => 'kup_options', 'pit_reduction_cents' => 'pit_reductions', 'health_legacy_reduction_cents' => 'health_legacy_reductions'] as $field => $option) {
            if (!isset($settings[$field]) || !in_array($settings[$field], $p[$option], true)) $this->fail('Uzupełnij potwierdzone ustawienia podatkowe: '.$field);
        }
        foreach (['employee', 'employer'] as $party) {
            $rate = $settings['ppk_'.$party.'_bp'] ?? null;
            $reduced = $party === 'employee' && $rate === 50 && !empty($settings['declarations']['ppk_reduced_confirmed']);
            if (!is_int($rate) || (!$reduced && $rate !== 0 && ($rate < $p['ppk_'.$party.'_min_bp'] || $rate > $p['ppk_'.$party.'_max_bp']))) $this->fail('Obniżone lub niestandardowe wpłaty PPK wymagają potwierdzenia.');
        }
        if (($settings['ppk_employee_bp'] === 0) !== ($settings['ppk_employer_bp'] === 0)) $this->fail('Niespójne uczestnictwo w PPK.');
        foreach (['payer_income_cents', 'pension_base_cents', 'health_legacy_income_cents'] as $key) {
            if (!isset($year[$key]) || !is_int($year[$key]) || $year[$key] < 0) $this->fail('Brak danych narastających: '.$key);
        }
        $current = ['cash' => 0, 'social_base' => 0, 'tax_revenue' => 0, 'noncash' => 0, 'ppk_transfer' => 0];
        foreach ($components as $component) {
            $amount = $component['cents'] ?? null;
            if (!is_int($amount) || $amount < 0 || $amount > 100000000000) $this->fail('Nieprawidłowa kwota składnika.');
            switch ($component['type'] ?? '') {
                case 'salary_cash': $current['cash'] += $amount; $current['social_base'] += $amount; break;
                case 'benefit_fully_insured': $current['noncash'] += $amount; $current['social_base'] += $amount; break;
                case 'employer_ppk_transferred': $current['ppk_transfer'] += $amount; break;
                default: $this->fail('Nieobsługiwany składnik: chorobowe, zasiłki i szczególne wyłączenia wymagają osobnego naliczenia.');
            }
            $current['tax_revenue'] += $amount;
        }
        $month = [];
        foreach ($current as $key => $amount) $month[$key] = ($previous[$key] ?? 0) + $amount;
        if ($settings['ppk_employee_bp'] === 50 && ($month['social_base'] > $p['ppk_reduced_monthly_limit'] || empty($settings['reduced_ppk_month_confirmed']))) $this->fail('PPK 0,5% wymaga potwierdzenia miesięcznego limitu przychodów ze wszystkich źródeł; podstawa u tego płatnika nie może przekraczać limitu.');
        // Year contains balances BEFORE this payment month; previous contains this month's totals.
        $month['pension_base'] = min($month['social_base'], max(0, $p['pension_cap'] - $year['pension_base_cents']));
        $month['pension'] = Money::rate($month['pension_base'], $p['pension_bp']);
        $month['disability'] = Money::rate($month['pension_base'], $p['disability_bp']);
        $month['sickness'] = Money::rate($month['social_base'], $p['sickness_bp']);
        $month['social'] = $month['pension'] + $month['disability'] + $month['sickness'];
        $month['health_base'] = $month['social_base'] - $month['social'];
        $month['health_uncapped'] = Money::rate($month['health_base'], $p['health_bp']);
        $month['exempt_revenue'] = 0;
        $month['deductible_social'] = $month['social'];
        if ($exemption !== 'none') {
            if (!isset($year['exempt_revenue_cents'])) $this->fail('Uzupełnij wykorzystanie wspólnego limitu PIT-0 przed początkiem historii.');
            // Noncash and PPK require allocation to their actual receipt dates; never silently exempt them.
            if ($month['noncash'] || $month['ppk_transfer']) $this->fail('PIT-0 ze świadczeniami niepieniężnymi lub przekazaniem PPK wymaga indywidualnego przypisania przychodów.');
            $month['exempt_revenue'] = min($month['tax_revenue'], max(0,$p['exemption_limit']-$year['exempt_revenue_cents']));
            if ($month['pension_base'] !== $month['social_base'] && $month['exempt_revenue'] > 0 && $month['exempt_revenue'] < $month['tax_revenue']) $this->fail('Jednoczesne przekroczenie limitu PIT-0 i ZUS wymaga rozdzielenia podstaw składników.');
            $taxableBase = $month['social_base'] - $month['exempt_revenue'];
            $month['deductible_social'] = $taxableBase === 0 ? 0 : Money::rate($taxableBase,$p['pension_bp']) + Money::rate($taxableBase,$p['disability_bp']) + Money::rate($taxableBase,$p['sickness_bp']);
            if (!$month['exempt_revenue']) $month['deductible_social'] = $month['social'];
        }
        $month['kup'] = min($settings['kup_cents'], max(0, $month['tax_revenue'] - $month['exempt_revenue'] - $month['deductible_social']));
        $month['income'] = max(0, $month['tax_revenue'] - $month['exempt_revenue'] - $month['deductible_social'] - $month['kup']);
        $month['pit_base'] = Money::zloty($month['income']);
        $month['pit_low_base'] = min($month['pit_base'], max(0, $p['pit_threshold'] - $year['payer_income_cents']));
        $month['pit_high_base'] = $month['pit_base'] - $month['pit_low_base'];
        $tax = Money::divide($month['pit_low_base'] * $p['pit_low_bp'] + $month['pit_high_base'] * $p['pit_high_bp'], 10000);
        $month['pit_reduction'] = min($tax, $settings['pit_reduction_cents']);
        $month['pit'] = Money::zloty(max(0, $tax - $month['pit_reduction']));
        // Art. 83: hypothetical 2021 advance BEFORE health deduction, only on health-insured income.
        $month['legacy_income'] = max(0, $month['health_base'] - min($settings['kup_cents'], $month['health_base']));
        $legacyBase = Money::zloty($month['legacy_income']);
        $legacyLow = min($legacyBase, max(0, $p['health_legacy_threshold'] - $year['health_legacy_income_cents']));
        $legacyReduction = $year['health_legacy_income_cents'] >= $p['health_legacy_threshold'] ? 0 : $settings['health_legacy_reduction_cents'];
        $month['health_ceiling'] = max(0, Money::divide($legacyLow * $p['health_legacy_low_bp'] + ($legacyBase - $legacyLow) * $p['health_legacy_high_bp'], 10000) - $legacyReduction);
        $month['health'] = min($month['health_uncapped'], $month['health_ceiling']);
        if (!empty($settings['declarations']['health_legacy_unconfirmed']) && $month['health_uncapped'] > max(0,$month['health_ceiling'] - max($p['health_legacy_reductions']))) $this->fail('Niska podstawa zdrowotnej wymaga wskazania, czy ten płatnik stosuje pomniejszenie hipotetycznej zaliczki z 2021 r. Uzupełnij pole w rozliczeniu.');
        $month['ppk_employee'] = Money::rate($month['social_base'], $settings['ppk_employee_bp']);
        $month['ppk_employer'] = Money::rate($month['social_base'], $settings['ppk_employer_bp']);
        $month['net'] = $month['cash'] - $month['social'] - $month['health'] - $month['pit'] - $month['ppk_employee'];
        $delta = [];
        foreach ($month as $key => $amount) $delta[$key] = $amount - ($previous[$key] ?? 0);
        if ($delta['net'] < 0 || $delta['pit'] < 0 || $delta['health'] < 0 || $delta['pension'] < 0 || $delta['disability'] < 0) $this->fail('Wynik wymaga korekty wcześniejszej wypłaty lub poboru poza wypłatą pieniężną. Automatyczny zapis jest zablokowany.');
        $cost = null; $costLines = [];
        if ($employer !== null) {
            foreach ($this->employerContributions($month['social_base'], $month['pension_base'], $p, $employer) as $label => $line) {
                $month['employer_lines'][$label] = $line;
                $costLines[$label] = ['base' => $line['base'] - ($previous['employer_lines'][$label]['base'] ?? 0), 'bp' => $line['bp'],
                    'amount' => $line['amount'] - ($previous['employer_lines'][$label]['amount'] ?? 0)];
            }
            $cost = $delta['cash'] + $delta['noncash'] + $delta['ppk_employer'] + array_sum(array_column($costLines, 'amount'));
        }
        return ['parameters' => $p, 'settings' => $settings, 'components' => $components, 'year_before_month' => $year,
            'month_totals' => $month, 'amounts' => $delta, 'employer_cost' => $cost, 'employer_lines' => $costLines];
    }

    public function employerContributions(int $socialBase, int $limitedBase, array $p, array $employer): array
    {
        $lines = [];
        foreach (['Emerytalna' => [$limitedBase, $p['employer_pension_bp']], 'Rentowa' => [$limitedBase, $p['employer_disability_bp']],
            'Wypadkowa' => [$socialBase, $employer['accident_bp']], 'FP i FS' => [$socialBase, $employer['fp_fs'] ? $p['fp_fs_bp'] : 0],
            'FGŚP' => [$socialBase, $employer['fgsp'] ? $p['fgsp_bp'] : 0]] as $label => [$base, $rate]) {
            $lines[$label] = ['base' => $base, 'bp' => $rate, 'amount' => Money::rate($base, $rate)];
        }
        return $lines;
    }

    private function fail(string $message): never { throw ValidationException::withMessages(['payroll' => $message]); }
}
