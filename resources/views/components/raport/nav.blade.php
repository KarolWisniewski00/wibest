<!--NAV-->
<div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <x-nav-link class="h-full text-center"
            href="{{ route('raport.time-sheet.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/raport/time-sheet')">
            Lista obecności
        </x-nav-link>
        <x-nav-link class="h-full text-center"
            href="{{ route('raport.attendance-sheet.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/raport/attendance-sheet')">
            Ewidencja Czasu Pracy
        </x-nav-link>
    </nav>
</div>
<!--NAV-->