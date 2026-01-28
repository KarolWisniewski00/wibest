@props(['client'])

<li class="snap-center">
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-3 text-start">
            <x-paragraf-display class="text-xs">
                <x-status-gray>
                    <span>🏢</span>{{ $client->name }}
                </x-status-gray>
            </x-paragraf-display>

            <x-paragraf-display class="text-xs">
                <x-status-gray>
                    <span>📍</span>{{ $client->adress }}
                </x-status-gray>
            </x-paragraf-display>

            <x-paragraf-display class="text-xs">
                <x-status-gray>
                    <span>🧾</span>{{ $client->vat_number }}
                </x-status-gray>
            </x-paragraf-display>

            <x-paragraf-display class="text-xs">
                @if($client->getUsersCount() != 0)
                <x-status-gray>
                    <span>👤</span> {{ $client->getUsersCount() }}
                </x-status-gray>
                @endif
            </x-paragraf-display>

            <x-paragraf-display class="text-xs">
                <x-status-gray>
                    <span>📩</span> {{ $client->msg->count() }}
                </x-status-gray>
            </x-paragraf-display>

            <x-paragraf-display class="text-xs">
                <x-status-gray>
                    <span>📱</span> {{ $client->msg->sum('price') ?? 0 }} PLN
                </x-status-gray>
            </x-paragraf-display>

            <div class="flex space-x-3">
                <x-button-link-neutral href="{{route('setting.client.show', $client)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
            </div>
        </div>
    </div>
</li>