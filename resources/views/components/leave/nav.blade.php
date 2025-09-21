<!--NAV-->
<div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <x-nav-link class="h-full text-center"
            href="{{ route('leave.single.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/leave/single')">
            Moje Wnioski
        </x-nav-link>
        @if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel')
        <x-nav-link class="h-full text-center"
            href="{{ route('leave.pending.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/leave/pending-review')">
            Do rozpatrzenia
            @if($leavePending > 0)
            <span class="ml-2 text-white bg-red-500 dark:bg-red-700 rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mx-auto">
                {{ $leavePending }}
            </span>
            @endif
        </x-nav-link>
        @endif
    </nav>
</div>
<!--NAV-->