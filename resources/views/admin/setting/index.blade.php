<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--MAIN-->
        <x-main-no-filter>
            <x-setting.nav />
            <x-setting.header>
                <span>🏢</span> Moja firma
            </x-setting.header>
            <!--CONTENT-->
            <x-container-content-form class="pt-0">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
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
                                <x-text-cell-span style="word-break: break-all;">
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
                    @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                        <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100">
                            <span>👤</span> Użytkownicy
                        </h1>
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
                    @endif
                </div>

                <!--PRZYCISKI
                <div class="flex justify-end gap-4 mt-4">
                    @if ($company)
                        @if($role == 'admin' || $role == 'właściciel')

                            <x-button-link-blue href="{{route('setting.edit', $company)}}">
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                            </x-button-link-blue>

                        @endif
                    @endif
                </div>
                PRZYCISKI-->

                <x-label class="py-2 mt-4">
                    Utworzono {{ $client->created_at }}
                </x-label>
                <x-label class="py-2">
                    Ostatnia aktualizacja {{ $client->updated_at }}
                </x-label>

            </x-container-content-form>
            <!--CONTENT-->

        </x-main-no-filter>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>