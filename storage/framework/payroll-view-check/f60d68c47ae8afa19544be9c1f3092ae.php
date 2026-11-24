    <?php
    $shortType = ['wolne za pracę w święto' => 'WPS',
    'zwolnienie lekarskie' => 'ZL',
    'urlop wypoczynkowy' => 'UW',
    'urlop planowany' => 'UP',
    'urlop rodzicielski' => 'UR',
    'wolne za nadgodziny' => 'WN',
    'wolne za święto w sobotę' => 'WSS',
    'urlop bezpłatny' => 'UB',
    'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
    'zwolnienie lekarsie - opieka' => 'ZLO',
    'urlop okolicznościowy' => 'UO',
    'urlop wypoczynkowy "na żądanie"' => 'UWZ',
    'oddanie krwi' => 'OK',
    'urlop ojcowski' => 'UOJC',
    'urlop macieżyński' => 'UM',
    'świadczenie rehabilitacyjne' => 'SR',
    'opieka' => 'OP',
    'świadek w sądzie' => 'SWS',
    'praca zdalna' => 'PZ',
    'kwarantanna' => 'KW',
    'kwarantanna z pracą zdalną' => 'KWZPZ',
    'delegacja' => 'DEL',
    'święto' => 'ŚUW'
    ];
    $icons = [
    'wolne za pracę w święto' => '🕊️',
    'zwolnienie lekarskie' => '🤒',
    'urlop wypoczynkowy' => '🏖️',
    'urlop planowany' => '🏖️',
    'urlop rodzicielski' => '👶',
    'wolne za nadgodziny' => '⏰',
    'wolne za święto w sobotę' => '🗓️',
    'urlop bezpłatny' => '💸',
    'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
    'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
    'urlop okolicznościowy' => '🎉',
    'urlop wypoczynkowy "na żądanie"' => '📢',
    'oddanie krwi' => '🩸',
    'urlop ojcowski' => '👨‍👧',
    'urlop macieżyński' => '🤱',
    'świadczenie rehabilitacyjne' => '🦾',
    'opieka' => '🧑‍🍼',
    'świadek w sądzie' => '⚖️',
    'praca zdalna' => '💻',
    'kwarantanna' => '🦠',
    'kwarantanna z pracą zdalną' => '🏠💻',
    'delegacja' => '✈️',
    'święto' => '🎌',
    ];
    ?>
    <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="mb-4">
        <div class="flex justify-between items-center my-4 px-1">
            <span class="text-md md:text-lg font-bold text-gray-900 dark:text-white"><?php echo e($monthName); ?></span>
            <div class="space-x-2 md:space-x-0">
                <button wire:click="goToPreviousMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                    <i class="fa-solid fa-chevron-left"></i><span class=" mx-1">pop</span>
                </button>
                <button wire:click="goToNextMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                    <span class=" mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginalffa814daf7c6ec07c6fdb6fa74837235 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalffa814daf7c6ec07c6fdb6fa74837235 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-calendar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-calendar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium rounded-lg">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Pon', 'Wt', 'Śr', 'Czw', 'Pt', 'Sob', 'Ndz']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white py-2 m-0.5 text-center  rounded-lg">
                    <?php echo e($dayName); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $weeks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $week; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button
                    type="button"
                    
                        <?php if($day['leave'] || $day['isHoliday'] || $day['rcp']): ?>
                        x-data="{ clicked: false }"
                        @click="
                            $dispatch('calendar-unselect');
                            clicked = true
                        "
                        @calendar-unselect.window="clicked = false"
                        :class="border-gray-200 dark:border-gray-300"    
                        <?php else: ?>
                        wire:click="selectDate('<?php echo e($day['date']->format('Y-m-d')); ?>', '<?php echo e($typeTime); ?>')"
                        wire:key="day-<?php echo e($day['date']->format('Y-m-d')); ?>"
                        <?php endif; ?>
                        @click="
                            $dispatch('calendar-unselect');
                            clicked = true
                        "
                        @calendar-unselect.window="clicked = false"
                        class="
                            bg-white dark:bg-gray-900 h-28 w-full relative p-2 border-2 rounded-lg
                            flex flex-col items-start justify-start
                            border-gray-200 dark:border-gray-800
                        ">
                        <div class="flex flex-col items-start justify-start">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($day['date']->isToday()): ?>
                                <div class="text-gray-900 bg-red-300 dark:bg-red-300 rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mb-1">
                                    <?php echo e($day['date']->day); ?> 
                                </div>
                            <?php else: ?>
                                <div class="text-gray-900 dark:text-white text-[11px] font-semibold mb-1">
                                    <?php echo e($day['date']->day); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($day['rcp']): ?>
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl">⏱️</span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    RCP
                                </span>
                            </div>
                        <?php elseif($day['leave']): ?>
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl"><?php echo e($icons[$day['leave']] ?? ''); ?></span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    <?php echo e($shortType[$day['leave']] ?? ''); ?>

                                </span>
                            </div>
                        <?php elseif($day['isHoliday']): ?>
                            <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                <span class="text-lg md:text-xl"><?php echo e($icons['święto'] ?? ''); ?></span>
                                <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                    <?php echo e($shortType['święto'] ?? ''); ?>

                                </span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalffa814daf7c6ec07c6fdb6fa74837235)): ?>
<?php $attributes = $__attributesOriginalffa814daf7c6ec07c6fdb6fa74837235; ?>
<?php unset($__attributesOriginalffa814daf7c6ec07c6fdb6fa74837235); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalffa814daf7c6ec07c6fdb6fa74837235)): ?>
<?php $component = $__componentOriginalffa814daf7c6ec07c6fdb6fa74837235; ?>
<?php unset($__componentOriginalffa814daf7c6ec07c6fdb6fa74837235); ?>
<?php endif; ?>
    </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $attributes = $__attributesOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $component = $__componentOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__componentOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\calendar-view.blade.php ENDPATH**/ ?>