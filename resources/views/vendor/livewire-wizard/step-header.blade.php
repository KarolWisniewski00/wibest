@php
    $isStepValid = $stepInstance->isValid();
    $isFailedStep = $stepInstance->validationFails;
    $stepIsGreaterOrEqualThan = $this->stepIsGreaterOrEqualThan($stepInstance->getOrder());
@endphp
<style>
.btn-green {
    background-color: rgb(134 239 172);
    transition: background-color 0.2s ease;
    color: rgb(17 24 39);
}

.btn-green:hover {
    background-color: rgb(187 247 208); /* green-500 (hover) */
}
.btn-red {
    background-color: rgb(252 165 165);;
    transition: background-color 0.2s ease;
    color: rgb(17 24 39);
}

.btn-green:hover {
    background-color: rgb(254 202 202); /* green-500 (hover) */
}
</style>
<div class="w-1/3">
    <div class="relative mb-2">
        @if(!$loop->first)
            <div class="absolute" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="bg-gray-100 rounded flex-1">
                    <div
                        @class([
                            'rounded py-0.5',
                            'bg-green-300 btn-green' => $stepIsGreaterOrEqualThan && !$isFailedStep,
                            'bg-red-300 btn-red' => $isFailedStep,
                            'w-full' => $isFailedStep || $stepIsGreaterOrEqualThan,
                            'w-0' =>  !($isFailedStep || $stepIsGreaterOrEqualThan)
                        ])
                    ></div>
                </div>
            </div>
        @endif

        <div class="grid place-items-center">
            <x-button.circle
                :positive="$stepIsGreaterOrEqualThan && !$isFailedStep"
                :negative="$isFailedStep"
                wire:click="setStep({{ $stepInstance->getOrder() }})"
                icon="{{ $stepInstance->icon() }}"
                @class([
                    'bg-gray-100 rounded-full w-[40px] h-[40px]',
                    'btn-green bg-green-300 dark:text-gray-900 w-[40px] h-[40px]' => $stepIsGreaterOrEqualThan && !$isFailedStep,
                    'btn-red bg-red-300 dark:text-gray-900 w-[40px] h-[40px]' => $isFailedStep,
                ])
            />
        </div>
    </div>
    <div class="text-xs text-center md:text-base font-semibold dark:text-white mb-4">{{ $stepInstance->title() }}</div>
</div>
