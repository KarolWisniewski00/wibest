            <form class="w-full" method="POST" action="{{ route('team.user.update_planing', $user) }}">
                @csrf
                @method('PUT')
                <div id="planning-type">
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <li class="flex items-center justify-center h-full">
                            <input
                                type="radio"
                                id="fixed-basic"
                                name="planning_type"
                                value="fixed-basic"
                                class="hidden peer"
                                @if($user->working_hours_regular == 'stały planing') checked @endif
                            >
                            <label for="fixed-basic"
                                class="flex flex-col items-center justify-center w-full h-full p-5 rounded-2xl  border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-300 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 peer-checked:border-blue-400 peer-checked:-lg ">
                                <div class="text-5xl mb-3">🏢</div>
                                <span class="mb-2 px-2 py-1 rounded-full font-bold bg-blue-300 text-gray-900 uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs md:text-sm md:text-base text-center w-full truncate">
                                    Stały planing
                                </span>
                                <p class="text-sm text-gray-600 dark:text-gray-400 text-center leading-tight">
                                    Te same godziny każdego dnia, np. pon–pt 08:00–16:00
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 text-center leading-tight flex items-center justify-center gap-1">
                                    <span>☀️</span>
                                    Obsługuje tylko planing dzienny
                                </p>
                            </label>
                        </li>
                        <li class="flex items-center justify-center h-full">
                            <input
                                type="radio"
                                id="variable"
                                name="planning_type"
                                value="variable"
                                class="hidden peer"
                                @if($user->working_hours_regular == 'zmienny planing') checked @endif
                            >
                            <label for="variable"
                                class="flex flex-col items-center justify-center w-full h-full p-5 rounded-2xl  border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-300 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 peer-checked:border-violet-400 peer-checked:-lg ">
                                <div class="text-5xl mb-3">🌀</div>
                                <span class="mb-2 px-2 py-1 rounded-full font-bold bg-violet-300 text-gray-900 uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs md:text-sm md:text-base text-center w-full truncate">
                                    Zmienny planing
                                </span>
                                <p class="text-sm text-gray-600 dark:text-gray-400 text-center leading-tight flex items-center justify-center gap-1">
                                    Elastyczny układ, dodajesz bloki pracy w kalendarzu
                                </p>
                                <p class="text-sm text-green-300 text-center leading-tight flex items-center justify-center gap-1">
                                    <span>☀️</span>
                                    <span>🌙</span>
                                    Obsługuje planing dzienny i nocny
                                </p>
                            </label>
                        </li>

                    </ul>
                </div>
                <div class="mt-4" id="overtime-settings">
                    <h2 class="text-xl font-semibold dark:text-white mb-4 flex items-center gap-2">
                        ⏱️ Ustawienia nadgodzin
                    </h2>

                    <div class="bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl  p-5 space-y-6">

                        <!-- 1️⃣ Włączanie nadgodzin -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Liczenie nadgodzin</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Włącz, jeśli chcesz, aby system monitorował pracę po godzinach.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-clock text-green-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach.
                                </div>
                            </div>
                            <label class="inline-flex items-center md:justify-center md:w-48">
                                <input type="checkbox" class="sr-only peer"
                                    name="overtime"
                                    @if($user->overtime) checked @endif
                                >
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                            </label>
                        </div>

                        <div class="block md:hidden border-t border-gray-200 dark:border-gray-700 my-4"></div>

                        <!-- 2️⃣ Próg aktywacji nadgodzin -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Próg naliczania</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Po ilu minutach powyżej planu system uzna czas za nadgodziny.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-hourglass-half text-yellow-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach po przekroczeniu progu.
                                </div>
                            </div>
                            <div class="flex items-center gap-2  md:justify-center md:w-48">
                                <x-my-number name="overtime_threshold" min="0" placeholder="0" value="{{$user->overtime_threshold}}" />
                                <span class="text-gray-700 dark:text-gray-300">minut</span>
                            </div>
                        </div>

                        <div class="block md:hidden border-t border-gray-200 dark:border-gray-700 my-4"></div>

                        <!-- 3️⃣ Zadania i powiadomienia -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Wymagaj zadania w nadgodzinach</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Po przekroczeniu progu użytkownik otrzyma e-mail z prośbą o opis zadania. Po uzupełnieniu zadania system wyśle powiadomienie do przełożonego.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-regular fa-lightbulb text-yellow-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach po przekroczeniu progu oraz uzupełnieniu zadania.
                                </div>
                            </div>
                            <label class="inline-flex items-center md:justify-center md:w-48">
                                <input type="checkbox" class="sr-only peer"
                                    name="overtime_task"
                                    @if($user->overtime_task) checked @endif
                                >
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                            </label>
                        </div>

                        <div class="block md:hidden border-t border-gray-200 dark:border-gray-700 my-4"></div>

                        <!-- 4️⃣ Wymagaj zatwierdzenia nadgodzin -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Wymagaj zatwierdzenia przez przełożonego</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Nadgodziny zostaną doliczone dopiero po akceptacji przełożonego w systemie.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-bell text-purple-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach po przekroczeniu progu, uzupełnieniu zadania oraz zatwierdzeniu przez przełożonego.
                                </div>
                            </div>
                            <label class="inline-flex items-center md:justify-center md:w-48">
                                <input type="checkbox" class="sr-only peer"
                                    name="overtime_accept"
                                    @if($user->overtime_accept) checked @endif
                                >
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                            </label>
                        </div>

                    </div>
                </div>
                <!--ZAPISZ-->
                <div class="flex justify-start mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
                <!--ZAPISZ-->
            </form>
