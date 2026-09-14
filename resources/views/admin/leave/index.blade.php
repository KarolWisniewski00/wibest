<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            @if($role == 'admin' || $role == 'właściciel')
                <x-search-filter />
                <x-filter-date loader="leave">
                    {{ route('api.v1.leave.single.set.date') }}
                </x-filter-date>
            @else
                <x-filter-date-user loader="leave">
                    {{ route('api.v1.leave.single.set.date') }}
                </x-filter-date-user>
            @endif
            <input type="hidden" id="start_date" value="{{ $startDate }}">
            <input type="hidden" id="end_date" value="{{ $endDate }}">
        </x-sidebar-left>
        <!--SIDE BAR-->
        <x-main>
            <x-leave.nav :role="$role" :leavePending="$leavePending" />
            <!--HEADER-->
            @if($role == 'admin' || $role == 'właściciel')
                <x-leave.header>
                    <span>📋</span> Moje wnioski
                </x-leave.header>
                <!--HEADER-->
                <div class="mb-4 mx-4 md:m-4 flex flex-col gap-4">
                    <x-status-cello id="show-filter" class="">
                        {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} -
                        {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
                    </x-status-cello>
                </div>
            @else
                <x-leave.header>
                    <span>📋</span> Moje E-Wnioski
                </x-leave.header>
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
                                                           px-5 py-2
                                                           h-9
                                                           @if($allYear)
                                                           sm:ml-[44px]
                                                           @endif
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
                <div class="px-4 flex w-full">
                    <button id="btn-year-bt" class="@if($allYear) !hidden @endif mb-4 btn-year w-full px-2 py-2 rounded-lg hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 dark:text-white col-span-3 dark:hover:text-gray-900 tracking-widest bg-gray-100">
                        Pokaż cały rok
                    </button>
                </div>
            @endif
            <!--CONTENT-->
            <x-container-content>
                <!--MOBILE VIEW-->
                <x-list :items="$leaves" emptyMessage="Brak użytkowników do wyświetlenia.">
                    @foreach ($leaves as $leave)
                        <x-card-leave :leave="$leave" />
                    @endforeach
                    <x-loader-leave-card id="loader-card" />
                </x-list>
                <!--MOBILE VIEW-->

                <!--PC VIEW-->
                <x-table :headers="['Nazwa', 'Status', 'Ikona', 'Wniosek', 'Kiedy', 'Zrealizowano', 'Edycja', 'Anuluj']"
                    :items="$leaves" :checkBox="false" emptyMessage="Brak użytkowników do wyświetlenia.">
                    @foreach($leaves as $leave)
                        <x-row-leave :leave="$leave" />
                    @endforeach
                    <x-loader-leave id="loader" />
                </x-table>
                <!--PC VIEW-->
                <x-loader-script>
                    {{ route('api.v1.leave.single.get') }}
                </x-loader-script>
            </x-container-content>
        </x-main>
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>