<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <x-main-no-filter>
        <div class="p-4 md:p-0">
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
                            <div id="loaderDateWidget" class="h-6 rounded-lg bg-gray-200 dark:bg-gray-600 w-32 mx-auto animate-pulse">
                            </div>
                            <x-paragraf-display id="dateWidget" class="dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                <!-- Data -->
                            </x-paragraf-display>
                        </x-flex-center>

                        <!-- Timer -->
                        <x-flex-center>
                            <div id="loaderClockWidget" class="h-12 rounded-lg bg-gray-200 dark:bg-gray-600 w-40 mx-auto animate-pulse">
                            </div>
                            <x-paragraf-display id="timerWidget" class="hidden text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                                00:00:00
                            </x-paragraf-display>
                        </x-flex-center>

                        <x-flex-center>
                            <div id="loaderLocationWidget" class="h-6 rounded-lg bg-gray-200 dark:bg-gray-600 w-32 mx-auto animate-pulse">
                            </div>
                            <x-paragraf-display id="locationWidget" class="hidden text-lg md:text-xl text-gray-600 dark:text-gray-300">
                                LOKALIZACJA ZOSTANIE POBRANA W MOMENCIE KLIKNIĘCIA
                            </x-paragraf-display>
                        </x-flex-center>
                    </div>

                    <!-- Prawa kolumna: Przyciski -->
                    <div class="flex flex-col justify-center items-center space-y-6">
                        <div id="loaderTimerWidget" class="h-[66px] rounded-lg bg-gray-200 dark:bg-gray-600 w-[179px] mx-auto animate-pulse">
                        </div>
                        <button
                            id="startButtonWidget"
                            class="w-[179px] hidden text-2xl min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                            <i class="fa-solid fa-play mr-2"></i>Start
                        </button>
                        <!-- Przycisk Stop -->
                        <button
                            id="stopButtonWidget"
                            class="w-[179px] hidden text-2xl  min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
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
                                    <div class="text-7xl mx-2">{{ config('leavetypes.icons.' . $date['leave'], '') }}</div>
                                    <div class="flex flex-col gap-2 items-center md:items-start">
                                        <div class="text-2xl inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 mb-1">{{ $date['leave'] ?? '' }}</div>
                                        <span class="px-3 py-1 rounded-full text-md w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            {{ config('leavetypes.shortType.' . $date['leave'], '') }}
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
                    ⏱️ Podsumowanie dnia
                </x-h1-display>
            </div>
            <!--HEADER-->
            <div class="md:p-4">
                <x-container-gray>
                    <x-text-cell>
                        <x-text-cell-value>
                            <x-text-cell-span class="flex flex-col w-full">
                                @if($user->working_hours_regular != null)
                                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel' || $user->id == auth()->user()->id)
                                @php
                                $status = $user->getToday();
                                @endphp
                                @if($status['status'] == 'warning')
                                <x-alert-span href="">
                                    {{ $status['message'] }}
                                </x-alert-span>
                                @elseif($status['status'] == 'success')
                                <x-success-span href="">
                                    {{ $status['message'] }}
                                </x-success-span>
                                @else
                                <x-danger-span href="">
                                    {{ $status['message'] }}
                                </x-danger-span>
                                @endif

                                @if($status['timing'])
                                <div class="italic text-xs text-gray-500 dark:text-gray-500">
                                    {{ $status['timing'] }}
                                </div>
                                @endif

                                @if($status['type'] == 'rcp' && ($status['start'] || $status['stop']))
                                <div class="flex flex-col md:flex-row items-center justify-center gap-2  px-2 py-2 rounded-2xl ">

                                    {{-- Ikonka + typ --}}
                                    <div class="flex flex-col items-center justify-center">
                                        <span class="text-lg md:text-xl">
                                            ⏱️
                                        </span>
                                        <x-label-green class="mt-1">
                                            RCP
                                        </x-label-green>
                                    </div>

                                    {{-- Dane szczegółowe --}}
                                    <div class="flex flex-col items-center md:flex-col gap-3 text-sm md:text-base text-gray-800 dark:text-gray-100">
                                        <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                            <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                                                <x-status-dark>
                                                    @if($status['start']) {{ \Carbon\Carbon::parse($status['start'])->format('H:i') }} @endif @if($status['stop']) - {{ \Carbon\Carbon::parse($status['stop'])->format('H:i') }} @else - TERAZ @endif
                                                </x-status-dark>
                                            </x-paragraf-display>
                                            @if($status['worked_time'])
                                            @if($status['stop'])
                                            <x-paragraf-display class="text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                                                <span>{{ $status['worked_time'] }}</span>
                                            </x-paragraf-display>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($status['type'] == 'leave')
                                <div class="flex flex-col md:flex-row items-center justify-center gap-2  px-2 py-2 rounded-2xl ">

                                    {{-- Ikonka + typ --}}
                                    <div class="flex flex-col items-center justify-center">
                                        <span class="text-lg md:text-xl">
                                            {{ config('leavetypes.icons.' . $status['timing'], '') }}
                                        </span>
                                        <x-label-pink class="mt-1">
                                            {{ config('leavetypes.shortType.' . $status['timing'], '') }}
                                        </x-label-pink>
                                    </div>

                                    {{-- Dane szczegółowe --}}
                                    <div class="flex flex-col md:flex-col gap-3 text-sm md:text-base text-gray-800 dark:text-gray-100">
                                        <x-paragraf-display class="text-xs whitespace-nowrap">
                                            <x-status-cello>
                                                @if($status['timing']) {{ \Carbon\Carbon::parse($status['start'])->format('d.m') }} @endif @if($status['start'] && $status['stop']) - @endif @if($status['stop']) {{ \Carbon\Carbon::parse($status['stop'])->format('d.m') }} @endif
                                            </x-status-cello>
                                        </x-paragraf-display>
                                    </div>
                                </div>
                                @endif

                                @endif
                                @else

                                @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
                                <x-alert-span href="{{ route('team.user.config_planing', $user->id) }}">
                                    Konfiguracja
                                </x-alert-span>
                                @else
                                <x-alert-span href="">
                                    Konfiguracja
                                </x-alert-span>
                                @endif

                                @endif
                            </x-text-cell-span>
                        </x-text-cell-value>
                    </x-text-cell>
                </x-container-gray>
            </div>
            <!--HEADER-->
            <div class="flex flex-col w-full md:pt-4 md:px-4">
                <x-h1-display class="text-center md:text-start my-4 md:my-0">
                    📝 Wykorzystane wnioski {{ \Carbon\Carbon::now()->year }}
                </x-h1-display>
            </div>
            <!--HEADER-->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 md:p-4 w-full">
                @php
                $leaves_counter = 0;
                @endphp
                @foreach($leaves_used as $type => $leave)
                @if($leave['zrealizowane']['days'] != 0 ||
                $leave['zrealizowane']['working_days'] != 0 ||
                $leave['zrealizowane']['non_working_days'] != 0 ||
                $leave['zaakceptowane']['days'] != 0 ||
                $leave['zaakceptowane']['working_days'] != 0 ||
                $leave['zaakceptowane']['non_working_days'] != 0 )
                @php
                $leaves_counter++;
                @endphp
                <x-widget-display-nav class="w-full">
                    <div class="flex flex-col w-full md:pt-4 md:px-4">
                        <div>
                            <div class="flex flex-col items-center justify-center h-full w-full">
                                <span class="text-lg md:text-xl">
                                    {{ config('leavetypes.icons.' . $type, '') }}
                                </span>
                                <x-label-pink class="mt-1">
                                    {{ config('leavetypes.shortType.' . $type, '') }}
                                </x-label-pink>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col items-center justify-center gap-2 mt-2 my-auto">
                                <x-paragraf-display class="text-xs whitespace-nowrap font-semibold w-fit text-start relative">
                                    {{ $type }}
                                </x-paragraf-display>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col items-center justify-center gap-2 mt-2 my-auto">
                                <x-paragraf-display class="pb-2 border-b border-gray-300 dark:border-gray-600 text-xs whitespace-nowrap flex flex-row gap-2">
                                    <x-status-green>
                                        Zrealizowane
                                    </x-status-green>
                                    <x-status-cello>
                                        {{ $leave['zrealizowane']['days'] }} dni
                                    </x-status-cello>
                                    <x-status-orange>
                                        {{ $leave['zrealizowane']['working_days'] }} robocze
                                    </x-status-orange>
                                    <x-status-green>
                                        {{ $leave['zrealizowane']['non_working_days'] }} wolne
                                    </x-status-green>
                                </x-paragraf-display>
                                <x-paragraf-display class="text-xs whitespace-nowrap flex flex-row gap-2 opacity-25">
                                    <x-status-green>
                                        Zaakceptowane
                                    </x-status-green>
                                    <x-status-cello>
                                        {{ $leave['zaakceptowane']['days'] }} dni
                                    </x-status-cello>
                                    <x-status-orange>
                                        {{ $leave['zaakceptowane']['working_days'] }} robocze
                                    </x-status-orange>
                                    <x-status-green>
                                        {{ $leave['zaakceptowane']['non_working_days'] }} wolne
                                    </x-status-green>
                                </x-paragraf-display>
                            </div>
                        </div>
                    </div>
                </x-widget-display-nav>
                @endif
                @endforeach
                @if($leaves_counter == 0)
                <x-widget-display-nav class="w-full col-span-4">
                    <x-empty-place />
                </x-widget-display-nav>
                @endif
            </div>

            <!--HEADER-->
            <div class="flex flex-col w-full md:pt-4 md:px-4">
                <x-h1-display class="text-center md:text-start my-4 md:my-0">
                    📅 Kalendarz
                </x-h1-display>
            </div>
            <!--HEADER-->
            <livewire:calendar-view />
        </div>
    </x-main-no-filter>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>