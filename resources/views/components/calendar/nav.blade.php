<!--NAV-->
<div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <x-nav-link class="h-full text-center"
            href="{{ route('calendar.work-schedule.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/calendar/work-schedule')">
            Planing
        </x-nav-link>
    </nav>
</div>
<!--NAV-->