@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2 table-cell sticky md:left-0 md:z-30 bg-white dark:bg-gray-800">
        <x-flex-center>
            <input type="radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="{{ $user->id }}"
                data-name="{{ $user->name }}"
                name="radio">
        </x-flex-center>
    </td>

    <td class="px-2 py-2 sticky md:left-8 md:z-20 bg-white dark:bg-gray-800">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$user" />
            <x-user-name :user="$user" />
        </div>
    </td>
    @if($user->working_hours_regular == 'stały planing')
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_planned != '')
                {{$user->time_in_work_hms_planned}}
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
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_total != '00h 00min 00s')
                {{$user->time_in_work_hms_total}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms != '00h 00min 00s')
                {{$user->time_in_work_hms}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_extra != '00h 00min 00s')
                {{$user->time_in_work_hms_extra}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_under != '00h 00min 00s')
                {{$user->time_in_work_hms_under}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_leave != '00h')
                {{$user->time_in_work_hms_leave}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    @else
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        @if($user->time_in_work_hms_planned != '')
        @if($user->time_in_work_hms_planned != '00h 00min 00s')
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                {{$user->time_in_work_hms_planned}}
            </span>
        </x-paragraf-display>
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
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_total != '00h 00min 00s')
                {{$user->time_in_work_hms_total}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms != '00h 00min 00s')
                {{$user->time_in_work_hms}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_extra != '00h 00min 00s')
                {{$user->time_in_work_hms_extra}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_under != '00h 00min 00s')
                {{$user->time_in_work_hms_under}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="font-semibold w-fit text-start text-sm py-2">
            <span class="text-gray-400">
                @if($user->time_in_work_hms_leave != '00h')
                {{$user->time_in_work_hms_leave}}
                @endif
            </span>
        </x-paragraf-display>
    </td>
    @endif
</tr>