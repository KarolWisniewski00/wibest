<?php
    // 1. Definicja ikon
    $icons = [
        'wolne za pracę w święto' => '🕊️',
        'zwolnienie lekarskie' => '🤒',
        'urlop wypoczynkowy' => '🏖️',
        'wolne za nadgodziny' => '⏰',
        'wolne za święto w sobotę' => '🗓️',
        'urlop bezpłatny' => '💸',
        'wolne z tytułu 5-dniowego tygodnia pracy' => '📆',
        'urlop okolicznościowy' => '📌',
        'urlop wypoczynkowy "na żądanie"' => '📢',
        'oddanie krwi' => '🩸',
        'urlop ojcowski' => '👨‍👧',
        'urlop macieżyński' => '🤱',
        'urlop rodzicielski' => '👶',
        'świadczenie rehabilitacyjne' => '🦾',
        'opieka' => '🧑‍🍼',
        'opieka nad dzieckiem do 14 lat' => '👨‍👩‍👧',
        'zwolnienie lekarsie - opieka' => '🧑‍⚕️',
        'świadek w sądzie' => '⚖️',
        'praca zdalna' => '💻',
        'kwarantanna' => '🦠',
        'kwarantanna z pracą zdalną' => '🏠💻',
        'delegacja' => '✈️',
        'siła wyższa' => '⚡',
    ];
    // 2. Definicja skrótów (przeniesiona poza pętlę)
    $shortcuts = [
        'wolne za pracę w święto' => 'WPS',
        'zwolnienie lekarskie' => 'ZL',
        'urlop wypoczynkowy' => 'UW',
        'wolne za nadgodziny' => 'WN',
        'wolne za święto w sobotę' => 'WSS',
        'urlop bezpłatny' => 'UB',
        'wolne z tytułu 5-dniowego tygodnia pracy' => 'WT5',
        'urlop okolicznościowy' => 'UO',
        'urlop wypoczynkowy "na żądanie"' => 'UWZ',
        'oddanie krwi' => 'OK',
        'urlop ojcowski' => 'UOJC',
        'urlop macieżyński' => 'UM',
        'urlop rodzicielski' => 'UR',
        'świadczenie rehabilitacyjne' => 'SR',
        'opieka' => 'OP',
        'opieka nad dzieckiem do 14 lat' => 'OD14',
        'zwolnienie lekarsie - opieka' => 'ZLO',
        'świadek w sądzie' => 'SWS',
        'praca zdalna' => 'PZ',
        'kwarantanna' => 'KW',
        'kwarantanna z pracą zdalną' => 'KWZPZ',
        'delegacja' => 'DEL',
        'siła wyższa' => 'SW',
    ];

    // 3. Obliczenia dla Alpine.js
    $itemCount = count($icons);
    $maxLimit = 9;
?>

<div>
    <div>
        <div class="mb-4" id="leave-requests">
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['value' => '📋 Rodzaje wniosków']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => '📋 Rodzaje wniosków']); ?>
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
            <div x-data="{
    showAll: false,
    search: '',
    limit: 4,
    itemCount: <?php echo e($itemCount); ?>,

    updateLimit() {
        this.limit = window.matchMedia('(min-width: 1280px)').matches
            ? 9
            : window.matchMedia('(min-width: 1024px)').matches
                ? 8
                : 4;
    },

    matches(type, shortcut) {
        const query = this.search.trim().toLocaleLowerCase('pl-PL');

        if (!query) return true;

        return type.toLocaleLowerCase('pl-PL').includes(query)
            || shortcut.toLocaleLowerCase('pl-PL').includes(query);
    },

    get canShowMore() {
        return this.itemCount > this.limit;
    }
}" x-init="updateLimit(); window.addEventListener('resize', updateLimit)" class="relative">

                
                <div class="relative mb-4">

                    <input type="search" x-model="search" @input="showAll = search.trim().length > 0"
                        placeholder="Szukaj rodzaju wniosku..." aria-label="Szukaj rodzaju wniosku" class="w-full rounded-xl border border-gray-200 bg-white
               p-3 text-sm text-gray-800
               placeholder:text-gray-400
               focus:border-green-400 focus:outline-none
               focus:ring-2 focus:ring-green-400/20
               dark:border-gray-700 dark:bg-gray-800
               dark:text-gray-100 dark:placeholder:text-gray-500" />

                    <button type="button" x-cloak x-show="search.length > 0" @click="search = ''; showAll = false"
                        aria-label="Wyczyść wyszukiwanie" class="absolute inset-y-0 right-0 flex items-center px-4
               text-gray-400 transition hover:text-gray-700
               dark:hover:text-gray-200">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <p x-cloak x-show="search.trim().length > 0" class="mb-3 text-sm text-gray-500 dark:text-gray-400"
                    aria-live="polite">
                    Wyniki wyszukiwania
                </p>

                <ul class="grid w-full gap-4 lg:grid-cols-2 xl:grid-cols-3">
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $shortcut = $shortcuts[$type];
                            try {
                                $state = $this->getState();
                                $loggedInUser = \App\Models\User::where('id', $state['user_id'])->first();
                            } catch (\Exception $e) {
                                // Obsługa wyjątku, np. logowanie błędu
                                $loggedInUser = auth()->user();
                            }
                        ?>


                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loggedInUser->gender == 'female' && $shortcut == 'UR'): ?>
                            
                            <li x-show="matches(<?php echo \Illuminate\Support\Js::from($type)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($shortcut)->toHtml() ?>) &&
                                    (search.trim().length > 0 || showAll || <?php echo e($loop->index); ?> < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="<?php echo e(Str::slug($type)); ?>" value="<?php echo e($type); ?>" class="hidden peer">
                                <label for="<?php echo e(Str::slug($type)); ?>"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <?php if (isset($component)) { $__componentOriginalcd3a7e2804626a866f401e719a5e4a36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-name','data' => ['icon' => $icon,'type' => $type,'shortcut' => $shortcut]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'shortcut' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shortcut)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $attributes = $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $component = $__componentOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
                                </label>
                            </li>
                        <?php elseif($shortcut == 'UW'): ?>
                            
                            <li x-show="matches(<?php echo \Illuminate\Support\Js::from($type)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($shortcut)->toHtml() ?>) &&
                                    (search.trim().length > 0 || showAll || <?php echo e($loop->index); ?> < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="<?php echo e(Str::slug($type)); ?>" value="<?php echo e($type); ?>" class="hidden peer">
                                <label for="<?php echo e(Str::slug($type)); ?>"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <?php if (isset($component)) { $__componentOriginalcd3a7e2804626a866f401e719a5e4a36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-name','data' => ['icon' => $icon,'type' => $type,'shortcut' => $shortcut]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'shortcut' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shortcut)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $attributes = $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $component = $__componentOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->getLeaveFree() <= 0): ?>
                                        <span
                                            class="text-xs font-semibold text-yellow-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                            w <?php echo e(now()->year); ?> pozostało: BRAK DAYCH
                                        </span>
                                    <?php else: ?>
                                        <span
                                            class="text-xs font-semibold text-green-300 uppercase tracking-widest transition ease-in-out duration-150 whitespace-normal mt-1">
                                            w <?php echo e(now()->year); ?> pozostało: <?php echo e($this->getLeaveFree()); ?> dni
                                        </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </label>
                            </li>
                        <?php elseif($loggedInUser->gender == 'female' && $shortcut == 'UM'): ?>
                            
                            <li x-show="matches(<?php echo \Illuminate\Support\Js::from($type)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($shortcut)->toHtml() ?>) &&
                                    (search.trim().length > 0 || showAll || <?php echo e($loop->index); ?> < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="<?php echo e(Str::slug($type)); ?>" value="<?php echo e($type); ?>" class="hidden peer">
                                <label for="<?php echo e(Str::slug($type)); ?>"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <?php if (isset($component)) { $__componentOriginalcd3a7e2804626a866f401e719a5e4a36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-name','data' => ['icon' => $icon,'type' => $type,'shortcut' => $shortcut]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'shortcut' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shortcut)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $attributes = $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $component = $__componentOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
                                </label>
                            </li>
                        <?php elseif($loggedInUser->gender == 'male' && $shortcut == 'UOJC'): ?>
                            
                            <li x-show="matches(<?php echo \Illuminate\Support\Js::from($type)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($shortcut)->toHtml() ?>) &&
                                    (search.trim().length > 0 || showAll || <?php echo e($loop->index); ?> < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="<?php echo e(Str::slug($type)); ?>" value="<?php echo e($type); ?>" class="hidden peer">
                                <label for="<?php echo e(Str::slug($type)); ?>"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <?php if (isset($component)) { $__componentOriginalcd3a7e2804626a866f401e719a5e4a36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-name','data' => ['icon' => $icon,'type' => $type,'shortcut' => $shortcut]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'shortcut' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shortcut)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $attributes = $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $component = $__componentOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
                                </label>
                            </li>
                        <?php elseif($loggedInUser->gender && $shortcut != 'UM' && $shortcut != 'UR' && $shortcut != 'UOJC'): ?>
                            
                            <li x-show="matches(<?php echo \Illuminate\Support\Js::from($type)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($shortcut)->toHtml() ?>) &&
                                    (search.trim().length > 0 || showAll || <?php echo e($loop->index); ?> < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="<?php echo e(Str::slug($type)); ?>" value="<?php echo e($type); ?>" class="hidden peer">
                                <label for="<?php echo e(Str::slug($type)); ?>"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <?php if (isset($component)) { $__componentOriginalcd3a7e2804626a866f401e719a5e4a36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-name','data' => ['icon' => $icon,'type' => $type,'shortcut' => $shortcut]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'shortcut' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shortcut)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $attributes = $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $component = $__componentOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
                                </label>
                            </li>
                        <?php elseif(!$loggedInUser->gender): ?>
                            
                            <li x-show="matches(<?php echo \Illuminate\Support\Js::from($type)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($shortcut)->toHtml() ?>) &&
                                    (search.trim().length > 0 || showAll || <?php echo e($loop->index); ?> < limit)">
                                <input name="type" wire:change="getLeaveChecked" wire:model="state.type" type="radio"
                                    id="<?php echo e(Str::slug($type)); ?>" value="<?php echo e($type); ?>" class="hidden peer">
                                <label for="<?php echo e(Str::slug($type)); ?>"
                                    class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg  cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 hover:text-gray-800 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-50 dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-all duration-200">
                                    <?php if (isset($component)) { $__componentOriginalcd3a7e2804626a866f401e719a5e4a36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave-name','data' => ['icon' => $icon,'type' => $type,'shortcut' => $shortcut]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'shortcut' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shortcut)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $attributes = $__attributesOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__attributesOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36)): ?>
<?php $component = $__componentOriginalcd3a7e2804626a866f401e719a5e4a36; ?>
<?php unset($__componentOriginalcd3a7e2804626a866f401e719a5e4a36); ?>
<?php endif; ?>
                                </label>
                            </li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($itemCount > $maxLimit): ?>

                    
                    <div x-show="!showAll && canShowMore"
                        class="pointer-events-none absolute bottom-[62px] left-0 w-full h-24 bg-gradient-to-t from-white dark:from-gray-800/70 to-transparent">
                    </div>

                    
                    <div class="flex items-center justify-center w-full">
                        <?php if (isset($component)) { $__componentOriginal2206b3edd9b3a7dd03d6501764573069 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2206b3edd9b3a7dd03d6501764573069 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-back','data' => ['xShow' => '!showAll && canShowMore','type' => 'button','class' => 'mt-4 text-lg w-full md:w-fit flex items-center justify-center','@click' => 'showAll = true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => '!showAll && canShowMore','type' => 'button','class' => 'mt-4 text-lg w-full md:w-fit flex items-center justify-center','@click' => 'showAll = true']); ?>
                            Pokaż więcej
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2206b3edd9b3a7dd03d6501764573069)): ?>
<?php $attributes = $__attributesOriginal2206b3edd9b3a7dd03d6501764573069; ?>
<?php unset($__attributesOriginal2206b3edd9b3a7dd03d6501764573069); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2206b3edd9b3a7dd03d6501764573069)): ?>
<?php $component = $__componentOriginal2206b3edd9b3a7dd03d6501764573069; ?>
<?php unset($__componentOriginal2206b3edd9b3a7dd03d6501764573069); ?>
<?php endif; ?>
                    </div>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>

            <p class="text-red-500 text-sm mt-1 dark:text-red-400"><?php echo e($message ?? ''); ?></p>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\leave-step.blade.php ENDPATH**/ ?>