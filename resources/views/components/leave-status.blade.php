<x-paragraf-display class="text-xs">
    @if($slot == 'oczekujące')
    <x-status-yellow {{ $attributes }}>
        {{ $slot }}
    </x-status-yellow>
    @elseif($slot == 'zaakceptowane')
    <x-status-green {{ $attributes }}>
        {{ $slot }}
    </x-status-green>
    @elseif($slot == 'zrealizowane')
    <x-status-green {{ $attributes }}>
        {{ $slot }}
    </x-status-green>
    @elseif($slot == 'odrzucone')
    <x-status-red {{ $attributes }}>
        {{ $slot }}
    </x-status-red>
    @elseif($slot == 'anulowane')
    <x-status-red {{ $attributes }}>
        {{ $slot }}
    </x-status-red>
    @elseif($slot == 'zablokowane')
    <x-status-red {{ $attributes }}>
        {{ $slot }}
    </x-status-red>
    @elseif($slot == 'odblokowane')
    <x-status-yellow {{ $attributes }}>
        {{ $slot }}
    </x-status-yellow>
    @endif
</x-paragraf-display>