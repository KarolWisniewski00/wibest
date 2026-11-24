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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-date','data' => ['loader' => 'planing-smart']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['loader' => 'planing-smart']); ?>
            <?php echo e(route('api.v1.calendar.work-smart.set.date')); ?>

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
        <?php if (isset($component)) { $__componentOriginal5a38ed0e9018b1f7cd2470173ebec9e4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a38ed0e9018b1f7cd2470173ebec9e4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.calendar.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('calendar.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5a38ed0e9018b1f7cd2470173ebec9e4)): ?>
<?php $attributes = $__attributesOriginal5a38ed0e9018b1f7cd2470173ebec9e4; ?>
<?php unset($__attributesOriginal5a38ed0e9018b1f7cd2470173ebec9e4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a38ed0e9018b1f7cd2470173ebec9e4)): ?>
<?php $component = $__componentOriginal5a38ed0e9018b1f7cd2470173ebec9e4; ?>
<?php unset($__componentOriginal5a38ed0e9018b1f7cd2470173ebec9e4); ?>
<?php endif; ?>
        <!--HEADER-->
        <?php if (isset($component)) { $__componentOriginala00535c66e66cf0d5d4809055d178389 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala00535c66e66cf0d5d4809055d178389 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.calendar.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('calendar.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <span>📅</span> Uproszczony
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala00535c66e66cf0d5d4809055d178389)): ?>
<?php $attributes = $__attributesOriginala00535c66e66cf0d5d4809055d178389; ?>
<?php unset($__attributesOriginala00535c66e66cf0d5d4809055d178389); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala00535c66e66cf0d5d4809055d178389)): ?>
<?php $component = $__componentOriginala00535c66e66cf0d5d4809055d178389; ?>
<?php unset($__componentOriginala00535c66e66cf0d5d4809055d178389); ?>
<?php endif; ?>
        <!--HEADER-->
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
            <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')); ?> - <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')); ?>

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
        <?php
        $showTable = true;
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('report_key')): ?>
        <?php
        $reportKey = session('report_key');
        $report = Cache::get($reportKey);
        ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($report): ?>
        <?php
        $showTable = false;
        ?>
        <div id="operation-summary-modal" class="mb-4 mx-4">
            <div class="relative gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
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
                    <label class="gap-4 h-full w-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
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
        $reportKey = session('report_key');

        if ($reportKey) {
        // 2. Usuwamy powiązany wpis z pamięci podręcznej (Cache)
        Cache::forget($reportKey);

        // 3. Usuwamy klucz sesji, aby nie odwoływać się do nieistniejącego cache
        session()->forget('report_key');

        // Opcjonalnie: Dodaj komunikat flash do wyświetlenia użytkownikowi
        // session()->flash('success', 'Dane raportu zostały pomyślnie usunięte z pamięci podręcznej.');
        }
        ?>
        <?php else: ?>
        
        <div class="mb-4 mx-4">
            <div class="gap-4 h-full flex flex-col items-start justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
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
        <?php if (isset($component)) { $__componentOriginal1349b001646c110398423dfbcc4fe98c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1349b001646c110398423dfbcc4fe98c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content-calendar','data' => ['class' => 'rounded-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content-calendar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'rounded-lg']); ?>
            <!--PC VIEW-->
            <?php if (isset($component)) { $__componentOriginal1dccd2f38a00f2d1937af91335f44593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1dccd2f38a00f2d1937af91335f44593 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-calendar-smart','data' => ['headers' => array_merge(['Nazwa'], $dates),'items' => $users,'emptyMessage' => 'Brak użytkowników do wyświetlenia.','checkBox' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table-calendar-smart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(array_merge(['Nazwa'], $dates)),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users),'emptyMessage' => 'Brak użytkowników do wyświetlenia.','checkBox' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal9f61e29d9645904aa1f4f168691be615 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f61e29d9645904aa1f4f168691be615 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.row-planing-smart','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('row-planing-smart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f61e29d9645904aa1f4f168691be615)): ?>
<?php $attributes = $__attributesOriginal9f61e29d9645904aa1f4f168691be615; ?>
<?php unset($__attributesOriginal9f61e29d9645904aa1f4f168691be615); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f61e29d9645904aa1f4f168691be615)): ?>
<?php $component = $__componentOriginal9f61e29d9645904aa1f4f168691be615; ?>
<?php unset($__componentOriginal9f61e29d9645904aa1f4f168691be615); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal7546fdf4126bc62e5b316728b9693792 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7546fdf4126bc62e5b316728b9693792 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-planing-smart','data' => ['id' => 'loader']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-planing-smart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7546fdf4126bc62e5b316728b9693792)): ?>
<?php $attributes = $__attributesOriginal7546fdf4126bc62e5b316728b9693792; ?>
<?php unset($__attributesOriginal7546fdf4126bc62e5b316728b9693792); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7546fdf4126bc62e5b316728b9693792)): ?>
<?php $component = $__componentOriginal7546fdf4126bc62e5b316728b9693792; ?>
<?php unset($__componentOriginal7546fdf4126bc62e5b316728b9693792); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1dccd2f38a00f2d1937af91335f44593)): ?>
<?php $attributes = $__attributesOriginal1dccd2f38a00f2d1937af91335f44593; ?>
<?php unset($__attributesOriginal1dccd2f38a00f2d1937af91335f44593); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1dccd2f38a00f2d1937af91335f44593)): ?>
<?php $component = $__componentOriginal1dccd2f38a00f2d1937af91335f44593; ?>
<?php unset($__componentOriginal1dccd2f38a00f2d1937af91335f44593); ?>
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
                <?php echo e(route('api.v1.calendar.work-smart.get')); ?>

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
<?php if (isset($__attributesOriginal1349b001646c110398423dfbcc4fe98c)): ?>
<?php $attributes = $__attributesOriginal1349b001646c110398423dfbcc4fe98c; ?>
<?php unset($__attributesOriginal1349b001646c110398423dfbcc4fe98c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1349b001646c110398423dfbcc4fe98c)): ?>
<?php $component = $__componentOriginal1349b001646c110398423dfbcc4fe98c; ?>
<?php unset($__componentOriginal1349b001646c110398423dfbcc4fe98c); ?>
<?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\planing\smart.blade.php ENDPATH**/ ?>