<x-app-layout>
    @include('admin.elements.alerts')
    @if ($company)
    <div class="p-4">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <!-- WIDGET TASK -->
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <!-- Napis z przyciskiem tworzenia -->
                        <x-h1-display>
                            Ustawienia
                        </x-h1-display>
                        @if ($company)
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                            <div class="flex flex-col gap-4 w-full h-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                                <div class="flex flex-col md:grid md:gap-4 py-4 border-b border-gray-100 dark:border-gray-700">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Nazwa
                                    </p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                        <a href="{{route('setting')}}" class="inline-flex items-center text-blue-300 dark:text-blue-300 font-semibold text-xl uppercase tracking-widest hover:text-blue-700 dark:hover:text-blue-300 transition ease-in-out duration-150">
                                            <span class="mr-2 inline-flex p-2 items-center bg-blue-300 dark:bg-blue-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                                ORG
                                            </span>
                                            {{$company->name}}
                                        </a>
                                        <input type="hidden" value="{{$company->id}}" name="company_id">
                                        <input type="hidden" value="{{$company->name}}" name="seller_name">
                                    </p>
                                </div>
                                <div class="flex flex-col md:grid md:gap-4 py-4 border-b border-gray-100 dark:border-gray-700">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Adres
                                    </p>
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{$company->adress}}
                                        <input type="hidden" value="{{$company->adress}}" name="seller_adress">
                                    </p>
                                </div>
                                <div class="flex flex-col md:grid md:gap-4 py-4 border-b border-gray-100 dark:border-gray-700">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        NIP
                                    </p>
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{$company->vat_number}}
                                        <input type="hidden" value="{{$company->vat_number}}" name="seller_vat_number">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-end space-x-4">
                            @if ($company)
                            @if($role == 'admin')
                            <a href="{{route('setting.edit', $company)}}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-400 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                <i class="fa-regular fa-pen-to-square mr-2"></i>Edytuj
                            </a>
                            @endif
                            @endif
                            <!-- Green button for marking as completed -->
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
            </div>
            <!-- END WIDGET TASK -->
        </div>
    </div>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>