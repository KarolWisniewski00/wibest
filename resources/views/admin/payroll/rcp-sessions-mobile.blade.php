<ul class="mt-4 space-y-3 md:hidden" aria-label="Sesje RCP">
    @forelse($row['sessions'] as $session)
        @php
            $start = $session['start'] ? \Carbon\Carbon::parse($session['start']) : null;
            $stop = $session['stop'] ? \Carbon\Carbon::parse($session['stop']) : null;
            $night = $start && $stop && !$start->isSameDay($stop);
            $url = route('rcp.work-session.show', $session['id']);
            $inProgress = $session['status'] === 'W trakcie pracy';
            $details = ['category' => $session['classification'] ?? null, 'planned' => $session['planned'] ?? 0, 'daySeconds' => $session['day_seconds'] ?? 0];
            $category = ['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$details['category']] ?? null;
            $difference = $details['daySeconds'] - $details['planned'];
            $tone = match ($details['category']) {
                'under' => $night ? 'bg-green-400/20 text-green-800 dark:text-green-400' : 'bg-green-300/20 text-green-800 dark:text-green-300',
                'normal' => $night ? 'bg-green-400 text-green-950' : 'bg-green-300 text-green-900',
                'overtime' => $night ? 'bg-indigo-400 text-indigo-950' : 'bg-indigo-300 text-indigo-950',
                default => 'bg-gray-200 text-gray-800 dark:bg-gray-600 dark:text-gray-100',
            };
        @endphp
<x-RCP.mobile-card :url="$url">
    <div class="flex w-full items-start justify-between gap-3">
        <div class="flex min-w-0 flex-1 flex-col items-start gap-2 [&>*]:m-0">
            <x-RCP.work-session-status :work_session="(object) $session" class="text-xs !font-medium" />
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
            @if(($session['duration'] ?? null))<x-paragraf-display class="text-xs leading-5 font-semibold !text-gray-900 dark:!text-gray-300">{{ ($session['duration'] ?? null) }}</x-paragraf-display>@endif
        </div>
        <div class="flex items-center gap-1">
            @if(($session['start_location'] ?? false))<x-status-green title="Lokalizacja START"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">START</span></x-status-green>@endif
            @if(($session['stop_location'] ?? false))<x-status-red title="Lokalizacja STOP"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">STOP</span></x-status-red>@endif
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
    <div class="flex min-w-0 items-center gap-3 border-t border-gray-200 pt-3 font-semibold dark:border-gray-600 w-full [@media(prefers-color-scheme:light)]:border-gray-300">
        @if($user)<x-team-user-identity :user="$user" />@else<span>Usunięty pracownik</span>@endif
    </div>
</x-RCP.mobile-card>
    @empty
        <li class="rounded-2xl border border-gray-200 bg-white p-4 text-sm text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">Brak sesji w tym miesiącu.</li>
    @endforelse
</ul>
