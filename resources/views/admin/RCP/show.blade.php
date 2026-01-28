<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                Podgląd elementu RCP w którego skład wchodzą dwa mniejsze zdarzenia START i STOP.
            </div>
            @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
            @if($work_session->status != 'Praca zakończona')
            <div class="p-2 text-sm text-yellow-300 rounded-lg dark:text-yellow-300" role="alert">
                <span>⚠️ Ostrzeżenie!</span> Edycja nie jest możliwa, ponieważ sesja pracy jeszcze nie została zakończona.
            </div>
            @endif
            @endif
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav :countEvents="$countEvents" />

        <!--CONTENT-->
        <x-container-content-form>
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('rcp.work-session.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                <x-container-gray>
                    <!--status-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Status
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <span>
                                    ⏱️ <x-RCP.work-session-status :work_session="$work_session" class="text-2xl m-0 p-0" />
                                </span>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--status-->
                    <!--Czas w pracy-->
                    @php
                    if ($work_session->time_in_work) {
                    [$hours, $minutes, $seconds] = explode(":", $work_session->time_in_work);
                    $totalSeconds = $hours * 3600 + $minutes * 60 + $seconds;
                    } else {
                    $totalSeconds = 0;
                    }
                    @endphp
                    <x-text-cell>
                        <x-text-cell-label>
                            Czas w pracy
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2">
                                @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
                                @if($work_session->status == 'Praca zakończona')
                                @php
                                if ($work_session && $work_session->time_in_work != 0) {
                                $event_start_obj = \App\Models\Event::where('id', $work_session->event_start_id)->first();
                                $event_stop_obj = \App\Models\Event::where('id', $work_session->event_stop_id)->first();
                                $startDateEvent = \Carbon\Carbon::parse($event_start_obj->time);
                                $stopDateEvent = \Carbon\Carbon::parse($event_stop_obj->time);
                                // Sprawdza, czy stopDateEvent ma inną datę niż startDateEvent
                                if (!$stopDateEvent->isSameDay($startDateEvent)) {
                                $work_session->night = true; // Praca przeszła przez północ
                                } else {
                                $work_session->night = false; // Praca zakończyła się w tym samym dniu
                                }
                                }
                                @endphp
                                <div class="flex flex-col items-center justify-center h-full w-full">
                                    <span class="text-lg md:text-xl">
                                        @if($work_session->night == true)
                                        🌙
                                        @else
                                        ⏱️
                                        @endif
                                    </span>
                                    <x-label-green class="mt-1">
                                        RCP
                                    </x-label-green>
                                </div>
                                @endif
                                @if($work_session->status == 'Praca zakończona')
                                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                    <x-paragraf-display class="text-2xl whitespace-nowrap font-semibold w-fit text-start relative">
                                        <x-status-dark>
                                            {{$startDateEvent->format('H:i')}} - {{$stopDateEvent->format('H:i')}}
                                        </x-status-dark>
                                    </x-paragraf-display>
                                    <x-paragraf-display class="text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-2xl whitespace-nowrap font-semibold w-fit text-start relative">
                                        {{ $work_session->time_in_work }}
                                    </x-paragraf-display>
                                </div>
                                @else
                                <div class="flex flex-col items-center justify-center h-full w-full">
                                    <span class="text-lg md:text-xl">
                                        ⏱️
                                    </span>
                                    <x-label-green class="mt-1">
                                        RCP
                                    </x-label-green>
                                </div>
                                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                    <x-paragraf-display class="text-2xl whitespace-nowrap font-semibold w-fit text-start relative">
                                        <x-status-dark>
                                            {{\Carbon\Carbon::parse(\App\Models\Event::where('id', $work_session->event_start_id)->first()->time)->format('H:i')}} - TERAZ
                                        </x-status-dark>
                                    </x-paragraf-display>
                                    <x-paragraf-display id="counting_work_session" class="text-gray-900 dark:text-gray-50 text-2xl whitespace-nowrap font-semibold w-fit text-start relative">
                                        00:00:00
                                    </x-paragraf-display>
                                </div>

                                @php
                                // 1. Parsowanie daty początkowej z bazy danych
                                // Używamy Carbon::parse, zakładając, że $work_session->eventStart->time zawiera poprawny string daty.
                                $startTime = \Carbon\Carbon::parse($work_session->eventStart->time);

                                // 2. Pobranie aktualnego czasu
                                $now = \Carbon\Carbon::now();

                                // 3. Obliczenie różnicy w sekundach (wartość absolutna)
                                $secondsElapsed = $startTime->diffInSeconds($now, true);
                                @endphp
                                <input type="hidden" id="seconds_elapsed" name="seconds_elapsed" value="{{ $secondsElapsed }}">
                                <script>
                                    $(document).ready(function() {
                                        class WorkSessions {
                                            constructor() {
                                                const self = this;
                                                self.timerInterval = null; // Zmienna do przechowywania interwału
                                                self.elapsedSeconds = $('#seconds_elapsed').val(); // Licznik sekund
                                            }
                                            // Funkcja do liczenia czasu
                                            counting() {
                                                const self = this;
                                                self.timerInterval = setInterval(() => {
                                                    self.elapsedSeconds++;
                                                    $('#counting_work_session').text(self.formatTime(self.elapsedSeconds));
                                                }, 1000);
                                            }

                                            // Funkcja do formatowania czasu
                                            formatTime(seconds) {
                                                const self = this;
                                                const hrs = String(Math.floor(seconds / 3600)).padStart(2, '0');
                                                const mins = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
                                                const secs = String(seconds % 60).padStart(2, '0');
                                                return `${hrs}:${mins}:${secs}`;
                                            }

                                            // Funkcja do uruchomienia
                                            run() {
                                                const self = this;
                                                self.counting();
                                            }
                                        }

                                        // Main
                                        var workSessions = new WorkSessions();
                                        workSessions.run();
                                    });
                                </script>
                                @endif
                                @endif
                            </x-text-cell-span>
                        </x-text-cell-value>
                        <x-text-cell-value>
                            <x-text-cell-span>
                                <x-paragraf-display class="text-2xl whitespace-nowrap font-semibold w-fit text-start relative">
                                    <div class="flex flex-col">
                                        @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
                                        @else
                                        <span title="Error">
                                            ❌ <x-status-red>Error</x-status-red>
                                        </span>
                                        <span title="Brak zdarzenia stop">
                                            ❌ <x-status-red>Brak zdarzenia stop</x-status-red>
                                        </span>
                                        @endif
                                        @if($work_session->time_in_work == '24:00:00')
                                        <span title="Automatyczne zakończenie">
                                            ⚠️ <x-status-yellow>Automatyczne zakończenie</x-status-yellow>
                                        </span>
                                        @endif
                                        @if($work_session->user->overtime_task)
                                        @if($task && $work_session->task_id == null)
                                        <span title="Brak zadania">
                                            ⚠️ <x-status-yellow>Brak zadania</x-status-yellow>
                                        </span>
                                        @endif
                                        @endif
                                    </div>
                                </x-paragraf-display>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Czas w pracy-->
                    <!--Użytkownik-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Użytkownik
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2">
                                <x-user-photo :user="$work_session->user" />
                                <x-user-name-xl :user="$work_session->user" />
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Użytkownik-->
                    <!-- Przesuń czas -->
                    @if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona'))
                    @if($work_session->user->working_hours_regular == 'stały planing')
                    @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                    @if($work_session->status == 'Praca zakończona' && $work_session->time_in_work == '24:00:00' && $work_session->user->working_hours_from && $work_session->user->working_hours_to && $work_session->user->working_hours_start_day && $work_session->user->working_hours_stop_day)
                    <x-text-cell>
                        <x-text-cell-label>
                            Przesuń czas
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2 w-full">
                                <div class="flex flex-col items-start w-full justify-start gap-2">
                                    <x-button-link-green class="text-lg w-full" href="{{ route('rcp.work-session.start.plus', $work_session) }}">
                                        <i class="fa-solid fa-clock mr-2"></i>start + {{$work_session->user->working_hours_custom}}h
                                    </x-button-link-green>
                                    <x-button-link-red class="text-lg w-full" href="{{ route('rcp.work-session.stop.minus', $work_session) }}">
                                        <i class="fa-solid fa-clock mr-2"></i>stop - {{$work_session->user->working_hours_custom}}h
                                    </x-button-link-red>
                                </div>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    @endif
                    @endif
                    @endif
                    @else
                    <x-text-cell>
                        <x-text-cell-label>
                            Napraw czas
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2 w-full">
                                <div class="flex flex-col items-start w-full justify-start gap-2">
                                    <x-button-link-red class="text-lg w-full" href="{{ route('rcp.work-session.start.plus.fix', $work_session) }}">
                                        <i class="fa-solid fa-clock mr-2"></i>Dodaj zdarzenie stop
                                    </x-button-link-red>
                                </div>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    @endif
                    <!-- Przesuń czas -->
                </x-container-gray>
                <x-container-gray>
                    <x-text-cell-label>
                        Notatka
                    </x-text-cell-label>
                    @if($work_session->notes != null)
                    <x-text-cell-value>
                        <div class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                            {!! $work_session->notes !!}
                        </div>
                    </x-text-cell-value>
                    @endif
                    @if($work_session->notes == null)
                    <x-button-link-green href="{{ route('rcp.work-session.create.note', $work_session) }}" class="text-lg">
                        <i class="fa-solid fa-plus mr-2"></i>Dodaj notatkę
                    </x-button-link-green>
                    @else
                    <x-button-link-blue href="{{route('rcp.work-session.edit.note', $work_session)}}" class="text-lg">
                        <i class="fa-solid fa-pen-to-square mr-2"></i>Edycja notatki
                    </x-button-link-blue>
                    @endif
                </x-container-gray>
                @if($work_session->user->overtime_task)
                @if($work_session && $work_session->task_id)
                <x-container-gray class="md:col-span-2">
                    <x-text-cell>
                        <x-text-cell-label>
                            Zdarzenie
                        </x-text-cell-label>
                        <x-status-gray class="text-2xl">
                            🎯 Zadanie
                        </x-status-gray>
                    </x-text-cell>
                    @if($work_session->task->status != null)
                    <x-text-cell>
                        <x-text-cell-label>
                            Status
                        </x-text-cell-label>
                        @if($work_session->task->status == 'oczekujące')
                        <x-status-yellow class="text-2xl">
                            🟡 {{ $work_session->task->status }}
                        </x-status-yellow>
                        @elseif($work_session->task->status == 'zaakceptowane')
                        <x-status-green class="text-2xl">
                            🟢 {{ $work_session->task->status }}
                        </x-status-green>
                        @elseif($work_session->task->status == 'odrzucone')
                        <x-status-red class="text-2xl">
                            🔴 {{ $work_session->task->status }}
                        </x-status-red>
                        @endif
                    </x-text-cell>
                    @endif
                    <x-text-cell>
                        <x-text-cell-label>
                            Treść
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <div class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                                {!! $work_session->task->note !!}
                            </div>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Czas w pracy-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Kiedy
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2 w-full">
                                <x-status-cello>
                                    📅 {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work_session->task->time)->format('d.m.Y H:i:s') ?? '' }}
                                </x-status-cello>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Czas w pracy-->
                    @if($work_session->task->note != null)
                    @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                    @if($work_session->task->status == 'oczekujące')
                    <x-button-link-green href="{{ route('rcp.event.accept', $work_session->task) }}" class="text-lg">
                        <i class="fa-solid fa-check mr-2"></i>Akceptuj
                    </x-button-link-green>
                    <x-button-link-red href="{{ route('rcp.event.reject', $work_session->task) }}" class="text-lg">
                        <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                    </x-button-link-red>
                    @endif
                    @if($work_session->task->status == 'odrzucone')
                    <x-button-link-green href="{{ route('rcp.event.accept', $work_session->task) }}" class="text-lg">
                        <i class="fa-solid fa-check mr-2"></i>Akceptuj
                    </x-button-link-green>
                    @endif
                    @if($work_session->task->status == 'zaakceptowane')
                    <x-button-link-red href="{{ route('rcp.event.reject', $work_session->task) }}" class="text-lg">
                        <i class="fa-solid fa-xmark mr-2"></i>Odrzuć
                    </x-button-link-red>
                    @endif
                    @endif
                    @endif
                </x-container-gray>
                @else
                @if($task)
                <div class="md:col-span-2 grid grid-cols-1 gap-4 w-full p-4 border-2 dark:border-gray-700 rounded-lg">
                    <x-status-gray class="text-2xl">
                        🎯 Zadanie
                    </x-status-gray>
                    <!--POWRÓT-->
                    <form id="myForm" method="POST" action="{{ route('rcp.work-session.store.task', $work_session) }}" class="space-y-4">
                        @csrf
                        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
                        <style>
                            #editor {
                                border: 0;
                                height: min-content;
                            }

                            .ql-toolbar {
                                border: 0 !important;
                                background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                                border-radius: 0.375rem;
                                overflow-y: auto;
                                padding: 8px 12px !important;
                                margin: 0 !important;
                            }

                            .ql-editor {
                                background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                                padding: 8px 12px !important;
                            }

                            @media (prefers-color-scheme: dark) {
                                .ql-toolbar {
                                    background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                }

                                .ql-editor {
                                    background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                }

                                .ql-editor.ql-blank::before {
                                    color: #9ca3af;
                                    /* Tailwind gray-400 */
                                }

                                .ql-toolbar {
                                    background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                }

                                .ql-italic .ql-stroke {
                                    stroke: white !important;
                                }

                                .ql-underline .ql-stroke {
                                    stroke: white !important;
                                }

                                .ql-bold .ql-stroke {
                                    stroke: white !important;
                                }

                                .ql-fill {
                                    fill: white !important;
                                }

                                .ql-italic:hover .ql-stroke {
                                    stroke: #9ca3af !important;
                                }

                                .ql-underline:hover .ql-stroke {
                                    stroke: #9ca3af !important;
                                }

                                .ql-bold:hover .ql-stroke {
                                    stroke: #9ca3af !important;
                                }

                                .ql-underline:hover .ql-fill {
                                    fill: #9ca3af !important;
                                }
                            }
                        </style>
                        <div id="editor" class="bg-white dark:bg-gray-700 dark:text-white rounded-md h-fit overflow-y-auto">

                        </div>

                        <textarea id="editor-content" name="content" style="display:none;"></textarea>
                        <script>
                            const quill = new Quill('#editor', {
                                theme: 'snow',
                                placeholder: '👈 Wpisz tutaj treść...',
                                modules: {
                                    toolbar: [
                                        ['bold', 'italic', 'underline'],
                                    ]
                                }
                            });
                            // Synchronizuj zawartość edytora z ukrytym polem tekstowym
                            document.getElementById('myForm').onsubmit = function() {
                                var editorContent = document.getElementById('editor-content');
                                editorContent.value = quill.root.innerHTML;
                            };
                        </script>
                        <div class="flex justify-end mt-4">
                            <x-button-green type="submit" class="text-lg">
                                <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                            </x-button-green>
                        </div>
                    </form>
                </div>
                @endif
                @endif
                @endif
                @if($work_session->eventStart != null)
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <x-container-gray>
                    <!--status-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Zdarzenie
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2 w-full">
                                <x-status-green>
                                    🟢 Start
                                </x-status-green>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--status-->
                    <!--Czas w pracy-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Kiedy
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2 w-full">
                                <x-status-cello>
                                    📅 {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work_session->eventStart->time)->format('d.m.Y H:i:s') ?? '' }}
                                </x-status-cello>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Czas w pracy-->
                    @if($work_session->eventStart->location)
                    <!--Lokalizacja-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Lokalizacja
                        </x-text-cell-label>
                        <div id="map_start" style="z-index:1; height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;"></div>
                    </x-text-cell>
                    <!--Lokalizacja-->
                    <input type="hidden" id="latitude_start" value="{{$work_session->eventStart->location->latitude}}">
                    <input type="hidden" id="longitude_start" value="{{$work_session->eventStart->location->longitude}}">
                    <script>
                        $(document).ready(function() {
                            // 1. Odczytanie danych z ukrytych inputów
                            const latitude = $('#latitude_start').val();
                            const longitude = $('#longitude_start').val();

                            // Konwersja na liczby zmiennoprzecinkowe jest często bezpieczna
                            const lat = parseFloat(latitude);
                            const lon = parseFloat(longitude);

                            // Sprawdzenie, czy dane zostały poprawnie odczytane (opcjonalne, ale zalecane)
                            if (isNaN(lat) || isNaN(lon)) {
                                console.error('Nie udało się odczytać prawidłowych współrzędnych z ukrytych pól.');
                                return; // Przerwij działanie, jeśli dane są nieprawidłowe
                            }

                            // 2. Inicjalizacja mapy Leaflet
                            const map = L.map('map_start').setView([lat, lon], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                            const greenIcon = L.icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                            });
                            L.marker([lat, lon], {
                                icon: greenIcon
                            }).addTo(map);
                        });
                    </script>
                    @endif
                </x-container-gray>
                @endif
                @if($work_session->eventStop != null)
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <x-container-gray>
                    <!--status-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Zdarzenie
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2 w-full">
                                <x-status-red>
                                    🔴 Stop
                                </x-status-red>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--status-->
                    <!--Czas w pracy-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Kiedy
                        </x-text-cell-label>
                        <x-text-cell-value>
                            <x-text-cell-span class="gap-2 w-full">
                                <x-status-cello>
                                    📅 {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work_session->eventStop->time)->format('d.m.Y H:i:s') ?? '' }}
                                </x-status-cello>
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                    <!--Czas w pracy-->
                    @if($work_session->eventStop->location)
                    <!--Lokalizacja-->
                    <x-text-cell>
                        <x-text-cell-label>
                            Lokalizacja
                        </x-text-cell-label>
                        <div id="map_stop" style="z-index:1; height: 300px; width: 100%; border-radius: 0.5rem; margin-top: 1rem;"></div>
                    </x-text-cell>
                    <!--Lokalizacja-->
                    <input type="hidden" id="latitude_stop" value="{{$work_session->eventStop->location->latitude}}">
                    <input type="hidden" id="longitude_stop" value="{{$work_session->eventStop->location->longitude}}">
                    <script>
                        $(document).ready(function() {
                            // 1. Odczytanie danych z ukrytych inputów
                            const latitude = $('#latitude_stop').val();
                            const longitude = $('#longitude_stop').val();

                            // Konwersja na liczby zmiennoprzecinkowe jest często bezpieczna
                            const lat = parseFloat(latitude);
                            const lon = parseFloat(longitude);

                            // Sprawdzenie, czy dane zostały poprawnie odczytane (opcjonalne, ale zalecane)
                            if (isNaN(lat) || isNaN(lon)) {
                                console.error('Nie udało się odczytać prawidłowych współrzędnych z ukrytych pól.');
                                return; // Przerwij działanie, jeśli dane są nieprawidłowe
                            }

                            // 2. Inicjalizacja mapy Leaflet
                            const map = L.map('map_stop').setView([lat, lon], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
                            const redIcon = L.icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                            });
                            L.marker([lat, lon], {
                                icon: redIcon
                            }).addTo(map);
                        });
                    </script>
                    @endif
                </x-container-gray>
                @endif
            </div>
            <div class="flex flex-col md:flex-row justify-end gap-4 mt-4">
                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                @if($work_session->status == 'Praca zakończona')
                <!-- EDYTUJ -->
                <x-button-link-blue href="{{route('rcp.work-session.edit', $work_session)}}" class="text-lg">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                </x-button-link-blue>
                <!--EDYTUJ-->
                @endif
                <form action="{{route('rcp.work-session.delete', $work_session)}}" class="w-full md:w-fit"
                    method="POST"
                    onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                    @csrf
                    @method('DELETE')
                    <x-button-red type="submit" class="text-lg w-full md:w-fit">
                        <i class="fa-solid fa-trash mr-2"></i>USUŃ
                    </x-button-red>
                </form>
                @endif
            </div>
            @if($work_session->info)
            <x-label class="py-2 mt-4">
                {{ $work_session->info }}
            </x-label>
            @endif
            <x-label class="py-2">
                Utworzono {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work_session->created_at)->format('d.m.Y H:i:s') ?? '' }}
            </x-label>
            <x-label class="py-2">
                Utoworzono przez {{ $work_session->created_user->name }}
            </x-label>
            <x-label class="py-2">
                Ostatnia aktualizacja {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work_session->updated_at)->format('d.m.Y H:i:s') ?? '' }}
            </x-label>
        </x-container-content-form>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>