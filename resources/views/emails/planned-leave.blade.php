<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urlop planownay</title>
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
            <h1>Urlop planownay</h1>
        </div>

        <div class="invoice-details" style="text-align: center;">
            <h2>{{ $leave->manager->name }}, pojawił się nowy urlop planownay</h2>
            <p style="font-weight: bold;">{{ $leave->user->name }}, {{ $leave->start_date }} {{ $leave->end_date }}</p>
        </div>

        <div class="header">
            <a href="{{route('login')}}"
                style="text-align: center; display: inline-flex; align-items: center; padding: 0.5rem 1rem; background-color: #000; color: #fff; border: none; border-radius: 0.375rem; font-weight: bold; text-transform: uppercase; text-decoration: none; transition: background-color 0.15s ease-in-out;"
                onmouseover="this.style.backgroundColor='#333'"
                onmouseout="this.style.backgroundColor='#000'"
                onfocus="this.style.backgroundColor='#333'"
                onblur="this.style.backgroundColor='#000'">
                Przejdź do WIBEST
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