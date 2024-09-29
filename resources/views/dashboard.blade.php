<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Wykresy') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET -->
            <div class="p-6 lg:p-8 mb-8 bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if ($company)
                <div class="bg-gray-800">
                    <div class="flex flex-col justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 dark:text-white" style='font-family: "Raleway", sans-serif;'>WIBEST SDF </span>
                        </h1>
                        <ul class="grid w-full gap-6 md:grid-cols-2">
                            <!-- Dziś -->
                            <li class="col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-4xl font-semibold text-indigo-500">{{ number_format($todayTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Dziś</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $todayCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ostatnie 7 dni -->
                            <li class="col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-4xl font-semibold text-indigo-500">{{ number_format($last7DaysTotal, 2) }} zł</span>
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
                                            <span class="text-4xl font-semibold text-indigo-500">{{ number_format($currentMonthTotal, 2) }} zł</span>
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
                                            <span class="text-4xl font-semibold text-indigo-500">{{ number_format($previousMonthTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Ubiegły miesiąc</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $previousMonthCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ten rok -->
                            <li class="col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-4xl font-semibold text-indigo-500">{{ number_format($currentYearTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-50">Ten rok</span>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $currentYearCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>
                        </ul>

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