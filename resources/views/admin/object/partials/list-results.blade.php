@php
    $statusStyles = [
        'planned' => 'bg-blue-100 text-blue-800 dark:bg-blue-300/10 dark:text-blue-300',
        'active' => 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300',
        'paused' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-400/10 dark:text-yellow-400',
        'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-300/10 dark:text-red-300',
        'completed' => 'bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-300',
    ];
@endphp
@include('admin.object.partials.list-mobile')
<div data-object-list-content class="hidden md:block space-y-3 p-3 md:space-y-0 md:divide-y md:divide-gray-200 md:p-0 md:dark:divide-gray-600">
    @forelse($objects as $object)
        @php($presentation = config('work_objects.types.'.$object->object_type) ?? config('work_objects.types.inny'))
        <a href="{{ route('object.show', $object) }}" class="group flex flex-wrap items-center gap-3 rounded-xl border border-gray-200 p-4 shadow-sm dark:border-gray-600 md:flex-nowrap md:gap-4 md:rounded-none md:border-0 md:px-5 md:py-4 md:shadow-none bg-white dark:bg-gray-700 transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-green-600 dark:hover:bg-gray-600 dark:focus-visible:ring-green-300 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300">
            <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br flex {{ $presentation['primary'] }} {{ $presentation['secondary'] }}">
                <i class="fa-solid {{ $presentation['icon'] }} text-lg sm:text-2xl" aria-hidden="true"></i>
            </div>
            <div class="min-w-0 flex-1 text-start">
                <div class="flex min-w-0 flex-wrap items-center gap-2 sm:flex-nowrap">
                    <h3 class="break-words [overflow-wrap:anywhere] md:truncate text-sm font-semibold text-gray-900 dark:text-white {{ $presentation['hover'] }}">{{ $object->name }}</h3>
                    <span class="shrink-0 rounded-full px-2 py-0.5 text-xs font-medium {{ $statusStyles[$object->status] ?? $statusStyles['completed'] }}">{{ \App\Models\WorkObject::STATUSES[$object->status] ?? $object->status }}</span>
                </div>
                <div class="mt-1 flex min-w-0 flex-wrap items-center gap-x-2 gap-y-1 text-xs text-gray-600 dark:text-gray-300">
                    <span class="min-w-0 break-words [overflow-wrap:anywhere]"><i class="fa-solid fa-location-dot mr-1" aria-hidden="true"></i>{{ $object->location?->address ?: ($object->location?->name ?? 'Brak lokalizacji') }}</span>
                    <span aria-hidden="true">•</span>
                    <span>{{ \App\Models\WorkObject::TYPES[$object->object_type] ?? 'Nie określono typu' }}</span>
                </div>
            </div>
            @if($object->starts_at || $object->ends_at)
                <div class="w-full break-words text-xs text-gray-600 dark:text-gray-300 md:hidden"><i class="fa-regular fa-calendar mr-1" aria-hidden="true"></i>{{ $object->starts_at?->format('d.m.Y') ?? '?' }} ? {{ $object->ends_at?->format('d.m.Y') ?? '?' }}</div>
            @endif
            @if($object->users_count !== null)
                <div class="flex shrink-0 items-center gap-2 text-sm font-semibold text-gray-600 dark:text-gray-300 md:hidden lg:flex" aria-label="Przypisani pracownicy: {{ $object->users_count }}"><i class="fa-solid fa-users" aria-hidden="true"></i>{{ $object->users_count }}</div>
            @endif
            <div class="shrink-0 flex items-center gap-2 text-sm font-semibold text-gray-600 dark:text-gray-300" aria-label="Czas pracy na obiekcie w wybranym miesiącu"><i class="fa-solid fa-clock" aria-hidden="true"></i>{{ intdiv($workReport['object_seconds'][$object->id] ?? 0, 3600) }}h</div>
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 transition group-hover:bg-gray-100 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:bg-gray-700 dark:group-hover:text-gray-200 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-chevron-right text-xs" aria-hidden="true"></i></div>
        </a>
    @empty
        <x-empty-place/>
    @endforelse
</div>
<div class="border-t border-gray-200 px-5 py-3 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
    <p data-object-list-summary class="text-xs text-gray-600 dark:text-gray-300">Wyświetlono {{ $objects->count() }} z {{ $objects->total() }} obiektów</p>
    @if($objects->hasPages())
        <div data-object-pagination class="mt-3">{{ $objects->links() }}</div>
    @endif
</div>
