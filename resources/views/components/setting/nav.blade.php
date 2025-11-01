<!--NAV-->
<div x-data="{ open: false }">
    <div class="flex justify-end md:justify-start px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 rounded-t-lg">
        <nav class="hidden md:flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <x-nav-link class="h-full text-center"
                href="{{ route('setting') }}"
                :active="request()->routeIs('setting')">
                Moja firma
            </x-nav-link>
            @if($role == 'właściciel')
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
            @endif
        </nav>
        <!-- Hamburger -->
        <div class="flex items-center md:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="h-full text-center"
                href="{{ route('setting') }}"
                :active="request()->routeIs('setting')">
                Moja firma
            </x-responsive-nav-link>
            @if($role == 'właściciel')
            <x-responsive-nav-link class="h-full text-center"
                href="{{ route('setting.client') }}"
                :active="Str::startsWith(request()->path(), 'dashboard/setting/client')">
                Klienci
            </x-responsive-nav-link>
            <x-responsive-nav-link class="h-full text-center"
                href="{{ route('setting.user') }}"
                :active="Str::startsWith(request()->path(), 'dashboard/setting/user')">
                Użytkownicy
            </x-responsive-nav-link>
            <x-responsive-nav-link class="h-full text-center"
                href="{{ route('setting.offer') }}"
                :active="Str::startsWith(request()->path(), 'dashboard/setting/offer')">
                Oferty
            </x-responsive-nav-link>
            <x-responsive-nav-link class="h-full text-center"
                href="{{ route('setting.invoice') }}"
                :active="Str::startsWith(request()->path(), 'dashboard/setting/invoice')">
                Faktury
            </x-responsive-nav-link>
            @endif
        </div>
    </div>
</div>
<!--NAV-->