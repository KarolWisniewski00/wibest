<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 lg:px-8 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                        <x-nav-link class="h-full text-center" href="{{ route('cost') }}" :active="request()->routeIs('cost')">
                            Wszystko
                        </x-nav-link>
                        <x-nav-link class="h-full text-center" href="{{ route('cost.now') }}" :active="request()->routeIs('cost.now')">
                            Aktualny miesiąc
                        </x-nav-link>
                        <x-nav-link class="h-full text-center" href="{{ route('cost.last') }}" :active="request()->routeIs('cost.last')">
                            Poprzedni miesiąc
                        </x-nav-link>
                    </nav>
                </div>
                <div class="px-6 lg:px-8 pb-6 lg:pb-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
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
                    <div id="space" class="xl:hidden"></div>
                    <!-- Napis z przyciskiem tworzenia -->
                    <div id="fixed" class="pb-4 flex flex-col justify-between items-center">
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                                Koszta
                            </h1>
                            @if ($company)
                            <a href="{{ route('cost.create') }}" class="mt-8 mb-4 inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                            @else
                            @endif
                        </div>
                    </div>

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

                    <div class="max-w">
                        <!-- SearchBox -->
                        <div class="relative">
                            <div id="search-container" class="relative flex flex-row justify-center items-center">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                    <i class="text-gray-400 dark:text-gray-400 fa-solid fa-magnifying-glass"></i>
                                </div>
                                <input id="search" class="py-3 ps-10 pe-4 block w-full border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" type="text" aria-expanded="false" placeholder="Wyszukaj fakturę po numerze" value="">
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
                                            url: '{{route("cost.search")}}', // Endpoint Laravel
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
                                                    data.forEach(function(cost) {
                                                        var costTypeBadge = '';
                                                        if (cost.cost_type === 'faktura proforma') {
                                                            costTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white mr-2">PRO</span>';
                                                        } else if (cost.cost_type === 'faktura sprzedażowa') {
                                                            costTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white mr-2">FVS</span>';
                                                        }

                                                        $('#suggestions-list').append(
                                                            '<li class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">' +
                                                            '<div class="block w-full">' +
                                                            '<div class="flex justify-between w-full">' +
                                                            '<div>' +
                                                            costTypeBadge +
                                                            '<span class="text-lg font-semibold dark:text-gray-50">' + cost.number + '</span>' +
                                                            '</div>' +
                                                            '<form action="{{route("cost.delete","")}}/' + cost.id + '" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć tą fakturę?\');">' +
                                                            '@csrf @method("DELETE")' +
                                                            '<button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">' +
                                                            '<i class="fa-solid fa-trash"></i>' +
                                                            '</button>' +
                                                            '</form>' +
                                                            '</div>' +
                                                            '<div class="flex flex-col items-end">' +
                                                            '<div>Netto <span class="font-semibold">' + cost.subtotal + '</span> zł</div>' +
                                                            '<div>VAT <span class="font-semibold">' + cost.vat + '</span> zł</div>' +
                                                            '<div class="text-lg dark:text-gray-50">Brutto <span class="font-semibold">' + cost.total + '</span> zł</div>' +
                                                            '</div>' +
                                                            '<div class="flex space-x-4 mt-4">' +
                                                            '<a href="{{route("cost.show","")}}/' + cost.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">' +
                                                            '<i class="fa-solid fa-eye"></i>' +
                                                            '</a>' +
                                                            '<a href="{{route("cost.edit","")}}/' + cost.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">' +
                                                            '<i class="fa-solid fa-pen-to-square"></i>' +
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
                                                        <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                                    </div>
                                                    `);
                                                }
                                            }
                                        });
                                    } else {
                                        $('#under-input').html('Sugerowane faktury')
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
                        <!-- Lista sugerowanych faktur -->
                        <div id="suggestions-container">
                            <small id="under-input" class="text-gray-400 dark:text-gray-500">Sugerowane faktury</small>
                            <ul id="suggestions-list" class="space-y-4 mt-4">
                                @if ($costs_sugestion->isEmpty())
                                <div class="text-center py-8">
                                    <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                    <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                </div>
                                @else
                                @foreach ($costs_sugestion as $cost)
                                <li>
                                    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                        <div class="block w-full">
                                            <div class="flex justify-between w-full">
                                                <div>
                                                    @if($cost->cost_type == "faktura proforma")
                                                    <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                    @elseif($cost->cost_type == "faktura sprzedażowa")
                                                    <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                    @endif
                                                    <span class="text-lg font-semibold dark:text-gray-50">{{ $cost->number }}</span>
                                                </div>
                                                <form action="{{route('cost.delete', $cost)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="text-sm text-gray-400 w-2/3">
                                                {{$cost->buyer_name}}
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <div>
                                                    Netto <span class="font-semibold">{{ $cost->subtotal }}</span> zł
                                                </div>
                                                <div>
                                                    VAT <span class="font-semibold">{{ $cost->vat }}</span> zł
                                                </div>
                                                <div class="text-lg dark:text-gray-50">
                                                    Brutto <span class="font-semibold">{{ $cost->total }}</span> zł
                                                </div>
                                            </div>
                                            <div class="flex space-x-4 mt-4">
                                                <a href="{{route('cost.show', $cost)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{route('cost.edit', $cost)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                                    <i class="fa-solid fa-pen-to-square"></i>
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
                            @if ($costs->isEmpty())
                            <div class="text-center py-8">
                                <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
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

                            @foreach ($costs as $key => $cost)
                            @php
                            // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                            $costMonth = \Carbon\Carbon::parse($cost->issue_date)->month;

                            // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                            if ($costMonth !== $currentMonth) {
                            $currentMonth = $costMonth;
                            $monthName = $months[$costMonth];
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

                            <!-- Kod dla faktury -->
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <div class="flex justify-start items-center w-full">
                                                @if($cost->cost_type == "faktura proforma")
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                @if($cost->cost_id)
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                @endif
                                                @elseif($cost->cost_type == "faktura sprzedażowa")
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                @if($cost->cost_id)
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                @endif
                                                @elseif($cost->cost_type == "faktura")
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                @endif
                                                <span class="text-lg font-semibold dark:text-gray-50">{{ $cost->number }}</span>
                                            </div>
                                            <form action="{{route('cost.delete', $cost)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="text-sm text-gray-400 w-2/3">
                                            {{$cost->buyer_name}}
                                        </div>
                                        <div class="flex flex-col items-end">
                                            <div>
                                                Netto <span class="font-semibold">{{ $cost->subtotal }}</span> zł
                                            </div>
                                            <div>
                                                VAT <span class="font-semibold">{{ $cost->vat }}</span> zł
                                            </div>
                                            <div class="text-lg dark:text-gray-50">
                                                Brutto <span class="font-semibold">{{ $cost->total }}</span> zł
                                            </div>
                                        </div>
                                        <div class="flex space-x-4 mt-4">
                                            <a href="{{route('cost.show', $cost)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{route('cost.edit', $cost)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                            @endif
                        </ul>
                        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden md:table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Podgląd</th> <!-- Kolumna dla podglądu pliku -->
                                    <th scope="col" class="px-6 py-3">Numer faktury</th>
                                    <th scope="col" class="px-6 py-3">Kwota brutto</th> <!-- Kolumna dla kwoty brutto -->
                                    <th scope="col" class="px-6 py-3">Termin płatności</th> <!-- Kolumna dla terminu płatności -->
                                    <th scope="col" class="px-6 py-3">Uwagi</th> <!-- Kolumna dla uwag -->
                                    <th scope="col" class="px-6 py-3">Podgląd</th>
                                    <th scope="col" class="px-6 py-3">Edycja</th>
                                    <th scope="col" class="px-6 py-3">Usuwanie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($costs->isEmpty())
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="8" class="px-6 py-4">
                                        <div class="text-center py-8">
                                            <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                            <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                        </div>
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

                                @foreach ($costs as $cost)
                                @php
                                // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                                $costMonth = \Carbon\Carbon::parse($cost->issue_date)->month;

                                // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                                if ($costMonth !== $currentMonth) {
                                $currentMonth = $costMonth;
                                $monthName = $months[$costMonth];
                                @endphp
                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <td colspan="8" class="px-6 py-4">
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
                                    <td class="px-6 py-4 min-w-48">
                                        <div class="flex justify-start items-center w-full">
                                            @if($cost->path)
                                            @php
                                            $extension = pathinfo($cost->path, PATHINFO_EXTENSION);
                                            @endphp
                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF']))
                                            <img src="{{ asset('attachments/'.$cost->path) }}" alt="Podgląd" class="w-16 h-16 object-cover rounded image-preview" />
                                            @elseif (in_array($extension, ['pdf', 'PDF']))
                                            <i class="fa-solid fa-file-pdf text-gray-500 icon-preview" style="font-size: 64px;"></i> <!-- Ikona PDF -->
                                            @else
                                            <i class="fa-solid fa-file text-gray-500 icon-preview" style="font-size: 64px;"></i> <!-- Ikona ogólna -->
                                            @endif
                                            @else
                                            <i class="fa-solid fa-file-circle-xmark text-gray-500 icon-preview" style="font-size: 64px;"></i> <!-- Ikona ogólna, jeśli brak pliku -->
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-rose-500 dark:text-white  mr-2">CST</span>
                                        {{ $cost->number }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-lg min-w-32 text-gray-50">
                                        {{ $cost->total }} zł
                                    </td>
                                    <td class="px-6 py-4 text-sm min-w-32">
                                        {{ \Carbon\Carbon::parse($cost->due_date)->format('d.m.Y') }} <!-- Format daty -->
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cost->notes }} <!-- Uwagi -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('cost.show', $cost) }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('cost.edit', $cost) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cost.delete', $cost) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę fakturę kosztową?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                                <script>
                                    $(document).ready(function() {
                                        $('.image-preview').on('error', function() {
                                            $(this).replaceWith('<i class="fa-solid fa-image text-gray-500" style="font-size: 64px;"></i>'); // Zastępuje obraz ikoną, jeśli załadowanie nie powiedzie się
                                        });
                                    });
                                </script>
                                @endif
                            </tbody>
                        </table>



                        <!--LINKI-->
                        <div id="links" class="md:px-2 py-4">
                            {{ $costs->links() }}
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
            </div>
        </div>
    </div>
</x-app-layout>