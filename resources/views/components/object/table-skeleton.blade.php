@props(['label' => 'Lista czasu pracy'])
<section aria-label="Ładowanie danych" :aria-busy="reportLoading" class="my-4 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700">
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600">
        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $label }}</h2>
        <div class="h-10 w-48 animate-pulse rounded-lg bg-gray-200 dark:bg-gray-600" aria-hidden="true"></div>
    </div>
    <div class="relative min-h-[480px]">
        <x-object.loading kind="table" />
    </div>
</section>
