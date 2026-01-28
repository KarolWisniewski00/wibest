<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display >
        {{ $slot }}
    </x-h1-display>
    <x-flex-center>
        <x-button-link-green href="{{ route('leave.pending.create') }}" class="flex-wrap text-xs">
            <i class="fa-solid fa-plus mr-2"></i>
            <span>Złóż wniosek w im. </span><span>użytkownika</span>
        </x-button-link-green>
    </x-flex-center>
</x-container-header>
<!--HEADER-->