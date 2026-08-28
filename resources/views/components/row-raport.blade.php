@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2 hidden md:table-cell sticky md:left-0 md:z-30 bg-white dark:bg-gray-800">
        <x-flex-center>
            <input type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="{{ $user->id }}">
        </x-flex-center>
    </td>

    <td class="px-2 py-2 sticky md:left-8 md:z-20 bg-white dark:bg-gray-800">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
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
                $currentStatus = $entries[$i] ?? '';
                $span = 1;

                // 🔹 Wyciągnij godziny bieżącego dnia (jeśli są)
                $currentObj = $user->objs[$keys[$i]] ?? null;
                try {
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->eventStart->time)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->eventStop->time)->format('H:i') : null;
                } catch (\Exception $e) {
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->start_date)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->end_date)->format('H:i') : null;
                }

                // 🔸 Łącz tylko jeśli status i godziny są identyczne
                for ($j = $i + 1; $j < $count; $j++) {
                    $nextStatus = $entries[$j];
                    $nextObj = $user->objs[$keys[$j]] ?? null;
                    try {
                        $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->eventStart->time)->format('H:i') : null;
                        $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->eventStop->time)->format('H:i') : null;
                    } catch (\Exception $e) {
                        $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->start_date)->format('H:i') : null;
                        $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->end_date)->format('H:i') : null;
                    }

                    if ($currentStatus != 'work' || $currentObj && $currentObj->type && $currentObj->type == 'night') {
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
            @if ($currentStatus === 'work')
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="relative px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">
                    @php
                        $allOk = true;
                        $alert = false;
                        $alert_kind = '';
                    @endphp
                    @if($user->objs[$keys[$i]]->time_in_work == '24:00:00')
                        @php
                            $alert = true;
                            $alert_kind = 'Automatyczne zakończenie';
                        @endphp
                    @endif
                    @if($user->objs[$keys[$i]]->user->overtime_task)
                        @if($user->objs[$keys[$i]]->getAlertTask() && $user->objs[$keys[$i]]->task_id == null)
                            @php
                                $alert = true;
                                $alert_kind = 'Brak zadania';
                            @endphp
                        @elseif($user->objs[$keys[$i]]->getAlertTask() && $user->objs[$keys[$i]]->task->status == 'oczekujące')
                            @php
                                $alert = true;
                                $alert_kind = 'Oczekujące';
                            @endphp
                        @endif
                    @endif
                    <a href="@if($user->objs[$keys[$i]]->multi) {{route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => \Carbon\Carbon::createFromFormat('d.m.y', $startDate)->format('Y-m-d'), 'end_date' => \Carbon\Carbon::createFromFormat('d.m.y', $endDate)->format('Y-m-d')])}} @else @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel') {{route('rcp.work-session.edit', $user->objs[$keys[$i]])}} @else {{route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => \Carbon\Carbon::createFromFormat('d.m.y', $startDate)->format('Y-m-d'), 'end_date' => \Carbon\Carbon::createFromFormat('d.m.y', $endDate)->format('Y-m-d')])}} @endif @endif"
                        class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full rounded-2xl p-2
                                        @if($user->objs[$keys[$i]]->eventStop)
                                            @if($alert)
                                                bg-yellow-300 dark:bg-yellow-400
                                                hover:bg-yellow-400 dark:hover:bg-yellow-500
                                            @else
                                                @if($user->objs[$keys[$i]]->type == 'night')
                                                    @if($user->objs[$keys[$i]]->extra == 'extra')
                                                        @if($user->objs[$keys[$i]]->multi)
                                                            bg-yellow-400 dark:bg-yellow-500
                                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                        @else
                                                            bg-indigo-400 dark:bg-indigo-500
                                                            hover:bg-indigo-300 dark:hover:bg-indigo-400
                                                            @php
                                                                $allOk = false;
                                                            @endphp
                                                        @endif
                                                    @elseif($user->objs[$keys[$i]]->extra == 'task')
                                                        @if($user->objs[$keys[$i]]->multi)
                                                            bg-yellow-400 dark:bg-yellow-500
                                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                        @else
                                                            bg-emerald-400 dark:bg-emerald-500
                                                            hover:bg-emerald-300 dark:hover:bg-emerald-400
                                                        @endif
                                                    @else
                                                        @if($user->objs[$keys[$i]]->under == 'under')
                                                            @if($user->objs[$keys[$i]]->multi)
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
                                                            @if($user->objs[$keys[$i]]->multi)
                                                                bg-yellow-400 dark:bg-yellow-500
                                                                hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                            @else
                                                                bg-green-400 dark:bg-green-500
                                                                hover:bg-green-300 dark:hover:bg-green-400
                                                            @endif
                                                        @endif
                                                    @endif
                                                @else
                                                    @if($user->objs[$keys[$i]]->extra == 'extra')
                                                        @if($user->objs[$keys[$i]]->multi)
                                                            bg-yellow-300 dark:bg-yellow-400
                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                        @else
                                                            bg-indigo-300 dark:bg-indigo-400
                                                            hover:bg-indigo-400 dark:hover:bg-indigo-500
                                                            @php
                                                                $allOk = false;
                                                            @endphp
                                                        @endif
                                                    @elseif($user->objs[$keys[$i]]->extra == 'task')
                                                        @if($user->objs[$keys[$i]]->multi)
                                                            bg-yellow-300 dark:bg-yellow-400
                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                        @else
                                                            bg-emerald-300 dark:bg-emerald-400
                                                            hover:bg-emerald-400 dark:hover:bg-emerald-500
                                                        @endif
                                                    @else
                                                        @if($user->objs[$keys[$i]]->under == 'under')
                                                            @if($user->objs[$keys[$i]]->multi)
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
                                                            @if($user->objs[$keys[$i]]->multi)
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
                            <span class="text-2xl">
                                @if($user->objs[$keys[$i]]->extra == 'task' && !$user->objs[$keys[$i]]->multi)
                                    🎯
                                @else
                                    @if($user->objs[$keys[$i]]->eventStop)
                                        @if($alert)
                                            ⚠️
                                        @else
                                            @if($user->objs[$keys[$i]]->type == 'night')
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
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                RCP
                            </span>
                        </div>

                        <!-- Godziny i dni -->
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm @if($user->objs[$keys[$i]]->eventStop) @if($user->objs[$keys[$i]]->multi || $alert) text-gray-800 dark:text-gray-900 @else text-gray-800 dark:text-gray-100 @endif @else text-gray-800 dark:text-gray-100 @endif leading-tight">
                                <div class="font-semibold tracking-widest uppercase">
                                    {{ \Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)->format('H:i') }}
                                    –
                                    @if($user->objs[$keys[$i]]->eventStop)
                                    {{ \Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStop->time)->format('H:i') }} @else <span
                                    title="Error"><x-status-red>Error</x-status-red></span> @endif
                                </div>

                                <div
                                    class="text-[0.6rem] mt-1 font-medium tracking-widest @if($user->objs[$keys[$i]]->eventStop) @if($user->objs[$keys[$i]]->multi || $alert) text-gray-800 dark:text-gray-900 @else text-gray-800 dark:text-gray-100 @endif @else text-gray-800 dark:text-gray-100 @endif">
                                    {{
                            \Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)
                                ->locale('pl')
                                ->translatedFormat('D') 
                                        }}
                                    –
                                    @if($user->objs[$keys[$i]]->eventStop) {{
                                        \Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStop->time)
                                            ->locale('pl')
                                            ->translatedFormat('D') 
                                    }} @else <span title="Error"><x-status-red>Error</x-status-red></span> @endif
                                </div>
                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            @if($user->objs[$keys[$i]]->eventStop)
                                @if($user->objs[$keys[$i]]->multi && !$alert)
                                    Wielokrotny odczyt pracy
                                @elseif($alert)
                                    {{$alert_kind}}
                                @else
                                    {{$user->objs[$keys[$i]]->time_in_work}}
                                @endif
                            @else
                                <x-status-red>Error</x-status-red>
                            @endif
                        </p>
                        @if($user->objs[$keys[$i]]->extra == 'task')
                            @if($user->objs[$keys[$i]]->multi)@else
                                <div class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($user->objs[$keys[$i]]->task->note), 10, '...') }}
                                </div>
                            @endif
                        @endif
                    </a>
                    @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                        @if($allOk == false)
                            <x-button-link-neutral href="{{route('rcp.work-session.fix', $user->objs[$keys[$i]])}}"
                                class="text-xs absolute top-0 right-0 w-fit mx-auto"
                                style="padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;">
                                <i class="fa-solid fa-hammer"></i>
                            </x-button-link-neutral>
                        @endif
                        @if($user->objs[$keys[$i]]->extra == 'task')
                            @if($user->objs[$keys[$i]]->multi)@else
                                <x-button-link-neutral href="{{route('rcp.work-session.show', $user->objs[$keys[$i]])}}"
                                    class="text-xs absolute top-0 right-0 w-fit mx-auto"
                                    style="padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;">
                                    <i class="fa-solid fa-eye"></i>
                                </x-button-link-neutral>
                            @endif
                        @endif
                        @if($alert && $alert_kind == 'Automatyczne zakończenie')
                            <x-button-link-neutral href="{{route('rcp.work-session.fix', $user->objs[$keys[$i]])}}"
                                class="text-xs absolute top-0 right-0 w-fit mx-auto"
                                style="padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;">
                                <i class="fa-solid fa-hammer"></i>
                            </x-button-link-neutral>
                        @elseif($alert)
                            <x-button-link-neutral href="{{route('rcp.work-session.show', $user->objs[$keys[$i]])}}"
                                class="text-xs absolute top-0 right-0 w-fit mx-auto"
                                style="padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;">
                                <i class="fa-solid fa-eye"></i>
                            </x-button-link-neutral>
                        @endif
                    @endif
                </td>
            @elseif($currentStatus === 'progress')
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="@if($user->objs[$keys[$i]]->multi) {{route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => \Carbon\Carbon::createFromFormat('d.m.y', $startDate)->format('Y-m-d'), 'end_date' => \Carbon\Carbon::createFromFormat('d.m.y', $endDate)->format('Y-m-d')])}} @else {{route('rcp.work-session.show', $user->objs[$keys[$i]])}} @endif"
                        class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full rounded-2xl p-2
                                        @if($user->objs[$keys[$i]]->type == 'night')
                                            bg-yellow-400 dark:bg-yellow-500
                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                        @else
                                            bg-yellow-300 dark:bg-yellow-400
                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                        @endif
                                        transition-colors duration-200 
                                        ">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full">
                            <span class="text-2xl">
                                @if($user->objs[$keys[$i]]->type == 'night')
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
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">
                                <div class="font-semibold tracking-widest uppercase">
                                    {{ \Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)->format('H:i') }}
                                    –
                                    Teraz
                                </div>

                                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">
                                    {{
                            \Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)
                                ->locale('pl')
                                ->translatedFormat('D') 
                                        }}
                                    –
                                    Teraz
                                </div>
                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            W trakcie pracy
                        </p>

                    </a>
                </td>
            @elseif ($currentStatus === 'leave')
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">
                    @php
                        $user_auth = auth()->user();
                    @endphp
                    <a href="@if($user_auth->role == 'admin' || $user_auth->role == 'właściciel' || $user_auth->role == 'menedżer') {{route('leave.pending.edit', $currentObj)}} @else {{route('leave.single.edit', $currentObj)}} @endif"
                        class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full bg-pink-200 dark:bg-pink-400/60
                                        rounded-2xl p-2 transition-colors duration-200 
                                        hover:bg-pink-300 dark:hover:bg-pink-500/70">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full w-fit">
                            <span class="text-2xl">{{ config('leavetypes.icons.' . $currentObj->type, '') }}</span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-pink-300 text-gray-900 uppercase tracking-widest">
                                {{ config('leavetypes.shortType.' . $currentObj->type, '') }}
                            </span>
                        </div>
                        <!-- Dane szczegółowe -->
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
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
                        </div>

                        <!-- Opis -->
                        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            WNIOSEK
                        </p>

                    </a>
                </td>
            @elseif ($currentStatus === 'holiday')
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <div class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full bg-rose-200 dark:bg-rose-400/60
                                        rounded-2xl p-2 transition-colors duration-200 
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
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                                <div class="font-semibold tracking-widest uppercase">
                                    Święto
                                </div>

                                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                                    Ustawowo
                                </div>
                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            Wolne
                        </p>

                    </div>
                </td>
            @elseif (!empty($currentStatus))
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                </td>
            @else
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                    <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                        class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700 ">
                        <a href="{{route('rcp.work-session.create.user', [$user, $startDate])}}" class="group h-[180px] relative flex flex-col items-center justify-center text-center
                                            w-full rounded-2xl p-2
                                            bg-green-300/60 dark:bg-green-400/60 backdrop-blur-md
                                            transition-all duration-300 ease-out
                                            opacity-0 hover:opacity-100">

                            <!-- Główna ikona i etykieta -->
                            <div class="flex flex-col items-center justify-center h-full">
                                <span class="text-2xl">
                                    ⏱️
                                </span>
                                <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                    bg-white/60 text-gray-900 uppercase tracking-widest">
                                    RCP
                                </span>
                            </div>

                            <!-- Sekcja akcji -->
                            <div class="mt-2 h-full flex flex-col justify-center items-center">
                                <div class="flex flex-col justify-center items-center text-gray-900 dark:text-gray-900 
                                                    text-xs uppercase tracking-widest bg-green-300 
                                                    px-4 py-2 rounded-lg backdrop-blur-sm font-semibold">
                                    <div class="font-bold tracking-widest uppercase flex items-center gap-2">
                                        <i class="fa-solid fa-plus"></i>
                                        NOWA
                                    </div>
                                </div>
                            </div>


                            <!-- Opis -->
                            <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                Praca
                            </p>
                        </a>
                    </td>
                @else
                    <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                        class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                    </td>
                @endif
            @endif
            @php
                $i += $span; // przeskocz dalej o scaloną grupę
            @endphp
        @endwhile
    @else
        <td
            class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
        </td>
    @endif
</tr>