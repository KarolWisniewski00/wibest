<div>
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
                :leaveId="$this->getState()['leave_id'] ?? null"
                leave="true"
                userId="{{ array_key_exists('user_id', $this->getState()) ? $this->getState()['user_id'] : auth()->user()->id }}"
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
                :leaveId="$this->getState()['leave_id'] ?? null"
                leave="true"
                userId="{{ array_key_exists('user_id', $this->getState()) ? $this->getState()['user_id'] : auth()->user()->id }}"
                :key="time()" />
        </div>
    </div>
</div>