<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--ICON-->
    <link rel="icon" href="{{ asset('wibest_icon_transparent_bg.png') }}" type="image/png">
    <meta property="og:image" content="{{ asset('wibest_icon_transparent_bg.png') }}" />

    <title>WIBEST RCP</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!--KW-->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> -->

    <wireui:scripts />
    <!--<script src="//unpkg.com/alpinejs" defer></script>-->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <x-banner />

    <div class="min-h-screen">
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <input type="hidden" id="work_start" value="{{ route('api.work.start', '') }}">
    <input type="hidden" id="work_stop" value="{{ route('api.work.stop', '') }}">
    <input type="hidden" id="work_sessions" value="{{ route('api.work.session', ['', '']) }}">
    <input type="hidden" id="user_id" value="{{ $user_id }}">
    <input type="hidden" id="company_id" value="{{ $company_id }}">
    <input type="hidden" id="work_sessions_logged_user" value="{{ $work_sessions_logged_user }}">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <input type="hidden" id="lat" value="">
    <input type="hidden" id="lon" value="">
    <script>
        $(document).ready(function () {
            function getLocation(type) {
                return new Promise((resolve) => {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            position => {
                                showPosition(position, type);
                                resolve(true); // sukces
                            },
                            error => {
                                showError(error, type);
                                resolve(false); // błąd, ale dalej kontynuujemy
                            }
                        );
                    } else {
                        $('#locationWidget').text("Geolokalizacja nie jest wspierana przez tę przeglądarkę.");
                        resolve(false);
                    }
                });
            }

            function showPosition(position, type) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                const acc = position.coords.accuracy;

                $('#locationWidget').text(
                    "Szerokość: " + lat + "\nDługość: " + lon + "\nDokładność: " + Math.round(acc) + " metrów"
                );

                $('#locationGeo'+type).text(
                    lat + ", " + lon
                );
                $('#locationAcc'+type).text(
                    Math.round(acc) + " m"
                );

                $('#lat').val(lat);
                $('#lon').val(lon);
            }

            function showError(error, type) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        $('#locationWidget').text("Użytkownik odmówił dostępu do lokalizacji.");
                        $('#locationWrapper'+type).addClass('hidden')
                        break;
                    case error.POSITION_UNAVAILABLE:
                        $('#locationWidget').text("Informacje o lokalizacji są niedostępne.");
                        $('#locationWrapper'+type).addClass('hidden')
                        break;
                    case error.TIMEOUT:
                        $('#locationWidget').text("Przekroczono czas oczekiwania na lokalizację.");
                        $('#locationWrapper'+type).addClass('hidden')
                        break;
                    case error.UNKNOWN_ERROR:
                        $('#locationWidget').text("Wystąpił nieznany błąd.");
                        $('#locationWrapper'+type).addClass('hidden')
                        break;
                }
            }
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
                    self.work_session_start_time = null;
                    self.work_session_stop_time = null;
                }
                // Funkcja do liczenia czasu
                counting() {
                    $('#clock_info').text("Obliczanie czasu pracy...");
                    $('#statusText')
                        .text("Obliczanie czasu pracy")
                        .addClass('text-gray-700 dark:text-gray-300')
                        .removeClass('text-green-700 dark:text-green-300');
                    $('#statusPing')
                        .addClass('bg-gray-300')
                        .removeClass('bg-green-300')
                        .removeClass('hidden');
                    $('#statusDot')
                        .addClass('bg-gray-300')
                        .removeClass('bg-green-300');
                    $('#statusWrapper')
                        .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                        .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                    const self = this;
                    self.timerInterval = setInterval(() => {
                        self.elapsedSeconds++;
                        $('#timerWidget').text(self.formatTime(self.elapsedSeconds));
                        $('#timer').text(self.formatTime(self.elapsedSeconds));
                    }, 1000);

                    if(self.work_session_start_time){
                        $('#startTimeWidget').text(self.work_session_start_time.split(" ")[1]);
                    }
                    if(self.work_session_stop_time){
                        $('#stopTimeWidget').text(self.work_session_stop_time.split(" ")[1]);
                    }
                    


                    $('#startButtonWidget').addClass('hidden');
                    $('#stopButtonWidget').removeClass('hidden');
                    $('#startButton').addClass('hidden');
                    $('#stopButton').removeClass('hidden');

                    $('#loaderTimerWidget').addClass('hidden');
                    $('#loaderLocationWidget').addClass('hidden');
                    $('#locationWidget').removeClass('hidden');
                    $('#loaderClockWidget').addClass('hidden');
                    $('#timerWidget').removeClass('hidden');

                    $('#loaderTimer').addClass('hidden');
                    $('#loaderClock').addClass('hidden');
                    $('#timer').removeClass('hidden');
                    $('#clock_info').text("");
                    $('#statusText')
                        .text("Jesteś w trakcie pracy")
                        .removeClass('text-gray-700 dark:text-gray-300')
                        .addClass('text-green-700 dark:text-green-300');
                    $('#statusPing')
                        .removeClass('bg-gray-300')
                        .removeClass('hidden')
                        .addClass('bg-green-300');
                    $('#statusDot')
                        .removeClass('bg-gray-300')
                        .addClass('bg-green-300');
                    $('#statusWrapper')
                        .removeClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                        .addClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                }

                // Funkcja do pobierania sesji pracy
                updateWidgetWorkSession() {
                    $('#clock_info').text("Ładowanie obecnej sesji pracy...");
                    $('#statusText')
                        .text("Ładowanie sesji pracy")
                        .addClass('text-gray-700 dark:text-gray-300')
                        .removeClass('text-green-700 dark:text-green-300');
                    $('#statusPing')
                        .addClass('bg-gray-300')
                        .removeClass('hidden')
                        .removeClass('bg-green-300');
                    $('#statusDot')
                        .addClass('bg-gray-300')
                        .removeClass('bg-green-300');
                    $('#statusWrapper')
                        .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                        .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                    $('#planingWrapper').removeClass('hidden');
                    $('#loaderPlaningWrapper').addClass('hidden');
                    const self = this;
                    $.ajax({
                        url: self.workSessions + '/' + self.userId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            $('#clock_info').text("");
                            $('#statusText').text("");
                            if (response.message === 'W trakcie pracy') {
                                self.session_id = response.work_session_id;
                                self.session_status = response.work_session_status;
                                const dateString = response.work_session_start_time;
                                self.work_session_start_time = response.work_session_start_time;
                                const date = new Date(dateString.replace(" ", "T")); // Konwersja na format ISO 8601
                                const now = new Date(); // Aktualny czas
                                const diffInSeconds = Math.floor((now - date) / 1000);
                                self.elapsedSeconds = diffInSeconds;
                                self.counting();
                            }
                        },
                        error: function (xhr, status, error) {
                            $('#clock_info').text("");
                            $('#statusText')
                                .text("Jesteś poza pracą")
                                .addClass('text-gray-700 dark:text-gray-300')
                                .removeClass('text-green-700 dark:text-green-300');
                            $('#statusPing')
                                .addClass('bg-gray-300')
                                .addClass('hidden')
                                .removeClass('bg-green-300');
                            $('#statusDot')
                                .addClass('bg-gray-300')
                                .removeClass('bg-green-300');
                            $('#statusWrapper')
                                .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                                .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                            $('#startButtonWidget').removeClass('hidden');
                            $('#loaderTimerWidget').addClass('hidden');
                            $('#loaderLocationWidget').addClass('hidden');
                            $('#locationWidget').removeClass('hidden');
                            $('#loaderClockWidget').addClass('hidden');
                            $('#timerWidget').removeClass('hidden');

                            $('#startButton').removeClass('hidden');
                            $('#loaderTimer').addClass('hidden');
                            $('#loaderClock').addClass('hidden');
                            $('#timer').removeClass('hidden');
                        }
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
                        success: function (response) {
                            self.session_id = response.work_session_id;
                            toastr.success('Rozpoczęto pracę');
                            self.counting();
                            let height = $('#totalDay').height();
                            $('#loaderTotalDay').height(height);
                            $('#loaderTotalDay').removeClass('hidden');
                            $('#totalDay').addClass('hidden');
                            $('#loaderTimerWidget').addClass('hidden');
                            $('#loaderTimer').addClass('hidden');
                            $('#clock_info').text("");
                            $('#statusText').text("Jesteś w trakcie pracy");
                            self.work_session_start_time = response.work_session_start_time;
                        },
                        error: function (xhr, status, error) {
                            toastr.error('Błąd podczas rozpoczęcia pracy');
                            clearInterval(self.timerInterval);
                            self.timerInterval = null;
                            self.elapsedSeconds = 0;
                            $('#startButtonWidget').addClass('hidden');
                            $('#stopButtonWidget').addClass('hidden');
                            $('#startButton').addClass('hidden');
                            $('#stopButton').addClass('hidden');

                            $('#loaderTimerWidget').removeClass('hidden');
                            $('#loaderLocationWidget').removeClass('hidden');
                            $('#locationWidget').addClass('hidden');
                            $('#loaderClockWidget').removeClass('hidden');
                            $('#timerWidget').addClass('hidden');

                            $('#loaderTimer').removeClass('hidden');
                            $('#loaderClock').removeClass('hidden');
                            $('#timer').addClass('hidden');
                            $('#clock_info').text("Błąd podczas rozpoczęcia pracy");
                            $('#statusText')
                                .text("Wystąpił błąd")
                                .addClass('text-gray-700 dark:text-gray-300')
                                .removeClass('text-green-700 dark:text-green-300');
                            $('#statusPing')
                                .addClass('bg-gray-300')
                                .removeClass('hidden')
                                .removeClass('bg-green-300');
                            $('#statusDot')
                                .addClass('bg-gray-300')
                                .removeClass('bg-green-300');
                            $('#statusWrapper')
                                .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                                .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                        }
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
                        success: function (response) {
                            toastr.success('Zakończono pracę');
                            let height = $('#totalDay').height();
                            $('#loaderTotalDay').height(height);
                            $('#loaderTotalDay').removeClass('hidden');
                            $('#totalDay').addClass('hidden');
                            clearInterval(self.timerInterval);
                            self.elapsedSeconds = 0;
                            $('#timerWidget').text(self.formatTime(self.elapsedSeconds));
                            $('#stopButtonWidget').addClass('hidden');
                            $('#startButtonWidget').removeClass('hidden');
                            $('#loaderTimerWidget').addClass('hidden');

                            $('#timer').text(self.formatTime(self.elapsedSeconds));
                            $('#stopButton').addClass('hidden');
                            $('#startButton').removeClass('hidden');
                            $('#loaderTimer').addClass('hidden');
                            $('#clock_info').text("");
                            $('#statusText').text("Jesteś poza pracą");
                            $('#statusPing')
                                .addClass('bg-gray-300')
                                .addClass('hidden')
                                .removeClass('bg-green-300');
                            $('#statusDot')
                                .addClass('bg-gray-300')
                                .removeClass('bg-green-300');
                            $('#statusWrapper')
                                .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                                .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                        },
                        error: function (xhr, status, error) {
                            toastr.error('Błąd podczas zakończenia pracy');
                            $('#clock_info').text("Błąd podczas zakończenia pracy");
                            $('#statusText')
                                .text("Wystąpił błąd")
                                .addClass('text-gray-700 dark:text-gray-300')
                                .removeClass('text-green-700 dark:text-green-300');
                            $('#statusPing')
                                .addClass('bg-gray-300')
                                .removeClass('bg-green-300')
                                .removeClass('hidden');
                            $('#statusDot')
                                .addClass('bg-gray-300')
                                .removeClass('bg-green-300');
                            $('#statusWrapper')
                                .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                                .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                        }
                    });
                }

                // Funkcja do aktualizacji daty
                updateTodayDate() {
                    const self = this;
                    const days = ["Ndz", "Pon", "Wt", "Śr", "Czw", "Pt", "Sob"];
                    const daysWidget = ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
                    const months = ["sty", "lut", "mar", "kwi", "maj", "cze", "lip", "sie", "wrz", "paź", "lis", "gru"];
                    const monthsWidget = ["stycznia", "lutego", "marca", "kwietnia", "maja", "czerwca", "lipca", "sierpnia", "września", "października", "listopada", "grudnia"];
                    const today = new Date();
                    const formattedDateWidget = `${daysWidget[today.getDay()]} ${today.getDate()} ${monthsWidget[today.getMonth()]} ${today.getFullYear()}`;
                    const formattedDate = `${days[today.getDay()]} ${today.getDate()} ${months[today.getMonth()]}`;
                    $('.dateWidget').text(formattedDateWidget);
                    $('#date').text(formattedDate);
                    $('#loaderDateWidget').addClass('hidden');
                    $('#loaderDate').addClass('hidden');
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
                }

                // Funka do zakończenia liczenia czasu
                stopTimer() {
                    const self = this;
                    self.ajaxStop();
                }

                // Funkcja do uruchomienia
                run() {
                    const self = this;
                    self.updateTodayDate();
                    self.updateWidgetWorkSession();

                    $('#startButton, #startButtonWidget').click(async function () {
                        $('#clock_info').text("Wysyłanie danych rozpoczęcia pracy...");
                        $('#statusText')
                            .text("Wysyłanie danych")
                            .addClass('text-gray-700 dark:text-gray-300')
                            .removeClass('text-green-700 dark:text-green-300');
                        $('#statusPing')
                            .addClass('bg-gray-300')
                            .removeClass('bg-green-300')
                            .removeClass('hidden');
                        $('#statusDot')
                            .addClass('bg-gray-300')
                            .removeClass('bg-green-300');
                        $('#statusWrapper')
                            .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                            .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                        $('#startButtonWidget').addClass('hidden');
                        $('#startButton').addClass('hidden');
                        $('#loaderTimerWidget').removeClass('hidden');
                        $('#loaderTimer').removeClass('hidden');
                        await getLocation("Start");
                        self.startTimer();
                    });

                    $('#stopButton, #stopButtonWidget').click(async function () {
                        $('#clock_info').text("Wysyłanie danych zakończenia pracy...");
                        $('#statusText')
                            .text("Wysyłanie danych")
                            .addClass('text-gray-700 dark:text-gray-300')
                            .removeClass('text-green-700 dark:text-green-300');
                        $('#statusPing')
                            .addClass('bg-gray-300')
                            .removeClass('bg-green-300')
                            .removeClass('hidden');
                        $('#statusDot')
                            .addClass('bg-gray-300')
                            .removeClass('bg-green-300');
                        $('#statusWrapper')
                            .addClass('bg-gray-100 dark:bg-gray-500/10 border-gray-200 dark:border-gray-500/20')
                            .removeClass('bg-green-100 dark:bg-green-500/10 border-green-200 dark:border-green-500/20');
                        $('#stopButtonWidget').addClass('hidden');
                        $('#stopButton').addClass('hidden');
                        $('#loaderTimerWidget').removeClass('hidden');
                        $('#loaderTimer').removeClass('hidden');
                        await getLocation("Stop");
                        self.stopTimer();
                    });
                }
            }

            // Main
            var workSessions = new WorkSessions();
            workSessions.run();
        });
    </script>
    @stack('modals')

    @livewireScripts
</body>

</html>