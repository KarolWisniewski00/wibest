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

                    <!--CONTENT-->
                    <div class="px-4 py-5 sm:px-6 lg:px-8">
                        <!--POWRÓT-->
                        <x-button-link-back href="{{ route('rcp') }}" class="text-lg mb-4">
                            <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                        </x-button-link-back>
                        <!--POWRÓT-->

                        <div class="col-span-2 flex flex-col gap-4-4">
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