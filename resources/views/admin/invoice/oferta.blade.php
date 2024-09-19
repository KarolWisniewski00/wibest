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
        <h2><span>Oferta handlowa numer:</span> 6/2024</h2>
        <p><span>Data wystawienia:</span> 16.09.2024</p>
    </div>
    <div class="divider"></div>

    <table class="seller-buyer-table">
        <tr>
            <td class="seller">
                <h2>Sprzedawca</h2>
                <p><span>Nazwa:</span> Karol Wiśniewski WIBEST</p>
                <p><span>Adres:</span> Partynicka 5, 53-031 Wrocław</p>
                <p><span>NIP:</span> 8992998536</p>
            </td>
            <td class="buyer">

            </td>
        </tr>
    </table>

    <h2>Pozycje</h2>
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
                <td><span style="font-weight: bold;">Strona WWW Zaawansowana</span><br><br>To co widzi klient<br><br>-Do 15 podstron<br>-Serwer 1 rok<br>-Domena 1 rok<br>-Certyfikat bezpieczeństwa<br>-Antycast<br>-Zgłoszenie do google<br>-Do 3 formularzy kontaktowy<br>-Animacja pokazywania<br>-Tryb Jasno/Ciemno automatycznie względem pory dnia<br>-Konfiguracja do 5 skrzynek mailowych<br>-Blog + 2 wpisy<br>-Newsletter<br>-Technologia Laravel</td>
                <td>1</td>
                <td>4500 PLN</td>
                <td>4500 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>4500 PLN</td>
            </tr>
            <tr>
                <td>2.</td>
                <td><span style="font-weight: bold;">Moduł Logowanie</span></td>
                <td>1</td>
                <td>150 PLN</td>
                <td>150 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>150 PLN</td>
            </tr>
            <tr>
                <td>4.</td>
                <td><span style="font-weight: bold;">Moduł "Klienci"</span><br>-Imię i nazwisko<br>-Numer telefonu<br>-Email</td>
                <td>1</td>
                <td>400 PLN</td>
                <td>400 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>400 PLN</td>
            </tr>
            <tr>
                <td>5.</td>
                <td><span style="font-weight: bold;">Moduł "Rezerwacje"</span><br>-Dane Klienta z modułu "Klienci"<br>-Data + godzina przyjazdu<br>-Data + godzina wyjazdu<br>-Liczba samochodów<br>-Liczba osób<br>-Rabat<br>-Kod rabatowy<br>-Status<br>-Metoda płatności<br>-Opcje dodatkowe np.Pokrowiec lub sprzątanie<br>-Automatyczne wyliczanie opłaty za parking</td>
                <td>1</td>
                <td>1500 PLN</td>
                <td>1500 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>1500 PLN</td>
            </tr>
            <tr>
                <td>6.</td>
                <td><span style="font-weight: bold;">Moduł "Obłożenie parkingu"</span><br>-W oparciu o kalendarz odczyt<br>-Zliczanie wolnych miejsc<br>-Zliczanie wyjazdów/przyjazdów</td>
                <td>1</td>
                <td>500 PLN</td>
                <td>500 PLN</td>
                <td>zw</td>
                <td>zw</td>
                <td>500 PLN</td>
            </tr>
        </tbody>
    </table>

    <div class="summary">
        <h2>Podsumowanie</h2>
        <p>Razem netto: 2000 PLN</p>
        <p>VAT: zw</p>
        <p>Razem brutto: 2000 PLN</p>
    </div>

</body>

</html>