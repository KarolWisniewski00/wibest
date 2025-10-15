<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!--KW-->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> -->

    <wireui:scripts />
    <!--<script src="//unpkg.com/alpinejs" defer></script>-->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

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
    <input type="hidden" id="work_sessions" value="{{ route('api.work.session', ['','']) }}">
    <input type="hidden" id="user_id" value="{{ $user_id }}">
    <input type="hidden" id="company_id" value="{{ $company_id }}">
    <input type="hidden" id="work_sessions_logged_user" value="{{ $work_sessions_logged_user }}">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
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
                        $('#timer').text(self.formatTime(self.elapsedSeconds));
                    }, 1000);
                    $('#startButtonWidget').addClass('hidden');
                    $('#stopButtonWidget').removeClass('hidden');
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
                    const days = ["Nie", "Pon", "Wto", "Śro", "Czw", "Pią", "Sob"];
                    const daysWidget = ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
                    const months = ["sty", "lut", "mar", "kwi", "maj", "cze", "lip", "sie", "wrz", "paź", "lis", "gru"];
                    const monthsWidget = ["stycznia", "lutego", "marca", "kwietnia", "maja", "czerwca", "lipca", "sierpnia", "września", "października", "listopada", "grudnia"];
                    const today = new Date();
                    const formattedDateWidget = `${daysWidget[today.getDay()]} ${today.getDate()} ${monthsWidget[today.getMonth()]} ${today.getFullYear()}`;
                    const formattedDate = `${days[today.getDay()]} ${today.getDate()} ${months[today.getMonth()]}`;
                    $('#dateWidget').text(formattedDateWidget);
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
                    $('#timerWidget').text(self.formatTime(self.elapsedSeconds));
                    $('#stopButtonWidget').addClass('hidden');
                    $('#startButtonWidget').removeClass('hidden');

                    $('#timer').text(self.formatTime(self.elapsedSeconds));
                    $('#stopButton').addClass('hidden');
                    $('#startButton').removeClass('hidden');
                }

                // Funkcja do uruchomienia
                run() {
                    const self = this;
                    self.updateTodayDate();
                    self.updateWidgetWorkSession();

                    $('#startButton, #startButtonWidget').click(function() {
                        getLocation();
                        self.startTimer();
                    });

                    $('#stopButton, #stopButtonWidget').click(function() {
                        getLocation();
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