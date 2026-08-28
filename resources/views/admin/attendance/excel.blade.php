<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <x-main-no-filter>

            <x-container-content class="rounded-lg mt-4 bg-white p-4 rounded-lg">
                <!--HEADER-->
                <x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
                    <h1 class='text-2xl font-medium text-gray-900'>
                        {{ $excel['employee']['name'] }}
                    </h1>
                    <h1 class='text-2xl font-medium text-gray-900'>
                        {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} -
                        {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
                    </h1>
                </x-container-header>
                <!--HEADER-->
                <script src="https://bossanova.uk/jspreadsheet/v5/jspreadsheet.js"></script>
                <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v5/jspreadsheet.css" type="text/css" />
                <script src="https://jsuites.net/v5/jsuites.js"></script>
                <link rel="stylesheet" href="https://jsuites.net/v5/jsuites.css" type="text/css" />

                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons" />

                <div id="spreadsheet" class="w-full"></div>
                <div class="mb-4">
                    <x-button-neutral id="download-xlsx" type="button" class="text-xs">
                        <i class="fa-solid fa-download mr-2"></i>Pobierz
                    </x-button-neutral>
                </div>
                <script>
                    const excelData = @json($excel);

                    console.log(excelData);

                    const rows = [];


                    for (let i = 0; i < excelData.dates.length; i++) {
                        let plan = null;
                        if (excelData.datesPlanned[i] != '00h') {
                            plan = excelData.datesPlanned[i];
                        }
                        let under = null;
                        if (excelData.datesUnder[i] != '00h') {
                            under = excelData.datesUnder[i];
                        }
                        rows.push([excelData.dates[i],
                            plan,
                        excelData.datesWork[i],
                        excelData.datesAll[i],
                        excelData.datesExtra[i],
                            under,
                        excelData.datesLeave[i],
                        ]);
                    }
                    rows.push(['Razem',
                        excelData.employee.time_in_work_hms_planned,
                        '',
                        excelData.employee.time_in_work_hms,
                        excelData.employee.time_in_work_hms_extra,
                        excelData.employee.time_in_work_hms_under,
                        excelData.employee.time_in_work_hms_leave,
                    ]);

                    jspreadsheet(document.getElementById('spreadsheet'), {
                        worksheets: [{
                            data: rows,
                            columns: [
                                { title: 'Dzień', width: '200px' },
                                { title: 'Zaplanowany czas', width: '200px' },
                                { title: 'Zdarzenia', width: '200px' },
                                { title: 'Czas pracy', width: '200px' },
                                { title: 'Nadgodziny', width: '200px' },
                                { title: 'Brak normy', width: '200px' },
                                { title: 'Wnioski', width: '200px' },
                            ]
                        }],
                    });
                    $('#download-xlsx').on('click', function () {
                        $.ajax({
                            url: "{{ route('api.v1.raport.attendance-sheet.export.xlsx') }}",
                            method: 'POST',
                            data: JSON.stringify({
                                _token: '{{ csrf_token() }}',
                                ids: [excelData.employee.id],
                                excel: rows,
                            }),
                            contentType: 'application/json',
                            xhrFields: {
                                responseType: 'blob' // ważne: bo XLSX to plik
                            },
                            success: function (data, status, xhr) {
                                console.log(data)
                                const blob = new Blob([data], {
                                    type: 'application/pdf'
                                });
                                const link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = 'test.pdf';
                                link.click();
                            },
                            error: function () {
                                alert('Błąd przy generowaniu pliku.');
                            }
                        });
                    });
                </script>
            </x-container-content>
        </x-main-no-filter>
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>