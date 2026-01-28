<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        @if($role == 'admin' || $role == 'właściciel' || $role == 'menedżer')
        <x-button-link-green href="{{ route('calendar.work-schedule.create') }}" class="text-xs">
            <i class="fa-solid fa-plus mr-2"></i>Dodaj grafik pracy
        </x-button-link-green>
        @endif
    </x-flex-center>
</x-container-header>
<!--HEADER-->