<!--NAV-->
<div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <x-nav-link class="h-full text-center"
            href="{{ route('team.user.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/team/user')">
            Zespół
        </x-nav-link>
        @if($role == 'admin')
        <x-nav-link class="h-full text-center"
            href="{{ route('team.invitation.index') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/team/invitation')">
            Zaproszenia
            @if($invitations->count() > 0)
            <span class="ml-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                {{ $invitations->count() }}
            </span>
            @endif
        </x-nav-link>
        @endif
    </nav>
</div>
<!--NAV-->