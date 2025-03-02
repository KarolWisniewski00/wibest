<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-6 lg:px-8 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <nav class="flex gap-x-8 h-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <x-nav-link href="{{ route('client') }}" :active="Str::startsWith(request()->path(), 'dashboard/client')">
                    {{ __('Klienci') }}
                </x-nav-link>
                <x-nav-link href="{{ route('project') }}" :active="Str::startsWith(request()->path(), 'dashboard/project')">
                    {{ __('Projekty') }}
                </x-nav-link>
                <x-nav-link href="{{ route('offer') }}" :active="Str::startsWith(request()->path(), 'dashboard/offer')">
                    {{ __('Oferty') }}
                </x-nav-link>
                <x-nav-link href="{{ route('contract') }}" :active="Str::startsWith(request()->path(), 'dashboard/contract')">
                    {{ __('Umowy') }}
                </x-nav-link>
                <x-nav-link href="{{ route('order') }}" :active="Str::startsWith(request()->path(), 'dashboard/order')">
                    {{ __('Zamówienia') }}
                </x-nav-link>
                <x-nav-link href="{{ route('raport') }}" :active="Str::startsWith(request()->path(), 'dashboard/raport')">
                    {{ __('Raporty') }}
                </x-nav-link>
                <x-nav-link href="{{ route('invoice') }}" :active="Str::startsWith(request()->path(), 'dashboard/invoice')">
                    {{ __('Faktury') }}
                </x-nav-link>
                <x-nav-link href="{{ route('cost') }}" :active="Str::startsWith(request()->path(), 'dashboard/cost')">
                    {{ __('Wydatki') }}
                </x-nav-link>
                <x-nav-link href="{{ route('set') }}" :active="Str::startsWith(request()->path(), 'dashboard/magazine')">
                    {{ __('Magazyn') }}
                </x-nav-link>
            </nav>
        </div>
    </div>
</div>