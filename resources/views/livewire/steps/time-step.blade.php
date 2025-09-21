<div>
    <div class="space-y-6 md:px-2 py-4">
        <div class="mb-6" id="days">
            <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Wybierz godziny pracy</h3>
            <label for="end_time_clock" class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                ⏱️Wybierz godzinę rozpoczęcia
            </label>
            <div class="relative mb-3 border-gray-300">
                <input
                    type="time"
                    id="start_time_clock"
                    wire:model="state.working_hours_from"
                    step="3600"
                    required
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
            <label for="end_time_clock" class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                ⏱️Wybierz godzinę zakończenia
            </label>
            <div class="relative mb-3 border-gray-300">
                <input
                    type="time"
                    id="end_time_clock"
                    wire:model="state.working_hours_to"
                    step="3600"
                    required
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
        </div>
    </div>
</div>