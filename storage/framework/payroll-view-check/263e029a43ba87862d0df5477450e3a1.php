<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex']); ?>
    <style>
        .employee-info-card .employee-card-preview > .grid { border: 0; gap: .5rem; }
        .employee-info-card .employee-card-preview > .grid > div > span { font-size: 1rem; line-height: 1.5rem; text-transform: none; letter-spacing: normal; font-weight: 500; flex-wrap: wrap; gap: .5rem; }
        .employee-info-card .employee-card-preview > .grid > p { font-size: .875rem; }
        .employee-info-card > .grid + .grid { padding-top: .25rem; }
        .employee-info-card > .grid:last-of-type { border-bottom: 0; padding-bottom: 0; }
        .dark .employee-info-card > .grid { border-bottom-color: rgb(55 65 81 / .7); }
    </style>
    <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company): ?>
        <!--SIDE BAR-->
        <?php if (isset($component)) { $__componentOriginal93e260becef192ebdfafc9d931a5f07f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93e260becef192ebdfafc9d931a5f07f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar-left','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <li>
                <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                    Podgląd użytkownika.
                </div>
            </li>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $attributes = $__attributesOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $component = $__componentOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__componentOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
        <!--SIDE BAR-->
        <!--MAIN-->
        <?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal47af182a1e8be46798b32f44aa5e0356 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47af182a1e8be46798b32f44aa5e0356 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team.nav','data' => ['role' => $role,'invitations' => $invitations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['role' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($role),'invitations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invitations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47af182a1e8be46798b32f44aa5e0356)): ?>
<?php $attributes = $__attributesOriginal47af182a1e8be46798b32f44aa5e0356; ?>
<?php unset($__attributesOriginal47af182a1e8be46798b32f44aa5e0356); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47af182a1e8be46798b32f44aa5e0356)): ?>
<?php $component = $__componentOriginal47af182a1e8be46798b32f44aa5e0356; ?>
<?php unset($__componentOriginal47af182a1e8be46798b32f44aa5e0356); ?>
<?php endif; ?>

            <!--CONTENT-->
            <?php if (isset($component)) { $__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <!--POWRÓT-->
                <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('team.user.index')).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.index')).'','class' => 'text-lg']); ?>
                    <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3a1cf38827b336ba38d71f21422d468)): ?>
<?php $attributes = $__attributesOriginala3a1cf38827b336ba38d71f21422d468; ?>
<?php unset($__attributesOriginala3a1cf38827b336ba38d71f21422d468); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3a1cf38827b336ba38d71f21422d468)): ?>
<?php $component = $__componentOriginala3a1cf38827b336ba38d71f21422d468; ?>
<?php unset($__componentOriginala3a1cf38827b336ba38d71f21422d468); ?>
<?php endif; ?>
                <!--POWRÓT-->

                <?php echo $__env->make('admin.team.employee-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="grid grid-cols-1 gap-6 my-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular): ?>
                            <?php if (isset($component)) { $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team-info-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team-info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div class="flex flex-wrap items-start justify-between gap-5">
                                    <div class="flex items-start gap-5">
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">📅</div>
                                    <div class="min-w-0">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Ustawienia czasu pracy</p>
                                        <h2 class="mt-1 text-3xl font-semibold tracking-tight">Typ planingu</h2>
                                    </div>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular === 'stały planing' && ($role === 'admin' || $role === 'właściciel')): ?>
                                        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('team.user.planing', $user)).'','class' => 'ml-auto shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.planing', $user)).'','class' => 'ml-auto shrink-0']); ?>
                                            <i class="fa-solid fa-calendar mr-2" aria-hidden="true"></i>Edytuj planing
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $attributes = $__attributesOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__attributesOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $component = $__componentOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__componentOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <dl class="mt-2 grid gap-5 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">📅 Typ</dt>
                                        <dd class="mt-1 flex flex-wrap items-center gap-2 font-medium">
                                            <?php echo e(ucfirst($user->working_hours_regular)); ?>

                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular === 'stały planing'): ?>
                                                <?php if (isset($component)) { $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-cello','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>STA <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $attributes = $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $component = $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
                                            <?php elseif($user->working_hours_regular === 'zmienny planing'): ?>
                                                <?php if (isset($component)) { $__componentOriginal6d793c1620e628f2997ffd8665b00b3a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6d793c1620e628f2997ffd8665b00b3a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-violet','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-violet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>ZMI <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6d793c1620e628f2997ffd8665b00b3a)): ?>
<?php $attributes = $__attributesOriginal6d793c1620e628f2997ffd8665b00b3a; ?>
<?php unset($__attributesOriginal6d793c1620e628f2997ffd8665b00b3a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d793c1620e628f2997ffd8665b00b3a)): ?>
<?php $component = $__componentOriginal6d793c1620e628f2997ffd8665b00b3a; ?>
<?php unset($__componentOriginal6d793c1620e628f2997ffd8665b00b3a); ?>
<?php endif; ?>
                                            <?php elseif($user->working_hours_regular === 'prosty planing'): ?>
                                                <?php if (isset($component)) { $__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-green','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>PRO <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4)): ?>
<?php $attributes = $__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4; ?>
<?php unset($__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4)): ?>
<?php $component = $__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4; ?>
<?php unset($__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4); ?>
<?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">⏱️ Liczenie nadgodzin</dt>
                                        <dd class="mt-1 font-medium <?php echo e($user->overtime ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400'); ?>"><?php echo e($user->overtime ? 'Włączone' : 'Wyłączone'); ?></dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">⏳ Próg naliczania</dt>
                                        <dd class="mt-1 font-medium">Powyżej <?php echo e($user->overtime_threshold); ?> minut</dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">📝 Zadanie w nadgodzinach</dt>
                                        <dd class="mt-1 font-medium <?php echo e($user->overtime_task ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400'); ?>"><?php echo e($user->overtime_task ? 'Wymagane' : 'Niewymagane'); ?></dd>
                                    </div>
                                    <div>
                                        <dt class="text-gray-500 dark:text-gray-400">👤 Zatwierdzenie przez przełożonego</dt>
                                        <dd class="mt-1 font-medium <?php echo e($user->overtime_accept ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400'); ?>"><?php echo e($user->overtime_accept ? 'Wymagane' : 'Niewymagane'); ?></dd>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular === 'stały planing' && $user->working_hours_from && $user->working_hours_to && $user->working_hours_start_day && $user->working_hours_stop_day): ?>
                                    <div><dt class="text-gray-500 dark:text-gray-400">🕒 Godziny pracy</dt><dd class="mt-1 font-medium">Od <?php echo e(\Carbon\Carbon::parse($user->working_hours_from)->format('H:i')); ?> do <?php echo e(\Carbon\Carbon::parse($user->working_hours_to)->format('H:i')); ?></dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">📅 Dni tygodnia</dt><dd class="mt-1 font-medium">Od <?php echo e($user->working_hours_start_day); ?> do <?php echo e($user->working_hours_stop_day); ?></dd></div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </dl>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->working_hours_regular === 'stały planing' && (!$user->working_hours_from || !$user->working_hours_to || !$user->working_hours_start_day || !$user->working_hours_stop_day)): ?>
                                    <div role="status" class="flex w-full items-start gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4 text-amber-900 dark:border-amber-800 dark:bg-amber-900/20 dark:text-amber-200">
                                        <span class="text-2xl" aria-hidden="true">⚠️</span>
                                        <div><p class="font-semibold">Uzupełnij planing</p><p class="mt-1 text-sm">Ustaw zakres dni i godziny pracy przyciskiem „Edytuj planing”.</p></div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                    <details data-animated-config class="mt-1 w-full" <?php if($errors->any()): ?> open <?php endif; ?>>
                                        <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Konfiguruj typ planingu</summary>
                                        <div class="mt-5">
                                            <?php echo $__env->make('admin.team.planning-settings-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </details>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $attributes = $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $component = $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team-info-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team-info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <?php if (isset($component)) { $__componentOriginalb358597dd6dc5d75e315d81e5edf4673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-value','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-value'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <?php if (isset($component)) { $__componentOriginal981eab602b8f44b750971a71c99b444e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal981eab602b8f44b750971a71c99b444e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell-span','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                                <?php if (isset($component)) { $__componentOriginale63ce107a7d263224846145430381f1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale63ce107a7d263224846145430381f1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-link','data' => ['href' => ''.e(route('team.user.config_planing', $user->id)).'','class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.config_planing', $user->id)).'','class' => 'text-2xl']); ?>
                                                    Konfiguruj
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-span','data' => ['class' => 'text-2xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-2xl']); ?>
                                                    Konfiguruj
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
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $attributes = $__attributesOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__attributesOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal981eab602b8f44b750971a71c99b444e)): ?>
<?php $component = $__componentOriginal981eab602b8f44b750971a71c99b444e; ?>
<?php unset($__componentOriginal981eab602b8f44b750971a71c99b444e); ?>
<?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $attributes = $__attributesOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__attributesOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673)): ?>
<?php $component = $__componentOriginalb358597dd6dc5d75e315d81e5edf4673; ?>
<?php unset($__componentOriginalb358597dd6dc5d75e315d81e5edf4673); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $attributes = $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $component = $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php
                        $colSpan = '';
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->supervisor || $user->position): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>
                            <?php if (isset($component)) { $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team-info-card','data' => ['class' => ''.e($colSpan).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team-info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e($colSpan).'']); ?>
                                <div class="flex items-start gap-5">
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">📱</div>
                                    <div class="min-w-0">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Komunikacja z pracownikiem</p>
                                        <h2 class="mt-1 text-3xl font-semibold tracking-tight">Wiadomości SMS</h2>
                                    </div>
                                </div>
                                <dl class="mt-2 grid gap-5 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                    <div><dt class="text-gray-500 dark:text-gray-400">📧 Wysłane wiadomości email</dt><dd class="mt-1 font-medium"><?php echo e($msg_email->count()); ?></dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">📱 Wysłane wiadomości SMS</dt><dd class="mt-1 font-medium"><?php echo e($msg_sms->count()); ?></dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">📩 Wszystkie wiadomości</dt><dd class="mt-1 font-medium"><?php echo e($msg->count()); ?></dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">🔔 Powiadomienia SMS</dt><dd class="mt-1 font-medium <?php echo e($user->sms ? 'text-green-700 dark:text-green-300' : 'text-red-600 dark:text-red-400'); ?>"><?php echo e($user->sms ? 'Włączone' : 'Wyłączone'); ?></dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">💲 Cena za SMS</dt><dd class="mt-1 font-medium"><?php echo e(number_format($user->company->sms_price ?? 0, 2)); ?> PLN</dd></div>
                                    <div><dt class="text-gray-500 dark:text-gray-400">💵 Suma wysłanych wiadomości SMS</dt><dd class="mt-1 font-medium"><?php echo e(number_format($msg->sum('price') ?? 0, 2)); ?> PLN</dd></div>
                                </dl>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>
                                    <details data-animated-config class="mt-1">
                                        <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Konfiguruj powiadomienia SMS</summary>
                                        <form method="POST" action="<?php echo e(route('team.user.update_sms', $user)); ?>" class="mt-5 space-y-5">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <label class="flex items-center gap-3 text-sm">
                                                <input type="checkbox" role="switch" name="sms" class="sr-only peer" <?php if($user->sms): echo 'checked'; endif; ?>>
                                                <span aria-hidden="true" class="relative h-6 w-11 shrink-0 rounded-full bg-gray-200 transition-colors dark:bg-gray-700 peer-checked:bg-green-300 dark:peer-checked:bg-green-300 peer-focus-visible:ring-2 peer-focus-visible:ring-green-400 peer-focus-visible:ring-offset-2 dark:peer-focus-visible:ring-offset-gray-800 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow-sm after:transition-transform after:content-[''] peer-checked:after:translate-x-5"></span>
                                                Wysyłaj powiadomienia SMS przy wnioskach i odczytach pracy
                                            </label>
                                            <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?><i class="fa-solid fa-floppy-disk mr-2" aria-hidden="true"></i>Zapisz <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
                                        </form>
                                    </details>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $attributes = $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $component = $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php echo $__env->make('admin.team.employment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->supervisor || $user->position): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->company): ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'menedżer' || $role == 'właściciel' || $user->id == auth()->user()->id): ?>
                            <div class="my-6">
                                <?php
                                    $shortcut = 'UW';
                                    $icon = '🏖️';
                                    $type = 'urlop wypoczynkowy';

                                    $baseDays = (float) ($leave_balance->base_days ?? 0);
                                    $carriedOver = (float) ($leave_balance->carried_over ?? 0);
                                    $usedDays = (float) ($leave_balance->used_days ?? 0);
                                    $remainingDays = max(0, (float) ($leave_balance_left ?? 0));

                                    $totalDays = $baseDays + $carriedOver;
                                    $usedPercentage = $totalDays > 0
                                        ? min(100, max(0, ($usedDays / $totalDays) * 100))
                                        : 0;
                                ?>

                                <section
                                    class="group relative h-full overflow-hidden rounded-2xl bg-white p-6 dark:bg-gray-800 sm:p-8"
                                    aria-label="Podsumowanie urlopu wypoczynkowego">
                                    <!-- Nagłówek -->
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex min-w-0 items-start gap-5">
                                            <div
                                                class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700">
                                                <?php echo e($icon); ?>

                                            </div>

                                            <div class="min-w-0">
                                                <div
                                                    class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                                    Twój urlop
                                                </div>

                                                <h3 class="mt-1 text-base font-semibold text-gray-900 dark:text-white">
                                                    Urlop wypoczynkowy
                                                </h3>
                                            </div>
                                        </div>

                                        <span
                                            class="shrink-0 rounded-lg bg-gray-200 px-2.5 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-600 dark:text-gray-100">
                                            <?php echo e(now()->year); ?>

                                        </span>
                                    </div>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leave_balance_left <= 0): ?>
                                        <!-- Brak dostępnych dni -->
                                        <div class="mt-7 rounded-xl bg-gray-200 p-4 dark:bg-gray-600/70">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-200 text-gray-600 dark:bg-gray-500 dark:text-white">
                                                    <i class="fa-solid fa-calendar-xmark"></i>
                                                </div>

                                                <div>
                                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                                        Brak dostępnych dni
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">
                                                        Nie masz obecnie pozostałego urlopu do wykorzystania.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <!-- Główna wartość -->
                                        <div class="mt-7">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                                Pozostało Ci
                                            </p>

                                            <div class="mt-1 flex flex-wrap items-baseline gap-x-2 gap-y-1">
                                                <span
                                                    class="text-4xl font-bold tracking-tight tabular-nums text-gray-900 dark:text-white sm:text-5xl">
                                                    <?php echo e($leave_balance_left); ?>

                                                </span>

                                                <span class="text-base font-medium text-gray-500 dark:text-gray-200">
                                                    <?php echo e($leave_balance_left == 1 ? 'dzień' : 'dni'); ?>

                                                </span>
                                            </div>
                                        </div>

                                        <!-- Pasek wykorzystania -->
                                        <div class="mt-6">
                                            <div class="mb-2 flex items-center justify-between gap-3 text-sm">
                                                <span class="text-gray-600 dark:text-gray-200">
                                                    Wykorzystano
                                                </span>

                                                <span class="font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    <?php echo e($usedDays); ?> z <?php echo e($totalDays); ?> dni
                                                </span>
                                            </div>

                                            <div class="h-2 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-600" role="progressbar"
                                                aria-label="Wykorzystanie puli urlopowej" aria-valuemin="0" aria-valuemax="100"
                                                aria-valuenow="<?php echo e(round($usedPercentage)); ?>">
                                                <div class="h-full rounded-full bg-pink-500 transition-[width] duration-700 ease-out motion-reduce:transition-none dark:bg-pink-400"
                                                    style="width: <?php echo e($usedPercentage); ?>%"></div>
                                            </div>

                                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-300">
                                                <?php echo e(round($usedPercentage)); ?>% puli urlopowej wykorzystane
                                            </p>
                                        </div>

                                        <!-- Szczegóły -->
                                        <div
                                            class="mt-6 divide-y divide-gray-200 border-t border-gray-200 dark:divide-gray-600 dark:border-gray-600">
                                            <div class="flex items-center justify-between gap-4 py-3">
                                                <div class="flex items-center gap-3">
                                                    <span class="h-2 w-2 shrink-0 rounded-full bg-gray-400 dark:bg-gray-300"></span>
                                                    <span class="text-sm text-gray-600 dark:text-gray-200">
                                                        Przysługujący urlop
                                                    </span>
                                                </div>

                                                <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    <?php echo e($leave_balance->base_days); ?> dni
                                                </span>
                                            </div>

                                            <div class="flex items-center justify-between gap-4 py-3">
                                                <div class="flex items-center gap-3">
                                                    <span class="h-2 w-2 shrink-0 rounded-full bg-gray-400 dark:bg-gray-300"></span>
                                                    <span class="text-sm text-gray-600 dark:text-gray-200">
                                                        Zaległy urlop
                                                    </span>
                                                </div>

                                                <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    <?php echo e($leave_balance->carried_over); ?> dni
                                                </span>
                                            </div>

                                            <div class="flex items-center justify-between gap-4 py-3">
                                                <div class="flex items-center gap-3">
                                                    <span class="h-2 w-2 shrink-0 rounded-full bg-pink-400"></span>
                                                    <span class="text-sm text-gray-600 dark:text-gray-200">
                                                        Wykorzystany urlop
                                                    </span>
                                                </div>

                                                <span class="text-sm font-semibold tabular-nums text-gray-900 dark:text-white">
                                                    <?php echo e($leave_balance->used_days); ?> dni
                                                </span>
                                            </div>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </section>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($user->supervisor || $user->position) && $user->company): ?>
                        <!--PRZYCISKI-->
                        <div class="flex flex-col md:flex-row justify-end gap-4 mt-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role == 'admin' || $role == 'właściciel'): ?>

                                <!--USUŃ-->
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->id != $user_id): ?>
                                    <form action="<?php echo e(route('team.user.disconnect', $user)); ?>" method="POST" class="w-full md:w-fit"
                                        onsubmit="return confirm('Czy na pewno chcesz usunąć tego użytkownika z firmy?');">
                                        <?php echo csrf_field(); ?>
                                        <?php if (isset($component)) { $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-red','data' => ['type' => 'submit','class' => 'text-lg w-full md:w-fit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'text-lg w-full md:w-fit']); ?>
                                            <i class="fa-solid fa-user-minus mr-2"></i>Rozłącz
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $attributes = $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $component = $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
                                    </form>
                                    <!--USUŃ-->
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <!--PRZYCISKI-->
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal4423901be02fedd5bb71d35cba54805f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4423901be02fedd5bb71d35cba54805f = $attributes; } ?>
<?php $component = WireUi\View\Components\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'py-2 mt-4']); ?>
                    Utworzono <?php echo e($user->created_at); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $attributes = $__attributesOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__attributesOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $component = $__componentOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__componentOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal4423901be02fedd5bb71d35cba54805f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4423901be02fedd5bb71d35cba54805f = $attributes; } ?>
<?php $component = WireUi\View\Components\Label::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'py-2']); ?>
                    Ostatnia aktualizacja <?php echo e($user->updated_at); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $attributes = $__attributesOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__attributesOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4423901be02fedd5bb71d35cba54805f)): ?>
<?php $component = $__componentOriginal4423901be02fedd5bb71d35cba54805f; ?>
<?php unset($__componentOriginal4423901be02fedd5bb71d35cba54805f); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc)): ?>
<?php $attributes = $__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc; ?>
<?php unset($__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc)): ?>
<?php $component = $__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc; ?>
<?php unset($__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc); ?>
<?php endif; ?>
            <!--CONTENT-->

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $attributes = $__attributesOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__attributesOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $component = $__componentOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__componentOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
        <!--MAIN-->

    <?php else: ?>
        <?php echo $__env->make('admin.elements.end_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php echo $__env->make('admin.team.configuration-animation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\team\user.blade.php ENDPATH**/ ?>