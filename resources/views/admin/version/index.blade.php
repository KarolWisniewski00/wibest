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
                dodać proformy
                dodać plik jpk
                dodać raporty
                dodac wysyłanie mailem
                dodać paragony MODUŁ KASA FISKALNA
                dodać stan kasy MODUŁ KASA FISKALNA
                dodać stan magazynowy do produktów
                dodać role
                dodać logowanie przez google
                dodać filtry
                -->
                <ol class="relative border-l border-gray-600">
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