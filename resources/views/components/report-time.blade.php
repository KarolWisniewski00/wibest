@props(['value' => null, 'tone' => 'neutral'])
@php
    $value = trim((string) $value);
    $colors = [
        'neutral' => 'bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-gray-100',
        'work' => 'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-200',
        'extra' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/40 dark:text-indigo-200',
        'under' => 'bg-green-100/40 text-green-800 dark:bg-green-900/20 dark:text-green-200',
        'leave' => 'bg-pink-100 text-pink-800 dark:bg-pink-900/40 dark:text-pink-200',
    ];
@endphp
@if($value !== '' && preg_match('/[1-9]/', $value))
    <span class="inline-flex whitespace-nowrap rounded-xl px-3 py-2 text-base font-semibold tabular-nums tracking-normal {{ $colors[$tone] ?? $colors['neutral'] }}">{{ $value }}</span>
@endif
