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
            color: #000;
        }

        h2 {
            margin: 4px 0;
            font-size: 12px;
        }

        /* ===================== */
        /* PODSTAWOWE TABELE */
        /* ===================== */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 4px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* ===================== */
        /* HEADER OFERTY */
        /* ===================== */
        .offer-header span {
            font-weight: bold;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 12px 0;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-top: 1px solid #e5e7eb;
        }


        /* ===================== */
        /* UKŁAD SPRZEDAWCA / NABYWCA */
        /* ===================== */
        .seller-buyer-table {
            width: 100%;
            border: none;
        }

        .seller-buyer-table td {
            border: none;
            padding: 0;
        }

        /* ===================== */
        /* KARTY DANYCH */
        /* ===================== */
        .card {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #f9fafb;
        }

        .section {
            padding: 6px;
            border-bottom: 1px solid #e5e7eb;
        }

        .section:last-child {
            border-bottom: none;
        }

        .label {
            font-size: 8px;
            color: #6b7280;
            margin-bottom: 2px;
        }

        .value {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            word-break: break-all;
        }

        .icon {
            margin-right: 4px;
        }

        /* ===================== */
        /* PODSUMOWANIE */
        /* ===================== */
        .summary {
            text-align: right;
            margin-top: 8px;
        }

        .summary p {
            margin: 2px 0;
        }

        /* ===================== */
        /* STOPKA */
        /* ===================== */
        .footer-left {
            position: fixed;
            bottom: 8px;
            left: 8px;
            font-size: 8px;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="offer-header">
        <p><span>Oferta handlowa numer:</span></p>
        <h2>{{ $offer['number'] }}</h2>
        <p><span>Data wystawienia:</span> {{ $offer['issue_date'] }}</p>
        <p><span>Termin ważności:</span> {{ $offer['due_date'] }}</p>
    </div>

    <div class="divider"></div>

    <!-- SPRZEDAWCA / KLIENT -->
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%; padding-right:4px;">
                <div class="card">
                    <div class="section">
                        <div class="label">Nazwa</div>
                        <div class="value"><span class="icon">🏢</span>Karol Wiśniewski WIBEST</div>
                    </div>
                    <div class="section">
                        <div class="label">Adres</div>
                        <div class="value"><span class="icon">📍</span>Będzin, ul. Sielecka 63</div>
                    </div>
                    <div class="section">
                        <div class="label">NIP</div>
                        <div class="value"><span class="icon">🧾</span>8992998536</div>
                    </div>
                </div>
            </td>

            <td style="width: 50%; padding-left:4px;">
                <div class="card">
                    <div class="section">
                        <div class="label">Nazwa</div>
                        <div class="value"><span class="icon">🏢</span>{{ $offer['client']['name'] }}</div>
                    </div>
                    <div class="section">
                        <div class="label">Adres</div>
                        <div class="value"><span class="icon">📍</span>{{ $offer['client']['address'] }}</div>
                    </div>
                    <div class="section">
                        <div class="label">NIP</div>
                        <div class="value"><span class="icon">🧾</span>{{ $offer['client']['tax_id'] }}</div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <div class="divider"></div>

    <!-- OSOBY KONTAKTOWE -->
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%; padding-right:4px;">
                @if(isset($user))
                <div class="card">
                    <div class="section">
                        <div class="label">Opiekun</div>
                        <div class="value"><span class="icon">👤</span>{{ $user->name }}</div>
                    </div>
                    <div class="section">
                        <div class="label">Email</div>
                        <div class="value"><span class="icon">📧</span>{{ $user->email }}</div>
                    </div>
                </div>
                @endif
            </td>

            <td style="width: 50%; padding-left:4px;">
                @if($offer['client']['buyer_person_name'] && $offer['client']['buyer_person_email'])
                <div class="card">
                    <div class="section">
                        <div class="label">Osoba kontaktowa</div>
                        <div class="value"><span class="icon">👤</span>{{ $offer['client']['buyer_person_name'] }}</div>
                    </div>
                    <div class="section">
                        <div class="label">Email</div>
                        <div class="value"><span class="icon">📧</span>{{ $offer['client']['buyer_person_email'] }}</div>
                    </div>
                </div>
                @endif
            </td>
        </tr>
    </table>

    <div class="divider"></div>

    <!-- POZYCJE -->
    <h2>Pozycje</h2>

    <table>
        <thead>
            <tr>
                <th>Lp.</th>
                <th>Nazwa</th>
                <th>Ilość</th>
                <th>Cena netto</th>
                <th>Netto</th>
                <th>Rabat</th>
                <th>Po rabacie</th>
                <th>VAT</th>
                <th>Kwota VAT</th>
                <th>Brutto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offer['items'] as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    {{ $item['name'] }}<br>
                    <span style="color:#71717a;">{{ $item['service']->description ?? '' }}</span>
                </td>
                <td>{{ $item['quantity'] }} {{ $item['unit'] }}</td>
                <td>{{ number_format($item['unit_price'], 2) }} PLN</td>
                <td>{{ number_format($item['subtotal'], 2) }} PLN</td>
                <td>{{ $item['discount'] }}%</td>
                <td>{{ number_format($item['price_after_discount'], 2) }} PLN</td>
                <td>{{ $item['vat_rate'] }}</td>
                <td>{{ $item['vat_amount'] }}</td>
                <td>{{ number_format($item['total'], 2) }} PLN</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <h2>Podsumowanie</h2>
        <p>Razem netto: {{ $offer['subtotal'] }} PLN</p>
        <p>VAT: {{ $offer['vat'] }} PLN</p>
        <p><strong>Razem brutto: {{ $offer['total'] }} PLN</strong></p>
    </div>

    <div class="summary">
        <h2>Słownie</h2>
        <p>{{ $offer['total_in_words'] }}</p>
    </div>

    @if($offer['notes'])
    <div class="divider"></div>
    <h2>Uwagi</h2>
    <p>{{ $offer['notes'] }}</p>
    @endif

    <div class="footer-left">
        Oferta wystawiona w wibest.pl
    </div>

</body>

</html>