@can('manage-payroll')
@if((int) $user->company_id === (int) auth()->user()->company_id)
@php
    $tax = \App\Models\EmployeeTaxSetting::where('company_id',$user->company_id)->where('user_id',$user->id)->orderByDesc('effective_from')->orderByDesc('id')->first();
    $fieldClass = 'mt-2 block min-w-0 w-full max-w-full rounded-xl border-gray-200 bg-gray-50 text-gray-900 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-green-300 focus:border-green-300';
@endphp
<section class="my-6 rounded-2xl bg-white p-6 sm:p-8 dark:bg-gray-800 text-gray-900 dark:text-gray-100" aria-labelledby="employment-title">
    <div class="flex flex-wrap items-start justify-between gap-5">
        <div class="order-last ml-auto flex w-full min-w-0 flex-col justify-end gap-3 md:w-auto md:flex-row md:flex-wrap">
            @if($employment)<x-button-link-neutral class="w-full justify-center !whitespace-normal md:w-auto" href="{{ route('raport.payroll.net',['user'=>$user,'month'=>now()->format('Y-m')]) }}">Rozlicz miesiąc</x-button-link-neutral>@endif
            <x-button-green class="w-full justify-center !whitespace-normal md:w-auto" type="button" onclick="const panel = document.getElementById('add-employment'); panel.open = !panel.open; this.setAttribute('aria-expanded', panel.open)" aria-controls="add-employment" aria-expanded="{{ $errors->any() ? 'true' : 'false' }}">＋ Dodaj umowę</x-button-green>
        </div>
        <div class="flex items-start gap-5"><div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">💼</div>
            <div><p class="text-sm text-gray-500 dark:text-gray-400">Warunki zatrudnienia</p><h2 id="employment-title" class="mt-1 text-3xl font-semibold">Umowa</h2>
            @if($employment)
                <p class="mt-3">{{ \App\Models\EmployeeContract::TYPES[$employment->type] ?? $employment->type }} · {{ ['trial'=>'okres próbny','fixed'=>'czas określony','indefinite'=>'czas nieokreślony'][$employment->details['term'] ?? ''] ?? 'uzupełnij rodzaj' }}</p>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $employment->starts_on->format('d.m.Y') }} – {{ $employment->ends_on?->format('d.m.Y') ?? 'bezterminowo' }}</p>
                <p class="mt-2 font-medium">{{ $employment->details['amount'] ?? $employment->monthly_gross ?? $employment->hourly_rate }} zł {{ str_ends_with($employment->details['pay_basis'] ?? '', '_net') ? 'netto' : 'brutto' }} {{ $employment->settlement === 'hourly' ? '/ godzinę' : '/ miesiąc' }}</p>
            @else<p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Brak umowy. Dodaj ją, aby rozpocząć rozliczanie wynagrodzenia.</p>@endif
            </div>
        </div>

    </div>
    <details id="add-employment" class="mt-6" @if($errors->any()) open @endif>
        <summary class="hidden">Dodaj umowę</summary>
        <div class="mt-5 grid text-left gap-3 sm:grid-cols-2">
            <details class="sm:col-span-2 rounded-xl bg-gray-50 p-4 dark:bg-gray-900" @if($errors->any()) open @endif>
                <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Umowa o pracę <i class="fa-solid fa-chevron-down ml-2 text-xs" aria-hidden="true"></i></summary>
                @include('admin.team.simple-employment-form',['editing'=>false])
            </details>
            @foreach(['Umowa zlecenia'=>'Wkrótce dostępna','Umowa o dzieło'=>'Wkrótce dostępna','B2B'=>'Wkrótce dostępne'] as $label=>$soon)
                <button type="button" disabled class="flex items-center justify-between gap-3 rounded-xl bg-gray-50 p-4 text-left text-gray-400 dark:bg-gray-900 dark:text-gray-500"><span>{{ $label }}</span><span class="text-xs">{{ $soon }}</span></button>
            @endforeach
        </div>
    </details>
    @if($employment)
    <section class="mt-8 border-t border-gray-100 pt-6 dark:border-gray-700" aria-labelledby="contract-history-title">
        <h3 id="contract-history-title" class="text-xl font-semibold">Historia umów</h3>
        <div class="mt-4 space-y-4">
        @foreach(\App\Models\EmployeeContract::where('company_id',$user->company_id)->where('user_id',$user->id)->orderByDesc('effective_from')->orderByDesc('id')->get() as $version)
            <article class="rounded-xl bg-gray-50 p-4 sm:p-5 dark:bg-gray-900">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div class="flex min-w-0 items-start gap-4">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-2xl dark:bg-gray-800" aria-hidden="true">📄</span>
                        <div class="min-w-0"><p class="font-semibold">{{ \App\Models\EmployeeContract::TYPES[$version->type] ?? $version->type }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Wersja #{{ $version->id }} · obowiązuje od {{ $version->effective_from->format('d.m.Y') }}</p>
                            <p class="mt-2 font-medium">{{ $version->details['amount'] ?? $version->monthly_gross ?? $version->hourly_rate }} zł {{ str_ends_with($version->details['pay_basis'] ?? '', '_net') ? 'netto' : 'brutto' }}</p>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Zapisano {{ $version->created_at->format('d.m.Y H:i') }}</p>
                        </div>
                    </div>
                    @if($version->id === $employment->id && $employment->type === 'employment')
                        <x-button-blue type="button" class="ml-auto w-full min-w-0 justify-center !whitespace-normal md:w-auto" onclick="const panel = document.getElementById('edit-employment'); panel.open = !panel.open; this.setAttribute('aria-expanded', panel.open)" aria-controls="edit-employment" aria-expanded="{{ old('edit_contract_id') ? 'true' : 'false' }}">Edytuj umowę</x-button-blue>
                    @endif
                </div>
                @if($version->id === $employment->id && $employment->type === 'employment')
                    <details id="edit-employment" @if(old('edit_contract_id')) open @endif>
                        <summary class="hidden">Edytuj umowę</summary>
                        <p class="mt-5 text-sm text-gray-500 dark:text-gray-400">Zapis tworzy kolejną wersję w historii. Zatwierdzone wypłaty i zapisane zestawienia pozostają bez zmian. Przy podwyżce ustaw datę rozpoczęcia nowych warunków.</p>
                        @include('admin.team.simple-employment-form',['editing'=>true])
                    </details>
                @endif
            </article>
        @endforeach
        </div>
    </section>
    @endif
</section>
@endif
@endcan
