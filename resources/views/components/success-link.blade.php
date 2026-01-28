<a {{ $attributes->merge(['class' => 'text-start md:text-center inline-flex py-2 items-center text-green-300 dark:text-green-300 font-semibold uppercase tracking-widest hover:text-green-400 dark:hover:text-green-400 transition ease-in-out duration-150']) }}>
    ✅{{ $slot }}
</a>
