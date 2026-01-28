<div>
    @php
    $days = [
    ['id' => 'monday', 'name' => 'poniedziałek', 'icon' => '🌑', 'desc' => 'Restart i skupienie', 'color' => 'bg-blue-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-blue-400 dark:peer-checked:border-blue-400'],
    ['id' => 'tuesday', 'name' => 'wtorek', 'icon' => '🌱', 'desc' => 'Energia do działania', 'color' => 'bg-green-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-green-400 dark:peer-checked:border-green-400'],
    ['id' => 'wednesday', 'name' => 'środa', 'icon' => '🔥', 'desc' => 'Punkt kulminacyjny', 'color' => 'bg-orange-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-orange-400 dark:peer-checked:border-orange-400'],
    ['id' => 'thursday', 'name' => 'czwartek', 'icon' => '🌸', 'desc' => 'Lekkość i flow', 'color' => 'bg-pink-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-pink-400 dark:peer-checked:border-pink-400'],
    ['id' => 'friday', 'name' => 'piątek', 'icon' => '🌞', 'desc' => 'Radość i nagroda', 'color' => 'bg-yellow-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-yellow-400 dark:peer-checked:border-yellow-400'],
    ['id' => 'saturday', 'name' => 'sobota', 'icon' => '🌊', 'desc' => 'Swoboda i regeneracja', 'color' => 'bg-cyan-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-cyan-400 dark:peer-checked:border-cyan-400'],
    ['id' => 'sunday', 'name' => 'niedziela', 'icon' => '🌙', 'desc' => 'Spokój i refleksja', 'color' => 'bg-purple-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-purple-400 dark:peer-checked:border-purple-400'],
    ];
    @endphp

    <div class="mb-6" id="days">
        <x-label-form value="📅 Wybierz rozpoczęcie tygodnia pracy" />
        <ul class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-2 w-full">
            @foreach($days as $day)
            <li class="flex items-center justify-center h-full">
                <input
                    type="radio"
                    id="start-{{ $day['id'] }}"
                    name="start-day"
                    wire:model="state.working_hours_start_day"
                    value="{{ $day['name'] }}"
                    class="hidden peer">
                <label for="start-{{ $day['id'] }}"
                    class="flex flex-col items-center justify-center h-full w-full text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-xl  cursor-pointer {{ $day['borderColor'] }} hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 p-2">
                    <div class="flex flex-col items-center justify-center w-full h-full gap-2">
                        <div class="text-3xl sm:text-4xl">{{ $day['icon'] }}</div>
                        <span class="px-2 py-1 rounded-full font-bold {{ $day['color'] }} {{ $day['labelColor'] }} uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs sm:text-sm md:text-base text-center w-full truncate">
                            {{ $day['name'] }}
                        </span>
                        <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm text-center w-full truncate">
                            {{ $day['desc'] }}
                        </p>
                    </div>
                </label>
            </li>
            @endforeach
        </ul>

        <x-label-form class="mt-4" value="📅 Wybierz zakończenie tygodnia pracy" />
        <ul class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-2 w-full">
            @foreach($days as $day)
            <li class="flex items-center justify-center h-full">
                <input
                    type="radio"
                    id="stop-{{ $day['id'] }}"
                    name="stop-day"
                    wire:model="state.working_hours_stop_day"
                    value="{{ $day['name'] }}"
                    class="hidden peer">
                <label for="stop-{{ $day['id'] }}"
                    class="flex flex-col items-center justify-center h-full w-full text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-xl  cursor-pointer {{ $day['borderColor'] }} hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 p-2">
                    <div class="flex flex-col items-center justify-center w-full h-full gap-2">
                        <div class="text-3xl sm:text-4xl">{{ $day['icon'] }}</div>
                        <span class="px-2 py-1 rounded-full font-bold {{ $day['color'] }} {{ $day['labelColor'] }} uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs sm:text-sm md:text-base text-center w-full truncate">
                            {{ $day['name'] }}
                        </span>
                        <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm text-center w-full truncate">
                            {{ $day['desc'] }}
                        </p>
                    </div>
                </label>
            </li>
            @endforeach
        </ul>
    </div>
</div>