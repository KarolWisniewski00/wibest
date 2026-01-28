@props(['msg'])
<li class="snap-center">
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-4">
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs whitespace-nowrap gap-2">
                        <x-status-gray>
                            {{ $msg->type }}
                        </x-status-gray>
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
                        @if($msg->price != 0)
                        <x-status-gray>
                            {{ $msg->price }} PLN
                        </x-status-gray>
                        @endif
                    </x-paragraf-display>
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    @if($msg->subject == 'Wnioski')
                    <div class="flex flex-col items-center justify-center h-full">
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
                    <div class="flex flex-col items-center justify-center h-full">
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
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div class="flex justify-start items-center w-full justify-start text-xs">
                    <x-paragraf-display class="text-xs whitespace-nowrap gap-2">
                        <x-status-cello>
                            {{ $msg->created_at->format('d.m.Y H:i') }}
                        </x-status-cello>
                    </x-paragraf-display>
                </div>
            </div>
            <div class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                <x-user-photo :user="$msg->user" />
                <x-user-name :user="$msg->user" />
            </div>

        </div>
    </div>
</li>