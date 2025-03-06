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

                    <!--NAV-->
                    <div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                            <x-nav-link class="h-full text-center"
                                href="{{ route('rcp') }}"
                                :active="Str::startsWith(request()->path(), 'dashboard/rcp')">
                                Rejestacja czasu pracy
                            </x-nav-link>
                            <x-nav-link class="h-full text-center"
                                href="{{ route('rcp') }}"
                                :active="request()->routeIs('work.session.now')">
                                Zdarzenia
                            </x-nav-link>
                        </nav>
                    </div>
                    <!--NAV-->

                    <!--HEADER-->
                    <x-container-header>
                        <x-h1-display>
                            Rejestracja czasu pracy
                            <x-label-green>
                                1 Sty - 31 Sty 2025
                            </x-label-green>
                        </x-h1-display>
                        <x-flex-center>
                            <x-button-link-green class="text-xs mx-2">
                                <i class="fa-solid fa-plus mr-2"></i>Dodaj
                            </x-button-link-green>
                            <x-button-link-neutral class="text-xs mx-2">
                                <i class="fa-solid fa-download mr-2"></i>Pobierz
                            </x-button-link-neutral>
                            <x-button-link-cello class="text-xs ml-2">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </x-button-link-cello>
                        </x-flex-center>
                    </x-container-header>
                    <x-label class="px-4">
                        0 zaznaczonych
                    </x-label>
                    <!--HEADER-->

                    <!--CONTENT-->
                    <x-flex-center class="px-4 flex flex-col">
                        <!--MOBILE VIEW-->
                        <div class="relative overflow-x-auto md:shadow-md sm:rounded-lg mt-8 w-full">
                            @if ($company)
                            <ul id="list" class="grid w-full gap-y-4 block md:hidden">
                                <!-- EMPTY PLACE -->
                                @if ($work_sessions->isEmpty())
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

                                @foreach ($work_sessions as $key => $work_session)
                                @php
                                // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                                $work_sessionMonth = \Carbon\Carbon::parse($work_session->issue_date)->month;

                                // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                                if ($work_sessionMonth !== $currentMonth) {
                                $currentMonth = $work_sessionMonth;
                                $monthName = $months[$work_sessionMonth];
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
                                                    @if($work_session->status == 'W trakcie pracy')
                                                    <x-status-yellow class="text-xl">
                                                        {{ $work_session->status }}
                                                    </x-status-yellow>
                                                    @endif
                                                    @if($work_session->status == 'Praca zakończona')
                                                    <x-status-green class="text-xl">
                                                        {{ $work_session->status }}
                                                    </x-status-green>
                                                    @endif
                                                </div>
                                                @if($role == 'admin')
                                                <form action="{{route('work.session.delete', $work_session)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button-red type="submit" class="min-h-[38px]">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </x-button-red>
                                                </form>
                                                @endif
                                            </div>
                                            <x-paragraf-display class="text-xl">
                                                {{ $work_session->time_in_work }}
                                            </x-paragraf-display>
                                            @if($work_session->status == 'Praca zakończona')
                                            <div class="text-sm text-gray-400 dark:text-gray-300 flex justify-start w-full my-2 gap-x-4">
                                                @if($work_session->start_day_of_week != $work_session->end_day_of_week)
                                                <div class="flex flex-col">
                                                    <x-label-display>
                                                        Od
                                                    </x-label-display>
                                                    <x-paragraf-display class="text-xs">
                                                        {{ $work_session->start_day_of_week }}
                                                    </x-paragraf-display>
                                                </div>
                                                <div class="flex flex-col">
                                                    <x-label-display>
                                                        Do
                                                    </x-label-display>
                                                    <x-paragraf-display class="text-xs">
                                                        {{ $work_session->end_day_of_week }}
                                                    </x-paragraf-display>
                                                </div>
                                                @else
                                                <div class="flex flex-col">
                                                    <x-paragraf-display class="text-xs">
                                                        {{ $work_session->end_day_of_week }}
                                                    </x-paragraf-display>
                                                </div>
                                                @endif
                                            </div>
                                            @else
                                            <div class="text-sm text-gray-400 dark:text-gray-100 flex w-full my-2">
                                                <div class="flex flex-col">
                                                    <x-label-display>
                                                        Od
                                                    </x-label-display>
                                                    <x-paragraf-display class="text-xs">
                                                        {{$work_session->start_time}}
                                                    </x-paragraf-display>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                                <div class="flex flex-col">
                                                    {{$work_session->user->name}}
                                                </div>
                                            </div>
                                            <div class="text-sm text-gray-700 dark:text-gray-400 flex w-full my-2 justify-end">
                                                <div class="flex flex-col">
                                                    {{$work_session->company->name}}
                                                </div>
                                            </div>
                                            <div class="flex space-x-4 mt-4">
                                                <x-button-link-neutral href="{{route('rcp.show', $work_session)}}" class="min-h-[38px]">
                                                    <i class="fa-solid fa-eye"></i>
                                                </x-button-link-neutral>
                                                @if($role == 'admin')
                                                <x-button-link-blue href="{{route('work.session.edit', $work_session)}}" class="min-h-[38px]">
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
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Czas w pracy
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Dzień tygodnia
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Podgląd
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($work_sessions->isEmpty())
                                    <tr class="bg-white dark:bg-gray-800">
                                        <td colspan="8" class="px-3 py-2">
                                            <x-empty-place />
                                        </td>
                                    </tr>
                                    @else
                                    @foreach ($work_sessions as $work_session)
                                    <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
                                        <td class="px-3 py-2">
                                            <x-flex-center>
                                                <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </x-flex-center>
                                        </td>
                                        <td class="px-3 py-2 flex items-center justify-center">
                                            @if($work_session->user->profile_photo_path)
                                            <img src="{{ $work_session->user->profile_photo_url }}" alt="{{ $work_session->user->name }}" class="w-10 h-10 rounded-full">
                                            @else
                                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
                                                {{ strtoupper(substr($work_session->user->name, 0, 1)) }}
                                            </div>
                                            @endif
                                        </td>
                                        <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                            <x-paragraf-display class="text-xs">
                                                {{$work_session->user->name}}
                                            </x-paragraf-display>
                                        </td>
                                        <td class="px-3 py-2 text-sm min-w-32">
                                            @if($work_session->status == 'W trakcie pracy')
                                            <x-status-yellow class="text-xs">
                                                {{ $work_session->status }}
                                            </x-status-yellow>
                                            @endif
                                            @if($work_session->status == 'Praca zakończona')
                                            <x-status-green class="text-xs">
                                                {{ $work_session->status }}
                                            </x-status-green>
                                            @endif
                                        </td>
                                        <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                            <x-paragraf-display class="text-xl">
                                                {{ $work_session->time_in_work }}
                                            </x-paragraf-display>
                                        </td>
                                        @if($work_session->status == 'Praca zakończona')
                                        <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                            @if($work_session->start_day_of_week != $work_session->end_day_of_week)
                                            <div class="flex flex-col">
                                                <x-label-display>
                                                    Od
                                                </x-label-display>
                                                <x-paragraf-display class="text-xs">
                                                    {{ $work_session->start_day_of_week }}
                                                </x-paragraf-display>
                                            </div>
                                            <div class="flex flex-col">
                                                <x-label-display>
                                                    Do
                                                </x-label-display>
                                                <x-paragraf-display class="text-xs">
                                                    {{ $work_session->end_day_of_week }}
                                                </x-paragraf-display>
                                            </div>
                                            @else
                                            <x-paragraf-display class="text-xs">
                                                {{ $work_session->end_day_of_week }}
                                            </x-paragraf-display>
                                            @endif
                                        </td>
                                        @else
                                        <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                            <x-paragraf-display class="text-xs">
                                                {{$work_session->start_day_of_week}}
                                            </x-paragraf-display>
                                        </td>
                                        @endif
                                        <x-show-cell href="{{ route('rcp.show', $work_session) }}" />
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <!-- PC VIEW -->

                            <!--Links-->
                            <div id="links" class="md:px-2 py-4">
                                {{ $work_sessions->links() }}
                            </div>
                            <!--Links-->
                            @else
                            @include('admin.elements.end_config')
                            @endif
                        </div>
                    </x-flex-center>
                    <!--CONTENT-->
                </div>
            </div>
        </div>
    </div>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>