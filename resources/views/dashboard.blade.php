<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    @php
    $shortType = ['wolne za pracę w święto' => 'WPS',
    'zwolnienie lekarskie' => 'ZL',
    'urlop wypoczynkowy' => 'UW',
    'urlop rodzicielski' => 'UR',
    'wolne za nadgodziny' => 'WN',
    'wolne za święto w sobotę' => 'WSS',
    'urlop bezpłatny' => 'UB',
    'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
    'zwolnienie lekarsie - opieka' => 'ZLO',
    'urlop okolicznościowy' => 'UO',
    'urlop wypoczynkowy "na żądanie"' => 'UWZ',
    'oddanie krwi' => 'OK',
    'urlop ojcowski' => 'UOJC',
    'urlop macieżyński' => 'UM',
    'świadczenie rehabilitacyjne' => 'SR',
    'opieka' => 'OP',
    'świadek w sądzie' => 'SWS',
    'praca zdalna' => 'PZ',
    'kwarantanna' => 'KW',
    'kwarantanna z pracą zdalną' => 'KWZPZ',
    'delegacja' => 'DEL'
    ];
    $icons = [
    'wolne za pracę w święto' => '🕊️',
    'zwolnienie lekarskie' => '🤒',
    'urlop wypoczynkowy' => '🏖️',
    'urlop rodzicielski' => '👶',
    'wolne za nadgodziny' => '⏰',
    'wolne za święto w sobotę' => '🗓️',
    'urlop bezpłatny' => '💸',
    'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
    'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
    'urlop okolicznościowy' => '🎉',
    'urlop wypoczynkowy "na żądanie"' => '📢',
    'oddanie krwi' => '🩸',
    'urlop ojcowski' => '👨‍👧',
    'urlop macieżyński' => '🤱',
    'świadczenie rehabilitacyjne' => '🦾',
    'opieka' => '🧑‍🍼',
    'świadek w sądzie' => '⚖️',
    'praca zdalna' => '💻',
    'kwarantanna' => '🦠',
    'kwarantanna z pracą zdalną' => '🏠💻',
    'delegacja' => '✈️',
    ];
    @endphp
    <x-main-no-filter>
        <!--HEADER-->
        <div class="flex flex-col w-full md:pt-4 md:px-4">
            <x-h1-display class="text-center md:text-start mb-4 md:mb-0">
                👋 Cześć, {{auth()->user()->name}}!
            </x-h1-display>
        </div>
        <!--HEADER-->

        @if($date['isHoliday'] == true)
        <!--ŚUW -->
        <x-container class="">
            <x-widget-display-nav class="grid grid-cols-1 gap-4 p-4 w-full">
                <!-- Lewa kolumna: Data i Timer -->
                <div class="space-y-6 flex flex-col justify-center">
                    <!-- Data -->
                    <x-flex-center>
                        <x-paragraf-display id="dateWidget" class="dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300">
                            <!-- Data -->
                        </x-paragraf-display>
                    </x-flex-center>

                    <!-- Timer -->
                    <x-flex-center>
                        <x-paragraf-display class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                            <div class="flex flex-row gap-2 justify-start items-center">
                                <div class="text-7xl mx-2">🎌</div>
                                <div class="flex flex-col gap-2 items-center md:items-start">
                                    <div class="text-2xl inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 mb-1">Święto ustawowo wolne</div>
                                    <span class="px-3 py-1 rounded-full text-md w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        ŚUW
                                    </span>
                                </div>
                            </div>
                        </x-paragraf-display>
                    </x-flex-center>
                </div>
            </x-widget-display-nav>
        </x-container>
        <!--ŚUW -->
        @endif
        @if($date['leave'] == null)
        <!--START STOP + ZDARZENIA -->
        <x-container class="">
            <x-widget-display-nav class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 w-full">
                <!-- Lewa kolumna: Data i Timer -->
                <div class="space-y-6 flex flex-col justify-center">
                    <!-- Data -->
                    <x-flex-center>
                        <x-paragraf-display id="dateWidget" class="dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300">
                            <!-- Data -->
                        </x-paragraf-display>
                    </x-flex-center>

                    <!-- Timer -->
                    <x-flex-center>
                        <x-paragraf-display id="timerWidget" class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                            00:00:00
                        </x-paragraf-display>
                    </x-flex-center>

                    <x-flex-center>
                        <x-paragraf-display id="locationWidget" class="text-lg md:text-xl text-gray-600 dark:text-gray-300">
                            LOKALIZACJA ZOSTANIE POBRANA W MOMENCIE KLIKNIĘCIA
                        </x-paragraf-display>
                    </x-flex-center>
                </div>


                <!-- Prawa kolumna: Przyciski -->
                <div class="flex flex-col justify-center items-center space-y-6">
                    <button
                        id="startButtonWidget"
                        class="text-2xl min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-play mr-2"></i>Start
                    </button>
                    <!-- Przycisk Stop -->
                    <button
                        id="stopButtonWidget"
                        class="hidden text-2xl  min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-stop mr-2"></i>Stop
                    </button>
                </div>
            </x-widget-display-nav>
            @if($task)
            @if($work_session && $work_session->task_id)
            <x-container-gray class="mt-4">
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
                    @if($work_session->task)
                    <x-text-cell-value>
                        <div class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                            {!! $work_session->task->note !!}
                        </div>
                    </x-text-cell-value>
                    @endif
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
            </x-container-gray>
            @else
            <div class="grid grid-cols-1 gap-4 w-full p-4 mt-4 border-2 dark:border-gray-700 rounded-lg">
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
        </x-container>
        <!--START STOP + ZDARZENIA -->
        @elseif($date['leave'] != null)
        <!-- WNIOSEK -->
        <x-container class="">
            <x-widget-display-nav class="grid grid-cols-1 gap-4 p-4 w-full">
                <!-- Lewa kolumna: Data i Timer -->
                <div class="space-y-6 flex flex-col justify-center">
                    <!-- Data -->
                    <x-flex-center>
                        <x-paragraf-display id="dateWidget" class="dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300">
                            <!-- Data -->
                        </x-paragraf-display>
                    </x-flex-center>

                    <!-- Timer -->
                    <x-flex-center>
                        <x-paragraf-display class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                            <div class="flex flex-row gap-2 justify-start items-center">
                                <div class="text-7xl mx-2">{{ $icons[$date['leave']] ?? '' }}</div>
                                <div class="flex flex-col gap-2 items-center md:items-start">
                                    <div class="text-2xl inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 mb-1">{{ $date['leave'] ?? '' }}</div>
                                    <span class="px-3 py-1 rounded-full text-md w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        {{ $shortType[$date['leave']] ?? '' }}
                                    </span>
                                </div>
                            </div>
                        </x-paragraf-display>
                    </x-flex-center>
                </div>
            </x-widget-display-nav>
        </x-container>
        <!-- WNIOSEK -->
        @endif
        <!--HEADER-->
        <div class="flex flex-col w-full md:pt-4 md:px-4">
            <x-h1-display class="text-center md:text-start my-4 md:my-0">
                📅 Kalendarz
            </x-h1-display>
        </div>
        <!--HEADER-->
        <livewire:calendar-view />
    </x-main-no-filter>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>