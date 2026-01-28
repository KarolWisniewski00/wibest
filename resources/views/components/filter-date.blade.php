@props([
'loader' => 'calendar',
])
<!-- Ukryte pole na wybrane daty -->
<li>
    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="pracownicy-dropdown" data-collapse-toggle="pracownicy-dropdown">
        <span class="flex-1 text-left rtl:text-right whitespace-nowrap text-md">Zakres dat</span>
        <i class="fa-solid fa-chevron-up"></i>
    </button>
    <div id="pracownicy-dropdown" class="">
        <input type="hidden" id="selected-dates" name="selected-dates" />

        <div class="w-full bg-white dark:bg-gray-800 rounded-xl p-2 text-sm text-gray-900 dark:text-white">
            <!-- Nagłówek -->
            <div class="flex justify-between items-center mb-4">
                <span id="calendar-month" class="font-semibold text-md">
                    <div class="h-[20px] rounded-lg bg-gray-200 dark:bg-gray-700 w-20 animate-pulse"></div>
                </span>
                <div class="space-x-2">
                    <button id="prev-month" class="text-gray-500 hover:text-gray-500 dark:hover:text-gray-300">
                        <i class="fa-solid fa-chevron-left"></i><span class="mx-1">pop</span>
                    </button>
                    <button id="next-month" class="text-gray-500 hover:text-gray-500 dark:hover:text-gray-300">
                        <span class="mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

            </div>

            <!-- Przyciskowe skróty -->
            <div class="grid grid-cols-2 gap-2 mb-4">
                <button id="btn-today" class="w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">Dzisiaj</button>
                <button id="btn-this-week" class="w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">Ten tydzień</button>
                <button id="btn-this-month" class="w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white col-span-2 dark:hover:text-gray-900 tracking-widest">Ten miesiąc</button>
                <button id="btn-custom-range" class="w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white col-span-2 dark:hover:text-gray-900 tracking-widest">Zakres dat</button>
            </div>

            <!-- Dni tygodnia -->
            <div class="grid grid-cols-7 text-center text-gray-500 dark:text-gray-500 mb-2">
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
                @for ($i = 0; $i < 35; $i++)
                    <div class="h-[28px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[28px] animate-pulse">
            </div>
            @endfor
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
            let searchQuery = '';
            const $body = $('#body');
            const $list = $('#list');
            const $search = $('#search');

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
                    //console.log('Selected Date:', selectedDate, 'Range Start:', rangeStart, 'Range End:', rangeEnd);
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

            function formatDateDMY(date) {
                const y = date.getFullYear();
                const m = String(date.getMonth() + 1).padStart(2, '0');
                const d = String(date.getDate()).padStart(2, '0');
                return `${d}.${m}.${y}`;
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
                    $('#show-filter').html(`${formatDateDMY(rangeStart)} - ${formatDateDMY(rangeEnd)}`);
                } else {
                    $('#show-filter').html('');
                }
            }

            function ajaxFilter() {

                const $body = $('#body');
                const $head = $('#head');
                searchQuery = $('#search').val().trim();
                $.ajax({
                    url: `{{ $slot }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}&search=${encodeURIComponent(searchQuery)}`,
                    method: 'get',
                    // Wywołuje się ZANIM AJAX wyśle zapytanie
                    beforeSend: function() {
                        $body.empty(); // czyści stare dane
                        $list.empty();
                        for (let i = 0; i < 3; i++) {
                            $body.append(`
                                @if($loader == 'calendar')
                                <x-loader-calendar />
                                @elseif($loader == 'leave')
                                <x-loader-leave />
                                @elseif($loader == 'pending')
                                <x-loader-leave-pending />
                                @elseif($loader == 'work-session')
                                <x-loader-work-session />
                                @elseif($loader == 'event')
                                <x-loader-event />
                                @elseif($loader == 'attendance')
                                <x-loader-attendance />
                                @elseif($loader == 'planing')
                                <x-loader-planing />
                                @endif
                                `);
                            $list.append(`
                                @if($loader == 'leave')
                                <x-loader-leave-card />
                                @elseif($loader == 'pending')
                                <x-loader-leave-pending-card />
                                @elseif($loader == 'work-session')
                                <x-loader-work-session-card />
                                @elseif($loader == 'event')
                                <x-loader-event-card />
                                @endif
                                `);
                        };
                    },
                    success: function(data) {
                        $body.empty();
                        $list.empty();
                        $('.date-column').remove();
                        const start = new Date(rangeStart);
                        const end = new Date(rangeEnd);
                        const dates = [];

                        for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {

                            const day = d.getDate().toString().padStart(2, '0');
                            const month = (d.getMonth() + 1).toString().padStart(2, '0');
                            const shortYear = d.getFullYear().toString().slice(-2);

                            const formattedDate = `${day}.${month}.${shortYear}`;

                            dates.push({
                                dateObj: new Date(d),
                                formattedDate
                            });
                        }

                        let headHtml = '';

                        dates.forEach(({
                            dateObj
                        }) => {

                            // 🟦 1. Czy weekend?
                            const isWeekend = dateObj.getDay() === 0 || dateObj.getDay() === 6;

                            // 🟥 2. Czy dziś?
                            const now = new Date();
                            const isToday =
                                dateObj.getDate() === now.getDate() &&
                                dateObj.getMonth() === now.getMonth() &&
                                dateObj.getFullYear() === now.getFullYear();

                            // 🔤 3. Skrót dnia tygodnia (np. "pon", "wt", "śr")
                            let day = new Intl.DateTimeFormat('pl-PL', {
                                weekday: 'short'
                            }).format(dateObj);

                            // usuń kropkę
                            day = day.replace('.', '');

                            // zamień "niedz" na "ndz"
                            if (day.toLowerCase() === 'niedz') {
                                day = 'ndz';
                            }
                            const dayOfWeek = day;

                            // 📅 4. Format „j M” (np. "1 sty")
                            const dayMonth = new Intl.DateTimeFormat('pl-PL', {
                                day: 'numeric',
                                month: 'short'
                            }).format(dateObj);

                            // 🎨 5. Klasy (jak w Carbon)
                            let shadeClass = isWeekend ? 'bg-gray-200 dark:bg-gray-600' : '';
                            const shadeClassToday = isToday ? 'bg-rose-300 text-gray-900' : '';
                            if (isToday && isWeekend) {
                                shadeClass = shadeClassToday;
                            }
                            headHtml += `
                                    <th scope="col" 
                                        class="px-2 py-2 text-center date-column ${shadeClass} ${shadeClassToday} min-w-40">
                                        <div>${dayOfWeek}</div>
                                        <div>${dayMonth}</div>
                                    </th>
                                `;
                        });

                        $head.append(headHtml);
                        let added = false;

                        data.table.forEach(function(row) {
                            $body.append(row);
                            added = true;
                        });
                        data.list.forEach(function(row) {
                            $list.append(row);
                        });

                        if (!added) {
                            $body.append(`<tr class="bg-white dark:bg-gray-800">
                                    <td colspan="999" class="px-2 py-2">
                                        <x-empty-place />
                                    </td>
                                </tr>`);
                            $list.append(`<x-empty-place />`);
                        }

                        $(window).off('scroll');
                    },
                    error: function(xhr) {
                        console.error('Błąd:', xhr.responseText);
                    }
                });
                updateShowFilter();
            }

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
                //ajaxFilter();
                $(window).off('scroll');
            });

            $('#next-month').on('click', function() {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar(currentDate);
                //ajaxFilter();
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

            function loadSessions() {
                $.ajax({
                    url: `{{ $slot }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}&search=${encodeURIComponent(searchQuery)}`,
                    method: 'get',
                    // Wywołuje się ZANIM AJAX wyśle zapytanie
                    beforeSend: function() {
                        $body.empty(); // czyści stare dane
                        $list.empty();
                        for (let i = 0; i < 3; i++) {
                            $body.append(`
                                @if($loader == 'calendar')
                                <x-loader-calendar />
                                @elseif($loader == 'leave')
                                <x-loader-leave />
                                @elseif($loader == 'pending')
                                <x-loader-leave-pending />
                                @elseif($loader == 'work-session')
                                <x-loader-work-session />
                                @elseif($loader == 'event')
                                <x-loader-event />
                                @elseif($loader == 'attendance')
                                <x-loader-attendance />
                                @elseif($loader == 'planing')
                                <x-loader-planing />
                                @endif
                                `);
                            $list.append(`
                                @if($loader == 'leave')
                                <x-loader-leave-card />
                                @elseif($loader == 'pending')
                                <x-loader-leave-pending-card />
                                @elseif($loader == 'work-session')
                                <x-loader-work-session-card />
                                @elseif($loader == 'event')
                                <x-loader-event-card />
                                @endif
                                `);
                        };
                    },
                    success: function(data) {
                        $body.empty();
                        $list.empty();
                        console.log(data);
                        let added = false;

                        data.table.forEach(function(row) {
                            $body.append(row);
                            added = true;
                        });
                        data.list.forEach(function(row) {
                            $list.append(row);
                        });

                        if (!added) {
                            $body.append(`<tr class="bg-white dark:bg-gray-800">
                                    <td colspan="999" class="px-2 py-2">
                                        <x-empty-place />
                                    </td>
                                </tr>`);
                            $list.append(`<x-empty-place />`);
                        }

                        $(window).off('scroll');
                    },
                    error: function(xhr) {
                        console.error('Błąd:', xhr.responseText);
                    }
                });
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

            // 🔍 Wyszukiwanie natychmiast po wpisaniu
            let searchTimeout; // Zmienna do przechowywania identyfikatora timeoutu

            $search.on('input', function() {
                // 1. Wyczyść poprzedni timeout (jeśli istnieje)
                // Zapobiega to wykonaniu poprzedniego, opóźnionego wywołania
                clearTimeout(searchTimeout);

                // 2. Pobierz aktualną wartość
                searchQuery = $(this).val().trim();

                // 3. Ustaw nowy timeout
                // Wyszukiwanie zostanie wywołane za 1000ms (1 sekundę)
                searchTimeout = setTimeout(function() {
                    // Ta funkcja jest wywoływana dopiero po upływie 1000ms bez nowej aktywności 'input'
                    loadSessions(true);
                }, 1000);
            });

            // 🟢 DOMYŚLNIE zakres z inputów hidden
            const startInputVal = $('#start_date').val();
            const endInputVal = $('#end_date').val();

            if (startInputVal && endInputVal) {
                let start = new Date(startInputVal);
                let end = new Date(endInputVal);

                start.setHours(0, 0, 0, 0); //zmiana czasu letni/zimowy
                end.setHours(23, 59, 59, 999); //zmiana czasu letni/zimowy

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