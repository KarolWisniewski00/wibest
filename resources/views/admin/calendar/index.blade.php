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
        <!--NAV-->
        <div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <x-nav-link class="h-full text-center"
                    href="{{ route('calendar.all.index') }}"
                    :active="Str::startsWith(request()->path(), 'dashboard/calendar/all')">
                    Wszystko
                </x-nav-link>
                <x-nav-link class="h-full text-center"
                    href="{{ route('calendar.work-schedule.index') }}"
                    :active="Str::startsWith(request()->path(), 'dashboard/calendar/work-schedule')">
                    Grafik pracy
                </x-nav-link>
                <x-nav-link class="h-full text-center"
                    href="{{ route('calendar.leave-application.index') }}"
                    :active="Str::startsWith(request()->path(), 'dashboard/calendar/leave-application')">
                    Wnioski
                </x-nav-link>
            </nav>
        </div>
        <!--NAV-->
        <!--HEADER-->
        <x-raport.header>
            Kalendarz
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