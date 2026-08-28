<div>
    <div class="grid grid-cols-1 gap-4">
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
        </div>
    </div>
</div>