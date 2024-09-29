<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Oferta</title>
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
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /* Styl dla tabeli sprzedawcy i nabywcy */
        .seller-buyer-table {
            width: 100%;
            /*margin-top: 10px;*/
            /* Dodanie marginesu górnego */
            border-collapse: collapse;
            border: none;
        }

        .seller-buyer-table td {
            padding: 8px;
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
            margin-top: 10px;
            /* Dodanie marginesu górnego */
        }

        .summary p {
            margin: 5px 0;
            /* Dodanie marginesu górnego i dolnego */
        }

        /* Styl dla uwag */
        .notes-section {
            /*margin-top: 10px;*/
            /* Dodanie marginesu górnego */
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <h2><span>Oferta handlowa numer:</span> 7/2024</h2>
        <p><span>Data wystawienia:</span> 23.09.2024</p>
    </div>
    <div class="divider"></div>

    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <h2>Sprzedawca</h2>
                <p><span>Nazwa:</span> Karol Wiśniewski WIBEST</p>
                <p><span>Adres:</span> Partynicka 5, 53-031 Wrocław</p>
                <p><span>NIP:</span> 8992998536</p>
                <p><span>Numer konta:</span> 04105016211000009224054487</p>
                <p>wibest.pl</p>
            </td>
            <td class="buyer">
                <h2>Nabywca</h2>
                <p><span>Nazwa:</span> Reklama KK Klaudia Kaleja</p>
                <p><span>Adres:</span> ul. Juliana Fałata 30a/13, 41-902 Bytom</p>
                <p><span>NIP:</span> 6263057147</p>
                <p>Oferta przygotowana dla Klaudia Kaleja, biuro.reklama.kk@gmail.com</p>
            </td>
        </tr>
    </table>

    <h2>Pozycje</h2>
    <!--
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Sklep WWW podstawowy</th>
                <th>Sklep WWW średniozaawansowany</th>
                <th>Sklep WWW zaawansowany</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Liczba produktów</td>
                <td>50</td>
                <td>75</td>
                <td>100 + zdjęcia</td>
            </tr>
            <tr>
                <td>Serwer</td>
                <td>1 rok</td>
                <td>1 rok</td>
                <td>2 lata</td>
            </tr>
            <tr>
                <td>Domena</td>
                <td>w cenie</td>
                <td>w cenie</td>
                <td>w cenie</td>
            </tr>
            <tr>
                <td>Blog</td>
                <td>1 wpis</td>
                <td>2 wpis</td>
                <td>3 wpis</td>
            </tr>
            <tr>
                <td>Zgłoszenie do google</td>
                <td>w cenie</td>
                <td>w cenie</td>
                <td>w cenie</td>
            </tr>
            <tr>
                <td>Formularz kontaktowy</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Propozycje wyglądu</td>
                <td>1</td>
                <td>2</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Certyfikat bezpieczeństwa</td>
                <td>w cenie</td>
                <td>w cenie</td>
                <td>w cenie</td>
            </tr>
            <tr>
                <td>Technologia</td>
                <td>WooCommerce (WordPress)</td>
                <td>WooCommerce (WordPress)</td>
                <td>Laravel (Sklep kodowany)</td>
            </tr>
            <tr>
                <td>Konfiguracja skrzynek mailowych</td>
                <td>w cenie</td>
                <td>w cenie</td>
                <td>w cenie</td>
            </tr>
            <tr>
                <td>Integracja</td>
                <td>z płatnością online</td>
                <td>z płatnością online + usługą kurierską</td>
                <td>z płatnością online + usługą kurierską</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    -->
    <table>
        <thead>
            <tr>
                <th>Lp.</th>
                <th>Nazwa usługi</th>
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
                <td><span style="font-weight: bold;">Sklep WWW Podstawowy</span>
                </td>
                <td>1</td>
                <td>4500 PLN</td>
                <td>4500 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>4500 PLN</td>
            </tr>
        </tbody>
    </table>

    <div class="summary">
        <h2>Podsumowanie</h2>
        <p>Razem netto: 4500 PLN</p>
        <p>VAT: zw</p>
        <p>Razem brutto: 4500 PLN</p>
    </div>
</body>

</html>