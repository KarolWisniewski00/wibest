@props([
    'loader' => 'calendar',
    'showCalender' => 'true',
])
@if($loader == 'calendar-smart')
    @php
        $smart = true;
    @endphp
@elseif($loader == 'planing-smart')
    @php
        $smart = true;
    @endphp
@else
    @php
        $smart = false;
    @endphp
@endif
<!-- Ukryte pole na wybrane daty -->
<li>
    @if($showCalender == 'true')
        <button type="button"
            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700"
            aria-controls="pracownicy-dropdown" data-collapse-toggle="pracownicy-dropdown">
            <span id="calendar-month" class="flex-1 text-left rtl:text-right whitespace-nowrap text-md">Ładowanie...</span>
            <i class="fa-solid fa-chevron-up"></i>
        </button>
        <div id="pracownicy-dropdown" class="">
            <input type="hidden" id="selected-dates" name="selected-dates" />

            <div class="w-full bg-white dark:bg-gray-800 rounded-xl p-2 text-sm text-gray-900 dark:text-white">

                <!-- Wybór roku -->
                <div class="flex items-center justify-between mb-3">

                    <button type="button" id="prev-year"
                        class="hidden w-9 h-9 rounded-lg bg-gray-100 hover:bg-green-300
                                                                               dark:bg-gray-700 dark:hover:bg-green-300
                                                                               text-gray-900 dark:text-white dark:hover:text-gray-900">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <div id="prev-year-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[36px] animate-pulse">
                    </div>

                    <button type="button" id="current-year" class="hidden px-4 py-2 rounded-lg bg-gray-100
                                                                               dark:bg-gray-700 text-gray-900 dark:text-white
                                                                               font-semibold tracking-wider">
                        {{ now()->year }}
                    </button>
                    <div id="current-year-l"
                        class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>

                    <button type="button" id="next-year"
                        class="hidden w-9 h-9 rounded-lg bg-gray-100 hover:bg-green-300
                                                                               dark:bg-gray-700 dark:hover:bg-green-300
                                                                               text-gray-900 dark:text-white dark:hover:text-gray-900">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                    <div id="next-year-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[36px] animate-pulse">
                    </div>
                </div>

                <!-- Miesiące -->
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <button id="btn-1"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Sty
                    </button>
                    <div id="btn-1-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-2"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Luty
                    </button>
                    <div id="btn-2-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-3"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Marzec
                    </button>
                    <div id="btn-3-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-4"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Kwi
                    </button>
                    <div id="btn-4-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-5"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Maj
                    </button>
                    <div id="btn-5-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-6"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Czer
                    </button>
                    <div id="btn-6-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-7"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Lipiec
                    </button>
                    <div id="btn-7-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-8"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Sie
                    </button>
                    <div id="btn-8-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-9"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Wrze
                    </button>
                    <div id="btn-9-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-10"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Paź
                    </button>
                    <div id="btn-10-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-11"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Lis
                    </button>
                    <div id="btn-11-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    <button id="btn-12"
                        class="hidden w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white dark:hover:text-gray-900 tracking-widest">
                        Gru
                    </button>
                    <div id="btn-12-l" class="h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[69px] animate-pulse">
                    </div>
                    @if(request()->routeIs('leave.single.index'))
                    <button
                        class="btn-year w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white col-span-3 dark:hover:text-gray-900 tracking-widest">
                        Cały rok
                    </button>
                    <div class="btn-year-l h-[36px] rounded-lg bg-gray-200 dark:bg-gray-700 w-[224px] animate-pulse">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <script>
        $(document).ready(function () {
            const monthNames = [
                "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
                "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"
            ];
            function updateYearAndMonthButtons() {

                const selectedYear = currentDate.getFullYear();
                const selectedMonth = currentDate.getMonth();

                const today = new Date();
                const currentYear = today.getFullYear();
                const currentMonth = today.getMonth();
                // Wyświetlany rok
                $('#current-year').text(selectedYear);

                // Reset wszystkich przycisków
                for (let i = 1; i <= 12; i++) {
                    const $button = $('#btn-' + i);

                    $button.removeClass(
                        'bg-green-300 text-gray-900 ' +
                        'ring-2 ring-green-400 ' +
                        'bg-gray-100 dark:bg-gray-900'
                    );
                    $('.btn-year').removeClass(
                        'bg-green-300 text-gray-900 ' +
                        'ring-2 ring-green-400 ' +
                        'bg-gray-100 dark:bg-gray-900'
                    );
                    $button.addClass(
                        'bg-gray-100 dark:bg-gray-700 dark:text-white'
                    );
                    $('.btn-year').addClass(
                        'bg-gray-100 dark:bg-gray-700 dark:text-white'
                    );
                }


                // Podświetlenie aktualnie wybranego miesiąca
                if (allYear && wasYear == selectedYear) {
                    $('.btn-year')
                        .removeClass('bg-gray-100 dark:bg-gray-700 dark:text-white')
                        .addClass('bg-green-300 text-gray-900 dark:text-gray-900');
                } else {
                    if (wasYear == selectedYear) {
                        $('#btn-' + (selectedMonth + 1))
                            .removeClass('bg-gray-100 dark:bg-gray-700 dark:text-white')
                            .addClass('bg-green-300 text-gray-900 dark:text-gray-900');
                    }
                }

                // Jeżeli wyświetlany rok jest bieżącym rokiem,
                // dodatkowo oznaczamy aktualny miesiąc
                if (selectedYear === currentYear) {

                    $('#btn-' + (currentMonth + 1))
                        .addClass('ring-2 ring-green-400');
                }
            }
            let currentDate = new Date();
            let wasYear = null;
            let allYear = null;
            let rangeStart = null;
            let rangeEnd = null;
            let searchQuery = '';
            const $body = $('#body');
            const $list = $('#list');
            const $search = $('#search');

            function renderCalendar(date) {
                const year = date.getFullYear();
                const month = date.getMonth();
                updateYearAndMonthButtons();
                const today = new Date();
                const firstDay = new Date(year, month, 1);
                const lastDay = new Date(year, month + 1, 0);
                const startDay = (firstDay.getDay() + 6) % 7;
                if (allYear) {
                    if (wasYear != null) {
                        $('#calendar-month').text(`Cały rok ${wasYear}`);
                    } else {
                        $('#calendar-month').text(`Cały rok ${year}`);
                    }
                } else {
                    if (wasYear != null) {
                        $('#calendar-month').text(`${monthNames[month]} ${wasYear}`);
                    } else {
                        $('#calendar-month').text(`${monthNames[month]} ${year}`);
                    }
                }
                $('#btn-1').removeClass('hidden');
                $('#btn-2').removeClass('hidden');
                $('#btn-3').removeClass('hidden');
                $('#btn-4').removeClass('hidden');
                $('#btn-5').removeClass('hidden');
                $('#btn-6').removeClass('hidden');
                $('#btn-7').removeClass('hidden');
                $('#btn-8').removeClass('hidden');
                $('#btn-9').removeClass('hidden');
                $('#btn-10').removeClass('hidden');
                $('#btn-11').removeClass('hidden');
                $('#btn-12').removeClass('hidden');
                $('.btn-year').removeClass('hidden');
                $('#current-year').removeClass('hidden');
                $('#prev-year').removeClass('hidden');
                $('#next-year').removeClass('hidden');
                $('#btn-1-l').addClass('hidden');
                $('#btn-2-l').addClass('hidden');
                $('#btn-3-l').addClass('hidden');
                $('#btn-4-l').addClass('hidden');
                $('#btn-5-l').addClass('hidden');
                $('#btn-6-l').addClass('hidden');
                $('#btn-7-l').addClass('hidden');
                $('#btn-8-l').addClass('hidden');
                $('#btn-9-l').addClass('hidden');
                $('#btn-10-l').addClass('hidden');
                $('#btn-11-l').addClass('hidden');
                $('#btn-12-l').addClass('hidden');
                $('.btn-year-l').addClass('hidden');
                $('#current-year-l').addClass('hidden');
                $('#prev-year-l').addClass('hidden');
                $('#next-year-l').addClass('hidden');
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
                if (allYear) {
                    $('#show-filter').html(`${formatDateDMY(rangeStart)} - ${formatDateDMY(rangeEnd)}`);
                    $('#current-month-bt').html(
                        `Cały rok ${currentDate.getFullYear()}`
                    );
                    $('#next-month-bt').addClass('hidden');
                    $('#prev-month-bt').addClass('hidden');
                    $('#current-month-bt').addClass('sm:ml-[44px]');
                } else {
                    $('#next-month-bt').removeClass('hidden');
                    $('#prev-month-bt').removeClass('hidden');
                    $('#current-month-bt').removeClass('sm:ml-[44px]');
                    if (rangeStart && rangeEnd) {
                        $('#show-filter').html(`${formatDateDMY(rangeStart)} - ${formatDateDMY(rangeEnd)}`);
                        $('#current-month-bt').html(
                            `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`
                        );
                    } else {
                        $('#show-filter').html('');
                        $('#current-month-bt').html('');
                    }
                }
            }

            function ajaxFilter() {

                const $body = $('#body');
                const $head = $('#head');
                $.ajax({
                    url: `{{ $slot }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd)}`,
                    method: 'get',
                    // Wywołuje się ZANIM AJAX wyśle zapytanie
                    beforeSend: function () {
                        $body.empty(); // czyści stare dane
                        $list.empty();

                        const container = $('#calendarUserContainer');

                        // wyczyść kalendarz
                        container.empty();

                        // =========================
                        // PUSTE DNI PRZED PIERWSZYM
                        // =========================

                        const firstDay = new Date(rangeStart);
                        const dayStartOfWeek = (firstDay.getDay() + 6) % 7;

                        for (let i = 0; i < dayStartOfWeek; i++) {

                            const div = $('<div>', {
                                class: 'min-h-[72px] sm:min-h-[100px] md:min-h-[125px] border-r border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40'
                            });

                            container.append(div);
                        }


                        // =========================
                        // DNI MIESIĄCA
                        // =========================

                        const start = new Date(rangeStart);
                        const end = new Date(rangeEnd);

                        let currentDate = new Date(start);

                        while (currentDate <= end) {

                            const day = currentDate.getDate();

                            const isToday =
                                currentDate.toDateString() === new Date().toDateString();

                            const isWeekend =
                                currentDate.getDay() === 0 ||
                                currentDate.getDay() === 6;

                            const div = $('<div>', {
                                class: `
        relative
        min-h-[72px]
        sm:min-h-[100px]
        md:min-h-[125px]
        p-1
        sm:p-2
        md:p-3
        border-r
        border-b
        dark:border-gray-700
        transition
        hover:bg-gray-50
        dark:hover:bg-gray-700/40
        ${isWeekend ? 'bg-gray-50/70 dark:bg-gray-900/20' : ''}
    `,
                                'data-date':
                                    String(currentDate.getDate()).padStart(2, '0') + '.' +
                                    String(currentDate.getMonth() + 1).padStart(2, '0') + '.' +
                                    String(currentDate.getFullYear()).slice(-2)
                            });

                            // Loader
                            const loader = $(`
    <div class="calendar-loader min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                w-full bg-gray-200 dark:bg-gray-700
                rounded-2xl p-2 transition-colors duration-200 animate-pulse">
    </div>
`);



                            // =========================
                            // NUMER DNIA
                            // =========================

                            const dayWrapper = $('<div>', {
                                class: 'flex flex-col items-start justify-start'
                            });

                            const dayNumber = $('<div>', {
                                class: `
            w-6
            h-6
            shrink-0
            rounded-full
            flex
            items-center
            justify-center
            text-[11px]
            font-semibold
            leading-none
            text-gray-900
            mb-2
            ${isToday ? 'bg-red-300 dark:text-gray-900' : 'dark:text-white'}
        `
                            });

                            const daySpan = $('<span>', {
                                class: 'block leading-none',
                                text: day
                            });

                            dayNumber.append(daySpan);
                            dayWrapper.append(dayNumber);
                            div.append(dayWrapper);

                            // dodanie dnia do kalendarza
                            div.append(loader);
                            container.append(div);

                            // następny dzień
                            currentDate.setDate(currentDate.getDate() + 1);
                        }

                        const lastDay = new Date(end);

                        // ile dni od poniedziałku do ostatniego dnia miesiąca
                        const lastDayOfWeek = (lastDay.getDay() + 6) % 7;

                        // ile pustych pól trzeba dodać po miesiącu
                        const emptyDaysAfter = 6 - lastDayOfWeek;

                        for (let i = 0; i < emptyDaysAfter; i++) {

                            const div = $('<div>', {
                                class: `
            min-h-[72px]
            sm:min-h-[100px]
            md:min-h-[125px]
            border-r
            border-b
            dark:border-gray-700
            bg-gray-50
            dark:bg-gray-900/40
        `
                            });

                            container.append(div);
                        }
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
                                @elseif($loader == 'calendar-smart')
                                    <x-loader-calendar-smart />
                                @elseif($loader == 'planing-smart')
                                    <x-loader-planing-smart />
                                @elseif($loader == 'leave-balance')
                                    <x-loader-leave-balance />
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
                    success: function (data) {
                        $.each(data.table, function (date, html) {

                            const cell = $(`[data-date="${date}"]`);
                            cell.find('.calendar-loader').remove();
                            if (cell.length) {
                                cell.find('> div').first().append(html);
                            }

                        });

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
                                        class="px-2 py-2 text-center date-column ${shadeClass} ${shadeClassToday} @if($smart == false) min-w-40 @endif">
                                        <div>${dayOfWeek}</div>
                                        <div>${dayMonth}</div>
                                    </th>
                                `;
                        });

                        $head.append(headHtml);
                        let added = false;

                        data.table.forEach(function (row) {
                            $body.append(row);
                            added = true;
                        });
                        data.list.forEach(function (row) {
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
                    error: function (xhr) {
                        console.error('Błąd:', xhr.responseText);
                    }
                });
                updateShowFilter();
            }

            function setRange(start, end) {
                rangeStart = start;
                rangeEnd = end;
                currentDate = new Date(start); // ustawia miesiąc do wyświetlenia
                allYear =
                    start.getMonth() === 0 &&
                    start.getDate() === 1 &&
                    end.getMonth() === 11 &&
                    end.getDate() === 31 &&
                    start.getFullYear() === end.getFullYear();
                wasYear = currentDate.getFullYear();
                renderCalendar(currentDate);
            }

            // Nawigacja strzałkami
            $('#prev-month').on('click', function () {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar(currentDate);
                //ajaxFilter();
                $(window).off('scroll');
            });

            $('#next-month').on('click', function () {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar(currentDate);
                //ajaxFilter();
                $(window).off('scroll');
            });
            $('#prev-year').on('click', function () {

                const month = currentDate.getMonth();

                currentDate = new Date(
                    currentDate.getFullYear() - 1,
                    month,
                    1
                );

                renderCalendar(currentDate);

                $(window).off('scroll');
            });
            $('#next-year').on('click', function () {

                const month = currentDate.getMonth();

                currentDate = new Date(
                    currentDate.getFullYear() + 1,
                    month,
                    1
                );

                renderCalendar(currentDate);

                $(window).off('scroll');
            });
            // Kliknięcie dnia
            $('#calendar-days').on('click', '.day-btn', function () {
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
                    beforeSend: function () {
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
                                @elseif($loader == 'calendar-smart')
                                    <x-loader-calendar-smart />
                                @elseif($loader == 'planing-smart')
                                    <x-loader-planing-smart />
                                @elseif($loader == 'leave-balance')
                                    <x-loader-leave-balance />
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
                    success: function (data) {
                        $body.empty();
                        $list.empty();
                        console.log(data);
                        let added = false;

                        data.table.forEach(function (row) {
                            $body.append(row);
                            added = true;
                        });
                        data.list.forEach(function (row) {
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
                    error: function (xhr) {
                        console.error('Błąd:', xhr.responseText);
                    }
                });
            }
            $('#next-month-bt').on('click', function () {
                currentDate = new Date(
                    currentDate.getFullYear(),
                    currentDate.getMonth() + 1,
                    1
                );
                const start = clearTime(
                    new Date(currentDate.getFullYear(), currentDate.getMonth(), 1)
                );
                const end = clearTime(
                    new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0)
                );
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
            });
            $('#prev-month-bt').on('click', function () {
                currentDate = new Date(
                    currentDate.getFullYear(),
                    currentDate.getMonth() - 1,
                    1
                );
                const start = clearTime(
                    new Date(currentDate.getFullYear(), currentDate.getMonth(), 1)
                );
                const end = clearTime(
                    new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0)
                );
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
            });
            $('#btn-1').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 0, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 1, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });

            $('#btn-2').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 1, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 2, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-3').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 2, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 3, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-4').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 3, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 4, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-5').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 4, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 5, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-6').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 5, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 6, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-7').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 6, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 7, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-8').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 7, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 8, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-9').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 8, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 9, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-10').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 9, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 10, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-11').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 10, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 11, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });
            $('#btn-12').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 11, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 12, 0));
                wasYear = currentDate.getFullYear();
                allYear = false;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').removeClass('!hidden')
            });


            $('.btn-year').on('click', function () {
                const start = clearTime(new Date(currentDate.getFullYear(), 0, 1));
                const end = clearTime(new Date(currentDate.getFullYear(), 12, 0));
                allYear = true;
                setRange(start, end);
                ajaxFilter();
                $(window).off('scroll');
                $('#btn-year-bt').addClass('!hidden')
            });

            // 🔍 Wyszukiwanie natychmiast po wpisaniu
            let searchTimeout; // Zmienna do przechowywania identyfikatora timeoutu

            $search.on('input', function () {
                // 1. Wyczyść poprzedni timeout (jeśli istnieje)
                // Zapobiega to wykonaniu poprzedniego, opóźnionego wywołania
                clearTimeout(searchTimeout);

                // 2. Pobierz aktualną wartość
                searchQuery = $(this).val().trim();

                // 3. Ustaw nowy timeout
                // Wyszukiwanie zostanie wywołane za 1000ms (1 sekundę)
                searchTimeout = setTimeout(function () {
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
</li>