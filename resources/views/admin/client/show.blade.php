<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('client') }}" class="text-lg">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Klientów
                    </x-button-link-back>
                    <!--POWRÓT-->

                    <!--BODY-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <!--SPRZEDAJĄCY-->
                        <x-container-gray>
                            <!--NAZWA-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <x-label-link-company href="{{route('setting')}}">
                                        {{ $client->name }}
                                    </x-label-link-company>
                                </p>
                            </x-text-cell>
                            <!--NAZWA-->

                            <!--ADRES-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Adres
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $client->adress }}
                                </p>
                            </x-text-cell>
                            <!--ADRES-->

                            <!--NIP-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    NIP
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $client->vat_number }}
                                </p>
                            </x-text-cell>
                            <!--NIP-->
                        </x-container-gray>
                        <!--SPRZEDAJĄCY-->

                        <!--DANE KONTAKTOWE-->
                        <x-container-gray>
                            <!--EMAIL-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Email
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <a href="maito:{{ $client->email }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->email }}</a>
                                    @if($client->email2)
                                    <br>
                                    <a href="maito:{{ $client->email2 }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->email2 }}</a>
                                    @endif
                                </p>
                            </x-text-cell>
                            <!--EMAIL-->

                            <!--PHONE-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Telefon
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <a href="tel:{{ $client->phone }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->phone }}</a>
                                    @if($client->phone2)
                                    <br>
                                    <a href="tel:{{ $client->phone2 }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">{{ $client->phone2 }}</a>
                                    @endif
                                </p>
                            </x-text-cell>
                            <!--PHONE-->

                            <!--NOTES-->
                            <x-text-cell>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Uwagi
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $client->notes ?? '' }}
                                </p>
                            </x-text-cell>
                            <!--NOTES-->
                        </x-container-gray>
                        <!--KANE KONTAKTOWE-->
                    </div>
                    <!--BODY-->

                    <!--PRZYCISKI-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- EDYTUJ -->
                        <x-button-link-blue href="{{route('client.edit', $client)}}">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </x-button-link-blue>
                        <!--EDYTUJ-->

                        <!--USUŃ-->
                        <form action="{{ route('client.delete', $client) }}" method="POST"
                            onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                            @csrf
                            @method('DELETE')
                            <x-button-red type="submit">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </x-button-red>
                        </form>
                        <!--USUŃ-->
                    </div>
                    <div class="mt-8 md:flex justify-end items-center space-x-4">
                        <!--NOWA-->
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Projekty
                            </h1>
                            <a href="{{ route('project.create.client', $client) }}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-plus mr-2"></i>NOWY PROJEKT
                            </a>
                        </div>
                        <!--NOWA-->
                    </div>
                    <!--PRZYCISKI-->

                    <!--BODY-->
                    <div class="mt-8 grid grid-cols-3 md:gap-4">
                        @if ($projects->isEmpty())
                        <div class="col-span-3 flex justify-center items-center">
                            <x-empty-place class="w-full h-full" />
                        </div>
                        @else
                        @foreach($projects as $project)
                        <x-container-gray class="px-0">
                            <!--NAZWA-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <x-label-link-project href="{{route('project.show', $project->id)}}">
                                        {{ $project->name }}
                                    </x-label-link-project>
                                </p>
                            </x-text-cell>
                            <!--NAZWA-->

                            <x-project-status-link :project="$project" />
                            
                            <!--Domena-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Domena
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $project->production_domain }}
                                </p>
                            </x-text-cell>
                            <!--Domena-->

                            <!--Technologia-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Technologia
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    {{ $project->technology }}
                                </p>
                            </x-text-cell>
                            <!--Technologia-->

                            <!--Podgląd-->
                            <x-text-cell class="mx-4">
                                <x-button-link-neutral href="{{route('project.show', $project)}}">
                                    <i class="fa-solid fa-eye mr-2"></i>Podgląd
                                </x-button-link-neutral>
                            </x-text-cell>
                            <!--Podgląd-->
                        </x-container-gray>
                        @endforeach
                        @endif
                    </div>
                    <!--BODY-->

                    <div class="mt-8 md:flex justify-end items-center space-x-4">
                        <!--NOWA-->
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Oferty
                            </h1>
                        </div>
                        <!--NOWA-->
                    </div>

                    <!--BODY-->
                    <div class="mt-8 grid grid-cols-1 md:gap-4">
                    <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Numer oferty
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Projekt
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Klient
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kwota netto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kwota brutto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Podgląd
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($offers->isEmpty())
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="7" class="px-6 py-4">
                                    <x-empty-place />
                                </td>
                            </tr>
                            @else
                            @php
                            $currentMonth = null; // Zmienna do śledzenia aktualnego miesiąca
                            $months = [
                            1 => 'Styczeń',
                            2 => 'Luty',
                            3 => 'Marzec',
                            4 => 'Kwiecień',
                            5 => 'Maj',
                            6 => 'Czerwiec',
                            7 => 'Lipiec',
                            8 => 'Sierpień',
                            9 => 'Wrzesień',
                            10 => 'Październik',
                            11 => 'Listopad',
                            12 => 'Grudzień'
                            ];
                            @endphp

                            @foreach ($offers as $offer)
                            @php
                            // Pobieramy miesiąc z daty oferty (załóżmy, że jest polem issue_date)
                            $offerMonth = \Carbon\Carbon::parse($offer->issue_date)->month;

                            // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                            if ($offerMonth !== $currentMonth) {
                            $currentMonth = $offerMonth;
                            $monthName = $months[$offerMonth];
                            @endphp
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <td colspan="7" class="px-6 py-4">
                                    <div class="flex items-center justify-start">
                                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">{{ $monthName }}</h2>
                                        <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                </td>
                            </tr>
                            @php
                            }
                            @endphp

                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <td class="px-3 py-2 min-w-48">
                                    <x-offer-label :offer="$offer" />
                                </td>
                                @if($offer->project != null)
                                <td class="px-3 py-2">
                                    <p class="text-gray-900 dark:text-gray-50 font-semibold text-nowrap">
                                        <x-label-link-project href="{{route('project.show', $offer->project)}}">
                                            {{ $offer->project->shortcut }}
                                        </x-label-link-project>
                                    </p>
                                </td>
                                @else
                                <td class="px-3 py-2">
                                </td>
                                @endif
                                <td class="px-3 py-2">
                                    @if($offer->client)
                                    <p class="text-gray-900 dark:text-gray-50 font-semibold">
                                        <x-label-link-company href="{{ route('client.show', $offer->client->id) }}">
                                            {{$offer->client->name}}
                                        </x-label-link-company>
                                    </p>
                                    @else
                                    {{$offer->buyer_name}}
                                    @endif
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    {{ $offer->subtotal }} zł
                                </td>
                                <td class="px-3 py-2 text-sm min-w-32 text-gray-700 dark:text-gray-50">
                                    {{ $offer->total }} zł
                                </td>
                                <td class="px-3 py-2 text-sm min-w-32">
                                    <x-offer-status :offer="$offer" />
                                </td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('offer.show', $offer) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!--BODY-->

                    <!--INFO-->
                    <div class="mt-8 flex flex-col w-full justify-end items-center">
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $client->user->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $client->company->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia klienta
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $client->created_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji klienta
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $client->updated_at->format('d-m-Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <!--INFO-->

                    <!--PRZYCISKI-->
                    <div class="mt-8 md:flex justify-end items-center space-x-4">
                        <!--NOWA-->
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Faktury
                            </h1>
                            <a href="{{ route('invoice.create.client', $client) }}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-plus mr-2"></i>NOWA FAKTURA
                            </a>
                        </div>
                        <!--NOWA-->
                    </div>
                    <!--PRZYCISKI-->

                    <!--COPY INVOICES-->
                    <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Numer faktury
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Klient
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kwota netto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kwota brutto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th colspan="2" scope="col" class="px-6 py-3">
                                    Opłacone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Podgląd
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($invoices->isEmpty())
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>
                            @else
                            @php
                            $currentMonth = null; // Zmienna do śledzenia aktualnego miesiąca
                            $months = [
                            1 => 'Styczeń',
                            2 => 'Luty',
                            3 => 'Marzec',
                            4 => 'Kwiecień',
                            5 => 'Maj',
                            6 => 'Czerwiec',
                            7 => 'Lipiec',
                            8 => 'Sierpień',
                            9 => 'Wrzesień',
                            10 => 'Październik',
                            11 => 'Listopad',
                            12 => 'Grudzień'
                            ];
                            @endphp

                            @foreach ($invoices as $invoice)
                            @php
                            // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                            $invoiceMonth = \Carbon\Carbon::parse($invoice->issue_date)->month;

                            // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                            if ($invoiceMonth !== $currentMonth) {
                            $currentMonth = $invoiceMonth;
                            $monthName = $months[$invoiceMonth];
                            @endphp
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <td colspan="8" class="px-3 py-2">
                                    <div class="flex items-center justify-start">
                                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">{{ $monthName }}</h2>
                                        <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                </td>
                            </tr>
                            @php
                            }
                            @endphp

                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <td class="px-3 py-2 min-w-48">
                                    <x-invoice-label :invoice="$invoice" />
                                </td>
                                <td class="px-3 py-2">
                                    @if($invoice->client)
                                    <p class="text-gray-900 dark:text-gray-50 font-semibold">
                                        <x-label-link-company href="{{ route('client.show', $invoice->client->id) }}">
                                            {{$invoice->client->name}}
                                        </x-label-link-company>
                                    </p>
                                    @else
                                    {{$invoice->buyer_name}}
                                    @endif
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    {{ $invoice->subtotal }} zł
                                </td>
                                <td class="px-3 py-2 text-sm min-w-32 text-gray-700 dark:text-gray-50">
                                    {{ $invoice->total }} zł
                                </td>
                                <td class="px-3 py-2 text-sm min-w-32">
                                    <x-invoice-status :invoice="$invoice" />
                                </td>
                                <td colspan="2" class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-50">
                                    <x-invoice-progress :invoice="$invoice" />
                                </td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('invoice.show', $invoice) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!--COPY INVOICES-->
                    <!--SUMMARY-->
                    <ul class="grid w-full gap-6 md:grid-cols-3 my-4">
                        <!-- Dziś -->
                        <li class="">
                            <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                <div class="block w-full">
                                    <div class="flex justify-between w-full">
                                        <span class="text-2xl font-semibold text-indigo-500">{{ $dailyTotalsCount }}</span>
                                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Suma brutto</span>
                                    </div>
                                    <div class="text-sm text-gray-900 dark:text-gray-400"></div>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                <div class="block w-full">
                                    <div class="flex justify-between w-full">
                                        <span class="text-2xl font-semibold text-indigo-500">{{ $dailySubTotalsCount }}</span>
                                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Suma netto</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                <div class="block w-full">
                                    <div class="flex justify-between w-full">
                                        <span class="text-2xl font-semibold text-indigo-500">{{ $dailyCountsCount }}</span>
                                        <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Suma faktur</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!--SUMMARY-->

                    <!--WYKRES-->
                    <!-- Dodaj w sekcji head, jeśli jeszcze nie ma -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                        <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 text-gray-800 dark:text-gray-50">Sprzedaż łącznie ostatnie 12 miesięcy</span>
                    </h1>

                    <div class="mt-8 w-full h-full">
                        <div class="w-full h-full">
                            <canvas id="invoiceChart"></canvas>
                        </div>
                    </div>

                    <script>
                        const ctx = document.getElementById('invoiceChart').getContext('2d');
                        const invoiceChart = new Chart(ctx, {
                            type: 'line', // lub 'bar', w zależności od preferencji
                            data: {
                                labels: @json($dates), // daty z ostatnich 31 dni
                                datasets: [{
                                    label: 'Brutto',
                                    data: @json($totalValues), // sumy total
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderWidth: 2
                                }, {
                                    label: 'Netto',
                                    data: @json($subTotalValues), // sumy sub_total
                                    borderColor: 'rgba(153, 102, 255, 1)',
                                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                    <!--WYKRES-->
                </div>
            </div>
        </div>
        <!--END WIDGET TASK-->
    </div>
    </div>
</x-app-layout>