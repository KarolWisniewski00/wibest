<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        <div class="hidden md:flex">
            <x-button-neutral type="button" class="text-xs" id="download-xlsx">
                <i class="fa-solid fa-download mr-2"></i>Pobierz
            </x-button-neutral>
        </div>
    </x-flex-center>
</x-container-header>
<x-label class="px-4 invisible h-0 md:h-auto md:visible" id="selected-count">
    0 zaznaczonych
</x-label>
<!--HEADER-->