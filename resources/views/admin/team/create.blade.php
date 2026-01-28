<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                Tworzysz nowego użytkownika.
            </div>
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-team.nav :role="$role" :invitations="$invitations" />
        <!--CONTENT-->
        <div class="p-4">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('team.user.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do zespołu
            </x-button-link-back>
            <h2 class="text-xl font-semibold dark:text-white mb-4 text-center">Nowy użytkownik</h2>
            <!--POWRÓT-->
            <span>
                @csrf
                <livewire:user-wizard />
                <!-- Dane ogólne -->

            </span>

        </div>
        <!--CONTENT-->
    </x-main>
    <!--MAIN-->
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>