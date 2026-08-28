@props(['leave'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2  min-w-[200px]">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$leave->user" />
            <x-user-name :user="$leave->user" />
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50  min-w-[200px]">
        <div class="flex flex-col items-center justify-center gap-2 my-auto">
            <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                <x-status-cello>
                    {{$leave->year}}
                </x-status-cello>
            </x-paragraf-display>
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50  min-w-[200px]">
        <div class="flex flex-col items-center justify-center gap-2 my-auto">
            <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                <x-status-gray>
                    {{ $leave->base_days }}
                </x-status-gray>
            </x-paragraf-display>
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50  min-w-[200px]">
        <div class="flex flex-col items-center justify-center gap-2 my-auto">
            <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                <x-status-gray>
                    {{ $leave->carried_over }}
                </x-status-gray>
            </x-paragraf-display>
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50  min-w-[200px]">
        <div class="flex flex-col items-center justify-center gap-2 my-auto">
            <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                <x-status-orange>
                    {{ $leave->used_days }}
                </x-status-orange>
            </x-paragraf-display>
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50  min-w-[200px]">
        <div class="flex flex-col items-center justify-center gap-2 my-auto">
            <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                <x-status-gray>
                    {{ ($leave->carried_over + $leave->base_days) - $leave->used_days }}
                </x-status-gray>
            </x-paragraf-display>
        </div>
    </td>
    <td class="px-3 py-2  min-w-[200px]">
        <x-button-link-blue href="{{ route('leave.balance.edit', $leave) }}" class="min-h-[38px]">
            <i class="fa-solid fa-pen-to-square"></i>
        </x-button-link-blue>
    </td>
</tr>