<x-app-layout class="flex">
    @include('admin.elements.alerts')
    @if ($company)
    <!--SIDE BAR-->
    <x-sidebar-left>
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <span class="font-medium">Ostrzeżenie!</span> Zakładka nie jest jeszcze dostępna.
        </div>
    </x-sidebar-left>
    <!--SIDE BAR-->
    <x-main>
        <x-raport.nav />
        <!--HEADER-->
        <x-raport.header>
            Ewidencja czasu pracy
        </x-raport.header>
        <!--HEADER-->
        <x-status-cello id="show-filter" class="mx-2 mt-8 ">
            W trakcie przygotowania
        </x-status-cello>
    </x-main>
    @else
    @include('admin.elements.end_config')
    @endif
</x-app-layout>