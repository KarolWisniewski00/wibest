<!doctype html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="twitter:card" content="summary">

    <meta property="og:locale" content="pl_PL">

    <meta name="author" content="Karol Wiśniewski">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <title>Funkcje WIBEST – RCP, Ewidencja Czasu Pracy i Raporty</title>

    <meta name="description"
        content="Poznaj funkcje WIBEST – systemu RCP i ewidencji czasu pracy. Rejestracja czasu pracy, nadgodziny, wnioski, planowanie pracy i raporty dla firm.">

    <meta name="keywords"
        content="funkcje WIBEST, funkcje RCP, system RCP, RCP online, ewidencja czasu pracy, ewidencja czasu pracy online, rejestracja czasu pracy, rejestracja czasu pracy online, program do ewidencji czasu pracy, nadgodziny pracowników, wnioski urlopowe online, planowanie czasu pracy, raporty czasu pracy">

    <!-- Open Graph -->
    <meta property="og:site_name" content="WIBEST – Ewidencja czasu pracy i RCP">

    <meta property="og:type" content="website">

    <meta property="og:url" content="https://wibest.pl/funkcje">

    <meta property="og:title" content="Funkcje WIBEST – RCP, Ewidencja Czasu Pracy i Raporty">

    <meta property="og:description"
        content="Poznaj funkcje WIBEST – systemu RCP i ewidencji czasu pracy. Rejestracja czasu pracy, nadgodziny, wnioski, planowanie pracy i raporty dla firm.">

    <meta property="og:image" content="{{ asset('wibest_icon_transparent_bg.png') }}">

    <meta property="og:image:alt" content="WIBEST – funkcje systemu RCP i ewidencji czasu pracy">

    <!-- Twitter -->
    <meta name="twitter:title" content="Funkcje WIBEST – RCP, Ewidencja Czasu Pracy i Raporty">

    <meta name="twitter:description"
        content="Poznaj funkcje WIBEST – systemu RCP i ewidencji czasu pracy. Rejestracja czasu pracy, nadgodziny, wnioski, planowanie i raporty.">

    <meta name="twitter:image" content="{{ asset('wibest_icon_transparent_bg.png') }}">

    <meta name="twitter:image:alt" content="WIBEST – funkcje systemu RCP i ewidencji czasu pracy">

    <!-- Canonical -->
    <link rel="canonical" href="https://wibest.pl/funkcje">

    <!-- ICON -->
    <link rel="icon" href="{{ asset('wibest_icon_transparent_bg.png') }}" type="image/png">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Raleway:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>

    <style>
        * {
            font-family: "Lato", sans-serif;
        }

        .system-font {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
                "Noto Color Emoji" !important;
        }
    </style>

</head>

<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-500">
    <!-- HEADER -->
    <header x-data="{ open: false }"
        class="flex flex-col justify-center items-center shadow bg-white dark:bg-gray-800 sticky top-0 z-50">
        <div class="max-w-[85rem] flex justify-between items-center w-full px-8 h-20">
            <!-- Logo -->
            <div class="w-1/3 shrink-0 flex items-center justify-start">
                <a href="{{ route('dashboard') }}">
                    <span
                        class="sm:order-1 text-green-300 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 dark:text-green-300"
                        style='font-family: "Raleway", sans-serif;'>WIBEST</span>
                </a>
            </div>

            <!-- MENU -->
            <nav class="w-1/3 hidden md:flex items-center justify-center gap-6 text-sm font-semibold">
                <x-nav-link class="h-20 text-nowrap" href="{{ route('welcome') }}"
                    :active="request()->routeIs('welcome')">
                    <i class="fa-solid fa-house"></i>
                </x-nav-link>
                <x-nav-link class="h-20 text-nowrap" href="{{ route('function') }}"
                    :active="request()->routeIs('function')">
                    <i class="fa-solid fa-rocket mr-2"></i>Funkcje
                </x-nav-link>
                <x-nav-link class="h-20 text-nowrap" href="{{ route('about') }}" :active="request()->routeIs('about')">
                    <i class="fa-solid fa-users mr-2"></i>O nas
                </x-nav-link>
                <x-nav-link class="h-20 text-nowrap" href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                    <i class="fa-solid fa-blog mr-2"></i>Blog
                </x-nav-link>
                <x-nav-link class="h-20 text-nowrap" href="{{ route('contact') }}"
                    :active="request()->routeIs('contact')">
                    <i class="fa-solid fa-phone mr-2"></i>Kontakt
                </x-nav-link>
            </nav>

            <!-- CTA -->
            <div class="w-1/3 flex items-center justify-end gap-3">
                <a href="{{route('login')}}" id="theme-toggle"
                    class="system-font justify-center text-xs lg:text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i>Logowanie
                </a>
                <!-- Hamburger -->
                <div class="flex items-center md:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>


        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden w-full">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link class="h-full text-center" href="{{ route('welcome') }}"
                    :active="request()->routeIs('welcome')">
                    <i class="fa-solid fa-house mr-2"></i>Strona główna
                </x-responsive-nav-link>
                <x-responsive-nav-link class="h-full text-center" href="{{ route('function') }}"
                    :active="request()->routeIs('function')">
                    <i class="fa-solid fa-rocket mr-2"></i>Funkcje
                </x-responsive-nav-link>
                <x-responsive-nav-link class="h-full text-center" href="{{ route('about') }}"
                    :active="request()->routeIs('about')">
                    <i class="fa-solid fa-users mr-2"></i>O nas
                </x-responsive-nav-link>
                <x-responsive-nav-link class="h-full text-center" href="{{ route('blog') }}"
                    :active="request()->routeIs('blog')">
                    <i class="fa-solid fa-blog mr-2"></i>Blog
                </x-responsive-nav-link>
                <x-responsive-nav-link class="h-full text-center" href="{{ route('contact') }}"
                    :active="request()->routeIs('contact')">
                    <i class="fa-solid fa-phone mr-2"></i>Kontakt
                </x-responsive-nav-link>
            </div>
        </div>
    </header>
    <section class="px-8 pt-8 lg:pt-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">

            <!-- HEADER -->
            <div class="text-center max-w-3xl mx-auto mb-10">

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Funkcje systemu WIBEST
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Dokumentacja modułów — automatyczne śledzenie sekcji jak w systemach SaaS.
                </p>

            </div>
        </div>
    </section>
    <div id="sticky-section" class="sticky top-[80px] z-40 w-full 
            backdrop-blur-md 
            bg-white/80 dark:bg-gray-900/80">
        <div class="max-w-[85rem] mx-auto relative flex flex-col gap-2 px-12 py-4 my-6">

            <!-- Górna nawigacja -->
            <div class="grid grid-cols-4 gap-4">
                <!-- Krok 1 -->
                <a href="#rcp" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        ⏱️
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        RCP
                    </span>
                </a>

                <!-- Krok 2 -->
                <a href="#e-wnioski" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        🏖️
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        WNIOSKI
                    </span>
                </a>

                <!-- Krok 3 -->
                <a href="#planowanie" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        🌀
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-violet-300 dark:bg-violet-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        PLANING
                    </span>
                </a>

                <!-- Krok 4 -->
                <a href="#raporty" class="nav-link-2 flex flex-col items-center justify-center">
                    <span class="text-lg md:text-xl">
                        📈
                    </span>
                    <span
                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-gray-300 dark:bg-gray-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                        RAPORTY
                    </span>
                </a>
            </div>

            <!-- Pasek postępu -->
            <div class="relative">

                <!-- Tło -->
                <div
                    class="absolute top-1/2 left-[12.5%] right-[12.5%] h-2 -translate-y-1/2 rounded-full bg-gray-300 dark:bg-gray-700">
                </div>

                <!-- Progress -->
                <div id="progress-bar"
                    class="absolute top-1/2 left-[12.5%] h-2 w-[0%] -translate-y-1/2 rounded-full bg-green-300">
                </div>

                <!-- Punkty -->
                <div class="relative grid grid-cols-4 gap-4">
                    <!-- Krok 1 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-1"
                            class="w-5 h-5 rounded-full bg-green-300 dark:bg-green-300 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                    <!-- Krok 2 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-2"
                            class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-700 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                    <!-- Krok 3 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-3"
                            class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-700 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                    <!-- Krok 4 -->
                    <div class="flex flex-col items-center justify-center">
                        <div id="step-4"
                            class="w-5 h-5 rounded-full bg-gray-300 dark:bg-gray-700 border-4 border-white dark:border-gray-900">
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <section class="px-8 pb-8 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">
            <!-- GRID -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- LEFT NAV -->
                <aside class="lg:col-span-3">

                    <div id="content-section"
                        class="sticky top-48 appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                        <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                            Moduły
                        </p>

                        <nav class="flex flex-col gap-2 text-sm" id="sidebar">

                            <a href="#rcp"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-clock mr-2"></i>RCP
                            </a>

                            <a href="#e-wnioski"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-inbox mr-2"></i>Wnioski
                            </a>

                            <a href="#planowanie"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-calendar-days mr-2"></i>Planing
                            </a>

                            <a href="#raporty"
                                class="nav-link px-4 py-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                                <i class="fa-solid fa-chart-line mr-2"></i>Raporty
                            </a>
                        </nav>

                    </div>

                </aside>

                <!-- CONTENT -->
                <main class="lg:col-span-9 space-y-10">

                    <!-- 1 RCP -->
                    <div id="rcp"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Rejestracja Czasu Pracy
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-clock text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Rdzeń systemu WIBEST. Umożliwia rejestrację wejść i wyjść pracowników z lokalizacją —
                            zarówno ręcznie przez administratora, jak i samodzielnie przez
                            pracownika. System automatycznie wykrywa nadgodziny, braki normy, pracę nocną oraz
                            wielokrotne odczyty w ciągu dnia.
                        </p>

                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    start/stop
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Zegar
                                </h3>
                            </div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Pracownik samodzielnie rozpoczyna i kończy sesję pracy jednym kliknięciem. Czas liczony
                            jest z dokładnością do sekundy. Pracownik zostaje zapytany przez system czy wyraża zgode
                            na pobranie lokalizacji.
                        </p>

                        <!--START STOP + ZDARZENIA -->

                        <div
                            class="w-full grid gap-4 appearance-none rounded-lg p-2 outline-none shadow border border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-50 mb-4 grid grid-cols-1 md:grid-cols-2 gap-4 p-4 w-full">
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
                                <x-flex-center>
                                    <x-paragraf-display id="dateWidget"
                                        class="dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        {{ \Carbon\Carbon::now()->locale('pl')->translatedFormat('l d F Y') }}
                                    </x-paragraf-display>
                                </x-flex-center>

                                <!-- Timer -->
                                <x-flex-center>
                                    <x-paragraf-display id="timerWidget"
                                        class=" text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                                        00:00:00
                                    </x-paragraf-display>
                                </x-flex-center>

                                <x-flex-center>
                                    <div id="loaderLocationWidget"
                                        class="hidden h-6 rounded-lg bg-gray-200 dark:bg-gray-600 w-32 mx-auto animate-pulse">
                                    </div>
                                    <x-paragraf-display id="locationWidget"
                                        class=" text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        LOKALIZACJA ZOSTANIE POBRANA W MOMENCIE KLIKNIĘCIA
                                    </x-paragraf-display>
                                </x-flex-center>
                            </div>

                            <!-- Prawa kolumna: Przyciski -->
                            <div class="flex flex-col justify-center items-center space-y-6">
                                <div id="loaderTimerWidget"
                                    class="hidden h-[66px] rounded-lg bg-gray-200 dark:bg-gray-600 w-[179px] mx-auto animate-pulse">
                                </div>
                                <button id="startButtonWidget"
                                    class="w-[179px] text-2xl min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-play mr-2"></i>Start
                                </button>
                                <!-- Przycisk Stop -->
                                <button id="stopButtonWidget"
                                    class="w-[179px] hidden text-2xl  min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-stop mr-2"></i>Stop
                                </button>
                            </div>
                        </div>

                        <script>
                            $(function () {

                                const $timer = $('#timerWidget');
                                const $location = $('#locationWidget');

                                let seconds = 0;

                                const STATE = {
                                    START: "start",
                                    RUN: "run",
                                    FAST: "fast",
                                    STOP: "stop",
                                    PAUSE: "pause"
                                };

                                let state = STATE.START;

                                function format(sec) {
                                    const h = String(Math.floor(sec / 3600)).padStart(2, '0');
                                    const m = String(Math.floor((sec % 3600) / 60)).padStart(2, '0');
                                    const s = String(sec % 60).padStart(2, '0');
                                    return `${h}:${m}:${s}`;
                                }

                                function render() {
                                    $timer.text(format(seconds));
                                }

                                function setLocation(text) {
                                    $location.fadeOut(200, function () {
                                        $(this).text(text).fadeIn(200);
                                    });
                                }

                                function reset() {
                                    seconds = 0;
                                    render();
                                }

                                function startPhase() {
                                    state = STATE.RUN;
                                    $('#startButtonWidget').addClass('hidden');
                                    $('#stopButtonWidget').removeClass('hidden');

                                    reset();

                                    setLocation("SZEROKOŚĆ: 50.0647 DŁUGOŚĆ: 19.9450 DOKŁADOŚĆ: 35m");

                                    let tick = setInterval(() => {
                                        if (state !== STATE.RUN) {
                                            clearInterval(tick);
                                            return;
                                        }

                                        seconds++;
                                        render();
                                    }, 1000);

                                    // po 3 sekundach przejście do fast forward
                                    setTimeout(() => {
                                        if (state !== STATE.RUN) return;
                                        state = STATE.FAST;
                                        fastPhase();
                                    }, 3000);
                                }

                                function fastPhase() {
                                    let height = $('#locationWidget').height();
                                    $('#loaderLocationWidget').height(height);

                                    $('#stopButtonWidget').addClass('hidden');
                                    $('#loaderTimerWidget').removeClass('hidden');
                                    $('#loaderLocationWidget').removeClass('hidden');
                                    $('#locationWidget').addClass('hidden');

                                    let fastTick = setInterval(() => {

                                        if (state !== STATE.FAST) {
                                            clearInterval(fastTick);
                                            return;
                                        }

                                        seconds += 3600;

                                        $timer
                                            .stop(true, true)
                                            .addClass("text-yellow-300 dark:text-yellow-400 scale-110");

                                        setTimeout(() => {
                                            $timer.removeClass("text-yellow-300 dark:text-yellow-400 scale-110");
                                        }, 150);

                                        render();
                                        if (seconds >= 8 * 3600) {

                                            // pokazujemy stop (ale jeszcze NIE kończymy)
                                            $('#stopButtonWidget').removeClass('hidden');
                                            $('#loaderTimerWidget').addClass('hidden');
                                            $('#loaderLocationWidget').addClass('hidden');
                                            $('#locationWidget').removeClass('hidden');

                                            clearInterval(fastTick);

                                            // 🔥 DODATKOWA FAZA - „dogrywka”
                                            let tailSeconds = 0;

                                            const tailTick = setInterval(() => {

                                                tailSeconds++;
                                                seconds++; // dalej mierzy czas, ale już normalnie
                                                render();

                                                // opcjonalnie: subtelny efekt uspokojenia
                                                $('#timerWidget')
                                                    .removeClass('text-yellow-400 scale-110')
                                                    .addClass('text-gray-900');

                                                // po 3–5 sekundach STOP
                                                if (tailSeconds >= 3) {

                                                    clearInterval(tailTick);

                                                    // tutaj przechodzisz do STOP
                                                    stopPhase(); // albo Twoja funkcja stop

                                                }

                                            }, 1000);
                                        }

                                    }, 180);
                                }

                                function stopPhase() {
                                    state = STATE.STOP;
                                    $('#startButtonWidget').removeClass('hidden');
                                    $('#stopButtonWidget').addClass('hidden');


                                    setLocation("SZEROKOŚĆ: 52.2297 DŁUGOŚĆ: 21.0122 DOKŁADOŚĆ: 12m");

                                    setTimeout(() => {
                                        pausePhase();
                                    }, 2000);
                                }

                                function pausePhase() {
                                    state = STATE.PAUSE;

                                    setTimeout(() => {
                                        startPhase();
                                    }, 2500);
                                }

                                // START LOOP AUTOMATYCZNY
                                startPhase();

                            });
                        </script>
                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Zadania
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Nadgodziny
                                </h3>
                            </div>
                        </div>
                        <div
                            class="mb-4 flex flex-col gap-4 w-full h-full appearance-none rounded-r-lg shadow border-l-4 border-green-300 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            <p class="font-bold">Kluczowy scenariusz</p>
                            <p>Nie każde dodatkowe pozostanie w pracy oznacza uzasadnione nadgodziny. WIBEST pozwala
                                wymagać od pracownika uzupełnienia zadania wykonanego w czasie nadliczbowym. Po jego
                                opisaniu nadgodziny mogą zostać uwzględnione w ewidencji. Jeśli zadanie nie zostanie
                                uzupełnione, system może ograniczyć naliczony czas do maksymalnego czasu wynikającego z
                                planingu.
                            </p>
                            <p>
                                Dodatkowo przełożony może zatwierdzić lub odrzucić zadanie, zachowując kontrolę nad tym,
                                które nadgodziny faktycznie powinny zostać uwzględnione.</p>
                        </div>
                        <div
                            class="mb-4 md:col-span-2 grid grid-cols-1 gap-4 w-full p-4 border-2 dark:border-gray-700 rounded-lg">
                            <x-status-gray class="text-2xl">
                                🎯 Zadanie
                            </x-status-gray>
                            <!--POWRÓT-->
                            <div id="myForm" class="space-y-4">
                                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css"
                                    rel="stylesheet">
                                <style>
                                    #editor {
                                        border: 0;
                                        height: min-content;
                                    }

                                    .ql-toolbar {
                                        border: 0 !important;
                                        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
                                        border-radius: 0.375rem;
                                        overflow-y: auto;
                                        padding: 8px 12px !important;
                                        margin: 0 !important;
                                    }

                                    .ql-editor {
                                        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
                                        padding: 8px 12px !important;
                                    }

                                    @media (prefers-color-scheme: dark) {
                                        .ql-toolbar {
                                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-editor {
                                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-editor.ql-blank::before {
                                            color: #9ca3af;
                                            /* Tailwind gray-400 */
                                        }

                                        .ql-toolbar {
                                            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-italic .ql-stroke {
                                            stroke: white !important;
                                        }

                                        .ql-underline .ql-stroke {
                                            stroke: white !important;
                                        }

                                        .ql-bold .ql-stroke {
                                            stroke: white !important;
                                        }

                                        .ql-fill {
                                            fill: white !important;
                                        }

                                        .ql-italic:hover .ql-stroke {
                                            stroke: #9ca3af !important;
                                        }

                                        .ql-underline:hover .ql-stroke {
                                            stroke: #9ca3af !important;
                                        }

                                        .ql-bold:hover .ql-stroke {
                                            stroke: #9ca3af !important;
                                        }

                                        .ql-underline:hover .ql-fill {
                                            fill: #9ca3af !important;
                                        }
                                    }
                                </style>
                                <div id="editor"
                                    class="bg-white dark:bg-gray-700 dark:text-white rounded-md h-fit overflow-y-auto">

                                </div>

                                <textarea id="editor-content" name="content" style="display:none;"></textarea>
                                <script>
                                    const quill = new Quill('#editor', {
                                        theme: 'snow',
                                        placeholder: '👈 Wpisz tutaj treść...',
                                        modules: {
                                            toolbar: [
                                                ['bold', 'italic', 'underline'],
                                            ]
                                        }
                                    });
                                    // Synchronizuj zawartość edytora z ukrytym polem tekstowym
                                    document.getElementById('myForm').onsubmit = function () {
                                        var editorContent = document.getElementById('editor-content');
                                        editorContent.value = quill.root.innerHTML;
                                    };
                                </script>
                                <div class="flex justify-end mt-4">
                                    <x-button-green id="task-save" type="button" class="text-lg">
                                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                                    </x-button-green>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 flex justify-center items-center">
                            <div
                                class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-arrow-down-long text-2xl"></i>
                            </div>
                        </div>

                        <div
                            class="flex flex-col gap-4 w-full h-full appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50 md:col-span-2 mb-4">
                            <x-text-cell>
                                <x-text-cell-label>
                                    Zdarzenie
                                </x-text-cell-label>
                                <x-status-gray class="text-2xl">
                                    🎯 Zadanie
                                </x-status-gray>
                            </x-text-cell>
                            <x-text-cell>
                                <x-text-cell-label>
                                    Status
                                </x-text-cell-label>
                                <x-status-yellow id="task-status" class="text-2xl">
                                    🟡 oczekujące
                                </x-status-yellow>
                            </x-text-cell>
                            <x-text-cell>
                                <x-text-cell-label>
                                    Treść
                                </x-text-cell-label>
                                <x-text-cell-value>
                                    <div id="task-content"
                                        class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                                        Wpisz treść wyżej
                                    </div>
                                </x-text-cell-value>
                            </x-text-cell>
                            <!--Czas w pracy-->
                            <x-text-cell>
                                <x-text-cell-label>
                                    Kiedy
                                </x-text-cell-label>
                                <x-text-cell-value>
                                    <x-text-cell-span class="gap-2 w-full">
                                        <span id="task-date"
                                            class="inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            📅
                                            {{ \Carbon\Carbon::now()->locale('pl')->translatedFormat('d.m.Y H:i:s') }}
                                        </span>
                                    </x-text-cell-span>
                                </x-text-cell-value>
                            </x-text-cell>
                            <!--Czas w pracy-->

                            <x-button-link-green id="task-accept" href="#" class="text-lg">
                                <i class="fa-solid fa-check mr-2"></i>Akceptuj
                            </x-button-link-green>
                            <x-button-link-red id="task-reject" href="#" class="text-lg">
                                <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                            </x-button-link-red>
                        </div>
                        <script>
                            $(document).ready(function () {

                                // ZAPISZ
                                $('#task-save').on('click', function (e) {
                                    e.preventDefault();

                                    // Pobierz treść z Quilla
                                    let content = quill.root.innerHTML;

                                    // Sprawdź czy coś wpisano
                                    if (quill.getText().trim().length === 0) {
                                        alert('Wpisz treść zadania.');
                                        return;
                                    }

                                    // Aktualizuj treść
                                    $('#task-content').html(content);

                                    // Aktualna data
                                    let now = new Date();

                                    let day = String(now.getDate()).padStart(2, '0');
                                    let month = String(now.getMonth() + 1).padStart(2, '0');
                                    let year = now.getFullYear();

                                    let hours = String(now.getHours()).padStart(2, '0');
                                    let minutes = String(now.getMinutes()).padStart(2, '0');
                                    let seconds = String(now.getSeconds()).padStart(2, '0');

                                    let currentDate =
                                        day + '.' +
                                        month + '.' +
                                        year + ' ' +
                                        hours + ':' +
                                        minutes + ':' +
                                        seconds;

                                    // Aktualizuj datę
                                    $('#task-date').html('📅 ' + currentDate);

                                    // Status -> oczekujące
                                    $('#task-status')
                                        .removeClass('text-green-300 dark:text-green-300 text-red-300 dark:text-red-300')
                                        .addClass('text-yellow-500 dark:text-yellow-300')
                                        .html('🟡 oczekujące');

                                    // Pokaż oba przyciski
                                    $('#task-accept').show();
                                    $('#task-reject').show();
                                });


                                // AKCEPTUJ
                                $('#task-accept').on('click', function (e) {
                                    e.preventDefault();

                                    $('#task-status')
                                        .removeClass('text-yellow-500 dark:text-yellow-300 text-red-300 dark:text-red-300')
                                        .addClass('text-green-300 dark:text-green-300')
                                        .html('🟢 zaakceptowane');

                                    $(this).hide();
                                    $('#task-reject').show();
                                });


                                // ODRZUĆ
                                $('#task-reject').on('click', function (e) {
                                    e.preventDefault();

                                    $('#task-status')
                                        .removeClass('text-yellow-500 dark:text-yellow-300 text-green-300 dark:text-green-300')
                                        .addClass('text-red-300 dark:text-red-300')
                                        .html('🔴 odrzucone');

                                    $(this).hide();
                                    $('#task-accept').show();
                                });

                            });
                        </script>
                        <div
                            class="flex items-start justify-between gap-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- TELEFON -->
                            <div class="flex justify-center lg:justify-start overflow-hidden h-[320px] lg:h-[480px]">

                                <div class="relative scale-[0.9] lg:scale-[1.0] mx-auto -translate-y-64">

                                    <!-- PHONE -->
                                    <div
                                        class="relative mx-auto border-[14px] border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 rounded-[2.8rem] h-[620px] w-[310px]">

                                        <!-- BUTTONS -->
                                        <div
                                            class="h-[34px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[78px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[132px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[190px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[68px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -right-[17px] top-[148px] rounded-e-lg">
                                        </div>

                                        <!-- SCREEN -->
                                        <div
                                            class="rounded-[2.1rem] overflow-hidden w-[282px] h-[592px] bg-gray-50 dark:bg-gray-950 flex flex-col relative">

                                            <!-- NOTCH -->
                                            <div
                                                class="absolute top-0 left-1/2 -translate-x-1/2 w-[145px] h-[30px] bg-gray-800 rounded-b-3xl z-10">
                                            </div>

                                            <!-- HEADER -->
                                            <div
                                                class="pt-8 px-4 pb-3 border-b border-gray-200 dark:border-gray-800 text-center text-sm font-bold tracking-wide text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-950">
                                                WIBEST
                                            </div>

                                            <!-- CHAT -->
                                            <div class="flex-1 flex flex-col justify-end p-4 space-y-4">

                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-green-700 dark:text-green-300">
                                                        Start nadgodzin
                                                    </div>

                                                    <div class="mt-2 text-gray-600 dark:text-gray-300">
                                                        Dzisiejsza norma:
                                                        <span class="block font-bold text-gray-900 dark:text-white">
                                                            08:00:00
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>
                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-green-700 dark:text-green-300">
                                                        Koniec pracy
                                                    </div>

                                                    <div class="mt-2 text-gray-600 dark:text-gray-300">
                                                        Dzisiejsza norma:
                                                        <span class="block font-bold text-gray-900 dark:text-white">
                                                            08:00:06
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>
                                            </div>

                                            <!-- INPUT -->
                                            <div
                                                class="p-4 border-t border-gray-200 dark:border-gray-800 flex items-center gap-2 bg-white dark:bg-gray-950">

                                                <div
                                                    class="flex-1 bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-full h-10">
                                                </div>

                                                <div
                                                    class="w-10 h-10 bg-gray-100 dark:bg-gray-500/20 border border-gray-200 dark:border-gray-500/20 rounded-full flex items-center justify-center text-gray-700 dark:text-gray-300">
                                                    →
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            powiadomienia
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            SMS
                                        </h3>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Pracownik otrzymuje powiadomienie SMS w momencie przekroczenia zaplanowanego
                                    czasu pracy + progu liczenia nadgodzin.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Pracownik otrzymuje powiadomienie SMS z podsumowaniem sesji po zakończeniu pracy
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- 2 E-WNIOSKI -->
                    <section id="e-wnioski"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Wnioski / Nieobecności
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                <i class="fa-solid fa-inbox text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Zarządzaj wnioskami pracowników w jednym miejscu. Urlopy, zwolnienia, wyjścia prywatne i
                            pozostałe sprawy kadrowe mogą być składane bezpośrednio w WIBEST, a osoby odpowiedzialne za
                            ich obsługę otrzymują je gotowe do rozpatrzenia.
                        </p>

                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Przeliczanie pozostałych dni
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Liczenie urlopu
                                </h3>
                            </div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            WIBEST automatycznie kontroluje wykorzystany i pozostały wymiar urlopu. Przy składaniu
                            wniosku system sprawdza dostępny limit, a po jego zaakceptowaniu odpowiednia liczba dni
                            zostaje automatycznie odjęta z puli pracownika. Bez ręcznego liczenia i aktualizowania
                            arkuszy.
                        </p>
                        <div
                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                            <div class="flex flex-col w-full gap-4">
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start items-center w-full justify-start">
                                        <x-leave-status class="">
                                            zaakceptowane
                                        </x-leave-status>
                                    </div>
                                </div>
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start items-center w-full justify-start text-xs">
                                        <x-paragraf-display class="text-xs whitespace-nowrap">
                                            <span
                                                class="inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                {{ \Carbon\Carbon::now()->locale('pl')->translatedFormat('d.m.Y') }}
                                            </span>
                                        </x-paragraf-display>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-start items-start w-fit gap-2">
                                    <div class="flex flex-col items-center justify-center h-full w-full">
                                        <span class="text-lg md:text-xl">
                                            🏖️
                                        </span>
                                        <x-label-pink class="mt-1">
                                            UW
                                        </x-label-pink>
                                    </div>
                                    <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                        <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                                            <span
                                                class="inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                1 dni
                                            </span>
                                            <x-status-orange>
                                                1 robocze
                                            </x-status-orange>
                                            <x-status-green>
                                                0 wolne
                                            </x-status-green>
                                        </x-paragraf-display>
                                        <x-paragraf-display
                                            class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                                            urlop wypoczynkowy
                                        </x-paragraf-display>
                                    </div>
                                </div>
                                <div
                                    class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                                </div>
                                <div class="flex space-x-4">
                                    <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2">
                                        <x-status-gray>
                                            Zrealizowano
                                        </x-status-gray>
                                    </x-paragraf-display>
                                    <label class="inline-flex items-center md:justify-center">
                                        <input type="checkbox" class="sr-only peer toggle-status sync-toggle"
                                            name="leave_status" data-leave-id="" id="leave-demo-toggle">
                                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                    peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                    peer-checked:after:border-white
                    after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                    after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                    peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer">
                                        </div>
                                    </label>
                                </div>
                                <script>
                                    $(document).ready(function () {

                                        const toggle = $('#leave-demo-toggle');

                                        let usedDays = 0;
                                        let remainingDays = 28;

                                        toggle.on('change', function () {

                                            if ($(this).is(':checked')) {

                                                // Akceptacja / realizacja urlopu
                                                usedDays++;
                                                remainingDays--;

                                            } else {

                                                // Cofnięcie
                                                usedDays--;
                                                remainingDays++;
                                            }

                                            animateNumber('#used-days', usedDays, 'Wykorzystano: ');
                                            animateNumber('#remaining-days', remainingDays, 'w {{ now()->year }} pozostało: ', ' dni');
                                        });


                                        function animateNumber(selector, target, prefix = '', suffix = ' dni') {

                                            const element = $(selector);

                                            const currentText = element.text();

                                            const start = 0;

                                            $({
                                                value: start
                                            }).animate({
                                                value: target
                                            }, {
                                                duration: 500,

                                                easing: 'swing',

                                                step: function () {

                                                    const value = Math.round(this.value);

                                                    element.text(
                                                        prefix + value + suffix
                                                    );
                                                },

                                                complete: function () {

                                                    element.text(
                                                        prefix + target + suffix
                                                    );

                                                    // delikatne podkreślenie zmiany
                                                    element
                                                        .addClass('scale-110')
                                                        .delay(150)
                                                        .queue(function (next) {
                                                            $(this).removeClass('scale-110');
                                                            next();
                                                        });
                                                }
                                            });
                                        }

                                    });
                                </script>
                            </div>
                        </div>
                        <div class="mb-4 flex justify-center items-center">
                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                <i class="fa-solid fa-arrow-down-long text-2xl"></i>
                            </div>
                        </div>
                        <div
                            class="grid md:grid-cols-2 my-4 gap-4 w-full h-full appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            @php
                                $shortcut = 'UW';
                                $icon = '🏖️';
                                $type = 'urlop wypoczynkowy';
                            @endphp
                            <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                            <div class="flex flex-col text-end">
                                <span
                                    class="text-xs font-semibold text-gray-900 dark:text-gray-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    Należy Ci się: 26 dni
                                </span>
                                <span
                                    class="text-xs font-semibold text-gray-900 dark:text-gray-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    Pozostało z ubiegłego roku: 2 dni
                                </span>
                                <span id="used-days"
                                    class="text-xs font-semibold text-orange-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    Wykorzystano: 0 dni
                                </span>
                                <span id="remaining-days"
                                    class="text-xs font-semibold text-green-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                    w {{ now()->year }} pozostało: 28 dni
                                </span>
                            </div>
                        </div>
                        <div
                            class="mb-4 flex flex-col gap-4 w-full h-full appearance-none rounded-r-lg shadow border-l-4 border-green-300 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            <p class="font-bold">Kluczowy scenariusz</p>
                            <p>Pracownik składa wniosek o 3 dni urlopu → przełożony go akceptuje → WIBEST automatycznie
                                zmniejsza pozostały limit urlopowy. Wszystko dzieje się od razu, bez dodatkowych działań
                                po stronie administracji.</p>
                        </div>
                        <div
                            class="flex items-start justify-between gap-4 mb-8 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    21 różnych typów nieobecności
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Rodzaje wniosków
                                </h3>
                            </div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Jeden moduł do obsługi najważniejszych spraw pracowników. WIBEST pozwala obsługiwać aż 21
                            rodzajów wniosków, dzięki czemu nie musisz tworzyć osobnych formularzy, prowadzić
                            dodatkowych arkuszy ani szukać informacji w wiadomościach.
                        </p>
                        <div class="mb-4" id="leave-requests">
                            <div class="relative">

                                <ul class="grid w-full gap-4 lg:grid-cols-2">

                                    <!--[if BLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-prace-w-swieto"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🕊️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne za pracę w święto
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WPS
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="zwolnienie-lekarskie"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🤒
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        zwolnienie lekarskie
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        ZL
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li class="lg:col-span-2">
                                        <label for="urlop-wypoczynkowy"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🏖️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop wypoczynkowy
                                                    </p>
                                                    <span
                                                        class="system-font text-xs font-semibold text-green-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal">
                                                        Pozostało: 17 dni
                                                    </span>
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UW
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-nadgodziny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    ⏰
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne za nadgodziny
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WN
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🗓️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne za święto w sobotę
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WSS
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->


                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    💸
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop bezpłatny
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UB
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🗓️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        wolne z tytułu 5-dniowego tygodnia pracy
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        WT5
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🧑‍⚕️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        zwolnienie lekarsie - opieka
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        ZLO
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li>
                                        <label for="wolne-za-swieto-w-sobote"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🎉
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop okolicznościowy
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UO
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    📢
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop wypoczynkowy "na żądanie"
                                                    </p>
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UWZ
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🩸
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        oddanie krwi
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        OK
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🦾
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        świadczenie rehabilitacyjne
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        SR
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🧑‍🍼
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        opieka
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        OP
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    👨‍👧
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop ojcowski
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UOJC
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🤱
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop macieżyński
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UM
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    👶
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        urlop rodzicielski
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        UR
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    ⚖️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        świadek w sądzie
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        SWS
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    💻
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        praca zdalna
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        PZ
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🦠
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        kwarantanna
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        KW
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    🏠
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        kwarantanna z pracą zdalną
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        KWZPZ
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->
                                    <li class="hidden lg:block">
                                        <label for="urlop-bezplatny"
                                            class="mb-4 h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                            <div class="flex flex-row items-center justify-center w-fit gap-2">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-10 h-10 flex items-center justify-center text-3xl">
                                                    ✈️
                                                </p>
                                                <div class="flex flex-col justify-center w-fit gap-2">
                                                    <p
                                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-xs">
                                                        Delegacja
                                                    </p> <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest w-fit">
                                                        DEL
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            </div>
                        </div>

                        <div
                            class="flex items-start justify-between gap-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- TELEFON -->
                            <div class="flex justify-center lg:justify-start overflow-hidden h-[320px] lg:h-[480px]">

                                <div class="relative scale-[0.9] lg:scale-[1.0] mx-auto -translate-y-64">

                                    <!-- PHONE -->
                                    <div
                                        class="relative mx-auto border-[14px] border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 rounded-[2.8rem] h-[620px] w-[310px]">

                                        <!-- BUTTONS -->
                                        <div
                                            class="h-[34px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[78px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[132px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[50px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -left-[17px] top-[190px] rounded-s-lg">
                                        </div>

                                        <div
                                            class="h-[68px] w-[3px] bg-gray-300 dark:bg-gray-700 absolute -right-[17px] top-[148px] rounded-e-lg">
                                        </div>

                                        <!-- SCREEN -->
                                        <div
                                            class="rounded-[2.1rem] overflow-hidden w-[282px] h-[592px] bg-gray-50 dark:bg-gray-950 flex flex-col relative">

                                            <!-- NOTCH -->
                                            <div
                                                class="absolute top-0 left-1/2 -translate-x-1/2 w-[145px] h-[30px] bg-gray-800 rounded-b-3xl z-10">
                                            </div>

                                            <!-- HEADER -->
                                            <div
                                                class="pt-8 px-4 pb-3 border-b border-gray-200 dark:border-gray-800 text-center text-sm font-bold tracking-wide text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-950">
                                                WIBEST
                                            </div>

                                            <!-- CHAT -->
                                            <div class="flex-1 flex flex-col justify-end p-4 space-y-4">
                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-pink-700 dark:text-pink-300">
                                                        Odrzucono wniosek
                                                    </div>

                                                    <div class="mt-2 text-gray-700 dark:text-gray-300">
                                                        Zwolnienie lekarskie
                                                        <span class="block font-semibold text-gray-900 dark:text-white">
                                                            Karol Wiśniewski
                                                        </span>

                                                        <span class="text-xs">
                                                            28.01.2026 – 29.01.2026
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>
                                                <!-- SMS -->
                                                <div
                                                    class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow-sm">

                                                    <div class="font-semibold text-pink-700 dark:text-pink-300">
                                                        Zaakceptowano wniosek
                                                    </div>

                                                    <div class="mt-2 text-gray-700 dark:text-gray-300">
                                                        Zwolnienie lekarskie
                                                        <span class="block font-semibold text-gray-900 dark:text-white">
                                                            Karol Wiśniewski
                                                        </span>

                                                        <span class="text-xs">
                                                            28.01.2026 – 29.01.2026
                                                        </span>
                                                    </div>

                                                    <div
                                                        class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                                        wibest.pl/login </div>
                                                </div>

                                            </div>

                                            <!-- INPUT -->
                                            <div
                                                class="p-4 border-t border-gray-200 dark:border-gray-800 flex items-center gap-2 bg-white dark:bg-gray-950">

                                                <div
                                                    class="flex-1 bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-full h-10">
                                                </div>

                                                <div
                                                    class="w-10 h-10 bg-gray-100 dark:bg-gray-500/20 border border-gray-200 dark:border-gray-500/20 rounded-full flex items-center justify-center text-gray-700 dark:text-gray-300">
                                                    →
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            powiadomienia
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            SMS
                                        </h3>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Nie musisz regularnie sprawdzać panelu, żeby wiedzieć, że pracownik złożył wniosek.
                                    WIBEST może automatycznie wysłać SMS do osoby odpowiedzialnej za jego rozpatrzenie,
                                    dzięki czemu nowa sprawa nie ginie wśród innych zadań.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Po rozpatrzeniu wniosku pracownik może otrzymać powiadomienie SMS z informacją o
                                    jego decyzji. Dzięki temu nie musi logować się do systemu i sprawdzać statusu —
                                    informacja o akceptacji lub odrzuceniu trafia do niego automatycznie.
                                </p>
                            </div>
                        </div>

                    </section>

                    <!-- 3 PLANOWANIE -->
                    <section id="planowanie"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Planowanie / Grafik pracy
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-blue-200 to-violet-100 dark:from-blue-500/20 dark:to-violet-500/10 text-blue-300 dark:text-blue-300">
                                <i class="fa-solid fa-calendar-days text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Nie każda firma pracuje według jednego schematu. WIBEST pozwala dopasować planowanie czasu
                            pracy do rzeczywistych godzin pracy pracowników — od prostych, stałych godzin po
                            indywidualne grafiki zmienne. Dzięki temu pracownik i przełożony zawsze wiedzą, kiedy
                            zaplanowana jest praca.
                        </p>

                        <div class="grid md:grid-cols-2 gap-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            Powtarzający się grafik pracy
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            Stały
                                        </h3>
                                    </div>
                                </div>
                                <div
                                    class="w-fit mb-4 bg-gray-50 dark:bg-gray-800 sm:border border-gray-100 dark:border-gray-700 rounded-xl sm:p-4 sm:shadow animate-float delay-200">
                                    <div
                                        class="font-bold grid grid-cols-7 gap-1 text-xs text-gray-700 dark:text-gray-300 text-center text-xs uppercase">
                                        <span class="system-font">Pon</span>
                                        <span class="system-font">Wt</span>
                                        <span class="system-font">Śr</span>
                                        <span class="system-font">Czw</span>
                                        <span class="system-font">Pt</span>
                                        <span class="system-font">Sob</span>
                                        <span class="system-font">Ndz</span>
                                    </div>
                                    <div class="grid grid-cols-7 gap-1 mt-2">
                                        <div class="p-0 col-span-5">
                                            <div
                                                class="w-[190px] h-[68px] flex flex-col items-center justify-center text-center w-full bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-1 transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🏢
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        STA
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Ustal stałe godziny pracy dla pracownika, zespołu lub całej firmy. Przykładowo: od
                                    poniedziałku do piątku, 8:00–16:00. Raz ustawiony plan pozwala automatycznie
                                    określić zaplanowany czas pracy bez ręcznego wprowadzania godzin każdego dnia.
                                </p>
                            </div>
                            <div>
                                <div class="flex items-start justify-between gap-4 mb-8">
                                    <div>
                                        <p
                                            class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                            Grafik pracy na każdy dzień oddzielnie
                                        </p>

                                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                            Zmienny
                                        </h3>
                                    </div>
                                </div>
                                <div
                                    class="w-fit mb-4 bg-gray-50 dark:bg-gray-800 sm:border border-gray-100 dark:border-gray-700 rounded-xl sm:p-4 sm:shadow animate-float delay-200">
                                    <div
                                        class="font-bold grid grid-cols-7 gap-1 text-xs text-gray-700 dark:text-gray-300 text-center text-xs uppercase">
                                        <span class="system-font">Pon</span>
                                        <span class="system-font">Wt</span>
                                        <span class="system-font">Śr</span>
                                        <span class="system-font">Czw</span>
                                        <span class="system-font">Pt</span>
                                        <span class="system-font">Sob</span>
                                        <span class="system-font">Ndz</span>
                                    </div>
                                    <div class="grid grid-cols-7 gap-1 mt-2">
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-300 dark:bg-violet-400 hover:bg-violet-400 dark:hover:bg-violet-500">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌀
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-300 dark:bg-violet-400 hover:bg-violet-400 dark:hover:bg-violet-500">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌀
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 bg-transparent transition-colors duration-200">

                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌙
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-0">
                                            <div
                                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 transition-colors duration-200 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400">
                                                <!-- Ikona i label -->
                                                <div class="flex flex-col items-center justify-center h-full">
                                                    <span class="text-lg">
                                                        🌙
                                                    </span>
                                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                                        ZMI
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                    Zaplanuj inne godziny na poszczególne dni, gdy praca nie odbywa się według jednego
                                    schematu. Przykładowy grafik może wyglądać tak: poniedziałek 5:00–15:00, wtorek
                                    5:00–15:00, czwartek 14:00–24:00, piątek 14:00–24:00. WIBEST uwzględnia zaplanowane
                                    godziny przy ewidencji czasu pracy, dzięki czemu łatwiej kontrolować realizację
                                    grafiku.
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- 4 RAPORTY -->
                    <section id="raporty"
                        class="doc-section appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Moduł
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Raporty
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-gray-200 to-gray-100 dark:from-gray-500/20 dark:to-gray-500/10 text-gray-300 dark:text-gray-300">
                                <i class="fa-solid fa-chart-line text-2xl"></i>
                            </div>

                        </div>

                        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            WIBEST automatycznie łączy zaplanowany czas pracy, rzeczywiste zdarzenia RCP oraz informacje
                            o wnioskach. Dzięki temu w jednym raporcie możesz szybko sprawdzić, ile pracownik powinien
                            pracować, ile faktycznie przepracował i czy pojawiły się nadgodziny lub braki w realizacji
                            normy.
                        </p>

                        <!-- SINGLE CARD -->
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">

                            <!-- TOP BAR -->
                            <div
                                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 lg:p-8 border-b border-gray-200 dark:border-gray-700">

                                <div>
                                    <h1
                                        class="system-font text-2xl font-medium text-gray-900 dark:text-gray-50 tracking-widest">
                                        <span>🕜</span> Ewidencja czasu pracy
                                    </h1>
                                    <span
                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150 mt-4">
                                        01.12.2025 – 07.12.2025
                                    </span>
                                </div>
                                <!--
                                <div class="flex gap-4">
                                    <button type="button"
                                        class="system-font text-xs min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-download mr-2"></i>Pobierz
                                    </button>
                                </div>
-->
                            </div>

                            <!-- TABLE -->
                            <div class="overflow-x-auto m-4 lg:m-8 rounded-lg relative">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Data</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Zaplanowany czas
                                                pracy</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Zdarzenia</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Wnioski + Czas
                                                Pracy</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Nadgodziny</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Brak normy</th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Wnioski</th>
                                        </tr>
                                    </thead>

                                    <tbody
                                        class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        01.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08:13 – 16:45
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 32min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        32min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        02.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08:03 – 15:58
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        07h 55min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        5min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        03.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        07:51 – 16:09
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        04.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        05.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        08h 00min
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        06.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        07.12.2025
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="pointer-events-none absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-gray-50 dark:from-gray-800/70 to-transparent">
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mt-4 leading-7">
                            Nie musisz samodzielnie porównywać godzin i szukać różnic. WIBEST pokazuje najważniejsze
                            informacje obok siebie, dzięki czemu łatwo wychwycić nadgodziny, brak realizacji normy czy
                            dni, w których pojawiły się dodatkowe wnioski. </p>
                        <div class="w-full pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        </div>
                        <!-- SINGLE CARD -->
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">

                            <!-- TOP BAR -->
                            <div
                                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 lg:p-8 border-b border-gray-200 dark:border-gray-700">

                                <div>
                                    <h1
                                        class="system-font text-2xl font-medium text-gray-900 dark:text-gray-50 tracking-widest">
                                        <span>🙋🏻‍♂️</span> Lista Obecności
                                    </h1>
                                    <span
                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150 mt-4">
                                        01.12.2025 – 07.12.2025
                                    </span>
                                </div>
                                <!--
                                <div class="flex gap-4">
                                    <button type="button"
                                        class="system-font text-xs min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-download mr-2"></i>Pobierz
                                    </button>
                                </div>
-->
                            </div>

                            <!-- TABLE -->
                            <div class="overflow-x-auto m-4 lg:m-8 rounded-lg relative">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="system-font px-2 py-2 text-center">Imię i nazwisko
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    01.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    02.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    03.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    04.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    05.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    06.12.2025
                                                </span>
                                            </th>
                                            <th scope="col" class="system-font px-2 py-2 text-center">
                                                <span
                                                    class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                    07.12.2025
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody
                                        class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Anna Kowalska
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Jan Nowak
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        UW
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        UW
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Piotr Wójcik
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        PZ
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        PZ
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                                        PZ
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Mateusz Olszewski
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Lucyna Nowakowska
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Marek Dąbrowski
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Arkadiusz Zięba
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr
                                            class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        Robert Rutkowski
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                        RCP
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                                        —
                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                            <td
                                                class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                                <p
                                                    class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                                    <span
                                                        class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">

                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="pointer-events-none absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-gray-50 dark:from-gray-800/70 to-transparent">
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 mt-4 leading-7">
                            WIBEST automatycznie porządkuje informacje o obecności pracowników, pokazując w każdym dniu
                            odpowiednie oznaczenie np. RCP dla zarejestrowanego czasu pracy lub początek typu wniosku
                            zaakceptowanego, Dzięki temu cała
                            lista obecności jest czytelna i dostępna w jednym miejscu.
                        </p>

                    </section>

                </main>

            </div>
        </div>
    </section>

    <!-- SCROLL SPY SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function () {
            const stickyHeight = $('#sticky-section').outerHeight();
            if (window.location.hash) {
                const target = $(window.location.hash);

                if (target.length) {
                    setTimeout(function () {
                        $('html, body').animate({
                            scrollTop: target.offset().top - stickyHeight - 80
                        }, 800);
                    }, 100);
                }
            }
            const $sections = $(".doc-section");
            const $links = $(".nav-link");
            const $links2 = $(".nav-link-2");

            function setActive(id) {

                $links.each(function () {

                    const $el = $(this);

                    $el.removeClass("bg-green-300 text-gray-900 dark:text-gray-900 hover:bg-green-200 dark:hover:bg-green-400")
                        .addClass("text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700");
                });

                const $active = $(`.nav-link[href="#${id}"]`);

                $active.addClass("bg-green-300 text-gray-900 dark:text-gray-900 hover:bg-green-200 dark:hover:bg-green-400")
                    .removeClass("text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700");
            }

            function onScroll() {

                let scrollPos = $(window).scrollTop();

                $sections.each(function () {

                    const $section = $(this);
                    const top = $section.offset().top - stickyHeight - 81;
                    const bottom = top + $section.outerHeight();

                    if (scrollPos >= top && scrollPos <= bottom) {
                        setActive($section.attr("id"));
                        if ($section.attr("id") === "rcp") {
                            $('#progress-bar').css('width', '00%');
                            $('#step-1').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-2').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                            $('#step-3').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                            $('#step-4').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                        } else if ($section.attr("id") === "e-wnioski") {
                            $('#progress-bar').css('width', '25%');
                            $('#step-1').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-2').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-3').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                            $('#step-4').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                        } else if ($section.attr("id") === "planowanie") {
                            $('#progress-bar').css('width', '50%');
                            $('#step-1').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-2').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-3').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-4').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                        } else if ($section.attr("id") === "raporty") {
                            $('#progress-bar').css('width', '75%');
                            $('#step-1').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-2').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-3').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                            $('#step-4').removeClass('bg-gray-300 dark:bg-gray-700').addClass('bg-green-300 dark:bg-green-300')
                        } else {
                            $('#progress-bar').css('width', '0%');
                            $('#step-1').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                            $('#step-2').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                            $('#step-3').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                            $('#step-4').addClass('bg-gray-300 dark:bg-gray-700').removeClass('bg-green-300 dark:bg-green-300')
                        }
                    }
                });
            }

            $(window).on("scroll", onScroll);

            // init
            onScroll();

            // smooth scroll click (jak Flowbite docs)
            $links.on("click", function (e) {

                e.preventDefault();

                const target = $($(this).attr("href"));

                if (target.length) {

                    $("html, body").animate({
                        scrollTop: target.offset().top - stickyHeight - 80
                    }, 500);
                }
            });
            $links2.on("click", function (e) {

                e.preventDefault();

                const target = $($(this).attr("href"));

                if (target.length) {

                    $("html, body").animate({
                        scrollTop: target.offset().top - stickyHeight - 80
                    }, 500);
                }
            });
        });
    </script>

    <!-- RODZAJE WPISÓW - UI 1:1 -->
    <!--
    <section class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-12">
                Typy wpisów w systemie
            </h2>

            <div class="grid md:grid-cols-4 gap-6">

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300 dark:bg-green-400">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        Standardowy wpis czasu pracy zgodny z zaplanowanym grafikiem. Brak nadgodzin i odchyleń od
                        normy
                        dobowej.
                    </p>
                </div>


                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-indigo-300 dark:bg-indigo-400">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        System automatycznie wykrywa przekroczenie normy czasu pracy i oznacza nadgodziny w raporcie
                        dziennym.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-emerald-300 dark:bg-emerald-400">
                        <div class="text-2xl">🎯</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        Nadgodziny przypisane do konkretnego zadania lub projektu wraz z widocznością treści
                        wykonanej
                        pracy.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300/60 dark:bg-green-400/60">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-400 dark:bg-green-500">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        Praca przechodząca przez północ. Obsługuje nadgodziny, normy, zadania oraz statusy pracy w
                        czasie rzeczywistym.
                    </p>
                </div>


                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-indigo-400 dark:bg-indigo-500">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-emerald-400 dark:bg-emerald-500">
                        <div class="text-2xl">🎯</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-400/60 dark:bg-green-500/60">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-yellow-300 dark:bg-yellow-400">
                        <div class="text-2xl">⏱️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        Wielokrotne wejścia i wyjścia w ciągu dnia pracy (np. przerwy, wyjścia służbowe, urzędy).
                        System
                        agreguje wszystkie odczyty w jeden dzień pracy.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center w-full
                        bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-2
                        transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">
                        <div class="text-2xl">🏢</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        Stały harmonogram pracy powtarzany cyklicznie (np. poniedziałek–piątek w tych samych
                        godzinach).
                    </p>
                </div>


                <div>
                    <div
                        class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400 transition-colors duration-200">
                        <div class="text-2xl">🌀</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                <div>
                    <div
                        class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400 transition-colors duration-200">
                        <div class="text-2xl">🌙</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
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
                        Status systemowy informujący o zakończeniu sesji lub sytuacji wymagającej reakcji
                        użytkownika.
                    </p>
                </div>
                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-pink-200 dark:bg-pink-400/60">
                        <div class="text-2xl">🏖️</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-pink-300 uppercase">
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
                        Wszystkie wnioski pracownicze (urlop, L4, inne) z jednolitym statusem i automatycznym
                        obiegiem
                        akceptacji.
                    </p>
                </div>

                <div>
                    <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-rose-200 dark:bg-rose-400/60">
                        <div class="text-2xl">🎌</div>
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-rose-300 uppercase">
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
                        <div
                            class="text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-rose-300 uppercase">
                            RCP
                        </div>
                        <span title="Error"><span
                                class="inline-flex  items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
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
    </section>-->
    <!-- ========== FOOTER ========== -->
    <div class="bg-gray-100 dark:bg-gray-800 mt-8 lg:mt-24">
        <footer class="mt-auto w-full max-w-[85rem] py-12 px-8 mx-auto">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mb-8">
                <div class="col-span-1 sm:col-span-2 lg:col-span-1 text-center sm:text-start">
                    <h2 class="text-3xl" style='font-family: "Raleway", sans-serif;'>Karol Wiśniewski <a
                            href="wibest.pl" style='font-family: "Raleway", sans-serif;'
                            class="text-green-300 hover:text-green-400 transition-colors duration-500">WIBEST</a></h2>
                    <p class="mt-4 text-xs sm:text-sm text-muted-foreground-2 text-gray-500 text-sm dark:text-gray-400">
                        &copy; {{ date('Y') }} Wszelkie prawa zastrzeżone.
                    </p>
                </div>
                <!-- End Col -->

                <div class="col-span-1 lg:col-span-2 text-center sm:text-end">
                    <h4 class="text-xs font-semibold text-foreground uppercase text-green-300">Firma</h4>

                    <div class="mt-4 grid space-y-4 text-sm">
                        <p><a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('about') }}">O nas</a></p>
                        <p><a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('blog') }}">Blog</a></p>
                        <p><a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('contact') }}">Kontakt</a></p>
                    </div>

                </div>
                <!-- End Col -->

                <!-- End Col -->

                <div class="col-span-1 text-center sm:text-end">
                    <h4 class="text-xs font-semibold text-foreground uppercase text-green-300">Moduły</h4>

                    <div class="mt-4 grid space-y-4 text-sm">
                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('function') }}#rcp">
                                Rejestracja czasu pracy
                            </a>
                        </p>
                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('function') }}#e-wnioski">
                                Elektroniczne wnioski
                            </a>
                        </p>
                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('function') }}#planowanie">
                                Planing godzin pracy
                            </a>
                        </p>

                        <p>
                            <a class="inline-flex gap-x-2 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('function') }}#raporty">
                                Raporty
                            </a>
                        </p>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->

            <div class="pt-4 mt-4 border-t border-line-2 border-gray-500 dark:border-gray-400">
                <div class="sm:flex sm:justify-between sm:items-center">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="text-sm mx-auto sm:mx-0 flex flex-col sm:flex-row sm:space-x-4">
                            <a class="inline-flex gap-x-2 text-center justify-center sm:justify-start py-2 sm:py-8 text-gray-500 text-sm dark:text-gray-400 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('blog') }}/regulamin">Regulamin</a>
                            <a class="inline-flex gap-x-2 text-center justify-center sm:justify-start py-2 sm:py-8 text-gray-500 text-sm dark:text-gray-400 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('blog') }}/polityka-prywatnosci">Polityka prywatności</a>
                            <a class="inline-flex gap-x-2 text-center justify-center sm:justify-start py-2 sm:py-8 text-gray-500 text-sm dark:text-gray-400 text-muted-foreground-2 hover:text-foreground focus:outline-hidden focus:text-foreground"
                                href="{{ route('blog') }}/polityka-cookies">Polityka cookies</a>
                        </div>
                    </div>

                    <!-- End Col -->
                </div>
            </div>
        </footer>
    </div>

    <!-- ========== END FOOTER ========== -->
    <!-- Footer -->
    <script>
        const toggle = document.getElementById('theme-toggle');
        toggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>

</html>