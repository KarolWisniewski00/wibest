<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                W tej zakładce filtry są niedostępne bezpośrednio w mapie, jeśli chcesz zmienić zakres dat zrób to w innej zakładce
            </div>
        </li>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav :countEvents="$countEvents" />
        <x-RCP.header>
            <span>📍</span> Lokalizacje
        </x-RCP.header>
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
        </x-status-cello>
        @php
        $showTable = true;
        @endphp
        @if(session('report_key_rcp'))
        @php
        $reportKey = session('report_key_rcp');
        $report = Cache::get($reportKey);
        @endphp

        @if($report)
        @php
        $showTable = false;
        @endphp
        <div id="operation-summary-modal" class="mb-4 mx-4">
            <div class="relative gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <x-h1-display class="w-full">
                    <span>🎯</span> Podsumowanie operacji
                </x-h1-display>
                <x-info-span class="-my-2">
                    Łączna liczba prób {{ $report['total_attempts'] }}
                </x-info-span>
                <x-success-span class="-my-2">
                    Pomyślnie dodano {{ $report['successful'] }}
                </x-success-span>
                @if($report['failed_count'] > 0)
                <x-danger-span class="-my-2">
                    Nieudane próby {{ $report['failed_count'] }}
                </x-danger-span>
                <div class="flex flex-col gap-4 w-full ">
                    @foreach($report['failed_details'] as $detail)
                    <label class="gap-4 h-full w-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                        <div class="flex items-center gap-2">
                            @php
                            $user = \App\Models\User::where('id', $detail['user_id'])->first();
                            @endphp
                            <x-user-photo :user="$user" />
                            <x-user-name :user="$user" class="flex-wrap" />
                        </div>
                        <div class="flex flex-row gap-4 items-center justify-between">
                            <x-status-cello>
                                {{ $detail['date'] }}
                            </x-status-cello>
                            <x-danger-span class="-my-2">
                                {{ $detail['reason'] }}
                            </x-danger-span>
                        </div>
                    </label>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @php
        $reportKey = session('report_key_rcp');

        if ($reportKey) {
        // 2. Usuwamy powiązany wpis z pamięci podręcznej (Cache)
        Cache::forget($reportKey);

        // 3. Usuwamy klucz sesji, aby nie odwoływać się do nieistniejącego cache
        session()->forget('report_key_rcp');

        // Opcjonalnie: Dodaj komunikat flash do wyświetlenia użytkownikowi
        // session()->flash('success', 'Dane raportu zostały pomyślnie usunięte z pamięci podręcznej.');
        }
        @endphp
        @else
        {{-- To się pokaże, jeśli Job jeszcze nie skończył, lub jeśli upłynął czas na Cache --}}
        <div class="mb-4 mx-4">
            <div class="gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <x-info-span class="-my-2">
                    Trwa przetwarzanie danych w tle. Odśwież za chwilę, aby zobaczyć raport.
                </x-info-span>
            </div>
        </div>
        @endif
        @endif
        @if($showTable)
        <!--CONTENT-->
        <x-container-content>
            @if($events->isNotEmpty())
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
            <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
            <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />

            <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
            <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>

            <!--Lokalizacja-->
            <x-text-cell>
                <div id="map_stop" style="z-index:1; height: 600px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;"></div>
            </x-text-cell>
            <!--Lokalizacja-->
            <input type="hidden" id="events_data" value='@json($mapEvents)'>
            <script>
                $(document).ready(function() {
                    let events = [];

                    try {
                        const eventsRaw = $('#events_data').val();
                        events = JSON.parse(eventsRaw);
                    } catch (e) {
                        console.error('Błąd parsowania JSON:', e);
                    }

                    if (!events || events.length === 0) {
                        console.warn('Brak danych do wyświetlenia na mapie');
                        return;
                    }

                    // Start mapy - pierwszy punkt jako center
                    const first = events[0];
                    const map = L.map('map_stop').setView([first.lat, first.lng], 6);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

                    const redIcon = L.icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    });
                    const greenIcon = L.icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    });
                    var markers = new L.MarkerClusterGroup();
                    const bounds = [];

                    events.forEach(event => {
                        if (!event.lat || !event.lng) return;
                        console.log(event.type);
                        var icon = greenIcon;
                        if (event.type === 'start') {
                            var icon = greenIcon;
                        } else {
                            var icon = redIcon;
                        }

                        const marker = L.marker([event.lat, event.lng], {
                                icon: icon
                            })
                            .bindPopup(`
                            <div style="min-width:150px">
                                <b>${event.user}</b><br>
                                <small>${event.date}</small>
                            </div>
                            `);

                        markers.addLayer(marker); // 👈 zamiast addTo(map)
                        bounds.push([event.lat, event.lng]);
                    });

                    map.addLayer(markers); // 👈 dodajemy grupę do mapy

                    // Dopasowanie widoku do wszystkich punktów
                    if (bounds.length > 0) {
                        map.fitBounds(bounds);
                    }

                });
            </script>
            @else
            <x-empty-place />
            @endif

        </x-container-content>
        @endif
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>