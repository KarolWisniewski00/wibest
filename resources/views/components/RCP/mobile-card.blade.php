@props(['url'])
<li>
    <div x-data="{ url: {{ \Illuminate\Support\Js::from($url) }} }" tabindex="0"
        @click="if (!$event.target.closest('a, button, input, select, textarea, label, [role=button]')) window.location.assign(url)"
        @keydown.enter.self.prevent="window.location.assign(url)"
        class="group cursor-pointer text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 transition-colors duration-200 h-full block w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">
        <div class="flex min-w-0 w-full flex-col items-start gap-3 text-xs leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</li>
