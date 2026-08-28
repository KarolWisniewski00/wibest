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
    <title>Kontakt z WIBEST – Skontaktuj się z nami</title>

    <meta name="description"
        content="Skontaktuj się z WIBEST. Masz pytania dotyczące ewidencji czasu pracy, systemu RCP lub oferty? Napisz do nas – chętnie pomożemy.">

    <meta name="keywords"
        content="kontakt WIBEST, kontakt ewidencja czasu pracy, kontakt RCP, pomoc WIBEST, WIBEST kontakt, system RCP kontakt, ewidencja czasu pracy kontakt">

    <!-- Open Graph -->
    <meta property="og:site_name" content="WIBEST – Ewidencja czasu pracy i RCP">

    <meta property="og:type" content="website">

    <meta property="og:url" content="https://wibest.pl/kontakt">

    <meta property="og:title" content="Kontakt z WIBEST – Skontaktuj się z nami">

    <meta property="og:description"
        content="Masz pytania dotyczące WIBEST, ewidencji czasu pracy lub systemu RCP? Skontaktuj się z nami – chętnie odpowiemy na Twoje pytania.">

    <meta property="og:image" content="{{ asset('wibest_icon_transparent_bg.png') }}">

    <meta property="og:image:alt" content="WIBEST – kontakt">

    <!-- Twitter -->
    <meta name="twitter:title" content="Kontakt z WIBEST – Skontaktuj się z nami">

    <meta name="twitter:description"
        content="Masz pytania dotyczące WIBEST, ewidencji czasu pracy lub systemu RCP? Skontaktuj się z nami.">

    <meta name="twitter:image" content="{{ asset('wibest_icon_transparent_bg.png') }}">

    <meta name="twitter:image:alt" content="WIBEST – kontakt">

    <!-- Canonical -->
    <link rel="canonical" href="https://wibest.pl/kontakt">

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
            <div class="text-center max-w-3xl mx-auto mb-8">

                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-gray-900 dark:text-white mb-4">
                    Skontaktuj się z nami
                </h2>

                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Masz pytania lub chcesz wdrożyć system w swojej firmie?
                    Odpowiadamy zazwyczaj w ciągu kilku godzin.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">

                <!-- LEWA STRONA -->
                <div
                    class="h-full justify-between  appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50 flex flex-col gap-4">

                    <!-- HEADER -->
                    <div class="flex items-start justify-between gap-4">

                        <div>
                            <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                Kontakt
                            </p>

                            <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                Dane kontaktowe
                            </h3>
                        </div>

                        <div
                            class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-address-card text-2xl"></i>
                        </div>

                    </div>

                    <!-- GRID -->
                    <div class="grid gap-4">
                        <!-- EMAIL -->
                        <a href="mailto:biuro@wibest.pl"
                            class="group flex items-center gap-4 p-4 bg-white dark:bg-gray-700 rounded-lg p-4 shadow border border-gray-200 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-700/60 transition">

                            <div
                                class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-envelope text-2xl"></i>
                            </div>

                            <div class="flex-1">
                                <p class="text-xs uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-1">
                                    Email
                                </p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                    biuro@wibest.pl
                                </p>
                            </div>

                            <div
                                class="text-gray-400 group-hover:text-gray-600 dark:group-hover:text-gray-200 transition">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>
                        <!-- TELEFON -->
                        <a href="tel:+48662294073"
                            class="group flex items-center gap-4 p-4 bg-white dark:bg-gray-700 rounded-lg p-4 shadow border border-gray-200 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-700/60 transition">

                            <div
                                class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-phone text-2xl"></i>
                            </div>

                            <div class="flex-1">
                                <p class="text-xs uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-1">
                                    Telefon
                                </p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                    +48 662 294 073
                                </p>
                            </div>

                            <div
                                class="text-gray-400 group-hover:text-gray-600 dark:group-hover:text-gray-200 transition">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>

                        <!-- ADRES -->
                        <a href="https://www.google.com/maps/search/?api=1&query=Sielecka+63+42-500+Będzin"
                            target="_blank"
                            class="group flex items-center gap-4 p-4 bg-white dark:bg-gray-700 rounded-lg p-4 shadow border border-gray-200 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-700/60 transition">

                            <div
                                class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-location-dot text-2xl"></i>
                            </div>

                            <div class="flex-1">
                                <p class="text-xs uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-1">
                                    Adres
                                </p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                    Sielecka 63<br>
                                    42-500 Będzin
                                </p>
                            </div>

                            <div
                                class="text-gray-400 group-hover:text-gray-600 dark:group-hover:text-gray-200 transition">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </a>

                    </div>

                    <!-- INFO GRID -->
                    <div class="grid sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">

                        <!-- FIRMA -->
                        <div
                            class="bg-white dark:bg-gray-700 rounded-lg p-4 shadow border border-gray-200 dark:border-gray-600">

                            <div class="flex items-start justify-between gap-4 mb-4 w-full">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-1">
                                        Dane firmy
                                    </p>

                                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white leading-tight"
                                        style='font-family: "Raleway", sans-serif;'>
                                        Karol Wiśniewski
                                        <a href="https://wibest.pl" style='font-family: "Raleway", sans-serif;'
                                            class="text-green-300 hover:text-green-400 transition-colors duration-300">
                                            WIBEST
                                        </a>
                                    </h2>

                                    <p class="text-start mt-2 text-sm text-gray-500 dark:text-gray-400">
                                        NIP: 8992998536<br>
                                        REGON: 52915565800000
                                    </p>
                                </div>

                                <div
                                    class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-building text-2xl"></i>
                                </div>

                            </div>

                            <div class="pt-4 border-t border-gray-200 dark:border-gray-600">

                                <p class="text-sm font-semibold text-gray-900 dark:text-white leading-tight mb-1">
                                    ING Bank Śląski
                                </p>

                                <p class="text-start text-sm text-gray-500 dark:text-gray-400 break-all">
                                    PL48 1050 1144 1000 0023 5678 9012
                                </p>

                            </div>
                        </div>

                        <!-- GODZINY -->
                        <div
                            class="flex flex-col items-start justify-between bg-white dark:bg-gray-700 rounded-lg p-4 shadow border border-gray-200 dark:border-gray-600">

                            <div class="flex items-start justify-between gap-4 mb-4 w-full">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-1">
                                        Godziny kontaktu
                                    </p>

                                    <p class="text-lg font-semibold text-gray-900 dark:text-white leading-tight">
                                        Poniedziałek – Piątek
                                    </p>

                                    <p class="text-sm text-green-300 dark:text-green-300 font-semibold mt-1">
                                        8:00 – 16:00
                                    </p>
                                </div>
                                <div
                                    class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-clock text-2xl"></i>
                                </div>
                            </div>

                            <p class="text-start mt-2 text-sm text-gray-500 dark:text-gray-400 leading-6">
                                Odpowiadamy również poza godzinami pracy,
                                jeśli sprawa wymaga szybkiego kontaktu.
                            </p>

                        </div>

                    </div>

                    <!-- CTA -->
                    <div class="flex flex-col gap-4">
                        <a href="mailto:karol.wisniewski2901@gmail.com"
                            class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 text-white dark:bg-gray-200 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 transition">
                            <i class="fa-solid fa-envelope mr-2"></i>Napisz wiadomość
                        </a>
                        <a href="tel:451670344"
                            class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 transition">
                            <i class="fa-solid fa-phone mr-2"></i>Zadzwoń teraz
                        </a>
                    </div>

                </div>

                <!-- PRAWA STRONA -->
                <div class="flex flex-col gap-8 lg:gap-12 h-full justify-between">

                    <!-- FORMULARZ -->
                    <div
                        class=" appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">

                        <!-- HEADER -->
                        <div class="flex items-start justify-between gap-4 mb-8">

                            <div>
                                <p class="text-xs uppercase tracking-[0.25em] text-gray-500 dark:text-gray-400 mb-4">
                                    Formularz kontaktowy
                                </p>

                                <h3 class="text-3xl font-black text-gray-900 dark:text-white leading-tight">
                                    Napisz do nas
                                </h3>
                            </div>

                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300 shrink-0">
                                <i class="fa-solid fa-paper-plane text-2xl"></i>
                            </div>

                        </div>

                        <form action="{{ route('contact.send') }}" method="POST" class="grid gap-2">
                            @csrf

                            {{-- SUCCESS --}}
                            @if (session('success'))
                                <div
                                    class="p-4 mb-2 rounded-lg bg-green-100 border border-green-200 text-green-800 dark:bg-green-900/30 dark:border-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-circle-check mr-2"></i>
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- ERROR --}}
                            @if ($errors->any())
                                <div
                                    class="p-4 mb-2 rounded-lg bg-red-100 border border-red-200 text-red-800 dark:bg-red-900/30 dark:border-red-700 dark:text-red-300">
                                    <i class="fa-solid fa-circle-exclamation mr-2"></i>
                                    Sprawdź poprawność formularza.
                                </div>
                            @endif

                            {{-- ROW --}}
                            <div class="grid md:grid-cols-2 gap-2">

                                {{-- NAME --}}
                                <div>
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                        <span>👤</span> Imię i nazwisko
                                    </label>

                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                        placeholder="Jan Kowalski"
                                        class="w-full mt-1 px-4 py-3 rounded-lg bg-white shadow dark:bg-gray-700 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-200 dark:border-gray-600' }} focus:outline-none focus:ring-2 focus:ring-green-300">

                                    @error('name')
                                        <p class="mt-1 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                {{-- EMAIL --}}
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                        <span>✉️</span> Email
                                    </label>

                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        placeholder="kontakt@firma.pl"
                                        class="w-full mt-1 px-4 py-3 rounded-lg bg-white shadow dark:bg-gray-700 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-200 dark:border-gray-600' }} focus:outline-none focus:ring-2 focus:ring-green-300">

                                    @error('email')
                                        <p class="mt-1 text-sm text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                            {{-- TELEFON --}}
                            <div>
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>📞</span> Telefon
                                </label>

                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    placeholder="+48 500 000 000"
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-white shadow dark:bg-gray-700 border {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-200 dark:border-gray-600' }} focus:outline-none focus:ring-2 focus:ring-green-300">

                                @error('phone')
                                    <p class="mt-1 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- WIADOMOŚĆ --}}
                            <div>
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>💬</span> Wiadomość
                                </label>

                                <textarea name="message" id="message" rows="5" placeholder="Opisz czego potrzebujesz..."
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-white shadow dark:bg-gray-700 border {{ $errors->has('message') ? 'border-red-500' : 'border-gray-200 dark:border-gray-600' }} focus:outline-none focus:ring-2 focus:ring-green-300">{{ old('message') }}</textarea>

                                @error('message')
                                    <p class="mt-1 text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- CTA --}}
                            <div class="flex flex-col gap-4">
                                <button type="submit"
                                    class="justify-center text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 transition">

                                    <i class="fa-solid fa-paper-plane mr-3"></i>
                                    Wyślij wiadomość

                                </button>
                            </div>

                        </form>
                    </div>

                    <!-- MAPA -->
                    <div
                        class=" appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 outline-none dark:bg-gray-800 dark:text-gray-50 overflow-hidden">

                        <!-- MAP -->
                        <div class="relative h-[350px]">

                            <iframe class="w-full h-full border-0" loading="lazy" allowfullscreen
                                src="https://www.google.com/maps?q=Sielecka+63+Bedzin&output=embed">
                            </iframe>

                            <!-- OVERLAY CARD -->
                            <div class="absolute left-5 bottom-5 right-5 sm:right-auto">

                                <a href="https://www.google.com/maps/search/?api=1&query=Sielecka+63+42-500+Będzin"
                                    target="_blank"
                                    class="group flex items-center gap-4 p-4 bg-white dark:bg-gray-700 rounded-lg p-4 shadow border border-gray-200 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-700/60 transition">

                                    <div
                                        class="shrink-0 flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-location-dot text-2xl"></i>
                                    </div>

                                    <div class="flex-1">
                                        <p
                                            class="text-xs uppercase tracking-widest text-gray-500 dark:text-gray-400 mb-1">
                                            Adres
                                        </p>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                            Sielecka 63<br>
                                            42-500 Będzin
                                        </p>
                                    </div>

                                    <div
                                        class="text-gray-400 group-hover:text-gray-600 dark:group-hover:text-gray-200 transition">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>

                            </div>

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
    @include('admin.elements.alerts')
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