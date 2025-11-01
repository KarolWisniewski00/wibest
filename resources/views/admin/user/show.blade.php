<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.user') }}" class="text-lg">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                @if($user->company)
                <x-container-gray>
                    <!--Nazwa-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Nazwa
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-label-link-company
                                href="{{route('setting.client.show', $user->company)}}"
                                class="flex justify-center items-center font-semibold text-2xl uppercase tracking-widest">
                                {{ $user->company->name }}
                            </x-label-link-company>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Nazwa-->

                    <!--Adres-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Adres
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">📍</span>
                                {{ $user->company->adress }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Adres-->

                    <!--NIP-->
                    <x-text-cell>
                        <x-text-cell-label>
                            NIP
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span class="text-2xl">🧾</span>
                                {{ $user->company->vat_number }}
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--NIP-->

                    <!-- Edytuj planning -->
                    <x-button-link-blue href="{{route('setting.user.edit-company', $user)}}" class="text-lg">
                        <i class="fa-solid fa-building mr-2"></i>Edytuj firmę
                    </x-button-link-blue>
                    <!-- Edytuj planning -->

                    <!--Rozłącz-->
                    <form action="{{route('team.user.disconnect', $user)}}" method="POST"
                        onsubmit="return confirm('Czy na pewno chcesz rozłączyć tego użytkownika?');"
                        class="w-full">
                        @csrf
                        <x-button-red type="submit" class="text-lg w-full">
                            <i class="fa-solid fa-user-minus mr-2"></i>Rozłącz
                        </x-button-red>
                    </form>
                    <!--Rozłącz-->
                </x-container-gray>
                @else
                <x-container-gray>
                    <x-text-cell>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <x-alert-link href="{{route('setting.user.edit-company', $user)}}" class="text-2xl">
                                    Brak firmy
                                </x-alert-link>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                </x-container-gray>
                @endif

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

                    <!-- Edytuj planning -->
                    <x-button-link-blue href="{{route('setting.user.edit-planing', $user)}}" class="text-lg md:mr-2">
                        <i class="fa-solid fa-calendar mr-2"></i>Edytuj planning
                    </x-button-link-blue>
                    <!-- Edytuj planning -->
                </x-container-gray>
                @endif
                @else
                @if($user->company)
                <x-container-gray>
                    <x-text-cell>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <x-alert-link href="{{ route('setting.user.edit-planing', $user->id) }}" class="text-2xl">
                                    Ustaw godziny pracy
                                </x-alert-link>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                </x-container-gray>
                @endif
                @endif
            </div>

            <!--PRZYCISKI-->
            <div class="flex justify-end gap-4 mt-4">
                <!-- Reset hasła -->
                <x-button-link-orange href="{{route('team.user.restart', $user)}}" class="text-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>Reset hasła
                </x-button-link-orange>
                <!-- Reset hasła -->
                 
                @if($user->company)
                <!-- EDYTUJ -->
                <x-button-link-blue href="{{route('setting.user.edit', $user)}}" class="text-lg">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                </x-button-link-blue>
                <!--EDYTUJ-->
                @endif

                <!--USUŃ-->
                <form action="{{ route('setting.user.delete', $user) }}" method="POST"
                    onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika?');">
                    @csrf
                    @method('DELETE')
                    <x-button-red type="submit" class="text-lg">
                        <i class="fa-solid fa-trash mr-2"></i>Usuń
                    </x-button-red>
                </form>
                <!--USUŃ-->
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

    </x-main-no-filter>
    <!--MAIN-->

    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>