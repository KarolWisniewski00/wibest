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
        @if($invoice['invoice_type'] == 'faktura')
        <p><span>Faktura numer</span><h2 class="h2">{{ $invoice['number'] }}</h2></p>
        @elseif($invoice['invoice_type'] == 'faktura sprzedażowa')
        <p><span>Faktura numer</span><h2 class="h2">{{ $invoice['number'] }}</h2></p>
        @else
        <p><span>Faktura pro-forma numer</span><h2 class="h2">PRO {{ $invoice['number'] }}</h2></p>
        @endif
        <p><span>Data wystawienia:</span> {{ $invoice['issue_date'] }}</p>
        <p><span>Termin płatności:</span> {{ $invoice['due_date'] }}</p>
        <p><span>Płatność:</span> {{ $invoice['payment_method'] }}</p>
    </div>
    <div class="divider"></div>

    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <h2 class="h2">Sprzedawca</h2>
                <p>{{ $invoice['seller']['name'] }}</p>
                <p>{{ $invoice['seller']['address'] }}</p>
                <p><span>NIP:</span> {{ $invoice['seller']['tax_id'] }}</p>
                @if($invoice['seller']['bank'] == '')
                @else
                <p><span>Numer konta:</span> {{ $invoice['seller']['bank'] }}</p>
                @endif
            </td>
            <td class="buyer">
                <h2 class="h2">Nabywca</h2>
                <p>{{ $invoice['client']['name'] }}</p>
                <p>{{ $invoice['client']['address'] }}</p>
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
        <h2 class="h2">Podsumowanie</h2>
        <p>Razem netto: {{ $invoice['subtotal'] }} PLN</p>
        <p>VAT: {{ $invoice['vat'] }}</p>
        <p>Razem brutto: {{ $invoice['total'] }} PLN</p>
    </div>
    <div class="summary">
        <h2 class="h2">Słownie</h2>
        <p>{{ $invoice['total_in_words'] }}</p>
    </div>
    @if($invoice['notes'] != null)
    <div class="divider"></div>
    <h2 class="h2">Uwagi</h2>
    <p>{{$invoice['notes']}}</p>
    @endif

    <!-- Napis w lewym dolnym rogu -->
    <div class="footer-left">
        Faktura wystawiona w wibest.pl
    </div>

</body>

</html>