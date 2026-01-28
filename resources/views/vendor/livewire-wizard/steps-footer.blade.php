<style>
.btn-green {
    background-color: rgb(134 239 172);
    transition: background-color 0.2s ease;
    color: rgb(17 24 39);
}

.btn-green:hover {
    background-color: rgb(187 247 208); /* green-500 (hover) */
}
</style>
<div class="grid gap-4 md:gap-0 md:flex md:flex-row-reverse md:justify-between">
    @if($this->hasNextStep())
        <x-button class="btn-green text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150"
        style="padding: 8px 16px;" lg primary  right-icon="chevron-right" wire:click="goToNextStep" spinner="goToNextStep" :label="__('Następny krok')"/>
    @else
        <x-button class="btn-green text-lg min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150"
        style="padding: 8px 16px;" lg primary type="submit" spinner="submit" :label="__('Zapisz')"/>
    @endif
    @if($this->hasPrevStep())
        <x-button class="text-lg min-h-[34px] inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        style="padding: 8px 16px;" lg dark :label="__('Powrót')" icon="chevron-left" wire:click="goToPrevStep" spinner="goToPrevStep"/>
    @endif
</div>
