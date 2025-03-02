<x-app-layout>
    <div class="py-12 pt-48">
        @include('admin.elements.alerts')
        <x-old-school-nav></x-old-school-nav>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <a href="{{ route('cost') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i> Powrót do listy faktur
                    </a>

                    <div class="mt-8 md:flex md:justify-between">
                        <!-- Podgląd pliku po lewej -->
                        <div class="md:w-1/2 p-4">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                                Podgląd pliku
                            </h1>
                            <div class="file-preview">
                                @php
                                $filePath = 'attachments/' . $cost->path;
                                $fileExtension = pathinfo($cost->path, PATHINFO_EXTENSION);
                                $fileSize = filesize(public_path($filePath)); // Waga pliku w bajtach
                                $fileName = basename($cost->path); // Nazwa pliku
                                $fileType = in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'pdf','JPG', 'JPEG', 'PNG', 'GIF', 'PDF']) ? ($fileExtension === 'pdf' || $fileExtension === 'PDF' ? 'PDF' : 'Obraz') : 'Inny';
                                $fileDimensions = '';

                                // Uzyskiwanie wymiarów pliku graficznego
                                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                list($width, $height) = getimagesize(public_path($filePath));
                                $fileDimensions = "{$width} x {$height}px";
                                }
                                @endphp

                                @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF']))
                                <!-- Jeśli plik jest obrazem -->
                                <img src="{{ asset($filePath) }}" alt="Podgląd obrazu" class="w-full h-full object-contain">

                                @elseif(in_array($fileExtension, ['pdf', 'PDF']))
                                <!-- Jeśli plik jest PDF-em -->
                                <iframe src="{{ asset($filePath) }}" width="100%" height="100%" style="border:none; height:40vh;"></iframe>

                                <!-- Jeśli plik jest PDF-em -->
                                <div class="flex justify-center items-center h-full mt-6">
                                    <a href="{{ asset($filePath) }}" target="_blank" class="text-blue-500 underline">
                                        Otwórz plik PDF w nowej karcie
                                    </a>
                                </div>

                                @else
                                <!-- Jeśli plik ma inny typ -->
                                <div class="flex flex-col text-center justify-center items-center h-full">
                                    <i class="fa-solid fa-file-circle-xmark text-gray-500 icon-preview" style="font-size: 64px;"></i>
                                    <p class="text-gray-600 dark:text-gray-300 mt-2">Nie można wyświetlić podglądu tego pliku.</p>
                                </div>
                                @endif

                                <!-- Informacje o pliku -->
                                <div class="mt-6 md:mt-0">
                                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                                        Informacje o pliku
                                    </h1>
                                    <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                        <p class="text-gray-600 dark:text-gray-400">
                                            Typ
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                            {{ $fileType }}
                                        </p>
                                    </div>
                                    <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                        <p class="text-gray-600 dark:text-gray-400">
                                            Nazwa
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                            {{ $fileName }}
                                        </p>
                                    </div>
                                    <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                        <p class="text-gray-600 dark:text-gray-400">
                                            Waga
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                            {{ round($fileSize / 1024, 2) }} KB
                                        </p>
                                    </div>
                                    @if($fileDimensions)
                                    <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                        <p class="text-gray-600 dark:text-gray-400">
                                            Wymiary
                                        </p>
                                        <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                            {{ $fileDimensions }}
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Szczegóły faktury po prawej -->
                        <div class="md:w-1/2 p-6 mt-6 md:mt-0 md:ml-4">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                                Podgląd faktury kosztowej
                            </h1>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Numer Faktury</p>
                                <div class="flex flex-row">
                                    <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-rose-500 dark:text-white  mr-2">CST</span>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $cost_obj->number }}</p>
                                </div>
                            </div>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Termin płatności</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $cost_obj->due_date }}</p>
                            </div>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Kwota brutto</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $cost_obj->total }}</p>
                            </div>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-300 test-sm">Uwagi</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">{{ $cost_obj->notes }}</p>
                            </div>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-400">
                                    Utworzone przez
                                </p>
                                <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                    {{ $cost_obj->user->name ?? '' }}
                                </p>
                            </div>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-400">
                                    Dane należące do
                                </p>
                                <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                    {{ $cost_obj->company->name ?? '' }}
                                </p>
                            </div>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-400">Data utworzenia</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">{{ $cost_obj->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                            <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                                <p class="text-gray-600 dark:text-gray-400">Data aktualizacji</p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">{{ $cost_obj->updated_at->format('d-m-Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END WIDGET TASK -->
        </div>
    </div>
</x-app-layout>