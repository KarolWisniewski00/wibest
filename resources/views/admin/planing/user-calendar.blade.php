<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            <x-filter-date-user loader="work-session">
                {{ route('api.v1.calendar.work-schedule-calendar-user.set.date') }}
            </x-filter-date-user>
            <input type="hidden" id="start_date" value="{{ $startDate }}">
            <input type="hidden" id="end_date" value="{{ $endDate }}">
        </x-sidebar-left>
        <!--SIDE BAR-->

        <!--MAIN-->
        <x-main>
            <x-calendar.nav />
            <x-calendar.header>
                <span>📅</span> Grafik
            </x-calendar.header>
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
                                                           @if($allYear)
                                                           ml-[44px]
                                                           @endif
                                                           rounded-xl
                                                           bg-gray-100 dark:bg-gray-800
                                                           text-gray-700 dark:text-gray-200
                                                           hover:bg-gray-200 dark:hover:bg-gray-700
                                                           transition-all duration-200">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>

                    {{-- Aktualny miesiąc --}}
                    <div id="current-month-bt" class="min-w-[180px] text-center
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
                <!--CONTENT-->
                <x-container-content>
                    <div id="work-calendar" class="w-full bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">

                        @php
                            $startDate = \Carbon\Carbon::parse($startDate);
                            $endDate = \Carbon\Carbon::parse($endDate);

                            $year = $startDate->year;
                            $month = $startDate->month;

                            $firstDay = $startDate->copy()->startOfMonth();
                            $daysInMonth = $firstDay->daysInMonth;

                            // Carbon: Monday = 1 ... Sunday = 7
                            $startDay = $firstDay->dayOfWeekIso;
                        @endphp


                        <!-- ========================= -->
                        <!-- HEADER DNI TYGODNIA -->
                        <!-- ========================= -->
                        <div
                            class="grid grid-cols-7  text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            @foreach(['Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'So', 'Nd'] as $index => $day)
                                <div
                                    class="px-2 py-2 bg-gray-50 dark:bg-gray-700 {{ $index >= 5 ? 'bg-gray-100 dark:bg-gray-900/40' : ''}}">
                                    {{ $day }}
                                </div>
                            @endforeach
                        </div>


                        <!-- ========================= -->
                        <!-- KALENDARZ -->
                        <!-- ========================= -->

                        <div id="calendarUserContainer" class="grid grid-cols-7 border-l dark:border-gray-700">


                            {{-- Puste pola przed początkiem miesiąca --}}

                            @for($i = 1; $i < $startDay; $i++)
                                <div
                                    class=" min-h-[72px] sm:min-h-[100px] md:min-h-[125px] border-r border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40">
                                </div>
                            @endfor


                            {{-- ========================= --}}
                            {{-- DNI MIESIĄCA --}}
                            {{-- ========================= --}}

                            @for($day = 1; $day <= $daysInMonth; $day++)
                                @php
                                    $date = \Carbon\Carbon::create(
                                        $year,
                                        $month,
                                        $day
                                    );
                                    $dateInfo = $date->format('d.m.y');

                                    $dateKey = $date->format('Y-m-d');


                                    $isToday = $date->isToday();
                                    $isWeekend = $date->isWeekend();
                                @endphp
                                <div
                                    class=" relative min-h-[72px] sm:min-h-[100px] md:min-h-[125px] p-1 sm:p-2 md:p-3 border-r border-b dark:border-gray-700 transition hover:bg-gray-50 dark:hover:bg-gray-700/40 {{ $isWeekend ? 'bg-gray-50/70 dark:bg-gray-900/20' : ''}} ">
                                    <!-- ========================= -->
                                    <!-- NUMER DNIA -->
                                    <!-- ========================= -->
                                    <div class="flex flex-col items-start justify-start">
                                        @if ($isToday)
                                            <div class="w-6 h-6 shrink-0 rounded-full
                                                                    bg-red-300
                                                                    flex items-center justify-center
                                                                    text-[11px] font-semibold
                                                                    leading-none
                                                                    text-gray-900 mb-2">
                                                <span class="block leading-none">
                                                    {{ $day }}
                                                </span>
                                            </div>
                                        @else
                                            <div class="w-6 h-6 shrink-0 rounded-full
                                                                    flex items-center justify-center
                                                                    text-[11px] font-semibold
                                                                    leading-none
                                                                    text-gray-900 dark:text-white mb-2">
                                                <span class="block leading-none">
                                                    {{ $day }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    @php
                                        $obj_status = $users[0]->dates[$dateInfo];
                                    @endphp
                                    <x-cell-calendar-user-planing :user="$users[0]" :obj="$users[0]->objs[$dateInfo] ?? null" :obj_status="$obj_status"
                                        :dateInfo="$dateInfo" :startDate="$startDate ?? null" :endDate="$endDate ?? null" />
                                </div>

                            @endfor


                            <!-- ========================= -->
                            <!-- PUSTE POLA PO KOŃCU -->
                            <!-- ========================= -->

                            @php
                                $totalCells = ($startDay - 1) + $daysInMonth;

                                $remainingCells = (7 - ($totalCells % 7)) % 7;
                            @endphp


                            @for($i = 0; $i < $remainingCells; $i++)

                                <div
                                    class=" min-h-[72px] sm:min-h-[100px] md:min-h-[125px] border-r border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40">
                                </div>

                            @endfor

                        </div>

                    </div>
                </x-container-content>
            @endif
        </x-main>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>