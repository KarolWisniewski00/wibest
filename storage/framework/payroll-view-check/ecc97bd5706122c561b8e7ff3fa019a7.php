<div x-data="wireui_color_picker({
    colorNameAsValue: <?= json_encode(filter_var($colorNameAsValue, FILTER_VALIDATE_BOOLEAN)); ?>,

    <?php if($attributes->wire('model')->value()): ?>
        wireModifiers: <?php if (is_object($attributes->wireModifiers()) || is_array($attributes->wireModifiers())) { echo "JSON.parse(atob('".base64_encode(json_encode($attributes->wireModifiers()))."'))"; } elseif (is_string($attributes->wireModifiers())) { echo "'".str_replace("'", "\'", $attributes->wireModifiers())."'"; } else { echo json_encode($attributes->wireModifiers()); } ?>,
        wireModel: <?php if (!isset($__livewire)): ?>
    <?php if (is_object($attributes->wire('model')) || is_array($attributes->wire('model'))) { echo "JSON.parse(atob('".base64_encode(json_encode($attributes->wire('model')))."'))"; } elseif (is_string($attributes->wire('model'))) { echo "'".str_replace("'", "\'", $attributes->wire('model'))."'"; } else { echo json_encode($attributes->wire('model')); } ?>
<?php elseif ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective && $attributes->wire('model')->hasModifier('blur')): ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>').live
<?php elseif ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?>

<?php else : ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')
<?php endif; ?>,
    <?php endif; ?>

    <?php if($colors): ?>
        colors: <?php if (is_object($getColors()) || is_array($getColors())) { echo "JSON.parse(atob('".base64_encode(json_encode($getColors()))."'))"; } elseif (is_string($getColors())) { echo "'".str_replace("'", "\'", $getColors())."'"; } else { echo json_encode($getColors()); } ?>
    <?php endif; ?>
})" <?php echo e($attributes->only(['class', 'wire:key'])->class('relative w-full')); ?>>
    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('input')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => $attributes->except(['class', 'wire:key'])->whereDoesntStartWith('wire:model'),'x-model' => ''.e($colorNameAsValue ? 'selected.name' : 'selected.value').'','x-bind:class' => '{ \'pl-8\': selected.value }','x-on:input' => 'setColor($event.target.value)','x-ref' => 'input','label' => $label,'prefix' => null,'icon' => null]); ?>
         <?php $__env->slot('prefix', null, []); ?> 
            <template x-if="selected.value">
                <div
                    class="w-4 h-4 rounded shadow border"
                    :style="{ 'background-color': selected.value }"
                ></div>
            </template>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('append', null, []); ?> 
            <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('button')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full rounded-r-md','primary' => true,'flat' => true,'squared' => true,'x-on:click' => 'toggle','trigger' => true,'disabled' => $disabled]); ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '
                            w-4 h-4 group-focus:text-primary-700 text-gray-400 dark:text-gray-600
                            dark:group-hover:text-gray-500 dark:group-focus:text-primary-500
                        ','name' => $rightIcon]); ?>
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
         <?php $__env->endSlot(); ?>
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

    <?php if (isset($component)) { $__componentOriginala3e8dd945320a93fc332a1c48075403e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3e8dd945320a93fc332a1c48075403e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.parts.popover','data' => ['margin' => (bool) $label,'class' => \Illuminate\Support\Arr::toCssClasses([
            'max-h-64 select-none overflow-hidden',
            'sm:max-w-[19rem]',
        ])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::parts.popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['margin' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((bool) $label),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
            'max-h-64 select-none overflow-hidden',
            'sm:max-w-[19rem]',
        ]))]); ?>
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'max-h-60 overflow-y-auto overscroll-contain soft-scrollbar py-2 px-1',
            'flex flex-wrap items-center justify-center gap-1 sm:gap-0.5 mx-auto',
        ]); ?>">
            <span class="sr-only">dropdown-open</span>

            <template x-for="(color, index) in colors" :key="index">
                <button
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'w-6 h-6 rounded shadow-lg border hover:scale-125 transition-all ease-in-out duration-100 cursor-pointer',
                        'hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-600 dark:focus:ring-gray-400',
                        'dark:border-0 dark:hover:ring-2 dark:hover:ring-gray-400',
                    ]); ?>"
                    :style="{ 'background-color': color.value }"
                    x-on:click="select(color)"
                    :title="color.name"
                    type="button">
                </button>
            </template>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3e8dd945320a93fc332a1c48075403e)): ?>
<?php $attributes = $__attributesOriginala3e8dd945320a93fc332a1c48075403e; ?>
<?php unset($__attributesOriginala3e8dd945320a93fc332a1c48075403e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3e8dd945320a93fc332a1c48075403e)): ?>
<?php $component = $__componentOriginala3e8dd945320a93fc332a1c48075403e; ?>
<?php unset($__componentOriginala3e8dd945320a93fc332a1c48075403e); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\vendor\wireui\wireui\resources\views\components\color-picker.blade.php ENDPATH**/ ?>