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
    <td class="px-2 py-2 hidden md:table-cell sticky md:left-0 md:z-30 bg-white dark:bg-gray-800">
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
            <input type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                data-id="<?php echo e($user->id); ?>">
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

    <td class="px-2 py-2 sticky md:left-8 md:z-20 bg-white dark:bg-gray-800">
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
    <?php
        $dates = $user->dates ?? [];
        $entries = array_values($dates); // tylko wartości (statusy)
        $keys = array_keys($dates); // daty
        $count = count($entries);
        $i = 0;
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($count > 0): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php while($i < $count): ?>
            <?php
                $currentStatus = $entries[$i] ?? '';
                $span = 1;

                // 🔹 Wyciągnij godziny bieżącego dnia (jeśli są)
                $currentObj = $user->objs[$keys[$i]] ?? null;
                try {
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->eventStart->time)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->eventStop->time)->format('H:i') : null;
                } catch (\Exception $e) {
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->start_date)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->end_date)->format('H:i') : null;
                }

                // 🔸 Łącz tylko jeśli status i godziny są identyczne
                for ($j = $i + 1; $j < $count; $j++) {
                    $nextStatus = $entries[$j];
                    $nextObj = $user->objs[$keys[$j]] ?? null;
                    try {
                        $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->eventStart->time)->format('H:i') : null;
                        $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->eventStop->time)->format('H:i') : null;
                    } catch (\Exception $e) {
                        $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->start_date)->format('H:i') : null;
                        $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->end_date)->format('H:i') : null;
                    }

                    if ($currentStatus != 'work' || $currentObj && $currentObj->type && $currentObj->type == 'night') {
                        if ($nextStatus === $currentStatus && $nextStart === $currentStart && $nextEnd === $currentEnd) {
                            $span++;
                        } else {
                            break;
                        }
                    }
                }

                $startDate = $keys[$i];
                $endDate = $keys[$i + $span - 1] ?? $startDate;
            ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentStatus === 'work'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="relative px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">
                    <?php
                        $allOk = true;
                        $alert = false;
                        $alert_kind = '';
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->time_in_work == '24:00:00'): ?>
                        <?php
                            $alert = true;
                            $alert_kind = 'Automatyczne zakończenie';
                        ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->user->overtime_task): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->getAlertTask() && $user->objs[$keys[$i]]->task_id == null): ?>
                            <?php
                                $alert = true;
                                $alert_kind = 'Brak zadania';
                            ?>
                        <?php elseif($user->objs[$keys[$i]]->getAlertTask() && $user->objs[$keys[$i]]->task->status == 'oczekujące'): ?>
                            <?php
                                $alert = true;
                                $alert_kind = 'Oczekujące';
                            ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <a href="<?php if($user->objs[$keys[$i]]->multi): ?> <?php echo e(route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => \Carbon\Carbon::createFromFormat('d.m.y', $startDate)->format('Y-m-d'), 'end_date' => \Carbon\Carbon::createFromFormat('d.m.y', $endDate)->format('Y-m-d')])); ?> <?php else: ?> <?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?> <?php echo e(route('rcp.work-session.edit', $user->objs[$keys[$i]])); ?> <?php else: ?> <?php echo e(route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => \Carbon\Carbon::createFromFormat('d.m.y', $startDate)->format('Y-m-d'), 'end_date' => \Carbon\Carbon::createFromFormat('d.m.y', $endDate)->format('Y-m-d')])); ?> <?php endif; ?> <?php endif; ?>"
                        class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full rounded-2xl p-2
                                        <?php if($user->objs[$keys[$i]]->eventStop): ?>
                                            <?php if($alert): ?>
                                                bg-yellow-300 dark:bg-yellow-400
                                                hover:bg-yellow-400 dark:hover:bg-yellow-500
                                            <?php else: ?>
                                                <?php if($user->objs[$keys[$i]]->type == 'night'): ?>
                                                    <?php if($user->objs[$keys[$i]]->extra == 'extra'): ?>
                                                        <?php if($user->objs[$keys[$i]]->multi): ?>
                                                            bg-yellow-400 dark:bg-yellow-500
                                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                        <?php else: ?>
                                                            bg-indigo-400 dark:bg-indigo-500
                                                            hover:bg-indigo-300 dark:hover:bg-indigo-400
                                                            <?php
                                                                $allOk = false;
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php elseif($user->objs[$keys[$i]]->extra == 'task'): ?>
                                                        <?php if($user->objs[$keys[$i]]->multi): ?>
                                                            bg-yellow-400 dark:bg-yellow-500
                                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                        <?php else: ?>
                                                            bg-emerald-400 dark:bg-emerald-500
                                                            hover:bg-emerald-300 dark:hover:bg-emerald-400
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if($user->objs[$keys[$i]]->under == 'under'): ?>
                                                            <?php if($user->objs[$keys[$i]]->multi): ?>
                                                                bg-yellow-400 dark:bg-yellow-500
                                                                hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                            <?php else: ?>
                                                                bg-green-400/60 dark:bg-green-500/60
                                                                hover:bg-green-300/70 dark:hover:bg-green-400/70
                                                                <?php
                                                                    $allOk = false;
                                                                ?>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if($user->objs[$keys[$i]]->multi): ?>
                                                                bg-yellow-400 dark:bg-yellow-500
                                                                hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                            <?php else: ?>
                                                                bg-green-400 dark:bg-green-500
                                                                hover:bg-green-300 dark:hover:bg-green-400
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($user->objs[$keys[$i]]->extra == 'extra'): ?>
                                                        <?php if($user->objs[$keys[$i]]->multi): ?>
                                                            bg-yellow-300 dark:bg-yellow-400
                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                        <?php else: ?>
                                                            bg-indigo-300 dark:bg-indigo-400
                                                            hover:bg-indigo-400 dark:hover:bg-indigo-500
                                                            <?php
                                                                $allOk = false;
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php elseif($user->objs[$keys[$i]]->extra == 'task'): ?>
                                                        <?php if($user->objs[$keys[$i]]->multi): ?>
                                                            bg-yellow-300 dark:bg-yellow-400
                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                        <?php else: ?>
                                                            bg-emerald-300 dark:bg-emerald-400
                                                            hover:bg-emerald-400 dark:hover:bg-emerald-500
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if($user->objs[$keys[$i]]->under == 'under'): ?>
                                                            <?php if($user->objs[$keys[$i]]->multi): ?>
                                                                bg-yellow-300 dark:bg-yellow-400
                                                                hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                            <?php else: ?>
                                                                bg-green-300/60 dark:bg-green-400/60
                                                                hover:bg-green-400/70 dark:hover:bg-green-500/70
                                                                <?php
                                                                    $allOk = false;
                                                                ?>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if($user->objs[$keys[$i]]->multi): ?>
                                                                bg-yellow-300 dark:bg-yellow-400
                                                                hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                            <?php else: ?>
                                                                bg-green-300 dark:bg-green-400
                                                                hover:bg-green-400 dark:hover:bg-green-500
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            bg-rose-200/60 dark:bg-rose-400/60
                                            hover:bg-rose-300/70 dark:hover:bg-rose-500/70
                                        <?php endif; ?>
                                        transition-colors duration-200 
                                        ">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full">
                            <span class="text-2xl">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->extra == 'task' && !$user->objs[$keys[$i]]->multi): ?>
                                    🎯
                                <?php else: ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->eventStop): ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($alert): ?>
                                            ⚠️
                                        <?php else: ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->type == 'night'): ?>
                                                🌙
                                            <?php else: ?>
                                                ⏱️
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php else: ?>
                                        ❌
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                RCP
                            </span>
                        </div>

                        <!-- Godziny i dni -->
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm <?php if($user->objs[$keys[$i]]->eventStop): ?> <?php if($user->objs[$keys[$i]]->multi || $alert): ?> text-gray-800 dark:text-gray-900 <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?> <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?> leading-tight">
                                <div class="font-semibold tracking-widest uppercase">
                                    <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)->format('H:i')); ?>

                                    –
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->eventStop): ?>
                                    <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStop->time)->format('H:i')); ?> <?php else: ?> <span
                                    title="Error"><?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
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
<?php endif; ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div
                                    class="text-[0.6rem] mt-1 font-medium tracking-widest <?php if($user->objs[$keys[$i]]->eventStop): ?> <?php if($user->objs[$keys[$i]]->multi || $alert): ?> text-gray-800 dark:text-gray-900 <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?> <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?>">
                                    <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)
                                ->locale('pl')
                                ->translatedFormat('D')); ?>

                                    –
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->eventStop): ?> <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStop->time)
                                            ->locale('pl')
                                            ->translatedFormat('D')); ?> <?php else: ?> <span title="Error"><?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
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
<?php endif; ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->eventStop): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->multi && !$alert): ?>
                                    Wielokrotny odczyt pracy
                                <?php elseif($alert): ?>
                                    <?php echo e($alert_kind); ?>

                                <?php else: ?>
                                    <?php echo e($user->objs[$keys[$i]]->time_in_work); ?>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
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
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->extra == 'task'): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->multi): ?><?php else: ?>
                                <div class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                    <?php echo e(\Illuminate\Support\Str::limit(strip_tags($user->objs[$keys[$i]]->task->note), 10, '...')); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allOk == false): ?>
                            <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('rcp.work-session.fix', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('rcp.work-session.fix', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']); ?>
                                <i class="fa-solid fa-hammer"></i>
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
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->extra == 'task'): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->multi): ?><?php else: ?>
                                <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('rcp.work-session.show', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('rcp.work-session.show', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']); ?>
                                    <i class="fa-solid fa-eye"></i>
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
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($alert && $alert_kind == 'Automatyczne zakończenie'): ?>
                            <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('rcp.work-session.fix', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('rcp.work-session.fix', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']); ?>
                                <i class="fa-solid fa-hammer"></i>
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
                        <?php elseif($alert): ?>
                            <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('rcp.work-session.show', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('rcp.work-session.show', $user->objs[$keys[$i]])).'','class' => 'text-xs absolute top-0 right-0 w-fit mx-auto','style' => 'padding-left: 0.5rem;padding-right: 0.5rem;aspect-ratio: 1 / 1;']); ?>
                                <i class="fa-solid fa-eye"></i>
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
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
            <?php elseif($currentStatus === 'progress'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="<?php if($user->objs[$keys[$i]]->multi): ?> <?php echo e(route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => \Carbon\Carbon::createFromFormat('d.m.y', $startDate)->format('Y-m-d'), 'end_date' => \Carbon\Carbon::createFromFormat('d.m.y', $endDate)->format('Y-m-d')])); ?> <?php else: ?> <?php echo e(route('rcp.work-session.show', $user->objs[$keys[$i]])); ?> <?php endif; ?>"
                        class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full rounded-2xl p-2
                                        <?php if($user->objs[$keys[$i]]->type == 'night'): ?>
                                            bg-yellow-400 dark:bg-yellow-500
                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                        <?php else: ?>
                                            bg-yellow-300 dark:bg-yellow-400
                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                        <?php endif; ?>
                                        transition-colors duration-200 
                                        ">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full">
                            <span class="text-2xl">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->type == 'night'): ?>
                                    🌙
                                <?php else: ?>
                                    ⏱️
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                RCP
                            </span>
                        </div>

                        <!-- Godziny i dni -->
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">
                                <div class="font-semibold tracking-widest uppercase">
                                    <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)->format('H:i')); ?>

                                    –
                                    Teraz
                                </div>

                                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">
                                    <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->eventStart->time)
                                ->locale('pl')
                                ->translatedFormat('D')); ?>

                                    –
                                    Teraz
                                </div>
                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            W trakcie pracy
                        </p>

                    </a>
                </td>
            <?php elseif($currentStatus === 'leave'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">
                    <?php
                        $user_auth = auth()->user();
                    ?>
                    <a href="<?php if($user_auth->role == 'admin' || $user_auth->role == 'właściciel' || $user_auth->role == 'menedżer'): ?> <?php echo e(route('leave.pending.edit', $currentObj)); ?> <?php else: ?> <?php echo e(route('leave.single.edit', $currentObj)); ?> <?php endif; ?>"
                        class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full bg-pink-200 dark:bg-pink-400/60
                                        rounded-2xl p-2 transition-colors duration-200 
                                        hover:bg-pink-300 dark:hover:bg-pink-500/70">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full w-fit">
                            <span class="text-2xl"><?php echo e(config('leavetypes.icons.' . $currentObj->type, '')); ?></span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-pink-300 text-gray-900 uppercase tracking-widest">
                                <?php echo e(config('leavetypes.shortType.' . $currentObj->type, '')); ?>

                            </span>
                        </div>
                        <!-- Dane szczegółowe -->
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                                <div class="font-semibold tracking-widest uppercase">
                                    <?php echo e($currentObj->type); ?>

                                </div>

                                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                                    <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->start_date)
                                ->locale('pl')
                                ->translatedFormat('D')); ?>

                                    –
                                    <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->end_date)
                                ->locale('pl')
                                ->translatedFormat('D')); ?>

                                </div>
                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            WNIOSEK
                        </p>

                    </a>
                </td>
            <?php elseif($currentStatus === 'holiday'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <div class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full bg-rose-200 dark:bg-rose-400/60
                                        rounded-2xl p-2 transition-colors duration-200 
                                        hover:bg-rose-300 dark:hover:bg-rose-500/70">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full w-fit">
                            <span class="text-2xl">🎌</span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-rose-300 text-gray-900 uppercase tracking-widest">
                                ŚUW
                            </span>
                        </div>

                        <!-- Dane szczegółowe -->
                        <div class="mt-2 h-full flex flex-col justify-center items-center">
                            <div
                                class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                                <div class="font-semibold tracking-widest uppercase">
                                    Święto
                                </div>

                                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                                    Ustawowo
                                </div>
                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            Wolne
                        </p>

                    </div>
                </td>
            <?php elseif(!empty($currentStatus)): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                </td>
            <?php else: ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>
                    <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                        class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700 ">
                        <a href="<?php echo e(route('rcp.work-session.create.user', [$user, $startDate])); ?>" class="group h-[180px] relative flex flex-col items-center justify-center text-center
                                            w-full rounded-2xl p-2
                                            bg-green-300/60 dark:bg-green-400/60 backdrop-blur-md
                                            transition-all duration-300 ease-out
                                            opacity-0 hover:opacity-100">

                            <!-- Główna ikona i etykieta -->
                            <div class="flex flex-col items-center justify-center h-full">
                                <span class="text-2xl">
                                    ⏱️
                                </span>
                                <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                    bg-white/60 text-gray-900 uppercase tracking-widest">
                                    RCP
                                </span>
                            </div>

                            <!-- Sekcja akcji -->
                            <div class="mt-2 h-full flex flex-col justify-center items-center">
                                <div class="flex flex-col justify-center items-center text-gray-900 dark:text-gray-900 
                                                    text-xs uppercase tracking-widest bg-green-300 
                                                    px-4 py-2 rounded-lg backdrop-blur-sm font-semibold">
                                    <div class="font-bold tracking-widest uppercase flex items-center gap-2">
                                        <i class="fa-solid fa-plus"></i>
                                        NOWA
                                    </div>
                                </div>
                            </div>


                            <!-- Opis -->
                            <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                Praca
                            </p>
                        </a>
                    </td>
                <?php else: ?>
                    <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                        class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                    </td>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php
                $i += $span; // przeskocz dalej o scaloną grupę
            ?>
        <?php endwhile; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>
        <td
            class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
        </td>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</tr><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\row-raport.blade.php ENDPATH**/ ?>