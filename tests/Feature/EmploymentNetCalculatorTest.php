<?php

namespace Tests\Feature;

use App\Services\Payroll\{EmploymentNetCalculator, Money};
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class EmploymentNetCalculatorTest extends TestCase
{
    private function settings(array $changes = []): array
    {
        return array_replace(['kup_cents' => 25000, 'pit_reduction_cents' => 30000, 'health_legacy_reduction_cents' => 4376,
            'exemption' => 'none', 'ppk_employee_bp' => 0, 'ppk_employer_bp' => 0], $changes);
    }

    private function calculate(int $cash = 600000, array $settings = [], array $year = [], array $previous = [], array $extra = []): array
    {
        return app(EmploymentNetCalculator::class)->calculate('2026-11-20', 'employment', $this->settings($settings),
            array_merge([['type' => 'salary_cash', 'cents' => $cash]], $extra),
            array_replace(['payer_income_cents' => 0, 'pension_base_cents' => 0, 'health_legacy_income_cents' => 0], $year), $previous);
    }

    public function test_control_example_with_and_without_pit2(): void
    {
        $a = $this->calculate()['amounts'];
        foreach (['pension' => 58560, 'disability' => 9000, 'sickness' => 14700, 'social' => 82260, 'health_base' => 517740,
            'health' => 46597, 'pit_base' => 492700, 'pit' => 29100, 'net' => 442043] as $key => $expected) $this->assertSame($expected, $a[$key], $key);
        $a = $this->calculate(settings: ['pit_reduction_cents' => 0, 'health_legacy_reduction_cents' => 0])['amounts'];
        $this->assertSame(59100, $a['pit']); $this->assertSame(412043, $a['net']);
    }

    public function test_increased_costs_and_no_costs(): void
    {
        $a = $this->calculate(settings: ['kup_cents' => 30000])['amounts'];
        $this->assertSame(487700, $a['pit_base']); $this->assertSame(28500, $a['pit']); $this->assertSame(442643, $a['net']);
        $this->assertSame(32100, $this->calculate(settings: ['kup_cents' => 0])['amounts']['pit']);
    }

    public function test_threshold_is_income_at_this_payer_and_splits_crossing_month(): void
    {
        $a = $this->calculate(year: ['payer_income_cents' => 11900000])['amounts'];
        $this->assertSame(100000, $a['pit_low_base']); $this->assertSame(392700, $a['pit_high_base']);
        $this->assertSame(107700, $a['pit']);
    }

    public function test_pension_cap_does_not_cap_sickness_or_health(): void
    {
        $a = $this->calculate(year: ['pension_base_cents' => 28160000])['amounts'];
        $this->assertSame(100000, $a['pension_base']); $this->assertSame(9760, $a['pension']);
        $this->assertSame(1500, $a['disability']); $this->assertSame(14700, $a['sickness']);
        $this->assertSame(574040, $a['health_base']);
    }

    public function test_multiple_payments_use_monthly_rounded_totals_and_only_one_cost_and_reduction(): void
    {
        $first = $this->calculate(300000);
        $second = $this->calculate(300000, previous: $first['month_totals']);
        $single = $this->calculate();
        $this->assertSame(0, $second['amounts']['kup']);
        foreach (['pension', 'disability', 'sickness', 'health', 'pit', 'net', 'pit_reduction'] as $key) {
            $this->assertSame($single['amounts'][$key], $first['amounts'][$key] + $second['amounts'][$key], $key);
        }
        $first = $this->calculate(300000, year: ['payer_income_cents' => 11900000]);
        $second = $this->calculate(300000, year: ['payer_income_cents' => 11900000], previous: $first['month_totals']);
        $this->assertSame(107700, $first['amounts']['pit'] + $second['amounts']['pit']);
    }

    public function test_health_is_capped_by_hypothetical_2021_advance_not_current_zero_pit(): void
    {
        $a = $this->calculate(100000)['amounts'];
        $this->assertSame(0, $a['pit']);
        $this->assertSame(6045, $a['health']); // (863 - 250) * 17% - 43.76
        $this->assertSame(7766, $a['health_uncapped']);
        $a = $this->calculate(100000, settings: ['pit_reduction_cents' => 0, 'health_legacy_reduction_cents' => 0])['amounts'];
        $this->assertSame(7766, $a['health']);
    }

    public function test_ppk_employer_transfer_is_tax_revenue_not_cash_or_social_base(): void
    {
        $r = $this->calculate(settings: ['ppk_employee_bp' => 200, 'ppk_employer_bp' => 150], extra: [['type' => 'employer_ppk_transferred', 'cents' => 9000]]);
        $this->assertSame(600000, $r['amounts']['social_base']); $this->assertSame(12000, $r['amounts']['ppk_employee']);
        $this->assertSame(9000, $r['amounts']['ppk_employer']); $this->assertSame(30200, $r['amounts']['pit']);
        $this->assertSame(428943, $r['amounts']['net']);
        $a = $this->calculate(extra: [['type' => 'benefit_fully_insured', 'cents' => 10000]])['amounts'];
        $this->assertSame(600000, $a['cash']); $this->assertSame(610000, $a['social_base']);
    }

    public function test_money_rounding_has_no_float_conversion(): void
    {
        $this->assertSame(600001, Money::cents('6000,01'));
        $this->assertSame(1, Money::rate(50, 100));
        $this->assertSame(0, Money::zloty(49)); $this->assertSame(100, Money::zloty(50));
        $this->assertSame('99999999.99', Money::decimal(Money::cents('99999999.99')));
        $first = $this->calculate(300001); $second = $this->calculate(299999, previous: $first['month_totals']);
        $this->assertSame(442043, $first['amounts']['net'] + $second['amounts']['net']);
    }

    public function test_unsupported_exemption_cannot_silently_use_standard_tax(): void
    {
        $this->expectException(ValidationException::class); $this->calculate(settings: ['exemption' => 'unsupported']);
    }

    public function test_reduced_ppk_is_explicitly_unsupported(): void
    {
        $this->expectException(ValidationException::class); $this->calculate(settings: ['ppk_employee_bp' => 50, 'ppk_employer_bp' => 150]);
    }

    public function test_unverified_tax_year_is_not_guessed(): void
    {
        $this->expectException(ValidationException::class); app(EmploymentNetCalculator::class)->parameters('2027-01-10');
    }

    public function test_pit_zero_uses_shared_limit_and_only_deducts_taxable_social_contributions(): void
    {
        foreach (['young','return','family4','senior'] as $exemption) {
            $a = $this->calculate(settings:['exemption'=>$exemption],year:['exempt_revenue_cents'=>0])['amounts'];
            $this->assertSame(0,$a['pit']); $this->assertSame(471143,$a['net']); $this->assertSame(0,$a['deductible_social']);
        }
        $a = $this->calculate(settings:['exemption'=>'young'],year:['exempt_revenue_cents'=>8452800])['amounts'];
        $this->assertSame(100000,$a['exempt_revenue']); $this->assertSame(68550,$a['deductible_social']);
        $this->assertSame(406500,$a['pit_base']); $this->assertSame(18800,$a['pit']);
    }

    public function test_reduced_ppk_requires_declaration_and_monthly_confirmation(): void
    {
        $settings = ['ppk_employee_bp'=>50,'ppk_employer_bp'=>150,'declarations'=>['ppk_reduced_confirmed'=>true],'reduced_ppk_month_confirmed'=>true];
        $this->assertSame(2500,$this->calculate(500000,settings:$settings)['amounts']['ppk_employee']);
        $this->expectException(ValidationException::class);
        $this->calculate(600000,settings:$settings);
    }

    public function test_net_to_gross_uses_central_calculator_and_correct_employer_total(): void
    {
        $r = app(\App\Services\Payroll\NetSalaryResolver::class)->resolve(442043,fn ($gross) => $this->calculate($gross));
        $this->assertSame(442043,$r['amounts']['net']);
        $this->assertSame(600000,$r['amounts']['cash']);
        $r = app(EmploymentNetCalculator::class)->calculate('2026-11-20','employment',$this->settings(),[['type'=>'salary_cash','cents'=>600000]],
            ['payer_income_cents'=>0,'pension_base_cents'=>0,'health_legacy_income_cents'=>0],[],['accident_bp'=>167,'fp_fs'=>true,'fgsp'=>true]);
        $this->assertSame(722880,$r['employer_cost']);
    }
}
