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
        <?php if (isset($component)) { $__componentOriginal0e174ee08c37362dcfb870ae8e570b1a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a)): ?>
<?php $attributes = $__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a; ?>
<?php unset($__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e174ee08c37362dcfb870ae8e570b1a)): ?>
<?php $component = $__componentOriginal0e174ee08c37362dcfb870ae8e570b1a; ?>
<?php unset($__componentOriginal0e174ee08c37362dcfb870ae8e570b1a); ?>
<?php endif; ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('object.dashboard')).'','class' => 'text-lg mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('object.dashboard')).'','class' => 'text-lg mb-4']); ?>
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

            <div class="min-w-0 space-y-4" x-data="wibestObjectPreview({ endpoint: <?php echo e(\Illuminate\Support\Js::from(route('object.show', $object))); ?>, month: <?php echo e(\Illuminate\Support\Js::from($month->format('Y-m'))); ?>, objectId: <?php echo e($object->id); ?>, selectedEmployeeId: <?php echo e(\Illuminate\Support\Js::from($workReport['selected_employee_id'])); ?> })" @object-period-request.stop="changeMonth($event.detail.url, $event.detail.step)">
                <div x-ref="period" class="[&>[data-month]]:my-0"><?php echo $__env->make('admin.object.partials.work-period', ['asyncPeriod' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                <p x-show="loading" x-cloak role="status" class="mb-3 text-xs text-gray-600 dark:text-gray-300"><i class="fa-solid fa-spinner animate-spin mr-2" aria-hidden="true"></i>Aktualizowanie miesiąca…</p>
                <p x-show="error" x-cloak role="alert" class="mb-3 text-sm text-red-700 dark:text-red-300"><span x-text="error"></span><button type="button" @click="changeMonth(pendingUrl)" class="ml-2 underline">Spróbuj ponownie</button></p>
            <div class="grid min-w-0 grid-cols-1 gap-4 lg:grid-cols-2">
                <section class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300" aria-labelledby="object-info-title">
                    <div class="flex items-center gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                        <?php if (isset($component)) { $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.type-icon','data' => ['type' => $object->object_type]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.type-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($object->object_type)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $attributes = $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $component = $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
                        <div class="text-start">
                            <h1 id="object-info-title" class="text-sm font-semibold text-gray-900 dark:text-white">Informacje o obiekcie</h1>
                            <p class="text-xs text-gray-600 dark:text-gray-300">Podstawowe informacje dotyczące miejsca pracy</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 p-5 text-start md:grid-cols-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                            'Nazwa obiektu' => $object->name,
                            'Dozwolona odległość od lokalizacji' => $object->allowed_distance.' m',
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => ['class' => 'min-w-0 pb-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'min-w-0 pb-3']); ?>
                                <?php if (isset($component)) { $__componentOriginale45e65b9196dc2b184cf670f0d40f585 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale45e65b9196dc2b184cf670f0d40f585 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-label','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($label); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes([]); ?><span class="min-w-0 break-words text-lg font-semibold text-gray-900 [overflow-wrap:anywhere] dark:text-white"><?php echo e($value); ?></span> <?php echo $__env->renderComponent(); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php
                        $typePresentation = config('work_objects.types.'.$object->object_type) ?? config('work_objects.default');
                        $today = now(config('app.timezone'));
                        $start = $object->starts_at;
                        $end = $object->ends_at;
                        $hasTimeline = $start && $end && $end->gte($start);
                        $progress = $hasTimeline
                            ? ($end->equalTo($start) ? ($today->gte($end) ? 100 : 0)
                                : max(0, min(100, ($today->getTimestamp() - $start->getTimestamp()) / ($end->getTimestamp() - $start->getTimestamp()) * 100)))
                            : 0;
                        $remainingDays = $end ? (int) $today->copy()->startOfDay()->diffInDays($end->copy()->startOfDay(), false) : null;
                    ?>
                    <div class="space-y-5 px-5 pb-5 text-start [@media(prefers-color-scheme:light)]:[&>div.relative.bg-blue-50]:bg-blue-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-blue-50]:text-blue-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-green-50]:bg-green-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-green-50]:text-green-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-yellow-50]:bg-yellow-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-yellow-50]:text-yellow-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-red-50]:bg-red-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-red-50]:text-red-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-slate-50]:bg-slate-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-slate-50]:text-slate-900 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-gray-50]:bg-gray-200 [@media(prefers-color-scheme:light)]:[&>div.relative.bg-gray-50]:text-gray-900 [@media(prefers-color-scheme:light)]:[&>div.relative_.opacity-70]:opacity-100 [@media(prefers-color-scheme:light)]:[&>div.relative_.font-semibold]:font-bold">
                        <div class="relative flex items-center gap-3 overflow-hidden rounded-xl bg-gradient-to-br p-4 <?php echo e($typePresentation['primary']); ?> <?php echo e($typePresentation['secondary']); ?> [@media(prefers-color-scheme:light)]:[&.from-green-200]:from-green-300 [@media(prefers-color-scheme:light)]:[&.text-green-700]:text-green-900 [@media(prefers-color-scheme:light)]:[&.from-orange-200]:from-orange-300 [@media(prefers-color-scheme:light)]:[&.text-orange-700]:text-orange-900 [@media(prefers-color-scheme:light)]:[&.from-blue-200]:from-blue-300 [@media(prefers-color-scheme:light)]:[&.text-blue-700]:text-blue-900 [@media(prefers-color-scheme:light)]:[&.from-violet-200]:from-violet-300 [@media(prefers-color-scheme:light)]:[&.text-violet-700]:text-violet-900 [@media(prefers-color-scheme:light)]:[&.from-pink-200]:from-pink-300 [@media(prefers-color-scheme:light)]:[&.text-pink-700]:text-pink-900 [@media(prefers-color-scheme:light)]:[&.from-cyan-200]:from-cyan-300 [@media(prefers-color-scheme:light)]:[&.text-cyan-700]:text-cyan-900 [@media(prefers-color-scheme:light)]:[&.from-gray-200]:from-gray-300 [@media(prefers-color-scheme:light)]:[&.text-gray-700]:text-gray-900 [@media(prefers-color-scheme:light)]:[&.from-emerald-200]:from-emerald-300 [@media(prefers-color-scheme:light)]:[&.text-emerald-700]:text-emerald-900 [@media(prefers-color-scheme:light)]:[&.from-amber-200]:from-amber-300 [@media(prefers-color-scheme:light)]:[&.text-amber-700]:text-amber-900 [@media(prefers-color-scheme:light)]:[&.from-sky-200]:from-sky-300 [@media(prefers-color-scheme:light)]:[&.text-sky-700]:text-sky-900 [@media(prefers-color-scheme:light)]:[&.from-yellow-200]:from-yellow-300 [@media(prefers-color-scheme:light)]:[&.text-yellow-700]:text-yellow-900 [@media(prefers-color-scheme:light)]:[&.from-rose-200]:from-rose-300 [@media(prefers-color-scheme:light)]:[&.text-rose-700]:text-rose-900 [@media(prefers-color-scheme:light)]:[&.to-emerald-100]:to-emerald-200 [@media(prefers-color-scheme:light)]:[&.to-amber-100]:to-amber-200 [@media(prefers-color-scheme:light)]:[&.to-indigo-100]:to-indigo-200 [@media(prefers-color-scheme:light)]:[&.to-purple-100]:to-purple-200 [@media(prefers-color-scheme:light)]:[&.to-rose-100]:to-rose-200 [@media(prefers-color-scheme:light)]:[&.to-sky-100]:to-sky-200 [@media(prefers-color-scheme:light)]:[&.to-slate-100]:to-slate-200 [@media(prefers-color-scheme:light)]:[&.to-lime-100]:to-lime-200 [@media(prefers-color-scheme:light)]:[&.to-teal-100]:to-teal-200 [@media(prefers-color-scheme:light)]:[&.to-yellow-100]:to-yellow-200 [@media(prefers-color-scheme:light)]:[&.to-cyan-100]:to-cyan-200 [@media(prefers-color-scheme:light)]:[&.to-red-100]:to-red-200">
                            <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid <?php echo e($typePresentation['icon']); ?>"></i></div>
                            <div class="relative flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-900/20">
                                <i class="fa-solid <?php echo e($typePresentation['icon']); ?> text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>
                            <div class="relative min-w-0">
                                <div class="text-xs uppercase tracking-wider opacity-70">Typ obiektu</div>
                                <div class="mt-1 font-semibold"><?php echo e(\App\Models\WorkObject::TYPES[$object->object_type] ?? 'Nie określono typu'); ?></div>
                                <div class="mt-1 text-xs opacity-70"><?php echo e($typePresentation['description'] ?? ''); ?></div>
                            </div>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal874718d34543f77402a854255bc80739 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal874718d34543f77402a854255bc80739 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.status-card','data' => ['status' => $object->status,'borderless' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.status-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($object->status),'borderless' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal874718d34543f77402a854255bc80739)): ?>
<?php $attributes = $__attributesOriginal874718d34543f77402a854255bc80739; ?>
<?php unset($__attributesOriginal874718d34543f77402a854255bc80739); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal874718d34543f77402a854255bc80739)): ?>
<?php $component = $__componentOriginal874718d34543f77402a854255bc80739; ?>
<?php unset($__componentOriginal874718d34543f77402a854255bc80739); ?>
<?php endif; ?>
                        <div data-object-timeline class="rounded-xl border-0 bg-blue-50 p-4 dark:bg-blue-900/20 [@media(prefers-color-scheme:light)]:bg-blue-200">
                            <h2 class="text-sm font-semibold text-blue-800 dark:text-blue-300">Termin realizacji</h2>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <div><div class="text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Rozpoczęcie</div><div class="mt-1 text-base font-semibold text-gray-900 dark:text-white"><?php echo e($start?->format('d.m.Y') ?? 'Nie określono'); ?></div><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start): ?><div class="text-sm text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600"><?php echo e($start->format('H:i')); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                                <div class="text-right"><div class="text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Zakończenie</div><div class="mt-1 text-base font-semibold text-gray-900 dark:text-white"><?php echo e($end?->format('d.m.Y') ?? 'Nie określono'); ?></div><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($end): ?><div class="text-sm text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600"><?php echo e($end->format('H:i')); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasTimeline): ?>
                                <div class="relative mt-5 h-3 rounded-full bg-blue-100 dark:bg-blue-900/50" role="progressbar" aria-label="Upływ czasu realizacji" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo e(round($progress)); ?>" aria-valuetext="Upłynęło <?php echo e(round($progress)); ?>% zaplanowanego czasu">
                                    <div class="h-full rounded-full bg-gradient-to-r from-blue-600 to-blue-400" style="width: <?php echo e($progress); ?>%"></div>
                                    <span class="absolute top-1/2 h-5 w-5 -translate-x-1/2 -translate-y-1/2 rounded-full border-4 border-white bg-blue-600 shadow dark:border-blue-950" style="left: <?php echo e($progress); ?>%" title="Dzisiaj: <?php echo e($today->format('d.m.Y')); ?>" aria-hidden="true"></span>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="mt-4 flex flex-wrap items-center justify-between gap-2 text-sm">
                                <span class="text-gray-600 dark:text-gray-300">Dzisiaj: <?php echo e($today->format('d.m.Y')); ?></span>
                                <span class="font-semibold text-gray-900 dark:text-white">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$end): ?>
                                        Bez określonego terminu zakończenia
                                    <?php elseif($today->gt($end)): ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($remainingDays < 0): ?> Od terminu: <?php echo e(abs($remainingDays)); ?> <?php echo e($remainingDays === -1 ? 'dzień' : 'dni'); ?> <?php else: ?> Termin minął dzisiaj <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php elseif($remainingDays === 0): ?>
                                        Termin zakończenia dzisiaj
                                    <?php else: ?>
                                        Do końca: <?php echo e($remainingDays); ?> <?php echo e($remainingDays === 1 ? 'dzień' : 'dni'); ?>

                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </span>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start && $today->lt($start)): ?><p class="mt-2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Realizacja jeszcze się nie rozpocząła.</p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </section>

                <?php
                    $description = trim(html_entity_decode(strip_tags(preg_replace('/<\/p>|<br\s*\/?>/i', "\n", $object->description ?? '')), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                    $hasDescription = trim(str_replace("\u{00A0}", ' ', $description)) !== '';
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasDescription): ?>
                <section data-object-description class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 self-start [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                    <div class="flex items-center gap-3 border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                        <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-note-sticky text-lg sm:text-2xl" aria-hidden="true"></i>
                        </div>

                        <div>
                            <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                Dodatkowe informacje
                            </h2>

                            <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                Notatki i informacje pomocne przy obsłudze obiektu
                            </p>
                        </div>

                    </div>
                    <p class="whitespace-pre-line break-words p-5 text-start text-sm text-gray-700 [overflow-wrap:anywhere] dark:text-gray-200"><?php echo e($description); ?></p>
                </section>
                <?php else: ?>
                    <div class="hidden lg:block" aria-hidden="true"></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>

                <div x-ref="cards" class="min-w-0 w-full [&>[data-object-work-cards]]:my-0 [&>[data-object-work-cards]>:nth-child(1)]:order-4 [&>[data-object-work-cards]>:nth-child(2)]:order-5"><?php echo $__env->make('admin.object.partials.work-cards', ['preview' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
            <div class="grid min-w-0 grid-cols-1 items-stretch gap-4 lg:grid-cols-2">
                <section data-object-location class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                    <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                        <div class="flex items-center gap-3">

                            <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                <i class="fa-solid fa-location-dot text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>

                            <div>
                                <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                    Lokalizacja obiektu
                                </h2>

                                <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                    Adres i położenie obiektu
                                </p>
                            </div>

                        </div>

                    </div>
                    <?php
                        $latitude = $object->location?->latitude;
                        $longitude = $object->location?->longitude;
                        $hasCoordinates = is_numeric($latitude) && is_numeric($longitude)
                            && abs((float) $latitude) <= 90 && abs((float) $longitude) <= 180;
                        $address = trim((string) $object->location?->address);
                        $locality = collect([$object->location?->postal_code, $object->location?->city])
                            ->filter(fn ($part) => filled($part) && mb_stripos($address, trim($part)) === false)
                            ->map(fn ($part) => trim($part))->implode(' ');
                        $fullAddress = collect([$address, $locality])->filter(fn ($part) => filled($part))->implode(', ');
                        $country = trim((string) $object->location?->country);
                        if ($country !== '' && mb_stripos($fullAddress, $country) === false) {
                            $fullAddress = $fullAddress !== '' ? $fullAddress.', '.$country : $country;
                        }
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasCoordinates): ?>
                        <div @wibest:object-readings.window="if ($event.detail.objectId === <?php echo e($object->id); ?>) updateReadings($event.detail.readings)" x-data="wibestObjectMaps({ objects: <?php echo e(\Illuminate\Support\Js::from([[
                            'name' => $object->name,
                            'address' => $fullAddress ?: $object->location->name,
                            'lat' => (float) $latitude,
                            'lng' => (float) $longitude,
                            'radius' => $object->allowed_distance,
                            'status' => $object->status,
                            'url' => route('object.show', $object),
                        ]])); ?>, readings: <?php echo e(\Illuminate\Support\Js::from($workReport['readings'])); ?>, apiKey: <?php echo e(\Illuminate\Support\Js::from(config('services.google.maps_key'))); ?> })">
                            <div class="relative h-[360px] bg-gray-100 dark:bg-gray-700" :aria-busy="reportLoading">
                                <?php if (isset($component)) { $__componentOriginal52a0caf2fbcc203749da5504fb454ea9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52a0caf2fbcc203749da5504fb454ea9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.loading','data' => ['kind' => 'map']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['kind' => 'map']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52a0caf2fbcc203749da5504fb454ea9)): ?>
<?php $attributes = $__attributesOriginal52a0caf2fbcc203749da5504fb454ea9; ?>
<?php unset($__attributesOriginal52a0caf2fbcc203749da5504fb454ea9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52a0caf2fbcc203749da5504fb454ea9)): ?>
<?php $component = $__componentOriginal52a0caf2fbcc203749da5504fb454ea9; ?>
<?php unset($__componentOriginal52a0caf2fbcc203749da5504fb454ea9); ?>
<?php endif; ?>
                                <div x-ref="cardMap" class="h-full w-full" wire:ignore aria-label="Lokalizacja obiektu na mapie Google"></div>
                                <div x-show="message" role="status" aria-live="polite" class="absolute inset-0 flex items-center justify-center bg-white/95 p-5 text-center text-sm text-gray-700 dark:bg-gray-700 dark:text-gray-200"><p x-text="message">Ładowanie mapy…</p></div>
                            </div>

                        </div>
                    <?php else: ?>
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="flex flex-wrap gap-4 px-5 pt-3 text-xs text-gray-600 dark:text-gray-300"><span>🟢 START</span><span>🔴 STOP</span><span>Odczyty z sesji zakwalifikowanych do obiektu</span></div>
                    <div class="p-5 text-start">
                        <div class="rounded-xl bg-gray-50 text-sm text-gray-500 dark:bg-gray-700 dark:text-gray-400 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:text-gray-600">
                            <div class="break-words font-medium [overflow-wrap:anywhere]"><?php echo e($fullAddress ?: 'Nie określono adresu'); ?></div>
                        </div>
                    </div>
                </section>

                <section data-object-users class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                    <div x-ref="workers"><?php echo $__env->make('admin.object.partials.preview-workers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                </section>
            </div>

            <div x-ref="work" class="min-w-0 w-full [&>[data-object-work-table]]:my-0"><?php echo $__env->make('admin.object.partials.work-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
            <div class="flex flex-col md:flex-row justify-end gap-4 mt-4">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $object)): ?>
                    <!-- EDYTUJ -->
                    <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('object.edit', $object)).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('object.edit', $object)).'','class' => 'text-lg']); ?>
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
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $object)): ?>
                    <form action="<?php echo e(route('object.delete', $object)); ?>" class="w-full md:w-fit" method="POST"
                        onsubmit="return confirm('Czy na pewno chcesz usunąć?');">
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
                            <i class="fa-solid fa-trash mr-2"></i>USUŃ
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
                <?php endif; ?>
            </div>
            <?php if (isset($component)) { $__componentOriginal4423901be02fedd5bb71d35cba54805f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4423901be02fedd5bb71d35cba54805f = $attributes; } ?>
<?php $component = WireUi\View\Components\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'py-2 mt-4']); ?>Utworzono <?php echo e($object->created_at?->format('d.m.Y H:i:s') ?? '—'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['class' => 'py-2']); ?>Ostatnia aktualizacja <?php echo e($object->updated_at?->format('d.m.Y H:i:s') ?? '—'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $attributes = $__attributesOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__attributesOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $component = $__componentOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__componentOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>



            <?php echo $__env->make('admin.object.partials.status-history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
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
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\show.blade.php ENDPATH**/ ?>