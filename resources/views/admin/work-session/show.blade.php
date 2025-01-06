<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historia Czasu Pracy') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET TASK -->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <a href="{{ route('work.session') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                    </a>
                    <!-- Napis z przyciskiem tworzenia -->
                    <div class="pb-4 flex flex-col justify-between items-center">
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Czas Pracy
                            </h1>
                            @if($role == 'admin')
                            <a href="{{route('work.session.edit', $work_session)}}" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-400 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-400 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-pen-to-square mr-2"></i> Edycja
                            </a>
                            @endif
                        </div>
                    </div>

                    @if ($company)
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
                        <div class="flex flex-col gap-4 w-full h-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                            <div class="md:grid grid-cols-2 md:gap-4 py-4 border-b border-gray-100 dark:border-gray-700">
                                <div class="col-span-2 flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Status
                                    </p>
                                    <div class="flex justify-start items-center w-full justify-start">
                                        @if($work_session->status == 'W trakcie pracy')
                                        <span class="inline-flex items-center text-yellow-500 dark:text-yellow-300 font-semibold text-xl uppercase tracking-widest hover:text-yellow-700 dark:hover:text-yellow-300 transition ease-in-out duration-150">
                                            {{ $work_session->status }}
                                        </span>
                                        @endif
                                        @if($work_session->status == 'Praca zakończona')
                                        <span class="inline-flex items-center text-green-300 dark:text-green-300 font-semibold text-xl uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
                                            {{ $work_session->status }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-span-2 flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Czas w pracy
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-2xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->time_in_work }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Rozpoczęcie pracy
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->start_time }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Zakończenie pracy
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->end_time }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Rozpoczęcie w dniu tygodnia
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->start_day_of_week }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Zakończenie w dniu tygodnia
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->end_day_of_week }}
                                    </span>
                                </div>
                                <div class="col-span-2 flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Nazwa użytkownika
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->user->name }}
                                    </span>
                                </div>
                                <div class="col-span-2 flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Nazwa firmy
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->company->name }}
                                    </span>
                                </div>
                                <div class="col-span-2 flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Utworzone przez
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->created_user->name }}
                                    </span>
                                </div>
                                <div class="col-span-2 flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Data stworzenia
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->created_at }}
                                    </span>
                                </div>
                                <div class="col-span-2 flex flex-col gap-4">
                                    <p class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xs uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        Data aktualizacji
                                    </p>
                                    <span class="inline-flex items-center text-gray-600 dark:text-gray-400 font-semibold text-xl uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150">
                                        {{ $work_session->updated_at }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        @if($role == 'admin')
                        <form action="{{route('work.session.delete', $work_session)}}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="min-h-[38px] inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-600 active:bg-red-900 dark:active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-trash mr-2"></i> USUŃ
                            </button>
                        </form>
                        @endif
                    </div>

                    @else
                    <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Dokończ konfigurację</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Brak danych sprzedawcy. Dodaj informacje o firmie. Przejdź do zakładki ustawienia i kliknij zielony plus
                        </div>
                        <div class="flex">
                            <a href="{{route('setting.create')}}" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                                Przejdź do konfiguracji
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- END WIDGET TASK -->
        </div>
    </div>
</x-app-layout>