<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                Tworzysz wniosek w imieniu użytkownika który będzie odrazu zaakceptowany
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
            <x-button-link-back href="{{ route('leave.pending.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do wniosków
            </x-button-link-back>
            <h2 class="text-xl font-semibold dark:text-white mb-4 text-center">Złóż nowy wniosek w imieniu użytkownika</h2>
            <!--POWRÓT-->
            <span>
                @csrf
                <livewire:leave-wizard-user />
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