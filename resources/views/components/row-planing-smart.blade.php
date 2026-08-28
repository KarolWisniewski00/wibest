@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

    <td class="px-1 py-1 sticky md:left-0 md:z-20 bg-white dark:bg-gray-800">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-1 font-semibold uppercase tracking-widest">
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
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->starts_at)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->ends_at)->format('H:i') : null;
                } catch (\Exception $e) {
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->start_date)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->end_date)->format('H:i') : null;
                }

                // 🔸 Łącz tylko jeśli status i godziny są identyczne
                for ($j = $i + 1; $j < $count; $j++) {
                    $nextStatus = $entries[$j];
                    $nextObj = $user->objs[$keys[$j]] ?? null;
                    try {
                        $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->starts_at)->format('H:i') : null;
                        $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->ends_at)->format('H:i') : null;
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
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="@if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel') {{route('calendar.work-schedule.edit', $user->objs[$keys[$i]])}} @endif"
                        class=" flex flex-col items-center justify-center text-center 
                                        w-full rounded-2xl p-1
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
                            <span class="text-lg">
                                @if($user->objs[$keys[$i]]->type == 'night')
                                    🌙
                                @else
                                    🌀
                                @endif
                            </span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                ZMI
                            </span>
                        </div>

                    </a>
                </td>
            @elseif ($currentStatus === 'leave')
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">
                    @php
                        $user_auth = auth()->user();
                    @endphp
                    <a href="@if($user_auth->role == 'admin' || $user_auth->role == 'właściciel' || $user_auth->role == 'menedżer') {{route('leave.pending.edit', $currentObj)}} @else {{route('leave.single.edit', $currentObj)}} @endif"
                        class=" flex flex-col items-center justify-center text-center 
                                        w-full bg-pink-200 dark:bg-pink-400/60
                                        rounded-2xl p-1 transition-colors duration-200 
                                        hover:bg-pink-300 dark:hover:bg-pink-500/70">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full w-fit">
                            <span class="text-lg">{{ config('leavetypes.icons.' . $currentObj->type, '') }}</span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-pink-300 text-gray-900 uppercase tracking-widest">
                                {{ config('leavetypes.shortType.' . $currentObj->type, '') }}
                            </span>
                        </div>
                    </a>
                </td>
            @elseif ($currentStatus === 'static')
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="@if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel') {{ route('team.user.planing', $user) }} @endif"
                        class=" flex flex-col items-center justify-center text-center w-full
                                    bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-1
                                    transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">

                        <!-- Ikona i etykieta -->
                        <div class="flex flex-col items-center justify-center h-full">
                            <span class="text-lg">🏢</span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-blue-300 text-gray-900 uppercase tracking-widest">
                                STA
                            </span>
                        </div>
                    </a>
                </td>
            @elseif ($currentStatus === 'holiday')
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <div class=" flex flex-col items-center justify-center text-center 
                                        w-full bg-rose-200 dark:bg-rose-400/60
                                        rounded-2xl p-1 transition-colors duration-200 
                                        hover:bg-rose-300 dark:hover:bg-rose-500/70">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full w-fit">
                            <span class="text-lg">🎌</span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-rose-300 text-gray-900 uppercase tracking-widest">
                                ŚUW
                            </span>
                        </div>

                    </div>
                </td>
            @elseif (!empty($currentStatus))
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}"
                    class="px-1 py-1 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                </td>
            @else
                <td colspan="{{ $span }}" title="{{ $startDate }} - {{ $endDate }}" class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700 
                            @if($user->working_hours_regular == 'stały planing')
                                dark:bg-gray-800
                                transition-colors duration-200 
                                dark:hover:bg-gray-700
                            @endif">
                    @if($user->working_hours_regular == 'zmienny planing')
                        @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')

                        @endif
                    @else

                        @if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
                        @else
                            @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                                <a href="{{ route('team.user.config_planing', $user->id) }}" class="flex flex-col items-center justify-center text-center 
                                                    w-full rounded-2xl p-1  
                                                    bg-yellow-300 dark:bg-yellow-400
                                                    transition-colors duration-200 
                                                    hover:bg-yellow-400 dark:hover:bg-yellow-500">

                                    <!-- Ikona i label -->
                                    <div class="flex flex-col items-center justify-center h-full">
                                        <span class="text-lg">
                                            ⚠️
                                        </span>
                                        <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                            ALE
                                        </span>
                                    </div>

                                </a>
                            @else
                                <div class="flex flex-col items-center justify-center text-center 
                                                    w-full   rounded-2xl p-1
                                                    bg-yellow-300 dark:bg-yellow-400
                                                    transition-colors duration-200 
                                                    hover:bg-yellow-400 dark:hover:bg-yellow-500">

                                    <!-- Ikona i label -->
                                    <div class="flex flex-col items-center justify-center h-full">
                                        <span class="text-lg">
                                            ⚠️
                                        </span>
                                        <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                            ALE
                                        </span>
                                    </div>

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
        <td
            class="px-1 py-1 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
        </td>
    @endif
</tr>