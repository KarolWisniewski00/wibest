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
    <title>O WIBEST – Ewidencja czasu pracy i cennik systemu RCP</title>

    <meta name="description"
        content="Poznaj WIBEST – prosty program do ewidencji czasu pracy i RCP dla firm. Sprawdź możliwości systemu oraz aktualny cennik ewidencji czasu pracy online.">

    <meta name="keywords"
        content="WIBEST, o WIBEST, ewidencja czasu pracy, program do ewidencji czasu pracy, RCP, RCP online, system RCP, cennik RCP, cennik ewidencji czasu pracy, program RCP cena, ewidencja czasu pracy cena">

    <!-- Open Graph -->
    <meta property="og:site_name"
        content="WIBEST – Ewidencja czasu pracy i RCP">

    <meta property="og:type"
        content="website">

    <meta property="og:url"
        content="https://wibest.pl/o-nas">

    <meta property="og:title"
        content="O WIBEST – Ewidencja czasu pracy i cennik systemu RCP">

    <meta property="og:description"
        content="Poznaj WIBEST – program do ewidencji czasu pracy i RCP dla firm. Sprawdź możliwości systemu oraz aktualny cennik.">

    <meta property="og:image"
        content="{{ asset('wibest_icon_transparent_bg.png') }}">

    <meta property="og:image:alt"
        content="WIBEST – ewidencja czasu pracy i RCP">

    <!-- Twitter -->
    <meta name="twitter:title"
        content="O WIBEST – Ewidencja czasu pracy i cennik systemu RCP">

    <meta name="twitter:description"
        content="Poznaj WIBEST – program do ewidencji czasu pracy i RCP dla firm. Sprawdź możliwości systemu oraz aktualny cennik.">

    <meta name="twitter:image"
        content="{{ asset('wibest_icon_transparent_bg.png') }}">

    <meta name="twitter:image:alt"
        content="WIBEST – ewidencja czasu pracy i RCP">

    <!-- Canonical -->
    <link rel="canonical"
        href="https://wibest.pl/o-nas">

    <!-- ICON -->
    <link rel="icon"
        href="{{ asset('wibest_icon_transparent_bg.png') }}"
        type="image/png">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e37acf9c2e.js"
        crossorigin="anonymous"></script>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Raleway:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- jQuery -->
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
    <section class="px-8 py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="max-w-[85rem] mx-auto">

            <!-- INTRO -->
            <div class="text-center max-w-3xl mx-auto mb-10">

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Cennik i usługi
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Jeden główny produkt SaaS + usługi dodatkowe dla firm.
                    Skupiamy się na systemie WIBEST, który stale rozwijamy.
                </p>

            </div>


            <!-- CENTER: PRICING -->
            <div class="flex flex-col justify-between gap-8 lg:gap-12">

                <div
                    class="relative appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                    <!-- BADGE -->
                    <div
                        class="absolute -top-3 right-6 bg-green-300 text-gray-900 text-xs font-bold px-3 py-1 rounded-full">
                        WIBEST RCP
                    </div>
                    <!-- HEADER -->
                    <div class="flex items-start justify-between gap-4">

                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                WIBEST RCP
                            </p>

                            <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                Cena
                            </h3>
                        </div>

                        <div
                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-dollar-sign text-2xl"></i>
                        </div>

                    </div>
                    <!-- PRICE WRAPPER -->
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">

                        <!-- LEFT: PRICE -->
                        <div class="text-left space-y-3">

                            <h3 class="text-5xl font-black leading-none">
                                <span class="text-red-600 dark:text-red-400 line-through text-3xl mr-2">
                                    25 zł
                                </span>

                                <span class="text-green-300 dark:text-green-300">
                                    10 zł
                                </span>

                                <span class="text-lg font-medium text-gray-500 dark:text-gray-400">
                                    / użytkownik / miesiąc
                                </span>
                            </h3>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Promocja obowiązuje do odwołania.
                            </p>

                        </div>

                        <!-- RIGHT: SMS -->
                        <div class="text-left lg:text-right space-y-3 lg:ml-auto">

                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                SMS (wg zużycia):
                            </div>

                            <div class="text-base font-semibold">
                                <span class="text-red-600 dark:text-red-400 line-through mr-2">
                                    50 gr / SMS
                                </span>

                                <span class="text-green-300 dark:text-green-300">
                                    20 gr / SMS
                                </span>
                            </div>

                        </div>

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
                <!-- LEFT: SERVICES -->
                <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">

                    <!-- SERVICE 1 -->
                    <div
                        class=" appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center 
                        bg-gradient-to-br from-green-200 to-emerald-100 
                        dark:from-green-500/20 dark:to-emerald-500/10 
                        text-green-700 dark:text-green-300 mb-4">
                            <i class="fa-solid fa-clock text-2xl"></i>
                        </div>

                        <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2">
                            WIBEST RCP
                        </h3>

                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                            System ewidencji czasu pracy, e-wniosków, grafików i raportów dla firm.
                        </p>
                    </div>

                    <!-- SERVICE 2 -->
                    <div
                        class=" appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center 
                        bg-gradient-to-br from-green-200 to-emerald-100 
                        dark:from-green-500/20 dark:to-emerald-500/10 
                        text-green-700 dark:text-green-300 mb-4">
                            <i class="fa-solid fa-globe text-2xl"></i>
                        </div>

                        <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2">
                            Tworzenie stron www
                        </h3>

                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                            Nowoczesne strony internetowe, landing page i systemy sprzedażowe.
                        </p>
                    </div>

                    <!-- SERVICE 3 -->
                    <div
                        class=" appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center 
                        bg-gradient-to-br from-green-200 to-emerald-100 
                        dark:from-green-500/20 dark:to-emerald-500/10 
                        text-green-700 dark:text-green-300 mb-4">
                            <i class="fa-solid fa-code text-2xl"></i>
                        </div>

                        <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2">
                            Tworzenie aplikacji
                        </h3>

                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                            Dedykowane aplikacje webowe i systemy szyte pod potrzeby biznesu.
                        </p>
                    </div>

                    <!-- SERVICE 4 -->
                    <div
                        class=" appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center 
                        bg-gradient-to-br from-green-200 to-emerald-100 
                        dark:from-green-500/20 dark:to-emerald-500/10 
                        text-green-700 dark:text-green-300 mb-4">
                            <i class="fa-solid fa-screwdriver-wrench text-2xl"></i>
                        </div>

                        <h3 class="text-xl font-black text-gray-900 dark:text-white mb-2">
                            Serwis i wsparcie
                        </h3>

                        <p class="text-sm text-gray-600 dark:text-gray-300 leading-6">
                            Aktualizacje, rozwój systemów oraz stała pomoc techniczna.
                        </p>
                    </div>

                </div>
                <div
                    class="relative appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                    <div class="relative">

                        <p class="text-xs uppercase tracking-[0.25em] text-green-300 dark:text-green-300 mb-4">
                            Współpraca
                        </p>

                        <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                            Masz pomysł na projekt?
                        </h3>

                        <p class="max-w-2xl text-gray-600 dark:text-gray-300 mb-4 leading-7">
                            Stwórzmy nowoczesny system,
                            który będzie rozwijał Twój biznes
                            i wyróżni Twoją markę na rynku.
                        </p>

                        <div class="flex flex-col gap-4">
                            <a href="tel:451670344"
                                class="w-full lg:w-fit justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 transition">
                                <i class="fa-solid fa-paper-plane mr-2"></i>
                                Skontaktuj się
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
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