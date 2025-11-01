<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
</x-container-header>
<x-label class="px-4 invisible h-0 md:h-auto md:visible md:pb-4" id="selected-count">
    0 zaznaczonych
</x-label>
<!--HEADER-->