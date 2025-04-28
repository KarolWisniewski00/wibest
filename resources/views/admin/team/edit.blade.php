<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Edycja użytkownika.
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-team.nav :role="$role" :invitations="$invitations" />

        <!--CONTENT-->
        <div class="px-4 py-5 sm:px-6 lg:px-8">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('team.user.show', $user) }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->
            <h2 class="text-xl font-semibold dark:text-white mb-3">Edytuj RCP</h2>
            <!--POWRÓT-->
            <form action="{{ route('team.user.update', $user) }}" method="POST">
                @method('PUT')
                @csrf
                <!-- Dane ogólne -->
                <x-container-gray class="px-0">
                    <div class="space-y-6 px-6 py-4">
                        <!-- Rola -->
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rola</label>
                            <select id="role" name="role" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="użytkownik" {{ $user->role === 'użytkownik' ? 'selected' : '' }}>Użytkownik</option>
                                <option value="kierownik" {{ $user->role === 'kierownik' ? 'selected' : '' }}>Kierownik</option>
                                <option value="menedżer" {{ $user->role === 'menedżer' ? 'selected' : '' }}>Menedżer</option>
                            </select>
                        </div>

                        <!-- Stanowisko -->
                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stanowisko</label>
                            <input type="text" id="position" name="position" value="{{ old('position', $user->position) }}" class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                        </div>
                    </div>
                </x-container-gray>

                <!-- Przycisk -->
                <div class="pt-4">
                    <x-button-green type="submit" class="mx-2">
                        <i class="fa-solid fa-save mr-2"></i>Zapisz
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