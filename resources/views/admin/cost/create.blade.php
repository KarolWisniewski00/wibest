<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tworzenie Faktury Kosztowej') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <!--POWRÓT-->
                    <a href="{{ route('cost') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Faktur
                    </a>

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100">Nowa Faktura Kosztowa</h1>
                        <form method="POST" action="{{ route('cost.store') }}" enctype="multipart/form-data" class="mt-6">
                            @csrf

                            <!-- Numer faktury -->
                            <div class="mb-6">
                                <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Numer faktury</label>
                                <input type="text" id="number" name="number" value="" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- kwota -->
                            <div class="mb-6">
                                <label for="total" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Do zapłaty</label>
                                <input type="number" step="0.01" id="total" name="total" value="" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('total')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Termin płatności -->
                            <div class="mb-6">
                                <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Termin płatności</label>
                                <input type="date" id="due_date" name="due_date" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('due_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Uwagi -->
                            <div class="mb-6">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"></textarea>
                                @error('notes')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Upload pliku -->
                            <div class="mb-6">
                                <label for="attachment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wgraj plik</label>
                                <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                                    <!-- Ukryty input do uploadu pliku -->
                                    <input type="file" id="file-upload" name="attachment" class="absolute inset-0 w-full h-full opacity-0 z-50" />

                                    <!-- Opis uploadu -->
                                    <div class="text-center" id="upload-description">
                                        <!-- Ikona dodawania pliku z Font Awesome -->
                                        <i class="fa-solid fa-upload text-gray-400 text-6xl w-full"></i>

                                        <!-- Instrukcje do uploadu -->
                                        <h3 class="mt-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            <span>Przeciągnij i upuść</span>
                                            <span class="text-indigo-400"> lub przeglądaj</span>
                                            <span>pliki do przesłania</span>
                                        </h3>

                                        <!-- Obsługiwane formaty -->
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            PNG, JPG, GIF, do 10MB
                                        </p>
                                    </div>

                                    <!-- Podgląd przesłanego pliku -->
                                    <img src="" class="mt-4 mx-auto max-h-40 hidden" id="preview">
                                </div>
                            </div>



                            <input type="hidden" value="{{$company->id}}" name="company_id">
                            <!-- Przyciski kończońce -->
                            <div class="mt-8 flex justify-end space-x-4">
                                <button type="summit" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Zapisz
                                </button>
                                <a href="{{ route('cost') }}" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-trash mr-2"></i>Anuluj
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Funkcja ustawia dzisiejszą datę jako wartość domyślną dla pola daty
            const today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            $('#due_date').val(today);

            var dropzone = $('#dropzone');

            dropzone.on('dragover', function(e) {
                e.preventDefault();
                dropzone.addClass('border-indigo-600');
            });

            dropzone.on('dragleave', function(e) {
                e.preventDefault();
                dropzone.removeClass('border-indigo-600');
            });

            dropzone.on('drop', function(e) {
                e.preventDefault();
                dropzone.removeClass('border-indigo-600');
                var file = e.originalEvent.dataTransfer.files[0];
                displayPreview(file);
            });

            $('#file-upload').on('change', function(e) {
                var file = e.target.files[0];
                displayPreview(file);
            });

            function displayPreview(file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var preview = $('#preview');
                    preview.attr('src', reader.result);
                    preview.removeClass('hidden');

                    // Ukrycie opisu uploadu
                    $('#upload-description').addClass('hidden');
                };
            }
        });
    </script>
</x-app-layout>