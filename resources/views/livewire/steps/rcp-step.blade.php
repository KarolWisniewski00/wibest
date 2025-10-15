<div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <label for="datepicker" class="my-4 block text-sm font-medium text-gray-700 dark:text-gray-300">
                📅 Wybierz dzień
            </label>
            <!-- START -->
            <input
                name="start_time"
                wire:model="state.start_time"
                type="hidden"
                class="" />
            <livewire:calendar selectedDate="{{$this->getState()['start_time']}}" typeTime="start_time" userId="{{ array_key_exists('user_id', $this->getState()) ? $this->getState()['user_id'] : auth()->user()->id }}" />
        </div>

        <!-- STOP -->
        <div>
            <label for="start_time_clock" class="my-4 block text-sm font-medium text-gray-700 dark:text-gray-300">
                ⏱️Wybierz godzinę rozpoczęcia
            </label>
            <div class="relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="start_time_clock"
                    wire:model="state.start_time_clock"
                    required
                    step="1"
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
            <label for="end_time_clock" class=" my-4 block text-sm font-medium text-gray-700 dark:text-gray-300">
                ⏱️Wybierz godzinę zakończenia
            </label>
            <div class=" relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="end_time_clock"
                    wire:model="state.end_time_clock"
                    step="1"
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