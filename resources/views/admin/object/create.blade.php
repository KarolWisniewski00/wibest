<x-app-layout class="flex">

    @include('admin.elements.alerts')

    <x-main-no-filter>

        <x-object.nav />

        <x-container-content-no-shadow>

            <form method="POST" action="" class="space-y-4">

                @csrf

                {{-- ========================================================= --}}
                {{-- HEADER --}}
                {{-- ========================================================= --}}
                <div class="flex items-start justify-start">
                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('setting.crm') }}" class="text-lg mb-4">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                    </x-button-link-back>
                    <!--POWRÓT-->
                </div>



                {{-- ========================================================= --}}
                {{-- MAIN GRID --}}
                {{-- ========================================================= --}}

                <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">


                    {{-- ===================================================== --}}
                    {{-- LEFT COLUMN --}}
                    {{-- ===================================================== --}}

                    <div class="space-y-4 xl:col-span-2">


                        {{-- ================================================= --}}
                        {{-- INFORMACJE PODSTAWOWE --}}
                        {{-- ================================================= --}}

                        <div class="overflow-hidden rounded-2xl bg-gray-700">

                            <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div id="info"
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-cube text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                            Informacje o obiekcie
                                        </h2>

                                        <p class="text-start text-xs text-gray-400">
                                            Podstawowe informacje dotyczące miejsca pracy
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <div class="space-y-5 p-5">

                                {{-- NAZWA --}}
                                <div class="mb-4 text-start">
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300"><span>📝</span>Nazwa
                                        obiektu</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus
                                        placeholder="Wpisz nazwę" required
                                        class="h-[46px] placeholder-gray-400 mt-2 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-600 dark:border-gray-600 dark:text-gray-100 !text-lg !leading-7 !pl-3">
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- TYP OBIEKTU --}}

                                <style>
                                    @media (prefers-color-scheme: dark) {
                                        .ts-dropdown .active {
                                            background-color: rgb(75 85 99) !important;
                                            color: #fff !important;
                                        }

                                        .ts-dropdown .ts-dropdown-content {
                                            max-height: 300px !important;
                                            overflow-y: auto !important;
                                        }

                                        .ts-control input::placeholder {
                                            color: rgb(156 163 175);
                                        }

                                        .ts-dropdown {
                                            border: 1px solid rgb(75 85 99) !important;
                                            border-radius: 0.5rem !important;
                                        }

                                        .option {
                                            padding-left: 12px !important;
                                        }

                                        .ts-control {
                                            background-color: rgb(55 65 81) !important;
                                            border: 1px solid rgb(75 85 99) !important;
                                            border-radius: 0.5rem !important;
                                            min-height: 46px !important;
                                            color: #fff !important;
                                            font-size: 1.125rem !important;
                                            line-height: 1.75rem !important;
                                            padding-left: 12px !important;
                                        }

                                        .ts-control input {
                                            color: #fff !important;
                                            margin: auto 0 !important;
                                            font-size: 1.125rem !important;
                                            line-height: 1.75rem !important;
                                        }

                                        .item {
                                            margin: auto 0 !important;
                                        }
                                    }
                                </style>
                                <style>
                                    @media (prefers-color-scheme: dark) {

                                        .ts-dropdown .active {
                                            background-color: rgb(55 65 81) !important;
                                            color: #fff !important;
                                        }

                                        .ts-dropdown {
                                            border: 1px solid rgb(55 65 81) !important;
                                            border-radius: 0.5rem !important;
                                            overflow: hidden !important;
                                        }

                                        .option {
                                            padding-left: 12px !important;
                                        }

                                        /* Nagłówki kategorii */
                                        .ts-dropdown .optgroup-header {
                                            background-color: rgb(31 41 55) !important;
                                            color: rgb(156 163 175) !important;
                                            font-size: 0.7rem !important;
                                            font-weight: 700 !important;
                                            text-transform: uppercase !important;
                                            letter-spacing: 0.08em !important;
                                            padding: 10px 12px 7px !important;
                                            border-top: 1px solid rgb(55 65 81) !important;
                                        }

                                        /* Pierwsza grupa bez górnego obramowania */
                                        .ts-dropdown .optgroup:first-child .optgroup-header {
                                            border-top: none !important;
                                        }

                                        .ts-control {
                                            background-color: rgb(75 85 99) !important;
                                            border: 1px solid rgb(75 85 99) !important;
                                            border-radius: 0.5rem !important;
                                            min-height: 46px !important;
                                            color: #fff !important;
                                            font-size: 1.125rem !important;
                                            line-height: 1.75rem !important;
                                            padding-left: 12px !important;
                                        }

                                        .ts-control input {
                                            color: #fff !important;
                                            margin: auto 0 !important;
                                            font-size: 1.125rem !important;
                                            line-height: 1.75rem !important;
                                        }

                                        .item {
                                            margin: auto 0 !important;
                                        }
                                    }

                                    /* Jasny motyw */
                                    @media (prefers-color-scheme: light) {

                                        .ts-dropdown {
                                            border: 1px solid rgb(229 231 235) !important;
                                            border-radius: 0.5rem !important;
                                            overflow: hidden !important;
                                        }

                                        .ts-dropdown .optgroup-header {
                                            background-color: rgb(249 250 251) !important;
                                            color: rgb(107 114 128) !important;
                                            font-size: 0.7rem !important;
                                            font-weight: 700 !important;
                                            text-transform: uppercase !important;
                                            letter-spacing: 0.08em !important;
                                            padding: 10px 12px 7px !important;
                                            border-top: 1px solid rgb(229 231 235) !important;
                                        }

                                        .ts-dropdown .optgroup:first-child .optgroup-header {
                                            border-top: none !important;
                                        }
                                    }
                                </style>
                                <div class="mb-4 text-start">
                                    <label for="object_type"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                        <span>🏷️</span>Typ obiektu
                                    </label>

                                    <select id="object_type" name="object_type" multiple autocomplete="off"
                                        placeholder="Wybierz typ" class="mt-2 rounded-lg text-lg">

                                        <optgroup label="Obiekty ogólne">

                                            <option value="magazyn"
                                                data-description="Magazyn materiałów, sprzętu lub zaplecze techniczne"
                                                data-icon="fa-warehouse"
                                                data-primary="from-orange-200 dark:from-orange-500/20 text-orange-700 dark:text-orange-300"
                                                data-secondary="to-amber-100 dark:to-amber-500/10">
                                                Magazyn
                                            </option>

                                            <option value="biuro"
                                                data-description="Biuro administracyjne lub siedziba firmy"
                                                data-icon="fa-building"
                                                data-primary="from-blue-200 dark:from-blue-500/20 text-blue-700 dark:text-blue-300"
                                                data-secondary="to-indigo-100 dark:to-indigo-500/10">
                                                Biuro
                                            </option>

                                            <option value="zaklad_produkcyjny"
                                                data-description="Zakład produkcyjny, hala produkcyjna lub fabryka"
                                                data-icon="fa-industry"
                                                data-primary="from-violet-200 dark:from-violet-500/20 text-violet-700 dark:text-violet-300"
                                                data-secondary="to-purple-100 dark:to-purple-500/10">
                                                Zakład produkcyjny
                                            </option>

                                            <option value="sklep_punkt_uslugowy"
                                                data-description="Sklep, lokal handlowy lub punkt usługowy"
                                                data-icon="fa-store"
                                                data-primary="from-pink-200 dark:from-pink-500/20 text-pink-700 dark:text-pink-300"
                                                data-secondary="to-rose-100 dark:to-rose-500/10">
                                                Sklep / punkt usługowy
                                            </option>

                                            <option value="baza_transportowa"
                                                data-description="Baza transportowa, parking floty lub zaplecze pojazdów"
                                                data-icon="fa-truck"
                                                data-primary="from-cyan-200 dark:from-cyan-500/20 text-cyan-700 dark:text-cyan-300"
                                                data-secondary="to-sky-100 dark:to-sky-500/10">
                                                Baza transportowa
                                            </option>

                                            <option value="inny"
                                                data-description="Inny rodzaj obiektu lub miejsca pracy"
                                                data-icon="fa-location-dot"
                                                data-primary="from-gray-200 dark:from-gray-500/20 text-gray-700 dark:text-gray-300"
                                                data-secondary="to-slate-100 dark:to-slate-500/10">
                                                Inny
                                            </option>

                                        </optgroup>


                                        <optgroup label="Obiekty budowlane">

                                            <option value="budowa"
                                                data-description="Plac budowy lub miejsce realizacji prac"
                                                data-icon="fa-helmet-safety"
                                                data-primary="from-green-200 dark:from-green-500/20 text-green-700 dark:text-green-300"
                                                data-secondary="to-emerald-100 dark:to-emerald-500/10">
                                                Budowa
                                            </option>

                                            <option value="budowa_domu"
                                                data-description="Budowa domu jednorodzinnego lub bliźniaka"
                                                data-icon="fa-house"
                                                data-primary="from-emerald-200 dark:from-emerald-500/20 text-emerald-700 dark:text-emerald-300"
                                                data-secondary="to-lime-100 dark:to-lime-500/10">
                                                Budowa domu
                                            </option>

                                            <option value="budowa_budynku_mieszkalnego"
                                                data-description="Budowa budynku mieszkalnego lub wielorodzinnego"
                                                data-icon="fa-building"
                                                data-primary="from-blue-200 dark:from-blue-500/20 text-blue-700 dark:text-blue-300"
                                                data-secondary="to-sky-100 dark:to-sky-500/10">
                                                Budowa budynku mieszkalnego
                                            </option>

                                            <option value="budowa_hali"
                                                data-description="Budowa hali magazynowej, produkcyjnej lub logistycznej"
                                                data-icon="fa-warehouse"
                                                data-primary="from-violet-200 dark:from-violet-500/20 text-violet-700 dark:text-violet-300"
                                                data-secondary="to-indigo-100 dark:to-indigo-500/10">
                                                Budowa hali
                                            </option>

                                            <option value="budowa_centrum_handlowego"
                                                data-description="Budowa centrum handlowego lub dużego obiektu handlowego"
                                                data-icon="fa-shop"
                                                data-primary="from-pink-200 dark:from-pink-500/20 text-pink-700 dark:text-pink-300"
                                                data-secondary="to-rose-100 dark:to-rose-500/10">
                                                Budowa centrum handlowego
                                            </option>

                                            <option value="remont"
                                                data-description="Remont istniejącego budynku lub obiektu"
                                                data-icon="fa-screwdriver-wrench"
                                                data-primary="from-orange-200 dark:from-orange-500/20 text-orange-700 dark:text-orange-300"
                                                data-secondary="to-amber-100 dark:to-amber-500/10">
                                                Remont
                                            </option>

                                            <option value="modernizacja"
                                                data-description="Modernizacja, przebudowa lub unowocześnienie obiektu"
                                                data-icon="fa-arrows-rotate"
                                                data-primary="from-cyan-200 dark:from-cyan-500/20 text-cyan-700 dark:text-cyan-300"
                                                data-secondary="to-teal-100 dark:to-teal-500/10">
                                                Modernizacja
                                            </option>

                                            <option value="prace_ziemne"
                                                data-description="Wykopy, niwelacja terenu, fundamenty lub roboty ziemne"
                                                data-icon="fa-person-digging"
                                                data-primary="from-amber-200 dark:from-amber-500/20 text-amber-700 dark:text-amber-300"
                                                data-secondary="to-yellow-100 dark:to-yellow-500/10">
                                                Prace ziemne
                                            </option>

                                            <option value="droga" data-description="Budowa, remont lub przebudowa drogi"
                                                data-icon="fa-road"
                                                data-primary="from-gray-200 dark:from-gray-500/20 text-gray-700 dark:text-gray-300"
                                                data-secondary="to-slate-100 dark:to-slate-500/10">
                                                Droga
                                            </option>

                                            <option value="most_wiadukt"
                                                data-description="Budowa lub remont mostu, wiaduktu albo estakady"
                                                data-icon="fa-bridge"
                                                data-primary="from-sky-200 dark:from-sky-500/20 text-sky-700 dark:text-sky-300"
                                                data-secondary="to-cyan-100 dark:to-cyan-500/10">
                                                Most / wiadukt
                                            </option>

                                            <option value="instalacje"
                                                data-description="Prace instalacyjne, elektryczne, sanitarne lub HVAC"
                                                data-icon="fa-plug"
                                                data-primary="from-yellow-200 dark:from-yellow-500/20 text-yellow-700 dark:text-yellow-300"
                                                data-secondary="to-amber-100 dark:to-amber-500/10">
                                                Instalacje
                                            </option>

                                            <option value="rozbiorka"
                                                data-description="Rozbiórka lub wyburzenie budynku albo konstrukcji"
                                                data-icon="fa-person-digging"
                                                data-primary="from-rose-200 dark:from-rose-500/20 text-rose-700 dark:text-rose-300"
                                                data-secondary="to-red-100 dark:to-red-500/10">
                                                Rozbiórka
                                            </option>

                                        </optgroup>
                                    </select>
                                </div>
                                <script>

                                    $(document).ready(function () {
                                        let objectTypeSelect = new TomSelect('#object_type', {
                                            maxItems: 1,

                                            render: {
                                                option: function (data, escape) {
                                                    return `
                    <div class="px-3 py-2 dark:bg-gray-800 dark:text-white">
                        <div class="text-lg flex flex-row items-center gap-2">
                            <div
                                class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br ${escape(data.primary)} ${escape(data.secondary)}">
                                <i class="fa-solid ${escape(data.icon)} text-2xl" aria-hidden="true"></i>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex flex-row">
                                    ${escape(data.text)}
                                </div>
                                <div class="opacity-70 text-xs">
                                    ${escape(data.description || '')}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                                                },

                                                item: function (data, escape) {
                                                    return `
                    <div>${escape(data.text)}</div>
                `;
                                                },
                                            },
                                            onChange: function (value) {
                                                const option = this.options[value];

                                                if (!option) {
                                                    return;
                                                }

                                                const info = $('#info');
                                                const icon = $('#info i');

                                                icon.attr('class', `fa-solid ${option.icon} text-2xl`);
                                                info.attr('class', '');
                                                info.addClass(`shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br ${option.primary} ${option.secondary}`);
                                            }
                                        });

                                    });
                                </script>
                                <div class="mb-4 text-start">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <span>🔘</span>Status obiektu
                                    </label>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mt-2">

                                        {{-- Planowany --}}
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status" value="planowany" class="peer sr-only" {{ old('status') === 'planowany' ? 'checked' : '' }}>

                                            <div class="relative overflow-hidden rounded-xl
            bg-blue-900/20 border border-blue-800/40 px-5 py-4
            transition-all duration-300 ease-out
            hover:border-blue-600/70 hover:bg-blue-900/30
            peer-checked:scale-[1.02]
            peer-checked:bg-blue-900/40
            peer-checked:border-blue-400/70
            peer-checked:ring-2
            peer-checked:ring-blue-400/40
            peer-checked:shadow-lg
            peer-checked:shadow-blue-900/30">

                                                <div class="absolute -right-5 -bottom-7
                text-8xl text-blue-400/10 pointer-events-none
                transition-all duration-500 ease-out
                peer-checked:scale-110
                peer-checked:text-blue-300/20">

                                                    <i class="fa-solid fa-calendar-plus" aria-hidden="true"></i>
                                                </div>

                                                <div class="relative z-0">

                                                    <div class="text-xs uppercase tracking-wider mb-3 text-blue-300/70">
                                                        Status
                                                    </div>

                                                    <div class="flex items-center gap-3">

                                                        <div class="w-11 h-11 min-w-[44px] rounded-lg
                        bg-blue-900/40 border border-blue-700/30
                        flex items-center justify-center
                        transition-all duration-300
                        peer-checked:bg-blue-500/20
                        peer-checked:border-blue-400/50
                        peer-checked:shadow-md
                        peer-checked:shadow-blue-900/40
                        peer-checked:scale-110">

                                                            <i class="fa-solid fa-calendar-plus text-blue-300"
                                                                aria-hidden="true"></i>
                                                        </div>

                                                        <div class="min-w-0">
                                                            <div class="font-semibold text-white">
                                                                Planowany
                                                            </div>

                                                            <div class="text-sm text-blue-500 leading-6 mt-1">
                                                                Jeszcze się nie rozpoczął
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </label>


                                        {{-- Aktywny --}}
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status" value="aktywny" class="peer sr-only" {{ old('status') === 'aktywny' ? 'checked' : '' }}>

                                            <div class="relative overflow-hidden rounded-xl
            bg-green-900/20 border border-green-800/40 px-5 py-4
            transition-all duration-300 ease-out
            hover:border-green-600/70 hover:bg-green-900/30
            peer-checked:scale-[1.02]
            peer-checked:bg-green-900/40
            peer-checked:border-green-400/70
            peer-checked:ring-2
            peer-checked:ring-green-400/40
            peer-checked:shadow-lg
            peer-checked:shadow-green-900/30">

                                                <div class="absolute -right-5 -bottom-7
                text-8xl text-green-400/10 pointer-events-none
                transition-all duration-500 ease-out
                peer-checked:scale-110
                peer-checked:text-green-300/20">

                                                    <i class="fa-solid fa-play" aria-hidden="true"></i>
                                                </div>

                                                <div class="relative z-0">

                                                    <div
                                                        class="text-xs uppercase tracking-wider mb-3 text-green-300/70">
                                                        Status
                                                    </div>

                                                    <div class="flex items-center gap-3">

                                                        <div class="w-11 h-11 min-w-[44px] rounded-lg
                        bg-green-900/40 border border-green-700/30
                        flex items-center justify-center
                        transition-all duration-300
                        peer-checked:bg-green-500/20
                        peer-checked:border-green-400/50
                        peer-checked:shadow-md
                        peer-checked:shadow-green-900/40
                        peer-checked:scale-110">

                                                            <i class="fa-solid fa-play text-green-300"
                                                                aria-hidden="true"></i>
                                                        </div>

                                                        <div class="min-w-0">
                                                            <div class="font-semibold text-white">
                                                                Aktywny
                                                            </div>

                                                            <div class="text-sm text-green-500 leading-6 mt-1">
                                                                Obiekt jest realizowany
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </label>


                                        {{-- Wstrzymany --}}
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status" value="wstrzymany" class="peer sr-only" {{ old('status') === 'wstrzymany' ? 'checked' : '' }}>

                                            <div class="relative overflow-hidden rounded-xl
            bg-yellow-900/20 border border-yellow-800/40 px-5 py-4
            transition-all duration-300 ease-out
            hover:border-yellow-600/70 hover:bg-yellow-900/30
            peer-checked:scale-[1.02]
            peer-checked:bg-yellow-900/40
            peer-checked:border-yellow-400/70
            peer-checked:ring-2
            peer-checked:ring-yellow-400/40
            peer-checked:shadow-lg
            peer-checked:shadow-yellow-900/30">

                                                <div class="absolute -right-5 -bottom-7
                text-8xl text-yellow-400/10 pointer-events-none
                transition-all duration-500 ease-out
                peer-checked:scale-110
                peer-checked:text-yellow-300/20">

                                                    <i class="fa-solid fa-pause" aria-hidden="true"></i>
                                                </div>

                                                <div class="relative z-0">

                                                    <div
                                                        class="text-xs uppercase tracking-wider mb-3 text-yellow-300/70">
                                                        Status
                                                    </div>

                                                    <div class="flex items-center gap-3">

                                                        <div class="w-11 h-11 min-w-[44px] rounded-lg
                        bg-yellow-900/40 border border-yellow-700/30
                        flex items-center justify-center
                        transition-all duration-300
                        peer-checked:bg-yellow-500/20
                        peer-checked:border-yellow-400/50
                        peer-checked:shadow-md
                        peer-checked:shadow-yellow-900/40
                        peer-checked:scale-110">

                                                            <i class="fa-solid fa-pause text-yellow-300"
                                                                aria-hidden="true"></i>
                                                        </div>

                                                        <div class="min-w-0">
                                                            <div class="font-semibold text-white">
                                                                Wstrzymany
                                                            </div>

                                                            <div class="text-sm text-yellow-500 leading-6 mt-1">
                                                                Realizacja jest czasowo wstrzymana
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </label>


                                        {{-- Odwołany --}}
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status" value="odwolany" class="peer sr-only" {{ old('status') === 'odwolany' ? 'checked' : '' }}>

                                            <div class="relative overflow-hidden rounded-xl
            bg-red-900/20 border border-red-800/40 px-5 py-4
            transition-all duration-300 ease-out
            hover:border-red-600/70 hover:bg-red-900/30
            peer-checked:scale-[1.02]
            peer-checked:bg-red-900/40
            peer-checked:border-red-400/70
            peer-checked:ring-2
            peer-checked:ring-red-400/40
            peer-checked:shadow-lg
            peer-checked:shadow-red-900/30">

                                                <div class="absolute -right-5 -bottom-7
                text-8xl text-red-400/10 pointer-events-none
                transition-all duration-500 ease-out
                peer-checked:scale-110
                peer-checked:text-red-300/20">

                                                    <i class="fa-solid fa-ban" aria-hidden="true"></i>
                                                </div>

                                                <div class="relative z-0">

                                                    <div class="text-xs uppercase tracking-wider mb-3 text-red-300/70">
                                                        Status
                                                    </div>

                                                    <div class="flex items-center gap-3">

                                                        <div class="w-11 h-11 min-w-[44px] rounded-lg
                        bg-red-900/40 border border-red-700/30
                        flex items-center justify-center
                        transition-all duration-300
                        peer-checked:bg-red-500/20
                        peer-checked:border-red-400/50
                        peer-checked:shadow-md
                        peer-checked:shadow-red-900/40
                        peer-checked:scale-110">

                                                            <i class="fa-solid fa-ban text-red-300"
                                                                aria-hidden="true"></i>
                                                        </div>

                                                        <div class="min-w-0">
                                                            <div class="font-semibold text-white">
                                                                Odwołany
                                                            </div>

                                                            <div class="text-sm text-red-500 leading-6 mt-1">
                                                                Realizacja nie odbędzie się
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </label>


                                        {{-- Zakończony --}}
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status" value="zakonczony" class="peer sr-only" {{ old('status') === 'zakonczony' ? 'checked' : '' }}>

                                            <div class="relative overflow-hidden rounded-xl
            bg-slate-800/40 border border-slate-700/60 px-5 py-4
            transition-all duration-300 ease-out
            hover:border-slate-500 hover:bg-slate-800/60
            peer-checked:scale-[1.02]
            peer-checked:bg-slate-700/50
            peer-checked:border-slate-300/70
            peer-checked:ring-2
            peer-checked:ring-slate-300/40
            peer-checked:shadow-lg
            peer-checked:shadow-slate-900/40">

                                                <div class="absolute -right-5 -bottom-7
                text-8xl text-slate-300/10 pointer-events-none
                transition-all duration-500 ease-out
                peer-checked:scale-110
                peer-checked:text-slate-200/20">

                                                    <i class="fa-solid fa-check" aria-hidden="true"></i>
                                                </div>

                                                <div class="relative z-0">

                                                    <div
                                                        class="text-xs uppercase tracking-wider mb-3 text-slate-300/70">
                                                        Status
                                                    </div>

                                                    <div class="flex items-center gap-3">

                                                        <div class="w-11 h-11 min-w-[44px] rounded-lg
                        bg-slate-700/40 border border-slate-600/40
                        flex items-center justify-center
                        transition-all duration-300
                        peer-checked:bg-slate-500/20
                        peer-checked:border-slate-300/50
                        peer-checked:shadow-md
                        peer-checked:shadow-slate-900/40
                        peer-checked:scale-110">

                                                            <i class="fa-solid fa-check text-slate-300"
                                                                aria-hidden="true"></i>
                                                        </div>

                                                        <div class="min-w-0">
                                                            <div class="font-semibold text-white">
                                                                Zakończony
                                                            </div>

                                                            <div class="text-sm text-slate-500 leading-6 mt-1">
                                                                Realizacja została zakończona
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </label>

                                    </div>

                                    @error('status')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

                                    <div class="mb-4 text-start">
                                        <label for="datetime_start"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                                            Data rozpoczęcia</label>
                                        <input type="text" id="datetime_start" name="datetime_start"
                                            placeholder="DD.MM.YYYY HH:MM" required
                                            class="h-[46px] placeholder-gray-400 mt-2 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-600 dark:border-gray-600 dark:text-gray-100 !text-lg !leading-7 !pl-3">
                                        @error('datetime_start')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4 text-start">
                                        <label for="datetime_end"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                                            Data
                                            zakończenia</label>
                                        <input type="text" id="datetime_end" name="datetime_end"
                                            placeholder="DD.MM.YYYY HH:MM" required
                                            class="h-[46px] placeholder-gray-400 mt-2 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-600 dark:border-gray-600 dark:text-gray-100 !text-lg !leading-7 !pl-3">
                                        @error('datetime_end')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <script>
                                        let startPicker;
                                        let endPicker;

                                        document.addEventListener('DOMContentLoaded', function () {

                                            startPicker = flatpickr("#datetime_start", {
                                                enableTime: true,
                                                dateFormat: "d.m.Y H:i",
                                                time_24hr: true,
                                            });

                                            endPicker = flatpickr("#datetime_end", {
                                                enableTime: true,
                                                dateFormat: "d.m.Y H:i",
                                                time_24hr: true
                                            });

                                        });
                                    </script>
                                </div>
                                <div class="mb-4 text-start">

                                    <label for="allowed_distance"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <span>📏</span>Maksymalna odległość od obiektu
                                    </label>

                                    <div class="relative mt-2 flex h-[46px]">

                                        {{-- Minus --}}
                                        <button type="button" id="allowed-distance-minus" class="shrink-0 w-12 flex items-center justify-center
                border border-gray-300 dark:border-gray-600
                bg-gray-100 dark:bg-gray-700
                text-gray-600 dark:text-gray-300
                hover:bg-gray-200 dark:hover:bg-gray-600
                rounded-l-md transition-colors">

                                            <i class="fa-solid fa-minus"></i>
                                        </button>

                                        {{-- Input --}}
                                        <div class="relative flex-1">

                                            <input type="number" id="allowed_distance" name="allowed_distance"
                                                value="{{ old('allowed_distance', 100) }}" min="1" max="10000" step="1"
                                                required class="h-[46px] block w-full
                    border-y border-gray-300 dark:border-gray-600
                    bg-white dark:bg-gray-600
                    text-center
                    shadow
                    focus:ring-blue-500 focus:border-blue-500
                    sm:text-sm dark:text-gray-100
                    !text-lg !leading-7
                    pr-10">

                                            <span class="absolute inset-y-0 right-3 flex items-center
                    text-sm font-medium text-gray-500 dark:text-gray-400
                    pointer-events-none">
                                                m
                                            </span>

                                        </div>

                                        {{-- Plus --}}
                                        <button type="button" id="allowed-distance-plus" class="shrink-0 w-12 flex items-center justify-center
                border border-gray-300 dark:border-gray-600
                bg-gray-100 dark:bg-gray-700
                text-gray-600 dark:text-gray-300
                hover:bg-gray-200 dark:hover:bg-gray-600
                rounded-r-md transition-colors">

                                            <i class="fa-solid fa-plus"></i>
                                        </button>

                                    </div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        Maksymalna odległość od lokalizacji obiektu, w której pracownik może rozpocząć
                                        lub zakończyć pracę.
                                    </p>

                                    @error('allowed_distance')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror

                                </div>
                                <script>
                                    $('#allowed-distance-minus').on('click', function () {
                                        const input = $('#allowed_distance');
                                        const value = parseInt(input.val()) || 1;

                                        input.val(Math.max(1, value - 1)).trigger('change');
                                    });

                                </script>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- DODATKOWE INFORMACJE --}}
                        {{-- ================================================= --}}

                        <div class="overflow-hidden rounded-2xl bg-gray-700">

                            <div class="flex items-center gap-3 border-b border-gray-600 px-5 py-4">

                                <div
                                    class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-note-sticky text-2xl" aria-hidden="true"></i>
                                </div>

                                <div>
                                    <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                        Dodatkowe informacje
                                    </h2>

                                    <p class="text-start text-xs text-gray-400">
                                        Notatki i informacje pomocne przy obsłudze obiektu
                                    </p>
                                </div>

                            </div>

                            <div class="p-4 text-start">

                                <label for="editor"
                                    class="pb-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>📝</span> Notatka
                                </label>
                                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css"
                                    rel="stylesheet">
                                <style>
                                    #editor {
                                        border: 0;
                                    }

                                    .ql-toolbar {
                                        border: 0 !important;
                                        background-color: rgb(75 85 99) / var(--tw-bg-opacity));
                                        border-radius: 0.375rem;
                                        overflow-y: auto;
                                        padding: 8px 12px !important;
                                        margin: 0 !important;
                                        min-height: 46px !important;
                                        margin-bottom: 16px !important;
                                    }

                                    .ql-editor {
                                        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                                        padding: 8px 12px !important;
                                        font-size: 1.125rem !important;
                                        line-height: 1.75rem !important;
                                        min-height: 46px !important;
                                    }

                                    @media (prefers-color-scheme: dark) {
                                        .ql-toolbar {
                                            background-color: rgb(75 85 99 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-editor {
                                            background-color: rgb(75 85 99 / var(--tw-bg-opacity)) !important;
                                        }

                                        .ql-editor.ql-blank::before {
                                            color: #9ca3af;
                                            /* Tailwind gray-400 */
                                        }

                                        .ql-toolbar {
                                            background-color: rgb(75 85 99 / var(--tw-bg-opacity)) !important;
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
                                    class="bg-white dark:bg-gray-700 dark:text-white rounded-md h-64 overflow-y-auto">

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

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- RIGHT COLUMN --}}
                    {{-- ===================================================== --}}

                    <div class="space-y-4">


                        {{-- ================================================= --}}
                        {{-- LOKALIZACJA --}}
                        {{-- ================================================= --}}

                        <div class="overflow-hidden rounded-2xl bg-gray-700">

                            <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-location-dot text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                            Lokalizacja obiektu
                                        </h2>

                                        <p class="text-start text-xs text-gray-400">
                                            Znajdź w Google Maps
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <div class="p-5 !text-start">
                                <style>
                                    #object-location-search {
                                        width: 100%;
                                    }

                                    #object-location-search gmp-place-autocomplete {
                                        display: block;
                                        width: 100%;

                                        /*
         * WIBEST
         */
                                        --gmpx-color-surface: #4b5563;
                                        --gmpx-color-on-surface: #f3f4f6;
                                        --gmpx-color-on-surface-variant: #9ca3af;
                                        --gmpx-color-primary: #86efac;

                                        --gmpx-font-family-base: Lato, sans-serif;
                                        --gmpx-font-size-base: 12px;

                                        /*
         * Rozmiar
         */

                                        height: 46px;

                                        /*
         * Obramowanie
         */
                                        border-radius: 0.5rem;

                                        /*
         * Tło
         */
                                        background-color: #4b5563;

                                        /*
         * Animacja
         */
                                        transition:
                                            border-color 150ms ease,
                                            box-shadow 150ms ease;
                                        font-size: 1.125rem !important;
                                        line-height: 1.75rem !important;
                                    }

                                    /*
    |--------------------------------------------------------------------------
    | FOCUS
    |--------------------------------------------------------------------------
    */

                                    #object-location-search gmp-place-autocomplete:focus-within {

                                        border-color: rgb(134 239 172 / 0.5);

                                        outline: none;

                                        box-shadow: none;
                                    }

                                    /*
    |--------------------------------------------------------------------------
    | HOVER
    |--------------------------------------------------------------------------
    */

                                    #object-location-search gmp-place-autocomplete:hover {

                                        border-color: #6b7280;
                                    }

                                    /*
    |--------------------------------------------------------------------------
    | FOCUS + HOVER
    |--------------------------------------------------------------------------
    */

                                    #object-location-search gmp-place-autocomplete:focus-within:hover {

                                        border-color: rgb(134 239 172 / 0.5);
                                    }
                                </style>
                                {{-- Google autocomplete --}}
                                <div id="object-location-search"></div>

                                {{-- Map --}}
                                <div id="object-map"
                                    class="mt-4 h-[280px] overflow-hidden rounded-xl border border-gray-600 bg-gray-900">
                                </div>

                                {{-- Hidden location data --}}
                                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
                                <input type="hidden" name="formatted_address" id="formatted_address"
                                    value="{{ old('formatted_address') }}">
                                <input type="hidden" name="place_id" id="place_id" value="{{ old('place_id') }}">

                            </div>
                            <script>
                                let objectMap = null;
                                let objectMarker = null;
                                let objectRadiusCircle = null;
                                let objectAutocomplete = null;
                                function updateObjectRadiusCircle(position = null) {
                                    if (!objectMap) {
                                        return;
                                    }

                                    // Jeżeli nie przekazano pozycji, spróbuj pobrać ją z markera
                                    if (!position && objectMarker) {
                                        if (objectMarker.position) {
                                            position = objectMarker.position;
                                        } else if (typeof objectMarker.getPosition === 'function') {
                                            position = objectMarker.getPosition();
                                        }
                                    }

                                    if (!position) {
                                        return;
                                    }

                                    const distance = Math.max(
                                        1,
                                        parseInt($('#allowed_distance').val()) || 1
                                    );

                                    if (objectRadiusCircle) {

                                        objectRadiusCircle.setCenter(position);
                                        objectRadiusCircle.setRadius(distance);
                                        objectRadiusCircle.setMap(objectMap);

                                        console.log(
                                            `WIBEST: obszar ${distance} m`
                                        );

                                        return;
                                    }

                                    objectRadiusCircle = new google.maps.Circle({
                                        map: objectMap,
                                        center: position,
                                        radius: distance,

                                        fillColor: '#86EFAC',
                                        fillOpacity: 0.15,

                                        strokeColor: '#86EFAC',
                                        strokeOpacity: 0.8,
                                        strokeWeight: 2,

                                        clickable: false
                                    });

                                    console.log(
                                        `WIBEST: utworzono obszar ${distance} m`
                                    );
                                }
                                function initObjectLocation() {
                                    console.log(
                                        'WIBEST: inicjalizacja Google Maps'
                                    );

                                    const mapElement =
                                        document.getElementById('object-map');

                                    const searchContainer =
                                        document.getElementById(
                                            'object-location-search'
                                        );

                                    if (!mapElement || !searchContainer) {
                                        console.error(
                                            'WIBEST: brak #object-map lub #object-location-search'
                                        );

                                        return;
                                    }

                                    if (
                                        typeof google === 'undefined' ||
                                        typeof google.maps === 'undefined'
                                    ) {
                                        console.error(
                                            'WIBEST: Google Maps API nie jest dostępne'
                                        );

                                        return;
                                    }

                                    const defaultPosition = {
                                        lat: 50.2649,
                                        lng: 19.0238
                                    };

                                    const latitudeInput =
                                        document.getElementById('latitude');

                                    const longitudeInput =
                                        document.getElementById('longitude');

                                    const oldLatitude =
                                        latitudeInput
                                            ? parseFloat(latitudeInput.value)
                                            : NaN;

                                    const oldLongitude =
                                        longitudeInput
                                            ? parseFloat(longitudeInput.value)
                                            : NaN;

                                    const hasOldLocation =
                                        Number.isFinite(oldLatitude) &&
                                        Number.isFinite(oldLongitude);

                                    const initialPosition =
                                        hasOldLocation
                                            ? {
                                                lat: oldLatitude,
                                                lng: oldLongitude
                                            }
                                            : defaultPosition;

                                    try {
                                        objectMap =
                                            new google.maps.Map(
                                                mapElement,
                                                {
                                                    center: initialPosition,

                                                    zoom:
                                                        hasOldLocation
                                                            ? 17
                                                            : 10,

                                                    mapTypeControl: false,
                                                    streetViewControl: false,
                                                    fullscreenControl: false,

                                                    mapId: 'DEMO_MAP_ID'
                                                }
                                            );

                                        console.log(
                                            'WIBEST: mapa utworzona'
                                        );

                                        /*
                                         * --------------------------------------------------
                                         * ISTNIEJĄCA LOKALIZACJA
                                         * --------------------------------------------------
                                         */

                                        if (hasOldLocation) {

                                            if (
                                                google.maps.marker &&
                                                google.maps.marker.AdvancedMarkerElement
                                            ) {
                                                objectMarker =
                                                    new google.maps.marker.AdvancedMarkerElement({
                                                        map: objectMap,
                                                        position: initialPosition
                                                    });

                                                console.log(
                                                    'WIBEST: utworzono AdvancedMarkerElement'
                                                );

                                            } else if (
                                                google.maps.Marker
                                            ) {
                                                objectMarker =
                                                    new google.maps.Marker({
                                                        map: objectMap,
                                                        position: initialPosition
                                                    });

                                                console.log(
                                                    'WIBEST: utworzono klasyczny Marker'
                                                );
                                            }

                                            /*
                                             * Okrąg 100 m wokół istniejącej lokalizacji
                                             */
                                            updateObjectRadiusCircle(
                                                initialPosition
                                            );
                                        }

                                        /*
                                         * --------------------------------------------------
                                         * PLACES
                                         * --------------------------------------------------
                                         */

                                        if (
                                            typeof google.maps.places ===
                                            'undefined'
                                        ) {
                                            console.error(
                                                'WIBEST: biblioteka Places nie jest dostępna'
                                            );

                                            return;
                                        }

                                        if (
                                            typeof google.maps.places
                                                .PlaceAutocompleteElement ===
                                            'undefined'
                                        ) {
                                            console.error(
                                                'WIBEST: PlaceAutocompleteElement nie jest dostępny'
                                            );

                                            return;
                                        }

                                        objectAutocomplete =
                                            new google.maps.places
                                                .PlaceAutocompleteElement();

                                        objectAutocomplete.includedRegionCodes = [
                                            'pl'
                                        ];

                                        objectAutocomplete.placeholder =
                                            'Wpisz adres obiektu...';

                                        searchContainer.innerHTML = '';

                                        searchContainer.appendChild(
                                            objectAutocomplete
                                        );

                                        console.log(
                                            'WIBEST: PlaceAutocompleteElement gotowe'
                                        );

                                        /*
                                         * --------------------------------------------------
                                         * WYBÓR ADRESU
                                         * --------------------------------------------------
                                         */

                                        objectAutocomplete.addEventListener(
                                            'gmp-select',
                                            async function (event) {

                                                try {
                                                    console.log(
                                                        'WIBEST: wybrano miejsce:',
                                                        event
                                                    );

                                                    const placePrediction =
                                                        event.placePrediction;

                                                    if (!placePrediction) {
                                                        console.error(
                                                            'WIBEST: brak placePrediction'
                                                        );

                                                        return;
                                                    }

                                                    const place =
                                                        placePrediction.toPlace();

                                                    /*
                                                     * Pobieramy dane miejsca
                                                     */
                                                    await place.fetchFields({
                                                        fields: [
                                                            'id',
                                                            'displayName',
                                                            'formattedAddress',
                                                            'location',
                                                            'viewport'
                                                        ]
                                                    });

                                                    console.log(
                                                        'WIBEST: dane miejsca:',
                                                        place
                                                    );

                                                    if (!place.location) {
                                                        console.error(
                                                            'WIBEST: wybrane miejsce nie posiada współrzędnych'
                                                        );

                                                        return;
                                                    }

                                                    const latitude =
                                                        place.location.lat();

                                                    const longitude =
                                                        place.location.lng();

                                                    const position = {
                                                        lat: latitude,
                                                        lng: longitude
                                                    };

                                                    /*
                                                     * --------------------------------------------------
                                                     * POLA FORMULARZA
                                                     * --------------------------------------------------
                                                     */

                                                    const latitudeField =
                                                        document.getElementById(
                                                            'latitude'
                                                        );

                                                    const longitudeField =
                                                        document.getElementById(
                                                            'longitude'
                                                        );

                                                    const formattedAddressField =
                                                        document.getElementById(
                                                            'formatted_address'
                                                        );

                                                    const placeIdField =
                                                        document.getElementById(
                                                            'place_id'
                                                        );

                                                    /*
                                                     * Latitude
                                                     */
                                                    if (latitudeField) {
                                                        latitudeField.value =
                                                            latitude;

                                                        latitudeField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * Longitude
                                                     */
                                                    if (longitudeField) {
                                                        longitudeField.value =
                                                            longitude;

                                                        longitudeField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * Adres
                                                     */
                                                    if (
                                                        formattedAddressField
                                                    ) {
                                                        formattedAddressField.value =
                                                            place.formattedAddress ||
                                                            '';

                                                        formattedAddressField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * Place ID
                                                     */
                                                    if (placeIdField) {
                                                        placeIdField.value =
                                                            place.id || '';

                                                        placeIdField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * --------------------------------------------------
                                                     * MAPA / ZOOM
                                                     * --------------------------------------------------
                                                     */

                                                    if (place.viewport) {

                                                        objectMap.fitBounds(
                                                            place.viewport
                                                        );

                                                        console.log(
                                                            'WIBEST: zastosowano viewport miejsca'
                                                        );

                                                    } else {

                                                        objectMap.setCenter(
                                                            position
                                                        );

                                                        objectMap.setZoom(
                                                            17
                                                        );

                                                        console.log(
                                                            'WIBEST: zastosowano zoom 17'
                                                        );
                                                    }

                                                    /*
                                                     * --------------------------------------------------
                                                     * MARKER
                                                     * --------------------------------------------------
                                                     */

                                                    if (objectMarker) {

                                                        /*
                                                         * AdvancedMarkerElement
                                                         */
                                                        if (
                                                            google.maps.marker &&
                                                            google.maps.marker
                                                                .AdvancedMarkerElement &&
                                                            objectMarker instanceof
                                                            google.maps.marker
                                                                .AdvancedMarkerElement
                                                        ) {

                                                            objectMarker.position =
                                                                position;

                                                            objectMarker.map =
                                                                objectMap;

                                                            console.log(
                                                                'WIBEST: przesunięto AdvancedMarkerElement'
                                                            );

                                                            /*
                                                             * Klasyczny Marker
                                                             */
                                                        } else if (
                                                            objectMarker instanceof
                                                            google.maps.Marker
                                                        ) {

                                                            objectMarker.setPosition(
                                                                position
                                                            );

                                                            objectMarker.setMap(
                                                                objectMap
                                                            );

                                                            console.log(
                                                                'WIBEST: przesunięto Marker'
                                                            );
                                                        }

                                                    } else {

                                                        /*
                                                         * Tworzymy AdvancedMarkerElement
                                                         */
                                                        if (
                                                            google.maps.marker &&
                                                            google.maps.marker
                                                                .AdvancedMarkerElement
                                                        ) {

                                                            objectMarker =
                                                                new google.maps
                                                                    .marker
                                                                    .AdvancedMarkerElement({
                                                                        map: objectMap,
                                                                        position: position
                                                                    });

                                                            console.log(
                                                                'WIBEST: utworzono AdvancedMarkerElement'
                                                            );

                                                            /*
                                                             * Fallback do klasycznego markera
                                                             */
                                                        } else if (
                                                            google.maps.Marker
                                                        ) {

                                                            objectMarker =
                                                                new google.maps.Marker({
                                                                    map: objectMap,
                                                                    position: position
                                                                });

                                                            console.log(
                                                                'WIBEST: utworzono Marker'
                                                            );
                                                        }
                                                    }

                                                    /*
                                                     * --------------------------------------------------
                                                     * OBSZAR 100 METRÓW
                                                     * --------------------------------------------------
                                                     */

                                                    updateObjectRadiusCircle(
                                                        position
                                                    );

                                                    /*
                                                     * --------------------------------------------------
                                                     * LOG
                                                     * --------------------------------------------------
                                                     */

                                                    console.log(
                                                        'WIBEST: lokalizacja ustawiona:',
                                                        {
                                                            latitude:
                                                                latitude,

                                                            longitude:
                                                                longitude,

                                                            address:
                                                                place.formattedAddress ||
                                                                '',

                                                            place_id:
                                                                place.id ||
                                                                '',

                                                            name:
                                                                place.displayName ||
                                                                '',

                                                            viewport:
                                                                place.viewport ||
                                                                null,

                                                            radius:
                                                                100
                                                        }
                                                    );
                                                    $('#name').val(place.displayName);

                                                } catch (error) {

                                                    console.error(
                                                        'WIBEST: błąd podczas wyboru miejsca:',
                                                        error
                                                    );
                                                }
                                            }
                                        );

                                        console.log(
                                            'WIBEST: Google Maps gotowe'
                                        );

                                    } catch (error) {

                                        console.error(
                                            'WIBEST: błąd podczas inicjalizacji Google Maps:',
                                            error
                                        );
                                    }
                                }

                                /*
                                 * ------------------------------------------------------
                                 * ŁADOWANIE GOOGLE MAPS API
                                 * ------------------------------------------------------
                                 */

                                (function loadGoogleMaps() {

                                    if (
                                        typeof google !== 'undefined' &&
                                        typeof google.maps !== 'undefined'
                                    ) {

                                        console.log(
                                            'WIBEST: Google Maps już załadowane'
                                        );

                                        initObjectLocation();

                                        return;
                                    }

                                    if (
                                        document.querySelector(
                                            'script[data-wibest-google-maps]'
                                        )
                                    ) {

                                        console.log(
                                            'WIBEST: Google Maps jest już w trakcie ładowania'
                                        );

                                        return;
                                    }

                                    const googleMapsScript =
                                        document.createElement('script');

                                    googleMapsScript.src =
                                        'https://maps.googleapis.com/maps/api/js' +
                                        '?key={{ config('services.google.maps_key') }}' +
                                        '&libraries=places,marker';

                                    googleMapsScript.async = true;
                                    googleMapsScript.defer = true;

                                    googleMapsScript.dataset
                                        .wibestGoogleMaps = 'true';

                                    googleMapsScript.onload =
                                        function () {

                                            console.log(
                                                'WIBEST: Google Maps API załadowane'
                                            );

                                            initObjectLocation();
                                        };

                                    googleMapsScript.onerror =
                                        function () {

                                            console.error(
                                                'WIBEST: nie udało się załadować Google Maps API'
                                            );
                                        };

                                    document.head.appendChild(
                                        googleMapsScript
                                    );

                                })();
                                $('#allowed_distance').on('input change', function () {
                                    updateObjectRadiusCircle();
                                });
                                $('#allowed-distance-minus').on('click', function () {
                                    const input = $('#allowed_distance');
                                    const value = parseInt(input.val()) || 1;

                                    input.val(Math.max(1, value - 1)).trigger('change');
                                });

                                $('#allowed-distance-plus').on('click', function () {
                                    const input = $('#allowed_distance');
                                    const value = parseInt(input.val()) || 1;

                                    input.val(value + 1).trigger('change');
                                });
                            </script>

                        </div>



                        {{-- ================================================= --}}
                        {{-- PRACOWNICY --}}
                        {{-- ================================================= --}}

                        <div class="overflow-hidden rounded-2xl bg-gray-700">

                            <div class="flex items-center gap-3 border-b border-gray-600 px-5 py-4">

                                <div
                                    class="shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-users text-2xl" aria-hidden="true"></i>
                                </div>

                                <div>
                                    <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                        Pracownicy
                                    </h2>

                                    <p class="text-start text-xs text-gray-400">
                                        Osoby pracujące na tym obiekcie
                                    </p>
                                </div>

                            </div>


                            <div class="p-5">
                                {{-- Search --}}
                                <div class="mb-4 text-start relative">
                                    <i class="fa-solid fa-magnifying-glass absolute left-[16px] top-1/2
                                        -translate-y-1/2 text-md text-gray-400"></i>
                                    <input id="user-search" type="text" placeholder="Szukaj pracownika..."
                                        class="h-[46px] placeholder-gray-400 mt-2 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-600 dark:border-gray-600 dark:text-gray-100 !text-lg !leading-7 !pl-[48px]">
                                </div>


                                {{-- Users --}}

                                <div id="users-list" class="mt-3 max-h-[330px] space-y-1 overflow-y-auto pr-1">

                                    @forelse($users as $user)
                                        <div class="flex flex-row border-b border-gray-200 dark:border-gray-600">
                                            <x-flex-center class="px-3 py-2">
                                                <input type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    data-id="">
                                            </x-flex-center>
                                            <div
                                                class="px-3 py-2 text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                                                <x-user-photo :user="$user" />
                                                <x-user-name :user="$user" />
                                            </div>
                                        </div>
                                    @empty

                                        <div class="py-8 text-center">

                                            <i class="fa-solid fa-users-slash text-xl text-gray-600"></i>

                                            <p class="mt-2 text-xs text-gray-500">
                                                Brak pracowników
                                            </p>

                                        </div>

                                    @endforelse

                                </div>


                                <div class="mt-4 flex items-center justify-between border-t border-gray-600 pt-4">

                                    <span class="text-sm font-medium text-gray-400">
                                        Wybrano
                                    </span>

                                    <span id="selected-users-count" class="text-sm font-semibold text-green-300">
                                        0 pracowników
                                    </span>

                                </div>

                            </div>

                        </div>


                    </div>

                </div>


                {{-- ========================================================= --}}
                {{-- FOOTER --}}
                {{-- ========================================================= --}}

                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>

            </form>

        </x-container-content-no-shadow>

    </x-main-no-filter>

</x-app-layout>