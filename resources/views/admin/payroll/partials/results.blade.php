            <div class="grid gap-4 xl:grid-cols-2">
                @forelse($rows as $row)
                @php($rowMonth = \Carbon\Carbon::createFromFormat('!Y-m', $row['month']))
                @php($displayStatus = ($row['payment_status'] ?? 'Nierozliczono') !== 'Nierozliczono' ? $row['payment_status'] : $row['status'])
                <div class="group relative block rounded-2xl border border-gray-200 bg-white p-5 sm:p-6 transition hover:bg-green-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <a href="{{ route('raport.payroll.net', ['user' => $row['user_id'], 'month' => $rowMonth->format('Y-m')]) }}" class="absolute inset-0 z-10 rounded-2xl focus-visible:ring-2 focus-visible:ring-green-300" aria-label="{{ 'Rozliczenie: '.$row['name'].' · '.$rowMonth->format('m.Y') }}"></a>
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div class="min-w-0 [&_a]:relative [&_a]:z-20"><x-team-user-identity :user="$users->getCollection()->firstWhere('id', $row['user_id'])" /></div>
                        <span class="shrink-0 rounded-full px-2 py-0.5 text-xs font-medium {{ in_array($displayStatus,['Gotowe','Rozliczono']) ? 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' : 'bg-amber-100 text-amber-800 dark:bg-amber-300/10 dark:text-amber-300' }}">{{ $displayStatus }}</span>
                    </div>
                    <p class="mt-4 text-xs font-semibold text-gray-500 dark:text-gray-300">{{ $rowMonth->copy()->locale('pl')->translatedFormat('F Y') }}</p>
                    <p class="mt-6 text-sm text-gray-500 dark:text-gray-400">{{ isset($row['target_net']) ? 'Netto z umowy (przed naliczeniem brutto)' : 'Wynagrodzenie brutto' }}</p><p class="text-3xl font-semibold tabular-nums">{{ isset($row['target_net']) ? \App\Services\Payroll\Money::display($row['target_net']) : ($row['gross'] === null ? 'Do ustalenia' : number_format($row['gross'], 2, ',', ' ').' zł') }}</p>
                    @include('admin.payroll.time-summary')
                    <dl class="mt-4 grid grid-cols-2 gap-4 text-sm"><div><dt class="text-gray-500 dark:text-gray-400">Podstawa / stawka</dt><dd>{{ $row['contract']['monthly_gross'] ?? $row['contract']['hourly_rate'] ?? '—' }} zł{{ ($row['contract']['settlement'] ?? '') === 'hourly' ? '/h' : '' }}</dd></div><div><dt class="text-gray-500 dark:text-gray-400">Koszt pracodawcy</dt><dd>{{ $row['cost'] === null ? 'Wymaga danych' : number_format($row['cost'], 2, ',', ' ').' zł' }}</dd></div></dl>
                </div>
                @empty
                <div class="rounded-2xl bg-white p-8 text-center dark:bg-gray-800 xl:col-span-2">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-3xl dark:bg-gray-700" aria-hidden="true">{{ $hasContracts ? '🔎' : '📄' }}</div>
                    <h2 class="mt-5 text-2xl font-semibold">{{ $hasContracts ? 'Brak danych dla wybranych filtrów' : 'Dodaj pierwszą umowę' }}</h2>
                    @if($hasContracts)
                        <p class="mx-auto mt-3 max-w-xl text-gray-500 dark:text-gray-400">Dla wybranego okresu i wyszukiwania nie znaleziono wynagrodzeń. Zmień filtry lub sprawdź okres obowiązywania i kompletność umów.</p>
                    @else
                        <p class="mx-auto mt-3 max-w-xl text-gray-500 dark:text-gray-400">Pracownicy Twojej firmy nie mają jeszcze umów. Przejdź do zespołu, wybierz użytkownika i dodaj umowę, aby rozpocząć rozliczanie wynagrodzeń.</p>
                        <x-button-link-green class="payroll-action mt-6" href="{{ route('team.user.index') }}">Przejdź do zespołu</x-button-link-green>
                    @endif
                </div>
                @endforelse
            </div>
            <div class="mt-6">{{ $users->links() }}</div>
