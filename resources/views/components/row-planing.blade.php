@props(['user'])
@php
$shortType = ['wolne za pracę w święto' => 'WPS',
'zwolnienie lekarskie' => 'ZL',
'urlop wypoczynkowy' => 'UW',
'urlop planowany' => 'UP',
'urlop rodzicielski' => 'UR',
'wolne za nadgodziny' => 'WN',
'wolne za święto w sobotę' => 'WSS',
'urlop bezpłatny' => 'UB',
'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
'zwolnienie lekarsie - opieka' => 'ZLO',
'urlop okolicznościowy' => 'UO',
'urlop wypoczynkowy "na żądanie"' => 'UWZ',
'oddanie krwi' => 'OK',
'urlop ojcowski' => 'UOJC',
'urlop macieżyński' => 'UM',
'świadczenie rehabilitacyjne' => 'SR',
'opieka' => 'OP',
'świadek w sądzie' => 'SWS',
'praca zdalna' => 'PZ',
'kwarantanna' => 'KW',
'kwarantanna z pracą zdalną' => 'KWZPZ',
'delegacja' => 'DEL',
'święto' => 'ŚUW'
];
$icons = [
'wolne za pracę w święto' => '🕊️',
'zwolnienie lekarskie' => '🤒',
'urlop wypoczynkowy' => '🏖️',
'urlop planowany' => '🏖️',
'urlop rodzicielski' => '👶',
'wolne za nadgodziny' => '⏰',
'wolne za święto w sobotę' => '🗓️',
'urlop bezpłatny' => '💸',
'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
'urlop okolicznościowy' => '🎉',
'urlop wypoczynkowy "na żądanie"' => '📢',
'oddanie krwi' => '🩸',
'urlop ojcowski' => '👨‍👧',
'urlop macieżyński' => '🤱',
'świadczenie rehabilitacyjne' => '🦾',
'opieka' => '🧑‍🍼',
'świadek w sądzie' => '⚖️',
'praca zdalna' => '💻',
'kwarantanna' => '🦠',
'kwarantanna z pracą zdalną' => '🏠💻',
'delegacja' => '✈️',
'święto' => '🎌',
];
@endphp
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

    <td class="px-2 py-2 sticky md:left-0 md:z-20 bg-white dark:bg-gray-800">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$user" />
            <x-user-name :user="$user" />
        </div>
    </td>
    @php
    $dates = $user->dates ?? [];
    $entries = array_values($dates); // tylko wartości (statusy)
    $keys = array_keys($dates); // daty
    $count = count($entries);
    $i = 0;
    @endphp

    @if ($count > 0)
    @while ($i < $count)
        @php
        $currentStatus=$entries[$i] ?? '' ;
        $span=1;

        // 🔹 Wyciągnij godziny bieżącego dnia (jeśli są)
        $currentObj=$user->objs[$keys[$i]] ?? null;
        try {
        $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->starts_at)->format('H:i') : null;
        $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->ends_at)->format('H:i') : null;
        } catch (\Exception $e) {
        $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->start_date)->format('H:i') : null;
        $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->end_date)->format('H:i') : null;
        }

        // 🔸 Łącz tylko jeśli status i godziny są identyczne
        for ($j = $i + 1; $j < $count; $j++) {
            $nextStatus=$entries[$j];
            $nextObj=$user->objs[$keys[$j]] ?? null;
            try {
            $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->starts_at)->format('H:i') : null;
            $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->ends_at)->format('H:i') : null;
            } catch (\Exception $e) {
            $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->start_date)->format('H:i') : null;
            $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->end_date)->format('H:i') : null;
            }

            if($currentStatus != 'work'){
            if ($nextStatus === $currentStatus && $nextStart === $currentStart && $nextEnd === $currentEnd) {
            $span++;
            } else {
            break;
            }
            }
            }

            $startDate = $keys[$i];
            $endDate = $keys[$i + $span - 1] ?? $startDate;
            @endphp

            {{-- Renderowanie komórki --}}
            @if ($currentStatus==='work' )
            <td colspan="{{ $span }}"
                title="{{ $startDate }} - {{ $endDate }}"
                class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                <a href="@if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel') {{route('calendar.work-schedule.edit', $user->objs[$keys[$i]] )}} @endif" class="h-[180px] flex flex-col items-center justify-center text-center 
                            w-full rounded-2xl p-3
                            @if($user->objs[$keys[$i]]->type == 'night')
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
                        <span class="text-2xl">
                            @if($user->objs[$keys[$i]]->type == 'night')
                            🌙
                            @else
                            🌀
                            @endif
                        </span>
                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-white/60 text-gray-900 uppercase tracking-widest">
                            ZMI
                        </span>
                    </div>

                    <!-- Godziny i dni -->
                    <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                        <div class="font-semibold tracking-widest uppercase">
                            {{ \Carbon\Carbon::parse($user->objs[$keys[$i]]->starts_at)->format('H:i') }}
                            –
                            {{ \Carbon\Carbon::parse($user->objs[$keys[$i]]->ends_at)->format('H:i') }}
                        </div>

                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                            {{
                                \Carbon\Carbon::parse($user->objs[$keys[$i]]->starts_at)
                                    ->locale('pl')
                                    ->translatedFormat('D') 
                            }}
                            –
                            {{
                                \Carbon\Carbon::parse($user->objs[$keys[$i]]->ends_at)
                                    ->locale('pl')
                                    ->translatedFormat('D') 
                            }}
                        </div>
                    </div>

                    <!-- Opis -->
                    <p class="mt-1 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                        Zmienny planing
                    </p>

                </a>
            </td>
            @elseif ($currentStatus==='leave' )
            <td colspan="{{ $span }}"
                title="{{ $startDate }} - {{ $endDate }}"
                class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                <a href="@if($user->role == 'admin' || $user->role == 'właściciel' || $user->role == 'menedżer') {{route('leave.pending.edit', $currentObj)}} @else {{route('leave.single.edit', $currentObj)}} @endif" class="h-[180px] flex flex-col items-center justify-center text-center 
                            w-full bg-pink-200 dark:bg-pink-400/60
                            rounded-2xl p-3 transition-colors duration-200 
                            hover:bg-pink-300 dark:hover:bg-pink-500/70">

                    <!-- Ikona i label -->
                    <div class="flex flex-col items-center justify-center h-full w-fit">
                        <span class="text-2xl">{{ $icons[$currentObj->type] ?? '' }}</span>
                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-pink-300 text-gray-900 uppercase tracking-widest">
                            {{ $shortType[$currentObj->type] ?? '' }}
                        </span>
                    </div>

                    <!-- Dane szczegółowe -->
                    <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                        <div class="font-semibold tracking-widest uppercase">
                            {{$currentObj->type}}
                        </div>

                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                            {{
                                \Carbon\Carbon::parse($user->objs[$keys[$i]]->start_date)
                                    ->locale('pl')
                                    ->translatedFormat('D') 
                            }}
                            –
                            {{
                                \Carbon\Carbon::parse($user->objs[$keys[$i]]->end_date)
                                    ->locale('pl')
                                    ->translatedFormat('D') 
                            }}
                        </div>
                    </div>

                    <!-- Opis -->
                    <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                        WNIOSEK
                    </p>

                </a>
            </td>
            @elseif ($currentStatus==='static' )
            <td colspan="{{ $span }}"
                title="{{ $startDate }} - {{ $endDate }}"
                class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                <a href="@if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel') {{ route('team.user.planing', $user) }} @endif"
                    class="h-[180px] flex flex-col items-center justify-center text-center w-full
                        bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-3
                        transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">

                    <!-- Ikona i etykieta -->
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="text-2xl">🏢</span>
                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-blue-300 text-gray-900 uppercase tracking-widest">
                            STA
                        </span>
                    </div>

                    <!-- Dane szczegółowe -->
                    <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                        <div class="font-semibold tracking-widest uppercase">
                            {{ \Carbon\Carbon::parse($user->working_hours_from)->format('H:i') }}
                            –
                            {{ \Carbon\Carbon::parse($user->working_hours_to)->format('H:i') }}
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
                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                            {{ $shortPl[$user->working_hours_start_day] }}
                            –
                            {{ $shortPl[$user->working_hours_stop_day] }}
                        </div>
                    </div>

                    <!-- Opis -->
                    <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                        Stały planing
                    </p>

                </a>
            </td>
            @elseif ($currentStatus==='holiday' )
            <td colspan="{{ $span }}"
                title="{{ $startDate }} - {{ $endDate }}"
                class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                <div class="h-[180px] flex flex-col items-center justify-center text-center 
                            w-full bg-rose-200 dark:bg-rose-400/60
                            rounded-2xl p-3 transition-colors duration-200 
                            hover:bg-rose-300 dark:hover:bg-rose-500/70">

                    <!-- Ikona i label -->
                    <div class="flex flex-col items-center justify-center h-full w-fit">
                        <span class="text-2xl">🎌</span>
                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-rose-300 text-gray-900 uppercase tracking-widest">
                            ŚUW
                        </span>
                    </div>

                    <!-- Dane szczegółowe -->
                    <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                        <div class="font-semibold tracking-widest uppercase">
                            Święto
                        </div>

                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                            Ustawowo
                        </div>
                    </div>

                    <!-- Opis -->
                    <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                        Wolne
                    </p>

                </div>
            </td>
            @elseif (!empty($currentStatus))
            <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}" class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
            </td>
            @else
            <td colspan="{{ $span }}"
                title="{{ $startDate }} - {{ $endDate }}"
                class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700 
                @if($user->working_hours_regular == 'stały planing')
                dark:bg-gray-800
                transition-colors duration-200 
                dark:hover:bg-gray-700
                @endif">
                @if($user->working_hours_regular == 'zmienny planing')
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                <a href="{{route('calendar.work-schedule.create.user', [$user, $startDate])}}"
                    class="group h-[180px] relative flex flex-col items-center justify-center text-center
                            w-full rounded-2xl p-4
                            bg-violet-300/60 dark:bg-violet-400/60 backdrop-blur-md
                            transition-all duration-300 ease-out
                            opacity-0 hover:opacity-100">

                    <!-- Główna ikona i etykieta -->
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="text-3xl transition-transform duration-300">
                            🌀
                        </span>
                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.65rem] font-bold 
                                        bg-white/70 text-gray-900 uppercase tracking-widest">
                            ZMI
                        </span>
                    </div>

                    <!-- Sekcja akcji -->
                    <div class="mt-2 flex flex-col items-center text-gray-900 dark:text-gray-900 
                                    text-xs uppercase tracking-widest bg-green-300 
                                    px-4 py-2 rounded-lg backdrop-blur-sm font-semibold">
                        <div class="font-bold tracking-widest uppercase flex items-center gap-2">
                            <i class="fa-solid fa-plus"></i>
                            NOWY
                        </div>
                    </div>

                    <!-- Opis -->
                    <p class="mt-1 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                        Zmienny planing
                    </p>
                </a>
                @endif
                @else

                @if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
                @else
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                <a href="{{ route('team.user.config_planing', $user->id) }}" class="flex flex-col items-center justify-center text-center 
                            w-full rounded-2xl p-3 h-[180px] 
                            bg-yellow-300 dark:bg-yellow-400
                            transition-colors duration-200 
                            hover:bg-yellow-400 dark:hover:bg-yellow-500">

                    <!-- Ikona i label -->
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="text-2xl">
                            ⚠️
                        </span>
                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-white/60 text-gray-900 uppercase tracking-widest">
                            ALE
                        </span>
                    </div>

                    <!-- Godziny i dni -->
                    <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">
                        <div class="font-semibold tracking-widest uppercase">
                            Wymagana
                        </div>

                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">
                            Konfiguracja
                        </div>
                    </div>

                    <!-- Opis -->
                    <p class="mt-1 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                        ALERT
                    </p>

                </a>
                @else
                <div class="flex flex-col items-center justify-center text-center 
                            w-full h-[180px]  rounded-2xl p-3
                            bg-yellow-300 dark:bg-yellow-400
                            transition-colors duration-200 
                            hover:bg-yellow-400 dark:hover:bg-yellow-500">

                    <!-- Ikona i label -->
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="text-2xl">
                            ⚠️
                        </span>
                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-white/60 text-gray-900 uppercase tracking-widest">
                            ALE
                        </span>
                    </div>

                    <!-- Godziny i dni -->
                    <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">
                        <div class="font-semibold tracking-widest uppercase">
                            Wymagana
                        </div>

                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">
                            Konfiguracja
                        </div>
                    </div>

                    <!-- Opis -->
                    <p class="mt-1 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                        ALERT
                    </p>

                </div>
                @endif
                @endif
                @endif
            </td>
            @endif
            @php
            $i += $span; // przeskocz dalej o scaloną grupę
            @endphp
            @endwhile
            @else
            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
            </td>
            @endif
</tr>