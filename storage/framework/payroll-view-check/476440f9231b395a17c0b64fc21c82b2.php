<div x-data="wireui_inputs_maskable({
    isBlur: <?= json_encode(filter_var($attributes->wire('model')->hasModifier('blur'), FILTER_VALIDATE_BOOLEAN)); ?>,
    model: <?php if (!isset($__livewire)): ?>
    <?php if (is_object($attributes->wire('model')) || is_array($attributes->wire('model'))) { echo "JSON.parse(atob('".base64_encode(json_encode($attributes->wire('model')))."'))"; } elseif (is_string($attributes->wire('model'))) { echo "'".str_replace("'", "\'", $attributes->wire('model'))."'"; } else { echo json_encode($attributes->wire('model')); } ?>
<?php elseif ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective && $attributes->wire('model')->hasModifier('blur')): ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>').live
<?php elseif ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?>

<?php else : ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')
<?php endif; ?>,
    emitFormatted: <?= json_encode(filter_var($emitFormatted, FILTER_VALIDATE_BOOLEAN)); ?>,
    mask: <?php echo e($mask); ?>,
})" <?php echo e($attributes->only('wire:key')->class('w-full')); ?>>
    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('input')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['borderless' => $borderless,'shadowless' => $shadowless,'label' => $label,'hint' => $hint,'corner-hint' => $cornerHint,'icon' => $icon,'right-icon' => $rightIcon,'prefix' => $prefix,'suffix' => $suffix,'prepend' => $prepend,'append' => $append,'x-model' => 'input','x-on:input' => 'onInput($event.target.value)','x-on:blur' => 'emitInput','attributes' => $attributes->whereDoesntStartWith(['wire:model', 'x-model'])->except('wire:key')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\vendor\wireui\wireui\resources\views\components\inputs\maskable.blade.php ENDPATH**/ ?>