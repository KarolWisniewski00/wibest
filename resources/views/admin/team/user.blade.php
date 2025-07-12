<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Podgląd użytkownika.
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-team.nav :role="$role" :invitations="$invitations" />

        <!--CONTENT-->
        <div class="px-4 py-5 sm:px-6 lg:px-8">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('team.user.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->
            <x-container-gray class="px-0">
                <!--Użytkownik-->
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Użytkownik
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <span class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            @if($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                            @else
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            @endif
                            {{ $user->name }}
                            @if($user->role == 'admin')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Admin
                            </span>
                            @elseif($user->role == 'menedżer')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Menedżer
                            </span>
                            @elseif($user->role == 'kierownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Kierownik
                            </span>
                            @elseif($user->role == 'użytkownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Użytkownik
                            </span>
                            @endif
                        </span>
                    </div>
                </x-text-cell>
                <!--Użytkownik-->
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Email
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <a href="mailto:{{$user->email}}" class="inline-flex items-center gap-4 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            <span class="text-2xl">📧</span>
                            {{ $user->email }}
                        </a>
                    </div>
                </x-text-cell>
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Numer telefonu
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <a href="tel:{{$user->phone}}" class="inline-flex items-center gap-4 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            <span class="text-2xl">📱</span>
                            {{ $user->phone }}
                        </a>
                    </div>
                </x-text-cell>
                @if($user->oauth_id != null)
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Logowanie przez Google
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <x-status-green>
                            <i class="fa-brands fa-google mr-2"></i> Połączono
                        </x-status-green>
                    </div>
                </x-text-cell>
                @endif
            </x-container-gray>
            @if($user->supervisor || $user->position || $user->assigned_at)
            <x-container-gray class="px-0 mt-4">
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Bezpośredni przełożony
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        @if($user->supervisor)
                        <span class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            @if($user->supervisor->profile_photo_url)
                            <img src="{{ $user->supervisor->profile_photo_url }}" alt="{{ $user->supervisor->name }}" class="w-10 h-10 rounded-full">
                            @else
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                {{ strtoupper(substr($user->supervisor->name, 0, 1)) }}
                            </div>
                            @endif
                            {{ $user->supervisor->name }}
                            @if($user->supervisor->role == 'admin')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Admin
                            </span>
                            @elseif($user->supervisor->role == 'menedżer')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Menedżer
                            </span>
                            @elseif($user->supervisor->role == 'kierownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Kierownik
                            </span>
                            @elseif($user->supervisor->role == 'użytkownik')
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Użytkownik
                            </span>
                            @endif
                        </span>
                        @else
                        <span class="text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest">
                            Brak przełożonego
                        </span>
                        @endif
                    </div>
                </x-text-cell>
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Stanowisko
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <span class="inline-flex items-center gap-4 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            <span class="text-2xl">💼</span>
                            {{ $user->position ? $user->position : 'Brak stanowiska' }}
                        </span>
                    </div>
                </x-text-cell>
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Data dołączenia do zespołu
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <span class="inline-flex items-center gap-4 text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            <span class="text-2xl">📅</span>
                            {{ $user->assigned_at ? $user->assigned_at : 'Brak daty' }}
                        </span>
                    </div>
                </x-text-cell>
            </x-container-gray>
            @endif
            @if($user->working_hours_from && $user->working_hours_to)
            <x-container-gray class="px-0 mt-4">
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Godziny pracy
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        @if($user->working_hours_regular)
                        <div class="flex items-center gap-4">
                            <div class="text-2xl">🕒</div>
                            <div>
                                <div class="text-lg font-semibold mb-1">Stałe godziny pracy regulowane przez ustawienia niżej</div>
                            </div>
                        </div>
                        @else
                        <div class="flex items-center gap-4">
                            <div class="text-2xl">📅</div>
                            <div>
                                <div class="text-lg font-semibold mb-1">Zmienne godziny pracy regulowane przez harmonogram</div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="flex justify-start items-center w-full justify-start mt-2">
                        @if($user->working_hours_regular)
                        <div class="flex items-center gap-4">
                            <div class="text-2xl">🕒</div>
                            <div>
                                <div class="text-lg font-semibold mb-1">
                                    Od {{ \Carbon\Carbon::parse($user->working_hours_from)->format('H:i') }} do {{ \Carbon\Carbon::parse($user->working_hours_to)->format('H:i') }}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </x-text-cell>
            </x-container-gray>
            @endif
            <div class="flex justify-end mt-4">
                @if($role == 'admin' || $role == 'menedżer')
                <x-button-link-orange href="{{route('team.user.restart', $user)}}" class="text-lg mr-2">
                    <i class="fa-solid fa-paper-plane mr-2"></i>Wygeneruj nowe hasło i wyślij email
                </x-button-link-orange>
                <x-button-link-cello href="{{route('team.user.edit', $user)}}" class="text-lg mr-2">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edycja
                </x-button-link-cello>
                @if($user->id != $user_id)
                <form action="{{route('team.user.disconnect', $user)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz rozłączyć?');">
                    @csrf
                    <button type="submit" class="min-h-[34px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-user-minus mr-2"></i>Rozłącz
                    </button>
                </form>
                @endif
                @endif
            </div>
            <x-label class="my-2">
                Utworzono {{ $user->created_at }}
            </x-label>
            <x-label class="my-2">
                Ostatnia aktualizacja {{ $user->updated_at }}
            </x-label>
        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>