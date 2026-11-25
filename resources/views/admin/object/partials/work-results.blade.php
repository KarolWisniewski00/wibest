@include('admin.object.partials.work-mobile')
    <div id="work-list-results" class="hidden overflow-x-auto md:block">
        <table class="w-full text-sm text-gray-700 dark:text-gray-200">
            <thead class="border-b border-gray-200 bg-white text-center text-xs font-semibold text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300"><tr>
                <th class="px-5 py-4 text-left">Pracownik</th><th class="px-5 py-4">Status</th><th class="px-5 py-4">Lokalizacja</th><th class="px-5 py-4">Typ</th><th class="px-5 py-4">Godziny / czas</th><th class="px-5 py-4">Data</th><th class="px-5 py-4">Klasyfikacja / obiekt</th>
                <th scope="col" class="w-1 px-5 py-4"><span class="sr-only">Przejście do sesji</span></th>
            </tr></thead>
            <tbody>
                @forelse($workReport['rows'] as $row)
                    @php
                        $start = $row->start_time ? \Carbon\Carbon::parse($row->start_time) : null;
                        $stop = $row->stop_time ? \Carbon\Carbon::parse($row->stop_time) : null;
                        $url = route('rcp.work-session.show', $row->id);
                        $night = $start && $stop && !$start->isSameDay($stop);
                        $badgeStyle = match ($row->category) {
                            'under' => $night ? 'bg-green-400/20 text-green-800 dark:bg-green-400/15 dark:text-green-400' : 'bg-green-300/20 text-green-700 dark:bg-green-300/10 dark:text-green-300',
                            'normal' => $night ? 'bg-green-400 text-green-950' : 'bg-green-300 text-green-900',
                            'overtime' => $night ? 'bg-indigo-400 text-indigo-950' : 'bg-indigo-300 text-indigo-950',
                            default => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-500/15 dark:text-yellow-300',
                        };
                        $badgeClass = 'inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium '.$badgeStyle;
                    @endphp
                    <tr x-data="{ url: {{ \Illuminate\Support\Js::from($url) }} }" tabindex="0"
                        @click="if (!$event.target.closest('a, button, input, select, textarea, label, [role=button]')) window.location.assign(url)"
                        @keydown.enter.self.prevent="window.location.assign(url)"
                        class="group snap-center cursor-pointer border-b border-gray-200 bg-white text-center transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-green-600 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300">
                        <td class="px-5 py-4"><x-team-user-identity :user="$row->user" /></td>
                        <td class="px-5 py-4"><x-RCP.work-session-status :work_session="$row" class="text-xs !font-medium" /></td>
                        <td class="px-5 py-4"><div class="flex justify-center gap-1">
                            @if($row->start_lat !== null && $row->start_lng !== null)<x-status-green title="Lokalizacja START"><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">START</span></x-status-green>@endif
                            @if($row->stop_lat !== null && $row->stop_lng !== null)<x-status-red title="Lokalizacja STOP"><i class="fa-solid fa-location-dot mx-1" aria-hidden="true"></i><span class="sr-only">STOP</span></x-status-red>@endif
                        </div></td>
                        <td class="px-5 py-4"><div class="flex flex-col items-center gap-1"><span class="text-lg" aria-label="{{ $night ? 'Zmiana przez północ' : 'Sesja dzienna' }}">{{ $night ? '🌙' : '⏱️' }}</span><span class="{{ $row->reason ? 'inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium bg-yellow-300 text-yellow-950' : $badgeClass }}">RCP</span></div></td>
                        <td class="px-5 py-4 font-semibold text-sm">
                            @if($row->status === 'Praca zakończona' && $start && $stop)
                                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                    <x-paragraf-display class="text-sm whitespace-nowrap font-semibold w-fit text-start relative"><x-status-dark>{{ $start->format('H:i') }} - {{ $stop->format('H:i') }}</x-status-dark></x-paragraf-display>
                                    <x-paragraf-display class="!text-gray-900 dark:!text-gray-50 hover:!text-gray-900 dark:hover:!text-gray-50 text-sm whitespace-nowrap font-semibold w-fit text-start relative">{{ $row->time_in_work }}</x-paragraf-display>
                                </div>
                            @endif
                            <div class="flex flex-row items-center justify-center text-center gap-1 my-auto">
                                @if(!(($row->status === 'W trakcie pracy' && $start && !$stop) || ($row->status === 'Praca zakończona' && $start && $stop)))<span title="Niekompletna lub nieprawidłowa sesja">❌</span>@endif
                                @if($row->missing_task)<span title="Brak zadania dla nadgodzin">⚠️</span>@endif
                                @if($row->time_in_work === '24:00:00')<span title="Automatyczne zakończenie">⚠️</span>@endif
                            </div>
                        </td>                        <td class="whitespace-nowrap px-5 py-4"><x-status-cello>{{ $start?->format('d.m.Y') ?? 'Brak START' }}@if($stop && $start && !$start->isSameDay($stop)) – {{ $stop->format('d.m.Y') }}@endif</x-status-cello></td>
                        <td class="px-5 py-4"><div class="flex flex-col items-center justify-center gap-y-3 text-center">
                            @if($row->reason)<x-alert-span>Wymaga uwagi</x-alert-span><p class="text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">{{ $row->reason->label() }}</p>
                            @else
                                <div class="flex flex-col items-center justify-center gap-y-3 text-center">
                                    <x-object.type-icon :type="$row->object->object_type" :compact="true" />
                                    <div class="flex min-w-0 flex-col items-center justify-center gap-y-3 text-center">
                                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $row->object->name }}</p>
                                        <span class="{{ $badgeClass }}">{{ ['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$row->category] }}</span>
                                        <p class="text-xs {{ $row->day_difference > 0 ? 'text-indigo-700 dark:text-indigo-200' : 'text-green-800 dark:text-green-200' }}" title="Bilans całego dnia pracownika; nie sumuj po sesjach">
                                            @if($row->day_difference === null) Brak określonej normy
                                            @elseif($row->day_difference < 0) Brakuje {{ \App\Services\Objects\ObjectWorkReport::duration(-$row->day_difference) }}
                                            @elseif($row->day_difference > 0) +{{ \App\Services\Objects\ObjectWorkReport::duration($row->day_difference) }} ponad normę
                                            @else Norma zrealizowana
                                            @endif
                                        </p>
                                        <span class="text-[10px] text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Bilans dnia @if($row->planned > 0) · Norma dnia: {{ \App\Services\Objects\ObjectWorkReport::duration($row->planned) }}@endif</span>
                                    </div>
                                </div>
                            @endif
                        </div></td>
                            <td class="w-1 px-5 py-4 align-middle">
                                <a href="{{ route('rcp.work-session.show', $row->id) }}" aria-label="Przejd? do sesji" class="record-open-icon">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i>
                                </a>
                            </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="px-5 py-4 text-center text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Brak sesji dla wybranego miesiąca i kategorii.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div data-work-pagination class="border-t border-gray-200 bg-white px-5 py-4 text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300">{{ $workReport['rows']->links('admin.object.partials.work-pagination') }}</div>
