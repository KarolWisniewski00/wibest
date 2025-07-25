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
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do profilu
            </x-button-link-back>
            <!--POWRÓT-->
            <h2 class="text-xl font-semibold dark:text-white mb-3">Edytuj Użytkownika</h2>
            <livewire:edit-user-wizard :user-id="$user->id" />
        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>