@props(['work_session'])
<li>
    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start">
                    <x-RCP.work-session-status :work_session="$work_session" class="text-xs" />
                </div>
            </div>
            @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
            @if($work_session->status == 'Praca zakończona')
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs whitespace-nowrap">
                        <x-status-cello>
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
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex flex-row justify-start items-start w-fit gap-2">
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
                @if($work_session->user->overtime_task)
                @if($work_session->getAlertTask() && $work_session->task_id == null)
                <div class="flex flex-col items-center justify-center text-center h-full w-full my-auto">
                    <span title="Brak zadania">⚠️</span>
                </div>
                @endif
                @endif
                @if($work_session->time_in_work == '24:00:00')
                <div class="flex flex-col items-center justify-center text-center h-full w-full my-auto">
                    <span title="Automatyczne zakończenie">⚠️</span>
                </div>
                @endif
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
                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                    <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                        <x-status-dark>
                            {{$startDateEvent->format('H:i')}} - {{$stopDateEvent->format('H:i')}}
                        </x-status-dark>
                    </x-paragraf-display>
                    <x-paragraf-display class="text-gray-900 dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                        {{ $work_session->time_in_work }}
                    </x-paragraf-display>
                </div>
                <div class="flex flex-row items-center justify-center my-auto">
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
                </div>
            </div>
            @endif
            @else
            <div class="flex flex-row justify-start items-start w-fit gap-2">
                <div class="text-xs flex flex-col items-center justify-center text-center h-full w-full my-auto">
                    <span title="Error">
                        ❌ <x-status-red>Error</x-status-red>
                    </span>
                </div>
            </div>
            @endif
            <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$work_session->user" />
                <x-user-name :user="$work_session->user" />
            </div>
            <div class="flex space-x-4">
                <x-button-link-neutral href="{{route('rcp.work-session.show', $work_session)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
                @if($role == 'admin' || $role == 'właściciel')
                @if($work_session->status == 'Praca zakończona')
                <x-button-link-blue href="{{route('rcp.work-session.edit', $work_session)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-pen-to-square"></i>
                </x-button-link-blue>
                @endif
                @endif
            </div>
        </div>
    </div>
</li>