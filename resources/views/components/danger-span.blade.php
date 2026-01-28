<span {{ $attributes->merge(['class' => 'text-start md:text-center inline-flex py-2 items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest transition ease-in-out duration-150']) }}>
    ❌{{ $slot }}
</span>
