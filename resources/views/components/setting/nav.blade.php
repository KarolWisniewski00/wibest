<!--NAV-->
<div class="px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <x-nav-link class="h-full text-center"
            href="{{ route('setting') }}"
            :active="request()->routeIs('setting')">
            Moja firma
        </x-nav-link>
        <x-nav-link class="h-full text-center"
            href="{{ route('setting.client') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/setting/client')">
            Klienci
        </x-nav-link>
        <x-nav-link class="h-full text-center"
            href="{{ route('setting.user') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/setting/user')">
            Użytkownicy
        </x-nav-link>
        <x-nav-link class="h-full text-center"
            href="{{ route('setting.offer') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/setting/offer')">
            Oferty
        </x-nav-link>
        <x-nav-link class="h-full text-center"
            href="{{ route('setting.invoice') }}"
            :active="Str::startsWith(request()->path(), 'dashboard/setting/invoice')">
            Faktury
        </x-nav-link>
    </nav>
</div>
<!--NAV-->