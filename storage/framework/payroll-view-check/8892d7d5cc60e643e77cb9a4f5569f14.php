<!--HEADER-->
<?php if (isset($component)) { $__componentOriginalbeca410b003449fc279c14ce2c7a3f29 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbeca410b003449fc279c14ce2c7a3f29 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-header','data' => ['class' => 'grid gap-2 md:flex md:gap-0 md:justify-between']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'grid gap-2 md:flex md:gap-0 md:justify-between']); ?>
    <?php if (isset($component)) { $__componentOriginala11698e65f4c338ad73b109bcde1f4a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala11698e65f4c338ad73b109bcde1f4a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.h1-display','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h1-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php echo e($slot); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala11698e65f4c338ad73b109bcde1f4a1)): ?>
<?php $attributes = $__attributesOriginala11698e65f4c338ad73b109bcde1f4a1; ?>
<?php unset($__attributesOriginala11698e65f4c338ad73b109bcde1f4a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala11698e65f4c338ad73b109bcde1f4a1)): ?>
<?php $component = $__componentOriginala11698e65f4c338ad73b109bcde1f4a1; ?>
<?php unset($__componentOriginala11698e65f4c338ad73b109bcde1f4a1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => ['class' => '!flex-col md:!flex-row gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!flex-col md:!flex-row gap-2']); ?>
        <div class="flex items-center gap-2 w-full md:w-48">
            <?php if (isset($component)) { $__componentOriginalbfd5b823f99dcaaac982cab1ac956b63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63 = $attributes; } ?>
<?php $component = App\View\Components\MyNumber::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('my-number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\MyNumber::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'year','min' => '1900','max' => '2100','id' => 'year_select','value' => ''.e(now()->year).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63)): ?>
<?php $attributes = $__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63; ?>
<?php unset($__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfd5b823f99dcaaac982cab1ac956b63)): ?>
<?php $component = $__componentOriginalbfd5b823f99dcaaac982cab1ac956b63; ?>
<?php unset($__componentOriginalbfd5b823f99dcaaac982cab1ac956b63); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>ROK <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
        </div>
        <?php if (isset($component)) { $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-green','data' => ['onclick' => '
            let year = document.getElementById(\'year_select\').value;
            window.location.href = \''.e(route('leave.balance.store')).'?year=\' + year;
            ','href' => ''.e(route('leave.balance.store')).'','class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => '
            let year = document.getElementById(\'year_select\').value;
            window.location.href = \''.e(route('leave.balance.store')).'?year=\' + year;
            ','href' => ''.e(route('leave.balance.store')).'','class' => 'text-xs']); ?>
            <i class="fa-solid fa-plus mr-2"></i>Dodaj rok dla zespołu
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $attributes = $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $component = $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbeca410b003449fc279c14ce2c7a3f29)): ?>
<?php $attributes = $__attributesOriginalbeca410b003449fc279c14ce2c7a3f29; ?>
<?php unset($__attributesOriginalbeca410b003449fc279c14ce2c7a3f29); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbeca410b003449fc279c14ce2c7a3f29)): ?>
<?php $component = $__componentOriginalbeca410b003449fc279c14ce2c7a3f29; ?>
<?php unset($__componentOriginalbeca410b003449fc279c14ce2c7a3f29); ?>
<?php endif; ?>
<!--HEADER--><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\leave\header-balance.blade.php ENDPATH**/ ?>