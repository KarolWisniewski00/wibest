<a {{ $attributes->merge(['class' => 'text-orange-300 dark:text-orange-400 hover:underline']) }}>
    <span class="mr-2 inline-flex p-2 items-center bg-orange-300 dark:bg-orange-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-orange-700 dark:hover:bg-orange-300 focus:bg-orange-700 dark:focus:bg-orange-300 active:bg-orange-900 dark:active:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 dark:focus:ring-offset-orange-800 transition ease-in-out duration-150">
        PROJ
    </span>
    {{ $slot }}
</a>