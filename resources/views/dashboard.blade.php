<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    @php
    $shortType = ['wolne za pracę w święto' => 'WPS',
    'zwolnienie lekarskie' => 'ZL',
    'urlop wypoczynkowy' => 'UW',
    'urlop rodzicielski' => 'UR',
    'wolne za nadgodziny' => 'WN',
    'wolne za święto w sobotę' => 'WSS',
    'urlop bezpłatny' => 'UB',
    'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
    'zwolnienie lekarsie - opieka' => 'ZLO',
    'urlop okolicznościowy' => 'UO',
    'urlop wypoczynkowy "na żądanie"' => 'UWZ',
    'oddanie krwi' => 'OK',
    'urlop ojcowski' => 'UOJC',
    'urlop macieżyński' => 'UM',
    'świadczenie rehabilitacyjne' => 'SR',
    'opieka' => 'OP',
    'świadek w sądzie' => 'SWS',
    'praca zdalna' => 'PZ',
    'kwarantanna' => 'KW',
    'kwarantanna z pracą zdalną' => 'KWZPZ',
    'delegacja' => 'DEL'
    ];
    $icons = [
    'wolne za pracę w święto' => '🕊️',
    'zwolnienie lekarskie' => '🤒',
    'urlop wypoczynkowy' => '🏖️',
    'urlop rodzicielski' => '👶',
    'wolne za nadgodziny' => '⏰',
    'wolne za święto w sobotę' => '🗓️',
    'urlop bezpłatny' => '💸',
    'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
    'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
    'urlop okolicznościowy' => '🎉',
    'urlop wypoczynkowy "na żądanie"' => '📢',
    'oddanie krwi' => '🩸',
    'urlop ojcowski' => '👨‍👧',
    'urlop macieżyński' => '🤱',
    'świadczenie rehabilitacyjne' => '🦾',
    'opieka' => '🧑‍🍼',
    'świadek w sądzie' => '⚖️',
    'praca zdalna' => '💻',
    'kwarantanna' => '🦠',
    'kwarantanna z pracą zdalną' => '🏠💻',
    'delegacja' => '✈️',
    ];
    @endphp
    <div class="p-4">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <div class="mb-8 p-4 md:p-0 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                    <!--HEADER-->
                    <div class="flex flex-col w-full md:pt-4 md:px-4">
                        <x-h1-display class="text-center md:text-start mb-4 md:mb-0">
                            👋 Cześć, {{auth()->user()->name}}!
                        </x-h1-display>
                    </div>
                    <!--HEADER-->
                    @if($date['leave'] != null)
                    <x-container class="">
                        <x-widget-display-nav class="grid grid-cols-1 gap-4 p-4 w-full">
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
                                <x-flex-center>
                                    <x-paragraf-display id="dateWidget" class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        <!-- Data -->
                                    </x-paragraf-display>
                                </x-flex-center>

                                <!-- Timer -->
                                <x-flex-center>
                                    <x-paragraf-display class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                                        <div class="flex flex-row gap-2 justify-start items-center">
                                            <div class="text-7xl mx-2">{{ $icons[$date['leave']] ?? '' }}</div>
                                            <div class="flex flex-col gap-2 items-center md:items-start">
                                                <div class="text-2xl inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 mb-1">{{ $date['leave'] ?? '' }}</div>
                                                <span class="px-3 py-1 rounded-full text-md w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    {{ $shortType[$date['leave']] ?? '' }}
                                                </span>
                                            </div>
                                        </div>
                                    </x-paragraf-display>
                                </x-flex-center>
                            </div>
                        </x-widget-display-nav>
                    </x-container>
                    @elseif($date['isHoliday'] == true)
                    <x-container class="">
                        <x-widget-display-nav class="grid grid-cols-1 gap-4 p-4 w-full">
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
                                <x-flex-center>
                                    <x-paragraf-display id="dateWidget" class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        <!-- Data -->
                                    </x-paragraf-display>
                                </x-flex-center>

                                <!-- Timer -->
                                <x-flex-center>
                                    <x-paragraf-display class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                                        <div class="flex flex-row gap-2 justify-start items-center">
                                            <div class="text-7xl mx-2">🎌</div>
                                            <div class="flex flex-col gap-2 items-center md:items-start">
                                                <div class="text-2xl inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 mb-1">Święto ustawowo wolne</div>
                                                <span class="px-3 py-1 rounded-full text-md w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    ŚUW
                                                </span>
                                            </div>
                                        </div>
                                    </x-paragraf-display>
                                </x-flex-center>
                            </div>
                        </x-widget-display-nav>
                    </x-container>
                    @elseif($date['leave'] == null)
                    <x-container class="">
                        <x-widget-display-nav class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 w-full">
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
                                <x-flex-center>
                                    <x-paragraf-display id="dateWidget" class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        <!-- Data -->
                                    </x-paragraf-display>
                                </x-flex-center>

                                <!-- Timer -->
                                <x-flex-center>
                                    <x-paragraf-display id="timerWidget" class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                                        00:00:00
                                    </x-paragraf-display>
                                </x-flex-center>

                                <x-flex-center>
                                    <x-paragraf-display id="locationWidget" class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        LOKALIZACJA ZOSTANIE POBRANA W MOMENCIE KLIKNIĘCIA
                                    </x-paragraf-display>
                                </x-flex-center>
                            </div>


                            <!-- Prawa kolumna: Przyciski -->
                            <div class="flex flex-col justify-center items-center space-y-6">
                                <button
                                    id="startButtonWidget"
                                    class="text-2xl min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-play mr-2"></i>Start
                                </button>
                                <!-- Przycisk Stop -->
                                <button
                                    id="stopButtonWidget"
                                    class="hidden text-2xl  min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-stop mr-2"></i>Stop
                                </button>
                            </div>
                        </x-widget-display-nav>
                    </x-container>
                    @endif
                    <!--HEADER-->
                    <div class="flex flex-col w-full md:pt-4 md:px-4">
                        <x-h1-display class="text-center md:text-start my-4 md:my-0">
                            📅 Kalendarz
                        </x-h1-display>
                    </div>
                    <!--HEADER-->
                    <livewire:calendar-view />
                </div>
            </div>
        </div>
    </div>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>