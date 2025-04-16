<div class="p-4">
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if($invitation && $invitation = $invitation->first())
                <div class="p-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300" role="alert">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Wysłano</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Wysłano zaproszenie do {{$invitation->company->name}}. Oczekuj na akceptację administratora.
                    </div>
                </div>
                @else
                <div class="p-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Dokończ konfigurację</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Brak danych sprzedawcy. Dodaj informacje o firmie.
                    </div>
                    <div class="flex">
                        <x-button-link-yellow href="{{route('setting.create')}}">
                            Przejdź do konfiguracji
                        </x-button-link-yellow>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>