<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />
        <div x-data="{ open: false }">
            <div
                class="flex justify-end md:justify-start px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 rounded-t-lg">
                <nav class="hidden md:flex gap-x-8 h-full" aria-label="Tabs" role="tablist"
                    aria-orientation="horizontal">
                    <x-nav-link class="h-full text-center" href="{{ route('setting.client.show', $client) }}"
                        :active="request()->routeIs('setting.client.show', $client)">
                        Firma
                    </x-nav-link>
                    <x-nav-link class="h-full text-center" href="{{ route('setting.client.sms', $client) }}"
                        :active="request()->routeIs('setting.client.sms', $client)">
                        Moduł SMS
                    </x-nav-link>
                </nav>
            </div>
        </div>
        <!--CONTENT-->
        <x-container-content-form>
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.client') }}" class="text-lg">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                <x-container-gray>
                    <!--Nazwa-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Nazwa
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span style="word-break: break-all;">
                                <span class="text-2xl">🏢</span>
                                {{ $client->name }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Nazwa-->

                    <!--Adres-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Adres
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📍</span>
                                {{ $client->adress }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Adres-->

                    <!--NIP-->
                    <x-text-cell>
                        <x-text-cell-label>
                            NIP
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">🧾</span>
                                {{ $client->vat_number }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--NIP-->
                </x-container-gray>
                <x-container-gray>
                    <!--Aktualna ilość użytkowników-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Aktualna ilość użytkowników
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">👤</span>
                                {{ $client->getUsersCount() }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Aktualna ilość użytkowników-->
                    <!--Aktualna cena za użytkownika-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Aktualna cena za użytkownika
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">💲</span>
                                {{ $client->user_price ? number_format($client->user_price, 2) . ' PLN' : 'Brak ceny' }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Aktualna cena za użytkownika-->
                    <!--Ilość wysłanych wiadomości email-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Ilość wysłanych wiadomości email
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📧</span>
                                {{ $msg_email->count() }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Ilość wysłanych wiadomości email-->
                </x-container-gray>
                    @php
        $company = $client;

        /*
        |--------------------------------------------------------------------------
        | AI - klasyfikacja
        |--------------------------------------------------------------------------
        */

        $classificationData = match ($company->ai_classification) {
            'ideal' => [
                'label' => 'Idealny klient',
                'icon' => 'fa-solid fa-star',
                'color' => 'green',
            ],
            'potential' => [
                'label' => 'Potencjalny klient',
                'icon' => 'fa-solid fa-chart-simple',
                'color' => 'yellow',
            ],
            'weak' => [
                'label' => 'Słabe dopasowanie',
                'icon' => 'fa-solid fa-arrow-down',
                'color' => 'orange',
            ],
            'disqualified' => [
                'label' => 'Nie zakwalifikowany',
                'icon' => 'fa-solid fa-ban',
                'color' => 'red',
            ],
            'unknown' => [
                'label' => 'Brak danych',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
            default => [
                'label' => 'Nie sklasyfikowano',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
        };
    @endphp
                                    @if ($classificationData['color'] === 'blue')

                        <div class="relative overflow-hidden md:col-span-2 rounded-xl bg-blue-900/20 border border-blue-800/40 px-5 py-4">

                            {{-- IKONA W TLE --}}
                            <div class="absolute -right-5 -bottom-7 text-8xl text-blue-400/10 pointer-events-none">
                                <i class="{{ $classificationData['icon'] }}"></i>
                            </div>

                            <div class="relative z-10">

                                <div class="text-xs uppercase tracking-wider mb-3 text-blue-300/70">
                                    Klasyfikacja klienta
                                </div>

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-11 h-11 min-w-[44px] rounded-lg bg-blue-900/40 border border-blue-700/30 flex items-center justify-center">
                                        <i class="{{ $classificationData['icon'] }} text-blue-300"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <div class="font-semibold text-white">
                                            {{ $classificationData['label'] }}
                                        </div>

                                        @if($company->ai_classification_updated_at)
                                            <div class="text-xs text-gray-400 mt-1">
                                                Aktualizacja:
                                                {{ \Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i') }}
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @elseif ($classificationData['color'] === 'green')

                        <div
                            class="relative overflow-hidden md:col-span-2 rounded-xl bg-green-900/20 border border-green-800/40 px-5 py-4">

                            {{-- IKONA W TLE --}}
                            <div class="absolute -right-5 -bottom-7 text-8xl text-green-400/10 pointer-events-none">
                                <i class="{{ $classificationData['icon'] }}"></i>
                            </div>

                            <div class="relative z-10">

                                <div class="text-xs uppercase tracking-wider mb-3 text-green-300/70">
                                    Klasyfikacja klienta
                                </div>

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-11 h-11 min-w-[44px] rounded-lg bg-green-900/40 border border-green-700/30 flex items-center justify-center">
                                        <i class="{{ $classificationData['icon'] }} text-green-300"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <div class="font-semibold text-white">
                                            {{ $classificationData['label'] }}
                                        </div>

                                        @if($company->ai_classification_updated_at)
                                            <div class="text-xs text-gray-400 mt-1">
                                                Aktualizacja:
                                                {{ \Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i') }}
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @elseif ($classificationData['color'] === 'red')

                        <div class="relative overflow-hidden md:col-span-2 rounded-xl bg-red-900/20 border border-red-800/40 px-5 py-4">

                            {{-- IKONA W TLE --}}
                            <div class="absolute -right-5 -bottom-7 text-8xl text-red-400/10 pointer-events-none">
                                <i class="{{ $classificationData['icon'] }}"></i>
                            </div>

                            <div class="relative z-10">

                                <div class="text-xs uppercase tracking-wider mb-3 text-red-300/70">
                                    Klasyfikacja klienta
                                </div>

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-11 h-11 min-w-[44px] rounded-lg bg-red-900/40 border border-red-700/30 flex items-center justify-center">
                                        <i class="{{ $classificationData['icon'] }} text-red-300"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <div class="font-semibold text-white">
                                            {{ $classificationData['label'] }}
                                        </div>

                                        @if($company->ai_classification_updated_at)
                                            <div class="text-xs text-gray-400 mt-1">
                                                Aktualizacja:
                                                {{ \Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i') }}
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @elseif ($classificationData['color'] === 'yellow')

                        <div
                            class="relative overflow-hidden md:col-span-2 rounded-xl bg-yellow-900/20 border border-yellow-800/40 px-5 py-4">

                            {{-- IKONA W TLE --}}
                            <div class="absolute -right-5 -bottom-7 text-8xl text-yellow-400/10 pointer-events-none">
                                <i class="{{ $classificationData['icon'] }}"></i>
                            </div>

                            <div class="relative z-10">

                                <div class="text-xs uppercase tracking-wider mb-3 text-yellow-300/70">
                                    Klasyfikacja klienta
                                </div>

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-11 h-11 min-w-[44px] rounded-lg bg-yellow-900/40 border border-yellow-700/30 flex items-center justify-center">
                                        <i class="{{ $classificationData['icon'] }} text-yellow-300"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <div class="font-semibold text-white">
                                            {{ $classificationData['label'] }}
                                        </div>

                                        @if($company->ai_classification_updated_at)
                                            <div class="text-xs text-gray-400 mt-1">
                                                Aktualizacja:
                                                {{ \Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i') }}
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @else

                        {{-- GRAY / DOMYŚLNY --}}
                        <div class="relative overflow-hidden md:col-span-2 rounded-xl bg-gray-700/40 border border-gray-600/40 px-5 py-4">

                            {{-- IKONA W TLE --}}
                            <div class="absolute -right-5 -bottom-7 text-8xl text-gray-400/10 pointer-events-none">
                                <i class="{{ $classificationData['icon'] }}"></i>
                            </div>

                            <div class="relative z-10">

                                <div class="text-xs uppercase tracking-wider mb-3 text-gray-400">
                                    Klasyfikacja klienta
                                </div>

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-11 h-11 min-w-[44px] rounded-lg bg-gray-700 border border-gray-600/30 flex items-center justify-center">
                                        <i class="{{ $classificationData['icon'] }} text-gray-300"></i>
                                    </div>

                                    <div class="min-w-0">

                                        <div class="font-semibold text-white">
                                            {{ $classificationData['label'] }}
                                        </div>

                                        @if($company->ai_classification_updated_at)
                                            <div class="text-xs text-gray-400 mt-1">
                                                Aktualizacja:
                                                {{ \Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i') }}
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif
                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100 md:col-span-2">
                    <span>📊</span> Wykres Użytkowników
                </h1>
                <div class="flex justify-between items-center md:col-span-2">
                    <span id="yearLabel"
                        class="text-md md:text-lg font-bold text-gray-900 dark:text-white">{{ $year }}</span>
                    <div class="space-x-2 md:space-x-0">
                        <button id="prevYear" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                            type="button">
                            <i class="fa-solid fa-chevron-left"></i><span class=" mx-1">pop</span>
                        </button>
                        <button id="nextYear" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                            type="button">
                            <span class=" mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <x-container-gray class="md:col-span-2 !bg-gray-100">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <input type="hidden" id="chart-labels" value='@json($labels)'>
                    <input type="hidden" id="chart-data" value='@json($data)'>
                    <input type="hidden" id="current-year" value="{{ $year ?? date('Y') }}">
                    <canvas style="background-color: rgb(243 244 246);" id="myChart" width="400" height="200"></canvas>

                    <script>
                        $(document).ready(function () {
                            const labels = JSON.parse($('#chart-labels').val());
                            const data = JSON.parse($('#chart-data').val());
                            const ctx = document.getElementById('myChart').getContext('2d');

                            const myChart = new Chart(ctx, {
                                type: 'line', // typ wykresu: bar, line, pie itd.
                                data: {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'Aktywni użytkownicy',
                                            data: data.active,
                                            borderColor: 'rgba(134, 239, 172, 1)', // Zielony
                                            backgroundColor: 'rgba(134, 239, 172, 0.1)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            fill: true
                                        },
                                        {
                                            label: 'Rozpoczęcia/Zakończenia pracy',
                                            data: data.hiring,
                                            borderColor: 'rgba(147, 197, 253, 1)', // Niebieski
                                            backgroundColor: 'rgba(147, 197, 253, 0.1)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            fill: true
                                        },
                                        {
                                            label: 'Rozpoczęcia/Zakończenia naliczania',
                                            data: data.billing,
                                            borderColor: 'rgba(252, 165, 165, 1)', // Czerwony
                                            backgroundColor: 'rgba(252, 165, 165, 0.1)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            fill: true
                                        }
                                    ]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });

                            let currentYear = $('#current-year').val();


                            $('#prevYear').on('click', function () {
                                currentYear = parseInt(currentYear) - 1;
                                loadChartData(currentYear);
                            });

                            $('#nextYear').on('click', function () {
                                currentYear = parseInt(currentYear) + 1;
                                loadChartData(currentYear);
                            });


                            function loadChartData(year) {
                                $.ajax({
                                    url: '{{ route('api.v1.setting.user.stats') }}',
                                    method: 'GET',
                                    data: { year: year }, // Przekazujemy rok
                                    success: function (response) {
                                        myChart.data.labels = response.labels;

                                        // Aktualizacja poszczególnych linii
                                        myChart.data.datasets[0].data = response.data.active;
                                        myChart.data.datasets[1].data = response.data.hiring;
                                        myChart.data.datasets[2].data = response.data.billing;

                                        myChart.update();

                                        $('#totalUser').text(response.totalUser);
                                        $('#totalAmount').text(parseFloat(response.totalAmount).toFixed(2) + ' PLN');
                                        $('#yearLabel').text(year); // Aktualizacja etykiety roku
                                    }
                                });
                            }

                        });
                    </script>
                </x-container-gray>
                <x-container-header class="px-0 grid gap-2 md:flex md:gap-0 md:justify-between md:col-span-2">
                    <x-h1-display>
                        <span>👤</span> Użytkownicy
                    </x-h1-display>
                    <x-flex-center class="flex-col xl:flex-row gap-2">
                        <x-button-link-green href="{{route('setting.user.create', $client)}}" class="text-xs">
                            <i class="fa-solid fa-plus mr-2"></i>Dodaj nowego użytkownika
                        </x-button-link-green>
                        <x-button-link-neutral href="{{route('setting.user.create.for.crm', $client)}}"
                            class="w-full xl:w-min text-xs">
                            <i class="fa-solid fa-plus mr-2"></i>Dodaj nowego dla CRM
                        </x-button-link-neutral>
                    </x-flex-center>
                </x-container-header>
                <x-container-scroll class="md:col-span-2 !px-0">
                    <!-- MOBILE VIEW -->
                    <x-list :items="$users_calc" emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach ($users_calc as $user)
                            <x-card-user-setting :user="$user" />
                        @endforeach
                    </x-list>

                    <!-- PC VIEW -->
                    <x-table :headers="['Nazwa', 'Data dołączenia', 'Data rozłączenia', 'Data rozpoczęcia pracy', 'Data zakończenia pracy', 'Rozpoczęcie naliczania', 'Zakończenie naliczania', 'Cena', 'Podgląd']"
                        :items="$users_calc" :checkBox="false" emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach($users_calc as $user)
                            <x-row-user-setting :user="$user" />
                        @endforeach
                    </x-table>
                </x-container-scroll>
            </div>

            <!--PRZYCISKI-->
            <div class="flex justify-end gap-4 mt-4">
                <!-- EDYTUJ -->
                <x-button-link-blue href="{{route('setting.client.edit', $client)}}">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                </x-button-link-blue>
                <!--EDYTUJ-->

                <!--USUŃ-->
                <form action="{{ route('setting.client.delete', $client) }}" method="POST"
                    onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                    @csrf
                    @method('DELETE')
                    <x-button-red type="submit">
                        <i class="fa-solid fa-trash mr-2"></i>Usuń
                    </x-button-red>
                </form>
                <!--USUŃ-->
            </div>
            <!--PRZYCISKI-->

            <x-label class="py-2 mt-4">
                Utworzono {{ $client->created_at }}
            </x-label>
            <x-label class="py-2">
                Utoworzono przez {{ $client->created_user->name }}
            </x-label>
            <x-label class="py-2">
                Ostatnia aktualizacja {{ $client->updated_at }}
            </x-label>

        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
</x-app-layout>