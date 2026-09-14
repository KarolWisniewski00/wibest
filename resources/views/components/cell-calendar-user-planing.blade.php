@props([
    'user',
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
@elseif($obj_status == 'static')
    <div class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center w-full
                                        bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-2
                                        transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">

        <!-- Ikona i etykieta -->
        <div class="flex flex-col items-center justify-center h-full">
            <span class="text-lg md:text-2xl">🏢</span>
            <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                    bg-blue-300 text-gray-900 uppercase tracking-widest">
                STA
            </span>
        </div>

        <!-- Dane szczegółowe -->
        <div
            class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
            <div class="font-semibold tracking-widest uppercase flex flex-col xl:flex-row">
                <span class="hidden sm:flex">
                    {{ \Carbon\Carbon::parse($user->working_hours_from)->format('H:i') }}
                </span>
                <span class="sm:hidden">
                    {{ substr(\Carbon\Carbon::parse($user->working_hours_from)->format('H:i'), 0, -3) }}
                </span>
                <span class="inline ">
                    –
                </span>
                <span class="hidden sm:flex">
                    {{ \Carbon\Carbon::parse($user->working_hours_to)->format('H:i') }}
                </span>
                <span class="sm:hidden">
                    {{ substr(\Carbon\Carbon::parse($user->working_hours_to)->format('H:i'), 0, -3) }}
                </span>
            </div>
            @php
                $shortPl = [
                    'poniedziałek' => 'pon',
                    'wtorek' => 'wt',
                    'środa' => 'śr',
                    'czwartek' => 'czw',
                    'piątek' => 'pt',
                    'sobota' => 'sob',
                    'niedziela' => 'ndz',
                ];
            @endphp
            <div class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                {{ $shortPl[$user->working_hours_start_day] }}
                <span class="hidden lg:inline">
                    –
                </span>
                {{ $shortPl[$user->working_hours_stop_day] }}
            </div>
        </div>

        <!-- Opis -->
        <p
            class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[4ch] truncate sm:max-w-[8ch]  md:max-w-[10ch] lg:max-w-[10ch]">

            @php
                $start = \Carbon\Carbon::parse($user->working_hours_from);
                $end = \Carbon\Carbon::parse($user->working_hours_to);

                $seconds = $start->diffInSeconds($end);
            @endphp

            <span class="hidden md:flex">
                {{ sprintf('%02d:%02d:%02d', floor($seconds / 3600), floor(($seconds % 3600) / 60), $seconds % 60) }}
            </span>
            <span class="md:hidden">
                {{ sprintf('%02d', floor($seconds / 3600)) }}h
            </span>

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

@elseif($obj instanceof \App\Models\WorkBlock)


    @if($obj_status == 'work')
        <div class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center 
                                                w-full rounded-2xl p-2
                                                @if($obj->type == 'night')
                                                    bg-violet-400 dark:bg-violet-500
                                                    hover:bg-violet-300 dark:hover:bg-violet-400
                                                @else
                                                    bg-violet-300 dark:bg-violet-400
                                                    hover:bg-violet-400 dark:hover:bg-violet-500
                                                @endif
                                                transition-colors duration-200 
                                                ">

            <!-- Ikona i label -->
            <div class="flex flex-col items-center justify-center h-full">
                <span class="text-lg md:text-2xl">
                    @if($obj->type == 'night')
                        🌙
                    @else
                        🌀
                    @endif
                </span>
                <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                        bg-white/60 text-gray-900 uppercase tracking-widest">
                    ZMI
                </span>
            </div>

            <!-- Godziny i dni -->
            <div
                class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                <div class="font-semibold tracking-widest uppercase flex flex-col xl:flex-row">
                    <span class="hidden sm:flex">
                        {{ \Carbon\Carbon::parse($obj->starts_at)->format('H:i') }}
                    </span>
                    <span class="sm:hidden">
                        {{ substr(\Carbon\Carbon::parse($obj->starts_at)->format('H:i'), 0, -3) }}
                    </span>
                    <span class="inline ">
                        –
                    </span>
                    <span class="hidden sm:flex">
                        {{ \Carbon\Carbon::parse($obj->ends_at)->format('H:i') }}
                    </span>
                    <span class="sm:hidden">
                        {{ substr(\Carbon\Carbon::parse($obj->ends_at)->format('H:i'), 0, -3) }}
                    </span>
                </div>
                <div class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                    {{
                    \Carbon\Carbon::parse($obj->starts_at)
                        ->locale('pl')
                        ->translatedFormat('D') 
                                                }}
                    <span class="hidden lg:inline">
                        –
                    </span>
                    {{
                    \Carbon\Carbon::parse($obj->ends_at)
                        ->locale('pl')
                        ->translatedFormat('D') 
                                                }}
                </div>
            </div>

            <!-- Opis -->
            <p
                class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[4ch] truncate sm:max-w-[8ch]  md:max-w-[10ch] lg:max-w-[10ch]">
                <span class="hidden md:flex">
                    {{ gmdate('H:i:s', $obj->duration_seconds) }}
                </span>
                <span class="md:hidden">
                    {{ substr(gmdate('H:i:s', $obj->duration_seconds), 0, -6) }}h
                </span>

            </p>
        </div>
    @endif
@else
    <div class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                    w-full bg-transparent dark:bg-transparent
                    rounded-2xl p-2 transition-colors duration-200">
    </div>
@endif