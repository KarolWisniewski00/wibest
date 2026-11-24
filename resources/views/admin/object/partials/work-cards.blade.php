@php
    $stats = $workReport['stats'] ?? [
        'seconds' => 0, 'attention_seconds' => 0, 'attention' => 0,
        'under' => ['count' => 0, 'seconds' => 0],
        'normal' => ['count' => 0, 'seconds' => 0],
        'overtime' => ['count' => 0, 'seconds' => 0],
    ];
    $cards = [];
    $sessionCount = $stats['under']['count'] + $stats['normal']['count'] + $stats['overtime']['count'];
    $sessionWord = $sessionCount === 1 ? 'sesja' : (in_array($sessionCount % 10, [2, 3, 4]) && !in_array($sessionCount % 100, [12, 13, 14]) ? 'sesje' : 'sesji');
    $attentionCount = $stats['attention'];
    $attentionWord = $attentionCount === 1 ? 'sesja' : (in_array($attentionCount % 10, [2, 3, 4]) && !in_array($attentionCount % 100, [12, 13, 14]) ? 'sesje' : 'sesji');
    if ($dashboard ?? false) {
        $cards[] = ['Aktywne obiekty', $counts->get('active', 0), 'Stan bieżący', 'fa-cube'];
        $cards[] = ['Czas spędzony na obiektach', \App\Services\Objects\ObjectWorkReport::duration($stats['seconds']), $sessionCount . ' ' . $sessionWord, 'fa-clock'];
        $cards[] = ['Wymaga uwagi', \App\Services\Objects\ObjectWorkReport::duration($stats['attention_seconds']), $attentionCount . ' ' . $attentionWord, 'fa-triangle-exclamation'];
    }
    if ($preview ?? false) {
        $cards[] = ['Czas na obiekcie', \App\Services\Objects\ObjectWorkReport::duration($stats['seconds']), $sessionCount . ' ' . $sessionWord, 'fa-clock'];
        $cards[] = ['Wymaga uwagi', \App\Services\Objects\ObjectWorkReport::duration($stats['attention_seconds']), $attentionCount . ' ' . $attentionWord, 'fa-triangle-exclamation'];
    }
    foreach (['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'] as $key => $label) {
        $count = $stats[$key]['count'];
        $sessionsLabel = $count === 1 ? 'sesja' : (in_array($count % 10, [2, 3, 4]) && !in_array($count % 100, [12, 13, 14]) ? 'sesje' : 'sesji');
        $cards[] = [$label, \App\Services\Objects\ObjectWorkReport::duration($stats[$key]['seconds']), $count . ' ' . $sessionsLabel, 'fa-clock'];
    }
@endphp
<div class="my-4 grid grid-cols-1 gap-4 sm:grid-cols-2 {{ ($preview ?? false) ? 'xl:grid-cols-6 2xl:grid-cols-5' : 'xl:grid-cols-6' }}"
    data-object-work-cards :aria-busy="reportLoading">
    @foreach($cards as [$label, $value, $caption, $icon])
        @php
            $tone = match ($label) {
                'Wymaga uwagi' => 'from-yellow-200 to-amber-100 text-yellow-800 dark:from-yellow-500/20 dark:to-amber-500/10 dark:text-yellow-300',
                'Brak normy' => 'from-green-100/50 to-emerald-100/30 text-green-700 dark:from-green-500/10 dark:to-emerald-500/5 dark:text-green-300',
                'Nadgodziny' => 'from-indigo-200 to-indigo-100 text-indigo-700 dark:from-indigo-500/20 dark:to-indigo-500/10 dark:text-indigo-300',
                default => 'from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300',
            };
            if (!isset($preview)) {
                $span = match ($label) {
                    default => '',
                };
            } else {
                $span = match ($label) {
                    'Wymaga uwagi' => 'sm:col-span-2 xl:col-span-3 2xl:col-span-1',
                    'Czas na obiekcie' => 'xl:col-span-3 2xl:col-span-1',
                    'Brak normy' => 'xl:col-span-2 2xl:col-span-1',
                    'Nadgodziny' => 'xl:col-span-2 2xl:col-span-1',
                    default => 'xl:col-span-2 2xl:col-span-1',
                };
            }

        @endphp
        <div
            class="{{ $span }} group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300 [@media(prefers-color-scheme:light)]:text-gray-900">
            <div class="flex items-start gap-4">
                <div
                    class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br {{ $tone }} flex">
                    <i class="fa-solid {{ $icon }} text-lg sm:text-2xl" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 break-words text-start [overflow-wrap:anywhere]">
                    <p
                        class="text-sm text-gray-600 dark:text-gray-300 [@media(prefers-color-scheme:light)]:font-semibold [@media(prefers-color-scheme:light)]:text-gray-700">
                        {{ $label }}</p>
                        <p class="relative mt-2 min-w-[4ch] text-3xl font-bold text-gray-900 dark:text-white"><span
                                @if($deferReport ?? false) style="visibility: hidden;" @endif
                                :class="reportLoading ? 'invisible' : ''">{{ $value }}</span><span x-show="reportLoading"
                                x-cloak aria-hidden="true"
                                class="absolute inset-x-0 top-1/2 h-3 -translate-y-1/2 animate-pulse rounded bg-gray-200 motion-reduce:animate-none dark:bg-gray-600"></span>
                        </p>
                        <p class="relative mt-4 min-w-[8ch] text-xs text-gray-600 dark:text-gray-300"><span
                                @if($deferReport ?? false) style="visibility: hidden;" @endif
                                :class="reportLoading ? 'invisible' : ''">{{ $caption }}</span><span x-show="reportLoading"
                                x-cloak aria-hidden="true"
                                class="absolute inset-x-0 top-1/2 h-3 -translate-y-1/2 animate-pulse rounded bg-gray-200 motion-reduce:animate-none dark:bg-gray-600"></span>
                        </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
<span x-show="reportLoading" x-cloak class="sr-only" role="status">Ładowanie statystyk…</span>
