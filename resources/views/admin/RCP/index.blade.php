<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            @if(isset($filter_user_id) && $filter_user_id)
                <li class="p-2">
                    <p class="mb-3 text-sm text-gray-900 dark:text-white">Dla pracownika</p>
                    <x-team-user-identity :user="App\Models\User::findOrFail($filter_user_id)" />
                </li>
            @elseif($role === 'admin' || $role === 'właściciel')
                <x-search-filter />
            @endif
            <x-filter-date-user loader="work-session">
                {{ route('api.v1.rcp.work-session.set.date') }}
            </x-filter-date-user>
            @include('admin.rcp.partials.classification-filter')
            <li class="space-y-2 p-2" data-rcp-filter-loading aria-busy="true">
                @foreach(['has_task' => '🎯 Zadanie', 'has_note' => '📝 Notatka'] as $name => $label)
                    <div data-rcp-filter-skeleton class="h-12 w-full rounded-lg bg-gray-200 dark:bg-gray-700 animate-pulse motion-reduce:animate-none" role="status" aria-label="Ładowanie filtra {{ $label }}"></div>
                    <label data-rcp-filter-content style="display: none;" class="flex cursor-pointer items-center justify-between gap-3 rounded-lg bg-gray-100 px-3 py-3 text-sm font-medium text-gray-900 dark:bg-gray-700 dark:text-white">
                        <span>{{ $label }}</span>
                        <span class="relative inline-flex shrink-0">
                            <input id="rcp-{{ $name }}" name="{{ $name }}" type="checkbox" role="switch" @checked(session('rcp.filters.'.$name, false)) disabled data-rcp-filter-input class="peer sr-only">
                            <span aria-hidden="true" class="h-6 w-11 rounded-full bg-gray-300 transition-colors duration-200 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow-sm after:transition-transform after:duration-200 after:content-[''] peer-checked:bg-green-400 peer-checked:after:translate-x-5 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-green-500 dark:bg-gray-500 dark:peer-checked:bg-green-400 motion-reduce:transition-none motion-reduce:after:transition-none"></span>
                        </span>
                    </label>
                @endforeach
            </li>
            <x-sidebar-filter-ready />
            <input type="hidden" id="rcp-filter-user" value="{{ $filter_user_id ?? '' }}">
            <input type="hidden" id="start_date" value="{{ $startDate }}">
            <input type="hidden" id="end_date" value="{{ $endDate }}">
        </x-sidebar-left>
        <!--SIDE BAR-->

        <!--MAIN-->
        <x-main>
            <x-RCP.nav :countEvents="$countEvents" />
            @if($role == 'admin' || $role == 'właściciel')
                <x-RCP.header>
                    <span>⏱️</span> RCP
                </x-RCP.header>

            @else
                <x-RCP.header>
                    <span>⏱️</span> Podsumowanie czasu pracy
                </x-RCP.header>

{{-- Skeleton podsumowania czasu pracy --}}
<div id="attendance-summary-wrapper"
     data-url="{{ route('api.v1.raport.attendance-sheet.summary') }}">

    {{-- Skeleton podsumowania czasu pracy --}}
    <div id="attendance-summary-skeleton"
         class="mb-4 mx-4 space-y-3"
         role="status"
         aria-label="Ładowanie podsumowania czasu pracy">

        {{-- Główne statystyki --}}
        <div class="grid grid-cols-2 gap-3">

            {{-- Przepracowano --}}
            <div class="min-w-0 rounded-lg bg-gray-100 p-4 shadow-sm dark:bg-gray-700">
                <div class="mb-3 flex items-center gap-2">
                    <div class="size-8 shrink-0 animate-pulse rounded-xl bg-gray-200 dark:bg-gray-600"></div>
                    <div class="h-3 w-24 max-w-full animate-pulse rounded-md bg-gray-200 dark:bg-gray-600"></div>
                </div>
                <div class="h-8 w-3/4 animate-pulse rounded-lg bg-gray-200 dark:bg-gray-600"></div>
                <div class="mt-2 h-3 w-20 animate-pulse rounded-md bg-gray-100 dark:bg-gray-600"></div>
            </div>

            {{-- Nadgodziny --}}
            <div class="min-w-0 rounded-lg bg-gray-100 p-4 shadow-sm dark:bg-gray-700">
                <div class="mb-3 flex items-center gap-2">
                    <div class="size-8 shrink-0 animate-pulse rounded-xl bg-gray-200 dark:bg-gray-600"></div>
                    <div class="h-3 w-20 max-w-full animate-pulse rounded-md bg-gray-200 dark:bg-gray-600"></div>
                </div>
                <div class="h-8 w-2/3 animate-pulse rounded-lg bg-gray-200 dark:bg-gray-600"></div>
                <div class="mt-2 h-3 w-16 animate-pulse rounded-md bg-gray-100 dark:bg-gray-600"></div>
            </div>
        </div>

        {{-- Pozostałe informacje --}}
        <div class="overflow-hidden rounded-lg bg-gray-100 shadow-sm dark:bg-gray-700">
            <div class="flex min-h-12 items-center justify-between gap-3 px-4 py-3">
                <div class="h-4 w-36 max-w-full animate-pulse rounded-md bg-gray-200 dark:bg-gray-600"></div>
                <div class="size-4 shrink-0 animate-pulse rounded bg-gray-100 dark:bg-gray-600"></div>
            </div>

        </div>

        <span class="sr-only">Ładowanie danych o czasie pracy...</span>
    </div>

    {{-- Tutaj jQuery wstawi gotowe podsumowanie --}}
    <div id="attendance-summary-content"></div>
</div>
                <x-RCP.header>
                    <span>⏱️</span> Lista czasu pracy
                </x-RCP.header>
                @php
                    $start = \Carbon\Carbon::parse($startDate);
                    $end = \Carbon\Carbon::parse($endDate);

                    $allYear =
                        $start->month === 1 &&
                        $start->day === 1 &&
                        $end->month === 12 &&
                        $end->day === 31 &&
                        $start->year === $end->year;
                @endphp

                <div class="flex items-center justify-center sm:justify-start gap-2 mb-4 mx-4">

                    {{-- Poprzedni miesiąc --}}
                    <button type="button" id="prev-month-bt" class="@if($allYear) hidden @endif w-9 h-9 flex items-center justify-center
                                                           rounded-xl
                                                           bg-gray-100 dark:bg-gray-800
                                                           text-gray-700 dark:text-gray-200
                                                           hover:bg-gray-200 dark:hover:bg-gray-700
                                                           transition-all duration-200">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>

                    {{-- Aktualny miesiąc --}}
                    <div id="current-month-bt" class="min-w-[180px] text-center
                                                           @if($allYear)
                                                           ml-[44px]
                                                           @endif
                                                           px-5 py-2
                                                           h-9
                                                           rounded-xl
                                                           bg-gray-100 dark:bg-gray-800
                                                           text-gray-900 dark:text-white
                                                           font-semibold
                                                           tracking-wide
                                                           select-none">
@if($allYear)
Cały rok 
{{ ucfirst(
                    \Carbon\Carbon::createFromFormat('Y-m-d', $startDate)
                        ->locale('pl')
                        ->translatedFormat('Y')
                ) }}
@else
                        {{ ucfirst(
                    \Carbon\Carbon::createFromFormat('Y-m-d', $startDate)
                        ->locale('pl')
                        ->translatedFormat('F Y')
                ) }}
@endif
                    </div>

                    {{-- Następny miesiąc --}}
                    <button type="button" id="next-month-bt" class="@if($allYear) hidden @endif w-9 h-9 flex items-center justify-center
                                                           rounded-xl
                                                           bg-gray-100 dark:bg-gray-800
                                                           text-gray-700 dark:text-gray-200
                                                           hover:bg-gray-200 dark:hover:bg-gray-700
                                                           transition-all duration-200">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>

                </div>
            @endif
            @php
                $showTable = true;
            @endphp
            @if(session('report_key_rcp'))
                @php
                    $reportKey = session('report_key_rcp');
                    $report = Cache::get($reportKey);
                @endphp

                @if($report)
                    @php
                        $showTable = false;
                    @endphp
                    <div id="operation-summary-modal" class="mb-4 mx-4">
                        <div
                            class="relative gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <x-h1-display class="w-full">
                                <span>🎯</span> Podsumowanie operacji
                            </x-h1-display>
                            <x-info-span class="-my-2">
                                Łączna liczba prób {{ $report['total_attempts'] }}
                            </x-info-span>
                            <x-success-span class="-my-2">
                                Pomyślnie dodano {{ $report['successful'] }}
                            </x-success-span>
                            @if($report['failed_count'] > 0)
                                <x-danger-span class="-my-2">
                                    Nieudane próby {{ $report['failed_count'] }}
                                </x-danger-span>
                                <div class="flex flex-col gap-4 w-full ">
                                    @foreach($report['failed_details'] as $detail)
                                        <label
                                            class="gap-4 h-full w-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                            <div class="flex items-center gap-2">
                                                @php
                                                    $user = \App\Models\User::where('id', $detail['user_id'])->first();
                                                @endphp
                                                <x-user-photo :user="$user" />
                                                <x-user-name :user="$user" class="flex-wrap" />
                                            </div>
                                            <div class="flex flex-row gap-4 items-center justify-between">
                                                <x-status-cello>
                                                    {{ $detail['date'] }}
                                                </x-status-cello>
                                                <x-danger-span class="-my-2">
                                                    {{ $detail['reason'] }}
                                                </x-danger-span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    @php
                        $reportKey = session('report_key_rcp');

                        if ($reportKey) {
                            // 2. Usuwamy powiązany wpis z pamięci podręcznej (Cache)
                            Cache::forget($reportKey);

                            // 3. Usuwamy klucz sesji, aby nie odwoływać się do nieistniejącego cache
                            session()->forget('report_key_rcp');

                            // Opcjonalnie: Dodaj komunikat flash do wyświetlenia użytkownikowi
                            // session()->flash('success', 'Dane raportu zostały pomyślnie usunięte z pamięci podręcznej.');
                        }
                    @endphp
                @else
                    {{-- To się pokaże, jeśli Job jeszcze nie skończył, lub jeśli upłynął czas na Cache --}}
                    <div class="mb-4 mx-4">
                        <div
                            class="gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <x-info-span class="-my-2">
                                Trwa przetwarzanie danych w tle. Odśwież za chwilę, aby zobaczyć raport.
                            </x-info-span>
                        </div>
                    </div>
                @endif
            @endif
            @if($showTable)
                @include('admin.object.partials.date-navigation', ['month' => \Carbon\Carbon::parse($startDate), 'dateNavigationMargin' => 'my-4'])
                <!--CONTENT-->
                <x-container-content>
                    <!--MOBILE VIEW-->
                    <x-list :items="$work_sessions" emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach ($work_sessions as $work_session)
                            <x-card-work-session :work_session="$work_session" />
                        @endforeach
                        <x-loader-work-session-card id="loader-card" />
                    </x-list>
                    <!--MOBILE VIEW-->

                    <!--PC VIEW-->
                    <div class="rcp-sessions-table">
                    <x-table :headers="['Pracownik', 'Status', 'Lokalizacja', 'Typ', 'Godziny / czas', 'Data', 'Klasyfikacja / notatka / uwagi', '']"
                        :items="$work_sessions" emptyMessage="Brak użytkowników do wyświetlenia.">
                        @foreach($work_sessions as $work_session)
                            <x-row-work-session :work_session="$work_session" />
                        @endforeach
                        <x-loader-work-session id="loader" />
                    </x-table>
                    </div>
                    <!--PC VIEW-->
                    @if(isset($filter_user_id) && $filter_user_id)
                        <x-loader-script filter_user_id="{{ $filter_user_id }}">
                            {{ route('api.v1.rcp.work-session.get') }}
                        </x-loader-script>
                    @else
                        <x-loader-script>
                            {{ route('api.v1.rcp.work-session.get') }}
                        </x-loader-script>
                    @endif
                </x-container-content>
            @endif
            <!--CONTENT-->
            @php
                $file = 'RCP_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
            @endphp
            <x-download :file="$file">
                {{ route('api.v1.rcp.work-session.export.xlsx') }}
            </x-download>
        </x-main>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>
