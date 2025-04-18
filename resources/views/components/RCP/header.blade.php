<!--HEADER-->
<x-container-header>
    <x-h1-display class="mx-2 lg:mx-0">
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        @if($role == 'admin')
        <x-button-link-green href="{{ route('rcp.work-session.create') }}" class="text-xs mx-2">
            <i class="fa-solid fa-plus mr-2"></i>Dodaj RCP
        </x-button-link-green>
        @endif
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