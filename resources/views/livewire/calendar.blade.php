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
    <div>
        <div class="md:mx-4 relative mb-3 border-gray-300">
            <input
                value="{{ $selectedDate }}"
                type="text"
                id="start"
                placeholder="Niżej wybierz datę"
                readonly
                class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
            <span
                id="toggleDatepicker"
                class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                <i class="fa-solid fa-calendar-days"></i>
            </span>
        </div>
        <div class="flex justify-between items-center mb-4 md:mx-4 mt-8">
            <span class="text-md md:text-lg font-bold text-gray-800 dark:text-white">{{ $monthName }}</span>
            <div class="space-x-2 md:space-x-0">
                <button wire:click="goToPreviousMonth" class="text-gray-600 dark:text-white" type="button">
                    <i class="fa-solid fa-chevron-left"></i><span class="md:hidden mx-1">poprzedni</span>
                </button>
                <button wire:click="goToNextMonth" class="text-gray-600 dark:text-white" type="button">
                    <span class="md:hidden mx-1">następny</span><i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <x-container>
            <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium rounded-lg">
                {{-- Nagłówki dni tygodnia --}}
                @foreach (['Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'So', 'Nd'] as $dayName)
                <div class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white py-2 m-0.5 text-center  rounded-lg">
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
                        :class="clicked ? 'border-red-500 dark:border-red-500' : (
                            '{{ $selectedDate === $day['date']->format('Y-m-d') ? ($day['leave'] || $day['isHoliday'] ? 'border-red-400 dark:border-red-500' : 'border-green-500 dark:border-green-400') : 'border-gray-200 dark:border-gray-800' }}'
                        )"    
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
                            @if ($selectedDate === $day['date']->format('Y-m-d'))
                                @if ($day['leave'] || $day['isHoliday'] || $day['rcp'])
                                    border-red-400 dark:border-red-500
                                @else
                                    border-green-500 dark:border-green-400
                                @endif
                            @else
                                border-gray-200 dark:border-gray-800
                            @endif
                        ">
                        <div class="flex flex-col items-start justify-start">
                            @if ($day['date']->isToday())
                                <div class="text-white bg-red-500 dark:bg-red-700 rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mb-1">
                                    {{ $day['date']->day }} 
                                </div>
                            @else
                                <div class="text-gray-700 dark:text-white text-[11px] font-semibold mb-1">
                                    {{ $day['date']->day }}
                                </div>
                            @endif
                        </div>
                        @if ($day['isHoliday'])
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl">{{ $icons['święto'] ?? '' }}</span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-400 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    {{ $shortType['święto'] ?? '' }}
                                </span>
                            </div>
                        @elseif ($day['rcp'])
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl">⏱️</span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-400 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    RCP
                                </span>
                            </div>
                        @elseif ($day['leave'])
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl">{{ $icons[$day['leave']] ?? '' }}</span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-400 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    {{ $shortType[$day['leave']] ?? '' }}
                                </span>
                            </div>
                        @endif
                    </button>
                @endforeach
                @endforeach
            </div>
        </x-container>
    </div>