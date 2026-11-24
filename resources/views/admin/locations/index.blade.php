<x-app-layout class="flex">
<x-sidebar-left>
<x-search-filter placeholder="Wyszukaj pracownika" />
<x-filter-date-user loader="objects">{{ route('rcp.location.index') }}</x-filter-date-user>
<input type="hidden" id="start_date" value="{{ $startDate }}">
<input type="hidden" id="end_date" value="{{ $endDate }}">
</x-sidebar-left>
<x-main><x-RCP.nav :countEvents="$countEvents" />
<div class="mx-4 my-4 flex flex-wrap items-center justify-between gap-4">
    <div class="flex items-center gap-3">
        <div class="flex h-11 sm:h-14 w-11 sm:w-14 items-center justify-center rounded-xl sm:rounded-2xl bg-green-300/10 text-green-300 [@media(prefers-color-scheme:light)]:text-green-700 [@media(prefers-color-scheme:light)]:bg-green-100">
            <i class="fa-solid fa-map-location-dot text-2xl" aria-hidden="true"></i>
        </div>
        <div class="text-start">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Mapa</h1>
            <p class="text-sm text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Lokalizacje pracowników i zasięgi obiektów</p>
        </div>
    </div>
</div>
@include('admin.object.partials.date-navigation', ['month' => \Carbon\Carbon::parse($startDate)])
<div class="m-4 text-gray-900 dark:text-white" x-data="{ loading: false, error: '', controller: null, async refresh(detail) {
this.controller?.abort(); const requestController = new AbortController(); this.controller = requestController; this.loading = true; this.error = '';
window.dispatchEvent(new CustomEvent('map-readings-clear'));
try { const url = new URL(window.location.href); url.searchParams.set('start_date', detail.start); url.searchParams.set('end_date', detail.end); url.searchParams.set('search', detail.search || '');
const response = await fetch(url, { signal: requestController.signal, headers: {'X-Requested-With': 'XMLHttpRequest'} }); if (!response.ok) throw Error();
const data = await response.json(); if (this.controller !== requestController) return; window.dispatchEvent(new CustomEvent('map-readings', {detail: data.readings}));
} catch(e) { if(e.name !== 'AbortError' && this.controller === requestController) this.error = 'Nie udało się odświeżyć mapy'; } finally { if (this.controller === requestController) this.loading = false; }
} }" x-init="if (document.getElementById('search')?.value.trim()) refresh({ start: document.getElementById('start_date').value, end: document.getElementById('end_date').value, search: document.getElementById('search').value })" @object-date-range.window="refresh($event.detail)">
<p x-text="error" role="alert"></p>
<div class="relative overflow-hidden rounded-2xl" x-data="wibestObjectMaps({ fitReadings: true, objects: {{ \Illuminate\Support\Js::from($mapObjects) }}, readings: {{ \Illuminate\Support\Js::from($mapEvents) }}, apiKey: {{ \Illuminate\Support\Js::from(config('services.google.maps_key')) }} })" @map-readings.window="updateReadings($event.detail)" @map-readings-clear.window="updateReadings([], { preserveCamera: true })">
<div x-ref="cardMap" class="h-[70vh] w-full"></div>
<div x-show="loading" x-cloak x-transition.opacity.duration.200ms class="rcp-map-scan pointer-events-none absolute inset-0 z-20" role="status" aria-label="Odświeżanie punktów mapy">
    <div class="rcp-map-scan-beam" aria-hidden="true"></div>
</div>
<div class="absolute bottom-8 right-3 left-3 z-10 flex flex-wrap items-center gap-x-4 gap-y-2 rounded-xl bg-white/95 px-4 py-3 text-xs text-gray-700 shadow-lg backdrop-blur dark:bg-gray-700 dark:text-gray-200 sm:right-auto sm:max-w-lg" aria-label="Legenda statusów obiektów">
    @foreach(['bg-blue-300' => 'Planowany', 'bg-green-300' => 'Aktywny', 'bg-yellow-400' => 'Wstrzymany', 'bg-red-300' => 'Odwołany', 'bg-gray-500' => 'Zakończony'] as $color => $label)
        <span class="flex items-center gap-2 whitespace-nowrap"><span class="h-2.5 w-2.5 rounded-full {{ $color }} ring-1 ring-black/10" aria-hidden="true"></span>{{ $label }}</span>
    @endforeach
</div><p x-show="message" x-text="message"></p>
</div></div></x-main></x-app-layout>
