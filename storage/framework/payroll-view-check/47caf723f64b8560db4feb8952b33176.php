<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['client']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['client']); ?>
<?php foreach (array_filter((['client']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li class="snap-center">
    <div class="h-full inline-flex items-center justify-between w-full p-4
                text-gray-500 bg-white border-2 border-gray-200 rounded-lg
                hover:text-gray-600 hover:bg-gray-50
                dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
        <div class="flex flex-col w-full gap-3 text-start">
            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
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
                    <span>🏢</span><?php echo e($client->name); ?>

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

    <div class="flex flex-col items-start justify-start gap-2">
        
        <?php
            $hasRecentWork = $client->work_sessions()
                ->whereBetween('created_at', [
                    now()->startOfMonth()->subMonth(),
                    now()->endOfMonth(),
                ])
                ->exists();
        ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasRecentWork): ?>

            <span
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-semibold whitespace-nowrap"
                title="Firma ma przynajmniej jeden odczyt pracy w aktualnym lub ubiegłym miesiącu"
            >
                <i class="fa-solid fa-clock"></i>
                RCP aktywne
            </span>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>



    <?php
        $company = $client;

        /*
        |--------------------------------------------------------------------------
        | AI - klasyfikacja
        |--------------------------------------------------------------------------
        */

        $classificationData = match ($company->ai_classification) {
            'ideal' => [
                'label' => 'Idealny klient',
                'icon' => 'fa-solid fa-star',
                'color' => 'green',
            ],
            'potential' => [
                'label' => 'Potencjalny klient',
                'icon' => 'fa-solid fa-chart-simple',
                'color' => 'yellow',
            ],
            'weak' => [
                'label' => 'Słabe dopasowanie',
                'icon' => 'fa-solid fa-arrow-down',
                'color' => 'orange',
            ],
            'disqualified' => [
                'label' => 'Nie zakwalifikowany',
                'icon' => 'fa-solid fa-ban',
                'color' => 'red',
            ],
            'unknown' => [
                'label' => 'Brak danych',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
            default => [
                'label' => 'Nie sklasyfikowano',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
        };

    ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->ai_classification): ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($classificationData['color'] === 'blue'): ?>

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs font-semibold whitespace-nowrap"
            title="<?php echo e($client->ai_classification_reason); ?>"
        >
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
            <?php echo e($client->ai_classification); ?>

        </span>

    <?php elseif($classificationData['color'] === 'green'): ?>

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-xs font-semibold whitespace-nowrap"
            title="<?php echo e($client->ai_classification_reason); ?>"
        >
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
            <?php echo e($client->ai_classification); ?>

        </span>

    <?php elseif($classificationData['color'] === 'red'): ?>

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-xs font-semibold whitespace-nowrap"
            title="<?php echo e($client->ai_classification_reason); ?>"
        >
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
            <?php echo e($client->ai_classification); ?>

        </span>

    <?php elseif($classificationData['color'] === 'yellow'): ?>

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 text-xs font-semibold whitespace-nowrap"
            title="<?php echo e($client->ai_classification_reason); ?>"
        >
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
            <?php echo e($client->ai_classification); ?>

        </span>

    <?php else: ?>

        <span
            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-xs font-semibold whitespace-nowrap"
            title="<?php echo e($client->ai_classification_reason); ?>"
        >
            <i class="<?php echo e($classificationData['icon']); ?>"></i>
            <?php echo e($client->ai_classification); ?>

        </span>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->ai_classification_reason): ?>

            <div class="max-w-[220px] text-start text-xs text-gray-500 dark:text-gray-400 leading-4">
                <?php echo e($client->ai_classification_reason); ?>

            </div>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>

            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
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
                    <span>📍</span><?php echo e($client->adress); ?>

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

            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
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
                    <span>🧾</span><?php echo e($client->vat_number); ?>

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

            <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs']); ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->getUsersCount() != 0): ?>
                    <span>👤</span> <?php echo e($client->getUsersCount()); ?>

                    <?php else: ?>
                    <span>👤</span> 0
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

            <div class="flex space-x-3">
                <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('setting.client.show', $client)).'','class' => 'min-h-[38px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.client.show', $client)).'','class' => 'min-h-[38px]']); ?>
                    <i class="fa-solid fa-eye"></i>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $attributes = $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $component = $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</li><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\card-client.blade.php ENDPATH**/ ?>