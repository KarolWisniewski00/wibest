<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        @if(isset($filter_user_id) && $filter_user_id)
        <div
            class="relative">
            <div class="p-2 pt-0 text-sm rounded-lg">
                <div class="flex flex-col gap-4">
                    <span class="text-gray-900 dark:text-white">👤 Dla zespołu</span>
                    <label
                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">

                        <div class="flex items-center gap-2">
                            <x-user-photo :user="App\Models\User::where('id', $filter_user_id)->first()" />
                            <x-user-name :user="App\Models\User::where('id', $filter_user_id)->first()" class="flex-wrap" />
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div>
            @if($startDate != '' || $endDate != '')
            <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4 flex-wrap">
                <span class="text-gray-900 dark:text-white">📅 Zakres</span>
                <x-status-cello>
                    @if($startDate != '')
                    {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y') ?? ''}}
                    @endif
                    <span class="px-2">-</span>
                    @if($endDate != '')
                    {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y') ?? ''}}
                    @endif
                </x-status-cello>
            </div>
            @endif
        </div>
        @else
        <x-search-filter />
        <x-filter-date loader="work-session">
            {{ route('api.v1.rcp.work-session.set.date') }}
        </x-filter-date>
        @endif
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav :countEvents="$countEvents" />
        <x-RCP.header>
            <span>⏱️</span> RCP
        </x-RCP.header>
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
        </x-status-cello>
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
            <div class="relative gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
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
                    <label class="gap-4 h-full w-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
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
            <div class="gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <x-info-span class="-my-2">
                    Trwa przetwarzanie danych w tle. Odśwież za chwilę, aby zobaczyć raport.
                </x-info-span>
            </div>
        </div>
        @endif
        @endif
        @if($showTable)
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
            <x-table
                :headers="['Nazwa', 'Status', 'Lokalizacja', 'Ikona', 'Czas Pracy', 'Kiedy', 'Podgląd']"
                :items="$work_sessions"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($work_sessions as $work_session)
                <x-row-work-session :work_session="$work_session" />
                @endforeach
                <x-loader-work-session id="loader" />
            </x-table>
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