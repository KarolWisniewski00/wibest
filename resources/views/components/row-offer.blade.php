@props(['offer'])

<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $offer->number }}
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <td class="px-2 py-2 text-start">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                <span>🏢</span>{{ $offer->company->name }}
            </x-status-gray>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $offer->subtotal }}
            </x-status-gray>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $offer->total }}
            </x-status-gray>
        </x-paragraf-display>
    </td>
    <td class="px-2 py-2">
        <x-paragraf-display class=" text-xs whitespace-nowrap">
            <x-status-gray>
                {{ $offer->status }}
            </x-status-gray>
        </x-paragraf-display>
    </td>
    <x-show-cell href="{{ route('setting.offer.show', $offer) }}" />

</tr>