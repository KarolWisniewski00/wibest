@props(['work_session'])
@if($work_session->status == 'W trakcie pracy')
<x-status-yellow {{ $attributes }}>
    {{ $work_session->status }}
</x-status-yellow>
@endif
@if($work_session->status == 'Praca zakończona')
<x-status-green {{ $attributes }}>
    {{ $work_session->status }}
</x-status-green>
@endif