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
        'urlop okolicznościowy' => '📌',
        'urlop wypoczynkowy "na żądanie"' => '📢',
        'oddanie krwi' => '🩸',
        'urlop ojcowski' => '👨‍👧',
        'urlop macieżyński' => '🤱',
        'urlop rodzicielski' => '👶',
        'świadczenie rehabilitacyjne' => '🦾',
        'opieka' => '🧑‍🍼',
        'opieka nad dzieckiem do 14 lat' => '👨‍👩‍👧',
        'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
        'świadek w sądzie' => '⚖️',
        'praca zdalna' => '💻',
        'kwarantanna' => '🦠',
        'kwarantanna z pracą zdalną' => '🏠💻',
        'delegacja' => '✈️',
        'siła wyższa' => '⚡',
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
        'urlop okolicznościowy' => 'UO',
        'urlop wypoczynkowy "na żądanie"' => 'UWZ',
        'oddanie krwi' => 'OK',
        'urlop ojcowski' => 'UOJC',
        'urlop macieżyński' => 'UM',
        'urlop rodzicielski' => 'UR',
        'świadczenie rehabilitacyjne' => 'SR',
        'opieka' => 'OP',
        'opieka nad dzieckiem do 14 lat' => 'OD14',
        'zwolnienie lekarsie - opieka' => 'ZLO',
        'świadek w sądzie' => 'SWS',
        'praca zdalna' => 'PZ',
        'kwarantanna' => 'KW',
        'kwarantanna z pracą zdalną' => 'KWZPZ',
        'delegacja' => 'DEL',
        'siła wyższa' => 'SW',
    ];

    // 3. Obliczenia dla Alpine.js
    $itemCount = count($icons);
    $maxLimit = 9;
@endphp

<div>
    <div>
        <div class="mb-4" id="leave-requests">
            <x-label-form value="📋 Rodzaje wniosków" />
            <div x-data="{
    showAll: false,
    search: '',
    limit: 4,
    itemCount: {{ $itemCount }},

    updateLimit() {
        this.limit = window.matchMedia('(min-width: 1280px)').matches
            ? 9
            : window.matchMedia('(min-width: 1024px)').matches
                ? 8
                : 4;
    },

    matches(type, shortcut) {
        const query = this.search.trim().toLocaleLowerCase('pl-PL');

        if (!query) return true;

        return type.toLocaleLowerCase('pl-PL').includes(query)
            || shortcut.toLocaleLowerCase('pl-PL').includes(query);
    },

    get canShowMore() {
        return this.itemCount > this.limit;
    }
}" x-init="updateLimit(); window.addEventListener('resize', updateLimit)" class="relative">

                {{-- Wyszukiwarka rodzajów wniosków --}}
                <div class="relative mb-4">

                    <input type="search" x-model="search" @input="showAll = search.trim().length > 0"
                        placeholder="Szukaj rodzaju wniosku..." aria-label="Szukaj rodzaju wniosku" class="w-full rounded-xl border border-gray-200 bg-white
               p-3 text-sm text-gray-800
               placeholder:text-gray-400
               focus:border-green-400 focus:outline-none
               focus:ring-2 focus:ring-green-400/20
               dark:border-gray-700 dark:bg-gray-800
               dark:text-gray-100 dark:placeholder:text-gray-500" />

                    <button type="button" x-cloak x-show="search.length > 0" @click="search = ''; showAll = false"
                        aria-label="Wyczyść wyszukiwanie" class="absolute inset-y-0 right-0 flex items-center px-4
               text-gray-400 transition hover:text-gray-700
               dark:hover:text-gray-200">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <p x-cloak x-show="search.trim().length > 0" class="mb-3 text-sm text-gray-500 dark:text-gray-400"
                    aria-live="polite">
                    Wyniki wyszukiwania
                </p>

                <ul class="grid w-full gap-4 lg:grid-cols-2 xl:grid-cols-3">
                    {{-- POPRAWIONA PĘTLA: Używamy $loop->index zamiast $index --}}
                    @foreach($icons as $type => $icon)
                        @php
                            $shortcut = $shortcuts[$type];
                            try {
                                $state = $this->getState();
                                $loggedInUser = \App\Models\User::where('id', $state['user_id'])->first();
                            } catch (\Exception $e) {
                                // Obsługa wyjątku, np. logowanie błędu
                                $loggedInUser = auth()->user();
                            }
                        @endphp


                        @if($loggedInUser->gender == 'female' && $shortcut == 'UR')
                            {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                            <li x-show="matches(@js($type), @js($shortcut)) &&
                                    (search.trim().length > 0 || showAll || {{ $loop->index }} < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                                <label for="{{ Str::slug($type) }}"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                                </label>
                            </li>
                        @elseif($shortcut == 'UW')
                            {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                            <li x-show="matches(@js($type), @js($shortcut)) &&
                                    (search.trim().length > 0 || showAll || {{ $loop->index }} < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                                <label for="{{ Str::slug($type) }}"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                                    @if($this->getLeaveFree() <= 0)
                                        <span
                                            class="text-xs font-semibold text-yellow-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                            w {{ now()->year }} pozostało: BRAK DAYCH
                                        </span>
                                    @else
                                        <span
                                            class="text-xs font-semibold text-green-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                            w {{ now()->year }} pozostało: {{ $this->getLeaveFree() }} dni
                                        </span>
                                    @endif
                                </label>
                            </li>
                        @elseif($loggedInUser->gender == 'female' && $shortcut == 'UM')
                            {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                            <li x-show="matches(@js($type), @js($shortcut)) &&
                                    (search.trim().length > 0 || showAll || {{ $loop->index }} < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                                <label for="{{ Str::slug($type) }}"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                                </label>
                            </li>
                        @elseif($loggedInUser->gender == 'male' && $shortcut == 'UOJC')
                            {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                            <li x-show="matches(@js($type), @js($shortcut)) &&
                                    (search.trim().length > 0 || showAll || {{ $loop->index }} < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                                <label for="{{ Str::slug($type) }}"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                                </label>
                            </li>
                        @elseif($loggedInUser->gender && $shortcut != 'UM' && $shortcut != 'UR' && $shortcut != 'UOJC')
                            {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                            <li x-show="matches(@js($type), @js($shortcut)) &&
                                    (search.trim().length > 0 || showAll || {{ $loop->index }} < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                                <label for="{{ Str::slug($type) }}"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                                </label>
                            </li>
                        @elseif(!$loggedInUser->gender)
                            {{-- Warunek ukrycia elementu przed JS i Alpine --}}
                            <li x-show="matches(@js($type), @js($shortcut)) &&
                                    (search.trim().length > 0 || showAll || {{ $loop->index }} < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="{{ Str::slug($type) }}" value="{{ $type }}" class="hidden peer">
                                <label for="{{ Str::slug($type) }}"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                        <x-button-back x-show="!showAll && canShowMore" type="button"
                            class="mt-4 text-lg w-full md:w-fit flex items-center justify-center" @click="showAll = true">
                            Pokaż więcej
                        </x-button-back>
                    </div>

                @endif

            </div>

            <p class="text-red-500 text-sm mt-1 dark:text-red-400">{{ $message ?? '' }}</p>
        </div>
    </div>
</div>