<x-app-layout class="flex">
    @php($withoutCompany = $withoutCompany ?? false)
    @include('admin.elements.alerts')
    @if ($company)
        <!--MAIN-->
        <x-main-no-filter>
            <x-setting.nav />

            <!--CONTENT-->
            <x-container-content-form>
                <!--POWRÓT-->
                <x-button-link-back href="{{ route('setting.user.show', $user) }}" class="text-lg mb-4">
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                </x-button-link-back>
                <!--POWRÓT-->
                <h2 class="text-xl font-semibold dark:text-white mb-4">🚀 {{ $withoutCompany ? 'Edytuj Użytkownika' : 'Edytuj Użytkownika dla CRM' }}</h2>

                <div>
                    <form method="POST" action="{{ route($withoutCompany ? 'setting.user.update' : 'setting.user.update.for.crm', $user) }}">
                        @csrf
                        @method('PUT')
                        <x-user-identity-fields :edit-user="$user" :optional-phone="true" />
                        <div class="mt-2">
                            <label for="position"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                <span>💼</span> Stanowisko <span class="text-xs text-gray-400">(opcjonalne)</span>
                            </label>
                            <input id="position" type="text" name="position" value="{{ old('position', $user->position) }}" maxlength="255" aria-describedby="position-help"
                                class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                            <p id="position-help" class="mt-1 text-sm text-gray-500 dark:text-gray-400">Pole opcjonalne, np. Specjalista ds. sprzedaży. Maksymalnie 255 znaków.</p>
                            @error('position') <p role="alert" class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        <!--ZAPISZ-->
                        <div class="flex justify-end mt-4">
                            <x-button-green type="submit" class="text-lg">
                                <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                            </x-button-green>
                        </div>
                        <!--ZAPISZ-->
                    </form>
                </div>

            </x-container-content-form>
            <!--CONTENT-->
        </x-main-no-filter>
        <!--MAIN-->
    @else
        @include('admin.elements.end_config')
    @endif
</x-app-layout>
