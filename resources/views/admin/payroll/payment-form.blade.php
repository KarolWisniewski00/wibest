<x-team-info-card class="payroll-card payroll-payment-form">
    <div><h2>🧮 Dane do wypłaty</h2><p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-400">Oblicz podgląd przed zapisaniem. Brutto domyślnie obejmuje pozostałą do rozliczenia część miesiąca.</p></div>
    <form method="POST" action="{{ route('raport.payroll.net.preview', $user) }}#payment-preview" class="space-y-6">
        @csrf
        <fieldset class="grid gap-5 sm:grid-cols-2">
            <legend class="mb-4 font-semibold">📅 Okres i kwota</legend>
            <x-payroll.field id="payment-period" label="Okres wynagrodzenia" help="Miesiąc, za który płacisz pracownikowi, np. październik. Nie musi być miesiącem przelewu.">
                <x-input id="payment-period" type="month" name="period" required :value="old('period', $period)" class="payroll-input" aria-describedby="payment-period-help" />
            </x-payroll.field>
            <x-payroll.field id="paid-on" label="Data wypłaty" help="Dzień wypłaty decyduje o roku i miesiącu naliczeń. Przyszła data pozwala wyłącznie na symulację.">
                <x-input id="paid-on" type="date" name="paid_on" required :value="old('paid_on', $input['paid_on'] ?? now('Europe/Warsaw')->toDateString())" class="payroll-input" aria-describedby="paid-on-help" />
            </x-payroll.field>
            @isset($row['target_net'])
                <input type="hidden" name="gross" value="0">
                <p class="payroll-help sm:col-span-2">ℹ️ Umowa netto: <strong>{{ \App\Services\Payroll\Money::display($row['target_net']) }}</strong> za okres. System obliczy potrzebne brutto.</p>
            @else
                <x-payroll.field id="gross" label="Brutto pieniężne tej wypłaty (zł)" help="Kwota przed potrąceniem składek i podatku. Możesz rozliczyć część kwoty; miesiąc będzie rozliczony w całości dopiero po zapisaniu całego brutto.">
                    <x-input id="gross" type="number" step="0.01" min="0" max="99999999.99" name="gross" required :value="old('gross', $input['gross'])" class="payroll-input" aria-describedby="gross-help" />
                </x-payroll.field>
            @endisset
        </fieldset>
        <hr>
        <fieldset class="grid gap-5 border-t border-gray-200 pt-6 dark:border-gray-700 sm:grid-cols-2">
            <legend class="font-semibold">🎁 Dodatkowe składniki</legend>
            <x-payroll.field id="benefit" label="Świadczenia niepieniężne (zł)">
                <x-slot:help>Wartość korzyści otrzymanej zamiast pieniędzy, którą w tym przypadku trzeba w całości objąć składkami i PIT. Wpisanie 100 zł zwiększa podstawy naliczania, ale nie dodaje 100 zł do przelewu pracownika. Jeżeli świadczenie jest zwolnione z części składek lub podatku, to pole nie służy do jego rozliczenia. Gdy nie ma świadczeń, wpisz 0.</x-slot:help>
                <x-input id="benefit" type="number" step="0.01" min="0" max="99999999.99" name="benefit" required :value="old('benefit', $input['benefit'])" class="payroll-input" aria-describedby="benefit-help" />
            </x-payroll.field>
            <x-payroll.field id="ppk-transferred" label="Przekazane wpłaty PPK pracodawcy (zł)">
                <x-slot:help>Kwota finansowana przez firmę, która faktycznie trafiła do PPK w miesiącu wypłaty, najpóźniej w dniu tej wypłaty, i nie została jeszcze uwzględniona w podatku. Np. przekazane 90 zł wpisz jako 90, nie jako procent. To przychód do PIT, a nie gotówka dla pracownika. Samo naliczenie wpłaty nie wystarcza. Jeśli takich przekazanych kwot nie ma, wpisz 0.</x-slot:help>
                <x-input id="ppk-transferred" type="number" step="0.01" min="0" max="99999999.99" name="ppk_transferred" required :value="old('ppk_transferred', $input['ppk_transferred'])" class="payroll-input" aria-describedby="ppk-transferred-help" />
            </x-payroll.field>
        </fieldset>
        <hr>
        <fieldset class="grid gap-5 border-t border-gray-200 pt-6 dark:border-gray-700 sm:grid-cols-2">
            <legend class="font-semibold">🏢 Koszt pracodawcy</legend>
            <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-400 sm:col-span-2">Te dane pozwalają obliczyć koszt firmy ponad wynagrodzenie brutto. Uzyskasz je od kadr lub księgowości. Bez potwierdzonych danych koszt będzie oznaczony jako wymagający uzupełnienia. Zapisana stawka wypadkowa firmy ma pierwszeństwo.</p>
            <x-payroll.field id="accident-percent" label="Wypadkowa (%)">
                <x-slot:help>To składka na ubezpieczenie od wypadków przy pracy i chorób zawodowych, finansowana przez pracodawcę. Poproś księgowość o stopę procentową firmy obowiązującą w miesiącu wypłaty. Możesz ją sprawdzić w kartotece płatnika w ePłatniku lub w zawiadomieniu ZUS w eZUS, jeżeli ZUS ustala ją dla firmy. W pozostałych przypadkach ustala ją płatnik według zasad ZUS. Rok składkowy trwa od kwietnia do marca, więc sprawdź okres obowiązywania. Wpisujesz procent, np. 1,67, tylko jeśli taka stawka dotyczy firmy — nie kwotę w złotych. <a href="https://www.zus.pl/portal/pomoc/stopa_procentowa_sk3adki_na_ub.html" class="underline">Informacja ZUS o stawce w ePłatniku</a>.</x-slot:help>
                <x-input id="accident-percent" type="number" name="accident_percent" min="0.01" max="10" step="0.01" :value="old('accident_percent', $input['accident_percent'] ?? '')" class="payroll-input" aria-describedby="accident-percent-help" />
            </x-payroll.field>
            @foreach(['fp_fs' => ['FP i FS', 'Fundusz Pracy i Fundusz Solidarnościowy. Kadry potwierdzają obowiązek lub zwolnienie dla tego pracownika i miesiąca.'], 'fgsp' => ['FGŚP', 'Fundusz Gwarantowanych Świadczeń Pracowniczych. Sprawdź obowiązek firmy i zwolnienia pracownika osobno od FP/FS.']] as $key => [$label, $help])
                <x-payroll.field :id="$key" :label="$label">
                    <x-slot:help>
                        @if($key === 'fp_fs')
                            Fundusz Pracy i Fundusz Solidarnościowy to fundusze finansowane ze składek pracodawcy. W tym polu nie wpisujesz kwoty ani procentu: wybierasz, czy składki są należne za konkretnego pracownika w miesiącu wypłaty. Poproś kadry lub księgowość o potwierdzenie na podstawie dokumentacji płacowej, podstaw składek i przysługujących zwolnień, np. związanych z wiekiem lub powrotem z urlopu rodzicielskiego. „Należne” oznacza naliczenie składek, a „Zwolnienie / nie dotyczy” — ich pominięcie. Brak wiedzy nie oznacza zwolnienia. <a href="https://www.zus.pl/pracujacy/fundusze-pozaubezpieczeniowe/fp" class="underline">Zasady ZUS dotyczące Funduszu Pracy</a>.
                        @else
                            Fundusz Gwarantowanych Świadczeń Pracowniczych służy ochronie należności pracowników w razie niewypłacalności pracodawcy. Składkę finansuje firma. Kadry lub księgowość powinny potwierdzić, czy firma podlega temu obowiązkowi i czy pracownik nie korzysta ze zwolnienia w miesiącu wypłaty. Na tej podstawie wybierz „Należne” albo „Zwolnienie / nie dotyczy”. Sprawdź FGŚP osobno — nie kopiuj automatycznie wyboru z FP i FS. <a href="https://www.zus.pl/pl/pracujacy/fundusze-pozaubezpieczeniowe/fgsp" class="underline">Obowiązek i zwolnienia według ZUS</a>.
                        @endif
                    </x-slot:help>
                    <select id="{{ $key }}" name="{{ $key }}" class="payroll-input" aria-describedby="{{ $key }}-help"><option value="">Wybierz</option><option value="1" @selected((string)old($key,$input[$key] ?? '') === '1')>Należne</option><option value="0" @selected((string)old($key,$input[$key] ?? '') === '0')>Zwolnienie / nie dotyczy</option></select>
                </x-payroll.field>
            @endforeach
            <label class="payroll-check sm:col-span-2"><input type="checkbox" name="employer_confirmed" value="1" @checked(old('employer_confirmed',$input['employer_confirmed'] ?? false))><span>Potwierdzam dane kosztu firmy: standardowe podstawy składek, brak FEP i szczególnych wyłączeń oraz właściwe zwolnienia FP/FGŚP.</span></label>
        </fieldset>
        <hr>
        <section class="space-y-4">
            <h3 class="font-semibold">🩺 Niska wypłata — ograniczenie składki zdrowotnej</h3>
            <x-payroll.field id="health-legacy" label="Pomniejszenie hipotetycznej zaliczki według zasad 2021">
                <x-slot:help>Pomocnicze wyliczenie do ustalenia maksymalnej składki zdrowotnej przy niskiej wypłacie. Nie oznacza liczenia obecnego PIT według dawnych przepisów. 43,76 zł to historyczne miesięczne pomniejszenie — stosowane tylko wtedy, gdy ten płatnik jest do niego uprawniony. Nie jest to dodatkowe 43,76 zł wypłacane pracownikowi ani obecne PIT-2 300 zł.</x-slot:help>
                <select id="health-legacy" name="health_legacy_reduction_cents" class="payroll-input" aria-describedby="health-legacy-help"><option value="">Pozostaw zapisane ustawienie</option><option value="0" @selected((string)old('health_legacy_reduction_cents',$input['health_legacy_reduction_cents'] ?? '') === '0')>0 zł — ten płatnik nie stosuje</option><option value="4376" @selected((string)old('health_legacy_reduction_cents',$input['health_legacy_reduction_cents'] ?? '') === '4376')>43,76 zł — ten płatnik jest uprawniony</option></select>
            </x-payroll.field>
        </section>
        <hr>
        @if(($settings->first()?->ppk_employee_bp ?? 0) === 50)
            <label class="payroll-check"><input type="checkbox" name="reduced_ppk_month_confirmed" value="1" required @checked(old('reduced_ppk_month_confirmed', $input['reduced_ppk_month_confirmed'] ?? false))><span>Potwierdzam uprawnienie do PPK 0,5%: łączne przychody ze wszystkich źródeł mieszczą się w limicie miesiąca wypłaty, także po przeliczeniu części miesiąca.</span></label>
        @endif
        <x-payroll.info title="Zakres rozliczenia">Formularz obsługuje standardową wypłatę z umowy o pracę. Świadczenia chorobowe, zasiłki, potrącenia komornicze, 50% KUP i szczególne podstawy wymagają odrębnego rozliczenia.</x-payroll.info>
        <label class="payroll-check"><input name="scope_confirmed" type="checkbox" value="1" required @checked(old('scope_confirmed', $input['scope_confirmed'] ?? false))><span>Potwierdzam standardowe zasady wskazanych składników. PPK pracodawcy wpisano według przekazania do instytucji, a nie samego naliczenia.</span></label>
        <div class="flex flex-wrap items-center gap-4"><x-button-neutral type="submit" class="payroll-action"><i class="fas fa-calculator mr-2" aria-hidden="true"></i> Oblicz wypłatę</x-button-neutral><p class="text-sm text-gray-600 dark:text-gray-400">Zobaczysz podgląd. Ten krok jeszcze nie zapisuje rozliczenia.</p></div>
    </form>
</x-team-info-card>
