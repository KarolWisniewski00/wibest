@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2 hidden md:table-cell sticky md:left-0 md:z-30 bg-white dark:bg-gray-800 min-w-[32px]">
        <x-flex-center>
            <input type="radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="{{ $user->id }}" data-name="{{ $user->name }}" name="radio">
        </x-flex-center>
    </td>

    <td class="px-2 py-2 sticky md:left-8 md:z-20 bg-white dark:bg-gray-800 min-w-[280px]">
        <x-team-user-identity :user="$user" />
    </td>
    @if($user->working_hours_regular == 'stały planing')
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
                    @if($user->time_in_work_hms_planned != '')
                        <x-report-time :value="$user->time_in_work_hms_planned" />
                    @else
                        @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                            <x-alert-link href="{{ route('team.user.config_planing', $user->id) }}">
                                Konfiguracja
                            </x-alert-link>
                        @else
                            <x-alert-link href="">
                                Konfiguracja
                            </x-alert-link>
                        @endif
                    @endif
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_total" tone="neutral" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms" tone="work" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_extra" tone="extra" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_under" tone="under" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_leave" tone="leave" />
        </td>
        @if($user->leave_times_by_type)
            @php
                $shortTypes = config('leavetypes.shortType', []);
            @endphp
            @foreach ($shortTypes as $type => $short)
                @php
                    $leaveType = collect($user->leave_times_by_type)
                        ->firstWhere('type', $type);
                @endphp
                <td class="px-3 py-2 font-semibold text-lg text-gray-700 dark:text-gray-50  min-w-[200px]">
                    <x-report-time :value="$leaveType['hms'] ?? null" tone="leave" />
                </td>
            @endforeach
        @endif
    @else
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            @if($user->time_in_work_hms_planned != '')
                @if($user->time_in_work_hms_planned != '00h 00min 00s')
                    <x-report-time :value="$user->time_in_work_hms_planned" />
                @else
                    <x-alert-link href="{{ route('calendar.work-schedule.index') }}" class="text-sm">
                        Zaplanuj godziny pracy
                    </x-alert-link>
                @endif
            @else
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                    <x-alert-link href="{{ route('team.user.config_planing', $user->id) }}" class="text-sm">
                        Konfiguracja
                    </x-alert-link>
                @else
                    <x-alert-span href="" class="text-sm">
                        Konfiguracja
                    </x-alert-span>
                @endif
            @endif
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_total" tone="neutral" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms" tone="work" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_extra" tone="extra" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_under" tone="under" />
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <x-report-time :value="$user->time_in_work_hms_leave" tone="leave" />
        </td>
        @if($user->leave_times_by_type)
            @php
                $shortTypes = config('leavetypes.shortType', []);
            @endphp
            @foreach ($shortTypes as $type => $short)
                @php
                    $leaveType = collect($user->leave_times_by_type)
                        ->firstWhere('type', $type);
                @endphp
                <td class="px-3 py-2 font-semibold text-lg text-gray-700 dark:text-gray-50  min-w-[200px]">
                    <x-report-time :value="$leaveType['hms'] ?? null" tone="leave" />
                </td>
            @endforeach
        @endif
    @endif
</tr>