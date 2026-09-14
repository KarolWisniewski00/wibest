<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    @if($role == 'admin' || $role == 'właściciel' || $role == 'menedżer')
    <x-flex-center class="gap-2">
            <x-button-link-yellow href="{{ route('rcp.work-session.create.start') }}" class="text-xs">
                <i class="fa-solid fa-plus"></i>
            </x-button-link-yellow>
            <x-button-link-green href="{{ route('rcp.work-session.create') }}" class="text-xs">
                <i class="fa-solid fa-plus mr-2"></i>Dodaj Pracę RCP
            </x-button-link-green>
        @if(!Str::startsWith(request()->path(), 'dashboard/rcp/location'))
            <div class="hidden md:flex">
                <x-button-neutral type="button" id="download-xlsx" class="text-xs">
                    <i class="fa-solid fa-download mr-2"></i>Pobierz
                </x-button-neutral>
            </div>
        @endif
    </x-flex-center>
    @endif
</x-container-header>
@if(!Str::startsWith(request()->path(), 'dashboard/rcp/location'))
@if($role == 'admin' || $role == 'właściciel')
    <x-label class="px-4 invisible h-0 md:h-auto md:visible" id="selected-count">
        0 zaznaczonych
    </x-label>
@endif
@endif
@if($role == 'admin' || $role == 'właściciel')
@else
<!--
    <div class="px-4 pb-4 md:pb-0 md:hidden">
        <x-button-blue data-collapse-toggle-sidebar="sidebar-multi-level-sidebar" class="text-xs w-full md:w-fit justify-center">
            <i class="fa-solid fa-sliders mr-2"></i>Pokaż filtry
        </x-button-blue>
    </div>
-->
@endif
<!--HEADER-->