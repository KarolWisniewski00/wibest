<div class="flex flex-wrap items-center gap-2 text-start text-xs">
    <x-status-gray>
        {{ $user->name }}
    </x-status-gray>
    <div class="flex items-center gap-2 text-start">
        <x-user-role :user="$user" />
        @php
        $status = $user->getToday();
        @endphp
        @if($status['work'] == true)
        @if($status['status'] == 'success')
        <span class="relative flex size-3">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-300 opacity-75"></span>
            <span class="relative inline-flex size-3 rounded-full bg-green-300"></span>
        </span>
        @elseif($status['status'] == 'warning')
        <span class="relative flex size-3">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-yellow-300 opacity-75"></span>
            <span class="relative inline-flex size-3 rounded-full bg-yellow-300"></span>
        </span>
        @endif
        @endif
    </div>
</div>