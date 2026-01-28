<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-filter-date loader="planing">
            {{ route('api.v1.calendar.work-schedule.set.date') }}
        </x-filter-date>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-calendar.nav />
        <!--HEADER-->
        <x-calendar.header>
            <span>📅</span> Planing
        </x-calendar.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mb-4 mx-4 md:m-4">
            {{\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')}}
        </x-status-cello>
        @php
        $showTable = true;
        @endphp
        @if(session('report_key'))
        @php
        $reportKey = session('report_key');
        $report = Cache::get($reportKey);
        @endphp

        @if($report)
        @php
        $showTable = false;
        @endphp
        <div id="operation-summary-modal" class="mb-4 mx-4">
            <div class="relative gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <!--
                <button
                    id="close-summary-btn"
                    type="button"
                    class="absolute top-4 right-4 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Zamknij</span>
                </button>
                <x-h1-display class="w-[calc(100%-2rem)]">
                    <span>🎯</span> Podsumowanie operacji
                </x-h1-display>
                -->
                <x-h1-display class="w-full">
                    <span>🎯</span> Podsumowanie operacji
                </x-h1-display>
                <x-info-span class="-my-2">
                    Łączna liczba prób {{ $report['total_attempts'] }}
                </x-info-span>
                <x-success-span class="-my-2">
                    Pomyślnie dodano {{ $report['successful'] }}
                </x-success-span>
                @if($report['failed_count'] > 0)
                <x-danger-span class="-my-2">
                    Nieudane próby {{ $report['failed_count'] }}
                </x-danger-span>
                <div class="flex flex-col gap-4 w-full ">
                    @foreach($report['failed_details'] as $detail)
                    <label class="gap-4 h-full w-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                        <div class="flex items-center gap-2">
                            @php
                            $user = \App\Models\User::where('id', $detail['user_id'])->first();
                            @endphp
                            <x-user-photo :user="$user" />
                            <x-user-name :user="$user" class="flex-wrap" />
                        </div>
                        <div class="flex flex-row gap-4 items-center justify-between">
                            <x-status-cello>
                                {{ $detail['date'] }}
                            </x-status-cello>
                            <x-danger-span class="-my-2">
                                {{ $detail['reason'] }}
                            </x-danger-span>
                        </div>
                    </label>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <!--
        <script>
            // Używamy jQuery do obsługi zdarzeń po załadowaniu dokumentu
            $(document).ready(function() {
                // Podpięcie zdarzenia kliknięcia do przycisku zamykającego
                $('#close-summary-btn').on('click', function() {
                    closeSummary();
                });
            });

            function updateMaxHeight() {
                var $elem = $('#max-h-js');
                var rect = $elem[0].getBoundingClientRect();

                // Odległość od dolnej krawędzi ekranu
                var distanceToBottom = $(window).height() - rect.top;

                if (window.innerWidth < 768) {
                    var maxHeight = Math.floor(distanceToBottom - 32);
                } else {
                    var maxHeight = Math.floor(distanceToBottom - 48);
                }


                // Ustawiamy max-height
                $elem.css('max-height', maxHeight + 'px');
            }
            /**
             * Funkcja ukrywająca okno podsumowania operacji (używa jQuery).
             * Dodaje klasę 'hidden' (Tailwind CSS) do głównego elementu.
             */
            function closeSummary() {
                // Użycie jQuery do znalezienia elementu i dodania klasy
                var summary = $('#operation-summary-modal');
                summary.addClass('hidden');
                updateMaxHeight();

                // Znajdź URL na podstawie nazwy trasy (wymaga przekazania go z Laravela do JS)
                const clearUrl = '{{ route("calendar.work-schedule.clear") }}';
                // Uwaga: Powyższa linia działa tylko jeśli kod JS jest w pliku Blade PHP!

                // Możesz również użyć stałego adresu URL, jeśli go znasz:
                // const clearUrl = '/calendar/work-schedule/clear'; 

                $.ajax({
                    url: clearUrl,
                    type: 'GET', // Typ żądania
                    dataType: 'json', // Oczekiwany typ odpowiedzi

                    success: function(response) {},

                    error: function(xhr, status, error) {
                        // Ta funkcja wykonuje się, gdy wystąpi błąd (np. 404, 500)
                        console.error('Błąd żądania GET:', error);
                        console.log('Status:', status);
                        console.log('Odpowiedź serwera:', xhr.responseText);
                    }
                });
            }
        </script>
        -->
        @php
        $reportKey = session('report_key');

        if ($reportKey) {
        // 2. Usuwamy powiązany wpis z pamięci podręcznej (Cache)
        Cache::forget($reportKey);

        // 3. Usuwamy klucz sesji, aby nie odwoływać się do nieistniejącego cache
        session()->forget('report_key');

        // Opcjonalnie: Dodaj komunikat flash do wyświetlenia użytkownikowi
        // session()->flash('success', 'Dane raportu zostały pomyślnie usunięte z pamięci podręcznej.');
        }
        @endphp
        @else
        {{-- To się pokaże, jeśli Job jeszcze nie skończył, lub jeśli upłynął czas na Cache --}}
        <div class="mb-4 mx-4">
            <div class="gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <x-info-span class="-my-2">
                    Trwa przetwarzanie danych w tle. Odśwież za chwilę, aby zobaczyć raport.
                </x-info-span>
            </div>
        </div>
        @endif
        @endif
        @if($showTable)
        <x-container-content-calendar class="rounded-lg">
            <!--PC VIEW-->
            <x-table-calendar
                :headers="array_merge(['Nazwa'], $dates)"
                :items="$users"
                emptyMessage="Brak użytkowników do wyświetlenia."
                :checkBox="false">
                @foreach($users as $user)
                <x-row-planing :user="$user" />
                @endforeach
                <x-loader-planing id="loader" />
            </x-table-calendar>
            <!--PC VIEW-->
            <x-loader-script>
                {{ route('api.v1.calendar.work-schedule.get') }}
            </x-loader-script>
        </x-container-content-calendar>
        @endif
    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>