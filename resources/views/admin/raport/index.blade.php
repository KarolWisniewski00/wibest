<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-filter-date>
            {{ route('api.v1.raport.time-sheet.set.date') }}
        </x-filter-date>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-raport.nav />
        <!--HEADER-->
        <x-raport.header>
            <span>🙋🏻‍♂️</span> Lista obecności
        </x-raport.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
        </x-status-cello>

        <x-container-content-calendar class="rounded-lg">
            <!--PC VIEW-->
            <x-table-calendar
                :headers="array_merge(['Nazwa'], $dates)"
                :items="$users"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($users as $user)
                <x-row-raport :user="$user" />
                @endforeach
                <x-loader-calendar id="loader" />
            </x-table-calendar>
            <!--PC VIEW-->
            @php
            $file = 'raport_lista_obecnosci_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
            @endphp
            <x-download-pdf-check :file="$file">
                {{ route('api.v1.raport.time-sheet.export.xlsx') }}
            </x-download-pdf-check>
            <x-loader-script>
                {{ route('api.v1.raport.time-sheet.get') }}
            </x-loader-script>
        </x-container-content-calendar>
    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>