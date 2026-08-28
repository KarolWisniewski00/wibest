<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktura</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
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
        .invoice-header {
            margin-bottom: 5px;
        }

        .invoice-header span {
            font-weight: bold;
        }

        /* Styl dla podziału */
        .divider {
            border-bottom: 1px solid #000;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Styl dla tabeli sprzedawcy i nabywcy */
        .seller-buyer-table {
            width: 100%;
            margin-top: 20px;
            /* Dodanie marginesu górnego */
            border-collapse: collapse;
            border: none;
        }

        .seller-buyer-table td {
            padding: 10px;
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
            margin-top: 20px;
            /* Dodanie marginesu górnego */
        }

        .summary p {
            margin: 5px 0;
            /* Dodanie marginesu górnego i dolnego */
        }

        /* Styl dla uwag */
        .notes-section {
            margin-top: 20px;
        }

        /* Styl dla napisu w lewym dolnym rogu */
        .footer-left {
            position: fixed;
            bottom: 10px;
            left: 10px;
            font-size: 10px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <p><span>Faktura numer</span>
        <h2 class="h2">1/02/2026</h2>
        </p>
        <p><span>Data wystawienia:</span> 2026-02-10</p>
        <p><span>Data sprzedaży:</span> 2026-02-10</p>
        <p><span>Termin płatności:</span> 2026-03-10</p>
        <p><span>Płatność:</span> przelew, opłacono</p>
    </div>
    <div class="divider"></div>

    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <h2 class="h2">Sprzedawca</h2>
                <p>Karol Wiśniewski WIBEST</p>
                <p>Sielecka 63, 42-500, Będzin</p>
                <p><span>NIP:</span> 8992998536</p>
            </td>
            <td class="buyer">
                <h2 class="h2">Nabywca</h2>
                <p>SALON FRYZJERSKI AVANTGARDE ELŻBIETA STAROŃ</p>
                <p>Piekary Śląskie, ul. Biskupa Nankera 135</p>
                <p><span>NIP:</span> 6452304285</p>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td>Usługa informatyczna</td>
                <td>1 szt</td>
                <td>300.00 PLN</td>
                <td>300.00 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>300.00 PLN</td>
            </tr>
        </tbody>
    </table>

    <div class="summary">
        <h2 class="h2">Podsumowanie</h2>
        <p>Razem netto: 300.00 PLN</p>
        <p>VAT: 0.00 PLN</p>
        <p>Razem brutto: 300.00 PLN</p>
    </div>
    <div class="summary">
        <h2 class="h2">Słownie</h2>
        <p>trzysta złotych zero groszy</p>
    </div>
    <div class="divider"></div>
    <h2 class="h2">Uwagi</h2>
    <p>
        FAKTURA ZOSTAŁA OPŁACONA<br>
        Serwer VPS 1 rok,<br>
        Domena avantgarde-studio.pl 1 rok,<br>
        Certyfikat SSL 1 rok,<br>
        Drobne zmiany na stronie www
    </p>

    <!-- Napis w lewym dolnym rogu -->
    <div class="footer-left">
        faktura wystawiona w wibest.pl
    </div>

</body>

</html>