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
    <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company): ?>
    <!--MAIN-->
    <?php if (isset($component)) { $__componentOriginal6d34ed0eb01a1886d57455f1550df787 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6d34ed0eb01a1886d57455f1550df787 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main-no-filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main-no-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginal49b345aca39c685793a5b0b72a705588 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b345aca39c685793a5b0b72a705588 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.setting.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b345aca39c685793a5b0b72a705588)): ?>
<?php $attributes = $__attributesOriginal49b345aca39c685793a5b0b72a705588; ?>
<?php unset($__attributesOriginal49b345aca39c685793a5b0b72a705588); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b345aca39c685793a5b0b72a705588)): ?>
<?php $component = $__componentOriginal49b345aca39c685793a5b0b72a705588; ?>
<?php unset($__componentOriginal49b345aca39c685793a5b0b72a705588); ?>
<?php endif; ?>

        <!--CONTENT-->
        <div class="p-4">
            <!--POWRÓT-->
            <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('setting.user.show', $user)).'','class' => 'text-lg mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.user.show', $user)).'','class' => 'text-lg mb-4']); ?>
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do profilu
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
            <h2 class="text-xl font-semibold dark:text-white mb-4">📅 Wybierz typ planingu pracy</h2>
            <form method="POST" action="<?php echo e(route('setting.user.update_planing', $user)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div id="planning-type">
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <li class="flex items-center justify-center h-full">
                            <input
                                type="radio"
                                id="fixed-basic"
                                name="planning_type"
                                value="fixed-basic"
                                class="hidden peer"
                                <?php if($user->working_hours_regular == 'stały planing'): ?> checked <?php endif; ?>
                            >
                            <label for="fixed-basic"
                                class="flex flex-col items-center justify-center w-full h-full p-5 rounded-2xl  border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-300 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 peer-checked:border-blue-400 peer-checked:-lg ">
                                <div class="text-5xl mb-3">🏢</div>
                                <span class="mb-2 px-2 py-1 rounded-full font-bold bg-blue-300 text-gray-900 uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs md:text-sm md:text-base text-center w-full truncate">
                                    Stały planing
                                </span>
                                <p class="text-sm text-gray-600 dark:text-gray-400 text-center leading-tight">
                                    Te same godziny każdego dnia, np. pon–pt 08:00–16:00
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 text-center leading-tight flex items-center justify-center gap-1">
                                    <span>☀️</span>
                                    Obsługuje tylko planing dzienny
                                </p>
                            </label>
                        </li>
                        <li class="flex items-center justify-center h-full">
                            <input
                                type="radio"
                                id="variable"
                                name="planning_type"
                                value="variable"
                                class="hidden peer"
                                <?php if($user->working_hours_regular == 'zmienny planing'): ?> checked <?php endif; ?>
                            >
                            <label for="variable"
                                class="flex flex-col items-center justify-center w-full h-full p-5 rounded-2xl  border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-300 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 peer-checked:border-violet-400 peer-checked:-lg ">
                                <div class="text-5xl mb-3">🌀</div>
                                <span class="mb-2 px-2 py-1 rounded-full font-bold bg-violet-300 text-gray-900 uppercase tracking-widest hover:opacity-90 transition ease-in-out duration-150 text-xs md:text-sm md:text-base text-center w-full truncate">
                                    Zmienny planing
                                </span>
                                <p class="text-sm text-gray-600 dark:text-gray-400 text-center leading-tight flex items-center justify-center gap-1">
                                    Elastyczny układ, dodajesz bloki pracy w kalendarzu
                                </p>
                                <p class="text-sm text-green-300 text-center leading-tight flex items-center justify-center gap-1">
                                    <span>☀️</span>
                                    <span>🌙</span>
                                    Obsługuje planing dzienny i nocny
                                </p>
                            </label>
                        </li>

                    </ul>
                </div>
                <div class="mt-4" id="overtime-settings">
                    <h2 class="text-xl font-semibold dark:text-white mb-4 flex items-center gap-2">
                        ⏱️ Ustawienia nadgodzin
                    </h2>

                    <div class="bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl  p-5 space-y-6">

                        <!-- 1️⃣ Włączanie nadgodzin -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Liczenie nadgodzin</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Włącz, jeśli chcesz, aby system monitorował pracę po godzinach.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-clock text-green-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach.
                                </div>
                            </div>
                            <label class="inline-flex items-center md:justify-center md:w-48">
                                <input type="checkbox" class="sr-only peer"
                                    name="overtime"
                                    <?php if($user->overtime): ?> checked <?php endif; ?>
                                >
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                            </label>
                        </div>

                        <div class="block md:hidden border-t border-gray-200 dark:border-gray-700 my-4"></div>

                        <!-- 2️⃣ Próg aktywacji nadgodzin -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Próg naliczania</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Po ilu minutach powyżej planu system uzna czas za nadgodziny.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-hourglass-half text-yellow-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach po przekroczeniu progu.
                                </div>
                            </div>
                            <div class="flex items-center gap-2  md:justify-center md:w-48">
                                <?php if (isset($component)) { $__componentOriginalbfd5b823f99dcaaac982cab1ac956b63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63 = $attributes; } ?>
<?php $component = App\View\Components\MyNumber::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('my-number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\MyNumber::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'overtime_threshold','min' => '0','placeholder' => '0','value' => ''.e($user->overtime_threshold).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63)): ?>
<?php $attributes = $__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63; ?>
<?php unset($__attributesOriginalbfd5b823f99dcaaac982cab1ac956b63); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfd5b823f99dcaaac982cab1ac956b63)): ?>
<?php $component = $__componentOriginalbfd5b823f99dcaaac982cab1ac956b63; ?>
<?php unset($__componentOriginalbfd5b823f99dcaaac982cab1ac956b63); ?>
<?php endif; ?>
                                <span class="text-gray-700 dark:text-gray-300">minut</span>
                            </div>
                        </div>

                        <div class="block md:hidden border-t border-gray-200 dark:border-gray-700 my-4"></div>

                        <!-- 3️⃣ Zadania i powiadomienia -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Wymagaj zadania w nadgodzinach</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Po przekroczeniu progu użytkownik otrzyma e-mail z prośbą o opis zadania. Po uzupełnieniu zadania system wyśle powiadomienie do przełożonego.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-regular fa-lightbulb text-yellow-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach po przekroczeniu progu oraz uzupełnieniu zadania.
                                </div>
                            </div>
                            <label class="inline-flex items-center md:justify-center md:w-48">
                                <input type="checkbox" class="sr-only peer"
                                    name="overtime_task"
                                    <?php if($user->overtime_task): ?> checked <?php endif; ?>
                                >
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                            </label>
                        </div>

                        <div class="block md:hidden border-t border-gray-200 dark:border-gray-700 my-4"></div>

                        <!-- 4️⃣ Wymagaj zatwierdzenia nadgodzin -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Wymagaj zatwierdzenia przez przełożonego</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Nadgodziny zostaną doliczone dopiero po akceptacji przełożonego w systemie.
                                </p>
                                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <i class="fa-solid fa-bell text-purple-400 mr-2"></i>
                                    System uwzględni nadgodziny w raportach po przekroczeniu progu, uzupełnieniu zadania oraz zatwierdzeniu przez przełożonego.
                                </div>
                            </div>
                            <label class="inline-flex items-center md:justify-center md:w-48">
                                <input type="checkbox" class="sr-only peer"
                                    name="overtime_accept"
                                    <?php if($user->overtime_accept): ?> checked <?php endif; ?>
                                >
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                            </label>
                        </div>

                    </div>
                </div>
                <!--ZAPISZ-->
                <div class="flex justify-end mt-4">
                    <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'text-lg']); ?>
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
                </div>
                <!--ZAPISZ-->
            </form>
        </div>
        <!--CONTENT-->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $attributes = $__attributesOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $component = $__componentOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__componentOriginal6d34ed0eb01a1886d57455f1550df787); ?>
<?php endif; ?>
    <!--MAIN-->
    <?php else: ?>
    <?php echo $__env->make('admin.elements.end_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\user\config.blade.php ENDPATH**/ ?>