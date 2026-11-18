<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <x-main-no-filter>
        <x-object.nav />
        <x-container-content-form>

            <!--POWRÓT-->
            <x-button-link-back href="{{ route('object.dashboard') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <div class="min-w-0 space-y-4" x-data="wibestObjectPreview({ endpoint: {{ \Illuminate\Support\Js::from(route('object.show', $object)) }}, month: {{ \Illuminate\Support\Js::from($month->format('Y-m')) }}, objectId: {{ $object->id }}, selectedEmployeeId: {{ \Illuminate\Support\Js::from($workReport['selected_employee_id']) }} })" @object-period-request.stop="changeMonth($event.detail.url, $event.detail.step)">
                <div x-ref="period" class="[&>[data-month]]:my-0">@include('admin.object.partials.work-period', ['asyncPeriod' => true])</div>
                <p x-show="loading" x-cloak role="status" class="mb-3 text-xs text-gray-600 dark:text-gray-300"><i class="fa-solid fa-spinner animate-spin mr-2" aria-hidden="true"></i>Aktualizowanie miesiąca…</p>
                <p x-show="error" x-cloak role="alert" class="mb-3 text-sm text-red-700 dark:text-red-300"><span x-text="error"></span><button type="button" @click="changeMonth(pendingUrl)" class="ml-2 underline">Spróbuj ponownie</button></p>
            <div class="grid min-w-0 grid-cols-1 gap-4 lg:grid-cols-2">
                <section class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300" aria-labelledby="object-info-title">
                    <div class="flex items-center gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                        <x-object.type-icon :type="$object->object_type" />
                        <div class="text-start">
                            <h1 id="object-info-title" class="text-sm font-semibold text-gray-900 dark:text-white">Informacje o obiekcie</h1>
                            <p class="text-xs text-gray-600 dark:text-gray-300">Podstawowe informacje dotyczące miejsca pracy</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 p-5 text-start md:grid-cols-2">
                        @foreach([
                            'Nazwa obiektu' => $object->name,
                            'Dozwolona odległość od lokalizacji' => $object->allowed_distance.' m',
                        ] as $label => $value)
                            <x-text-cell class="min-w-0 pb-3">
                                <x-text-cell-label>{{ $label }}</x-text-cell-label>
                                <x-text-cell-value><span class="min-w-0 break-words text-lg font-semibold text-gray-900 [overflow-wrap:anywhere] dark:text-white">{{ $value }}</span></x-text-cell-value>
                            </x-text-cell>
                        @endforeach
                    </div>
                    @php
                        $typePresentation = config('work_objects.types.'.$object->object_type) ?? config('work_objects.default');
                        $today = now(config('app.timezone'));
                        $start = $object->starts_at;
                        $end = $object->ends_at;
                        $hasTimeline = $start && $end && $end->gte($start);
                        $progress = $hasTimeline
                            ? ($end->equalTo($start) ? ($today->gte($end) ? 100 : 0)
                                : max(0, min(100, ($today->getTimestamp() - $start->getTimestamp()) / ($end->getTimestamp() - $start->getTimestamp()) * 100)))
                            : 0;
                        $remainingDays = $end ? (int) $today->copy()->startOfDay()->diffInDays($end->copy()->startOfDay(), false) : null;
                    @endphp
                    <div class="space-y-5 px-5 pb-5 text-start [@media(prefers-color-scheme:light)]:[&>div.relative.bg-blue-50]:bg-blue-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-blue-50]:text-blue-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-green-50]:bg-green-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-green-50]:text-green-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-yellow-50]:bg-yellow-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-yellow-50]:text-yellow-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-red-50]:bg-red-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-red-50]:text-red-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-slate-50]:bg-slate-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-slate-50]:text-slate-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-gray-50]:bg-gray-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-gray-50]:text-gray-900 [@media(prefers-color-scheme:light)]:[&>div.relative_.opacity-70]:opacity-100 [@media(prefers-color-scheme:light)]:[&>div.relative_.font-semibold]:font-bold">
                        <div class="relative flex items-center gap-3 overflow-hidden rounded-xl bg-gradient-to-br p-4 {{ $typePresentation['primary'] }} {{ $typePresentation['secondary'] }} [@media(prefers-color-scheme:light)]:[&.from-green-200]:from-green-300 [@media(prefers-color-scheme:light)]:[&.text-green-700]:text-green-900 [@media(prefers-color-scheme:light)]:[&.from-orange-200]:from-orange-300 [@media(prefers-color-scheme:light)]:[&.text-orange-700]:text-orange-900 [@media(prefers-color-scheme:light)]:[&.from-blue-200]:from-blue-300 [@media(prefers-color-scheme:light)]:[&.text-blue-700]:text-blue-900 [@media(prefers-color-scheme:light)]:[&.from-violet-200]:from-violet-300 [@media(prefers-color-scheme:light)]:[&.text-violet-700]:text-violet-900 [@media(prefers-color-scheme:light)]:[&.from-pink-200]:from-pink-300 [@media(prefers-color-scheme:light)]:[&.text-pink-700]:text-pink-900 [@media(prefers-color-scheme:light)]:[&.from-cyan-200]:from-cyan-300 [@media(prefers-color-scheme:light)]:[&.text-cyan-700]:text-cyan-900 [@media(prefers-color-scheme:light)]:[&.from-gray-200]:from-gray-300 [@media(prefers-color-scheme:light)]:[&.text-gray-700]:text-gray-900 [@media(prefers-color-scheme:light)]:[&.from-emerald-200]:from-emerald-300 [@media(prefers-color-scheme:light)]:[&.text-emerald-700]:text-emerald-900 [@media(prefers-color-scheme:light)]:[&.from-amber-200]:from-amber-300 [@media(prefers-color-scheme:light)]:[&.text-amber-700]:text-amber-900 [@media(prefers-color-scheme:light)]:[&.from-sky-200]:from-sky-300 [@media(prefers-color-scheme:light)]:[&.text-sky-700]:text-sky-900 [@media(prefers-color-scheme:light)]:[&.from-yellow-200]:from-yellow-300 [@media(prefers-color-scheme:light)]:[&.text-yellow-700]:text-yellow-900 [@media(prefers-color-scheme:light)]:[&.from-rose-200]:from-rose-300 [@media(prefers-color-scheme:light)]:[&.text-rose-700]:text-rose-900 [@media(prefers-color-scheme:light)]:[&.to-emerald-100]:to-emerald-200 [@media(prefers-color-scheme:light)]:[&.to-amber-100]:to-amber-200 [@media(prefers-color-scheme:light)]:[&.to-indigo-100]:to-indigo-200 [@media(prefers-color-scheme:light)]:[&.to-purple-100]:to-purple-200 [@media(prefers-color-scheme:light)]:[&.to-rose-100]:to-rose-200 [@media(prefers-color-scheme:light)]:[&.to-sky-100]:to-sky-200 [@media(prefers-color-scheme:light)]:[&.to-slate-100]:to-slate-200 [@media(prefers-color-scheme:light)]:[&.to-lime-100]:to-lime-200 [@media(prefers-color-scheme:light)]:[&.to-teal-100]:to-teal-200 [@media(prefers-color-scheme:light)]:[&.to-yellow-100]:to-yellow-200 [@media(prefers-color-scheme:light)]:[&.to-cyan-100]:to-cyan-200 [@media(prefers-color-scheme:light)]:[&.to-red-100]:to-red-200">
                            <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid {{ $typePresentation['icon'] }}"></i></div>
                            <div class="relative flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-900/20">
                                <i class="fa-solid {{ $typePresentation['icon'] }} text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>
                            <div class="relative min-w-0">
                                <div class="text-xs uppercase tracking-wider opacity-70">Typ obiektu</div>
                                <div class="mt-1 font-semibold">{{ \App\Models\WorkObject::TYPES[$object->object_type] ?? 'Nie określono typu' }}</div>
                                <div class="mt-1 text-xs opacity-70">{{ $typePresentation['description'] ?? '' }}</div>
                            </div>
                        </div>
                        <x-object.status-card :status="$object->status" :borderless="true" />
                        <div data-object-timeline class="rounded-xl border-0 bg-blue-50 p-4 dark:bg-blue-900/20 [@media(prefers-color-scheme:light)]:bg-blue-200">
                            <h2 class="text-sm font-semibold text-blue-800 dark:text-blue-300">Termin realizacji</h2>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <div><div class="text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Rozpoczęcie</div><div class="mt-1 text-base font-semibold text-gray-900 dark:text-white">{{ $start?->format('d.m.Y') ?? 'Nie określono' }}</div>@if($start)<div class="text-sm text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">{{ $start->format('H:i') }}</div>@endif</div>
                                <div class="text-right"><div class="text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Zakończenie</div><div class="mt-1 text-base font-semibold text-gray-900 dark:text-white">{{ $end?->format('d.m.Y') ?? 'Nie określono' }}</div>@if($end)<div class="text-sm text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">{{ $end->format('H:i') }}</div>@endif</div>
                            </div>
                            @if($hasTimeline)
                                <div class="relative mt-5 h-3 rounded-full bg-blue-100 dark:bg-blue-900/50" role="progressbar" aria-label="Upływ czasu realizacji" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ round($progress) }}" aria-valuetext="Upłynęło {{ round($progress) }}% zaplanowanego czasu">
                                    <div class="h-full rounded-full bg-gradient-to-r from-blue-600 to-blue-400" style="width: {{ $progress }}%"></div>
                                    <span class="absolute top-1/2 h-5 w-5 -translate-x-1/2 -translate-y-1/2 rounded-full border-4 border-white bg-blue-600 shadow dark:border-blue-950" style="left: {{ $progress }}%" title="Dzisiaj: {{ $today->format('d.m.Y') }}" aria-hidden="true"></span>
                                </div>
                            @endif
                            <div class="mt-4 flex flex-wrap items-center justify-between gap-2 text-sm">
                                <span class="text-gray-600 dark:text-gray-300">Dzisiaj: {{ $today->format('d.m.Y') }}</span>
                                <span class="font-semibold text-gray-900 dark:text-white">
                                    @if(!$end)
                                        Bez określonego terminu zakończenia
                                    @elseif($today->gt($end))
                                        @if($remainingDays < 0) Od terminu: {{ abs($remainingDays) }} {{ $remainingDays === -1 ? 'dzień' : 'dni' }} @else Termin minął dzisiaj @endif
                                    @elseif($remainingDays === 0)
                                        Termin zakończenia dzisiaj
                                    @else
                                        Do końca: {{ $remainingDays }} {{ $remainingDays === 1 ? 'dzień' : 'dni' }}
                                    @endif
                                </span>
                            </div>
                            @if($start && $today->lt($start))<p class="mt-2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Realizacja jeszcze się nie rozpocząła.</p>@endif
                        </div>
                    </div>
                </section>

                @php
                    $description = trim(html_entity_decode(strip_tags(preg_replace('/<\/p>|<br\s*\/?>/i', "\n", $object->description ?? '')), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                    $hasDescription = trim(str_replace("\u{00A0}", ' ', $description)) !== '';
                @endphp
                @if($hasDescription)
                <section data-object-description class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 self-start [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                    <div class="flex items-center gap-3 border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                        <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-note-sticky text-lg sm:text-2xl" aria-hidden="true"></i>
                        </div>

                        <div>
                            <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                Dodatkowe informacje
                            </h2>

                            <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                Notatki i informacje pomocne przy obsłudze obiektu
                            </p>
                        </div>

                    </div>
                    <p class="whitespace-pre-line break-words p-5 text-start text-sm text-gray-700 [overflow-wrap:anywhere] dark:text-gray-200">{{ $description }}</p>
                </section>
                @else
                    <div class="hidden lg:block" aria-hidden="true"></div>
                @endif

            </div>

                <div x-ref="cards" class="min-w-0 w-full [&>[data-object-work-cards]]:my-0 [&>[data-object-work-cards]>:nth-child(1)]:order-4 [&>[data-object-work-cards]>:nth-child(2)]:order-5">@include('admin.object.partials.work-cards', ['preview' => true])</div>
            <div class="grid min-w-0 grid-cols-1 items-stretch gap-4 lg:grid-cols-2">
                <section data-object-location class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                    <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                        <div class="flex items-center gap-3">

                            <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-location-dot text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>

                            <div>
                                <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                    Lokalizacja obiektu
                                </h2>

                                <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                    Adres i położenie obiektu
                                </p>
                            </div>

                        </div>

                    </div>
                    @php
                        $latitude = $object->location?->latitude;
                        $longitude = $object->location?->longitude;
                        $hasCoordinates = is_numeric($latitude) && is_numeric($longitude)
                            && abs((float) $latitude) <= 90 && abs((float) $longitude) <= 180;
                        $address = trim((string) $object->location?->address);
                        $locality = collect([$object->location?->postal_code, $object->location?->city])
                            ->filter(fn ($part) => filled($part) && mb_stripos($address, trim($part)) === false)
                            ->map(fn ($part) => trim($part))->implode(' ');
                        $fullAddress = collect([$address, $locality])->filter(fn ($part) => filled($part))->implode(', ');
                        $country = trim((string) $object->location?->country);
                        if ($country !== '' && mb_stripos($fullAddress, $country) === false) {
                            $fullAddress = $fullAddress !== '' ? $fullAddress.', '.$country : $country;
                        }
                    @endphp
                    @if($hasCoordinates)
                        <div @wibest:object-readings.window="if ($event.detail.objectId === {{ $object->id }}) updateReadings($event.detail.readings)" x-data="wibestObjectMaps({ objects: {{ \Illuminate\Support\Js::from([[
                            'name' => $object->name,
                            'address' => $fullAddress ?: $object->location->name,
                            'lat' => (float) $latitude,
                            'lng' => (float) $longitude,
                            'radius' => $object->allowed_distance,
                            'status' => $object->status,
                            'url' => route('object.show', $object),
                        ]]) }}, readings: {{ \Illuminate\Support\Js::from($workReport['readings']) }}, apiKey: {{ \Illuminate\Support\Js::from(config('services.google.maps_key')) }} })">
                            <div class="relative h-[360px] bg-gray-100 dark:bg-gray-700" :aria-busy="reportLoading">
                                <x-object.loading kind="map" />
                                <div x-ref="cardMap" class="h-full w-full" wire:ignore aria-label="Lokalizacja obiektu na mapie Google"></div>
                                <div x-show="message" role="status" aria-live="polite" class="absolute inset-0 flex items-center justify-center bg-white/95 p-5 text-center text-sm text-gray-700 dark:bg-gray-700 dark:text-gray-200"><p x-text="message">Ładowanie mapy…</p></div>
                            </div>

                        </div>
                    @else
                        <x-empty-place/>
                    @endif
                    <div class="flex flex-wrap gap-4 px-5 pt-3 text-xs text-gray-600 dark:text-gray-300"><span>🟢 START</span><span>🔴 STOP</span><span>Odczyty z sesji zakwalifikowanych do obiektu</span></div>
                    <div class="p-5 text-start">
                        <div class="rounded-xl bg-gray-50 text-sm text-gray-500 dark:bg-gray-700 dark:text-gray-400 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:text-gray-600">
                            <div class="break-words font-medium [overflow-wrap:anywhere]">{{ $fullAddress ?: 'Nie określono adresu' }}</div>
                        </div>
                    </div>
                </section>

                <section data-object-users class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                    <div x-ref="workers">@include('admin.object.partials.preview-workers')</div>
                </section>
            </div>

            <div x-ref="work" class="min-w-0 w-full [&>[data-object-work-table]]:my-0">@include('admin.object.partials.work-table')</div>
            <div class="flex flex-col md:flex-row justify-end gap-4 mt-4">
                @can('update', $object)
                    <!-- EDYTUJ -->
                    <x-button-link-blue href="{{ route('object.edit', $object) }}" class="text-lg">
                        <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                    </x-button-link-blue>
                    <!--EDYTUJ-->
                @endcan
                @can('delete', $object)
                    <form action="{{ route('object.delete', $object) }}" class="w-full md:w-fit" method="POST"
                        onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                        @csrf
                        @method('DELETE')
                        <x-button-red type="submit" class="text-lg w-full md:w-fit">
                            <i class="fa-solid fa-trash mr-2"></i>USUŃ
                        </x-button-red>
                    </form>
                @endcan
            </div>
            <x-label class="py-2 mt-4">Utworzono {{ $object->created_at?->format('d.m.Y H:i:s') ?? '—' }}</x-label>
            <x-label class="py-2">Ostatnia aktualizacja {{ $object->updated_at?->format('d.m.Y H:i:s') ?? '—' }}</x-label>



            @include('admin.object.partials.status-history')
            </div>
        </x-container-content-form>
    </x-main-no-filter>
</x-app-layout>
