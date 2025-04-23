<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Podgląd elementu zdarzenia START lub STOP który jest częścią elementu RCP
            </div>
            @if($role == 'admin')
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">Ostrzeżenie!</span> Usunięcie zdarzenia START lub STOP spowoduje usunięcie całego RCP.
            </div>
            @endif
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <!--MAIN-->
    <x-main>
        <x-RCP.nav />

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
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>