<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-date-filter />
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav />
        <x-RCP.header>Zdarzenia 📆</x-RCP.header>
        <x-status-cello id="show-filter" class="mx-2 mt-8 ">
            {{ $startDate }} - {{ $endDate }}
        </x-status-cello>

        <!--CONTENT-->
        <x-flex-center class="px-4 flex flex-col">
            <!--MOBILE VIEW-->
            <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
                @if ($company)
                <ul id="list" class="grid w-full gap-y-4 hidden">
                    <!-- EMPTY PLACE -->
                    @if ($events->isEmpty())
                    <x-empty-place />
                    @else
                    <!-- EMPTY PLACE -->

                    @foreach ($events as $key => $event)
                    <!-- WORK SESSIONS ELEMENT VIEW -->
                    <li>
                        <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                            <div class="block w-full">
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start items-center w-full justify-start">
                                        @if($event->status == 'W trakcie pracy')
                                        <x-status-yellow class="text-xl">
                                            {{ $event->status }}
                                        </x-status-yellow>
                                        @endif
                                        @if($event->status == 'Praca zakończona')
                                        <x-status-green class="text-xl">
                                            {{ $event->status }}
                                        </x-status-green>
                                        @endif
                                    </div>
                                    @if($role == 'admin')
                                    <form action="{{route('rcp.event.delete', $event)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-button-red type="submit" class="min-h-[38px]">
                                            <i class="fa-solid fa-trash"></i>
                                        </x-button-red>
                                    </form>
                                    @endif
                                </div>
                                <x-paragraf-display class="text-xl">
                                    @if($event->status == 'Praca zakończona')
                                    {{ $event->time_in_work }}
                                    @endif
                                </x-paragraf-display>
                                <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                    <div class="flex flex-col">
                                        {{$event->user->name}}
                                    </div>
                                </div>
                                <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                    <div class="flex flex-col">
                                        {{$event->company->name}}
                                    </div>
                                </div>
                                <div class="flex space-x-4 mt-4">
                                    <x-button-link-neutral href="{{route('rcp.event.show', $event)}}" class="min-h-[38px]">
                                        <i class="fa-solid fa-eye"></i>
                                    </x-button-link-neutral>
                                    @if($role == 'admin')
                                    <x-button-link-blue href="" class="min-h-[38px]">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </x-button-link-blue>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- WORK SESSIONS ELEMENT VIEW -->
                    @endforeach
                    @endif
                </ul>
                <!-- WORK SESSIONS VIEW -->

                <!-- PC VIEW -->
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <x-flex-center>
                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </x-flex-center>
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Zdjęcie
                            </th>
                            <th scope="col" class="px-6 py-3 text-start">
                                Imię i Nazwisko
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Zdarzenie
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Czas
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Podgląd
                            </th>
                        </tr>
                    </thead>
                    <tbody id="work-sessions-body">
                        @if ($events->isEmpty())
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="8" class="px-3 py-2">
                                <x-empty-place />
                            </td>
                        </tr>
                        @else
                        @foreach ($events as $event)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                            <td class="px-3 py-2">
                                <x-flex-center>
                                    <input data-id="{{ $event->id }}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </x-flex-center>
                            </td>
                            <td class="px-3 py-2 flex items-center justify-center">
                                @if($event->user->profile_photo_url)
                                <img src="{{ $event->user->profile_photo_url }}" alt="{{ $event->user->name }}" class="w-10 h-10 rounded-full">
                                @else
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                    {{ strtoupper(substr($event->user->name, 0, 1)) }}
                                </div>
                                @endif
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <div class="flex flex-col justify-center w-fit">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        {{$event->user->name}}
                                    </x-paragraf-display>
                                    @if($event->user->role == 'admin')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Admin
                                    </span>
                                    @elseif($event->user->role == 'menedżer')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Menedżer
                                    </span>
                                    @elseif($event->user->role == 'kierownik')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Kierownik
                                    </span>
                                    @elseif($event->user->role == 'użytkownik')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Użytkownik
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-2 text-sm min-w-32">
                                @if($event->event_type == 'stop')
                                <x-status-red>
                                    Stop
                                </x-status-red>
                                @endif
                                @if($event->event_type == 'start')
                                <x-status-green>
                                    Start
                                </x-status-green>
                                @endif
                            </td>
                            <td class="px-3 py-2 font-semibold text-xl min-w-32 text-gray-700 dark:text-gray-50">
                                {{ $event->time }}
                            </td>
                            <x-show-cell href="{{ route('rcp.event.show', $event) }}" />
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                </table>
                <!-- PC VIEW -->
                @else
                @include('admin.elements.end_config')
                @endif
            </div>
        </x-flex-center>
        <!--CONTENT-->
        @php
        $file = 'Zdarzenia_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
        @endphp
        <x-download :file="$file">
            {{ route('api.v1.rcp.event.export.xlsx') }}
        </x-download>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
        <script>
            $(document).ready(function() {
                let page = 2;
                let loading = false;
                const $body = $('#work-sessions-body');
                const $list = $('#list');
                const $loader = $('#loader');
                const startDate = $('#start_date').val();
                const endDate = $('#end_date').val();

                function loadMoreSessions() {
                    if (loading) return;
                    loading = true;
                    $loader.removeClass('hidden');

                    $.get(`{{ route('api.v1.rcp.event.get') }}?page=${page}&start_date=${startDate}&end_date=${endDate}`, function(data) {
                        data.data.forEach(function(event) {
                            const row = `
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2">
                                    <x-flex-center>
                                        <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="${event.id}">
                                    </x-flex-center>
                                </td>
                                <td class="px-3 py-2  flex items-center justify-center">
                                    ${event.user.profile_photo_url
                                        ? `<img src="${event.user.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                        : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${event.user.name[0].toUpperCase()}</div>`
                                    }
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <div class="flex flex-col justify-center w-fit">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                            ${event.user.name}
                                        </x-paragraf-display>
                                        ${event.user.role == 'admin'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Admin
                                            </span>`
                                        : ``
                                        }
                                        ${event.user.role == 'menedżer'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Menedżer
                                            </span>`
                                        : ``
                                        }
                                        ${event.user.role == 'kierownik'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Kierownik
                                            </span>`
                                        : ``
                                        }
                                        ${event.user.role == 'użytkownik'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Użytkownik
                                            </span>`
                                        : ``
                                        }
                                    </div>
                                </td>
                                <td class="px-3 py-2 text-xs">
                                    ${event.event_type === 'stop' 
                                        ? `<x-status-red>${event.event_type}</x-status-red>` 
                                        : event.event_type === 'start' 
                                            ? `<x-status-green>${event.event_type}</x-status-green>` 
                                            : ''}
                                </td>
                                <td class="px-3 py-2 font-semibold text-xl min-w-32 text-gray-700 dark:text-gray-50">
                                    ${event.time ?? '-'}
                                </td>
                                <x-show-cell href="{{ route('rcp.event.show', '') }}/${event.id}" />
                            </tr>`;
                            const rowMobile = `
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <div class="flex justify-start items-center w-full justify-start">
                                                ${event.status === 'W trakcie pracy' 
                                                ? `<x-status-yellow class="text-xl">${event.status}</x-status-yellow>` 
                                                : event.status === 'Praca zakończona' 
                                                    ? `<x-status-green class="text-xl">${event.status}</x-status-green>` 
                                                    : ''}
                                            </div>
                                        </div>
                                        <div class="text-start p-2 text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xl">
                                            ${event.time ?? '-'}
                                        </div>
                                        <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                            <div class="flex flex-col">
                                                ${event.user.name}
                                            </div>
                                        </div>
                                        <div class="flex space-x-4 mt-4">
                                            <x-button-link-neutral href="{{ route('rcp.event.show', '') }}/${event.id}" class="min-h-[38px]">
                                                <i class="fa-solid fa-eye"></i>
                                            </x-button-link-neutral>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            `;
                            $list.append(rowMobile);
                            $body.append(row);
                        });

                        if (data.next_page_url) {
                            page++;
                            loading = false;
                        } else {
                            $(window).off('scroll'); // koniec danych
                        }

                        $loader.addClass('hidden');
                    });
                }

                // Event scroll
                $(window).on('scroll', function() {
                    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                        loadMoreSessions();
                    }
                });

                loadMoreSessions(); // wczytaj pierwszą stronę
            });
        </script>
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>