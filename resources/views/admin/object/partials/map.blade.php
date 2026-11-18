<div class="relative overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 xl:col-span-2 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300"
    x-data="wibestObjectMaps({ objects: {{ \Illuminate\Support\Js::from($mapObjects) }}, apiKey: {{ \Illuminate\Support\Js::from(config('services.google.maps_key')) }} })">
    <div class="flex flex-wrap items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
        <div class="flex items-center gap-3">
            <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex">
                <i class="fa-solid fa-location-dot text-lg sm:text-2xl" aria-hidden="true"></i>
            </div>
            <div class="text-start">
                <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Mapa obiektów</h2>
                <p class="text-xs text-gray-600 dark:text-gray-300">Lokalizacja obiektów</p>
            </div>
        </div>
        <button type="button" x-ref="openButton" @click="$dispatch('open-wireui-modal:objects-full-map')" aria-haspopup="dialog" aria-controls="objects-full-map-dialog" :aria-expanded="fullMapOpen"
            class="group rounded-lg px-3 py-2 text-xs font-medium text-gray-600 transition hover:bg-green-50 hover:text-green-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-600 focus-visible:ring-offset-2 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-green-200 dark:focus-visible:ring-green-300 dark:focus-visible:ring-offset-gray-700">
            Zobacz pełną mapę <i class="fa-solid fa-arrow-right ml-1 text-[10px] transition-transform motion-safe:group-hover:translate-x-1 motion-reduce:transition-none" aria-hidden="true"></i>
        </button>
    </div>
    <div class="relative h-[360px] bg-gray-100 dark:bg-gray-700">
        <div x-ref="cardMap" class="h-full w-full" wire:ignore aria-label="Mapa lokalizacji obiektów"></div>
        <div x-show="message" class="absolute inset-0 z-20 flex items-center justify-center bg-white/95 p-6 text-center text-sm text-gray-700 dark:bg-gray-700 dark:text-gray-200" role="status" aria-live="polite"><p x-text="message">Ładowanie mapy…</p></div>
        <x-object.map-legend />
    </div>

    <template x-teleport="body">
        <x-modal name="objects-full-map" spacing="p-0 sm:p-6" max-width="sm:max-w-none" align="center" z-index="z-[1100]"
            @open="fullMapOpen = true" @close="fullMapOpen = false">
            <div id="objects-full-map-dialog" role="dialog" aria-modal="true" aria-labelledby="objects-full-map-title" tabindex="-1" x-trap.inert="show"
                class="relative flex h-[100dvh] w-full flex-col overflow-hidden bg-white shadow-xl outline-none dark:bg-gray-700 sm:h-[90dvh] sm:w-[94vw] sm:rounded-2xl">
                <div class="flex shrink-0 items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                    <div class="text-start"><h2 id="objects-full-map-title" class="font-semibold text-gray-900 dark:text-white">Mapa obiektów</h2><p class="text-xs text-gray-600 dark:text-gray-300">Lokalizacja obiektów</p></div>
                    <button type="button" @click="close" aria-label="Zamknij pełną mapę" class="flex h-11 items-center justify-center gap-2 rounded-lg px-3 text-sm text-gray-700 transition hover:bg-gray-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-600 dark:text-gray-200 dark:hover:bg-gray-600 dark:focus-visible:ring-green-300"><span>Zamknij</span><i class="fa-solid fa-xmark text-xl" aria-hidden="true"></i></button>
                </div>
                <div class="relative min-h-0 flex-1 bg-gray-100 dark:bg-gray-700">
                    <div id="objects-full-map" class="h-full w-full" wire:ignore aria-label="Pełna mapa lokalizacji obiektów"></div>
                    <div x-show="message" class="absolute inset-0 z-20 flex items-center justify-center bg-white/95 p-6 text-center text-sm text-gray-700 dark:bg-gray-700 dark:text-gray-200" role="status" aria-live="polite"><p x-text="message"></p></div>
                    <x-object.map-legend />
                </div>
            </div>
        </x-modal>
    </template>
</div>
