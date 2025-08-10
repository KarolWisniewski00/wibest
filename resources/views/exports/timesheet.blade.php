<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Raport obecności</title>
    <style>
        @page {
            margin: 10px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            margin: 10px;
        }

        .header {
            width: 100%;
            margin-bottom: 10px;
            border: none;
        }

        .header td {
            font-size: 12px;
            font-weight: bold;
            border: none;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 3px;
            font-size: 9px;
            text-align: center;
            word-wrap: break-word;
        }

        td:first-child,
        th:first-child {
            white-space: nowrap;
            width: 120px;
            /* lub inna konkretna szerokość */
            text-align: left;
        }

        .legend {
            margin-top: 20px;
            font-size: 9px;
        }
    </style>
</head>

<body>
    {{-- Nagłówek: Raport + miesiąc i rok --}}
    <table class="header">
        <tr>
            <td style="text-align: left;">Raport obecności</td>
            <td style="text-align: right;">{{ $monthName }} {{ $year }}</td>
        </tr>
    </table>

    {{-- Tabela obecności --}}
    <table>
        <thead>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Imię i nazwisko</th>
            @foreach($dates as $date)
            <th style="font-size: 9px; padding: 0px; line-height: 1.2; margin: 0;">
                {{ $date['day_number'] }}<br>{{ $date['day_name_short'] }}
            </th>
            @endforeach
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;">{{ $employee->name }}</td>
                @foreach($dates as $date)
                <td style="font-size: 9px; padding: 2px; margin: 0;">
                    @if(isset($employee->dates[$date['date']]))
                    {{$employee->dates[$date['date']]}}
                    @endif
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>


    {{-- Legenda --}}
    <p class="legend">
        <strong>Legenda:</strong>
        O - obecność, W - wniosek
    </p>
</body>

</html>