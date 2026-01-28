@props(['event'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-3 py-2">
        <x-flex-center>
            <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="{{ $event->id }}">
        </x-flex-center>
    </td>

    <td class="px-2 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$event->user" />
            <x-user-name :user="$event->user" />
        </div>
    </td>
    <td class="px-3 py-2 text-sm min-w-32">
        @if($event->status == 'oczekujące')
        <x-status-yellow class="text-xs">
            {{ $event->status }}
        </x-status-yellow>
        @elseif($event->status == 'zaakceptowane')
        <x-status-green class="text-xs">
            {{ $event->status }}
        </x-status-green>
        @elseif($event->status == 'odrzucone')
        <x-status-red class="text-xs">
            {{ $event->status }}
        </x-status-red>
        @endif
    </td>
    <td class="px-3 py-2 text-sm min-w-32">
        @if($event->event_type == 'stop')
        <x-status-red class="text-xs">
            🔴 Stop
        </x-status-red>
        @endif
        @if($event->event_type == 'start')
        <x-status-green class="text-xs">
            🟢 Start
        </x-status-green>
        @endif
        @if($event->event_type == 'task')
        <x-status-gray class="text-xs">
            🎯 Zadanie
        </x-status-gray>
        @endif
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
        @if($event->event_type == 'start')
        @if($event->location_id)
        <x-status-green>
            <i class="fa-solid fa-location-dot mx-1"></i>
        </x-status-green>
        @endif
        @endif
        @if($event->event_type == 'stop')
        @if($event->location_id)
        <x-status-red>
            <i class="fa-solid fa-location-dot mx-1"></i>
        </x-status-red>
        @endif
        @endif
    </td>
    <td class="px-3 py-2 font-semibold text-xl text-gray-700 dark:text-gray-50">
        <div class="flex flex-col items-center justify-center gap-2 my-auto">
            <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                <x-status-dark>
                    {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('H:i:s')}}
                </x-status-dark>
            </x-paragraf-display>
            <x-paragraf-display class="text-xs whitespace-nowrap">
                <x-status-cello>
                    @php
                    \Carbon\Carbon::setLocale('pl');
                    @endphp
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->format('d.m') }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->time)->translatedFormat('l') }}
                </x-status-cello>
            </x-paragraf-display>
        </div>
    </td>
    <x-show-cell href="{{ route('rcp.event.show', $event) }}" />
</tr>