<x-app-layout class="flex">
    <x-sidebar-left>
        <x-search-filter placeholder="Wyszukaj pracownika" aria-label="Wyszukaj pracownika" />
        <x-filter-date-user loader="payroll">{{ route('raport.payroll.index') }}</x-filter-date-user>
        <input type="hidden" id="start_date" value="{{ $startDate }}">
        <input type="hidden" id="end_date" value="{{ $endDate }}">
    </x-sidebar-left>
    <x-main>
        <x-raport.nav />
        <div class="pb-4 px-4 text-gray-900 dark:text-gray-100">
            <div class="my-4 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">&#128188;</div>
                    <div class="text-start">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Wynagrodzenia</h1>
                        <p class="text-sm text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Rozliczenia miesięczne pracowników z wybranego zakresu dat.</p>
                    </div>
                </div>
            </div>
            @include('admin.object.partials.date-navigation', ['month' => $month, 'dateNavigationMargin' => 'my-4'])
            <div id="payroll-results" aria-live="polite">@include('admin.payroll.partials.results')</div>
        </div>
    </x-main>
</x-app-layout>
