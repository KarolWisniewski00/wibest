    @php
    $shortType = ['wolne za pracę w święto' => 'WPS',
    'zwolnienie lekarskie' => 'ZL',
    'urlop wypoczynkowy' => 'UW',
    'urlop rodzicielski' => 'UR',
    'wolne za nadgodziny' => 'WN',
    'wolne za święto w sobotę' => 'WSS',
    'urlop bezpłatny' => 'UB',
    'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
    'zwolnienie lekarsie - opieka' => 'ZLO',
    'urlop okolicznościowy' => 'UO',
    'urlop wypoczynkowy "na żądanie"' => 'UWZ',
    'oddanie krwi' => 'OK',
    'urlop ojcowski' => 'UOJC',
    'urlop macieżyński' => 'UM',
    'świadczenie rehabilitacyjne' => 'SR',
    'opieka' => 'OP',
    'świadek w sądzie' => 'SWS',
    'praca zdalna' => 'PZ',
    'kwarantanna' => 'KW',
    'kwarantanna z pracą zdalną' => 'KWZPZ',
    'delegacja' => 'DEL'
    ];
    $icons = [
    'wolne za pracę w święto' => '🕊️',
    'zwolnienie lekarskie' => '🤒',
    'urlop wypoczynkowy' => '🏖️',
    'urlop rodzicielski' => '👶',
    'wolne za nadgodziny' => '⏰',
    'wolne za święto w sobotę' => '🗓️',
    'urlop bezpłatny' => '💸',
    'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
    'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
    'urlop okolicznościowy' => '🎉',
    'urlop wypoczynkowy "na żądanie"' => '📢',
    'oddanie krwi' => '🩸',
    'urlop ojcowski' => '👨‍👧',
    'urlop macieżyński' => '🤱',
    'świadczenie rehabilitacyjne' => '🦾',
    'opieka' => '🧑‍🍼',
    'świadek w sądzie' => '⚖️',
    'praca zdalna' => '💻',
    'kwarantanna' => '🦠',
    'kwarantanna z pracą zdalną' => '🏠💻',
    'delegacja' => '✈️',
    ];
    @endphp
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 dark:border-gray-700 shadow fixed w-full z-10">
    <!-- Primary Navigation Menu -->
    <div class="w-full">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center ms-8 md:ms-0 md:w-64 justify-center">
                    <a href="{{ route('dashboard') }}">
                        <span class="sm:order-1 text-green-300 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 dark:text-green-300" style='font-family: "Raleway", sans-serif;'>WIBEST</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 xl:-my-px xl:ms-4 xl:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <i class="fa-solid fa-house"></i>
                    </x-nav-link>
                    <x-nav-link href="{{ route('team.user.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/team')">
                        <i class="fa-solid fa-users mr-2"></i>Zespół
                    </x-nav-link>
                    @if($role != 'użytkownik')
                    <x-nav-link href="{{ route('calendar.all.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/calendar')">
                        <i class="fa-solid fa-calendar-days mr-2"></i>Urlopy planowane
                    </x-nav-link>
                    @endif
                    <x-nav-link href="{{ route('leave.single.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/leave')">
                        <i class="fa-solid fa-inbox mr-2"></i>Wnioski
                    </x-nav-link>
                    <x-nav-link href="{{ route('rcp.work-session.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/rcp')">
                        <i class="fa-solid fa-clock mr-2"></i>RCP
                    </x-nav-link>
                    <x-nav-link href="{{ route('raport.time-sheet.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/raport')">
                        <i class="fa-solid fa-chart-line mr-2"></i>Raporty
                    </x-nav-link>
                    <x-nav-link href="{{ route('setting') }}" :active="Str::startsWith(request()->path(), 'dashboard/setting')">
                        <i class="fa-solid fa-gear mr-2"></i>Moja firma
                    </x-nav-link>
                </div>
            </div>
            @if ($company)
            <div class="items-center hidden sm:flex xl:hidden 2xl:flex">
                @if($date['leave'] != null)
                <x-widget-display-nav class="grid grid-cols-1 gap-4 p-2 m-2 w-full">
                    <!-- Lewa kolumna: Data i Timer -->
                    <div class="space-y-1 flex flex-col justify-center">
                        <!-- Data -->
                        <x-flex-center>
                            <x-paragraf-display id="date" class="text-xs text-gray-600 dark:text-gray-300">
                                <!-- Data -->
                            </x-paragraf-display>
                        </x-flex-center>

                        <!-- Timer -->
                        <x-flex-center>
                            <x-paragraf-display class="text-xs font-bold text-gray-900 dark:text-white">
                                <div class="flex flex-row gap-1 justify-start items-center">
                                    <div class="text-md mx-2">{{ $icons[$date['leave']] ?? '' }}</div>
                                    <div class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-md">{{ $date['leave'] ?? '' }}</div>
                                    <span class="px-3 py-1 mx-2 rounded-full text-[0.5rem] w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        {{ $shortType[$date['leave']] ?? '' }}
                                    </span>
                                </div>
                            </x-paragraf-display>
                        </x-flex-center>
                    </div>
                </x-widget-display-nav>
                @elseif($date['isHoliday'] == true)
                <x-widget-display-nav class="grid grid-cols-1 gap-4 p-2 m-2 w-full">
                    <!-- Lewa kolumna: Data i Timer -->
                    <div class="space-y-1 flex flex-col justify-center">
                        <!-- Data -->
                        <x-flex-center>
                            <x-paragraf-display id="date" class="text-xs text-gray-600 dark:text-gray-300">
                                <!-- Data -->
                            </x-paragraf-display>
                        </x-flex-center>

                        <!-- Timer -->
                        <x-flex-center>
                            <x-paragraf-display class="text-xs font-bold text-gray-900 dark:text-white">
                                <div class="flex flex-row gap-1 justify-start items-center">
                                    <div class="text-md mx-2">🎌</div>
                                    <div class="flex flex-row gap-1 items-center">
                                        <div class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-md">Święto ustawowo wolne</div>
                                        <span class="px-3 py-1 mx-2 rounded-full text-[0.5rem] w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            ŚUW
                                        </span>
                                    </div>
                                </div>
                            </x-paragraf-display>
                        </x-flex-center>
                    </div>
                </x-widget-display-nav>
                @elseif($date['leave'] == null)
                <x-widget-display-nav class="grid-cols-3 grid-rows-1 gap-4 p-2 m-2 w-full">
                    <div class="col-span-2">
                        <!-- Data -->
                        <div class="">
                            <x-flex-center>
                                <x-paragraf-display id="date" class="text-xs">
                                </x-paragraf-display>
                            </x-flex-center>
                        </div>
                        <!-- Timer -->
                        <div>
                            <x-flex-center>
                                <x-paragraf-display id="timer" class="text-lg">
                                    00:00:00
                                </x-paragraf-display>
                            </x-flex-center>
                        </div>
                    </div>
                    <div class="col-start-3 h-full">
                        <!-- Przycisk Start -->
                        <div class="text-center flex justify-center items-center h-full">
                            <button
                                id="startButton"
                                class="text-xs whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-play mr-2"></i>Start
                            </button>
                            <!-- Przycisk Stop -->
                            <button
                                id="stopButton"
                                class="hidden text-xs min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-stop mr-2"></i>Stop
                            </button>
                        </div>
                    </div>
                </x-widget-display-nav>
                @endif
            </div>
            @endif
            <div class="hidden xl:flex xl:items-center xl:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                    {{ Auth::user()->currentTeam->name }}

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <!-- Team Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-dropdown-link>
                                @endcan

                                <!-- Team Switcher -->
                                @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                                @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="me-4 relative">
                    <x-dropdown-jets align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Zarządaj kontem
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                Profil
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    Wyloguj
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown-jets>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="me-4 flex items-center xl:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-4 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden xl:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-house mr-2"></i>Panel Główny
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('team.user.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/team')">
                <i class="fa-solid fa-users mr-2"></i>Zespół
            </x-responsive-nav-link>
            @if($role != 'użytkownik')
            <x-responsive-nav-link href="{{ route('calendar.all.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/calendar')">
                <i class="fa-solid fa-calendar-days mr-2"></i>Urlopy planowane
            </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link href="{{ route('leave.single.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/leave')">
                <i class="fa-solid fa-inbox mr-2"></i>Wnioski
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('rcp.work-session.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/rcp')">
                <i class="fa-solid fa-clock mr-2"></i>RCP
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('raport.time-sheet.index') }}" :active="Str::startsWith(request()->path(), 'dashboard/raport')">
                <i class="fa-solid fa-chart-line mr-2"></i>Raporty
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('setting') }}" :active="Str::startsWith(request()->path(), 'dashboard/setting')">
                <i class="fa-solid fa-gear mr-2"></i>Moja firma
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="shrink-0 me-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    Profil
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                        @click.prevent="$root.submit();">
                        Wyloguj
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-responsive-nav-link>
                @endcan

                <!-- Team Switcher -->
                @if (Auth::user()->allTeams()->count() > 1)
                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-switchable-team :team="$team" component="responsive-nav-link" />
                @endforeach
                @endif
                @endif
            </div>
        </div>
    </div>
</nav>