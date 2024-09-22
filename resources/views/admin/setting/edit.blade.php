<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edytuj firmę') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Formularz edycji firmy -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <a href="{{ route('setting') }}" class="mb-8 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do Ustawień
                    </a>
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100 mb-6">
                        Edytuj dane swojej firmy
                    </h1>

                    <form method="POST" action="{{ route('setting.update', $company->id) }}">
                        @csrf
                        @method('PUT') <!-- To specify this is an update request -->

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa firmy</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $company->name) }}" autofocus required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Adres -->
                        <div class="mb-6">
                            <label for="adress" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adres</label>
                            <input type="text" id="adress" name="adress" value="{{ old('adress', $company->adress) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('adress')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="vat_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP</label>
                            <div class="flex justify-end space-x-4">
                                <button type="button" id="fetch_vat_data" class=" inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-400 focus:bg-blue-700 dark:focus:bg-blue-400 active:bg-blue-800 dark:active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Pobierz dane podatnika VAT
                                </button>
                                <input type="text" id="vat_number" name="vat_number" value="{{ old('vat_number', $company->vat_number) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>
                            @error('vat_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <a href="https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat" class="text-blue-500 text-xs mt-1">Źródło: https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat</a>
                        </div>

                        <!-- Bank -->
                        <div class="mb-6">
                            <label for="bank" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bank</label>
                            <input type="text" id="bank" name="bank" value="{{ old('bank', $company->bank) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('bank')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#fetch_vat_data').click(function() {
                                    var nip = $('#vat_number').val();
                                    var today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

                                    if (nip) {
                                        $.ajax({
                                            url: `https://wl-api.mf.gov.pl/api/search/nip/${nip}?date=${today}`,
                                            method: 'GET',
                                            dataType: 'json',
                                            success: function(data) {
                                                console.log('Dane podatnika VAT:', data);

                                                // Wstawianie danych do formularza
                                                var subject = data.result.subject;
                                                $('#name').val(subject.name || '');

                                                // Wstawianie pełnego adresu
                                                if (subject.workingAddress) {
                                                    $('#adress').val(subject.workingAddress || '');
                                                }

                                            },
                                            error: function(xhr, status, error) {
                                                console.error('Błąd:', error);
                                                // Możesz tutaj dodać kod do obsługi błędów
                                            }
                                        });
                                    } else {
                                        alert('Proszę wprowadzić numer NIP.');
                                    }
                                });
                            });
                        </script>

                        <!-- Przycisk edytowania faktury -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <!-- Green button for saving changes -->
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-check mr-2"></i>Zapisz
                            </button>

                            <a href="{{ route('setting') }}" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-trash mr-2"></i>Anuluj
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
