<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Faktury') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 lg:px-8 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                        <x-nav-link class="h-full text-center" href="{{ route('invoice') }}" :active="request()->routeIs('invoice')">
                            Wszystko
                        </x-nav-link>
                        <x-nav-link class="h-full text-center" href="{{ route('invoice.now') }}" :active="request()->routeIs('invoice.now')">
                            Aktualny miesiąc
                        </x-nav-link>
                        <x-nav-link class="h-full text-center" href="{{ route('invoice.last') }}" :active="request()->routeIs('invoice.last')">
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
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Faktury
                            </h1>
                            @if ($company)
                            <a href="{{ route('invoice.create') }}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-plus mr-2"></i>NOWA FAKTURA
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
                                            url: '{{route("invoice.search")}}', // Endpoint Laravel
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
                                                    data.forEach(function(invoice) {
                                                        var invoiceTypeBadge = '';
                                                        if (invoice.invoice_type === 'faktura proforma') {
                                                            invoiceTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white mr-2">PRO</span>';
                                                        } else if (invoice.invoice_type === 'faktura sprzedażowa') {
                                                            invoiceTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white mr-2">FVS</span>';
                                                        }

                                                        $('#suggestions-list').append(
                                                            '<li class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">' +
                                                            '<div class="block w-full">' +
                                                            '<div class="flex justify-between w-full">' +
                                                            '<div>' +
                                                            invoiceTypeBadge +
                                                            '<span class="text-lg font-semibold dark:text-gray-50">' + invoice.number + '</span>' +
                                                            '</div>' +
                                                            '<form action="{{route("invoice.delete","")}}/' + invoice.id + '" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć tą fakturę?\');">' +
                                                            '@csrf @method("DELETE")' +
                                                            '<button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">' +
                                                            '<i class="fa-solid fa-trash"></i>' +
                                                            '</button>' +
                                                            '</form>' +
                                                            '</div>' +
                                                            '<div class="text-sm text-gray-400 w-2/3">' +
                                                            (invoice.client ? '<a href="{{route("invoice.show","")}}/' + invoice.client_id + '" class="text-blue-600 dark:text-blue-400 hover:underline">' + invoice.client_name + '</a>' : invoice.buyer_name) +
                                                            '</div>' +
                                                            '<div class="flex flex-col items-end">' +
                                                            '<div>Netto <span class="font-semibold">' + invoice.subtotal + '</span> zł</div>' +
                                                            '<div>VAT <span class="font-semibold">' + invoice.vat + '</span> zł</div>' +
                                                            '<div class="text-lg dark:text-gray-50">Brutto <span class="font-semibold">' + invoice.total + '</span> zł</div>' +
                                                            '</div>' +
                                                            '<div class="flex space-x-4 mt-4">' +
                                                            '<a href="{{route("invoice.show","")}}/' + invoice.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">' +
                                                            '<i class="fa-solid fa-eye"></i>' +
                                                            '</a>' +
                                                            '<a href="{{route("invoice.edit","")}}/' + invoice.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">' +
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
                                @if ($invoices_sugestion->isEmpty())
                                <div class="text-center py-8">
                                    <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                    <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                </div>
                                @else
                                @foreach ($invoices_sugestion as $invoice)
                                <li>
                                    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                        <div class="block w-full">
                                            <div class="flex justify-between w-full">
                                                <div>
                                                    @if($invoice->invoice_type == "faktura proforma")
                                                    <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                    @elseif($invoice->invoice_type == "faktura sprzedażowa")
                                                    <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                    @endif
                                                    <span class="text-lg font-semibold dark:text-gray-50">{{ $invoice->number }}</span>
                                                </div>
                                                <form action="{{route('invoice.delete', $invoice)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="text-sm text-gray-400 w-2/3">
                                                @if($invoice->client)
                                                <a href="{{ route('client.show', $invoice->client->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$invoice->client->name}}</a>
                                                @else
                                                {{$invoice->buyer_name}}
                                                @endif
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <div>
                                                    Netto <span class="font-semibold">{{ $invoice->subtotal }}</span> zł
                                                </div>
                                                <div>
                                                    VAT <span class="font-semibold">{{ $invoice->vat }}</span> zł
                                                </div>
                                                <div class="text-lg dark:text-gray-50">
                                                    Brutto <span class="font-semibold">{{ $invoice->total }}</span> zł
                                                </div>
                                            </div>
                                            <div class="flex space-x-4 mt-4">
                                                <a href="{{route('invoice.show', $invoice)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{route('invoice.edit', $invoice)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
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
                            @if ($invoices->isEmpty())
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

                            @foreach ($invoices as $key => $invoice)
                            @php
                            // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                            $invoiceMonth = \Carbon\Carbon::parse($invoice->issue_date)->month;

                            // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                            if ($invoiceMonth !== $currentMonth) {
                            $currentMonth = $invoiceMonth;
                            $monthName = $months[$invoiceMonth];
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
                                                @if($invoice->invoice_type == "faktura proforma")
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                @if($invoice->invoice_id)
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                @endif
                                                @elseif($invoice->invoice_type == "faktura sprzedażowa")
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                @if($invoice->invoice_id)
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                @endif
                                                @elseif($invoice->invoice_type == "faktura")
                                                <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                @endif
                                                <span class="text-lg font-semibold dark:text-gray-50">{{ $invoice->number }}</span>
                                            </div>
                                            <form action="{{route('invoice.delete', $invoice)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="text-sm text-gray-400 w-2/3">
                                            @if($invoice->client)
                                            <a href="{{ route('client.show', $invoice->client->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$invoice->client->name}}</a>
                                            @else
                                            {{$invoice->buyer_name}}
                                            @endif
                                        </div>
                                        <div class="flex flex-col items-end">
                                            <div>
                                                Netto <span class="font-semibold">{{ $invoice->subtotal }}</span> zł
                                            </div>
                                            <div>
                                                VAT <span class="font-semibold">{{ $invoice->vat }}</span> zł
                                            </div>
                                            <div class="text-lg dark:text-gray-50">
                                                Brutto <span class="font-semibold">{{ $invoice->total }}</span> zł
                                            </div>
                                        </div>
                                        <div class="flex space-x-4 mt-4">
                                            <a href="{{route('invoice.show', $invoice)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{route('invoice.edit', $invoice)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                                <i class="fa-solid fa-pen-to-square"></i>
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
                                    @if($invoice->paid == null)
                                    <td class="px-6 py-4 min-w-48">
                                        <div class="flex justify-start items-center w-full">
                                            @if($invoice->invoice_type == "faktura proforma")
                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                            @if($invoice->invoice_id)
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                            @endif
                                            @elseif($invoice->invoice_type == "faktura sprzedażowa")
                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                            @if($invoice->invoice_id)
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                            @endif
                                            @elseif($invoice->invoice_type == "faktura")
                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                            @endif
                                            {{ $invoice->number }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($invoice->client)
                                        <a href="{{ route('client.show', $invoice->client->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$invoice->client->name}}</a>
                                        @else
                                        {{$invoice->buyer_name}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm min-w-32">
                                        {{ $invoice->subtotal }} zł
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-lg min-w-32 text-gray-50">
                                        {{ $invoice->total }} zł
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('invoice.show', $invoice) }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('invoice.edit', $invoice) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('invoice.delete', $invoice) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę fakturę?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @else
                                    <td class="px-3 py-2 min-w-48">
                                        <div class="flex justify-start items-center w-full">
                                            @if($invoice->invoice_type == "faktura proforma")
                                            <span class="inline-flex p-2 items-center bg-violet-500 dark:bg-violet-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">PRO</span>
                                            @if($invoice->invoice_id)
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mx-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                            <span class="inline-flex p-2 items-center bg-green-300 dark:bg-green-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">FVS</span>
                                            @endif
                                            @elseif($invoice->invoice_type == "faktura sprzedażowa")
                                            <span class="inline-flex p-2 items-center bg-green-300 dark:bg-green-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">FVS</span>
                                            @if($invoice->invoice_id)
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mx-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                            <span class="inline-flex p-2 items-center bg-violet-500 dark:bg-violet-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">PRO</span>
                                            @endif
                                            @elseif($invoice->invoice_type == "faktura")
                                            <span class="inline-flex p-2 items-center bg-green-300 dark:bg-green-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">FVS</span>
                                            @endif
                                            <span class="ps-3 font-semibold text-lg text-gray-700 dark:text-gray-50">
                                                {{ substr($invoice->number, 3) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2">
                                        @if($invoice->client)
                                        <div class="flex flex-row">
                                            <a href="{{ route('client.show', $invoice->client->id) }}" class="my-auto h-fit text-blue-600 dark:text-blue-400 hover:underline">
                                                <span class="mr-2 h-fit my-auto inline-flex p-2 items-center bg-blue-300 dark:bg-blue-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                                    ORG
                                                </span>
                                            </a>
                                            <a href="{{ route('client.show', $invoice->client->id) }}" class="text-blue-300 dark:text-blue-400 hover:underline">
                                                {{$invoice->client->name}}
                                            </a>
                                        </div>
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
                                        @if($invoice->status == 'wystawiona')
                                        <span class="inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold text-xs uppercase tracking-widest hover:text-yellow-700 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                            {{ $invoice->status }}
                                        </span>
                                        @endif
                                        @if($invoice->status == 'opłacona')
                                        <span class="inline-flex p-2 items-center text-green-300 dark:text-green-300 font-semibold text-xs uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
                                            {{ $invoice->status }}
                                        </span>
                                        @endif
                                    </td>
                                    <td colspan="2" class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-50">
                                        @if($invoice->paid == 'opłacono')
                                        <!-- Progress -->
                                        <div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-green-300 text-xs text-white text-center whitespace-nowrap dark:text-gray-900 dark:bg-green-300 transition duration-500" style="width: 100%">100%</div>
                                        </div>
                                        @else
                                        @php
                                        $brutto = $invoice->total;
                                        $paid = $invoice->paid_part;
                                        if($paid != null && $brutto != 0){
                                        $remaining_percent = ($paid / $brutto) * 100;
                                        }else{
                                        $remaining_percent = 'error';
                                        }
                                        @endphp
                                        @if($remaining_percent != 'error')
                                        <!-- Progress -->
                                        <div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700" role="progressbar" aria-valuenow="{{round($remaining_percent, 2)}}" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-green-300 text-xs text-white text-center whitespace-nowrap dark:text-gray-900 dark:bg-green-300 transition duration-500" style="width: {{round($remaining_percent, 2)}}%">{{round($remaining_percent, 2)}}%</div>
                                        </div>
                                        @else
                                        <!-- Progress -->
                                        <div class="flex w-full h-4 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-red-600 text-xs text-white text-center whitespace-nowrap dark:text-gray-900 dark:bg-red-300 transition duration-500" style="width: 100%">ERROR</div>
                                        </div>
                                        @endif
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">
                                        <a href="{{ route('invoice.show', $invoice) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                        <!--LINKI-->
                        <div id="links" class="md:px-2 py-4">
                            {{ $invoices->links() }}
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
@if(session('error'))
<script>
    $(document).ready(function() {
        toastr.error("{{ session('error') }}")
    });
</script>
@endif
@if(session('success'))
<script>
    $(document).ready(function() {
        toastr.success("{{ session('success') }}")
    });
</script>
@endif