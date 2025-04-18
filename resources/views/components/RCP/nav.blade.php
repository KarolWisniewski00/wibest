<!--NAV-->
<div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <x-nav-link class="h-full text-center"
            href="{{ route('rcp.work-session.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/rcp/work-session')">
            Rejestacja czasu pracy
        </x-nav-link>
        <x-nav-link class="h-full text-center"
            href="{{ route('rcp.event.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/rcp/event')">
            Zdarzenia
        </x-nav-link>
    </nav>
</div>
<!--NAV-->