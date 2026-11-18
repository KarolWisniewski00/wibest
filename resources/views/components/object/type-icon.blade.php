@props(['type' => null, 'compact' => false])

@php
    $presentation = (is_string($type) ? config('work_objects.types.'.$type) : null)
        ?? config('work_objects.default');
@endphp

<div @if(!$compact) id="info" @endif class="shrink-0 items-center justify-center bg-gradient-to-br {{ $compact ? 'flex h-9 w-9 rounded-xl' : 'flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl' }} {{ $presentation['primary'] }} {{ $presentation['secondary'] }}">
    <i class="fa-solid {{ $presentation['icon'] }} {{ $compact ? 'text-base' : 'text-lg sm:text-2xl' }}" aria-hidden="true"></i>
</div>
