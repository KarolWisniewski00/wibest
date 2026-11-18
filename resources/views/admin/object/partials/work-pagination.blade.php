<nav class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between" aria-label="Strony czasu pracy">
    <p data-object-list-summary class="text-xs text-gray-600 dark:text-gray-300" aria-live="polite">Wyświetlono {{ $paginator->firstItem() ?? 0 }}–{{ $paginator->lastItem() ?? 0 }} z {{ $paginator->total() }} sesji</p>
    @if($paginator->hasPages())
        @php
            $linkClass = 'inline-flex min-h-11 min-w-11 sm:min-h-9 sm:min-w-9 items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs text-gray-700 transition hover:bg-gray-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600';
            $disabledClass = 'inline-flex min-h-11 min-w-11 sm:min-h-9 sm:min-w-9 items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs text-gray-400 opacity-50 cursor-not-allowed dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400';
        @endphp
        <div class="flex items-center justify-between gap-1 sm:justify-end">
            @if($paginator->onFirstPage())<span aria-disabled="true" class="{{ $disabledClass }}">Poprzednia</span>
            @else<a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="{{ $linkClass }}">Poprzednia</a>@endif
            <div class="hidden items-center gap-1 sm:flex">
                @foreach($elements as $element)
                    @if(is_string($element))<span aria-disabled="true" class="px-2 text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">{{ $element }}</span>@endif
                    @if(is_array($element))
                        @foreach($element as $page => $url)
                            @if($page === $paginator->currentPage())<span aria-current="page" class="inline-flex min-h-11 min-w-11 sm:min-h-9 sm:min-w-9 items-center justify-center rounded-lg bg-green-100 px-3 py-2 text-xs font-semibold text-green-800 dark:bg-green-300/10 dark:text-green-300">{{ $page }}</span>
                            @else<a href="{{ $url }}" aria-label="Strona {{ $page }}" class="{{ $linkClass }}">{{ $page }}</a>@endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            <span class="text-xs text-gray-600 dark:text-gray-300 sm:hidden">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>
            @if($paginator->hasMorePages())<a href="{{ $paginator->nextPageUrl() }}" rel="next" class="{{ $linkClass }}">Następna</a>
            @else<span aria-disabled="true" class="{{ $disabledClass }}">Następna</span>@endif
        </div>
    @endif
</nav>
