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
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($filter_user_id) && $filter_user_id): ?>
                <div class="relative">
                    <div class="p-2 pt-0 text-sm rounded-lg">
                        <div class="flex flex-col gap-4">
                            <span class="text-gray-900 dark:text-white">👤 Dla zespołu</span>
                            <label
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">

                                <div class="flex items-center gap-2">
                                    <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => App\Models\User::where('id', $filter_user_id)->first()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Models\User::where('id', $filter_user_id)->first())]); ?>
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
                                    <?php if (isset($component)) { $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name','data' => ['user' => App\Models\User::where('id', $filter_user_id)->first(),'class' => 'flex-wrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Models\User::where('id', $filter_user_id)->first()),'class' => 'flex-wrap']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $attributes = $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $component = $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($startDate != '' || $endDate != ''): ?>
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
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($startDate != ''): ?>
                                    <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y') ?? ''); ?>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <span class="px-2">-</span>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($endDate != ''): ?>
                                    <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y') ?? ''); ?>

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
                </div>
            <?php else: ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-date','data' => ['loader' => 'work-session']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['loader' => 'work-session']); ?>
                        <?php echo e(route('api.v1.rcp.work-session.set.date')); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-date-user','data' => ['loader' => 'work-session']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-date-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['loader' => 'work-session']); ?>
                        <?php echo e(route('api.v1.rcp.work-session.set.date')); ?>

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

        <!--MAIN-->
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
            <?php if (isset($component)) { $__componentOriginal737fcd8cf5d85b5c24145877689d90b1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal737fcd8cf5d85b5c24145877689d90b1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.nav','data' => ['countEvents' => $countEvents]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['countEvents' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($countEvents)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal737fcd8cf5d85b5c24145877689d90b1)): ?>
<?php $attributes = $__attributesOriginal737fcd8cf5d85b5c24145877689d90b1; ?>
<?php unset($__attributesOriginal737fcd8cf5d85b5c24145877689d90b1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal737fcd8cf5d85b5c24145877689d90b1)): ?>
<?php $component = $__componentOriginal737fcd8cf5d85b5c24145877689d90b1; ?>
<?php unset($__componentOriginal737fcd8cf5d85b5c24145877689d90b1); ?>
<?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                <?php if (isset($component)) { $__componentOriginal5182ca3cd7fce6048e13d575d20ac984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5182ca3cd7fce6048e13d575d20ac984 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <span>⏱️</span> RCP
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5182ca3cd7fce6048e13d575d20ac984)): ?>
<?php $attributes = $__attributesOriginal5182ca3cd7fce6048e13d575d20ac984; ?>
<?php unset($__attributesOriginal5182ca3cd7fce6048e13d575d20ac984); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5182ca3cd7fce6048e13d575d20ac984)): ?>
<?php $component = $__componentOriginal5182ca3cd7fce6048e13d575d20ac984; ?>
<?php unset($__componentOriginal5182ca3cd7fce6048e13d575d20ac984); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => ['id' => 'show-filter','class' => 'mb-4 mx-4 md:m-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'show-filter','class' => 'mb-4 mx-4 md:m-4']); ?>
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
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginal5182ca3cd7fce6048e13d575d20ac984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5182ca3cd7fce6048e13d575d20ac984 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <span>⏱️</span> Podsumowanie czasu pracy
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5182ca3cd7fce6048e13d575d20ac984)): ?>
<?php $attributes = $__attributesOriginal5182ca3cd7fce6048e13d575d20ac984; ?>
<?php unset($__attributesOriginal5182ca3cd7fce6048e13d575d20ac984); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5182ca3cd7fce6048e13d575d20ac984)): ?>
<?php $component = $__componentOriginal5182ca3cd7fce6048e13d575d20ac984; ?>
<?php unset($__componentOriginal5182ca3cd7fce6048e13d575d20ac984); ?>
<?php endif; ?>


<div id="attendance-summary-wrapper"
     data-url="<?php echo e(route('api.v1.raport.attendance-sheet.summary')); ?>">

    
    <div id="attendance-summary-skeleton"
         class="mb-4 mx-4 space-y-3"
         role="status"
         aria-label="Ładowanie podsumowania czasu pracy">

        
        <div class="grid grid-cols-2 gap-3">

            
            <div class="min-w-0 rounded-lg bg-gray-100 p-4 shadow-sm dark:bg-gray-700">
                <div class="mb-3 flex items-center gap-2">
                    <div class="size-8 shrink-0 animate-pulse rounded-xl bg-gray-200 dark:bg-gray-600"></div>
                    <div class="h-3 w-24 max-w-full animate-pulse rounded-md bg-gray-200 dark:bg-gray-600"></div>
                </div>
                <div class="h-8 w-3/4 animate-pulse rounded-lg bg-gray-200 dark:bg-gray-600"></div>
                <div class="mt-2 h-3 w-20 animate-pulse rounded-md bg-gray-100 dark:bg-gray-600"></div>
            </div>

            
            <div class="min-w-0 rounded-lg bg-gray-100 p-4 shadow-sm dark:bg-gray-700">
                <div class="mb-3 flex items-center gap-2">
                    <div class="size-8 shrink-0 animate-pulse rounded-xl bg-gray-200 dark:bg-gray-600"></div>
                    <div class="h-3 w-20 max-w-full animate-pulse rounded-md bg-gray-200 dark:bg-gray-600"></div>
                </div>
                <div class="h-8 w-2/3 animate-pulse rounded-lg bg-gray-200 dark:bg-gray-600"></div>
                <div class="mt-2 h-3 w-16 animate-pulse rounded-md bg-gray-100 dark:bg-gray-600"></div>
            </div>
        </div>

        
        <div class="overflow-hidden rounded-lg bg-gray-100 shadow-sm dark:bg-gray-700">
            <div class="flex min-h-12 items-center justify-between gap-3 px-4 py-3">
                <div class="h-4 w-36 max-w-full animate-pulse rounded-md bg-gray-200 dark:bg-gray-600"></div>
                <div class="size-4 shrink-0 animate-pulse rounded bg-gray-100 dark:bg-gray-600"></div>
            </div>

        </div>

        <span class="sr-only">Ładowanie danych o czasie pracy...</span>
    </div>

    
    <div id="attendance-summary-content"></div>
</div>
                <?php if (isset($component)) { $__componentOriginal5182ca3cd7fce6048e13d575d20ac984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5182ca3cd7fce6048e13d575d20ac984 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <span>⏱️</span> Lista czasu pracy
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5182ca3cd7fce6048e13d575d20ac984)): ?>
<?php $attributes = $__attributesOriginal5182ca3cd7fce6048e13d575d20ac984; ?>
<?php unset($__attributesOriginal5182ca3cd7fce6048e13d575d20ac984); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5182ca3cd7fce6048e13d575d20ac984)): ?>
<?php $component = $__componentOriginal5182ca3cd7fce6048e13d575d20ac984; ?>
<?php unset($__componentOriginal5182ca3cd7fce6048e13d575d20ac984); ?>
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
                                                           <?php if($allYear): ?>
                                                           ml-[44px]
                                                           <?php endif; ?>
                                                           px-5 py-2
                                                           h-9
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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php
                $showTable = true;
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('report_key_rcp')): ?>
                <?php
                    $reportKey = session('report_key_rcp');
                    $report = Cache::get($reportKey);
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($report): ?>
                    <?php
                        $showTable = false;
                    ?>
                    <div id="operation-summary-modal" class="mb-4 mx-4">
                        <div
                            class="relative gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <?php if (isset($component)) { $__componentOriginala11698e65f4c338ad73b109bcde1f4a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala11698e65f4c338ad73b109bcde1f4a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.h1-display','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('h1-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                                <span>🎯</span> Podsumowanie operacji
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
                            <?php if (isset($component)) { $__componentOriginal6aea9c351149225d06da1d1673b154ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6aea9c351149225d06da1d1673b154ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.info-span','data' => ['class' => '-my-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('info-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-my-2']); ?>
                                Łączna liczba prób <?php echo e($report['total_attempts']); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6aea9c351149225d06da1d1673b154ab)): ?>
<?php $attributes = $__attributesOriginal6aea9c351149225d06da1d1673b154ab; ?>
<?php unset($__attributesOriginal6aea9c351149225d06da1d1673b154ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6aea9c351149225d06da1d1673b154ab)): ?>
<?php $component = $__componentOriginal6aea9c351149225d06da1d1673b154ab; ?>
<?php unset($__componentOriginal6aea9c351149225d06da1d1673b154ab); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal77a2c300c24fb971098f2e6c0a76b12f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77a2c300c24fb971098f2e6c0a76b12f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-span','data' => ['class' => '-my-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-my-2']); ?>
                                Pomyślnie dodano <?php echo e($report['successful']); ?>

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
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($report['failed_count'] > 0): ?>
                                <?php if (isset($component)) { $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-span','data' => ['class' => '-my-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-my-2']); ?>
                                    Nieudane próby <?php echo e($report['failed_count']); ?>

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
                                <div class="flex flex-col gap-4 w-full ">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $report['failed_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label
                                            class="gap-4 h-full w-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                                            <div class="flex items-center gap-2">
                                                <?php
                                                    $user = \App\Models\User::where('id', $detail['user_id'])->first();
                                                ?>
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
                                                <?php if (isset($component)) { $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name','data' => ['user' => $user,'class' => 'flex-wrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user),'class' => 'flex-wrap']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $attributes = $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $component = $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
                                            </div>
                                            <div class="flex flex-row gap-4 items-center justify-between">
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
                                                    <?php echo e($detail['date']); ?>

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
                                                <?php if (isset($component)) { $__componentOriginal0c503c1f9bff39764e1bf2f74285df7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c503c1f9bff39764e1bf2f74285df7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-span','data' => ['class' => '-my-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-my-2']); ?>
                                                    <?php echo e($detail['reason']); ?>

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
                                            </div>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <?php
                        $reportKey = session('report_key_rcp');

                        if ($reportKey) {
                            // 2. Usuwamy powiązany wpis z pamięci podręcznej (Cache)
                            Cache::forget($reportKey);

                            // 3. Usuwamy klucz sesji, aby nie odwoływać się do nieistniejącego cache
                            session()->forget('report_key_rcp');

                            // Opcjonalnie: Dodaj komunikat flash do wyświetlenia użytkownikowi
                            // session()->flash('success', 'Dane raportu zostały pomyślnie usunięte z pamięci podręcznej.');
                        }
                    ?>
                <?php else: ?>
                    
                    <div class="mb-4 mx-4">
                        <div
                            class="gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <?php if (isset($component)) { $__componentOriginal6aea9c351149225d06da1d1673b154ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6aea9c351149225d06da1d1673b154ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.info-span','data' => ['class' => '-my-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('info-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-my-2']); ?>
                                Trwa przetwarzanie danych w tle. Odśwież za chwilę, aby zobaczyć raport.
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6aea9c351149225d06da1d1673b154ab)): ?>
<?php $attributes = $__attributesOriginal6aea9c351149225d06da1d1673b154ab; ?>
<?php unset($__attributesOriginal6aea9c351149225d06da1d1673b154ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6aea9c351149225d06da1d1673b154ab)): ?>
<?php $component = $__componentOriginal6aea9c351149225d06da1d1673b154ab; ?>
<?php unset($__componentOriginal6aea9c351149225d06da1d1673b154ab); ?>
<?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showTable): ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.list','data' => ['items' => $work_sessions,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($work_sessions),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $work_sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal135c53ddcac15e9e589b7c99e211f3a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal135c53ddcac15e9e589b7c99e211f3a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-work-session','data' => ['workSession' => $work_session]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-work-session'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['work_session' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($work_session)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal135c53ddcac15e9e589b7c99e211f3a9)): ?>
<?php $attributes = $__attributesOriginal135c53ddcac15e9e589b7c99e211f3a9; ?>
<?php unset($__attributesOriginal135c53ddcac15e9e589b7c99e211f3a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal135c53ddcac15e9e589b7c99e211f3a9)): ?>
<?php $component = $__componentOriginal135c53ddcac15e9e589b7c99e211f3a9; ?>
<?php unset($__componentOriginal135c53ddcac15e9e589b7c99e211f3a9); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal640ad31ed92faec47680fece79c414db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal640ad31ed92faec47680fece79c414db = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-work-session-card','data' => ['id' => 'loader-card']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-work-session-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader-card']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal640ad31ed92faec47680fece79c414db)): ?>
<?php $attributes = $__attributesOriginal640ad31ed92faec47680fece79c414db; ?>
<?php unset($__attributesOriginal640ad31ed92faec47680fece79c414db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal640ad31ed92faec47680fece79c414db)): ?>
<?php $component = $__componentOriginal640ad31ed92faec47680fece79c414db; ?>
<?php unset($__componentOriginal640ad31ed92faec47680fece79c414db); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['headers' => ['Nazwa', 'Status', 'Lokalizacja', 'Ikona', 'Czas Pracy', 'Kiedy', 'Podgląd'],'items' => $work_sessions,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Nazwa', 'Status', 'Lokalizacja', 'Ikona', 'Czas Pracy', 'Kiedy', 'Podgląd']),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($work_sessions),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $work_sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal3229451ffdc570c4bc4e2a754a2da465 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3229451ffdc570c4bc4e2a754a2da465 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.row-work-session','data' => ['workSession' => $work_session]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('row-work-session'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['work_session' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($work_session)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3229451ffdc570c4bc4e2a754a2da465)): ?>
<?php $attributes = $__attributesOriginal3229451ffdc570c4bc4e2a754a2da465; ?>
<?php unset($__attributesOriginal3229451ffdc570c4bc4e2a754a2da465); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3229451ffdc570c4bc4e2a754a2da465)): ?>
<?php $component = $__componentOriginal3229451ffdc570c4bc4e2a754a2da465; ?>
<?php unset($__componentOriginal3229451ffdc570c4bc4e2a754a2da465); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginala3341b184a83d2a95ff9174f7fcd562c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3341b184a83d2a95ff9174f7fcd562c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-work-session','data' => ['id' => 'loader']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-work-session'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3341b184a83d2a95ff9174f7fcd562c)): ?>
<?php $attributes = $__attributesOriginala3341b184a83d2a95ff9174f7fcd562c; ?>
<?php unset($__attributesOriginala3341b184a83d2a95ff9174f7fcd562c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3341b184a83d2a95ff9174f7fcd562c)): ?>
<?php $component = $__componentOriginala3341b184a83d2a95ff9174f7fcd562c; ?>
<?php unset($__componentOriginala3341b184a83d2a95ff9174f7fcd562c); ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($filter_user_id) && $filter_user_id): ?>
                        <?php if (isset($component)) { $__componentOriginal1f603ed19a7f47293d24abf12f22a04b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f603ed19a7f47293d24abf12f22a04b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-script','data' => ['filterUserId' => ''.e($filter_user_id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['filter_user_id' => ''.e($filter_user_id).'']); ?>
                            <?php echo e(route('api.v1.rcp.work-session.get')); ?>

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
                    <?php else: ?>
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
                            <?php echo e(route('api.v1.rcp.work-session.get')); ?>

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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <!--CONTENT-->
            <?php
                $file = 'RCP_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
            ?>
            <?php if (isset($component)) { $__componentOriginal21ac120edf7ad771504a52fdf33f45b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal21ac120edf7ad771504a52fdf33f45b4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.download','data' => ['file' => $file]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('download'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['file' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file)]); ?>
                <?php echo e(route('api.v1.rcp.work-session.export.xlsx')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal21ac120edf7ad771504a52fdf33f45b4)): ?>
<?php $attributes = $__attributesOriginal21ac120edf7ad771504a52fdf33f45b4; ?>
<?php unset($__attributesOriginal21ac120edf7ad771504a52fdf33f45b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21ac120edf7ad771504a52fdf33f45b4)): ?>
<?php $component = $__componentOriginal21ac120edf7ad771504a52fdf33f45b4; ?>
<?php unset($__componentOriginal21ac120edf7ad771504a52fdf33f45b4); ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\rcp\index.blade.php ENDPATH**/ ?>