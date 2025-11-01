@props(['client'])

<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-3 py-2 hidden lg:table-cell">
        <x-flex-center>
            <input type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="{{ $client->id }}">
        </x-flex-center>
    </td>

    <td class="px-3 py-2">
        <p class="text-start">
            <x-label-link-company href="{{route('setting.client.show', $client)}}" class="flex justify-start items-center font-semibold uppercase tracking-widest">
                {{ $client->name }}
            </x-label-link-company>
        </p>
    </td>

    <td class="px-3 py-2">
        <x-paragraf-display class="text-xs">
            {{ $client->adress }}
        </x-paragraf-display>
    </td>

    <td class="px-3 py-2">
        <x-paragraf-display class="text-xs">
            {{ $client->vat_number }}
        </x-paragraf-display>
    </td>

<td class="px-3 py-2">
    <x-paragraf-display class="text-xs">
        @if($client->getUsersCount() != 0)
        <span>👤</span> {{ $client->getUsersCount() }}
        @endif
    </x-paragraf-display>
</td>

    <x-show-cell href="{{route('setting.client.show', $client)}}" />
</tr>