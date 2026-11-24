<ul data-object-mobile-work class="block space-y-3 p-3 md:hidden">
    @forelse($workReport['rows'] as $row)
        @php
            $start = $row->start_time ? \Carbon\Carbon::parse($row->start_time) : null;
            $stop = $row->stop_time ? \Carbon\Carbon::parse($row->stop_time) : null;
            $night = $start && $stop && !$start->isSameDay($stop);
            $category = ['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$row->category] ?? 'Wymaga uwagi';
            $tone = match($row->category) {
                'under' => $night ? 'bg-green-400/20 text-green-800 dark:text-green-400' : 'bg-green-300/20 text-green-800 dark:text-green-300',
                'normal' => $night ? 'bg-green-400 text-green-950' : 'bg-green-300 text-green-900',
                'overtime' => $night ? 'bg-indigo-400 text-indigo-950' : 'bg-indigo-300 text-indigo-950',
                default => 'bg-yellow-300 text-yellow-950',
            };
        @endphp
        <li>
        <div x-data="{ url: {{ \Illuminate\Support\Js::from(route('rcp.work-session.show', $row->id)) }} }" tabindex="0" @click="if (!$event.target.closest('a, button, input, select, textarea')) window.location.assign(url)" @keydown.enter.self.prevent="window.location.assign(url)" class="group cursor-pointer text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 transition-colors duration-200 h-full block w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">
        <div class="flex min-w-0 w-full flex-col items-start gap-3 text-xs leading-relaxed">
            <div class="flex w-full items-start justify-between gap-3">
                <div class="flex min-w-0 flex-1 flex-col items-start gap-2 [&>*]:m-0">
                <x-RCP.work-session-status :work_session="$row" class="text-xs !font-medium" />
                <x-status-cello class="text-xs !font-medium break-words">{{ $start?->copy()->locale('pl')->translatedFormat('d.m, l') ?? 'Brak START' }}@if($night) – {{ $stop->copy()->locale('pl')->translatedFormat('d.m, l') }}@endif</x-status-cello>
                </div>
            <a href="{{ route('rcp.work-session.show', $row->id) }}" aria-label="Przejd? do sesji" class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 transition group-hover:bg-gray-100 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:bg-gray-700 dark:group-hover:text-gray-200 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></a>
            </div>
            <div class="flex w-full flex-wrap items-center gap-x-4 gap-y-2">
                <div class="flex flex-col items-center gap-1">
                    <span aria-label="{{ $night ? 'Zmiana przez północ' : 'Sesja dzienna' }}">{{ $night ? '🌙' : '⏱️' }}</span>
                    <span class="rounded-full px-2 py-0.5 text-xs font-medium {{ $tone }}">RCP</span>
                </div>
                <div class="flex flex-col items-center gap-1 [&>*]:m-0">
                    <x-paragraf-display class="text-xs leading-5 whitespace-nowrap font-semibold [&>*]:text-xs [&>*]:leading-5"><x-status-dark>{{ $start?->format('H:i') ?? '—' }} - {{ $stop?->format('H:i') ?? '—' }}</x-status-dark></x-paragraf-display>
                    <x-paragraf-display class="text-xs leading-5 font-medium !text-gray-500 dark:!text-gray-300">{{ $row->time_in_work }}</x-paragraf-display>
                </div>
                <div class="flex items-center gap-1">
                @if($row->start_lat !== null && $row->start_lng !== null)<x-status-green title="Lokalizacja START"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">START</span></x-status-green>@endif
                @if($row->stop_lat !== null && $row->stop_lng !== null)<x-status-red title="Lokalizacja STOP"><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">STOP</span></x-status-red>@endif
                @if($row->missing_task || $row->time_in_work === '24:00:00')<span title="Sesja wymaga sprawdzenia">⚠️</span>@endif
                </div>
            </div>
            @if($row->reason)
                <div class="w-full border-t border-gray-200 pt-3 text-left dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300"><span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium {{ $tone }}">Wymaga uwagi</span></div>
            @endif
            @if($row->reason)
                <p class="text-xs leading-5 text-gray-600 dark:text-gray-300">{{ $row->reason->label() }}</p>
            @else
                <div class="flex w-full min-w-0 items-center justify-start gap-2 border-t border-gray-200 pt-3 text-left dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300"><x-object.type-icon :type="$row->object->object_type" :compact="true" /><span class="break-words text-xs font-semibold leading-5 [overflow-wrap:anywhere]">{{ $row->object->name }}</span></div>
                <div class="w-full text-left"><span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium {{ $tone }}">{{ $category }}</span></div>
                <p class="w-full text-left text-xs leading-5 {{ $row->day_difference === null ? 'text-gray-600 dark:text-gray-300' : ($row->day_difference > 0 ? 'text-indigo-700 dark:text-indigo-200' : 'text-green-800 dark:text-green-200') }}" title="Bilans całego dnia pracownika">
                    @if($row->day_difference === null) Brak określonej normy
                    @elseif($row->day_difference < 0) Brakuje {{ \App\Services\Objects\ObjectWorkReport::duration(-$row->day_difference) }}
                    @elseif($row->day_difference > 0) +{{ \App\Services\Objects\ObjectWorkReport::duration($row->day_difference) }} ponad normę
                    @else Norma zrealizowana
                    @endif
                </p>
            @endif
            <div class="flex min-w-0 items-center gap-3 border-t border-gray-200 pt-3 font-semibold dark:border-gray-600 w-full [@media(prefers-color-scheme:light)]:border-gray-300">
                <x-team-user-identity :user="$row->user" />
            </div>
        </div>
        </div>
        </li>
    @empty
        <li class="p-4 text-center text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Brak sesji dla wybranego miesiąca i kategorii.</li>
    @endforelse
</ul>
