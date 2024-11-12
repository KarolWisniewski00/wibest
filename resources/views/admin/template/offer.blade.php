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
        <p><span>Oferta handlowa numer</span><h2 class="h2">{{ $offer['number'] }}</h2></p>
        <p><span>Data wystawienia:</span> {{ $offer['issue_date'] }}</p>
        <p><span>Termin ważności:</span> {{ $offer['due_date'] }}</p>
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
                <p>{{ $offer['client']['name'] }}</p>
                <p>{{ $offer['client']['address'] }}</p>
                <p><span>NIP:</span> {{ $offer['client']['tax_id'] }}</p>
            </td>
        </tr>
    </table>
    <div class="divider"></div>
    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                @if(isset($user))
                <p>Oferta przygotowana przez</p>
                <p><span>{{ $user->name }}</span>,</p>
                <p>{{ $user->email }}</p>
                @endif
            </td>
            <td class="buyer">
                @if($offer['client']['buyer_person_name'] && $offer['client']['buyer_person_email'])
                <p>Oferta przygotowana dla</p>
                <p><span>{{ $offer['client']['buyer_person_name'] }}</span>,</p>
                <p>{{ $offer['client']['buyer_person_email'] }}</p>
                @endif
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
            @foreach ($offer['items'] as $key => $item)
            <tr>
                <td>{{$key + 1}}.</td>
                <td>{{ $item['name'] }}<br><span style="color: #71717a;">{{ $item['service']->description ?? '' }}</span></td>
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
        <p>Razem netto: {{ $offer['subtotal'] }} PLN</p>
        <p>VAT: {{ $offer['vat'] }}</p>
        <p>Razem brutto: {{ $offer['total'] }} PLN</p>
    </div>
    <div class="summary">
        <h2 class="h2">Słownie</h2>
        <p>{{ $offer['total_in_words'] }}</p>
    </div>
    @if($offer['notes'] != null)
    <div class="divider"></div>
    <h2 class="h2">Uwagi</h2>
    <p>{{$offer['notes']}}</p>
    @endif

    <!-- Napis w lewym dolnym rogu -->
    <div class="footer-left">
        Oferta wystawiona w wibest.pl
    </div>

</body>

</html>