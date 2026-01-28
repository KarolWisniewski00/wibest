<x-flex-center class="px-4 pb-4 flex flex-col">
    <div {{ $attributes->merge(['class' => 'relative md:shadow sm:rounded-lg w-full']) }}>
        {{ $slot }}
    </div>
</x-flex-center>