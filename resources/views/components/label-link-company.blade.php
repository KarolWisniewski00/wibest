<a {{ $attributes->merge(['class' => 'text-blue-300 dark:text-blue-400 hover:underline']) }}>
    <span class="mr-2 px-3 py-1 rounded-full text-sm font-semibold bg-blue-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 whitespace-normal">
        ORG
    </span>
    {{ $slot }}
</a>