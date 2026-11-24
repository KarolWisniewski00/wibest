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
    <div class="mb-4">
        <div class="relative mb-4 border-gray-300">
            <input
                value="<?php echo e($selectedDate); ?>"
                type="text"
                id="start"
                placeholder="Niżej wybierz datę"
                readonly
                class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
            <span
                id="toggleDatepicker"
                class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                <i class="fa-solid fa-calendar-days"></i>
            </span>
        </div>
        <div class="flex justify-between items-center my-4 px-1">
            <span class="text-md md:text-lg font-bold text-gray-800 dark:text-white"><?php echo e($monthName); ?></span>
            <div class="space-x-2">
                <button wire:click="goToPreviousMonth" class="text-gray-600 dark:text-white" type="button">
                    <i class="fa-solid fa-chevron-left"></i><span class="mx-1">pop</span>
                </button>
                <button wire:click="goToNextMonth" class="text-gray-600 dark:text-white" type="button">
                    <span class="mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
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
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['PON', 'WT', 'ŚR', 'CZW', 'PT', 'SOB', 'NDZ']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-white py-2 m-0.5 text-center  rounded-lg">
                    <?php echo e($dayName); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $weeks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $week; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    type="button"
                    x-data="{ clicked: false }"
                    <?php if($day['leave'] || $day['isHoliday'] || $day['rcp'] || ($day['work_block']=='work' )): ?>
                    :class="
                        clicked ? 'border-rose-300 dark:border-rose-300' : 
                        ('<?php echo e($selectedDate === $day['date']->format('Y-m-d') ? ($day['leave'] || $day['isHoliday'] || $day['rcp'] || ($day['work_block'] == 'work') ? 'border-rose-300 dark:border-rose-300' : 'border-green-300 dark:border-green-300') : 'border-gray-200 dark:border-gray-800'); ?>')"
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
                            <?php if($selectedDate === $day['date']->format('Y-m-d')): ?>
                                <?php if(!($day['leave'] || $day['isHoliday'] || $day['rcp']) && $day['work_block'] !== 'night'): ?>
                                    border-green-300 dark:border-green-300
                                <?php elseif($day['leave'] || $day['isHoliday'] || $day['rcp']): ?>
                                    border-rose-300 dark:border-rose-300
                                <?php elseif($day['work_block'] == 'night'): ?>
                                    border-yellow-300 dark:border-yellow-300
                                <?php endif; ?>
                            <?php else: ?>
                                border-gray-200 dark:border-gray-800
                            <?php endif; ?>
                        ">
                    <div class="flex flex-col items-start justify-start">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($day['date']->isToday()): ?>
                        <div class="text-gray-900 bg-rose-300 dark:bg-rose-300 rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mb-1">
                            <?php echo e($day['date']->day); ?>

                        </div>
                        <?php else: ?>
                        <div class="text-gray-900 dark:text-white rounded-full w-6 h-6 flex items-center justify-center text-[11px] font-semibold mb-1">
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
                    <?php elseif($day['multi']): ?>
                    <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2 <?php echo e(($multi ?? false) ? 'opacity-50' : ''); ?>">
                        <span class="text-lg md:text-xl"><?php echo e($icons['święto'] ?? ''); ?></span>
                        <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                            <?php echo e($shortType['święto'] ?? ''); ?>

                        </span>
                    </div>
                    <?php elseif($day['isHoliday']): ?>
                    <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                        <span class="text-lg md:text-xl"><?php echo e($icons['święto'] ?? ''); ?></span>
                        <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                            <?php echo e($shortType['święto'] ?? ''); ?>

                        </span>
                    </div>
                    <?php elseif($day['work_block']): ?>
                    <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                        <span class="text-lg md:text-xl">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($day['work_block'] == 'night'): ?>
                            🌙
                            <?php else: ?>
                            🌀
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </span>
                        <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-violet-300 dark:bg-violet-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                            ZMI
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
    </div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\calendar.blade.php ENDPATH**/ ?>