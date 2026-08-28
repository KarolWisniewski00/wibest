@props(['client'])

<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2 text-start">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                <span>🏢</span>{{ $client->name }}
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <td class="px-2 py-2">
        <x-paragraf-display class="text-xs">
            <x-status-gray>
                <span>📍</span>{{ $client->adress }}
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <td class="px-2 py-2">
        <x-paragraf-display class="text-xs">
            <x-status-gray>
                <span>🧾</span>{{ $client->vat_number }}
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <td class="px-2 py-2">
        <x-paragraf-display class="text-xs">
            <x-status-gray>
                @if($client->getUsersCount() != 0)
                <span>👤</span> {{ $client->getUsersCount() }}
                @else
                <span>👤</span> 0
                @endif
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <x-show-cell href="{{route('setting.client.show', $client)}}" />
</tr>