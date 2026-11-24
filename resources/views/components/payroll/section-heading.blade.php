@props(['emoji' => null, 'icon' => null, 'title', 'employee', 'period', 'description', 'iconClass' => 'flex h-16 w-16 rounded-2xl text-2xl', 'iconBackground' => 'bg-green-100 dark:bg-gray-700'])
<div class="flex items-start gap-5">
    <div class="{{ $iconClass }} shrink-0 items-center justify-center {{ $iconBackground }}" aria-hidden="true">@if($icon)<i class="fa-solid {{ $icon }}"></i>@else{{ $emoji }}@endif</div>
    <div>
        <p class="text-sm text-gray-500 dark:text-gray-400">Wynagrodzenia · {{ $employee }}</p>
        <h2 class="mt-1 !text-3xl font-semibold">{{ $title }}</h2>
        <p class="mt-3">Okres wynagrodzenia · {{ \Carbon\Carbon::createFromFormat('!Y-m', $period)->locale('pl')->translatedFormat('F Y') }}</p>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $description }}</p>
    </div>
</div>
