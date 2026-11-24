<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['user']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['user']); ?>
<?php foreach (array_filter((['user']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<tr class="snap-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 text-center">
    <td class="px-2 py-2 hidden md:table-cell sticky md:left-0 md:z-30 bg-white dark:bg-gray-800 min-w-[32px]">
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
            <input type="radio"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="<?php echo e($user->id); ?>" data-name="<?php echo e($user->name); ?>" name="radio">
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

    <td class="px-2 py-2 sticky md:left-8 md:z-20 bg-white dark:bg-gray-800 min-w-[200px]">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
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
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular == 'stały planing'): ?>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_planned != ''): ?>
                        <?php echo e($user->time_in_work_hms_planned); ?>

                    <?php else: ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>
                            <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => ''.e(route('team.user.config_planing', $user->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.config_planing', $user->id)).'']); ?>
                                Konfiguracja
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '']); ?>
                                Konfiguracja
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_total != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms_total); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_extra != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms_extra); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_under != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms_under); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_leave != '00h'): ?>
                        <?php echo e($user->time_in_work_hms_leave); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->leave_times_by_type): ?>
            <?php
                $shortTypes = config('leavetypes.shortType', []);
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $shortTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $leaveType = collect($user->leave_times_by_type)
                        ->firstWhere('type', $type);
                ?>
                <td class="px-3 py-2 font-semibold text-lg text-gray-700 dark:text-gray-50  min-w-[200px]">
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                        <span class="text-gray-400">
                            <?php echo e($leaveType['hms'] ?? ''); ?>

                        </span>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_planned != ''): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_planned != '00h 00min 00s'): ?>
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                        <span class="text-gray-400">
                            <?php echo e($user->time_in_work_hms_planned); ?>

                        </span>
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
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => ''.e(route('calendar.work-schedule.index')).'','class' => 'text-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('calendar.work-schedule.index')).'','class' => 'text-sm']); ?>
                        Zaplanuj godziny pracy
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
            <?php else: ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>
                    <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => ''.e(route('team.user.config_planing', $user->id)).'','class' => 'text-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.config_planing', $user->id)).'','class' => 'text-sm']); ?>
                        Konfiguracja
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-span','data' => ['href' => '','class' => 'text-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '','class' => 'text-sm']); ?>
                        Konfiguracja
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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </td>
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_total != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms_total); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_extra != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms_extra); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_under != '00h 00min 00s'): ?>
                        <?php echo e($user->time_in_work_hms_under); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <td class="px-3 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 min-w-[200px]">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                <span class="text-gray-400">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->time_in_work_hms_leave != '00h'): ?>
                        <?php echo e($user->time_in_work_hms_leave); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->leave_times_by_type): ?>
            <?php
                $shortTypes = config('leavetypes.shortType', []);
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $shortTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $leaveType = collect($user->leave_times_by_type)
                        ->firstWhere('type', $type);
                ?>
                <td class="px-3 py-2 font-semibold text-lg text-gray-700 dark:text-gray-50  min-w-[200px]">
                    <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'font-semibold w-fit text-start text-sm py-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold w-fit text-start text-sm py-2']); ?>
                        <span class="text-gray-400">
                            <?php echo e($leaveType['hms'] ?? ''); ?>

                        </span>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</tr><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\row-attendance.blade.php ENDPATH**/ ?>