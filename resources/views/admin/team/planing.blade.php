<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Edycja planingu użytkownika.
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
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do profilu
            </x-button-link-back>
            <!--POWRÓT-->
            <h2 class="text-xl font-semibold dark:text-white mb-3">Edytuj planing Użytkownika</h2>
            <form method="POST" action="{{route('team.user.update_planing', $user)}}" class="space-y-4">
                @csrf
                @method('PUT')
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 text-sm">Liczba godzin</p>
                    <div class="flex justify-start items-center w-full">
                        <input
                            type="number"
                            name="working_hours_custom"
                            id="working_hours_custom"
                            value="{{ $user->working_hours_custom }}"
                            class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                    </div>
                </x-text-cell>
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 text-sm">Start pracy (hh:mm:ss)</p>
                    <div class="flex justify-start items-center w-full">
                        <input
                            type="datetime-local"
                            name="working_hours_from"
                            id="working_hours_from"
                            value="{{ $user->working_hours_from }}"
                            class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                    </div>
                </x-text-cell>
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 text-sm">Koniec pracy (hh:mm:ss)</p>
                    <div class="flex justify-start items-center w-full">
                        <input
                            type="datetime-local" 
                            name="working_hours_to"
                            id="working_hours_to"
                            value="{{ $user->working_hours_to }}"
                            class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                    </div>
                </x-text-cell>
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 text-sm">Dni tygodnia od</p>
                    <div class="flex justify-start items-center w-full">
                        <input
                            type="text"
                            name="working_hours_start_day"
                            id="working_hours_start_day"
                            value="{{ $user->working_hours_start_day }}"
                            class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                    </div>
                </x-text-cell>
                <x-text-cell class="mx-4">
                    <p class="text-gray-700 dark:text-gray-300 text-sm">Dni tygodnia do</p>
                    <div class="flex justify-start items-center w-full">
                        <input
                            type="text"
                            name="working_hours_stop_day"
                            id="working_hours_stop_day"
                            value="{{ $user->working_hours_stop_day }}"
                            class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold">
                    </div>
                </x-text-cell>
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