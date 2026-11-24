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
        <!--SIDE BAR-->
        <?php if (isset($component)) { $__componentOriginal93e260becef192ebdfafc9d931a5f07f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93e260becef192ebdfafc9d931a5f07f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar-left','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                <?php if (isset($component)) { $__componentOriginal33e4867731ced0462908f8cc78d5ea1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $attributes = $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $component = $__componentOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal7219ead2535a81e5eac025398deddfb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7219ead2535a81e5eac025398deddfb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-date','data' => ['loader' => 'leave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['loader' => 'leave']); ?>
                    <?php echo e(route('api.v1.leave.single.set.date')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7219ead2535a81e5eac025398deddfb8)): ?>
<?php $attributes = $__attributesOriginal7219ead2535a81e5eac025398deddfb8; ?>
<?php unset($__attributesOriginal7219ead2535a81e5eac025398deddfb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7219ead2535a81e5eac025398deddfb8)): ?>
<?php $component = $__componentOriginal7219ead2535a81e5eac025398deddfb8; ?>
<?php unset($__componentOriginal7219ead2535a81e5eac025398deddfb8); ?>
<?php endif; ?>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginala2285433e3139622ce37cb4bc0080863 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala2285433e3139622ce37cb4bc0080863 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-date-user','data' => ['loader' => 'leave']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-date-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['loader' => 'leave']); ?>
                    <?php echo e(route('api.v1.leave.single.set.date')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala2285433e3139622ce37cb4bc0080863)): ?>
<?php $attributes = $__attributesOriginala2285433e3139622ce37cb4bc0080863; ?>
<?php unset($__attributesOriginala2285433e3139622ce37cb4bc0080863); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala2285433e3139622ce37cb4bc0080863)): ?>
<?php $component = $__componentOriginala2285433e3139622ce37cb4bc0080863; ?>
<?php unset($__componentOriginala2285433e3139622ce37cb4bc0080863); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <input type="hidden" id="start_date" value="<?php echo e($startDate); ?>">
            <input type="hidden" id="end_date" value="<?php echo e($endDate); ?>">
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $attributes = $__attributesOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $component = $__componentOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__componentOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
        <!--SIDE BAR-->
        <?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal60ccd5bd713ec4042154745c4ba311c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal60ccd5bd713ec4042154745c4ba311c0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave.nav','data' => ['role' => $role,'leavePending' => $leavePending]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['role' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($role),'leavePending' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($leavePending)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal60ccd5bd713ec4042154745c4ba311c0)): ?>
<?php $attributes = $__attributesOriginal60ccd5bd713ec4042154745c4ba311c0; ?>
<?php unset($__attributesOriginal60ccd5bd713ec4042154745c4ba311c0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60ccd5bd713ec4042154745c4ba311c0)): ?>
<?php $component = $__componentOriginal60ccd5bd713ec4042154745c4ba311c0; ?>
<?php unset($__componentOriginal60ccd5bd713ec4042154745c4ba311c0); ?>
<?php endif; ?>
            <!--HEADER-->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                <?php if (isset($component)) { $__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <span>📋</span> Moje wnioski
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f)): ?>
<?php $attributes = $__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f; ?>
<?php unset($__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f)): ?>
<?php $component = $__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f; ?>
<?php unset($__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f); ?>
<?php endif; ?>
                <!--HEADER-->
                <div class="mb-4 mx-4 md:m-4 flex flex-col gap-4">
                    <?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => ['id' => 'show-filter','class' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'show-filter','class' => '']); ?>
                        <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')); ?> -
                        <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')); ?>

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
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <span>📋</span> Moje E-Wnioski
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f)): ?>
<?php $attributes = $__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f; ?>
<?php unset($__attributesOriginalf9aa9969855bfee7c57aec5577c2ce9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f)): ?>
<?php $component = $__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f; ?>
<?php unset($__componentOriginalf9aa9969855bfee7c57aec5577c2ce9f); ?>
<?php endif; ?>
                <?php
                    $start = \Carbon\Carbon::parse($startDate);
                    $end = \Carbon\Carbon::parse($endDate);

                    $allYear =
                        $start->month === 1 &&
                        $start->day === 1 &&
                        $end->month === 12 &&
                        $end->day === 31 &&
                        $start->year === $end->year;
                ?>

                <div class="flex items-center justify-center sm:justify-start gap-2 mb-4 mx-4">

                    
                    <button type="button" id="prev-month-bt" class="<?php if($allYear): ?> hidden <?php endif; ?> w-9 h-9 flex items-center justify-center
                                                           rounded-xl
                                                           bg-gray-100 dark:bg-gray-800
                                                           text-gray-700 dark:text-gray-200
                                                           hover:bg-gray-200 dark:hover:bg-gray-700
                                                           transition-all duration-200">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>

                    
                    <div id="current-month-bt" class="min-w-[180px] text-center
                                                           px-5 py-2
                                                           h-9
                                                           <?php if($allYear): ?>
                                                           sm:ml-[44px]
                                                           <?php endif; ?>
                                                           rounded-xl
                                                           bg-gray-100 dark:bg-gray-800
                                                           text-gray-900 dark:text-white
                                                           font-semibold
                                                           tracking-wide
                                                           select-none">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allYear): ?>
Cały rok 
<?php echo e(ucfirst(
                    \Carbon\Carbon::createFromFormat('Y-m-d', $startDate)
                        ->locale('pl')
                        ->translatedFormat('Y')
                )); ?>

<?php else: ?>
                        <?php echo e(ucfirst(
                    \Carbon\Carbon::createFromFormat('Y-m-d', $startDate)
                        ->locale('pl')
                        ->translatedFormat('F Y')
                )); ?>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <button type="button" id="next-month-bt" class="<?php if($allYear): ?> hidden <?php endif; ?> w-9 h-9 flex items-center justify-center
                                                           rounded-xl
                                                           bg-gray-100 dark:bg-gray-800
                                                           text-gray-700 dark:text-gray-200
                                                           hover:bg-gray-200 dark:hover:bg-gray-700
                                                           transition-all duration-200">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>

                </div>
                <div class="px-4 flex w-full">
                    <button id="btn-year-bt" class="<?php if($allYear): ?> !hidden <?php endif; ?> mb-4 btn-year w-full px-2 py-2 rounded-lg hover:bg-green-300 dark:bg-gray-700 dark:hover:bg-green-300 dark:text-white col-span-3 dark:hover:text-gray-900 tracking-widest bg-gray-100">
                        Pokaż cały rok
                    </button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <!--CONTENT-->
            <?php if (isset($component)) { $__componentOriginalb8699e4e7a3578705820a3da45318887 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb8699e4e7a3578705820a3da45318887 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <!--MOBILE VIEW-->
                <?php if (isset($component)) { $__componentOriginal52edc5f3d6de46edf4e1debed7575931 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52edc5f3d6de46edf4e1debed7575931 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.list','data' => ['items' => $leaves,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($leaves),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal47335201106cd78b002b176e44bea97b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47335201106cd78b002b176e44bea97b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-leave','data' => ['leave' => $leave]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-leave'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['leave' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($leave)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47335201106cd78b002b176e44bea97b)): ?>
<?php $attributes = $__attributesOriginal47335201106cd78b002b176e44bea97b; ?>
<?php unset($__attributesOriginal47335201106cd78b002b176e44bea97b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47335201106cd78b002b176e44bea97b)): ?>
<?php $component = $__componentOriginal47335201106cd78b002b176e44bea97b; ?>
<?php unset($__componentOriginal47335201106cd78b002b176e44bea97b); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal81ae61984cb39e782c0cdca20f4ff865 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81ae61984cb39e782c0cdca20f4ff865 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-leave-card','data' => ['id' => 'loader-card']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-leave-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader-card']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81ae61984cb39e782c0cdca20f4ff865)): ?>
<?php $attributes = $__attributesOriginal81ae61984cb39e782c0cdca20f4ff865; ?>
<?php unset($__attributesOriginal81ae61984cb39e782c0cdca20f4ff865); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81ae61984cb39e782c0cdca20f4ff865)): ?>
<?php $component = $__componentOriginal81ae61984cb39e782c0cdca20f4ff865; ?>
<?php unset($__componentOriginal81ae61984cb39e782c0cdca20f4ff865); ?>
<?php endif; ?>
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
                <!--MOBILE VIEW-->

                <!--PC VIEW-->
                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['headers' => ['Nazwa', 'Status', 'Ikona', 'Wniosek', 'Kiedy', 'Zrealizowano', 'Edycja', 'Anuluj'],'items' => $leaves,'checkBox' => false,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Nazwa', 'Status', 'Ikona', 'Wniosek', 'Kiedy', 'Zrealizowano', 'Edycja', 'Anuluj']),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($leaves),'checkBox' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginald32d9227c3842cc543143fedae4a7930 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald32d9227c3842cc543143fedae4a7930 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.row-leave','data' => ['leave' => $leave]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('row-leave'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['leave' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($leave)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald32d9227c3842cc543143fedae4a7930)): ?>
<?php $attributes = $__attributesOriginald32d9227c3842cc543143fedae4a7930; ?>
<?php unset($__attributesOriginald32d9227c3842cc543143fedae4a7930); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald32d9227c3842cc543143fedae4a7930)): ?>
<?php $component = $__componentOriginald32d9227c3842cc543143fedae4a7930; ?>
<?php unset($__componentOriginald32d9227c3842cc543143fedae4a7930); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale8fc4a9127e0e1d0b5569a9f8deb0618 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale8fc4a9127e0e1d0b5569a9f8deb0618 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-leave','data' => ['id' => 'loader']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-leave'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale8fc4a9127e0e1d0b5569a9f8deb0618)): ?>
<?php $attributes = $__attributesOriginale8fc4a9127e0e1d0b5569a9f8deb0618; ?>
<?php unset($__attributesOriginale8fc4a9127e0e1d0b5569a9f8deb0618); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8fc4a9127e0e1d0b5569a9f8deb0618)): ?>
<?php $component = $__componentOriginale8fc4a9127e0e1d0b5569a9f8deb0618; ?>
<?php unset($__componentOriginale8fc4a9127e0e1d0b5569a9f8deb0618); ?>
<?php endif; ?>
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
                <!--PC VIEW-->
                <?php if (isset($component)) { $__componentOriginal1f603ed19a7f47293d24abf12f22a04b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f603ed19a7f47293d24abf12f22a04b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-script','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo e(route('api.v1.leave.single.get')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f603ed19a7f47293d24abf12f22a04b)): ?>
<?php $attributes = $__attributesOriginal1f603ed19a7f47293d24abf12f22a04b; ?>
<?php unset($__attributesOriginal1f603ed19a7f47293d24abf12f22a04b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f603ed19a7f47293d24abf12f22a04b)): ?>
<?php $component = $__componentOriginal1f603ed19a7f47293d24abf12f22a04b; ?>
<?php unset($__componentOriginal1f603ed19a7f47293d24abf12f22a04b); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $attributes = $__attributesOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__attributesOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $component = $__componentOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__componentOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $attributes = $__attributesOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__attributesOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $component = $__componentOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__componentOriginal27ace535957143cef069f9d3d7f387f4); ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\leave\index.blade.php ENDPATH**/ ?>