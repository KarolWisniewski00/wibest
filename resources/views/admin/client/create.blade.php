<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('client') }}" class="text-lg">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Klientów
                    </x-button-link-back>
                    <!--POWRÓT-->

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-5xl text-center font-medium text-gray-700 dark:text-gray-100">Załóż klienta</h1>
                        <form method="POST" action="{{ route('client.store') }}">
                            @csrf
                            <div class="mt-8 relative flex flex-col gap-4 w-full h-full appearance-none rounded-lg  border-2 border-white dark:border-gray-700 p-4 outline-none  dark:text-gray-50">
                                <div class="md:grid md:gap-4 py-4 ">
                                    <!-- Klient -->
                                    <div class="mb-6">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Nazwa nabywcy
                                        </label>
                                        <input
                                            id="name"
                                            name="name"
                                            required
                                            class="mt-1 block w-full p-2 border text-gray-700 bg-gray-100 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        @error('name')
                                        <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Adres -->
                                    <div class="mb-6">
                                        <label for="adress"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Adres nabywcy
                                        </label>
                                        <input type="text"
                                            id="adress"
                                            name="adress"
                                            required
                                            class="mt-1 block w-full p-2 border text-gray-700 bg-gray-100 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                        @error('adress')
                                        <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- NIP -->
                                    <div class="mb-6">
                                        <label for="vat_number"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            NIP nabywcy
                                        </label>
                                        <div class="flex justify-end space-x-4">
                                            <input type="text"
                                                id="vat_number"
                                                name="vat_number"
                                                required
                                                class="mt-1 block w-full p-2 border text-gray-700 bg-gray-100 border-gray-100 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                                            @error('vat_number')
                                            <p class="my-3 block text-center text-sm font-medium text-red-700 dark:text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <button id="fetch_vat_data" type="button"
                                            class="mx-auto whitespace-nowrap inline-flex items-center px-4 py-2 bg-indigo-300 dark:bg-indigo-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-300 focus:bg-indigo-700 dark:focus:bg-indigo-300 active:bg-indigo-900 dark:active:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150">
                                            Pobierz dane podatnika VAT
                                        </button>
                                    </div>
                                    <div id="info" class="text-sm text-center text-gray-700 dark:text-gray-500 mt-2">Po uzupełnieniu numeru NIP naciśnij przycisk, działa TYLKO dla podatników VAT</div>
                                    <a id="kas" href="https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat" class="flex items-center justify-center text-center text-blue-300 dark:text-blue-400 hover:underline text-xs mt-1">Źródło: https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat</a>
                                    <a id="gus" href="https://api.stat.gov.pl/Home/RegonApi" class="flex items-center justify-center hidden text-center text-blue-300 dark:text-blue-400 hover:underline text-xs mt-1">Źródło: https://api.stat.gov.pl/Home/RegonApi</a>
                                </div>
                            </div>

                            <!-- Email i Email2 -->
                            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                    <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                </div>
                                <div>
                                    <label for="email2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email dodatkowy</label>
                                    <input type="email" id="email2" name="email2" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                </div>
                            </div>

                            <!-- Telefon i Telefon2 -->
                            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefon</label>
                                    <input type="text" id="phone" name="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                </div>
                                <div>
                                    <label for="phone2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefon dodatkowy</label>
                                    <input type="text" id="phone2" name="phone2" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                </div>
                            </div>

                            <!-- Uwagi -->
                            <div class="mb-4">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                <textarea id="notes" name="notes" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"></textarea>
                            </div>

                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                            <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-col md:flex-row gap-4 items-center justify-center">
                                <button type="submit"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Załóż klienta
                                </button>
                                <a href="{{ route('client') }}"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                </a>
                            </div>
                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                        </form>
                    </div>
                    <!--Formularz-->
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
    <input type="hidden" id="api-link-gus" value="{{route('api.search.gus',[''])}}">
    <script>
        $(document).ready(function() {
            $('#fetch_vat_data').click(function() {
                var taxId = $('#vat_number').val();
                let apiLinkGus = $('#api-link-gus');

                if (taxId) {
                    $.ajax({
                        url: apiLinkGus.val() + '/' + taxId,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Dane podatnika VAT:', data['response']);
                            $('#name').val(data['response']['name'] || '');
                            $('#adress').val(data['response']['adres'] || '');
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
        });
    </script>
</x-app-layout>