@php
if($night){

if($night == true){
$isNight = true;
}else{
$isNight = false;
}

}else{
$isNight = false;
}

if($start_time_clock){
$start_time = $start_time_clock;
}else{
$start_time = '';
}
if($end_time_clock){
$end_time = $end_time_clock;
}else{
$end_time = '';
}
if($isNight){
$rcp_seconds = \Carbon\Carbon::parse($start_time)->diffInSeconds(\Carbon\Carbon::parse($end_time)->addDay()) ?? 0;
}else{
$rcp_seconds = \Carbon\Carbon::parse($start_time)->diffInSeconds(\Carbon\Carbon::parse($end_time)) ?? 0;
}
@endphp

@php
$allOk = true;
$alert = false;
$alert_kind = '';
@endphp
@if(isset($work_session->time_in_work) && $work_session->time_in_work == '24:00:00')
@php
$alert = true;
$alert_kind = 'Automatyczne zakończenie';
@endphp
@endif
@if(isset($work_session->user) && $work_session->user->overtime_task)
@if($work_session->getAlertTask() && $work_session->task_id == null)
@php
$alert = true;
$alert_kind = 'Brak zadania';
@endphp
@elseif($work_session->getAlertTask() && $work_session->task->status == 'oczekujące')
@php
$alert = true;
$alert_kind = 'Oczekujące';
@endphp
@endif
@endif

<div>
    @if($start_time != '')
    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4">
        <span class="text-gray-900 dark:text-white">🕓 Podgląd</span>
        <div class="h-[180px] flex flex-col items-center justify-center text-center 
            w-full rounded-2xl p-2
            @if($alert)
            bg-yellow-300 dark:bg-yellow-400
            hover:bg-yellow-400 dark:hover:bg-yellow-500
            @else
                @if($isNight)
                    @if($planned_seconds == null)
                    bg-green-400 dark:bg-green-500
                    hover:bg-green-300 dark:hover:bg-green-400
                    @elseif($planned_seconds == $rcp_seconds)
                    bg-green-400 dark:bg-green-500
                    hover:bg-green-300 dark:hover:bg-green-400
                    @elseif($planned_seconds > $rcp_seconds)
                    bg-green-400/60 dark:bg-green-500/60
                    hover:bg-green-300/70 dark:hover:bg-green-400/70
                    @elseif($planned_seconds < $rcp_seconds)
                    bg-indigo-400 dark:bg-indigo-500
                    hover:bg-indigo-300 dark:hover:bg-indigo-400
                    @endif
                @else
                    @if($planned_seconds == null)
                    bg-green-300 dark:bg-green-400
                    hover:bg-green-400 dark:hover:bg-green-500
                    @elseif($planned_seconds == $rcp_seconds)
                    bg-green-300 dark:bg-green-400
                    hover:bg-green-400 dark:hover:bg-green-500
                    @elseif($planned_seconds > $rcp_seconds)
                    bg-green-300/60 dark:bg-green-400/60
                    hover:bg-green-400/70 dark:hover:bg-green-500/70
                    @elseif($planned_seconds < $rcp_seconds)
                    bg-indigo-300 dark:bg-indigo-400
                    hover:bg-indigo-400 dark:hover:bg-indigo-500
                    @endif
                @endif
            @endif
            transition-colors duration-200 
            ">

            <!-- Ikona i label -->
            <div class="flex flex-col items-center justify-center h-full">
                <span class="text-2xl">
                    @if($isNight == 'night')
                    🌙
                    @else
                    ⏱️
                    @endif
                </span>
                <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-white/60 text-gray-900 uppercase tracking-widest">
                    RCP
                </span>
            </div>

            <!-- Godziny i dni -->
            <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                <div class="font-semibold tracking-widest uppercase">
                    @if($start_time != '')
                    {{ \Carbon\Carbon::parse($start_time)->format('H:i') }}
                    @else
                    Brak
                    @endif
                    –
                    @if($end_time != '')
                    {{ \Carbon\Carbon::parse($end_time)->format('H:i') }}
                    @else
                    Brak
                    @endif
                </div>

                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                    @if($start_time_date != '')
                    {{
                \Carbon\Carbon::parse($start_time_date)
                    ->locale('pl')
                    ->translatedFormat('D') 
            }}
                    –
                    @if($isNight == 'night')
                    {{
                \Carbon\Carbon::parse($start_time_date)->addDay()
                        ->locale('pl')
                        ->translatedFormat('D')
            }}
                    @else
                    {{
                \Carbon\Carbon::parse($start_time_date)
                    ->locale('pl')
                    ->translatedFormat('D') 
            }}
                    @endif
                    @else
                    OD
                    –
                    DO
                    @endif
                </div>
            </div>

            <!-- Opis -->
            <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                @if($alert)
                {{$alert_kind}}
                @else
                @if($start_time && $end_time)
                @if($isNight == 'night')
                {{
        \Carbon\Carbon::parse($start_time)
            ->diff(\Carbon\Carbon::parse($end_time)->addDay())
            ->format('%H:%I:%S')
    }}
                @else
                {{
        \Carbon\Carbon::parse($start_time)
            ->diff(\Carbon\Carbon::parse($end_time))
            ->format('%H:%I:%S')
    }}
                @endif
                @else
                Brak
                @endif
                @endif
            </p>

        </div>
    </div>
    @endif
</div>