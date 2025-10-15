<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center class="gap-2">
        <x-button-link-green href="" class="text-xs">
            <i class="fa-solid fa-plus mr-2"></i>Dodaj
        </x-button-link-green>
        <div class="hidden lg:flex">
            <x-button-neutral type="button" id="download-xlsx" class="text-xs">
                <i class="fa-solid fa-download mr-2"></i>Pobierz
            </x-button-neutral>
        </div>
    </x-flex-center>
</x-container-header>
<x-label class="px-4 invisible h-0 md:h-auto md:visible" id="selected-count">
    0 zaznaczonych
</x-label>
<!--HEADER-->