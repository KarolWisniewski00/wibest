    @php
    $shortType = ['wolne za pracę w święto' => 'WPS',
    'zwolnienie lekarskie' => 'ZL',
    'urlop wypoczynkowy' => 'UW',
    'urlop planowany' => 'UP',
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
    'delegacja' => 'DEL',
    'święto' => 'ŚUW'
    ];
    $icons = [
    'wolne za pracę w święto' => '🕊️',
    'zwolnienie lekarskie' => '🤒',
    'urlop wypoczynkowy' => '🏖️',
    'urlop planowany' => '🏖️',
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
    'święto' => '🎌',
    ];
    @endphp
    <x-container>
    <div class="mb-4">
        <div class="flex justify-between items-center my-4 px-1">
            <span class="text-md md:text-lg font-bold text-gray-900 dark:text-white">{{ $monthName }}</span>
            <div class="space-x-2 md:space-x-0">
                <button wire:click="goToPreviousMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                    <i class="fa-solid fa-chevron-left"></i><span class=" mx-1">pop</span>
                </button>
                <button wire:click="goToNextMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                    <span class=" mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <x-container-calendar>
            <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium rounded-lg">
                {{-- Nagłówki dni tygodnia --}}
                @foreach (['Pon', 'Wt', 'Śr', 'Czw', 'Pt', 'Sob', 'Ndz'] as $dayName)
                <div class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white py-2 m-0.5 text-center  rounded-lg">
                    {{ $dayName }}
                </div>
                @endforeach

                @foreach ($weeks as $week)
                @foreach ($week as $day)
                    <button
                    type="button"
                    
                        @if ($day['leave'] || $day['isHoliday'] || $day['rcp'])
                        x-data="{ clicked: false }"
                        @click="
                            $dispatch('calendar-unselect');
                            clicked = true
                        "
                        @calendar-unselect.window="clicked = false"
                        :class="border-gray-200 dark:border-gray-300"    
                        @else
                        wire:click="selectDate('{{ $day['date']->format('Y-m-d') }}', '{{ $typeTime }}')"
                        wire:key="day-{{ $day['date']->format('Y-m-d') }}"
                        @endif
                        @click="
                            $dispatch('calendar-unselect');
                            clicked = true
                        "
                        @calendar-unselect.window="clicked = false"
                        class="
                            bg-white dark:bg-gray-900 h-28 w-full relative p-2 border-2 rounded-lg
                            flex flex-col items-start justify-start
                            border-gray-200 dark:border-gray-800
                        ">
                        <div class="flex flex-col items-start justify-start">
                            @if ($day['date']->isToday())
                                <div class="text-gray-900 bg-red-300 dark:bg-red-300 rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mb-1">
                                    {{ $day['date']->day }} 
                                </div>
                            @else
                                <div class="text-gray-900 dark:text-white text-[11px] font-semibold mb-1">
                                    {{ $day['date']->day }}
                                </div>
                            @endif
                        </div>
                        @if ($day['rcp'])
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl">⏱️</span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    RCP
                                </span>
                            </div>
                        @elseif ($day['leave'])
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl">{{ $icons[$day['leave']] ?? '' }}</span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    {{ $shortType[$day['leave']] ?? '' }}
                                </span>
                            </div>
                        @elseif ($day['isHoliday'])
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl">{{ $icons['święto'] ?? '' }}</span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    {{ $shortType['święto'] ?? '' }}
                                </span>
                            </div>
                        @endif
                    </button>
                @endforeach
                @endforeach
            </div>
        </x-container-calendar>
    </div>
    </x-container>