@if($event->location)
    @php
        $location = $event->location;
        $latitude = $location->latitude;
        $longitude = $location->longitude;
        $validCoordinates = is_numeric($latitude) && is_numeric($longitude)
            && abs((float) $latitude) <= 90 && abs((float) $longitude) <= 180;
        $address = $location->name ?: $location->address;
    @endphp
    <x-text-cell>
        <x-text-cell-label>Lokalizacja</x-text-cell-label>
        <div class="w-full mt-3 space-y-3">
            @if($validCoordinates)
                <div class="overflow-hidden rounded-xl">
                    <iframe
                        title="{{ $event->event_type === 'start' ? 'Lokalizacja rozpoczęcia pracy' : 'Lokalizacja zakończenia pracy' }}"
                        src="https://maps.google.com/maps?q={{ urlencode($latitude . ',' . $longitude) }}&z=15&output=embed"
                        width="100%" height="300" style="border: 0;" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            @endif
            @if($address)
                <div class="rounded-xl text-sm text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                    <div class="font-medium">{{ $address }}</div>
                </div>
            @endif
        </div>
    </x-text-cell>
@endif
