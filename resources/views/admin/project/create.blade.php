<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <x-button-link-back href="{{ route('client.show', $client) }}" class="text-lg">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do Klienta
                    </x-button-link-back>
                    <!--POWRÓT-->

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-5xl text-center font-medium text-gray-700 dark:text-gray-100">
                            Stwórz Projekt
                        </h1>
                        <form method="POST" action="{{ route('project.store') }}">
                            @csrf
                            <ul class="grid w-full gap-6 md:grid-cols-2 my-8">
                                <li>
                                    <!-- Nazwa -->
                                    <div class="mb-4">
                                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa</label>
                                        <input type="text" id="name" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Skrót -->
                                    <div class="mb-4">
                                        <label for="shortcut" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skrót</label>
                                        <input type="text" id="shortcut" name="shortcut" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Domena sandbox -->
                                    <div class="mb-4">
                                        <label for="sandbox_domain" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Domena sandbox</label>
                                        <input type="text" id="sandbox_domain" name="sandbox_domain" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Domena produkcja -->
                                    <div class="mb-4">
                                        <label for="production_domain" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Domena produkcja</label>
                                        <input type="text" id="production_domain" name="production_domain" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Technologia -->
                                    <div class="mb-4">
                                        <label for="technology" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Technologia</label>
                                        <input type="text" id="technology" name="technology" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                </li>
                                <li>
                                    <!--KUPUJĄCY-->
                                    <x-container-gray>
                                        <!--NAZWA-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                Nazwa kupującego
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                <x-label-link-company href="{{route('client.show', $client->id)}}">
                                                    {{ $client->name }}
                                                </x-label-link-company>
                                            </p>
                                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                                        </x-text-cell>
                                        <!--NAZWA-->

                                        <!--ADRES-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                Adres kupującego
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                {{ $client->adress }}
                                            </p>
                                        </x-text-cell>
                                        <!--ADRES-->

                                        <!--NIP-->
                                        <x-text-cell>
                                            <p class="text-gray-700 dark:text-gray-300 test-sm">
                                                NIP kupującego
                                            </p>
                                            <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                                {{ $client->vat_number }}
                                            </p>
                                        </x-text-cell>
                                        <!--NIP-->
                                    </x-container-gray>
                                    <!--KUPUJĄCY-->
                                </li>
                            </ul>


                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                            <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-col md:flex-row gap-4 items-center justify-center">
                                <button type="submit"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Stwórz Projekt
                                </button>

                                <a href="{{ route('client.show', $client) }}"
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
            <!--END WIDGET TASK-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#fetch_vat_data').click(function() {
                var taxId = $('#tax_id').val();
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
</x-app-layout>