@props(['status', 'selectable' => false, 'borderless' => false])

@php
$statusPresentation = match ($status) {
    'planned' => ['icon' => 'fa-calendar-plus', 'description' => 'Jeszcze się nie rozpoczął', 'card' => 'bg-blue-50 border-blue-200 text-blue-700 dark:bg-blue-900/20 dark:border-blue-800/40 dark:text-blue-300', 'selection' => 'peer-checked:ring-2 peer-checked:ring-blue-500/50 peer-checked:border-blue-500 peer-focus-visible:ring-2 peer-focus-visible:ring-blue-500 peer-focus-visible:ring-offset-2 dark:peer-checked:border-blue-400 dark:peer-checked:ring-blue-400/50', 'badge' => 'bg-blue-100 border-blue-200 dark:bg-blue-900/40 dark:border-blue-700/30'],
    'active' => ['icon' => 'fa-play', 'description' => 'Obiekt jest realizowany', 'card' => 'bg-green-50 border-green-200 text-green-700 dark:bg-green-900/20 dark:border-green-800/40 dark:text-green-300', 'selection' => 'peer-checked:ring-2 peer-checked:ring-green-500/50 peer-checked:border-green-500 peer-focus-visible:ring-2 peer-focus-visible:ring-green-500 peer-focus-visible:ring-offset-2 dark:peer-checked:border-green-400 dark:peer-checked:ring-green-400/50', 'badge' => 'bg-green-100 border-green-200 dark:bg-green-900/40 dark:border-green-700/30'],
    'paused' => ['icon' => 'fa-pause', 'description' => 'Realizacja została wstrzymana', 'card' => 'bg-yellow-50 border-yellow-200 text-yellow-700 dark:bg-yellow-900/20 dark:border-yellow-800/40 dark:text-yellow-300', 'selection' => 'peer-checked:ring-2 peer-checked:ring-yellow-500/50 peer-checked:border-yellow-500 peer-focus-visible:ring-2 peer-focus-visible:ring-yellow-500 peer-focus-visible:ring-offset-2 dark:peer-checked:border-yellow-400 dark:peer-checked:ring-yellow-400/50', 'badge' => 'bg-yellow-100 border-yellow-200 dark:bg-yellow-900/40 dark:border-yellow-700/30'],
    'cancelled' => ['icon' => 'fa-ban', 'description' => 'Obiekt został odwołany', 'card' => 'bg-red-50 border-red-200 text-red-700 dark:bg-red-900/20 dark:border-red-800/40 dark:text-red-300', 'selection' => 'peer-checked:ring-2 peer-checked:ring-red-500/50 peer-checked:border-red-500 peer-focus-visible:ring-2 peer-focus-visible:ring-red-500 peer-focus-visible:ring-offset-2 dark:peer-checked:border-red-400 dark:peer-checked:ring-red-400/50', 'badge' => 'bg-red-100 border-red-200 dark:bg-red-900/40 dark:border-red-700/30'],
    'completed' => ['icon' => 'fa-check', 'description' => 'Realizacja została zakończona', 'card' => 'bg-slate-50 border-slate-200 text-slate-700 dark:bg-slate-900/20 dark:border-slate-800/40 dark:text-slate-300', 'selection' => 'peer-checked:ring-2 peer-checked:ring-slate-500/50 peer-checked:border-slate-500 peer-focus-visible:ring-2 peer-focus-visible:ring-slate-500 peer-focus-visible:ring-offset-2 dark:peer-checked:border-slate-400 dark:peer-checked:ring-slate-400/50', 'badge' => 'bg-slate-100 border-slate-200 dark:bg-slate-900/40 dark:border-slate-700/30'],
    default => ['icon' => 'fa-circle-question', 'description' => 'Status obiektu', 'card' => 'bg-gray-50 border-gray-200 text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300', 'selection' => 'peer-checked:ring-2 peer-checked:ring-gray-500/50 peer-checked:border-gray-500 peer-focus-visible:ring-2 peer-focus-visible:ring-gray-500 peer-focus-visible:ring-offset-2 dark:peer-checked:border-gray-400 dark:peer-checked:ring-gray-400/50', 'badge' => 'bg-gray-100 border-gray-200 dark:bg-gray-700 dark:border-gray-600'],
};
@endphp

<div class="relative h-full overflow-hidden rounded-xl {{ $borderless ? '' : 'border' }} p-4 {{ $statusPresentation['card'] }} {{ $selectable ? 'transition-all duration-300 hover:shadow-md peer-checked:shadow-lg '.$statusPresentation['selection'] : '' }}">
    <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid {{ $statusPresentation['icon'] }}"></i></div>
    <div class="relative flex items-center gap-3">
            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl {{ $borderless ? 'bg-white/40 dark:bg-gray-900/20' : 'border '.$statusPresentation['badge'] }}"><i class="fa-solid {{ $statusPresentation['icon'] }} text-lg sm:text-2xl" aria-hidden="true"></i></div>
            <div class="min-w-0">
                <div class="text-xs uppercase tracking-wider opacity-70">Status</div>
                <div class="mt-1 font-semibold">{{ \App\Models\WorkObject::STATUSES[$status] ?? $status }}</div>
                <div class="mt-1 text-xs opacity-70">{{ $statusPresentation['description'] }}</div>
            </div>
    </div>
</div>
