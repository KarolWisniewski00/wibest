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
    <!--ICON-->
    <link rel="icon" href="{{ asset('wibest_icon_transparent_bg.png') }}" type="image/png">
    <meta property="og:image" content="{{ asset('wibest_icon_transparent_bg.png') }}" />

</head>

<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500">

    <!-- HEADER -->
    <header class="flex justify-center items-center p-4 shadow bg-gray-100 dark:bg-gray-800">
        <div class="max-w-[85rem] flex justify-between items-center w-full">
            <div class="flex items-center space-x-2">
                <a href="#" class="text-2xl text-green-300" style="font-family: 'Raleway', sans-serif;">WIBEST</a>
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
    <section class="text-center py-24 bg-gray-100 dark:bg-gray-800">
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
                    class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-700 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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
            <h2 class="text-3xl font-bold mb-12">
                Koniec z ręcznym wpisywaniem godzin pracy
            </h2>

            <div class="grid md:grid-cols-5 gap-8">

                <div>
                    <i class="fa-solid fa-file-excel text-green-300 text-5xl mb-4"></i>
                    <p>Bez ręcznego prowadzenia list obecności i arkuszy Excel.</p>
                </div>

                <div>
                    <i class="fa-solid fa-location-dot text-green-300 text-5xl mb-4"></i>
                    <p>Rejestracja czasu pracy z dokładną lokalizacją GPS pracownika.</p>
                </div>

                <div>
                    <i class="fa-solid fa-calendar-check text-green-300 text-5xl mb-4"></i>
                    <p>Wnioski urlopowe i historia pracy dostępne online w jednym systemie.</p>
                </div>

                <div>
                    <i class="fa-solid fa-chart-column text-green-300 text-5xl mb-4"></i>
                    <p>Automatyczne raporty czasu pracy (PDF, XML) gotowe dla kadr.</p>
                </div>

                <div>
                    <i class="fa-solid fa-sms text-green-300 text-5xl mb-4"></i>
                    <p>
                        Automatyczne powiadomienia SMS o rozpoczęciu nadgodzin oraz przy składaniu wniosków.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- JAK TO DZIAŁA -->
    <section id="features" class="py-24 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-8">
            <h2 class="text-3xl font-bold text-center mb-16">
                Jak zacząć rejestrację czasu pracy?
            </h2>

            <div class="grid md:grid-cols-5 gap-8 text-center">

                <!-- 1 -->
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">📝</div>
                    <h3 class="text-xl font-bold mb-4">1. Załóż konto</h3>
                    <p>Zarejestruj firmę w systemie online i rozpocznij konfigurację.</p>
                </div>

                <!-- 2 -->
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">📄</div>
                    <h3 class="text-xl font-bold mb-4">2. Umowa i regulamin</h3>
                    <p>Skontaktuj się z nami, podpisz umowę i zaakceptuj regulamin korzystania z systemu.</p>
                </div>

                <!-- 3 -->
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">👥</div>
                    <h3 class="text-xl font-bold mb-4">3. Dodaj pracowników</h3>
                    <p>Dodaj zespół i ustaw harmonogramy pracy oraz zasady rozliczania czasu pracy.</p>
                </div>

                <!-- 4 -->
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">⏱️</div>
                    <h3 class="text-xl font-bold mb-4">4. Mierz czas pracy</h3>
                    <p>Pracownicy rejestrują czas pracy – dane trafiają do systemu w czasie rzeczywistym.</p>
                </div>

                <!-- 5 -->
                <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow hover:scale-105 transition-transform">
                    <div class="text-green-500 text-6xl mb-4">📊</div>
                    <h3 class="text-xl font-bold mb-4">5. Pobierz raport</h3>
                    <p>Generuj raporty czasu pracy (PDF, XML) z nadgodzinami i gotowe do rozliczeń.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- KORZYŚCI -->
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12">
                Dlaczego warto wdrożyć system rejestracji czasu pracy?
            </h2>

            <div class="grid md:grid-cols-4 gap-8">

                <div>
                    <i class="fa-solid fa-stopwatch text-green-300 text-6xl mb-4"></i>
                    <p>
                        Dokładny pomiar czasu pracy – koniec z pomyłkami, zgadywaniem i ręcznym liczeniem godzin.
                    </p>
                </div>

                <div>
                    <i class="fa-solid fa-location-dot text-green-300 text-6xl mb-4"></i>
                    <p>
                        Kontrola lokalizacji pracowników – wiesz, gdzie rozpoczęto i zakończono pracę.
                    </p>
                </div>

                <div>
                    <i class="fa-solid fa-bolt text-green-300 text-6xl mb-4"></i>
                    <p>
                        Natychmiastowa informacja o nadgodzinach i aktywności pracowników (również przez SMS).
                    </p>
                </div>

                <div>
                    <i class="fa-solid fa-cloud text-green-300 text-6xl mb-4"></i>
                    <p>
                        System w chmurze – dostęp z każdego miejsca, bez instalacji i utrzymania infrastruktury.
                    </p>
                </div>

                <div>
                    <i class="fa-solid fa-file-lines text-green-300 text-6xl mb-4"></i>
                    <p>
                        Automatyczne raporty czasu pracy – gotowe dla kadr i kontroli.
                    </p>
                </div>

                <div>
                    <i class="fa-solid fa-user-check text-green-300 text-6xl mb-4"></i>
                    <p>
                        Pełna historia pracy pracownika – urlopy, L4, nadgodziny w jednym miejscu.
                    </p>
                </div>

                <div>
                    <i class="fa-solid fa-shield-halved text-green-300 text-6xl mb-4"></i>
                    <p>
                        Większa kontrola i bezpieczeństwo danych – wszystko zapisane i dostępne w systemie.
                    </p>
                </div>

                <div>
                    <i class="fa-solid fa-comments text-green-300 text-6xl mb-4"></i>
                    <p>
                        Szybka komunikacja z pracownikami dzięki powiadomieniom (SMS i systemowym).
                    </p>
                </div>

            </div>

            <!-- CTA zamiast ceny -->
            <div class="mt-16">
                <p class="text-lg mb-6">
                    Chcesz poznać szczegóły wdrożenia i dopasować system do swojej firmy?
                </p>

                <a href="tel:451670344" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Skontaktuj się
                </a>
            </div>
        </div>
    </section>

    <!-- OFERTA -->
    <section class="py-24 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-6">
                Dopasowana oferta dla Twojej firmy
            </h2>

            <p class="text-lg mb-12 max-w-2xl mx-auto">
                Każda firma działa inaczej – dlatego przygotowujemy indywidualną ofertę
                dopasowaną do liczby pracowników, sposobu pracy i potrzeb Twojego zespołu.
            </p>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                    <i class="fa-solid fa-users text-green-300 text-5xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">Idealne dla małych firm</h3>
                    <p>System dopasowany do firm zatrudniających od kilku do około 100 pracowników – prosty we wdrożeniu i codziennym użyciu.</p>
                </div>

                <div class="p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                    <i class="fa-solid fa-gears text-green-300 text-5xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">Indywidualna konfiguracja</h3>
                    <p>Ustawienia czasu pracy, nadgodzin i raportów dopasowane do Twojej branży.</p>
                </div>

                <div class="p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                    <i class="fa-solid fa-headset text-green-300 text-5xl mb-4"></i>
                    <h3 class="text-xl font-bold mb-2">Wsparcie i wdrożenie</h3>
                    <p>Pomagamy uruchomić system i wdrożyć go w Twojej firmie krok po kroku.</p>
                </div>

            </div>

            <!-- CTA -->
            <div class="mt-16">
                <p class="text-lg mb-6">
                    Skontaktuj się z nami i otrzymaj ofertę dopasowaną do Twojej firmy
                </p>

                <a href="tel:451670344" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Zadzwoń
                </a>
            </div>

        </div>
    </section>
    <!-- DLA KOGO -->
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold mb-6">
                Dla kogo jest ten system?
            </h2>

            <p class="text-lg max-w-3xl mx-auto mb-16 text-gray-600 dark:text-gray-300">
                System został stworzony dla małych i średnich firm, które chcą w końcu mieć
                pełną kontrolę nad czasem pracy pracowników – bez Excela i ręcznych rozliczeń.
            </p>

            <div class="grid md:grid-cols-3 gap-8 text-left">

                <!-- 1 -->
                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold mb-3">🏗️ Firmy budowlane</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Kontrola pracowników w terenie, GPS, nadgodziny i szybkie raporty z pracy na budowie.
                    </p>
                </div>

                <!-- 2 -->
                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold mb-3">🔧 Firmy usługowe</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Serwis, montaże, wyjazdy do klientów – dokładne rozliczanie czasu pracy bez pomyłek.
                    </p>
                </div>

                <!-- 3 -->
                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold mb-3">🏭 Produkcja</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Ewidencja zmianowa, nadgodziny i pełna historia pracy pracowników produkcyjnych.
                    </p>
                </div>

                <!-- 4 -->
                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold mb-3">🚚 Logistyka i transport</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Kontrola czasu pracy kierowców i pracowników mobilnych z dokładną lokalizacją.
                    </p>
                </div>

                <!-- 5 -->
                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold mb-3">👷 Małe firmy (do 100 osób)</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Idealne dla małych zespołów – proste wdrożenie, brak skomplikowanych systemów korporacyjnych.
                    </p>
                </div>

                <!-- 6 -->
                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h3 class="text-xl font-bold mb-3">💼 Biura i firmy usługowe</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Rejestracja pracy biurowej, wniosków urlopowych i przejrzyste raporty czasu pracy.
                    </p>
                </div>

            </div>

            <!-- CTA -->
            <div class="mt-16">
                <p class="text-lg mb-6 text-gray-700 dark:text-gray-300">
                    Sprawdź, czy system pasuje do Twojej firmy
                </p>

                <a href="tel:451670344" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Skontaktuj się
                </a>
            </div>

        </div>
    </section>
    <!-- JAK DZIAŁA W PRAKTYCE -->
    <section class="py-24 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-6">
                Jak wygląda dzień pracy z systemem?
            </h2>

            <p class="text-center text-lg mb-16 max-w-3xl mx-auto">
                Prosty system, który nie wymaga szkolenia – pracownik potrzebuje kilku sekund,
                a firma ma pełną kontrolę nad czasem pracy.
            </p>

            <div class="grid md:grid-cols-3 gap-10">

                <!-- PRACOWNIK -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
                    <h3 class="text-2xl font-bold mb-6 text-green-300">👷 Pracownik</h3>

                    <ul class="space-y-4 text-left">
                        <li>⏱️ Rozpoczyna i kończy pracę jednym kliknięciem (START / STOP)</li>
                        <li>📍 System zapisuje lokalizację pracy</li>
                        <li>📝 Może dodać zadania (np. w nadgodzinach)</li>
                        <li>📅 Składa wnioski (urlop, L4) w kilka sekund</li>
                        <li>📊 Ma dostęp do historii pracy i podsumowania dnia</li>
                    </ul>
                </div>

                <!-- FIRMA / KADRY -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
                    <h3 class="text-2xl font-bold mb-6 text-green-300">🏢 Firma / Kadry</h3>

                    <ul class="space-y-4 text-left">
                        <li>🌐 Wszystkie dane w jednym miejscu – dostęp online</li>
                        <li>⚡ Szybki podgląd czasu pracy pracowników</li>
                        <li>📈 Automatyczne zliczanie godzin i nadgodzin</li>
                        <li>📄 Wnioski pracowników w jednym systemie</li>
                        <li>📊 Gotowe raporty bez ręcznego liczenia</li>
                    </ul>
                </div>

                <!-- SYSTEM -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow">
                    <h3 class="text-2xl font-bold mb-6 text-green-300">⚙️ System</h3>

                    <ul class="space-y-4 text-left">
                        <li>📱 Działa na telefonie i komputerze</li>
                        <li>💬 Powiadomienia SMS (np. nadgodziny, wnioski)</li>
                        <li>⚡ Wdrożenie w kilka minut</li>
                        <li>🔄 Automatyczne raporty (PDF, XML)</li>
                        <li>☁️ Bez instalacji – wszystko w chmurze</li>
                    </ul>
                </div>

            </div>

            <!-- CTA -->
            <div class="text-center mt-16">
                <p class="text-lg mb-6">
                    Zobacz, jak to działa w Twojej firmie
                </p>

                <a href="tel:451670344" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Skontaktuj się
                </a>
            </div>

        </div>
    </section>
    <!-- RODZAJE WPISÓW - UI 1:1 -->
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-12">
                Typy wpisów w systemie
            </h2>

            <div class="grid md:grid-cols-4 gap-6">

                <!-- 1 PRACA NORM -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300 dark:bg-green-400">
                        <div class="text-2xl">⏱️</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Praca zgodna z normą
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Standardowy wpis czasu pracy zgodny z zaplanowanym grafikiem. Brak nadgodzin i odchyleń od normy dobowej.
                    </p>
                </div>


                <!-- 2 NADGODZINY -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-indigo-300 dark:bg-indigo-400">
                        <div class="text-2xl">⏱️</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            07:30 – 16:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        System automatycznie wykrywa przekroczenie normy czasu pracy i oznacza nadgodziny w raporcie dziennym.
                    </p>
                </div>
                <!-- 3 NADGODZINY + ZADANIE -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-emerald-300 dark:bg-emerald-400">
                        <div class="text-2xl">🎯</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            07:30 – 16:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny + zadanie
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Nadgodziny przypisane do konkretnego zadania lub projektu wraz z widocznością treści wykonanej pracy.
                    </p>
                </div>

                <!-- 4 BRAK NORMY -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300/60 dark:bg-green-400/60">
                        <div class="text-2xl">⏱️</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:30 – 15:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            07:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Brak normy
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Niewystarczający czas pracy względem zaplanowanej normy lub niepełny dzień pracy.
                    </p>
                </div>

                <!-- 1 PRACA NORM -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-400 dark:bg-green-500">
                        <div class="text-2xl">🌙</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            20:00 – 04:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Praca zgodna z normą
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Praca przechodząca przez północ. Obsługuje nadgodziny, normy, zadania oraz statusy pracy w czasie rzeczywistym.
                    </p>
                </div>


                <!-- 2 NADGODZINY -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-indigo-400 dark:bg-indigo-500">
                        <div class="text-2xl">🌙</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            19:30 – 04:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Nadgodziny naliczane w trybie nocnym zgodnie z harmonogramem i przekroczeniem normy dobowej.
                    </p>
                </div>
                <!-- 3 NADGODZINY + ZADANIE -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-emerald-400 dark:bg-emerald-500">
                        <div class="text-2xl">🎯</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            19:30 – 04:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            09:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Nadgodziny + zadanie
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Praca nocna przypisana do konkretnego zadania lub projektu z pełną historią realizacji.
                    </p>
                </div>

                <!-- 4 BRAK NORMY -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-400/60 dark:bg-green-500/60">
                        <div class="text-2xl">🌙</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            20:30 – 03:30
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            07:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Brak normy
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Skrócony czas pracy w trybie nocnym, który nie spełnia wymaganej normy dobowej.
                    </p>
                </div>

                <!-- 6 WIELOKROTNY ODCZYT -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-yellow-300 dark:bg-yellow-400">
                        <div class="text-2xl">⏱️</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Wielokrotny odczyt
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Wielokrotne wejścia i wyjścia w ciągu dnia pracy (np. przerwy, wyjścia służbowe, urzędy). System agreguje wszystkie odczyty w jeden dzień pracy.
                    </p>
                </div>

                <!-- 1 PRACA NORM -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center w-full
                        bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-2
                        transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">
                        <div class="text-2xl">🏢</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            STA
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Planing stały
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Stały harmonogram pracy powtarzany cyklicznie (np. poniedziałek–piątek w tych samych godzinach).
                    </p>
                </div>


                <!-- 2 NADGODZINY -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400 transition-colors duration-200">
                        <div class="text-2xl">🌀</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            ZMI
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            08:00 – 16:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            PLaning zmienny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Elastyczny grafik dzienny z możliwością zmian godzin pracy w zależności od dnia.
                    </p>
                </div>
                <!-- 3 NADGODZINY + ZADANIE -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400 transition-colors duration-200">
                        <div class="text-2xl">🌙</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            ZMI
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            20:00 – 04:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            08:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            PLaning zmienny
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Elastyczny grafik nocny obejmujący zmiany przechodzące przez północ.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-yellow-300 dark:bg-yellow-400">
                        <div class="text-2xl">⚠️</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                            RCP
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 mt-3 text-sm font-bold">
                            08:00 – 08:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            24:00:00
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Automatyczne zakończenie
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Status systemowy informujący o zakończeniu sesji lub sytuacji wymagającej reakcji użytkownika.
                    </p>
                </div>
                <!-- 7 URLOP -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-pink-200 dark:bg-pink-400/60">
                        <div class="text-2xl">🏖️</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-pink-300 uppercase">
                            UW
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            urlop wypoczynkowy
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Wniosek
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Wszystkie wnioski pracownicze (urlop, L4, inne) z jednolitym statusem i automatycznym obiegiem akceptacji.
                    </p>
                </div>

                <!-- 8 ŚWIĘTO -->
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-rose-200 dark:bg-rose-400/60">
                        <div class="text-2xl">🎌</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-rose-300 uppercase">
                            ŚUW
                        </div>
                        <div class="text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                            Święto
                        </div>
                        <div class="text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                            Ustawowo wolne
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Dni ustawowo wolne od pracy automatycznie oznaczone w kalendarzu systemu.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-rose-200 dark:bg-rose-400/60">
                        <div class="text-2xl">❌</div>
                        <div class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-rose-300 uppercase">
                            RCP
                        </div>
                        <span title="Error"><span class="inline-flex  items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                Error
                            </span>
                        </span>

                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Wpis wymagający korekty danych lub interwencji administratora systemu.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 bg-gray-100 dark:bg-gray-800 transition-colors">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- LEWA STRONA - TELEFON -->
                <div class="flex justify-center lg:justify-start">
                    <div class="relative mx-auto border-gray-900 dark:border-black bg-gray-900 dark:bg-black border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl">

                        <!-- Przyciski -->
                        <div class="h-[32px] w-[3px] bg-gray-900 dark:bg-gray-800 absolute -left-[17px] top-[72px] rounded-s-lg"></div>
                        <div class="h-[46px] w-[3px] bg-gray-900 dark:bg-gray-800 absolute -left-[17px] top-[124px] rounded-s-lg"></div>
                        <div class="h-[46px] w-[3px] bg-gray-900 dark:bg-gray-800 absolute -left-[17px] top-[178px] rounded-s-lg"></div>
                        <div class="h-[64px] w-[3px] bg-gray-900 dark:bg-gray-800 absolute -right-[17px] top-[142px] rounded-e-lg"></div>

                        <!-- Ekran -->
                        <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-gray-100 dark:bg-gray-900 flex flex-col relative">

                            <!-- Notch -->
                            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[140px] h-[28px] bg-black rounded-b-2xl z-10"></div>

                            <!-- Header -->
                            <div class="pt-8 px-4 pb-3 border-b border-gray-200 dark:border-gray-700 text-center text-sm font-semibold text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-900">
                                WIBEST
                            </div>

                            <!-- WIADOMOŚCI -->
                            <div class="flex-1 flex flex-col justify-end p-4 space-y-3">
                                <div class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-4 py-2 rounded-2xl rounded-bl-sm max-w-[85%] self-start text-sm leading-tight shadow">
                                    <div>Start nadgodzin</div>
                                    <div class="mt-1">
                                        Dzisiejsza norma:<br>
                                        <span class="font-bold">08:00:00</span>
                                    </div>
                                    <div class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                        wibest.pl/login
                                    </div>
                                </div>

                                <div class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-4 py-2 rounded-2xl rounded-bl-sm max-w-[85%] self-start text-sm leading-tight shadow">
                                    <div>Koniec pracy</div>
                                    <div class="mt-1">
                                        Dzisiejsza norma:<br>
                                        <span class="font-bold">08:04:13</span>
                                    </div>
                                    <div class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                        wibest.pl/login
                                    </div>
                                </div>


                                <!-- SMS 3 -->
                                <div class="bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-4 py-2 rounded-2xl rounded-bl-sm max-w-[85%] self-start text-sm leading-tight shadow">
                                    <div>Zaakceptowano wniosek</div>
                                    <div class="mt-1">
                                        Zwolnienie lekarskie<br>
                                        <span class="font-semibold">Karol Wiśniewski</span><br>
                                        28.01.2026 – 29.01.2026
                                    </div>
                                    <div class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                        wibest.pl/login
                                    </div>
                                </div>

                            </div>

                            <!-- Input -->
                            <div class="p-3 border-t border-gray-200 dark:border-gray-700 flex items-center gap-2 bg-gray-100 dark:bg-gray-900">
                                <div class="flex-1 bg-gray-200 dark:bg-gray-800 rounded-full h-9"></div>
                                <div class="w-9 h-9 bg-gray-300 dark:bg-gray-700 rounded-full"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- PRAWA STRONA - OPIS -->
                <div class="text-left">
                    <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">
                        Automatyczne powiadomienia SMS
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-lg">
                        System informuje pracowników w czasie rzeczywistym o kluczowych zdarzeniach:
                        zakończeniu pracy, rozpoczęciu nadgodzin oraz decyzjach dotyczących wniosków.
                    </p>

                    <ul class="space-y-4 text-gray-700 dark:text-gray-300">
                        <li>✔ zakończenie pracy i podsumowanie czasu</li>
                        <li>✔ rozpoczęcie nadgodzin</li>
                        <li>✔ akceptacja lub odrzucenie wniosków</li>
                        <li>✔ szybki dostęp do systemu przez link</li>
                    </ul>

                    <p class="mt-6 text-gray-500 dark:text-gray-400">
                        Wszystkie powiadomienia są czytelne, natychmiastowe i nie wymagają logowania,
                        aby użytkownik mógł szybko sprawdzić najważniejsze informacje.
                    </p>
                </div>

            </div>

        </div>
    </section>
    <!-- FAQ -->
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-5xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-12">
                Najczęściej zadawane pytania
            </h2>

            <div class="space-y-4">

                <!-- 1 -->
                <details class="group bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-5 overflow-hidden">
                    <summary class="flex justify-between items-center cursor-pointer text-xl font-semibold">
                        Czy pracownicy muszą instalować aplikację?
                        <i class="fa-solid fa-chevron-down text-green-300 group-open:rotate-180 transition-transform duration-300"></i>
                    </summary>
                    <div class="mt-4 text-gray-700 dark:text-gray-200 overflow-hidden transition-all duration-300">
                        System działa w przeglądarce na telefonie i komputerze.
                        Pracownik może rozpocząć i zakończyć pracę w kilka sekund – bez instalacji aplikacji.
                    </div>
                </details>

                <!-- 3 -->
                <details class="group bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-5 overflow-hidden">
                    <summary class="flex justify-between items-center cursor-pointer text-xl font-semibold">
                        Jak szybko można wdrożyć system?
                        <i class="fa-solid fa-chevron-down text-green-300 group-open:rotate-180 transition-transform duration-300"></i>
                    </summary>
                    <div class="mt-4 text-gray-700 dark:text-gray-200">
                        Wdrożenie trwa kilka minut – wystarczy założyć konto i dodać pracowników.
                        Resztą możemy pomóc w trakcie konfiguracji.
                    </div>
                </details>

                <!-- 4 -->
                <details class="group bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-5 overflow-hidden">
                    <summary class="flex justify-between items-center cursor-pointer text-xl font-semibold">
                        Czy system obsługuje nadgodziny i wnioski?
                        <i class="fa-solid fa-chevron-down text-green-300 group-open:rotate-180 transition-transform duration-300"></i>
                    </summary>
                    <div class="mt-4 text-gray-700 dark:text-gray-200">
                        Tak – system automatycznie liczy nadgodziny, a pracownicy mogą składać wnioski (urlop, L4) oraz otrzymywać powiadomienia SMS.
                    </div>
                </details>

                <!-- 5 -->
                <details class="group bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-5 overflow-hidden">
                    <summary class="flex justify-between items-center cursor-pointer text-xl font-semibold">
                        Czy dane są bezpieczne?
                        <i class="fa-solid fa-chevron-down text-green-300 group-open:rotate-180 transition-transform duration-300"></i>
                    </summary>
                    <div class="mt-4 text-gray-700 dark:text-gray-200">
                        Tak – dane są przechowywane w bezpiecznej chmurze z szyfrowaniem SSL oraz regularnymi kopiami zapasowymi.
                    </div>
                </details>

                <!-- 6 -->
                <details class="group bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-5 overflow-hidden">
                    <summary class="flex justify-between items-center cursor-pointer text-xl font-semibold">
                        Dla jakich firm jest ten system?
                        <i class="fa-solid fa-chevron-down text-green-300 group-open:rotate-180 transition-transform duration-300"></i>
                    </summary>
                    <div class="mt-4 text-gray-700 dark:text-gray-200">
                        System został stworzony dla małych i średnich firm (od kilku do około 100 pracowników) – szczególnie w branżach usługowych, budowlanych i produkcyjnych.
                    </div>
                </details>

            </div>
        </div>
    </section>

    <!-- KONTAKT -->
    <section class="max-w-[85rem] w-full mx-auto px-4 py-4 grid grid-cols-1 md:grid-cols-2">
        <div class="w-full h-full flex flex-col text-lg justify-center items-center lg:text-xl my-4">
            <div class="my-4 flex flex-col min-w-[20rem] w-full md:w-fit gap-4">
                <a href="mailto:karol.wisniewski2901@gmail.com" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-200 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-envelope mr-2"></i>Napisz
                </a>
                <div class="py-4 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-4 after:flex-1 after:border-t after:border-gray-200 after:ms-4 ">LUB</div>
                <a href="tel:451670344" class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-phone mr-2"></i>Zadzwoń
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
        &copy; {{ date('Y') }} WIBEST. Wszelkie prawa zastrzeżone.
    </footer>

    <script>
        const toggle = document.getElementById('theme-toggle');
        toggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>

</html>