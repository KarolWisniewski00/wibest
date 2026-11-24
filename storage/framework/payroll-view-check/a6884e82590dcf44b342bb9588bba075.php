<div>
    <form wire:submit="save">
        <?php echo $__env->make('livewire-wizard::steps-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container p-4 mx-auto">
            <?php if (isset($component)) { $__componentOriginald70313088f2ff6c3e4438c51e5e90ee8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald70313088f2ff6c3e4438c51e5e90ee8 = $attributes; } ?>
<?php $component = App\View\Components\MyErrors::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\MyErrors::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald70313088f2ff6c3e4438c51e5e90ee8)): ?>
<?php $attributes = $__attributesOriginald70313088f2ff6c3e4438c51e5e90ee8; ?>
<?php unset($__attributesOriginald70313088f2ff6c3e4438c51e5e90ee8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald70313088f2ff6c3e4438c51e5e90ee8)): ?>
<?php $component = $__componentOriginald70313088f2ff6c3e4438c51e5e90ee8; ?>
<?php unset($__componentOriginald70313088f2ff6c3e4438c51e5e90ee8); ?>
<?php endif; ?>
            <?php echo e($this->getCurrentStep()); ?>

        </div>

        <?php echo $__env->make('livewire-wizard::steps-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\vendor\vildanbina\livewire-wizard\resources\views\wizard.blade.php ENDPATH**/ ?>