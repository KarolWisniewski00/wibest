<a {{ $attributes->merge(['class' => 'text-start md:text-center inline-flex py-2 items-center text-yellow-300 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-400 dark:hover:text-yellow-400 transition ease-in-out duration-150']) }}>
    ⚠️{{ $slot }}
</a>
