<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    @php
    $shortType = ['wolne za pracę w święto' => 'WPS',
    'zwolnienie lekarskie' => 'ZL',
    'urlop wypoczynkowy' => 'UW',
    'urlop rodzicielski' => 'UR',
    'wolne za nadgodziny' => 'WN',
    'wolne za święto w sobotę' => 'WSS',
    'urlop bezpłatny' => 'UB',
    'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
    'zwolnienie lekarsie - opieka' => 'ZLO',
    'urlop okolicznościowy' => 'UO',
    'urlop wypoczynkowy "na żądanie"' => 'UWZ',
    'oddanie krwi' => 'OK',
    'urlop ojcowski' => 'UOJC',
    'urlop macieżyński' => 'UM',
    'świadczenie rehabilitacyjne' => 'SR',
    'opieka' => 'OP',
    'świadek w sądzie' => 'SWS',
    'praca zdalna' => 'PZ',
    'kwarantanna' => 'KW',
    'kwarantanna z pracą zdalną' => 'KWZPZ',
    'delegacja' => 'DEL'
    ];
    $icons = [
    'wolne za pracę w święto' => '🕊️',
    'zwolnienie lekarskie' => '🤒',
    'urlop wypoczynkowy' => '🏖️',
    'urlop rodzicielski' => '👶',
    'wolne za nadgodziny' => '⏰',
    'wolne za święto w sobotę' => '🗓️',
    'urlop bezpłatny' => '💸',
    'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
    'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
    'urlop okolicznościowy' => '🎉',
    'urlop wypoczynkowy "na żądanie"' => '📢',
    'oddanie krwi' => '🩸',
    'urlop ojcowski' => '👨‍👧',
    'urlop macieżyński' => '🤱',
    'świadczenie rehabilitacyjne' => '🦾',
    'opieka' => '🧑‍🍼',
    'świadek w sądzie' => '⚖️',
    'praca zdalna' => '💻',
    'kwarantanna' => '🦠',
    'kwarantanna z pracą zdalną' => '🏠💻',
    'delegacja' => '✈️',
    ];
    @endphp
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-date-filter />
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-leave.nav :role="$role" :leavePending="$leavePending" />
        <!--HEADER-->
        <x-leave.header>
            Moje wnioski
        </x-leave.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{ $startDate }} - {{ $endDate }}
        </x-status-cello>
        <!--CONTENT-->
        <x-flex-center class="px-4 pb-4 flex flex-col">
            <!--MOBILE VIEW-->
            <div class="relative overflow-x-auto md:shadow sm:rounded-lg w-full">
                <ul id="list" class="grid w-full gap-y-4 block lg:hidden">
                    <!-- EMPTY PLACE -->
                    @if ($leaves->isEmpty())
                    <x-empty-place />
                    @else
                    <!-- EMPTY PLACE -->
                    @foreach ($leaves as $key => $leave)
                    <!-- WORK SESSIONS ELEMENT VIEW -->
                    <li>
                        <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                            <div class="flex flex-col w-full gap-4">
                                <div class="flex justify-between w-full">
                                    <div class="flex justify-start items-center w-full justify-start">
                                        <x-paragraf-display class="text-xs">
                                            @if($leave->status == 'oczekujące')
                                            <x-status-yellow>
                                                {{ $leave->status }}
                                            </x-status-yellow>
                                            @elseif($leave->status == 'zaakceptowane')
                                            <x-status-green>
                                                {{ $leave->status }}
                                            </x-status-green>
                                            @elseif($leave->status == 'odrzucone')
                                            <x-status-red>
                                                {{ $leave->status }}
                                            </x-status-red>
                                            @elseif($leave->status == 'anulowane')
                                            <x-status-red>
                                                {{ $leave->status }}
                                            </x-status-red>
                                            @endif
                                        </x-paragraf-display>
                                    </div>
                                </div>
                                <div class="text-start text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xl">
                                    <x-paragraf-display class="text-xs">
                                        {{$leave->start_date}}
                                    </x-paragraf-display>
                                    <x-paragraf-display class="text-xs">
                                        {{$leave->end_date}}
                                    </x-paragraf-display>
                                    <div class="flex flex-row justify-center w-fit">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-3xl">
                                            {{ $icons[$leave->type] ?? '' }}
                                        </x-paragraf-display>
                                        <div class="flex flex-col justify-center w-fit">
                                            <x-paragraf-display class="font-semibold mb-1 w-fit">
                                                {{$leave->type}}
                                            </x-paragraf-display>
                                            <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                {{ $shortType[$leave->type] ?? '' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full justify-start">
                                    <div class="flex items-center gap-4">
                                        @if($leave->user->profile_photo_url)
                                        <img src="{{ $leave->user->profile_photo_url }}" alt="{{ $leave->user->name }}" class="w-10 h-10 rounded-full">
                                        @else
                                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                            {{ strtoupper(substr($leave->user->name, 0, 1)) }}
                                        </div>
                                        @endif
                                        <div>
                                            <div class="flex flex-col justify-center w-fit">
                                                <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                                    {{$leave->user->name}}
                                                </x-paragraf-display>
                                                @if($leave->user->role == 'admin')
                                                <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Admin
                                                </span>
                                                @elseif($leave->user->role == 'menedżer')
                                                <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Menedżer
                                                </span>
                                                @elseif($leave->user->role == 'kierownik')
                                                <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Kierownik
                                                </span>
                                                @elseif($leave->user->role == 'użytkownik')
                                                <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Użytkownik
                                                </span>
                                                @elseif($leave->user->role == 'właściciel')
                                                <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                                    Właściciel
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-4">
                                    <x-button-link-blue href="{{route('leave.single.edit', $leave)}}" class="min-h-[38px]">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </x-button-link-blue>
                                    @if($leave->status == 'oczekujące')
                                    <x-button-link-red href="{{ route('leave.pending.cancel', $leave)}}" class="min-h-[38px]">
                                        <i class="fa-solid fa-xmark"></i>
                                    </x-button-link-red>
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
                            <th scope="col" class="px-6 py-3 text-center">
                                Zdjęcie
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Przełożony
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Data od
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Data do
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Typ
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Edycja
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Anuluj
                            </th>
                        </tr>
                    </thead>
                    <tbody id="work-sessions-body">
                        @if ($leaves->isEmpty())
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="8" class="px-3 py-2">
                                <x-empty-place />
                            </td>
                        </tr>
                        @else
                        @foreach ($leaves as $leave)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                            <td class="px-3 py-2 flex items-center justify-center">
                                @if($leave->manager->profile_photo_url)
                                <img src="{{ $leave->manager->profile_photo_url }}" alt="{{ $leave->manager->name }}" class="w-10 h-10 rounded-full">
                                @else
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                    {{ strtoupper(substr($leave->manager->name, 0, 1)) }}
                                </div>
                                @endif
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <div class="flex flex-col justify-center w-fit">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                        {{$leave->manager->name}}
                                    </x-paragraf-display>
                                    @if($leave->manager->role == 'admin')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Admin
                                    </span>
                                    @elseif($leave->manager->role == 'menedżer')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Menedżer
                                    </span>
                                    @elseif($leave->manager->role == 'kierownik')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Kierownik
                                    </span>
                                    @elseif($leave->manager->role == 'użytkownik')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Użytkownik
                                    </span>
                                    @elseif($leave->manager->role == 'właściciel')
                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                        Właściciel
                                    </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$leave->start_date}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    {{$leave->end_date}}
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                <x-paragraf-display class="text-xs">
                                    @if($leave->status == 'oczekujące')
                                    <x-status-yellow>
                                        {{ $leave->status }}
                                    </x-status-yellow>
                                    @elseif($leave->status == 'zaakceptowane')
                                    <x-status-green>
                                        {{ $leave->status }}
                                    </x-status-green>
                                    @elseif($leave->status == 'odrzucone')
                                    <x-status-red>
                                        {{ $leave->status }}
                                    </x-status-red>
                                    @elseif($leave->status == 'anulowane')
                                    <x-status-red>
                                        {{ $leave->status }}
                                    </x-status-red>
                                    @endif
                                </x-paragraf-display>
                            </td>
                            <td class="px-3 py-2 font-semibold text-gray-700 dark:text-gray-50 text-start">
                                <div class="flex flex-row justify-center w-fit">
                                    <x-paragraf-display class="font-semibold mb-1 w-fit text-3xl">
                                        {{ $icons[$leave->type] ?? '' }}
                                    </x-paragraf-display>
                                    <div class="flex flex-col justify-center w-fit">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit">
                                            {{$leave->type}}
                                        </x-paragraf-display>
                                        <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            {{ $shortType[$leave->type] ?? '' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-2">
                                <x-button-link-blue href="{{route('leave.single.edit', $leave)}}" class="min-h-[38px]">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </x-button-link-blue>
                            </td>
                            <td class="px-3 py-2">
                                @if($leave->status == 'oczekujące')
                                <x-button-link-red href="{{ route('leave.pending.cancel', $leave)}}" class="min-h-[38px]">
                                    <i class="fa-solid fa-xmark"></i>
                                </x-button-link-red>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                </table>
            </div>
        </x-flex-center>
        <!--CONTENT-->
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
        <script>
            $(document).ready(function() {
                let page = 2;
                let loading = false;
                const $body = $('#work-sessions-body');
                const $loader = $('#loader');
                const $list = $('#list');
                const startDate = $('#start_date').val();
                const endDate = $('#end_date').val();

                function loadMoreSessions() {
                    if (loading) return;
                    loading = true;
                    $loader.removeClass('hidden');

                    $.get(`{{ route('api.v1.leave.single.get') }}?page=${page}&start_date=${startDate}&end_date=${endDate}`, function(data) {
                        data.data.forEach(function(leave) {
                            const shortType = {
                                'wolne za pracę w święto': 'WPS',
                                'zwolnienie lekarskie': 'ZL',
                                'urlop wypoczynkowy': 'UW',
                                'urlop rodzicielski': 'UR',
                                'wolne za nadgodziny': 'WN',
                                'wolne za święto w sobotę': 'WSS',
                                'urlop bezpłatny': 'UB',
                                'wolne z tytułu 5-dniowego tygodnia pracy': 'WT5',
                                'zwolnienie lekarsie - opieka': 'ZLO',
                                'urlop okolicznościowy': 'UO',
                                'urlop wypoczynkowy "na żądanie"': 'UWZ',
                                'oddanie krwi': 'OK',
                                'urlop ojcowski': 'UOJC',
                                'urlop macieżyński': 'UM',
                                'świadczenie rehabilitacyjne': 'SR',
                                'opieka': 'OP',
                                'świadek w sądzie': 'SWS',
                                'praca zdalna': 'PZ',
                                'kwarantanna': 'KW',
                                'kwarantanna z pracą zdalną': 'KWZPZ',
                                'delegacja': 'DEL'
                            };
                            const icons = {
                                'wolne za pracę w święto': '🕊️',
                                'zwolnienie lekarskie': '🤒',
                                'urlop wypoczynkowy': '🏖️',
                                'urlop rodzicielski': '👶',
                                'wolne za nadgodziny': '⏰',
                                'wolne za święto w sobotę': '🗓️',
                                'urlop bezpłatny': '💸',
                                'wolne z tytułu 5-dniowego tygodnia pracy': '📆',
                                'zwolnienie lekarsie - opieka': '🧑‍⚕️',
                                'urlop okolicznościowy': '🎉',
                                'urlop wypoczynkowy "na żądanie"': '📢',
                                'oddanie krwi': '🩸',
                                'urlop ojcowski': '👨‍👧',
                                'urlop macieżyński': '🤱',
                                'świadczenie rehabilitacyjne': '🦾',
                                'opieka': '🧑‍🍼',
                                'świadek w sądzie': '⚖️',
                                'praca zdalna': '💻',
                                'kwarantanna': '🦠',
                                'kwarantanna z pracą zdalną': '🏠💻',
                                'delegacja': '✈️',
                            };
                            const row = `
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2  flex items-center justify-center">
                                    ${leave.manager.profile_photo_url
                                        ? `<img src="${leave.manager.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                        : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${leave.manager.name[0].toUpperCase()}</div>`
                                    }
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <div class="flex flex-col justify-center w-fit">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                            ${leave.manager.name}
                                        </x-paragraf-display>
                                        ${leave.manager.role == 'admin'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Admin
                                            </span>`
                                        : ``
                                        }
                                        ${leave.manager.role == 'menedżer'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Menedżer
                                            </span>`
                                        : ``
                                        }
                                        ${leave.manager.role == 'kierownik'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Kierownik
                                            </span>`
                                        : ``
                                        }
                                        ${leave.manager.role == 'użytkownik'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Użytkownik
                                            </span>`
                                        : ``
                                        }
                                        ${leave.user.role == 'właściciel'
                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                                Właściciel
                                            </span>`
                                        : ``
                                        }
                                    </div>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="text-xs">
                                        ${leave.start_date}
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="text-xs">
                                        ${leave.end_date}
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                    <x-paragraf-display class="text-xs">
                                        ${leave.status == 'oczekujące'
                                        ? ` <x-status-yellow>
                                                ${leave.status}
                                            </x-status-yellow>`
                                        : ``
                                        }
                                        ${leave.status == 'zaakceptowane'
                                        ? ` <x-status-green>
                                                ${leave.status}
                                            </x-status-green>`
                                        : ``
                                        }
                                        ${leave.status == 'odrzucone'
                                        ? ` <x-status-red>
                                                ${leave.status}
                                            </x-status-red>`
                                        : ``
                                        }
                                        ${leave.status == 'anulowane'
                                        ? ` <x-status-red>
                                                ${leave.status}
                                            </x-status-red>`
                                        : ``
                                        }
                                    </x-paragraf-display>
                                </td>
                                <td class="px-3 py-2 font-semibold text-gray-700 dark:text-gray-50 text-start">
                                    <div class="flex flex-row justify-center w-fit">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-3xl">
                                            ${icons[leave.type] ?? '' }
                                        </x-paragraf-display>
                                        <div class="flex flex-col justify-center w-fit">
                                            <x-paragraf-display class="font-semibold mb-1 w-fit">
                                                ${leave.type}
                                            </x-paragraf-display>
                                            <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                ${shortType[leave.type] ?? '' }
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    <x-button-link-blue href="{{route('leave.single.edit', '')}}/${leave.id}" class="min-h-[38px]">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </x-button-link-blue>
                                </td>
                                ${leave.status == 'oczekujące'
                                ? ` <td class="px-3 py-2">
                                        <x-button-link-red href="{{ route('leave.pending.cancel', '')}}/${leave.id}" class="min-h-[38px]">
                                            <i class="fa-solid fa-xmark"></i>
                                        </x-button-link-red>
                                    </td>`
                                : ``
                                }
                            </tr>`;
                            const rowMobile = `
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="flex flex-col w-full gap-4">
                                        <div class="flex justify-between w-full">
                                            <div class="flex justify-start items-center w-full justify-start">
                                                <x-paragraf-display class="text-xs">
                                                    ${leave.status == 'oczekujące'
                                                    ? ` <x-status-yellow>
                                                            ${leave.status}
                                                        </x-status-yellow>`
                                                    : ``
                                                    }
                                                    ${leave.status == 'zaakceptowane'
                                                    ? ` <x-status-green>
                                                            ${leave.status}
                                                        </x-status-green>`
                                                    : ``
                                                    }
                                                    ${leave.status == 'odrzucone'
                                                    ? ` <x-status-red>
                                                            ${leave.status}
                                                        </x-status-red>`
                                                    : ``
                                                    }
                                                    ${leave.status == 'anulowane'
                                                    ? ` <x-status-red>
                                                            ${leave.status}
                                                        </x-status-red>`
                                                    : ``
                                                    }
                                                </x-paragraf-display>
                                            </div>
                                        </div>
                                        <div class="text-start text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xl">
                                            <x-paragraf-display class="text-xs">
                                                ${leave.start_date}
                                            </x-paragraf-display>
                                            <x-paragraf-display class="text-xs">
                                                ${leave.end_date}
                                            </x-paragraf-display>
                                            <div class="flex flex-row justify-center w-fit">
                                                <x-paragraf-display class="font-semibold mb-1 w-fit text-3xl">
                                                    ${icons[leave.type] ?? '' }
                                                </x-paragraf-display>
                                                <div class="flex flex-col justify-center w-fit">
                                                    <x-paragraf-display class="font-semibold mb-1 w-fit">
                                                        ${leave.type}
                                                    </x-paragraf-display>
                                                    <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                        ${shortType[leave.type] ?? '' }
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full justify-start">
                                            <div class="flex items-center gap-4">
                                                ${leave.user.profile_photo_url
                                                    ? `<img src="${leave.user.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                                    : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${session.user.name[0].toUpperCase()}</div>`
                                                }
                                                <div>
                                                    <div class="flex flex-col justify-center w-fit">
                                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                                            ${leave.user.name}
                                                        </x-paragraf-display>
                                                        ${leave.user.role == 'admin'
                                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                                Admin
                                                            </span>`
                                                        : ``
                                                        }
                                                        ${leave.user.role == 'menedżer'
                                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                                Menedżer
                                                            </span>`
                                                        : ``
                                                        }
                                                        ${leave.user.role == 'kierownik'
                                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                                Kierownik
                                                            </span>`
                                                        : ``
                                                        }
                                                        ${leave.user.role == 'użytkownik'
                                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                                Użytkownik
                                                            </span>`
                                                        : ``
                                                        }
                                                        ${leave.user.role == 'właściciel'
                                                        ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                                                Właściciel
                                                            </span>`
                                                        : ``
                                                        }
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex space-x-4">
                                            <x-button-link-blue href="{{route('leave.single.edit', '')}}/${leave.id}" class="min-h-[38px]">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </x-button-link-blue>
                                            ${leave.status == 'oczekujące'
                                            ? ` 
                                                <x-button-link-red href="{{ route('leave.pending.cancel', '')}}/${leave.id}" class="min-h-[38px]">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </x-button-link-red>
                                                `
                                            : ``
                                            }
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
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>