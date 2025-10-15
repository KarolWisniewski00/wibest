<!--HEADER-->
<x-container-header class="grid gap-4 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center class="gap-2">
        @if($role == 'admin' || $role == 'właściciel')
        <x-button-link-green href="{{ route('team.user.create') }}" class="text-xs">
            <i class="fa-solid fa-plus mr-2"></i>Dodaj Użytkownika
        </x-button-link-green>
        @endif
        <div class="hidden md:flex">
            <x-button-link-neutral class="text-xs" id="download-xlsx">
                <i class="fa-solid fa-download mr-2"></i>Pobierz
            </x-button-link-neutral>
        </div>
    </x-flex-center>
</x-container-header>
<x-label class="px-4 invisible h-0 md:h-auto md:visible" id="selected-count">
    0 zaznaczonych
</x-label>
<!--HEADER-->