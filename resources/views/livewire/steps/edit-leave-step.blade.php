@php
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

<div>
    <div>
        <div class="mb-4" id="leave-requests">
            <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">📋 Rodzaje wniosków</h3>
            <ul class="grid w-full gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach($icons as $type => $icon)
                @php $shortcut = [
                'wolne za pracę w święto' => 'WPS',
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
                ][$type]; @endphp

                <li>
                    <input name="type" wire:model="state.type" type="radio" id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                    <label for="{{ Str::slug($type) }}" class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-xl shadow cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                        <div class="flex flex-row gap-2 justify-start items-center">
                            <div class="text-4xl mx-2">{{ $icon }}</div>
                            <div class="flex flex-col gap-2">
                                <div class="text-lg font-semibold mb-1">{{ $type }}</div>
                                <span class="px-3 py-1 rounded-full text-sm w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    {{ $shortcut }}
                                </span>
                            </div>
                        </div>
                    </label>
                </li>
                @endforeach
            </ul>
            <p class="text-red-500 text-sm mt-1 dark:text-red-400">{{ $message ?? '' }}</p>
        </div>
    </div>
</div>