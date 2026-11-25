<li data-rcp-filter-loading aria-busy="true">
    <div data-rcp-filter-skeleton class="p-2 space-y-2" role="status" aria-label="Ładowanie filtra klasyfikacji">
        <div class="h-6 w-32 mb-4 rounded-lg bg-gray-200 dark:bg-gray-700 animate-pulse motion-reduce:animate-none"></div>
        @foreach(range(1, 4) as $placeholder)
            <div class="h-11 w-full rounded-full bg-gray-200 dark:bg-gray-700 animate-pulse motion-reduce:animate-none"></div>
        @endforeach
    </div>
    <div data-rcp-filter-content style="display: none;">
    <button type="button"
        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700"
        aria-controls="rcp-classification-dropdown" aria-expanded="true" data-collapse-toggle="rcp-classification-dropdown">
        <span class="flex-1 text-left rtl:text-right whitespace-nowrap text-md">Klasyfikacja</span>
        <i class="fa-solid fa-chevron-up" aria-hidden="true"></i>
    </button>
    <div id="rcp-classification-dropdown">
    <fieldset class="space-y-2 p-2">
        <legend class="sr-only">Klasyfikacja</legend>
        <div class="space-y-2">
        @foreach([
            ['under', '📉 Brak normy', 'peer-checked:bg-green-300/20 peer-checked:text-green-800 dark:peer-checked:bg-green-300/20 dark:peer-checked:text-green-300'],
            ['normal', '✅ Norma', 'peer-checked:bg-green-300 peer-checked:text-gray-900 dark:peer-checked:bg-green-300 dark:peer-checked:text-gray-900'],
            ['overtime', '⏱️ Nadgodziny', 'peer-checked:bg-indigo-300 peer-checked:text-gray-900 dark:peer-checked:bg-indigo-300 dark:peer-checked:text-gray-900'],
            ['in_progress', '⏳ W trakcie pracy', 'peer-checked:bg-yellow-300 peer-checked:text-gray-900 dark:peer-checked:bg-yellow-300 dark:peer-checked:text-gray-900'],
        ] as [$value, $label, $tone])
            <label class="group block cursor-pointer">
                <input type="checkbox" name="rcp_classifications[]" value="{{ $value }}" @checked(in_array($value, session('rcp.filters.classifications', ['under', 'normal', 'overtime', 'in_progress']))) disabled data-rcp-filter-input class="peer sr-only">
                <span class="flex items-center justify-center rounded-full bg-gray-100 px-4 py-3 text-sm font-semibold text-gray-600 transition duration-200 group-hover:brightness-95 peer-checked:shadow-sm peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-green-500 dark:bg-gray-700 dark:text-gray-300 dark:group-hover:brightness-110 {{ $tone }}">{{ $label }}</span>
            </label>
        @endforeach
        </div>
    </fieldset>
    </div>
    </div>
</li>
