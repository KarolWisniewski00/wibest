<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Podgląd elementu RCP w którego skład wchodzą dwa mniejsze zdarzenia START i STOP.
            </div>
            @if($role == 'admin')
            @if($work_session->status != 'Praca zakończona')
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">Ostrzeżenie!</span> Edycja nie jest możliwa, ponieważ sesja pracy jeszcze nie została zakończona.
            </div>
            @endif
            @endif
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav />

        <!--CONTENT-->
        <div class="px-4 py-5 sm:px-6 lg:px-8">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('rcp.work-session.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->
            <x-container-gray class="px-0">
                <!--status-->
                <x-text-cell class="mx-2">
                    <p class="text-gray-700 dark:text-gray-300 test-sm mx-2">
                        Status
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <x-RCP.work-session-status :work_session="$work_session" class="text-xl m-0 p-0" />
                    </div>
                </x-text-cell>
                <!--status-->
                <!--Czas w pracy-->
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Czas w pracy
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            {{ $work_session->time_in_work }}
                        </span>
                    </div>
                </x-text-cell>
                <!--Czas w pracy-->
                @if($role == 'admin')
                <!--Użytkownik-->
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Użytkownik
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <span class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            @if($work_session->user->profile_photo_url)
                            <img src="{{ $work_session->user->profile_photo_url }}" alt="{{ $work_session->user->name }}" class="w-10 h-10 rounded-full">
                            @else
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                {{ strtoupper(substr($work_session->user->name, 0, 1)) }}
                            </div>
                            @endif
                            {{ $work_session->user->name }}
                            @if($work_session->user->role == 'admin')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Admin
                            </span>
                            @elseif($work_session->user->role == 'menedżer')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Menedżer
                            </span>
                            @elseif($work_session->user->role == 'kierownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Kierownik
                            </span>
                            @elseif($work_session->user->role == 'użytkownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Użytkownik
                            </span>
                            @endif
                        </span>
                    </div>
                </x-text-cell>
                <!--Użytkownik-->
                @endif
            </x-container-gray>
            <div class="grid grid-cols-2 mt-4 gap-4">
                @if($work_session->eventStart != null)
                <x-container-gray class="px-0">
                    <!--status-->
                    <x-text-cell class="mx-4">
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Zdarzenie
                        </p>
                        <div class="flex justify-start items-center w-full justify-start">
                            @if($work_session->eventStart->event_type == 'stop')
                            <span class="inline-flex items-center text-red-500 dark:text-red-300 font-semibold text-xl uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
                                Stop
                            </span>
                            @endif
                            @if($work_session->eventStart->event_type == 'start')
                            <span class="inline-flex items-center text-green-300 dark:text-green-300 font-semibold text-xl uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
                                Start
                            </span>
                            @endif
                        </div>
                    </x-text-cell>
                    <!--status-->
                    <!--Czas w pracy-->
                    <x-text-cell class="mx-4">
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Czas
                        </p>
                        <div class="flex justify-start items-center w-full justify-start">
                            <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                {{ $work_session->eventStart->time }}
                            </span>
                        </div>
                    </x-text-cell>
                    <!--Czas w pracy-->
                    <!-- Dodaj Leaflet CSS i JS oraz jQuery -->
                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    @if($work_session->eventStart->location)
                    <!--Lokalizacja-->
                    <x-text-cell class="mx-4">
                        <div id="map" style="height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;"></div>
                    </x-text-cell>
                    <!--Lokalizacja-->

                    <script>
                        $(document).ready(function() {
                            const map = L.map('map').setView([{{$work_session->eventStart->location->latitude}}, {{$work_session->eventStart->location->longitude}}], 13); // Warszawa

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(map);

                            L.marker([{{$work_session->eventStart->location->latitude}}, {{$work_session->eventStart->location->longitude}}]).addTo(map)
                        });
                    </script>
                    @endif
                </x-container-gray>
                @endif
                @if($work_session->eventStop != null)
                <x-container-gray class="px-0">
                    <!--status-->
                    <x-text-cell class="mx-4">
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Zdarzenie
                        </p>
                        <div class="flex justify-start items-center w-full justify-start">
                            @if($work_session->eventStop->event_type == 'stop')
                            <span class="inline-flex items-center text-red-500 dark:text-red-300 font-semibold text-xl uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
                                Stop
                            </span>
                            @endif
                            @if($work_session->eventStop->event_type == 'start')
                            <span class="inline-flex items-center text-green-300 dark:text-green-300 font-semibold text-xl uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
                                Start
                            </span>
                            @endif
                        </div>
                    </x-text-cell>
                    <!--status-->
                    <!--Czas w pracy-->
                    <x-text-cell class="mx-4">
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Czas
                        </p>
                        <div class="flex justify-start items-center w-full justify-start">
                            <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                {{ $work_session->eventStop->time }}
                            </span>
                        </div>
                    </x-text-cell>
                    <!--Czas w pracy-->
                    @if($work_session->eventStop->location)
                    <!--Lokalizacja-->
                    <x-text-cell class="mx-4">
                        <div id="map2" style="height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;"></div>
                    </x-text-cell>
                    <!--Lokalizacja-->
                    
                    <script>
                        $(document).ready(function() {
                            const map2 = L.map('map2').setView([{{$work_session->eventStop->location->latitude}}, {{$work_session->eventStop->location->longitude}}], 13); // Warszawa

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(map2);

                            L.marker([{{$work_session->eventStop->location->latitude}}, {{$work_session->eventStop->location->longitude}}]).addTo(map2)
                        });
                    </script>
                    @endif
                </x-container-gray>
                @endif
            </div>
            <div class="flex justify-end mt-4">
                @if($role == 'admin')
                @if($work_session->status == 'Praca zakończona')
                <x-button-link-cello href="{{route('rcp.work-session.edit', $work_session)}}" class="text-lg mr-2">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edycja
                </x-button-link-cello>
                @endif
                <form action="{{route('rcp.work-session.delete', $work_session)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="min-h-[34px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-trash mr-2"></i> USUŃ
                    </button>
                </form>
                @endif
            </div>
            <x-label class="my-2">
                Utworzono {{ $work_session->created_at }}
            </x-label>
            <x-label class="my-2">
                Utoworzono przez {{ $work_session->created_user->name }}
            </x-label>
            <x-label class="my-2">
                Ostatnia aktualizacja {{ $work_session->updated_at }}
            </x-label>
        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>