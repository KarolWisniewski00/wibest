<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <!--POWRÓT-->
                    <a href="{{ route('offer.show', $offer) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót Do Podglądu Oferty
                    </a>

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100">Edytowanie Oferty</h1>
                        <form method="POST" action="{{ route('offer.update', $offer) }}" class="mt-6">
                            @csrf
                            @method('PUT')
                            <!-- Numer faktury -->
                            <div class="mb-6">
                                <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Numer faktury</label>
                                <input type="text" id="number" name="number" value="{{ $offer->number }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Data wystawienia -->
                            <div class="mb-6">
                                <label for="issue_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data wystawienia</label>
                                <input type="date" id="issue_date" name="issue_date" value="{{ $offer->issue_date }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('issue_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Termin płatności -->
                            <div class="mb-6">
                                <h3 class="mb-5 block text-sm font-medium text-gray-700 dark:text-gray-300">Termin ważności</h3>
                                <ul class="grid w-full grid-cols-2 gap-6 md:grid-cols-3">
                                    <li>
                                        <input {{ $payment_term == '1_dzien' ? 'checked' : '' }} name="payment_term" type="radio" id="payment_1day" value="1_dzien" class="hidden peer">
                                        <label for="payment_1day" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">1 dzień</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input {{ $payment_term == '3_dni' ? 'checked' : '' }} name="payment_term" type="radio" id="payment_3days" value="3_dni" class="hidden peer">
                                        <label for="payment_3days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">3 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input {{ $payment_term == '7_dni' ? 'checked' : '' }} name="payment_term" type="radio" id="payment_7days" value="7_dni" class="hidden peer">
                                        <label for="payment_7days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">7 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input {{ $payment_term == '14_dni' ? 'checked' : '' }} name="payment_term" type="radio" id="payment_14days" value="14_dni" class="hidden peer">
                                        <label for="payment_14days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">14 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input {{ $payment_term == '30_dni' ? 'checked' : '' }} name="payment_term" type="radio" id="payment_30days" value="30_dni" class="hidden peer">
                                        <label for="payment_30days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">30 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input {{ $payment_term == '60_dni' ? 'checked' : '' }} name="payment_term" type="radio" id="payment_60days" value="60_dni" class="hidden peer">
                                        <label for="payment_60days" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-indigo-600 hover:text-gray-600  hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 peer-checked:dark:border-indigo-600">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">60 dni</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input {{ $payment_term == '90_dni' ? 'checked' : '' }} name="payment_term" type="radio" id="payment_90days" value="90_dni" class="hidden peer">
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

                            <!-- DIVIDER -->
                            <hr class="border-t border-gray-300 dark:border-gray-700 my-6">

                            <!-- Dane sprzedawcy i nabywcy -->
                            <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">

                                <!-- Dane sprzedawcy -->
                                <div>
                                    <h3 class="text-sm md:text-xl font-medium text-gray-900 dark:text-gray-100">Dane sprzedawcy</h3>
                                    <div class="md:grid md:gap-4 py-4 border-b dark:border-gray-700 mt-6">
                                        <p class="text-gray-600 dark:text-gray-300 test-sm">
                                            Nazwa
                                        </p>
                                        <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                            <a href="{{route('setting')}}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$company->name}}</a>
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

                                <!-- Dane nabywcy -->
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Dane nabywcy</h3>

                                    <!-- Klient -->
                                    <div class="mb-6">
                                        <label for="buyer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa nabywcy</label>
                                        <input value="{{ $offer->buyer_name }}" list="buyer_name_suggestions" id="buyer_name" name="buyer_name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        <datalist id="buyer_name_suggestions">
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->name }}" data-id="{{ $client->id }}" data-name="{{ $client->name }}" data-address="{{ $client->adress }}" data-vat-number="{{ $client->vat_number }}">
                                                {{ $client->vat_number }}
                                            </option>
                                            @endforeach
                                        </datalist>
                                        <input type="hidden" id="client_id" name="client_id" value="{{ $offer->client_id }}">
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
                                        <input value="{{ $offer->buyer_adress }}" type="text" id="buyer_address" name="buyer_adress" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        @error('buyer_adress')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- NIP -->
                                    <div class="mb-6">
                                        <label for="buyer_vat_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP nabywcy</label>
                                        <div class="flex justify-end space-x-4">
                                            <button type="button" id="fetch_vat_data" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:bg-indigo-700 dark:focus:bg-indigo-400 active:bg-indigo-800 dark:active:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Pobierz dane podatnika VAT
                                            </button>
                                            <input value="{{ $offer->buyer_tax_id }}" type="text" id="buyer_vat_number" name="buyer_vat_number" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                            @error('buyer_vat_number')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <a href="https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat" class="text-blue-600 dark:text-blue-400 hover:underline text-xs mt-1">Źródło: https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat</a>
                                    </div>
                                    <!-- Imię i nazwisko -->
                                    <div class="mb-6">
                                        <label for="buyer_person_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię i nazwisko</label>
                                        <input type="text" id="buyer_person_name" value="{{ $offer->buyer_person_name }}" name="buyer_person_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        @error('buyer_person_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Email -->
                                    <div class="mb-6">
                                        <label for="buyer_person_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adres email</label>
                                        <input type="text" id="buyer_person_email" value="{{ $offer->buyer_person_email }}" name="buyer_person_email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        @error('buyer_person_email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- DIVIDER -->
                            <hr class="border-t border-gray-300 dark:border-gray-700 my-6">

                            <!-- Pozycje faktury -->
                            <div class="mb-6">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Pozycje na fakturze</h3>
                                <div id="offer-items" class="mt-6">

                                    <!-- KONTERNER DLA POZYCJI -->
                                    <div class="offer-item grid grid-cols-1 md:grid-cols-6 gap-4 mb-4">

                                    </div>
                                </div>

                                <!-- PODSUMOWANIE -->
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                                    <!-- Lewa kolumna (3/4 szerokości) -->
                                    <div class="md:col-span-3">
                                        <div class="mt-8">
                                            <button type="button" id="add-item" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-plus mr-2"></i>Dodaj pozycję
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Prawa kolumna (1/4 szerokości) - Podsumowanie -->
                                    <div class="md:col-span-1">
                                        <div id="summary" class="bg-gray-100 dark:bg-gray-800 py-4 rounded-lg">
                                            <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 text-end">Podsumowanie</h3>
                                            <div class="mt-4">
                                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 text-end">Suma netto:
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

                            <!-- DIVIDER -->
                            <hr class="border-t border-gray-300 dark:border-gray-700 my-6">


                            <!-- Uwagi -->
                            <div class="mb-6">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"></textarea>
                                @error('notes')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Przyciski kończońce -->
                            <div class="mt-8 flex justify-end space-x-4">
                                <button type="summit" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Zapisz
                                </button>
                                <a href="{{ route('offer.show', $offer) }}" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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
        class Item {
            constructor(container) {
                this.container = container;
                this.length = 0;
            }

            // Funkcja do automatycznych obliczeń kwoty brutto
            updateCalculations(itemElement) {
                const quantityInput = itemElement.find(`#item_quantity_${this.length}`);
                const priceInput = itemElement.find(`#item_price_${this.length}`);
                const vatInput = itemElement.find(`#item_vat_${this.length}`);
                const nettoInput = itemElement.find(`#item_netto_${this.length}`);
                const bruttoInput = itemElement.find(`#item_brutto_${this.length}`);

                const calculateValues = () => {
                    const quantity = parseFloat(quantityInput.val()) || 0;
                    const price = parseFloat(priceInput.val()) || 0;
                    const vat = parseFloat(vatInput.val()) || 0;

                    const netto = quantity * price;
                    const brutto = netto + (netto * (vat / 100));

                    nettoInput.val(netto.toFixed(2));
                    bruttoInput.val(brutto.toFixed(2));

                    // Aktualizacja podsumowania
                    this.updateSummary();
                };

                // Listen to changes in the quantity, price and VAT inputs
                quantityInput.on('input', calculateValues);
                priceInput.on('input', calculateValues);
                vatInput.on('input', calculateValues);
            }

            getItem() {
                const itemElement = $(`
        <div id="item_id_${this.length}" class="offer-item grid grid-cols-1 md:grid-cols-6 gap-4 mb-4 relative" data-index="${this.length}">
            <div>
            <label for="item_name_${this.length}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa produktu/usługi</label>
            <input list="name_item_suggestions_${this.length}" type="text" name="items[${this.length}][name]" id="item_name_${this.length}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
            <datalist id="name_item_suggestions_${this.length}">
                @foreach ($services as $service)
                <option value="{{ $service->name }}" data-id="{{ $service->id }}" data-unit_price="{{ $service->unit_price }}" data-vat_rate="{{ $service->vat_rate }}" >
                    {{ $service->description }}
                </option>
                @endforeach
                @foreach ($products as $product)
                <option value="{{ $product->name }}" data-id="{{ $product->id }}" data-unit_price="{{ $product->unit_price }}" data-vat_rate="{{ $product->vat_rate }}">
                    {{ $product->description }}
                </option>
                @endforeach
            </datalist>
            </div>
            <div>
                <label for="item_quantity_${this.length}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ilość</label>
                <input value="1" type="number" step="1" name="items[${this.length}][quantity]" id="item_quantity_${this.length}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
            </div>
            <div>
                <label for="item_price_${this.length}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cena jednostkowa netto</label>
                <input type="number" step="0.01" name="items[${this.length}][price]" id="item_price_${this.length}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
            </div>
            <div>
                <label for="item_vat_${this.length}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stawka VAT (%)</label>
                <input type="number" value="0" step="0.01" name="items[${this.length}][vat]" id="item_vat_${this.length}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
            </div>
            <div>
                <label for="item_netto_${this.length}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota netto</label>
                <input type="number" step="0.01" value="0" name="items[${this.length}][netto]" id="item_netto_${this.length}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required readonly>
                <p class="text-indigo-500 text-xs mt-1">Wartość automatycznie obliczana</p>
            </div>
            <div>
                <label for="item_brutto_${this.length}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota brutto</label>
                <input type="number" step="0.01" name="items[${this.length}][brutto]" id="item_brutto_${this.length}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required readonly>
                <p class="text-indigo-500 text-xs mt-1">Wartość automatycznie obliczana</p>
            </div>
        </div>
                <input type="hidden" value="" name="items[${this.length}][product_id]" id="item_product_id_${this.length}">
        <input type="hidden" value="" name="items[${this.length}][service_id]" id="item_service_id_${this.length}">
        <div id="item2_id_${this.length}" class="flex gap-4 mb-4 relative justify-end">
            <button type="button" id="remove_item_${this.length}" class=" w-fit inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    `);

                // Dodaj funkcję do aktualizacji wartości z zaokrąglaniem do 2 miejsc po przecinku
                this.updateCalculations(itemElement);
                return itemElement;
            }

            setLength() {
                this.length = this.container.children().length;
            }

            print() {
                this.setLength();
                this.container.append(this.getItem());

                //PODSTAWIANIE usługi i produktu
                var len = this.length;
                const self = this;
                $('#item_name_' + len).on('input', function() {
                    var input = $(this).val();
                    var options = $('#name_item_suggestions_' + len + ' option');

                    options.each(function() {
                        if ($(this).val() === input) {
                            // Pobierz adres z atrybutu data i ustaw w polu adresu
                            var price = $(this).data('unit_price');
                            $('#item_price_' + len).val(price);

                            // Pobierz NIP z atrybutu data i ustaw w polu NIP
                            var vat = $(this).data('vat_rate');
                            $('#item_vat_' + len).val(vat);
                            var item_quantity = $('#item_quantity_' + len).val();
                            if ($(this).data('type') == 'product') {
                                $('#item_product_id_' + len).val($(this).data('id'));
                            } else {
                                $('#item_service_id_' + len).val($(this).data('id'));
                            }

                            var totalNetto = item_quantity * price;
                            var totalVat = item_quantity * vat;
                            var totalBrutto = totalNetto + totalVat;

                            var item_netto = $('#item_netto_' + len).val(totalNetto);
                            var item_brutto = $('#item_brutto_' + len).val(totalBrutto);
                            self.updateSummary(); // Aktualizacja po dodaniu pozycji
                        }
                    });
                });
                $('#remove_item_' + len).on('click', function() {
                    $('#item_id_' + len).remove();
                    $('#item2_id_' + len).remove();
                    toastr.success('Operacja zakończona powodzeniem!');
                });
            }
            printEdit(name, quantity, price, vat, netto, brutto) {
                this.print();
                var len = this.length;
                $('#item_name_' + len).val(name);
                $('#item_quantity_' + len).val(quantity);
                $('#item_price_' + len).val(price);
                $('#item_vat_' + len).val(vat);
                $('#item_netto_' + len).val(netto);
                $('#item_brutto_' + len).val(brutto);
                this.updateSummary();
            }
            updateSummary() {
                let totalNetto = 0;
                let totalBrutto = 0;
                let totalVat = 0;

                $('.offer-item').each(function() {
                    const netto = parseFloat($(this).find('[id^="item_netto_"]').val()) || 0;
                    const brutto = parseFloat($(this).find('[id^="item_brutto_"]').val()) || 0;
                    const vat = brutto - netto;

                    totalNetto += netto;
                    totalBrutto += brutto;
                    totalVat += vat;
                });

                $('#total_netto').text(totalNetto.toFixed(2));
                $('#total_vat').text(totalVat.toFixed(2));
                $('#total_brutto').text(totalBrutto.toFixed(2));
            }
        }

        function offerItems() {
            const item = new Item($('#offer-items'));

            @foreach($items as $item)

            item.printEdit('{{$item->name}}',
                '{{$item->quantity}}',
                '{{$item->unit_price}}',
                '{{$item->vat_rate}}',
                '{{$item->subtotal}}',
                '{{$item->total}}'
            );

            @endforeach

            // Funkcja do dodawania nowych pozycji na fakturze
            $('#add-item').on('click', function() {
                item.print();
                toastr.success('Operacja zakończona powodzeniem!');
            });
        }

        function autoDate() {
            // Funkcja ustawia dzisiejszą datę jako wartość domyślną dla pola daty
            const today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            $('#issue_date').val(today);
        }

        function addClient() {
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
        }

        function addClientByTaxId() {
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
        }
        //START
        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-top-center", // Wyświetl na środku u góry
                "timeOut": "5000", // Czas trwania (5 sekund)
                "closeButton": true, // Dodanie przycisku zamknięcia
                "progressBar": true // Pokaż pasek postępu
            };
            offerItems();
            addClient();
            addClientByTaxId();
        });
    </script>

</x-app-layout>