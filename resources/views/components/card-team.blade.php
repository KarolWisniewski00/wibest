@props(['user'])
<li class="snap-center">
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-4">

            @if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
            @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
            @php
            $status = $user->getToday();
            @endphp
            @if($status['status'] == 'warning')
            <x-alert-link href="">
                {{ $status['message'] }}
            </x-alert-link>
            @elseif($status['status'] == 'success')
            <x-success-link href="">
                {{ $status['message'] }}
            </x-success-link>
            @else
            <x-danger-link href="">
                {{ $status['message'] }}
            </x-danger-link>
            @endif

            @if($status['timing'])
            <div class="italic text-xs text-gray-500 dark:text-gray-500 text-start">
                {{ $status['timing'] }}
            </div>
            @endif

            @if($status['type'] == 'rcp' && ($status['start'] || $status['stop']))
            <div class="w-fit flex flex-row items-center justify-center gap-2 rounded-2xl ">

                {{-- Ikonka + typ --}}
                <div class="flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        ⏱️
                    </span>
                    <x-label-green class="mt-1">
                        RCP
                    </x-label-green>
                </div>

                {{-- Dane szczegółowe --}}
                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                    <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                        <x-status-dark>
                            @if($status['start'])
                            <span>{{ \Carbon\Carbon::parse($status['start'])->format('H:i') }}</span>
                            @endif

                            @if($status['start'] && $status['stop'])
                            <span> - </span>
                            @endif

                            @if($status['stop'])
                            <span>{{ \Carbon\Carbon::parse($status['stop'])->format('H:i') }}</span>
                            @endif
                        </x-status-dark>
                    </x-paragraf-display>
                    @if($status['worked_time'])
                    <x-paragraf-display class="text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                        <span>{{ $status['worked_time'] }}</span>
                    </x-paragraf-display>
                    @endif
                </div>
            </div>
            @endif

            @if($status['type'] == 'leave')
            <div class="w-fit flex flex-row items-center justify-center gap-2 rounded-2xl ">

                {{-- Ikonka + typ --}}
                <div class="flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        {{ config('leavetypes.icons.' . $status['timing'], '') }}
                    </span>
                    <x-label-pink class="mt-1">
                        {{ config('leavetypes.shortType.' . $status['timing'], '') }}
                    </x-label-pink>
                </div>

                {{-- Dane szczegółowe --}}
                <div class="flex flex-col md:flex-col gap-3 text-sm md:text-base text-gray-800 dark:text-gray-100">
                    <x-paragraf-display class="text-xs whitespace-nowrap">
                        <x-status-cello>
                            @if($status['timing']) {{ \Carbon\Carbon::parse($status['start'])->format('d.m') }} @endif @if($status['start'] && $status['stop']) - @endif @if($status['stop']) {{ \Carbon\Carbon::parse($status['stop'])->format('d.m') }} @endif
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            @endif
            @endif
            @else
            @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
            <p class="text-start font-semibold text-gray-900 dark:text-gray-50">
                <x-alert-link href="{{route('team.user.planing', $user)}}" class="py-0">
                    Ustaw godziny pracy
                </x-alert-link>
            </p>
            @else
            <p class="text-start font-semibold text-gray-900 dark:text-gray-50">
                <x-alert-link href="" class="py-0">
                    Ustaw godziny pracy
                </x-alert-link>
            </p>
            @endif
            @endif

            <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$user" />
                <x-user-name :user="$user" />
            </div>

            <div class="flex space-x-3">
                <x-button-link-neutral href="{{route('team.user.show', $user)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
            </div>
        </div>
    </div>
</li>