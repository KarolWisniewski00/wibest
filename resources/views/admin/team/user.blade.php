<x-app-layout class="flex">
    <style>
        .employee-info-card .employee-card-preview > .grid { border: 0; gap: .5rem; }
        .employee-info-card .employee-card-preview > .grid > div > span { font-size: 1rem; line-height: 1.5rem; text-transform: none; letter-spacing: normal; font-weight: 500; flex-wrap: wrap; gap: .5rem; }
        .employee-info-card .employee-card-preview > .grid > p { font-size: .875rem; }
        .employee-info-card > .grid + .grid { padding-top: .25rem; }
        .employee-info-card > .grid:last-of-type { border-bottom: 0; padding-bottom: 0; }
        .dark .employee-info-card > .grid { border-bottom-color: rgb(55 65 81 / .7); }
    </style>
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

                @include('admin.team.employee-header')
                <div class="grid grid-cols-1 gap-6 my-6">
                    @if($user->company)
                        @if($user->working_hours_regular)
                            <x-team-info-card>
                                <div class="flex flex-wrap items-start justify-between gap-5">
                                    <div class="flex items-start gap-5">
                                    <div class="hidden sm:flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-200 to-violet-100 text-blue-700 text-2xl dark:from-blue-500/20 dark:to-violet-500/10 dark:text-blue-300" aria-hidden="true"><i class="fa-solid fa-calendar-week"></i></div>
                                    <div class="min-w-0">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Ustawienia czasu pracy</p>
                                        <h2 class="mt-1 text-3xl font-semibold tracking-tight">Typ planingu</h2>
                                    </div>
                                    </div>
                                    @if($user->working_hours_regular === 'stały planing' && ($role === 'admin' || $role === 'właściciel'))
                                        <x-button-link-blue href="{{ route('team.user.planing', $user) }}" class="ml-auto w-full min-w-0 justify-center !whitespace-normal md:w-auto">
                                            <i class="fa-solid fa-calendar mr-2" aria-hidden="true"></i>Edytuj planing
                                        </x-button-link-blue>
                                    @endif
                                </div>
                                <dl class="mt-2 grid gap-5 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">📅 Typ</dt>
                                        <dd class="mt-1 flex flex-wrap items-center gap-2 font-medium">
                                            {{ ucfirst($user->working_hours_regular) }}
                                            @if($user->working_hours_regular === 'stały planing')
                                                <x-label-cello>STA</x-label-cello>
                                            @elseif($user->working_hours_regular === 'zmienny planing')
                                                <x-label-violet>ZMI</x-label-violet>
                                            @elseif($user->working_hours_regular === 'prosty planing')
                                                <x-label-green>PRO</x-label-green>
                                            @endif
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">⏱️ Liczenie nadgodzin</dt>
                                        <dd class="mt-1 font-medium {{ $user->overtime ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400' }}">{{ $user->overtime ? 'Włączone' : 'Wyłączone' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">⏳ Próg naliczania</dt>
                                        <dd class="mt-1 font-medium">Powyżej {{ $user->overtime_threshold }} minut</dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">📝 Zadanie w nadgodzinach</dt>
                                        <dd class="mt-1 font-medium {{ $user->overtime_task ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400' }}">{{ $user->overtime_task ? 'Wymagane' : 'Niewymagane' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">👤 Zatwierdzenie przez przełożonego</dt>
                                        <dd class="mt-1 font-medium {{ $user->overtime_accept ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400' }}">{{ $user->overtime_accept ? 'Wymagane' : 'Niewymagane' }}</dd>
                                    </div>
                                    @if($user->working_hours_regular === 'stały planing' && $user->working_hours_from && $user->working_hours_to && $user->working_hours_start_day && $user->working_hours_stop_day)
                                    <div><dt class="text-gray-500 dark:text-gray-400">🕒 Godziny pracy</dt><dd class="mt-1 font-medium">Od {{ \Carbon\Carbon::parse($user->working_hours_from)->format('H:i') }} do {{ \Carbon\Carbon::parse($user->working_hours_to)->format('H:i') }}</dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">📅 Dni tygodnia</dt><dd class="mt-1 font-medium">Od {{ $user->working_hours_start_day }} do {{ $user->working_hours_stop_day }}</dd></div>
                                    @endif
                                </dl>
                                @if($user->working_hours_regular === 'stały planing' && (!$user->working_hours_from || !$user->working_hours_to || !$user->working_hours_start_day || !$user->working_hours_stop_day))
                                    <div role="status" class="flex w-full items-start gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4 text-amber-900 dark:border-amber-800 dark:bg-amber-900/20 dark:text-amber-200">
                                        <span class="text-2xl" aria-hidden="true">⚠️</span>
                                        <div><p class="font-semibold">Uzupełnij planing</p><p class="mt-1 text-sm">Ustaw zakres dni i godziny pracy przyciskiem „Edytuj planing”.</p></div>
                                    </div>
                                @endif
                                @if($role == 'admin' || $role == 'właściciel')
                                    <details data-animated-config class="mt-1 w-full" @if($errors->any()) open @endif>
                                        <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Konfiguruj typ planingu</summary>
                                        <div class="mt-5">
                                            @include('admin.team.planning-settings-form')
                                        </div>
                                    </details>
                                @endif
                            </x-team-info-card>
                        @else
                            <x-team-info-card>
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
                            </x-team-info-card>
                        @endif
                    @endif

                    @php
                        $colSpan = '';
                    @endphp
                    @if($user->supervisor || $user->position)
                        @if($user->company)
                            <x-team-info-card class="{{ $colSpan }}">
                                <div class="flex items-start gap-5">
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gray-100 text-2xl dark:bg-gray-700" aria-hidden="true">📱</div>
                                    <div class="min-w-0">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Komunikacja z pracownikiem</p>
                                        <h2 class="mt-1 text-3xl font-semibold tracking-tight">Wiadomości SMS</h2>
                                    </div>
                                </div>
                                <dl class="mt-2 grid gap-5 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                    <div><dt class="text-gray-500 dark:text-gray-400">📧 Wysłane wiadomości email</dt><dd class="mt-1 font-medium">{{ $msg_email->count() }}</dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">📱 Wysłane wiadomości SMS</dt><dd class="mt-1 font-medium">{{ $msg_sms->count() }}</dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">📩 Wszystkie wiadomości</dt><dd class="mt-1 font-medium">{{ $msg->count() }}</dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">🔔 Powiadomienia SMS</dt><dd class="mt-1 font-medium {{ $user->sms ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400' }}">{{ $user->sms ? 'Włączone' : 'Wyłączone' }}</dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">💲 Cena za SMS</dt><dd class="mt-1 font-medium">{{ number_format($user->company->sms_price ?? 0, 2) }} PLN</dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">💵 Suma wysłanych wiadomości SMS</dt><dd class="mt-1 font-medium">{{ number_format($msg->sum('price') ?? 0, 2) }} PLN</dd></div>
                                </dl>
                                @if($role == 'admin' || $role == 'właściciel')
                                    <details data-animated-config class="mt-1">
                                        <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Konfiguruj powiadomienia SMS</summary>
                                        <form method="POST" action="{{ route('team.user.update_sms', $user) }}" class="mt-5 space-y-5">
                                            @csrf
                                            @method('PUT')
                                            <label class="flex items-center gap-3 text-sm">
                                                <input type="checkbox" role="switch" name="sms" class="sr-only peer" @checked($user->sms)>
                                                <span aria-hidden="true" class="relative h-6 w-11 shrink-0 rounded-full bg-gray-200 transition-colors dark:bg-gray-700 peer-checked:bg-green-300 dark:peer-checked:bg-green-300 peer-focus-visible:ring-2 peer-focus-visible:ring-green-400 peer-focus-visible:ring-offset-2 dark:peer-focus-visible:ring-offset-gray-800 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow-sm after:transition-transform after:content-[''] peer-checked:after:translate-x-5"></span>
                                                Wysyłaj powiadomienia SMS przy wnioskach i odczytach pracy
                                            </label>
                                            <x-button-green type="submit"><i class="fa-solid fa-floppy-disk mr-2" aria-hidden="true"></i>Zapisz</x-button-green>
                                        </form>
                                    </details>
                                @endif
                            </x-team-info-card>
                        @endif
                    @endif
                </div>
                @include('admin.team.employment')
                @if($user->supervisor || $user->position)
                    @if($user->company)

                        @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel' || $user->id == auth()->user()->id)
                            <div class="my-6">
                                @php
                                    $shortcut = 'UW';
                                    $icon = '🏖️';
                                    $type = 'urlop wypoczynkowy';

                                    $baseDays = (float) ($leave_balance->base_days ?? 0);
                                    $carriedOver = (float) ($leave_balance->carried_over ?? 0);
                                    $usedDays = (float) ($leave_balance->used_days ?? 0);
                                    $remainingDays = max(0, (float) ($leave_balance_left ?? 0));

                                    $totalDays = $baseDays + $carriedOver;
                                    $usedPercentage = $totalDays > 0
                                        ? min(100, max(0, ($usedDays / $totalDays) * 100))
                                        : 0;
                                @endphp

                                <section
                                    class="group relative h-full overflow-hidden rounded-2xl bg-white p-6 dark:bg-gray-800 sm:p-8"
                                    aria-label="Podsumowanie urlopu wypoczynkowego">
                                    <!-- Nagłówek -->
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex min-w-0 items-start gap-5">
                                            <div
                                                class="hidden sm:flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-200 to-rose-100 text-pink-700 text-2xl dark:from-pink-500/20 dark:to-rose-500/10 dark:text-pink-300" aria-hidden="true">
                                                {{ $icon }}
                                            </div>

                                            <div class="min-w-0">
                                                <div
                                                    class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                                    Twój urlop
                                                </div>

                                                <h2 class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                                    Urlop wypoczynkowy
                                                </h2>
                                            </div>
                                        </div>

                                        <span
                                            class="shrink-0 rounded-lg bg-gray-200 px-2.5 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-100">
                                            {{ now()->year }}
                                        </span>
                                    </div>

                                    @if($leave_balance_left <= 0)
                                        <!-- Brak dostępnych dni -->
                                        <div class="mt-7 rounded-xl bg-gray-200 p-4 dark:bg-gray-600/70">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-200 text-gray-600 dark:bg-gray-500 dark:text-white">
                                                    <i class="fa-solid fa-calendar-xmark"></i>
                                                </div>

                                                <div>
                                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                                        Brak dostępnych dni
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                                                        Nie masz obecnie pozostałego urlopu do wykorzystania.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Główna wartość -->
                                        <div class="mt-7">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                                Pozostało Ci
                                            </p>

                                            <div class="mt-1 flex flex-wrap items-baseline gap-x-2 gap-y-1">
                                                <span
                                                    class="text-4xl font-bold tracking-tight tabular-nums text-gray-900 dark:text-white sm:text-5xl">
                                                    {{ $leave_balance_left }}
                                                </span>

                                                <span class="text-base font-medium text-gray-500 dark:text-gray-200">
                                                    {{ $leave_balance_left == 1 ? 'dzień' : 'dni' }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Pasek wykorzystania -->
                                        <div class="mt-6">
                                            <div class="mb-2 flex items-center justify-between gap-3 text-sm">
                                                <span class="text-gray-600 dark:text-gray-200">
                                                    Wykorzystano
                                                </span>

                                                <span class="font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    {{ $usedDays }} z {{ $totalDays }} dni
                                                </span>
                                            </div>

                                            <div class="h-2 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-600" role="progressbar"
                                                aria-label="Wykorzystanie puli urlopowej" aria-valuemin="0" aria-valuemax="100"
                                                aria-valuenow="{{ round($usedPercentage) }}">
                                                <div class="h-full rounded-full bg-pink-500 transition-[width] duration-700 ease-out motion-reduce:transition-none dark:bg-pink-400"
                                                    style="width: {{ $usedPercentage }}%"></div>
                                            </div>

                                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-300">
                                                {{ round($usedPercentage) }}% puli urlopowej wykorzystane
                                            </p>
                                        </div>

                                        <!-- Szczegóły -->
                                        <div
                                            class="mt-6 divide-y divide-gray-200 border-t border-gray-200 dark:divide-gray-600 dark:border-gray-600">
                                            <div class="flex items-center justify-between gap-4 py-3">
                                                <div class="flex items-center gap-3">
                                                    <span class="h-2 w-2 shrink-0 rounded-full bg-gray-400 dark:bg-gray-300"></span>
                                                    <span class="text-sm text-gray-600 dark:text-gray-200">
                                                        Przysługujący urlop
                                                    </span>
                                                </div>

                                                <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    {{ $leave_balance->base_days }} dni
                                                </span>
                                            </div>

                                            <div class="flex items-center justify-between gap-4 py-3">
                                                <div class="flex items-center gap-3">
                                                    <span class="h-2 w-2 shrink-0 rounded-full bg-gray-400 dark:bg-gray-300"></span>
                                                    <span class="text-sm text-gray-600 dark:text-gray-200">
                                                        Zaległy urlop
                                                    </span>
                                                </div>

                                                <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    {{ $leave_balance->carried_over }} dni
                                                </span>
                                            </div>

                                            <div class="flex items-center justify-between gap-4 py-3">
                                                <div class="flex items-center gap-3">
                                                    <span class="h-2 w-2 shrink-0 rounded-full bg-pink-400"></span>
                                                    <span class="text-sm text-gray-600 dark:text-gray-200">
                                                        Wykorzystany urlop
                                                    </span>
                                                </div>

                                                <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    {{ $leave_balance->used_days }} dni
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                </section>
                            </div>
                        @endif
                    @endif
                @endif
                @if(($user->supervisor || $user->position) && $user->company)
                        <!--PRZYCISKI-->
                        <div class="flex flex-col md:flex-row justify-end gap-4 mt-4">
                            @if($role == 'admin' || $role == 'właściciel')

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
    @include('admin.team.configuration-animation')
</x-app-layout>
