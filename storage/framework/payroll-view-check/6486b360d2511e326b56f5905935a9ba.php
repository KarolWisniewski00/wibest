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

    <td class="px-1 py-1 sticky md:left-0 md:z-20 bg-white dark:bg-gray-800">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-1 font-semibold uppercase tracking-widest">
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
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->starts_at)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->ends_at)->format('H:i') : null;
                } catch (\Exception $e) {
                    $currentStart = $currentObj ? \Carbon\Carbon::parse($currentObj->start_date)->format('H:i') : null;
                    $currentEnd = $currentObj ? \Carbon\Carbon::parse($currentObj->end_date)->format('H:i') : null;
                }

                // 🔸 Łącz tylko jeśli status i godziny są identyczne
                for ($j = $i + 1; $j < $count; $j++) {
                    $nextStatus = $entries[$j];
                    $nextObj = $user->objs[$keys[$j]] ?? null;
                    try {
                        $nextStart = $nextObj ? \Carbon\Carbon::parse($nextObj->starts_at)->format('H:i') : null;
                        $nextEnd = $nextObj ? \Carbon\Carbon::parse($nextObj->ends_at)->format('H:i') : null;
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
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="<?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?> <?php echo e(route('calendar.work-schedule.edit', $user->objs[$keys[$i]])); ?> <?php endif; ?>"
                        class=" flex flex-col items-center justify-center text-center 
                                        w-full rounded-2xl p-1
                                        <?php if($user->objs[$keys[$i]]->type == 'night'): ?>
                                            bg-violet-400 dark:bg-violet-500
                                            hover:bg-violet-300 dark:hover:bg-violet-400
                                        <?php else: ?>
                                            bg-violet-300 dark:bg-violet-400
                                            hover:bg-violet-400 dark:hover:bg-violet-500
                                        <?php endif; ?>
                                        transition-colors duration-200 
                                        ">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full">
                            <span class="text-lg">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->type == 'night'): ?>
                                    🌙
                                <?php else: ?>
                                    🌀
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                ZMI
                            </span>
                        </div>

                    </a>
                </td>
            <?php elseif($currentStatus === 'leave'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">
                    <?php
                        $user_auth = auth()->user();
                    ?>
                    <a href="<?php if($user_auth->role == 'admin' || $user_auth->role == 'właściciel' || $user_auth->role == 'menedżer'): ?> <?php echo e(route('leave.pending.edit', $currentObj)); ?> <?php else: ?> <?php echo e(route('leave.single.edit', $currentObj)); ?> <?php endif; ?>"
                        class=" flex flex-col items-center justify-center text-center 
                                        w-full bg-pink-200 dark:bg-pink-400/60
                                        rounded-2xl p-1 transition-colors duration-200 
                                        hover:bg-pink-300 dark:hover:bg-pink-500/70">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full w-fit">
                            <span class="text-lg"><?php echo e(config('leavetypes.icons.' . $currentObj->type, '')); ?></span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-pink-300 text-gray-900 uppercase tracking-widest">
                                <?php echo e(config('leavetypes.shortType.' . $currentObj->type, '')); ?>

                            </span>
                        </div>
                    </a>
                </td>
            <?php elseif($currentStatus === 'static'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="<?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?> <?php echo e(route('team.user.planing', $user)); ?> <?php endif; ?>"
                        class=" flex flex-col items-center justify-center text-center w-full
                                    bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-1
                                    transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">

                        <!-- Ikona i etykieta -->
                        <div class="flex flex-col items-center justify-center h-full">
                            <span class="text-lg">🏢</span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-blue-300 text-gray-900 uppercase tracking-widest">
                                STA
                            </span>
                        </div>
                    </a>
                </td>
            <?php elseif($currentStatus === 'holiday'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <div class=" flex flex-col items-center justify-center text-center 
                                        w-full bg-rose-200 dark:bg-rose-400/60
                                        rounded-2xl p-1 transition-colors duration-200 
                                        hover:bg-rose-300 dark:hover:bg-rose-500/70">

                        <!-- Ikona i label -->
                        <div class="flex flex-col items-center justify-center h-full w-fit">
                            <span class="text-lg">🎌</span>
                            <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-rose-300 text-gray-900 uppercase tracking-widest">
                                ŚUW
                            </span>
                        </div>

                    </div>
                </td>
            <?php elseif(!empty($currentStatus)): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-1 py-1 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
                </td>
            <?php else: ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>" class="px-1 py-1 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700 
                            <?php if($user->working_hours_regular == 'stały planing'): ?>
                                dark:bg-gray-800
                                transition-colors duration-200 
                                dark:hover:bg-gray-700
                            <?php endif; ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular == 'zmienny planing'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>

                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null): ?>
                        <?php else: ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>
                                <a href="<?php echo e(route('team.user.config_planing', $user->id)); ?>" class="flex flex-col items-center justify-center text-center 
                                                    w-full rounded-2xl p-1  
                                                    bg-yellow-300 dark:bg-yellow-400
                                                    transition-colors duration-200 
                                                    hover:bg-yellow-400 dark:hover:bg-yellow-500">

                                    <!-- Ikona i label -->
                                    <div class="flex flex-col items-center justify-center h-full">
                                        <span class="text-lg">
                                            ⚠️
                                        </span>
                                        <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                            ALE
                                        </span>
                                    </div>

                                </a>
                            <?php else: ?>
                                <div class="flex flex-col items-center justify-center text-center 
                                                    w-full   rounded-2xl p-1
                                                    bg-yellow-300 dark:bg-yellow-400
                                                    transition-colors duration-200 
                                                    hover:bg-yellow-400 dark:hover:bg-yellow-500">

                                    <!-- Ikona i label -->
                                    <div class="flex flex-col items-center justify-center h-full">
                                        <span class="text-lg">
                                            ⚠️
                                        </span>
                                        <span class="px-1 py-0 mt-1 rounded-full text-[0.6rem] font-bold 
                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                            ALE
                                        </span>
                                    </div>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php
                $i += $span; // przeskocz dalej o scaloną grupę
            ?>
        <?php endwhile; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>
        <td
            class="px-1 py-1 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
        </td>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</tr><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\row-planing-smart.blade.php ENDPATH**/ ?>