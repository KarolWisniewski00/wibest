@props(['event'])
@php
    $time = $event->time ? \Carbon\Carbon::parse($event->time)->locale('pl') : null;
    $url = route('rcp.event.show', $event);
@endphp
<x-RCP.mobile-card :url="$url">
    <div class="flex w-full items-start justify-between gap-3">
        <div class="flex min-w-0 flex-1 flex-col items-start gap-2 [&>*]:m-0">
            @if($event->status === 'oczekujące')<x-status-yellow class="text-xs !font-medium">{{ $event->status }}</x-status-yellow>
            @elseif($event->status === 'zaakceptowane')<x-status-green class="text-xs !font-medium">{{ $event->status }}</x-status-green>
            @elseif($event->status === 'odrzucone')<x-status-red class="text-xs !font-medium">{{ $event->status }}</x-status-red>@endif
            <x-status-cello class="text-xs !font-medium break-words">{{ $time?->translatedFormat('d.m, l') ?? 'Brak daty' }}</x-status-cello>
        </div>
        <a href="{{ $url }}" aria-label="Przejdź do zdarzenia" class="record-open-icon"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></a>
    </div>
    <div class="flex w-full flex-wrap items-center gap-x-4 gap-y-2">
        @if($event->event_type === 'start')<x-status-green class="text-xs !font-medium">🟢 Start</x-status-green>
        @elseif($event->event_type === 'stop')<x-status-red class="text-xs !font-medium">🔴 Stop</x-status-red>
        @elseif($event->event_type === 'task')<x-status-gray class="text-xs !font-medium">🎯 Zadanie</x-status-gray>@endif
        <x-paragraf-display class="text-xs leading-5 whitespace-nowrap font-semibold [&>*]:text-xs [&>*]:leading-5"><x-status-dark>{{ $time?->format('H:i:s') ?? '—' }}</x-status-dark></x-paragraf-display>
        @if($event->location_id && $event->event_type === 'start')<x-status-green title="Lokalizacja START"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">Lokalizacja START</span></x-status-green>
        @elseif($event->location_id && $event->event_type === 'stop')<x-status-red title="Lokalizacja STOP"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">Lokalizacja STOP</span></x-status-red>@endif
    </div>
    @if($event->note)
        <div class="w-full min-w-0 break-words border-t border-gray-200 pt-3 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300 [overflow-wrap:anywhere]">
            <p class="mb-1 font-semibold">{{ $event->event_type === 'task' ? '🎯 Zadanie' : '📝 Notatka' }}</p>
            <div class="max-w-full overflow-hidden [&_img]:max-w-full">{!! $event->note !!}</div>
        </div>
    @endif
    <div class="flex min-w-0 items-center gap-3 border-t border-gray-200 pt-3 font-semibold dark:border-gray-600 w-full [@media(prefers-color-scheme:light)]:border-gray-300">
        @if($event->user)<x-team-user-identity :user="$event->user" />@else<span>Usunięty pracownik</span>@endif
    </div>
</x-RCP.mobile-card>
