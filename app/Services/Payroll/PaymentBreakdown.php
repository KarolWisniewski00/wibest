<?php
namespace App\Services\Payroll;

class PaymentBreakdown
{
    public function tables(array $c): array
    {
        $a = $c['amounts']; $m = $c['month_totals']; $p = $c['parameters'];
        $money = fn ($v) => Money::display($v);
        $rate = fn ($v) => Money::decimal($v).'%';
        $formula = function ($key, $text) use ($a,$m,$money) {
            $previous = ($m[$key] ?? 0) - ($a[$key] ?? 0);
            return $text.($previous ? ' − wcześniej rozliczone '.$money($previous) : '');
        };
        $employee = [['Brutto','Pensja pieniężna należna w tej wypłacie',$a['cash']]];
        foreach (['pension'=>['Emerytalna pracownika','pension_base','pension_bp'], 'disability'=>['Rentowa pracownika','pension_base','disability_bp'], 'sickness'=>['Chorobowa pracownika','social_base','sickness_bp']] as $key=>[$label,$base,$bp]) {
            $employee[] = [$label,$formula($key,$money($m[$base]).' × '.$rate($p[$bp]).' (zaokrąglenie do groszy)'),$a[$key]];
        }
        $employee[] = ['Razem składki społeczne',$money($a['pension']).' + '.$money($a['disability']).' + '.$money($a['sickness']),$a['social']];
        $employee[] = ['Podstawa zdrowotnej',$formula('health_base',$money($m['social_base']).' − '.$money($m['social'])),$a['health_base']];
        $employee[] = ['Składka zdrowotna',$formula('health',$money($m['health_base']).' × '.$rate($p['health_bp']).'; nie więcej niż limit '.$money($m['health_ceiling'])),$a['health']];
        if ($a['noncash']) $employee[] = ['Świadczenia niepieniężne','Przychód, bez wypłaty gotówki',$a['noncash']];
        if ($a['ppk_transfer']) $employee[] = ['Przekazane PPK pracodawcy','Przychód PIT w dniu przekazania do instytucji',$a['ppk_transfer']];
        if ($a['exempt_revenue'] ?? 0) $employee[] = ['PIT-0','Przychód objęty wspólnym limitem zwolnień',$a['exempt_revenue']];
        $employee[] = ['Koszty uzyskania przychodu','Koszt podatkowy, nie potrącenie z wypłaty',$a['kup']];
        $employee[] = ['Podstawa PIT',$formula('pit_base',$money($m['tax_revenue']).' − zwolnienie '.$money($m['exempt_revenue'] ?? 0).' − odliczalne składki '.$money($m['deductible_social'] ?? $m['social']).' − KUP '.$money($m['kup']).'; zaokrąglenie do pełnych zł'),$a['pit_base']];
        $employee[] = ['Zaliczka PIT',$formula('pit',$money($m['pit_low_base']).' × '.$rate($p['pit_low_bp']).' + '.$money($m['pit_high_base']).' × '.$rate($p['pit_high_bp']).' − '.$money($m['pit_reduction']).'; zaokrąglenie do pełnych zł'),$a['pit']];
        if ($a['ppk_employee']) $employee[] = ['PPK pracownika',$formula('ppk_employee',$money($m['social_base']).' × '.$rate($c['settings']['ppk_employee_bp'])),$a['ppk_employee']];
        $employee[] = ['Netto do wypłaty',$money($a['cash']).' − '.$money($a['social']).' − '.$money($a['health']).' − '.$money($a['pit']).' − PPK '.$money($a['ppk_employee']),$a['net']];
        $employer = [['Wynagrodzenie brutto','Brutto pieniężne, zawiera potrącenia pracownika',$a['cash']]];
        if ($a['noncash']) $employer[] = ['Świadczenia niepieniężne','Wartość świadczeń finansowanych przez firmę',$a['noncash']];
        foreach ($c['employer_lines'] as $label=>$line) $employer[] = [$label.' pracodawcy',$money($line['base']).' × '.$rate($line['bp']).' (różnica składek miesięcznych po zaokrągleniu)',$line['amount']];
        if ($a['ppk_employer']) $employer[] = ['PPK pracodawcy',$formula('ppk_employer',$money($m['social_base']).' × '.$rate($c['settings']['ppk_employer_bp'])),$a['ppk_employer']];
        $employer[] = ['Całkowity koszt pracodawcy','Brutto + świadczenia niepieniężne + składki i PPK pracodawcy',$c['employer_cost']];
        return compact('employee','employer');
    }
}
