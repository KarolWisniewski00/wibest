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
            Lista obecności
        </x-raport.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mx-2 mt-8 ">
            {{ $startDate }} - {{ $endDate }}
        </x-status-cello>

        <x-flex-center class="px-4 pb-4 flex flex-col">
            <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">

                <table id="table" class="w-full text-sm text-center text-gray-500 dark:text-gray-400 table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr id="table-head">
                            <th scope="col" class="px-2 py-3 hidden lg:table-cell">
                                <x-flex-center>
                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </x-flex-center>
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Zdjęcie
                            </th>
                            <th scope="col" class="px-2 py-3 text-left">
                                Imię i Nazwisko
                            </th>
                            @foreach ($dates as $date)
                            <th scope="col" class="px-2 py-3 date-column">
                                {{ $date }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody id="work-sessions-body">
                        @foreach ($users as $user)
                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <td class="px-2 py-2 hidden lg:table-cell">
                                <x-flex-center>
                                    <input data-id="{{$user->id}}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </x-flex-center>
                            </td>
                            <td class="px-2 py-2 flex items-center justify-center gap-2">
                                @if($user->profile_photo_url)
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                                @else
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                @endif
                            </td>
                            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 text-left">
                                <x-paragraf-display class="text-xs">
                                    {{$user->name}}
                                </x-paragraf-display>
                            </td>
                            @foreach ($user->dates as $date)
                            @if ($date == 1)
                            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-900 bg-green-300 dark:bg-green-300 border-x border-gray-200 dark:border-gray-700">
                                <i class="fa-solid fa-sun"></i>
                            </td>
                            @elseif($date == 0.5)
                            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-900 bg-green-200 dark:bg-green-200 border-x border-gray-200 dark:border-gray-700">
                                <i class="fa-solid fa-moon"></i>
                            </td>
                            @elseif($date == 1.5)
                            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 bg-green-300 dark:bg-green-300 border-x border-gray-200 dark:border-gray-700">
                            </td>
                            @elseif($date == 'in_progress')
                            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-yellow-300 border-x border-gray-200 dark:border-gray-700">
                                <i class="fa-solid fa-briefcase"></i>
                            </td>
                            @elseif($date == 'leave')
                            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-yellow-300 border-x border-gray-200 dark:border-gray-700">
                                <i class="fa-solid fa-calendar"></i>
                            </td>
                            @else
                            <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                            </td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    <div id="loader" class="text-center py-4 hidden text-gray-700 dark:text-gray-50">Ładowanie...</div>
                </table>
            </div>
        </x-flex-center>
        @php
        $file = 'raport_lista_obecnosci_' . $company->name . '_' . date('d.m.Y', strtotime($startDate)) . '_' . date('d.m.Y', strtotime($endDate)) . '.xlsx';
        @endphp
        <x-download :file="$file">
            {{ route('api.v1.raport.time-sheet.export.xlsx') }}
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

                    $.get(`{{ route('api.v1.raport.time-sheet.get') }}?page=${page}&start_date=${startDate}&end_date=${endDate}`, function(data) {
                        data.data.forEach(function(user) {
                            let cells = '';
                            const start = new Date(startDate);
                            const end = new Date(endDate);
                            const dates = [];

                            // Generate list of dates from start to end
                            for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
                                const formattedDate = `${d.getDate().toString().padStart(2, '0')}.${(d.getMonth() + 1).toString().padStart(2, '0')}.${d.getFullYear().toString().slice(-2)}`; // Format date as DD.MM.YY
                                dates.push(formattedDate);
                            }

                            // Iterate through the generated dates and check user.dates
                            dates.forEach(date => {
                                console.log(date, user.dates[date]);
                                if (user.dates[date] == 1) {
                                    cells += `
                                    <td class="px-2 py-2 font-semibold text-lg text-gray-700 dark:text-gray-900 bg-green-300 dark:bg-green-300 border-x border-gray-200 dark:border-gray-700">
                                        <i class="fa-solid fa-sun"></i>
                                    </td>`;
                                }else if(user.dates[date] == 0.5) {
                                    cells += `
                                    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-900 bg-green-200 dark:bg-green-200 border-x border-gray-200 dark:border-gray-700">
                                        <i class="fa-solid fa-moon"></i>
                                    </td>`;
                                }else if(user.dates[date] == 1.5) {
                                    cells += `
                                    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 bg-green-300 dark:bg-green-300 border-x border-gray-200 dark:border-gray-700">
                                    </td>`;
                                }else if(user.dates[date] == 'in_progress') {
                                    cells += `
                                    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-yellow-300 border-x border-gray-200 dark:border-gray-700">
                                        <i class="fa-solid fa-briefcase"></i>
                                    </td>`;
                                }
                                else if(user.dates[date] == 'leave') {
                                    cells += `
                                    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-yellow-300 border-x border-gray-200 dark:border-gray-700">
                                        <i class="fa-solid fa-calendar"></i>
                                    </td>`;
                                }else{
                                    cells += `
                                    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                                    </td>`;
                                }
                            });

                            const row = `
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                <td class="px-3 py-2">
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
                                <td class="px-3 py-2 text-left">
                                    <x-paragraf-display class="text-xs">
                                        ${user.name}
                                    </x-paragraf-display>
                                </td>
                                ${cells}
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