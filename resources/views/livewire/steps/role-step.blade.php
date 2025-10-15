<div>

    <div class="mb-4">
        <div id="manager">
            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Wybierz rolę</h3>
            <ul class="grid w-full gap-4 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
                <li>
                    <input name="role" wire:model="state.role" type="radio" id="role-admin" value="admin" class="hidden peer">
                    <label for="role-admin" class="h-full justify-between flex flex-col w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-400 hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <!-- Nazwa roli Admin (duża, wyraźna) -->
                        <div class="mb-4 text-center">
                            <span class="px-4 py-2 rounded-full text-xl font-bold bg-green-300 text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 transition ease-in-out duration-150">
                                Admin
                            </span>
                        </div>

                        <!-- Opis roli -->
                        <p class="text-gray-600 dark:text-gray-400 text-sm my-4 text-center">
                            Pełny dostęp do wszystkich funkcji systemu, w tym do konfiguracji globalnej oraz zarządzania użytkownikami i danymi.
                        </p>

                        <!-- Nagłówek sekcji uprawnień 
                        <h3 class="mb-4 my-2 text-lg font-medium text-gray-900 dark:text-white text-center">
                            Uprawnienia użytkownika
                        </h3>

                        <!-- Tabela uprawnień 
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm rounded-lg">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Uprawnienie</th>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Dostęp</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">

                                    <!-- Wiersze tabeli 
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Urlopy planowane</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Harmonogramy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Wnioski</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Odczyty pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Ewidencja czasu pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Wysyłanie maili</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Tworzenie użytkowników</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Planowanie harmonogramu</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Faktury</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-green-500  dark:bg-green-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
-->
                    </label>
                </li>
                <li>
                    <input name="role" wire:model="state.role" type="radio" id="role-manager" value="menedżer" class="hidden peer">
                    <label for="role-manager" class="h-full  justify-between flex flex-col w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-400 dark:peer-checked:border-blue-400 hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <!-- Nazwa roli Menadżer -->
                        <div class="mb-4 text-center">
                            <span class="px-4 py-2 rounded-full text-xl font-bold bg-blue-300 text-gray-900 uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 transition ease-in-out duration-150">
                                Menadżer
                            </span>
                        </div>

                        <!-- Opis roli -->
                        <p class="text-gray-600 dark:text-gray-400 text-sm my-4 text-center">
                            Posiada dostęp do najważniejszych funkcji systemu, pozwalających na zarządzanie zespołem oraz przeglądanie danych operacyjnych, bez dostępu do konfiguracji globalnej i administracji użytkownikami.
                        </p>

                        <!-- Nagłówek sekcji uprawnień 
                        <h3 class="mb-4 my-2 text-lg font-medium text-gray-900 dark:text-white text-center">
                            Uprawnienia użytkownika
                        </h3>

                        <!-- Tabela uprawnień
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm rounded-lg">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Uprawnienie</th>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Dostęp</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">

                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Harmonogramy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Wnioski</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Odczyty pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Ewidencja czasu pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Urlopy planowane</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Podgląd innych i raportowanie</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Edycja i akceptacja lub odrzucenia wniosku</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Planowanie harmonogramu</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-blue-500  dark:bg-blue-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Tworzenie i edycja użytkowników</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Podgląd do rozliczeń</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
-->
                    </label>
                </li>
                <li>
                    <input name="role" wire:model="state.role" type="radio" id="role-supervisor" value="kierownik" class="hidden peer">
                    <label for="role-supervisor" class="h-full justify-between flex flex-col w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-yellow-400 dark:peer-checked:border-yellow-400 hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <!-- Nazwa roli Kierownik -->
                        <div class="mb-4 text-center">
                            <span class="px-4 py-2 rounded-full text-xl font-bold bg-yellow-300 text-gray-900 uppercase tracking-widest hover:bg-yellow-200 dark:hover:bg-yellow-400 transition ease-in-out duration-150">
                                Kierownik
                            </span>
                        </div>

                        <!-- Opis roli -->
                        <p class="text-gray-600 dark:text-gray-400 text-sm my-4 text-center">
                            Może przeglądać najważniejsze dane operacyjne swojego zespołu oraz zatwierdzać wnioski, bez możliwości zarządzania systemem czy planowania harmonogramów.
                        </p>

                        <!-- Nagłówek sekcji uprawnień 
                        <h3 class="mb-4 my-2 text-lg font-medium text-gray-900 dark:text-white text-center">
                            Uprawnienia użytkownika
                        </h3>

                        <!-- Tabela uprawnień 
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm rounded-lg">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Uprawnienie</th>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Dostęp</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Harmonogramy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-yellow-500  dark:bg-yellow-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Wnioski</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-yellow-500  dark:bg-yellow-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Odczyty pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-yellow-500  dark:bg-yellow-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Ewidencja czasu pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-yellow-500  dark:bg-yellow-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Urlopy planowane</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-yellow-500  dark:bg-yellow-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Podgląd innych i raportowanie</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6  rounded-full bg-yellow-500  dark:bg-yellow-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Edycja i akceptacja lub odrzucenia wniosku</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Planowanie harmonogramu</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Tworzenie i edycja użytkowników</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Podgląd do rozliczeń</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
-->
                    </label>
                </li>
                <li>
                    <input name="role" wire:model="state.role" type="radio" id="role-user" value="użytkownik" class="hidden peer">
                    <label for="role-user" class="h-full justify-between flex flex-col w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-gray-400 dark:peer-checked:border-gray-400 hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <!-- Nazwa roli Użytkownik -->
                        <div class="mb-4 text-center">
                            <span class="px-4 py-2 rounded-full text-xl font-bold bg-gray-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-400 focus:bg-gray-200 dark:focus:bg-gray-300 active:bg-gray-200 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Użytkownik
                            </span>
                        </div>

                        <!-- Opis roli -->
                        <p class="text-gray-600 dark:text-gray-400 text-sm my-4 text-center">
                            Dostęp do swojego grafiku, wniosków oraz danych osobowych. Brak możliwości zarządzania innymi użytkownikami czy konfiguracją systemu.
                        </p>

                        <!-- Nagłówek sekcji uprawnień 
                        <h3 class="mb-4 my-2 text-lg font-medium text-gray-900 dark:text-white text-center">
                            Uprawnienia użytkownika
                        </h3>

                        <!-- Tabela uprawnień 
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm rounded-lg">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Uprawnienie</th>
                                        <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Dostęp</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Harmonogramy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 rounded-full bg-gray-500 dark:bg-gray-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Wnioski</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 rounded-full bg-gray-500 dark:bg-gray-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Odczyty pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 rounded-full bg-gray-500 dark:bg-gray-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">Ewidencja czasu pracy</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 rounded-full bg-gray-500 dark:bg-gray-400 relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform translate-x-5"></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Urlopy planowane</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Podgląd innych i raportowanie</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Edycja i akceptacja lub odrzucenia wniosku</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Planowanie harmonogramu</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Tworzenie i edycja użytkowników</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 text-gray-400 dark:text-gray-600">Podgląd do rozliczeń</td>
                                        <td class="px-4 py-2">
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-300 rounded-full dark:bg-neutral-700  relative">
                                                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform "></div>
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
-->
                    </label>
                </li>
            </ul>
            <p class="text-red-500 text-sm mt-2 dark:text-red-400">{{ $message ?? '' }}</p>
        </div>
    </div>

</div>