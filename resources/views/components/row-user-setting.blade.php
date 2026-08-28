@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$user->user_id" />
            <x-user-name :user="$user->user_id" />
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
                {{ $user->unassigned_at ? $user->unassigned_at->format('d.m.Y') : '' }}
            </x-status-cello>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-cello>
                {{ $user->employment_start ? $user->employment_start->format('d.m.Y') : '' }}
            </x-status-cello>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-cello>
                {{ $user->employment_end ? $user->employment_end->format('d.m.Y') : '' }}
            </x-status-cello>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-cello>
                {{ $user->paid_from ? $user->paid_from->format('d.m.Y') : '' }}
            </x-status-cello>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-cello>
                {{ $user->paid_to ? $user->paid_to->format('d.m.Y') : '' }}
            </x-status-cello>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $user->user_price ? $user->user_price : '' }} PLN
            </x-status-gray>
        </x-paragraf-display>
    </td>

    @if(isset($user->user_id->id))
    @if(!request()->routeIs('setting'))
    <x-show-cell href="{{route('setting.user.show', $user->user_id)}}" />
    @else
    <x-show-cell href="{{route('team.user.show', $user->user_id)}}" />
    @endif
    @else
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50"></td>
    @endif
</tr>