<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('project') }}" class="text-lg">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy projektów
                    </x-button-link-back>
                    <!--POWRÓT-->

                    <!--BODY-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <!--SPRZEDAJĄCY-->
                        <x-container-gray class="px-0">
                            <!--NAZWA-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <x-label-link-company href="{{route('setting')}}">
                                        {{ $project->client->name }}
                                    </x-label-link-company>
                                </p>
                            </x-text-cell>
                            <!--NAZWA-->

                            <!--ADRES-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Adres
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $project->client->adress }}
                                </p>
                            </x-text-cell>
                            <!--ADRES-->

                            <!--NIP-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    NIP
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    {{ $project->client->vat_number }}
                                </p>
                            </x-text-cell>
                            <!--NIP-->
                        </x-container-gray>
                        <!--SPRZEDAJĄCY-->

                        <!--DANE PROJEKTU-->
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
                        </x-container-gray>
                        <!--DANE PROJEKTU-->
                    </div>
                    <!--BODY-->

                    <!--PRZYCISKI-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- EDYTUJ -->
                        <x-button-link-blue href="">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </x-button-link-blue>
                        <!--EDYTUJ-->

                        <!--USUŃ-->
                        <form action="" method="POST"
                            onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                            @csrf
                            @method('DELETE')
                            <x-button-red type="submit">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </x-button-red>
                        </form>
                        <!--USUŃ-->
                    </div>
                    <!--PRZYCISKI-->

                    <!--PRZYCISKI-->
                    <div class="mt-8 md:flex justify-end items-center space-x-4">
                        <!--NOWA-->
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Oferty
                            </h1>
                            <a href="{{ route('offer.create.project', $project) }}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-plus mr-2"></i>PRZYGOTUJ OFERTĘ
                            </a>
                        </div>
                        <!--NOWA-->
                    </div>
                    <!--PRZYCISKI-->

                    <!--COPY OFFER-->
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
                                <td class="px-3 py-2">

                                </td>
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
                                    <x-invoice-status :invoice="$offer" />
                                </td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('invoice.show', $offer) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!--COPY OFFER-->
                    <!--INFO-->
                    <div class="mt-8 flex flex-col w-full justify-end items-center">
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $project->user->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $project->company->name ?? '' }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia klienta
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $project->created_at }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji klienta
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                {{ $project->updated_at }}
                            </p>
                        </div>
                    </div>
                    <!--INFO-->
                </div>
            </div>
        </div>
        <!--END WIDGET TASK-->
    </div>
    </div>
</x-app-layout>