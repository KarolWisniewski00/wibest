<div>
    <?php
    $days = [
    ['id' => 'monday', 'name' => 'poniedziałek', 'icon' => '🌑', 'desc' => 'Restart i skupienie', 'color' => 'bg-blue-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-blue-400 dark:peer-checked:border-blue-400'],
    ['id' => 'tuesday', 'name' => 'wtorek', 'icon' => '🌱', 'desc' => 'Energia do działania', 'color' => 'bg-green-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-green-400 dark:peer-checked:border-green-400'],
    ['id' => 'wednesday', 'name' => 'środa', 'icon' => '🔥', 'desc' => 'Punkt kulminacyjny', 'color' => 'bg-orange-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-orange-400 dark:peer-checked:border-orange-400'],
    ['id' => 'thursday', 'name' => 'czwartek', 'icon' => '🌸', 'desc' => 'Lekkość i flow', 'color' => 'bg-pink-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-pink-400 dark:peer-checked:border-pink-400'],
    ['id' => 'friday', 'name' => 'piątek', 'icon' => '🌞', 'desc' => 'Radość i nagroda', 'color' => 'bg-yellow-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-yellow-400 dark:peer-checked:border-yellow-400'],
    ['id' => 'saturday', 'name' => 'sobota', 'icon' => '🌊', 'desc' => 'Swoboda i regeneracja', 'color' => 'bg-cyan-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-cyan-400 dark:peer-checked:border-cyan-400'],
    ['id' => 'sunday', 'name' => 'niedziela', 'icon' => '🌙', 'desc' => 'Spokój i refleksja', 'color' => 'bg-purple-300', 'labelColor' => 'text-gray-900', 'borderColor' => 'peer-checked:border-purple-400 dark:peer-checked:border-purple-400'],
    ];
    ?>

    <div class="mb-6" id="days">
        <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['value' => '📅 Wybierz rozpoczęcie tygodnia pracy']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => '📅 Wybierz rozpoczęcie tygodnia pracy']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $attributes = $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $component = $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
        <ul class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-2 w-full">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="flex items-center justify-center h-full">
                <input
                    type="radio"
                    id="start-<?php echo e($day['id']); ?>"
                    name="start-day"
                    wire:model="state.working_hours_start_day"
                    value="<?php echo e($day['name']); ?>"
                    class="hidden peer">
                <label for="start-<?php echo e($day['id']); ?>"
                    class="flex flex-col items-center justify-center h-full w-full text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-xl  cursor-pointer <?php echo e($day['borderColor']); ?> hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 p-2">
                    <div class="flex flex-col items-center justify-center w-full h-full gap-2">
                        <div class="text-3xl sm:text-4xl"><?php echo e($day['icon']); ?></div>
                        <span class="px-2 py-1 rounded-full font-bold <?php echo e($day['color']); ?> <?php echo e($day['labelColor']); ?> uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs sm:text-sm md:text-base text-center w-full truncate">
                            <?php echo e($day['name']); ?>

                        </span>
                        <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm text-center w-full truncate">
                            <?php echo e($day['desc']); ?>

                        </p>
                    </div>
                </label>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>

        <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['class' => 'mt-4','value' => '📅 Wybierz zakończenie tygodnia pracy']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4','value' => '📅 Wybierz zakończenie tygodnia pracy']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $attributes = $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b)): ?>
<?php $component = $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b; ?>
<?php unset($__componentOriginale846a3f4bf16d9b022b2a902d94ae75b); ?>
<?php endif; ?>
        <ul class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-2 w-full">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="flex items-center justify-center h-full">
                <input
                    type="radio"
                    id="stop-<?php echo e($day['id']); ?>"
                    name="stop-day"
                    wire:model="state.working_hours_stop_day"
                    value="<?php echo e($day['name']); ?>"
                    class="hidden peer">
                <label for="stop-<?php echo e($day['id']); ?>"
                    class="flex flex-col items-center justify-center h-full w-full text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-xl  cursor-pointer <?php echo e($day['borderColor']); ?> hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 p-2">
                    <div class="flex flex-col items-center justify-center w-full h-full gap-2">
                        <div class="text-3xl sm:text-4xl"><?php echo e($day['icon']); ?></div>
                        <span class="px-2 py-1 rounded-full font-bold <?php echo e($day['color']); ?> <?php echo e($day['labelColor']); ?> uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs sm:text-sm md:text-base text-center w-full truncate">
                            <?php echo e($day['name']); ?>

                        </span>
                        <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm text-center w-full truncate">
                            <?php echo e($day['desc']); ?>

                        </p>
                    </div>
                </label>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\day-week-step.blade.php ENDPATH**/ ?>