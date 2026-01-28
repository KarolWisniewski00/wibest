@props([
    'maxHeight' => 'max-h-80', // domyślna wysokość
])

<div
    x-data="{ atBottom: false, scrollable: false }"
    x-init="
        scrollable = $el.scrollHeight > $el.clientHeight;
        atBottom = !scrollable || ($el.scrollTop + $el.clientHeight >= $el.scrollHeight - 10);
        const observer = new ResizeObserver(() => {
            scrollable = $el.scrollHeight > $el.clientHeight;
            atBottom = !scrollable || ($el.scrollTop + $el.clientHeight >= $el.scrollHeight - 10);
        });
        observer.observe($el);
    "
    x-on:scroll="
        atBottom = $el.scrollTop + $el.clientHeight >= $el.scrollHeight - 10
    "
    {{ $attributes->merge([
        'class' => "relative overflow-y-auto $maxHeight rounded-lg border-2 border-gray-50 dark:border-gray-700 snap-y snap-mandatory p-4 md:p-0"
    ]) }}
>
    {{ $slot }}

    <!-- 👇 Ikona przewijania — pojawia się tylko, jeśli jest co przewijać -->
    <div
        x-show="scrollable && !atBottom"
        x-transition
        class="sticky bottom-2 left-1/2 flex justify-center text-gray-400 animate-bounce pointer-events-none"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </div>
</div>
