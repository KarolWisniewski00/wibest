<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['crm']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['crm']); ?>
<?php foreach (array_filter((['crm']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $datetimeStart = $crm->datetime_start
        ? \Carbon\Carbon::parse($crm->datetime_start)
        : null;

    $isCompleted = !is_null($crm->datetime_complete);
    $isOverdue = !$isCompleted && $datetimeStart && $datetimeStart->isPast();
?>
<tr class="snap-center text-center
        <?php echo e($crm->id % 2 === 0
    ? 'bg-white dark:bg-gray-800'
    : 'bg-gray-50 dark:bg-gray-900/40'); ?>">

    
    <td class="px-3 py-3 text-start max-w-[250px] align-middle">

        <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs break-words whitespace-normal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs break-words whitespace-normal']); ?>
            <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->company): ?>
                    <i class="fa-solid fa-building mr-1"></i>
                    <?php echo e($crm->company->name); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>

    </td>


    
    <td class="px-3 py-3 align-middle">

        <div class="flex items-center gap-3 text-start">

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user): ?>

                <div
                    class="w-11 h-11 min-w-[44px] rounded-full overflow-hidden bg-gray-200 dark:bg-gray-700 flex items-center justify-center">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user->profile_photo_url): ?>
                        <img src="<?php echo e($crm->user->profile_photo_url); ?>" alt="<?php echo e($crm->user->name); ?>"
                            class="w-full h-full object-cover object-center">
                    <?php else: ?>
                        <i class="fa-solid fa-user text-gray-400"></i>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


            
            <div class="min-w-0">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user): ?>

                    <div class="font-semibold text-gray-800 dark:text-gray-100 whitespace-nowrap">
                        <?php echo e($crm->user->name); ?>

                    </div>


                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user->position): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 whitespace-nowrap">
                            <i class="fa-solid fa-briefcase mr-1"></i>
                            <?php echo e($crm->user->position); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user->phone): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 whitespace-nowrap">
                            <i class="fa-solid fa-phone mr-1"></i>
                            <?php echo e($crm->user->phone); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user->contact_email && str_contains($crm->user->contact_email, '@')): ?>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 max-w-[220px] truncate">
                            <i class="fa-solid fa-envelope mr-1"></i>
                            <?php echo e($crm->user->contact_email); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php else: ?>

                    <span class="text-gray-400 text-sm">
                        Brak kontaktu
                    </span>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>

        </div>

    </td>


    
    <td class="px-3 py-3 align-middle">

        <div class="flex flex-col items-center gap-2">


            
            <?php
                $typeData = match ($crm->type) {
                    'spotkanie' => ['icon' => 'fa-solid fa-users', 'label' => 'Spotkanie'],
                    'telefon' => ['icon' => 'fa-solid fa-phone', 'label' => 'Telefon'],
                    'mail' => ['icon' => 'fa-solid fa-envelope', 'label' => 'Mail'],
                    'follow_up' => ['icon' => 'fa-solid fa-rotate', 'label' => 'Follow-up'],
                    'oferta' => ['icon' => 'fa-solid fa-file-invoice', 'label' => 'Oferta'],
                    'inne' => ['icon' => 'fa-solid fa-thumbtack', 'label' => 'Inne'],
                    default => ['icon' => 'fa-solid fa-circle-question', 'label' => $crm->type],
                };
            ?>


            <span
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 text-xs font-semibold whitespace-nowrap">

                <i class="<?php echo e($typeData['icon']); ?>"></i>

                <?php echo e($typeData['label']); ?>


            </span>


            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCompleted): ?>

                
                <span
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-semibold whitespace-nowrap">
                    <i class="fa-solid fa-check"></i>
                    Zrobione
                </span>

            <?php elseif($isOverdue): ?>

                
                <span
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-xs font-semibold whitespace-nowrap">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Po terminie
                </span>

            <?php else: ?>

                
                <span
                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 text-xs font-semibold whitespace-nowrap">
                    <i class="fa-regular fa-clock"></i>
                    Do zrobienia
                </span>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->important): ?>

                <span class="text-red-500 dark:text-red-400 text-lg" title="Pilne">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </span>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

    </td>


    
    <td class="px-3 py-3 align-middle">

        <div class="flex flex-col gap-2 text-start text-xs">


            
            <div>

                <div class="text-gray-400 mb-0.5">
                    <i class="fa-regular fa-calendar mr-1"></i>
                    Termin
                </div>

                <div class="font-semibold text-gray-700 dark:text-gray-200 whitespace-nowrap">

                    <?php echo e($crm->datetime_start
    ? \Carbon\Carbon::parse($crm->datetime_start)->format('d.m.Y H:i')
    : '—'); ?>


                </div>

            </div>


            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->datetime_complete): ?>

                <div>

                    <div class="text-gray-400 mb-0.5">
                        <i class="fa-solid fa-check mr-1"></i>
                        Zakończono
                    </div>

                    <div class="font-semibold text-green-600 dark:text-green-400 whitespace-nowrap">

                        <?php echo e(\Carbon\Carbon::parse($crm->datetime_complete)->format('d.m.Y H:i')); ?>


                    </div>

                </div>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

    </td>


    
    <td class="px-3 py-3 align-middle">
        <?php
            $isCompleted = $crm->completed;
            $hasPlan = filled($crm->plan);
            $hasResult = filled($crm->result);
        ?>

        <div id="crm-content-<?php echo e($crm->id); ?>" class="space-y-2">

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasPlan): ?>
                <div class="flex items-start gap-2">
                    <div class="h-full flex my-auto">
                        <span class="shrink-0 text-xs font-semibold text-gray-400 dark:text-gray-500">
                            PLAN
                        </span>
                    </div>
                    <div class="text-start crm-plan-content text-sm leading-6 text-gray-700 dark:text-gray-200">
                        <?php echo $crm->plan; ?>

                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasResult): ?>
                <div class="flex items-start gap-2 pt-1
                                        <?php echo e($hasPlan ? 'border-t border-gray-100 dark:border-gray-700' : ''); ?>">
                    <div class="h-full flex my-auto">
                        <span class="shrink-0 text-xs font-semibold text-green-600 dark:text-green-400">
                            WYNIK
                        </span>
                    </div>


                    <div class="text-start crm-result-content text-sm leading-6 text-gray-600 dark:text-gray-300">
                        <?php echo $crm->result; ?>

                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$hasPlan && !$hasResult): ?>
                <span class="text-sm text-gray-400 dark:text-gray-500">
                    —
                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </td>



    
    <td class="px-2 py-3 align-middle">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->datetime_complete): ?>

            <?php if (isset($component)) { $__componentOriginal7931f85c37d345e4d89919ba1482a252 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7931f85c37d345e4d89919ba1482a252 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-orange','data' => ['href' => ''.e(route('setting.crm.ai-analysis', $crm)).'','class' => 'min-h-[38px]','title' => 'Następny krok','ariaLabel' => 'Następny krok']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.crm.ai-analysis', $crm)).'','class' => 'min-h-[38px]','title' => 'Następny krok','aria-label' => 'Następny krok']); ?>
                <i class="fa-solid fa-arrow-right"></i>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7931f85c37d345e4d89919ba1482a252)): ?>
<?php $attributes = $__attributesOriginal7931f85c37d345e4d89919ba1482a252; ?>
<?php unset($__attributesOriginal7931f85c37d345e4d89919ba1482a252); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7931f85c37d345e4d89919ba1482a252)): ?>
<?php $component = $__componentOriginal7931f85c37d345e4d89919ba1482a252; ?>
<?php unset($__componentOriginal7931f85c37d345e4d89919ba1482a252); ?>
<?php endif; ?>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </td>


    
    <td class="px-2 py-3 align-middle">
        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('setting.crm.edit', $crm)).'','class' => 'min-h-[38px]','title' => 'Edycja','ariaLabel' => 'Edycja']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.crm.edit', $crm)).'','class' => 'min-h-[38px]','title' => 'Edycja','aria-label' => 'Edycja']); ?>
            <i class="fa-solid fa-pen-to-square"></i>
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
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\row-crm.blade.php ENDPATH**/ ?>