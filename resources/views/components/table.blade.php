@props([
'headers' => [],
'items' => collect(),
'emptyMessage' => 'Brak danych do wyświetlenia.',
'checkBox' => true,
'radio' => false,
])

<table id="table" class="w-full text-sm text-left text-gray-900 dark:text-gray-400 hidden md:table">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
        <tr>
            @if($checkBox)
            <th class="px-2 py-2 hidden md:table-cell">
                @if(!$radio)
                <x-flex-center>
                    <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </x-flex-center>
                @endif
            </th>
            @endif

            @foreach ($headers as $header)
            @if($header == 'Nazwa')
            <th scope="col" class="px-2 py-2 text-start">
                {{ $header }}
            </th>
            @else
            <th scope="col" class="px-2 py-2 text-center">
                {{ $header }}
            </th>
            @endif
            @endforeach
        </tr>
    </thead>

    <tbody id="body">
        @if ($items->isEmpty())
        <tr class="bg-white dark:bg-gray-800">
            <td colspan="999" class="px-2 py-2">
                <x-empty-place />
            </td>
        </tr>
        @else
        {{ $slot }}
        @endif
    </tbody>
</table>