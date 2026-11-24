<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start_time_date != '' || $end_time_date != ''): ?>
    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4 flex-wrap">
        <span class="text-gray-900 dark:text-white">📅 Zakres</span>
        <?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start_time_date != ''): ?>
            <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $start_time_date)->format('d.m.Y') ?? ''); ?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <span class="px-2">-</span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($end_time_date != ''): ?>
            <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $end_time_date)->format('d.m.Y') ?? ''); ?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $attributes = $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $component = $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\date-start-end-picker.blade.php ENDPATH**/ ?>