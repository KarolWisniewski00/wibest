@php
    $countEvents = app(\App\Repositories\EventRepository::class)->getEventsTasksForCurrentUserCount(
        session('start_date', now()->startOfMonth()->toDateString()),
        session('end_date', now()->endOfMonth()->toDateString())
    );
@endphp
<x-RCP.nav :countEvents="$countEvents" />
