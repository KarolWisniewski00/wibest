<!--HEADER-->
<x-container-header>
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        <x-button-link-neutral class="text-xs mx-2" id="download-xlsx" >
            <i class="fa-solid fa-download mr-2"></i>Pobierz
        </x-button-link-neutral>
    </x-flex-center>
</x-container-header>
<x-label class="px-4" id="selected-count">
    0 zaznaczonych
</x-label>
<!--HEADER-->