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
                    <a href="{{ route('invoice') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Faktur
                    </a>

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100">Nowa Faktura</h1>

                        <form id="my-form" method="POST" action="{{ route('invoice.store') }}" class="mt-6">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="value" value="{{$value}}">
    <input type="hidden" id="format" value="{value}/{month}/{year}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        class View {
            constructor() {}
            getNumber(number = new Number()) {
                return `
                <!-- Numer faktury -->
                <div class="mb-6">
                    <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Numer ${number.getTitle()}
                    </label>
                    <input type="text" id="number" name="number" value="${number.getValueFormatted()}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>
                `;
            }
            getNumberModal(number = new Number()) {
                return `
                <!-- Numer ${number.getTitle()} -->
                <div class="mb-6">
                    <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Numer ${number.getTitle()}
                    </label>
                    <div class="flex flex-row gap-4">
                        <div class="w-full">
                            <input type="text" id="number" name="number" value="${number.getValueFormatted()}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                        </div>
                        <div class="w-fit flex flex-col justify-end">
                            <button type="button" id="number-setting" class="mt-1 h-full inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-gear"></i>
                            </button>
                        </div>
                    </div>
                </div>
                `;
            }
            getModal(modal = new Modal()) {
                return `
                <div id="modalOverlay" class="absolute inset-0 bg-black opacity-50 hidden"></div>
                <div id="drawer" class="absolute bottom-0 left-0 z-50 w-full h-fit sm:h-full hidden">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-fit sm:h-full pt-[187px]">
                        <div class="grid grid-cols-1 mx-auto py-3 w-full px-4 sm:px-4 sm:px-8 sm:pt-5 h-full bg-gray-800 border-t border-gray-700 rounded-t-lg">
                            <div class="flex flex-col gap-4  w-full">
                                <div class="flex flex-row justify-start lg:pt-2.5">
                                    <button type="button" class="close inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do tworzenia faktury
                                    </button>
                                </div>
                                <div class="flex flex-row justify-between gap-4 w-full mt-4">
                                    <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100">
                                        ${modal.getTitle()}
                                    </h1>
                                </div>
                                <ul class="grid w-full gap-6 md:grid-cols-3">
                                    <li>
                                        <input name="format" type="radio" id="basic" value="{value}" class="hidden peer">
                                        <label for="basic" class="h-full flex flex-col gap-4 text-center items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600 dark:hover:text-gray-100">
                                            <span class="w-full text-sm md:text-xl font-semibold">Prosty</span>
                                            <p>Numerowanie faktur w prostym, sekwencyjnym układzie, np. 1, 2, 3</p>
                                            <span class="w-full text-sm md:text-xl font-semibold">Faktura NR</span>
                                            <p class="text-green-500"> </p>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="format" type="radio" id="withyear" value="{value}/{year}" class="hidden peer">
                                        <label for="withyear" class="h-full flex flex-col gap-4 text-center items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600 dark:hover:text-gray-100">
                                            <span class="w-full text-sm md:text-xl font-semibold">Podstawowy</span>
                                            <p>Numeracja zawierająca rok aktualnej daty, np. 1/2024, 2/2024, 3/2024 dla łatwego odniesienia do roku.</p>
                                            <span class="w-full text-sm md:text-xl font-semibold">Faktura NR/RRRR</span>
                                            <p class="text-green-500"> </p>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="format" type="radio" id="withdate" value="{value}/{month}/{year}" class="hidden peer" checked>
                                        <label for="withdate" class="h-full flex flex-col gap-4 text-center items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600 dark:hover:text-gray-100">
                                            <span class="w-full text-sm md:text-xl font-semibold">Format z datą</span>
                                            <p>Numeracja zawierająca datę, np. 1/09/2024, 2/09/2024, 3/09/2024 dla łatwego odniesienia do roku lub miesiąca.</p>
                                            <span class="w-full text-sm md:text-xl font-semibold">Faktura NR/MM/RRRR</span>
                                            <p class="text-green-500">Rekomendowane</p>
                                        </label>
                                    </li>
                                </ul>
                                <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-row gap-4 items-center justify-center">
                                    <button type="button" id="modal-save"
                                        class=" inline-flex items-center px-4 py-2 bg-green-800 dark:bg-green-200 border border-transparent rounded-md font-semibold text-lg text-white dark:text-green-800 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-check mr-2"></i>Zapisz zmiany
                                    </button>
                                    <button type="button"
                                        class="close inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-lg text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }
            getInvoiceType() {
                return `
                    <!-- Typ Faktury -->
                    <div class="mb-6">
                        <h3 class="mb-5 block text-sm font-medium text-gray-700 dark:text-gray-300">Typ</h3>
                        <ul class="grid w-full gap-6 md:grid-cols-2">
                            <li>
                                <input name="invoice_type" type="radio" id="invoice" value="faktura" class="hidden peer" checked>
                                <label for="invoice" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600 dark:hover:text-gray-100">
                                    <span class="w-full text-sm md:text-xl font-semibold">Faktura</span>
                                    <p class="text-green-500">Dokument księgowy</p>
                                </label>
                            </li>
                            <li>
                                <input name="invoice_type" type="radio" id="proform" value="faktura proforma" class="hidden peer">
                                <label for="proform" class="text-center h-full flex flex-col gap-4 items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600 dark:hover:text-gray-100">
                                    <span class="w-full text-sm md:text-xl font-semibold">Faktura proforma</span>
                                    <p class="text-green-500"> </p>
                                </label>
                            </li>
                        </ul>
                    </div>
                `;
            }
            getDate(date) {
                const today = new Date().toISOString().split('T')[0]; // Uzyskaj datę w formacie 'YYYY-MM-DD'

                return `
                <!-- Data ${date.getTitle()}-->
                <div class="mb-6">
                    <label for="${date.getValue()}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data ${date.getTitle()}</label>
                    <input type="date" id="${date.getValue()}" name="${date.getValue()}" value="${today}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>
            `;
            }
        }
        class Modal {
            constructor(title = 'Zmień format numerowania') {
                const self = this;
                self.title = title;
            }
            getTitle() {
                const self = this;
                return self.title;
            }
        }
        class InvoiceType {
            constructor(type = 'invoiceType') {
                const self = this;
                self.type = type;
                self.view = new View();
            }
            getView() {
                const self = this;
                return self.view.getInvoiceType();
            }
        }
        class IssueDate {
            constructor(type = 'issueDate') {
                const self = this;
                self.type = type;
                self.title = 'wystawienia';
                self.value = 'issue_date';
                self.view = new View();
            }
            getView() {
                const self = this;
                return self.view.getDate(self);
            }
            getTitle() {
                const self = this;
                return self.title;
            }
            getValue() {
                const self = this;
                return self.title;
            }
        }
        class SaleDate {
            constructor(type = 'issueDate') {
                const self = this;
                self.type = type;
                self.title = 'sprzedaży';
                self.value = 'issue_date';
                self.view = new View();
            }
            getView() {
                const self = this;
                return self.view.getDate(self);
            }
            getTitle() {
                const self = this;
                return self.title;
            }
            getValue() {
                const self = this;
                return self.title;
            }
        }
        class Number {
            constructor(type = 'normal', title = 'faktury', value = $('#value').val(), format = $('#format').val()) {
                const self = this;
                self.type = type;
                self.title = title;
                self.view = new View();
                self.value = value;
                self.format = format;
                self.year = new Date().getFullYear();
                self.month = new Date().getMonth() + 1;
            }
            updateFormat() {
                const self = this;
                self.format = $('input[name="format"]:checked').val();
                $('#number').val(self.getValueFormatted());
            }
            setMonth(month) {
                const self = this;
                self.month = month;
            }
            setYear(year) {
                const self = this;
                self.year = year;
            }
            getMonth() {
                const self = this;
                return self.month;
            }
            getYear() {
                const self = this;
                return self.year;
            }
            getTitle() {
                const self = this;
                return self.title;
            }
            getType() {
                const self = this;
                return self.type;
            }
            getValue() {
                const self = this;
                return self.value;
            }
            getValueFormatted() {
                const self = this;
                switch (self.format) {
                    case '{value}':
                        return self.value;
                        break;

                    case '{value}/{year}':
                        return self.value + '/' + self.year;
                        break;

                    case '{value}/{month}/{year}':
                        return self.value + '/' + self.month + '/' + self.year;
                        break;

                    default:
                        break;
                }
            }
            getView() {
                const self = this;
                switch (self.type) {
                    case 'normal':
                        return self.view.getNumber(self);
                        break;

                    case 'modal':
                        var modal = self.view.getModal(new Modal());
                        var input = self.view.getNumberModal(self)
                        return input + modal;
                        break;

                    default:
                        return self.view.getNumber(self);
                        break;
                }
            }

        }
        class MyForm {
            constructor(id = 'my-form') {
                const self = this;
                self.id = id;
                self.elements = [];
            }
            hideModal() {
                $('#modalOverlay').addClass('hidden');
                $('#drawer').addClass('hidden');
            }
            showModal() {
                $('#modalOverlay').removeClass('hidden');
                $('#drawer').removeClass('hidden');
            }
            //do zrobienia pobieranie numeru fv z danego miesiaca za pomoca api i nasłuchiwanie na zmiane w dacie wystawienia
            activeAfterAppend(obj) {
                const self = this;
                const type = obj.getType();
                if (type === 'modal') {
                    $(document).on('click', '#number-setting', function() {
                        self.showModal();
                    });
                    $(document).on('click', '.close', function() {
                        self.hideModal();
                    });
                    $(document).on('click', '#modal-save', function() {
                        obj.updateFormat();
                        self.hideModal();
                    });
                }
            }
            addElement(obj) {
                const self = this;
                $('#' + self.id).append(obj.getView());
                try {
                    self.activeAfterAppend(obj);
                } catch (error) {}
                self.elements.push(obj);
            }

        }

        //START
        $(document).ready(function() {
            var myFormObj = new MyForm();
            var numberObj = new Number('modal');
            var invoiceTypeObj = new InvoiceType();
            var issueDateObj = new IssueDate();
            var saleDateObj = new SaleDate();

            myFormObj.addElement(numberObj);
            myFormObj.addElement(invoiceTypeObj);
            myFormObj.addElement(issueDateObj);
            myFormObj.addElement(saleDateObj);
        });
    </script>

</x-app-layout>