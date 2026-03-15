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
            display: flex;
            flex-direction: column;
            gap: 16px;
            /* gap-4 */
            width: auto;
            /* w-full */
            height: auto;
            /* h-full */
            appearance: none;
            border-radius: 0.5rem;
            /* rounded-lg */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            /* shadow */
            border: 1px solid #f3f4f6;
            /* border-gray-100 */
            background-color: #f3f4f6;
            /* bg-gray-100 */
            outline: none;
            padding: 16px;
        }

        .section {
            padding: 0px;
        }

        .label {
            font-size: 8px;
            color: #6b7280;
            margin-bottom: 2px;
        }

        .value {
            font-size: 10px;
            font-weight: bold;
            color: #111827;
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

        /* ===================== */
        /* DATA */
        /* ===================== */
        .date {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            word-break: break-word;
        }

        .date-text {
            color: #93c5fd;
        }

        /* ===================== */
        /* POZYCJE OFERTY */
        /* ===================== */
        .wrap-items {
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .items-table {
            width: 100%;
            font-size: 8px;
        }

        .items-table thead th {
            background: #f3f4f6;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 8px;
            padding: 6px 4px;
            border: 0;
        }

        .items-table tbody td {
            padding: 6px 4px;
            border: 0;
            vertical-align: middle;
        }

        .items-table tbody tr {
            border-bottom: 1px solid #e5e7eb;
        }

        .item-name {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .item-desc {
            font-size: 8px;
            color: #6b7280;
            margin-top: 2px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .badge {
            display: inline-block;
            padding: 2px 4px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 3px;
            background: #e5e7eb;
            color: #111827;
            letter-spacing: 0.08em;
        }

        .badge-green {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-gray {
            background: #e5e7eb;
            color: #374151;
        }

        h2 {
            color: #111827;
            width: 100%;
            /* w-full */
            padding: 1rem 0;
            /* p-4 */
            align-items: center;
            /* items-center */
            display: flex;
            /* md:flex */
            flex-direction: row;
            /* md:flex-row */
            justify-content: space-between;
            /* md:justify-between */
        }

        .justify-right {
            justify-content: right;
        }

        .cell-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: auto;
            height: auto;
        }

        .cell-icon {
            font-size: 1.125rem;
            /* text-lg */
        }

        /* md breakpoint */
        @media (min-width: 768px) {
            .cell-icon {
                font-size: 1.25rem;
                /* md:text-xl */
            }
        }

        .cell-badge {
            margin-top: 0.25rem;
            /* mt-1 */
            padding: 0.125rem 0.25rem;
            /* px-1 py-0.5 */
            border-radius: 9999px;
            /* rounded-full */
            font-size: 0.5rem;
            /* text-[0.5rem] */
            font-weight: 600;
            /* font-semibold */
            background-color: #86efac;
            /* bg-green-300 */
            color: #111827;
            /* text-gray-900 */
            text-transform: uppercase;
            letter-spacing: 0.1em;
            /* tracking-widest */
        }

        .violet {
            background-color: #c4b5fd;
            /* bg-violet-300 */
        }

        .pink {
            background-color: #f9a8d4;
            /* bg-pink-300 */
        }

        /* md breakpoint */
        @media (min-width: 768px) {
            .cell-badge {
                padding: 0.125rem 0.5rem;
                /* md:px-2 */
                font-size: 0.75rem;
                /* md:text-xs */
            }
        }

        /* Dark mode (kolory zostają takie same jak w Tailwindzie) */
        .dark .cell-badge {
            background-color: #86efac;
            color: #111827;
        }
        
    </style>
</head>

<body>
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%;">
                <div class="card">
                    <div class="section">
                        <div class="label">Numer oferty</div>
                        <div class="value"><span class="icon">✅</span>{{ $offer['number'] }}</div>
                    </div>
                    <div class="section">
                        <div class="label">Data wystawienia</div>
                        <div class="date">
                            <div class="value date-text">
                                <span class="icon">📅</span>{{ $offer['issue_date'] }}
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <div class="label">Termin ważności</div>
                        <div class="date">
                            <div class="value date-text">
                                <span class="icon">📅</span>{{ $offer['due_date'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td style="width: 50%;"></td>
        </tr>
    </table>
    <!-- SPRZEDAWCA / KLIENT -->
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%; padding-right: 4px;">
                <div class="section">
                    <div class="value">
                        <h2 style="margin: 0px;">Sprzedający</h2>
                    </div>
                </div>
            </td>

            <td style="width: 50%; padding-left: 4px;">
                <div class="section">
                    <div class="value">
                        <h2 style=" margin: 0px;">Kupujący</h2>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%; padding-right: 4px;">
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

            <td style="width: 50%; padding-left: 4px;">
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

    <!-- OSOBY KONTAKTOWE -->
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%; padding-right:4px; padding-top:8px;">
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

            <td style="width: 50%; padding-left:4px; padding-top:8px;">
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

    <!-- POZYCJE -->
    <div class="section">
        <div class="value">
            <h2 style="padding-bottom: 0px; margin: 0px; margin-bottom: 2px;">Propozycja wartości</h2>
        </div>
        <div class="label" style="padding-bottom: 16px; margin-bottom: 0px;">Szczegóły sprawdź niżej</div>
    </div>

    <div class="wrap-items">
        <table class="items-table">
            <thead>
                <tr>
                    <th class="text-center">Lp.</th>
                    <th>Nazwa</th>
                    <th class="text-right">Cena</th>
                    <th class="text-center">Ilość</th>
                    <th class="text-right">Netto</th>
                    <th class="text-center">%</th>
                    <th class="text-right">VAT</th>
                    <th class="text-right">Brutto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offer['items'] as $key => $item)
                <tr>
                    <td class="text-center">
                        <div class="label">
                            {{ $key + 1 }}
                        </div>
                    </td>

                    <td class="">
                        <div style="display: flex; flex-direction: row; justify-content: flex-start; align-items: center; gap: 8px;">
                            @if($item['name'] == 'Rejestracja Czasu pracy')
                            <div class="cell-content" style="width: fit-content;">
                                <span class="cell-icon">⏱️</span>
                                <span class="cell-badge">RCP</span>
                            </div>
                            @endif
                            @if($item['name'] == 'Grafik pracy')
                            <div class="cell-content" style="width: fit-content;">
                                <span class="cell-icon">🌀</span>
                                <span class="cell-badge violet">ZMI</span>
                            </div>
                            @endif
                            @if($item['name'] == 'Elektroniczne wnioski urlopowe')
                            <div class="cell-content" style="width: fit-content;">
                                <span class="cell-icon">💻</span>
                                <span class="cell-badge pink">pz</span>
                            </div>
                            @endif
                            @if($item['name'] == 'Ewidencja czasu pracy')
                            <div class="cell-content" style="width: fit-content;">
                                <span class="cell-icon">🕜</span>
                            </div>
                            @endif
                            @if($item['name'] == 'Raporty')
                            <div class="cell-content" style="width: fit-content;">
                                <span class="cell-icon">📈</span>
                            </div>
                            @endif
                            @if($item['name'] == 'Powiadomienia SMS')
                            <div class="cell-content" style="width: fit-content;">
                                <span class="cell-icon">📱</span>
                            </div>
                            @endif
                            @if($item['name'] == 'Zadania w nadgodzinach')
                            <div class="cell-content" style="width: fit-content;">
                                <span class="cell-icon">🎯</span>
                            </div>
                            @endif
                            <div class="value">{{ $item['name'] }}</div>
                            @if($item['service']->description ?? false)
                            <div class="item-desc">
                                {{ $item['service']->description }}
                            </div>
                            @endif
                        </div>
                    </td>

                    <td class="text-right">
                        <div class="value">
                            {{ number_format($item['unit_price'], 2) }} PLN
                        </div>
                    </td>

                    <td class="text-center">
                        <div class="value">
                            @if($item['unit'] == 'os')
                            <span class="icon">👤</span>
                            @endif
                            @if($item['unit'] == 'msg')
                            <span class="icon">📩</span>
                            @endif
                            {{ $item['quantity'] }} {{ $item['unit'] }}
                        </div>
                    </td>

                    <td class="text-right">
                        <div class="value" style="color: #6b7280;">
                            {{ number_format($item['subtotal'], 2) }} PLN
                        </div>
                    </td>

                    <td class="text-center">
                        <span class="badge badge-gray">
                            <div class="value">
                                {{ $item['vat_rate'] }} %
                            </div>
                        </span>
                    </td>

                    <td class="text-right">
                        <div class="value" style="color: #6b7280;">
                            {{ number_format($item['vat_amount'], 2) }} PLN
                        </div>
                    </td>

                    <td class="text-right">
                        <div class="value">
                            <strong>{{ number_format($item['total'], 2) }} PLN</strong>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%; padding-right: 4px;">
                <div class="section">
                    <div class="value">
                    </div>
                </div>
            </td>

            <td style="width: 50%; padding-left: 4px;">
                <div class="section">
                    <div class="value">
                        <h2 style=" margin: 0px;">Podsumowanie</h2>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table class="seller-buyer-table">
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;">
                <div class="card">
                    <div class="section text-right">
                        <div class="label">Razem netto</div>
                        <div class="value">{{ $offer['subtotal'] }} PLN</div>
                    </div>
                    <div class="section text-right">
                        <div class="label">VAT</div>
                        <div class="value">{{ $offer['vat'] }} PLN</div>
                    </div>
                    <div class="section text-right">
                        <div class="label">Razem brutto</div>
                        <div class="value">{{ $offer['total'] }} PLN</div>
                    </div>
                    <div class="section text-right">
                        <div class="label">Słownie</div>
                        <div class="value">{{ $offer['total_in_words'] }}</div>
                    </div>
                </div>
            </td>
        </tr>
    </table>

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