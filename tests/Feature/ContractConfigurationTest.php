<?php
namespace Tests\Feature;

use App\Models\EmployeeContract;
use App\Services\Payroll\ContractConfiguration;
use Tests\TestCase;

class ContractConfigurationTest extends TestCase
{
    public function test_missing_contract_details_are_explicit(): void
    {
        $missing = app(ContractConfiguration::class)->missing(new EmployeeContract(['type'=>'employment','settlement'=>'monthly']));
        $this->assertContains('Brak: data zawarcia.', $missing);
        $this->assertContains('Brak wymiaru etatu.', $missing);
    }
    public function test_task_and_part_time_require_specific_terms(): void
    {
        $c = new EmployeeContract(['type'=>'employment','settlement'=>'monthly','monthly_gross'=>'6000','fte'=>'0.5',
            'details'=>['term'=>'indefinite','signed_on'=>'2026-01-01','position'=>'Specjalista','workplaces'=>'Warszawa',
                'time_system'=>'task','period_months'=>1,'period_start'=>'2026-01-01','daily_norm'=>8,'weekly_norm'=>40,
                'norm_basis'=>'Standardowe','schedule_link'=>'tasks']]);
        $c->details = ['term'=>'indefinite','signed_on'=>'2026-01-01','position'=>'Specjalista','workplaces'=>'Warszawa',
            'time_system'=>'task','period_months'=>1,'period_start'=>'2026-01-01','daily_norm'=>8,'weekly_norm'=>40,'norm_basis'=>'Standardowe','schedule_link'=>'tasks'];
        $missing = app(ContractConfiguration::class)->missing($c);
        $this->assertContains('Brak opisu zadań lub dokumentu ustalającego zadania.', $missing, json_encode($missing));
        $this->assertContains('Brak warunków godzin ponadwymiarowych.', $missing);
        $c->details = $c->details + ['tasks'=>'Dokument Z1','part_time_terms'=>'Załącznik 2'];
        $this->assertSame([],app(ContractConfiguration::class)->missing($c));
    }
}
