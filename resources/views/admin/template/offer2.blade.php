<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 4px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Usunięcie cienia i dodatkowych efektów z ramek tabel */
        table {
            border: none;
            /* Usunięcie domyślnej ramki */
        }

        td,
        th {
            border: 1px solid #ddd;
            /* Prostokątna ramka bez cienia */
        }

        /* Styl dla nagłówka faktury */
        .offer-header {
            margin-bottom: 4px;
        }

        .offer-header span {
            font-weight: bold;
        }

        /* Styl dla podziału */
        .divider {
            border-bottom: 1px solid #000;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        /* Styl dla tabeli sprzedawcy i nabywcy */
        .seller-buyer-table {
            width: 100%;
            margin-top: 8px;
            /* Dodanie marginesu górnego */
            border-collapse: collapse;
            border: none;
        }

        .seller-buyer-table td {
            padding: 4px;
            margin: 0px;
            border: none;
            box-sizing: border-box;
            /* Uwzględnij padding w szerokości */
            vertical-align: top;
            /* Ustawienie wyrównania do góry */
        }

        .seller,
        .buyer {
            width: 50%;
            /* Szerokość każdego bloku, aby razem wynosiły 100% */
        }

        .seller h2,
        .buyer h2,
        .seller p span,
        .buyer p span {
            font-weight: bold;
            /* Pogrubienie tekstu */
        }

        /* Styl dla podsumowania */
        .summary {
            text-align: right;
            /* Wyrównanie tekstu do prawej */
            margin-top: 12px;
            /* Dodanie marginesu górnego */
        }

        .summary p {
            margin: 4px 0;
            /* Dodanie marginesu górnego i dolnego */
        }

        /* Styl dla uwag */
        .notes-section {
            margin-top: 8px;
        }

        /* Styl dla napisu w lewym dolnym rogu */
        .footer-left {
            position: fixed;
            bottom: 8px;
            left: 0px;
            font-size: 8px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="offer-header">
        <p><span>Oferta handlowa numer</span>
        <h2 class="h2">6/2025</h2>
        </p>
        <p><span>Data wystawienia: </span>10.02.2025</p>
        <p><span>Termin ważności: </span>10.02.2025</p>
    </div>
    <div class="divider"></div>

    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <h2 class="h2">Sprzedawca</h2>
                <p>{{ $offer['seller']['name'] }}</p>
                <p>{{ $offer['seller']['address'] }}</p>
                <p><span>NIP:</span> {{ $offer['seller']['tax_id'] }}</p>
                @if($offer['seller']['bank'] == '')
                @else
                <p><span>Numer konta:</span> {{ $offer['seller']['bank'] }}</p>
                @endif
            </td>
            <td class="buyer">
                <h2 class="h2">Nabywca</h2>
                <p>ALBERGI JUSTYNA DRAGAN-KULPA</p>
                <p>Opolska 48, 46-050, Walidrogi</p>
                <p><span>NIP:</span> 6191590210</p>
            </td>
        </tr>
    </table>
    <div class="divider"></div>
    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <p>Menadżer projektu</p>
                <p><span>Karol Wiśniewski</span>,</p>
                <p>biuro@wibest.pl</p>
            </td>
            <td class="seller">
                <p>Deweloper projektu</p>
                <p><span>Karol Wiśniewski</span>,</p>
                <p>biuro@wibest.pl</p>
            </td>
            <td class="buyer">
                <p>Zamówione przez</p>
                <p><span>Hotel Kołodziej</span>,</p>
                <p>570 970 372</p>
            </td>
        </tr>
    </table>
    <div class="divider"></div>
    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <p>Projekt</p>
                <p><span>Podstawowa strona internetowa Hotel Kołodziej</span>,</p>
                <p>https://hotel-kolodziej.pl/</p>
            </td>
            <td class="buyer">
                <p>Zakres prac</p>
                <p><span>Przywrócenie danych automatycznych kopii zapasowych</span></p>
            </td>
        </tr>
    </table>

    <h2>Pozycje</h2>
    <table>
        <thead>
            <tr>
                <th>Lp.</th>
                <th>Nazwa usługi lub towaru</th>
                <th>Ilość</th>
                <th>Cena netto</th>
                <th>Wartość netto</th>
                <th>Stawka VAT</th>
                <th>Kwota VAT</th>
                <th>Wartość brutto</th>
                <th>Rabat</th>
                <th>Cena po rabacie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td>Przywrócenie wiadomości mailowych do 3 dni wstecz
                </td>
                <td>1 szt</td>
                <td>150 PLN</td>
                <td>150 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>150 PLN</td>
                <td>0%</td>
                <td>150 PLN</td>
            </tr>
        </tbody>
    </table>

    <div class="summary">
        <h2 class="h2">Podsumowanie</h2>
        <p>Razem netto: 150 PLN</p>
        <p>VAT: zw</p>
        <p>Razem brutto: 150 PLN</p>
    </div>
    <div class="summary">
        <h2 class="h2">Słownie</h2>
        <p>sto pięćdziesiąt złotych 00/100</p>
    </div>
    <div class="divider"></div>
    <h2 class="h2">Uwagi</h2>
    <p>Usługa wykonana przez dostawce serwera hostingu Home.pl</p>

    <!-- Napis w lewym dolnym rogu -->
    <div class="footer-left">
        Oferta wystawiona w wibest.pl
    </div>

</body>

</html>