<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('offer') }}" class="text-lg">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Ofert
                    </x-button-link-back>
                    <!--POWRÓT-->

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-5xl text-center font-medium text-gray-700 dark:text-gray-100">
                            Przygotuj ofertę
                        </h1>

                        <form id="my-form" method="POST" action="{{ route('offer.store') }}" class="mt-6">
                            @csrf
                            <!-- ====== Date Picker Start -->
                            <div class="flex w-full gap-6 flex-col relative">
                                <div class="mx-auto w-full">
                                    <label for="number" class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Numer dokumentu
                                    </label>
                                    <div class="flex flex-col gap-4 w-full appearance-none rounded-lg bg-white border border-white dark:border-gray-700 p-4 outline-none  dark:bg-gray-700 dark:text-gray-50">
                                        <div class="flex flex-col md:flex-row gap-4 w-full items-center justify-center">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div id="type">
                                                    <div class="inline-flex p-2 items-center bg-yellow-300 dark:bg-yellow-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-300 focus:bg-yellow-700 dark:focus:bg-yellow-300 active:bg-yellow-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-yellow-800 transition ease-in-out duration-150">
                                                        OFR
                                                    </div>
                                                </div>
                                                <div class="text-sm text-center text-gray-700 dark:text-gray-500 mt-2">Typ dokumentu</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-gray-700 dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="setting-del-custom w-auto flex flex-col items-center justify-center">
                                                <div id="value-number" class="inline-flex p-2 items-center text-orange-300 dark:text-orange-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-orange-700 dark:hover:text-orange-300 focus:text-orange-700 dark:focus:text-orange-300 active:text-orange-900 dark:active:text-orange-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-orange-800 transition ease-in-out duration-150">
                                                    Numer
                                                </div>
                                                <div class="text-sm text-center text-gray-700 dark:text-gray-500 mt-2">Automatycznie rosnąco</div>
                                            </div>
                                            <div class="setting-del w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm text-gray-700 dark:text-gray-50 uppercase tracking-widest transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="setting-del w-auto flex flex-col items-center justify-center">
                                                <div id="issue" class=" inline-flex p-2 items-center text-teal-300 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    RRRR
                                                </div>
                                                <div class="text-sm text-center text-gray-700 dark:text-gray-500 mt-2">Data wystawienia</div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('number')
                                    <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mx-auto w-full datepicker-wrapper">
                                    <label for="datepicker" class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Data wystawienia
                                    </label>
                                    <div class="relative mb-3">
                                        <input
                                            name="issue_date"
                                            id="datepickerFIRST"
                                            type="text"
                                            placeholder="Kliknij i wybierz datę wystawienia"
                                            class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50"
                                            readonly />
                                        <span
                                            id="toggleDatepicker"
                                            class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                                            <svg
                                                width="21"
                                                height="20"
                                                viewBox="0 0 21 20"
                                                class="text-gray-700 dark:text-gray-50"
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
                                                class="prevMonth inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-gray-700 dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-700 focus:bg-gray-700 focus:text-white dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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
                                                class="nextMonth inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-gray-700 dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-700 focus:bg-gray-700 focus:text-white dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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
                                        <div class="flex flex-col md:flex-row gap-2 items-center justify-center space-x-3 pt-4 sm:space-x-5">
                                            <button type="button"
                                                id="applyButtonFIRST"
                                                class="applyButton inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-check mr-2"></i>Wybierz datę
                                            </button>
                                            <button type="button"
                                                id="cancelButton"
                                                class="cancelButton inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-gray-700 dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-700 focus:bg-gray-700 focus:text-white dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                            </button>
                                        </div>

                                    </div>
                                    @error('issue_date')
                                    <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-6">
                                <h3 class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Termin ważności</h3>
                                <div class="grid w-full gap-4">
                                    <div class="mx-auto w-full datepicker-wrapper">
                                        <div class="relative mb-2">
                                            <input
                                                name="due_date"
                                                id="datepicker"
                                                type="text"
                                                placeholder="Kliknij i wybierz termin ważności"
                                                class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-100 dark:border-gray-700 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50
                                                "
                                                readonly />
                                            <span
                                                id="toggleDatepicker"
                                                class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                                                <svg
                                                    width="21"
                                                    height="20"
                                                    viewBox="0 0 21 20"
                                                    class="text-gray-700 dark:text-gray-50"
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
                                                    class="prevMonth inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-gray-700 dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-700 focus:bg-gray-700 focus:text-white dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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
                                                    class="nextMonth inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-gray-700 dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-700 focus:bg-gray-700 focus:text-white dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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
                                            <div class="flex flex-col md:flex-row gap-2 items-center justify-center space-x-3 pt-4 sm:space-x-5">
                                                <button type="button"
                                                    id="applyButton"
                                                    class="applyButton inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-check mr-2"></i>Wybierz datę
                                                </button>
                                                <button type="button"
                                                    id="cancelButton"
                                                    class="cancelButton inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-gray-700 dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-700 focus:bg-gray-700 focus:text-white dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-sm text-center text-gray-700 dark:text-gray-500 mb-2">Termin ważności możesz wybrać jako konkretny dzień wyżej, a niżej za pomocą szybkiego wybierania na podstawie daty wystawienia</div>
                                <ul class="grid w-full md:grid-cols-2 gap-6 lg:grid-cols-3">
                                    <li>
                                        <input name="due_term" type="radio" id="payment_now" value="1" class="hidden peer">
                                        <label for="payment_now" class="text-center h-full flex flex-row gap-4 items-center justify-between w-full p-5 text-gray-400 bg-white border-2 border-gray-100 rounded-lg cursor-pointer peer-checked:text-gray-700 peer-checked:bg-gray-100 peer-checked:border-blue-500 hover:text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-300 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm uppercase tracking-widest transition ease-in-out duration-150">
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
                                        <input name="due_term" type="radio" id="payment_1day" value="2" class="hidden peer">
                                        <label for="payment_1day" class="text-center h-full flex flex-row gap-4 items-center justify-between w-full p-5 text-gray-400 bg-white border-2 border-gray-100 rounded-lg cursor-pointer peer-checked:text-gray-700 peer-checked:bg-gray-100 peer-checked:border-blue-500 hover:text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-300 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm uppercase tracking-widest transition ease-in-out duration-150">
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
                                        <input name="due_term" type="radio" id="payment_3days" value="3" class="hidden peer">
                                        <label for="payment_3days" class="text-center h-full flex flex-row gap-4 items-center justify-between w-full p-5 text-gray-400 bg-white border-2 border-gray-100 rounded-lg cursor-pointer peer-checked:text-gray-700 peer-checked:bg-gray-100 peer-checked:border-blue-500 hover:text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-300 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm uppercase tracking-widest transition ease-in-out duration-150">
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
                                        <input name="due_term" type="radio" id="payment_7days" value="7" class="hidden peer">
                                        <label for="payment_7days" class="text-center h-full flex flex-row gap-4 items-center justify-between w-full p-5 text-gray-400 bg-white border-2 border-gray-100 rounded-lg cursor-pointer peer-checked:text-gray-700 peer-checked:bg-gray-100 peer-checked:border-blue-500 hover:text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-300 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm uppercase tracking-widest transition ease-in-out duration-150">
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
                                        <input name="due_term" type="radio" id="payment_14days" value="14" class="hidden peer">
                                        <label for="payment_14days" class="text-center h-full flex flex-row gap-4 items-center justify-between w-full p-5 text-gray-400 bg-white border-2 border-gray-100 rounded-lg cursor-pointer peer-checked:text-gray-700 peer-checked:bg-gray-100 peer-checked:border-blue-500 hover:text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-300 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm uppercase tracking-widest transition ease-in-out duration-150">
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
                                        <input name="due_term" type="radio" id="payment_30days" value="30" class="hidden peer">
                                        <label for="payment_30days" class="text-center h-full flex flex-row gap-4 items-center justify-between w-full p-5 text-gray-400 bg-white border-2 border-gray-100 rounded-lg cursor-pointer peer-checked:text-gray-700 peer-checked:bg-gray-100 peer-checked:border-blue-500 hover:text-gray-700 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-blue-600 dark:hover:text-gray-50 dark:peer-checked:text-gray-50 dark:peer-checked:bg-gray-700">
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="issue-date-form inline-flex p-2 items-center text-teal-300 dark:text-teal-300 border border-transparent rounded-full font-semibold text-lg uppercase tracking-widest hover:text-teal-700 dark:hover:text-teal-300 focus:text-teal-700 dark:focus:text-teal-300 active:text-teal-900 dark:active:text-teal-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                                    DD/MM/RRRR
                                                </div>
                                                <div class="text-sm text-center mt-2">Data wystawienia</div>
                                            </div>
                                            <div class="w-auto flex flex-col items-center justify-center">
                                                <div class="inline-flex p-2 items-center font-semibold text-sm uppercase tracking-widest transition ease-in-out duration-150">
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
                                @error('due_term')
                                <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">
                                    {{ $message }}
                                </p>
                                @enderror
                                @error('due_date')
                                <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <hr class="border-t border-gray-200 dark:border-gray-700 border-2 my-12">

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
                                        <!--SPRZEDAJĄCY-->
                                        <x-container-gray>
                                            <!--NAZWA-->
                                            <x-text-cell>
                                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                    Nazwa sprzedającego
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                    <x-label-link-company href="{{route('setting')}}">
                                                        {{ $company->name }}
                                                    </x-label-link-company>
                                                </p>
                                                <input type="hidden" value="{{$company->id}}" name="company_id">
                                                <input type="hidden" value="{{$company->name}}" name="seller_name">
                                            </x-text-cell>
                                            <!--NAZWA-->

                                            <!--ADRES-->
                                            <x-text-cell>
                                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                    Adres sprzedającego
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                    {{ $company->adress }}
                                                </p>
                                                <input type="hidden" value="{{$company->adress}}" name="seller_adress">
                                            </x-text-cell>
                                            <!--ADRES-->

                                            <!--NIP-->
                                            <x-text-cell>
                                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                    NIP sprzedającego
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                    {{ $company->vat_number }}
                                                </p>
                                                <input type="hidden" value="{{$company->vat_number}}" name="seller_vat_number">
                                            </x-text-cell>
                                            <!--NIP-->

                                            <!--BANK-->
                                            <x-text-cell>
                                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                    Numer konta sprzedającego
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                    {{ $company->bank }}
                                                </p>
                                                <input type="hidden" value="{{$company->bank}}" name="bank">
                                            </x-text-cell>
                                            <!--BANK-->
                                        </x-container-gray>
                                        <!--SPRZEDAJĄCY-->
                                    </li>
                                    <li>
                                        @if(isset($create_client))
                                        <!--KUPUJĄCY-->
                                        <x-container-gray>
                                            <!--NAZWA-->
                                            <x-text-cell>
                                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                    Nazwa kupującego
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                    <x-label-link-company href="{{route('client.show', $create_client->id)}}">
                                                        {{ $create_client->name }}
                                                    </x-label-link-company>
                                                </p>
                                                <input value="{{ $create_client->name }}" name="buyer_name" type="hidden" />
                                                <input type="hidden" name="client_id" value="{{ $create_client->id }}">
                                            </x-text-cell>
                                            <!--NAZWA-->

                                            <!--ADRES-->
                                            <x-text-cell>
                                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                    Adres kupującego
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                    {{ $create_client->adress }}
                                                </p>
                                                <input value="{{ $create_client->buyer_adress }}" name="buyer_adress" type="hidden" />
                                            </x-text-cell>
                                            <!--ADRES-->

                                            <!--NIP-->
                                            <x-text-cell>
                                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                    NIP kupującego
                                                </p>
                                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                    {{ $create_client->vat_number }}
                                                </p>
                                                <input value="{{ $create_client->buyer_vat_number }}" name="buyer_vat_number" type="hidden" />
                                            </x-text-cell>
                                            <!--NIP-->
                                        </x-container-gray>
                                        <!--KUPUJĄCY-->
                                        @else
                                        <div class="relative flex flex-col gap-4 w-full h-full appearance-none rounded-lg  border-2 border-white dark:border-gray-700 p-4 outline-none  dark:text-gray-50">
                                            <div class="md:grid md:gap-4 py-4 ">
                                                <!-- Klient -->
                                                <div class="mb-6">
                                                    <label for="buyer_name"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                        Nazwa nabywcy
                                                    </label>
                                                    <input list="buyer_name_suggestions"
                                                        id="buyer_name"
                                                        name="buyer_name"
                                                        required
                                                        class="mt-1 block w-full p-2 border text-gray-700 bg-gray-100 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                    <datalist id="buyer_name_suggestions">
                                                        @foreach ($clients as $client)
                                                        <option value="{{ $client->name }}"
                                                            data-id="{{ $client->id }}"
                                                            data-name="{{ $client->name }}"
                                                            data-address="{{ $client->adress }}"
                                                            data-vat-number="{{ $client->vat_number }}">
                                                            {{ $client->vat_number }}
                                                        </option>
                                                        @endforeach
                                                    </datalist>
                                                    <input type="hidden"
                                                        id="client_id"
                                                        name="client_id"
                                                        value="">
                                                    @error('buyer_name')
                                                    <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                                    @enderror
                                                    @error('client_id')
                                                    <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <!-- Klient -->

                                                <!-- Adres -->
                                                <div class="mb-6">
                                                    <label for="buyer_adress"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                        Adres nabywcy
                                                    </label>
                                                    <input type="text"
                                                        id="buyer_address"
                                                        name="buyer_adress"
                                                        required
                                                        class="mt-1 block w-full p-2 border text-gray-700 bg-gray-100 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                    @error('buyer_adress')
                                                    <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <!-- Adres -->

                                                <!-- NIP -->
                                                <div class="mb-6">
                                                    <label for="buyer_vat_number"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                        NIP nabywcy
                                                    </label>
                                                    <div class="flex justify-end space-x-4">
                                                        <input type="text"
                                                            id="buyer_vat_number"
                                                            name="buyer_vat_number"
                                                            required
                                                            class="mt-1 block w-full p-2 border text-gray-700 bg-gray-100 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                                                        @error('buyer_vat_number')
                                                        <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- NIP -->

                                                <!--pobierz dane-->
                                                <div class="flex items-center justify-center">
                                                    <button id="fetch_vat_data" type="button"
                                                        class="mx-auto whitespace-nowrap inline-flex items-center px-4 py-2 bg-indigo-300 dark:bg-indigo-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-300 focus:bg-indigo-700 dark:focus:bg-indigo-300 active:bg-indigo-900 dark:active:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150">
                                                        Pobierz dane podatnika VAT
                                                    </button>
                                                </div>
                                                <div id="info" class="text-sm text-center text-gray-700 dark:text-gray-500 mt-2">Po uzupełnieniu numeru NIP naciśnij przycisk, działa TYLKO dla podatników VAT</div>
                                                <a id="kas" href="https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat" class="flex items-center justify-center text-center text-blue-300 dark:text-blue-400 hover:underline text-xs mt-1">Źródło: https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat</a>
                                                <a id="gus" href="https://api.stat.gov.pl/Home/RegonApi" class="flex items-center justify-center hidden text-center text-blue-300 dark:text-blue-400 hover:underline text-xs mt-1">Źródło: https://api.stat.gov.pl/Home/RegonApi</a>
                                                <!--pobierz dane-->
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                </ul>
                            </div>


                            <!--Menadżer i osoba zamawiająca-->
                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                <li>
                                    <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Menadżer projektu</h3>
                                </li>
                                <li>
                                    <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Osoba zamawiająca</h3>
                                </li>
                            </ul>
                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                <li>
                                    <x-container-gray>
                                        <!--Imię i nazwisko-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                Imię i nazwisko
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                {{$user->name}}
                                            </p>
                                            <input value="{{$user->name}}" name="project_manager" type="hidden" />
                                        </x-text-cell>
                                        <!--Imię i nazwisko-->

                                        <!--Adres email-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                Adres email
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                {{$user->email}}
                                            </p>
                                            <input value="{{$user->email}}" name="project_manager_email" type="hidden" />
                                        </x-text-cell>
                                        <!--Adres email-->
                                    </x-container-gray>
                                </li>
                                <li>
                                    <div class="relative flex flex-col gap-4 w-full h-full appearance-none rounded-lg  border-2 border-white dark:border-gray-700 p-4 outline-none  dark:text-gray-50">
                                        <div class="md:grid md:gap-4 py-4 ">
                                            <!-- Imię i nazwisko -->
                                            <div class="mb-6">
                                                <label for="order_person_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię i nazwisko</label>
                                                <input type="text" id="order_person_name" value="" name="order_person_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                @error('order_person_name')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- Imię i nazwisko -->

                                            <!-- Email -->
                                            <div class="mb-6">
                                                <label for="order_person_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adres email</label>
                                                <input type="text" id="order_person_email" value="" name="order_person_email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                @error('order_person_email')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- Email -->
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!--Menadżer i osoba zamawiająca-->

                            <!--Projekt-->
                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                <li>
                                    <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Projekt
                                    </h3>
                                </li>
                            </ul>
                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                <li>
                                    <x-container-gray>
                                        <!--NAZWA-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                Nazwa
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                <x-label-link-project href="{{route('project.show', $project->id)}}">
                                                    {{ $project->name }}
                                                </x-label-link-project>
                                                <input type="hidden" name="project_id" value="{{ $project->id }}" />
                                            </p>
                                        </x-text-cell>
                                        <!--NAZWA-->

                                        <!--Domena-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                Domena
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                {{ $project->production_domain }}
                                            </p>
                                        </x-text-cell>
                                        <!--Domena-->

                                        <!--Technologia-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                Technologia
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                {{ $project->technology }}
                                            </p>
                                        </x-text-cell>
                                        <!--Technologia-->
                                    </x-container-gray>
                                </li>
                                <li>
                                    <div class="relative flex flex-col gap-4 w-full h-full appearance-none rounded-lg  border-2 border-white dark:border-gray-700 p-4 outline-none  dark:text-gray-50">
                                        <div class="md:grid md:gap-4 py-4 ">
                                            <!-- Zakres prac -->
                                            <div class="mb-6">
                                                <label for="project_scope" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                    Zakres prac
                                                </label>
                                                <select id="project_scope" name="project_scope" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                                    <option value="Aktualizacja treści">Aktualizacja treści</option>
                                                    <option value="Konfiguracja projektu">Konfiguracja projektu</option>
                                                    <option value="Tworzenie projektu">Tworzenie projektu</option>
                                                </select>
                                                @error('project_scope')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- Zakres prac -->
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!--Projekt-->

                            <!-- Pozycje na ofercie -->
                            <div class="mb-6 relative">
                                <h3 class="my-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Pozycje na ofercie
                                </h3>

                                <!-- KONTERNER DLA POZYCJI i PODSUMOWANIA -->
                                <div id="offer-items" class="mt-6">
                                    <!-- KONTERNER DLA POZYCJI -->
                                    <div class="offer-item grid grid-cols-1 md:grid-cols-12 gap-4 mb-4">
                                        <div class="col-span-11 h-full w-full grid grid-cols-1 lg:grid-cols-10 gap-4 mb-4 justify-center items-end text-center">
                                            <!-- Nazwa produktu/usługi -->
                                            <div class="flex flex-col col-span-2">
                                                <label for="item_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa produktu/usługi</label>
                                                <input list="name_item_suggestions" type="text" name="items[0][name]" id="item_name" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                                <datalist id="name_item_suggestions">
                                                </datalist>
                                            </div>

                                            <!-- Ilość -->
                                            <div class="flex flex-col relative">
                                                <label for="item_quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ilość</label>
                                                <div class="flex items-center justify-between">
                                                    <button type="button" class="w-min min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 dark:bg-gray-600 text-center rounded-l-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" id="increase_quantity">+</button>
                                                    <input value="1" type="number" step="1" name="items[0][quantity]" id="item_quantity" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 text-center dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                                    <button type="button" class="w-min min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100dark:bg-gray-600 text-center rounded-r-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" id="decrease_quantity">-</button>
                                                </div>
                                            </div>

                                            <!-- Jednostka miary -->
                                            <div class="flex flex-col">
                                                <label for="item_unit" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jednostka miary</label>
                                                <select name="items[0][unit]" id="item_unit" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                                    <option value="szt">szt</option>
                                                    <option value="kg">kg</option>
                                                    <option value="m">m</option>
                                                    <option value="l">l</option>
                                                    <option value="godz">godz</option>
                                                </select>
                                            </div>

                                            <!-- Cena netto -->
                                            <div class="flex flex-col">
                                                <label for="item_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cena netto</label>
                                                <input type="number" step="0.01" name="items[0][price]" id="item_price" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="discount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rabat (%)</label>
                                                <input type="number" value="0" step="0.01" min="0" max="100" name="items[0][discount]" id="discount" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="item_price_after_discount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cena netto po rabacie</label>
                                                <input type="number" value="" step="0.01" name="items[0][price_after_discount]" id="item_price_after_discount" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                            </div>
                                            <!-- Stawka VAT -->
                                            <div class="flex flex-col">
                                                <label for="item_vat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stawka VAT (%)</label>
                                                <select name="items[0][vat]" id="item_vat" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                                    <option value="23">23%</option>
                                                    <option value="8">8%</option>
                                                    <option value="5">5%</option>
                                                    <option value="0">0%</option>
                                                </select>
                                            </div>

                                            <!-- Kwota netto -->
                                            <div class="flex flex-col">
                                                <label for="item_netto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota netto</label>
                                                <input type="number" step="0.01" value="0" name="items[0][netto]" id="item_netto" class="min-h-[44px] mt-1 block w-full p-2 bg-white dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:bg-gray-800 border border-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:border-gray-600 dark:text-gray-100" required readonly>
                                            </div>

                                            <!-- Kwota brutto -->
                                            <div class="flex flex-col">
                                                <label for="item_brutto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota brutto</label>
                                                <input type="number" step="0.01" value="0" name="items[0][brutto]" id="item_brutto" class="min-h-[44px] mt-1 block w-full p-2 bg-white dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:bg-gray-800 border border-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:border-gray-600 dark:text-gray-100" required readonly>
                                            </div>
                                        </div>

                                        <!-- Przycisk Usuń -->
                                        <div class="flex flex-col h-full w-full justify-end items-end col-span-1">
                                            <button type="button" id="remove_item" class="min-h-[44px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- KONTERNER DLA POZYCJI -->

                                    <!-- KONTERNER DLA POZYCJI -->
                                    <div id="add-items">

                                    </div>
                                    <!-- KONTERNER DLA POZYCJI -->

                                    <!-- PODSUMOWANIE -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="md:col-span-1">
                                            <div class="">
                                                <button type="button" id="add-item" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-plus mr-2"></i>Dodaj pozycję
                                                </button>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1">
                                            <x-invoice-summary />
                                        </div>
                                    </div>
                                    <!-- PODSUMOWANIE -->
                                    @error('items')
                                    <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- KONTERNER DLA POZYCJI i PODSUMOWANIA -->
                            </div>
                            <!-- Pozycje na ofercie -->

                            <!-- Uwagi -->
                            <div class="mb-6">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full p-2 border border-gray-100 bg-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"></textarea>
                                @error('notes')
                                <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Uwagi -->

                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                            <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-col md:flex-row gap-4 items-center justify-center">
                                <button type="submit"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Przygotuj ofertę
                                </button>
                                <a href="{{ route('offer') }}"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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
    <input type="hidden" id="form" value="podstawowy">
    <input type="hidden" id="searchclient" value="{{$set_client}}">
    <input type="hidden" id="api-link" value="{{route('api.offer.value',['',''])}}">
    <input type="hidden" id="api-link-gus" value="{{route('api.search.gus',[''])}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showSimple() {
            $('.setting-del').addClass('hidden');
            $('.setting-del-custom').removeClass('hidden');
            $('.setting-show-custom').addClass('hidden');
        }

        function showCustom() {
            $('.setting-del').addClass('hidden');
            $('.setting-del-custom').addClass('hidden');
            $('.setting-show-custom').removeClass('hidden');
        }

        function showPrimary() {
            $('.setting-del').removeClass('hidden');
            $('.setting-del-custom').removeClass('hidden');
            $('.setting-show-custom').addClass('hidden');
        }

        function showData() {
            $('.setting-del').removeClass('hidden');
            $('.setting-del-custom').removeClass('hidden');
            $('.setting-show-custom').addClass('hidden');
        }

        function stringDateRefillZero(dateString) {
            // Rozdzielamy datę na dzień, miesiąc i rok
            const parts = dateString.split('/');
            let day = parts[0];
            let month = parts[1];
            const year = parts[2];

            // Dodajemy zero, jeśli dzień lub miesiąc mają tylko jedną cyfrę
            day = day.padStart(2, '0');
            month = month.padStart(2, '0');

            // Łączymy z powrotem w poprawnym formacie
            return `${day}/${month}/${year}`;
        }

        $(document).ready(function() {
            var currentDateconf = new Date();
            let type = 'faktura sprzedażowa';
            let monthapi = currentDateconf.getMonth() + 1;;
            let yearapi = currentDateconf.getFullYear();;
            let value = null;
            let formdate = null;
            let formprimary = null;
            let formsimple = null;
            let apiLink = $('#api-link');
            let apiLinkGus = $('#api-link-gus');
            let issueDateFIRST = $('#issue');
            let settingsSave = $('#setting-save');
            let form = $('#form').val();
            let searchclient = $('#searchclient').val();
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
                if (form == 'data') {
                    showData();
                    issueDateFIRST.html(formatDate2(currentDate));
                } else if (form == 'podstawowy') {
                    showPrimary();
                    issueDateFIRST.html(formatDate3(currentDate));
                } else if (form == 'prosty') {
                    showSimple();
                } else if (form == 'wlasny') {
                    showCustom();
                }
                $.ajax({
                    url: apiLink.val() + '/' + yearapi, // Endpoint Laravel
                    type: 'GET', // Typ żądania,
                    dataType: 'json', // Oczekiwany format odpowiedzi
                    success: function(response) {
                        value = response
                        $('#value-number').html(value)
                        console.log(apiLink.val() + '/' + yearapi)
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

                    for (let i = 0; i < firstDayOfMonth - 1; i++) {
                        daysContainer.append('<div></div>');
                    }

                    for (let i = 1; i <= daysInMonth; i++) {
                        const day = $(`<div class="flex h-[38px] w-[38px] items-center justify-center rounded-lg text-dark hover:cursor-pointer hover:bg-teal-300 hover:text-white sm:h-[46px] sm:w-[47px] dark:text-gray-50 dark:hover:bg-teal-300 dark:hover:text-gray-900 mb-2">${i}</div>`);

                        day.on('click', function() {
                            selectedDate = `${$(this).text()}/${month + 1}/${year}`;
                            formdate = `${month + 1}/${year}`;
                            formprimary = `${year}`;
                            monthapi = `${month + 1}`;
                            yearapi = `${year}`;
                            daysContainer.find('div').removeClass('dark:bg-teal-300 bg-teal-300 text-white dark:text-gray-900');
                            $(this).addClass('dark:bg-teal-300 bg-teal-300 text-white dark:text-gray-900');
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
                $('input[name="due_term"]').on('change', function() {
                    var term = $('input[name="due_term"]:checked').val();
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
                $('input[name="setting_format"]').on('change', function() {
                    form = $('input[name="setting_format"]:checked').val();
                    if (form == 'data') {
                        showData();
                        let dateString = datepickerFIRST.val();
                        let [day, month, year] = dateString.split("/").map(Number);
                        let dateObject = new Date(year, month - 1, day);
                        try {
                            issueDateFIRST.html(formatDate2(dateObject));
                        } catch (error) {
                            issueDateFIRST.html(formatDate3(currentDate));
                        }
                    } else if (form == 'podstawowy') {
                        showPrimary();
                        let dateString = datepickerFIRST.val();
                        let [day, month, year] = dateString.split("/").map(Number);
                        let dateObject = new Date(year, month - 1, day);
                        try {
                            issueDateFIRST.html(formatDate3(dateObject));
                        } catch (error) {
                            issueDateFIRST.html(formatDate3(currentDate));
                        }
                    } else if (form == 'prosty') {
                        showSimple();
                    } else if (form == 'wlasny') {
                        showCustom();
                    }
                });
                var fd = 'hidden';
                settingsSave.on('click', function() {
                    if (fd === 'hidden') {
                        $('#set-radios').removeClass('hidden');
                        fd = 'visible';
                    } else {
                        $('#set-radios').addClass('hidden');
                        fd = 'hidden';
                    }
                });
                $('#set-btn').on('click', function() {
                    if (fd === 'hidden') {
                        $('#set-radios').removeClass('hidden');
                        fd = 'visible';
                    } else {
                        $('#set-radios').addClass('hidden');
                        fd = 'hidden';
                    }
                });
                applyButton.on('click', function() {
                    if (selectedDate) {
                        selectedDate = stringDateRefillZero(selectedDate);
                        datepicker.val(selectedDate);
                    }
                    datepickerContainer.addClass('hidden');
                });
                applyButtonSECOND.on('click', function() {
                    $('input[name="due_term"][value="1"]').prop('checked', false);
                    $('input[name="due_term"][value="2"]').prop('checked', false);
                    $('input[name="due_term"][value="3"]').prop('checked', false);
                    $('input[name="due_term"][value="7"]').prop('checked', false);
                    $('input[name="due_term"][value="14"]').prop('checked', false);
                    $('input[name="due_term"][value="30"]').prop('checked', false);

                    var term = $('input[name="due_term"]:checked').val();
                    let dateString = datepickerFIRST.val();
                    let [day, month, year] = dateString.split("/").map(Number);
                    dateObject = new Date(year, month - 1, day + 1);
                    var formatteddate = formatDate(dateObject);
                    selectedDate = stringDateRefillZero(selectedDate);
                    if (selectedDate === formatteddate) {
                        $('input[name="due_term"][value="1"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 2);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="due_term"][value="2"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 3);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="due_term"][value="3"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 7);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="due_term"][value="7"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 14);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="due_term"][value="14"]').prop('checked', true);
                    }
                    dateObject = new Date(year, month - 1, day + 30);
                    formatteddate = formatDate(dateObject);
                    if (selectedDate === formatteddate) {
                        $('input[name="due_term"][value="30"]').prop('checked', true);
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
                        var term = $('input[name="due_term"]:checked').val();
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
            $('#offer').on('click', function() {
                type = 'faktura sprzedażowa'
                $('#type').html(
                    `
                <div class="inline-flex p-2 items-center bg-green-300 dark:bg-green-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
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
                <div class="inline-flex p-2 items-center bg-violet-500 dark:bg-violet-300 border border-transparent rounded-full font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">
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
            switch (searchclient) {
                case 'domyslna':
                    $('#fetch_vat_data').addClass('hidden');
                    $('#info').addClass('hidden');
                    $('#gus').addClass('hidden');
                    $('#kas').addClass('hidden');
                    break;
                case 'gus':
                    $('#fetch_vat_data').html('Pobierz dane z GUS');
                    $('#fetch_vat_data').removeClass('hidden');
                    $('#info').removeClass('hidden');
                    $('#gus').removeClass('hidden');
                    $('#kas').addClass('hidden');
                    $('#info').html('Po uzupełnieniu numeru NIP naciśnij przycisk aby wyszukać w bazie danych GUS');
                    break;
                case 'kas':
                    $('#fetch_vat_data').html('Pobierz dane z KAS');
                    $('#fetch_vat_data').removeClass('hidden');
                    $('#info').removeClass('hidden');
                    $('#gus').addClass('hidden');
                    $('#kas').removeClass('hidden');
                    $('#info').html('Po uzupełnieniu numeru NIP naciśnij przycisk, działa TYLKO dla podatników VAT');
                    break;
                default:
                    break;
            }
            $('#default').on('click', function() {
                searchclient = 'domyslna';
                $('#fetch_vat_data').addClass('hidden');
                $('#info').addClass('hidden');
                $('#gus').addClass('hidden');
                $('#kas').addClass('hidden');
            });
            $('#gus1').on('click', function() {
                searchclient = 'gus';
                $('#fetch_vat_data').html('Pobierz dane z GUS');
                $('#fetch_vat_data').removeClass('hidden');
                $('#info').removeClass('hidden');
                $('#gus').removeClass('hidden');
                $('#kas').addClass('hidden');
                $('#info').html('Po uzupełnieniu numeru NIP naciśnij przycisk aby wyszukać w bazie danych GUS');
            });
            $('#kas1').on('click', function() {
                searchclient = 'kas';
                $('#fetch_vat_data').html('Pobierz dane z KAS');
                $('#fetch_vat_data').removeClass('hidden');
                $('#info').removeClass('hidden');
                $('#gus').addClass('hidden');
                $('#kas').removeClass('hidden');
                $('#info').html('Po uzupełnieniu numeru NIP naciśnij przycisk, działa TYLKO dla podatników VAT');
            });
            var cd = 'hidden';
            $('#client_data_done').on('click', function() {
                if (cd === 'hidden') {
                    $('#client_data').removeClass('hidden');
                    cd = 'visible';
                } else {
                    $('#client_data').addClass('hidden');
                    cd = 'hidden';
                }
            });
            $('#client_data_set').on('click', function() {
                if (cd === 'hidden') {
                    $('#client_data').removeClass('hidden');
                    cd = 'visible';
                } else {
                    $('#client_data').addClass('hidden');
                    cd = 'hidden';
                }
            });
            //POBIERANIE PŁATNIKA VAT
            $('#fetch_vat_data').click(function() {
                var taxId = $('#buyer_vat_number').val();
                var today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

                if (taxId) {
                    switch (searchclient) {
                        case 'domyslna':

                            break;
                        case 'gus':
                            $.ajax({
                                url: apiLinkGus.val() + '/' + taxId,
                                method: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    console.log('Dane podatnika VAT:', data['response']);
                                    $('#buyer_name').val(data['response']['name'] || '');
                                    $('#buyer_address').val(data['response']['adres'] || '');
                                    toastr.success('Operacja zakończona powodzeniem!');
                                },
                                error: function(xhr, status, error) {
                                    console.error('Błąd:', error);
                                    // Możesz tutaj dodać kod do obsługi błędów
                                    toastr.error('Operacja zakończona niepowodzeniem!');
                                }
                            });
                            break;
                        case 'kas':
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
                            break;

                        default:
                            break;
                    }
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
                        return false;
                    }
                });
            });

            // Funkcja aktualizująca podsumowanie
            function updateSummary() {
                var totalNetto = 0;
                var totalBrutto = 0;
                var totalVAT = 0;

                // Iterujemy przez wszystkie pozycje faktury
                $('.offer-item').each(function() {
                    var netto = parseFloat($(this).find('#item_netto').val()) || 0;
                    var brutto = parseFloat($(this).find('#item_brutto').val()) || 0;
                    var vat = brutto - netto;

                    totalNetto += netto;
                    totalBrutto += brutto;
                    totalVAT += vat;
                });

                // Aktualizacja wartości w podsumowaniu
                $('#total_netto').text(totalNetto.toFixed(2));
                $('#total_vat').text(totalVAT.toFixed(2));
                $('#total_brutto').text(totalBrutto.toFixed(2));
                var val = parseInt($('#slider-value').text()) * 0.01 * totalBrutto.toFixed(2);
                $('#slider-value-text').val(val.toFixed(2));
            }

            // Aktualizacja podsumowania przy zmianie wartości w pozycjach
            $(document).on('input', '#item_quantity, #item_vat', function() {
                var item = $(this).closest('.offer-item');
                updateTotals(item); // Aktualizuje wartości dla danej pozycji
                updateSummary(); // Aktualizuje podsumowanie
            });
            // Aktualizacja podsumowania przy zmianie wartości w pozycjach
            $(document).on('input', '#item_price, #discount', function() {
                var item = $(this).closest('.offer-item');

                var price = parseFloat(item.find('#item_price').val()) || 0;
                var discount = parseFloat(item.find('#discount').val()) || 0;
                var priceAfterDiscount = price - (price * (discount / 100));
                item.find('#item_price_after_discount').val(priceAfterDiscount.toFixed(2));

                updateTotals(item); // Aktualizuje wartości dla danej pozycji
                updateSummary(); // Aktualizuje podsumowanie
            });
            // Aktualizacja podsumowania przy zmianie wartości w pozycjach
            $(document).on('input', '#item_price_after_discount', function() {
                var item = $(this).closest('.offer-item');

                var price = parseFloat(item.find('#item_price').val()) || 0;
                var priceAfterDiscount = parseFloat(item.find('#item_price_after_discount').val()) || 0;
                var discount = ((price - priceAfterDiscount) / price) * 100;
                item.find('#discount').val(discount.toFixed(2));

                updateTotals(item); // Aktualizuje wartości dla danej pozycji
                updateSummary(); // Aktualizuje podsumowanie
            });

            // Obsługa przycisku dodania pozycji
            $('#add-item').click(function() {
                var newItem = $('#offer-items .offer-item:first').clone(); // Klonujemy pierwszą pozycję
                newItem.find('input').val(''); // Resetujemy wartości pól
                newItem.find('#item_quantity').val(1); // Ustawiamy domyślną ilość na 1
                newItem.find('#item_netto').val(0); // Resetujemy kwoty netto i brutto
                newItem.find('#item_brutto').val(0);
                newItem.find('#remove_item').removeClass('hidden');
                // Zaktualizuj indeksy
                let itemCount = $('.offer-item').length;

                var newInput = newItem.find('#item_name');
                newInput.attr('name', `items[${itemCount}][name]`);

                newInput = newItem.find('#item_quantity');
                newInput.attr('name', `items[${itemCount}][quantity]`);

                newInput = newItem.find('#item_unit');
                newInput.attr('name', `items[${itemCount}][unit]`);

                newInput = newItem.find('#item_price');
                newInput.attr('name', `items[${itemCount}][price]`);

                newInput = newItem.find('#item_vat');
                newInput.attr('name', `items[${itemCount}][vat]`);

                newInput = newItem.find('#item_netto');
                newInput.attr('name', `items[${itemCount}][netto]`);

                newInput = newItem.find('#item_brutto');
                newInput.attr('name', `items[${itemCount}][brutto]`);

                newInput.val(0); // Zresetuj wartość na 0

                $('#add-items').append(newItem); // Dodajemy nową pozycję
                updateSummary(); // Aktualizujemy podsumowanie
            });

            // Obsługa usuwania pozycji
            $(document).on('click', '#remove_item', function() {
                $(this).closest('.offer-item').remove(); // Usuwamy pozycję
                updateSummary(); // Aktualizujemy podsumowanie
            });

            // Funkcja aktualizująca wartości w pozycji (z poprzedniego kodu)
            function updateTotals(item) {
                var quantity = parseInt(item.find('#item_quantity').val()) || 0;
                var price = parseFloat(item.find('#item_price').val()) || 0;
                var price_after_discount = parseFloat(item.find('#item_price_after_discount').val()) || 0;
                var vatRate = parseFloat(item.find('#item_vat').val()) / 100 || 0;

                var netto = quantity * price_after_discount;
                var brutto = netto * (1 + vatRate);

                item.find('#item_netto').val(netto.toFixed(2));
                item.find('#item_brutto').val(brutto.toFixed(2));
            }
            // Funkcja dla przycisku + (dodaj)
            $(document).on('click', '#increase_quantity', function() {
                var quantityInput = $(this).closest('.offer-item').find('#item_quantity');
                var currentQuantity = parseInt(quantityInput.val());
                quantityInput.val(currentQuantity + 1);
                updateTotals($(this).closest('.offer-item'));
                updateSummary();
            });

            // Funkcja dla przycisku - (odejmij)
            $(document).on('click', '#decrease_quantity', function() {
                var quantityInput = $(this).closest('.offer-item').find('#item_quantity');
                var currentQuantity = parseInt(quantityInput.val());
                if (currentQuantity > 1) { // Zapobiega ustawianiu wartości poniżej 1
                    quantityInput.val(currentQuantity - 1);
                }
                updateTotals($(this).closest('.offer-item'));
                updateSummary();
            });
            $('#offer-items .offer-item:first #remove_item').addClass('hidden');
            $('#basic-range-slider-usage').on('input', function() {
                $('#slider-value').text($(this).val());
                updateSummary()
            });
            // Zwiększanie wartości
            $('#increase_quantity2').click(function() {
                let input = $('#slider-value-text');
                let currentValue = parseInt(input.val()) || 0;
                var totalNetto = 0;
                var totalBrutto = 0;
                var totalVAT = 0;

                // Iterujemy przez wszystkie pozycje faktury
                $('.offer-item').each(function() {
                    var netto = parseFloat($(this).find('#item_netto').val()) || 0;
                    var brutto = parseFloat($(this).find('#item_brutto').val()) || 0;
                    var vat = brutto - netto;

                    totalNetto += netto;
                    totalBrutto += brutto;
                    totalVAT += vat;
                });
                if (currentValue < parseInt(totalBrutto)) {
                    input.val(currentValue + 1);
                }
            });

            // Zmniejszanie wartości
            $('#decrease_quantity2').click(function() {
                let input = $('#slider-value-text');
                let currentValue = parseInt(input.val()) || 0;
                if (currentValue > 0) { // Zapobiega zejściu poniżej 0
                    input.val(currentValue - 1);
                }
            });

            // Zapobiega wprowadzeniu wartości ujemnych ręcznie
            $('#slider-value-text').on('input', function() {
                let input = $(this);
                let value = parseInt(input.val());
                if (isNaN(value) || value < 0) {
                    input.val(0);
                }
                var totalNetto = 0;
                var totalBrutto = 0;
                var totalVAT = 0;

                // Iterujemy przez wszystkie pozycje faktury
                $('.offer-item').each(function() {
                    var netto = parseFloat($(this).find('#item_netto').val()) || 0;
                    var brutto = parseFloat($(this).find('#item_brutto').val()) || 0;
                    var vat = brutto - netto;

                    totalNetto += netto;
                    totalBrutto += brutto;
                    totalVAT += vat;
                });
                if (value > totalBrutto) {
                    input.val(totalBrutto.toFixed(2));
                }
            });
            $('#paid_part_input').addClass('hidden');
            $('#paid_part').on('input', function() {
                $('#paid_part_input').removeClass('hidden');
            });
            $('#paid').on('input', function() {
                $('#paid_part_input').addClass('hidden');
            });
            var id = 'hidden';
            $('#items-set').addClass('hidden');
            $('#items_data_set').on('click', function() {
                if (id === 'hidden') {
                    $('#items-set').removeClass('hidden');
                    id = 'visible';
                } else {
                    $('#items-set').addClass('hidden');
                    id = 'hidden';
                }
            });
            $('#items_done').on('click', function() {
                if (id === 'hidden') {
                    $('#items-set').removeClass('hidden');
                    id = 'visible';
                } else {
                    $('#items-set').addClass('hidden');
                    id = 'hidden';
                }
            });
            const today1 = new Date(); // Tworzymy obiekt Date
            const day2 = String(today1.getDate()).padStart(2, '0'); // Pobieramy dzień
            const month2 = String(today1.getMonth() + 1).padStart(2, '0'); // Pobieramy miesiąc (dodajemy 1, bo getMonth() zaczyna od 0)
            const year2 = today1.getFullYear(); // Pobieramy rok
            $('#datepickerTHIRD').val(`${day2}/${month2}/${year2}`);
        });
    </script>

</x-app-layout>