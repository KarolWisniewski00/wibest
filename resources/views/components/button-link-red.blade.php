<a {{ $attributes->merge(['class' => 'min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-300 active:bg-red-900 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
