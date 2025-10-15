<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mierzenie Czasu Pracy') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="px-6 lg:px-8 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                        <x-nav-link class="h-full text-center" href="{{ route('work.session') }}" :active="request()->routeIs('work.session')">
                            Wszystko
                        </x-nav-link>
                        <x-nav-link class="h-full text-center" href="{{ route('work.session.now') }}" :active="request()->routeIs('work.session.now')">
                            Aktualny miesiąc
                        </x-nav-link>
                        <x-nav-link class="h-full text-center" href="{{ route('work.session.last') }}" :active="request()->routeIs('work.session.last')">
                            Poprzedni miesiąc
                        </x-nav-link>
                    </nav>
                </div>
                <div class="px-6 lg:px-8 pb-6 lg:pb-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <x-header-display href="{{ route('work.session.create') }}">
                        Mierzenie Czasu Pracy
                    </x-header-display>
                    <x-search-display />
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
                                            url: '{{route("work.session.search")}}', // Endpoint Laravel
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
                                                    data.forEach(function(work_session) {
                                                        var work_sessionTypeBadge = '';
                                                        if (work_session.work_session_type === 'faktura proforma') {
                                                            work_sessionTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white mr-2">PRO</span>';
                                                        } else if (work_session.work_session_type === 'faktura sprzedażowa') {
                                                            work_sessionTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white mr-2">FVS</span>';
                                                        }

                                                        $('#suggestions-list').append(
                                                            '<li class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">' +
                                                            '<div class="block w-full">' +
                                                            '<div class="flex justify-between w-full">' +
                                                            '<div>' +
                                                            work_sessionTypeBadge +
                                                            '<span class="text-lg font-semibold dark:text-gray-50">' + work_session.number + '</span>' +
                                                            '</div>' +
                                                            '<form action="{{route("work.session.delete","")}}/' + work_session.id + '" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć tą fakturę?\');">' +
                                                            '@csrf @method("DELETE")' +
                                                            '<button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">' +
                                                            '<i class="fa-solid fa-trash"></i>' +
                                                            '</button>' +
                                                            '</form>' +
                                                            '</div>' +
                                                            '<div class="text-sm text-gray-400 w-2/3">' +
                                                            (work_session.client ? '<a href="{{route("work.session.show","")}}/' + work_session.client_id + '" class="text-blue-600 dark:text-blue-400 hover:underline">' + work_session.client_name + '</a>' : work_session.buyer_name) +
                                                            '</div>' +
                                                            '<div class="flex flex-col items-end">' +
                                                            '<div>Netto <span class="font-semibold">' + work_session.subtotal + '</span> zł</div>' +
                                                            '<div>VAT <span class="font-semibold">' + work_session.vat + '</span> zł</div>' +
                                                            '<div class="text-lg dark:text-gray-50">Brutto <span class="font-semibold">' + work_session.total + '</span> zł</div>' +
                                                            '</div>' +
                                                            '<div class="flex space-x-4 mt-4">' +
                                                            '<a href="{{route("work.session.show","")}}/' + work_session.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">' +
                                                            '<i class="fa-solid fa-eye"></i>' +
                                                            '</a>' +
                                                            '<a href="{{route("work.session.edit","")}}/' + work_session.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">' +
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
                    <div class="relative overflow-x-auto md:shadow sm:rounded-lg mt-8">
                        @if ($company)
                        <!-- Lista sugerowanych faktur -->
                        <div id="suggestions-container">
                            <small id="under-input" class="text-gray-400 dark:text-gray-500">Sugerowane</small>
                            <ul id="suggestions-list" class="space-y-4 mt-4">
                                @if ($work_sessions_sugestion->isEmpty())
                                <x-empty-place />
                                @else
                                @foreach ($work_sessions_sugestion as $work_session)
                                <li>
                                    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                        <div class="block w-full">
                                            <div class="flex justify-between w-full">
                                                <div class="flex justify-start items-center w-full justify-start">
                                                    @if($work_session->status == 'W trakcie pracy')
                                                    <x-status-yellow class="text-xl">
                                                        {{ $work_session->status }}
                                                    </x-status-yellow>
                                                    @endif
                                                    @if($work_session->status == 'Praca zakończona')
                                                    <x-status-green class="text-xl">
                                                        {{ $work_session->status }}
                                                    </x-status-green>
                                                    @endif
                                                </div>
                                                @if($role == 'admin')
                                                <form action="{{route('work.session.delete', $work_session)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button-red type="submit" class="min-h-[38px]">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </x-button-red>
                                                </form>
                                                @endif
                                            </div>
                                            <x-paragraf-display class="text-xl">
                                                {{ $work_session->time_in_work }}
                                            </x-paragraf-display>
                                            @if($work_session->status == 'Praca zakończona')
                                            <div class="text-sm text-gray-400 dark:text-gray-300 flex justify-start w-full my-2 gap-x-4">
                                                @if($work_session->start_day_of_week != $work_session->end_day_of_week)
                                                <div class="flex flex-col">
                                                    <x-label-display>
                                                        Od
                                                    </x-label-display>
                                                    <x-paragraf-display class="text-xs">
                                                        {{ $work_session->start_day_of_week }}
                                                    </x-paragraf-display>
                                                </div>
                                                <div class="flex flex-col">
                                                    <x-label-display>
                                                        Do
                                                    </x-label-display>
                                                    <x-paragraf-display class="text-xs">
                                                        {{ $work_session->end_day_of_week }}
                                                    </x-paragraf-display>
                                                </div>
                                                @else
                                                <div class="flex flex-col">
                                                    <x-paragraf-display class="text-xs">
                                                        {{ $work_session->end_day_of_week }}
                                                    </x-paragraf-display>
                                                </div>
                                                @endif
                                            </div>
                                            @else
                                            <div class="text-sm text-gray-400 dark:text-gray-100 flex w-full my-2">
                                                <div class="flex flex-col">
                                                    <x-label-display>
                                                        Od
                                                    </x-label-display>
                                                    <x-paragraf-display class="text-xs">
                                                        {{$work_session->start_time}}
                                                    </x-paragraf-display>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                                <div class="flex flex-col">
                                                    {{$work_session->user->name}}
                                                </div>
                                            </div>
                                            <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                                <div class="flex flex-col">
                                                    {{$work_session->company->name}}
                                                </div>
                                            </div>
                                            <div class="flex space-x-4 mt-4">
                                                <x-button-link-neutral href="{{route('work.session.show', $work_session)}}" class="min-h-[38px]">
                                                    <i class="fa-solid fa-eye"></i>
                                                </x-button-link-neutral>
                                                @if($role == 'admin')
                                                <x-button-link-blue href="{{route('work.session.edit', $work_session)}}" class="min-h-[38px]">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </x-button-link-blue>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>

                        <ul id="list" class="grid w-full gap-y-4 block md:hidden">
                            @if ($work_sessions->isEmpty())
                            <x-empty-place />
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

                            @foreach ($work_sessions as $key => $work_session)
                            @php
                            // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                            $work_sessionMonth = \Carbon\Carbon::parse($work_session->issue_date)->month;

                            // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                            if ($work_sessionMonth !== $currentMonth) {
                            $currentMonth = $work_sessionMonth;
                            $monthName = $months[$work_sessionMonth];
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

                            <!-- Kod -->
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <div class="flex justify-start items-center w-full justify-start">
                                                @if($work_session->status == 'W trakcie pracy')
                                                <x-status-yellow class="text-xl">
                                                    {{ $work_session->status }}
                                                </x-status-yellow>
                                                @endif
                                                @if($work_session->status == 'Praca zakończona')
                                                <x-status-green class="text-xl">
                                                    {{ $work_session->status }}
                                                </x-status-green>
                                                @endif
                                            </div>
                                            @if($role == 'admin')
                                            <form action="{{route('work.session.delete', $work_session)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-button-red type="submit" class="min-h-[38px]">
                                                    <i class="fa-solid fa-trash"></i>
                                                </x-button-red>
                                            </form>
                                            @endif
                                        </div>
                                        <x-paragraf-display class="text-xl">
                                            {{ $work_session->time_in_work }}
                                        </x-paragraf-display>
                                        @if($work_session->status == 'Praca zakończona')
                                        <div class="text-sm text-gray-400 dark:text-gray-300 flex justify-start w-full my-2 gap-x-4">
                                            @if($work_session->start_day_of_week != $work_session->end_day_of_week)
                                            <div class="flex flex-col">
                                                <x-label-display>
                                                    Od
                                                </x-label-display>
                                                <x-paragraf-display class="text-xs">
                                                    {{ $work_session->start_day_of_week }}
                                                </x-paragraf-display>
                                            </div>
                                            <div class="flex flex-col">
                                                <x-label-display>
                                                    Do
                                                </x-label-display>
                                                <x-paragraf-display class="text-xs">
                                                    {{ $work_session->end_day_of_week }}
                                                </x-paragraf-display>
                                            </div>
                                            @else
                                            <div class="flex flex-col">
                                                <x-paragraf-display class="text-xs">
                                                    {{ $work_session->end_day_of_week }}
                                                </x-paragraf-display>
                                            </div>
                                            @endif
                                        </div>
                                        @else
                                        <div class="text-sm text-gray-400 dark:text-gray-100 flex w-full my-2">
                                            <div class="flex flex-col">
                                                <x-label-display>
                                                    Od
                                                </x-label-display>
                                                <x-paragraf-display class="text-xs">
                                                    {{$work_session->start_time}}
                                                </x-paragraf-display>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                            <div class="flex flex-col">
                                                {{$work_session->user->name}}
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                            <div class="flex flex-col">
                                                {{$work_session->company->name}}
                                            </div>
                                        </div>
                                        <div class="flex space-x-4 mt-4">
                                            <x-button-link-neutral href="{{route('work.session.show', $work_session)}}" class="min-h-[38px]">
                                                <i class="fa-solid fa-eye"></i>
                                            </x-button-link-neutral>
                                            @if($role == 'admin')
                                            <x-button-link-blue href="{{route('work.session.edit', $work_session)}}" class="min-h-[38px]">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </x-button-link-blue>
                                            @endif
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
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Czas w pracy
                                    </th>
                                    @if($role == 'admin')
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Użytkownik
                                    </th>
                                    @else
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Dzień tygodnia
                                    </th>
                                    @endif
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Podgląd
                                    </th>
                                    @if($role == 'admin')
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Edycja
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Usuwanie
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($work_sessions->isEmpty())
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="8" class="px-3 py-2">
                                        <x-empty-place />
                                    </td>
                                </tr>
                                @else
                                @php
                                $current_month = null;
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

                                @foreach ($work_sessions as $work_session)

                                @php
                                $work_session_month = \Carbon\Carbon::parse($work_session->start_time)->month;
                                if ($work_session_month !== $current_month) {
                                $current_month = $work_session_month;
                                $monthName = $months[$work_session_month];
                                @endphp

                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-3 py-2">
                                        <x-flex-center>
                                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">{{ $monthName }}</h2>
                                            <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                        </x-flex-center>
                                    </td>
                                    <td colspan="7" class="px-3 py-2">

                                    </td>
                                </tr>

                                @php
                                }
                                @endphp

                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                    <td class="px-3 py-2 text-sm min-w-32">
                                        @if($work_session->status == 'W trakcie pracy')
                                        <x-status-yellow class="text-xs">
                                            {{ $work_session->status }}
                                        </x-status-yellow>
                                        @endif
                                        @if($work_session->status == 'Praca zakończona')
                                        <x-status-green class="text-xs">
                                            {{ $work_session->status }}
                                        </x-status-green>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                        <x-paragraf-display class="text-xl">
                                            {{ $work_session->time_in_work }}
                                        </x-paragraf-display>
                                    </td>
                                    @if($work_session->status == 'Praca zakończona')
                                    <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                        @if($work_session->start_day_of_week != $work_session->end_day_of_week)
                                        <div class="flex flex-col">
                                            <x-label-display>
                                                Od
                                            </x-label-display>
                                            <x-paragraf-display class="text-xs">
                                                {{ $work_session->start_day_of_week }}
                                            </x-paragraf-display>
                                        </div>
                                        <div class="flex flex-col">
                                            <x-label-display>
                                                Do
                                            </x-label-display>
                                            <x-paragraf-display class="text-xs">
                                                {{ $work_session->end_day_of_week }}
                                            </x-paragraf-display>
                                        </div>
                                        @else
                                        <x-paragraf-display class="text-xs">
                                            {{ $work_session->end_day_of_week }}
                                        </x-paragraf-display>
                                        @endif
                                    </td>
                                    @else
                                    @if($role == 'admin')
                                    <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                        <x-paragraf-display class="text-xs">
                                            {{$work_session->user->name}}
                                        </x-paragraf-display>
                                    </td>
                                    @else
                                    <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                        <x-paragraf-display class="text-xs">
                                            {{$work_session->start_day_of_week}}
                                        </x-paragraf-display>
                                    </td>
                                    @endif
                                    @endif
                                    <x-show-cell href="{{ route('work.session.show', $work_session) }}" />
                                    @if($role == 'admin')
                                    <x-edit-cell href="{{route('work.session.edit', $work_session)}}" />
                                    <x-delete-cell action="{{route('work.session.delete', $work_session)}}" />
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                        <!--Links-->
                        <div id="links" class="md:px-2 py-4">
                            {{ $work_sessions->links() }}
                        </div>
                        @else
                        @include('admin.elements.end_config')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>