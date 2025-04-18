<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <x-search-filter />
        <x-date-filter />
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-RCP.nav />

        <!--CONTENT-->
        <div class="px-4 py-5 sm:px-6 lg:px-8">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('rcp.work-session.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->
            <x-container-gray class="px-0">
                <!--status-->
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Status
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <x-RCP.work-session-status :work_session="$work_session" class="text-xl m-0 p-0" />
                    </div>
                </x-text-cell>
                <!--status-->
                <!--Czas w pracy-->
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 test-sm">
                        Czas w pracy
                    </p>
                    <div class="flex justify-start items-center w-full justify-start">
                        <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                            {{ $work_session->time_in_work }}
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
                            {{ $work_session->user->name }}
                        </span>
                    </div>
                </x-text-cell>
                <!--Użytkownik-->
                @endif
            </x-container-gray>
            <div class="grid grid-cols-2 mt-4 gap-4">
                @if($work_session->eventStart != null)
                <x-container-gray class="px-0">
                    <!--status-->
                    <x-text-cell class="mx-4">
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Zdarzenie
                        </p>
                        <div class="flex justify-start items-center w-full justify-start">
                            @if($work_session->eventStart->event_type == 'stop')
                            <span class="inline-flex items-center text-red-500 dark:text-red-300 font-semibold text-xl uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
                                Stop
                            </span>
                            @endif
                            @if($work_session->eventStart->event_type == 'start')
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
                                {{ $work_session->eventStart->time }}
                            </span>
                        </div>
                    </x-text-cell>
                    <!--Czas w pracy-->
                </x-container-gray>
                @endif
                @if($work_session->eventStop != null)
                <x-container-gray class="px-0">
                    <!--status-->
                    <x-text-cell class="mx-4">
                        <p class="text-gray-700 dark:text-gray-300 test-sm">
                            Zdarzenie
                        </p>
                        <div class="flex justify-start items-center w-full justify-start">
                            @if($work_session->eventStop->event_type == 'stop')
                            <span class="inline-flex items-center text-red-500 dark:text-red-300 font-semibold text-xl uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
                                Stop
                            </span>
                            @endif
                            @if($work_session->eventStop->event_type == 'start')
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
                                {{ $work_session->eventStop->time }}
                            </span>
                        </div>
                    </x-text-cell>
                    <!--Czas w pracy-->
                </x-container-gray>
                @endif
            </div>
            <div class="flex justify-end mt-4">
                @if($work_session->status == 'Praca zakończona')
                <x-button-link-cello href="{{route('rcp.work-session.edit', $work_session)}}" class="text-lg mr-2">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Edycja
                </x-button-link-cello>
                @endif
                @if($role == 'admin')
                <form action="{{route('rcp.work-session.delete', $work_session)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="min-h-[34px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-trash mr-2"></i> USUŃ
                    </button>
                </form>
                @endif
            </div>
            <x-label class="my-2">
                Utworzono {{ $work_session->created_at }}
            </x-label>
            <x-label class="my-2">
                Utoworzono przez {{ $work_session->created_user->name }}
            </x-label>
            <x-label class="my-2">
                Ostatnia aktualizacja {{ $work_session->updated_at }}
            </x-label>
        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>