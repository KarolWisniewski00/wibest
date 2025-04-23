<!--HEADER-->
<x-container-header>
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        @if($role == 'admin')
        <x-button-link-neutral class="text-xs mx-2">
            <i class="fa-solid fa-download mr-2"></i>Pobierz
        </x-button-link-neutral>
        @endif
    </x-flex-center>
</x-container-header>
@if($role == 'admin')
<x-label class="px-4" id="selected-count">
    0 zaznaczonych
</x-label>
@endif
<!--HEADER-->