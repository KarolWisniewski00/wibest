@props(['crm'])

@php
    $datetimeStart = $crm->datetime_start
        ? \Carbon\Carbon::parse($crm->datetime_start)
        : null;

    $isCompleted = !is_null($crm->datetime_complete);
    $isOverdue = !$isCompleted && $datetimeStart && $datetimeStart->isPast();
@endphp
<tr class="snap-center text-center
        {{ $crm->id % 2 === 0
    ? 'bg-white dark:bg-gray-800'
    : 'bg-gray-50 dark:bg-gray-900/40' }}">

    {{-- FIRMA --}}
    <td class="px-3 py-3 text-start max-w-[250px] align-middle">

        <x-paragraf-display class="text-xs break-words whitespace-normal">
            <x-status-gray>

                @if($crm->company)
                    <i class="fa-solid fa-building mr-1"></i>
                    {{ $crm->company->name }}
                @endif

            </x-status-gray>
        </x-paragraf-display>

    </td>


    {{-- KONTAKT --}}
    <td class="px-3 py-3 align-middle">

        <div class="flex items-center gap-3 text-start">

            {{-- Zdjęcie --}}
            @if($crm->user)

                <div
                    class="w-11 h-11 min-w-[44px] rounded-full overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center">

                    @if($crm->user->profile_photo_url)
                        <img src="{{ $crm->user->profile_photo_url }}" alt="{{ $crm->user->name }}"
                            class="w-full h-full object-cover object-center">
                    @else
                        <i class="fa-solid fa-user text-gray-400"></i>
                    @endif

                </div>

            @endif


            {{-- Dane użytkownika --}}
            <div class="min-w-0">

                @if($crm->user)

                    <div class="font-semibold text-gray-800 dark:text-gray-100 whitespace-nowrap">
                        {{ $crm->user->name }}
                    </div>


                    @if($crm->user->position)
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 whitespace-nowrap">
                            <i class="fa-solid fa-briefcase mr-1"></i>
                            {{ $crm->user->position }}
                        </div>
                    @endif


                    @if($crm->user->phone)
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 whitespace-nowrap">
                            <i class="fa-solid fa-phone mr-1"></i>
                            {{ $crm->user->phone }}
                        </div>
                    @endif


                    @if($crm->user->contact_email && str_contains($crm->user->contact_email, '@'))
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 max-w-[220px] truncate">
                            <i class="fa-solid fa-envelope mr-1"></i>
                            {{ $crm->user->contact_email }}
                        </div>
                    @endif

                @else

                    <span class="text-gray-400 text-sm">
                        Brak kontaktu
                    </span>

                @endif

            </div>

        </div>

    </td>


    {{-- TYP / STATUS / PILNE --}}
    <td class="px-3 py-3 align-middle">

        <div class="flex flex-col items-center gap-2">


            {{-- TYP --}}
            @php
                $typeData = match ($crm->type) {
                    'spotkanie' => ['icon' => 'fa-solid fa-users', 'label' => 'Spotkanie'],
                    'telefon' => ['icon' => 'fa-solid fa-phone', 'label' => 'Telefon'],
                    'mail' => ['icon' => 'fa-solid fa-envelope', 'label' => 'Mail'],
                    'follow_up' => ['icon' => 'fa-solid fa-rotate', 'label' => 'Follow-up'],
                    'oferta' => ['icon' => 'fa-solid fa-file-invoice', 'label' => 'Oferta'],
                    'inne' => ['icon' => 'fa-solid fa-thumbtack', 'label' => 'Inne'],
                    default => ['icon' => 'fa-solid fa-circle-question', 'label' => $crm->type],
                };
            @endphp


            <span
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 text-xs font-semibold whitespace-nowrap">

                <i class="{{ $typeData['icon'] }}"></i>

                {{ $typeData['label'] }}

            </span>


            {{-- STATUS --}}
            @if($isCompleted)

                {{-- ZROBIONE --}}
                <span
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-semibold whitespace-nowrap">
                    <i class="fa-solid fa-check"></i>
                    Zrobione
                </span>

            @elseif($isOverdue)

                {{-- PO TERMINIE --}}
                <span
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-xs font-semibold whitespace-nowrap">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Po terminie
                </span>

            @else

                {{-- PRZED TERMINEM --}}
                <span
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 text-xs font-semibold whitespace-nowrap">
                    <i class="fa-regular fa-clock"></i>
                    Do zrobienia
                </span>

            @endif


            {{-- PILNE --}}
            @if($crm->important)

                <span class="text-red-500 dark:text-red-400 text-lg" title="Pilne">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </span>

            @endif

        </div>

    </td>


    {{-- DATY --}}
    <td class="px-3 py-3 align-middle">

        <div class="flex flex-col gap-2 text-start text-xs">


            {{-- Termin akcji --}}
            <div>

                <div class="text-gray-400 mb-0.5">
                    <i class="fa-regular fa-calendar mr-1"></i>
                    Termin
                </div>

                <div class="font-semibold text-gray-700 dark:text-gray-200 whitespace-nowrap">

                    {{ $crm->datetime_start
    ? \Carbon\Carbon::parse($crm->datetime_start)->format('d.m.Y H:i')
    : '—'
                    }}

                </div>

            </div>


            {{-- Zakończenie --}}
            @if($crm->datetime_complete)

                <div>

                    <div class="text-gray-400 mb-0.5">
                        <i class="fa-solid fa-check mr-1"></i>
                        Zakończono
                    </div>

                    <div class="font-semibold text-green-600 dark:text-green-400 whitespace-nowrap">

                        {{ \Carbon\Carbon::parse($crm->datetime_complete)->format('d.m.Y H:i') }}

                    </div>

                </div>

            @endif

        </div>

    </td>


    {{-- REZULTAT --}}
    <td class="px-3 py-3 align-middle">
        @php
            $isCompleted = $crm->completed;
            $hasPlan = filled($crm->plan);
            $hasResult = filled($crm->result);
        @endphp

        <div id="crm-content-{{ $crm->id }}" class="space-y-2">

            {{-- PLAN --}}
            @if ($hasPlan)
                <div class="flex items-start gap-2">
                    <div class="h-full flex my-auto">
                        <span class="shrink-0 text-xs font-semibold text-gray-400 dark:text-gray-500">
                            PLAN
                        </span>
                    </div>
                    <div class="text-start crm-plan-content text-sm leading-6 text-gray-700 dark:text-gray-200">
                        {!! $crm->plan !!}
                    </div>
                </div>
            @endif

            {{-- REZULTAT --}}
            @if ($hasResult)
                <div class="flex items-start gap-2 pt-1
                                        {{ $hasPlan ? 'border-t border-gray-100 dark:border-gray-700' : '' }}">
                    <div class="h-full flex my-auto">
                        <span class="shrink-0 text-xs font-semibold text-green-600 dark:text-green-400">
                            WYNIK
                        </span>
                    </div>


                    <div class="text-start crm-result-content text-sm leading-6 text-gray-600 dark:text-gray-300">
                        {!! $crm->result !!}
                    </div>
                </div>
            @endif

            {{-- BRAK DANYCH --}}
            @if (!$hasPlan && !$hasResult)
                <span class="text-sm text-gray-400 dark:text-gray-500">
                    —
                </span>
            @endif

        </div>
    </td>



    {{-- NASTĘPNY KROK --}}
    <td class="px-2 py-3 align-middle">

        @if($crm->datetime_complete)

            <x-button-link-orange href="{{ route('setting.crm.ai-analysis', $crm) }}" class="min-h-[38px]"
                title="Następny krok" aria-label="Następny krok">
                <i class="fa-solid fa-arrow-right"></i>
            </x-button-link-orange>

        @endif

    </td>


    {{-- EDYCJA --}}
    <td class="px-2 py-3 align-middle">
        <x-button-link-blue href="{{ route('setting.crm.edit', $crm) }}" class="min-h-[38px]"
            title="Edycja" aria-label="Edycja">
            <i class="fa-solid fa-pen-to-square"></i>
        </x-button-link-blue>
    </td>
</tr>
