<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Tworzysz wniosek do akceptacji przez przełożonego.
            </div>
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">Ostrzeżenie!</span> Domyślnie przełożony jest nie ustawiony. Należy wybrać użytkownika z listy rozwijanej.
            </div>
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">Ostrzeżenie!</span> Data rozpoczęcia musi być wcześniejsza niż data zakończenia.
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-leave.nav :role="$role" :leavePending="$leavePending" />
        <!--CONTENT-->
        <div class="px-4 py-5 sm:px-6 lg:px-8">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('leave.single.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <h2 class="text-xl font-semibold dark:text-white mb-3">Złóż nowy wniosek</h2>
            <!--POWRÓT-->
            <form action="{{ route('leave.single.store') }}" method="POST">
                @csrf
                <!-- Dane ogólne -->
                <x-container-gray class="px-0">
                    <div class="space-y-6 px-6 py-4">
                        <!-- Pracownik -->
                        <div>
                            <label for="manager_id" class="block text-sm font-medium dark:text-white">Przełożony</label>
                            <select name="manager_id" id="manager_id" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <!-- Opcje użytkowników -->
                                <option> </option>
                                @foreach ($users as $user)
                                @if ($user->role == 'admin')
                                <option value="{{ $user->id }}">{{ $user->name }}(Admin)</option>
                                @elseif ($user->role == 'menedżer')
                                <option value="{{ $user->id }}">{{ $user->name }}(Menedżer)</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $userId }}">
                    <input type="hidden" name="company_id" value="{{ $companyId }}">
                    <div class="space-y-6 px-6 py-4">
                        <div>
                            <label for="type" class="block text-sm font-medium dark:text-white">Typ wniosku</label>
                            <select name="type" id="type" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <!-- Opcje użytkowników -->
                                <option value="urlop wypoczynkowy">Urlop wypoczynkowy</option>
                                <option value="urlop za wolne w święto">Urlop za wolne w święto</option>
                                <option value="praca zdalna">Praca zdalna</option>
                            </select>
                        </div>
                    </div>
                </x-container-gray>

                <!-- Start i Stop -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <!-- START -->
                    <x-container-gray class="px-0">
                        <x-text-cell class="mx-4">
                            <p class="text-gray-700 dark:text-gray-300 text-sm">Start</p>
                            <div class="flex justify-start items-center w-full">
                                <input
                                    type="datetime-local"
                                    name="start_time"
                                    id="start"
                                    class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold"
                                    required>
                            </div>
                        </x-text-cell>
                    </x-container-gray>

                    <!-- STOP -->
                    <x-container-gray class="px-0">
                        <x-text-cell class="mx-4">
                            <p class="text-gray-700 dark:text-gray-300 text-sm">Stop</p>
                            <div class="flex justify-start items-center w-full">
                                <input
                                    type="datetime-local"
                                    name="end_time"
                                    id="end"
                                    class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold"
                                    required>
                            </div>
                        </x-text-cell>
                    </x-container-gray>
                </div>

                <!-- Przycisk -->
                <div class="pt-4">
                    <x-button-green type="submit" class="mx-2">
                        <i class="fa-solid fa-save mr-2"></i>Złóż wniosek
                    </x-button-green>
                </div>
            </form>

        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>