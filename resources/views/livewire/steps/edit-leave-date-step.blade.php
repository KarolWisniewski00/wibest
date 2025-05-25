<div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <!-- START -->
        <x-container-gray class="px-0">
            <x-text-cell class="mx-4">
                <p class="text-gray-700 dark:text-gray-300 text-sm">Start</p>
                <div class="flex justify-start items-center w-full">
                    <input
                        type="date"
                        wire:model="state.start_time"
                        name="start_time"
                        id="start"
                        class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold"
                        required>
                </div>
            </x-text-cell>
        </x-container-gray>

        <!-- STOP -->
        <x-container-gray class="px-0">
            <x-text-cell class="mx-4">
                <p class="text-gray-700 dark:text-gray-300 text-sm">Stop</p>
                <div class="flex justify-start items-center w-full">
                    <input
                        type="date"
                        wire:model="state.end_time" 
                        name="end_time"
                        id="end"
                        class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold"
                        required>
                </div>
            </x-text-cell>
        </x-container-gray>
    </div>
</div>