<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
        <!--SIDE BAR-->
        <x-sidebar-left>
            <li>
                <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
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
                                    <x-user-name-xl :user="$user" />
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

                        <!--Płeć-->
                        <x-text-cell>
                            <x-text-cell-label>
                                Płeć
                            </x-text-cell-label>
                            <x-text-cell-value>
                                @php
                                    $genderLabel = match ($user->gender) {
                                        'male' => '💙 Mężczyzna',
                                        'female' => '💖 Kobieta',
                                        default => '⚪ Brak danych',
                                    };
                                @endphp
                                <x-text-cell-span>
                                    {{ $genderLabel }}
                                </x-text-cell-span>
                            </x-text-cell-value>
                        </x-text-cell>
                        <!--Płeć-->


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

                    @if($user->supervisor || $user->position)
                        @if($user->company)
                            <x-container-gray>
                                <!--Bezpośredni przełożony-->
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Bezpośredni przełożony
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        @if($user->supervisor)
                                            <x-text-cell-span class="gap-2">
                                                <x-user-photo :user="$user->supervisor" />
                                                <x-user-name-xl :user="$user->supervisor" />
                                            </x-text-cell-span>
                                        @else
                                            <x-text-cell-span>
                                                Brak przełożonego
                                            </x-text-cell-span>
                                        @endif
                                    </x-text-cell-value>
                                </x-text-cell>
                                <!--Bezpośredni przełożony-->
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
                                @if($user->assigned_at)
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Data dołączenia do zespołu
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span class="gap-2 w-full">
                                                <x-status-cello>
                                                    📅
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->assigned_at)->format('d.m.Y') ?? '' }}
                                                </x-status-cello>
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                @endif
                                @if($user->paid_until)
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Opłacone do
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span class="gap-2 w-full">
                                                <x-status-cello>
                                                    📅
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->paid_until)->format('d.m.Y') ?? '' }}
                                                </x-status-cello>
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                @endif
                            </x-container-gray>
                        @endif
                    @endif

                    @if($user->company)
                        @if($user->working_hours_regular)
                            <x-container-gray>
                                @if($user->working_hours_regular == 'stały planing')
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Typ planingu
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span class="gap-2">
                                                <span>
                                                    <span class="text-2xl">🏢</span>Stały planing
                                                </span>
                                                <x-label-cello>
                                                    STA
                                                </x-label-cello>
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                @endif
                                @if($user->working_hours_regular == 'prosty planing')
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Typ planingu
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span>
                                                <span class="text-2xl">🧭</span>
                                                Prosty planing
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                @endif
                                @if($user->working_hours_regular == 'zmienny planing')
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Typ planingu
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span class="gap-2">
                                                <span>
                                                    <span class="text-2xl">🌀</span>Zmienny planing
                                                </span>
                                                <x-label-violet>
                                                    ZMI
                                                </x-label-violet>
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                @endif
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Liczenie nadgodzin
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            @if($user->overtime == 1)
                                                <x-success-span>
                                                    włączone
                                                </x-success-span>
                                            @else
                                                <x-danger-span>
                                                    wyłączone
                                                </x-danger-span>
                                            @endif
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Próg naliczania
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            <span class="text-2xl">⏳</span>
                                            powyżej {{ $user->overtime_threshold }} minut
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Wymagaj zadania w nadgodzinach
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            @if($user->overtime_task == 1)
                                                <x-success-span>
                                                    włączone
                                                </x-success-span>
                                            @else
                                                <x-danger-span>
                                                    wyłączone
                                                </x-danger-span>
                                            @endif
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Wymagaj zatwierdzenia przez przełożonego
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            @if($user->overtime_accept == 1)
                                                <x-success-span>
                                                    włączone
                                                </x-success-span>
                                            @else
                                                <x-danger-span>
                                                    wyłączone
                                                </x-danger-span>
                                            @endif
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                @if($role == 'admin' || $role == 'właściciel')
                                    <!-- Konfiguruj planning -->
                                    <x-button-link-neutral href="{{route('team.user.config_planing', $user)}}" class="text-lg md:mr-2">
                                        <i class="fa-solid fa-gears mr-2"></i>Konfiguruj
                                    </x-button-link-neutral>
                                    <!-- Konfiguruj planning -->
                                @endif
                            </x-container-gray>
                        @else
                            <x-container-gray>
                                <x-text-cell>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            @if($role == 'admin' || $role == 'właściciel')
                                                <x-alert-link href="{{ route('team.user.config_planing', $user->id) }}"
                                                    class="text-2xl">
                                                    Konfiguruj
                                                </x-alert-link>
                                            @else
                                                <x-alert-span class="text-2xl">
                                                    Konfiguruj
                                                </x-alert-span>
                                            @endif
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                            </x-container-gray>
                        @endif
                    @endif

                    @php
                        $colSpan = '';
                    @endphp
                    @if($user->company)
                        @if($user->working_hours_regular == 'stały planing')
                            @if($user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
                                @php
                                    $colSpan = 'md:col-span-2';
                                @endphp
                                <x-container-gray>
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Typ planingu
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span class="gap-2">
                                                <span>
                                                    <span class="text-2xl">🏢</span>Stały planing
                                                </span>
                                                <x-label-cello>
                                                    STA
                                                </x-label-cello>
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Godziny pracy
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span>
                                                <span class="text-2xl">🕒</span>
                                                Od {{ \Carbon\Carbon::parse($user->working_hours_from)->format('H:i') }} do
                                                {{ \Carbon\Carbon::parse($user->working_hours_to)->format('H:i') }}
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                    <x-text-cell>
                                        <x-text-cell-label>
                                            Dni tygodnia
                                        </x-text-cell-label>
                                        <x-text-cell-value>
                                            <x-text-cell-span>
                                                <span class="text-2xl">📅</span>
                                                Od {{ $user->working_hours_start_day }} do {{ $user->working_hours_stop_day }}
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                    @if($role == 'admin' || $role == 'właściciel')
                                        <!-- Edytuj planning -->
                                        <x-button-link-blue href="{{route('team.user.planing', $user)}}" class="text-lg md:mr-2">
                                            <i class="fa-solid fa-calendar mr-2"></i>Edytuj planning
                                        </x-button-link-blue>
                                        <!-- Edytuj planning -->
                                    @endif
                                </x-container-gray>
                            @else
                                @php
                                    $colSpan = 'md:col-span-2';
                                @endphp
                                <x-container-gray>
                                    <x-text-cell>
                                        <x-text-cell-value>
                                            <x-text-cell-span>
                                                @if($role == 'admin' || $role == 'właściciel')
                                                    <x-alert-link href="{{ route('team.user.planing', $user->id) }}" class="text-2xl">
                                                        Edytuj planing
                                                    </x-alert-link>
                                                @else
                                                    <x-alert-link href="" class="text-2xl">
                                                        Edytuj planing
                                                    </x-alert-link>
                                                @endif
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                </x-container-gray>
                            @endif
                        @endif
                    @endif
                    @if($user->supervisor || $user->position)
                        @if($user->company)
                            <x-container-gray class="{{ $colSpan }}">
                                <!--Ilość wysłanych wiadomości email-->
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Ilość wysłanych wiadomości email
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            <span class="text-2xl">📧</span>
                                            {{ $msg_email->count() }}
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <!--Ilość wysłanych wiadomości email-->
                                <!--Ilość wysłanych wiadomości SMS-->
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Ilość wysłanych wiadomości SMS
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            <span class="text-2xl">📱</span>
                                            {{ $msg_sms->count() }}
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <!--Ilość wysłanych wiadomości SMS-->
                                <!--Ilość wysłanych wszystkich wiadomości-->
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Ilość wysłanych wszystkich wiadomości
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            <span class="text-2xl">📩</span>
                                            {{ $msg->count() }}
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <!--Ilość wysłanych wszystkich wiadomości-->
                                <!--Powiadomienia SMS-->
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Powiadomienia SMS
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            @if($user->sms == 1)
                                                <x-success-span>
                                                    włączone
                                                </x-success-span>
                                            @else
                                                <x-danger-span>
                                                    wyłączone
                                                </x-danger-span>
                                            @endif
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <!--Powiadomienia SMS-->
                                <!--Cena za SMS-->
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Cena za SMS
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            <span class="text-2xl">💲</span>
                                            {{ number_format($user->company->sms_price ?? 0, 2) }} PLN
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <!--Cena za SMS-->
                                <!--Suma wysłanych wiadomości SMS-->
                                <x-text-cell>
                                    <x-text-cell-label>
                                        Suma wysłanych wiadomości SMS
                                    </x-text-cell-label>
                                    <x-text-cell-value>
                                        <x-text-cell-span>
                                            <span class="text-2xl">💵</span>
                                            {{ number_format($msg->sum('price') ?? 0, 2) }} PLN
                                        </x-text-cell-span>
                                    </x-text-cell-value>
                                </x-text-cell>
                                <!--Suma wysłanych wiadomości SMS-->
                                @if($role == 'admin' || $role == 'właściciel')
                                    <!-- Konfiguruj SMS -->
                                    <x-button-link-neutral href="{{route('team.user.config_sms', $user)}}" class="text-lg md:mr-2">
                                        <i class="fa-solid fa-gears mr-2"></i>Konfiguruj
                                    </x-button-link-neutral>
                                    <!-- Konfiguruj SMS -->
                                @endif
                            </x-container-gray>
                        @endif
                    @endif
                </div>
                @if($user->supervisor || $user->position)
                    @if($user->company)
                        <!--PRZYCISKI-->
                        <div class="flex flex-col md:flex-row justify-end gap-4 mt-4">
                            @if($role == 'admin' || $role == 'właściciel')
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
                                    <form action="{{ route('team.user.disconnect', $user) }}" method="POST" class="w-full md:w-fit"
                                        onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika z firmy?');">
                                        @csrf
                                        <x-button-red type="submit" class="text-lg w-full md:w-fit">
                                            <i class="fa-solid fa-user-minus mr-2"></i>Rozłącz
                                        </x-button-red>
                                    </form>
                                    <!--USUŃ-->
                                @endif
                            @endif
                        </div>
                        <!--PRZYCISKI-->
                        @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel' || $user->id == auth()->user()->id)
                            <!--Podsumowanie dnia-->
                            <div class="flex flex-col w-full md:pt-4">
                                <x-h1-display class="text-center md:text-start my-4 md:my-0">
                                    ⏱️ Podsumowanie dnia
                                </x-h1-display>
                            </div>
                            <div class="grid grid-cols-1 gap-4 md:py-4 w-full">
                                <x-container-gray>
                                    <x-text-cell>
                                        <x-text-cell-value>
                                            <x-text-cell-span class="flex flex-col w-full">
                                                @php
                                                    $status = $user->getToday();
                                                @endphp
                                                @if($status['status'] == 'warning')
                                                    <x-alert-span class="!text-center">
                                                        {{ $status['message'] }}
                                                    </x-alert-span>
                                                @elseif($status['status'] == 'success')
                                                    <x-success-span class="!text-center">
                                                        {{ $status['message'] }}
                                                    </x-success-span>
                                                @else
                                                    <x-danger-span class="!text-center">
                                                        {{ $status['message'] }}
                                                    </x-danger-span>
                                                @endif

                                                @if($status['timing'])
                                                    <div class="italic text-xs text-gray-500 dark:text-gray-500 !text-center">
                                                        {{ $status['timing'] }}
                                                    </div>
                                                @endif

                                                @if($status['type'] == 'rcp' && ($status['start'] || $status['stop']))
                                                    <x-text-cell-span class="gap-2">

                                                        {{-- Ikonka + typ --}}
                                                        <div class="flex flex-col items-center justify-center h-full w-full">
                                                            <span class="text-lg md:text-xl">
                                                                ⏱️
                                                            </span>
                                                            <x-label-green class="mt-1">
                                                                RCP
                                                            </x-label-green>
                                                        </div>

                                                        {{-- Dane szczegółowe --}}
                                                        <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                                            <x-paragraf-display
                                                                class="text-2xl whitespace-nowrap font-semibold w-fit text-start relative">
                                                                <x-status-dark>
                                                                    @if($status['start'])
                                                                    {{ \Carbon\Carbon::parse($status['start'])->format('H:i') }} @endif
                                                                    @if($status['stop']) -
                                                                    {{ \Carbon\Carbon::parse($status['stop'])->format('H:i') }} @else -
                                                                    TERAZ @endif
                                                                </x-status-dark>
                                                            </x-paragraf-display>
                                                            @if($status['worked_time'])
                                                                @if($status['stop'])
                                                                    <x-paragraf-display
                                                                        class="text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-2xl whitespace-nowrap font-semibold w-fit text-start relative">
                                                                        <span>{{ $status['worked_time'] }}</span>
                                                                    </x-paragraf-display>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </x-text-cell-span>
                                                @endif

                                                @if($status['type'] == 'leave')
                                                    <div
                                                        class="flex flex-col md:flex-row items-center justify-center gap-2 py-2 rounded-2xl">

                                                        {{-- Ikonka + typ --}}
                                                        <div class="flex flex-col items-center justify-center">
                                                            <span class="text-lg md:text-xl">
                                                                {{ config('leavetypes.icons.' . $status['timing'], '') }}
                                                            </span>
                                                            <x-label-pink class="mt-1">
                                                                {{ config('leavetypes.shortType.' . $status['timing'], '') }}
                                                            </x-label-pink>
                                                        </div>

                                                        {{-- Dane szczegółowe --}}
                                                        <div
                                                            class="flex flex-col md:flex-col gap-3 text-sm md:text-base text-gray-800 dark:text-gray-100">
                                                            <x-paragraf-display class="text-2xl whitespace-nowrap">
                                                                <x-status-cello>
                                                                    @if($status['timing'])
                                                                    {{ \Carbon\Carbon::parse($status['start'])->format('d.m') }} @endif
                                                                    @if($status['start'] && $status['stop']) - @endif @if($status['stop'])
                                                                    {{ \Carbon\Carbon::parse($status['stop'])->format('d.m') }} @endif
                                                                </x-status-cello>
                                                            </x-paragraf-display>
                                                        </div>
                                                    </div>
                                                @endif
                                            </x-text-cell-span>
                                        </x-text-cell-value>
                                    </x-text-cell>
                                </x-container-gray>
                            </div>
                            <!--Podsumowanie dnia-->

                            <!--HEADER-->
                            <div class="flex flex-col w-full md:pt-4">
                                <x-h1-display class="text-center md:text-start my-4 md:my-0">
                                    <span>🏖️</span> Urlopy {{ \Carbon\Carbon::now()->year }}
                                </x-h1-display>
                            </div>
                            <!--HEADER-->
                            <div class="md:py-4">
                                <div
                                    class="grid md:grid-cols-2 gap-4 w-full h-full appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                                    @php
                                        $shortcut = 'UW';
                                        $icon = '🏖️';
                                        $type = 'urlop wypoczynkowy';
                                    @endphp
                                    <x-leave-name :icon="$icon" :type="$type" :shortcut="$shortcut" />
                                    @if($leave_balance_left <= 0)
                                        <span
                                            class="text-xs font-semibold text-gray-900 dark:text-yellow-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                            w {{ now()->year }} pozostało: BRAK DAYCH
                                        </span>
                                    @else
                                        <div class="flex flex-col text-end">
                                            <span
                                                class="text-xs font-semibold text-gray-900 dark:text-gray-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                                Należy Ci się: {{ $leave_balance->base_days }} dni
                                            </span>
                                            <span
                                                class="text-xs font-semibold text-gray-900 dark:text-gray-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                                Pozostało z ubiegłego roku: {{ $leave_balance->carried_over }} dni
                                            </span>
                                            <span
                                                class="text-xs font-semibold text-orange-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                                Wykorzystano: {{ $leave_balance->used_days }} dni
                                            </span>
                                            <span
                                                class="text-xs font-semibold text-green-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                                w {{ now()->year }} pozostało: {{ $leave_balance_left }} dni
                                            </span>
                                        </div>

                                    @endif
                                </div>
                            </div>
                        @endif
                    @endif
                @endif
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