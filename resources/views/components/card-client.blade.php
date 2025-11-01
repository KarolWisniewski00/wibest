@props(['client'])

<li class="snap-center">
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-3">
            <p class="text-start font-semibold text-gray-900 dark:text-gray-50">
                <x-label-link-company href="{{route('setting.client.show', $client)}}">
                    {{ $client->name }}
                </x-label-link-company>
            </p>

            <x-paragraf-display class="text-xs">
                {{ $client->adress }}
            </x-paragraf-display>

            <x-paragraf-display class="text-xs">
                {{ $client->vat_number }}
            </x-paragraf-display>

            <div class="flex space-x-3">
                <x-button-link-neutral href="{{route('setting.client.show', $client)}}" class="min-h-[38px]">
                    <i class="fa-solid fa-eye"></i>
                </x-button-link-neutral>
            </div>
        </div>
    </div>
</li>
