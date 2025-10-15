<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        <x-button-link-green href="{{ route('calendar.all.create') }}" class="text-xs">
            <i class="fa-solid fa-plus mr-2"></i>Nowy urlop planowany
        </x-button-link-green>
    </x-flex-center>
</x-container-header>
<!--HEADER-->