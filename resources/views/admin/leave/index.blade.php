<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-filter-date loader="leave">
            {{ route('api.v1.leave.single.set.date') }}
        </x-filter-date>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-leave.nav :role="$role" :leavePending="$leavePending" />
        <!--HEADER-->
        <x-leave.header>
            <span>📋</span> Moje wnioski
        </x-leave.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
        </x-status-cello>
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
            <x-table
                :headers="['Nazwa', 'Status', 'Ikona', 'Wniosek', 'Kiedy', 'Zrealizowano', 'Edycja', 'Anuluj']"
                :items="$leaves"
                :checkBox="false"
                emptyMessage="Brak użytkowników do wyświetlenia.">
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