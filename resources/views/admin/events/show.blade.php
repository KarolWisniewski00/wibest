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
                                href="{{ route('rcp.work-session.index') }}"
                                :active="Str::startsWith(request()->path(), 'dashboard/rcp/work-session')">
                                Rejestacja czasu pracy
                            </x-nav-link>
                            <x-nav-link class="h-full text-center"
                                href="{{ route('rcp.event.index') }}"
                                :active="Str::startsWith(request()->path(), 'dashboard/rcp/event')">
                                Zdarzenia
                            </x-nav-link>
                        </nav>
                    </div>
                    <!--NAV-->

                    <!--CONTENT-->
                    <div class="px-4 py-5 sm:px-6 lg:px-8">
                        <!--POWRÓT-->
                        <x-button-link-back href="{{ route('rcp.event.index') }}" class="text-lg mb-4">
                            <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                        </x-button-link-back>
                        <!--POWRÓT-->
                        <x-container-gray class="px-0">
                            <!--status-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Zdarzenie
                                </p>
                                <div class="flex justify-start items-center w-full justify-start">
                                    @if($event->event_type == 'stop')
                                    <span class="inline-flex items-center text-red-500 dark:text-red-300 font-semibold text-xl uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
                                        Stop
                                    </span>
                                    @endif
                                    @if($event->event_type == 'start')
                                    <span class="inline-flex items-center text-green-300 dark:text-green-300 font-semibold text-xl uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
                                        Start
                                    </span>
                                    @endif
                                </div>
                            </x-text-cell>
                            <!--status-->
                            <!--Czas w pracy-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Czas
                                </p>
                                <div class="flex justify-start items-center w-full justify-start">
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $event->time }}
                                    </span>
                                </div>
                            </x-text-cell>
                            <!--Czas w pracy-->
                            @if($role == 'admin')
                            <!--Użytkownik-->
                            <x-text-cell class="mx-4">
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Użytkownik
                                </p>
                                <div class="flex justify-start items-center w-full justify-start">
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $event->user->name }}
                                    </span>
                                </div>
                            </x-text-cell>
                            <!--Użytkownik-->
                            @endif
                        </x-container-gray>

                        <div class="flex justify-end mt-4">
                            @if($role == 'admin')
                            <form action="{{route('rcp.event.delete', $event)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-trash mr-2"></i> USUŃ
                                </button>
                            </form>
                            @endif
                        </div>
                        <x-label class="my-2">
                            Utworzono {{ $event->created_at }}
                        </x-label>
                        <x-label class="my-2">
                            Utoworzono przez {{ $event->created_user->name }}
                        </x-label>
                        <x-label class="my-2">
                            Ostatnia aktualizacja {{ $event->updated_at }}
                        </x-label>
                    </div>
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