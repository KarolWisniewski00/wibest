<x-app-layout>
    @include('admin.elements.alerts')
    <x-main-no-filter>
        <div class="p-4">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('rcp.work-session.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-50 mb-4 text-center">Edycja Oferty</h2>
            <!--POWRÓT-->

            <div class="mb-4">
                <x-label-form value="Z jaką sytuacją mamy do czynienia?" />
                <div class="relative">
                    <ul class="grid w-full gap-4 md:grid-cols-3">
                        <li>
                            <input name="situation"
                                type="radio"
                                value="pierwsze_wdrozenie"
                                id="pierwsze_wdrozenie"
                                class="hidden peer">

                            <label for="pierwsze_wdrozenie"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Pierwsze wdrożenie systemu ewidencji czasu pracy
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="situation"
                                type="radio"
                                value="zmiana_systemu"
                                id="zmiana_systemu"
                                class="hidden peer">

                            <label for="zmiana_systemu"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Zmiana obecnie używanego systemu
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-4">
                <x-label-form value="Jakie problemy chce rozwiązać klient?" />
                <div class="relative">
                    <ul class="grid w-full gap-4 md:grid-cols-3">
                        <li>
                            <input name="problems"
                                value="chaos_w_godzinach_pracy"
                                id="chaos_w_godzinach_pracy"
                                type="checkbox"
                                class="hidden peer">

                            <label for="chaos_w_godzinach_pracy"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Chaos w godzinach pracy pracowników
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="problems"
                                value="reczne_rozliczanie_czasu"
                                id="reczne_rozliczanie_czasu"
                                type="checkbox"
                                class="hidden peer">

                            <label for="reczne_rozliczanie_czasu"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Ręczne rozliczanie czasu (papier / Excel)
                                </div>
                            </label>
                        </li>
                        <li>
                            <input name="problems"
                                value="bledy_w_nadgodzinach_lub_wyplatach"
                                id="bledy_w_nadgodzinach_lub_wyplatach"
                                type="checkbox"
                                class="hidden peer">

                            <label for="bledy_w_nadgodzinach_lub_wyplatach"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Błędy w nadgodzinach lub wypłatach
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="problems"
                                value="brak_biezacej_kontroli_nad_praca_w_terenie"
                                id="brak_biezacej_kontroli_nad_praca_w_terenie"
                                type="checkbox"
                                class="hidden peer">

                            <label for="brak_biezacej_kontroli_nad_praca_w_terenie"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Brak bieżącej kontroli nad pracą w terenie
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="problems"
                                value="brak_biezacej_kontroli_nad_praca_w_nadgodzinach"
                                id="brak_biezacej_kontroli_nad_praca_w_nadgodzinach"
                                type="checkbox"
                                class="hidden peer">

                            <label for="brak_biezacej_kontroli_nad_praca_w_nadgodzinach"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Brak bieżącej kontroli nad pracą w nadgodzinach
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="problems"
                                value="problemy_z_urlopami_i_nieobecnosciami"
                                id="problemy_z_urlopami_i_nieobecnosciami"
                                type="checkbox"
                                class="hidden peer">

                            <label for="problemy_z_urlopami_i_nieobecnosciami"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Problemy z urlopami i nieobecnościami
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="problems"
                                value="brak_danych_do_raportow_i_decyzji"
                                id="brak_danych_do_raportow_i_decyzji"
                                type="checkbox"
                                class="hidden peer">

                            <label for="brak_danych_do_raportow_i_decyzji"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Brak danych do raportów i decyzji
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="problems"
                                value="brak_szybkiego_dostepu_do_danych"
                                id="brak_szybkiego_dostepu_do_danych"
                                type="checkbox"
                                class="hidden peer">

                            <label for="brak_szybkiego_dostepu_do_danych"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Brak szybkiego dostępu do danych
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-4 md:w-48">
                <x-label-form value="Jaka ilość użytkowników?" />
                <x-my-number name="users" min="1" placeholder="0" value="1" />
            </div>
            <div class="mb-4 md:w-48">
                <x-label-form value="Jaka cena za użytkownika?" />
                <x-my-number name="price" min="1" placeholder="0" value="10" />
            </div>
            <div class="mb-4">
                <x-label-form value="Charakter pracy zespołu" />
                <div class="relative">
                    <ul class="grid w-full gap-4 md:grid-cols-3">
                        <li>
                            <input name="problems"
                                value="praca_w_terenie"
                                id="praca_w_terenie"
                                type="checkbox"
                                class="hidden peer">

                            <label for="praca_w_terenie"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Praca w terenie
                                </div>
                            </label>
                        </li>

                        <li>
                            <input name="problems"
                                value="praca_zmianowa"
                                id="praca_zmianowa"
                                type="checkbox"
                                class="hidden peer">

                            <label for="praca_zmianowa"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Praca zmianowa
                                </div>
                            </label>
                        </li>
                        <li>
                            <input name="problems"
                                value="praca_biurowa"
                                id="praca_biurowa"
                                type="checkbox"
                                class="hidden peer">

                            <label for="praca_biurowa"
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-300 dark:peer-checked:border-green-300 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
                                    Praca biurowa
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <x-button-green type="submit" class="text-lg">
                    <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                </x-button-green>
            </div>
        </div>
    </x-main-no-filter>
</x-app-layout>