<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Główny') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET -->
            <div class="p-6 lg:p-8 mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @if ($company)
                <div class="bg-white dark:bg-gray-800">
                    <div class="flex flex-col justify-between items-center">
                        <x-wibest-text />
                        <x-widget-display class="grid-cols-3 grid-rows-1">
                            <div class="col-span-2">
                                <!-- Data -->
                                <div>
                                    <x-flex-center class="mb-4">
                                        <x-paragraf-display id="date" class="text-lg">
                                        </x-paragraf-display>
                                    </x-flex-center>
                                </div>
                                <!-- Timer -->
                                <div>
                                    <x-flex-center class="mb-6">
                                        <x-paragraf-display id="timer" class="text-4xl">
                                            00:00:00
                                        </x-paragraf-display>
                                    </x-flex-center>
                                </div>
                            </div>
                            <div class="col-start-3 h-full">
                                <!-- Przycisk Start -->
                                <div class="text-center flex justify-center items-center h-full">
                                    <button
                                        id="startButton"
                                        class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-600 active:bg-green-900 dark:active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Start
                                    </button>
                                    <!-- Przycisk Stop -->
                                    <button
                                        id="stopButton"
                                        class="hidden whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Stop
                                    </button>
                                </div>
                            </div>
                        </x-widget-display>
                        <x-widget-display class="mt-4 grid-cols-3 grid-rows-1">
                            <div class="col-span-2">
                                <div>
                                    <x-flex-center class="mb-4">
                                        <x-paragraf-display class="text-lg">
                                            Moje godziny w tym miesiącu
                                        </x-paragraf-display>
                                    </x-flex-center>
                                </div>
                                <div>
                                    <x-flex-center class="mb-4">
                                        <x-paragraf-display class="text-4xl">
                                            {{$total_time_in_hours_logged_user}} H
                                        </x-paragraf-display>
                                    </x-flex-center>
                                </div>
                            </div>
                            <div class="col-start-3 h-full">
                                <x-flex-center class="h-full">
                                    <x-button-link-cello class="mt-4" href="">
                                        <i class="fa-solid fa-file-circle-plus mr-2"></i>Mój Raport
                                    </x-button-link-cello>
                                </x-flex-center>
                            </div>
                        </x-widget-display>

                        <x-widget-display class="mt-4 grid-cols-3 grid-rows-1">
                            <div class="col-span-2">
                                <div>
                                    <x-flex-center class="mb-4">
                                        <x-paragraf-display class="text-lg">
                                            Wszystkie godziny w tym miesiącu
                                        </x-paragraf-display>
                                    </x-flex-center>
                                </div>
                                <div>
                                    <x-flex-center class="mb-4">
                                        <x-paragraf-display class="text-4xl">
                                            {{$total_time_in_hours_all}} H
                                        </x-paragraf-display>
                                    </x-flex-center>
                                </div>
                            </div>
                            <div class="col-start-3 h-full">
                                <x-flex-center class="h-full">
                                    <x-button-link-cello class="mt-4" href="">
                                        <i class="fa-solid fa-file-circle-plus mr-2"></i>Firmowy Raport
                                    </x-button-link-cello>
                                </x-flex-center>
                            </div>
                        </x-widget-display>

                        <input type="hidden" id="work_start" value="{{ route('api.work.start', '') }}">
                        <input type="hidden" id="work_stop" value="{{ route('api.work.stop', '') }}">
                        <input type="hidden" id="work_sessions" value="{{ route('api.work.session', ['','']) }}">
                        <input type="hidden" id="user_id" value="{{ $user_id }}">
                        <input type="hidden" id="company_id" value="{{ $company_id }}">
                        <input type="hidden" id="work_sessions_logged_user" value="{{ $work_sessions_logged_user }}">
                        <div id="calendar" class="w-full my-4 appearance-none rounded-lg bg-white border border-white p-4 outline-none"></div>
                        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
                        <script>
                            $(document).ready(function() {
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
                                            $('#timer').text(self.formatTime(self.elapsedSeconds));
                                        }, 1000);
                                        $('#startButton').addClass('hidden');
                                        $('#stopButton').removeClass('hidden');
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
                                        $.ajax({
                                            url: self.workStart + '/' + self.userId,
                                            type: 'GET',
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
                                        $.ajax({
                                            url: self.workStop + '/' + self.session_id,
                                            type: 'GET',
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
                                        $('#date').text(formattedDate);
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
                                        $('#timer').text(self.formatTime(self.elapsedSeconds));
                                        $('#stopButton').addClass('hidden');
                                        $('#startButton').removeClass('hidden');
                                    }

                                    // Funkcja do uruchomienia
                                    run() {
                                        const self = this;
                                        self.updateTodayDate();
                                        self.updateWidgetWorkSession();

                                        $('#startButton').click(function() {
                                            self.startTimer();
                                        });

                                        $('#stopButton').click(function() {
                                            self.stopTimer();
                                        });
                                    }
                                }
                                class WorkSessionsCalendar {
                                    constructor() {
                                        // Inicjalizacja FullCalendar
                                        let calendarEl = $('#calendar')[0]; // Pobierz element kalendarza
                                        let work_sessions_logged_user = $('#work_sessions_logged_user').val(); // Pobierz sesje pracy
                                        let work_sessions = JSON.parse(work_sessions_logged_user); // Parsowanie sesji pracy
                                        var eventsFromDB = [];
                                        work_sessions.forEach(element => {
                                            eventsFromDB.push({
                                                title: element.status,
                                                start: element.start_time,
                                                end: element.end_time,
                                                color: element.status === 'W trakcie pracy' ? '#eab308' : '#84cc16'
                                            });
                                        });
                                        let calendar = new FullCalendar.Calendar(calendarEl, {
                                            locale: 'pl',
                                            initialView: 'timeGridWeek', // Widok miesięczny
                                            selectable: true, // Możliwość zaznaczania dat
                                            editable: true, // Edytowalne wydarzenia
                                            events: eventsFromDB,
                                            header: {
                                                left: 'prev,next today',
                                                center: 'title',
                                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                                            },
                                            dateClick: function(info) {
                                                alert('Kliknięto datę: ' + info.dateStr); // Obsługa kliknięcia w datę
                                            },
                                            eventClick: function(info) {
                                                alert('Kliknięto wydarzenie: ' + info.event.title); // Kliknięcie wydarzenia
                                            }
                                        });
                                        calendar.render(); // Renderowanie kalendarza
                                    }
                                }
                                // Main
                                var workSessions = new WorkSessions();
                                workSessions.run();
                                var workSessionsCalendar = new WorkSessionsCalendar();

                            });
                        </script>




                        <!--
                        <form action="{{route('ocr')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" required>
                            <button type="submit">Rozpoznaj tekst</button>
                        </form>
                        <ul class="grid w-full gap-6 md:grid-cols-2">
                            <!-- Dziś 
                            <li class="md:col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($todayTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Dziś</span>
                                        </div>
                                        <div class="text-sm text-gray-900 dark:text-gray-400">{{ $todayCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ostatnie 7 dni 
                            <li class="md:col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($last7DaysTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Ostatnie 7 dni</span>
                                        </div>
                                        <div class="text-sm text-gray-900 dark:text-gray-400">{{ $last7DaysCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Bieżący miesiąc 
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($currentMonthTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Bieżący miesiąc</span>
                                        </div>
                                        <div class="text-sm text-gray-900 dark:text-gray-400">{{ $currentMonthCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ubiegły miesiąc
                            <li>
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($previousMonthTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Ubiegły miesiąc</span>
                                        </div>
                                        <div class="text-sm text-gray-900 dark:text-gray-400">{{ $previousMonthCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>

                            <!-- Ten rok 
                            <li class="md:col-span-2">
                                <div class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="flex justify-between w-full">
                                            <span class="text-2xl font-semibold text-indigo-500">{{ number_format($currentYearTotal, 2) }} zł</span>
                                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-50">Ten rok</span>
                                        </div>
                                        <div class="text-sm text-gray-900 dark:text-gray-400">{{ $currentYearCount }} sprzedaży</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Dodaj w sekcji head, jeśli jeszcze nie ma 
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 text-gray-800 dark:text-gray-50">Sprzedaż łącznie ostatnie 31 dni</span>
                        </h1>

                        <div class="mt-8 w-full h-full">
                            <div class="w-full h-full">
                                <canvas id="invoiceChart"></canvas>
                            </div>
                        </div>

                        <script>
                            const ctx = document.getElementById('invoiceChart').getContext('2d');
                            const invoiceChart = new Chart(ctx, {
                                type: 'line', // lub 'bar', w zależności od preferencji
                                data: {
                                    labels: @json($dates), // daty z ostatnich 31 dni
                                    datasets: [{
                                        label: 'Brutto',
                                        data: @json($totalValues), // sumy total
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderWidth: 2
                                    }, {
                                        label: 'Netto',
                                        data: @json($subTotalValues), // sumy sub_total
                                        borderColor: 'rgba(153, 102, 255, 1)',
                                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 text-gray-800 dark:text-gray-50">Liczba wystawionych faktur w ostatnich 31 dniach</span>
                        </h1>

                        <div class="mt-8 w-full h-full">
                            <div class="w-full h-full">
                                <canvas id="documentChart"></canvas>
                            </div>
                        </div>

                        <script>
                            const docCtx = document.getElementById('documentChart').getContext('2d');
                            const documentChart = new Chart(docCtx, {
                                type: 'line', // lub 'bar', w zależności od preferencji
                                data: {
                                    labels: @json($dates), // daty z ostatnich 31 dni
                                    datasets: [{
                                        label: 'Liczba dokumentów',
                                        data: @json($documentCounts), // liczba dokumentów
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-200">
                            <span class="sm:order-1 flex-none text-xl font-semibold focus:outline-none focus:opacity-80 text-gray-800 dark:text-gray-50">Koszta łącznie ostatnie 31 dni</span>
                        </h1>
                        <div class="mt-8 w-full h-full">
                            <div class="w-full h-full">
                                <canvas id="costChart"></canvas>
                            </div>
                        </div>

                        <script>
                            const costCtx = document.getElementById('costChart').getContext('2d');
                            const costChart = new Chart(costCtx, {
                                type: 'line', // lub 'bar', w zależności od preferencji
                                data: {
                                    labels: @json($costDates), // daty z ostatnich 31 dni
                                    datasets: [{
                                        label: 'Brutto Kosztów',
                                        data: @json($costTotalValues), // sumy kwot brutto
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        -->
                    </div>
                </div>
                @else
                @include('admin.elements.end_config')
                @endif
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
</x-app-layout>