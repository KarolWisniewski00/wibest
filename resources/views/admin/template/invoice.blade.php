<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WIBEST – Wizytówka</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /*
      FORMAT:
      - netto: 90x50 mm
      - brutto ze spadami: 96x56 mm
      - spady: 3 mm z każdej strony
      - bezpieczny margines: 5 mm
      - kolorystyka przygotowana pod CMYK
    */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            background: #d1d5db;
            font-family: "Lato", sans-serif;
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            justify-content: center;
        }

        .sheet {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .card {
            position: relative;
            width: 96mm;
            height: 56mm;
            overflow: hidden;
            background: white;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        /* linia pomocnicza netto 90x50 */
        .trim-line {
            position: absolute;
            top: 3mm;
            left: 3mm;
            width: 90mm;
            height: 50mm;
            pointer-events: none;
        }

        /* bezpieczny obszar 5mm od cięcia */
        .safe-zone {
            position: absolute;
            top: 8mm;
            left: 8mm;
            width: 80mm;
            height: 40mm;
            pointer-events: none;
        }

        /* FRONT */
        .front {
            background-color: rgb(249 250 251);
        }

        .front-content {
            position: absolute;
            inset: 8mm;
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            z-index: 2;
        }

        .brand-side {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 42%;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-mark {
            width: 16mm;
            height: 16mm;
            border-radius: 4mm;
            background: linear-gradient(135deg, #bbf7d0, #4ade80);
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22pt;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .brand-name {
            font-size: 20pt;
            font-weight: 700;
            color: rgb(134 239 172);
            letter-spacing: 1px;
            line-height: 1;
        }

        .subtitle {
            margin-top: 6px;
            color: rgb(75 85 99);
            font-size: 7pt;
            line-height: 1.7;
            letter-spacing: 0.2px;
        }

        .services {
            font-size: 7pt;
            color: rgb(75 85 99);
            line-height: 1.7;
            border-left: 2px solid rgba(134, 239, 172, 0.25);
            padding-left: 10px;
            letter-spacing: 0.2px;
        }

        .contact-side {
            width: 48%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: right;
        }

        .person {
            font-size: 11pt;
            color: rgb(17 24 39);
            letter-spacing: 0.2px;
        }

        .company {
            font-size: 8pt;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: rgb(134 239 172);
            margin-bottom: 6mm;
            font-weight: 600;
        }

        .contact-item {
            font-size: 8pt;
            color: rgb(17 24 39);
            letter-spacing: 0.2px;
            margin-top: 1.2mm;
        }

        .details {
            margin-top: 6mm;
            font-size: 7pt;
            color: rgb(75 85 99);
            line-height: 1.7;
            letter-spacing: 0.2px;
        }

        /* BACK */
        .back {
            background: #1f2937;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .back::before {
            content: '';
            position: absolute;
            width: 140%;
            height: 140%;
            background:
                radial-gradient(circle at center, rgba(74, 222, 128, 0.12), transparent 50%);
            transform: rotate(-8deg);
        }

        .back-logo {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .back-logo .mark {
            font-size: 54pt;
            font-weight: 700;
            color: rgba(187, 247, 208, 0.08);
            line-height: 1;
            margin-bottom: -12px;
        }

        .back-logo .name {
            font-size: 28pt;
            font-weight: 700;
            letter-spacing: 3px;
            color: #bbf7d0;
        }

        .back-logo .site {
            margin-top: 6px;
            color: #9ca3af;
            font-size: 8pt;
            letter-spacing: 2px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .sheet {
                gap: 0;
            }

            .card {
                box-shadow: none;
                page-break-inside: avoid;
            }
        }

        @page {
            size: 96mm 56mm;
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="sheet">

        <!-- FRONT -->
        <div class="card front">
            <div class="trim-line"></div>
            <div class="safe-zone"></div>

            <div class="front-content">

                <div class="brand-side">
                    <div>
                        <div class="logo-box">
                            <div>
                                <div class="brand-name" style="font-family: 'Raleway', sans-serif;">WIBEST</div>
                                <div class="subtitle">
                                    RCP | e-wnioski | raporty
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="services">
                        Nowoczesne rozwiązania<br>
                        dla firm
                    </div>
                </div>

                <div class="contact-side">
                    <div>
                        <div class="person">Karol Wiśniewski</div>
                        <div class="company" style="font-family: 'Raleway', sans-serif;">WIBEST</div>

                        <div class="contact-item">biuro@wibest.pl</div>
                        <div class="contact-item">662 294 073</div>
                        <div class="contact-item">wibest.pl</div>

                        <div class="details">
                            NIP: 8992998536<br>
                            REGON: 52915565800000
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- BACK -->
        <div class="card back">
            <div class="trim-line"></div>
            <div class="safe-zone"></div>

            <div class="back-logo">
                <div class="mark" style="font-family: 'Raleway', sans-serif;">W</div>
                <div class="name" style="font-family: 'Raleway', sans-serif;">WIBEST</div>
                <div class="site" style="font-family: 'Raleway', sans-serif;">wibest.pl</div>
            </div>
        </div>

    </div>

</body>

</html>