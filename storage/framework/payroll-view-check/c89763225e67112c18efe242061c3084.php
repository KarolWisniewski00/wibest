<div>
    <div>
        <div class="mb-4" id="days">
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['value' => '⏱️ Wybierz godzinę rozpoczęcia']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => '⏱️ Wybierz godzinę rozpoczęcia']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $attributes = $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $component = $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
            <div class="relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="start_time_clock"
                    wire:model="state.working_hours_from"
                    step="3600"
                    required
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['value' => '⏱️ Wybierz godzinę zakończenia']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => '⏱️ Wybierz godzinę zakończenia']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $attributes = $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $component = $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
            <div class="relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="end_time_clock"
                    wire:model="state.working_hours_to"
                    step="3600"
                    required
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\time-step.blade.php ENDPATH**/ ?>