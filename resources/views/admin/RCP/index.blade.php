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
        <x-RCP.header>Rejestracja czasu pracy</x-RCP.header>
        <x-status-cello id="show-filter" class="mx-2 mt-8 ">
            {{ $startDate }} - {{ $endDate }}
        </x-status-cello>
        <!--CONTENT-->
        <x-flex-center class="px-4 pb-4 flex flex-col">
            <!--MOBILE VIEW-->
            <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
                <ul id="list" class="grid w-full gap-y-4 block lg:hidden">
                    <!-- EMPTY PLACE -->
                    @if ($work_sessions->isEmpty())
                    <x-empty-place />
                    @else
                    <!-- EMPTY PLACE -->
                    @foreach ($work_sessions as $key => $work_session)
                    <!-- WORK SESSIONS ELEMENT VIEW -->
                    <li>
                        <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                            <div class="block w-full">
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start items-center w-full justify-start">
                                        <x-RCP.work-session-status :work_session="$work_session" class="text-xl" />
                                    </div>
                                </div>
                                <div class="text-start p-2 text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xl">
                                    @if($work_session->status == 'Praca zakończona')
                                    {{ $work_session->time_in_work }}
                                    @endif
                                </div>
                                <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                    <div class="flex flex-col">
                                        {{$work_session->user->name}}
                                    </div>
                                </div>
                                <div class="flex space-x-4 mt-4">
                                    <x-button-link-neutral href="{{route('rcp.work-session.show', $work_session)}}" class="min-h-[38px]">
                                        <i class="fa-solid fa-eye"></i>
                                    </x-button-link-neutral>
                                    @if($role == 'admin')
                                    @if($work_session->status == 'Praca zakończona')
                                    <x-button-link-blue href="{{route('rcp.work-session.edit', $work_session)}}" class="min-h-[38px]">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </x-button-link-blue>
                                    @endif
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
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden lg:table">
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
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Czas w pracy
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Podgląd
                            </th>
                        </tr>
                    </thead>
                    <tbody id="work-sessions-body">
                        @if ($work_sessions->isEmpty())
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="8" class="px-3 py-2">
                                <x-empty-place />
                            </td>
                        </tr>
                        @else
                        @foreach ($work_sessions as $work_session)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                            <td class="px-3 py-2">
                                <x-flex-center>
                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="{{ $work_session->id }}">
                                </x-flex-center>
                            </td>
                            <td class="px-3 py-2 flex items-center justify-center">
                                @if($work_session->user->profile_photo_url)
                                <img src="{{ $work_session->user->profile_photo_url }}" alt="{{ $work_session->user->name }}" class="w-10 h-10 rounded-full">
                                @else
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                    {{ strtoupper(substr($work_session->user->name, 0, 1)) }}
                                </div>
                                @endif
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$work_session->user->name}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 text-sm ">
                                <x-RCP.work-session-status :work_session="$work_session" class="text-xs" />
                            </td>
                            <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
                                @if($work_session->status == 'Praca zakończona')
                                {{ $work_session->time_in_work }}
                                @endif
                            </td>
                            <x-show-cell href="{{ route('rcp.work-session.show', $work_session) }}" />
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                </table>
                <!-- PC VIEW -->
            </div>
        </x-flex-center>
        <!--CONTENT-->
        @php
        $file = 'RCP_' . $company->name . '_' . date('d.m.Y', strtotime($startDate)) . '_' . date('d.m.Y', strtotime($endDate)) . '.xlsx';
        @endphp
        <x-download :file="$file">
            {{ route('api.v1.rcp.work-session.export.xlsx') }}
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

                    $.get(`{{ route('api.v1.rcp.work-session.get') }}?page=${page}&start_date=${startDate}&end_date=${endDate}`, function(data) {
                        data.data.forEach(function(session) {
                            const row = `
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2">
                                    <x-flex-center>
                                        <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="${session.id}">
                                    </x-flex-center>
                                </td>
                                <td class="px-3 py-2  flex items-center justify-center">
                                    ${session.user.profile_photo_url
                                        ? `<img src="${session.user.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                        : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${session.user.name[0].toUpperCase()}</div>`
                                    }
                                </td>
                                <td class="px-3 py-2">
                                    <x-paragraf-display class="text-xs">
                                        ${session.user.name}
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 text-xs">
                                    ${session.status === 'W trakcie pracy' 
                                        ? `<x-status-yellow>${session.status}</x-status-yellow>` 
                                        : session.status === 'Praca zakończona' 
                                            ? `<x-status-green>${session.status}</x-status-green>` 
                                            : ''}
                                </td>
                                <td class="px-3 py-2 font-semibold text-xl text-gray-700 dark:text-gray-50">
                                    ${session.time_in_work ?? '-'}
                                </td>
                                <x-show-cell href="{{ route('rcp.work-session.show', '') }}/${session.id}" />
                            </tr>`;
                            const rowMobile = `
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <div class="flex justify-start items-center w-full justify-start">
                                                ${session.status === 'W trakcie pracy' 
                                                ? `<x-status-yellow class="text-xl">${session.status}</x-status-yellow>` 
                                                : session.status === 'Praca zakończona' 
                                                    ? `<x-status-green class="text-xl">${session.status}</x-status-green>` 
                                                    : ''}
                                            </div>
                                        </div>
                                        <div class="text-start p-2 text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xl">
                                            ${session.time_in_work ?? '-'}
                                        </div>
                                        <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                            <div class="flex flex-col">
                                                ${session.user.name}
                                            </div>
                                        </div>
                                        <div class="flex space-x-4 mt-4">
                                            <x-button-link-neutral href="{{ route('rcp.work-session.show', '') }}/${session.id}" class="min-h-[38px]">
                                                <i class="fa-solid fa-eye"></i>
                                            </x-button-link-neutral>
                                            @if($role == 'admin')
                                            ${session.status === 'W trakcie pracy' 
                                                ? `` 
                                                : session.status === 'Praca zakończona' 
                                                    ? `<x-button-link-blue href="{{ route('rcp.work-session.edit', '') }}/${session.id}" class="min-h-[38px]">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </x-button-link-blue>` 
                                                    : ''}
                                            @endif
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