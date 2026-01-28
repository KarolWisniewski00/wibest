@props(['icon', 'type', 'shortcut'])
<div class="flex flex-row items-center justify-center w-fit gap-2">
    <x-paragraf-display class="font-semibold w-10 h-10 flex items-center justify-center text-3xl">
        {{ $icon }}
    </x-paragraf-display>
    <div class="flex flex-col justify-center w-fit gap-2">
        <x-paragraf-display class="font-semibold w-fit text-start text-xs">
            {{ $type }}
        </x-paragraf-display>
        <x-label-pink class="w-fit">
            {{ $shortcut }}
        </x-label-pink>
    </div>
</div>