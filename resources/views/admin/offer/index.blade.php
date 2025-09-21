@include('admin.elements.alerts')
<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        padding-right: 48px;
    }

    @media (min-width: 640px) {
        .sticky {
            padding-right: 96px;
        }
    }

    @media (min-width: 1024px) {
        .sticky {
            padding-right: 128px;
        }
    }

    @media (min-width: 1280px) {
        .sticky {
            position: relative;
            padding-right: 0px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        var element = $('#fixed');
        var space = $('#space');
        var elementOffset = element.offset().top;
        var elementHeight = element.outerHeight(); // Pobieranie wysokości elementu

        $(window).scroll(function() {
            if ($(window).scrollTop() > elementOffset) {
                element.addClass('sticky');
                space.height(elementHeight); // Dodawanie wysokości do space
            } else {
                element.removeClass('sticky');
                space.height(0); // Usuwanie wysokości z space
            }
        });
    });
</script>
<x-app-layout>
    <div class="p-4">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <!-- WIDGET TASK -->
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <x-setting.nav />
                    <x-setting.header>
                        Oferty
                    </x-setting.header>
                    <x-flex-center class="px-4 pb-4">
                        <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
                            <div id="space" class="xl:hidden"></div>
                            <div class="max-w">
                                <!-- SearchBox -->
                                <div class="relative">
                                    <div id="search-container" class="relative flex flex-row justify-center items-center">
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                            <i class="text-gray-400 dark:text-gray-400 fa-solid fa-magnifying-glass"></i>
                                        </div>
                                        <input id="search" class="py-3 ps-10 pe-4 block w-full border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" type="text" aria-expanded="false" placeholder="Wyszukaj ofertę po numerze" value="">
                                    </div>
                                </div>
                                <!-- End SearchBox -->
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#suggestions-container').hide(); // Początkowo ukrywamy sugestie

                                    function toggleElements() {
                                        var windowWidth = $(window).width();

                                        // Nasłuchiwanie na focus w polu #search
                                        $('#search').on('focus', function() {
                                            if (windowWidth <= 768) {
                                                // Dla szerokości 768px i mniej, pokazujemy tylko #suggestions-container
                                                $('#suggestions-container').show();
                                                $('#list').hide();
                                                $('#links').hide();
                                            } else {
                                                // Dla szerokości powyżej 768px, chowamy tylko #table i #links
                                                $('#suggestions-container').show();
                                                $('#table').hide();
                                                $('#links').hide();
                                            }
                                        });
                                        $('#search').on('blur', function() {
                                            if (windowWidth <= 768) {
                                                // Dla szerokości 768px i mniej, chowamy listę z sugestiami
                                                $('#suggestions-container').hide();
                                                $('#list').show();
                                                $('#links').show();
                                            } else {
                                                // Dla szerokości powyżej 768px, chowamy sugestie, pokazujemy tabelę
                                                $('#suggestions-container').hide();
                                                $('#table').show();
                                                $('#links').show();
                                            }
                                        });
                                        // Wysłanie AJAX po wpisaniu tekstu
                                        $('#search').on('input', function() {
                                            $('#under-input').html('Wyniki wyszkiwania')
                                            var query = $(this).val();

                                            if (query.length > 0) {
                                                $.ajax({
                                                    url: '{{route("offer.search")}}', // Endpoint Laravel
                                                    method: 'GET',
                                                    data: {
                                                        query: query
                                                    }, // Wysłanie zapytania z inputa
                                                    success: function(data) {
                                                        // Wyczyść poprzednie wyniki
                                                        $('#suggestions-list').empty();

                                                        if (data.length > 0) {
                                                            $('#suggestions-container').show(); // Pokaż kontener z sugestiami

                                                            // Przetwarzanie wyników i dodanie do listy
                                                            data.forEach(function(offer) {
                                                                var offerTypeBadge = '';
                                                                if (offer.offer_type === 'oferta proforma') {
                                                                    offerTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white mr-2">PRO</span>';
                                                                } else if (offer.offer_type === 'oferta sprzedażowa') {
                                                                    offerTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white mr-2">FVS</span>';
                                                                }

                                                                $('#suggestions-list').append(
                                                                    '<li class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">' +
                                                                    '<div class="block w-full">' +
                                                                    '<div class="flex justify-between w-full">' +
                                                                    '<div>' +
                                                                    offerTypeBadge +
                                                                    '<span class="text-lg font-semibold dark:text-gray-50">' + offer.number + '</span>' +
                                                                    '</div>' +
                                                                    '<form action="{{route("offer.delete","")}}/' + offer.id + '" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć tą ofertę?\');">' +
                                                                    '@csrf @method("DELETE")' +
                                                                    '<button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">' +
                                                                    '<i class="fa-solid fa-trash"></i>' +
                                                                    '</button>' +
                                                                    '</form>' +
                                                                    '</div>' +
                                                                    '<div class="text-sm text-gray-400 w-2/3">' +
                                                                    (offer.client ? '<a href="{{route("offer.show","")}}/' + offer.client_id + '" class="text-blue-600 dark:text-blue-400 hover:underline">' + offer.client_name + '</a>' : offer.buyer_name) +
                                                                    '</div>' +
                                                                    '<div class="flex flex-col items-end">' +
                                                                    '<div>Netto <span class="font-semibold">' + offer.subtotal + '</span> zł</div>' +
                                                                    '<div>VAT <span class="font-semibold">' + offer.vat + '</span> zł</div>' +
                                                                    '<div class="text-lg dark:text-gray-50">Brutto <span class="font-semibold">' + offer.total + '</span> zł</div>' +
                                                                    '</div>' +
                                                                    '<div class="flex space-x-4 mt-4">' +
                                                                    '<a href="{{route("offer.show","")}}/' + offer.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">' +
                                                                    '<i class="fa-solid fa-eye"></i>' +
                                                                    '</a>' +
                                                                    '</a>' +
                                                                    '<a href="{{route("offer.send","")}}/' + offer.id + '" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">' +
                                                                    '<i class="fa-solid fa-paper-plane"></i>' +
                                                                    '</a>' +
                                                                    '</a>' +
                                                                    '<a href="{{route("offer.download","")}}/' + offer.id + '" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">' +
                                                                    '<i class="fa-solid fa-file-pdf"></i>' +
                                                                    '</a>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</li>'
                                                                );
                                                            });
                                                        } else {
                                                            $('#under-input').html('Wyniki wyszkiwania')
                                                            // Gdy nie ma wyników
                                                            $('#suggestions-list').append(`
                                                    <div class="text-center py-8">
                                                        <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                                        <p class="text-gray-500 dark:text-gray-400">Brak ofert do wyświetlenia.</p>
                                                    </div>
                                                    `);
                                                        }
                                                    }
                                                });
                                            } else {
                                                $('#under-input').html('Sugerowane oferty')
                                                $('#suggestions-container').hide(); // Ukryj, jeśli pole puste
                                            }
                                        });

                                        // Zapobieganie znikaniu sugestii przy klikaniu w #suggestions-container
                                        $('#suggestions-container').on('mousedown', function(event) {
                                            event.preventDefault(); // Blokujemy ukrycie kontenera podczas kliknięcia
                                        });

                                        // Nasłuchiwanie na kliknięcia poza polem wyszukiwania lub kontenerem sugestii
                                        $(document).on('click', function(event) {
                                            if (!$(event.target).closest('#search, #suggestions-container').length) {
                                                $('#suggestions-container').hide();
                                            }
                                        });
                                    }

                                    // Wywołaj funkcję na załadowanie strony
                                    toggleElements();

                                    // Wywołaj ponownie funkcję, gdy rozmiar okna się zmieni (resize event)
                                    $(window).on('resize', function() {
                                        toggleElements();
                                    });
                                });
                            </script>




                            <!--Tabela-->
                            <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8">
                                @if ($company)
                                <!-- Lista sugerowanych ofert -->
                                <div id="suggestions-container">
                                    <small id="under-input" class="text-gray-400 dark:text-gray-500">Sugerowane oferty</small>
                                    <ul id="suggestions-list" class="space-y-4 mt-4">
                                        @if ($offers_sugestion->isEmpty())
                                        <div class="text-center py-8">
                                            <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                            <p class="text-gray-500 dark:text-gray-400">Brak ofert do wyświetlenia.</p>
                                        </div>
                                        @else
                                        @foreach ($offers_sugestion as $offer)
                                        <li>
                                            <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                                <div class="block w-full">
                                                    <div class="flex justify-between w-full">
                                                        <div>
                                                            @if($offer->offer_type == "oferta proforma")
                                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                            @elseif($offer->offer_type == "oferta sprzedażowa")
                                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                            @endif
                                                            <span class="text-lg font-semibold dark:text-gray-50">{{ $offer->number }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-sm text-gray-400 w-2/3">
                                                        @if($offer->client)
                                                        <a href="{{ route('client.show', $offer->client->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$offer->client->name}}</a>
                                                        @else
                                                        {{$offer->buyer_name}}
                                                        @endif
                                                    </div>
                                                    <div class="flex flex-col items-end">
                                                        <div>
                                                            Netto <span class="font-semibold">{{ $offer->subtotal }}</span> zł
                                                        </div>
                                                        <div>
                                                            VAT <span class="font-semibold">{{ $offer->vat }}</span> zł
                                                        </div>
                                                        <div class="text-lg dark:text-gray-50">
                                                            Brutto <span class="font-semibold">{{ $offer->total }}</span> zł
                                                        </div>
                                                    </div>
                                                    <div class="flex space-x-4 mt-4">
                                                        <a href="{{route('offer.show', $offer)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <a href="{{route('offer.send',$offer)}}" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                            <i class="fa-solid fa-paper-plane"></i>
                                                        </a>
                                                        <a href="{{route('offer.download', $offer)}}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                            <i class="fa-solid fa-file-pdf"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <ul id="list" class="grid w-full gap-y-4 block md:hidden">
                                    @if ($offers->isEmpty())
                                    <div class="text-center py-8">
                                        <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                        <p class="text-gray-500 dark:text-gray-400">Brak ofert do wyświetlenia.</p>
                                    </div>
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

                                    @foreach ($offers as $key => $offer)
                                    @php
                                    // Pobieramy miesiąc z daty oferty (załóżmy, że jest polem issue_date)
                                    $offerMonth = \Carbon\Carbon::parse($offer->issue_date)->month;

                                    // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                                    if ($offerMonth !== $currentMonth) {
                                    $currentMonth = $offerMonth;
                                    $monthName = $months[$offerMonth];
                                    @endphp
                                    <!-- Sekcja wyświetlająca nazwę miesiąca z ikoną strzałki w dół -->
                                    <div id="s-{{$key}}"></div>
                                    <li id="e-{{$key}}" class="my-4">
                                        <div class="flex items-center justify-start">
                                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">{{ $monthName }}</h2>
                                            <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                        </div>
                                    </li>
                                    @php
                                    }
                                    @endphp

                                    <!-- Kod dla oferty -->
                                    <li>
                                        <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                            <div class="block w-full">
                                                <div class="flex justify-between w-full">
                                                    <div class="flex justify-start items-center w-full">
                                                        <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-sky-500 dark:text-white  mr-2">OFR</span>
                                                        <span class="text-lg font-semibold dark:text-gray-50">{{ $offer->number }}</span>
                                                    </div>
                                                </div>
                                                <div class="text-sm text-gray-400 w-2/3">
                                                    @if($offer->client)
                                                    <a href="{{ route('client.show', $offer->client->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$offer->client->name}}</a>
                                                    @else
                                                    {{$offer->buyer_name}}
                                                    @endif
                                                </div>
                                                <div class="flex flex-col items-end">
                                                    <div>
                                                        Netto <span class="font-semibold">{{ $offer->subtotal }}</span> zł
                                                    </div>
                                                    <div>
                                                        VAT <span class="font-semibold">{{ $offer->vat }}</span> zł
                                                    </div>
                                                    <div class="text-lg dark:text-gray-50">
                                                        Brutto <span class="font-semibold">{{ $offer->total }}</span> zł
                                                    </div>
                                                </div>
                                                <div class="flex space-x-4 mt-4">
                                                    <a href="{{route('offer.show', $offer)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="{{route('offer.send',$offer)}}" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                        <i class="fa-solid fa-paper-plane"></i>
                                                    </a>
                                                    <a href="{{route('offer.download', $offer)}}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                        <i class="fa-solid fa-file-pdf"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                    @endif
                                </ul>
                                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 hidden lg:table-cell">
                                                <x-flex-center>
                                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                </x-flex-center>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Numer oferty
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
                                            <td class="px-3 py-2 hidden lg:table-cell">
                                                <x-flex-center>
                                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="{{ $company->id }}">
                                                </x-flex-center>
                                            </td>
                                            <td class="px-3 py-2 min-w-48">
                                                <x-offer-label :offer="$offer" />
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

                                <!--LINKI-->
                                <div id="links" class="md:px-2 py-4">
                                    {{ $offers->links() }}
                                </div>
                                <script>
                                    $(document).ready(function() {

                                    });
                                </script>

                                @else
                                @include('admin.elements.end_config')
                                @endif
                            </div>
                        </div>
                    </x-flex-center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>