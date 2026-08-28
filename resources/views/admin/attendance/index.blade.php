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
                {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} -
                {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
            </x-status-cello>

            <x-container-content class="rounded-lg">
                <!--PC VIEW-->
                @php
                    $baseHeaders = [
                        'Nazwa',
                        'Zaplanowany czas pracy',
                        'Wnioski + Czas pracy',
                        'Czas pracy',
                        'Nadgodziny',
                        'Brak normy',
                        'Wnioski',
                    ];

                    $shortTypes = config('leavetypes.shortType', []);

                    $headers = array_merge($baseHeaders, array_keys($shortTypes));
                @endphp
                <x-table-sheet :headers="$headers" :items="$users" :radio="true" :showMobile="true"
                    emptyMessage="Brak użytkowników do wyświetlenia.">
                    @foreach($users as $user)
                        <x-row-attendance :user="$user" />
                    @endforeach
                    <x-loader-attendance id="loader" />
                </x-table-sheet>
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
                <script>
                $('#excel').on('click', function () {
                        const ids = [];
                        let name = '';
                        $('#table tbody input[type="radio"]:checked').each(function () {
                            const id = $(this).data('id');
                            name = String($(this).data('name'));
                            name = name
                                .replace(/ą/g, 'a')
                                .replace(/ć/g, 'c')
                                .replace(/ę/g, 'e')
                                .replace(/ł/g, 'l')
                                .replace(/ń/g, 'n')
                                .replace(/ó/g, 'o')
                                .replace(/ś/g, 's')
                                .replace(/ź/g, 'z')
                                .replace(/ż/g, 'z')
                                .replace(/Ą/g, 'A')
                                .replace(/Ć/g, 'C')
                                .replace(/Ę/g, 'E')
                                .replace(/Ł/g, 'L')
                                .replace(/Ń/g, 'N')
                                .replace(/Ó/g, 'O')
                                .replace(/Ś/g, 'S')
                                .replace(/Ź/g, 'Z')
                                .replace(/Ż/g, 'Z')
                                .replace(/\s+/g, '_'); // spacje → podkreślenia
                            if (id) {
                                ids.push(id);
                            }
                        });

                        if (ids.length === 0) {
                            alert('Zaznacz przynajmniej jedną pozycję.');
                            return;
                        }
                        $('#idsInput').val(ids);
                        $('#excelForm').submit();
                    });
                    </script>
            </x-container-content>

        </x-main>
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>