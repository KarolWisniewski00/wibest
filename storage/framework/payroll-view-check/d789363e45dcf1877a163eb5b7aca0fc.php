<?php
    $isStepValid = $stepInstance->isValid();
    $isFailedStep = $stepInstance->validationFails;
    $stepIsGreaterOrEqualThan = $this->stepIsGreaterOrEqualThan($stepInstance->getOrder());
?>
<div class="w-1/3">
    <div class="relative mb-2">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$loop->first): ?>
            <div class="absolute" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                <div class="bg-gray-200 rounded flex-1">
                    <div
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'rounded py-0.5',
                            'bg-green-300' => $stepIsGreaterOrEqualThan && !$isFailedStep,
                            'bg-red-300' => $isFailedStep,
                            'w-full' => $isFailedStep || $stepIsGreaterOrEqualThan,
                            'w-0' =>  !($isFailedStep || $stepIsGreaterOrEqualThan)
                        ]); ?>"
                    ></div>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="grid place-items-center">
            <?php if (isset($component)) { $__componentOriginal472ea0eb8f0535afe9ab76636937c0a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal472ea0eb8f0535afe9ab76636937c0a8 = $attributes; } ?>
<?php $component = WireUi\View\Components\CircleButton::resolve(['icon' => ''.e($stepInstance->icon()).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\CircleButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['positive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stepIsGreaterOrEqualThan && !$isFailedStep),'negative' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isFailedStep),'wire:click' => 'setStep('.e($stepInstance->getOrder()).')']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal472ea0eb8f0535afe9ab76636937c0a8)): ?>
<?php $attributes = $__attributesOriginal472ea0eb8f0535afe9ab76636937c0a8; ?>
<?php unset($__attributesOriginal472ea0eb8f0535afe9ab76636937c0a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal472ea0eb8f0535afe9ab76636937c0a8)): ?>
<?php $component = $__componentOriginal472ea0eb8f0535afe9ab76636937c0a8; ?>
<?php unset($__componentOriginal472ea0eb8f0535afe9ab76636937c0a8); ?>
<?php endif; ?>
        </div>
    </div>
    <div class="text-xs text-center md:text-base"><?php echo e($stepInstance->title()); ?></div>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\vendor\vildanbina\livewire-wizard\resources\views\step-header.blade.php ENDPATH**/ ?>