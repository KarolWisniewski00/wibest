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
            <div class="p-4 md:p-0">
                <!--HEADER-->
                <div class="flex flex-col w-full md:pt-4 md:px-4">
                    <?php if (isset($component)) { $__componentOriginala11698e65f4c338ad73b109bcde1f4a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala11698e65f4c338ad73b109bcde1f4a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.h1-display','data' => ['class' => 'text-center md:text-start mb-4 md:mb-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h1-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-center md:text-start mb-4 md:mb-0']); ?>
                        👋 Cześć, <?php echo e(auth()->user()->name); ?>!
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
                <!--HEADER-->

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($date['isHoliday'] == true): ?>
                    <!--ŚUW -->
                    <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginalef4ef35063054ed2c516ded023a4a6da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef4ef35063054ed2c516ded023a4a6da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.widget-display-nav','data' => ['class' => 'grid grid-cols-1 gap-4 p-4 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('widget-display-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'grid grid-cols-1 gap-4 p-4 w-full']); ?>
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
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
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['id' => 'dateWidget','class' => 'dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dateWidget','class' => 'dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300']); ?>
                                        <!-- Data -->
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

                                <!-- Timer -->
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
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']); ?>
                                        <div class="flex flex-row gap-2 justify-start items-center">
                                            <div class="text-7xl mx-2">🎌</div>
                                            <div class="flex flex-col gap-2 items-center md:items-start">
                                                <div
                                                    class="text-2xl inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 mb-1">
                                                    Święto ustawowo wolne</div>
                                                <span
                                                    class="px-3 py-1 rounded-full text-md w-fit font-semibold bg-rose-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-rose-200 dark:hover:bg-rose-400 focus:bg-rose-200 dark:focus:bg-rose-300 active:bg-rose-200 dark:active:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    ŚUW
                                                </span>
                                            </div>
                                        </div>
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
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef4ef35063054ed2c516ded023a4a6da)): ?>
<?php $attributes = $__attributesOriginalef4ef35063054ed2c516ded023a4a6da; ?>
<?php unset($__attributesOriginalef4ef35063054ed2c516ded023a4a6da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef4ef35063054ed2c516ded023a4a6da)): ?>
<?php $component = $__componentOriginalef4ef35063054ed2c516ded023a4a6da; ?>
<?php unset($__componentOriginalef4ef35063054ed2c516ded023a4a6da); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $attributes = $__attributesOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $component = $__componentOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__componentOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
                    <!--ŚUW -->
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($date['leave'] == null): ?>
                    <!--START STOP + ZDARZENIA -->
                    <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginalef4ef35063054ed2c516ded023a4a6da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef4ef35063054ed2c516ded023a4a6da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.widget-display-nav','data' => ['class' => 'mb-4 grid grid-cols-1 md:grid-cols-2 gap-4 p-4 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('widget-display-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4 grid grid-cols-1 md:grid-cols-2 gap-4 p-4 w-full']); ?>
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="flex flex-col justify-center gap-4">
                                <!-- Data -->
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
                                    <div id="loaderDateWidget"
                                        class="h-6 rounded-lg bg-gray-200 dark:bg-gray-600 w-32 mx-auto animate-pulse">
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['id' => 'dateWidget','class' => 'dateWidget text-md md:text-xl text-gray-600 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dateWidget','class' => 'dateWidget text-md md:text-xl text-gray-600 dark:text-gray-300']); ?>
                                        <!-- Data -->
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

                                <!-- Timer -->
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
                                    <div id="loaderClockWidget"
                                        class="h-12 rounded-lg bg-gray-200 dark:bg-gray-600 w-40 mx-auto animate-pulse">
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['id' => 'timerWidget','class' => 'hidden text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'timerWidget','class' => 'hidden text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']); ?>
                                        00:00:00
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
                                <div id="statusWrapper"
                                    class="md:w-fit md:mx-auto inline-flex items-center px-4 py-1.5 rounded-full bg-gray-100 dark:bg-gray-500/10 border border-gray-200 dark:border-gray-500/20">
                                    <span class="relative flex size-3">
                                        <span id="statusPing"
                                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-gray-300 opacity-75"></span>
                                        <span id="statusDot"
                                            class="relative inline-flex size-3 rounded-full bg-gray-300"></span>
                                    </span>
                                    <span id="statusText"
                                        class="mx-auto pr-3 md:pl-3 text-[0.7rem] uppercase tracking-[0.25em] font-bold text-gray-700 dark:text-gray-300">
                                        Ładowanie
                                    </span>
                                </div>
                                <div id="loaderPlaningWrapper"
                                    class="h-[55px] rounded-lg bg-gray-200 dark:bg-gray-600 w-[137px] mx-auto animate-pulse">
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($workingSeconds != 0): ?>
                                    <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => ['id' => 'planingWrapper','class' => 'flex-col hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'planingWrapper','class' => 'flex-col hidden']); ?>
                                        <div
                                            class="h-fit flex flex-row items-center justify-center text-center w-fit
                                                                                                                                                                                                                                            rounded-2xl
                                                                                                                                                                                                                                            transition-colors duration-200">

                                            <!-- Ikona i etykieta -->
                                            <div class="flex flex-col items-center justify-center h-full">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($typePlaning == 'stały planing'): ?>
                                                    <span class="text-2xl">🏢</span>
                                                    <span
                                                        class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                                                                                                                                                                                                                                        bg-blue-300 text-gray-900 uppercase tracking-widest">
                                                        Grafik
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-2xl">🌀</span>
                                                    <span
                                                        class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                                                                                                                                                                                                                                        bg-violet-300 text-gray-900 uppercase tracking-widest">
                                                        Grafik
                                                    </span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                            <div>
                                                <!-- Dane szczegółowe -->
                                                <div
                                                    class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                                                    <div class="font-semibold tracking-widest uppercase">
                                                        <?php echo e($workingStart ? $workingStart->format('H:i') : ''); ?>

                                                        –
                                                        <?php echo e($workingEnd ? $workingEnd->format('H:i') : ''); ?>

                                                    </div>
                                                </div>

                                                <!-- Opis -->
                                                <p
                                                    class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-100 tracking-wide uppercase">
                                                    <?php echo e(gmdate('H:i:s', $workingSeconds)); ?>

                                                </p>
                                            </div>
                                        </div>
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
                                <?php else: ?>

                                    <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => ['id' => 'planingWrapper','class' => 'flex-col hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'planingWrapper','class' => 'flex-col hidden']); ?>

                                        <div
                                            class="h-fit flex flex-row items-center justify-center text-center w-fit
                                                                                                       rounded-2xl transition-colors duration-200">

                                            <!-- Ikona i etykieta -->
                                            <div class="flex flex-col items-center justify-center h-full">

                                                <span class="text-3xl">🏖️</span>

                                            </div>

                                            <!-- Informacja -->
                                            <div class="ml-3">

                                                <p
                                                    class="text-sm md:text-base font-bold text-gray-800 dark:text-gray-100
                                                                                                               uppercase tracking-widest">
                                                    Dziś masz wolne
                                                </p>

                                                <p
                                                    class="mt-1 text-[0.65rem] md:text-xs font-semibold
                                                                                                               text-gray-500 dark:text-gray-400 tracking-wide">
                                                    Nie masz zaplanowanej pracy
                                                </p>

                                            </div>

                                        </div>

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

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Prawa kolumna: Przyciski -->
                            <div class="flex flex-col justify-center items-center">
                                <div id="loaderTimerWidget"
                                    class="h-[66px] rounded-lg bg-gray-200 dark:bg-gray-600 w-[179px] mx-auto animate-pulse">
                                </div>
                                <button id="startButtonWidget"
                                    class="w-[179px] hidden text-2xl min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-green-300 text-gray-900 dark:bg-green-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-green-200 dark:hover:bg-green-400 focus:bg-green-200 dark:focus:bg-green-300 active:bg-green-200 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-play mr-2"></i>Start
                                </button>
                                <!-- Przycisk Stop -->
                                <button id="stopButtonWidget"
                                    class="w-[179px] hidden text-2xl  min-h-[34px] whitespace-nowrap inline-flex items-center px-8 py-4 bg-red-300 text-gray-900 dark:bg-red-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-red-200 dark:hover:bg-red-400 focus:bg-red-200 dark:focus:bg-red-300 active:bg-red-200 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-stop mr-2"></i>Stop
                                </button>
                            </div>
                            <!-- ========================================================= -->
                            <!-- NOTATKA DO ZEGARA                                         -->
                            <!-- ========================================================= -->

                            <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

                            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>


                            <style>
                                /* ========================================================= */
                                /* PANEL NOTATKI                                             */
                                /* ========================================================= */

                                #clockNotePanel {
                                    /*
                                             * WAŻNE:
                                             * jQuery steruje display:none / block.
                                             */
                                    display: none;
                                }


                                /* ========================================================= */
                                /* QUILL                                                      */
                                /* ========================================================= */

                                #clockNoteEditor {
                                    border: 0 !important;

                                    overflow: hidden;

                                    border-radius: 0.375rem;
                                }


                                .ql-toolbar {
                                    border: 0 !important;
                                    background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                                    border-radius: 0.375rem;
                                    overflow-y: auto;
                                    padding: 8px 12px !important;
                                    margin: 0 !important;
                                }


                                #clockNoteEditor .ql-container {
                                    border: 0 !important;

                                    background-color: #ffffff;
                                }


                                #clockNoteEditor .ql-editor {
                                    min-height: 90px;

                                    padding: 12px !important;

                                    font-family: inherit;

                                    font-size: 14px;

                                    line-height: 1.5;

                                    color: #1f2937;
                                    background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                                }


                                #clockNoteEditor .ql-editor.ql-blank::before {
                                    left: 12px;

                                    color: #9ca3af;

                                    font-style: normal;
                                }


                                /* ========================================================= */
                                /* QUILL DARK                                                 */
                                /* ========================================================= */
                                @media (prefers-color-scheme: dark) {
                                    .ql-toolbar {
                                        background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                    }

                                    #clockNoteEditor .ql-container {
                                        background-color: #374151;
                                    }


                                    #clockNoteEditor .ql-editor {
                                        background-color: #374151;

                                        color: #ffffff;
                                    }


                                    #clockNoteEditor .ql-editor.ql-blank::before {
                                        color: #9ca3af;
                                    }


                                    #clockNoteEditor .ql-stroke {
                                        stroke: #ffffff !important;
                                    }


                                    #clockNoteEditor .ql-fill {
                                        fill: #ffffff !important;
                                    }


                                    #clockNoteEditor .ql-picker {
                                        color: #ffffff !important;
                                    }

                                    .ql-italic .ql-stroke {
                                        stroke: white !important;
                                    }

                                    .ql-underline .ql-stroke {
                                        stroke: white !important;
                                    }

                                    .ql-bold .ql-stroke {
                                        stroke: white !important;
                                    }
                                }
                            </style>


                            <!-- ========================================================= -->
                            <!-- HTML                                                       -->
                            <!-- ========================================================= -->

                            <div id="clockNoteWrapper" class="hidden mt-4 md:col-span-2 flex flex-col items-center justify-center md:justify-start md:items-start w-full">

                                <!-- PRZYCISK -->
                                <?php if (isset($component)) { $__componentOriginalc1a6ce59269b398a58355de0e352bfae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1a6ce59269b398a58355de0e352bfae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-neutral','data' => ['type' => 'button','id' => 'clockNoteToggle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','id' => 'clockNoteToggle']); ?>

                                    <i id="clockNoteIcon" class="fa-regular fa-note-sticky mr-2"></i>

                                    <span id="clockNoteToggleText">
                                        Dodaj notatkę
                                    </span>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $attributes = $__attributesOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $component = $__componentOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__componentOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>


                                <!-- PANEL NOTATKI -->
                                <div id="clockNotePanel" class="bg-white dark:bg-gray-800 p-4 rounded-lg mt-4 w-full">

                                    <form id="clockNoteForm" method="POST" class="space-y-4"
                                        action="<?php echo e($work_session ? route('rcp.work-session.update.note', $work_session) : route('rcp.work-session.update.note', '')); ?>">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>


                                        <!-- EDYTOR -->
                                        <div id="clockNoteEditor"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session): ?> <?php echo $work_session->notes; ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>


                                        <!-- UKRYTE POLE -->
                                        <textarea id="clockNoteContent" name="content" style="display: none;"></textarea>


                                        <!-- ZAPISZ -->
                                        <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit','id' => 'clockNoteSave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','id' => 'clockNoteSave']); ?>

                                            <i class="fa-solid fa-check mr-2"></i>

                                            <span>
                                                Zapisz
                                            </span>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>

                                    </form>

                                </div>

                            </div>


                            <!-- ========================================================= -->
                            <!-- JAVASCRIPT                                                 -->
                            <!-- ========================================================= -->

                            <script>

                                $(document).ready(function () {

                                    /*
                                     * ======================================================
                                     * QUILL
                                     * ======================================================
                                     */

                                    const clockNoteQuill = new Quill('#clockNoteEditor', {

                                        theme: 'snow',

                                        placeholder: 'Dodaj notatkę...',

                                        modules: {

                                            toolbar: [
                                                [
                                                    'bold',
                                                    'italic',
                                                    'underline'
                                                ]
                                            ]

                                        }

                                    });


                                    /*
                                     * ======================================================
                                     * OTWIERANIE / ZAMYKANIE
                                     * ======================================================
                                     */

                                    $('#clockNoteToggle').on('click', function () {

                                        const $panel = $('#clockNotePanel');

                                        const $text = $('#clockNoteToggleText');

                                        const $icon = $('#clockNoteIcon');


                                        /*
                                         * OTWIERANIE
                                         */

                                        if (!$panel.is(':visible')) {

                                            $panel
                                                .stop(true, true)
                                                .slideDown(200);


                                            $text.text('Ukryj notatkę');


                                            $icon
                                                .removeClass('fa-regular fa-note-sticky')
                                                .addClass('fa-solid fa-chevron-up');


                                            /*
                                             * Focus po zakończeniu animacji
                                             */

                                            setTimeout(function () {

                                                clockNoteQuill.focus();

                                            }, 220);

                                        }


                                        /*
                                         * ZAMYKANIE
                                         */

                                        else {

                                            $panel
                                                .stop(true, true)
                                                .slideUp(200);


                                            $text.text('Dodaj notatkę');


                                            $icon
                                                .removeClass('fa-solid fa-chevron-up')
                                                .addClass('fa-regular fa-note-sticky');

                                        }

                                    });


                                    /*
                                     * ======================================================
                                     * ZAPIS NOTATKI
                                     * ======================================================
                                     */

                                    $('#clockNoteForm').on('submit', function (e) {

                                        /*
                                         * Sprawdzamy czy coś wpisano
                                         */

                                        const noteText = clockNoteQuill
                                            .getText()
                                            .trim();


                                        /*
                                         * Pusta notatka
                                         */

                                        if (noteText === '') {

                                            e.preventDefault();

                                            clockNoteQuill.focus();

                                            return false;
                                        }


                                        /*
                                         * Przekazujemy HTML Quilla
                                         * do textarea
                                         */

                                        $('#clockNoteContent').val(
                                            clockNoteQuill.root.innerHTML
                                        );

                                    });

                                });

                            </script>


                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef4ef35063054ed2c516ded023a4a6da)): ?>
<?php $attributes = $__attributesOriginalef4ef35063054ed2c516ded023a4a6da; ?>
<?php unset($__attributesOriginalef4ef35063054ed2c516ded023a4a6da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef4ef35063054ed2c516ded023a4a6da)): ?>
<?php $component = $__componentOriginalef4ef35063054ed2c516ded023a4a6da; ?>
<?php unset($__componentOriginalef4ef35063054ed2c516ded023a4a6da); ?>
<?php endif; ?>
                        <div id="clock_info" class="hidden mb-4 italic text-xs text-gray-500 dark:text-gray-500 !text-center">
                            Ładowanie...
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($task): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session && $work_session->task_id): ?>
                                <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'mt-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
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
                                            Zdarzenie
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
                                        <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                            🎯 Zadanie
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
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
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->task->status != null): ?>
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
                                                Status
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
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->task->status == 'oczekujące'): ?>
                                                <?php if (isset($component)) { $__componentOriginal24bb47aeb85068c803bc2d06015e82e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal24bb47aeb85068c803bc2d06015e82e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-yellow','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-yellow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                                    🟡 <?php echo e($work_session->task->status); ?>

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
                                            <?php elseif($work_session->task->status == 'zaakceptowane'): ?>
                                                <?php if (isset($component)) { $__componentOriginalacff8abfabbd819906b3ce44188b3d6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                                    🟢 <?php echo e($work_session->task->status); ?>

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
                                            <?php elseif($work_session->task->status == 'odrzucone'): ?>
                                                <?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal947044007d39ee7c972d0c3546688661 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                                    🔴 <?php echo e($work_session->task->status); ?>

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
                                            Treść
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
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->task): ?>
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
                                                <div
                                                    class="text-gray-600 dark:text-gray-300 text-2xl tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                                                    <?php echo $work_session->task->note; ?>

                                                </div>
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
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                    <!--Czas w pracy-->
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
                                            Kiedy
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
                                                    <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $work_session->task->time)->format('d.m.Y H:i:s') ?? ''); ?>

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
                                    <!--Czas w pracy-->
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
                                <div class="grid grid-cols-1 gap-4 w-full p-4 mt-4 border-2 dark:border-gray-700 rounded-lg">
                                    <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                        🎯 Zadanie
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
                                    <!--POWRÓT-->
                                    <form id="myForm" method="POST" action="<?php echo e(route('rcp.work-session.store.task', $work_session)); ?>"
                                        class="space-y-4">
                                        <?php echo csrf_field(); ?>
                                        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                                        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
                                        <style>
                                            #editor {
                                                border: 0;
                                                height: min-content;
                                            }

                                            .ql-toolbar {
                                                border: 0 !important;
                                                background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                                                border-radius: 0.375rem;
                                                overflow-y: auto;
                                                padding: 8px 12px !important;
                                                margin: 0 !important;
                                            }

                                            .ql-editor {
                                                background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                                                padding: 8px 12px !important;
                                            }

                                            @media (prefers-color-scheme: dark) {
                                                .ql-toolbar {
                                                    background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                                }

                                                .ql-editor {
                                                    background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                                }

                                                .ql-editor.ql-blank::before {
                                                    color: #9ca3af;
                                                    /* Tailwind gray-400 */
                                                }

                                                .ql-toolbar {
                                                    background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                                                }

                                                .ql-italic .ql-stroke {
                                                    stroke: white !important;
                                                }

                                                .ql-underline .ql-stroke {
                                                    stroke: white !important;
                                                }

                                                .ql-bold .ql-stroke {
                                                    stroke: white !important;
                                                }

                                                .ql-fill {
                                                    fill: white !important;
                                                }

                                                .ql-italic:hover .ql-stroke {
                                                    stroke: #9ca3af !important;
                                                }

                                                .ql-underline:hover .ql-stroke {
                                                    stroke: #9ca3af !important;
                                                }

                                                .ql-bold:hover .ql-stroke {
                                                    stroke: #9ca3af !important;
                                                }

                                                .ql-underline:hover .ql-fill {
                                                    fill: #9ca3af !important;
                                                }
                                            }
                                        </style>
                                        <div id="editor"
                                            class="bg-white dark:bg-gray-700 dark:text-white rounded-md h-fit overflow-y-auto">

                                        </div>

                                        <textarea id="editor-content" name="content" style="display:none;"></textarea>
                                        <script>
                                            const quill = new Quill('#editor', {
                                                theme: 'snow',
                                                placeholder: '👈 Wpisz tutaj treść...',
                                                modules: {
                                                    toolbar: [
                                                        ['bold', 'italic', 'underline'],
                                                    ]
                                                }
                                            });
                                            // Synchronizuj zawartość edytora z ukrytym polem tekstowym
                                            document.getElementById('myForm').onsubmit = function () {
                                                var editorContent = document.getElementById('editor-content');
                                                editorContent.value = quill.root.innerHTML;
                                            };
                                        </script>
                                        <div class="flex justify-end mt-4">
                                            <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'text-lg']); ?>
                                                <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <!--
                                                            <div  class="w-full grid grid-cols-2 gap-4">

                                                                START LOCATION 
                                                                <div
                                                                    class="min-w-0 rounded-lg bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 overflow-hidden">

                                                                    MAPA 
                                                                    <div id="startMapWidget" class="w-full h-32 sm:h-48 bg-gray-200 dark:bg-gray-700"></div>

                                                                    INFORMACJE
                                                                    <div class="p-3 sm:p-4">

                                                                        NAGŁÓWEK
                                                                        <div class="flex items-center justify-between gap-2 mb-4">

                                                                            <div class="flex items-center gap-2 min-w-0">

                                                                                <div
                                                                                    class="w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-300">
                                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                                </div>

                                                                                <div class="min-w-0">

                                                                                    <p
                                                                                        class="text-xs uppercase tracking-wider font-bold text-gray-500 dark:text-gray-400">
                                                                                        Start
                                                                                    </p>

                                                                                    GODZINA
                                                                                    <span
                                                                                        class="inline-flex items-center whitespace-nowrap text-cello-300 dark:text-cello-300 font-semibold text-xs sm:text-sm">
                                                                                        <i class="fa-regular fa-clock mr-1"></i>
                                                                                        <span id="startTimeWidget">
                                                                                        </span>
                                                                                    </span>

                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                        ADRES
                                                                        <div class="mb-3">

                                                                            <p
                                                                                class="text-xs uppercase tracking-wider font-semibold text-gray-400 dark:text-gray-500 mb-1">
                                                                                Adres
                                                                            </p>

                                                                            <p id="startAddressWidget"
                                                                                class="text-sm font-semibold text-gray-700 dark:text-gray-200 leading-5 break-words">
                                                                                ul. Floriańska 1, Kraków
                                                                            </p>

                                                                        </div>


                                                                        WSPÓŁRZĘDNE
                                                                        <div class="flex items-center gap-2 min-w-0">

                                                                            <i
                                                                                class="fa-solid fa-location-crosshairs text-gray-400 dark:text-gray-500 text-sm flex-shrink-0"></i>

                                                                            <p id="locationGeoStart" class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                                                                50.06, 19.94
                                                                            </p>

                                                                        </div>


                                                                        DOKŁADNOŚĆ
                                                                        <div class="flex items-center gap-2 mt-1 min-w-0">

                                                                            <i
                                                                                class="fa-solid fa-bullseye text-gray-400 dark:text-gray-500 text-sm flex-shrink-0"></i>

                                                                            <p id="locationAccStart" class="text-xs text-gray-400 dark:text-gray-500 truncate">
                                                                                35 m
                                                                            </p>

                                                                        </div>

                                                                    </div>

                                                                </div>


                                                                STOP LOCATION
                                                                <div
                                                                    class="min-w-0 rounded-lg bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 overflow-hidden">

                                                                    MAPA
                                                                    <div id="stopMapWidget" class="w-full h-32 sm:h-48 bg-gray-200 dark:bg-gray-700"></div>

                                                                    INFORMACJE
                                                                    <div class="p-3 sm:p-4">

                                                                        NAGŁÓWEK
                                                                        <div class="flex items-center justify-between gap-2 mb-4">

                                                                            <div class="flex items-center gap-2 min-w-0">

                                                                                <div
                                                                                    class="w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-300">
                                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                                </div>

                                                                                <div class="min-w-0">

                                                                                    <p
                                                                                        class="text-xs uppercase tracking-wider font-bold text-gray-500 dark:text-gray-400">
                                                                                        Stop
                                                                                    </p>

                                                                                    GODZINA
                                                                                    <span
                                                                                        class="inline-flex items-center whitespace-nowrap text-cello-300 dark:text-cello-300 font-semibold text-xs sm:text-sm">
                                                                                        <i class="fa-regular fa-clock mr-1"></i>
                                                                                        <span id="stopTimeWidget">
                                                                                        </span>
                                                                                    </span>

                                                                                </div>

                                                                            </div>

                                                                        </div>


                                                                        ADRES
                                                                        <div class="mb-3">

                                                                            <p
                                                                                class="text-xs uppercase tracking-wider font-semibold text-gray-400 dark:text-gray-500 mb-1">
                                                                                Adres
                                                                            </p>

                                                                            <p id="stopAddressWidget"
                                                                                class="text-sm font-semibold text-gray-700 dark:text-gray-200 leading-5 break-words">
                                                                                ul. Szewska 12, Kraków
                                                                            </p>

                                                                        </div>


                                                                        WSPÓŁRZĘDNE
                                                                        <div class="flex items-center gap-2 min-w-0">

                                                                            <i
                                                                                class="fa-solid fa-location-crosshairs text-gray-400 dark:text-gray-500 text-sm flex-shrink-0"></i>

                                                                            <p id="locationGeoStop" class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                                                                50.06, 19.93
                                                                            </p>

                                                                        </div>


                                                                        DOKŁADNOŚĆ
                                                                        <div class="flex items-center gap-2 mt-1 min-w-0">

                                                                            <i
                                                                                class="fa-solid fa-bullseye text-gray-400 dark:text-gray-500 text-sm flex-shrink-0"></i>

                                                                            <p id="locationAccStop" class="text-xs text-gray-400 dark:text-gray-500 truncate">
                                                                                28 m
                                                                            </p>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                            -->
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $attributes = $__attributesOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $component = $__componentOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__componentOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
                    <!--START STOP + ZDARZENIA -->
                <?php elseif($date['leave'] != null): ?>
                    <!-- WNIOSEK -->
                    <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginalef4ef35063054ed2c516ded023a4a6da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalef4ef35063054ed2c516ded023a4a6da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.widget-display-nav','data' => ['class' => 'grid grid-cols-1 gap-4 p-4 w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('widget-display-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'grid grid-cols-1 gap-4 p-4 w-full']); ?>
                            <!-- Lewa kolumna: Data i Timer -->
                            <div class="space-y-6 flex flex-col justify-center">
                                <!-- Data -->
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
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['id' => 'dateWidget','class' => 'dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'dateWidget','class' => 'dateWidget text-lg md:text-xl text-gray-600 dark:text-gray-300']); ?>
                                        <!-- Data -->
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

                                <!-- Timer -->
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
                                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-5xl md:text-6xl font-bold text-gray-900 dark:text-white']); ?>
                                        <div class="flex flex-row gap-2 justify-start items-center">
                                            <div class="text-7xl mx-2"><?php echo e(config('leavetypes.icons.' . $date['leave'], '')); ?>

                                            </div>
                                            <div class="flex flex-col gap-2 items-center md:items-start">
                                                <div
                                                    class="text-2xl inline-flex items-center text-gray-600 dark:text-gray-300 font-semibold uppercase tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 mb-1">
                                                    <?php echo e($date['leave'] ?? ''); ?>

                                                </div>
                                                <span
                                                    class="px-3 py-1 rounded-full text-md w-fit font-semibold bg-pink-300 text-gray-900 font-semibold uppercase tracking-widest hover:bg-pink-200 dark:hover:bg-pink-400 focus:bg-pink-200 dark:focus:bg-pink-300 active:bg-pink-200 dark:active:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <?php echo e(config('leavetypes.shortType.' . $date['leave'], '')); ?>

                                                </span>
                                            </div>
                                        </div>
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
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalef4ef35063054ed2c516ded023a4a6da)): ?>
<?php $attributes = $__attributesOriginalef4ef35063054ed2c516ded023a4a6da; ?>
<?php unset($__attributesOriginalef4ef35063054ed2c516ded023a4a6da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalef4ef35063054ed2c516ded023a4a6da)): ?>
<?php $component = $__componentOriginalef4ef35063054ed2c516ded023a4a6da; ?>
<?php unset($__componentOriginalef4ef35063054ed2c516ded023a4a6da); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $attributes = $__attributesOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $component = $__componentOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__componentOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
                    <!-- WNIOSEK -->
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div class="md:px-4 md:pb-4">
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
            </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\dashboard.blade.php ENDPATH**/ ?>