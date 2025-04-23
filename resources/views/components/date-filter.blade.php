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
                <div>pon</div>
                <div>wt</div>
                <div>śr</div>
                <div>czw</div>
                <div>pt</div>
                <div>sob</div>
                <div>ndz</div>
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

                        let classes = 'day-btn rounded-lg py-1 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700';
                        let dateStr = `${year}-${month + 1}-${d}`;

                        if (isToday) {
                            classes += ' border border-red-500 text-red-600';
                        }

                        const selectedDate = new Date(year, month, d);
                        console.log('Selected Date:', selectedDate, 'Range Start:', rangeStart, 'Range End:', rangeEnd);
                        if (
                            (rangeStart && !rangeEnd && selectedDate.getTime() === rangeStart.getTime()) ||
                            (rangeStart && rangeEnd && selectedDate >= rangeStart && selectedDate <= rangeEnd)
                        ) {
                            classes += ' bg-green-300 text-gray-900';
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
                    $.ajax({
                        url: `{{ route('api.v1.rcp.work-session.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            const $tbody = $('#work-sessions-body');
                            $tbody.empty(); // najpierw czyścimy poprzednie wiersze

                            response.forEach(session => {
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
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
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
                    $.ajax({
                        url: `{{ route('api.v1.rcp.event.set.date') }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                        method: 'get',
                        success: function(response) {
                            const $tbody = $('#work-sessions-body');
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
                                $tbody.append(row);
                            });
                        },
                        error: function(xhr) {
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