<!--HEADER-->
<x-container-header>
    <x-h1-display class="mx-2 lg:mx-0">
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        <x-button-link-green href="{{ route('leave.single.create') }}" class="text-xs mx-2">
            <i class="fa-solid fa-plus mr-2"></i>Złóż wniosek
        </x-button-link-green>
    </x-flex-center>
</x-container-header>
<!--HEADER-->