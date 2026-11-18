<div class="absolute bottom-8 left-3 right-3 z-10 flex flex-wrap items-center gap-x-4 gap-y-2 rounded-xl bg-white/95 px-4 py-3 text-xs text-gray-700 shadow-lg backdrop-blur dark:bg-gray-700 dark:text-gray-200 sm:right-auto" aria-label="Legenda statusów obiektów">
    @foreach([
        ['Planowany', 'bg-blue-300'],
        ['Aktywny', 'bg-green-300'],
        ['Wstrzymany', 'bg-yellow-400'],
        ['Odwołany', 'bg-red-300'],
        ['Zakończony', 'bg-gray-500'],
    ] as [$label, $color])
        <span class="flex items-center gap-2 whitespace-nowrap"><span class="h-2.5 w-2.5 rounded-full {{ $color }} ring-1 ring-black/10" aria-hidden="true"></span>{{ $label }}</span>
    @endforeach
</div>
