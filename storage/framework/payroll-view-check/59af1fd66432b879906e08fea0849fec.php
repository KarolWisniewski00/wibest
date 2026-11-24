<div class="mb-4 <?php if($type == 'second'): ?> hidden lg:block <?php endif; ?>">

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type == 'first'): ?>
    <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'datepicker','value' => '📅 Zakres dat od']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'datepicker','value' => '📅 Zakres dat od']); ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type == 'second'): ?>
    <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'datepicker','value' => '📅 Zakres dat do']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'datepicker','value' => '📅 Zakres dat do']); ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="relative mb-4 border-gray-300 <?php if($type == 'second'): ?> flex lg:hidden <?php endif; ?>">
        <input
            value="<?php if($type == 'first'): ?><?php if($startDate): ?><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')); ?><?php endif; ?> <?php else: ?> <?php if($endDate): ?><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')); ?><?php endif; ?> <?php endif; ?>"
            type="text"
            id="start"
            placeholder=""
            readonly
            class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
        <span
            id="toggleDatepicker"
            class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
            <i class="fa-solid fa-calendar-days"></i>
        </span>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($calendar == 'single'): ?>
    <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'datepicker','value' => '📅 Zakres dat do']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'datepicker','value' => '📅 Zakres dat do']); ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="relative mb-4 border-gray-300 <?php if($type == 'first'): ?> flex <?php if($calendar != 'single'): ?> lg:hidden <?php endif; ?> <?php endif; ?> ">
        <input
            value="<?php if($endDate): ?><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')); ?> <?php endif; ?>"
            type="text"
            id="start"
            placeholder=""
            readonly
            class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
        <span
            id="toggleDatepicker"
            class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
            <i class="fa-solid fa-calendar-days"></i>
        </span>
    </div>
    <div class="flex justify-between items-center my-4 px-1 ">
        <span class="text-md md:text-lg font-bold text-gray-900 dark:text-white"><?php echo e($monthName); ?></span>
        <div class="space-x-2">
            <button wire:click="goToPreviousMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                <i class="fa-solid fa-chevron-left"></i><span class="mx-1">pop</span>
            </button>
            <button wire:click="goToNextMonth" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" type="button">
                <span class="mx-1">nas</span><i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <div class="flex-col w-full ">
        <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium rounded-lg">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['PON', 'WT', 'ŚR', 'CZW', 'PT', 'SOB', 'NDZ']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white py-2 m-0.5 text-center rounded-lg tracking-widest">
                <?php echo e($dayName); ?>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $weeks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $week; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $dateStr = $day['date']->format('Y-m-d');
            $isStart = $dateStr === $startDate;
            $isEnd = $dateStr === $endDate;
            $isInRange = $this->isDateInRange($dateStr);
            if($work_session && !$workSessionId){
            $isTaken = $day['leave'] || ($day['rcp'] && $day['rcp']->night == false) || $day['isHoliday'] || ($day['work_block'] == 'work');
            }elseif($work_session && $workSessionId){
            $isTaken = $day['leave'] || $day['isHoliday'] || ($day['work_block'] == 'work');
            }else{
            $isTaken = $day['leave'] || $day['rcp'] || $day['isHoliday'] || ($day['work_block'] == 'work');
            }
            $isWarning = $day['isHoliday'];

            // Określenie klasy podświetlenia
            $highlightClass = '';
            if ($isStart || $isEnd) {
            if ($isTaken) {
            //brzegi
            $highlightClass = 'border-rose-300 bg-rose-100 dark:bg-rose-900/70';
            } else{
            $highlightClass = 'border-green-300 bg-green-100 dark:bg-green-900/70';
            }

            } elseif ($isInRange) {
            //wśrodku
            if ($isTaken) {
            $highlightClass = 'border-rose-300 bg-rose-50 dark:bg-rose-950/70';
            if ($isWarning) {
            $highlightClass = 'border-green-300 bg-green-50 dark:bg-green-950/70';
            }

            } else{
            $highlightClass = 'border-green-300 bg-green-50 dark:bg-green-950/70';
            }
            } else {
            //niezaznaczone
            if ($isTaken) {
            $highlightClass = 'border-gray-200 dark:border-gray-800 hover:border-rose-300';
            if ($isWarning) {
            $highlightClass = 'border-gray-200 dark:border-gray-800 hover:border-rose-300';
            }

            } else{
            $highlightClass = 'border-gray-200 dark:border-gray-800 hover:border-green-300';
            }

            }

            // Klasa dla nieaktywnych miesięcy (poza bieżącym)
            $isOtherMonth = !$day['date']->isSameMonth($this->currentMonth);
            if ($isOtherMonth) {
            $highlightClass .= ' opacity-50 pointer-events-none';
            }
            ?>

            <button
                type="button"
                wire:click="<?php if(!$isTaken && !$isOtherMonth): ?> selectDate('<?php echo e($dateStr); ?>') <?php endif; ?>"
                wire:key="day-<?php echo e($dateStr); ?>"
                class="
                     dark:bg-gray-900 h-28 w-full relative p-2 border-2 rounded-lg transition duration-150 ease-in-out
                    flex flex-col items-start justify-start shadow-sm
                    <?php echo e($highlightClass); ?>

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
                    <span class="text-lg md:text-xl">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($day['rcp']->night == true): ?>
                        🌙
                        <?php else: ?>
                        ⏱️
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        RCP
                    </span>
                </div>
                <?php elseif($day['leave']): ?>
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="text-lg md:text-xl"><?php echo e(config('leavetypes.icons.' . $day['leave'], '')); ?></span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-pink-300 dark:bg-pink-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        <?php echo e(config('leavetypes.shortType.' . $day['leave'], '')); ?>

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
                <?php elseif($day['multi']): ?>
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2 opacity-50">
                    <span class="text-lg md:text-xl"><?php echo e(config('leavetypes.icons.' . 'święto', '')); ?></span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        <?php echo e(config('leavetypes.shortType.' . 'święto', '')); ?>

                    </span>
                </div>
                <?php elseif($day['isHoliday']): ?>
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="text-lg md:text-xl"><?php echo e(config('leavetypes.icons.' . 'święto', '')); ?></span>
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        <?php echo e(config('leavetypes.shortType.' . 'święto', '')); ?>

                    </span>
                </div>
                <?php elseif($isStart || $isEnd): ?>
                <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                    <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-gray-200 dark:bg-gray-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                        <?php echo e($isStart ? 'OD' : ''); ?>

                        <?php echo e($isEnd ? "DO" : ''); ?>

                    </span>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\calendar-from-to-auto.blade.php ENDPATH**/ ?>