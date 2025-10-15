<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historia Czasu Pracy') }}
        </h2>
    </x-slot>

    @include('admin.elements.alerts')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Formularz edycji firmy -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <a href="{{ route('work.session') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                    </a>
                    <!-- Napis z przyciskiem tworzenia -->
                    <div class="pb-4 flex flex-col justify-between items-center">
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Edytuj Czas Pracy
                            </h1>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('work.session.update', $work_session) }}">
                        @csrf
                        @method('PUT') <!-- To specify this is an update request -->

                        <!-- Status pracy -->
                        <div class="mt-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status Pracy</label>
                            <select id="status" name="status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <option value="W trakcie pracy" {{ old('status', $work_session->status) == 'W trakcie pracy' ? 'selected' : '' }}>W trakcie pracy</option>
                                <option value="Praca zakończona" {{ old('status', $work_session->status) == 'Praca zakończona' ? 'selected' : '' }}>Praca zakończona</option>
                            </select>
                            @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Rozpoczęcie pracy -->
                        <div class="mt-4">
                            <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rozpoczęcie Pracy</label>
                            <input type="datetime-local" id="start_time" name="start_time" value="{{ old('start_time', $work_session->start_time) }}" class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('start_time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Zakończenie pracy -->
                        <div class="mt-4" id="end_time_container">
                            <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Zakończenie Pracy</label>
                            <input type="datetime-local" id="end_time" name="end_time" value="{{ old('end_time', $work_session->end_time) }}" class="mt-1 block w-full p-2 border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('end_time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Użytkownik</label>
                            <select id="user_id" name="user_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @foreach($users as $user)
                                <option value="{{$user->id}}" {{ old('user_id', $work_session->user->id) == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Przycisk edytowania faktury -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <!-- Green button for saving changes -->
                            <button type="submit" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-check mr-2"></i>Zapisz
                            </button>
                            <a href="{{ route('work.session') }}" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-300 active:bg-red-900 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-trash mr-2"></i>Anuluj
                            </a>
                        </div>
                    </form>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            const statusSelect = $('#status');
                            const endTimeContainer = $('#end_time_container');
                            console.log(statusSelect.val());

                            function toggleEndTime() {
                                if (statusSelect.val() === 'Praca zakończona') {
                                    endTimeContainer.show();
                                } else {
                                    endTimeContainer.hide();
                                }
                            }

                            statusSelect.on('change', toggleEndTime);
                            toggleEndTime(); // Initial state
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>