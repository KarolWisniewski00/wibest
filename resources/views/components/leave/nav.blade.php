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
            <div class="ml-2 relative flex size-6 items-center justify-center">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-rose-300 opacity-75"></span>

                <div class="relative inline-flex size-6 rounded-full bg-rose-300 text-gray-900 dark:bg-rose-300 flex items-center justify-center text-[11px] font-semibold">
                    {{ $leavePending }}
                </div>
            </div>
            @endif
        </x-nav-link>
        @endif
    </nav>
</div>
<!--NAV-->