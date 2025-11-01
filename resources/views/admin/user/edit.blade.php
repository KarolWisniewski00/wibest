<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--MAIN-->
    <x-main-no-filter>
        <x-setting.nav />

        <!--CONTENT-->
        <x-container-content-form>
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('setting.user.show', $user) }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do profilu
            </x-button-link-back>
            <!--POWRÓT-->
            <h2 class="text-xl font-semibold dark:text-white mb-4">Edytuj Użytkownika</h2>
            
            <livewire:edit-user-wizard :user-id="$user->id" routeBack="setting.user.show" />
        </x-container-content-form>
        <!--CONTENT-->
    </x-main-no-filter>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>