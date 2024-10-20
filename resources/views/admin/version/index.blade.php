<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historia wersji') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET -->
            <div class="p-6 lg:p-8 mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if ($company)
                <div class="bg-white dark:bg-gray-800">
                    <a href="{{ route('setting') }}" class="mb-8 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do Ustawień
                    </a>
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-800 dark:text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 dark:text-white" style='font-family: "Raleway", sans-serif;'>WIBEST SDF </span>
                        </h1>
                    </div>
                </div>
                <!--
                Przed wersją 2.0 ogarnąć
                nazewnictwo tax_id i vat_number
                nullable w numerze konta w fakturze
                dodaj waluty MODUŁ WALUTY I JĘZYKI
                dodaj języki MODUŁ WALUTY I JĘZYKI
                dodaj jednostki
                dodać opłacone
                dodać korygujące
                dodać plik jpk
                dodać raporty
                dodac wysyłanie mailem
                dodać paragony MODUŁ KASA FISKALNA
                dodać stan kasy MODUŁ KASA FISKALNA
                dodać stan magazynowy przy edycji i usuwaniu
                dodać role
                dodać filtry
                Na iphone nie działa podpowiadanie przy klawiaturze
                brak alertu przy dodaniu produktu
                -->
                <ol class="relative border-l border-gray-600">
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">20 padździernika 2024 V 1.7.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Ogólnie] [Dodanie] Zakładki Koszta - skończone CRUD</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Wykresy] [Dodanie] Z zakłdadki koszta</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Ogólnie] [Dodanie] OCR tesowego - nie widoczne dla użytkownika</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Ogólnie] [Dodanie] Kolumn jednostek</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Ogólnie] [Dodanie] Zakładki oferta - zaczęte CRUD</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Ogólnie] [Zmiana] Zakładkek produkty i usługi w magazyn</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">7. [Magazyn] [Dodanie] Zakładki zestawy - nie zaczęte CRUD</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">8. [Oferta] [Dodanie] Pobierania</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">13 padździernika 2024 V 1.6.1</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Faktury] [Naprawa] Błednie przekazywanego numeru nip</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">13 padździernika 2024 V 1.6.1</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Produkty] [Naprawa] Pokazywania waluty bez ceny</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Usługi] [Naprawa] Pokazywania waluty bez ceny</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Faktury] [Naprawa] Pokazywania listy według daty wystawienia</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Klienci] [Naprawa] Pokazywania listy według daty wystawienia</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Klienci] [Naprawa] Wyświetlania adresów email</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Faktury] [Dodano] Przycisk do wysyłania faktury na email</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">13 padździernika 2024 V 1.6.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Logowanie] [Dodanie] Logowanie przez google</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Klienci] [Dodanie] Odwrócenie dat w wykresach, teraz po prawej najnowsze</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Wykresy] [Dodanie] Odwrócenie dat w wykresach, teraz po prawej najnowsze</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Faktury] [Naprawa] Sortowania</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Faktury] [Usunięcie] Sugestii</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Faktury] [Naprawa] Wystawiania faktury z datą w wstecz</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">7. [Faktury] [Usunięcie] Tworzenie klienta po utworzeniu faktury</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">12 padździernika 2024 V 1.5.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Produkty] [Dodanie] Stanu magazynowego</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Ogólne] [Zmiana] Poprawki kosmetyczne desing</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Wersje] [Zmiana] Przeniesienie z paska nawigacyjnego do ustawień jako przycisk</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Faktury] [Usunięcie] Filtrów ze względu na miesiąc, słabe rozwiązanie</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Faktury] [Dodanie] Połączenia między produktami i usługami</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Faktury] [Dodanie] Typu faktury proforma</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">7. [Faktury] [Dodanie] Połączenia między fakturą sprzedażową a faktuą proforma</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">8. [Faktury] [Dodanie] Labela odruzniającego proformy od reszty i faktury sprzedażowej na podstawie proformy od reszty</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">9. [Faktury] [Dodanie] Przycisku do utworzenia faktury sprzedażowej na podstawie faktury proforma</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">10. [Faktury] [Dodanie] Automatycznego usuwania stanu magazynowego z prodyktu przy tworzeniu, przy edycji i usuwaniu nic sie nie dzieje</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">11. [Faktury] [Dodanie] Wyszukiwarki ajax za pomocą numeru faktury</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">12. [Faktury] [Dodanie] Zakładek aktualny i poprzedni miesiąc</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">13. [Faktury] [Dodanie] Informacji w tabeli i liście o miesiącu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">14. [Faktury] [Dodanie] Na urządzeniach mobilnych przyczepione info o tym gdzie jesteś</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">15. [Klient] [Dodanie] Wykresów</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">16. [Klient] [Dodanie] Podsumowania</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">9 padździernika 2024 V 1.4.1</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Ogólne] [Naprawa] Wyglądu, zmiana rozmiaru czcionek i ułożenia elementów w show</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Faktury] [Dodanie] wyszukiwarki za pomocą filtrów</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">6 padździernika 2024 V 1.4.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Ogólne] [Naprawa] Wyglądu mobilnego</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Faktura] [Naprawa] Pozbycie sie unikalnego numeru faktury, koliduje z innymi użytkownikami</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Wykresy] [Dodanie] Dodanie wykresów</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Ogólne] [Dodanie] Informacji o tym który użytkownik stworzył usługę, produkt, fakturę</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Ogólne] [Naprawa] Wyświetlania informacji desing</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Klient] [Dodnie] Wyświetlania podglądu faktur</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">6 padździernika 2024 V 1.4.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Ogólne] [Naprawa] Wyglądu mobilnego</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Faktura] [Naprawa] Pozbycie sie unikalnego numeru faktury, koliduje z innymi użytkownikami</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Wykresy] [Dodanie] Dodanie wykresów</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Ogólne] [Dodanie] Informacji o tym który użytkownik stworzył usługę, produkt, fakturę</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Ogólne] [Naprawa] Wyświetlania informacji desing</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Klient] [Dodnie] Wyświetlania podglądu faktur</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">6 padździernika 2024 V 1.3.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Ogólne] [Zmiana] Wyglądu mobilnego</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Faktura] [Naprawa] Edycji</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Faktura] [Naprawa] W edycji i tworzeniu wyliczanie podsumowania</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Klient] [Dodanie] Przycisku do tworzenia faktury</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Klient] [Naprawa] Wymuszanie podanie nieobowiązkowych pól w edycji usunięto</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Klient] [Naprawa] Błędu podczas zapisywania klienta gdy inny użytkownik już go zapisał</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">29 wrzesień 2024 V 1.2.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Usługa] [Naprawa] Braku zapisywania usługi</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Produkt] [Naprawa] Braku zapisywania produktu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Faktura] [Naprawa] Braku zapisywania nowej faktury gdy nie ma numeru konta</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Faktura] [Naprawa] Braku pokazywania uwag w fakturze</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Faktura] [Dodanie] Pokazania kwoty słownie w fakturze</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Faktura] [Dodanie] Pokazania napisu "Faktura wystawiona w wibest.pl"</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">7. [Faktura] [Zmiana] Wyświetlania nazw i adresów nabywcy i sprzedawcy w fakturze</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">8. [Faktura] [Naprawa] Podstawiania adresu po klieknięciu przycisku pobierającego dane płatnika VAT w tworzeniu faktury</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">9. [Faktura] [Usunięcie] Wyświetlania terminu sprzedaży"</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">10. [Faktura] [Doanie] Automatycznego zapisu nowego klienta i/lub połącznie klienta z istniejacym na podstawie numeru nip</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">11. [Wykresy] [Doanie] Statystyk</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">22 wrzesień 2024 V 1.1.1</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Ogólna] [Zmiana] Optymalizacja kontrollerów</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Ogólna] [Zmiana] Optymalizacja JS</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Ogólna] [Dodanie] Zabezpieczeń odczytu danych między użytkownikami</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Ogólna] [Dodanie] Alertów typu toast</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">22 wrzesień 2024 V 1.1.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">1. [Klient] [Zmiana] Pozycji inputów przy tworzeniu, edycji, podglądzie</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">2. [Klient] [Dodanie] Przycisku do pobierania danych o firmie za pomocą nimeru nip w edycji</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">3. [Klient] [Naprawa] Braku pokazywania pozostałych danychw inputach w edycji</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">4. [Klient] [Dodanie] Informacji o tym który użytkownik stworzył klienta oraz do jakiej firmy należą dane</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">5. [Klient] [Dodanie] Wyświetlania numeru NIP</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">6. [Ustawienia] [Naprawa] Braku aktualizacji z powodu literówki</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">7. [Faktura] [Naprawa] Braku możliwości dodania liczby zmiennoprzecinkowej w tworzeniu faktury</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">8. [Faktura] [Naprawa] Braku możliwości podglądu faktury kiedy faktura została utworzona bez wcześniej utworzonego klienta</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">9. [Faktura] [zmiana] Pozycji inputów przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">10. [Faktura] [zmiana] Koloru inputów przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">11. [Faktura] [zmiana] Podstawiania klienta, usunięto szybkie wybieranie i dodano sugestie do inputa typu text przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">12. [Faktura] [dodano] Automatyczne liczenie rekordów przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">13. [Faktura] [dodano] Podsumowanie i Automatyczne liczenie podsumowania przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">14. [Faktura] [dodano] Podstawianie usług i produktów w pozycjach faktury przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">15. [Faktura] [zmiana] Ustawienia kolumn w podglądzie faktur, usunięto datę dodano kwotę netto</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">16. [Faktura] [dodano] Połaczenie klientów z fakturami poprzez linki w podglądzie i liście faktur</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">17. [Faktura] [dodano] Zabezpieczenie podglądu faktur u innych użytkowników</p>
                        <p class="text-base font-normal text-gray-800 dark:text-gray-200 ">18. [Klient] [dodano] Zabezpieczenie podglądu Klientów u innych użytkowników</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">19 wrzesień 2024 V 1.0.0</time>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Stworzenie projektu</h3>
                    </li>
                </ol>
                @else
                @include('admin.elements.end_config')
                @endif
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
</x-app-layout>