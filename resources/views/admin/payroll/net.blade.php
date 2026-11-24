<x-app-layout class="flex">
    <x-sidebar-left>
        <li>
                <div class="payroll-month flex w-full items-center gap-4 rounded-2xl bg-gray-700 p-5 text-white dark:bg-gray-700">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-600" aria-hidden="true">📅</span>
                    <div><p class="text-sm text-gray-300">Miesiąc rozliczenia</p><p class="mt-1 text-xl font-semibold tracking-tight">{{ \Carbon\Carbon::createFromFormat('!Y-m', $period)->locale('pl')->translatedFormat('F Y') }}</p><p class="mt-1 text-sm text-gray-300">Okres wynagrodzenia</p></div>
                </div>
        </li>
    </x-sidebar-left>
    <x-main>
        <x-raport.nav />
        @include('admin.elements.alerts')
        @php($fieldClass = 'payroll-input')
        @php($settled = $row['payment_status'] === 'Rozliczono')
        <div class="payroll-workspace">
            <header class="flex flex-wrap items-start justify-between gap-6">
                <div class="flex min-w-0 items-start gap-5">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">💼</div>
                    <div class="min-w-0"><p class="text-sm text-gray-500 dark:text-gray-400">Wynagrodzenia · {{ $user->name }}</p>
                    <h1 class="mt-1">Rozliczenie miesiąca</h1>
                    <p class="mt-3">Umowa o pracę · {{ \Carbon\Carbon::createFromFormat('!Y-m', $period)->format('m.Y') }}</p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Sprawdź dane, oblicz wypłatę i zapisz rozliczenie.</p>
                    </div>
                </div>

                    <x-button-link-neutral class="payroll-action mt-4" href="{{ route('team.user.show', $user) }}#employment-title"><i class="fas fa-user mr-2" aria-hidden="true"></i> Umowa i oświadczenia pracownika</x-button-link-neutral>
            </header>
            @if($errors->any())
                <div role="alert" class="rounded-2xl border border-red-200 bg-red-50 p-5 text-red-900 dark:border-red-800 dark:bg-gray-700 dark:text-red-300">
                    <p class="font-semibold">⚠️ Sprawdź dane formularza</p><ul class="mt-3 list-disc space-y-2 pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            @if(!$settled && ($row['missing'] || $row['attention']))
                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 sm:p-8 dark:border-amber-800 dark:bg-gray-900" role="region" aria-labelledby="payroll-missing-title">
                    <div class="flex items-start gap-4">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-xl text-amber-700 dark:bg-amber-900 dark:text-amber-200" aria-hidden="true"><i class="fas fa-clipboard-list"></i></span>
                        <div>
                            <h2 id="payroll-missing-title">Co wymaga uzupełnienia</h2>
                            <p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">Sprawdź poniższe pozycje. Po ich wyjaśnieniu wróć do rozliczenia miesiąca.</p>
                        </div>
                    </div>
                    <div class="mt-6 space-y-6">
                        @foreach(['missing' => 'Brakujące dane', 'attention' => 'Do sprawdzenia'] as $group => $heading)
                            @if($row[$group])
                                <div>
                                    <h3 class="font-semibold">{{ $heading }} <span class="ml-2 text-sm font-normal text-gray-500 dark:text-gray-400">({{ count($row[$group]) }})</span></h3>
                                    <ul class="mt-3 space-y-3">
                                        @foreach($row[$group] as $reason)
                                            <li class="flex items-start gap-3 rounded-xl bg-white p-4 text-sm leading-relaxed dark:bg-gray-800">
                                                <i class="fas fa-exclamation-circle mt-1 shrink-0 text-amber-600 dark:text-amber-400" aria-hidden="true"></i>
                                                <span>{{ $reason }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                @include('admin.payroll.status')
            @if(!$settled)
                @include('admin.payroll.opening-balances')
                @include('admin.payroll.payment-form')
            @endif
            @if($result && !$settled)
                <div id="payment-preview" class="space-y-6">
                    @include('admin.payroll.net-result', ['calculation' => $result])
                    @if(!$result['assumptions'])
                        @php($completesMonth = $result['period_gross_cents'] !== null && $row['paid_gross_cents'] + $result['amounts']['cash'] === $result['period_gross_cents'])
                        <form method="POST" action="{{ route('raport.payroll.net.approve', $user) }}" class="payroll-card space-y-5" x-data="{ saving: false }" @submit="if (saving) { $event.preventDefault(); } else { saving = true; }">
                            @csrf
                            @foreach($input as $key => $value)<input type="hidden" name="{{ $key }}" value="{{ $value }}">@endforeach
                            <input type="hidden" name="request_key" value="{{ (string) \Illuminate\Support\Str::uuid() }}">
                            <input type="hidden" name="preview_hash" value="{{ hash('sha256', json_encode($result)) }}">
                            <h2>💾 {{ $completesMonth ? 'Zapisz rozliczenie miesiąca' : 'Zapisz część wypłaty' }}</h2>
                            <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-400">Zapisz sprawdzone kwoty i dane źródłowe. {{ $completesMonth ? 'Po zapisaniu miesiąc otrzyma status „Rozliczono”.' : 'Miesiąc pozostanie częściowo rozliczony, dopóki nie zapiszesz całego należnego brutto.' }} Zapis jest niezmienny; korekty wymagają odrębnej obsługi. To nie jest zlecenie przelewu.</p>
                            <label class="payroll-check"><input type="checkbox" name="history_confirmed" value="1" required><span>Potwierdzam kompletność wypłat i limitów. Od salda początkowego nie wystąpiły nieuwzględnione podstawy ZUS z innych tytułów ani wypłaty rozliczone poza WIBEST.</span></label>
                            <x-button-neutral type="submit" x-bind:disabled="saving" x-bind:aria-busy="saving" class="payroll-action w-full disabled:cursor-wait disabled:opacity-60 sm:w-auto"><span x-show="!saving"><i class="fas fa-save mr-2" aria-hidden="true"></i>{{ $completesMonth ? 'Rozlicz miesiąc' : 'Zapisz część wypłaty' }}</span><span x-show="saving" x-cloak>Zapisywanie…</span></x-button-neutral>
                        </form>
                    @else
                        <p class="payroll-help">ℹ️ To symulacja. Uzupełnij wskazane wyżej dane i oblicz ponownie, aby zapisać rozliczenie.</p>
                    @endif
                </div>
            @endif

            <section class="payroll-card">
                <x-payroll.section-heading icon="fa-stopwatch" icon-background="bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300" icon-class="flex h-16 w-16 rounded-2xl text-lg sm:text-2xl" title="Ewidencja czasu pracy i wnioski" :employee="$user->name" :period="$period" description="Grafik, rejestracja czasu i zaakceptowane wnioski stanowią podstawę wyliczenia brutto." />
                @include('admin.payroll.time-summary')
                @include('admin.payroll.rcp-sessions')
            </section>
            <section class="payroll-card">
                <x-payroll.section-heading icon="fa-file-signature" icon-background="bg-gradient-to-br from-pink-200 to-rose-100 text-pink-700 dark:from-pink-500/20 dark:to-rose-500/10 dark:text-pink-300" icon-class="hidden sm:flex h-16 w-16 rounded-2xl text-2xl" title="E-wnioski" :employee="$user->name" :period="$period" description="Zaakceptowane i zrealizowane wnioski przyjęte do rozliczenia wynagrodzenia." />
                <details class="mt-4"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Wnioski przyjęte do rozliczenia ({{ count($row['leaves']) }})</summary><ul class="mt-3 space-y-2 text-sm">@forelse($row['leaves'] as $leave)<li>#{{ $leave['id'] }} · {{ $leave['type'] }} · {{ $leave['start'] }} – {{ $leave['end'] }} · {{ $leave['status'] }}</li>@empty<li>Brak zaakceptowanych / zrealizowanych wniosków.</li>@endforelse</ul></details>
            </section>
            <x-team-info-card class="payroll-card" id="payment-history">
                <div class="flex items-start gap-5">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">💸</div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Wynagrodzenia · {{ $user->name }}</p>
                        <h2 class="mt-1 !text-3xl font-semibold">Zatwierdzone wypłaty · {{ $year }}</h2>
                    </div>
                </div>
                <details id="approved-payments">
                    <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Lista zatwierdzonych wypłat w {{ $year }} roku ({{ $payments->total() }})</summary>
                <div class="mt-4 space-y-5">
                @forelse($payments as $payment)
                    <article class="payroll-payment rounded-xl bg-gray-50 p-4 sm:p-5 dark:bg-gray-900">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div class="flex min-w-0 items-start gap-4">
                                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-2xl dark:bg-gray-800" aria-hidden="true">📄</span>
                                <div class="min-w-0">
                                    <p class="font-semibold">Zatwierdzona wypłata #{{ $payment->id }}</p>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Data wypłaty: {{ \Carbon\Carbon::parse($payment->paid_on)->format('d.m.Y') }} · Okres: {{ \Carbon\Carbon::parse($payment->period)->format('m.Y') }}</p>
                                    <p class="mt-2 font-medium">{{ \App\Services\Payroll\Money::display($payment->payload['amounts']['net']) }} netto</p>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Zapisano {{ $payment->created_at->format('d.m.Y H:i') }}</p>
                                </div>
                            </div>
                            <x-button-link-neutral class="payroll-action ml-auto" href="{{ route('raport.payroll.payslip',['user'=>$user,'payment'=>$payment]) }}"><i class="fas fa-file-pdf mr-2" aria-hidden="true"></i> Pobierz pasek wypłaty (PDF)</x-button-link-neutral>
                        </div>
                        <details id="payment-details-{{ $payment->id }}" class="mt-4">
                        <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Szczegóły wypłaty</summary>
                        @include('admin.payroll.net-result', ['calculation' => $payment->payload, 'savedPayment' => $payment])
                        </details>
                    </article>
                @empty
                    <p class="rounded-xl bg-gray-50 p-5 text-sm text-gray-600 dark:bg-gray-700 dark:text-gray-400">📭 Brak zapisanych wypłat. Po obliczeniu i zatwierdzeniu rozliczenia pojawią się tutaj.</p>
                @endforelse
                {{ $payments->links() }}
                </div>
                </details>
            </x-team-info-card>
            @endif
        </div>
    </x-main>
</x-app-layout>
