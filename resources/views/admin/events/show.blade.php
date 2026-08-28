<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            <li>
                <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                    Podgląd elementu zdarzenia START lub STOP który jest częścią elementu RCP
                </div>
            </li>
        </x-sidebar-left>
        <!--SIDE BAR-->

        <!--MAIN-->
        <!--MAIN-->
        <x-main>
            <x-RCP.nav :countEvents="$countEvents" />

            <!--CONTENT-->
            <div class="p-4">
                <!--POWRÓT-->
                <x-button-link-back href="{{ route('rcp.event.index') }}" class="text-lg mb-4">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                </x-button-link-back>
                <!--POWRÓT-->
                @if($event->event_type == 'start')
                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                    <x-container-gray>
                        <!--status-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Zdarzenie
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-green>
                                        🟢 Start
                                    </x-status-green>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--status-->
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-cello>
                                        📅
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('d.m.Y H:i:s') ?? '' }}
                                    </x-status-cello>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        @if($event->location)
                            <!--Lokalizacja-->
                            <x-text-cell>
                                <x-text-cell-label>
                                    Lokalizacja
                                </x-text-cell-label>
                                <div id="map_start"
                                    style="z-index:1; height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;"></div>
                            </x-text-cell>
                            <!--Lokalizacja-->
                            <input type="hidden" id="latitude_start" value="{{$event->location->latitude}}">
                            <input type="hidden" id="longitude_start" value="{{$event->location->longitude}}">
                            <script>
                                $(document).ready(function () {
                                    // 1. Odczytanie danych z ukrytych inputów
                                    const latitude = $('#latitude_start').val();
                                    const longitude = $('#longitude_start').val();

                                    // Konwersja na liczby zmiennoprzecinkowe jest często bezpieczna
                                    const lat = parseFloat(latitude);
                                    const lon = parseFloat(longitude);

                                    // Sprawdzenie, czy dane zostały poprawnie odczytane (opcjonalne, ale zalecane)
                                    if (isNaN(lat) || isNaN(lon)) {
                                        console.error('Nie udało się odczytać prawidłowych współrzędnych z ukrytych pól.');
                                        return; // Przerwij działanie, jeśli dane są nieprawidłowe
                                    }

                                    // 2. Inicjalizacja mapy Leaflet
                                    const map = L.map('map_start').setView([lat, lon], 13);

                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                                    const greenIcon = L.icon({
                                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                                        iconSize: [25, 41],
                                        iconAnchor: [12, 41],
                                        popupAnchor: [1, -34],
                                        shadowSize: [41, 41]
                                    });
                                    L.marker([lat, lon], {
                                        icon: greenIcon
                                    }).addTo(map);
                                });
                            </script>
                        @endif
                    </x-container-gray>
                @endif
                @if($event->event_type == 'stop')
                    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                    <x-container-gray>
                        <!--status-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Zdarzenie
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-red>
                                        🔴 Stop
                                    </x-status-red>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--status-->
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-cello>
                                        📅
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('d.m.Y H:i:s') ?? '' }}
                                    </x-status-cello>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        @if($event->location)
                            <!--Lokalizacja-->
                            <x-text-cell>
                                <x-text-cell-label>
                                    Lokalizacja
                                </x-text-cell-label>
                                <div id="map_stop"
                                    style="z-index:1; height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;"></div>
                            </x-text-cell>
                            <!--Lokalizacja-->
                            <input type="hidden" id="latitude_stop" value="{{$event->location->latitude}}">
                            <input type="hidden" id="longitude_stop" value="{{$event->location->longitude}}">
                            <script>
                                $(document).ready(function () {
                                    // 1. Odczytanie danych z ukrytych inputów
                                    const latitude = $('#latitude_stop').val();
                                    const longitude = $('#longitude_stop').val();

                                    // Konwersja na liczby zmiennoprzecinkowe jest często bezpieczna
                                    const lat = parseFloat(latitude);
                                    const lon = parseFloat(longitude);

                                    // Sprawdzenie, czy dane zostały poprawnie odczytane (opcjonalne, ale zalecane)
                                    if (isNaN(lat) || isNaN(lon)) {
                                        console.error('Nie udało się odczytać prawidłowych współrzędnych z ukrytych pól.');
                                        return; // Przerwij działanie, jeśli dane są nieprawidłowe
                                    }

                                    // 2. Inicjalizacja mapy Leaflet
                                    const map = L.map('map_stop').setView([lat, lon], 13);

                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                                    const redIcon = L.icon({
                                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                                        iconSize: [25, 41],
                                        iconAnchor: [12, 41],
                                        popupAnchor: [1, -34],
                                        shadowSize: [41, 41]
                                    });
                                    L.marker([lat, lon], {
                                        icon: redIcon
                                    }).addTo(map);
                                });
                            </script>
                        @endif
                    </x-container-gray>
                @endif
                @if($event->event_type == 'task')
                    <x-container-gray class="md:col-span-2">
                        <x-text-cell>
                            <x-text-cell-label>
                                Zdarzenie
                            </x-text-cell-label>
                            <x-status-gray class="text-2xl">
                                🎯 Zadanie
                            </x-status-gray>
                        </x-text-cell>
                        @if($event->status != null)
                            <x-text-cell>
                                <x-text-cell-label>
                                    Status
                                </x-text-cell-label>
                                @if($event->status == 'oczekujące')
                                    <x-status-yellow class="text-2xl">
                                        🟡 {{ $event->status }}
                                    </x-status-yellow>
                                @elseif($event->status == 'zaakceptowane')
                                    <x-status-green class="text-2xl">
                                        🟢 {{ $event->status }}
                                    </x-status-green>
                                @elseif($event->status == 'odrzucone')
                                    <x-status-red class="text-2xl">
                                        🔴{{ $event->status }}
                                    </x-status-red>
                                @endif
                            </x-text-cell>
                        @endif
                        <x-text-cell>
                            <x-text-cell-label>
                                Treść
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <div
                                    class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                                    {!! $event->note !!}
                                </div>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-cello>
                                        📅
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('d.m.Y H:i:s') ?? '' }}
                                    </x-status-cello>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        @if($event->note != null)
                            @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                                @if($event->status == 'oczekujące')
                                    <x-button-link-green href="{{ route('rcp.event.accept', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-check mr-2"></i>Akceptuj
                                    </x-button-link-green>
                                    <x-button-link-red href="{{ route('rcp.event.reject', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                                    </x-button-link-red>
                                @endif
                                @if($event->status == 'odrzucone')
                                    <x-button-link-green href="{{ route('rcp.event.accept', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-check mr-2"></i>Akceptuj
                                    </x-button-link-green>
                                @endif
                                @if($event->status == 'zaakceptowane')
                                    <x-button-link-red href="{{ route('rcp.event.reject', $event) }}" class="text-lg">
                                        <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                                    </x-button-link-red>
                                @endif
                            @endif
                        @endif
                    </x-container-gray>
                @endif

                <x-label class="py-2 mt-4">
                    Utworzono
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->created_at)->format('d.m.Y H:i:s') ?? '' }}
                </x-label>
                <x-label class="py-2">
                    Utoworzono przez {{ $event->created_user->name }}
                </x-label>
                <x-label class="py-2">
                    Ostatnia aktualizacja
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->updated_at)->format('d.m.Y H:i:s') ?? '' }}
                </x-label>
                <x-label class="py-2">
                    Historia zmian
                </x-label>
                <section>
                    <div class="max-w-2xl flex flex-col gap-4">
                        @foreach($logs as $log)
                            @php
                                $new = $log->properties['attributes'] ?? [];
                                $old = $log->properties['old'] ?? [];
                            @endphp
                            <x-container-gray>
                                <footer class="flex justify-between items-center mb-2">
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-1 font-semibold uppercase tracking-widest">
                                            <x-user-photo :user="$log->causer" />
                                            <x-user-name :user="$log->causer" />
                                        </div>

                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $log->created_at->locale('pl')->diffForHumans() }}
                                        </p>
                                    </div>
                                </footer>

                                <div class="text-gray-700 dark:text-gray-300 text-sm space-y-1">
                                    @foreach($new as $field => $value)
                                        <div>
                                            <span class="font-semibold">{{ $field }}:</span>

                                            <span class="text-red-300 line-through mr-2">
                                                {{ $old[$field] ?? '-' }}
                                            </span>

                                            <span class="text-green-300">
                                                {{ $value }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </x-container-gray>
                        @endforeach
                    </div>
                </section>
            </div>
            <!--CONTENT-->
        </x-main>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>