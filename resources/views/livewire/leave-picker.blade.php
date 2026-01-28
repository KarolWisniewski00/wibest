<div>
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
    @if($type != '')
    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4">
        <span class="text-gray-900 dark:text-white">📋 Podgląd</span>
        <div class="h-[180px] flex flex-col items-center justify-center text-center 
                            w-full bg-pink-200 dark:bg-pink-400/60
                            rounded-2xl p-3 transition-colors duration-200 
                            hover:bg-pink-300 dark:hover:bg-pink-500/70">

            <!-- Ikona i label -->
            <div class="flex flex-col items-center justify-center h-full w-fit">
                <span class="text-2xl">{{ $icons[$type] ?? '' }}</span>
                <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-pink-300 text-gray-900 uppercase tracking-widest">
                    {{ $shortType[$type] ?? '' }}
                </span>
            </div>

            <!-- Dane szczegółowe -->
            <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                <div class="font-semibold tracking-widest uppercase">
                    {{$type}}
                </div>

                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                    @if($start_time_date != '')
                    {{
                        \Carbon\Carbon::parse($start_time_date)
                            ->locale('pl')
                            ->translatedFormat('D') 
                    }}
                    @else
                    Brak
                    @endif
                    –
                    @if($end_time_date != '')
                    {{
                        \Carbon\Carbon::parse($end_time_date)
                            ->locale('pl')
                            ->translatedFormat('D') 
                    }}
                    @else
                    Brak
                    @endif
                </div>
            </div>

            <!-- Opis -->
            <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                WNIOSEK
            </p>

        </div>
    </div>
    @endif
</div>