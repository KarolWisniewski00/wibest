<!--HEADER-->
<x-container-header>
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        <x-button-link-green href="" class="text-xs mx-2">
            <i class="fa-solid fa-plus mr-2"></i>Dodaj
        </x-button-link-green>
        <x-button-neutral type="button" id="download-xlsx" class="text-xs mx-2 hidden lg:flex">
            <i class="fa-solid fa-download mr-2"></i>Pobierz
        </x-button-neutral>
    </x-flex-center>
</x-container-header>
<x-label class="px-4 hidden lg:flex">
    <span id="selected-count">
        0 zaznaczonych
    </span>
</x-label>
<!--HEADER-->