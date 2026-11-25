<x-app-layout class="flex">
    <x-sidebar-left><li class="p-2"><a href="{{ route('raport.payroll.index', ['month' => $month->format('Y-m')]) }}" class="text-gray-600 dark:text-gray-300">Wszystkie wynagrodzenia</a></li></x-sidebar-left>
    <x-main>
        <x-raport.nav />
        @include('admin.elements.alerts')
        <div class="payroll-workspace">
            @include('admin.payroll.status')
            <header class="flex flex-wrap justify-between gap-4"><div><p class="text-sm text-gray-500 dark:text-gray-400">Rozliczenie · {{ $month->format('m.Y') }}</p><h1 class="mt-2 text-3xl font-semibold">{{ $row['name'] }}</h1><p class="mt-2">{{ $row['status'] }}{{ $row['saved_at'] ? ' · Zapisano '.$row['saved_at'] : ' · Podgląd bieżących danych' }}</p></div><x-button-link-neutral href="{{ route('team.user.show', $user) }}" class="payroll-action">Profil i zatrudnienie</x-button-link-neutral></header>
            @if($row['missing'] || $row['attention'])<section class="rounded-2xl bg-amber-50 p-6 dark:bg-gray-800"><h2 class="font-semibold">Co wymaga uzupełnienia lub sprawdzenia</h2><ul class="mt-3 space-y-2 list-disc pl-5">@foreach(array_merge($row['missing'], $row['attention']) as $reason)<li>{{ $reason }}</li>@endforeach</ul></section>@endif
            <x-team-info-card class="payroll-card">
                <h2>🧾 Skąd wynika kwota</h2><p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Pozycje cząstkowe nie są kwotą do wypłaty, dopóki dane wymagają sprawdzenia. Brak automatycznych korekt i premii.</p>
                <dl class="mt-5 space-y-5">@foreach($row['lines'] as $line)<div class="flex flex-wrap justify-between gap-3"><dt><span class="font-medium">{{ $line['label'] }}</span><span class="block mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $line['formula'] }}</span></dt><dd class="font-semibold tabular-nums">{{ number_format($line['amount'], 2, ',', ' ') }} zł</dd></div>@endforeach</dl>
                <div class="mt-6 rounded-xl bg-green-50 p-5 dark:bg-gray-700"><p class="text-sm">Łącznie brutto</p><p class="mt-1 text-3xl font-semibold">{{ $row['gross'] === null ? 'Do ustalenia' : number_format($row['gross'], 2, ',', ' ').' zł' }}</p></div>
                <h3 class="mt-6 font-semibold">Szacowany koszt pracodawcy: {{ $row['cost'] === null ? 'wymaga danych' : number_format($row['cost'], 2, ',', ' ').' zł' }}</h3><p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $row['cost_reason'] }}</p>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Parametry brutto: {{ $row['parameters']['id'] ?? 'brak' }}. Netto ustalane jest osobno dla daty wypłaty.</p>
                <div class="mt-4"><x-button-link-neutral class="payroll-action" href="{{ route('raport.payroll.net', ['user' => $user, 'month' => $month->format('Y-m')]) }}">{{ $row['payment_status'] === 'Rozliczono' ? '✅ Zobacz zapisane rozliczenie' : '🧮 Przejdź do rozliczenia wypłaty' }}</x-button-link-neutral></div>
                <dl class="mt-4 space-y-3">@foreach($row['cost_lines'] ?? [] as $line)<div><dt>{{ $line['label'] }} · {{ $line['formula'] }}</dt><dd class="font-semibold">{{ number_format($line['amount'], 2, ',', ' ') }} zł</dd></div>@endforeach</dl>
                @include('admin.payroll.cost-inputs')
                <p class="mt-4 text-sm"><a class="underline text-green-700 dark:text-green-300" href="{{ route('team.user.show',$user) }}#employment-title">Przejdź do umowy i uzupełnij dane pracownika</a></p>
                @if(!$row['saved_at'] && $row['status'] === 'Gotowe')<form method="POST" action="{{ route('raport.payroll.snapshot', $user) }}" class="mt-5 space-y-3">@csrf<input type="hidden" name="month" value="{{ $month->format('Y-m') }}"><p class="payroll-help">ℹ️ Zapis zestawienia zachowuje obecne brutto, czas pracy i źródła. Nie zapisuje wypłaty ani statusu „Rozliczono”. Zestawienie zapisze się również automatycznie przy zatwierdzeniu wypłaty.</p><x-button-neutral type="submit" class="payroll-action"><i class="fas fa-save mr-2" aria-hidden="true"></i> Zapisz zestawienie brutto</x-button-neutral></form>@endif
            </x-team-info-card>
            <section class="payroll-card"><h2>⏱️ Czas pracy</h2>@include('admin.payroll.time-summary')
                <details data-animated-config class="mt-6"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Dzień po dniu</summary><div class="overflow-auto mt-4"><table class="w-full text-sm text-left"><thead><tr>@foreach(['Data','Grafik','RCP','Ponad grafik','Nieobecność'] as $label)<th class="p-3">{{ $label }}</th>@endforeach</tr></thead><tbody>@foreach($row['days'] as $day)<tr class="odd:bg-gray-50 dark:odd:bg-gray-900"><td class="p-3 whitespace-nowrap">{{ $day['date'] }}</td>@foreach(['planned','worked','extra','absence'] as $key)<td class="p-3">{{ \App\Services\Objects\ObjectWorkReport::duration($day[$key]) }}</td>@endforeach</tr>@endforeach</tbody></table></div></details>
            </section>
            <section class="payroll-card"><h2>🗂️ Źródła rozliczenia</h2>
                @include('admin.payroll.rcp-sessions')
                <details data-animated-config class="mt-4"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Zaakceptowane / zrealizowane wnioski ({{ count($row['leaves']) }})</summary><ul class="mt-4 space-y-3 text-sm">@forelse($row['leaves'] as $leave)<li>#{{ $leave['id'] }} · {{ $leave['type'] }} · {{ $leave['start'] }} – {{ $leave['end'] }} · {{ $leave['status'] }}</li>@empty<li>Brak wniosków.</li>@endforelse</ul></details>
                <details data-animated-config class="mt-4"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Podstawy prawne</summary><ul class="mt-4 space-y-3 text-sm">@foreach($row['parameters']['sources'] ?? [] as $source)<li><a class="underline break-all" href="{{ $source }}" target="_blank" rel="noopener noreferrer">{{ $source }}</a></li>@endforeach</ul></details>
            </section>
        </div>
    </x-main>
    @include('admin.team.configuration-animation')
</x-app-layout>
