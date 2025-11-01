<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-date-filter />
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-raport.nav />
        <!--HEADER-->
        <x-raport.header>
            Ewidencja czasu pracy
        </x-raport.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mx-4 mb-4 md:m-4">
            {{$startDate}} - {{$endDate}}
        </x-status-cello>
        <x-flex-center class="px-4 pb-4 flex flex-col">
            <div class="relative overflow-x-auto md:shadow rounded-lg w-full">

                <table id="table" class="w-full text-sm text-center text-gray-500 dark:text-gray-400 table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr id="table-head">
                            <th scope="col" class="px-2 py-3 hidden md:table-cell">

                            </th>
                            <th scope="col" class="px-2 py-3">
                                Zdjęcie
                            </th>
                            <th scope="col" class="px-2 py-3 text-left">
                                Imię i Nazwisko
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Zaplanowany czas pracy
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Wnioski + Czas pracy
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Czas pracy
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Nadgodziny
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Brak normy
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Wnioski
                            </th>
                        </tr>
                    </thead>
                    <tbody id="work-sessions-body">
                        @foreach ($users as $user)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <td class="px-2 py-2 hidden md:table-cell">
                                <x-flex-center>
                                    <input data-id="{{$user->id}}" data-name="{{$user->name}}" name="radio" type="radio" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </x-flex-center>
                            </td>
                            <td class="px-3 py-2 flex items-center justify-center">
                                @if($user->profile_photo_url)
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                                @else
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                @endif
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <div class="flex flex-col justify-center w-fit">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        {{$user->name}}
                                    </x-paragraf-display>
                                    @if($user->role == 'admin')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Admin
                                    </span>
                                    @elseif($user->role == 'menedżer')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Menedżer
                                    </span>
                                    @elseif($user->role == 'kierownik')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Kierownik
                                    </span>
                                    @elseif($user->role == 'użytkownik')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Użytkownik
                                    </span>
                                    @elseif($user->role == 'właściciel')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                        Właściciel
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                    <span class="text-gray-400">
                                        @if($user->time_in_work_hms_planned != '00h')
                                        {{$user->time_in_work_hms_planned}}
                                        @else
                                        <a href="{{ route('team.user.planing', $user->id) }}" class="text-xs text-center inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-200 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                            ⚠️Ustaw godziny pracy
                                        </a>
                                        @endif
                                    </span>
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                    <span class="text-gray-400">
                                        @if($user->time_in_work_hms_total != '00h')
                                        {{$user->time_in_work_hms_total}}
                                        @endif
                                    </span>
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                    <span class="text-gray-400">
                                        @if($user->time_in_work_hms != '00h 00min 00s')
                                        {{$user->time_in_work_hms}}
                                        @endif
                                    </span>
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                    <span class="text-gray-400">
                                        @if($user->time_in_work_hms_extra != '00h 00min 00s')
                                        {{$user->time_in_work_hms_extra}}
                                        @endif
                                    </span>
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                    <span class="text-gray-400">
                                        @if($user->time_in_work_hms_under != '00h 00min 00s')
                                        {{$user->time_in_work_hms_under}}
                                        @endif
                                    </span>
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                    <span class="text-gray-400">
                                        @if($user->time_in_work_hms_leave != '00h')
                                        {{$user->time_in_work_hms_leave}}
                                        @endif
                                    </span>
                                </x-paragraf-display>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                </table>
            </div>
        </x-flex-center>
        @php
        $file = 'ewidencja_czasu_pracy_' . '_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
        @endphp
        <x-download-pdf :file="$file">
            {{ route('api.v1.raport.attendance-sheet.export.xlsx') }}
        </x-download-pdf>
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

                    $.get(`{{ route('api.v1.raport.attendance-sheet.get') }}?page=${page}&start_date=${startDate}&end_date=${endDate}`, function(data) {
                        data.data.forEach(function(user) {
                            let cells = '';
                            const start = new Date(startDate);
                            const end = new Date(endDate);
                            const row = `
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-2 py-2 hidden md:table-cell">
                                    <x-flex-center>
                                        <input name="radio" type="radio" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="${user.id}">
                                    </x-flex-center>
                                </td>
                                <td class="px-3 py-2  flex items-center justify-center">
                                    ${user.profile_photo_url
                                        ? `<img src="${user.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                        : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${user.name[0].toUpperCase()}</div>`
                                    }
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <div class="flex flex-col justify-center w-fit">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                            ${user.name}
                                        </x-paragraf-display>
                                        ${user.role == 'admin'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Admin
                                            </span>`
                                        : ``
                                        }
                                        ${user.role == 'menedżer'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Menedżer
                                            </span>`
                                        : ``
                                        }
                                        ${user.role == 'kierownik'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Kierownik
                                            </span>`
                                        : ``
                                        }
                                        ${user.role == 'użytkownik'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Użytkownik
                                            </span>`
                                        : ``
                                        }
                                        ${user.role == 'właściciel'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                                Właściciel
                                            </span>`
                                        : ``
                                        }
                                    </div>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        <span class="text-gray-400">
                                            ${user.time_in_work_hms_planned != '00h'
                                            ? user.time_in_work_hms_planned
                                            :  `<a href="{{ route('team.user.planing', '') }}/${user.id}" class="text-xs text-center inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-200 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                                    ⚠️Ustaw godziny pracy
                                                </a>`
                                            }
                                        </span>
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        <span class="text-gray-400">
                                            ${user.time_in_work_hms_total != '00h'
                                            ? user.time_in_work_hms_total
                                            : ``
                                            }
                                        </span>
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        <span class="text-gray-400">
                                            ${user.time_in_work_hms != '00h 00min 00s'
                                            ? user.time_in_work_hms
                                            : ``
                                            }
                                        </span>
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        <span class="text-gray-400">
                                            ${user.time_in_work_hms_extra != '00h 00min 00s'
                                            ? user.time_in_work_hms_extra
                                            : ``
                                            }
                                        </span>
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        <span class="text-gray-400">
                                            ${user.time_in_work_hms_under != '00h 00min 00s'
                                            ? user.time_in_work_hms_under
                                            : ``
                                            }
                                        </span>
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        <span class="text-gray-400">
                                            ${user.time_in_work_hms_leave != '00h'
                                            ? user.time_in_work_hms_leave
                                            : ``
                                            }
                                        </span>
                                    </x-paragraf-display>
                                </td>
                            </tr>`;
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
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>