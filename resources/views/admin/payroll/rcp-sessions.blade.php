<details class="mt-4"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Sesje RCP ({{ count($row['sessions']) }})</summary>
<div class="mt-4 overflow-x-auto rounded-xl"><table class="w-full text-sm text-gray-700 dark:text-gray-200">
    <thead class="border-b border-gray-200 bg-white text-center text-xs font-semibold dark:border-gray-600 dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100"><tr>
        @foreach(['Pracownik','Status','Lokalizacja','Typ','Godziny / czas','Data'] as $label)<th scope="col" class="px-5 py-4">{{ $label }}</th>@endforeach
        <th scope="col" class="w-1 px-5 py-4"><span class="sr-only">Przejście do sesji</span></th>
    </tr></thead><tbody>
    @forelse($row['sessions'] as $session)
    @php
        $start = $session['start'] ? \Carbon\Carbon::parse($session['start']) : null;
        $stop = $session['stop'] ? \Carbon\Carbon::parse($session['stop']) : null;
        $night = $start && $stop && !$start->isSameDay($stop);
        $url = route('rcp.work-session.show',$session['id']);
    @endphp
    <tr x-data="{ url: {{ \Illuminate\Support\Js::from($url) }} }" tabindex="0"
        @click="if (!$event.target.closest('a, button, input, select, textarea, label, [role=button]')) window.location.assign(url)"
        @keydown.enter.self.prevent="window.location.assign(url)"
        class="group snap-center cursor-pointer border-b border-gray-200 bg-white text-center transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-green-600 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300">
        <td class="px-5 py-4"><div class="flex items-center justify-start gap-2 font-semibold text-gray-700 dark:text-gray-100"><x-user-photo :user="$user" /><a href="{{ $url }}" class="rounded text-left text-sm [&>div]:text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500"><x-user-name :user="$user" /></a></div></td>
        <td class="px-5 py-4"><x-RCP.work-session-status :work_session="(object) $session" class="text-xs !font-medium" />@if(!in_array($session['status'],['W trakcie pracy','Praca zakończona','Zablokowane'])){{ $session['status'] }}@endif</td>
        <td class="px-5 py-4"><div class="flex justify-center gap-1">
            @if($session['start_location'] ?? false)<x-status-green title="Lokalizacja START"><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">START</span></x-status-green>@endif
            @if($session['stop_location'] ?? false)<x-status-red title="Lokalizacja STOP"><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">STOP</span></x-status-red>@endif
            @if(empty($session['start_location']) && empty($session['stop_location']))<span title="Brak informacji o lokalizacji w tym zestawieniu">—</span>@endif
        </div></td>
        <td class="px-5 py-4"><div class="flex flex-col items-center gap-1"><span class="text-lg" aria-label="{{ $night ? 'Zmiana przez północ' : 'Sesja dzienna' }}">{{ $night ? '🌙' : '⏱️' }}</span><span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium bg-yellow-300 text-yellow-950">RCP</span></div></td>
        <td class="px-5 py-4 font-semibold text-sm"><div class="flex flex-col items-center justify-center gap-2">
            <x-paragraf-display class="text-sm whitespace-nowrap w-fit"><x-status-dark>{{ $start?->format('H:i') ?? 'Brak START' }} - {{ $stop?->format('H:i') ?? 'Brak STOP' }}</x-status-dark></x-paragraf-display>
            <x-paragraf-display class="!text-gray-900 dark:!text-gray-50 text-sm whitespace-nowrap w-fit">{{ $session['duration'] ?? '—' }}</x-paragraf-display>
        </div></td>
        <td class="whitespace-nowrap px-5 py-4"><x-status-cello>{{ $start?->format('d.m.Y') ?? 'Brak START' }}@if($night) – {{ $stop->format('d.m.Y') }}@endif</x-status-cello></td>
        <td class="w-1 px-5 py-4 align-middle"><div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 transition group-hover:bg-gray-100 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:bg-gray-700 dark:group-hover:text-gray-200 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-chevron-right text-xs" aria-hidden="true"></i></div></td>
    </tr>
    @empty<tr><td colspan="7" class="px-5 py-4 text-center">Brak sesji w tym miesiącu.</td></tr>@endforelse
    </tbody></table></div>
</details>
