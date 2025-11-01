<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center class="gap-2">
        <x-button-link-green href="{{route('setting.client.create')}}" class="text-xs">
            <i class="fa-solid fa-plus mr-2"></i>Dodaj Klienta
        </x-button-link-green>
    </x-flex-center>
</x-container-header>
<x-label class="px-4 invisible h-0 md:h-auto md:visible md:pb-4" id="selected-count">
    0 zaznaczonych
</x-label>
<!--HEADER-->