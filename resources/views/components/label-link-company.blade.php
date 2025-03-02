<a {{ $attributes->merge(['class' => 'text-blue-300 dark:text-blue-400 hover:underline']) }}>
    <span class="mr-2 inline-flex p-2 items-center bg-blue-300 dark:bg-blue-300 border border-transparent rounded-full font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
        ORG
    </span>
    {{ $slot }}
</a>