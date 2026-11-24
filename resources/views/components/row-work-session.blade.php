@props(['work_session'])
@php
    $user = $work_session->user;
    $start = $work_session->eventStart ? \Carbon\Carbon::parse($work_session->eventStart->time) : null;
    $stop = $work_session->eventStop ? \Carbon\Carbon::parse($work_session->eventStop->time) : null;
    $night = $start && $stop && !$start->isSameDay($stop);
    $valid = $start && (($work_session->status === 'Praca zakończona' && $stop && $stop->gte($start)) || ($work_session->status === 'W trakcie pracy' && !$stop));
    $complete = $valid && $work_session->status === 'Praca zakończona';
    $details = app(\App\Services\WorkSessionClassification::class)->details($work_session);
    $planned = $details['planned'];
    $daySeconds = $details['daySeconds'];
    $classification = ['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$details['category']] ?? null;
    $badge = match ($details['category']) {
        'under' => 'bg-green-300/20 text-green-800 dark:text-green-300',
        'normal' => 'bg-green-300 text-green-900',
        'overtime' => 'bg-indigo-300 text-indigo-950',
        default => 'bg-gray-200 text-gray-800 dark:bg-gray-600 dark:text-gray-100',
    };
    $missingTask = $complete && $user?->overtime_task && !$work_session->task_id && $work_session->getAlertTask();
    $typeBadge = $work_session->status === 'W trakcie pracy'
        ? 'bg-yellow-300 text-gray-900 dark:bg-yellow-300 dark:text-gray-900'
        : $badge;
@endphp
<tr x-data="{ url: {{ \Illuminate\Support\Js::from(route('rcp.work-session.show', $work_session)) }} }" tabindex="0"
    @click="if (!$event.target.closest('a, button, input, select, textarea, label, [role=button]')) window.location.assign(url)"
    @keydown.enter.self.prevent="window.location.assign(url)"
    class="rcp-session-row group snap-center cursor-pointer bg-white text-center transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-green-600 dark:bg-gray-800 dark:hover:bg-gray-700">
    @if($role === 'admin' || $role === 'właściciel')
        <td class="px-3 py-4 align-middle"><x-flex-center><input type="checkbox" data-id="{{ $work_session->id }}" aria-label="Zaznacz sesję {{ $work_session->id }}" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600"></x-flex-center></td>
    @endif
    <td class="px-5 py-4">@if($user)<x-team-user-identity :user="$user" />@else<span>Usunięty pracownik</span>@endif</td>
    <td class="px-5 py-4"><x-RCP.work-session-status :work_session="$work_session" class="text-xs !font-medium" /></td>
    <td class="px-5 py-4"><div class="flex justify-center gap-1">
        @if($work_session->eventStart?->location_id)<x-status-green title="Lokalizacja START"><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">START</span></x-status-green>@endif
        @if($work_session->eventStop?->location_id)<x-status-red title="Lokalizacja STOP"><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">STOP</span></x-status-red>@endif
    </div></td>
    <td class="px-5 py-4"><div class="flex flex-col items-center gap-1"><span class="text-lg" aria-label="{{ $night ? 'Zmiana przez północ' : 'Sesja dzienna' }}">{{ $night ? '🌙' : '⏱️' }}</span><span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium {{ $typeBadge }}">RCP</span></div></td>
    <td class="px-5 py-4 text-sm font-semibold"><div class="flex flex-col items-center gap-2">
        <span class="whitespace-nowrap text-gray-500 dark:text-gray-400">{{ $start?->format('H:i') ?? '?' }} - {{ $stop?->format('H:i') ?? '?' }}</span>
        <span class="text-gray-900 dark:text-gray-50">{{ $work_session->time_in_work }}</span>
    </div></td>
    <td class="whitespace-nowrap px-5 py-4"><x-status-cello>{{ $start?->format('d.m.Y') ?? 'Brak START' }}</x-status-cello></td>
    <td class="max-w-sm px-5 py-4"><div class="flex flex-col items-center gap-3 text-sm text-gray-700 dark:text-gray-200">
        @if($classification)
            <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium {{ $badge }}">{{ $classification }}</span>
            @if($planned > 0)
                <span class="text-xs" title="Bilans całego dnia pracownika">Bilans dnia: {{ $daySeconds >= $planned ? '+' : '−' }}{{ \App\Services\Objects\ObjectWorkReport::duration(abs($daySeconds - $planned)) }} · Norma: {{ \App\Services\Objects\ObjectWorkReport::duration($planned) }}</span>
            @endif
        @endif
        @if($work_session->task)
            <div class="w-full break-words text-left"><p class="mb-1 text-xs font-semibold">🎯 Zadanie @if($work_session->task->status) · {{ $work_session->task->status }} @endif</p>{!! $work_session->task->note !!}</div>
        @endif
        @if($work_session->notes)
            <div class="w-full break-words text-left"><p class="mb-1 text-xs font-semibold">📝 Notatka</p>{!! $work_session->notes !!}</div>
        @endif
        @if(!$valid)<span class="text-xs text-red-700 dark:text-red-300">❌ Nieprawidłowa sesja</span>@endif
        @if($missingTask)<span class="text-xs text-yellow-700 dark:text-yellow-300">⚠️ Brak zadania</span>@endif
        @if($work_session->time_in_work === '24:00:00')<span class="text-xs text-yellow-700 dark:text-yellow-300">⚠️ Automatyczne zakończenie</span>@endif
    </div></td>
    <td class="w-1 px-5 py-4 align-middle"><a href="{{ route('rcp.work-session.show', $work_session) }}" aria-label="Przejdź do sesji" class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 transition group-hover:bg-gray-100 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:bg-gray-700 dark:group-hover:text-gray-200"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></a></td>
</tr>
