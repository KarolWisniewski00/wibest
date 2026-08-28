<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
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
        <x-setting.header>
            <span>📱</span> Moduł SMS
        </x-setting.header>
        <!--CONTENT-->
        <x-container-content-form class="pt-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <x-container-gray class="md:col-span-2">
                    <!--Ilość wysłanych wiadomości SMS-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Ilość wysłanych wiadomości SMS
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📱</span>
                                {{ $msg_sms->count() }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Ilość wysłanych wiadomości SMS-->
                    <!--Cena za SMS-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Aktualna cena za SMS
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">💲</span>
                                {{ number_format($company->sms_price ?? 0, 2) }} PLN
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Cena za SMS-->
                </x-container-gray>
                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100 md:col-span-2">
                    <span>📊</span> Wykres SMS
                </h1>
                <div class="flex justify-between items-center md:col-span-2">
                    <span id="monthLabel" class="text-md md:text-lg font-bold text-gray-900 dark:text-white">{{ $month }}</span>
                    <div class="space-x-2 md:space-x-0">
                        <button id="prevMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                            <i class="fa-solid fa-chevron-left"></i><span class=" mx-1">pop</span>
                        </button>
                        <button id="nextMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                            <span class=" mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <x-container-gray class="md:col-span-2 !bg-gray-100">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <input type="hidden" id="chart-labels" value='@json($labels)'>
                    <input type="hidden" id="chart-data" value='@json($data)'>
                    <input type="hidden" id="month" value="{{ $month }}">
                    <canvas style="background-color: rgb(243 244 246);" id="myChart" width="400" height="200"></canvas>
                    <!--Ilość wysłanych wiadomości SMS-->
                    <x-text-cell class="!border-gray-100">
                        <x-text-cell-label class="!text-gray-500">
                            Ilość wysłanych wiadomości SMS
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="!text-gray-900">
                                <span class="text-2xl">📱</span>
                                <span id="totalSms">{{ $totalSms }}</span>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Ilość wysłanych wiadomości SMS-->
                    <!--Suma wysłanych wiadomości SMS-->
                    <x-text-cell class="!border-gray-100">
                        <x-text-cell-label class="!text-gray-500">
                            Suma wysłanych wiadomości SMS
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="!text-gray-900">
                                <span class="text-2xl">💵</span>
                                <span id="totalAmount">{{ number_format($totalAmount ?? 0, 2) }} PLN</span>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Suma wysłanych wiadomości SMS-->
                    <script>
                    $(document).ready(function () {
                        const labels = JSON.parse($('#chart-labels').val());
                        const data = JSON.parse($('#chart-data').val());
                        const ctx = document.getElementById('myChart').getContext('2d');

                        const myChart = new Chart(ctx, {
                        type: 'bar', // typ wykresu: bar, line, pie itd.
                        data: {
                            labels: labels,
                            datasets: [{
                            label: 'Wysłane SMS-y',
                            data: data,
                            backgroundColor: 'rgba(134, 239, 172, 1)'
                            }]
                        },
                        options: {
                            scales: {
                            y: {
                                beginAtZero: true
                            }
                            }
                        }
                        });

                        let currentMonth = $('#month').val();
                        let dateInit = new Date(currentMonth + '-01');
                        dateInit.setMonth(dateInit.getMonth());
                        $('#monthLabel').text(formatMonth(dateInit));
                        

                        $('#prevMonth').on('click', function () {
                            changeMonth(-1);
                        });

                        $('#nextMonth').on('click', function () {
                            changeMonth(1);
                        });

                        function changeMonth(offset) {
                            let date = new Date(currentMonth + '-01');

                            date.setMonth(date.getMonth() + offset);

                            let year = date.getFullYear();
                            let month = String(date.getMonth() + 1).padStart(2, '0');

                            currentMonth = `${year}-${month}`;

                            $('#current-month').val(currentMonth);
                            $('#monthLabel').text(formatMonth(date));

                            loadChartData(currentMonth);
                        }

                        function loadChartData(month) {
                            $.ajax({
                                url: '{{ route('api.v1.setting.client.sms.stats', $client) }}',
                                method: 'GET',
                                data: { month: month },
                                success: function (response) {
                                    // 🔥 update wykresu
                                    console.log(response)
                                    myChart.data.labels = response.labels;
                                    myChart.data.datasets[0].data = response.data;

                                    myChart.update();
                                    // 🔢 liczba SMS
                                    $('#totalSms').text(response.totalSms);

                                    // 💰 kwota (ładne formatowanie)
                                    $('#totalAmount').text(
                                        parseFloat(response.totalAmount).toFixed(2) + ' PLN'
                                    );
                                }
                            });
                        }
                        function formatMonth(date) {
                            return date.toLocaleDateString('pl-PL', {
                                year: 'numeric',
                                month: 'long'
                            });
                        }
                    });
                    </script>
                </x-container-gray>
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100">
                    <span>📩</span> 10 ostatnich wysłanych wiadomości
                </h1>
                @else
                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100">
                    <span>📩</span> 10 twoich ostatnich wysłanych wiadomości
                </h1>
                @endif
                <x-container-scroll class="md:col-span-2">
                    <!-- MOBILE VIEW -->
                    <x-list :items="$msg_paginate" emptyMessage="Brak wiadomości do wyświetlenia.">
                        @foreach ($msg_paginate as $m)
                        <x-card-msg-setting :msg="$m" />
                        @endforeach
                    </x-list>

                    <!-- PC VIEW -->
                    <x-table
                        :headers="['Nazwa', 'Typ', 'Odbiorca', 'Tytuł', 'Treść', 'Status', 'Cena', 'Kiedy wysłano']"
                        :items="$msg_paginate"
                        :checkBox="false"
                        emptyMessage="Brak wiadomości do wyświetlenia.">
                        @foreach($msg_paginate as $m)
                        <x-row-msg-setting :msg="$m" />
                        @endforeach
                    </x-table>
                </x-container-scroll>
            </div>

        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>