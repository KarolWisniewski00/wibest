@props(['event'])
<li>
    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start">
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
                    @if($event->status == 'oczekujące')
                    <x-status-yellow class="ms-2 text-xs">
                        {{ $event->status }}
                    </x-status-yellow>
                    @elseif($event->status == 'zaakceptowane')
                    <x-status-green class="ms-2 text-xs">
                        {{ $event->status }}
                    </x-status-green>
                    @elseif($event->status == 'odrzucone')
                    <x-status-red class="ms-2 text-xs">
                        {{ $event->status }}
                    </x-status-red>
                    @endif
                    @endif
                </div>
            </div>
            @if($event->event_type == 'task')
            <div class="flex flex-row items-start justify-start gap-2 my-auto">
                <div class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-center items-center text-center">
                    {!! $event->note !!}
                </div>
            </div>
            @endif
            <div class="flex flex-row items-start justify-start gap-2 my-auto">
                @if(($event->event_type == 'start' || $event->event_type == 'stop') && $event->location_id)
                <div class="flex flex-col items-center justify-center gap-2 my-auto">
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
                </div>
                @endif
                <div class="flex flex-col items-start justify-start gap-2 my-auto">
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
            </div>
            <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$event->user" />
                <x-user-name :user="$event->user" />
            </div>
            <div class="flex space-x-4">
                <x-button-link-neutral href="{{route('rcp.event.show', $event)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
            </div>
        </div>
    </div>
</li>