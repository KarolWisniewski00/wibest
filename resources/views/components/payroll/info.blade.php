@props(['title'])
<aside class="relative overflow-hidden rounded-xl bg-blue-50 p-4 text-blue-700 dark:bg-blue-900/20 dark:text-blue-300" role="note">
    <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid fa-circle-info"></i></div>
    <div class="relative flex items-start gap-3">
        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-900/20" aria-hidden="true"><i class="fa-solid fa-circle-info text-lg sm:text-2xl"></i></div>
        <div class="min-w-0"><div class="text-xs uppercase tracking-wider opacity-70">Informacja</div><p class="mt-1 font-semibold">{{ $title }}</p><div class="mt-2 text-sm leading-relaxed">{{ $slot }}</div></div>
    </div>
</aside>
