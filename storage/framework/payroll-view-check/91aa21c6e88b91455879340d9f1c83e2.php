<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['work_session']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['work_session']); ?>
<?php foreach (array_filter((['work_session']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->status == 'W trakcie pracy'): ?>
<?php if (isset($component)) { $__componentOriginal24bb47aeb85068c803bc2d06015e82e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal24bb47aeb85068c803bc2d06015e82e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-yellow','data' => ['attributes' => $attributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-yellow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
    <?php echo e($work_session->status); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal24bb47aeb85068c803bc2d06015e82e8)): ?>
<?php $attributes = $__attributesOriginal24bb47aeb85068c803bc2d06015e82e8; ?>
<?php unset($__attributesOriginal24bb47aeb85068c803bc2d06015e82e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal24bb47aeb85068c803bc2d06015e82e8)): ?>
<?php $component = $__componentOriginal24bb47aeb85068c803bc2d06015e82e8; ?>
<?php unset($__componentOriginal24bb47aeb85068c803bc2d06015e82e8); ?>
<?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->status == 'Praca zakończona'): ?>
<?php if (isset($component)) { $__componentOriginalacff8abfabbd819906b3ce44188b3d6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => ['attributes' => $attributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
    <?php echo e($work_session->status); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $attributes = $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $component = $__componentOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->status == 'Zablokowane'): ?>
<?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal947044007d39ee7c972d0c3546688661 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => ['attributes' => $attributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
    <?php echo e($work_session->status); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $attributes = $__attributesOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__attributesOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $component = $__componentOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__componentOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<!--PRZY ZMIANACH PAMIĘTAJ ŻE W JQUERY TEŻ TRZEBA ZMIENIĆ--><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\RCP\work-session-status.blade.php ENDPATH**/ ?>