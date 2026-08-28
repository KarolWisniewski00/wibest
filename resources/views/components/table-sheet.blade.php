
@props([
'headers' => [],
'items' => collect(),
'emptyMessage' => 'Brak danych do wyświetlenia.',
'checkBox' => true,
'radio' => false,
])
<div id="max-h-js" class="overflow-auto rounded-lg">
        <script>
        function updateMaxHeight() {
            var $elem = $('#max-h-js');
            var rect = $elem[0].getBoundingClientRect();

            // Odległość od dolnej krawędzi ekranu
            var distanceToBottom = $(window).height() - rect.top;

            if (window.innerWidth < 768) {
                var maxHeight = Math.floor(distanceToBottom - 32);
            } else {
                var maxHeight = Math.floor(distanceToBottom - 48);
            }


            // Ustawiamy max-height
            $elem.css('max-height', maxHeight + 'px');
        }

        // Wywołanie na start
        updateMaxHeight();

        // Aktualizacja przy zmianie rozmiaru okna
        $(window).on('resize', updateMaxHeight);

        // Aktualizacja przy scrollowaniu
        $(window).on('scroll', updateMaxHeight);
    </script>
    <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="sticky top-0 z-40 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
            <tr>
                @if($checkBox)
                <th class="px-2 py-2 hidden sticky md:left-0 md:z-50 md:table-cell bg-gray-50 dark:bg-gray-700 min-w-[32px]">
                    @if(!$radio)
                    <x-flex-center>
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </x-flex-center>
                    @endif
                </th>
                @endif
                @foreach ($headers as $header)
                @if($header == 'Nazwa')
                @if($checkBox)
                <th scope="col" class="px-2 py-2 text-start sticky md:left-8 md:z-40 bg-gray-50 dark:bg-gray-700 min-w-[200px]">{{ $header }}</th>
                @else
                <th scope="col" class="px-2 py-2 text-start sticky md:left-0 md:z-40 bg-gray-50 dark:bg-gray-700 min-w-[200px]">{{ $header }}</th>
                @endif
                @else
                <th scope="col" class="px-2 py-2 text-center min-w-[200px]">
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
</div>