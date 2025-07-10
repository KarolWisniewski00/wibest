<!-- Ukryte pole na wybrane daty -->
<li>
    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="pracownicy-dropdown" data-collapse-toggle="pracownicy-dropdown">
        <span class="flex-1 text-left rtl:text-right whitespace-nowrap text-md">Zakres dat</span>
        <i class="fa-solid fa-chevron-up"></i>
    </button>
    <div id="pracownicy-dropdown" class="">
        <input type="hidden" id="selected-dates" name="selected-dates" />

        <div class="w-full bg-white dark:bg-gray-800 rounded-xl shadow p-2 text-sm text-gray-900 dark:text-white">
            <!-- Nagłówek -->
            <div class="flex justify-between items-center mb-3">
                <span id="calendar-month" class="font-semibold text-md">Kwiecień 2025</span>
                <div class="space-x-2">
                    <button id="prev-month" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button id="next-month" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

            </div>

            <!-- Przyciskowe skróty -->
            <div class="grid grid-cols-2 gap-2 mb-3">
                <button id="btn-today" class="w-full px-2 py-1 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white">Dzisiaj</button>
                <button id="btn-this-week" class="w-full px-2 py-1 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white">Ten tydzień</button>
                <button id="btn-this-month" class="w-full px-2 py-1 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white col-span-2">Ten miesiąc</button>
                <button id="btn-custom-range" class="w-full px-2 py-1 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white col-span-2">Zakres dat</button>
            </div>

            <!-- Dni tygodnia -->
            <div class="grid grid-cols-7 text-center text-gray-500 dark:text-gray-400 mb-1">
                <div>Pon</div>
                <div>Wt</div>
                <div>Śr</div>
                <div>Czw</div>
                <div>Pt</div>
                <div>Sob</div>
                <div>Ndz</div>
            </div>

            <!-- Miejsce na dni miesiąca generowane przez JS -->
            <div id="calendar-days" class="grid grid-cols-7 gap-1 text-center">
                <!-- Dni będą wstawiane dynamicznie przez jQuery -->
            </div>
        </div>

        <script>
            $(document).ready(function() {
                const monthNames = [
                    "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
                    "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"
                ];

                let currentDate = new Date();
                let rangeStart = null;
                let rangeEnd = null;

                function renderCalendar(date) {
                    const year = date.getFullYear();
                    const month = date.getMonth();
                    const today = new Date();
                    const firstDay = new Date(year, month, 1);
                    const lastDay = new Date(year, month + 1, 0);
                    const startDay = (firstDay.getDay() + 6) % 7;

                    $('#calendar-month').text(`${monthNames[month]} ${year}`);
                    $('#calendar-days').empty();

                    for (let i = 0; i < startDay; i++) {
                        $('#calendar-days').append('<div></div>');
                    }

                    for (let d = 1; d <= lastDay.getDate(); d++) {
                        const current = new Date(year, month, d);
                        const isToday = d === today.getDate() && month === today.getMonth() && year === today.getFullYear();

                        let classes = 'day-btn rounded-lg py-1';
                        let dateStr = `${year}-${month + 1}-${d}`;

                        const selectedDate = new Date(year, month, d);
                        console.log('Selected Date:', selectedDate, 'Range Start:', rangeStart, 'Range End:', rangeEnd);
                        if (
                            (rangeStart && !rangeEnd && selectedDate.getTime() === rangeStart.getTime()) ||
                            (rangeStart && rangeEnd && selectedDate >= rangeStart && selectedDate <= rangeEnd)
                        ) {
                            classes += ' text-gray-900 dark:text-gray-900';
                            if (isToday) {
                                classes += '  bg-red-300 dark:hover:bg-red-400';
                            } else {
                                classes += '  bg-green-300 dark:hover:bg-green-400';
                            }
                        } else {
                            classes += ' dark:hover:bg-gray-700';
                            if (isToday) {
                                classes += ' text-red-400';
                            } else {
                                classes += ' text-gray-900 dark:text-white hover:bg-gray-100';
                            }
                        }
                        $('#calendar-days').append(`<button type="button" class="${classes}" data-date="${dateStr}">${d}</button>`);
                    }

                    updateHiddenInput();
                }

                function formatDate(date) {
                    const y = date.getFullYear();
                    const m = String(date.getMonth() + 1).padStart(2, '0');
                    const d = String(date.getDate()).padStart(2, '0');
                    return `${y}-${m}-${d}`;
                }

                function updateHiddenInput() {
                    if (rangeStart && rangeEnd) {
                        $('#selected-dates').val(`${formatDate(rangeStart)} to ${formatDate(rangeEnd)}`);
                    } else {
                        $('#selected-dates').val('');
                    }
                }

                function updateShowFilter() {
                    if (rangeStart && rangeEnd) {
                        $('#show-filter').html(`${formatDate(rangeStart)} - ${formatDate(rangeEnd)}`);
                    } else {
                        $('#show-filter').html('');
                    }
                }
                @if(Str::startsWith(request()->path(), 'dashboard/rcp/work-session'))

                function ajaxFilter() {
                    const $tbody = $('#work-sessions-body');
                    var resultText = "";

                    function formatDateWhen(dateStr) {
                        const date = new Date(dateStr);
                        const options = {
                            day: '2-digit',
                            month: '2-digit',
                            weekday: 'long'
                        };
                        const formattedDate = date.toLocaleDateString('pl-PL', options);
                        const [weekday, rest] = formattedDate.split(', ');
                        return `${rest}, ${weekday}`;
                    }
                    $.ajax({
                        url: `{{ route('api.v1.rcp.work-session.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze

                            response.forEach(session => {
                                if (session.status == 'Praca zakończona') {

                                    const start = new Date(session.event_start.time);
                                    const end = new Date(session.event_stop.time);

                                    const sameDay = start.toDateString() === end.toDateString();

                                    if (sameDay) {
                                        resultText = formatDateWhen(session.event_start.time);
                                    } else {
                                        resultText = "z " + formatDateWhen(session.event_start.time) + " - na " + formatDateWhen(session.event_stop.time);
                                    }

                                    // wyświetl wynik np. w divie o ID #session-info
                                    $('#session-info').text(resultText);

                                } else {
                                    // jeśli praca nie zakończona, możesz np. wyświetlić "w trakcie"
                                    $('#session-info').text('W trakcie...');
                                }
                                // generujemy każdy wiersz
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
                                    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
                                        <div class="flex flex-col justify-center w-fit">
                                            <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                                ${session.user.name}
                                            </x-paragraf-display>
                                            ${session.user.role == 'admin'
                                            ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-green-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Admin
                                                </span>`
                                            : ``
                                            }
                                            ${session.user.role == 'menedżer'
                                            ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Menedżer
                                                </span>`
                                            : ``
                                            }
                                            ${session.user.role == 'kierownik'
                                            ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-yellow-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 focus:bg-yellow-200 dark:focus:bg-yellow-300 active:bg-yellow-200 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Kierownik
                                                </span>`
                                            : ``
                                            }
                                            ${session.user.role == 'użytkownik'
                                            ? ` <span class="px-3 py-1 rounded-full w-fit text-sm font-semibold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Użytkownik
                                                </span>`
                                            : ``
                                            }
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 text-xs">
                                        ${session.status === 'W trakcie pracy' 
                                            ? `<x-status-yellow>${session.status}</x-status-yellow>` 
                                            : session.status === 'Praca zakończona' 
                                                ? `<x-status-green>${session.status}</x-status-green>` 
                                                : ''}
                                    </td>
                                    <td class="px-3 py-2 font-semibold text-xl text-gray-700 dark:text-gray-50">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                            ${session.time_in_work ?? '-'}
                                        </x-paragraf-display>
                                    </td>
                                    <td class="px-3 py-2 font-semibold text-xl text-gray-700 dark:text-gray-50">
                                        <x-paragraf-display class="font-semibold mb-1 w-fit text-start">
                                            <span class="text-gray-400">
                                            ${resultText ?? '-'}
                                            </span>
                                        </x-paragraf-display>
                                    </td>
                                    <x-show-cell href="{{ route('rcp.work-session.show', '') }}/${session.id}" />
                                </tr>`;
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze
                            // generujemy emptyplace
                            const row = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>`;
                            $tbody.append(row);
                        }
                    });
                    updateShowFilter();
                }
                @elseif(Str::startsWith(request()->path(), 'dashboard/rcp/event'))

                function ajaxFilter() {
                    const $tbody = $('#work-sessions-body');
                    $.ajax({
                        url: `{{ route('api.v1.rcp.event.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze

                            response.forEach(event => {
                                // generujemy każdy wiersz
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
                                <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
                                    ${event.time ?? '-'}
                                </td>
                                <x-show-cell href="{{ route('rcp.event.show', '') }}/${event.id}" />
                            </tr>`;
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze
                            // generujemy emptyplace
                            const row = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>`;
                            $tbody.append(row);
                        }
                    });
                    updateShowFilter();
                }
                @elseif(Str::startsWith(request()->path(), 'dashboard/leave/single'))

                function ajaxFilter() {
                    const $tbody = $('#work-sessions-body');
                    $.ajax({
                        url: `{{ route('api.v1.leave.single.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze

                            response.forEach(leave => {
                                // generujemy każdy wiersz
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
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze
                            // generujemy emptyplace
                            const row = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>`;
                            $tbody.append(row);
                        }
                    });
                    updateShowFilter();
                }
                @elseif(Str::startsWith(request()->path(), 'dashboard/leave/pending-review'))

                function ajaxFilter() {
                    const $tbody = $('#work-sessions-body');
                    $.ajax({
                        url: `{{ route('api.v1.leave.pending.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze

                            response.forEach(leave => {
                                // generujemy każdy wiersz
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
                                    ${leave.user.profile_photo_url
                                        ? `<img src="${leave.user.profile_photo_url}" class="w-10 h-10 rounded-full">`
                                        : `<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">${leave.user.name[0].toUpperCase()}</div>`
                                    }
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">
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
                                <td class="px-3 py-2">
                                ${leave.status == 'oczekujące' || leave.status == 'odrzucone' || leave.status == 'anulowane'
                                ? ` 
                                    <x-button-link-green href="{{ route('leave.pending.accept', '')}}/${leave.id}" class="min-h-[38px]">
                                        <i class="fa-solid fa-check"></i>
                                    </x-button-link-green>
                                    `
                                : ``
                                }
                                </td>
                                ${leave.status == 'oczekujące' || leave.status == 'zaakceptowane'
                                ? ` <td class="px-3 py-2">
                                        <x-button-link-red href="{{ route('leave.pending.reject', '')}}/${leave.id}" class="min-h-[38px]">
                                            <i class="fa-solid fa-xmark"></i>
                                        </x-button-link-red>
                                    </td>`
                                : ``
                                }
                            </tr>`;
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze
                            // generujemy emptyplace
                            const row = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>`;
                            $tbody.append(row);
                        }
                    });
                    updateShowFilter();
                }
                @elseif(Str::startsWith(request()->path(), 'dashboard/calendar/all'))

                function ajaxFilter() {
                    const $tbody = $('#work-sessions-body');
                    const $thead = $('#table-head');
                    $.ajax({
                        url: `{{ route('api.v1.calendar.all.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            $tbody.empty();
                            $('.date-column').remove();
                            const start = new Date(rangeStart);
                            const end = new Date(rangeEnd);
                            const dates = [];

                            for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
                                const formattedDate = `${d.getDate().toString().padStart(2, '0')}.${(d.getMonth() + 1).toString().padStart(2, '0')}`;
                                dates.push(formattedDate);
                            }

                            let headHtml = '';
                            dates.forEach(date => {
                                headHtml += `<th scope="col" class="px-2 py-3 date-column">${date}</th>`;
                            });
                            $thead.append(headHtml);

                            response.forEach(user => {
                                console.log(user);
                                let cells = '';

                                const dates = [];

                                // Generate list of dates from start to end
                                for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
                                    const formattedDate = `${d.getDate().toString().padStart(2, '0')}.${(d.getMonth() + 1).toString().padStart(2, '0')}.${d.getFullYear().toString().slice(-2)}`; // Format date as DD.MM.YY
                                    dates.push(formattedDate);
                                }

                                // Iterate through the generated dates and check user.dates
                                dates.forEach(date => {
                                    console.log(date, user.dates[date]);
                                    if (user.dates[date] == 'in_progress') {
                                        cells += `
                                        <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-yellow-300 border-x border-gray-200 dark:border-gray-700">
                                            <i class="fa-solid fa-briefcase"></i>
                                        </td>`;
                                    } else if (user.dates[date] != null && user.dates[date] != 0) {
                                        cells += `
                                        <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-900 bg-pink-300 dark:bg-pink-300 border-x border-gray-200 dark:border-gray-700 cursor-pointer"
                                            onclick="window.location.href='{{ route('calendar.all.edit', ['','']) }}'+'/${user.id}/${date}'">
                                            UP
                                        </td>`;
                                    } else {
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
                                        </div>
                                    </td>
                                    ${cells}
                                </tr>`;
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze
                            // generujemy emptyplace
                            const row = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>`;
                            $tbody.append(row);
                        }
                    });
                    updateShowFilter();
                }
                @elseif(Str::startsWith(request()->path(), 'dashboard/raport/time-sheet'))

                function ajaxFilter() {
                    const $tbody = $('#work-sessions-body');
                    const $thead = $('#table-head');
                    $.ajax({
                        url: `{{ route('api.v1.raport.time-sheet.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            $tbody.empty();
                            $('.date-column').remove();
                            const start = new Date(rangeStart);
                            const end = new Date(rangeEnd);
                            const dates = [];
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

                            for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
                                const formattedDate = `${d.getDate().toString().padStart(2, '0')}.${(d.getMonth() + 1).toString().padStart(2, '0')}`;
                                dates.push(formattedDate);
                            }

                            let headHtml = '';
                            dates.forEach(date => {
                                headHtml += `<th scope="col" class="px-2 py-3 date-column">${date}</th>`;
                            });
                            $thead.append(headHtml);

                            response.forEach(user => {
                                console.log(user);
                                let cells = '';

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
                                    } else if (user.dates[date] == 0.5) {
                                        cells += `
                                        <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-900 bg-green-200 dark:bg-green-200 border-x border-gray-200 dark:border-gray-700">
                                            <i class="fa-solid fa-moon"></i>
                                        </td>`;
                                    } else if (user.dates[date] == 1.5) {
                                        cells += `
                                        <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 bg-green-300 dark:bg-green-300 border-x border-gray-200 dark:border-gray-700">
                                        </td>`;
                                    } else if (user.dates[date] == 'in_progress') {
                                        cells += `
                                        <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-yellow-300 border-x border-gray-200 dark:border-gray-700">
                                            <i class="fa-solid fa-briefcase"></i>
                                        </td>`;
                                    } else if (user.dates[date] != null && user.dates[date] != 0) {
                                        cells += `
                                        <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-900 bg-pink-300 dark:bg-pink-300 border-x border-gray-200 dark:border-gray-700">
                                            ${shortType[user.dates[date]]}
                                        </td>`;
                                    } else {
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
                                        </div>
                                    </td>
                                    ${cells}
                                </tr>`;
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze
                            // generujemy emptyplace
                            const row = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>`;
                            $tbody.append(row);
                        }
                    });
                    updateShowFilter();
                }
                @elseif(Str::startsWith(request()->path(), 'dashboard/raport/attendance-sheet'))

                function ajaxFilter() {
                    const $tbody = $('#work-sessions-body');
                    const $thead = $('#table-head');
                    $.ajax({
                        url: `{{ route('api.v1.raport.attendance-sheet.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            $tbody.empty();
                            $('.date-column').remove();
                            const start = new Date(rangeStart);
                            const end = new Date(rangeEnd);
                            response.forEach(user => {
                                console.log(user);
                                // Iterate through the generated dates and check user.dates
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
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50">

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
                                </tr>`;
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze
                            // generujemy emptyplace
                            const row = `
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-3 py-2">
                                    <x-empty-place />
                                </td>
                            </tr>`;
                            $tbody.append(row);
                        }
                    });
                    updateShowFilter();
                }
                @endif

                function setRange(start, end) {
                    rangeStart = start;
                    rangeEnd = end;
                    currentDate = new Date(start); // ustawia miesiąc do wyświetlenia
                    renderCalendar(currentDate);
                }

                // Nawigacja strzałkami
                $('#prev-month').on('click', function() {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    renderCalendar(currentDate);
                    ajaxFilter();
                    $(window).off('scroll');
                });

                $('#next-month').on('click', function() {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    renderCalendar(currentDate);
                    ajaxFilter();
                    $(window).off('scroll');
                });

                // Kliknięcie dnia
                $('#calendar-days').on('click', '.day-btn', function() {
                    const [year, month, day] = $(this).data('date').split('-').map(Number);
                    const clickedDate = new Date(year, month - 1, day);

                    if (!rangeStart || (rangeStart && rangeEnd)) {
                        rangeStart = clickedDate;
                        rangeEnd = null;
                    } else {
                        if (clickedDate < rangeStart) {
                            rangeEnd = rangeStart;
                            rangeStart = clickedDate;
                        } else {
                            rangeEnd = clickedDate;
                        }
                    }

                    renderCalendar(currentDate);
                    ajaxFilter();
                    $(window).off('scroll');
                });

                function clearTime(date) {
                    return new Date(date.getFullYear(), date.getMonth(), date.getDate());
                }

                $('#btn-today').on('click', function() {
                    const today = clearTime(new Date());
                    setRange(today, today);
                    ajaxFilter();
                    $(window).off('scroll');
                });

                $('#btn-this-week').on('click', function() {
                    const today = clearTime(new Date());
                    let day = today.getDay(); // 0 (niedziela) - 6 (sobota)

                    // Ustal poniedziałek jako start (0 = niedziela, 1 = poniedziałek, itd.)
                    const monday = new Date(today);
                    const offset = day === 0 ? -6 : 1 - day; // jeśli niedziela (0), to cofamy o 6
                    monday.setDate(today.getDate() + offset);

                    const sunday = new Date(monday);
                    sunday.setDate(monday.getDate() + 6);

                    setRange(monday, sunday);
                    ajaxFilter();
                    $(window).off('scroll');
                });


                $('#btn-this-month').on('click', function() {
                    const today = new Date();
                    const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
                    const lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                    setRange(firstDay, lastDay);
                    ajaxFilter();
                    $(window).off('scroll');
                });

                $('#btn-custom-range').on('click', function() {
                    rangeStart = null;
                    rangeEnd = null;
                    renderCalendar(currentDate);
                    $(window).off('scroll');
                });

                // 🟢 DOMYŚLNIE zakres z inputów hidden
                const startInputVal = $('#start_date').val();
                const endInputVal = $('#end_date').val();

                if (startInputVal && endInputVal) {
                    const start = new Date(startInputVal);
                    const end = new Date(endInputVal);

                    // Odejmij 2 godziny od start i end 
                    // TYLKO DLATEGO ŻE Z NIEWIADOMEGO POWODU RÓŻNI SIĘ O 2 H
                    //WZGLĘDEM TEGO CO JEST W BAZIE
                    start.setHours(start.getHours() - 2);
                    end.setHours(end.getHours() - 2);

                    setRange(start, end);
                } else {
                    // fallback na dzisiaj, jeśli inputy puste
                    const today = new Date();
                    setRange(today, today);
                }
            });
        </script>



    </div>
</li>