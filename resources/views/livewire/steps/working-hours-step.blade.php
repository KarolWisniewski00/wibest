<div>
    <div class="grid grid-cols-1 gap-4 mt-4">
        <div class="mb-6" id="working_hours_regular">
            <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Stałe czy zmienne godziny pracy?</h3>
            <ul class="grid w-full gap-6 md:grid-cols-2">
                <li>
                    <input name="working_hours_regular-true" wire:model="state.working_hours_regular" type="radio" id="working_hours_regular-true" value="true" class="hidden peer">
                    <label for="working_hours_regular-true" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="flex items-center gap-4">
                            <div class="text-2xl">🕒</div>
                            <div>
                                <div class="text-lg font-semibold mb-1">Stałe godziny pracy regulowane przez ustawienia niżej</div>
                            </div>
                        </div>
                    </label>
                </li>
                <li>
                    <input name="working_hours_regular-false" wire:model="state.working_hours_regular" type="radio" id="working_hours_regular-false" value="false" class="hidden peer">
                    <label for="working_hours_regular-false" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="flex items-center gap-4">
                            <div class="text-2xl">📅</div>
                            <div>
                                <div class="text-lg font-semibold mb-1">Zmienne godziny pracy regulowane przez harmonogram</div>
                            </div>
                        </div>
                    </label>
                </li>
            </ul>
        </div>
        <div>
            <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Od której do której chcesz stałe godziny?</h3>
            <!-- Dodane przyciski ustawień godzin -->
            <div class="grid w-full md:grid-cols-2 mt-8 gap-6 text-xl">
                <div class="flex items-center w-full justify-center gap-4">
                    <div class="flex items-center">
                        <x-button-link-red href="" class="text-2xl mx-3 px-4 py-4">
                            -
                        </x-button-link-red>
                        <span class="px-12 py-4 text-2xl font-bold bg-gray-100 border-t border-b border-gray-300 select-none dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 rounded-lg">
                            {{ $state['working_hours'] ?? 8 }}
                        </span>
                        <x-button-link-green href="" class="text-2xl mx-3 px-4 py-4">
                            +
                        </x-button-link-green>
                    </div>
                    <div class="flex flex-col items-center gap-4">
                        <div class="flex flex-row items-center gap-3">
                            <label for="working_hours_from" class="text-gray-700 dark:text-gray-300 font-semibold text-lg">Od</label>
                            <input
                                type="time"
                                id="working_hours_from"
                                wire:model="state.working_hours_from"
                                class="w-32 h-12 mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-2xl font-bold text-center">
                        </div>
                        <div class="flex flex-row items-center gap-3">
                            <label for="working_hours_to" class="text-gray-700 dark:text-gray-300 font-semibold text-lg">Do</label>
                            <input
                                type="time"
                                id="working_hours_to"
                                wire:model="state.working_hours_to"
                                class="w-32 h-12 mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-2xl font-bold text-center">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <button type="button"
                        class="px-6 py-3 w-64 bg-gray-200 rounded-lg text-gray-900 font-bold text-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        wire:click="$set('state.working_hours_from', '07:00'); $set('state.working_hours_to', '15:00')">
                        Ustaw 7-15
                    </button>
                    <button type="button"
                        class="px-6 py-3 w-64 bg-gray-200 rounded-lg text-gray-900 font-bold text-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        wire:click="$set('state.working_hours_from', '08:00'); $set('state.working_hours_to', '16:00')">
                        Ustaw 8-16<br>
                        <span class="font-bold text-green-600 dark:text-green-400">Najczęściej wybierane</span>
                    </button>
                    <button type="button"
                        class="px-6 py-3 w-64 bg-gray-200 rounded-lg text-gray-900 font-bold text-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        wire:click="$set('state.working_hours_from', '09:00'); $set('state.working_hours_to', '17:00')">
                        Ustaw 9-17
                    </button>
                    <button type="button"
                        class="px-6 py-3 w-64 bg-gray-200 rounded-lg text-gray-900 font-bold text-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        wire:click="$set('state.working_hours_from', '06:00'); $set('state.working_hours_to', '14:00')">
                        Ustaw 6-14
                    </button>
                    <button type="button"
                        class="px-6 py-3 w-64 bg-gray-200 rounded-lg text-gray-900 font-bold text-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        wire:click="$set('state.working_hours_from', '10:00'); $set('state.working_hours_to', '18:00')">
                        Ustaw 10-18
                    </button>
                    <button type="button"
                        class="px-6 py-3 w-64 bg-gray-200 rounded-lg text-gray-900 font-bold text-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        wire:click="$set('state.working_hours_from', '12:00'); $set('state.working_hours_to', '20:00')">
                        Ustaw 12-20
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>