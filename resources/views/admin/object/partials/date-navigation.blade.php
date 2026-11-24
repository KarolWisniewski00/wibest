<div class="flex items-center justify-center sm:justify-start gap-2 {{ $dateNavigationMargin ?? 'mb-4' }} mx-4">
    <button type="button" id="prev-month-bt" aria-label="Poprzedni miesiąc"
        class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-200">
        <i class="fa-solid fa-chevron-left text-xs" aria-hidden="true"></i>
    </button>
    <div id="current-month-bt" class="min-w-[180px] text-center px-5 py-2 h-9 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold tracking-wide select-none">
        {{ ucfirst($month->copy()->locale('pl')->translatedFormat('F Y')) }}
    </div>
    <button type="button" id="next-month-bt" aria-label="Następny miesiąc"
        class="w-9 h-9 flex items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-200">
        <i class="fa-solid fa-chevron-right text-xs" aria-hidden="true"></i>
    </button>
</div>
