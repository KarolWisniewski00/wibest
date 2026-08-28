<!doctype html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WIBEST – Program do ewidencji czasu pracy i RCP</title>

    <meta name="description"
        content="WIBEST to program do ewidencji czasu pracy i RCP online. Rejestruj czas pracy pracowników, nadgodziny, urlopy i generuj raporty. Wypróbuj za darmo.">

    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="author" content="Karol Wiśniewski">

    <!-- Open Graph -->
    <meta property="og:locale" content="pl_PL">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="WIBEST">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="WIBEST – Program do ewidencji czasu pracy i RCP">
    <meta property="og:description"
        content="Rejestruj czas pracy pracowników, nadgodziny, urlopy i generuj raporty online. WIBEST – prosta ewidencja czasu pracy dla firm.">
    <meta property="og:image" content="{{ asset('wibest-og.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="WIBEST – ewidencja czasu pracy online">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="WIBEST – Program do ewidencji czasu pracy i RCP">
    <meta name="twitter:description"
        content="Ewidencja czasu pracy pracowników online. RCP, nadgodziny, urlopy i raporty w jednym systemie.">
    <meta name="twitter:image" content="{{ asset('wibest-og.jpg') }}">
    <meta name="twitter:image:alt" content="WIBEST – ewidencja czasu pracy online">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('wibest_icon_transparent_bg.png') }}" type="image/png">

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "name": "WIBEST",
        "applicationCategory": "BusinessApplication",
        "operatingSystem": "Web",
        "description": "Program do ewidencji czasu pracy i rejestracji czasu pracy pracowników online.",
        "url": "https://wibest.pl",
        "author": {
            "@type": "Person",
            "name": "Karol Wiśniewski"
        }
    }
    </script>

    <!-- Assets -->
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Raleway:wght@500;700;900&display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    <section
        class="bg-gradient-to-br from-gray-100 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-8 py-8 lg:py-24 grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">

            <!-- LEFT -->
            <div>
                <h1 class="text-5xl lg:text-6xl font-bold leading-tight text-gray-900 dark:text-white"
                    style="font-family: 'Raleway', sans-serif;">
                    Ewidencja czasu pracy online <br>
                    <span class="text-green-300 dark:text-green-300">prosta, szybka i bez błędów</span>
                </h1>

                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-xl">
                    Kontroluj godziny pracy, nadgodziny i urlopy w jednym systemie.
                    Idealne rozwiązanie dla małych firm i zespołów.
                </p>

                <div class="mt-4 flex flex-col md:flex-row gap-4">
                    <a href="{{route('login')}}" id="theme-toggle"
                        class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                        Wypróbuj za darmo
                    </a>

                    <a href="{{ route('function') }}"
                        class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-700 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Zobacz jak działa
                    </a>
                </div>

                <!-- TRUST -->
                <div class="mt-8 grid grid-cols-2 md:grid-cols-3 gap-6 text-sm text-gray-400">
                    <div>⏱️ Ewidencja czasu pracy</div>
                    <div>📅 Planing</div>
                    <div>📋 Wnioski</div>
                    <div>📊 Raporty PDF</div>
                    <div>🔒 Bezpieczne dane</div>
                    <div>📱 Powiadomienia SMS</div>
                    <div>📍 Lokalizacje</div>
                </div>
            </div>

            <!-- RIGHT: UI COMPOSITION -->
            <div class="relative lg:h-[400px] flex flex-col gap-4">
                <!-- TIMER -->
                <div
                    class="w-full lg:w-fit lg:absolute lg:top-0 lg:left-10 lg:translate-x-0 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl lg:p-2 shadow-xl animate-float">
                    <div
                        class="w-fit grid gap-4 appearance-none rounded-lg p-2 outline-none grid-cols-3 grid-rows-1 gap-4 w-full  shadow border border-gray-100 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 dark:text-gray-50">
                        <div class="col-span-2">
                            <!-- Data -->
                            <div class="">
                                <div class="text-center flex justify-center items-center">
                                    <div id="loaderDate"
                                        class="h-4 rounded-lg bg-gray-200 dark:bg-gray-600 w-16 mx-auto animate-pulse hidden">
                                    </div>
                                    <p class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xs"
                                        id="date">
                                        {{ mb_strtoupper(\Carbon\Carbon::now()->locale('pl')->translatedFormat('D d M'), 'UTF-8') }}
                                    </p>
                                </div>
                            </div>
                            <!-- Timer -->
                            <div>
                                <div class="text-center flex justify-center items-center">
                                    <div id="loaderClock"
                                        class="h-4 mt-2 rounded-lg bg-gray-200 dark:bg-gray-600 w-12 mx-auto animate-pulse hidden">
                                    </div>
                                    <p class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-lg"
                                        id="timer">
                                        00:00:00
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-start-3 h-full">
                            <!-- Przycisk Start -->
                            <div class="text-center flex justify-center items-center h-full">
                                <div id="loaderTimer"
                                    class="h-[34px] rounded-lg bg-gray-200 dark:bg-gray-600 w-[94px] mx-auto animate-pulse hidden">
                                </div>
                                <button id="startButton"
                                    class="w-[94px] system-font justify-center text-[0.6rem] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-play mr-2" aria-hidden="true"></i>Start
                                </button>
                                <!-- Przycisk Stop -->
                                <button id="stopButton"
                                    class="w-[94px] system-font hidden justify-center text-[0.6rem] min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-stop mr-2" aria-hidden="true"></i>Stop
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CALENDAR -->
                <div
                    class="w-full lg:w-fit lg:absolute lg:top-24 lg:right-0 lg:translate-x-0 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl p-4 shadow-xl animate-float delay-200">
                    <div
                        class="font-bold grid grid-cols-7 gap-1 text-xs text-gray-400 text-center text-xs text-gray-700 uppercase dark:text-gray-300">
                        <span class="system-font">Pon</span>
                        <span class="system-font">Wt</span>
                        <span class="system-font">Śr</span>
                        <span class="system-font">Czw</span>
                        <span class="system-font">Pt</span>
                        <span class="system-font">Sob</span>
                        <span class="system-font">Ndz</span>
                    </div>
                    <div id="calendarDays" class="grid grid-cols-7 gap-1 mt-2">
                        <div class="p-0">
                            <div
                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 bg-indigo-300 dark:bg-indigo-400 hover:bg-indigo-400 dark:hover:bg-indigo-500 transition-colors duration-200">
                                <!-- Ikona i label -->
                                <div class="flex flex-col items-center justify-center h-full">
                                    <span class="text-lg">
                                        ⏱️
                                    </span>
                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                        RCP
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-0">
                            <div
                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 bg-green-300 dark:bg-green-400 hover:bg-green-400 dark:hover:bg-green-500 transition-colors duration-200">
                                <!-- Ikona i label -->
                                <div class="flex flex-col items-center justify-center h-full">
                                    <span class="text-lg">
                                        ⏱️
                                    </span>
                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                        RCP
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-0">
                            <div
                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 bg-green-300 dark:bg-green-400 hover:bg-green-400 dark:hover:bg-green-500 transition-colors duration-200">
                                <!-- Ikona i label -->
                                <div class="flex flex-col items-center justify-center h-full">
                                    <span class="text-lg">
                                        ⏱️
                                    </span>
                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                        RCP
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="p-0 col-span-2">
                            <div
                                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full bg-pink-200 dark:bg-pink-400/60 rounded-2xl p-1 transition-colors duration-200 hover:bg-pink-300 dark:hover:bg-pink-500/70">
                                <!-- Ikona i label -->
                                <div class="flex flex-col items-center justify-center h-full">
                                    <span class="text-lg">
                                        🏖️
                                    </span>
                                    <span class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                            bg-pink-300 text-gray-900 uppercase tracking-widest">
                                        UW
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- REPORT -->
                <div
                    class="w-full lg:w-fit lg:absolute lg:bottom-0 lg:left-20 lg:translate-x-0 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl p-4 shadow-xl animate-float delay-400">
                    <div class="px-2 py-2">
                        <span id="workStatus"
                            class="system-font text-center w-full inline-flex py-2 items-center justify-center text-green-300 dark:text-green-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                            ✅Praca zakończona.
                        </span>


                        <div
                            class="flex flex-col md:flex-row items-center justify-center gap-2  px-2 py-2 rounded-2xl ">


                            <div class="flex flex-col items-center justify-center">
                                <span class="text-lg md:text-xl">
                                    ⏱️
                                </span>
                                <span
                                    class="system-font px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest mt-1">
                                    RCP
                                </span>
                            </div>


                            <div
                                class="flex flex-col items-center md:flex-col gap-3 text-sm md:text-base text-gray-800 dark:text-gray-100">
                                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                                        <span id="workHours"
                                            class="system-font inline-flex  items-center text-gray-500 dark:text-gray-500 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08:00 - 16:00
                                        </span>
                                    </p>
                                    <p id="summaryTimer"
                                        class="system-font inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                                        <span>08:00:00</span>
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        function updateCalendar() {

    const today = new Date();

    // JS: 0 = niedziela, 1 = poniedziałek...
    // Przesuwamy tak, żeby:
    // 0 = poniedziałek ... 6 = niedziela
    const day = (today.getDay() + 6) % 7;

    const $calendar = $('#calendarDays');

    // Czyścimy cały kalendarz
    $calendar.empty();

    // Tworzymy puste dni przed dzisiejszym
    for (let i = 0; i < day; i++) {
        $calendar.append('<div></div>');
    }

    // Dzisiejszy dzień
    $calendar.append(`
        <div class="p-0">
            <div
                class="w-[38px] h-[68px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-1 bg-green-300 dark:bg-green-400 hover:bg-green-400 dark:hover:bg-green-500 transition-colors duration-200">

                <div class="flex flex-col items-center justify-center h-full">

                    <span class="text-lg">
                        ⏱️
                    </span>

                    <span
                        class="system-font px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 text-gray-900 uppercase tracking-widest">
                        RCP
                    </span>

                </div>

            </div>
        </div>
    `);
}

                        const statusWidth = $('#workStatus').outerWidth();

                        $('#workStatus').css({
                            'width': statusWidth + 'px',
                            'justify-content': 'center'
                        });

                        let timerInterval = null;
                        let seconds = 0;

                        let startTime = null;
                        let endTime = null;

                        function formatTime(totalSeconds) {
                            const hours = Math.floor(totalSeconds / 3600);
                            const minutes = Math.floor((totalSeconds % 3600) / 60);
                            const seconds = totalSeconds % 60;

                            return [
                                hours,
                                minutes,
                                seconds
                            ].map(value => String(value).padStart(2, '0')).join(':');
                        }

                        function formatClock(date) {
                            return date.toLocaleTimeString('pl-PL', {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false
                            });
                        }

                        function updateTimer() {
                            const time = formatTime(seconds);

                            // Główny timer
                            $('#timer').text(time);

                            // Czas w podsumowaniu
                            $('#summaryTimer span').text(time);
                        }

                        function updateWorkHours() {

                            const start = startTime
                                ? formatClock(startTime)
                                : '--:--';

                            const end = endTime
                                ? formatClock(endTime)
                                : '--:--';

                            $('#workHours').text(`${start} - ${end}`);
                        }

                        // START
                        $('#startButton').on('click', function () {

                            if (timerInterval !== null) {
                                return;
                            }

                            startTime = new Date();
                            endTime = null;

                            $('#startButton').addClass('hidden');
                            $('#stopButton').removeClass('hidden');

                            // Status
                            $('#workStatus')
                                .text('⚠️ W trakcie pracy.')
                                .removeClass('text-green-300 dark:text-green-300')
                                .addClass('text-yellow-300 dark:text-yellow-300');

                            // Godzina rozpoczęcia
                            updateWorkHours();

updateCalendar();

                            timerInterval = setInterval(function () {

                                seconds++;

                                updateTimer();

                            }, 1000);
                        });

                        // STOP
                        $('#stopButton').on('click', function () {

                            clearInterval(timerInterval);
                            timerInterval = null;

                            endTime = new Date();

                            $('#stopButton').addClass('hidden');
                            $('#startButton').removeClass('hidden');

                            // Status
                            $('#workStatus')
                                .text('✅ Praca zakończona.')
                                .removeClass('text-yellow-300 dark:text-yellow-300')
                                .addClass('text-green-300 dark:text-green-300');

                            // Godzina zakończenia
                            updateWorkHours();

                            // Aktualizacja czasu
                            updateTimer();
                        });

                    });
                </script>
            </div>

        </div>
    </section>



    <section class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto text-center">

            <!-- HEADER -->
            <h2 class="text-3xl font-bold mb-12 text-gray-900 dark:text-white">
                System działa w czasie rzeczywistym
            </h2>

            <!-- GRID -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

                <!-- USERS -->
                <div>
                    <div class="text-5xl mb-4">👥</div>
                    <div class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                        {{ \App\Models\WorkSession::where('event_stop_id', null)->where('status', 'W trakcie pracy')->count() }}
                    </div>
                    <p class="mt-2 text-gray-400 text-sm">
                        aktywnych użytkowników teraz
                    </p>
                </div>

                <!-- HOURS -->
                <div>
                    <div class="text-5xl mb-4">⏱️</div>
                    <div class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                        @php
                            $duration = \App\Models\WorkSession::query()
                                ->selectRaw('SUM(TIME_TO_SEC(time_in_work)) as total_seconds')
                                ->value('total_seconds');

                            $hours = intdiv($duration, 3600);
                        @endphp

                        {{ $hours }}h
                    </div>
                    <p class="mt-2 text-gray-400 text-sm">
                        zmierzonych godzin pracy
                    </p>
                </div>

                <!-- OVERTIME -->
                <div>
                    <div class="text-5xl mb-4">⚡</div>
                    <div class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                        @php
                            $duration = \App\Models\WorkSession::query()
                                ->selectRaw('SUM(GREATEST(TIME_TO_SEC(time_in_work) - 8 * 3600, 0)) as total_seconds')
                                ->value('total_seconds');

                            $hours = intdiv($duration, 3600);
                        @endphp

                        {{ $hours }}h
                    </div>
                    <p class="mt-2 text-gray-400 text-sm">
                        wykrytych nadgodzin
                    </p>
                </div>

                <!-- REQUESTS -->
                <div>
                    <div class="text-5xl mb-4">📋</div>
                    <div class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                        {{ \App\Models\Leave::whereIn('status', ['zaakceptowane', 'zrealizowane'])->count() }}
                    </div>
                    <p class="mt-2 text-gray-400 text-sm">
                        zaakceptowanych wniosków
                    </p>
                </div>

            </div>

        </div>
    </section>
    <!-- REJESTRACJA CZASU PRACY / HR -->
    <section id="features" class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">

            <!-- INTRO -->
            <div class="text-center max-w-3xl mx-auto mb-8">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-100 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 mb-4">
                    <span class="text-sm">⏱️</span>
                    <span
                        class="text-[0.7rem] uppercase tracking-[0.25em] font-bold text-green-700 dark:text-green-300">
                        RCP / Ewidencja czasu pracy
                    </span>
                </div>

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Rejestracja
                    <span
                        class="bg-gradient-to-r from-green-300 via-emerald-300 to-green-400 bg-clip-text text-transparent">
                        czasu pracy
                    </span>
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Automatycznie rejestruj wejścia, wyjścia, nadgodziny oraz czas pracy
                    pracowników. System sam rozpoznaje normy, braki i zdarzenia specjalne,
                    zapewniając pełną kontrolę nad ewidencją czasu pracy.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                <!-- LEFT: wpisy -->
                <div class="grid grid-cols-2 gap-4">

                    <!-- PRACA NORM -->
                    <div>
                        <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300 dark:bg-green-400 hover:bg-green-400 hover:dark:bg-green-500">
                            <div class="text-2xl">⏱️</div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                                RCP
                            </div>
                            <div class="system-font text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                                08:00 – 16:00
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                08:00:00
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                Norma
                            </div>
                        </div>
                    </div>

                    <!-- NADGODZINY -->
                    <div>
                        <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-indigo-300 dark:bg-indigo-400 hover:bg-indigo-400 hover:dark:bg-indigo-500">
                            <div class="text-2xl">⏱️</div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                                RCP
                            </div>
                            <div class="system-font text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                                07:30 – 16:30
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                09:00:00
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                Nadgodziny
                            </div>
                        </div>
                    </div>

                    <!-- ZADANIE -->
                    <div>
                        <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-emerald-300 dark:bg-emerald-400 hover:bg-emerald-400 hover:dark:bg-emerald-500">
                            <div class="text-2xl">🎯</div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                                RCP
                            </div>
                            <div class="system-font text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                                07:30 – 16:30
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                09:00:00
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                Nadgodziny + zadanie
                            </div>
                        </div>
                    </div>

                    <!-- BRAK NORMY -->
                    <div>
                        <div class="h-[180px] flex flex-col items-center justify-center text-center rounded-2xl p-4
                        bg-green-300/60 dark:bg-green-400/60 hover:bg-green-400/70 hover:dark:bg-green-500/70">
                            <div class="text-2xl">⏱️</div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                                RCP
                            </div>
                            <div class="system-font text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                                08:30 – 15:30
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                07:00:00
                            </div>
                            <div
                                class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                Brak normy
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT: korzyści RCP -->
                <div
                    class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                    <!-- HEADER -->
                    <div class="flex items-start justify-between gap-4 mb-8">

                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                RCP / Ewidencja czasu pracy
                            </p>

                            <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                Inteligentna kontrola czasu pracy
                            </h3>
                        </div>

                        <div
                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-clock text-2xl"></i>
                        </div>

                    </div>

                    <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                        System automatycznie analizuje każdy wpis czasu pracy — rozpoznaje normę,
                        nadgodziny, braki oraz zmiany nocne bez ręcznego sprawdzania danych przez HR.
                    </p>

                    <!-- FEATURES -->
                    <div class="mt-8 space-y-4">

                        <!-- item -->
                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                📲
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Powiadomienia o nadgodzinach
                                </h4>

                                <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                    Pracownik otrzymuje wiadomość SMS w momencie rozpoczęcia
                                    pracy w nadgodzinach.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                📍
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Lokalizacja START / STOP
                                </h4>

                                <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                    System zapisuje lokalizację użytkownika podczas rozpoczęcia
                                    i zakończenia pracy.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                🎯
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Zadania w nadgodzinach
                                </h4>

                                <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                    Nadgodziny mogą wymagać przypisanego zadania oraz
                                    akceptacji przełożonego.
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- CTA -->
                    <div class="mt-8 flex flex-col gap-4">
                        <a href="{{route('login')}}" id="theme-toggle"
                            class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                            Wypróbuj za darmo
                        </a>

                        <a href="{{ route('function') }}"
                            class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-700 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Dowiedz się więcej
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section id="leave" class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">

            <!-- INTRO -->
            <div class="text-center max-w-3xl mx-auto mb-8">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-pink-100 dark:bg-pink-500/10 border border-pink-200 dark:border-pink-500/20 mb-4">
                    <span class="text-sm">📋</span>
                    <span class="text-[0.7rem] uppercase tracking-[0.25em] font-bold text-pink-700 dark:text-pink-300">
                        Wnioski / Nieobecności
                    </span>
                </div>

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Obsługa wniosków
                    <span class="bg-gradient-to-r from-pink-300 via-pink-400 to-rose-400 bg-clip-text text-transparent">
                        bez papieru
                    </span>
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Zarządzaj urlopami, zwolnieniami i wszystkimi typami nieobecności
                    w jednym miejscu. Pracownicy składają wnioski online, a kadra
                    natychmiast widzi ich wpływ na dostępność oraz plan pracy zespołu.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                <!-- LEFT: informacje -->
                <div
                    class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                    <div class="flex items-start justify-between gap-4 mb-8">

                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                Wnioski / Nieobecności
                            </p>

                            <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                Wszystkie nieobecności w jednym miejscu
                            </h3>
                        </div>

                        <div
                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                            <i class="fa-solid fa-inbox text-2xl"></i>
                        </div>

                    </div>

                    <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                        Obsługuj urlopy, zwolnienia lekarskie, odbiory nadgodzin oraz inne
                        wnioski pracownicze bez papierowych dokumentów i wiadomości e-mail.
                    </p>

                    <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                        Wnioski są widoczne w całym systemie — od planningu i rejestracji czasu pracy,
                        aż po raporty i rozliczenia. Dzięki temu każdy dział pracuje zawsze
                        na aktualnych danych.
                    </p>

                    <!-- FEATURES -->
                    <div class="mt-8 space-y-4">

                        <!-- item -->
                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                🏖️
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Urlopy i nieobecności
                                </h4>

                                <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                    Obsługa urlopów wypoczynkowych, bezpłatnych,
                                    zwolnień lekarskich i wielu innych typów wniosków.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                📲
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Powiadomienia SMS
                                </h4>

                                <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                    Pracownik otrzymuje wiadomość SMS po złożeniu,
                                    akceptacji lub odrzuceniu wniosku.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                🛡️
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Kontrola poprawności danych
                                </h4>

                                <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                    System blokuje składanie kilku wniosków w tej samej dacie
                                    oraz pilnuje zgodności z rejestracją czasu pracy.
                                </p>
                            </div>
                        </div>


                    </div>

                    <!-- CTA -->
                    <div class="mt-8 flex flex-col gap-4">
                        <a href="{{route('login')}}" id="theme-toggle"
                            class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                            Wypróbuj za darmo
                        </a>

                        <a href="{{ route('function') }}"
                            class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-700 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Dowiedz się więcej
                        </a>
                    </div>

                </div>

                <!-- RIGHT: korzyści HR -->
                <div
                    class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                    <div class="mb-4" id="leave-requests">
                        <div class="relative">

                            <ul class="grid w-full gap-4 lg:grid-cols-2">

                                <!--[if BLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]-->
                                <li>
                                    <label for="wolne-za-prace-w-swieto"
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                                <li>
                                    <label for="urlop-wypoczynkowy"
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                                <li class="hidden lg:block">
                                    <label for="urlop-bezplatny"
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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
                                        class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-gray-100 border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
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

                            </ul>
                            <div
                                class="pointer-events-none absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-gray-100 dark:from-gray-800/70 to-transparent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PLANING / GRAFIKI -->
    <section id="planning" class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900 overflow-hidden">
        <div class="max-w-[85rem] mx-auto">

            <!-- INTRO -->
            <div class="text-center max-w-3xl mx-auto mb-8">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-violet-100 dark:bg-violet-500/10 border border-violet-200 dark:border-violet-500/20 mb-4">
                    <span class="text-sm">🗓️</span>
                    <span
                        class="text-[0.7rem] uppercase tracking-[0.25em] font-bold text-violet-700 dark:text-violet-300">
                        Planning / Grafiki
                    </span>
                </div>

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Elastyczne planowanie
                    <span
                        class="bg-gradient-to-r from-blue-400 via-violet-400 to-violet-500 bg-clip-text text-transparent">
                        czasu pracy
                    </span>
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Twórz stałe oraz zmienne harmonogramy pracy dla całych zespołów.
                    Układaj identyczne zmiany lub planuj każdy dzień indywidualnie —
                    dokładnie tak, jak działa Twoja firma.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                <!-- LEFT -->
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">

                        <!-- PRACA NORM -->
                        <div class="col-span-2">
                            <div class="h-[180px] flex flex-col items-center justify-center text-center w-full
                        bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-2
                        transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">
                                <div class="text-2xl">🏢</div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                                    STA
                                </div>
                                <div class="system-font text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                                    08:00 – 16:00
                                </div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                    08:00:00
                                </div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                    Planing stały
                                </div>
                            </div>
                        </div>

                        <!-- NADGODZINY -->
                        <div>
                            <div
                                class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-300 dark:bg-violet-400 hover:bg-violet-400 dark:hover:bg-violet-500 transition-colors duration-200">
                                <div class="text-2xl">🌀</div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                                    ZMI
                                </div>
                                <div class="system-font text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                                    08:00 – 16:00
                                </div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                    08:00:00
                                </div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                    PLaning zmienny
                                </div>
                            </div>
                        </div>

                        <!-- ZADANIE -->
                        <div>
                            <div
                                class="h-[180px] flex flex-col items-center justify-center text-center w-full rounded-2xl p-2 bg-violet-400 dark:bg-violet-500 hover:bg-violet-300 dark:hover:bg-violet-400 transition-colors duration-200">
                                <div class="text-2xl">🌙</div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold bg-white/60 uppercase">
                                    ZMI
                                </div>
                                <div class="system-font text-gray-900 dark:text-gray-100 mt-3 text-sm font-bold">
                                    20:00 – 04:00
                                </div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                    08:00:00
                                </div>
                                <div
                                    class="system-font text-gray-900 dark:text-gray-900 text-[0.7rem] mt-1 uppercase font-semibold">
                                    PLaning zmienny
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT -->
                <div
                    class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                    <div class="flex items-start justify-between gap-4 mb-8">

                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                Planning / Grafiki
                            </p>

                            <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                Planning dopasowany do organizacji pracy
                            </h3>
                        </div>

                        <div
                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-blue-200 to-violet-100 dark:from-blue-500/20 dark:to-violet-500/10 text-blue-300 dark:text-blue-300">
                            <i class="fa-solid fa-calendar-days text-2xl"></i>
                        </div>

                    </div>


                    <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                        Twórz stałe harmonogramy dla pracowników pracujących w tych samych godzinach
                        lub układaj zmienne grafiki, gdzie każdy dzień może wyglądać inaczej.
                    </p>

                    <p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                        Planning współpracuje z rejestracją czasu pracy oraz wnioskami pracowników,
                        dzięki czemu wszystkie informacje o obecnościach, zmianach i nieobecnościach
                        znajdują się w jednym miejscu.
                    </p>

                    <div class="space-y-4">

                        <!-- ITEM -->
                        <div class="flex items-start gap-4">

                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-blue-200 to-indigo-100 dark:from-blue-500/20 dark:to-indigo-500/10 text-blue-300 dark:text-blue-300">
                                🏢
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Grafik stały
                                </h4>

                                <p class="text-gray-600 dark:text-gray-300 text-sm leading-6">
                                    Idealny dla pracowników pracujących według jednego,
                                    powtarzalnego harmonogramu.
                                </p>
                            </div>
                        </div>

                        <!-- ITEM -->
                        <div class="flex items-start gap-4">


                            <div
                                class="shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-violet-200 to-purple-100 dark:from-violet-500/20 dark:to-purple-500/10 text-violet-300 dark:text-violet-300">
                                🌀
                            </div>

                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                    Grafik zmienny
                                </h4>

                                <p class="text-gray-600 dark:text-gray-300 text-sm leading-6">
                                    Możliwość ustawienia innych godzin pracy dla każdego dnia,
                                    zmiany lub pracownika.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="mt-8 flex flex-col gap-4">
                        <a href="{{route('login')}}" id="theme-toggle"
                            class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                            Wypróbuj za darmo
                        </a>

                        <a href="{{ route('function') }}"
                            class="system-font justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-700 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Dowiedz się więcej
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="relative px-8 py-8 lg:py-24 bg-white dark:bg-gray-900 overflow-hidden">

        <div class="relative max-w-[85rem] mx-auto">

            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">

                <!-- TELEFON -->
                <div class="flex justify-center lg:justify-start overflow-hidden h-[430px] lg:h-[480px]">

                    <div class="relative lg:scale-[1.18] mx-auto -translate-y-52">

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
                                        class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow">

                                        <div class="font-semibold text-green-700 dark:text-green-300">
                                            Start nadgodzin
                                        </div>

                                        <div class="mt-2 text-gray-600 dark:text-gray-300">
                                            Dzisiejsza norma:
                                            <span class="block font-bold text-gray-900 dark:text-white">
                                                08:00:00
                                            </span>
                                        </div>

                                        <div class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                            wibest.pl/login </div>
                                    </div>

                                    <!-- SMS -->
                                    <div
                                        class="bg-green-50 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow">

                                        <div class="font-semibold text-green-700 dark:text-green-300">
                                            Koniec pracy
                                        </div>

                                        <div class="mt-2 text-gray-600 dark:text-gray-300">
                                            Dzisiejsza norma:
                                            <span class="block font-bold text-gray-900 dark:text-white">
                                                08:04:13
                                            </span>
                                        </div>

                                        <div class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
                                            wibest.pl/login </div>
                                    </div>

                                    <!-- SMS -->
                                    <div
                                        class="bg-pink-50 dark:bg-pink-500/10 border border-pink-200 dark:border-pink-500/20 text-gray-800 dark:text-gray-100 px-4 py-3 rounded-2xl rounded-bl-sm max-w-[88%] self-start text-sm leading-tight shadow">

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

                                        <div class="mt-2 text-[0.75rem] text-blue-600 dark:text-blue-400 underline">
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

                <!-- CONTENT -->
                <div class=" relative z-10">

                    <!-- LABEL -->
                    <div class="text-center lg:text-start">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gray-100 dark:bg-gray-500/10 border border-gray-200 dark:border-gray-500/20 mb-4">
                            <span class="text-sm">📱</span>
                            <span
                                class="text-[0.7rem] uppercase tracking-[0.25em] font-bold text-gray-700 dark:text-gray-300">
                                Powiadomienia SMS
                            </span>
                        </div>
                    </div>


                    <!-- HEADING -->
                    <h2
                        class="text-center lg:text-start text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                        Automatyczne powiadomienia SMS dla pracowników i managerów
                    </h2>

                    <!-- SEO DESCRIPTION -->
                    <p class="text-center lg:text-start text-gray-600 dark:text-gray-300 mb-4">
                        Informuj pracowników o rozpoczęciu pracy, nadgodzinach, akceptacji wniosków i zmianach czasu
                        pracy
                        automatycznie przez SMS — bez konieczności logowania do systemu.
                    </p>

                    <!-- FEATURES -->
                    <div class="mt-8 grid sm:grid-cols-2 gap-4">

                        <div
                            class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                            <div
                                class="mb-4 shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                ⚡
                            </div>

                            <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                Alerty o nadgodzinach
                            </h4>

                            <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                System automatycznie wykrywa przekroczenie czasu pracy i wysyła SMS w czasie
                                rzeczywistym.
                            </p>
                        </div>
                        <div
                            class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                            <div
                                class="mb-4 shrink-0 text-2xl flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                📄
                            </div>

                            <h4 class="font-bold text-gray-900 dark:text-white mb-1">
                                Decyzje o wnioskach
                            </h4>

                            <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                                Akceptacja lub odrzucenie urlopu i zwolnień wysyłane natychmiast przez SMS.
                            </p>
                        </div>
                    </div>

                    <!-- SMALL TRUST TEXT -->
                    <p class="text-center lg:text-start mt-8 text-sm text-gray-500 dark:text-gray-400">
                        Responsywny podgląd wiadomości zoptymalizowany pod urządzenia mobilne i szybkie odczytywanie.
                    </p>

                </div>

            </div>
        </div>
    </section>

    <section id="reports" class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">

            <!-- INTRO -->
            <div class="text-center max-w-3xl mx-auto mb-8">

                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 mb-4">
                    <span class="text-sm">📊</span>
                    <span class="text-[0.7rem] uppercase tracking-[0.25em] font-bold text-gray-700 dark:text-gray-300">
                        Raporty RCP
                    </span>
                </div>

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Analiza czasu pracy i raporty PDF
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Każdy raport łączy ewidencję czasu pracy, analizę norm oraz wykrywanie odchyleń.
                    System automatycznie przygotowuje dane do eksportu PDF i wskazuje niezgodności.
                </p>
            </div>

            <!-- SINGLE CARD -->
            <div
                class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 outline-none dark:bg-gray-800 dark:text-gray-50 shadow-sm overflow-hidden">

                <!-- TOP BAR -->
                <div
                    class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-4 lg:p-8 border-b border-gray-200 dark:border-gray-700">

                    <div>
                        <h1 class="system-font text-2xl font-medium text-gray-900 dark:text-gray-50 tracking-widest">
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

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="system-font px-2 py-2 text-center">Data</th>
                                <th scope="col" class="system-font px-2 py-2 text-center">Zaplanowany czas pracy</th>
                                <th scope="col" class="system-font px-2 py-2 text-center">Zdarzenia</th>
                                <th scope="col" class="system-font px-2 py-2 text-center">Wnioski + Czas Pracy</th>
                                <th scope="col" class="system-font px-2 py-2 text-center">Nadgodziny</th>
                                <th scope="col" class="system-font px-2 py-2 text-center">Brak normy</th>
                                <th scope="col" class="system-font px-2 py-2 text-center">Wnioski</th>
                            </tr>
                        </thead>

                        <tbody
                            class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">

                            <tr
                                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            01.12.2025
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08:13 – 16:45
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 32min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            32min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            02.12.2025
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08:03 – 15:58
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            07h 55min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            5min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            03.12.2025
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            07:51 – 16:09
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            04.12.2025
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            05.12.2025
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            08h 00min
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            06.12.2025
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            07.12.2025
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <p
                                        class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 font-semibold w-fit text-start text-sm py-2">
                                        <span
                                            class="system-font inline-flex  items-center text-gray-400 dark:text-gray-400 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                            —
                                        </span>
                                    </p>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                        class="pointer-events-none absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-white dark:from-gray-800/70 to-transparent">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="locations" class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">

            <!-- INTRO -->
            <div class="text-center max-w-3xl mx-auto mb-8">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-100 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 mb-4">
                    <span class="text-sm">📍</span>
                    <span
                        class="text-[0.7rem] uppercase tracking-[0.25em] font-bold text-green-700 dark:text-green-300">
                        Lokalizacje GPS i zadania
                    </span>
                </div>

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Lokalizacja pracy i zadania w
                    <span
                        class="bg-gradient-to-r from-green-300 via-emerald-300 to-green-400 bg-clip-text text-transparent">
                        nadgodzinach
                    </span>
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Każde rozpoczęcie, zakończenie pracy oraz realizacja zadania w nadgodzinach może zostać
                    automatycznie powiązana z lokalizacją GPS. System zapisuje współrzędne, czas wykonania oraz
                    szczegóły zadania w pełnym rejestrze audytowym.
                </p>

            </div>

            <!-- MAIN CARD -->
            <div
                class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 outline-none dark:bg-gray-800 dark:text-gray-50 overflow-hidden">

                <!-- HEADER -->
                <div
                    class="p-4 lg:p-8 border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div class="flex items-start justify-between gap-4 w-full">

                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                RCP / Ewidencja czasu pracy
                            </p>

                            <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                Rejestracja czasu pracy
                            </h3>
                        </div>

                        <div
                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-clock text-2xl"></i>
                        </div>

                    </div>
                </div>

                <!-- CONTENT GRID -->
                <div class="grid gap-4 p-4">
                    <div
                        class="flex flex-col gap-4 w-full h-full appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50 md:col-span-2 mb-4">
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Zdarzenie
                            </x-text-cell-label>
                            <x-status-gray class="text-2xl system-font">
                                🎯 Zadanie
                            </x-status-gray>
                        </x-text-cell>
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Treść
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <div
                                    class="system-font text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                                    Montaż instalacji elektrycznej — hala produkcyjna B
                                </div>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <span
                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                        📅 01.12.2025 16:44:34
                                    </span>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->

                    </div>
                </div>
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4">
                    <div
                        class="flex flex-col gap-4 appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50 mb-4">
                        <!--status-->
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Zdarzenie
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-green class="system-font">
                                        🟢 Start
                                    </x-status-green>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--status-->
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <span
                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                        📅 01.12.2025 08:13:11
                                    </span>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        <!--Lokalizacja-->
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Lokalizacja
                            </x-text-cell-label>
                            <div id="map_start"
                                style="z-index:1; height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;">
                            </div>
                        </x-text-cell>
                        <!--Lokalizacja-->
                        <input type="hidden" id="latitude_start" value="50.2649">
                        <input type="hidden" id="longitude_start" value="19.0238">
                        <script>
                            $(document).ready(function () {
                                // 1. Odczytanie danych z ukrytych inputów
                                const latitude = $('#latitude_start').val();
                                const longitude = $('#longitude_start').val();

                                // Konwersja na liczby zmiennoprzecinkowe jest często bezpieczna
                                const lat = parseFloat(latitude);
                                const lon = parseFloat(longitude);

                                // Sprawdzenie, czy dane zostały poprawnie odczytane (opcjonalne, ale zalecane)
                                if (isNaN(lat) || isNaN(lon)) {
                                    console.error('Nie udało się odczytać prawidłowych współrzędnych z ukrytych pól.');
                                    return; // Przerwij działanie, jeśli dane są nieprawidłowe
                                }

                                // 2. Inicjalizacja mapy Leaflet
                                const map = L.map('map_start').setView([lat, lon], 13);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                                const greenIcon = L.icon({
                                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41],
                                    popupAnchor: [1, -34],
                                    shadowSize: [41, 41]
                                });
                                L.marker([lat, lon], {
                                    icon: greenIcon
                                }).addTo(map);
                            });
                        </script>
                    </div>
                    <div
                        class="flex flex-col gap-4 appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-50 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50 mb-4">
                        <!--status-->
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Zdarzenie
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <x-status-red class="system-font">
                                        🔴 Stop
                                    </x-status-red>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--status-->
                        <!--Czas w pracy-->
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Kiedy
                            </x-text-cell-label>
                            <x-text-cell-value>
                                <x-text-cell-span class="gap-2 w-full">
                                    <span
                                        class="system-font inline-flex  items-center text-blue-300 dark:text-blue-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150">
                                        📅 01.12.2025 16:45:20
                                    </span>
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Czas w pracy-->
                        <!--Lokalizacja-->
                        <x-text-cell>
                            <x-text-cell-label class="system-font">
                                Lokalizacja
                            </x-text-cell-label>
                            <div id="map_stop"
                                style="z-index:1; height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;">
                            </div>
                        </x-text-cell>
                        <!--Lokalizacja-->
                        <input type="hidden" id="latitude_stop" value="50.2945">
                        <input type="hidden" id="longitude_stop" value="18.6714">
                        <script>
                            $(document).ready(function () {
                                // 1. Odczytanie danych z ukrytych inputów
                                const latitude = $('#latitude_stop').val();
                                const longitude = $('#longitude_stop').val();

                                // Konwersja na liczby zmiennoprzecinkowe jest często bezpieczna
                                const lat = parseFloat(latitude);
                                const lon = parseFloat(longitude);

                                // Sprawdzenie, czy dane zostały poprawnie odczytane (opcjonalne, ale zalecane)
                                if (isNaN(lat) || isNaN(lon)) {
                                    console.error('Nie udało się odczytać prawidłowych współrzędnych z ukrytych pól.');
                                    return; // Przerwij działanie, jeśli dane są nieprawidłowe
                                }

                                // 2. Inicjalizacja mapy Leaflet
                                const map = L.map('map_stop').setView([lat, lon], 13);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                                const greenIcon = L.icon({
                                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                                    iconSize: [25, 41],
                                    iconAnchor: [12, 41],
                                    popupAnchor: [1, -34],
                                    shadowSize: [41, 41]
                                });
                                L.marker([lat, lon], {
                                    icon: greenIcon
                                }).addTo(map);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="faq" class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">
            <!-- INTRO -->
            <div class="text-center max-w-3xl mx-auto mb-8">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 mb-4">
                    <span class="text-sm">❓</span>
                    <span class="text-[0.7rem] uppercase tracking-[0.25em] font-bold text-gray-700 dark:text-gray-300">
                        FAQ
                    </span>
                </div>
                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Najczęściej zadawane pytania
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Wszystko co musisz wiedzieć o RCP, raportach, GPS i automatyzacji czasu pracy.
                </p>
            </div>
            <!-- ACCORDION -->
            <div class="max-w-3xl mx-auto space-y-4">
                <!-- ITEM -->
                <div
                    class="faq-card appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 outline-none dark:bg-gray-800 dark:text-gray-50 overflow-hidden">
                    <button
                        class="faq-toggle w-full flex items-center justify-between p-4 lg:p-8 text-left focus:outline-none">
                        <span class="font-semibold text-gray-900 dark:text-white">Czym jest WIBEST?</span>
                        <span
                            class="toggle-icon transform transition-transform duration-500 text-xl text-green-300">+</span>
                    </button>
                    <div
                        class="border-gray-200 dark:border-gray-700 faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-800">
                        <div class="p-4 lg:p-8 text-gray-600 dark:text-gray-400 text-sm leading-7">
                            WIBEST to internetowy program do ewidencji i rejestracji czasu pracy pracowników. System RCP
                            pozwala rejestrować rozpoczęcie i zakończenie pracy, kontrolować nadgodziny, obsługiwać
                            wnioski pracownicze, planować czas pracy oraz generować raporty.
                        </div>
                    </div>
                </div>

                <!-- ITEM 2 -->
                <div
                    class="faq-card appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 outline-none dark:bg-gray-800 dark:text-gray-50 overflow-hidden">
                    <button
                        class="faq-toggle w-full flex items-center justify-between p-4 lg:p-8 text-left focus:outline-none">
                        <span class="font-semibold text-gray-900 dark:text-white">Ile kosztuje WIBEST?</span>
                        <span
                            class="toggle-icon transform transition-transform duration-500 text-xl text-green-300">+</span>
                    </button>
                    <div
                        class="border-gray-200 dark:border-gray-700 faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-800">
                        <div class="p-4 lg:p-8 text-gray-600 dark:text-gray-400 text-sm leading-7">
                            WIBEST oferuje prosty model rozliczenia zależny od liczby użytkowników. Firma może korzystać
                            z systemu bez konieczności kupowania drogiej infrastruktury czy instalowania programu na
                            komputerach pracowników. Aktualny cennik oraz dostępne warunki korzystania z WIBEST
                            znajdziesz w zakładce O nas.
                        </div>
                    </div>
                </div>
                <!-- ITEM 3 -->
                <div
                    class="faq-card appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 outline-none dark:bg-gray-800 dark:text-gray-50 overflow-hidden">
                    <button
                        class="faq-toggle w-full flex items-center justify-between p-4 lg:p-8 text-left focus:outline-none">
                        <span class="font-semibold text-gray-900 dark:text-white">Dla jakich firm przeznaczony jest
                            WIBEST?</span>
                        <span
                            class="toggle-icon transform transition-transform duration-500 text-xl text-green-300">+</span>
                    </button>
                    <div
                        class="border-gray-200 dark:border-gray-700 faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-800">
                        <div class="p-4 lg:p-8 text-gray-600 dark:text-gray-400 text-sm leading-7">
                            WIBEST jest przeznaczony przede wszystkim dla małych i średnich firm, które chcą sprawnie
                            prowadzić ewidencję czasu pracy pracowników. System sprawdzi się między innymi w firmach
                            budowlanych, usługowych, geodezyjnych oraz wszędzie tam, gdzie potrzebna jest wygodna
                            rejestracja czasu pracy, nadgodzin i nieobecności.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.querySelectorAll('.faq-toggle').forEach(btn => {
                btn.addEventListener('click', () => {
                    const parent = btn.parentElement;
                    const content = btn.nextElementSibling;
                    const icon = btn.querySelector('.toggle-icon');
                    content.classList.add('border-t');

                    // Zamykanie innych kart
                    document.querySelectorAll('.faq-content').forEach(el => {
                        if (el !== content) {
                            el.style.maxHeight = null;
                            el.classList.remove('border-t');
                            el.previousElementSibling.querySelector('.toggle-icon').style.transform = 'rotate(0deg)';
                        }
                    });

                    // Toggle aktywnej karty
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        content.classList.remove('border-t');
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                        icon.style.transform = 'rotate(45deg)';
                    }
                });
            });
        </script>
    </section>
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