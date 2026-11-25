@php($currentOpening = $openings->firstWhere('year', (int) $year))
@if($currentOpening)
    <aside role="note" class="relative overflow-hidden rounded-xl border border-green-200 bg-green-50 p-4 text-green-700 dark:border-green-800/40 dark:bg-green-900/20 dark:text-green-300">
        <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></div>
        <div class="relative flex items-center gap-3">
            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-700" aria-hidden="true">✅</div>
            <div><p class="text-xs uppercase tracking-wider opacity-70">Dane początkowe · {{ $year }}</p><p class="mt-1 font-semibold">Salda początkowe zapisane</p><p class="mt-2 text-sm">Historia od {{ $currentOpening->starts_on }}. Kolejne wypłaty WIBEST dolicza automatycznie. Nie uzupełniaj sald ponownie w następnych miesiącach tego roku.</p></div>
        </div>
    </aside>
@else
<details data-animated-config class="payroll-card"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">📅 Dane początkowe roku — uzupełnij przed pierwszym rozliczeniem</summary>
    <aside role="note" aria-labelledby="opening-year-info" class="relative mt-4 overflow-hidden rounded-xl border border-blue-200 bg-blue-50 p-4 text-sm text-blue-700 dark:border-blue-800/40 dark:bg-blue-900/20 dark:text-blue-200">
        <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid fa-circle-info"></i></div>
        <div class="relative flex items-start gap-3">
            <span aria-hidden="true" class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 text-2xl dark:bg-gray-700">ℹ️</span>
            <div class="min-w-0 space-y-2">
                <p id="opening-year-info" class="font-semibold">Nowy rok — nowe salda początkowe 📅</p>
                <p>Jeżeli zaczynasz historię od <strong>1 stycznia 2027</strong>, ustaw tę datę i wpisz <strong>0 zł we wszystkich polach sald</strong>: przed tą datą nie było jeszcze kwot z 2027 roku. Nie przepisuj sum z 2026 roku. Potwierdź także wartości zerowe.</p>
                <p>Od tej daty uwzględnij wszystkie wypłaty styczniowe. <strong>Wynagrodzenie za grudzień wypłacone w styczniu</strong> należy do historii wypłat nowego roku. Jeśli styczniową wypłatę rozliczono już poza WIBEST, samo wpisanie zer nie uzupełni tej historii — potrzebne jest jej odrębne uwzględnienie.</p>
                <p>Salda ustalasz osobno dla każdego pracownika i roku, przed pierwszym rozliczeniem. Przy rozpoczęciu historii w późniejszym miesiącu wpisujesz wcześniejsze kwoty z tego samego roku.</p>
                @if(!config('payroll_net.2027'))
                    <p class="border-t border-blue-200 pt-2 dark:border-blue-800"><strong>Dostępność 2027:</strong> ten przykład wyjaśnia sposób uzupełnienia sald. Zapis danych i obliczenia dla 2027 roku wymagają najpierw dodania parametrów płacowych na ten rok.</p>
                @endif
            </div>
        </div>
    </aside>
    <p class="mt-3 text-sm">To bilans sprzed rozpoczęcia naliczania w WIBEST. Przykład: zaczynasz od lipca — wpisujesz odpowiednie sumy od stycznia do czerwca, aby system wiedział, ile limitów już wykorzystano. Nie wpisujesz tu pensji z umowy ani kwoty netto.</p>
    <p class="mt-3 text-sm">Dochód PIT dotyczy tej firmy; podstawa limitu ZUS i wspólny limit PIT-0 mogą obejmować także inne miejsca pracy. Zera wpisz tylko wtedy, gdy rzeczywiście nie było wcześniejszych kwot. Kolejnych wypłat zapisanych w WIBEST nie dodawaj ponownie.</p>
    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Kolejne zatwierdzone wypłaty WIBEST zlicza automatycznie według daty wypłaty. Salda wpisz raz, przed pierwszą wypłatą miesiąca. Potwierdź także wartości zerowe.</p>
    @foreach($openings as $opening)<p class="mt-3 text-sm">{{ $opening->year }} · historia od {{ $opening->starts_on }} · dochód płatnika {{ \App\Services\Payroll\Money::display($opening->payer_income_cents) }}</p>@endforeach
    <form method="POST" action="{{ route('raport.payroll.opening',$user) }}" class="mt-4 grid gap-5 sm:grid-cols-2">@csrf
        <x-payroll.field id="starts-on" label="Historia od" help="Pierwszy dzień miesiąca, od którego prowadzisz historię wypłat w WIBEST. Wcześniejsze salda obejmują tylko ten sam rok.">
            <x-input id="starts-on" name="starts_on" type="date" required :value="old('starts_on')" class="payroll-input" aria-describedby="starts-on-help" />
        </x-payroll.field>
        @foreach([
            'payer_income' => ['Dochód PIT u tej firmy (zł)', 'Wcześniejszy dochód podatkowy u tego pracodawcy. Przepisz z dokumentacji płacowej — nie jest to suma brutto ani przelewów netto.'],
            'pension_base' => ['Podstawa emerytalno-rentowa (zł)', 'Wcześniejsze podstawy ze wszystkich tytułów, także innych miejsc pracy. Służą do sprawdzenia rocznego limitu składek. Dane potwierdź z kadrami.'],
            'health_legacy_income' => ['Dochód do limitu zdrowotnej według zasad 2021 (zł)', 'Pomocniczy dochód do ograniczenia składki zdrowotnej. Wartość uzyskaj z wcześniejszych naliczeń lub księgowości; nie wpisuj tu dochodu z 2021 roku.'],
            'exempt_revenue' => ['Wykorzystany wspólny limit PIT-0 (zł)', 'Wcześniejsze przychody objęte wspólnym limitem zwolnień PIT-0, także u innych płatników. Jeśli limit nie był wykorzystany, wpisz 0.']
        ] as $key => [$label, $help])
            <x-payroll.field :id="$key" :label="$label" :help="$help">
                <x-input :id="$key" type="number" :name="$key" step="0.01" min="0" required :value="old($key)" class="payroll-input" aria-describedby="{{ $key }}-help" />
            </x-payroll.field>
        @endforeach
        <label class="payroll-check sm:col-span-2"><input name="opening_confirmed" type="checkbox" value="1" required><span>Potwierdzam kompletność sald i brak pominiętych wypłat bieżącego miesiąca. Zapis ustala punkt startowy dla tego pracownika i roku.</span></label>
        <div class="sm:col-span-2"><x-button-neutral type="submit" class="payroll-action"><i class="fas fa-save mr-2" aria-hidden="true"></i> Zapisz dane początkowe</x-button-neutral><p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Zapisujesz historię początkową. Miesiąc rozliczysz osobno po obliczeniu wypłaty.</p></div>
    </form>
</details>
@endif
