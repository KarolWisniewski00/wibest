<td class="px-3 py-2">
    <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['attributes' => $attributes,'class' => 'min-h-[38px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes),'class' => 'min-h-[38px]']); ?>
        <i class="fa-solid fa-eye"></i>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $attributes = $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $component = $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?>
</td><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\show-cell.blade.php ENDPATH**/ ?>