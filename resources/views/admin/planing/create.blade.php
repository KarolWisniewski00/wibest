<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                Tworzysz nowe zmienne planingi.
            </div>
        </li>
        <li>
            <livewire:date-start-end-picker />
        </li>
        <li>
            <livewire:time-and-type-picker />
        </li>
        <li>
            <livewire:users-picker />
        </li>
    </x-sidebar-left>
    <!--SIDE BAR-->

    <!--MAIN-->
    <x-main>
        <x-calendar.nav />
        <!--CONTENT-->
        <div class="p-4">
            <!--POWRÓT-->
            <x-button-link-back href="{{ route('calendar.work-schedule.index') }}" class="text-lg mb-4">
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do kalendarza planingu
            </x-button-link-back>
            <h2 class="text-xl font-semibold dark:text-white mb-4 text-center">Nowy zmienny planing</h2>
            <!--POWRÓT-->
            <span>
                @csrf
                @if(isset($user))
                <livewire:work-block-user-wizard :user="$user" :date="$date_str" />
                @else
                <livewire:work-block-users-wizard />
                @endif
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