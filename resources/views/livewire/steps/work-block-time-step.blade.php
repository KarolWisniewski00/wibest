<div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 gap-4">
        <!-- STOP -->
        <div>
            <x-label-form for="start_time_clock" value="⏱️ Wybierz godzinę rozpoczęcia" />
            <div class="relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="start_time_clock"
                    wire:model="state.start_time_clock"
                    wire:change="getTimeAndTypeChecked"
                    required
                    step="1"
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
            <x-label-form for="end_time_clock" value="⏱️ Wybierz godzinę zakończenia" />
            <div class=" relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="end_time_clock"
                    wire:model="state.end_time_clock"
                    wire:change="getTimeAndTypeChecked"
                    step="1"
                    required
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
            <x-label-form for="night" value="🌙 Wybierz czy zmiana nocna" />
            <div class="mb-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 space-y-6">
                <div class="flex flex-col xl:flex-row xl:items-center gap-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Zmiana nocna</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Włącz, jeśli chcesz, aby godzina zakończenia była następnego dnia.
                        </p>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                            <i class="fa-regular fa-lightbulb text-yellow-400 mr-2"></i>
                            Możliwy zapis tylko jeśli następny dzień jest wolny lub jest zmiana nocna.
                        </div>
                    </div>
                    <label class="inline-flex items-center xl:justify-end xl:w-48">
                        <input type="checkbox" class="sr-only peer"
                            name="night"
                            wire:change="getTimeAndTypeChecked"
                            wire:model="state.night">
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