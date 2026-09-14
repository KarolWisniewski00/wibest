<!--NAV-->
<div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        @if($role == 'admin' || $role == 'właściciel')
        <x-nav-link class="h-full text-center"
            href="{{ route('calendar.work-smart.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/calendar/work-smart')">
            Grafik uproszczony
        </x-nav-link>
        <x-nav-link class="h-full text-center"
            href="{{ route('calendar.work-schedule.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/calendar/work-schedule')">
            Grafik
        </x-nav-link>
        @else
        <x-nav-link class="h-full text-center"
            href="{{ route('calendar.work-schedule.calendar.user') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/calendar/work-schedule')">
            Grafik
        </x-nav-link>
        @endif
    </nav>
</div>
<!--NAV-->