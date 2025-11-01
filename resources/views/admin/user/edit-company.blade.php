<x-app-layout class="flex">
    @include('admin.elements.alerts')
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>

            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.user', $user) }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
            </x-button-link-back>
            <!--POWRÓT-->

            <x-header-form>
                <span>📋</span> Edytuj firmę użytkownika
            </x-header-form>

            <!--FORMULARZ-->
            <form method="POST" action="{{route('setting.user.update-company', $user)}}">
                @csrf
                @method('PUT')
                <!--NAZWA FIRMY-->
                <div class="mt-2">
                    <label for="company" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🏢</span> Nazwa firmy
                    </label>
                    <x-select id="company" placeholder="Wybierz firmę"
                        class="mt-2 rounded-lg text-lg"
                        :options="$companies"
                        option-label="name"
                        :value="old('company', $user->company_id)"
                        name="company"
                        option-value="id" />
                    @error('company')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <!--NAZWA FIRMY-->

                <!-- RESETY -->
                <div class="mt-2 flex flex-col">
                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300">🧹 Opcje resetowania danych</h3>

                    <!-- Resetuj urlopy planowane -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_planned_holidays" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj urlopy planowane
                        </span>
                    </label>

                    <!-- Resetuj wnioski -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_requests" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj wnioski
                        </span>
                    </label>

                    <!-- Resetuj RCP -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_rcp" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj RCP
                        </span>
                    </label>

                    <!-- Resetuj planing -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="reset_planning" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Resetuj planing
                        </span>
                    </label>
                </div>
                <!-- RESETY -->

                <!--ZAPISZ-->
                <div class="flex justify-end mt-4">
                    <x-button-green type="submit" class="text-lg">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                    </x-button-green>
                </div>
                <!--ZAPISZ-->
            </form>
            <!--Formularz-->
        </x-container-content-form>
        <!--CONTENT-->

    </x-main-no-filter>
    <!--MAIN-->
</x-app-layout>