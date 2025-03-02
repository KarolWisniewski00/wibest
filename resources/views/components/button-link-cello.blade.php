<a {{ $attributes->merge(['class' => 'min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-cello-300 dark:bg-cello-300 border border-transparent rounded-lg font-semibold text-white dark:text-gray-900 uppercase tracking-widest hover:bg-cello-700 dark:hover:bg-cello-400 focus:bg-cello-700 dark:focus:bg-cello-300 active:bg-cello-900 dark:active:bg-cello-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-cello-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
