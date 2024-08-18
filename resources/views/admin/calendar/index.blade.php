<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kalendarz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--WIDGET TASK-->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Szybkie tworzenie zadania
                        </h1>
                        <a href="" class="mt-8 inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Zadania do przydzielenia
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tytuł
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Podgląd
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--END WIDGET TASK-->
            <!--WIDGET CALENDAR-->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border-b border-gray-200 dark:border-gray-900">
                <div id='calendar' class="p-6 lg:p-8 bg-white"></div>
                <!-- Skrypty FullCalendar -->
                <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
                <script>
                    $(document).ready(function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'timeGridWeek', // Widok tygodniowy
                            events: '/wibest/public/api/event', // Link do API zwracającego wydarzenia
                            eventClick: function(info) {
                                if (info.event.url) {
                                    window.location.href = info.event.url; // Przekierowanie w tej samej karcie
                                    info.jsEvent.preventDefault(); // Zablokuj domyślne zachowanie
                                }
                            },
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            editable: true, // Umożliwia przeciąganie i upuszczanie
                            selectable: true // Umożliwia wybieranie zakresu dat
                        });
                        calendar.render();
                    });
                </script>
            </div>
            <!--END WIDGET CALENDAR-->
        </div>
    </div>
</x-app-layout>