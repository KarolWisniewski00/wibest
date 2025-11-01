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
        <x-container-content-form>
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('team.user.index') }}" class="text-lg">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                <x-container-gray>
                    <!--Użytkownik-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Użytkownik
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2">
                                <x-user-photo :user="$user" />
                                <x-user-name :user="$user" />
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Użytkownik-->

                    <!--Email-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Email
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-a href="mailto:{{$user->email}}" style="word-break: break-all;">
                                <span class="text-2xl">📧</span>
                                {{ $user->email }}
                            </x-text-cell-a>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Email-->

                    <!--Numer telefonu-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Numer telefonu
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-a href="tel:{{$user->phone}}">
                                <span class="text-2xl">📱</span>
                                {{ $user->phone }}
                            </x-text-cell-a>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Numer telefonu-->

                    <!--Logowanie przez Google-->
                    @if($user->oauth_id != null)
                    <x-text-cell>
                        <x-text-cell-label>
                            Logowanie przez Google
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-status-green>
                                <i class="fa-brands fa-google mr-2"></i> Połączono
                            </x-status-green>
                        </x-text-cell-value>
                    </x-text-cell>
                    @endif
                    <!--Logowanie przez Google-->
                </x-container-gray>

                @if($user->supervisor || $user->position || $user->assigned_at)
                @if($user->company)
                <x-container-gray>
                    <x-text-cell>
                        <x-text-cell-label>
                            Bezpośredni przełożony
                        </x-text-cell-label>
                        <x-text-cell-value>
                            @if($user->supervisor)
                            <x-text-cell-span class="gap-2">
                                <x-user-photo :user="$user->supervisor" />
                                <x-user-name :user="$user->supervisor" />
                            </x-text-cell-span>
                            @else
                            <x-text-cell-span>
                                Brak przełożonego
                            </x-text-cell-span>
                            @endif
                        </x-text-cell-value>
                    </x-text-cell>
                    <x-text-cell>
                        <x-text-cell-label>
                            Stanowisko
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">💼</span>
                                {{ $user->position ? $user->position : 'Brak stanowiska' }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <x-text-cell>
                        <x-text-cell-label>
                            Data dołączenia do zespołu
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📅</span>
                                {{ $user->assigned_at ? $user->assigned_at : 'Brak daty' }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                </x-container-gray>
                @endif
                @endif
                @if($user->working_hours_from && $user->working_hours_to || $user->working_hours_start_day || $user->working_hours_stop_day)
                @if($user->company)
                <x-container-gray>
                    <x-text-cell>
                        <x-text-cell-label>
                            Ustawienia pracy
                        </x-text-cell-label>
                        <x-text-cell-value>
                            @if($user->working_hours_regular)
                            <x-text-cell-span>
                                <span class="text-2xl">🕒</span>
                                Stałe godziny pracy
                            </x-text-cell-span>
                            @else
                            <x-text-cell-span>
                                <span class="text-2xl">📅</span>
                                Zmienne godziny pracy
                            </x-text-cell-span>
                            @endif
                        </x-text-cell-value>
                    </x-text-cell>
                    <x-text-cell>
                        <x-text-cell-label>
                            Godziny pracy
                        </x-text-cell-label>
                        <x-text-cell-value>
                            @if($user->working_hours_regular)
                            <x-text-cell-span>
                                <span class="text-2xl">🕒</span>
                                Od {{ \Carbon\Carbon::parse($user->working_hours_from)->format('H:i') }} do {{ \Carbon\Carbon::parse($user->working_hours_to)->format('H:i') }}
                            </x-text-cell-span>
                            @endif
                        </x-text-cell-value>
                    </x-text-cell>
                    <x-text-cell>
                        <x-text-cell-label>
                            Dni tygodnia
                        </x-text-cell-label>
                        <x-text-cell-value>
                            @if($user->working_hours_regular)
                            <x-text-cell-span>
                                <span class="text-2xl">📆</span>
                                Od {{ $user->working_hours_start_day }} do {{ $user->working_hours_stop_day }}
                            </x-text-cell-span>
                            @endif
                        </x-text-cell-value>
                    </x-text-cell>
                    @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                    <!-- Edytuj planning -->
                    <x-button-link-blue href="{{route('team.user.planing', $user)}}" class="text-lg md:mr-2">
                        <i class="fa-solid fa-calendar mr-2"></i>Edytuj planning
                    </x-button-link-blue>
                    <!-- Edytuj planning -->
                    @endif
                </x-container-gray>
                @endif
                @else
                @if($user->company)
                <x-container-gray>
                    <x-text-cell>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                                <x-alert-link href="{{ route('team.user.planing', $user->id) }}" class="text-2xl">
                                    Ustaw godziny pracy
                                </x-alert-link>
                                @else
                                <x-alert-link href="" class="text-2xl">
                                    Ustaw godziny pracy
                                </x-alert-link>
                                @endif
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                </x-container-gray>
                @endif
                @endif
            </div>

            <!--PRZYCISKI-->
            <div class="flex justify-end gap-4 mt-4">
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                <!-- Reset hasła -->
                <x-button-link-orange href="{{route('team.user.restart', $user)}}" class="text-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>Reset hasła
                </x-button-link-orange>
                <!-- Reset hasła -->

                @if($user->company)
                <!-- EDYTUJ -->
                <x-button-link-blue href="{{route('team.user.edit', $user)}}" class="text-lg">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                </x-button-link-blue>
                <!--EDYTUJ-->
                @endif

                <!--USUŃ-->
                @if($user->id != $user_id)
                <form action="{{ route('team.user.disconnect', $user) }}" method="POST"
                    onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika z firmy?');">
                    @csrf
                    <x-button-red type="submit" class="text-lg">
                        <i class="fa-solid fa-user-minus mr-2"></i>Rozłącz
                    </x-button-red>
                </form>
                <!--USUŃ-->
                @endif
                @endif
            </div>
            <!--PRZYCISKI-->

            <x-label class="py-2 mt-4">
                Utworzono {{ $user->created_at }}
            </x-label>
            <x-label class="py-2">
                Ostatnia aktualizacja {{ $user->updated_at }}
            </x-label>
        </x-container-content-form>
        <!--CONTENT-->

    </x-main>
    <!--MAIN-->

    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>