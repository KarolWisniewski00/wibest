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
        <x-RCP.header>Zdarzenia</x-RCP.header>
        <x-status-cello id="show-filter" class="mx-2 mt-8 ">
            {{ $startDate }} - {{ $endDate }}
        </x-status-cello>

        <!--CONTENT-->
        <x-flex-center class="px-4 flex flex-col">
            <!--MOBILE VIEW-->
            <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
                @if ($company)
                <ul id="list" class="grid w-full gap-y-4 block md:hidden">
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
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
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
                            <th scope="col" class="px-6 py-3 text-center">
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
                            <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$event->user->name}}
                                </x-paragraf-display>
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
        <script>
            $(document).ready(function() {
                const $table = $('#table');
                const $masterCheckbox = $table.find('thead input[type="checkbox"]');
                const $label = $('#selected-count');

                function getCheckboxes() {
                    return $table.find('tbody input[type="checkbox"]');
                }

                function updateSelectedCount() {
                    const $checkboxes = getCheckboxes();
                    const count = $checkboxes.filter(':checked').length;

                    // Dopasowanie końcówki do liczby
                    let suffix = 'ych';
                    if (count === 1) suffix = 'y';
                    else if (count >= 2 && count <= 4) suffix = 'e';

                    $label.html(`${count} zaznaczon${suffix}`);
                }

                // Delegacja zdarzeń – działa też na przyszłe checkboxy
                $table.on('change', 'tbody input[type="checkbox"]', function() {
                    updateSelectedCount();

                    const $checkboxes = getCheckboxes();
                    if (!$(this).prop('checked')) {
                        $masterCheckbox.prop('checked', false);
                    } else if ($checkboxes.length === $checkboxes.filter(':checked').length) {
                        $masterCheckbox.prop('checked', true);
                    }
                });

                // Master checkbox – zaznacz/odznacz wszystkie
                $masterCheckbox.on('change', function() {
                    const isChecked = $(this).prop('checked');
                    const $checkboxes = getCheckboxes();
                    $checkboxes.prop('checked', isChecked);
                    updateSelectedCount();
                });

                updateSelectedCount(); // W razie odświeżenia
            });

            // Pobieranie sesji pracy w formacie XLSX
            $('#download-xlsx').on('click', function() {
                const ids = [];

                $('#table tbody input[type="checkbox"]:checked').each(function() {
                    const id = $(this).data('id');
                    if (id) {
                        ids.push(id);
                    }
                });

                if (ids.length === 0) {
                    alert('Zaznacz przynajmniej jedno wydarzenie.');
                    return;
                }

                // Wysyłamy do API
                $.ajax({
                    url: "{{ route('api.v1.rcp.event.export.xlsx') }}",
                    method: 'POST',
                    data: JSON.stringify({
                        _token: '{{ csrf_token() }}',
                        ids: ids
                    }),
                    contentType: 'application/json',
                    xhrFields: {
                        responseType: 'blob' // ważne: bo XLSX to plik
                    },
                    success: function(data, status, xhr) {
                        const blob = new Blob([data], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });
                        const link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'events.xlsx';
                        link.click();
                    },
                    error: function() {
                        alert('Błąd przy generowaniu pliku.');
                    }
                });
            });
        </script>
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
                                        : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${session.user.name[0].toUpperCase()}</div>`
                                    }
                                </td>
                                <td class="px-3 py-2">
                                    <x-paragraf-display class="text-xs">
                                        ${event.user.name}
                                    </x-paragraf-display>
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