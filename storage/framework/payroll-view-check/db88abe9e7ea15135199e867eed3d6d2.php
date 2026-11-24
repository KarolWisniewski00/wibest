<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['work_session']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['work_session']); ?>
<?php foreach (array_filter((['work_session']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<tr class="snap-center bg-white dark:bg-gray-800 
border-b border-gray-200 dark:border-gray-700 
<?php if($work_session->task_id != null): ?>
    border-none
<?php endif; ?>
<?php if($work_session->notes != null): ?>
    border-none
<?php endif; ?>
text-center">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
    <td class="px-3 py-2">
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
            <input type="checkbox" value=""
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="<?php echo e($work_session->id); ?>">
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
    </td>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <td class="px-2 py-2">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $work_session->user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($work_session->user)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name','data' => ['user' => $work_session->user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($work_session->user)]); ?>
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
    </td>

    <td class="px-3 py-2 text-sm ">
        <?php if (isset($component)) { $__componentOriginal497d29355870bef565966edfd07bde02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal497d29355870bef565966edfd07bde02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.RCP.work-session-status','data' => ['workSession' => $work_session,'class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('RCP.work-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['work_session' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($work_session),'class' => 'text-xs']); ?>
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
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($work_session->eventStart)): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->eventStart->location_id): ?>
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
                    <i class="fa-solid fa-location-dot mx-1"></i>
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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($work_session->eventStop)): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->eventStop->location_id): ?>
                <?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal947044007d39ee7c972d0c3546688661 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <i class="fa-solid fa-location-dot mx-1"></i>
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
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </td>
    <td class="px-3 py-2 font-semibold text-xl  text-gray-700 dark:text-gray-50">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona')): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->status == 'Praca zakończona'): ?>
                <?php
                    if ($work_session && $work_session->time_in_work != 0) {
                        $event_start_obj = \App\Models\Event::where('id', $work_session->event_start_id)->first();
                        $event_stop_obj = \App\Models\Event::where('id', $work_session->event_stop_id)->first();
                        $startDateEvent = \Carbon\Carbon::parse($event_start_obj->time);
                        $stopDateEvent = \Carbon\Carbon::parse($event_stop_obj->time);
                        // Sprawdza, czy stopDateEvent ma inną datę niż startDateEvent
                        if (!$stopDateEvent->isSameDay($startDateEvent)) {
                            $work_session->night = true; // Praca przeszła przez północ
                        } else {
                            $work_session->night = false; // Praca zakończyła się w tym samym dniu
                        }
                    }
                ?>
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <span class="text-lg md:text-xl">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->night == true): ?>
                            🌙
                        <?php else: ?>
                            ⏱️
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </td>

    <td class="px-3 py-2 font-semibold text-xl">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona')): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->status == 'Praca zakończona'): ?>
                <div class="flex flex-col items-center justify-center gap-2 my-auto">
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs whitespace-nowrap font-semibold w-fit text-start relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs whitespace-nowrap font-semibold w-fit text-start relative']); ?>
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
                            <?php echo e($startDateEvent->format('H:i')); ?> - <?php echo e($stopDateEvent->format('H:i')); ?>

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
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-gray-900 dark:text-gray-50 hover:text-gray-900 hover:dark:text-gray-50 text-xs whitespace-nowrap font-semibold w-fit text-start relative']); ?>
                        <?php echo e($work_session->time_in_work); ?>

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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div class="flex flex-row items-center justify-center text-center my-auto">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona')): ?>
            <?php else: ?>
                <div class="flex flex-col items-center justify-center text-center my-auto">
                    <span title="Error">❌</span>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->user->overtime_task): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->getAlertTask() && $work_session->task_id == null): ?>
                    <div class="flex flex-col items-center justify-center text-center my-auto">
                        <span title="Brak zadania">⚠️</span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->time_in_work == '24:00:00'): ?>
                <div class="flex flex-col items-center justify-center text-center my-auto">
                    <span title="Automatyczne zakończenie">⚠️</span>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </td>
    <td class="px-3 py-2 font-semibold text-xl text-gray-700 dark:text-gray-50">
        <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs whitespace-nowrap']); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona')): ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($work_session->eventStop == null && $work_session->status == 'W trakcie pracy') || ($work_session->eventStop != null && $work_session->status == 'Praca zakończona')): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->status == 'Praca zakończona'): ?>
                            <?php
                                // Ustawienie polskiego locale dla Carbon
                                \Carbon\Carbon::setLocale('pl');

                                $startDate = \Carbon\Carbon::parse($work_session->eventStart->time);
                                $endDate = \Carbon\Carbon::parse($work_session->eventStop->time);
                            ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->eventStart->isSameDay($work_session->eventStop->time)): ?>
                                <?php echo e($work_session->eventStart->format()); ?>

                            <?php else: ?>
                                <?php echo e($startDate->format('d.m')); ?> - <?php echo e($endDate->format('d.m')); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
            <?php else: ?>
                <span title="Error">
                    ❌ <?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal947044007d39ee7c972d0c3546688661 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Error <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $attributes = $__attributesOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__attributesOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal947044007d39ee7c972d0c3546688661)): ?>
<?php $component = $__componentOriginal947044007d39ee7c972d0c3546688661; ?>
<?php unset($__componentOriginal947044007d39ee7c972d0c3546688661); ?>
<?php endif; ?>
                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
    </td>
    <?php if (isset($component)) { $__componentOriginal9f2cfe3b49de67c3208904c5d813be1c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f2cfe3b49de67c3208904c5d813be1c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.show-cell','data' => ['href' => ''.e(route('rcp.work-session.show', $work_session)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('show-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('rcp.work-session.show', $work_session)).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f2cfe3b49de67c3208904c5d813be1c)): ?>
<?php $attributes = $__attributesOriginal9f2cfe3b49de67c3208904c5d813be1c; ?>
<?php unset($__attributesOriginal9f2cfe3b49de67c3208904c5d813be1c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f2cfe3b49de67c3208904c5d813be1c)): ?>
<?php $component = $__componentOriginal9f2cfe3b49de67c3208904c5d813be1c; ?>
<?php unset($__componentOriginal9f2cfe3b49de67c3208904c5d813be1c); ?>
<?php endif; ?>
</tr>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->task_id != null): ?>
    <tr class="snap-center
        <?php if($work_session->notes != null): ?>
            border-none
        <?php endif; ?>
     bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->task->status != null): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->task->status == 'oczekujące'): ?>
                    <?php if (isset($component)) { $__componentOriginal24bb47aeb85068c803bc2d06015e82e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal24bb47aeb85068c803bc2d06015e82e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-yellow','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-yellow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
                        <?php echo e($work_session->task->status); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-green','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
                        <?php echo e($work_session->task->status); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-red','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
                        <?php echo e($work_session->task->status); ?>

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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </td>
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
            <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
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
        </td>
        <td class="px-3 py-2">
            <div
                class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-center items-center text-center">
                <?php echo $work_session->task->note; ?>

            </div>
        </td>
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
        </td>
    </tr>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->notes != null): ?>
    <tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
            <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
                Notatka
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
        </td>
        <td class="px-3 py-2">
            <div
                class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-start items-start text-start">
                <?php echo $work_session->notes; ?>

            </div>
        </td>
        <td class="px-3 py-2">
        </td>
        <td class="px-3 py-2">
        </td>
    </tr>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\row-work-session.blade.php ENDPATH**/ ?>