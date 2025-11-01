@props([
'headers' => [], 
'items' => collect(),
'emptyMessage' => 'Brak danych do wyświetlenia.',
])

<table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden md:table">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
        <tr>
            <th class="px-6 py-3 hidden lg:table-cell">
                <x-flex-center>
                    <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </x-flex-center>
            </th>

            @foreach ($headers as $header)
            <th scope="col" class="px-6 py-3 text-center">
                {{ $header }}
            </th>
            @endforeach
        </tr>
    </thead>

    <tbody id="body">
        @if ($items->isEmpty())
        <tr class="bg-white dark:bg-gray-800">
            <td colspan="8" class="px-3 py-2">
                <x-empty-place />
            </td>
        </tr>
        @else
        {{ $slot }}
        @endif
    </tbody>
</table>