<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tworzenie Faktury') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- WIDGET TASK -->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <a href="{{ route('invoice') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Faktur
                    </a>

                    <div class="mt-8">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100">Nowa Faktura</h1>

                        <form method="POST" action="{{ route('invoice.update', $invoice) }}" class="mt-6">
                            @csrf
                            @method('PUT')
                            <!-- Numer faktury -->
                            <div class="mb-6">
                                <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Numer faktury</label>
                                <input type="text" id="number" name="number" value="{{ $invoice->number }}" readonly required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>

                            <!-- Typ Faktury -->
                            <div class="mb-6">
                                <h3 class="mb-5 block text-sm font-medium text-gray-700 dark:text-gray-300">Typ</h3>
                                <ul class="grid w-full gap-6 md:grid-cols-3">
                                    <li>
                                        <input name="invoice_type" type="radio" id="invoice" value="faktura" class="hidden peer" checked>
                                        <label for="invoice" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Faktura</div>
                                            </div>
                                        </label>
                                    </li>
                                    <!--
                                    <li>
                                        <input disabled name="invoice_type" type="radio" id="invoice_proform" value="faktura proforma" class="hidden peer">
                                         <label for="invoice_proform" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Faktura proforma</div>
                                            </div>
                                        </label>
                                    </li>
                                    -->
                                </ul>
                                @error('invoice_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Data wystawienia -->
                            <div class="mb-6">
                                <label for="issue_date" class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Data wystawienia</label>
                                <span class="text-gray-900 dark:text-gray-200">{{ $invoice->issue_date }}</span>
                                <input type="hidden" id="issue_date" value="{{ $invoice->issue_date }}" name="issue_date" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>


                            <hr class="border-t border-gray-300 dark:border-gray-700 my-6">
                            <!-- Dane sprzedawcy i nabywcy -->
                            <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Dane sprzedawcy -->
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Dane sprzedawcy</h3>
                                    <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700 mt-6">
                                        <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                            Nazwa
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-200">
                                            {{$company->name}}
                                            <input type="hidden" value="{{$company->id}}" name="company_id">
                                            <input type="hidden" value="{{$company->name}}" name="seller_name">
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                        <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                            Adres
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-200">
                                            {{$company->adress}}
                                            <input type="hidden" value="{{$company->adress}}" name="seller_adress">
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                        <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                            NIP
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-200">
                                            {{$company->vat_number}}
                                            <input type="hidden" value="{{$company->vat_number}}" name="seller_vat_number">
                                        </p>
                                    </div>
                                    <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                        <p class="text-gray-600 dark:text-gray-200 font-semibold">
                                            Numer konta
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-200">
                                            {{$company->bank}}
                                            <input type="hidden" value="{{$company->bank}}" name="bank">
                                        </p>
                                    </div>
                                </div>

                                <!-- Dane nabywcy -->
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Dane nabywcy</h3>
                                    <!-- Klient -->
                                    <div class="mb-6 mt-6">
                                        <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Szybkie wybieranie</label>
                                        <select id="client_id" name="client_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                            <option value="{{$invoice->client->id}}">{{$invoice->client->name}}</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" data-name="{{ $client->name }}" data-adress="{{ $client->adress }}" data-vat-number="{{ $client->vat_number }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label for="buyer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa nabywcy</label>
                                        <input value="{{$invoice->buyer_name}}" type="text" id="buyer_name" name="buyer_name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <div class="mb-6">
                                        <label for="buyer_adress" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adres nabywcy</label>
                                        <input value="{{$invoice->buyer_adress}}" type="text" id="buyer_adress" name="buyer_adress" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <div class="mb-6">
                                        <label for="buyer_vat_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP nabywcy</label>
                                        <input value="{{$invoice->buyer_tax_id}}" type="text" id="buyer_vat_number" name="buyer_vat_number" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                </div>
                            </div>
                            <hr class="border-t border-gray-300 dark:border-gray-700 my-6">
                            <!-- Pozycje faktury -->
                            <div class="mb-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Pozycje na fakturze</h3>
                                <div id="invoice-items" class="mt-6">
                                    <!-- Template dla pozycji -->
                                    @foreach($items as $key => $item)
                                    <div class="invoice-item grid grid-cols-1 md:grid-cols-6 gap-4 mb-4">
                                        <input type="hidden" name="items[$key][service_id]">
                                        <input type="hidden" name="items[$key][product_id]">
                                        <div>
                                            <label for="item_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa produktu/usługi</label>
                                            <input type="text" name="items[$key][name]" value="{{$item->name}}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                        </div>
                                        <div>
                                            <label for="item_quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ilość</label>
                                            <input type="number" value="1" name="items[$key][quantity]" value="{{$item->quantity}}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                        </div>
                                        <div>
                                            <label for="item_price" class=" block text-sm font-medium text-gray-700 dark:text-gray-300">Cena jednostkowa netto</label>
                                            <input type="number" name="items[$key][price]"value="{{$item->unit_price}}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                        </div>
                                        <div>
                                            <label for="item_vat" class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Stawka VAT (%)</label>
                                            <span class="text-gray-900 dark:text-gray-200">0</span>
                                            <input type="hidden" name="items[$key][vat]" value="0" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                        </div>
                                        <div>
                                            <label for="item_netto" class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota netto</label>
                                            <span class="text-gray-900 dark:text-gray-200">0</span>
                                            <input type="hidden" name="items[$key][netto]" value="0" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        </div>
                                        <div>
                                            <label for="item_brutto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota brutto</label>
                                            <input type="number" name="items[$key][brutto]" value="{{$item->total}}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        </div>
                                        <button type="button" onclick="removeItem(this)" class="w-fit inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Przycisk zapisu -->
                                <div class="mt-8 flex justify-end space-x-4">
                                    <!-- Zielony przycisk: Dodaj pozycję -->
                                    <button type="button" id="add-item" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-plus mr-2"></i>Dodaj pozycję
                                    </button>

                                    <!-- Niebieski przycisk: Dodaj produkt
                                    <button type="button" id="add-item" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:bg-indigo-700 dark:focus:bg-indigo-400 active:bg-indigo-800 dark:active:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-plus mr-2"></i>Dodaj produkt
                                    </button>

                                    Fioletowy przycisk: Dodaj usługę
                                    <button type="button" id="add-item" class="inline-flex items-center px-4 py-2 bg-purple-600 dark:bg-purple-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 dark:hover:bg-purple-400 focus:bg-purple-700 dark:focus:bg-purple-400 active:bg-purple-800 dark:active:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-plus mr-2"></i>Dodaj usługę
                                    </button>
                                    -->
                                </div>

                            </div>
                            <hr class="border-t border-gray-300 dark:border-gray-700 my-6">
                            <!-- Wpłacona kwota
                            <div class="mb-6">
                                <h3 class="mb-5 block text-sm font-medium text-gray-700 dark:text-gray-300">Wpłacona kwota</h3>
                                <ul class="grid w-full gap-6 md:grid-cols-1">
                                    <li>
                                        <label for="paid_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota</label>
                                        <input type="number" id="paid_amount" value="0" name="paid_amount" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                        @error('paid_amount')
                                        <p class="text-red-500 text-sm mt-1 dark:text-red-400">{{ $message }}</p>
                                        @enderror
                                    </li>
                                </ul>
                            </div>
                            -->

                            <!-- Metoda płatności -->
                            <div class="mb-6">
                                <h3 class="mb-5 block text-sm font-medium text-gray-700 dark:text-gray-300">Metoda płatności</h3>
                                <ul class="grid w-full gap-6 md:grid-cols-3">
                                    <li>
                                        <input name="payment_method" checked type="radio" id="payment_transfer" value="przelew" class="hidden peer">
                                        <label for="payment_transfer" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Przelew</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_method" type="radio" id="payment_cash" value="gotowka" class="hidden peer">
                                        <label for="payment_cash" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Gotówka</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_method" type="radio" id="payment_card" value="karta" class="hidden peer">
                                        <label for="payment_card" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Karta płatnicza</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_method" type="radio" id="payment_cod" value="pobranie" class="hidden peer">
                                        <label for="payment_cod" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Opłata za pobraniem</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_method" type="radio" id="payment_online" value="online" class="hidden peer">
                                        <label for="payment_online" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Płatność On-Line</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                                @error('payment_method')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Termin płatności -->
                            <div class="mb-6">
                                <h3 class="mb-5 block text-sm font-medium text-gray-700 dark:text-gray-300">Termin płatności</h3>
                                <ul class="grid w-full gap-6 md:grid-cols-3">
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_now" value="natychmiast" class="hidden peer">
                                        <label for="payment_now" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Natychmiast</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_1day" value="1_dzien" class="hidden peer">
                                        <label for="payment_1day" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">1 dzień</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_3days" value="3_dni" class="hidden peer">
                                        <label for="payment_3days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">3 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_7days" value="7_dni" class="hidden peer">
                                        <label for="payment_7days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">7 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" checked type="radio" id="payment_14days" value="14_dni" class="hidden peer">
                                        <label for="payment_14days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">14 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_30days" value="30_dni" class="hidden peer">
                                        <label for="payment_30days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">30 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_60days" value="60_dni" class="hidden peer">
                                        <label for="payment_60days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">60 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input name="payment_term" type="radio" id="payment_90days" value="90_dni" class="hidden peer">
                                        <label for="payment_90days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">90 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                                @error('payment_term')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Uwagi -->
                            <div class="mb-6">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"></textarea>
                            </div>
                            <!-- Przycisk dodawania faktury -->
                            <div class="mt-8 flex justify-end space-x-4">
                                <!-- Green button for marking as completed -->
                                <button type="summit" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Zapisz
                                </button>

                                <a href="{{ route('invoice') }}" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-trash mr-2"></i>Anuluj
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Funkcja do dodawania nowych pozycji na fakturze
            $('#add-item').on('click', function() {
                const container = $('#invoice-items');
                const index = container.children().length; // Oblicza nowy indeks na podstawie liczby obecnych pozycji
                const newItem = $(`
                <div class="invoice-item grid grid-cols-1 md:grid-cols-6 gap-4 mb-4 relative">
                    <div>
                        <label for="item_name_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa produktu/usługi</label>
                        <input type="text" name="items[${index}][name]" id="item_name_${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="item_quantity_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ilość</label>
                        <input value="1" type="number" name="items[${index}][quantity]" id="item_quantity_${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="item_price_${index}" class=" block text-sm font-medium text-gray-700 dark:text-gray-300">Cena jednostkowa netto</label>
                        <input type="number" name="items[${index}][price]" id="item_price_${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="item_vat_${index}" class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Stawka VAT (%)</label>
                        <span class="text-gray-900 dark:text-gray-200">0</span>
                        <input type="hidden" value="0" name="items[${index}][vat]" id="item_vat_${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="item_netto_${index}" class="mb-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota netto</label>
                        <span class="text-gray-900 dark:text-gray-200">0</span>
                        <input type="hidden" value="0" name="items[${index}][netto]" id="item_netto_${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" readonly>
                    </div>
                    <div>
                        <label for="item_brutto_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota brutto</label>
                        <input type="number" name="items[${index}][brutto]" id="item_brutto_${index}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" readonly>
                    </div>
                    <button type="button" onclick="removeItem(this)" class="w-fit inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </div>
            `);

                container.append(newItem);
            });

            // Funkcja do usuwania pozycji
            window.removeItem = function(button) {
                $(button).closest('.invoice-item').remove();
            };
        });
    </script>
    <script>
        $(document).ready(function() {
            // Funkcja ustawia dzisiejszą datę jako wartość domyślną dla pola daty
            const today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            $('#issue_date').val(today);
        });
    </script>
    <script>
        $(document).ready(function() {
            const $clientSelect = $('#client_id');
            const $buyerName = $('#buyer_name');
            const $buyerAddress = $('#buyer_adress');
            const $buyerTaxId = $('#buyer_vat_number');

            $clientSelect.on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const name = selectedOption.data('name');
                const address = selectedOption.data('adress');
                const taxId = selectedOption.data('vat-number');

                if (selectedOption.val()) {
                    $buyerName.val(name || '');
                    $buyerAddress.val(address || '');
                    $buyerTaxId.val(taxId || '');
                } else {
                    $buyerName.val('');
                    $buyerAddress.val('');
                    $buyerTaxId.val('');
                }
            });
        });
    </script>

</x-app-layout>