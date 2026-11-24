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
        <div x-data="{ open: false }">
            <div
                class="flex justify-end md:justify-start px-4 h-14 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 rounded-t-lg">
                <nav class="hidden md:flex gap-x-8 h-full" aria-label="Tabs" role="tablist"
                    aria-orientation="horizontal">
                    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['class' => 'h-full text-center','href' => ''.e(route('setting.client.show', $client)).'','active' => request()->routeIs('setting.client.show', $client)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full text-center','href' => ''.e(route('setting.client.show', $client)).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('setting.client.show', $client))]); ?>
                        Firma
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['class' => 'h-full text-center','href' => ''.e(route('setting.client.sms', $client)).'','active' => request()->routeIs('setting.client.sms', $client)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-full text-center','href' => ''.e(route('setting.client.sms', $client)).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('setting.client.sms', $client))]); ?>
                        Moduł SMS
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                </nav>
            </div>
        </div>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('setting.client')).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.client')).'','class' => 'text-lg']); ?>
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
                                <?php echo e($client->name); ?>

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
                                <?php echo e($client->adress); ?>

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
                                <?php echo e($client->vat_number); ?>

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
                    <!--Aktualna ilość użytkowników-->
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
                            Aktualna ilość użytkowników
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
                                <span class="text-2xl">👤</span>
                                <?php echo e($client->getUsersCount()); ?>

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
                    <!--Aktualna ilość użytkowników-->
                    <!--Aktualna cena za użytkownika-->
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
                            Aktualna cena za użytkownika
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
                                <?php echo e($client->user_price ? number_format($client->user_price, 2) . ' PLN' : 'Brak ceny'); ?>

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
                    <!--Aktualna cena za użytkownika-->
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
                
<?php
    $company = $client;

    /*
    |--------------------------------------------------------------------------
    | AI - klasyfikacja
    |--------------------------------------------------------------------------
    */

    $classificationData = match ($company->ai_classification) {
        'ideal' => [
            'label' => 'Idealny klient',
            'icon' => 'fa-solid fa-star',
            'color' => 'green',
        ],
        'potential' => [
            'label' => 'Potencjalny klient',
            'icon' => 'fa-solid fa-chart-simple',
            'color' => 'yellow',
        ],
        'weak' => [
            'label' => 'Słabe dopasowanie',
            'icon' => 'fa-solid fa-arrow-down',
            'color' => 'orange',
        ],
        'disqualified' => [
            'label' => 'Nie zakwalifikowany',
            'icon' => 'fa-solid fa-ban',
            'color' => 'red',
        ],
        'unknown' => [
            'label' => 'Brak danych',
            'icon' => 'fa-solid fa-circle-question',
            'color' => 'gray',
        ],
        default => [
            'label' => 'Nie sklasyfikowano',
            'icon' => 'fa-solid fa-circle-question',
            'color' => 'gray',
        ],
    };
?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($classificationData['color'] === 'blue'): ?>

    <div class="relative overflow-hidden md:col-span-2 rounded-xl
                bg-blue-50 border border-blue-200
                dark:bg-blue-900/20 dark:border-blue-800/40
                px-5 py-4">

        
        <div class="absolute -right-5 -bottom-7 text-8xl
                    text-blue-500/10 dark:text-blue-400/10
                    pointer-events-none">
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
        </div>

        <div class="relative z-10">

            <div class="text-xs uppercase tracking-wider mb-3
                        text-blue-600/80 dark:text-blue-300/70">
                Klasyfikacja klienta
            </div>

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 min-w-[44px] rounded-lg
                            bg-blue-100 border border-blue-200
                            dark:bg-blue-900/40 dark:border-blue-700/30
                            flex items-center justify-center">

                    <i class="<?php echo e($classificationData['icon']); ?>

                              text-blue-600 dark:text-blue-300"></i>
                </div>

                <div class="min-w-0">

                    <div class="font-semibold text-gray-900 dark:text-white">
                        <?php echo e($classificationData['label']); ?>

                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Aktualizacja:
                            <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>

            </div>

        </div>

    </div>


<?php elseif($classificationData['color'] === 'green'): ?>

    <div class="relative overflow-hidden md:col-span-2 rounded-xl
                bg-green-50 border border-green-200
                dark:bg-green-900/20 dark:border-green-800/40
                px-5 py-4">

        
        <div class="absolute -right-5 -bottom-7 text-8xl
                    text-green-500/10 dark:text-green-400/10
                    pointer-events-none">
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
        </div>

        <div class="relative z-10">

            <div class="text-xs uppercase tracking-wider mb-3
                        text-green-700/80 dark:text-green-300/70">
                Klasyfikacja klienta
            </div>

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 min-w-[44px] rounded-lg
                            bg-green-100 border border-green-200
                            dark:bg-green-900/40 dark:border-green-700/30
                            flex items-center justify-center">

                    <i class="<?php echo e($classificationData['icon']); ?>

                              text-green-600 dark:text-green-300"></i>
                </div>

                <div class="min-w-0">

                    <div class="font-semibold text-gray-900 dark:text-white">
                        <?php echo e($classificationData['label']); ?>

                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Aktualizacja:
                            <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>

            </div>

        </div>

    </div>


<?php elseif($classificationData['color'] === 'red'): ?>

    <div class="relative overflow-hidden md:col-span-2 rounded-xl
                bg-red-50 border border-red-200
                dark:bg-red-900/20 dark:border-red-800/40
                px-5 py-4">

        
        <div class="absolute -right-5 -bottom-7 text-8xl
                    text-red-500/10 dark:text-red-400/10
                    pointer-events-none">
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
        </div>

        <div class="relative z-10">

            <div class="text-xs uppercase tracking-wider mb-3
                        text-red-700/80 dark:text-red-300/70">
                Klasyfikacja klienta
            </div>

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 min-w-[44px] rounded-lg
                            bg-red-100 border border-red-200
                            dark:bg-red-900/40 dark:border-red-700/30
                            flex items-center justify-center">

                    <i class="<?php echo e($classificationData['icon']); ?>

                              text-red-600 dark:text-red-300"></i>
                </div>

                <div class="min-w-0">

                    <div class="font-semibold text-gray-900 dark:text-white">
                        <?php echo e($classificationData['label']); ?>

                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Aktualizacja:
                            <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>

            </div>

        </div>

    </div>


<?php elseif($classificationData['color'] === 'yellow'): ?>

    <div class="relative overflow-hidden md:col-span-2 rounded-xl
                bg-yellow-50 border border-yellow-200
                dark:bg-yellow-900/20 dark:border-yellow-800/40
                px-5 py-4">

        
        <div class="absolute -right-5 -bottom-7 text-8xl
                    text-yellow-500/10 dark:text-yellow-400/10
                    pointer-events-none">
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
        </div>

        <div class="relative z-10">

            <div class="text-xs uppercase tracking-wider mb-3
                        text-yellow-700/80 dark:text-yellow-300/70">
                Klasyfikacja klienta
            </div>

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 min-w-[44px] rounded-lg
                            bg-yellow-100 border border-yellow-200
                            dark:bg-yellow-900/40 dark:border-yellow-700/30
                            flex items-center justify-center">

                    <i class="<?php echo e($classificationData['icon']); ?>

                              text-yellow-600 dark:text-yellow-300"></i>
                </div>

                <div class="min-w-0">

                    <div class="font-semibold text-gray-900 dark:text-white">
                        <?php echo e($classificationData['label']); ?>

                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Aktualizacja:
                            <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>

            </div>

        </div>

    </div>


<?php elseif($classificationData['color'] === 'orange'): ?>

    <div class="relative overflow-hidden md:col-span-2 rounded-xl
                bg-orange-50 border border-orange-200
                dark:bg-orange-900/20 dark:border-orange-800/40
                px-5 py-4">

        
        <div class="absolute -right-5 -bottom-7 text-8xl
                    text-orange-500/10 dark:text-orange-400/10
                    pointer-events-none">
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
        </div>

        <div class="relative z-10">

            <div class="text-xs uppercase tracking-wider mb-3
                        text-orange-700/80 dark:text-orange-300/70">
                Klasyfikacja klienta
            </div>

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 min-w-[44px] rounded-lg
                            bg-orange-100 border border-orange-200
                            dark:bg-orange-900/40 dark:border-orange-700/30
                            flex items-center justify-center">

                    <i class="<?php echo e($classificationData['icon']); ?>

                              text-orange-600 dark:text-orange-300"></i>
                </div>

                <div class="min-w-0">

                    <div class="font-semibold text-gray-900 dark:text-white">
                        <?php echo e($classificationData['label']); ?>

                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Aktualizacja:
                            <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>

            </div>

        </div>

    </div>


<?php else: ?>

    
    <div class="relative overflow-hidden md:col-span-2 rounded-xl
                bg-gray-50 border border-gray-200
                dark:bg-gray-700/40 dark:border-gray-600/40
                px-5 py-4">

        
        <div class="absolute -right-5 -bottom-7 text-8xl
                    text-gray-400/10 dark:text-gray-400/10
                    pointer-events-none">
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
        </div>

        <div class="relative z-10">

            <div class="text-xs uppercase tracking-wider mb-3
                        text-gray-500 dark:text-gray-400">
                Klasyfikacja klienta
            </div>

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 min-w-[44px] rounded-lg
                            bg-gray-100 border border-gray-200
                            dark:bg-gray-700 dark:border-gray-600/30
                            flex items-center justify-center">

                    <i class="<?php echo e($classificationData['icon']); ?>

                              text-gray-500 dark:text-gray-300"></i>
                </div>

                <div class="min-w-0">

                    <div class="font-semibold text-gray-900 dark:text-white">
                        <?php echo e($classificationData['label']); ?>

                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Aktualizacja:
                            <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>

            </div>

        </div>

    </div>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-100 md:col-span-2">
                    <span>📊</span> Wykres Użytkowników
                </h1>
                <div class="flex justify-between items-center md:col-span-2">
                    <span id="yearLabel"
                        class="text-md md:text-lg font-bold text-gray-900 dark:text-white"><?php echo e($year); ?></span>
                    <div class="space-x-2 md:space-x-0">
                        <button id="prevYear" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                            type="button">
                            <i class="fa-solid fa-chevron-left"></i><span class=" mx-1">pop</span>
                        </button>
                        <button id="nextYear" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                            type="button">
                            <span class=" mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'md:col-span-2 !bg-gray-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'md:col-span-2 !bg-gray-100']); ?>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <input type="hidden" id="chart-labels" value='<?php echo json_encode($labels, 15, 512) ?>'>
                    <input type="hidden" id="chart-data" value='<?php echo json_encode($data, 15, 512) ?>'>
                    <input type="hidden" id="current-year" value="<?php echo e($year ?? date('Y')); ?>">
                    <canvas style="background-color: rgb(243 244 246);" id="myChart" width="400" height="200"></canvas>

                    <script>
                        $(document).ready(function () {
                            const labels = JSON.parse($('#chart-labels').val());
                            const data = JSON.parse($('#chart-data').val());
                            const ctx = document.getElementById('myChart').getContext('2d');

                            const myChart = new Chart(ctx, {
                                type: 'line', // typ wykresu: bar, line, pie itd.
                                data: {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'Aktywni użytkownicy',
                                            data: data.active,
                                            borderColor: 'rgba(134, 239, 172, 1)', // Zielony
                                            backgroundColor: 'rgba(134, 239, 172, 0.1)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            fill: true
                                        },
                                        {
                                            label: 'Rozpoczęcia/Zakończenia pracy',
                                            data: data.hiring,
                                            borderColor: 'rgba(147, 197, 253, 1)', // Niebieski
                                            backgroundColor: 'rgba(147, 197, 253, 0.1)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            fill: true
                                        },
                                        {
                                            label: 'Rozpoczęcia/Zakończenia naliczania',
                                            data: data.billing,
                                            borderColor: 'rgba(252, 165, 165, 1)', // Czerwony
                                            backgroundColor: 'rgba(252, 165, 165, 0.1)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            fill: true
                                        }
                                    ]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });

                            let currentYear = $('#current-year').val();


                            $('#prevYear').on('click', function () {
                                currentYear = parseInt(currentYear) - 1;
                                loadChartData(currentYear);
                            });

                            $('#nextYear').on('click', function () {
                                currentYear = parseInt(currentYear) + 1;
                                loadChartData(currentYear);
                            });


                            function loadChartData(year) {
                                $.ajax({
                                    url: '<?php echo e(route('api.v1.setting.user.stats')); ?>',
                                    method: 'GET',
                                    data: { year: year }, // Przekazujemy rok
                                    success: function (response) {
                                        myChart.data.labels = response.labels;

                                        // Aktualizacja poszczególnych linii
                                        myChart.data.datasets[0].data = response.data.active;
                                        myChart.data.datasets[1].data = response.data.hiring;
                                        myChart.data.datasets[2].data = response.data.billing;

                                        myChart.update();

                                        $('#totalUser').text(response.totalUser);
                                        $('#totalAmount').text(parseFloat(response.totalAmount).toFixed(2) + ' PLN');
                                        $('#yearLabel').text(year); // Aktualizacja etykiety roku
                                    }
                                });
                            }

                        });
                    </script>
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
                <?php if (isset($component)) { $__componentOriginalbeca410b003449fc279c14ce2c7a3f29 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbeca410b003449fc279c14ce2c7a3f29 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-header','data' => ['class' => 'px-0 grid gap-2 md:flex md:gap-0 md:justify-between md:col-span-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-0 grid gap-2 md:flex md:gap-0 md:justify-between md:col-span-2']); ?>
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
                        <span>👤</span> Użytkownicy
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => ['class' => 'flex-col xl:flex-row gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex-col xl:flex-row gap-2']); ?>
                        <?php if (isset($component)) { $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-green','data' => ['href' => ''.e(route('setting.user.create', $client)).'','class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.create', $client)).'','class' => 'text-xs']); ?>
                            <i class="fa-solid fa-plus mr-2"></i>Dodaj nowego użytkownika
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
                        <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('setting.user.create.for.crm', $client)).'','class' => 'w-full xl:w-min text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.create.for.crm', $client)).'','class' => 'w-full xl:w-min text-xs']); ?>
                            <i class="fa-solid fa-plus mr-2"></i>Dodaj nowego dla CRM
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
                <?php if (isset($component)) { $__componentOriginalb5d35cb55883e6a5739f51760b541537 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5d35cb55883e6a5739f51760b541537 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-scroll','data' => ['class' => 'md:col-span-2 !px-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-scroll'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'md:col-span-2 !px-0']); ?>
                    <!-- MOBILE VIEW -->
                    <?php if (isset($component)) { $__componentOriginal52edc5f3d6de46edf4e1debed7575931 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52edc5f3d6de46edf4e1debed7575931 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.list','data' => ['items' => $users_calc,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users_calc),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users_calc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginale3c749fc75365c6b0295b358a1416dde = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3c749fc75365c6b0295b358a1416dde = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-user-setting','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-user-setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3c749fc75365c6b0295b358a1416dde)): ?>
<?php $attributes = $__attributesOriginale3c749fc75365c6b0295b358a1416dde; ?>
<?php unset($__attributesOriginale3c749fc75365c6b0295b358a1416dde); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3c749fc75365c6b0295b358a1416dde)): ?>
<?php $component = $__componentOriginale3c749fc75365c6b0295b358a1416dde; ?>
<?php unset($__componentOriginale3c749fc75365c6b0295b358a1416dde); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52edc5f3d6de46edf4e1debed7575931)): ?>
<?php $attributes = $__attributesOriginal52edc5f3d6de46edf4e1debed7575931; ?>
<?php unset($__attributesOriginal52edc5f3d6de46edf4e1debed7575931); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52edc5f3d6de46edf4e1debed7575931)): ?>
<?php $component = $__componentOriginal52edc5f3d6de46edf4e1debed7575931; ?>
<?php unset($__componentOriginal52edc5f3d6de46edf4e1debed7575931); ?>
<?php endif; ?>

                    <!-- PC VIEW -->
                    <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['headers' => ['Nazwa', 'Data dołączenia', 'Data rozłączenia', 'Data rozpoczęcia pracy', 'Data zakończenia pracy', 'Rozpoczęcie naliczania', 'Zakończenie naliczania', 'Cena', 'Podgląd'],'items' => $users_calc,'checkBox' => false,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Nazwa', 'Data dołączenia', 'Data rozłączenia', 'Data rozpoczęcia pracy', 'Data zakończenia pracy', 'Rozpoczęcie naliczania', 'Zakończenie naliczania', 'Cena', 'Podgląd']),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users_calc),'checkBox' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users_calc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal9942f698e8135300d82417b3e9c918cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9942f698e8135300d82417b3e9c918cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.row-user-setting','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('row-user-setting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9942f698e8135300d82417b3e9c918cc)): ?>
<?php $attributes = $__attributesOriginal9942f698e8135300d82417b3e9c918cc; ?>
<?php unset($__attributesOriginal9942f698e8135300d82417b3e9c918cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9942f698e8135300d82417b3e9c918cc)): ?>
<?php $component = $__componentOriginal9942f698e8135300d82417b3e9c918cc; ?>
<?php unset($__componentOriginal9942f698e8135300d82417b3e9c918cc); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5d35cb55883e6a5739f51760b541537)): ?>
<?php $attributes = $__attributesOriginalb5d35cb55883e6a5739f51760b541537; ?>
<?php unset($__attributesOriginalb5d35cb55883e6a5739f51760b541537); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5d35cb55883e6a5739f51760b541537)): ?>
<?php $component = $__componentOriginalb5d35cb55883e6a5739f51760b541537; ?>
<?php unset($__componentOriginalb5d35cb55883e6a5739f51760b541537); ?>
<?php endif; ?>
            </div>

            <!--PRZYCISKI-->
            <div class="flex justify-end gap-4 mt-4">
                <!-- EDYTUJ -->
                <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('setting.client.edit', $client)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.client.edit', $client)).'']); ?>
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

                <!--USUŃ-->
                <form action="<?php echo e(route('setting.client.delete', $client)); ?>" method="POST"
                    onsubmit="return confirm('Czy na pewno chcesz usunąć tego klienta?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <?php if (isset($component)) { $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-red','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>
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
                Utworzono <?php echo e($client->created_at); ?>

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
                Utoworzono przez <?php echo e($client->created_user->name); ?>

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
                Ostatnia aktualizacja <?php echo e($client->updated_at); ?>

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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\client\show.blade.php ENDPATH**/ ?>