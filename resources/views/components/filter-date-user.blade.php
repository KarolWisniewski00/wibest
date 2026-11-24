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
                @if(in_array($loader, ['work-session', 'event', 'calendar', 'calendar-smart', 'attendance']))
                    <button type="button" id="btn-custom-range" aria-controls="custom-date-range" aria-expanded="false"
                        class="w-full px-2 py-2 rounded-lg bg-gray-100 hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 text-gray-900 dark:text-white col-span-2 dark:hover:text-gray-900 tracking-widest">
                        Zakres dat
                    </button>
                    <div id="custom-date-range" class="hidden mt-3">
                        <div class="grid grid-cols-7 text-center text-gray-500 dark:text-gray-500 mb-2">
                            <div>Pon</div>
                            <div>Wt</div>
                            <div>Śr</div>
                            <div>Czw</div>
                            <div>Pt</div>
                            <div>Sob</div>
                            <div>Ndz</div>
                        </div>
                        <div id="calendar-days" class="grid grid-cols-7 gap-1 text-center"></div>
                    </div>
                @endif
            </div>
        </div>
    @endif
    <script>
        $(document).ready(function () {
            @if(session('date_range_info'))
                toastr.info(@js(session('date_range_info')), '', { positionClass: 'toast-top-center', timeOut: 5000, closeButton: true, progressBar: true });
            @endif
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
            let filterRequest;
            let filterRevision = 0;
            let summaryRequest;
            let summaryRevision = 0;
            let rangeStart = null;
            let rangeEnd = null;
            let searchQuery = ($('#search').val() || '').trim();
            const $body = $('#body');
            const $list = $('#list');
            const $search = $('#search');

            function loadAttendanceSummary(start, end) {
                const revision = ++summaryRevision;
                summaryRequest?.abort();
                const $wrapper = $('#attendance-summary-wrapper');

                if (!$wrapper.length) {
                    return;
                }

                const $skeleton = $wrapper.find('#attendance-summary-skeleton');
                const $content = $wrapper.find('#attendance-summary-content');

                $skeleton.show();
                $content.empty().hide();

                const url = `${$wrapper.data('url')}?page=&start_date=${formatDate(start)}&end_date=${formatDate(end)}`;
                console.log('Wysyłanie żądania AJAX do:', url);
                summaryRequest = $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',

                    success: function (response) {
                        if (revision !== summaryRevision) return;
                        console.log('Odpowiedź z serwera:', response);
                        if (!response.success || !response.data) {
                            $skeleton.hide();
                            $content
                                .html('<p class="mx-4 text-sm text-red-600 dark:text-red-400">Nie udało się pobrać podsumowania czasu pracy.</p>')
                                .show();

                            return;
                        }

                        const data = response.data;

                        const $summary = $(`
                <div class="mb-4 mx-4 space-y-3" x-data="{ detailsOpen: false }">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="min-w-0 rounded-lg bg-gray-100 p-4 shadow-sm dark:bg-gray-700 motion-safe:animate-[stats-in_.4s_ease-out_both]">
                            <div class="mb-3 flex items-center gap-2">
                                <div class="shrink-0 hidden sm:flex w-8 h-8 rounded-xl items-center justify-center bg-gradient-to-br from-gray-200 to-gray-100 dark:from-gray-500/20 dark:to-gray-500/10 text-gray-300 dark:text-gray-300">
                                    <i class="fa-solid fa-clock" aria-hidden="true"></i>
                                </div>
                                <span class="text-xs font-medium text-gray-500 dark:text-gray-300">Przepracowano</span>
                            </div>
                            <div data-summary="workedHours" class="text-2xl font-semibold tracking-tight tabular-nums text-gray-900 dark:text-white sm:text-3xl"></div>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">Godziny pracy</p>
                        </div>

                        <div class="min-w-0 rounded-lg bg-gray-100 p-4 shadow-sm dark:bg-gray-700 motion-safe:animate-[stats-in_.4s_ease-out_.08s_both]">
                            <div class="mb-3 flex items-center gap-2">
                                <div class="shrink-0 hidden sm:flex w-8 h-8 rounded-xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-arrow-trend-up" aria-hidden="true"></i>
                                </div>
                                <span class="text-xs font-medium text-gray-500 dark:text-gray-300">Nadgodziny</span>
                            </div>
                            <div data-summary="overtimeHours" class="text-2xl font-semibold tracking-tight tabular-nums text-green-700 dark:text-green-300 sm:text-3xl"></div>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">Ponad normę</p>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg bg-gray-100 shadow-sm dark:bg-gray-700">
                        <button type="button"
                                @click="detailsOpen = !detailsOpen"
                                :aria-expanded="detailsOpen.toString()"
                                class="flex min-h-12 w-full items-center justify-between gap-3 px-4 py-3 text-left transition-colors duration-200 hover:bg-gray-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-green-500 dark:hover:bg-gray-600/50">
                            <span class="text-sm font-medium text-gray-700 dark:text-white">Pozostałe informacje</span>
                            <span class="flex items-center gap-2">
                                <span class="hidden text-xs text-gray-500 dark:text-gray-300 sm:inline">Grafik i rozliczenie</span>
                                <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition-transform duration-200 dark:text-gray-300"
                                   :class="{ 'rotate-180': detailsOpen }"></i>
                            </span>
                        </button>

                        <div x-cloak
                             x-show="detailsOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="border-t border-gray-100 px-4 dark:border-gray-600">

                            <div class="flex items-center justify-between gap-3 py-3">
                                <div class="flex min-w-0 items-center gap-3">
                                    <i class="fa-regular fa-calendar shrink-0 text-gray-400 dark:text-gray-300"></i>
                                    <span class="text-sm text-gray-600 dark:text-gray-200">Zaplanowane godziny</span>
                                </div>
                                <span data-summary="plannedHours" class="shrink-0 text-sm font-semibold tabular-nums text-gray-900 dark:text-white"></span>
                            </div>

                            <div class="flex items-center justify-between gap-3 border-t border-gray-100 py-3 dark:border-gray-600">
                                <div class="flex min-w-0 items-center gap-3">
                                    <i class="fa-regular fa-file-lines shrink-0 text-gray-400 dark:text-gray-300"></i>
                                    <span class="text-sm text-gray-600 dark:text-gray-200">Godziny z e-wniosków</span>
                                </div>
                                <span data-summary="leaveHours" class="shrink-0 text-sm font-semibold tabular-nums text-gray-900 dark:text-white"></span>
                            </div>

                            <div class="flex items-center justify-between gap-3 border-t border-gray-100 py-3 dark:border-gray-600">
                                <div class="flex min-w-0 items-center gap-3">
                                    <i class="fa-regular fa-hourglass-half shrink-0 text-gray-400 dark:text-gray-300"></i>
                                    <span class="text-sm text-gray-600 dark:text-gray-200">Brak do normy</span>
                                </div>
                                <span data-summary="hoursMissing" class="shrink-0 text-sm font-semibold tabular-nums text-amber-700 dark:text-amber-300"></span>
                            </div>
                        </div>
                    </div>
                </div>
            `);

                        Object.entries({
                            workedHours: data.workedHours,
                            overtimeHours: data.overtimeHours,
                            plannedHours: data.plannedHours,
                            leaveHours: data.leaveHours,
                            hoursMissing: data.hoursMissing
                        }).forEach(function ([key, value]) {
                            $summary.find('[data-summary="' + key + '"]')
                                .text(value ?? '—');
                        });

                        $content.empty().append($summary);

                        // Inicjalizacja Alpine dla dynamicznie dodanego x-data.
                        if (window.Alpine) {
                            window.Alpine.initTree($summary[0]);
                        }

                        $skeleton.hide();
                        $content.show();
                    },

                    error: function (xhr, status) {
                        if (status === 'abort' || revision !== summaryRevision) return;
                        console.error(
                            'Błąd pobierania podsumowania czasu pracy:',
                            xhr.status,
                            xhr.responseText
                        );
                        $content
                            .html('<p class="mx-4 text-sm text-red-600 dark:text-red-400">Nie udało się załadować podsumowania. Odśwież stronę i spróbuj ponownie.</p>')
                            .show();
                    }
                });
            }


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
                loadAttendanceSummary(rangeStart, rangeEnd || rangeStart);
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
                @if(in_array($loader, ['objects', 'event', 'work-session', 'payroll', 'calendar', 'calendar-smart', 'attendance']))
                if (rangeStart) {
                    $('#current-month-bt').text(`${monthNames[rangeStart.getMonth()]} ${rangeStart.getFullYear()}`);
                    $('#show-filter').text(`${formatDateDMY(rangeStart)} - ${formatDateDMY(rangeEnd || rangeStart)}`);
                }
                return;
                @endif
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

            @if($loader == 'payroll')
            window.history.replaceState(window.history.state, '', window.location.pathname + window.location.hash);
            let payrollRequest;
            let payrollRevision = 0;
            function refreshPayroll(page = 1) {
                const revision = ++payrollRevision;
                payrollRequest?.abort();
                const $results = $('#payroll-results');
                $results.attr('aria-busy', 'true').html('<div class="grid gap-4 xl:grid-cols-2"><div class="h-64 rounded-2xl bg-gray-200 dark:bg-gray-700 animate-pulse"></div><div class="h-64 rounded-2xl bg-gray-200 dark:bg-gray-700 animate-pulse"></div></div>');
                updateShowFilter();
                const data = { start_date: formatDate(rangeStart), end_date: formatDate(rangeEnd || rangeStart), search: $('#search').val() || '', page };
                payrollRequest = $.ajax({
                    url: @js(trim((string) $slot)), data,
                    headers: { 'X-Payroll-Results': '1' },
                    success(html) {
                        if (revision !== payrollRevision) return;
                        $results.html(html);
                        window.history.replaceState(window.history.state, '', window.location.pathname + window.location.hash);
                    },
                    error(xhr, status) { if (status !== 'abort' && revision === payrollRevision) $results.html('<p role="alert" class="p-4 text-red-700 dark:text-red-300">Nie udało się pobrać raportu. Zmień filtr, aby spróbować ponownie.</p>'); },
                    complete() { if (revision === payrollRevision) $results.attr('aria-busy', 'false'); }
                });
            }
            $(document).on('click.payroll', '#payroll-results nav a', function (event) {
                if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || event.button !== 0) return;
                event.preventDefault();
                refreshPayroll(Number(new URL(this.href).searchParams.get('page')) || 1);
            });
            @endif
            @if($loader == 'work-session')
            let workSessionRequest;
            let workSessionRevision = 0;
            function refreshWorkSessions() {
                const revision = ++workSessionRevision;
                workSessionRequest?.abort();
                window.dispatchEvent(new Event('rcp-session-filter-changing'));
                const $body = $('#body'), $list = $('#list');
                const rowSkeleton = @js(view('components.loader-work-session', ['attributes' => new \Illuminate\View\ComponentAttributeBag()])->render());
                const cardSkeleton = @js(view('components.loader-work-session-card', ['attributes' => new \Illuminate\View\ComponentAttributeBag()])->render());
                $body.html(rowSkeleton.repeat(3));
                $list.html(cardSkeleton.repeat(3));
                updateShowFilter();
                workSessionRequest = $.ajax({
                    url: @js(trim((string) $slot)),
                    data: { start_date: formatDate(rangeStart), end_date: formatDate(rangeEnd || rangeStart),
                        filter_user_id: $('#rcp-filter-user').val() || '', search: $('#search').val() || '',
                        has_task: $('#rcp-has_task').is(':checked') ? 1 : 0, has_note: $('#rcp-has_note').is(':checked') ? 1 : 0,
                        classification_filter: 1, classifications: $('input[name="rcp_classifications[]"]:checked').map(function () { return this.value; }).get() },
                    success(data) {
                        if (revision !== workSessionRevision) return;
                        $body.html(data.table.join(''));
                        $list.html(data.list.join(''));
                        if (!data.table.length) $body.html('<tr><td colspan="9" class="p-6 text-center text-gray-500 dark:text-gray-300">Brak wyników</td></tr>');
                        if (!data.list.length) $list.html('<li class="p-6 text-center text-gray-500 dark:text-gray-300">Brak wyników</li>');
                    },
                    error(xhr, status) { if (status !== 'abort' && revision === workSessionRevision) { $body.html('<tr><td colspan="9" class="p-6 text-center">Nie udało się pobrać danych</td></tr>'); $list.empty(); } }
                });
            }
            $('input[name="rcp_classifications[]"]').on('change', refreshWorkSessions);
            $('#rcp-has_task, #rcp-has_note').on('change', refreshWorkSessions);
            @endif
            @if($loader == 'event')
            let eventRequest;
            let eventNextPage = null;
            let eventPageLoading = false;
            let eventGeneration = 0;
            const eventRowSkeleton = @js(view('components.loader-event', ['attributes' => new \Illuminate\View\ComponentAttributeBag()])->render());
            const eventCardSkeleton = @js(view('components.loader-event-card', ['attributes' => new \Illuminate\View\ComponentAttributeBag()])->render());
            function eventFilterData() {
                return { per_page: 3, start_date: formatDate(rangeStart), end_date: formatDate(rangeEnd || rangeStart), filter_event_types: 1, event_types: $('input[name="event_types[]"]:checked').map(function () { return this.value; }).get(), search: $('#search').val() };
            }
            function loadMoreEvents() {
                const sentinel = document.getElementById('event-scroll-sentinel');
                if (!eventNextPage || eventPageLoading || !sentinel || sentinel.getBoundingClientRect().top > window.innerHeight + 150) return;
                const generation = eventGeneration;
                eventPageLoading = true;
                $('#body').append($(eventRowSkeleton).addClass('event-page-loader'));
                $('#list').append($(eventCardSkeleton).addClass('event-page-loader'));
                eventRequest = $.ajax({
                    url: eventNextPage,
                    data: eventFilterData(),
                    success(data) {
                        if (generation !== eventGeneration) return;
                        $('.event-page-loader').remove();
                        $('#body').append(data.table.join(''));
                        $('#list').append(data.list.join(''));
                        eventNextPage = data.next_page_url;
                    },
                    error(xhr, status) {
                        if (generation === eventGeneration && status !== 'abort') $('.event-page-loader').remove();
                    },
                    complete(xhr, status) {
                        if (generation !== eventGeneration) return;
                        eventPageLoading = false;
                        if (status === 'success') requestAnimationFrame(loadMoreEvents);
                    }
                });
            }
            const eventSentinel = document.getElementById('event-scroll-sentinel');
            if (eventSentinel) {
                const observer = new IntersectionObserver(entries => {
                    if (entries.some(entry => entry.isIntersecting)) loadMoreEvents();
                }, { rootMargin: '150px' });
                observer.observe(eventSentinel);
            }
            $(window).on('scroll.eventsPagination resize.eventsPagination', loadMoreEvents);
            function refreshEvents(initial = false) {
                const firstPage = initial === true;
                const generation = ++eventGeneration;
                eventNextPage = null;
                eventRequest?.abort();
                eventPageLoading = true;
                const $body = $('#body'), $list = $('#list');
                $body.html(eventRowSkeleton.repeat(3));
                $list.html(eventCardSkeleton.repeat(3));
                updateShowFilter();
                eventRequest = $.ajax({
                    url: firstPage ? @js(route('api.v1.rcp.event.get')) : @js(trim((string) $slot)),
                    data: eventFilterData(),
                    success(data) {
                        if (generation !== eventGeneration) return;
                        eventNextPage = firstPage ? data.next_page_url : null;
                        $body.html(data.table.join(''));
                        $list.html(data.list.join(''));
                        if (!data.table.length) $body.html('<tr><td colspan="7" class="p-6 text-center text-gray-500 dark:text-gray-300">Brak zdarzeń</td></tr>');
                        if (!data.list.length) $list.html('<li class="p-6 text-center text-gray-500 dark:text-gray-300">Brak zdarzeń</li>');
                    },
                    error(xhr, status) { if (status !== 'abort' && generation === eventGeneration) { $body.html('<tr><td colspan="7" class="p-6 text-center">Nie udało się pobrać zdarzeń</td></tr>'); $list.empty(); } },
                    complete(xhr, status) {
                        if (generation !== eventGeneration) return;
                        eventPageLoading = false;
                        if (firstPage && status === 'success') requestAnimationFrame(loadMoreEvents);
                    }
                });
            }
            $('input[name="event_types[]"]').on('change', refreshEvents);
            @endif
            function ajaxFilter() {
                window.wibestFilterChanged = true;
                window.dispatchEvent(new Event('wibest-filter-changing'));
                const revision = ++filterRevision;
                filterRequest?.abort();
                @if($loader == 'payroll')
                refreshPayroll();
                return;
                @endif
                @if($loader == 'work-session')
                refreshWorkSessions();
                return;
                @endif
                @if($loader == 'event')
                refreshEvents();
                return;
                @endif

                @if($loader == 'objects')
                updateShowFilter();
                window.dispatchEvent(new CustomEvent('object-date-range', { detail: {
                    start: formatDate(rangeStart), end: formatDate(rangeEnd || rangeStart), search: $('#search').val() || ''
                }}));
                return;
                @endif


                const $body = $('#body');
                const $head = $('#head');
                filterRequest = $.ajax({
                    url: `{{ $slot }}?page=&start_date=${formatDate(rangeStart)}&end_date=${formatDate(rangeEnd || rangeStart)}`,
                    data: { search: $('#search').val() || '',
                        @if(in_array($loader, ['calendar', 'calendar-smart']))
                        classification_filter: 1, classifications: $('input[name="rcp_classifications[]"]:checked').map(function () { return this.value; }).get(),
                        @endif
                    },
                    method: 'get',
                    @if($loader == 'work-session')
                    data: { filter_user_id: $('#rcp-filter-user').val() || '', search: $('#search').val() || '' },
                    @endif
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
                        const end = new Date(rangeEnd || rangeStart);

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
                        if (revision !== filterRevision) return;
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
                        const end = new Date(rangeEnd || rangeStart);
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

                        if (!added && !data.next_page_url) {
                            $body.append(`<tr class="bg-white dark:bg-gray-800">
                                    <td colspan="999" class="px-2 py-2">
                                        <x-empty-place />
                                    </td>
                                </tr>`);
                            $list.append(`<x-empty-place />`);
                        }

                        $(window).off('scroll');
                        @if(in_array($loader, ['calendar', 'calendar-smart']))
                        window.dispatchEvent(new CustomEvent('wibest-report-loaded', { detail: { next: data.next_page_url, empty: !added } }));
                        @endif
                    },
                    error: function (xhr, status) {
                        if (status === 'abort' || revision !== filterRevision) return;
                        @if(in_array($loader, ['calendar', 'calendar-smart']))
                        window.dispatchEvent(new Event('wibest-report-error'));
                        @endif
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
                updateShowFilter();
            }

            @if(in_array($loader, ['calendar', 'calendar-smart']))
            $('input[name="rcp_classifications[]"]').on('change', ajaxFilter);
            window.addEventListener('wibest-report-retry', ajaxFilter);
            @endif

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
            $('#btn-custom-range').on('click', function () {
                const expanded = $(this).attr('aria-expanded') !== 'true';
                $(this).attr('aria-expanded', String(expanded));
                $('#custom-date-range').toggleClass('hidden', !expanded);
                if (!expanded) {
                    setRange(new Date(currentDate.getFullYear(), currentDate.getMonth(), 1),
                        new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0));
                    ajaxFilter();
                }
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

                allYear = false;
                wasYear = year;
                renderCalendar(currentDate);
                updateShowFilter();
                ajaxFilter();
                $(window).off('scroll');
            });

            function clearTime(date) {
                return new Date(date.getFullYear(), date.getMonth(), date.getDate());
            }

            function loadSessions() {
                ajaxFilter();
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
                const fullMonth = start.getDate() === 1 && start.getFullYear() === end.getFullYear()
                    && start.getMonth() === end.getMonth()
                    && end.getDate() === new Date(start.getFullYear(), start.getMonth() + 1, 0).getDate();
                $('#btn-custom-range').attr('aria-expanded', String(!fullMonth));
                $('#custom-date-range').toggleClass('hidden', fullMonth);
            } else {
                // fallback na dzisiaj, jeśli inputy puste
                const today = new Date();
                setRange(new Date(today.getFullYear(), today.getMonth(), 1), new Date(today.getFullYear(), today.getMonth() + 1, 0));
            }

            @if($loader == 'event')
            refreshEvents(true);
            @endif
            @if($loader == 'work-session' && session('rcp.filters.active', false))
            refreshWorkSessions();
            @elseif($loader == 'work-session')
            if (searchQuery) refreshWorkSessions();
            @elseif($loader == 'payroll')
            if (searchQuery) refreshPayroll();
            @elseif(in_array($loader, ['calendar', 'calendar-smart']) && request()->routeIs('raport.time-sheet.index', 'raport.time-smart.index'))
            requestAnimationFrame(() => ajaxFilter());
            @elseif($loader != 'event' && $loader != 'objects')
            if (searchQuery) loadSessions();
            @endif
        });
    </script>
</li>
