@props(['work_session'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-3 py-2">
        <x-flex-center>
            <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="{{ $work_session->id }}">
        </x-flex-center>
    </td>

    <td class="px-2 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$work_session->user" />
            <x-user-name :user="$work_session->user" />
        </div>
    </td>

    <td class="px-3 py-2 text-sm ">
        <x-RCP.work-session-status :work_session="$work_session" class="text-xs" />
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
        @if(isset($work_session->eventStart))
        @if($work_session->eventStart->location_id)
        <x-status-green>
            <i class="fa-solid fa-location-dot mx-1"></i>
        </x-status-green>
        @endif
        @endif
        @if(isset($work_session->eventStop))
        @if($work_session->eventStop->location_id)
        <x-status-red>
            <i class="fa-solid fa-location-dot mx-1"></i>
        </x-status-red>
        @endif
        @endif
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
        @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
        @if($work_session->status == 'Praca zakończona')
        @php
        if ($work_session && $work_session->time_in_work != 0) {
        $event_start_obj = \App\Models\Event::where('id', $work_session->event_start_id)->first();
        $event_stop_obj = \App\Models\Event::where('id', $work_session->event_stop_id)->first();
        $startDateEvent = \Carbon\Carbon::parse($event_start_obj->time);
        $stopDateEvent = \Carbon\Carbon::parse($event_stop_obj->time);
        // Sprawdza, czy stopDateEvent ma inną datę niż startDateEvent
        if (!$stopDateEvent->isSameDay($startDateEvent)) {
        $work_session->night = true; // Praca przeszła przez północ
        } else {
        $work_session->night = false; // Praca zakończyła się w tym samym dniu
        }
        }
        @endphp
        <div class="flex flex-col items-center justify-center h-full w-full">
            <span class="text-lg md:text-xl">
                @if($work_session->night == true)
                🌙
                @else
                ⏱️
                @endif
            </span>
            <x-label-green class="mt-1">
                RCP
            </x-label-green>
        </div>
        @endif
        @endif
    </td>
    <td class="px-3 py-2 font-semibold text-xl">
        @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
        @if($work_session->status == 'Praca zakończona')
        <div class="flex flex-col items-center justify-center gap-2 my-auto">
            <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                <x-status-dark>
                    {{$startDateEvent->format('H:i')}} - {{$stopDateEvent->format('H:i')}}
                </x-status-dark>
            </x-paragraf-display>
            <x-paragraf-display class="text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                {{ $work_session->time_in_work }}
            </x-paragraf-display>
        </div>
        @endif
        @endif
        <div class="flex flex-row items-center justify-center text-center my-auto">
            @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
            @else
            <div class="flex flex-col items-center justify-center text-center my-auto">
                <span title="Error">❌</span>
            </div>
            @endif
            @if($work_session->user->overtime_task)
            @if($work_session->getAlertTask() && $work_session->task_id == null)
            <div class="flex flex-col items-center justify-center text-center my-auto">
                <span title="Brak zadania">⚠️</span>
            </div>
            @endif
            @endif
            @if($work_session->time_in_work == '24:00:00')
            <div class="flex flex-col items-center justify-center text-center my-auto">
                <span title="Automatyczne zakończenie">⚠️</span>
            </div>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
            <x-status-cello>
                @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
                @if($work_session->status == 'Praca zakończona')
                @php
                // Ustawienie polskiego locale dla Carbon
                \Carbon\Carbon::setLocale('pl');

                $startDate = \Carbon\Carbon::parse($work_session->eventStart->time);
                $endDate = \Carbon\Carbon::parse($work_session->eventStop->time);
                @endphp
                @if ($work_session->eventStart->isSameDay($work_session->eventStop->time))
                {{ $work_session->eventStart->format() }}
                @else
                {{ $startDate->format('d.m') }} - {{ $endDate->format('d.m') }}
                @endif
                @endif
                @endif
            </x-status-cello>
            @else
            <span title="Error">
                ❌ <x-status-red>Error</x-status-red>
            </span>
            @endif
        </x-paragraf-display>
    </td>
    <x-show-cell href="{{ route('rcp.work-session.show', $work_session) }}" />
</tr>