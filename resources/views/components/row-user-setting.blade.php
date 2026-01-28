@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$user" />
            <x-user-name :user="$user" />
        </div>
    </td>

    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-cello>
                {{ $user->assigned_at ? $user->assigned_at->format('d.m.Y') : '' }}
            </x-status-cello>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-cello>
                {{ $user->paid_until ? $user->paid_until->format('d.m.Y') : '' }}
            </x-status-cello>
        </x-paragraf-display>
    </td>

    @if(!request()->routeIs('setting'))
    <x-show-cell href="{{route('setting.user.show', $user)}}" />
    @else
    <x-show-cell href="{{route('team.user.show', $user)}}" />
    @endif
</tr>