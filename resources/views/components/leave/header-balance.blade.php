<!--HEADER-->
<x-container-header class="grid gap-2 md:flex md:gap-0 md:justify-between">
    <x-h1-display>
        {{ $slot }}
    </x-h1-display>
    <x-flex-center class="!flex-col md:!flex-row gap-2">
        <div class="flex items-center gap-2 w-full md:w-48">
            <x-my-number name="year" min="1900" max="2100" id="year_select" value="{{ now()->year }}" />
            <x-status-gray>ROK</x-status-gray>
        </div>
        <x-button-link-green onclick="
            let year = document.getElementById('year_select').value;
            window.location.href = '{{ route('leave.balance.store') }}?year=' + year;
            "
            href="{{ route('leave.balance.store') }}" class="text-xs">
            <i class="fa-solid fa-plus mr-2"></i>Dodaj rok dla zespołu
        </x-button-link-green>
    </x-flex-center>
</x-container-header>
<!--HEADER-->