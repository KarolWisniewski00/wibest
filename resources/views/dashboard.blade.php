<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET -->
            <div class="p-6 lg:p-8 mb-8 bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if ($company)
                <div class="bg-gray-800">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 dark:text-white" style='font-family: "Raleway", sans-serif;'>WIBEST SDF </span>| System Do Fakturowania
                        </h1>
                    </div>
                </div>

                <ol class="relative border-l border-gray-600">
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">22 wrzesień 2024 V 1.1.0</time>
                        <h3 class="text-lg font-semibold text-gray-200">Aktualizacja</h3>
                        <p class="text-base font-normal text-gray-200 ">1. [Klient] [Zmiana] Pozycji inputów przy tworzeniu, edycji, podglądzie</p>
                        <p class="text-base font-normal text-gray-200 ">2. [Klient] [Dodanie] Przycisku do pobierania danych o firmie za pomocą nimeru nip w edycji</p>
                        <p class="text-base font-normal text-gray-200 ">3. [Klient] [Naprawa] Braku pokazywania pozostałych danychw inputach w edycji</p>
                        <p class="text-base font-normal text-gray-200 ">4. [Klient] [Dodanie] Informacji o tym który użytkownik stworzył klienta oraz do jakiej firmy należą dane</p>
                        <p class="text-base font-normal text-gray-200 ">5. [Klient] [Dodanie] Wyświetlania numeru NIP</p>
                        <p class="text-base font-normal text-gray-200 ">6. [Ustawienia] [Naprawa] Braku aktualizacji z powodu literówki</p>
                        <p class="text-base font-normal text-gray-200 ">7. [Faktura] [Naprawa] Braku możliwości dodania liczby zmiennoprzecinkowej w tworzeniu faktury</p>
                        <p class="text-base font-normal text-gray-200 ">8. [Faktura] [Naprawa] Braku możliwości podglądu faktury kiedy faktura została utworzona bez wcześniej utworzonego klienta</p>
                        <p class="text-base font-normal text-gray-200 ">9. [Faktura] [zmiana] Pozycji inputów przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-200 ">10. [Faktura] [zmiana] Koloru inputów przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-200 ">11. [Faktura] [zmiana] Podstawiania klienta, usunięto szybkie wybieranie i dodano sugestie do inputa typu text przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-200 ">12. [Faktura] [dodano] Automatyczne liczenie rekordów przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-200 ">13. [Faktura] [dodano] Podsumowanie i Automatyczne liczenie podsumowania przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-200 ">14. [Faktura] [dodano] Podstawianie usług i produktów w pozycjach faktury przy tworzeniu</p>
                        <p class="text-base font-normal text-gray-200 ">15. [Faktura] [zmiana] Ustawienia kolumn w podglądzie faktur, usunięto datę dodano kwotę netto</p>
                        <p class="text-base font-normal text-gray-200 ">16. [Faktura] [dodano] Połaczenie klientów z fakturami poprzez linki w podglądzie i liście faktur</p>
                        <p class="text-base font-normal text-gray-200 ">17. [Faktura] [dodano] Zabezpieczenie podglądu faktur u innych użytkowników</p>
                        <p class="text-base font-normal text-gray-200 ">18. [Klient] [dodano] Zabezpieczenie podglądu Klientów u innych użytkowników</p>

                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-600 rounded-full mt-1.5 -left-1.5 border border-gray-800"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">19 wrzesień 2024 V 1.0.0</time>
                        <h3 class="text-lg font-semibold text-gray-200">Stworzenie projektu</h3>
                    </li>
                </ol>
                @else
                <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-200 border border-yellow-600 rounded-lg bg-yellow-800" role="alert">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Dokończ konfigurację</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm text-gray-300">
                        Brak danych sprzedawcy. Dodaj informacje o firmie. Przejdź do zakładki ustawienia i kliknij zielony plus.
                    </div>
                    <div class="flex">
                        <a href="{{ route('setting.create') }}" class="text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center">
                            Przejdź do konfiguracji
                        </a>
                    </div>
                </div>
                @endif
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
</x-app-layout>