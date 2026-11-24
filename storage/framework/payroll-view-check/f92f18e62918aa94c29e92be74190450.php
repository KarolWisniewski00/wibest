<tr <?php echo e($attributes); ?> class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center animate-pulse">
    <td class="px-2 py-2 table-cell">
        <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="w-4 h-4 rounded bg-gray-200 dark:bg-gray-700"></div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $attributes = $__attributesOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__attributesOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $component = $__componentOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__componentOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
    </td>

    <td class="px-2 py-2">
        <div class="h-[56px] flex justify-start items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700"></div>
            <div class="flex flex-col justify-center gap-2 w-32 py-4">
                <div class="h-3 rounded-lg bg-gray-200 dark:bg-gray-700 w-3/4"></div>
                <div class="h-2 rounded-lg bg-gray-200 dark:bg-gray-700 w-1/2"></div>
            </div>
        </div>
    </td>

    
    <td class="px-2 py-2">
        <div class="h-4 rounded-lg bg-gray-200 dark:bg-gray-700 w-24 mx-auto"></div>
    </td>
    
    <td class="px-2 py-2">
        <div class="h-4 rounded-lg bg-gray-200 dark:bg-gray-700 w-24 mx-auto"></div>
    </td>

    <td class="px-2 py-2">
        <div class="flex flex-row items-center justify-center">
            <div class="w-4 h-4 rounded-full bg-gray-200 dark:bg-gray-700 mx-1"></div>
        </div>
    </td>

    <td class="px-2 py-2">
        <div class="flex flex-col items-center justify-center gap-2">
            <div class="w-4 h-4 rounded-full bg-gray-200 dark:bg-gray-700 mx-1"></div>
            <div class="w-10 h-4 rounded-full bg-gray-200 dark:bg-gray-700 mx-1"></div>
        </div>
    </td>

    
    <td class="px-2 py-2">
        <div class="min-h-[38px] w-[51px] rounded-lg bg-gray-200 dark:bg-gray-700 mx-auto"></div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\loader-event.blade.php ENDPATH**/ ?>