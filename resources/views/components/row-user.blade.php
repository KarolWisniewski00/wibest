@props(['user'])

<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-3 py-2 hidden lg:table-cell">
        <x-flex-center>
            <input type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="{{ $user->id }}">
        </x-flex-center>
    </td>

    <td class="px-3 py-2">
        @if($user->company)
        <p class="text-start">
            <x-label-link-company href="{{route('setting.client.show', $user->company)}}"
                class="flex justify-start items-center font-semibold uppercase tracking-widest">
                {{ $user->company->name }}
            </x-label-link-company>
        </p>
        @else
        <p class="text-start">
            <x-alert-link href="{{route('setting.user.edit-company', $user)}}">
                Brak firmy
            </x-alert-link>
        </p>
        @endif
    </td>

    <td class="px-3 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$user" />
            <x-user-name :user="$user" />
        </div>
    </td>

    <td class="px-3 py-2">
        @if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
        @else
        @if($user->company)
        @if(!request()->routeIs('setting'))
        <x-alert-link href="{{route('setting.user.edit-planing', $user)}}">
            Ustaw godziny pracy
        </x-alert-link>
        @else
        <x-alert-link href="{{route('team.user.planing', $user)}}">
            Ustaw godziny pracy
        </x-alert-link>
        @endif
        @else
        <x-alert-link href="{{route('setting.user.edit-company', $user)}}">
            Brak firmy
        </x-alert-link>
        @endif
        @endif
    </td>

    @if(!request()->routeIs('setting'))
    <x-show-cell href="{{route('setting.user.show', $user)}}" />
    @else
    <x-show-cell href="{{route('team.user.show', $user)}}" />
    @endif
</tr>