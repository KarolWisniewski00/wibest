<div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <label for="datepicker" class="mx-4 my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                📅 Wniosek od
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
            <label for="datepicker" class="mx-4 my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                📅 Wniosek do
            </label>
            <input
                type="hidden"
                wire:model="state.end_time"
                name="end_time"
                class="">
            <livewire:calendar selectedDate="{{$this->getState()['end_time']}}" typeTime="end_time" userId="{{ array_key_exists('user_id', $this->getState()) ? $this->getState()['user_id'] : auth()->user()->id }}" />
        </div>
    </div>
</div>