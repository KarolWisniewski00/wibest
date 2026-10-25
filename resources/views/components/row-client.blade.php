@props(['client'])

<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    {{-- FIRMA --}}
    <td class="px-3 py-3 text-start max-w-[250px] align-middle">

        <x-paragraf-display class="text-xs break-words whitespace-normal">
            <x-status-gray>

                    <i class="fa-solid fa-building mr-1"></i>
                    {{ $client->name }}

            </x-status-gray>
        </x-paragraf-display>

    </td>
<td class="px-3 py-3 align-middle">

    <div class="flex flex-row items-center justify-center gap-2">
        {{-- STATUS RCP --}}
        @php
            $hasRecentWork = $client->work_sessions()
                ->whereBetween('created_at', [
                    now()->startOfMonth()->subMonth(),
                    now()->endOfMonth(),
                ])
                ->exists();
        @endphp

        @if($hasRecentWork)

            <span
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-semibold whitespace-nowrap"
                title="Firma ma przynajmniej jeden odczyt pracy w aktualnym lub ubiegłym miesiącu"
            >
                <i class="fa-solid fa-clock"></i>
                RCP aktywne
            </span>

        @endif


{{-- KLASYFIKACJA AI --}}
    @php
        $company = $client;

        /*
        |--------------------------------------------------------------------------
        | AI - klasyfikacja
        |--------------------------------------------------------------------------
        */

        $classificationData = match ($company->ai_classification) {
            'ideal' => [
                'label' => 'Idealny klient',
                'icon' => 'fa-solid fa-star',
                'color' => 'green',
            ],
            'potential' => [
                'label' => 'Potencjalny klient',
                'icon' => 'fa-solid fa-chart-simple',
                'color' => 'yellow',
            ],
            'weak' => [
                'label' => 'Słabe dopasowanie',
                'icon' => 'fa-solid fa-arrow-down',
                'color' => 'orange',
            ],
            'disqualified' => [
                'label' => 'Nie zakwalifikowany',
                'icon' => 'fa-solid fa-ban',
                'color' => 'red',
            ],
            'unknown' => [
                'label' => 'Brak danych',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
            default => [
                'label' => 'Nie sklasyfikowano',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
        };

    @endphp
@if($client->ai_classification)

    @if($classificationData['color'] === 'blue')

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-semibold whitespace-nowrap"
            title="{{ $client->ai_classification_reason }}"
        >
            <i class="{{ $classificationData['icon'] }}"></i>
            {{ $client->ai_classification }}
        </span>

    @elseif($classificationData['color'] === 'green')

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-semibold whitespace-nowrap"
            title="{{ $client->ai_classification_reason }}"
        >
            <i class="{{ $classificationData['icon'] }}"></i>
            {{ $client->ai_classification }}
        </span>

    @elseif($classificationData['color'] === 'red')

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-xs font-semibold whitespace-nowrap"
            title="{{ $client->ai_classification_reason }}"
        >
            <i class="{{ $classificationData['icon'] }}"></i>
            {{ $client->ai_classification }}
        </span>

    @elseif($classificationData['color'] === 'yellow')

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 text-xs font-semibold whitespace-nowrap"
            title="{{ $client->ai_classification_reason }}"
        >
            <i class="{{ $classificationData['icon'] }}"></i>
            {{ $client->ai_classification }}
        </span>

    @else

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-xs font-semibold whitespace-nowrap"
            title="{{ $client->ai_classification_reason }}"
        >
            <i class="{{ $classificationData['icon'] }}"></i>
            {{ $client->ai_classification }}
        </span>

    @endif

@endif


        {{-- POWÓD KLASYFIKACJI --}}
        @if($client->ai_classification_reason)

            <div class="max-w-[220px] text-start text-xs text-gray-500 dark:text-gray-400 leading-4">
                {{ $client->ai_classification_reason }}
            </div>

        @endif

    </div>

</td>
    <td class="px-2 py-2">
        <x-paragraf-display class="text-xs">
            <x-status-gray>
                <span>📍</span>{{ $client->adress }}
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <td class="px-2 py-2">
        <x-paragraf-display class="text-xs">
            <x-status-gray>
                <span>🧾</span>{{ $client->vat_number }}
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <td class="px-2 py-2">
        <x-paragraf-display class="text-xs">
            <x-status-gray>
                @if($client->getUsersCount() != 0)
                <span>👤</span> {{ $client->getUsersCount() }}
                @else
                <span>👤</span> 0
                @endif
            </x-status-gray>
        </x-paragraf-display>
    </td>

    <x-show-cell href="{{route('setting.client.show', $client)}}" />
</tr>