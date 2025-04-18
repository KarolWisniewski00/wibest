<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <aside id="sidebar-multi-level-sidebar" class="fixed mt-20 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 border-t-2 dark:border-gray-600">
            <ul class="space-y-2 font-medium">
                <li>
                    <input placeholder="Szukaj" type="text" class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-gray-100 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50 dark:focus:border-2 dark:focus:border-lime-500" />
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="pracownicy-dropdown" data-collapse-toggle="pracownicy-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Zakres dat</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="pracownicy-dropdown" class="">
                    </ul>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="pracownicy-dropdown" data-collapse-toggle="pracownicy-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Grafik pracy</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="pracownicy-dropdown" class="">
                    </ul>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="pracownicy-dropdown" data-collapse-toggle="pracownicy-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Stanowisko pracy</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="pracownicy-dropdown" class="">
                    </ul>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="tags-dropdown" data-collapse-toggle="tags-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Tagi</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <ul id="tags-dropdown" class="hidden">
                    </ul>
                </li>
                <li class="group hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group-hover:bg-gray-100 dark:text-white dark:group-hover:bg-gray-700" aria-controls="positions-dropdown" data-collapse-toggle="positions-dropdown">
                        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Stanowiska</span>
                        <i class="fa-solid fa-chevron-up"></i>
                    </button>
                    <ul id="positions-dropdown">
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <script>
        $(document).ready(function() {
            $('[data-collapse-toggle]').on('click', function() {
                var target = $(this).attr('aria-controls');
                $('#' + target).toggleClass('hidden');
                $(this).find('i').toggleClass('fa-chevron-up fa-chevron-down');
            });
        });
    </script>
    <!--SIDE BAR-->

    <!--MAIN-->
    <div class="p-4 sm:ml-64">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <x-RCP.nav />
                    <x-RCP.header>Zdarzenia</x-RCP.header>
                    <!--CONTENT-->
                    <x-flex-center class="px-4 flex flex-col">
                        <!--MOBILE VIEW-->
                        <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
                            @if ($company)
                            <ul id="list" class="grid w-full gap-y-4 block md:hidden">
                                <!-- EMPTY PLACE -->
                                @if ($events->isEmpty())
                                <x-empty-place />
                                @else
                                <!-- EMPTY PLACE -->

                                <!-- MONTHS VIEW -->
                                @php
                                $currentMonth = null; // Zmienna do śledzenia aktualnego miesiąca
                                $months = [
                                1 => 'Styczeń',
                                2 => 'Luty',
                                3 => 'Marzec',
                                4 => 'Kwiecień',
                                5 => 'Maj',
                                6 => 'Czerwiec',
                                7 => 'Lipiec',
                                8 => 'Sierpień',
                                9 => 'Wrzesień',
                                10 => 'Październik',
                                11 => 'Listopad',
                                12 => 'Grudzień'
                                ];
                                @endphp

                                @foreach ($events as $key => $event)
                                @php
                                // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                                $eventMonth = \Carbon\Carbon::parse($event->issue_date)->month;

                                // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                                if ($eventMonth !== $currentMonth) {
                                $currentMonth = $eventMonth;
                                $monthName = $months[$eventMonth];
                                @endphp
                                <div id="s-{{$key}}"></div>
                                <li id="e-{{$key}}" class="my-4">
                                    <div class="flex items-center justify-start">
                                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">
                                            {{ $monthName }}
                                        </h2>
                                        <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                </li>
                                @php
                                }
                                @endphp
                                <!-- MONTHS VIEW -->

                                <!-- WORK SESSIONS ELEMENT VIEW -->
                                <li>
                                    <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                        <div class="block w-full">
                                            <div class="flex justify-between w-full">
                                                <div class="flex justify-start items-center w-full justify-start">
                                                    @if($event->status == 'W trakcie pracy')
                                                    <x-status-yellow class="text-xl">
                                                        {{ $event->status }}
                                                    </x-status-yellow>
                                                    @endif
                                                    @if($event->status == 'Praca zakończona')
                                                    <x-status-green class="text-xl">
                                                        {{ $event->status }}
                                                    </x-status-green>
                                                    @endif
                                                </div>
                                                @if($role == 'admin')
                                                <form action="{{route('rcp.event.delete', $event)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button-red type="submit" class="min-h-[38px]">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </x-button-red>
                                                </form>
                                                @endif
                                            </div>
                                            <x-paragraf-display class="text-xl">
                                                @if($event->status == 'Praca zakończona')
                                                {{ $event->time_in_work }}
                                                @endif
                                            </x-paragraf-display>
                                            <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                                <div class="flex flex-col">
                                                    {{$event->user->name}}
                                                </div>
                                            </div>
                                            <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                                <div class="flex flex-col">
                                                    {{$event->company->name}}
                                                </div>
                                            </div>
                                            <div class="flex space-x-4 mt-4">
                                                <x-button-link-neutral href="{{route('rcp.event.show', $event)}}" class="min-h-[38px]">
                                                    <i class="fa-solid fa-eye"></i>
                                                </x-button-link-neutral>
                                                @if($role == 'admin')
                                                <x-button-link-blue href="" class="min-h-[38px]">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </x-button-link-blue>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- WORK SESSIONS ELEMENT VIEW -->
                                @endforeach
                                @endif
                            </ul>
                            <!-- WORK SESSIONS VIEW -->

                            <!-- PC VIEW -->
                            <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            <x-flex-center>
                                                <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </x-flex-center>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Zdjęcie
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Imię i Nazwisko, Rola
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Zdarzenie
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Czas
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Podgląd
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($events->isEmpty())
                                    <tr class="bg-white dark:bg-gray-800">
                                        <td colspan="8" class="px-3 py-2">
                                            <x-empty-place />
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($events as $event)
                                    <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                        <td class="px-3 py-2">
                                            <x-flex-center>
                                                <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </x-flex-center>
                                        </td>
                                        <td class="px-3 py-2 flex items-center justify-center">
                                            @if($event->user->profile_photo_path)
                                            <img src="{{ $event->user->profile_photo_url }}" alt="{{ $event->user->name }}" class="w-10 h-10 rounded-full">
                                            @else
                                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                                {{ strtoupper(substr($event->user->name, 0, 1)) }}
                                            </div>
                                            @endif
                                        </td>
                                        <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                            <x-paragraf-display class="text-xs">
                                                {{$event->user->name}}
                                            </x-paragraf-display>
                                        </td>
                                        <td class="px-3 py-2 text-sm min-w-32">
                                            @if($event->event_type == 'stop')
                                            <span class="inline-flex items-center text-red-500 dark:text-red-300 font-semibold text-xs uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
                                                Stop
                                            </span>
                                            @endif
                                            @if($event->event_type == 'start')
                                            <span class="inline-flex items-center text-green-300 dark:text-green-300 font-semibold text-xs uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
                                                Start
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-3 py-2 font-semibold text-xl min-w-32 text-gray-700 dark:text-gray-50">
                                            {{ $event->time }}
                                        </td>
                                        <x-show-cell href="{{ route('rcp.event.show', $event) }}" />
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <!-- PC VIEW -->

                            <!--Links-->
                            <div id="links" class="md:px-2 py-4">
                                {{ $events->links() }}
                            </div>
                            <!--Links-->
                            @else
                            @include('admin.elements.end_config')
                            @endif
                        </div>
                    </x-flex-center>
                    <!--CONTENT-->
                    <script>
                        $(document).ready(function() {
                            const $table = $('#table');
                            const $masterCheckbox = $table.find('thead input[type="checkbox"]');
                            const $checkboxes = $table.find('tbody input[type="checkbox"]');
                            const $label = $('#selected-count');

                            function updateSelectedCount() {
                                const count = $checkboxes.filter(':checked').length;

                                // Dopasowanie końcówki do liczby
                                let suffix = 'ych';
                                if (count === 1) suffix = 'y';
                                else if (count >= 2 && count <= 4) suffix = 'e';

                                $label.html(`${count} zaznaczon${suffix}`);
                            }

                            // Zaznaczenie pojedynczego checkboxa
                            $checkboxes.on('change', function() {
                                updateSelectedCount();

                                // Jeśli odznaczymy jakiś checkbox, master też się odznacza
                                if (!$(this).prop('checked')) {
                                    $masterCheckbox.prop('checked', false);
                                } else if ($checkboxes.length === $checkboxes.filter(':checked').length) {
                                    $masterCheckbox.prop('checked', true);
                                }
                            });

                            // Master checkbox (zaznacz wszystkie / odznacz wszystkie)
                            $masterCheckbox.on('change', function() {
                                const isChecked = $(this).prop('checked');
                                $checkboxes.prop('checked', isChecked);
                                updateSelectedCount();
                            });

                            updateSelectedCount(); // W razie odświeżenia
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>