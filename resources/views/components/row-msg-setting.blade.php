@props(['msg'])
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-3 py-2">
        <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <x-user-photo :user="$msg->user" />
            <x-user-name :user="$msg->user" />
        </div>
    </td>

    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $msg->type }}
            </x-status-gray>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            @if($msg->type == 'email')
            <x-text-cell-a class="text-xs" href="mailto:{{ $msg->recipient }}" style="word-break: break-all;">
                <span>📧</span>
                {{ $msg->recipient }}
            </x-text-cell-a>
            @elseif($msg->type == 'sms')
            <x-text-cell-a class="text-xs" href="tel:{{ $msg->recipient }}">
                <span>📱</span>
                {{ $msg->recipient }}
            </x-text-cell-a>
            @endif
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
        @if($msg->subject == 'Wnioski')
        <div class="flex flex-col items-center justify-center h-full w-full">
            <span class="text-lg md:text-xl">
                📋
            </span>
            <x-label-pink class="mt-1">
                WNIOSKI
            </x-label-pink>
        </div>
        @elseif($msg->subject == 'Zadanie')
        <x-status-gray class="text-xs">
            🎯 Zadanie
        </x-status-gray>
        @elseif($msg->subject == 'RCP')
        <div class="flex flex-col items-center justify-center h-full w-full">
            <span class="text-lg md:text-xl">
                ⏱️
            </span>
            <x-label-green class="mt-1">
                RCP
            </x-label-green>
        </div>
        @else
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $msg->subject }}
            </x-status-gray>
        </x-paragraf-display>
        @endif
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $msg->body }}
            </x-status-gray>
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            @if($msg->status == 'FAILED')
            <x-status-red>
                {{ $msg->status }}
            </x-status-red>
            @elseif($msg->status == 'SENT')
            <x-status-green>
                {{ $msg->status }}
            </x-status-green>
            @elseif($msg->status == 'QUEUE')
            <x-status-yellow>
                {{ $msg->status }}
            </x-status-yellow>
            @elseif($msg->status == 'UNKNOW')
            <x-status-gray>
                {{ $msg->status }}
            </x-status-gray>
            @endif
        </x-paragraf-display>
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        @if($msg->price != 0)
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $msg->price }} PLN
            </x-status-gray>
        </x-paragraf-display>
        @endif
    </td>
    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
        <x-paragraf-display class="text-xs whitespace-nowrap">
            <x-status-cello>
                {{ $msg->created_at->format('d.m.Y H:i') }}
            </x-status-cello>
        </x-paragraf-display>
    </td>
</tr>