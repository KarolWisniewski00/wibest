<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wykresy') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET -->
            <div class="p-6 lg:p-8 mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if ($company)
                <div class="bg-white dark:bg-gray-800">
                    <div class="flex flex-col justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 text-gray-800 dark:text-gray-50" style='font-family: "Raleway", sans-serif;'>WIBEST SDF </span>
                        </h1>
                        <ul class="grid w-full gap-6 md:grid-cols-2">
                            <!-- Dziś -->
                            <li class="md:col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($todayTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Dziś</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $todayCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ostatnie 7 dni -->
                            <li class="md:col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($last7DaysTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Ostatnie 7 dni</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $last7DaysCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Bieżący miesiąc -->
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($currentMonthTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Bieżący miesiąc</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $currentMonthCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ubiegły miesiąc -->
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($previousMonthTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Ubiegły miesiąc</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $previousMonthCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ten rok -->
                            <li class="md:col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($currentYearTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Ten rok</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $currentYearCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Dodaj w sekcji head, jeśli jeszcze nie ma -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 text-gray-800 dark:text-gray-50">Sprzedaż łącznie ostatnie 31 dni</span>
                        </h1>

                        <div class="mt-8 w-full h-full">
                            <div class="w-full h-full">
                                <canvas id="invoiceChart"></canvas>
                            </div>
                        </div>

                        <script>
                            const ctx = document.getElementById('invoiceChart').getContext('2d');
                            const invoiceChart = new Chart(ctx, {
                                type: 'line', // lub 'bar', w zależności od preferencji
                                data: {
                                    labels: @json($dates), // daty z ostatnich 31 dni
                                    datasets: [{
                                        label: 'Brutto',
                                        data: @json($totalValues), // sumy total
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderWidth: 2
                                    }, {
                                        label: 'Netto',
                                        data: @json($subTotalValues), // sumy sub_total
                                        borderColor: 'rgba(153, 102, 255, 1)',
                                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 text-gray-800 dark:text-gray-50">Liczba wystawionych faktur w ostatnich 31 dniach</span>
                        </h1>

                        <div class="mt-8 w-full h-full">
                            <div class="w-full h-full">
                                <canvas id="documentChart"></canvas>
                            </div>
                        </div>

                        <script>
                            const docCtx = document.getElementById('documentChart').getContext('2d');
                            const documentChart = new Chart(docCtx, {
                                type: 'line', // lub 'bar', w zależności od preferencji
                                data: {
                                    labels: @json($dates), // daty z ostatnich 31 dni
                                    datasets: [{
                                        label: 'Liczba dokumentów',
                                        data: @json($documentCounts), // liczba dokumentów
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>

                </div>
                @else
                @include('admin.elements.end_config')
                @endif
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
</x-app-layout>