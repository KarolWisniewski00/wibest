@props([
    'obj',
    'obj_status',
    'dateInfo' => null,
    'startDate' => null,
    'endDate' => null,
])

@if($obj_status == 'holiday')

    <div class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                    w-full bg-rose-200 dark:bg-rose-400/60
                    rounded-2xl p-2 transition-colors duration-200
                    hover:bg-rose-300 dark:hover:bg-rose-500/70">

        <div class="flex flex-col items-center justify-center h-full w-fit">
            <span class="text-lg md:text-2xl">🎌</span>

            <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold
                             bg-rose-300 text-gray-900 uppercase tracking-widest">
                ŚUW
            </span>
        </div>

        <div class="mt-2 h-full flex flex-col justify-center items-center">
            <div class="flex flex-col items-center text-[0.65rem] md:text-sm
                            text-gray-800 dark:text-gray-100 leading-tight">

                <div class="font-semibold tracking-widest uppercase
                                max-w-[4ch] truncate sm:max-w-[8ch]
                                md:max-w-[10ch] lg:max-w-[10ch]">
                    Święto
                </div>

                <div class="text-[0.6rem] mt-1 font-medium tracking-widest
                                text-gray-700 dark:text-gray-200
                                max-w-[4ch] truncate sm:max-w-[8ch]
                                md:max-w-[10ch] lg:max-w-[10ch]">
                    Ustawowo
                </div>

            </div>
        </div>

        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800
                      dark:text-gray-900 tracking-wide uppercase
                      max-w-[4ch] truncate sm:max-w-[8ch]
                      md:max-w-[10ch] lg:max-w-[10ch]">
            Wolne
        </p>

    </div>

@elseif($obj instanceof \App\Models\Leave)

    @php
        $user_auth = auth()->user();
    @endphp

    <a href="@if($user_auth->role == 'admin' || $user_auth->role == 'właściciel' || $user_auth->role == 'menedżer')
        {{ route('leave.pending.edit', $obj) }}
     @else
                    {{ route('leave.single.edit', $obj) }}
                 @endif" class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                  w-full bg-pink-200 dark:bg-pink-400/60
                  rounded-2xl p-2 transition-colors duration-200
                  hover:bg-pink-300 dark:hover:bg-pink-500/70">

        <div class="flex flex-col items-center justify-center h-full w-fit">

            <span class="text-lg md:text-2xl">
                {{ config('leavetypes.icons.' . $obj->type, '') }}
            </span>

            <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold
                             bg-pink-300 text-gray-900 uppercase tracking-widest">
                {{ config('leavetypes.shortType.' . $obj->type, '') }}
            </span>

        </div>

        <div class="mt-2 h-full flex flex-col justify-center items-center">

            <div class="flex flex-col items-center text-[0.65rem] md:text-sm
                            text-gray-800 dark:text-gray-100 leading-tight">

                <div class="font-semibold tracking-widest uppercase
                                max-w-[4ch] truncate sm:max-w-[6ch]
                                md:max-w-[8ch] xl:max-w-[12ch] text-wrap">
                    {{ $obj->type }}
                </div>

                <div class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest
                                text-gray-700 dark:text-gray-200">

                    {{ \Carbon\Carbon::parse($obj->start_date)
            ->locale('pl')
            ->translatedFormat('D') }}

                    <span class="hidden lg:inline">–</span>

                    {{ \Carbon\Carbon::parse($obj->end_date)
            ->locale('pl')
            ->translatedFormat('D') }}

                </div>
            </div>

        </div>

        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800
                      dark:text-gray-900 tracking-wide uppercase
                      max-w-[4ch] truncate sm:max-w-[8ch]
                      md:max-w-[10ch] lg:max-w-[10ch]">
            WNIOSEK
        </p>

    </a>

@elseif($obj instanceof \App\Models\WorkSession)

    @php
        $user = Auth::user();

        $allOk = true;
        $alert = false;
        $alert_kind = '';

        if ($obj->time_in_work == '24:00:00') {
            $alert = true;
            $alert_kind = 'Automatyczne zakończenie';
        }

        if ($obj->user->overtime_task) {

            if ($obj->getAlertTask() && $obj->task_id == null) {
                $alert = true;
                $alert_kind = 'Brak zadania';

            } elseif ($obj->getAlertTask() && $obj->task->status == 'oczekujące') {
                $alert = true;
                $alert_kind = 'Oczekujące';
            }
        }

        $startTime = null;
        $endTime = null;

        if ($obj->eventStart) {
            $startTime = \Carbon\Carbon::parse($obj->eventStart->time)->format('Y-m-d');
        }

        if ($obj->eventStop) {
            $endTime = \Carbon\Carbon::parse($obj->eventStop->time)->format('Y-m-d');
        }
    @endphp

    @if($obj_status == 'work')
        <a href="@if($obj->multi) {{route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => $startTime, 'end_date' => $endTime])}} @else {{route('rcp.work-session.show', $obj)}} @endif "
            class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center 
                                                                    w-full rounded-2xl p-1
                                                                    @if($obj->eventStop)
                                                                        @if($alert)
                                                                            bg-yellow-300 dark:bg-yellow-400
                                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                        @else
                                                                            @if($obj->type == 'night')
                                                                                @if($obj->extra == 'extra')
                                                                                    @if($obj->multi)
                                                                                        bg-yellow-400 dark:bg-yellow-500
                                                                                        hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                                                    @else
                                                                                        bg-indigo-400 dark:bg-indigo-500
                                                                                        hover:bg-indigo-300 dark:hover:bg-indigo-400
                                                                                        @php
                                                                                            $allOk = false;
                                                                                        @endphp
                                                                                    @endif
                                                                                @elseif($obj->extra == 'task')
                                                                                    @if($obj->multi)
                                                                                        bg-yellow-400 dark:bg-yellow-500
                                                                                        hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                                                    @else
                                                                                        bg-emerald-400 dark:bg-emerald-500
                                                                                        hover:bg-emerald-300 dark:hover:bg-emerald-400
                                                                                    @endif
                                                                                @else
                                                                                    @if($obj->under == 'under')
                                                                                        @if($obj->multi)
                                                                                            bg-yellow-400 dark:bg-yellow-500
                                                                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                                                        @else
                                                                                            bg-green-400/60 dark:bg-green-500/60
                                                                                            hover:bg-green-300/70 dark:hover:bg-green-400/70
                                                                                            @php
                                                                                                $allOk = false;
                                                                                            @endphp
                                                                                        @endif
                                                                                    @else
                                                                                        @if($obj->multi)
                                                                                            bg-yellow-400 dark:bg-yellow-500
                                                                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                                                        @else
                                                                                            bg-green-400 dark:bg-green-500
                                                                                            hover:bg-green-300 dark:hover:bg-green-400
                                                                                        @endif
                                                                                    @endif
                                                                                @endif
                                                                            @else
                                                                                @if($obj->extra == 'extra')
                                                                                    @if($obj->multi)
                                                                                        bg-yellow-300 dark:bg-yellow-400
                                                                                        hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                                    @else
                                                                                        bg-indigo-300 dark:bg-indigo-400
                                                                                        hover:bg-indigo-400 dark:hover:bg-indigo-500
                                                                                        @php
                                                                                            $allOk = false;
                                                                                        @endphp
                                                                                    @endif
                                                                                @elseif($obj->extra == 'task')
                                                                                    @if($obj->multi)
                                                                                        bg-yellow-300 dark:bg-yellow-400
                                                                                        hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                                    @else
                                                                                        bg-emerald-300 dark:bg-emerald-400
                                                                                        hover:bg-emerald-400 dark:hover:bg-emerald-500
                                                                                    @endif
                                                                                @else
                                                                                    @if($obj->under == 'under')
                                                                                        @if($obj->multi)
                                                                                            bg-yellow-300 dark:bg-yellow-400
                                                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                                        @else
                                                                                            bg-green-300/60 dark:bg-green-400/60
                                                                                            hover:bg-green-400/70 dark:hover:bg-green-500/70
                                                                                            @php
                                                                                                $allOk = false;
                                                                                            @endphp
                                                                                        @endif
                                                                                    @else
                                                                                        @if($obj->multi)
                                                                                            bg-yellow-300 dark:bg-yellow-400
                                                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                                        @else
                                                                                            bg-green-300 dark:bg-green-400
                                                                                            hover:bg-green-400 dark:hover:bg-green-500
                                                                                        @endif
                                                                                    @endif
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @else
                                                                        bg-rose-200/60 dark:bg-rose-400/60
                                                                        hover:bg-rose-300/70 dark:hover:bg-rose-500/70
                                                                    @endif
                                                                    transition-colors duration-200 
                                                                    ">

            <!-- Ikona i label -->
            <div class="flex flex-col items-center justify-center h-full">
                <span class="text-lg md:text-2xl">
                    @if($obj->extra == 'task' && !$obj->multi)
                        🎯
                    @else
                        @if($obj->eventStop)
                            @if($alert)
                                ⚠️
                            @else
                                @if($obj->type == 'night')
                                    🌙
                                @else
                                    ⏱️
                                @endif
                            @endif
                        @else
                            ❌
                        @endif
                    @endif
                </span>
                <span
                    class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                    RCP
                </span>
                <!-- Godziny i dni -->
                <div class="mt-2 h-full flex flex-col justify-center items-center">
                    <div
                        class="flex flex-col items-center text-[0.65rem] md:text-sm @if($obj->eventStop) @if($obj->multi || $alert) text-gray-800 dark:text-gray-900 @else text-gray-800 dark:text-gray-100 @endif @else text-gray-800 dark:text-gray-100 @endif leading-tight">
                        <div class="font-semibold tracking-widest uppercase flex flex-col xl:flex-row">
                            <span class="hidden sm:flex">
                                {{ \Carbon\Carbon::parse($obj->eventStart->time)->format('H:i') }}
                            </span>
                            <span class="sm:hidden">
                                {{ substr(\Carbon\Carbon::parse($obj->eventStart->time)->format('H:i'), 0, -3) }}
                            </span>
                            <span class="inline ">
                                –
                            </span>
                            @if($obj->eventStop)
                                <span class="hidden sm:flex">
                                    {{ \Carbon\Carbon::parse($obj->eventStop->time)->format('H:i') }}
                                </span>
                                <span class="sm:hidden">
                                    {{ substr(\Carbon\Carbon::parse($obj->eventStop->time)->format('H:i'), 0, -3) }}
                            </span> @else <span title="Error"><x-status-red>Error</x-status-red></span> @endif
                        </div>

                        <div
                            class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest @if($obj->eventStop) @if($obj->multi || $alert) text-gray-800 dark:text-gray-900 @else text-gray-800 dark:text-gray-100 @endif @else text-gray-800 dark:text-gray-100 @endif">
                            {{
                    \Carbon\Carbon::parse($obj->eventStart->time)
                        ->locale('pl')
                        ->translatedFormat('D') 
                                                                            }}
                            <span class="hidden lg:inline">
                                –
                            </span>
                            @if($obj->eventStop) {{
                                \Carbon\Carbon::parse($obj->eventStop->time)
                                    ->locale('pl')
                                    ->translatedFormat('D') 
                            }} @else <span title="Error"><x-status-red>Error</x-status-red></span> @endif
                        </div>
                    </div>
                </div>

                <!-- Opis -->
                <p
                    class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[4ch] truncate sm:max-w-[8ch]  md:max-w-[10ch] lg:max-w-[10ch]">
                    @if($obj->eventStop)
                        @if($obj->multi && !$alert)
                            Wielokrotny odczyt pracy
                        @elseif($alert)
                            {{ $alert_kind }}
                        @else
                            <span class="hidden md:flex">
                                {{ $obj->time_in_work }}
                            </span>
                            <span class="md:hidden">
                                {{ substr($obj->time_in_work, 0, -6) }}h
                            </span>
                        @endif
                    @else
                        <x-status-red>Error</x-status-red>
                    @endif
                </p>
                @if($obj->extra == 'task')
                    @if($obj->multi)
                    @else
                        <div
                            class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[5ch] truncate sm:max-w-[8ch]  md:max-w-[10ch] lg:max-w-[10ch]">
                            {{ \Illuminate\Support\Str::limit(strip_tags($obj->task->note), 10, '...') }}
                        </div>
                    @endif
                @endif
            </div>
        </a>
    @elseif($obj_status == 'progress')
        <a href="@if($obj->multi) {{route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => $startTime, 'end_date' => $endTime])}} @else {{route('rcp.work-session.show', $obj)}} @endif"
            class="min-h-[130px] md:min-h-[175px] relative flex flex-col items-center justify-center text-center 
                                                            w-full rounded-2xl p-2

                                                            @if($obj->type == 'night')
                                                                bg-yellow-400 dark:bg-yellow-500
                                                                hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                            @else
                                                                bg-yellow-300 dark:bg-yellow-400
                                                                hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                            @endif

                                                            transition-colors duration-200">
            <style>
                @keyframes ping-small {

                    75%,
                    100% {
                        transform: scale(1.15);
                        opacity: 0;
                    }
                }

                .animate-ping-small {
                    animation: ping-small 1s cubic-bezier(0, 0, 0.2, 1) infinite;
                }
            </style>
            <!-- Ping -->
            <span class="absolute inset-0 rounded-2xl bg-yellow-400 opacity-50 animate-ping-small pointer-events-none"></span>

            <!-- Zawartość nad pingiem -->
            <div class="relative z-10 flex flex-col items-center justify-center h-full">

                <span class="text-lg md:text-2xl">
                    @if($obj->type == 'night')
                        🌙
                    @else
                        ⏱️
                    @endif
                </span>

                <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold
                            bg-white/60 text-gray-900 uppercase tracking-widest">
                    RCP
                </span>

            </div>

            <div class="relative z-10 mt-2 h-full flex flex-col justify-center items-center">

                <div
                    class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">

                    <div class="font-semibold tracking-widest uppercase flex flex-col xl:flex-row">

                        <span class="hidden sm:flex">
                            {{ \Carbon\Carbon::parse($obj->eventStart->time)->format('H:i') }}
                        </span>

                        <span class="sm:hidden">
                            {{ substr(\Carbon\Carbon::parse($obj->eventStart->time)->format('H:i'), 0, -3) }}
                        </span>

                        <span class="inline">–</span>

                        <span class="hidden sm:flex">
                            Teraz
                        </span>

                        <span class="sm:hidden">
                            T
                        </span>

                    </div>

                    <div class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">

                        {{
                    \Carbon\Carbon::parse($obj->eventStart->time)
                        ->locale('pl')
                        ->translatedFormat('D')
                                                                    }}

                        <span class="hidden lg:inline">–</span>
                        Teraz

                    </div>

                </div>

            </div>

            <p
                class="relative z-10 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[4ch] truncate sm:max-w-[8ch] md:max-w-[10ch] lg:max-w-[10ch]">
                W trakcie pracy
            </p>

        </a>
    @endif
@else
<div class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                w-full bg-transparent dark:bg-transparent
                rounded-2xl p-2 transition-colors duration-200">
</div>
@endif