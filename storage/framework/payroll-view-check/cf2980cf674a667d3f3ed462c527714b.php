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

    <td class="px-2 py-2 sticky md:left-0 md:z-20 bg-white dark:bg-gray-800">
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
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="<?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?> <?php echo e(route('calendar.work-schedule.edit', $user->objs[$keys[$i]])); ?> <?php endif; ?>"
                        class="h-[180px] flex flex-col items-center justify-center text-center 
                                        w-full rounded-2xl p-2
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
                            <span class="text-2xl">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->objs[$keys[$i]]->type == 'night'): ?>
                                    🌙
                                <?php else: ?>
                                    🌀
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-white/60 text-gray-900 uppercase tracking-widest">
                                ZMI
                            </span>
                        </div>

                        <!-- Godziny i dni -->
                        <div
                            class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                            <div class="font-semibold tracking-widest uppercase">
                                <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->starts_at)->format('H:i')); ?>

                                –
                                <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->ends_at)->format('H:i')); ?>

                            </div>

                            <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                                <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->starts_at)
                                ->locale('pl')
                                ->translatedFormat('D')); ?>

                                –
                                <?php echo e(\Carbon\Carbon::parse($user->objs[$keys[$i]]->ends_at)
                                ->locale('pl')
                                ->translatedFormat('D')); ?>

                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            <?php echo e(gmdate('H:i:s', $user->objs[$keys[$i]]->duration_seconds)); ?>

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
                        <div
                            class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
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

                        <!-- Opis -->
                        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            WNIOSEK
                        </p>

                    </a>
                </td>
            <?php elseif($currentStatus === 'static'): ?>
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>"
                    class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700">

                    <a href="<?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?> <?php echo e(route('team.user.planing', $user)); ?> <?php endif; ?>"
                        class="h-[180px] flex flex-col items-center justify-center text-center w-full
                                    bg-blue-200 dark:bg-blue-400/70 rounded-2xl p-2
                                    transition-colors duration-200 hover:bg-blue-300 dark:hover:bg-blue-500/80">

                        <!-- Ikona i etykieta -->
                        <div class="flex flex-col items-center justify-center h-full">
                            <span class="text-2xl">🏢</span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                bg-blue-300 text-gray-900 uppercase tracking-widest">
                                STA
                            </span>
                        </div>

                        <!-- Dane szczegółowe -->
                        <div
                            class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                            <div class="font-semibold tracking-widest uppercase">
                                <?php echo e(\Carbon\Carbon::parse($user->working_hours_from)->format('H:i')); ?>

                                –
                                <?php echo e(\Carbon\Carbon::parse($user->working_hours_to)->format('H:i')); ?>

                            </div>
                            <?php
                                $shortPl = [
                                    'poniedziałek' => 'pon',
                                    'wtorek' => 'wt',
                                    'środa' => 'śr',
                                    'czwartek' => 'czw',
                                    'piątek' => 'pt',
                                    'sobota' => 'sob',
                                    'niedziela' => 'ndz',
                                ];
                            ?>
                            <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                                <?php echo e($shortPl[$user->working_hours_start_day]); ?>

                                –
                                <?php echo e($shortPl[$user->working_hours_stop_day]); ?>

                            </div>
                        </div>

                        <!-- Opis -->
                        <p class="mt-2 text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                            <?php
                                $start = \Carbon\Carbon::parse($user->working_hours_from);
                                $end = \Carbon\Carbon::parse($user->working_hours_to);

                                $seconds = $start->diffInSeconds($end);
                            ?>

                            <?php echo e(sprintf('%02d:%02d:%02d', floor($seconds / 3600), floor(($seconds % 3600) / 60), $seconds % 60)); ?>

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
                        <div
                            class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                            <div class="font-semibold tracking-widest uppercase">
                                Święto
                            </div>

                            <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                                Ustawowo
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
                <td colspan="<?php echo e($span); ?>" title="<?php echo e($startDate); ?> - <?php echo e($endDate); ?>" class="px-2 py-2 font-semibold text-lg text-gray-900 dark:text-gray-900 border-x border-gray-200 dark:border-gray-700 
                            <?php if($user->working_hours_regular == 'stały planing'): ?>
                                dark:bg-gray-800
                                transition-colors duration-200 
                                dark:hover:bg-gray-700
                            <?php endif; ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular == 'zmienny planing'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>
                            <a href="<?php echo e(route('calendar.work-schedule.create.user', [$user, $startDate])); ?>" class="group h-[180px] relative flex flex-col items-center justify-center text-center
                                                w-full rounded-2xl p-4
                                                bg-violet-300/60 dark:bg-violet-400/60 backdrop-blur-md
                                                transition-all duration-300 ease-out
                                                opacity-0 hover:opacity-100">

                                <!-- Główna ikona i etykieta -->
                                <div class="flex flex-col items-center justify-center h-full">
                                    <span class="text-3xl transition-transform duration-300">
                                        🌀
                                    </span>
                                    <span class="px-2 py-0.5 mt-1 rounded-full text-[0.65rem] font-bold 
                                                            bg-white/70 text-gray-900 uppercase tracking-widest">
                                        ZMI
                                    </span>
                                </div>

                                <!-- Sekcja akcji -->
                                <div class="mt-2 flex flex-col items-center text-gray-900 dark:text-gray-900 
                                                        text-xs uppercase tracking-widest bg-green-300 
                                                        px-4 py-2 rounded-lg backdrop-blur-sm font-semibold">
                                    <div class="font-bold tracking-widest uppercase flex items-center gap-2">
                                        <i class="fa-solid fa-plus"></i>
                                        NOWY
                                    </div>
                                </div>

                                <!-- Opis -->
                                <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                    Zmienny planing
                                </p>
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_custom != null && $user->working_hours_from != null && $user->working_hours_to != null && $user->working_hours_start_day != null && $user->working_hours_stop_day != null): ?>
                        <?php else: ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel'): ?>
                                <a href="<?php echo e(route('team.user.config_planing', $user->id)); ?>" class="flex flex-col items-center justify-center text-center 
                                                    w-full rounded-2xl p-2 h-[180px] 
                                                    bg-yellow-300 dark:bg-yellow-400
                                                    transition-colors duration-200 
                                                    hover:bg-yellow-400 dark:hover:bg-yellow-500">

                                    <!-- Ikona i label -->
                                    <div class="flex flex-col items-center justify-center h-full">
                                        <span class="text-2xl">
                                            ⚠️
                                        </span>
                                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                            ALE
                                        </span>
                                    </div>

                                    <!-- Godziny i dni -->
                                    <div
                                        class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">
                                        <div class="font-semibold tracking-widest uppercase">
                                            Wymagana
                                        </div>

                                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">
                                            Konfiguracja
                                        </div>
                                    </div>

                                    <!-- Opis -->
                                    <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                        ALERT
                                    </p>

                                </a>
                            <?php else: ?>
                                <div class="flex flex-col items-center justify-center text-center 
                                                    w-full h-[180px]  rounded-2xl p-2
                                                    bg-yellow-300 dark:bg-yellow-400
                                                    transition-colors duration-200 
                                                    hover:bg-yellow-400 dark:hover:bg-yellow-500">

                                    <!-- Ikona i label -->
                                    <div class="flex flex-col items-center justify-center h-full">
                                        <span class="text-2xl">
                                            ⚠️
                                        </span>
                                        <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                                            bg-white/60 text-gray-900 uppercase tracking-widest">
                                            ALE
                                        </span>
                                    </div>

                                    <!-- Godziny i dni -->
                                    <div
                                        class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-900 leading-tight">
                                        <div class="font-semibold tracking-widest uppercase">
                                            Wymagana
                                        </div>

                                        <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-800 dark:text-gray-900">
                                            Konfiguracja
                                        </div>
                                    </div>

                                    <!-- Opis -->
                                    <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                                        ALERT
                                    </p>

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
            class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 border-x border-gray-200 dark:border-gray-700">
        </td>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</tr><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\row-planing.blade.php ENDPATH**/ ?>