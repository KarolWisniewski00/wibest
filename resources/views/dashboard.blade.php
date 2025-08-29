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
    <div class="p-4">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <!--HEADER-->
                    <x-container>
                        <x-h1-display class="text-center md:text-start">
                            👋 Cześć, {{auth()->user()->name}}!
                        </x-h1-display>
                    </x-container>
                    <!--HEADER-->
                    <x-container class="px-8">
                        <x-widget-display-nav class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 w-full">
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
                                <x-flex-center>
                                    <x-paragraf-display id="dateWidget" class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        <!-- Data -->
                                    </x-paragraf-display>
                                </x-flex-center>

                                <!-- Timer -->
                                <x-flex-center>
                                    <x-paragraf-display id="timerWidget" class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                                        00:00:00
                                    </x-paragraf-display>
                                </x-flex-center>

                                <x-flex-center>
                                    <x-paragraf-display id="locationWidget" class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                        LOKALIZACJA
                                    </x-paragraf-display>
                                </x-flex-center>
                            </div>


                            <!-- Prawa kolumna: Przyciski -->
                            <div class="flex flex-col justify-center items-center space-y-6">
                                <button
                                    id="startButtonWidget"
                                    class="whitespace-nowrap inline-flex items-center px-8 py-4 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-2xl md:text-4xl text-gray-900 dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-600 active:bg-green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-play mr-2"></i>Start
                                </button>
                                <!-- Przycisk Stop -->
                                <button
                                    id="stopButtonWidget"
                                    class="hidden whitespace-nowrap inline-flex items-center px-8 py-4 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-2xl md:text-4xl text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-stop mr-2"></i>Stop
                                </button>
                            </div>
                        </x-widget-display-nav>
                    </x-container>
                    <x-container>
                        <x-h1-display class="text-center md:text-start mb-4">
                            📅 Kalendarz - wnioski zaakceptowane
                        </x-h1-display>
                        <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium rounded-lg">
                            {{-- Nagłówki dni tygodnia --}}
                            @foreach (['Nd', 'Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'So'] as $day)
                            <div class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white py-2 text-center">
                                {{ $day }}
                            </div>
                            @endforeach
                            @foreach($dates as $date)
                            <div class="bg-white dark:bg-gray-900 h-28 relative p-2 border border-gray-200 dark:border-gray-800 flex flex-col md:flex-row h-full">
                                @if($date['date'] == \Carbon\Carbon::now()->format('d.m.y'))
                                    <div class="text-white bg-red-500 dark:bg-red-700 rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold">{{$date['day']}}</div>
                                @else
                                    <div class="text-gray-700 dark:text-white text-[11px] font-semibold">{{$date['day']}}</div>
                                @endif
                                @if($date['leave'] != null)
                                <div class="flex flex-col md:flex-row justify-center items-center h-full py-6 w-full">
                                    <div class="md:ms-2 text-xl md:text-4xl">{{ $icons[$date['leave']] ?? '' }}</div>
                                    <div class="flex flex-row gap-2 items-center">
                                        <span class="px-1 md:px-3 py-1 rounded-full text-xs md:text-xl w-fit font-semibold bg-pink-300 dark:bg-pink-400 text-gray-900 dark:text-gray-900 uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-500 focus:bg-pink-200 dark:focus:bg-pink-500 active:bg-pink-200 dark:active:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            {{ $shortType[$date['leave']] ?? '' }}
                                        </span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </x-container>
                    @if ($role == 'admin' || $role == 'menedżer')
                    <x-container>
                        <x-h1-display>
                            📝 Rzeczy do zrobienia — oczekujące wnioski
                        </x-h1-display>
                        <x-flex-center class="px-4 pb-4 flex flex-col">
                            <!--MOBILE VIEW-->
                            <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
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
                                            <div class="block w-full">
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
                                                <div class="text-start p-2 text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 text-xl">
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
                                                <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full p-2 justify-start">
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
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex space-x-4 p-2 mt-4">
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
                                <!-- PC VIEW -->
                                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 hidden lg:table">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                Zdjęcie
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                Użytkownik
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
                                                Akceptuj
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                Odrzuć
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
                                                @if($leave->user->profile_photo_url)
                                                <img src="{{ $leave->user->profile_photo_url }}" alt="{{ $leave->user->name }}" class="w-10 h-10 rounded-full">
                                                @else
                                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                                    {{ strtoupper(substr($leave->user->name, 0, 1)) }}
                                                </div>
                                                @endif
                                            </td>
                                            <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                                @if($leave->status == 'oczekujące' || $leave->status == 'odrzucone' || $leave->status == 'anulowane')
                                                <x-button-link-green href="{{ route('leave.pending.accept', $leave)}}" class="min-h-[38px]">
                                                    <i class="fa-solid fa-check"></i>
                                                </x-button-link-green>
                                                @endif
                                            </td>
                                            <td class="px-3 py-2">
                                                @if($leave->status == 'oczekujące' || $leave->status == 'zaakceptowane')
                                                <x-button-link-red href="{{ route('leave.pending.reject', $leave)}}" class="min-h-[38px]">
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
                    </x-container>
                    @else
                    <x-container>
                        <x-h1-display>
                            📋 Oczekujące wnioski
                        </x-h1-display>
                    </x-container>
                    <x-container>
                        <x-flex-center class="px-4 pb-4 flex flex-col">
                            @if ($leaves->isEmpty())
                            <x-empty-place />
                            @else
                            <ul class="grid w-full gap-6 md:grid-cols-2 lg:grid-cols-3">
                                @foreach ($leavesUser as $leave)
                                <li>
                                    <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-700 bg-white border-2 border-gray-200 rounded-xl shadow-md cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                        <div class="flex flex-row gap-2 justify-start items-center">
                                            <div class="text-4xl mx-2">{{ $icons[$leave->type] ?? '' }}</div>
                                            <div class="flex flex-col gap-2">
                                                <div class="text-lg font-semibold mb-1">{{ $leave->type }} @if($leave->status == 'oczekujące')
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
                                                </div>
                                                <div class="flex flex-row gap-4 items-center">
                                                    <span class="px-3 py-1 rounded-full text-sm w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                        {{ $shortType[$leave->type] ?? '' }}
                                                    </span>
                                                    <span class="text-xs text-gray-400">{{$leave->start_date}} - {{$leave->end_date}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </x-flex-center>
                    </x-container>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="lat" value="">
    <input type="hidden" id="lon" value="">
    <script>
        $(document).ready(function() {
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    $('#locationWidget').text("Geolokalizacja nie jest wspierana przez tę przeglądarkę.");
                }
            }

            function showPosition(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                const acc = position.coords.accuracy;

                $('#locationWidget').text(
                    "Szerokość: " + lat + "\nDługość: " + lon + "\nDokładność: " + Math.round(acc) + " metrów"
                );
                $('#lat').val(lat);
                $('#lon').val(lon);
            }

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        $('#locationWidget').text("Użytkownik odmówił dostępu do lokalizacji.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        $('#locationWidget').text("Informacje o lokalizacji są niedostępne.");
                        break;
                    case error.TIMEOUT:
                        $('#locationWidget').text("Przekroczono czas oczekiwania na lokalizację.");
                        break;
                    case error.UNKNOWN_ERROR:
                        $('#locationWidget').text("Wystąpił nieznany błąd.");
                        break;
                }
            }

            getLocation();
            class WorkSessions {
                constructor() {
                    const self = this;
                    self.timerInterval = null; // Zmienna do przechowywania interwału
                    self.elapsedSeconds = 0; // Licznik sekund
                    self.workStart = $('#work_start').val(); // Adres do rozpoczęcia pracy
                    self.workStop = $('#work_stop').val(); // Adres do zakończenia pracy
                    self.workSessions = $('#work_sessions').val(); // Adres do sesji pracy
                    self.userId = $('#user_id').val(); // Id użytkownika
                    self.companyId = $('#company_id').val(); // Id firmy
                    self.session_id = null; // Id sesji
                    self.session_status = false; // Status sesji
                }
                // Funkcja do liczenia czasu
                counting() {
                    const self = this;
                    self.timerInterval = setInterval(() => {
                        self.elapsedSeconds++;
                        $('#timerWidget').text(self.formatTime(self.elapsedSeconds));
                    }, 1000);
                    $('#startButtonWidget').addClass('hidden');
                    $('#stopButtonWidget').removeClass('hidden');
                }

                // Funkcja do pobierania sesji pracy
                updateWidgetWorkSession() {
                    const self = this;
                    $.ajax({
                        url: self.workSessions + '/' + self.userId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.message === 'W trakcie pracy') {
                                self.session_id = response.work_session_id;
                                self.session_status = response.work_session_status;
                                const dateString = response.work_session_start_time;
                                const date = new Date(dateString.replace(" ", "T")); // Konwersja na format ISO 8601
                                const now = new Date(); // Aktualny czas
                                const diffInSeconds = Math.floor((now - date) / 1000);
                                self.elapsedSeconds = diffInSeconds;
                                self.counting();
                            }
                        },
                        error: function(xhr, status, error) {}
                    });
                }

                // Funkcja do rozpoczęcia pracy
                ajaxStart() {
                    const self = this;
                    const lat = $('#lat').val();
                    const lon = $('#lon').val();
                    $.ajax({
                        url: self.workStart + '/' + self.userId,
                        type: 'GET',
                        data: {
                            name: 'Widget',
                            lat: lat,
                            lon: lon
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(self.workStart + '/' + self.userId)
                            self.session_id = response.work_session_id;
                            console.log(response)
                        },
                        error: function(xhr, status, error) {}
                    });
                }

                // Funkcja do zakończenia pracy
                ajaxStop() {
                    const self = this;
                    const lat = $('#lat').val();
                    const lon = $('#lon').val();
                    $.ajax({
                        url: self.workStop + '/' + self.session_id,
                        type: 'GET',
                        data: {
                            name: 'Widget',
                            lat: lat,
                            lon: lon
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(self.workStop + '/' + self.session_id)
                            console.log(response)
                        },
                        error: function(xhr, status, error) {}
                    });
                }

                // Funkcja do aktualizacji daty
                updateTodayDate() {
                    const self = this;
                    const days = ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
                    const months = ["stycznia", "lutego", "marca", "kwietnia", "maja", "czerwca", "lipca", "sierpnia", "września", "października", "listopada", "grudnia"];
                    const today = new Date();
                    const formattedDate = `${days[today.getDay()]} ${today.getDate()} ${months[today.getMonth()]} ${today.getFullYear()}`;
                    $('#dateWidget').text(formattedDate);
                }

                // Funkcja do formatowania czasu
                formatTime(seconds) {
                    const self = this;
                    const hrs = String(Math.floor(seconds / 3600)).padStart(2, '0');
                    const mins = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
                    const secs = String(seconds % 60).padStart(2, '0');
                    return `${hrs}:${mins}:${secs}`;
                }

                // Funkcja do rozpoczęcia liczenia czasu
                startTimer() {
                    const self = this;
                    self.ajaxStart();
                    self.counting();
                }

                // Funka do zakończenia liczenia czasu
                stopTimer() {
                    const self = this;
                    self.ajaxStop();
                    clearInterval(self.timerInterval);
                    self.elapsedSeconds = 0;
                    $('#timerWidget').text(self.formatTime(self.elapsedSeconds));
                    $('#stopButtonWidget').addClass('hidden');
                    $('#startButtonWidget').removeClass('hidden');
                }

                // Funkcja do uruchomienia
                run() {
                    const self = this;
                    self.updateTodayDate();
                    self.updateWidgetWorkSession();

                    $('#startButtonWidget').click(function() {
                        self.startTimer();
                    });

                    $('#stopButtonWidget').click(function() {
                        self.stopTimer();
                    });
                }
            }

            // Main
            var workSessions = new WorkSessions();
            workSessions.run();
        });
    </script>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>