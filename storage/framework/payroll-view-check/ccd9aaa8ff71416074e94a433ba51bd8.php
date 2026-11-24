<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'obj',
    'obj_status',
    'dateInfo' => null,
    'startDate' => null,
    'endDate' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'obj',
    'obj_status',
    'dateInfo' => null,
    'startDate' => null,
    'endDate' => null,
]); ?>
<?php foreach (array_filter(([
    'obj',
    'obj_status',
    'dateInfo' => null,
    'startDate' => null,
    'endDate' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj_status == 'holiday'): ?>

    <div class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                    w-full bg-rose-200 dark:bg-rose-400/60
                    rounded-2xl p-2 transition-colors duration-200
                    hover:bg-rose-300 dark:hover:bg-rose-500/70">

        <div class="flex flex-col items-center justify-center h-full w-fit">
            <span class="text-lg md:text-2xl">🎌</span>

            <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold
                             bg-rose-300 text-gray-900 uppercase tracking-widest">
                ŚUW
            </span>
        </div>

        <div class="mt-2 h-full flex flex-col justify-center items-center">
            <div class="flex flex-col items-center text-[0.65rem] md:text-sm
                            text-gray-800 dark:text-gray-100 leading-tight">

                <div class="font-semibold tracking-widest uppercase
                                max-w-[4ch] truncate sm:max-w-[8ch]
                                md:max-w-[10ch] lg:max-w-[10ch]">
                    Święto
                </div>

                <div class="text-[0.6rem] mt-1 font-medium tracking-widest
                                text-gray-700 dark:text-gray-200
                                max-w-[4ch] truncate sm:max-w-[8ch]
                                md:max-w-[10ch] lg:max-w-[10ch]">
                    Ustawowo
                </div>

            </div>
        </div>

        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800
                      dark:text-gray-900 tracking-wide uppercase
                      max-w-[4ch] truncate sm:max-w-[8ch]
                      md:max-w-[10ch] lg:max-w-[10ch]">
            Wolne
        </p>

    </div>

<?php elseif($obj instanceof \App\Models\Leave): ?>

    <?php
        $user_auth = auth()->user();
    ?>

    <a href="<?php if($user_auth->role == 'admin' || $user_auth->role == 'właściciel' || $user_auth->role == 'menedżer'): ?>
        <?php echo e(route('leave.pending.edit', $obj)); ?>

     <?php else: ?>
                    <?php echo e(route('leave.single.edit', $obj)); ?>

                 <?php endif; ?>" class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                  w-full bg-pink-200 dark:bg-pink-400/60
                  rounded-2xl p-2 transition-colors duration-200
                  hover:bg-pink-300 dark:hover:bg-pink-500/70">

        <div class="flex flex-col items-center justify-center h-full w-fit">

            <span class="text-lg md:text-2xl">
                <?php echo e(config('leavetypes.icons.' . $obj->type, '')); ?>

            </span>

            <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold
                             bg-pink-300 text-gray-900 uppercase tracking-widest">
                <?php echo e(config('leavetypes.shortType.' . $obj->type, '')); ?>

            </span>

        </div>

        <div class="mt-2 h-full flex flex-col justify-center items-center">

            <div class="flex flex-col items-center text-[0.65rem] md:text-sm
                            text-gray-800 dark:text-gray-100 leading-tight">

                <div class="font-semibold tracking-widest uppercase
                                max-w-[4ch] truncate sm:max-w-[6ch]
                                md:max-w-[8ch] xl:max-w-[12ch] text-wrap">
                    <?php echo e($obj->type); ?>

                </div>

                <div class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest
                                text-gray-700 dark:text-gray-200">

                    <?php echo e(\Carbon\Carbon::parse($obj->start_date)
            ->locale('pl')
            ->translatedFormat('D')); ?>


                    <span class="hidden lg:inline">–</span>

                    <?php echo e(\Carbon\Carbon::parse($obj->end_date)
            ->locale('pl')
            ->translatedFormat('D')); ?>


                </div>
            </div>

        </div>

        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800
                      dark:text-gray-900 tracking-wide uppercase
                      max-w-[4ch] truncate sm:max-w-[8ch]
                      md:max-w-[10ch] lg:max-w-[10ch]">
            WNIOSEK
        </p>

    </a>

<?php elseif($obj instanceof \App\Models\WorkSession): ?>

    <?php
        $user = Auth::user();

        $allOk = true;
        $alert = false;
        $alert_kind = '';

        if ($obj->time_in_work == '24:00:00') {
            $alert = true;
            $alert_kind = 'Automatyczne zakończenie';
        }

        if ($obj->user->overtime_task) {

            if ($obj->getAlertTask() && $obj->task_id == null) {
                $alert = true;
                $alert_kind = 'Brak zadania';

            } elseif ($obj->getAlertTask() && $obj->task->status == 'oczekujące') {
                $alert = true;
                $alert_kind = 'Oczekujące';
            }
        }

        $startTime = null;
        $endTime = null;

        if ($obj->eventStart) {
            $startTime = \Carbon\Carbon::parse($obj->eventStart->time)->format('Y-m-d');
        }

        if ($obj->eventStop) {
            $endTime = \Carbon\Carbon::parse($obj->eventStop->time)->format('Y-m-d');
        }
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj_status == 'work'): ?>
        <a href="<?php if($obj->multi): ?> <?php echo e(route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => $startTime, 'end_date' => $endTime])); ?> <?php else: ?> <?php echo e(route('rcp.work-session.show', $obj)); ?> <?php endif; ?> "
            class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center 
                                                                    w-full rounded-2xl p-1
                                                                    <?php if($obj->eventStop): ?>
                                                                        <?php if($alert): ?>
                                                                            bg-yellow-300 dark:bg-yellow-400
                                                                            hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                        <?php else: ?>
                                                                            <?php if($obj->type == 'night'): ?>
                                                                                <?php if($obj->extra == 'extra'): ?>
                                                                                    <?php if($obj->multi): ?>
                                                                                        bg-yellow-400 dark:bg-yellow-500
                                                                                        hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                                                    <?php else: ?>
                                                                                        bg-indigo-400 dark:bg-indigo-500
                                                                                        hover:bg-indigo-300 dark:hover:bg-indigo-400
                                                                                        <?php
                                                                                            $allOk = false;
                                                                                        ?>
                                                                                    <?php endif; ?>
                                                                                <?php elseif($obj->extra == 'task'): ?>
                                                                                    <?php if($obj->multi): ?>
                                                                                        bg-yellow-400 dark:bg-yellow-500
                                                                                        hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                                                    <?php else: ?>
                                                                                        bg-emerald-400 dark:bg-emerald-500
                                                                                        hover:bg-emerald-300 dark:hover:bg-emerald-400
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <?php if($obj->under == 'under'): ?>
                                                                                        <?php if($obj->multi): ?>
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
                                                                                        <?php if($obj->multi): ?>
                                                                                            bg-yellow-400 dark:bg-yellow-500
                                                                                            hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                                                        <?php else: ?>
                                                                                            bg-green-400 dark:bg-green-500
                                                                                            hover:bg-green-300 dark:hover:bg-green-400
                                                                                        <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            <?php else: ?>
                                                                                <?php if($obj->extra == 'extra'): ?>
                                                                                    <?php if($obj->multi): ?>
                                                                                        bg-yellow-300 dark:bg-yellow-400
                                                                                        hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                                    <?php else: ?>
                                                                                        bg-indigo-300 dark:bg-indigo-400
                                                                                        hover:bg-indigo-400 dark:hover:bg-indigo-500
                                                                                        <?php
                                                                                            $allOk = false;
                                                                                        ?>
                                                                                    <?php endif; ?>
                                                                                <?php elseif($obj->extra == 'task'): ?>
                                                                                    <?php if($obj->multi): ?>
                                                                                        bg-yellow-300 dark:bg-yellow-400
                                                                                        hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                                                    <?php else: ?>
                                                                                        bg-emerald-300 dark:bg-emerald-400
                                                                                        hover:bg-emerald-400 dark:hover:bg-emerald-500
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <?php if($obj->under == 'under'): ?>
                                                                                        <?php if($obj->multi): ?>
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
                                                                                        <?php if($obj->multi): ?>
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
                <span class="text-lg md:text-2xl">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->extra == 'task' && !$obj->multi): ?>
                        🎯
                    <?php else: ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->eventStop): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($alert): ?>
                                ⚠️
                            <?php else: ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->type == 'night'): ?>
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
                <span
                    class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                    RCP
                </span>
                <!-- Godziny i dni -->
                <div class="mt-2 h-full flex flex-col justify-center items-center">
                    <div
                        class="flex flex-col items-center text-[0.65rem] md:text-sm <?php if($obj->eventStop): ?> <?php if($obj->multi || $alert): ?> text-gray-800 dark:text-gray-900 <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?> <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?> leading-tight">
                        <div class="font-semibold tracking-widest uppercase flex flex-col xl:flex-row">
                            <span class="hidden sm:flex">
                                <?php echo e(\Carbon\Carbon::parse($obj->eventStart->time)->format('H:i')); ?>

                            </span>
                            <span class="sm:hidden">
                                <?php echo e(substr(\Carbon\Carbon::parse($obj->eventStart->time)->format('H:i'), 0, -3)); ?>

                            </span>
                            <span class="inline ">
                                –
                            </span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->eventStop): ?>
                                <span class="hidden sm:flex">
                                    <?php echo e(\Carbon\Carbon::parse($obj->eventStop->time)->format('H:i')); ?>

                                </span>
                                <span class="sm:hidden">
                                    <?php echo e(substr(\Carbon\Carbon::parse($obj->eventStop->time)->format('H:i'), 0, -3)); ?>

                            </span> <?php else: ?> <span title="Error"><?php if (isset($component)) { $__componentOriginal947044007d39ee7c972d0c3546688661 = $component; } ?>
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
                            class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest <?php if($obj->eventStop): ?> <?php if($obj->multi || $alert): ?> text-gray-800 dark:text-gray-900 <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?> <?php else: ?> text-gray-800 dark:text-gray-100 <?php endif; ?>">
                            <?php echo e(\Carbon\Carbon::parse($obj->eventStart->time)
                        ->locale('pl')
                        ->translatedFormat('D')); ?>

                            <span class="hidden lg:inline">
                                –
                            </span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->eventStop): ?> <?php echo e(\Carbon\Carbon::parse($obj->eventStop->time)
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
                <p
                    class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[4ch] truncate sm:max-w-[8ch]  md:max-w-[10ch] lg:max-w-[10ch]">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->eventStop): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->multi && !$alert): ?>
                            Wielokrotny odczyt pracy
                        <?php elseif($alert): ?>
                            <?php echo e($alert_kind); ?>

                        <?php else: ?>
                            <span class="hidden md:flex">
                                <?php echo e($obj->time_in_work); ?>

                            </span>
                            <span class="md:hidden">
                                <?php echo e(substr($obj->time_in_work, 0, -6)); ?>h
                            </span>
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->extra == 'task'): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->multi): ?>
                    <?php else: ?>
                        <div
                            class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[5ch] truncate sm:max-w-[8ch]  md:max-w-[10ch] lg:max-w-[10ch]">
                            <?php echo e(\Illuminate\Support\Str::limit(strip_tags($obj->task->note), 10, '...')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </a>
    <?php elseif($obj_status == 'progress'): ?>
        <a href="<?php if($obj->multi): ?> <?php echo e(route('rcp.work-session.index', ['filter_user_id' => $user->id, 'start_date' => $startTime, 'end_date' => $endTime])); ?> <?php else: ?> <?php echo e(route('rcp.work-session.show', $obj)); ?> <?php endif; ?>"
            class="min-h-[130px] md:min-h-[175px] relative flex flex-col items-center justify-center text-center 
                                                            w-full rounded-2xl p-2

                                                            <?php if($obj->type == 'night'): ?>
                                                                bg-yellow-400 dark:bg-yellow-500
                                                                hover:bg-yellow-300 dark:hover:bg-yellow-400
                                                            <?php else: ?>
                                                                bg-yellow-300 dark:bg-yellow-400
                                                                hover:bg-yellow-400 dark:hover:bg-yellow-500
                                                            <?php endif; ?>

                                                            transition-colors duration-200">
            <style>
                @keyframes ping-small {

                    75%,
                    100% {
                        transform: scale(1.15);
                        opacity: 0;
                    }
                }

                .animate-ping-small {
                    animation: ping-small 1s cubic-bezier(0, 0, 0.2, 1) infinite;
                }
            </style>
            <!-- Ping -->
            <span class="absolute inset-0 rounded-2xl bg-yellow-400 opacity-50 animate-ping-small pointer-events-none"></span>

            <!-- Zawartość nad pingiem -->
            <div class="relative z-10 flex flex-col items-center justify-center h-full">

                <span class="text-lg md:text-2xl">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($obj->type == 'night'): ?>
                        🌙
                    <?php else: ?>
                        ⏱️
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>

                <span class="px-1 py-0 md:px-2 md:py-0.5 mt-1 rounded-full text-[0.6rem] font-bold
                            bg-white/60 text-gray-900 uppercase tracking-widest">
                    RCP
                </span>

            </div>

            <div class="relative z-10 mt-2 h-full flex flex-col justify-center items-center">

                <div
                    class="flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">

                    <div class="font-semibold tracking-widest uppercase flex flex-col xl:flex-row">

                        <span class="hidden sm:flex">
                            <?php echo e(\Carbon\Carbon::parse($obj->eventStart->time)->format('H:i')); ?>

                        </span>

                        <span class="sm:hidden">
                            <?php echo e(substr(\Carbon\Carbon::parse($obj->eventStart->time)->format('H:i'), 0, -3)); ?>

                        </span>

                        <span class="inline">–</span>

                        <span class="hidden sm:flex">
                            Teraz
                        </span>

                        <span class="sm:hidden">
                            T
                        </span>

                    </div>

                    <div class="hidden md:flex text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">

                        <?php echo e(\Carbon\Carbon::parse($obj->eventStart->time)
                        ->locale('pl')
                        ->translatedFormat('D')); ?>


                        <span class="hidden lg:inline">–</span>
                        Teraz

                    </div>

                </div>

            </div>

            <p
                class="relative z-10 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase max-w-[4ch] truncate sm:max-w-[8ch] md:max-w-[10ch] lg:max-w-[10ch]">
                W trakcie pracy
            </p>

        </a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php else: ?>
<div class="min-h-[130px] md:min-h-[175px] flex flex-col items-center justify-center text-center
                w-full bg-transparent dark:bg-transparent
                rounded-2xl p-2 transition-colors duration-200">
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\cell-calendar-user.blade.php ENDPATH**/ ?>