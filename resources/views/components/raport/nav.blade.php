<!--NAV-->
<div class="px-4 h-14 overflow-x-auto bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        @can('manage-payroll')
        <x-nav-link class="h-full text-center" href="{{ route('raport.payroll.index') }}" :active="request()->routeIs('raport.payroll.*')">
            Wynagrodzenia
            <span class="ml-2 rounded-full bg-indigo-100 px-2 py-0.5 text-[0.6rem] font-semibold uppercase tracking-widest text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200">beta</span>
        </x-nav-link>
        @endcan
        <x-nav-link class="h-full text-center" href="{{ route('raport.time-smart.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/raport/time-smart')">
            Lista uproszczona
        </x-nav-link>
        <x-nav-link class="h-full text-center" href="{{ route('raport.time-sheet.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/raport/time-sheet')">
            Lista obecności
        </x-nav-link>
        <x-nav-link class="h-full text-center" href="{{ route('raport.attendance-sheet.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/raport/attendance-sheet')">
            Ewidencja Czasu Pracy
        </x-nav-link>
    </nav>
</div>
<!--NAV-->
