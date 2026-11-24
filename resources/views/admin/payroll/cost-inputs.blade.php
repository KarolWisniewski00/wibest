@if(($row['contract']['type'] ?? '') === 'employment' && !$row['saved_at'])
<details class="mt-6"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">🏢 Dane do szacowanego kosztu pracodawcy</summary>
    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Dla standardowego zatrudnienia w Polsce, bez FEP, szczególnych podstaw i wyłączeń składkowych. Podaj podstawę emerytalno-rentową od początku roku ze wszystkich tytułów, przed tym miesiącem. Ustal obowiązek FP/FS i FGŚP z uwzględnieniem wieku, zwolnień i innych tytułów.</p>
    @if($errors->any())<ul class="my-3 text-red-600">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>@endif
    <form method="POST" action="{{ route('raport.payroll.cost-inputs', $user) }}" class="mt-4 grid gap-4 sm:grid-cols-2">
        @csrf<input type="hidden" name="month" value="{{ $month->format('Y-m') }}">
        @foreach(['pension_base_before_month' => 'Podstawa emerytalno-rentowa przed miesiącem (zł)', 'accident_percent' => 'Składka wypadkowa (%)', 'ppk_percent' => 'PPK pracodawcy (%) — 0 przy braku obowiązku'] as $field => $label)
        @php($help = match($field) {
            'pension_base_before_month' => 'Suma podstaw emerytalno-rentowych od początku roku do końca poprzedniego miesiąca, ze wszystkich tytułów. Uzyskaj ją z dokumentacji płacowej.',
            'accident_percent' => 'Stopa firmy obowiązująca w tym miesiącu. Sprawdź ją u księgowości, w ePłatniku lub zawiadomieniu ZUS; 1,67% nie dotyczy każdej firmy.',
            'ppk_percent' => 'Procent wpłaty finansowanej przez firmę, potwierdzony w dokumentacji PPK. To stawka do szacowania kosztu, nie kwota przekazana do instytucji.'
        })
        <x-payroll.field :id="'cost-'.$field" :label="$label" :help="$help">
            <x-input :id="'cost-'.$field" :name="$field" type="number" step="0.01" min="0" required :value="old($field, $row['cost_input'][$field] ?? '')" class="payroll-input" aria-describedby="cost-{{ $field }}-help" />
        </x-payroll.field>
        @endforeach
        @foreach(['fp_fs' => 'FP i FS', 'fgsp' => 'FGŚP'] as $field => $label)
        <x-payroll.field :id="'cost-'.$field" :label="$label" :help="$field === 'fp_fs' ? 'Fundusz Pracy i Fundusz Solidarnościowy. Kadry potwierdzają obowiązek lub zwolnienie pracownika w tym miesiącu.' : 'Fundusz Gwarantowanych Świadczeń Pracowniczych. Księgowość ustala obowiązek firmy i zwolnienia pracownika; sprawdź osobno od FP/FS.'">
            <select id="cost-{{ $field }}" name="{{ $field }}" required class="payroll-input" aria-describedby="cost-{{ $field }}-help"><option value="">Wybierz obowiązek</option><option value="1" @selected((string) old($field, $row['cost_input'][$field] ?? '') === '1')>Należne</option><option value="0" @selected((string) old($field, $row['cost_input'][$field] ?? '') === '0')>Zwolnienie / brak obowiązku</option></select>
        </x-payroll.field>
        @endforeach
        <label class="payroll-check sm:col-span-2"><input type="checkbox" name="standard_employment_confirmed" value="1" required><span>Potwierdzam standardowy zakres ubezpieczeń, brak FEP i szczególnych wyłączeń oraz sprawdzenie danych za ten miesiąc.</span></label>
        <div class="sm:col-span-2"><x-button-neutral type="submit" class="payroll-action"><i class="fas fa-save mr-2" aria-hidden="true"></i> Zapisz dane kosztu</x-button-neutral><p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Aktualizuje szacunek kosztu. Nie zapisuje wypłaty i nie oznacza miesiąca jako rozliczony.</p></div>
    </form>
</details>
@endif
