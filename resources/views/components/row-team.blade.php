@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

    <td class="px-2 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$user" />
            <x-user-name :user="$user" />
        </div>
    </td>

    <td class="px-2 py-2">
        @if($user->working_hours_regular != null)
        @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel' || $user->id == auth()->user()->id)
        @php
        $status = $user->getToday();
        @endphp
        @if($status['status'] == 'warning')
        <x-alert-span href="">
            {{ $status['message'] }}
        </x-alert-span>
        @elseif($status['status'] == 'success')
        <x-success-span href="">
            {{ $status['message'] }}
        </x-success-span>
        @else
        <x-danger-span href="">
            {{ $status['message'] }}
        </x-danger-span>
        @endif

        @if($status['timing'])
        <div class="italic text-xs text-gray-500 dark:text-gray-500">
            {{ $status['timing'] }}
        </div>
        @endif

        @if($status['type'] == 'rcp' && ($status['start'] || $status['stop']))
        <div class="flex flex-col md:flex-row items-center justify-center gap-2  px-2 py-2 rounded-2xl ">

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
            <div class="flex flex-col items-center md:flex-col gap-3 text-sm md:text-base text-gray-800 dark:text-gray-100">
                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                    <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                        <x-status-dark>
                            @if($status['start']) {{ \Carbon\Carbon::parse($status['start'])->format('H:i') }} @endif @if($status['stop']) - {{ \Carbon\Carbon::parse($status['stop'])->format('H:i') }} @else - TERAZ @endif
                        </x-status-dark>
                    </x-paragraf-display>
                    @if($status['worked_time'])
                    @if($status['stop'])
                    <x-paragraf-display class="text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                        <span>{{ $status['worked_time'] }}</span>
                    </x-paragraf-display>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        @endif

        @if($status['type'] == 'leave')
        <div class="flex flex-col md:flex-row items-center justify-center gap-2  px-2 py-2 rounded-2xl ">

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
        <x-alert-span href="{{ route('team.user.config_planing', $user->id) }}">
            Konfiguracja
        </x-alert-span>
        @else
        <x-alert-span href="">
            Konfiguracja
        </x-alert-span>
        @endif

        @endif
    </td>

    <x-show-cell href="{{route('team.user.show', $user)}}" />
</tr>