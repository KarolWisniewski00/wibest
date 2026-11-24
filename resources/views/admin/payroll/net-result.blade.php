@php($a = $calculation['amounts'])
<section class="payroll-card">
    @isset($savedPayment)
        <div class="relative h-full overflow-hidden rounded-xl border border-green-200 bg-green-50 p-4 text-green-700 dark:border-green-800/40 dark:bg-green-900/20 dark:text-green-300" role="status">
            <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></div>
            <div class="relative flex flex-wrap items-center gap-3">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-700/20" aria-hidden="true"><i class="fa-solid fa-circle-check text-lg sm:text-2xl"></i></div>
                <div class="min-w-0 flex-1">
                    <div class="text-xs uppercase tracking-wider opacity-70">Status rozliczenia</div>
                    <h2 class="mt-1 font-semibold">Zapisane rozliczenie</h2>
                    <p class="mt-1 text-sm leading-relaxed">Dane tej wypłaty są zapisane. Pasek wypłaty jest dostępny do pobrania w PDF.</p>
                    <p class="mt-1 text-sm">Okres: {{ \Carbon\Carbon::parse($calculation['period'])->locale('pl')->translatedFormat('F Y') }} · Wypłata: {{ \Carbon\Carbon::parse($calculation['paid_on'])->format('d.m.Y') }}</p>
                    <p class="mt-1 text-sm">Zapisano: {{ $savedPayment->created_at->format('d.m.Y H:i:s') }}</p>
                </div>
                <div class="text-sm tabular-nums"><p>Zapisane brutto</p><p class="mt-1 text-lg font-semibold">{{ \App\Services\Payroll\Money::display($a['cash']) }}</p></div>
            </div>
        </div>
    @else
        <h2>{{ $calculation['status'] === 'Symulacja' ? '🧾 Podgląd wypłaty' : '✅ Zapisane rozliczenie' }}</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $calculation['status'] }} · okres {{ $calculation['period'] }} · wypłata {{ $calculation['paid_on'] }}</p>
    @endisset
    <dl class="mt-5 mb-7 grid gap-5 sm:grid-cols-2 xl:grid-cols-4 [&>div]:rounded-xl [&>div]:bg-gray-50 [&>div]:p-4 dark:[&>div]:bg-gray-700">
        <div><dt class="text-sm text-gray-500 dark:text-gray-400">Wynagrodzenie brutto</dt><dd class="mt-2 text-xl font-semibold">{{ \App\Services\Payroll\Money::display($a['cash']) }}</dd></div>
        <div><dt class="text-sm text-gray-500 dark:text-gray-400">Do wypłaty pracownikowi</dt><dd class="mt-2 text-xl font-semibold text-green-700 dark:text-green-300">{{ \App\Services\Payroll\Money::display($a['net']) }}</dd></div>
        <div><dt class="text-sm text-gray-500 dark:text-gray-400">Składki i wpłaty pracodawcy</dt><dd class="mt-2 text-xl font-semibold">{{ $calculation['employer_cost'] === null ? 'Wymaga danych' : \App\Services\Payroll\Money::display($calculation['employer_cost'] - $a['cash'] - $a['noncash']) }}</dd></div>
        <div><dt class="text-sm text-gray-500 dark:text-gray-400">Całkowity koszt zatrudnienia</dt><dd class="mt-2 text-xl font-semibold">{{ $calculation['employer_cost'] === null ? 'Wymaga danych' : \App\Services\Payroll\Money::display($calculation['employer_cost']) }}</dd></div>
    </dl>
    @if($calculation['assumptions'])<ul class="mt-5 space-y-2 rounded-xl bg-amber-50 p-4 text-amber-900 dark:bg-gray-700 dark:text-amber-200">@foreach($calculation['assumptions'] as $assumption)<li>{{ $assumption }}</li>@endforeach</ul>@endif
    @isset($calculation['target_net'])<p class="mt-4 text-sm">Netto z umowy: {{ \App\Services\Payroll\Money::display($calculation['target_net']) }}. Brutto ustalono dla tej daty wypłaty i wykorzystanych limitów. Ewentualna różnica groszowa wynika z zaokrągleń.</p>@endisset
    @include('admin.payroll.calculation-tables')
    <p class="mt-5 text-sm text-gray-500 dark:text-gray-400">Przy kilku wypłatach w miesiącu obliczenia uwzględniają już pobrane składki i PIT. KUP i pomniejszenie PIT nie są stosowane ponownie w pełnej kwocie. Składki pracownika są zawarte w brutto i nie zwiększają ponownie kosztu firmy.</p>
    <details class="mt-6"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Limity narastająco i parametry</summary>
        <p class="mt-3 text-sm">Dochód PIT u tego płatnika przed miesiącem: {{ \App\Services\Payroll\Money::display($calculation['year_before_month']['payer_income_cents']) }}. Podstawa składek emerytalno-rentowych: {{ \App\Services\Payroll\Money::display($calculation['year_before_month']['pension_base_cents']) }}.</p>
        <p class="mt-3 text-sm">{{ $calculation['parameters']['version'] }} · ustawienia #{{ $calculation['settings']['id'] ?? '—' }}</p>
    </details>
</section>
