@php($tables = app(\App\Services\Payroll\PaymentBreakdown::class)->tables($calculation))
@foreach(['employee'=>'Wynagrodzenie pracownika','employer'=>'Całkowity koszt pracodawcy'] as $key=>$title)
<h3 class="mt-6 text-lg font-semibold">{{ $title }}</h3>
@if($key === 'employer' && $calculation['employer_cost'] === null)<p class="mt-3 text-sm text-amber-700 dark:text-amber-300">Uzupełnij dane ubezpieczeń pracodawcy za miesiąc wypłaty. Brak danych nie oznacza zerowego kosztu.</p>@endif
<div class="mt-4 overflow-x-auto"><table class="w-full text-left text-sm"><thead><tr><th class="p-3">Krok</th><th class="p-3">Obliczenie</th><th class="p-3 text-right">Wynik</th></tr></thead><tbody>
@foreach($tables[$key] as [$label,$formula,$amount])<tr class="odd:bg-gray-50 dark:odd:bg-gray-900"><td class="p-3 font-medium">{{ $label }}</td><td class="p-3 text-gray-500 dark:text-gray-400">{{ $formula }}</td><td class="p-3 whitespace-nowrap text-right font-semibold">{{ $amount === null ? 'Wymaga danych' : \App\Services\Payroll\Money::display($amount) }}</td></tr>@endforeach
</tbody></table></div>
@endforeach
