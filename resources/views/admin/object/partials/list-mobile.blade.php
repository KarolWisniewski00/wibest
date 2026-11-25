<div data-object-mobile-list class="space-y-3 p-3 md:hidden">
    @forelse($objects as $object)
        @php
            $presentation = config('work_objects.types.'.$object->object_type) ?? config('work_objects.default');
            $address = trim((string) $object->location?->address);
            $locality = collect([$object->location?->postal_code, $object->location?->city])
                ->filter(fn ($part) => filled($part) && mb_stripos($address, trim($part)) === false)
                ->map(fn ($part) => trim($part))->implode(' ');
            $fullAddress = collect([$address, $locality])->filter(fn ($part) => filled($part))->implode(', ');
            $country = trim((string) $object->location?->country);
            if ($country !== '' && mb_stripos($fullAddress, $country) === false) {
                $fullAddress = $fullAddress !== '' ? $fullAddress.', '.$country : $country;
            }
            $seconds = $workReport['object_seconds'][$object->id] ?? 0;
        @endphp
        <a href="{{ route('object.show', $object) }}" class="group block min-w-0 space-y-4 rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300">
            <div class="flex items-center gap-3">
                <x-object.type-icon :type="$object->object_type" :compact="true" />
                <div class="flex min-w-0 flex-1 flex-col items-start gap-2 text-left">
                    <h3 class="break-words text-sm font-semibold text-gray-900 dark:text-white [overflow-wrap:anywhere]">{{ $object->name }}</h3>
                    <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium {{ $statusStyles[$object->status] ?? $statusStyles['completed'] }}">{{ \App\Models\WorkObject::STATUSES[$object->status] ?? $object->status }}</span>
                </div>
                <div class="record-open-icon"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></div>
            </div>
            <div class="flex items-start gap-2 text-xs text-gray-600 dark:text-gray-300"><i class="fa-solid fa-location-dot mt-0.5 shrink-0" aria-hidden="true"></i><span class="min-w-0 break-words [overflow-wrap:anywhere]">{{ $fullAddress ?: ($object->location?->name ?: 'Brak lokalizacji') }}</span></div>
            @if($object->starts_at || $object->ends_at)
                <p class="text-xs text-gray-600 dark:text-gray-300"><i class="fa-regular fa-calendar mr-1" aria-hidden="true"></i>{{ $object->starts_at?->format('d.m.Y') ?? '—' }} – {{ $object->ends_at?->format('d.m.Y') ?? '—' }}</p>
            @endif
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs font-semibold text-gray-600 dark:text-gray-300">
                @if($object->users_count !== null)<span><i class="fa-solid fa-users mr-1" aria-hidden="true"></i>{{ $object->users_count }} pracowników</span>@endif
                <span aria-label="Czas pracy na obiekcie w wybranym miesiącu"><i class="fa-solid fa-clock mr-1" aria-hidden="true"></i>{{ intdiv($seconds, 3600) }}h {{ intdiv($seconds % 3600, 60) }}m</span>
            </div>
        </a>
    @empty
        <x-empty-place />
    @endforelse
</div>
