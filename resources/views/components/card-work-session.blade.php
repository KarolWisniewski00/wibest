@props(['work_session'])
@php
    $user = $work_session->user;
    $start = $work_session->eventStart ? \Carbon\Carbon::parse($work_session->eventStart->time) : null;
    $stop = $work_session->eventStop ? \Carbon\Carbon::parse($work_session->eventStop->time) : null;
    $night = $start && $stop && !$start->isSameDay($stop);
    $inProgress = $work_session->status === 'W trakcie pracy';
    $valid = $start && (($inProgress && !$stop) || ($work_session->status === 'Praca zakończona' && $stop && $stop->gte($start)));
    $details = app(\App\Services\WorkSessionClassification::class)->details($work_session);
    $category = ['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$details['category']] ?? null;
    $tone = match ($details['category']) {
        'under' => $night ? 'bg-green-400/20 text-green-800 dark:text-green-400' : 'bg-green-300/20 text-green-800 dark:text-green-300',
        'normal' => $night ? 'bg-green-400 text-green-950' : 'bg-green-300 text-green-900',
        'overtime' => $night ? 'bg-indigo-400 text-indigo-950' : 'bg-indigo-300 text-indigo-950',
        default => 'bg-yellow-300 text-gray-900',
    };
    $missingTask = $valid && !$inProgress && $user?->overtime_task && !$work_session->task_id && $work_session->getAlertTask();
    $difference = $details['daySeconds'] - $details['planned'];
    $url = route('rcp.work-session.show', $work_session);
@endphp
<x-RCP.mobile-card :url="$url">
    <div class="flex w-full items-start justify-between gap-3">
        <div class="flex min-w-0 flex-1 flex-col items-start gap-2 [&>*]:m-0">
            <x-RCP.work-session-status :work_session="$work_session" class="text-xs !font-medium" />
            <x-status-cello class="text-xs !font-medium break-words">{{ $start?->copy()->locale('pl')->translatedFormat('d.m, l') ?? 'Brak START' }}@if($night) – {{ $stop->copy()->locale('pl')->translatedFormat('d.m, l') }}@endif</x-status-cello>
        </div>
        <a href="{{ $url }}" aria-label="Przejdź do sesji" class="record-open-icon"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></a>
    </div>
    <div class="flex w-full flex-wrap items-center gap-x-4 gap-y-2">
        <div class="flex flex-col items-center gap-1">
            <span aria-label="{{ $night ? 'Zmiana przez północ' : 'Sesja dzienna' }}">{{ $night ? '🌙' : '⏱️' }}</span>
            <span class="rounded-full px-2 py-0.5 text-xs font-medium {{ $inProgress ? 'bg-yellow-300 text-gray-900' : $tone }}">RCP</span>
        </div>
        <div class="flex flex-col items-center gap-1 [&>*]:m-0">
            <x-paragraf-display class="text-xs leading-5 whitespace-nowrap font-semibold [&>*]:text-xs [&>*]:leading-5"><x-status-dark>{{ $start?->format('H:i') ?? '—' }} - {{ $stop?->format('H:i') ?? '—' }}</x-status-dark></x-paragraf-display>
            @if($work_session->time_in_work)<x-paragraf-display class="text-xs leading-5 font-semibold !text-gray-900 dark:!text-gray-300">{{ $work_session->time_in_work }}</x-paragraf-display>@endif
        </div>
        <div class="flex items-center gap-1">
            @if($work_session->eventStart?->location_id)<x-status-green title="Lokalizacja START"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">START</span></x-status-green>@endif
            @if($work_session->eventStop?->location_id)<x-status-red title="Lokalizacja STOP"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">STOP</span></x-status-red>@endif
        </div>
    </div>
    @if($category)
        <div class="w-full border-t border-gray-200 pt-3 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
            <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium {{ $tone }}">{{ $category }}</span>
            <p class="mt-2 text-xs leading-5 {{ $difference > 0 ? 'text-indigo-700 dark:text-indigo-200' : 'text-green-800 dark:text-green-200' }}" title="Bilans całego dnia pracownika">
                @if($details['planned'] <= 0) Brak określonej normy
                @elseif($difference < 0) Brakuje {{ \App\Services\Objects\ObjectWorkReport::duration(-$difference) }}
                @elseif($difference > 0) +{{ \App\Services\Objects\ObjectWorkReport::duration($difference) }} ponad normę
                @else Norma zrealizowana
                @endif
            </p>
            @if($details['planned'] > 0)<p class="mt-1 text-[10px] text-gray-500 dark:text-gray-300">Bilans dnia · Norma dnia: {{ \App\Services\Objects\ObjectWorkReport::duration($details['planned']) }}</p>@endif
        </div>
    @endif
    @if(!$valid || $missingTask || $work_session->time_in_work === '24:00:00')
        <div class="w-full space-y-2 border-t border-gray-200 pt-3 dark:border-gray-600">
            @if(!$valid)<p class="text-red-700 dark:text-red-300">❌ Nieprawidłowa sesja</p>@endif
            @if($missingTask)<p class="text-yellow-700 dark:text-yellow-300">⚠️ Brak zadania</p>@endif
            @if($work_session->time_in_work === '24:00:00')<p class="text-yellow-700 dark:text-yellow-300">⚠️ Automatyczne zakończenie</p>@endif
        </div>
    @endif
    @if($work_session->task)
        <div class="w-full min-w-0 break-words border-t border-gray-200 pt-3 dark:border-gray-600 [overflow-wrap:anywhere]">
            <p class="mb-1 font-semibold">🎯 Zadanie @if($work_session->task->status) · {{ $work_session->task->status }} @endif</p>
            <div class="max-w-full overflow-hidden [&_img]:max-w-full">{!! $work_session->task->note !!}</div>
        </div>
    @endif
    @if($work_session->notes)
        <div class="w-full min-w-0 break-words border-t border-gray-200 pt-3 dark:border-gray-600 [overflow-wrap:anywhere]">
            <p class="mb-1 font-semibold">📝 Notatka</p><div class="max-w-full overflow-hidden [&_img]:max-w-full">{!! $work_session->notes !!}</div>
        </div>
    @endif
    <div class="flex min-w-0 items-center gap-3 border-t border-gray-200 pt-3 font-semibold dark:border-gray-600 w-full [@media(prefers-color-scheme:light)]:border-gray-300">
        @if($user)<x-team-user-identity :user="$user" />@else<span>Usunięty pracownik</span>@endif
    </div>
</x-RCP.mobile-card>
