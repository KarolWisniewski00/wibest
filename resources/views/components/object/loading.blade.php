@props(['kind' => 'list', 'pending' => 'reportLoading'])
<div x-show="{{ $pending }}" x-cloak role="status" aria-live="polite"
    @class(['absolute inset-x-0 bottom-0 z-10 overflow-hidden bg-white dark:bg-gray-700', 'top-0 md:top-[49px]' => $kind === 'table', 'top-0' => $kind !== 'table'])>
    <span class="sr-only">Ładowanie danych…</span>
    <div class="h-full animate-pulse motion-reduce:animate-none" aria-hidden="true">
        @if($kind === 'map')
            <div class="relative h-full bg-gray-100 dark:bg-gray-700">
                <div class="absolute inset-x-0 top-1/3 h-8 -rotate-12 bg-gray-200 dark:bg-gray-600"></div>
                <div class="absolute inset-y-0 left-1/3 w-6 rotate-12 bg-gray-200 dark:bg-gray-600"></div>
                <div class="absolute left-1/2 top-1/2 h-20 w-20 -translate-x-1/2 -translate-y-1/2 rounded-full border-8 border-gray-200 dark:border-gray-600"></div>
            </div>
        @else
            @if(in_array($kind, ['table', 'list']))
                <div class="space-y-3 p-3 md:hidden">
                    @for($i = 0; $i < 6; $i++)
                        <div @class(['space-y-4 border-gray-200 p-4 dark:border-gray-700', 'rounded-lg border-2 bg-white dark:bg-gray-700' => $kind === 'table', 'rounded-xl border' => $kind === 'list'])>
                            @if($kind === 'table')
                                <div class="flex justify-between gap-4"><div class="h-4 w-28 rounded-full bg-gray-200 dark:bg-gray-600"></div><div class="h-3 w-20 rounded bg-gray-200 dark:bg-gray-600"></div></div>
                                <div class="flex items-center gap-3"><div class="h-10 w-10 rounded bg-gray-200 dark:bg-gray-600"></div><div class="flex-1 space-y-3"><div class="h-3 w-2/3 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 w-1/3 rounded bg-gray-200 dark:bg-gray-600"></div></div></div>
                            @endif
                            <div class="flex items-center gap-3"><div class="h-10 w-10 shrink-0 rounded-full bg-gray-200 dark:bg-gray-600"></div><div class="flex-1 space-y-3"><div class="h-3 w-3/4 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 w-1/2 rounded bg-gray-200 dark:bg-gray-600"></div></div></div>
                            <div class="flex gap-4"><div @class(['w-16 rounded bg-gray-200 dark:bg-gray-600', 'h-8' => $kind === 'table', 'h-3' => $kind !== 'table'])></div><div @class(['w-16 rounded bg-gray-200 dark:bg-gray-600', 'h-8' => $kind === 'table', 'h-3' => $kind !== 'table'])></div></div>
                        </div>
                    @endfor
                </div>
            @endif
            <div @class(['hidden md:block' => in_array($kind, ['table', 'list'])])>
            @for($i = 0; $i < 8; $i++)
                <div @class(['flex items-center gap-4 border-gray-200 px-5 py-4 dark:border-gray-600', 'mx-3 my-3 flex-wrap rounded-xl border md:mx-0 md:my-0 md:flex-nowrap md:rounded-none md:border-0 md:border-b' => in_array($kind, ['table', 'list']), 'border-b' => $kind === 'workers'])>
                    <div class="h-10 w-10 shrink-0 rounded-full bg-gray-200 dark:bg-gray-600"></div>
                    <div class="min-w-0 flex-1 space-y-3">
                        <div class="h-3 w-2/3 rounded bg-gray-200 dark:bg-gray-600"></div>
                        <div class="h-2 w-1/3 rounded bg-gray-100 dark:bg-gray-600"></div>
                    </div>
                    @if($kind === 'table')
                        @for($column = 0; $column < 5; $column++)
                            <div class="hidden flex-1 space-y-3 md:block"><div class="h-3 w-2/3 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-2 w-1/2 rounded bg-gray-100 dark:bg-gray-600"></div></div>
                        @endfor
                    @endif
                    <div class="h-3 w-10 shrink-0 rounded bg-gray-200 dark:bg-gray-600"></div>
                    @if(in_array($kind, ['table', 'list']))
                        <div class="flex w-full gap-4 md:hidden"><div class="h-3 flex-1 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 flex-1 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 flex-1 rounded bg-gray-200 dark:bg-gray-600"></div></div>
                    @endif
                    @if($kind !== 'workers')<div class="h-8 w-8 shrink-0 rounded-lg bg-gray-100 dark:bg-gray-600"></div>@endif
                </div>
            @endfor
            </div>
        @endif
    </div>
</div>
