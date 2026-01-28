<!doctype html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="max-image-preview:large" />
    <meta name="twitter:card" content="summary" />
    <meta property="og:locale" content="pl_PL" />
    <meta name="author" content="Karol Wiśniewski">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <meta property="og:site_name" content="WIBEST RCP – Mierz czas pracy dokładnie" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://wibest.pl" />
    <title>WIBEST RCP – Mierz czas pracy dokładnie</title>
    <meta property="og:title" content="WIBEST RCP – Mierz czas pracy dokładnie" />
    <meta name="twitter:title" content="WIBEST RCP – Mierz czas pracy dokładnie" />
    <meta name="description" content="Aplikacja do mierzenia czasu pracy WIBEST.">
    <meta property="og:description" content="Aplikacja do mierzenia czasu pracy WIBEST." />
    <meta name="twitter:description" content="Aplikacja do mierzenia czasu pracy WIBEST." />
    <meta name="description" content="Aplikacja do mierzenia czasu pracy WIBEST.">
    <meta name="keywords" content="aplikacja do mierzenia czasu, Aplikacja do mierzenia czasu na komputerze, rcp online, rcp online aplikacja">
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Raleway:wght@500;700;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500">

    <!-- HEADER -->
    <header class="flex justify-center items-center p-4 shadow bg-gray-100 dark:bg-gray-800">
        <div class="max-w-[85rem] flex justify-between items-center w-full">
            <div class="flex items-center space-x-2">
                <a href="#" class="text-2xl font-bold text-green-300" style="font-family: 'Raleway', sans-serif;">WIBEST</a>
            </div>
            <nav class="flex items-center gap-4">
                <a href="{{route('login')}}" id="theme-toggle"
                    class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    Logowanie
                </a>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section class="text-center py-24 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-3xl md:text-6xl font-extrabold mb-4" style="font-family: 'Raleway', sans-serif;">
                Mierz czas pracy dokładnie
                — bez chaosu i ręcznego wpisywania godzin
            </h1>
            <p class="text-lg md:text-2xl text-gray-600 dark:text-gray-300 mb-8">
                Aplikacja webowa dla małych firm, które chcą prosto rozliczać godziny, nadgodziny i urlopy — w jednym miejscu.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="tel:451670344"
                    class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Zadzwoń i załóż firmę
                </a>
                <a href="#features"
                    class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Dowiedz się więcej
                </a>
            </div>
            <!-- miejsce na obrazek -->
            <div class="mt-12 flex justify-center">
                <div class="overflow-hidden w-full md:w-2/3 h-auto bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                    <img class="img-fluid" alt="" src="{{asset('img.png')}}">
                </div>
            </div>
        </div>
    </section>

    <!-- PROBLEM / DLACZEGO -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-12">Koniec z ręcznym wpisywaniem godzin</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div><i class="fa-solid fa-file-excel text-green-400 text-5xl mb-4"></i>
                    <p>Bez ręcznego prowadzenia list obecności.</p>
                </div>
                <div><i class="fa-solid fa-location-dot text-green-400 text-5xl mb-4"></i>
                    <p>Pomiar czasu pracy z dokładną lokalizacją logowania.</p>
                </div>
                <div><i class="fa-solid fa-calendar-check text-green-400 text-5xl mb-4"></i>
                    <p>Wnioski urlopowe i historia pracy w jednym miejscu.</p>
                </div>
                <div><i class="fa-solid fa-chart-column text-green-400 text-5xl mb-4"></i>
                    <p>Automatyczne raporty PDF i XML — gotowe do księgowości.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- JAK TO DZIAŁA -->
    <section id="features" class="py-24 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-8">
            <h2 class="text-5xl font-bold text-center mb-16">Jak zacząć?</h2>

            <div class="grid md:grid-cols-4 gap-8 text-center">

                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">📞</div>
                    <h3 class="text-2xl font-bold mb-4">1. Zadzwoń lub załóż konto</h3>
                    <p>Zakładamy Ci firmę – wystarczy telefon lub rejestracja online.</p>
                </div>

                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">👥</div>
                    <h3 class="text-2xl font-bold mb-4">2. Dodaj pracowników</h3>
                    <p>Wprowadź pracowników i ustaw stałe godziny pracy.</p>
                </div>

                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">⏱️</div>
                    <h3 class="text-2xl font-bold mb-4">3. Mierz czas pracy</h3>
                    <p>Rejestracja wejść i wyjść – dokładna, z lokalizacją.</p>
                </div>

                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">📊</div>
                    <h3 class="text-2xl font-bold mb-4">4. Pobierz raport</h3>
                    <p>Automatyczne raporty PDF/XML z godzinami, nadgodzinami i brakami norm.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- KORZYŚCI -->
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-12">Dlaczego warto?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div><i class="fa-solid fa-stopwatch text-green-400 text-6xl mb-4"></i>
                    <p>Dokładny pomiar czasu pracy – bez pomyłek i zgadywania.</p>
                </div>
                <div><i class="fa-solid fa-cloud text-green-400 text-6xl mb-4"></i>
                    <p>Wszystko w chmurze – żadnych instalacji, dostęp z dowolnego miejsca.</p>
                </div>
                <div><i class="fa-solid fa-hand-holding-dollar text-green-400 text-6xl mb-4"></i>
                    <p>Tania subskrypcja – minimum 43 zł lub 10 zł za użytkownika.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CENNIK -->
    <section class="py-24 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-12">Prosty i uczciwy cennik</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                    <h3 class="text-2xl font-bold mb-2">Mała firma</h3>
                    <p class="text-5xl font-extrabold mb-4 text-green-400">43 zł</p>
                    <p>miesięcznie (do 5 osób)</p>
                </div>
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                    <h3 class="text-2xl font-bold mb-2">Więcej pracowników</h3>
                    <p class="text-5xl font-extrabold mb-4 text-green-400">10 zł</p>
                    <p>za osobę miesięcznie</p>
                </div>
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                    <h3 class="text-2xl font-bold mb-2">Okres próbny</h3>
                    <p class="text-5xl font-extrabold mb-4 text-green-400">0 zł</p>
                    <p>pełny dostęp przez 30 dni</p>
                </div>
            </div>
            <div class="mt-12">
                <a href="tel:451670344"
                    class="break-normal justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Zadzwoń i aktywuj
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12">Najczęściej zadawane pytania</h2>
            <details class="group bg-gray-50 dark:bg-gray-700 rounded-lg shadow p-4 mb-4">
                <summary class="flex justify-between cursor-pointer text-xl font-semibold">
                    Czy aplikacja działa na telefonie?
                    <i class="fa-solid fa-chevron-down text-green-400 group-open:rotate-180 transition"></i>
                </summary>
                <p class="mt-4">Tak, przez przeglądarkę. Aplikacja mobilna już w przygotowaniu.</p>
            </details>
            <details class="group bg-gray-50 dark:bg-gray-700 rounded-lg shadow p-4 mb-4">
                <summary class="flex justify-between cursor-pointer text-xl font-semibold">
                    Czy dane są bezpieczne?
                    <i class="fa-solid fa-chevron-down text-green-400 group-open:rotate-180 transition"></i>
                </summary>
                <p class="mt-4">Tak. Dane przechowywane są w zabezpieczonej chmurze (SSL, kopie zapasowe).</p>
            </details>
        </div>
    </section>

    <!-- KONTAKT -->
    <section class="max-w-[85rem] w-full mx-auto px-4 py-4 grid grid-cols-1 md:grid-cols-2">
        <div class="w-full h-full flex flex-col text-lg justify-center items-center lg:text-xl my-4">
            <div class="my-4 flex flex-col min-w-[20rem] w-full md:w-fit gap-4">
                <a href="mailto:karol.wisniewski2901@gmail.com" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-200 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-envelope mr-2"></i>Napisz do mnie
                </a>
                <div class="py-4 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-4 after:flex-1 after:border-t after:border-gray-200 after:ms-4 ">LUB</div>
                <a href="tel:451670344" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Zadzwoń do mnie
                </a>
            </div>
        </div>
        <div class="w-full h-full flex flex-col text-lg justify-center items-center lg:text-xl my-4">
            <div class="my-4 flex flex-col min-w-[20rem] w-full md:w-fit gap-4 items-center md:items-start text-center md:text-start">
                <h2 class="text-3xl" style='font-family: "Raleway", sans-serif;'>Karol Wiśniewski WIBEST</h2>
                <p class="text-lg text-gray-500 mb-12">NIP:8992998536</p>
                <div class="flex flex-row text-5xl">
                    <i class="fa-solid fa-location-dot mr-5"></i>
                    <adress class="text-lg">Sielecka 63,<br> <span class="text-gray-500">42-500, </span>Będzin</adress>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-8 text-gray-500 text-sm dark:text-gray-400">
        &copy; 2025 WIBEST. Wszelkie prawa zastrzeżone.
    </footer>

    <script>
        const toggle = document.getElementById('theme-toggle');
        toggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>

</html>