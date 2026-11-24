<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex']); ?>
    <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company): ?>
        <!--MAIN-->
        <?php if (isset($component)) { $__componentOriginal6d34ed0eb01a1886d57455f1550df787 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6d34ed0eb01a1886d57455f1550df787 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main-no-filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main-no-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal49b345aca39c685793a5b0b72a705588 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b345aca39c685793a5b0b72a705588 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.setting.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b345aca39c685793a5b0b72a705588)): ?>
<?php $attributes = $__attributesOriginal49b345aca39c685793a5b0b72a705588; ?>
<?php unset($__attributesOriginal49b345aca39c685793a5b0b72a705588); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b345aca39c685793a5b0b72a705588)): ?>
<?php $component = $__componentOriginal49b345aca39c685793a5b0b72a705588; ?>
<?php unset($__componentOriginal49b345aca39c685793a5b0b72a705588); ?>
<?php endif; ?>

            <!--CONTENT-->
            <?php if (isset($component)) { $__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <!--POWRÓT-->
                <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('setting.user')).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user')).'','class' => 'text-lg']); ?>
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3a1cf38827b336ba38d71f21422d468)): ?>
<?php $attributes = $__attributesOriginala3a1cf38827b336ba38d71f21422d468; ?>
<?php unset($__attributesOriginala3a1cf38827b336ba38d71f21422d468); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3a1cf38827b336ba38d71f21422d468)): ?>
<?php $component = $__componentOriginala3a1cf38827b336ba38d71f21422d468; ?>
<?php unset($__componentOriginala3a1cf38827b336ba38d71f21422d468); ?>
<?php endif; ?>
                <!--POWRÓT-->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'md:col-span-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'md:col-span-2']); ?>
                            <!--Nazwa-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Nazwa
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['style' => 'word-break: break-all;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'word-break: break-all;']); ?>
                                        <span class="text-2xl">🏢</span>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?> <?php echo e($user->company->name); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--Nazwa-->

                            <!--Adres-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Adres
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <span class="text-2xl">📍</span>
                                        <?php echo e($user->company->adress); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--Adres-->

                            <!--NIP-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    NIP
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <span class="text-2xl">🧾</span>
                                        <?php echo e($user->company->vat_number); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--NIP-->

                            <!-- Edytuj planning -->
                            <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('setting.user.edit-company', $user)).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.edit-company', $user)).'','class' => 'text-lg']); ?>
                                <i class="fa-solid fa-building mr-2"></i>Edytuj firmę
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $attributes = $__attributesOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__attributesOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $component = $__componentOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__componentOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
                            <!-- Edytuj planning -->

                            <!--Rozłącz-->
                            <form action="<?php echo e(route('setting.user.disconnect', $user)); ?>" method="POST"
                                onsubmit="return confirm('Czy na pewno chcesz rozłączyć tego użytkownika?');" class="w-full">
                                <?php echo csrf_field(); ?>
                                <?php if (isset($component)) { $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-red','data' => ['type' => 'submit','class' => 'text-lg w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'text-lg w-full']); ?>
                                    <i class="fa-solid fa-user-minus mr-2"></i>Rozłącz
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $attributes = $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $component = $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
                            </form>
                            <!--Rozłącz-->
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => ''.e(route('setting.user.edit-company', $user)).'','class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.edit-company', $user)).'','class' => 'text-2xl']); ?>
                                            Brak firmy
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $attributes = $__attributesOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__attributesOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $component = $__componentOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__componentOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <!--Użytkownik-->
                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Użytkownik
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2']); ?>
                                    <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $attributes = $__attributesOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__attributesOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $component = $__componentOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__componentOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal18659471cf96626392dcd8ad2246a20f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18659471cf96626392dcd8ad2246a20f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name-xl','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name-xl'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18659471cf96626392dcd8ad2246a20f)): ?>
<?php $attributes = $__attributesOriginal18659471cf96626392dcd8ad2246a20f; ?>
<?php unset($__attributesOriginal18659471cf96626392dcd8ad2246a20f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18659471cf96626392dcd8ad2246a20f)): ?>
<?php $component = $__componentOriginal18659471cf96626392dcd8ad2246a20f; ?>
<?php unset($__componentOriginal18659471cf96626392dcd8ad2246a20f); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                        <!--Użytkownik-->

                        <!--Email-->
                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Email
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal801e453908ed36fc5d3b8253af4bfd0a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-a','data' => ['href' => 'mailto:'.e($user->email).'','style' => 'word-break: break-all;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-a'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => 'mailto:'.e($user->email).'','style' => 'word-break: break-all;']); ?>
                                    <span class="text-2xl">📧</span>
                                    <?php echo e($user->email); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a)): ?>
<?php $attributes = $__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a; ?>
<?php unset($__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal801e453908ed36fc5d3b8253af4bfd0a)): ?>
<?php $component = $__componentOriginal801e453908ed36fc5d3b8253af4bfd0a; ?>
<?php unset($__componentOriginal801e453908ed36fc5d3b8253af4bfd0a); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                        <!--Email-->

                        <!--Numer telefonu-->
                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                Numer telefonu
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal801e453908ed36fc5d3b8253af4bfd0a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-a','data' => ['href' => 'tel:'.e($user->phone).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-a'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => 'tel:'.e($user->phone).'']); ?>
                                    <span class="text-2xl">📱</span>
                                    <?php echo e($user->phone); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a)): ?>
<?php $attributes = $__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a; ?>
<?php unset($__attributesOriginal801e453908ed36fc5d3b8253af4bfd0a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal801e453908ed36fc5d3b8253af4bfd0a)): ?>
<?php $component = $__componentOriginal801e453908ed36fc5d3b8253af4bfd0a; ?>
<?php unset($__componentOriginal801e453908ed36fc5d3b8253af4bfd0a); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                        <!--Numer telefonu-->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role != 'CRM'): ?>
                            <!--Płeć-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Płeć
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php
                                        $genderLabel = match ($user->gender) {
                                            'male' => '💙 Mężczyzna',
                                            'female' => '💖 Kobieta',
                                            default => '⚪ Brak danych',
                                        };
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php echo e($genderLabel); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--Płeć-->


                            <!--Logowanie przez Google-->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->oauth_id != null): ?>
                                <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Logowanie przez Google
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginalacff8abfabbd819906b3ce44188b3d6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <i class="fa-brands fa-google mr-2"></i> Połączono
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
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <!--Logowanie przez Google-->
                            <!--Ilość wysłanych wiadomości-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Ilość wysłanych wiadomości
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <span class="text-2xl">📩</span>
                                        <?php echo e($msg->count()); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--Ilość wysłanych wiadomości-->
                            <!--Zużycie SMS-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Zużycie SMS
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <span class="text-2xl">📱</span>
                                        <?php echo e($msg->sum('price') ?? 0); ?> PLN
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--Zużycie SMS-->
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    Stanowisko
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <span class="text-2xl">💼</span>
                                        <?php echo e($user->position ? $user->position : 'Brak stanowiska'); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->supervisor || $user->position || $user->assigned_at): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role != 'CRM'): ?>
                                <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <!--Bezpośredni przełożony-->
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Bezpośredni przełożony
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->supervisor): ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2']); ?>
                                                    <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $user->supervisor]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->supervisor)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $attributes = $__attributesOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__attributesOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $component = $__componentOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__componentOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
                                                    <?php if (isset($component)) { $__componentOriginal18659471cf96626392dcd8ad2246a20f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18659471cf96626392dcd8ad2246a20f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name-xl','data' => ['user' => $user->supervisor]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name-xl'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->supervisor)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18659471cf96626392dcd8ad2246a20f)): ?>
<?php $attributes = $__attributesOriginal18659471cf96626392dcd8ad2246a20f; ?>
<?php unset($__attributesOriginal18659471cf96626392dcd8ad2246a20f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18659471cf96626392dcd8ad2246a20f)): ?>
<?php $component = $__componentOriginal18659471cf96626392dcd8ad2246a20f; ?>
<?php unset($__componentOriginal18659471cf96626392dcd8ad2246a20f); ?>
<?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    Brak przełożonego
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                    <!--Bezpośredni przełożony-->
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Stanowisko
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <span class="text-2xl">💼</span>
                                                <?php echo e($user->position ? $user->position : 'Brak stanowiska'); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->assigned_at): ?>
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Data dołączenia do zespołu
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2 w-full']); ?>
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
                                                        📅
                                                        <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->assigned_at)->format('d.m.Y') ?? ''); ?>

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
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->paid_until): ?>
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Opłacone do
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2 w-full']); ?>
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
                                                        📅
                                                        <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->paid_until)->format('d.m.Y') ?? ''); ?>

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
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular): ?>
                            <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular == 'stały planing'): ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Typ planingu
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2']); ?>
                                                <span>
                                                    <span class="text-2xl">🏢</span>Stały planing
                                                </span>
                                                <?php if (isset($component)) { $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-cello','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    STA
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $attributes = $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $component = $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular == 'prosty planing'): ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Typ planingu
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <span class="text-2xl">🧭</span>
                                                Prosty planing
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular == 'zmienny planing'): ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Typ planingu
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2']); ?>
                                                <span>
                                                    <span class="text-2xl">🌀</span>Zmienny planing
                                                </span>
                                                <?php if (isset($component)) { $__componentOriginal6d793c1620e628f2997ffd8665b00b3a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6d793c1620e628f2997ffd8665b00b3a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-violet','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-violet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    ZMI
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6d793c1620e628f2997ffd8665b00b3a)): ?>
<?php $attributes = $__attributesOriginal6d793c1620e628f2997ffd8665b00b3a; ?>
<?php unset($__attributesOriginal6d793c1620e628f2997ffd8665b00b3a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d793c1620e628f2997ffd8665b00b3a)): ?>
<?php $component = $__componentOriginal6d793c1620e628f2997ffd8665b00b3a; ?>
<?php unset($__componentOriginal6d793c1620e628f2997ffd8665b00b3a); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Liczenie nadgodzin
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->overtime == 1): ?>
                                                <?php if (isset($component)) { $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    włączone
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $attributes = $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $component = $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    wyłączone
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $attributes = $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $component = $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Próg naliczania
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <span class="text-2xl">⏳</span>
                                            powyżej <?php echo e($user->overtime_threshold); ?> minut
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Wymagaj zadania w nadgodzinach
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->overtime_task == 1): ?>
                                                <?php if (isset($component)) { $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    włączone
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $attributes = $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $component = $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    wyłączone
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $attributes = $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $component = $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        Wymagaj zatwierdzenia przez przełożonego
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->overtime_accept == 1): ?>
                                                <?php if (isset($component)) { $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    włączone
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $attributes = $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $component = $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    wyłączone
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $attributes = $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $component = $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                    <!-- Konfiguruj planning -->
                                    <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('setting.user.config_planing', $user)).'','class' => 'text-lg md:mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.config_planing', $user)).'','class' => 'text-lg md:mr-2']); ?>
                                        <i class="fa-solid fa-gears mr-2"></i>Konfiguruj
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
                                    <!-- Konfiguruj planning -->
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role != 'CRM'): ?>
                                <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                                    <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => ''.e(route('setting.user.config_planing', $user->id)).'','class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.config_planing', $user->id)).'','class' => 'text-2xl']); ?>
                                                        Konfiguruj
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $attributes = $__attributesOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__attributesOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $component = $__componentOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__componentOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
                                                <?php else: ?>
                                                    <?php if (isset($component)) { $__componentOriginal7b2a12e15a69bc14925b7a9e27398f66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-span','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                                        Konfiguruj
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66)): ?>
<?php $attributes = $__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66; ?>
<?php unset($__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b2a12e15a69bc14925b7a9e27398f66)): ?>
<?php $component = $__componentOriginal7b2a12e15a69bc14925b7a9e27398f66; ?>
<?php unset($__componentOriginal7b2a12e15a69bc14925b7a9e27398f66); ?>
<?php endif; ?>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php
                        $colSpan = '';
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular == 'stały planing'): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null): ?>
                                <?php
                                    $colSpan = 'col-span-2';
                                ?>
                                <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Typ planingu
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2']); ?>
                                                <span>
                                                    <span class="text-2xl">🏢</span>Stały planing
                                                </span>
                                                <?php if (isset($component)) { $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-cello','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    STA
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $attributes = $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $component = $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Godziny pracy
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <span class="text-2xl">🕒</span>
                                                Od <?php echo e(\Carbon\Carbon::parse($user->working_hours_from)->format('H:i')); ?> do
                                                <?php echo e(\Carbon\Carbon::parse($user->working_hours_to)->format('H:i')); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            Dni tygodnia
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <span class="text-2xl">📅</span>
                                                Od <?php echo e($user->working_hours_start_day); ?> do <?php echo e($user->working_hours_stop_day); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                        <!-- Edytuj planning -->
                                        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('setting.user.edit-planing', $user)).'','class' => 'text-lg md:mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.edit-planing', $user)).'','class' => 'text-lg md:mr-2']); ?>
                                            <i class="fa-solid fa-calendar mr-2"></i>Edytuj planning
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $attributes = $__attributesOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__attributesOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $component = $__componentOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__componentOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
                                        <!-- Edytuj planning -->
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php
                                    $colSpan = 'col-span-2';
                                ?>
                                <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                                    <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => ''.e(route('setting.user.edit-planing', $user->id)).'','class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.edit-planing', $user->id)).'','class' => 'text-2xl']); ?>
                                                        Edytuj planing
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $attributes = $__attributesOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__attributesOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $component = $__componentOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__componentOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
                                                <?php else: ?>
                                                    <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => '','class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '','class' => 'text-2xl']); ?>
                                                        Edytuj planing
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $attributes = $__attributesOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__attributesOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale63ce107a7d263224846145430381f1f)): ?>
<?php $component = $__componentOriginale63ce107a7d263224846145430381f1f; ?>
<?php unset($__componentOriginale63ce107a7d263224846145430381f1f); ?>
<?php endif; ?>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel' || $user->id == auth()->user()->id): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->supervisor || $user->position): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role != 'CRM'): ?>
                                    <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => ''.e($colSpan).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($colSpan).'']); ?>
                                        <!--Ilość wysłanych wiadomości email-->
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Ilość wysłanych wiadomości email
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <span class="text-2xl">📧</span>
                                                    <?php echo e($msg_email->count()); ?>

                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                        <!--Ilość wysłanych wiadomości email-->
                                        <!--Ilość wysłanych wiadomości SMS-->
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Ilość wysłanych wiadomości SMS
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <span class="text-2xl">📱</span>
                                                    <?php echo e($msg_sms->count()); ?>

                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                        <!--Ilość wysłanych wiadomości SMS-->
                                        <!--Ilość wysłanych wszystkich wiadomości-->
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Ilość wysłanych wszystkich wiadomości
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <span class="text-2xl">📩</span>
                                                    <?php echo e($msg->count()); ?>

                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                        <!--Ilość wysłanych wszystkich wiadomości-->
                                        <!--Powiadomienia SMS-->
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Powiadomienia SMS
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->sms == 1): ?>
                                                        <?php if (isset($component)) { $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                            włączone
                                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $attributes = $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $component = $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if (isset($component)) { $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                            wyłączone
                                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $attributes = $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $component = $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                        <!--Powiadomienia SMS-->
                                        <!--Cena za SMS-->
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Cena za SMS
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <span class="text-2xl">💲</span>
                                                    <?php echo e(number_format($user->company->sms_price ?? 0, 2)); ?> PLN
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                        <!--Cena za SMS-->
                                        <!--Suma wysłanych wiadomości SMS-->
                                        <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                Suma wysłanych wiadomości SMS
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $attributes = $__attributesOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__attributesOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale45e65b9196dc2b184cf670f0d40f585)): ?>
<?php $component = $__componentOriginale45e65b9196dc2b184cf670f0d40f585; ?>
<?php unset($__componentOriginale45e65b9196dc2b184cf670f0d40f585); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <span class="text-2xl">💵</span>
                                                    <?php echo e(number_format($msg->sum('price') ?? 0, 2)); ?> PLN
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                        <!--Suma wysłanych wiadomości SMS-->
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                            <!-- Konfiguruj SMS -->
                                            <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('setting.user.config_sms', $user)).'','class' => 'text-lg md:mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.config_sms', $user)).'','class' => 'text-lg md:mr-2']); ?>
                                                <i class="fa-solid fa-gears mr-2"></i>Konfiguruj
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
                                            <!-- Konfiguruj SMS -->
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <!--PRZYCISKI-->
                <div class="flex flex-col md:flex-row justify-end gap-4 mt-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role != 'CRM'): ?>
                        <!-- Reset hasła -->
                        <?php if (isset($component)) { $__componentOriginal7931f85c37d345e4d89919ba1482a252 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7931f85c37d345e4d89919ba1482a252 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-orange','data' => ['href' => ''.e(route('team.user.restart', $user)).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.restart', $user)).'','class' => 'text-lg']); ?>
                            <i class="fa-solid fa-paper-plane mr-2"></i>Reset hasła
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7931f85c37d345e4d89919ba1482a252)): ?>
<?php $attributes = $__attributesOriginal7931f85c37d345e4d89919ba1482a252; ?>
<?php unset($__attributesOriginal7931f85c37d345e4d89919ba1482a252); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7931f85c37d345e4d89919ba1482a252)): ?>
<?php $component = $__componentOriginal7931f85c37d345e4d89919ba1482a252; ?>
<?php unset($__componentOriginal7931f85c37d345e4d89919ba1482a252); ?>
<?php endif; ?>
                        <!-- Reset hasła -->
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company || $role === 'właściciel'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$user->company || $user->role != 'CRM'): ?>
                            <!-- EDYTUJ -->
                            <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('setting.user.edit', $user)).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.edit', $user)).'','class' => 'text-lg']); ?>
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $attributes = $__attributesOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__attributesOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $component = $__componentOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__componentOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
                            <!--EDYTUJ-->
                        <?php else: ?>
                            <!-- EDYTUJ -->
                            <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('setting.user.edit.for.crm', $user)).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.edit.for.crm', $user)).'','class' => 'text-lg']); ?>
                                <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $attributes = $__attributesOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__attributesOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $component = $__componentOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__componentOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
                            <!--EDYTUJ-->
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <!--USUŃ-->
                    <form action="<?php echo e(route('setting.user.delete', $user)); ?>" method="POST" class="w-full md:w-fit"
                        onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php if (isset($component)) { $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-red','data' => ['type' => 'submit','class' => 'text-lg w-full md:w-fit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'text-lg w-full md:w-fit']); ?>
                            <i class="fa-solid fa-trash mr-2"></i>Usuń
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $attributes = $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $component = $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
                    </form>
                    <!--USUŃ-->
                </div>
                <!--PRZYCISKI-->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role || $user->position): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role != 'CRM'): ?>
                            <!--Podsumowanie dnia-->
                            <div class="flex flex-col w-full md:pt-4">
                                <?php if (isset($component)) { $__componentOriginala11698e65f4c338ad73b109bcde1f4a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala11698e65f4c338ad73b109bcde1f4a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.h1-display','data' => ['class' => 'text-center md:text-start my-4 md:my-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h1-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center md:text-start my-4 md:my-0']); ?>
                                    ⏱️ Podsumowanie dnia
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
                            </div>
                            <div class="grid grid-cols-1 gap-4 md:py-4 w-full">
                                <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'flex flex-col w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex flex-col w-full']); ?>
                                                <?php
                                                    $status = $user->getToday();
                                                ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['status'] == 'warning'): ?>
                                                    <?php if (isset($component)) { $__componentOriginal7b2a12e15a69bc14925b7a9e27398f66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-span','data' => ['class' => '!text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!text-center']); ?>
                                                        <?php echo e($status['message']); ?>

                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66)): ?>
<?php $attributes = $__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66; ?>
<?php unset($__attributesOriginal7b2a12e15a69bc14925b7a9e27398f66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b2a12e15a69bc14925b7a9e27398f66)): ?>
<?php $component = $__componentOriginal7b2a12e15a69bc14925b7a9e27398f66; ?>
<?php unset($__componentOriginal7b2a12e15a69bc14925b7a9e27398f66); ?>
<?php endif; ?>
                                                <?php elseif($status['status'] == 'success'): ?>
                                                    <?php if (isset($component)) { $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-span','data' => ['class' => '!text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!text-center']); ?>
                                                        <?php echo e($status['message']); ?>

                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $attributes = $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f)): ?>
<?php $component = $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f; ?>
<?php unset($__componentOriginal77a2c300c24fb971098f2e6c0a76b12f); ?>
<?php endif; ?>
                                                <?php else: ?>
                                                    <?php if (isset($component)) { $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-span','data' => ['class' => '!text-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!text-center']); ?>
                                                        <?php echo e($status['message']); ?>

                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $attributes = $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c)): ?>
<?php $component = $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c; ?>
<?php unset($__componentOriginal0c503c1f9bff39764e1bf2f74285df7c); ?>
<?php endif; ?>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['timing']): ?>
                                                    <div class="italic text-xs text-gray-500 dark:text-gray-500 !text-center">
                                                        <?php echo e($status['timing']); ?>

                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['type'] == 'rcp' && ($status['start'] || $status['stop'])): ?>
                                                    <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => ['class' => 'gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'gap-2']); ?>

                                                        
                                                        <div class="flex flex-col items-center justify-center h-full w-full">
                                                            <span class="text-lg md:text-xl">
                                                                ⏱️
                                                            </span>
                                                            <?php if (isset($component)) { $__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-green','data' => ['class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-1']); ?>
                                                                RCP
                                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4)): ?>
<?php $attributes = $__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4; ?>
<?php unset($__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4)): ?>
<?php $component = $__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4; ?>
<?php unset($__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4); ?>
<?php endif; ?>
                                                        </div>

                                                        
                                                        <div class="flex flex-col items-center justify-center gap-2 my-auto">
                                                            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-2xl whitespace-nowrap font-semibold w-fit text-start relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl whitespace-nowrap font-semibold w-fit text-start relative']); ?>
                                                                <?php if (isset($component)) { $__componentOriginaldd68647f67a2255116b2ba7be5781704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd68647f67a2255116b2ba7be5781704 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-dark','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-dark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['start']): ?>
                                                                    <?php echo e(\Carbon\Carbon::parse($status['start'])->format('H:i')); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['stop']): ?> -
                                                                    <?php echo e(\Carbon\Carbon::parse($status['stop'])->format('H:i')); ?> <?php else: ?> -
                                                                    TERAZ <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $attributes = $__attributesOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__attributesOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $component = $__componentOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__componentOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?>
                                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['worked_time']): ?>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['stop']): ?>
                                                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-2xl whitespace-nowrap font-semibold w-fit text-start relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-2xl whitespace-nowrap font-semibold w-fit text-start relative']); ?>
                                                                        <span><?php echo e($status['worked_time']); ?></span>
                                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        </div>
                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['type'] == 'leave'): ?>
                                                    <div
                                                        class="flex flex-col md:flex-row items-center justify-center gap-2 py-2 rounded-2xl">

                                                        
                                                        <div class="flex flex-col items-center justify-center">
                                                            <span class="text-lg md:text-xl">
                                                                <?php echo e(config('leavetypes.icons.' . $status['timing'], '')); ?>

                                                            </span>
                                                            <?php if (isset($component)) { $__componentOriginal003932a43de1bc916b9c819eb0be9a56 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal003932a43de1bc916b9c819eb0be9a56 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-pink','data' => ['class' => 'mt-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-pink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-1']); ?>
                                                                <?php echo e(config('leavetypes.shortType.' . $status['timing'], '')); ?>

                                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal003932a43de1bc916b9c819eb0be9a56)): ?>
<?php $attributes = $__attributesOriginal003932a43de1bc916b9c819eb0be9a56; ?>
<?php unset($__attributesOriginal003932a43de1bc916b9c819eb0be9a56); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal003932a43de1bc916b9c819eb0be9a56)): ?>
<?php $component = $__componentOriginal003932a43de1bc916b9c819eb0be9a56; ?>
<?php unset($__componentOriginal003932a43de1bc916b9c819eb0be9a56); ?>
<?php endif; ?>
                                                        </div>

                                                        
                                                        <div
                                                            class="flex flex-col md:flex-col gap-3 text-sm md:text-base text-gray-800 dark:text-gray-100">
                                                            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-2xl whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl whitespace-nowrap']); ?>
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
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['timing']): ?>
                                                                    <?php echo e(\Carbon\Carbon::parse($status['start'])->format('d.m')); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['start'] && $status['stop']): ?> - <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['stop']): ?>
                                                                    <?php echo e(\Carbon\Carbon::parse($status['stop'])->format('d.m')); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                            </div>
                            <!--Podsumowanie dnia-->
                            <div class="md:pb-4">
    <?php
        $shortcut = 'UW';
        $icon = '🏖️';
        $type = 'urlop wypoczynkowy';

        $baseDays = (float) ($leave_balance->base_days ?? 0);
        $carriedOver = (float) ($leave_balance->carried_over ?? 0);
        $usedDays = (float) ($leave_balance->used_days ?? 0);
        $remainingDays = max(0, (float) ($leave_balance_left ?? 0));

        $totalDays = $baseDays + $carriedOver;
        $usedPercentage = $totalDays > 0
            ? min(100, max(0, ($usedDays / $totalDays) * 100))
            : 0;
    ?>

                    <section
                        class="group relative h-full overflow-hidden rounded-lg bg-gray-100 p-5 shadow-sm transition-all duration-300 ease-out hover:shadow-md dark:bg-gray-700 dark:hover:shadow-black/10 sm:p-6 motion-reduce:transition-none"
                        aria-label="Podsumowanie urlopu wypoczynkowego">
                        <!-- Nagłówek -->
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex min-w-0 items-center gap-3">
                                <div
                                    class="text-2xl shrink-0 hidden sm:flex w-14 h-14 rounded-2xl items-center justify-center bg-gradient-to-br from-pink-200 to-rose-100 dark:from-pink-500/20 dark:to-rose-500/10 text-pink-300 dark:text-pink-300">
                                    <?php echo e($icon); ?>

                                </div>

                                <div class="min-w-0">
                                    <div
                                        class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                        Twój urlop
                                    </div>

                                    <h3 class="mt-1 text-base font-semibold text-gray-900 dark:text-white">
                                        Urlop wypoczynkowy
                                    </h3>
                                </div>
                            </div>

                            <span
                                class="shrink-0 rounded-lg bg-gray-200 px-2.5 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-100">
                                <?php echo e(now()->year); ?>

                            </span>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leave_balance_left <= 0): ?>
                            <!-- Brak dostępnych dni -->
                            <div class="mt-7 rounded-xl bg-gray-200 p-4 dark:bg-gray-600/70">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-200 text-gray-600 dark:bg-gray-500 dark:text-white">
                                        <i class="fa-solid fa-calendar-xmark"></i>
                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                            Brak dostępnych dni
                                        </p>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                                            Nie masz obecnie pozostałego urlopu do wykorzystania.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <!-- Główna wartość -->
                            <div class="mt-7">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                    Pozostało Ci
                                </p>

                                <div class="mt-1 flex flex-wrap items-baseline gap-x-2 gap-y-1">
                                    <span
                                        class="text-4xl font-bold tracking-tight tabular-nums text-gray-900 dark:text-white sm:text-5xl">
                                        <?php echo e($leave_balance_left); ?>

                                    </span>

                                    <span class="text-base font-medium text-gray-500 dark:text-gray-200">
                                        <?php echo e($leave_balance_left == 1 ? 'dzień' : 'dni'); ?>

                                    </span>
                                </div>
                            </div>

                            <!-- Pasek wykorzystania -->
                            <div class="mt-6">
                                <div class="mb-2 flex items-center justify-between gap-3 text-sm">
                                    <span class="text-gray-600 dark:text-gray-200">
                                        Wykorzystano
                                    </span>

                                    <span class="font-semibold tabular-nums text-gray-900 dark:text-white">
                                        <?php echo e($usedDays); ?> z <?php echo e($totalDays); ?> dni
                                    </span>
                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-600" role="progressbar"
                                    aria-label="Wykorzystanie puli urlopowej" aria-valuemin="0" aria-valuemax="100"
                                    aria-valuenow="<?php echo e(round($usedPercentage)); ?>">
                                    <div class="h-full rounded-full bg-pink-500 transition-[width] duration-700 ease-out motion-reduce:transition-none dark:bg-pink-400"
                                        style="width: <?php echo e($usedPercentage); ?>%"></div>
                                </div>

                                <p class="mt-2 text-xs text-gray-500 dark:text-gray-300">
                                    <?php echo e(round($usedPercentage)); ?>% puli urlopowej wykorzystane
                                </p>
                            </div>

                            <!-- Szczegóły -->
                            <div
                                class="mt-6 divide-y divide-gray-200 border-t border-gray-200 dark:divide-gray-600 dark:border-gray-600">
                                <div class="flex items-center justify-between gap-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <span class="h-2 w-2 shrink-0 rounded-full bg-gray-400 dark:bg-gray-300"></span>
                                        <span class="text-sm text-gray-600 dark:text-gray-200">
                                            Przysługujący urlop
                                        </span>
                                    </div>

                                    <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                        <?php echo e($leave_balance->base_days); ?> dni
                                    </span>
                                </div>

                                <div class="flex items-center justify-between gap-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <span class="h-2 w-2 shrink-0 rounded-full bg-gray-400 dark:bg-gray-300"></span>
                                        <span class="text-sm text-gray-600 dark:text-gray-200">
                                            Zaległy urlop
                                        </span>
                                    </div>

                                    <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                        <?php echo e($leave_balance->carried_over); ?> dni
                                    </span>
                                </div>

                                <div class="flex items-center justify-between gap-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <span class="h-2 w-2 shrink-0 rounded-full bg-pink-400"></span>
                                        <span class="text-sm text-gray-600 dark:text-gray-200">
                                            Wykorzystany urlop
                                        </span>
                                    </div>

                                    <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                        <?php echo e($leave_balance->used_days); ?> dni
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </section>
</div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                                <div class="md:col-span-2 md:-m-4">
                                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar-view', ['userId' => ''.e($user->id).'']);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1252090871-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal4423901be02fedd5bb71d35cba54805f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4423901be02fedd5bb71d35cba54805f = $attributes; } ?>
<?php $component = WireUi\View\Components\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'py-2 mt-4']); ?>
                    Utworzono <?php echo e($user->created_at); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $attributes = $__attributesOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__attributesOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $component = $__componentOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__componentOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal4423901be02fedd5bb71d35cba54805f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4423901be02fedd5bb71d35cba54805f = $attributes; } ?>
<?php $component = WireUi\View\Components\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'py-2']); ?>
                    Ostatnia aktualizacja <?php echo e($user->updated_at); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $attributes = $__attributesOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__attributesOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $component = $__componentOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__componentOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc)): ?>
<?php $attributes = $__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc; ?>
<?php unset($__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc)): ?>
<?php $component = $__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc; ?>
<?php unset($__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc); ?>
<?php endif; ?>
            <!--CONTENT-->

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $attributes = $__attributesOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $component = $__componentOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__componentOriginal6d34ed0eb01a1886d57455f1550df787); ?>
<?php endif; ?>
        <!--MAIN-->

    <?php else: ?>
        <?php echo $__env->make('admin.elements.end_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\user\show.blade.php ENDPATH**/ ?>