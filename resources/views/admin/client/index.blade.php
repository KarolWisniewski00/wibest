<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-6 lg:px-8 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                        <x-nav-link class="h-full text-center" href="{{ route('client') }}" :active="request()->routeIs('client')">
                            Wszystko
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
                                Klienci
                            </h1>
                            @if ($company)
                            <a href="{{ route('client.create') }}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-plus mr-2"></i>NOWY KLIENT
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
                    <!-- Napis z przyciskiem tworzenia -->

                    <div class="max-w">
                        <!-- SearchBox -->
                        <div class="relative">
                            <div id="search-container" class="relative flex flex-row justify-center items-center">
                                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                    <i class="text-gray-400 dark:text-gray-400 fa-solid fa-magnifying-glass"></i>
                                </div>
                                <input id="search" class="py-3 ps-10 pe-4 block w-full border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" type="text" aria-expanded="false" placeholder="Wyszukaj Klienta po nazwie" value="">
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
                                            url: '{{route("client.search")}}', // Endpoint Laravel
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
                                                    data.forEach(function(client) {

                                                        $('#suggestions-list').append(
                                                            '<li class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">' +
                                                            '<div class="block w-full">' +
                                                            '<div class="flex justify-between w-full">' +
                                                            '<div>' +
                                                            '<span class="text-lg font-semibold dark:text-gray-50">' + client.name + '</span>' +
                                                            '</div>' +
                                                            '</div>' +
                                                            '<div class="text-sm text-gray-400">' + client.adress + '</div>' +
                                                            '<div class="flex space-x-4 mt-4">' +
                                                            '<a href="{{route("client.show","")}}/' + client.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">' +
                                                            '<i class="fa-solid fa-eye"></i>' +
                                                            '</a>' +
                                                            '</div>' +
                                                            '<div class="flex space-x-4 mt-4">' +
                                                            '<a href="{{route("invoice.create.client","")}}/' + client.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-emerald-600 border border-emerald-600 rounded-lg hover:bg-emerald-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-emerald-300">' +
                                                            '<i class="fa-solid fa-file-invoice"></i>' +
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
                                        $('#under-input').html('Sugerowi klienci')
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
                    <div class="relative overflow-x-auto sm:rounded-lg mt-8">
                        @if ($company)
                        <div id="suggestions-container">
                            <small id="under-input" class="text-gray-400 dark:text-gray-500">Sugerowani klienci</small>
                            <ul id="suggestions-list" class="space-y-4 mt-4">
                                @if ($clients_sugestion->isEmpty())
                                <div class="text-center py-8">
                                    <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                    <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                </div>
                                @else
                                @foreach ($clients_sugestion as $client)
                                <li>
                                    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                        <div class="block w-full">
                                            <div class="flex justify-between w-full">
                                                <div>
                                                    <span class="text-lg font-semibold dark:text-gray-50">{{ $client->name }}</span>
                                                </div>
                                            </div>
                                            <div class="text-sm text-gray-400">{{ $client->adress }}</div>
                                            <div class="flex space-x-4 mt-4">
                                                <a href="{{route('client.show', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="flex space-x-4 mt-4">
                                                <a href="{{route('invoice.create.client', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-emerald-600 border border-emerald-600 rounded-lg hover:bg-emerald-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-emerald-300">
                                                    <i class="fa-solid fa-file-invoice"></i>
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
                            @if ($clients->isEmpty())
                            <div class="text-center py-8">
                                <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                <p class="text-gray-500 dark:text-gray-400">Brak klientów do wyświetlenia.</p>
                            </div>
                            @else
                            @foreach ($clients as $client)
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-lg font-semibold dark:text-gray-50">{{ $client->name }}</span>
                                            <form action="{{route('client.delete', $client)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="text-sm text-gray-400">{{ $client->adress }}</div>
                                        <div class="flex space-x-4 mt-4">
                                            <a href="{{route('client.show', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class="flex space-x-4 mt-4">
                                            <a href="{{route('invoice.create.client', $client)}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-emerald-600 border border-emerald-600 rounded-lg hover:bg-emerald-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-emerald-300">
                                                <i class="fa-solid fa-file-invoice"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>

                        <!-- Tabelaryczny widok klientów (desktop) -->
                        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nazwa</th>
                                    <th scope="col" class="px-6 py-3">Adres</th>
                                    <th scope="col" class="px-6 py-3">Podgląd</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($clients->isEmpty())
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="8" class="px-6 py-4">
                                        <x-empty-place />
                                    </td>
                                </tr>
                                @else
                                @foreach ($clients as $client)
                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 ">
                                    <td class="px-6 py-4">
                                        <p class="text-gray-900 dark:text-gray-50 font-semibold">
                                            <x-label-link-company href="{{ route('client.show', $client->id) }}">
                                                {{ $client->name }}
                                            </x-label-link-company>
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">{{ $client->adress }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('client.show', $client)}}" class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @else
                        <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <h3 class="text-lg font-medium">Dokończ konfigurację</h3>
                            </div>
                            <div class="mt-2 mb-4 text-sm">
                                Brak danych sprzedawcy. Dodaj informacje o firmie. Przejdź do zakładki ustawienia i kliknij zielony plus
                            </div>
                            <div class="flex">
                                <a href="{{route('setting.create')}}" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                    Przejdź do konfiguracji
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- Paginacja -->
                    <div class="md:px-2 py-4">
                        {{ $clients->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
</x-app-layout>