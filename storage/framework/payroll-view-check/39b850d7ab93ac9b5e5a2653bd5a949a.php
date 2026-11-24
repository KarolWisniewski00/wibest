<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12 pt-48">
        <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if (isset($component)) { $__componentOriginal6bbbefdc8a42261e71f81c133905a36e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bbbefdc8a42261e71f81c133905a36e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.old-school-nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('old-school-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6bbbefdc8a42261e71f81c133905a36e)): ?>
<?php $attributes = $__attributesOriginal6bbbefdc8a42261e71f81c133905a36e; ?>
<?php unset($__attributesOriginal6bbbefdc8a42261e71f81c133905a36e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6bbbefdc8a42261e71f81c133905a36e)): ?>
<?php $component = $__componentOriginal6bbbefdc8a42261e71f81c133905a36e; ?>
<?php unset($__componentOriginal6bbbefdc8a42261e71f81c133905a36e); ?>
<?php endif; ?>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('project')).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('project')).'','class' => 'text-lg']); ?>
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy projektów
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

                    <!--BODY-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <!--SPRZEDAJĄCY-->
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'px-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-0']); ?>
                            <!--NAZWA-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => ['class' => 'mx-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-4']); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <?php if (isset($component)) { $__componentOriginal4678d95cf11a514277943c24d379ed0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4678d95cf11a514277943c24d379ed0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-link-company','data' => ['href' => ''.e(route('setting')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-link-company'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting')).'']); ?>
                                        <?php echo e($project->client->name); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $attributes = $__attributesOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__attributesOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $component = $__componentOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__componentOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
                                </p>
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
                            <!--NAZWA-->

                            <!--ADRES-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => ['class' => 'mx-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-4']); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Adres
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($project->client->adress); ?>

                                </p>
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
                            <!--ADRES-->

                            <!--NIP-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => ['class' => 'mx-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-4']); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    NIP
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($project->client->vat_number); ?>

                                </p>
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
                        <!--SPRZEDAJĄCY-->

                        <!--DANE PROJEKTU-->
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'px-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-0']); ?>
                            <!--NAZWA-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => ['class' => 'mx-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-4']); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <?php if (isset($component)) { $__componentOriginal99d947271aefcc28e1756ce4031d7234 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99d947271aefcc28e1756ce4031d7234 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-link-project','data' => ['href' => ''.e(route('project.show', $project->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-link-project'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('project.show', $project->id)).'']); ?>
                                        <?php echo e($project->name); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99d947271aefcc28e1756ce4031d7234)): ?>
<?php $attributes = $__attributesOriginal99d947271aefcc28e1756ce4031d7234; ?>
<?php unset($__attributesOriginal99d947271aefcc28e1756ce4031d7234); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99d947271aefcc28e1756ce4031d7234)): ?>
<?php $component = $__componentOriginal99d947271aefcc28e1756ce4031d7234; ?>
<?php unset($__componentOriginal99d947271aefcc28e1756ce4031d7234); ?>
<?php endif; ?>
                                </p>
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
                            <!--NAZWA-->

                            <?php if (isset($component)) { $__componentOriginal81a79eb686c00d0008e8ed1102e56e37 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81a79eb686c00d0008e8ed1102e56e37 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.project-status-link','data' => ['project' => $project]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('project-status-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['project' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($project)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81a79eb686c00d0008e8ed1102e56e37)): ?>
<?php $attributes = $__attributesOriginal81a79eb686c00d0008e8ed1102e56e37; ?>
<?php unset($__attributesOriginal81a79eb686c00d0008e8ed1102e56e37); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81a79eb686c00d0008e8ed1102e56e37)): ?>
<?php $component = $__componentOriginal81a79eb686c00d0008e8ed1102e56e37; ?>
<?php unset($__componentOriginal81a79eb686c00d0008e8ed1102e56e37); ?>
<?php endif; ?>

                            <!--Domena-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => ['class' => 'mx-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-4']); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Domena
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <?php echo e($project->production_domain); ?>

                                </p>
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
                            <!--Domena-->

                            <!--Technologia-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => ['class' => 'mx-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mx-4']); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Technologia
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <?php echo e($project->technology); ?>

                                </p>
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
                            <!--Technologia-->
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
                        <!--DANE PROJEKTU-->
                    </div>
                    <!--BODY-->

                    <!--PRZYCISKI-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- EDYTUJ -->
                        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '']); ?>
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
                        <form action="" method="POST"
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

                    <!--PRZYCISKI-->
                    <div class="mt-8 md:flex justify-end items-center space-x-4">
                        <!--NOWA-->
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Oferty
                            </h1>
                            <a href="<?php echo e(route('offer.create.project', $project)); ?>" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-plus mr-2"></i>PRZYGOTUJ OFERTĘ
                            </a>
                        </div>
                        <!--NOWA-->
                    </div>
                    <!--PRZYCISKI-->

                    <!--COPY OFFER-->
                    <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Numer oferty
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Projekt
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Klient
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kwota netto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kwota brutto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Podgląd
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($offers->isEmpty()): ?>
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="7" class="px-6 py-4">
                                    <?php if (isset($component)) { $__componentOriginal4f50f2a61d06fe83eb24347cfd68191c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-place','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('empty-place'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c)): ?>
<?php $attributes = $__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c; ?>
<?php unset($__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f50f2a61d06fe83eb24347cfd68191c)): ?>
<?php $component = $__componentOriginal4f50f2a61d06fe83eb24347cfd68191c; ?>
<?php unset($__componentOriginal4f50f2a61d06fe83eb24347cfd68191c); ?>
<?php endif; ?>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php
                            $currentMonth = null; // Zmienna do śledzenia aktualnego miesiąca
                            $months = [
                            1 => 'Styczeń',
                            2 => 'Luty',
                            3 => 'Marzec',
                            4 => 'Kwiecień',
                            5 => 'Maj',
                            6 => 'Czerwiec',
                            7 => 'Lipiec',
                            8 => 'Sierpień',
                            9 => 'Wrzesień',
                            10 => 'Październik',
                            11 => 'Listopad',
                            12 => 'Grudzień'
                            ];
                            ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            // Pobieramy miesiąc z daty oferty (załóżmy, że jest polem issue_date)
                            $offerMonth = \Carbon\Carbon::parse($offer->issue_date)->month;

                            // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                            if ($offerMonth !== $currentMonth) {
                            $currentMonth = $offerMonth;
                            $monthName = $months[$offerMonth];
                            ?>
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <td colspan="7" class="px-6 py-4">
                                    <div class="flex items-center justify-start">
                                        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300"><?php echo e($monthName); ?></h2>
                                        <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <td class="px-3 py-2 min-w-48">
                                    <?php if (isset($component)) { $__componentOriginal324f477dcf5d94b53f32e187e4260389 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal324f477dcf5d94b53f32e187e4260389 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.offer-label','data' => ['offer' => $offer]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('offer-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['offer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($offer)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal324f477dcf5d94b53f32e187e4260389)): ?>
<?php $attributes = $__attributesOriginal324f477dcf5d94b53f32e187e4260389; ?>
<?php unset($__attributesOriginal324f477dcf5d94b53f32e187e4260389); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal324f477dcf5d94b53f32e187e4260389)): ?>
<?php $component = $__componentOriginal324f477dcf5d94b53f32e187e4260389; ?>
<?php unset($__componentOriginal324f477dcf5d94b53f32e187e4260389); ?>
<?php endif; ?>
                                </td>
                                <td class="px-3 py-2">

                                </td>
                                <td class="px-3 py-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($offer->client): ?>
                                    <p class="text-gray-900 dark:text-gray-50 font-semibold">
                                        <?php if (isset($component)) { $__componentOriginal4678d95cf11a514277943c24d379ed0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4678d95cf11a514277943c24d379ed0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-link-company','data' => ['href' => ''.e(route('client.show', $offer->client->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-link-company'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('client.show', $offer->client->id)).'']); ?>
                                            <?php echo e($offer->client->name); ?>

                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $attributes = $__attributesOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__attributesOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $component = $__componentOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__componentOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
                                    </p>
                                    <?php else: ?>
                                    <?php echo e($offer->buyer_name); ?>

                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </td>
                                <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                    <?php echo e($offer->subtotal); ?> zł
                                </td>
                                <td class="px-3 py-2 text-sm min-w-32 text-gray-700 dark:text-gray-50">
                                    <?php echo e($offer->total); ?> zł
                                </td>
                                <td class="px-3 py-2 text-sm min-w-32">
                                    <?php if (isset($component)) { $__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-status','data' => ['invoice' => $offer]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['invoice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($offer)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4)): ?>
<?php $attributes = $__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4; ?>
<?php unset($__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4)): ?>
<?php $component = $__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4; ?>
<?php unset($__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4); ?>
<?php endif; ?>
                                </td>
                                <td class="px-3 py-2">
                                    <a href="<?php echo e(route('invoice.show', $offer)); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tbody>
                    </table>
                    <!--COPY OFFER-->
                    <!--INFO-->
                    <div class="mt-8 flex flex-col w-full justify-end items-center">
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($project->user->name ?? ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($project->company->name ?? ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia klienta
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($project->created_at); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 py-4 border-b dark:border-gray-700 w-full">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji klienta
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($project->updated_at); ?>

                            </p>
                        </div>
                    </div>
                    <!--INFO-->
                </div>
            </div>
        </div>
        <!--END WIDGET TASK-->
    </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\project\show.blade.php ENDPATH**/ ?>