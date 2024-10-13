<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktura</title>
    <style>
        body {
            font-family: 'Lato', Tahoma, Verdana, Segoe, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
            /* Wyśrodkowanie kontenera */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            /* Wyśrodkowanie tekstu w nagłówku */
            padding: 10px 0;
        }

        .header h1 {
            font-family: "Raleway", sans-serif;
            color: #333;
            font-size: 32px;
        }

        .invoice-details {
            margin-top: 20px;
            margin-bottom: 30px;
            text-align: start;
            /* Wyśrodkowanie tekstu w szczegółach faktury */
        }

        .invoice-details h2 {
            font-size: 20px;
            color: #2190e3;
        }

        .invoice-details p {
            font-size: 14px;
            color: #555;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-table th,
        .order-table td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .order-table th {
            background-color: #f9f9f9;
            color: #333;
        }

        .order-table td {
            color: #555;
        }

        .order-summary {
            text-align: right;
            margin-top: 20px;
        }

        .order-summary p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }

        .order-summary .total {
            font-size: 18px;
            color: #2190e3;
            font-weight: bold;
        }

        .payment-info {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            text-align: start;
            /* Wyśrodkowanie tekstu w sekcji płatności */
        }

        .payment-info p {
            font-size: 16px;
            color: #333;
        }

        .payment-info p span {
            text-transform: none;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            /* Wyśrodkowanie stopki */
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }

        .footer a {
            color: #2190e3;
            text-decoration: none;
        }

        .create-account {
            display: block;
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin: 20px auto;
            /* Wyśrodkowanie przycisku */
            font-size: 20px;
            /* Zmienione na 20px dla większej widoczności */
            font-weight: bold;
            max-width: 250px;
            /* Maksymalna szerokość przycisku */
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            @if($invoice['invoice_type'] == 'faktura')
            <h1>Faktura numer {{ $invoice['number'] }}</h1>
            @elseif($invoice['invoice_type'] == 'faktura sprzedażowa')
            <h1>Faktura numer {{ $invoice['number'] }}</h1>
            @else
            <h1>Faktura pro-forma numer {{ $invoice['number'] }}</h1>
            @endif
        </div>

        <div class="invoice-details">
            <h2>Szanowny Kliencie,</h2>
            @if($invoice['invoice_type'] == 'faktura')
            <p>W załączeniu przesyłamy fakturę przygotowaną przez {{$invoice['user']}}. Poniżej znajdziesz szczegóły zakupu oraz informacje na temat płatności.</p>
            @elseif($invoice['invoice_type'] == 'faktura sprzedażowa')
            <p>W załączeniu przesyłamy fakturę przygotowaną przez {{$invoice['user']}}. Poniżej znajdziesz szczegóły zakupu oraz informacje na temat płatności.</p>
            @else
            <p>W załączeniu przesyłamy fakturę pro-formę przygotowaną przez {{$invoice['user']}}. Poniżej znajdziesz szczegóły zakupu oraz informacje na temat płatności.</p>
            @endif
        </div>

        <table class="order-table">
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
        <div class="order-summary">
            <p>Razem netto {{ $invoice['subtotal'] }} PLN</p>
            <p>VAT {{ $invoice['vat'] }} PLN</p>
            <p class="total">Razem brutto <strong>{{ $invoice['total'] }} PLN</strong></p>
        </div>

        <div class="payment-info">
            @if($invoice['seller']['bank'] == '')
            @else
            <p>Prosimy o dokonanie płatności na poniższe konto</p>
            <p style="text-transform: none;">Numer konta<br><strong>{{ $invoice['seller']['bank'] }}</strong></p>
            @endif
            <p style="text-transform: none;">Do zapłaty<br><strong>{{ $invoice['total_in_words'] }}</strong></p>
            <p style="text-transform: none;">Termin płatności<br><strong>{{ $invoice['due_date'] }}</strong></p>
        </div>
    
        <div class="header">
            <a href="{{route('login.google')}}"
                style="text-align: center; display: inline-flex; align-items: center; padding: 0.5rem 1rem; background-color: #000; color: #fff; border: none; border-radius: 0.375rem; font-weight: bold; text-transform: uppercase; text-decoration: none; transition: background-color 0.15s ease-in-out;"
                onmouseover="this.style.backgroundColor='#333'"
                onmouseout="this.style.backgroundColor='#000'"
                onfocus="this.style.backgroundColor='#333'"
                onblur="this.style.backgroundColor='#000'">
                Załóż bezpłatne konto do fakturowania - Logowanie przez Google
            </a>
        </div>

        <div class="footer">
            <p>Wiadomość wysłana przez wibest.pl</p>
            <p><a href="https://wibest.pl">Odwiedź naszą stronę</a></p>
            <p>&copy; {{ date('Y') }} Karol Wiśniewski WIBEST. Wszelkie prawa zastrzeżone.</p>
        </div>
    </div>
</body>

</html>