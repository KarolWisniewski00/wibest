<div>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <x-label-form for="weekdays" value="📅 Wybierz dni tygodnia" />
            <div class="flex flex-col mb-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 space-y-6">
                <div class="flex-1 flex flex-col gap-4">
                    <h3 class="flex flex-row items-center text-lg font-medium text-gray-900 dark:text-gray-100">
                        <span class="ms-1">
                            Dni tygodnia
                        </span>
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Włącz te dni, które chcesz, aby w zakresie dat uwzględniono.
                    </p>
                </div>
                {{-- Lista dni tygodnia z polami wyboru --}}
                <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium">
                    @php
                    // Definicja dni tygodnia i ich wartości (np. 1 dla PON, 7 dla NDZ)
                    $days = [
                    ['name' => 'PON', 'value' => 1],
                    ['name' => 'WT', 'value' => 2],
                    ['name' => 'ŚR', 'value' => 3],
                    ['name' => 'CZW', 'value' => 4],
                    ['name' => 'PT', 'value' => 5],
                    ['name' => 'SOB', 'value' => 6],
                    ['name' => 'NDZ', 'value' => 7],
                    ];
                    // Dni domyślnie zaznaczone (PON - PT)
                    $defaultChecked = [1, 2, 3, 4, 5];
                    @endphp

                    @foreach ($days as $day)
                    @php
                    $isChecked = in_array($day['value'], $defaultChecked);
                    @endphp

                    <div class="flex flex-col items-center justify-center p-0.5 m-0.5">
                        {{-- Użycie ukrytego pola wejściowego i etykiety, stylizowane na przycisk/kafelek --}}
                        <input
                            type="checkbox"
                            id="day-{{ $day['value'] }}"
                            name="weekdays[]"
                            value="{{ $day['value'] }}"
                            wire:model.live="state.weekdays"
                            class="hidden peer" {{-- Ukrycie standardowego checkboxa --}}
                            @checked($isChecked) />
                        <label
                            for="day-{{ $day['value'] }}"
                            class="cursor-pointer select-none w-full py-2 text-center rounded-lg transition duration-150 ease-in-out bg-gray-200 hover:bg-gray-300 text-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 peer-checked:text-gray-900 peer-checked:bg-green-300 hover:peer-checked:bg-green-400 uppercase tracking-widest">
                            {{ $day['name'] }}
                        </label>
                    </div>
                    @endforeach
                </div>
                {{-- Dodanie ukrytego pola wejściowego (może być potrzebne, jeśli żadna opcja nie zostanie wybrana, by formularz przesłał pustą tablicę) --}}
                {{-- <input type="hidden" name="weekdays[]" value=""> --}}
            </div>
        </div>
    </div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="">
            <!-- START -->
            <input
                name="start_time"
                wire:model="state.start_time"
                type="hidden"
                class="" />
            <livewire:calendar-from-to-auto
                type="first"
                :startDate="$this->getState()['start_time'] ?? null"
                :endDate="$this->getState()['end_time'] ?? null"
                :currentMonth="session('first')"
                work_session="true"
                userId="{{ 
                    // Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? head($this->getState()['user_ids']) 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : auth()->user()->id 
                }}"
                multi="{{ 
                    // Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? false 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : true 
                }}"
                :key="time()" />
        </div>

        <!-- STOP -->
        <div class="">
            <input
                type="hidden"
                wire:model="state.end_time"
                name="end_time"
                class="">
            <livewire:calendar-from-to-auto
                type="second"
                :startDate="$this->getState()['start_time'] ?? null"
                :endDate="$this->getState()['end_time'] ?? null"
                :currentMonth="session('second')"
                work_session="true"
                userId="{{ 
                    // Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? head($this->getState()['user_ids']) 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : auth()->user()->id 
                }}"
                multi="{{ 
                    // Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? false 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : true 
                }}"
                :key="time()" />
        </div>
    </div>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <x-label-form for="holiday" value="🎌 Wybierz czy uwzględniać święta ustawowo wolne" />
            <div class="mb-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 space-y-6">
                <div class="flex flex-col xl:flex-row xl:items-center gap-4">
                    <div class="flex-1 flex flex-row gap-4">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-2xl md:text-3xl">🎌</span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 uppercase tracking-widest">
                                ŚUW
                            </span>
                        </div>
                        <div class="flex-1 flex flex-col gap-4">
                            <h3 class="flex flex-row items-center text-lg font-medium text-gray-900 dark:text-gray-100">
                                <span class="ms-1">
                                    Święta ustawowo wolne
                                </span>
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Włącz, jeśli chcesz, aby pomijać święta ustawowo wolne.
                            </p>
                        </div>
                    </div>
                    <label class="inline-flex items-center xl:justify-end xl:w-48">
                        <input type="checkbox" class="sr-only peer"
                            name="holiday"
                            checked
                            wire:model="state.holiday">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>