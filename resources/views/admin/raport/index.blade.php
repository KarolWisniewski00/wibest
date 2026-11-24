<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-filter-date-user>
            {{ route('api.v1.raport.time-sheet.set.date') }}
        </x-filter-date-user>
        @include('admin.rcp.partials.classification-filter')
        <x-sidebar-filter-ready />
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
        <x-raport.date-navigation :start-date="$startDate" />

        <x-container-content-calendar class="rounded-lg">
            <!--PC VIEW-->
            <x-table-calendar
                :headers="array_merge(['Nazwa'], $dates)"
                :items="$users" :loading="$deferReport ?? false"
                emptyMessage="Brak użytkowników do wyświetlenia.">
                @foreach($users as $user)
                <x-row-raport :user="$user" />
                @endforeach
                @for($row = 0; $row < 3; $row++)
                    <x-loader-calendar />
                @endfor
            </x-table-calendar>
            <!--PC VIEW-->
            @php
            $file = 'raport_lista_obecnosci_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
            @endphp
            <x-download-pdf-check :file="$file">
                {{ route('api.v1.raport.time-sheet.export.xlsx') }}
            </x-download-pdf-check>
            <x-report-pages />
        </x-container-content-calendar>
    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>
