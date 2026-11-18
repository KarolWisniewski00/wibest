<div class="my-4 flex justify-center sm:justify-start" data-month="{{ $month->format('Y-m') }}">
    <nav class="inline-flex items-center gap-1 rounded-xl border border-gray-200 bg-white p-1 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300" aria-label="Miesiąc czasu pracy" x-data>
        @foreach([-1 => 'Poprzedni miesiąc', 1 => 'Następny miesiąc'] as $step => $label)
            @if($step === 1)
                <div class="flex min-w-0 sm:min-w-40 items-center justify-center gap-2 px-2 py-1.5 sm:px-3">
                    <i class="fa-regular fa-calendar text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
                    <span class="whitespace-nowrap text-sm font-semibold">{{ ucfirst($month->copy()->locale('pl')->translatedFormat('F Y')) }}</span>
                </div>
            @endif
            <a aria-label="{{ $label }}" title="{{ $label }}" class="inline-flex h-11 w-11 sm:h-8 sm:w-8 shrink-0 items-center justify-center rounded-lg text-gray-600 transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 dark:text-gray-300 dark:hover:bg-gray-600" href="{{ isset($object) ? route('object.show', ['object' => $object, 'month' => $month->copy()->addMonths($step)->format('Y-m'), 'employee_id' => request('employee_id'), 'work_search' => request('work_search'), 'work_category' => request('work_category')]) : route('object.dashboard', array_merge(request()->only('search', 'status', 'work_category', 'work_search'), ['month' => $month->copy()->addMonths($step)->format('Y-m')])) }}"
                @click="if (!$event.ctrlKey && !$event.metaKey && !$event.shiftKey && !$event.altKey) { $event.preventDefault(); const url = new URL($el.href); const current = new URL(window.location.href); for (const key of ['search', 'status', 'work_category', 'work_search', 'employee_id']) { url.searchParams.delete(key); if (current.searchParams.has(key)) url.searchParams.set(key, current.searchParams.get(key)); } {{ ($asyncPeriod ?? false) ? '$dispatch(\'object-period-request\', { url: url.href, step: '.$step.' });' : 'window.location.assign(url);' }} }">
                <i class="fa-solid {{ $step === -1 ? 'fa-chevron-left' : 'fa-chevron-right' }} text-xs" aria-hidden="true"></i>
            </a>
        @endforeach
    </nav>
</div>
