@props(['user'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2 text-start">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                @if($user->company)<span>🏢</span> {{ $user->company->name }} @endif
            </x-status-gray>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$user" />
            <x-user-name :user="$user" />
        </div>
    </td>

    @if(!request()->routeIs('setting'))
    <x-show-cell href="{{route('setting.user.show', $user)}}" />
    @else
    <x-show-cell href="{{route('team.user.show', $user)}}" />
    @endif
</tr>