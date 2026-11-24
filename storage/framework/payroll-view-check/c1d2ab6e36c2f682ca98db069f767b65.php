<ul data-object-mobile-work class="block space-y-3 p-3 md:hidden">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $workReport['rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $start = $row->start_time ? \Carbon\Carbon::parse($row->start_time) : null;
            $stop = $row->stop_time ? \Carbon\Carbon::parse($row->stop_time) : null;
            $night = $start && $stop && !$start->isSameDay($stop);
            $category = ['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'][$row->category] ?? 'Wymaga uwagi';
            $tone = match($row->category) {
                'under' => $night ? 'bg-green-400/20 text-green-800 dark:text-green-400' : 'bg-green-300/20 text-green-800 dark:text-green-300',
                'normal' => $night ? 'bg-green-400 text-green-950' : 'bg-green-300 text-green-900',
                'overtime' => $night ? 'bg-indigo-400 text-indigo-950' : 'bg-indigo-300 text-indigo-950',
                default => 'bg-yellow-300 text-yellow-950',
            };
        ?>
        <li>
        <a href="<?php echo e(route('rcp.work-session.show', $row->id)); ?>" class="group cursor-pointer text-left focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 transition-colors duration-200 h-full block w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">
        <div class="flex min-w-0 w-full flex-col items-start gap-3 text-xs leading-relaxed">
            <div class="flex w-full items-start justify-between gap-3">
                <div class="flex min-w-0 flex-1 flex-col items-start gap-2 [&>*]:m-0">
                <?php if (isset($component)) { $__componentOriginal497d29355870bef565966edfd07bde02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal497d29355870bef565966edfd07bde02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.work-session-status','data' => ['workSession' => $row,'class' => 'text-xs !font-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.work-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['work_session' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'class' => 'text-xs !font-medium']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal497d29355870bef565966edfd07bde02)): ?>
<?php $attributes = $__attributesOriginal497d29355870bef565966edfd07bde02; ?>
<?php unset($__attributesOriginal497d29355870bef565966edfd07bde02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal497d29355870bef565966edfd07bde02)): ?>
<?php $component = $__componentOriginal497d29355870bef565966edfd07bde02; ?>
<?php unset($__componentOriginal497d29355870bef565966edfd07bde02); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => ['class' => 'text-xs !font-medium break-words']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs !font-medium break-words']); ?><?php echo e($start?->copy()->locale('pl')->translatedFormat('d.m, l') ?? 'Brak START'); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($night): ?> – <?php echo e($stop->copy()->locale('pl')->translatedFormat('d.m, l')); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php echo $__env->renderComponent(); ?>
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
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 transition group-hover:bg-gray-100 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:bg-gray-700 dark:group-hover:text-gray-200 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-chevron-right text-xs" aria-hidden="true"></i></div>
            </div>
            <div class="flex w-full flex-wrap items-center gap-x-4 gap-y-2">
                <div class="flex flex-col items-center gap-1">
                    <span aria-label="<?php echo e($night ? 'Zmiana przez północ' : 'Sesja dzienna'); ?>"><?php echo e($night ? '🌙' : '⏱️'); ?></span>
                    <span class="rounded-full px-2 py-0.5 text-xs font-medium <?php echo e($tone); ?>">RCP</span>
                </div>
                <div class="flex flex-col items-center gap-1 [&>*]:m-0">
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs leading-5 whitespace-nowrap font-semibold [&>*]:text-xs [&>*]:leading-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs leading-5 whitespace-nowrap font-semibold [&>*]:text-xs [&>*]:leading-5']); ?><?php if (isset($component)) { $__componentOriginaldd68647f67a2255116b2ba7be5781704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd68647f67a2255116b2ba7be5781704 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-dark','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-dark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($start?->format('H:i') ?? '—'); ?> - <?php echo e($stop?->format('H:i') ?? '—'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $attributes = $__attributesOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__attributesOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $component = $__componentOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__componentOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs leading-5 font-medium !text-gray-500 dark:!text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs leading-5 font-medium !text-gray-500 dark:!text-gray-300']); ?><?php echo e($row->time_in_work); ?> <?php echo $__env->renderComponent(); ?>
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
                <div class="flex items-center gap-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->start_lat !== null && $row->start_lng !== null): ?><?php if (isset($component)) { $__componentOriginalacff8abfabbd819906b3ce44188b3d6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => ['title' => 'Lokalizacja START']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Lokalizacja START']); ?><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">START</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $attributes = $__attributesOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__attributesOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a)): ?>
<?php $component = $__componentOriginalacff8abfabbd819906b3ce44188b3d6a; ?>
<?php unset($__componentOriginalacff8abfabbd819906b3ce44188b3d6a); ?>
<?php endif; ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->stop_lat !== null && $row->stop_lng !== null): ?><?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal947044007d39ee7c972d0c3546688661 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => ['title' => 'Lokalizacja STOP']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Lokalizacja STOP']); ?><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span class="sr-only">STOP</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $attributes = $__attributesOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__attributesOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $component = $__componentOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__componentOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->missing_task || $row->time_in_work === '24:00:00'): ?><span title="Sesja wymaga sprawdzenia">⚠️</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->reason): ?>
                <div class="w-full border-t border-gray-200 pt-3 text-left dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300"><span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium <?php echo e($tone); ?>">Wymaga uwagi</span></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->reason): ?>
                <p class="text-xs leading-5 text-gray-600 dark:text-gray-300"><?php echo e($row->reason->label()); ?></p>
            <?php else: ?>
                <div class="flex w-full min-w-0 items-center justify-start gap-2 border-t border-gray-200 pt-3 text-left dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300"><?php if (isset($component)) { $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.type-icon','data' => ['type' => $row->object->object_type,'compact' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.type-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->object->object_type),'compact' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $attributes = $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $component = $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?><span class="break-words text-xs font-semibold leading-5 [overflow-wrap:anywhere]"><?php echo e($row->object->name); ?></span></div>
                <div class="w-full text-left"><span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium <?php echo e($tone); ?>"><?php echo e($category); ?></span></div>
                <p class="w-full text-left text-xs leading-5 <?php echo e($row->day_difference === null ? 'text-gray-600 dark:text-gray-300' : ($row->day_difference > 0 ? 'text-indigo-700 dark:text-indigo-200' : 'text-green-800 dark:text-green-200')); ?>" title="Bilans całego dnia pracownika">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row->day_difference === null): ?> Brak określonej normy
                    <?php elseif($row->day_difference < 0): ?> Brakuje <?php echo e(\App\Services\Objects\ObjectWorkReport::duration(-$row->day_difference)); ?>

                    <?php elseif($row->day_difference > 0): ?> +<?php echo e(\App\Services\Objects\ObjectWorkReport::duration($row->day_difference)); ?> ponad normę
                    <?php else: ?> Norma zrealizowana
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="flex min-w-0 items-center gap-3 border-t border-gray-200 pt-3 font-semibold dark:border-gray-600 w-full [@media(prefers-color-scheme:light)]:border-gray-300">
                <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $row->user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->user)]); ?>
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
                <div class="min-w-0 text-xs [overflow-wrap:anywhere]">
                    <p class="break-words text-xs leading-5 dark:text-gray-50"><?php echo e($row->user->name); ?></p>
                    <?php if (isset($component)) { $__componentOriginal511f850cac5424cdc86b87752ce184cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511f850cac5424cdc86b87752ce184cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-role','data' => ['user' => $row->user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-role'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row->user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511f850cac5424cdc86b87752ce184cb)): ?>
<?php $attributes = $__attributesOriginal511f850cac5424cdc86b87752ce184cb; ?>
<?php unset($__attributesOriginal511f850cac5424cdc86b87752ce184cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511f850cac5424cdc86b87752ce184cb)): ?>
<?php $component = $__componentOriginal511f850cac5424cdc86b87752ce184cb; ?>
<?php unset($__componentOriginal511f850cac5424cdc86b87752ce184cb); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
        </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <li class="p-4 text-center text-xs text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Brak sesji dla wybranego miesiąca i kategorii.</li>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</ul>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\partials\work-mobile.blade.php ENDPATH**/ ?>