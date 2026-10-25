<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <x-main-no-filter>
            <x-object.nav />
            <!--HEADER-->
            <!--CONTENT-->
            <x-container-content>
                <div class="">
                    <div class="">

                        <!-- ========================================================= -->
                        <!-- HEADER -->
                        <!-- ========================================================= -->

                        <div class="my-4 flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                            <div>
                                <div class="mb-2 flex items-center gap-3">
                                    <div
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-cube text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div>
                                        <h1
                                            class="text-start text-gray-900 dark:text-white font-raleway text-2xl font-bold tracking-tight">
                                            Obiekty
                                        </h1>

                                        <p class="mt-0.5 text-sm text-gray-400 text-start">
                                            Centrum zarządzania obiektami budowlanymi
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <x-button-link-green href="{{ route('object.create') }}" class="text-xs">
                                    <i class="fa-solid fa-plus mr-2"></i>Dodaj obiekt
                                </x-button-link-green>
                            </div>
                        </div>


                        <!-- ========================================================= -->
                        <!-- STATISTICS -->
                        <!-- ========================================================= -->

                        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                            <!-- Wszystkie -->
                            <div class="group rounded-2xl bg-gray-700 p-5
                            transition hover:bg-gray-700">

                                <div class="flex items-start justify-start gap-4">

                                    <div
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-cube text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div class="text-start">
                                        <p class="text-sm text-gray-400">
                                            Aktywne obiekty
                                        </p>

                                        <p class="text-gray-900 dark:text-white mt-2 text-3xl font-bold tracking-tight">
                                            5
                                        </p>
                                        <div class="mt-4 flex items-center gap-2 text-xs">
                                            <span class="flex items-center gap-1 text-green-300">
                                                <i class="fa-solid fa-arrow-up text-[10px]"></i>
                                                2
                                            </span>

                                            <span class="text-gray-400">
                                                w tym miesiącu
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <!-- Pracownicy -->
                            <div class="group rounded-2xl bg-gray-700 p-5
                            transition hover:bg-gray-700">

                                <div class="flex items-start justify-start gap-4">

                                    <div
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-clock text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div class="text-start">
                                        <p class="text-sm text-gray-400">
                                            Czas spędzony na obiektach
                                        </p>

                                        <p class="text-gray-900 dark:text-white mt-2 text-3xl font-bold tracking-tight">
                                            780 h
                                        </p>
                                        <div class="mt-4 flex items-center gap-2 text-xs">
                                            <span class="flex items-center gap-1 text-green-300">
                                                <i class="fa-solid fa-arrow-up text-[10px]"></i>
                                                12%
                                            </span>

                                            <span class="text-gray-400">
                                                w tym miesiącu
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <!-- Aktywne -->
                            <div class="group rounded-2xl bg-gray-700 p-5
                            transition hover:bg-gray-700">

                                <div class="flex items-start justify-start gap-4">

                                    <div
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-indigo-200 to-indigo-100 dark:from-indigo-500/20 dark:to-indigo-500/10 text-indigo-700 dark:text-indigo-300">
                                        <i class="fa-solid fa-clock text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div class="text-start">
                                        <p class="text-sm text-gray-400">
                                            Dodatkowy czas spędzony na obiektach
                                        </p>

                                        <p class="text-gray-900 dark:text-white mt-2 text-3xl font-bold tracking-tight">
                                            780 h
                                        </p>
                                        <div class="mt-4 flex items-center gap-2 text-xs">
                                            <span class="flex items-center gap-1 text-green-300">
                                                <i class="fa-solid fa-arrow-up text-[10px]"></i>
                                                12%
                                            </span>

                                            <span class="text-gray-400">
                                                w tym miesiącu
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <!-- Uwaga -->
                            <div class="group rounded-2xl bg-gray-700 p-5
                            transition hover:bg-gray-700">

                                <div class="flex items-start justify-start gap-4">

                                    <div
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-yellow-200 to-yellow-100 dark:from-yellow-500/20 dark:to-yellow-500/10 text-yellow-700 dark:text-yellow-300">
                                        <i class="fa-solid fa-triangle-exclamation text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div class="text-start">
                                        <p class="text-sm text-gray-400">
                                            Wymaga uwagi
                                        </p>

                                        <p class="text-gray-900 dark:text-white mt-2 text-3xl font-bold tracking-tight">
                                            2
                                        </p>
                                        <div class="mt-4 flex items-center gap-2 text-xs">
                                            <span class="flex items-center gap-1 text-yellow-300">
                                                Sprawdź obiekty
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- ========================================================= -->
                        <!-- MAP + STATUS -->
                        <!-- ========================================================= -->

                        <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-3">

                            <!-- MAPA -->
                            <div class="relative overflow-hidden rounded-2xl
                            bg-gray-700 xl:col-span-2">

                                <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                            <i class="fa-solid fa-location-dot text-2xl" aria-hidden="true"></i>
                                        </div>

                                        <div>
                                            <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                                Mapa obiektów
                                            </h2>

                                            <p class="text-start text-xs text-gray-400">
                                                Lokalizacja aktywnych obiektów
                                            </p>
                                        </div>

                                    </div>

                                    <button class="text-xs text-gray-400 transition hover:text-gray-200">
                                        Zobacz pełną mapę
                                        <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i>
                                    </button>

                                </div>


                                <!-- MAP PLACEHOLDER -->
                                <div class="relative h-[360px] overflow-hidden rounded-b-xl bg-gray-950">
                                    <div id="objects-map" class="h-full w-full"></div>

                                    <!-- MAP LEGEND -->
                                    <div class="absolute bottom-4 left-4 z-[1000] flex items-center gap-4
                    rounded-xl bg-gray-700 px-4 py-3
                    text-xs text-gray-300 shadow-xl backdrop-blur">

                                        <span class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full bg-green-300"></span>
                                            Aktywny
                                        </span>

                                        <span class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full bg-yellow-300"></span>
                                            Wstrzymany
                                        </span>

                                        <span class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full bg-gray-500"></span>
                                            Zakończony
                                        </span>

                                    </div>
                                </div>
                                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                                <script>

                                    $(document).ready(function () {

                                        const map = L.map('objects-map', {
                                            zoomControl: true,
                                            attributionControl: true
                                        }).setView([50.2649, 19.0238], 10);

                                        /*
                                        |--------------------------------------------------------------------------
                                        | OpenStreetMap
                                        |--------------------------------------------------------------------------
                                        */

                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            maxZoom: 19,
                                            attribution: '&copy; OpenStreetMap'
                                        }).addTo(map);


                                        /*
                                        |--------------------------------------------------------------------------
                                        | Markery
                                        |--------------------------------------------------------------------------
                                        */

                                        const objects = [

                                            {
                                                name: 'Budynek biurowy Katowice',
                                                city: 'Katowice',
                                                lat: 50.2649,
                                                lng: 19.0238,
                                                status: 'active'
                                            },

                                            {
                                                name: 'Hala produkcyjna Gliwice',
                                                city: 'Gliwice',
                                                lat: 50.2945,
                                                lng: 18.6714,
                                                status: 'active'
                                            },

                                            {
                                                name: 'Magazyn Tychy',
                                                city: 'Tychy',
                                                lat: 50.1372,
                                                lng: 18.9664,
                                                status: 'paused'
                                            }

                                        ];


                                        /*
                                        |--------------------------------------------------------------------------
                                        | Ikona markera
                                        |--------------------------------------------------------------------------
                                        */

                                        function createMarker(object) {

                                            let color = '#86efac';

                                            if (object.status === 'paused') {
                                                color = '#fde047';
                                            }

                                            if (object.status === 'finished') {
                                                color = '#6b7280';
                                            }

                                            const icon = L.divIcon({

                                                className: '',

                                                html: `
                        <div class="relative flex h-10 w-10 items-center justify-center">

                            ${object.status === 'active' ? `
                                <span
                                    class="absolute h-10 w-10 animate-ping rounded-full"
                                    style="background: ${color}33;"
                                ></span>
                            ` : ''}

                            <span
                                class="relative flex h-5 w-5 items-center justify-center
                                       rounded-full shadow-lg"
                                style="
                                    background: ${color};
                                    box-shadow: 0 0 15px ${color}55;
                                "
                            ></span>

                        </div>
                    `,

                                                iconSize: [40, 40],
                                                iconAnchor: [20, 20]
                                            });


                                            const marker = L.marker(
                                                [object.lat, object.lng],
                                                { icon: icon }
                                            ).addTo(map);


                                            /*
                                            |--------------------------------------------------------------------------
                                            | Popup
                                            |--------------------------------------------------------------------------
                                            */

                                            marker.bindPopup(`
                    <div class="min-w-[220px]">

                        <div class="mb-1 text-sm font-semibold text-gray-900">
                            ${object.name}
                        </div>

                        <div class="mb-3 text-xs text-gray-500">
                            ${object.city}
                        </div>

                        <button
                            type="button"
                            class="w-full rounded-lg bg-gray-900 px-3 py-2
                                   text-xs font-medium text-white
                                   transition hover:bg-gray-800"
                            data-object-id="${object.id ?? ''}"
                        >
                            Zobacz obiekt
                        </button>

                    </div>
                `);


                                            /*
                                            |--------------------------------------------------------------------------
                                            | Kliknięcie
                                            |--------------------------------------------------------------------------
                                            */

                                            marker.on('click', function () {

                                                console.log('Kliknięto:', object);

                                            });

                                        }


                                        /*
                                        |--------------------------------------------------------------------------
                                        | Dodanie markerów
                                        |--------------------------------------------------------------------------
                                        */

                                        objects.forEach(function (object) {
                                            createMarker(object);
                                        });


                                        /*
                                        |--------------------------------------------------------------------------
                                        | Dopasowanie mapy do markerów
                                        |--------------------------------------------------------------------------
                                        */

                                        const bounds = objects.map(function (object) {
                                            return [object.lat, object.lng];
                                        });

                                        if (bounds.length) {
                                            map.fitBounds(bounds, {
                                                padding: [40, 40]
                                            });
                                        }


                                        /*
                                        |--------------------------------------------------------------------------
                                        | Fix dla mapy w ukrytych kontenerach / Livewire
                                        |--------------------------------------------------------------------------
                                        */

                                        setTimeout(function () {
                                            map.invalidateSize();
                                        }, 300);

                                    });

                                </script>
                                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                            </div>


                            <!-- STATUS -->
                            <div class="rounded-2xl bg-gray-700">

                                <div class="flex items-center gap-3 border-b border-gray-600 px-5 py-4">
                                    <div
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-chart-line text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                            Status obiektów
                                        </h2>

                                        <p class="text-start text-xs text-gray-400">
                                            aktualny podział
                                        </p>
                                    </div>
                                </div>


                                <div class="flex h-[360px] flex-col justify-center px-6">

                                    <!-- DONUT -->
                                    <div class="mx-auto mb-8 flex h-40 w-40 items-center justify-center
                                    rounded-full" style="
                                background: conic-gradient(
                                    #86efac 0deg 216deg,
                                    #facc15 216deg 288deg,
                                    #6b7280 288deg 360deg
                                );
                             ">

                                        <div class="flex h-28 w-28 flex-col items-center justify-center
                                        rounded-full bg-gray-700">
                                            <span class="text-gray-900 dark:text-white text-3xl font-bold">
                                                5
                                            </span>

                                            <span class="text-xs text-gray-400">
                                                obiektów
                                            </span>
                                        </div>

                                    </div>


                                    <!-- STATUS ROWS -->
                                    <div class="space-y-4">

                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <span class="h-2.5 w-2.5 rounded-full bg-green-300"></span>
                                                <span class="text-sm text-gray-300">
                                                    Aktywne
                                                </span>
                                            </div>

                                            <span class="text-gray-900 dark:text-white text-sm font-semibold">
                                                3
                                            </span>
                                        </div>


                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <span class="h-2.5 w-2.5 rounded-full bg-yellow-300"></span>
                                                <span class="text-sm text-gray-300">
                                                    Wstrzymane
                                                </span>
                                            </div>

                                            <span class="text-gray-900 dark:text-white text-sm font-semibold">
                                                1
                                            </span>
                                        </div>


                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <span class="h-2.5 w-2.5 rounded-full bg-gray-500"></span>
                                                <span class="text-sm text-gray-300">
                                                    Zakończone
                                                </span>
                                            </div>

                                            <span class="text-gray-900 dark:text-white text-sm font-semibold">
                                                1
                                            </span>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- ========================================================= -->
                        <!-- MAIN CONTENT -->
                        <!-- ========================================================= -->

                        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">


                            <!-- ===================================================== -->
                            <!-- OBJECTS -->
                            <!-- ===================================================== -->

                            <div class="overflow-hidden rounded-2xl 
                            bg-gray-700 xl:col-span-3">

                                <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                            <i class="fa-solid fa-cube text-2xl" aria-hidden="true"></i>
                                        </div>

                                        <div>
                                            <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                                Twoje obiekty
                                            </h2>

                                            <p class="text-start text-xs text-gray-400">
                                                Wszystkie obiekty przypisane do firmy
                                            </p>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2
                                    -translate-y-1/2 text-xs text-gray-400">
                                        </i>
                                        <input type="text" placeholder="Szukaj obiektu..." class="h-9 w-full rounded-lg border border-gray-600
                                    bg-gray-600 pl-9 pr-3 text-xs text-gray-100
                                    placeholder:text-gray-400 outline-none
                                    transition focus:border-green-300/50
                                    sm:w-56">
                                    </div>
                                </div>

                                <!-- FILTERS -->
                                <div class="flex flex-wrap items-center gap-2 border-b border-gray-600 px-5 py-3">

                                    <button class="rounded-lg bg-green-300/10 px-3 py-1.5 text-xs font-medium
                                   text-green-300">
                                        Wszystkie
                                    </button>

                                    <button class="rounded-lg px-3 py-1.5 text-xs text-gray-400
                                   transition hover:bg-gray-800 hover:text-gray-200">
                                        Aktywne
                                    </button>

                                    <button class="rounded-lg px-3 py-1.5 text-xs text-gray-400
                                   transition hover:bg-gray-800 hover:text-gray-200">
                                        Wstrzymane
                                    </button>

                                    <button class="rounded-lg px-3 py-1.5 text-xs text-gray-400
                                   transition hover:bg-gray-800 hover:text-gray-200">
                                        Zakończone
                                    </button>

                                </div>


                                <!-- OBJECT LIST -->
                                <div class="divide-y divide-gray-600">


                                    <!-- OBJECT -->
                                    <a href="#" class="group flex items-center gap-4 px-5 py-4 transition
                                  hover:bg-gray-800/70">

                                        <!-- ICON -->
                                        <div
                                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                            <i class="fa-solid fa-building text-2xl" aria-hidden="true"></i>
                                        </div>


                                        <!-- NAME -->
                                        <div class="min-w-0 flex-1">

                                            <div class="flex items-center gap-2">

                                                <h3 class="truncate text-sm font-semibold
                                               text-white group-hover:text-green-300">
                                                    Budynek biurowy Katowice
                                                </h3>

                                                <span class="hidden rounded-full bg-green-300/10 px-2 py-0.5
                                                 text-[10px] font-medium text-green-300 sm:inline-flex">
                                                    Aktywny
                                                </span>

                                            </div>

                                            <div class="mt-1 flex items-center gap-2 text-xs text-gray-400">
                                                <span>
                                                    <i class="fa-solid fa-location-dot mr-1"></i>
                                                    Katowice
                                                </span>

                                                <span class="text-gray-400">•</span>

                                                <span>
                                                    Biurowiec
                                                </span>
                                            </div>

                                        </div>

                                        <!-- WORKERS -->
                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-users text-gray-400"></i>
                                            24
                                        </div>

                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-clock text-gray-400"></i>
                                            780 h
                                        </div>

                                        <!-- ARROW -->
                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg
                                        text-gray-400 transition
                                        group-hover:bg-gray-700 group-hover:text-gray-200">
                                            <i class="fa-solid fa-chevron-right text-xs"></i>
                                        </div>

                                    </a>


                                    <!-- OBJECT -->
                                    <a href="#" class="group flex items-center gap-4 px-5 py-4 transition
                                  hover:bg-gray-800/70">

                                        <div
                                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-indigo-200 to-blue-100 dark:from-indigo-500/20 dark:to-blue-500/10 text-indigo-700 dark:text-indigo-300">
                                            <i class="fa-solid fa-warehouse text-2xl" aria-hidden="true"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="flex items-center gap-2">

                                                <h3 class="truncate text-sm font-semibold
                                               text-white group-hover:text-indigo-300">
                                                    Hala produkcyjna Gliwice
                                                </h3>

                                                <span class="hidden rounded-full bg-green-300/10 px-2 py-0.5
                                                 text-[10px] font-medium text-green-300 sm:inline-flex">
                                                    Aktywny
                                                </span>

                                            </div>

                                            <div class="mt-1 flex items-center gap-2 text-xs text-gray-400">
                                                <span>
                                                    <i class="fa-solid fa-location-dot mr-1"></i>
                                                    Gliwice
                                                </span>

                                                <span class="text-gray-400">•</span>

                                                <span>
                                                    Przemysłowy
                                                </span>
                                            </div>

                                        </div>


                                        <!-- WORKERS -->
                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-users text-gray-400"></i>
                                            18
                                        </div>

                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-clock text-gray-400"></i>
                                            320 h
                                        </div>


                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg
                                        text-gray-400 transition group-hover:bg-gray-700
                                        group-hover:text-gray-200">
                                            <i class="fa-solid fa-chevron-right text-xs"></i>
                                        </div>

                                    </a>


                                    <!-- OBJECT -->
                                    <a href="#" class="group flex items-center gap-4 px-5 py-4 transition
                                  hover:bg-gray-800/70">

                                        <div
                                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-purple-200 to-fuchsia-100 dark:from-purple-500/20 dark:to-fuchsia-500/10 text-purple-700 dark:text-purple-300">
                                            <i class="fa-solid fa-house text-2xl" aria-hidden="true"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="flex items-center gap-2">

                                                <h3 class="truncate text-sm font-semibold
                                               text-white group-hover:text-purple-300">
                                                    Osiedle mieszkaniowe Rybnik
                                                </h3>

                                                <span class="hidden rounded-full bg-green-300/10 px-2 py-0.5
                                                 text-[10px] font-medium text-green-300 sm:inline-flex">
                                                    Aktywny
                                                </span>

                                            </div>

                                            <div class="mt-1 flex items-center gap-2 text-xs text-gray-400">
                                                <span>
                                                    <i class="fa-solid fa-location-dot mr-1"></i>
                                                    Rybnik
                                                </span>

                                                <span class="text-gray-400">•</span>

                                                <span>
                                                    Mieszkalny
                                                </span>
                                            </div>

                                        </div>


                                        <!-- WORKERS -->
                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-users text-gray-400"></i>
                                            71
                                        </div>

                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-clock text-gray-400"></i>
                                            120 h
                                        </div>


                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg
                                        text-gray-400 transition group-hover:bg-gray-700
                                        group-hover:text-gray-200">
                                            <i class="fa-solid fa-chevron-right text-xs"></i>
                                        </div>

                                    </a>


                                    <!-- OBJECT -->
                                    <a href="#" class="group flex items-center gap-4 px-5 py-4 transition
                                  hover:bg-gray-800/70">

                                        <div
                                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-yellow-200 to-amber-100 dark:from-yellow-500/20 dark:to-amber-500/10 text-yellow-700 dark:text-yellow-300">
                                            <i class="fa-solid fa-box text-2xl" aria-hidden="true"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="flex items-center gap-2">

                                                <h3 class="truncate text-sm font-semibold
                                               text-white group-hover:text-yellow-300">
                                                    Magazyn logistyczny Tychy
                                                </h3>

                                                <span class="hidden rounded-full bg-yellow-300/10 px-2 py-0.5
                                                 text-[10px] font-medium text-yellow-300 sm:inline-flex">
                                                    Wstrzymany
                                                </span>

                                            </div>

                                            <div class="mt-1 flex items-center gap-2 text-xs text-gray-400">
                                                <span>
                                                    <i class="fa-solid fa-location-dot mr-1"></i>
                                                    Tychy
                                                </span>

                                                <span class="text-gray-400">•</span>

                                                <span>
                                                    Magazyn
                                                </span>
                                            </div>

                                        </div>


                                        <!-- WORKERS -->
                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-users text-gray-400"></i>
                                            24
                                        </div>

                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-clock text-gray-400"></i>
                                            10 h
                                        </div>


                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg
                                        text-gray-400 transition group-hover:bg-gray-700
                                        group-hover:text-gray-200">
                                            <i class="fa-solid fa-chevron-right text-xs"></i>
                                        </div>

                                    </a>


                                    <!-- OBJECT -->
                                    <a href="#" class="group flex items-center gap-4 px-5 py-4 transition
                                  hover:bg-gray-800/70">

                                        <div
                                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-gray-200 to-slate-100 dark:from-gray-500/20 dark:to-slate-500/10 text-gray-700 dark:text-gray-300">
                                            <i class="fa-solid fa-industry text-2xl" aria-hidden="true"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="flex items-center gap-2">

                                                <h3 class="truncate text-sm font-semibold
                                               text-white group-hover:text-gray-300">
                                                    Hala produkcyjna Bielsko-Biała
                                                </h3>

                                                <span class="hidden rounded-full bg-gray-700 px-2 py-0.5
                                                 text-[10px] font-medium text-gray-400 sm:inline-flex">
                                                    Zakończony
                                                </span>

                                            </div>

                                            <div class="mt-1 flex items-center gap-2 text-xs text-gray-400">
                                                <span>
                                                    <i class="fa-solid fa-location-dot mr-1"></i>
                                                    Bielsko-Biała
                                                </span>

                                                <span class="text-gray-400">•</span>

                                                <span>
                                                    Przemysłowy
                                                </span>
                                            </div>

                                        </div>


                                        <!-- WORKERS -->
                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-users text-gray-400"></i>
                                            0
                                        </div>

                                        <div class="hidden items-center gap-2 text-xs text-gray-400 lg:flex">
                                            <i class="fa-solid fa-clock text-gray-400"></i>
                                            0 h
                                        </div>


                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg
                                        text-gray-400 transition group-hover:bg-gray-700
                                        group-hover:text-gray-200">
                                            <i class="fa-solid fa-chevron-right text-xs"></i>
                                        </div>

                                    </a>

                                </div>


                                <!-- FOOTER -->
                                <div class="flex items-center justify-between border-t border-gray-600
                                px-5 py-3">

                                    <span class="text-xs text-gray-400">
                                        Wyświetlono 5 z 5 obiektów
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </x-container-content>
        </x-main-no-filter>
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>