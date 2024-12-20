<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tworzenie Faktury') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <a href="{{ route('invoice') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Faktur
                    </a>
                    <!--POWRÓT-->

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-5xl text-center font-medium text-gray-900 dark:text-gray-100">Wystaw fakturę</h1>

                        <form id="my-form" method="POST" action="{{ route('invoice.store') }}" class="mt-6">
                            @csrf
                            <!-- ====== Date Picker Start -->
                            <div class="flex w-full gap-6 flex-col relative">
                                <div class="mx-auto w-full">
                                    <div class="setting-show-custom hidden">
                                        <label for="number" class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Własny numer
                                        </label>
                                        <input
                                            name="number"
                                            id="number"
                                            type="text"
                                            placeholder="Wpisz własny numer"
                                            class="h-12 w-full appearance-none rounded-lg border border-gray-700 bg-white px-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                                    </div>
                                    <label for="number" class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Numer dokumentu
                                    </label>
                                    <div class="flex flex-col gap-4 w-full appearance-none rounded-lg border border-gray-700 bg-white p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                                        <div class="flex flex-row justify-end gap-4 w-full text-sm dark:text-gray-500">
                                            <button id="set-btn" type="button" class="absolute inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-gears"></i>
                                            </button>
                                        </div>
                                        <div class="flex flex-row gap-4 w-full items-center justify-center">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div id="type">
                                                    <div class="inline-flex p-2 items-center bg-green-800 dark:bg-green-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                                        FVS
                                                    </div>
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Typ dokumentu</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="setting-del-custom w-auto flex flex-col items-center justify-center">
                                                <div id="value-number" class="inline-flex p-2 items-center text-orange-800 dark:text-orange-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-orange-700 dark:hover:text-orange-300 focus:text-orange-700 dark:focus:text-orange-300 active:text-orange-900 dark:active:text-orange-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-orange-800 transition ease-in-out duration-150">
                                                    Numer
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Automatycznie rosnąco</div>
                                            </div>
                                            <div class="setting-show-custom hidden w-auto flex flex-col items-center justify-center">
                                                <div id="value-custom" class="inline-flex p-2 items-center text-rose-800 dark:text-rose-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-rose-700 dark:hover:text-rose-300 focus:text-rose-700 dark:focus:text-rose-300 active:text-rose-900 dark:active:text-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-rose-800 transition ease-in-out duration-150">
                                                    WPISZ TEKST W OKIENKU NIŻEJ
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Podgląd</div>
                                            </div>
                                            <div class="setting-del w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="setting-del w-auto flex flex-col items-center justify-center">
                                                <div id="issue" class=" inline-flex p-2 items-center text-teal-800 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    MM/RRRR
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="set-radios" class="flex flex-col w-full gap-6 hidden">
                                    <div class="flex flex-row justify-between gap-4 w-full mt-4">
                                        <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100">
                                            Zmień ustawienia numerowania
                                        </h1>
                                    </div>
                                    <ul class="grid w-full gap-6 md:grid-cols-4">
                                        <li>
                                            <input
                                                @if($form=='formsimple' )
                                                checked
                                                @endif
                                                name="format" type="radio" id="formsimple" value="formsimple" class="hidden peer">
                                            <label for="formsimple" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                                <span class="w-full text-sm md:text-xl font-semibold">Prosty</span>
                                                <p>Numerowanie faktur w prostym, sekwencyjnym układzie, np. 1, 2, 3</p>
                                                <span class="w-full text-sm md:text-xl font-semibold">Faktura <span class="text-orange-800 dark:text-orange-300 uppercase transition ease-in-out duration-150">NUMER</span></span>
                                                <p class="text-green-500"> </p>
                                            </label>
                                        </li>
                                        <li>
                                            <input
                                                @if($form=='formprimary' )
                                                checked
                                                @endif
                                                name="format" type="radio" id="formprimary" value="formprimary" class="hidden peer">
                                            <label for="formprimary" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                                <span class="w-full text-sm md:text-xl font-semibold">Podstawowy</span>
                                                <p>Numeracja zawierająca rok aktualnej daty, np. 1/2024, 2/2024, 3/2024 dla łatwego odniesienia do roku.</p>
                                                <span class="w-full text-sm md:text-xl font-semibold">Faktura <span class="text-orange-800 dark:text-orange-300 uppercase transition ease-in-out duration-150">NUMER</span><span class="text-teal-800 dark:text-teal-300 uppercase transition ease-in-out duration-150">/RRRR</span></span>
                                                <p class="text-green-500"> </p>
                                            </label>
                                        </li>
                                        <li>
                                            <input
                                                @if($form=='formdate' )
                                                checked
                                                @endif
                                                name="format" type="radio" id="formdate" value="formdate" class="hidden peer">
                                            <label for="formdate" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                                <span class="w-full text-sm md:text-xl font-semibold">Format z datą</span>
                                                <p>Numeracja zawierająca datę, np. 1/09/2024, 2/09/2024, 3/09/2024 dla łatwego odniesienia do roku lub miesiąca.</p>
                                                <span class="w-full text-sm md:text-xl font-semibold">Faktura <span class="text-orange-800 dark:text-orange-300 uppercase transition ease-in-out duration-150">NUMER</span><span class="text-teal-800 dark:text-teal-300 uppercase transition ease-in-out duration-150">/MM/RRRR</span></span>
                                                <p class="text-green-500">Rekomendowane</p>
                                            </label>
                                        </li>
                                        <li>
                                            <input
                                                @if($form=='formcustom' )
                                                checked
                                                @endif
                                                name="format" type="radio" id="formcustom" value="formcustom" class="hidden peer">
                                            <label for="formcustom" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                                <span class="w-full text-sm md:text-xl font-semibold">Własny format</span>
                                                <p>Numeracja wpisywana samodzielnie, numer musi być unikany. Nie może się powtarzać z już istniejącymi.</p>
                                                <span class="w-full text-sm md:text-xl font-semibold">Faktura <span class="text-rose-800 dark:text-rose-300 uppercase transition ease-in-out duration-150">WŁASNY</span></span>
                                                <p class="text-green-500"></p>
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="text-sm text-center dark:text-gray-500 mb-2">System pamięta zawsze ostatni wybór</div>
                                    <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-row gap-4 items-center justify-center">
                                        <button type="button" id="setting-save"
                                            class=" inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-200 border border-transparent rounded-md font-semibold text-lg text-white dark:text-green-800 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-check mr-2"></i>Gotowe
                                        </button>
                                    </div>
                                </div>
                                <div class="mx-auto w-full datepicker-wrapper">
                                    <label for="datepicker" class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Data wystawienia
                                    </label>
                                    <div class="relative mb-3">
                                        <input
                                            id="datepickerFIRST"
                                            type="text"
                                            placeholder="Kliknij i wybierz datę wystawienia"
                                            class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-700 bg-white pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50"
                                            readonly />
                                        <span
                                            id="toggleDatepicker"
                                            class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                                            <svg
                                                width="21"
                                                height="20"
                                                viewBox="0 0 21 20"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18 3.3125H16.3125V2.625C16.3125 2.25 16 1.90625 15.5937 1.90625C15.1875 1.90625 14.875 2.21875 14.875 2.625V3.28125H6.09375V2.625C6.09375 2.25 5.78125 1.90625 5.375 1.90625C4.96875 1.90625 4.65625 2.21875 4.65625 2.625V3.28125H3C1.9375 3.28125 1.03125 4.15625 1.03125 5.25V16.125C1.03125 17.1875 1.90625 18.0938 3 18.0938H18C19.0625 18.0938 19.9687 17.2187 19.9687 16.125V5.25C19.9687 4.1875 19.0625 3.3125 18 3.3125ZM3 4.71875H4.6875V5.34375C4.6875 5.71875 5 6.0625 5.40625 6.0625C5.8125 6.0625 6.125 5.75 6.125 5.34375V4.71875H14.9687V5.34375C14.9687 5.71875 15.2812 6.0625 15.6875 6.0625C16.0937 6.0625 16.4062 5.75 16.4062 5.34375V4.71875H18C18.3125 4.71875 18.5625 4.96875 18.5625 5.28125V7.34375H2.46875V5.28125C2.46875 4.9375 2.6875 4.71875 3 4.71875ZM18 16.6562H3C2.6875 16.6562 2.4375 16.4062 2.4375 16.0937V8.71875H18.5312V16.125C18.5625 16.4375 18.3125 16.6562 18 16.6562Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M9.5 9.59375H8.8125C8.625 9.59375 8.5 9.71875 8.5 9.90625V10.5938C8.5 10.7812 8.625 10.9062 8.8125 10.9062H9.5C9.6875 10.9062 9.8125 10.7812 9.8125 10.5938V9.90625C9.8125 9.71875 9.65625 9.59375 9.5 9.59375Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12.3438 9.59375H11.6562C11.4687 9.59375 11.3438 9.71875 11.3438 9.90625V10.5938C11.3438 10.7812 11.4687 10.9062 11.6562 10.9062H12.3438C12.5312 10.9062 12.6562 10.7812 12.6562 10.5938V9.90625C12.6562 9.71875 12.5312 9.59375 12.3438 9.59375Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M15.1875 9.59375H14.5C14.3125 9.59375 14.1875 9.71875 14.1875 9.90625V10.5938C14.1875 10.7812 14.3125 10.9062 14.5 10.9062H15.1875C15.375 10.9062 15.5 10.7812 15.5 10.5938V9.90625C15.5 9.71875 15.375 9.59375 15.1875 9.59375Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M6.5 12H5.8125C5.625 12 5.5 12.125 5.5 12.3125V13C5.5 13.1875 5.625 13.3125 5.8125 13.3125H6.5C6.6875 13.3125 6.8125 13.1875 6.8125 13V12.3125C6.8125 12.125 6.65625 12 6.5 12Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M9.5 12H8.8125C8.625 12 8.5 12.125 8.5 12.3125V13C8.5 13.1875 8.625 13.3125 8.8125 13.3125H9.5C9.6875 13.3125 9.8125 13.1875 9.8125 13V12.3125C9.8125 12.125 9.65625 12 9.5 12Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12.3438 12H11.6562C11.4687 12 11.3438 12.125 11.3438 12.3125V13C11.3438 13.1875 11.4687 13.3125 11.6562 13.3125H12.3438C12.5312 13.3125 12.6562 13.1875 12.6562 13V12.3125C12.6562 12.125 12.5312 12 12.3438 12Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M15.1875 12H14.5C14.3125 12 14.1875 12.125 14.1875 12.3125V13C14.1875 13.1875 14.3125 13.3125 14.5 13.3125H15.1875C15.375 13.3125 15.5 13.1875 15.5 13V12.3125C15.5 12.125 15.375 12 15.1875 12Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M6.5 14.4062H5.8125C5.625 14.4062 5.5 14.5312 5.5 14.7187V15.4062C5.5 15.5938 5.625 15.7188 5.8125 15.7188H6.5C6.6875 15.7188 6.8125 15.5938 6.8125 15.4062V14.7187C6.8125 14.5312 6.65625 14.4062 6.5 14.4062Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M9.5 14.4062H8.8125C8.625 14.4062 8.5 14.5312 8.5 14.7187V15.4062C8.5 15.5938 8.625 15.7188 8.8125 15.7188H9.5C9.6875 15.7188 9.8125 15.5938 9.8125 15.4062V14.7187C9.8125 14.5312 9.65625 14.4062 9.5 14.4062Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12.3438 14.4062H11.6562C11.4687 14.4062 11.3438 14.5312 11.3438 14.7187V15.4062C11.3438 15.5938 11.4687 15.7188 11.6562 15.7188H12.3438C12.5312 15.7188 12.6562 15.5938 12.6562 15.4062V14.7187C12.6562 14.5312 12.5312 14.4062 12.3438 14.4062Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div
                                        id="datepicker-container"
                                        class="datepicker-container mb-3 w-full flex-col rounded-xl bg-white p-4 shadow-four sm:p-[30px] dark:bg-gray-700 dark:shadow-box-dark hidden">
                                        <div class="flex items-center justify-between pb-4">
                                            <div
                                                id="prevMonth"
                                                class="prevMonth inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="fill-current">
                                                    <path
                                                        d="M16.2375 21.4875C16.0125 21.4875 15.7875 21.4125 15.6375 21.225L7.16249 12.6C6.82499 12.2625 6.82499 11.7375 7.16249 11.4L15.6375 2.77498C15.975 2.43748 16.5 2.43748 16.8375 2.77498C17.175 3.11248 17.175 3.63748 16.8375 3.97498L8.96249 12L16.875 20.025C17.2125 20.3625 17.2125 20.8875 16.875 21.225C16.65 21.375 16.4625 21.4875 16.2375 21.4875Z" />
                                                </svg>
                                            </div>
                                            <span
                                                id="currentMonth"
                                                class="currentMonth text-xl font-medium capitalize text-dark dark:text-white">

                                            </span>
                                            <div
                                                id="nextMonth"
                                                class="nextMonth inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="fill-current">
                                                    <path
                                                        d="M7.7625 21.4875C7.5375 21.4875 7.35 21.4125 7.1625 21.2625C6.825 20.925 6.825 20.4 7.1625 20.0625L15.0375 12L7.1625 3.97498C6.825 3.63748 6.825 3.11248 7.1625 2.77498C7.5 2.43748 8.025 2.43748 8.3625 2.77498L16.8375 11.4C17.175 11.7375 17.175 12.2625 16.8375 12.6L8.3625 21.225C8.2125 21.375 7.9875 21.4875 7.7625 21.4875Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div
                                            class="grid grid-cols-7 justify-between pb-2 pt-4 text-sm font-medium capitalize text-body-color sm:text-lg dark:text-gray-50">
                                            <span
                                                class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                Pon
                                            </span>

                                            <span
                                                class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                Wt
                                            </span>

                                            <span
                                                class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                Śr
                                            </span>

                                            <span
                                                class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                Cz
                                            </span>

                                            <span
                                                class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                Pt
                                            </span>

                                            <span
                                                class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                So
                                            </span>

                                            <span
                                                class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                Nd
                                            </span>
                                        </div>

                                        <div id="days-container" class="days-container grid grid-cols-7 justify-between text-sm font-medium sm:text-lg"></div>
                                        <div class="flex items-center justify-center space-x-3 pt-4 sm:space-x-5">
                                            <button type="button"
                                                id="applyButtonFIRST"
                                                class="applyButton inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-check mr-2"></i>Wybierz datę
                                            </button>
                                            <button type="button"
                                                id="cancelButton"
                                                class="cancelButton inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- ====== Date Picker End -->
                            <button type="button" class="w-full whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-regular fa-plus mr-2"></i>Dodaj datę sprzedaży
                            </button>
                            <!-- Typ Faktury -->
                            <div class="mb-6">
                                <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Typ</h3>
                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                    <li>
                                        <input name="invoice_type" type="radio" id="invoice" value="faktura" class="hidden peer" checked>
                                        <label for="invoice" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50">

                                            <div class="grid grid-cols-3 grid-rows-2 gap-4 w-full h-full">
                                                <div class="row-span-2 h-full flex flex-col justify-center items-center">
                                                    <div class="inline-flex p-2 items-center bg-green-800 dark:bg-green-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                                        FVS
                                                    </div>
                                                </div>
                                                <div class="col-span-2 row-span-2 text-start flex flex-col items-center justify-center">
                                                    <span class="w-full text-sm md:text-xl font-semibold">
                                                        Faktura
                                                    </span>
                                                    <p class="text-green-500 w-full">
                                                        Dokument księgowy
                                                    </p>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="invoice_type" type="radio" id="proform" value="faktura proforma" class="hidden peer">
                                        <label for="proform" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="grid grid-cols-3 grid-rows-2 gap-4 w-full h-full">
                                                <div class="row-span-2 h-full flex flex-col justify-center items-center">
                                                    <div class="inline-flex p-2 items-center bg-violet-800 dark:bg-violet-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">
                                                        PRO
                                                    </div>
                                                </div>
                                                <div class="col-span-2 row-span-2  text-start flex flex-col items-center justify-center">
                                                    <span class="w-full text-sm md:text-xl font-semibold">
                                                        Faktura Proforma
                                                    </span>
                                                    <p class="w-full">
                                                        Dokument na podstawie którego można wystawić fakturę
                                                    </p>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <hr class="border-t border-gray-300 dark:border-gray-700 border-2 my-12">
                            <!-- Termin płatności -->
                            <div class="mb-6">
                                <h3 class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Termin płatności</h3>
                                <div class="grid w-full gap-4">
                                    <div class="mx-auto w-full datepicker-wrapper">
                                        <div class="relative mb-2">
                                            <input
                                                id="datepicker"
                                                type="text"
                                                placeholder="Kliknij i wybierz termin płatności"
                                                class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-700 bg-white pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50"
                                                readonly />
                                            <span
                                                id="toggleDatepicker"
                                                class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                                                <svg
                                                    width="21"
                                                    height="20"
                                                    viewBox="0 0 21 20"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 3.3125H16.3125V2.625C16.3125 2.25 16 1.90625 15.5937 1.90625C15.1875 1.90625 14.875 2.21875 14.875 2.625V3.28125H6.09375V2.625C6.09375 2.25 5.78125 1.90625 5.375 1.90625C4.96875 1.90625 4.65625 2.21875 4.65625 2.625V3.28125H3C1.9375 3.28125 1.03125 4.15625 1.03125 5.25V16.125C1.03125 17.1875 1.90625 18.0938 3 18.0938H18C19.0625 18.0938 19.9687 17.2187 19.9687 16.125V5.25C19.9687 4.1875 19.0625 3.3125 18 3.3125ZM3 4.71875H4.6875V5.34375C4.6875 5.71875 5 6.0625 5.40625 6.0625C5.8125 6.0625 6.125 5.75 6.125 5.34375V4.71875H14.9687V5.34375C14.9687 5.71875 15.2812 6.0625 15.6875 6.0625C16.0937 6.0625 16.4062 5.75 16.4062 5.34375V4.71875H18C18.3125 4.71875 18.5625 4.96875 18.5625 5.28125V7.34375H2.46875V5.28125C2.46875 4.9375 2.6875 4.71875 3 4.71875ZM18 16.6562H3C2.6875 16.6562 2.4375 16.4062 2.4375 16.0937V8.71875H18.5312V16.125C18.5625 16.4375 18.3125 16.6562 18 16.6562Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M9.5 9.59375H8.8125C8.625 9.59375 8.5 9.71875 8.5 9.90625V10.5938C8.5 10.7812 8.625 10.9062 8.8125 10.9062H9.5C9.6875 10.9062 9.8125 10.7812 9.8125 10.5938V9.90625C9.8125 9.71875 9.65625 9.59375 9.5 9.59375Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12.3438 9.59375H11.6562C11.4687 9.59375 11.3438 9.71875 11.3438 9.90625V10.5938C11.3438 10.7812 11.4687 10.9062 11.6562 10.9062H12.3438C12.5312 10.9062 12.6562 10.7812 12.6562 10.5938V9.90625C12.6562 9.71875 12.5312 9.59375 12.3438 9.59375Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M15.1875 9.59375H14.5C14.3125 9.59375 14.1875 9.71875 14.1875 9.90625V10.5938C14.1875 10.7812 14.3125 10.9062 14.5 10.9062H15.1875C15.375 10.9062 15.5 10.7812 15.5 10.5938V9.90625C15.5 9.71875 15.375 9.59375 15.1875 9.59375Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M6.5 12H5.8125C5.625 12 5.5 12.125 5.5 12.3125V13C5.5 13.1875 5.625 13.3125 5.8125 13.3125H6.5C6.6875 13.3125 6.8125 13.1875 6.8125 13V12.3125C6.8125 12.125 6.65625 12 6.5 12Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M9.5 12H8.8125C8.625 12 8.5 12.125 8.5 12.3125V13C8.5 13.1875 8.625 13.3125 8.8125 13.3125H9.5C9.6875 13.3125 9.8125 13.1875 9.8125 13V12.3125C9.8125 12.125 9.65625 12 9.5 12Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12.3438 12H11.6562C11.4687 12 11.3438 12.125 11.3438 12.3125V13C11.3438 13.1875 11.4687 13.3125 11.6562 13.3125H12.3438C12.5312 13.3125 12.6562 13.1875 12.6562 13V12.3125C12.6562 12.125 12.5312 12 12.3438 12Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M15.1875 12H14.5C14.3125 12 14.1875 12.125 14.1875 12.3125V13C14.1875 13.1875 14.3125 13.3125 14.5 13.3125H15.1875C15.375 13.3125 15.5 13.1875 15.5 13V12.3125C15.5 12.125 15.375 12 15.1875 12Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M6.5 14.4062H5.8125C5.625 14.4062 5.5 14.5312 5.5 14.7187V15.4062C5.5 15.5938 5.625 15.7188 5.8125 15.7188H6.5C6.6875 15.7188 6.8125 15.5938 6.8125 15.4062V14.7187C6.8125 14.5312 6.65625 14.4062 6.5 14.4062Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M9.5 14.4062H8.8125C8.625 14.4062 8.5 14.5312 8.5 14.7187V15.4062C8.5 15.5938 8.625 15.7188 8.8125 15.7188H9.5C9.6875 15.7188 9.8125 15.5938 9.8125 15.4062V14.7187C9.8125 14.5312 9.65625 14.4062 9.5 14.4062Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12.3438 14.4062H11.6562C11.4687 14.4062 11.3438 14.5312 11.3438 14.7187V15.4062C11.3438 15.5938 11.4687 15.7188 11.6562 15.7188H12.3438C12.5312 15.7188 12.6562 15.5938 12.6562 15.4062V14.7187C12.6562 14.5312 12.5312 14.4062 12.3438 14.4062Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div
                                            id="datepicker-container"
                                            class="datepicker-container mb-3 w-full flex-col rounded-xl bg-white p-4 shadow-four sm:p-[30px] dark:bg-gray-700 dark:shadow-box-dark hidden">
                                            <div class="flex items-center justify-between pb-4">
                                                <div
                                                    id="prevMonth"
                                                    class="prevMonth inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <svg
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="fill-current">
                                                        <path
                                                            d="M16.2375 21.4875C16.0125 21.4875 15.7875 21.4125 15.6375 21.225L7.16249 12.6C6.82499 12.2625 6.82499 11.7375 7.16249 11.4L15.6375 2.77498C15.975 2.43748 16.5 2.43748 16.8375 2.77498C17.175 3.11248 17.175 3.63748 16.8375 3.97498L8.96249 12L16.875 20.025C17.2125 20.3625 17.2125 20.8875 16.875 21.225C16.65 21.375 16.4625 21.4875 16.2375 21.4875Z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    id="currentMonth"
                                                    class="currentMonth text-xl font-medium capitalize text-dark dark:text-white">

                                                </span>
                                                <div
                                                    id="nextMonth"
                                                    class="nextMonth inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <svg
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="fill-current">
                                                        <path
                                                            d="M7.7625 21.4875C7.5375 21.4875 7.35 21.4125 7.1625 21.2625C6.825 20.925 6.825 20.4 7.1625 20.0625L15.0375 12L7.1625 3.97498C6.825 3.63748 6.825 3.11248 7.1625 2.77498C7.5 2.43748 8.025 2.43748 8.3625 2.77498L16.8375 11.4C17.175 11.7375 17.175 12.2625 16.8375 12.6L8.3625 21.225C8.2125 21.375 7.9875 21.4875 7.7625 21.4875Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div
                                                class="grid grid-cols-7 justify-between pb-2 pt-4 text-sm font-medium capitalize text-body-color sm:text-lg dark:text-gray-50">
                                                <span
                                                    class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                    Pon
                                                </span>

                                                <span
                                                    class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                    Wt
                                                </span>

                                                <span
                                                    class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                    Śr
                                                </span>

                                                <span
                                                    class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                    Cz
                                                </span>

                                                <span
                                                    class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                    Pt
                                                </span>

                                                <span
                                                    class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                    So
                                                </span>

                                                <span
                                                    class="flex h-[38px] w-[38px] items-center justify-center sm:h-[46px] sm:w-[47px]">
                                                    Nd
                                                </span>
                                            </div>

                                            <div id="days-container" class="days-container grid grid-cols-7 justify-between text-sm font-medium sm:text-lg"></div>
                                            <div class="flex items-center justify-center space-x-3 pt-4 sm:space-x-5">
                                                <button type="button"
                                                    id="applyButton"
                                                    class="applyButton inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-check mr-2"></i>Wybierz datę
                                                </button>
                                                <button type="button"
                                                    id="cancelButton"
                                                    class="cancelButton inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-center dark:text-gray-500 mb-2">Termin płatności możesz wybrać jako konkretny dzień wyżej, a niżej za pomocą szybkiego wybierania na podstawie daty wystawienia</div>
                                <ul class="grid w-full grid-cols-2 gap-6 md:grid-cols-3">
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_now" value="1" class="hidden peer">
                                        <label for="payment_now" class="dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-100 dark:peer-checked:bg-gray-700 dark:peer-checked:text-gray-50 h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-800 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <span class="w-full text-sm md:text-xl font-semibold">
                                                    1 dzień
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_1day" value="2" class="hidden peer">
                                        <label for="payment_1day" class="dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-100 dark:peer-checked:bg-gray-700 dark:peer-checked:text-gray-50 h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-800 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <span class="w-full text-sm md:text-xl font-semibold">
                                                    2 dni
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_3days" value="3" class="hidden peer">
                                        <label for="payment_3days" class="dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-100 dark:peer-checked:bg-gray-700 dark:peer-checked:text-gray-50 h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-800 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <span class="w-full text-sm md:text-xl font-semibold">
                                                    3 dni
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_7days" value="7" class="hidden peer">
                                        <label for="payment_7days" class="dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-100 dark:peer-checked:bg-gray-700 dark:peer-checked:text-gray-50 h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-800 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <span class="w-full text-sm md:text-xl font-semibold">
                                                    7 dni
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_14days" value="14" class="hidden peer">
                                        <label for="payment_14days" class="dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-100 dark:peer-checked:bg-gray-700 dark:peer-checked:text-gray-50 h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-800 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <span class="w-full text-sm md:text-xl font-semibold">
                                                    14 dni
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_30days" value="30" class="hidden peer">
                                        <label for="payment_30days" class="dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-100 dark:peer-checked:bg-gray-700 dark:peer-checked:text-gray-50 h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-800 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-white dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <span class="w-full text-sm md:text-xl font-semibold">
                                                    30 dni
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                                @error('payment_term')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <hr class="border-t border-gray-300 dark:border-gray-700 border-2 my-12">
                            <!-- SPRZEDAWCA I NABYWCA -->
                            <div class="mb-6">
                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                    <li>
                                        <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Sprzedawca</h3>
                                    </li>
                                    <li>
                                        <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Nabywca</h3>
                                    </li>
                                </ul>
                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                    <li>
                                        <div class="flex flex-col gap-4 w-full h-full appearance-none rounded-lg border border-gray-700 bg-white p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                                            <div class="md:grid md:gap-4 py-4 border-b dark:border-gray-700">
                                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                                    Nazwa
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                    <a href="{{route('setting')}}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                        <span class="mr-2 inline-flex p-2 items-center bg-blue-800 dark:bg-blue-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                                            ORG
                                                        </span>
                                                        {{$company->name}}
                                                    </a>
                                                    <input type="hidden" value="{{$company->id}}" name="company_id">
                                                    <input type="hidden" value="{{$company->name}}" name="seller_name">
                                                </p>
                                                @error('company_id')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                                @error('seller_name')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="md:grid md:gap-4 py-4 border-b dark:border-gray-700">
                                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                                    Adres
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                    {{$company->adress}}
                                                    <input type="hidden" value="{{$company->adress}}" name="seller_adress">
                                                </p>
                                                @error('seller_adress')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="md:grid md:gap-4 py-4 border-b dark:border-gray-700">
                                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                                    NIP
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                    {{$company->vat_number}}
                                                    <input type="hidden" value="{{$company->vat_number}}" name="seller_vat_number">
                                                </p>
                                                @error('seller_vat_number')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="md:grid md:gap-4 py-4 border-b dark:border-gray-700">
                                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                                    Numer konta
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                    {{$company->bank}}
                                                    <input type="hidden" value="{{$company->bank}}" name="bank">
                                                </p>
                                                @error('bank')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="relative flex flex-col gap-4 w-full h-full appearance-none rounded-lg  border-2 border-gray-200 dark:border-gray-700 p-4 outline-none  dark:text-gray-50">
                                            <div class="md:grid md:gap-4 py-4 ">
                                                <button id="set-btn" type="button" class="top-3 right-4 absolute inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-gears"></i>
                                                </button>
                                                <!-- Klient -->
                                                <div class="mb-6">
                                                    <label for="buyer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa nabywcy</label>
                                                    <input list="buyer_name_suggestions" id="buyer_name" name="buyer_name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                    <datalist id="buyer_name_suggestions">
                                                        @foreach ($clients as $client)
                                                        <option value="{{ $client->name }}" data-id="{{ $client->id }}" data-name="{{ $client->name }}" data-address="{{ $client->adress }}" data-vat-number="{{ $client->vat_number }}">
                                                            {{ $client->vat_number }}
                                                        </option>
                                                        @endforeach
                                                    </datalist>
                                                    <input type="hidden" id="client_id" name="client_id" value="">
                                                    @error('client_id')
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                    @enderror
                                                    @error('buyer_name')
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <!-- Adres -->
                                                <div class="mb-6">
                                                    <label for="buyer_adress" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adres nabywcy</label>
                                                    <input type="text" id="buyer_address" name="buyer_adress" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                    @error('buyer_adress')
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <!-- NIP -->
                                                <div class="mb-6">
                                                    <label for="buyer_vat_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP nabywcy</label>
                                                    <div class="flex justify-end space-x-4">
                                                        <input type="text" id="buyer_vat_number" name="buyer_vat_number" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                        @error('buyer_vat_number')
                                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button id="fetch_vat_data" type="button"
                                                    class="mx-auto whitespace-nowrap inline-flex items-center px-4 py-2 bg-indigo-800 dark:bg-indigo-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-300 focus:bg-indigo-700 dark:focus:bg-indigo-300 active:bg-indigo-900 dark:active:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150">
                                                    Pobierz dane podatnika VAT
                                                </button>
                                                <div id="info" class="text-sm text-center dark:text-gray-500 mt-2">Po uzupełnieniu numeru NIP naciśnij przycisk, działa TYLKO dla podatników VAT</div>
                                                <a id="kas" href="https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat" class="text-center text-blue-600 dark:text-blue-400 hover:underline text-xs mt-1">Źródło: https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat</a>
                                                <a id="gus" href="https://api.stat.gov.pl/Home/RegonApi" class="hidden text-center text-blue-600 dark:text-blue-400 hover:underline text-xs mt-1">Źródło: https://api.stat.gov.pl/Home/RegonApi</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="grid w-full gap-6 md:grid-cols-3">
                                <li>
                                    <input
                                        name="sourceclient" type="radio" id="" value="" class="hidden peer">
                                    <label for="" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                        <span class="w-full text-sm md:text-xl font-semibold"><span class="text-indigo-800 dark:text-indigo-300 uppercase transition ease-in-out duration-150">Domyślna</span> wyszukiwarka</span>
                                        <p>Na podstawie NAZWY założonych klientów w zakładce klienci, system zaciąga dane. Wszystkie inne wysukiwarki mają tą wbudowaną domyślnie</p>
                                        <span class="w-full text-sm md:text-xl font-semibold"></span>
                                        <p class="text-green-500"> </p>
                                    </label>
                                </li>
                                <li>
                                    <input checked
                                        name="sourceclient" type="radio" id="" value="" class="hidden peer">
                                    <label for="" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                        <span class="w-full text-sm md:text-xl font-semibold">Wyszukiwarka <span class="text-indigo-800 dark:text-indigo-300 uppercase transition ease-in-out duration-150">GUS</span></span>
                                        <p>Na podstawie numeru NIP system zaciąga dane z ogólnodostępnej bazy danych GUS</p>
                                        <span class="w-full text-sm md:text-xl font-semibold"></span>
                                        <p class="text-green-500">Rekomendowane</p>
                                    </label>
                                </li>
                                <li>
                                    <input
                                        name="sourceclient" type="radio" id="" value="" class="hidden peer">
                                    <label for="" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                        <span class="w-full text-sm md:text-xl font-semibold"><span class="text-indigo-800 dark:text-indigo-300 uppercase transition ease-in-out duration-150">KAS</span></span>
                                        <p>Na podstawie numeru NIP system zaciąga dane podatników VAT, oznacza to że przedsiębircy zwolnieni z VAT-u nie będą widoczni w tej bazie, a same dane mogą być niekompletne</p>
                                        <span class="w-full text-sm md:text-xl font-semibold"></span>
                                        <p class="text-green-500"> </p>
                                    </label>
                                </li>
                            </ul>
                            <div class="text-sm text-center dark:text-gray-500 mb-2">System pamięta zawsze ostatni wybór</div>
                            <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-row gap-4 items-center justify-center">
                                <button type="button" id=""
                                    class=" inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-200 border border-transparent rounded-md font-semibold text-lg text-white dark:text-green-800 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Gotowe
                                </button>
                            </div>
                            <!-- Pozycje faktury -->
                            <div class="mb-6">
                                <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Pozycje na fakturze</h3>
                                <div id="invoice-items" class="mt-6">

                                    <!-- KONTERNER DLA POZYCJI -->
                                    <div class="invoice-item grid grid-cols-1 md:grid-cols-6 gap-4 mb-4">

                                    </div>
                                </div>

                                <!-- PODSUMOWANIE -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <!-- Lewa kolumna (3/4 szerokości) -->
                                    <div class="md:col-span-1">
                                        <div class="mt-8">
                                            <button type="button" id="add-item" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-plus mr-2"></i>Dodaj pozycję
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Prawa kolumna (1/4 szerokości) - Podsumowanie -->
                                    <div class="md:col-span-1">
                                        <div id="summary" class="flex flex-col gap-4 w-full appearance-none rounded-lg border border-gray-700 bg-white p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                                            <span class="w-full text-sm md:text-xl font-semibold dark:text-gray-50 text-end">
                                                Podsumowanie
                                            </span>
                                            <div class="mt-4">
                                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 text-end w-full text-sm md:text-xl font-semibold dark:text-gray-50 text-end">Suma netto:
                                                    <span id="total_netto" class="font-bold">0.00</span> zł
                                                </p>
                                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 text-end">Suma VAT:
                                                    <span id="total_vat" class="font-bold">0.00</span> zł
                                                </p>
                                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 text-end">Suma brutto:
                                                    <span id="total_brutto" class="font-bold">0.00</span> zł
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Typ Faktury -->
                            <div class="mb-6">
                                <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Płatność</h3>
                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                    <li>
                                        <input name="invoice_type1" type="radio" id="invoice1" value="faktura" class="hidden peer" checked>
                                        <label for="invoice1" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-green-500">
                                            <div class="col-span-2 text-start flex flex-col items-center justify-center">
                                                <span class=" w-full text-sm md:text-xl font-semibold">
                                                    Opłacono
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="invoice_type1" type="radio" id="proform1" value="faktura proforma" class="hidden peer">
                                        <label for="proform1" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="col-span-2 text-start flex flex-col items-center justify-center">
                                                <span class=" w-full text-sm md:text-xl font-semibold">
                                                    Opłacono częściowo
                                                </span>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- Metoda płatności -->
                            <div class="mb-6">
                                <h3 class="mb-5 block text-sm font-medium text-gray-700 dark:text-gray-300">Metoda płatności</h3>
                                <ul class="grid w-full gap-6 grid-cols-2 md:grid-cols-4">
                                    <li>
                                        <input name="payment_method" checked type="radio" id="payment_transfer" value="przelew" class="hidden peer">
                                        <label for="payment_transfer" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50">
                                            <div class="block">
                                                <div class="w-full text-sm md:text-xl font-semibold">Przelew</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_method" type="radio" id="payment_cash" value="gotowka" class="hidden peer">
                                        <label for="payment_cash" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50">
                                            <div class="block">
                                                <div class="w-full text-sm md:text-xl font-semibold">Gotówka</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_method" type="radio" id="payment_cod" value="pobranie" class="hidden peer">
                                        <label for="payment_cod" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50">
                                            <div class="block">
                                                <div class="w-full text-sm md:text-xl font-semibold">Opłata za pobraniem</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_method" type="radio" id="payment_online" value="online" class="hidden peer">
                                        <label for="payment_online" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50">
                                            <div class="block">
                                                <div class="w-full text-sm md:text-xl font-semibold">Płatność On-Line</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                                @error('payment_method')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Uwagi -->
                            <div class="mb-6">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"></textarea>
                                @error('notes')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                            <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-row gap-4 items-center justify-center">
                                <button type="submit" id="modal-save"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Wystaw fakturę
                                </button>
                                <button type="button"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-emerald-800 dark:bg-emerald-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-emerald-700 dark:hover:bg-emerald-300 focus:bg-emerald-700 dark:focus:bg-emerald-300 active:bg-emerald-900 dark:active:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-emerald-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-paper-plane mr-2"></i>Wystaw i wyślij fakturę
                                </button>
                                <button type="button" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-regular fa-floppy-disk mr-2"></i>Zapisz jako szkic
                                </button>
                                <a href="{{ route('invoice') }}"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                </a>
                            </div>
                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                        </form>
                    </div>
                    <!--FORMULARZ-->
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="form" value="{{$form}}">
    <input type="hidden" id="api-link" value="{{route('api.invoice.value',['','',''])}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let type = 'faktura sprzedażowa';
            let monthapi = null;
            let yearapi = null;
            let value = null;
            let formdate = null;
            let formprimary = null;
            let formsimple = null;
            let apiLink = $('#api-link');
            let issueDateFIRST = $('#issue');
            let settingsSave = $('#setting-save');
            let form = $('#form').val();
            let selectedDate = null;

            function initDatepicker(container) {
                const datepicker = container.find('.datepicker');
                const datepickerContainer = container.find('.datepicker-container');
                const daysContainer = container.find('.days-container');
                const currentMonthElement = container.find('.currentMonth');
                const prevMonthButton = container.find('.prevMonth');
                const nextMonthButton = container.find('.nextMonth');
                const cancelButton = container.find('.cancelButton');
                const applyButton = container.find('.applyButton');
                const toggleDatepicker = container.find('.toggleDatepicker');
                const applyButtonFIRST = $('#applyButtonFIRST');
                const applyButtonSECOND = $('#applyButton');
                const datepickerFIRST = $('#datepickerFIRST');
                const issueDates = $('.issue-date-form');

                let currentDate = new Date();

                // Format today's date as DD/MM/YYYY
                const formatDate = (date) => {
                    const day = String(date.getDate()).padStart(2, '0');
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const year = date.getFullYear();
                    return `${day}/${month}/${year}`;
                };
                const formatDate2 = (date) => {
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const year = date.getFullYear();
                    return `${month}/${year}`;
                };
                const formatDate3 = (date) => {
                    const year = date.getFullYear();
                    return `${year}`;
                };

                // Set today's date as the default value
                issueDates.html(formatDate(currentDate));
                datepickerFIRST.val(formatDate(currentDate));
                if (form == 'formdate') {
                    issueDateFIRST.html(formatDate2(currentDate));
                } else if (form == 'formprimary') {
                    issueDateFIRST.html(formatDate3(currentDate));
                } else if (form == 'formsimple') {
                    issueDateFIRST.addClass('hidden');
                } else if (form == 'formcustom') {
                    issueDateFIRST.addClass('hidden');
                }
                $.ajax({
                    url: apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type, // Endpoint Laravel
                    type: 'GET', // Typ żądania,
                    dataType: 'json', // Oczekiwany format odpowiedzi
                    success: function(response) {
                        value = response
                        $('#value-number').html(value)
                        console.log(apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type)
                    },
                    error: function(xhr, status, error) {
                        // Obsługa błędów
                        console.error('Błąd:', error);
                    }
                });

                function renderCalendar() {
                    const year = currentDate.getFullYear();
                    const month = currentDate.getMonth();

                    currentMonthElement.text(currentDate.toLocaleDateString('pl-PL', {
                        month: 'long',
                        year: 'numeric'
                    }));

                    daysContainer.empty();
                    const firstDayOfMonth = new Date(year, month, 1).getDay();
                    const daysInMonth = new Date(year, month + 1, 0).getDate();

                    for (let i = 0; i < firstDayOfMonth; i++) {
                        daysContainer.append('<div></div>');
                    }

                    for (let i = 1; i <= daysInMonth; i++) {
                        const day = $(`<div class="flex h-[38px] w-[38px] items-center justify-center rounded-lg text-dark hover:cursor-pointer hover:bg-teal-600 sm:h-[46px] sm:w-[47px] dark:text-gray-50 dark:hover:bg-teal-300 dark:hover:text-gray-900 mb-2">${i}</div>`);

                        day.on('click', function() {
                            selectedDate = `${$(this).text()}/${month + 1}/${year}`;
                            formdate = `${month + 1}/${year}`;
                            formprimary = `${year}`;
                            monthapi = `${month + 1}`;
                            yearapi = `${year}`;
                            daysContainer.find('div').removeClass('dark:bg-teal-300 bg-teal-600 dark:text-gray-900 text-teal-900');
                            $(this).addClass('dark:bg-teal-300 bg-teal-600 dark:text-gray-900 text-teal-900');
                        });

                        daysContainer.append(day);
                    }
                }
                datepicker.on('click', function() {
                    datepickerContainer.toggleClass('hidden');
                    renderCalendar();
                });

                toggleDatepicker.on('click', function() {
                    datepickerContainer.toggleClass('hidden');
                    renderCalendar();
                });

                prevMonthButton.on('click', function() {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    renderCalendar();
                });

                nextMonthButton.on('click', function() {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    renderCalendar();
                });
                $('#number').on('input', function() {
                    const value = $('#number').val();
                    $('#value-custom').html(value ? value : 'WPISZ TEKST W OKIENKU NIŻEJ')
                });

                cancelButton.on('click', function() {
                    selectedDate = null;
                    datepickerContainer.addClass('hidden');
                });
                $('input[name="payment_term"]').on('change', function() {
                    var term = $('input[name="payment_term"]:checked').val();
                    let dateString = datepickerFIRST.val();
                    let [day, month, year] = dateString.split("/").map(Number);
                    let dateObject = null;
                    switch (term) {
                        case '1':
                            dateObject = new Date(year, month - 1, day + 1);
                            $('#datepicker').val(formatDate(dateObject));
                            break;
                        case '2':
                            dateObject = new Date(year, month - 1, day + 2);
                            $('#datepicker').val(formatDate(dateObject));
                            break;
                        case '3':
                            dateObject = new Date(year, month - 1, day + 3);
                            $('#datepicker').val(formatDate(dateObject));
                            break;
                        case '7':
                            dateObject = new Date(year, month - 1, day + 7);
                            $('#datepicker').val(formatDate(dateObject));
                            break;
                        case '14':
                            dateObject = new Date(year, month - 1, day + 14);
                            $('#datepicker').val(formatDate(dateObject));
                            break;
                        case '30':
                            dateObject = new Date(year, month - 1, day + 30);
                            $('#datepicker').val(formatDate(dateObject));
                            break;

                        default:
                            break;
                    }
                });
                $('input[name="format"]').on('change', function() {
                    form = $('input[name="format"]:checked').val();
                    if (form == 'formdate') {
                        $('.setting-del').removeClass('hidden');
                        $('.setting-del-custom').removeClass('hidden');
                        $('.setting-show-custom').addClass('hidden');
                        let dateString = datepickerFIRST.val();
                        let [day, month, year] = dateString.split("/").map(Number);
                        let dateObject = new Date(year, month - 1, day);
                        try {
                            issueDateFIRST.html(formatDate2(dateObject));
                        } catch (error) {
                            issueDateFIRST.html(formatDate3(currentDate));
                        }
                    } else if (form == 'formprimary') {
                        $('.setting-del').removeClass('hidden');
                        $('.setting-del-custom').removeClass('hidden');
                        $('.setting-show-custom').addClass('hidden');
                        let dateString = datepickerFIRST.val();
                        let [day, month, year] = dateString.split("/").map(Number);
                        let dateObject = new Date(year, month - 1, day);
                        try {
                            issueDateFIRST.html(formatDate3(dateObject));
                        } catch (error) {
                            issueDateFIRST.html(formatDate3(currentDate));
                        }
                    } else if (form == 'formsimple') {
                        $('.setting-del').addClass('hidden');
                        $('.setting-del-custom').removeClass('hidden');
                        $('.setting-show-custom').addClass('hidden');
                    } else if (form == 'formcustom') {
                        $('.setting-del').addClass('hidden');
                        $('.setting-del-custom').addClass('hidden');
                        $('.setting-show-custom').removeClass('hidden');
                    }
                });
                settingsSave.on('click', function() {
                    $('#set-radios').addClass('hidden');
                });
                $('#set-btn').on('click', function() {
                    $('#set-radios').removeClass('hidden');
                });
                applyButton.on('click', function() {
                    if (selectedDate) {
                        datepicker.val(selectedDate);
                    }
                    datepickerContainer.addClass('hidden');
                });
                applyButtonSECOND.on('click', function() {
                    $('input[name="payment_term"][value="1"]').prop('checked', false);
                    $('input[name="payment_term"][value="2"]').prop('checked', false);
                    $('input[name="payment_term"][value="3"]').prop('checked', false);
                    $('input[name="payment_term"][value="7"]').prop('checked', false);
                    $('input[name="payment_term"][value="14"]').prop('checked', false);
                    $('input[name="payment_term"][value="30"]').prop('checked', false);

                    var term = $('input[name="payment_term"]:checked').val();
                    let dateString = datepickerFIRST.val();
                    let [day, month, year] = dateString.split("/").map(Number);
                    dateObject = new Date(year, month - 1, day + 1);
                    var formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="payment_term"][value="1"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 2);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="payment_term"][value="2"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 3);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="payment_term"][value="3"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 7);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="payment_term"][value="7"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 14);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="payment_term"][value="14"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 30);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="payment_term"][value="30"]').prop('checked', true);
                    }
                });
                applyButtonFIRST.on('click', function() {
                    if (selectedDate) {
                        issueDates.html(selectedDate);
                        if (form == 'formdate') {
                            $('.setting-del').removeClass('hidden');
                            $('.setting-del-custom').removeClass('hidden');
                            $('.setting-show-custom').addClass('hidden');
                            let dateString = datepickerFIRST.val();
                            let [day, month, year] = dateString.split("/").map(Number);
                            let dateObject = new Date(year, month - 1, day);
                            try {
                                issueDateFIRST.html(formatDate2(dateObject));
                            } catch (error) {
                                issueDateFIRST.html(formatDate3(currentDate));
                            }
                        } else if (form == 'formprimary') {
                            $('.setting-del').removeClass('hidden');
                            $('.setting-del-custom').removeClass('hidden');
                            $('.setting-show-custom').addClass('hidden');
                            let dateString = datepickerFIRST.val();
                            let [day, month, year] = dateString.split("/").map(Number);
                            let dateObject = new Date(year, month - 1, day);
                            try {
                                issueDateFIRST.html(formatDate3(dateObject));
                            } catch (error) {
                                issueDateFIRST.html(formatDate3(currentDate));
                            }
                        } else if (form == 'formsimple') {
                            $('.setting-del').addClass('hidden');
                            $('.setting-del-custom').removeClass('hidden');
                            $('.setting-show-custom').addClass('hidden');
                        } else if (form == 'formcustom') {
                            $('.setting-del').addClass('hidden');
                            $('.setting-del-custom').addClass('hidden');
                            $('.setting-show-custom').removeClass('hidden');
                        }
                        var term = $('input[name="payment_term"]:checked').val();
                        if (term) {
                            let dateString = datepickerFIRST.val();
                            let [day, month, year] = dateString.split("/").map(Number);
                            let dateObject = null;
                            switch (term) {
                                case '1':
                                    dateObject = new Date(year, month - 1, day + 1);
                                    $('#datepicker').val(formatDate(dateObject));
                                    break;
                                case '2':
                                    dateObject = new Date(year, month - 1, day + 2);
                                    $('#datepicker').val(formatDate(dateObject));
                                    break;
                                case '3':
                                    dateObject = new Date(year, month - 1, day + 3);
                                    $('#datepicker').val(formatDate(dateObject));
                                    break;
                                case '7':
                                    dateObject = new Date(year, month - 1, day + 7);
                                    $('#datepicker').val(formatDate(dateObject));
                                    break;
                                case '14':
                                    dateObject = new Date(year, month - 1, day + 14);
                                    $('#datepicker').val(formatDate(dateObject));
                                    break;
                                case '30':
                                    dateObject = new Date(year, month - 1, day + 30);
                                    $('#datepicker').val(formatDate(dateObject));
                                    break;

                                default:
                                    break;
                            }
                        }
                    }
                    // Wykonanie żądania AJAX
                    $.ajax({
                        url: apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type, // Endpoint Laravel
                        type: 'GET', // Typ żądania,
                        dataType: 'json', // Oczekiwany format odpowiedzi
                        success: function(response) {
                            value = response
                            $('#value-number').html(value)
                            console.log(apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type)
                        },
                        error: function(xhr, status, error) {
                            // Obsługa błędów
                            console.error('Błąd:', error);
                        }
                    });
                });

                // Close datepicker when clicking outside
                $(document).on('click', function(event) {
                    if (!datepicker.is(event.target) && !datepickerContainer.is(event.target) && datepickerContainer.has(event.target).length === 0) {
                        datepickerContainer.addClass('hidden');
                    }
                });
            }

            // Initialize datepickers for all containers with the class 'datepicker-wrapper'
            $('.datepicker-wrapper').each(function() {
                initDatepicker($(this));
            });
            $('#invoice').on('click', function() {
                type = 'faktura sprzedażowa'
                $('#type').html(
                    `
                <div class="inline-flex p-2 items-center bg-green-800 dark:bg-green-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                    FVS
                </div>
                `
                );
                $.ajax({
                    url: apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type, // Endpoint Laravel
                    type: 'GET', // Typ żądania,
                    dataType: 'json', // Oczekiwany format odpowiedzi
                    success: function(response) {
                        value = response
                        $('#value-number').html(value)
                        console.log(apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type)
                    },
                    error: function(xhr, status, error) {
                        // Obsługa błędów
                        console.error('Błąd:', error);
                    }
                });
            });
            $('#proform').on('click', function() {
                type = 'faktura proforma'
                $('#type').html(
                    `
                <div class="inline-flex p-2 items-center bg-violet-800 dark:bg-violet-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">
                    PRO
                </div>
                `
                );
                $.ajax({
                    url: apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type, // Endpoint Laravel
                    type: 'GET', // Typ żądania,
                    dataType: 'json', // Oczekiwany format odpowiedzi
                    success: function(response) {
                        value = response
                        $('#value-number').html(value)
                        console.log(apiLink.val() + '/' + monthapi + '/' + yearapi + '/' + type)
                    },
                    error: function(xhr, status, error) {
                        // Obsługa błędów
                        console.error('Błąd:', error);
                    }
                });
            });
            //POBIERANIE PŁATNIKA VAT
            $('#fetch_vat_data').click(function() {
                var taxId = $('#buyer_vat_number').val();
                var today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

                if (taxId) {
                    $.ajax({
                        url: `https://wl-api.mf.gov.pl/api/search/nip/${taxId}?date=${today}`,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Dane podatnika VAT:', data);

                            // Wstawianie danych do formularza
                            var subject = data.result.subject;
                            $('#buyer_name').val(subject.name || '');

                            // Wstawianie pełnego adresu
                            if (subject.workingAddress) {
                                $('#buyer_address').val(subject.workingAddress || '');
                            }
                            toastr.success('Operacja zakończona powodzeniem!');
                        },
                        error: function(xhr, status, error) {
                            console.error('Błąd:', error);
                            // Możesz tutaj dodać kod do obsługi błędów
                            toastr.error('Operacja zakończona niepowodzeniem!');
                        }
                    });
                } else {
                    alert('Proszę wprowadzić numer NIP.');
                }
            });
            //PODSTAWIANIE KLIENTA
            $('#buyer_name').on('input', function() {
                var input = $(this).val();
                var options = $('#buyer_name_suggestions option');

                options.each(function() {
                    if ($(this).val() === input) {
                        // Pobierz adres z atrybutu data i ustaw w polu adresu
                        var address = $(this).data('address');
                        $('#buyer_address').val(address);

                        // Pobierz NIP z atrybutu data i ustaw w polu NIP
                        var vatNumber = $(this).data('vat-number');
                        $('#buyer_vat_number').val(vatNumber);

                        var vatNumber = $(this).data('id');
                        $('#client_id').val(vatNumber);
                        toastr.success('Operacja zakończona powodzeniem!');
                    }
                });
            });
            
        });
    </script>

</x-app-layout>