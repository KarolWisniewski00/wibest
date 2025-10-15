<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <li class="group rounded-lg">
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg dark:text-white" aria-controls="role-dropdown" data-collapse-toggle="role-dropdown">
                <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Role</span>
                <i class="fa-solid fa-chevron-up"></i>
            </button>
            <ul id="role-dropdown">
                <li class="group rounded-lg my-2">
                    <label class="flex items-center w-full text-base text-gray-900 dark:text-white peer">
                        <input type="checkbox" class="hidden peer role-checkbox" value="admin" />
                        <span class="flex whitespace-nowrap peer-checked:bg-green-300 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 peer-checked:text-gray-900 w-full h-full px-3 px-3 py-1 rounded-full text-sm font-semibold uppercase tracking-widest focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Admin
                        </span>
                    </label>
                </li>
                <li class="group rounded-lg my-2">
                    <label class="flex items-center w-full text-base text-gray-900 dark:text-white peer">
                        <input type="checkbox" class="hidden peer role-checkbox" value="menedżer" />
                        <span class="flex whitespace-nowrap peer-checked:bg-blue-300 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 peer-checked:text-gray-900 w-full h-full px-3 px-3 py-1 rounded-full text-sm font-semibold uppercase tracking-widest focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Menadżer
                        </span>
                    </label>
                </li>
                <li class="group rounded-lg my-2">
                    <label class="flex items-center w-full text-base text-gray-900 dark:text-white peer">
                        <input type="checkbox" class="hidden peer role-checkbox" value="kierownik" />
                        <span class="flex whitespace-nowrap peer-checked:bg-yellow-300 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 peer-checked:text-gray-900 w-full h-full px-3 px-3 py-1 rounded-full text-sm font-semibold uppercase tracking-widest focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Kierownik
                        </span>
                    </label>
                </li>
                <li class="group rounded-lg my-2">
                    <label class="flex items-center w-full text-base text-gray-900 dark:text-white peer">
                        <input type="checkbox" class="hidden peer role-checkbox" value="użytkownik" />
                        <span class="flex whitespace-nowrap peer-checked:bg-gray-300 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 peer-checked:text-gray-900 w-full h-full px-3 px-3 py-1 rounded-full text-sm font-semibold uppercase tracking-widest focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Użytkownik
                        </span>
                    </label>
                </li>
            </ul>
            <script>
                $(document).ready(function() {
                    $('.role-checkbox').on('change', function() {
                        let roles = $('.role-checkbox:checked').map(function() {
                            return $(this).val();
                        }).get();
                        console.log('Zaznaczone role:', roles);
                        $('#show-filter').html(roles.length > 0 ? roles.join(', ') : 'WSZYSTKO');
                        if (roles.length > 0) {} else {
                            roles = ['admin', 'menedżer', 'kierownik', 'użytkownik', 'właściciel'];
                        }

                        $.ajax({
                            url: `{{ route('api.v1.team.user.set.role') }}`,
                            method: 'post',
                            data: {
                                _token: '{{ csrf_token() }}',
                                role_filter: roles
                            },
                            success: function(response) {
                                console.log('Odpowiedź:', response);
                                const $tbody = $('#work-sessions-body');
                                $tbody.empty(); // najpierw czyścimy poprzednie wiersze

                                response.forEach(user => {
                                    // generujemy każdy wiersz
                                    const row = `
                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                    <td class="px-3 py-2 hidden lg:table-cell">
                                        <x-flex-center>
                                            <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="${user.id}">
                                        </x-flex-center>
                                    </td>
                                    <td class="px-3 py-2  flex items-center justify-center">
                                        ${user.profile_photo_url
                                            ? `<img src="${user.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                            : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${user.name[0].toUpperCase()}</div>`
                                        }
                                    </td>
                                    <td class="px-3 py-2">
                                        <x-paragraf-display class="text-xs">
                                            ${user.name}
                                        </x-paragraf-display>
                                    </td>
                                    <td class="px-3 py-2">
                                    ${user.role == 'admin'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Admin
                                        </span>`
                                    : ``
                                    }
                                    ${user.role == 'menedżer'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Menedżer
                                        </span>`
                                    : ``
                                    }
                                    ${user.role == 'kierownik'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Kierownik
                                        </span>`
                                    : ``
                                    }
                                    ${user.role == 'użytkownik'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Użytkownik
                                        </span>`
                                    : ``
                                    }
                                    ${user.role == 'właściciel'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                            Właściciel
                                        </span>`
                                    : ``
                                    }
                                </td>
                                <td>
                                    ${(user.working_hours_custom != null && user.working_hours_from != null && user.working_hours_to != null && user.working_hours_start_day != null && user.working_hours_stop_day != null)
                                        ? ''
                                        : `<a href="{{ route('team.user.planing', '' )}}/${user.id}" class="text-xs text-center inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-200 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                            ⚠️Ustaw godziny pracy
                                        </a>`
                                    }
                                </td>
                                <x-show-cell href="{{route('team.user.show', '' )}}/${user.id}" />
                                </tr>`;
                                    $tbody.append(row);
                                    $(window).off('scroll');
                                });
                            },
                            error: function(xhr) {
                                console.error('Błąd:', xhr.responseText);
                            }
                        });
                    });
                });
            </script>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <x-main>
        <x-team.nav :role="$role" :invitations="$invitations" />
        <x-team.header>
            Mój zespół
        </x-team.header>
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            WSZYSTKO
        </x-status-cello>
        <x-flex-center class="px-4 pb-4">
            <div class="relative overflow-x-auto md:shadow rounded-lg w-full">
                <ul id="list" class="grid w-full gap-y-4 block md:hidden">
                    <!-- EMPTY PLACE -->
                    @if ($users->isEmpty())
                    <x-empty-place />
                    @else
                    <!-- EMPTY PLACE -->
                    @foreach ($users as $user)
                    <!-- WORK SESSIONS ELEMENT VIEW -->
                    <li>
                        <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                            <div class="block w-full">
                                <div class="text-sm text-gray-700 dark:text-gray-400 flex flex-col gap-4 w-full justify-start">
                                    <div class="flex items-center gap-4">
                                        @if($user->profile_photo_url)
                                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                                        @else
                                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        @endif
                                        <div>
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
                                        </div>
                                    </div>
                                    @if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
                                    @else
                                    <div class="flex items-center gap-4">
                                        <a href="{{ route('team.user.planing', $user->id) }}" class="text-xs text-center inline-flex items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-200 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                            ⚠️Ustaw godziny pracy
                                        </a>
                                    </div>
                                    @endif
                                    <div class="flex space-x-4">
                                        <x-button-link-neutral href="{{route('team.user.show', $user )}}" class="min-h-[38px]">
                                            <i class="fa-solid fa-eye"></i>
                                        </x-button-link-neutral>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- WORK SESSIONS ELEMENT VIEW -->
                    @endforeach
                    @endif
                </ul>
                <!-- WORK SESSIONS VIEW -->
                <table id="table" class="hidden w-full text-sm text-left text-gray-500 dark:text-gray-400 md:table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3 hidden lg:table-cell">
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
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Informacje
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Podgląd
                            </th>
                        </tr>
                    </thead>
                    <tbody id="work-sessions-body">
                        @if ($users->isEmpty())
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="8" class="px-3 py-2">
                                <div class="text-center py-8">
                                    <img src="{{ asset('empty.svg') }}" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                    <p class="text-gray-500 dark:text-gray-400">Brak danych do wyświetlenia.</p>
                                </div>
                            </td>
                        </tr>
                        @else
                        @foreach ($users as $user)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                            <td class="px-3 py-2 hidden lg:table-cell">
                                <x-flex-center>
                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="{{ $user->id }}">
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
                                <x-paragraf-display class="text-xs">
                                    {{$user->name}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2">
                                @if($user->role == 'admin')
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Admin
                                </span>
                                @elseif($user->role == 'menedżer')
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Menedżer
                                </span>
                                @elseif($user->role == 'kierownik')
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Kierownik
                                </span>
                                @elseif($user->role == 'użytkownik')
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Użytkownik
                                </span>
                                @elseif($user->role == 'właściciel')
                                <span class="px-3 py-1 rounded-full text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                    Właściciel
                                </span>
                                @endif
                            </td>
                            <td>
                                @if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null)
                                @else
                                <a href="{{ route('team.user.planing', $user->id) }}" class="text-xs text-center inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-200 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                    ⚠️Ustaw godziny pracy
                                </a>
                                @endif
                            </td>
                            <x-show-cell href="{{route('team.user.show', $user )}}" />
                        </tr>
                        @endforeach

                        @endif
                    </tbody>
                    <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                </table>
            </div>
        </x-flex-center>
        @php
        $file = 'Użytkownicy_' . str_replace(' ', '_', $company->name);
        @endphp
        <x-download :file="$file">
            {{ route('api.v1.team.user.export.xlsx') }}
        </x-download>
        <script>
            $(document).ready(function() {
                let page = 2;
                let loading = false;
                const $body = $('#work-sessions-body');
                const $list = $('#list');
                const $loader = $('#loader');

                function loadMoreSessions() {
                    if (loading) return;
                    loading = true;
                    $loader.removeClass('hidden');

                    $.get(`{{ route('api.v1.team.user.get') }}?page=${page}`, function(data) {
                        data.data.forEach(function(session) {
                            const row = `
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2 hidden lg:table-cell">
                                    <x-flex-center>
                                        <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="${session.id}">
                                    </x-flex-center>
                                </td>
                                <td class="px-3 py-2  flex items-center justify-center">
                                    ${session.profile_photo_url
                                        ? `<img src="${session.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                        : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${session.name[0].toUpperCase()}</div>`
                                    }
                                </td>
                                <td class="px-3 py-2">
                                    <x-paragraf-display class="text-xs">
                                        ${session.name}
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2">
                                    ${session.role == 'admin'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Admin
                                        </span>`
                                    : ``
                                    }
                                    ${session.role == 'menedżer'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Menedżer
                                        </span>`
                                    : ``
                                    }
                                    ${session.role == 'kierownik'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Kierownik
                                        </span>`
                                    : ``
                                    }
                                    ${session.role == 'użytkownik'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Użytkownik
                                        </span>`
                                    : ``
                                    }
                                    ${session.role == 'właściciel'
                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                            Właściciel
                                        </span>`
                                    : ``
                                    }
                                </td>
                                <td>
                                    ${(session.working_hours_custom != null && session.working_hours_from != null && session.working_hours_to != null && session.working_hours_start_day != null && session.working_hours_stop_day != null)
                                        ? ''
                                        : `<a href="{{ route('team.user.planing', '' )}}/${session.id}" class="text-xs text-center inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-200 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                            ⚠️Ustaw godziny pracy
                                        </a>`
                                    }
                                </td>
                                <x-show-cell href="{{route('team.user.show', '' )}}/${session.id}" />
                            </tr>`;
                            const rowMobile = `
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="text-sm text-gray-700 dark:text-gray-400 flex flex-col gap-4 w-full justify-start">
                                            <div class="flex items-center gap-4">
                                                ${session.profile_photo_url
                                                    ? `<img src="${session.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                                    : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${session.name[0].toUpperCase()}</div>`
                                                }
                                                <div>
                                                    <div class="flex flex-col justify-center w-fit">
                                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                                            ${session.name}
                                                        </x-paragraf-display>
                                                    ${session.role == 'admin'
                                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                            Admin
                                                        </span>`
                                                    : ``
                                                    }
                                                    ${session.role == 'menedżer'
                                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                            Menedżer
                                                        </span>`
                                                    : ``
                                                    }
                                                    ${session.role == 'kierownik'
                                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                            Kierownik
                                                        </span>`
                                                    : ``
                                                    }
                                                    ${session.role == 'użytkownik'
                                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                            Użytkownik
                                                        </span>`
                                                    : ``
                                                    }
                                                    ${session.role == 'właściciel'
                                                    ? ` <span class="px-3 py-1 rounded-full text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                                            Właściciel
                                                        </span>`
                                                    : ``
                                                    }
                                                    </div>
                                                </div>
                                            </div>
                                            ${(session.working_hours_custom != null && session.working_hours_from != null && session.working_hours_to != null && session.working_hours_start_day != null && session.working_hours_stop_day != null)
                                                ? ''
                                                : `
                                                <div class="flex items-center gap-4">
                                                    <a href="{{ route('team.user.planing', '' )}}/${session.id}" class="text-xs text-center inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-200 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                                        ⚠️Ustaw godziny pracy
                                                    </a>
                                                </div>`
                                            }
                                            <div class="flex space-x-4">
                                                <x-button-link-neutral href="{{route('team.user.show', '' )}}/${session.id}" class="min-h-[38px]">
                                                    <i class="fa-solid fa-eye"></i>
                                                </x-button-link-neutral>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>`;
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
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>