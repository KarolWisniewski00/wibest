@props([
    'items' => collect(),
    'emptyMessage' => 'Brak danych do wyświetlenia.',
])

<ul class="grid w-full gap-y-4 block md:hidden" id="list">
    @if ($items->isEmpty())
        <x-empty-place :message="$emptyMessage" />
    @else
        {{ $slot }}
    @endif
</ul>
