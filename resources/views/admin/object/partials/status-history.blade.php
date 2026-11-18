<section data-object-status-history class="my-6 rounded-2xl bg-white p-5 text-start shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
    <h2 class="font-semibold text-gray-900 dark:text-white">Historia statusów</h2>
    <p class="mt-2 text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Status obowiązuje od wskazanej chwili do kolejnej zmiany. Praca musi w całości mieścić się w okresie aktywności.</p>
    <ul class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-200">
        @foreach($history as $period)
            <li>{{ \App\Models\WorkObject::STATUSES[$period->status] ?? $period->status }}: {{ $period->starts_at->format('d.m.Y H:i:s') }} — {{ $period->ends_at?->format('d.m.Y H:i:s') ?? 'obecnie' }}
                @if($period->initial_snapshot)<p class="text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Stan początkowy przy wdrożeniu historii.</p>@endif
            </li>
        @endforeach
    </ul>
    <div class="mt-4">{{ $history->links() }}</div>
</section>
