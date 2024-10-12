<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ustawienia') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET TASK -->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Ustawienia SDF
                        </h1>
                        @if ($company)
                        <a href="{{route('setting.edit', $company)}}" class="mt-8 mb-4 inline-flex items-center justify-center w-10 h-10 mr-2 text-indigo-100 transition-colors duration-150 bg-indigo-500 rounded-full focus:shadow-outline hover:bg-indigo-600">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        @else
                        <a href="{{route('setting.create')}}" class="mt-8 mb-4 inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        @endif
                    </div>

                    @if ($company)
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Moja firma</h3>
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700 mt-6">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Nazwa</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $company->name }}
                                </p>
                            </div>
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                    Adres
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $company->adress }}
                                </p>
                            </div>
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                    NIP
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $company->vat_number }}
                                </p>
                            </div>
                            <div class="md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                    Numer konta bankowego
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $company->bank }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Dokończ konfigurację</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Brak danych sprzedawcy. Dodaj informacje o firmie. Przejdź do zakładki ustawienia i kliknij zielony plus
                        </div>
                        <div class="flex">
                            <a href="{{route('setting.create')}}" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                Przejdź do konfiguracji
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- END WIDGET TASK -->
        </div>
    </div>
</x-app-layout>