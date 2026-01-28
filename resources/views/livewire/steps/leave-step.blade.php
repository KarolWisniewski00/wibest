@php
// 1. Definicja ikon
$icons = [
'wolne za pracę w święto' => '🕊️',
'zwolnienie lekarskie' => '🤒',
'urlop wypoczynkowy' => '🏖️',
'wolne za nadgodziny' => '⏰',
'wolne za święto w sobotę' => '🗓️',
'urlop bezpłatny' => '💸',
'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
'urlop okolicznościowy' => '🎉',
'urlop wypoczynkowy "na żądanie"' => '📢',
'oddanie krwi' => '🩸',
'świadczenie rehabilitacyjne' => '🦾',
'opieka' => '🧑‍🍼',
'urlop ojcowski' => '👨‍👧',
'urlop macieżyński' => '🤱',
'urlop rodzicielski' => '👶',
'świadek w sądzie' => '⚖️',
'praca zdalna' => '💻',
'kwarantanna' => '🦠',
'kwarantanna z pracą zdalną' => '🏠💻',
'delegacja' => '✈️',
];

// 2. Definicja skrótów (przeniesiona poza pętlę)
$shortcuts = [
'wolne za pracę w święto' => 'WPS',
'zwolnienie lekarskie' => 'ZL',
'urlop wypoczynkowy' => 'UW',
'wolne za nadgodziny' => 'WN',
'wolne za święto w sobotę' => 'WSS',
'urlop bezpłatny' => 'UB',
'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
'zwolnienie lekarsie - opieka' => 'ZLO',
'urlop okolicznościowy' => 'UO',
'urlop wypoczynkowy "na żądanie"' => 'UWZ',
'oddanie krwi' => 'OK',
'świadczenie rehabilitacyjne' => 'SR',
'opieka' => 'OP',
'urlop ojcowski' => 'UOJC',
'urlop macieżyński' => 'UM',
'urlop rodzicielski' => 'UR',
'świadek w sądzie' => 'SWS',
'praca zdalna' => 'PZ',
'kwarantanna' => 'KW',
'kwarantanna z pracą zdalną' => 'KWZPZ',
'delegacja' => 'DEL'
];

// 3. Obliczenia dla Alpine.js
$itemCount = count($icons);
$maxLimit = 9;
@endphp

<div>
    <div>
        <div class="mb-4" id="leave-requests">
            <x-label-form value="📋 Rodzaje wniosków" />
            <div
                x-data="{
                    showAll: false,
                    limit: 4,
                    itemCount: {{ $itemCount }},
                    updateLimit() {
                    this.limit = window.matchMedia('(min-width: 1280px)').matches ? 9 : 
                                window.matchMedia('(min-width: 1024px)').matches ? 8 : 4;
                    },
                    get canShowMore() {
                        return this.itemCount > this.limit;
                    }
                }"
                x-init="updateLimit(); window.addEventListener('resize', updateLimit)"
                class="relative">

                <ul class="grid w-full gap-4 lg:grid-cols-2 xl:grid-cols-3">
                    {{-- POPRAWIONA PĘTLA: Używamy $loop->index zamiast $index --}}
                    @foreach($icons as $type => $icon)
                    @php
                    $shortcut = $shortcuts[$type];
                    $loggedInUser = auth()->user();
                    @endphp


                    @if($loggedInUser->gender == 'female' && $shortcut == 'UR')
                    {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                    <li
                        x-show="showAll || {{ $loop->index }} < limit"
                        @if ($loop->index >= $maxLimit)
                        style="display: none"
                        @endif
                        >
                        <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio" id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                        <label for="{{ Str::slug($type) }}" class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                            <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                        </label>
                    </li>
                    @elseif($loggedInUser->gender == 'female' && $shortcut == 'UM')
                    {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                    <li
                        x-show="showAll || {{ $loop->index }} < limit"
                        @if ($loop->index >= $maxLimit)
                        style="display: none"
                        @endif
                        >
                        <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio" id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                        <label for="{{ Str::slug($type) }}" class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                            <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                        </label>
                    </li>
                    @elseif($loggedInUser->gender == 'male' && $shortcut == 'UOJC')
                    {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                    <li
                        x-show="showAll || {{ $loop->index }} < limit"
                        @if ($loop->index >= $maxLimit)
                        style="display: none"
                        @endif
                        >
                        <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio" id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                        <label for="{{ Str::slug($type) }}" class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                            <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                        </label>
                    </li>
                    @elseif($loggedInUser->gender && $shortcut != 'UM' && $shortcut != 'UR' && $shortcut != 'UOJC')
                    {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                    <li
                        x-show="showAll || {{ $loop->index }} < limit"
                        @if ($loop->index >= $maxLimit)
                        style="display: none"
                        @endif
                        >
                        <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio" id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                        <label for="{{ Str::slug($type) }}" class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                            <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                        </label>
                    </li>
                    @elseif(!$loggedInUser->gender)
                    {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                    <li
                        x-show="showAll || {{ $loop->index }} < limit"
                        @if ($loop->index >= $maxLimit)
                        style="display: none"
                        @endif
                        >
                        <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio" id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                        <label for="{{ Str::slug($type) }}" class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                            <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                        </label>
                    </li>
                    @endif
                    @endforeach
                </ul>

                @if ($itemCount > $maxLimit)

                {{-- Gradient --}}
                <div x-show="!showAll && canShowMore"
                    class="pointer-events-none absolute bottom-[62px] left-0 w-full h-24 bg-gradient-to-t from-white dark:from-gray-800/70 to-transparent">
                </div>

                {{-- Przycisk pokaż więcej --}}
                <div class="flex items-center justify-center w-full">
                    <x-button-back x-show="!showAll && canShowMore"
                        type="button"
                        class="mt-4 text-lg w-full md:w-fit flex items-center justify-center"
                        @click="showAll = true">
                        Pokaż więcej
                    </x-button-back>
                </div>

                @endif

            </div>

            <p class="text-red-500 text-sm mt-1 dark:text-red-400">{{ $message ?? '' }}</p>
        </div>
    </div>
</div>