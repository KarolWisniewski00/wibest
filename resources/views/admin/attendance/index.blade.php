<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-filter-date loader="attendance">
            {{ route('api.v1.raport.attendance-sheet.set.date') }}
        </x-filter-date>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-raport.nav />
        <!--HEADER-->
        <x-raport.header>
            <span>🕜</span> Ewidencja czasu pracy
        </x-raport.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
        </x-status-cello>

        <x-container-content class="rounded-lg">
            <!--PC VIEW-->
            <x-table
                :headers="['Nazwa', 'Zaplanowany czas pracy', 'Wnioski + Czas pracy', 'Czas pracy', 'Nadgodziny', 'Brak normy', 'Wnioski']"
                :items="$users"
                :radio="true"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($users as $user)
                <x-row-attendance :user="$user" />
                @endforeach
                <x-loader-attendance id="loader" />
            </x-table>
            <!--PC VIEW-->
            @php
            $file = 'ewidencja_czasu_pracy_' . '_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
            @endphp
            <x-download-pdf :file="$file">
                {{ route('api.v1.raport.attendance-sheet.export.xlsx') }}
            </x-download-pdf>
            <x-loader-script>
                {{ route('api.v1.raport.attendance-sheet.get') }}
            </x-loader-script>
        </x-container-content>

    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>