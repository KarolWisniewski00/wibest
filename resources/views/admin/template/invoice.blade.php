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
            /* Zmniejszony rozmiar czcionki */
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
            /* Dodanie marginesu górnego */
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <h2 class="h2"><span>Faktura numer:</span> {{ $invoice['number'] }}</h2><br>
        <p><span>Data wystawienia:</span> {{ $invoice['issue_date'] }}</p>
        <p><span>Data sprzedaży:</span> {{ $invoice['issue_date'] }}</p>
        <p><span>Termin płatności:</span> {{ $invoice['due_date'] }}</p>
        <p><span>Płatność:</span> {{ $invoice['payment_method'] }}</p>
    </div>
    <div class="divider"></div>

    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <h2 class="h2">Sprzedawca</h2>
                <p><span>Nazwa:</span> {{ $invoice['seller']['name'] }}</p>
                <p><span>Adres:</span> {{ $invoice['seller']['address'] }}</p>
                <p><span>NIP:</span> {{ $invoice['seller']['tax_id'] }}</p>
                <p><span>Numer konta:</span> {{ $invoice['seller']['bank'] }}</p>
            </td>
            <td class="buyer">
                <h2 class="h2">Nabywca</h2>
                <p><span>Nazwa:</span> {{ $invoice['client']['name'] }}</p>
                <p><span>Adres:</span> {{ $invoice['client']['address'] }}</p>
                <p><span>NIP:</span> {{ $invoice['client']['tax_id'] }}</p>
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
            @foreach ($invoice['items'] as $key => $item)
            <tr>
                <td>{{$key + 1}}.</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($item['unit_price'], 2) }} PLN</td>
                <td>{{ number_format($item['subtotal'], 2) }} PLN</td>
                <td>{{ $item['vat_rate'] }}</td>
                <td>{{ $item['vat_amount'] }}</td>
                <td>{{ number_format($item['total'], 2) }} PLN</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <h2>Podsumowanie</h2>
        <p>Razem netto: {{ $invoice['subtotal'] }} PLN</p>
        <p>VAT: {{ $invoice['vat'] }}</p>
        <p>Razem brutto: {{ $invoice['total'] }} PLN</p>
    </div>


</body>

</html>