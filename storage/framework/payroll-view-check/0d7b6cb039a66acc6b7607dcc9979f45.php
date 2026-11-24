<div>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'weekdays','value' => '📅 Wybierz dni tygodnia']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'weekdays','value' => '📅 Wybierz dni tygodnia']); ?>
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
            <div class="flex flex-col mb-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 space-y-6">
                <div class="flex-1 flex flex-col gap-4">
                    <h3 class="flex flex-row items-center text-lg font-medium text-gray-900 dark:text-gray-100">
                        <span class="ms-1">
                            Dni tygodnia
                        </span>
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Włącz te dni, które chcesz, aby w zakresie dat uwzględniono.
                    </p>
                </div>
                
                <div class="grid grid-cols-7 gap-px w-full overflow-hidden text-xs font-medium">
                    <?php
                    // Definicja dni tygodnia i ich wartości (np. 1 dla PON, 7 dla NDZ)
                    $days = [
                    ['name' => 'PON', 'value' => 1],
                    ['name' => 'WT', 'value' => 2],
                    ['name' => 'ŚR', 'value' => 3],
                    ['name' => 'CZW', 'value' => 4],
                    ['name' => 'PT', 'value' => 5],
                    ['name' => 'SOB', 'value' => 6],
                    ['name' => 'NDZ', 'value' => 7],
                    ];
                    // Dni domyślnie zaznaczone (PON - PT)
                    $defaultChecked = [1, 2, 3, 4, 5];
                    ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $isChecked = in_array($day['value'], $defaultChecked);
                    ?>

                    <div class="flex flex-col items-center justify-center p-0.5 m-0.5">
                        
                        <input
                            type="checkbox"
                            id="day-<?php echo e($day['value']); ?>"
                            name="weekdays[]"
                            value="<?php echo e($day['value']); ?>"
                            wire:model.live="state.weekdays"
                            class="hidden peer" 
                            <?php if($isChecked): echo 'checked'; endif; ?> />
                        <label
                            for="day-<?php echo e($day['value']); ?>"
                            class="cursor-pointer select-none w-full py-2 text-center rounded-lg transition duration-150 ease-in-out bg-gray-200 hover:bg-gray-300 text-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 peer-checked:text-gray-900 peer-checked:bg-green-300 hover:peer-checked:bg-green-400 uppercase tracking-widest">
                            <?php echo e($day['name']); ?>

                        </label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="">
            <!-- START -->
            <input
                name="start_time"
                wire:model="state.start_time"
                type="hidden"
                class="" />
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar-from-to-auto', ['workSession' => 'true','type' => 'first','startDate' => $this->getState()['start_time'] ?? null,'endDate' => $this->getState()['end_time'] ?? null,'currentMonth' => session('first'),'work_session' => 'true','userId' => ''.e(// Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? head($this->getState()['user_ids']) 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : auth()->user()->id).'','multi' => ''.e(// Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? false 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : true).'']);

$__key = time();

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3866563274-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <!-- STOP -->
        <div class="">
            <input
                type="hidden"
                wire:model="state.end_time"
                name="end_time"
                class="">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar-from-to-auto', ['workSession' => 'true','type' => 'second','startDate' => $this->getState()['start_time'] ?? null,'endDate' => $this->getState()['end_time'] ?? null,'currentMonth' => session('second'),'work_session' => 'true','userId' => ''.e(// Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? head($this->getState()['user_ids']) 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : auth()->user()->id).'','multi' => ''.e(// Sprawdź, czy klucz istnieje I czy tablica ma dokładnie 1 element
                    (
                        array_key_exists('user_ids', $this->getState()) 
                        && count($this->getState()['user_ids']) === 1
                    )
                    // Jeśli warunek jest spełniony (klucz istnieje ORAZ jest dokładnie 1 użytkownik)
                    ? false 
                    // W przeciwnym razie (klucz nie istnieje LUB jest 0 LUB jest >1 użytkowników)
                    : true).'']);

$__key = time();

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3866563274-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'holiday','value' => '🎌 Wybierz czy uwzględniać święta ustawowo wolne']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'holiday','value' => '🎌 Wybierz czy uwzględniać święta ustawowo wolne']); ?>
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
            <div class="mb-4 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl p-5 space-y-6">
                <div class="flex flex-col xl:flex-row xl:items-center gap-4">
                    <div class="flex-1 flex flex-row gap-4">
                        <div class="flex flex-col items-center justify-center">
                            <span class="text-2xl md:text-3xl">🎌</span>
                            <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] md:text-xs font-semibold bg-rose-300 dark:bg-rose-300 text-gray-900 uppercase tracking-widest">
                                ŚUW
                            </span>
                        </div>
                        <div class="flex-1 flex flex-col gap-4">
                            <h3 class="flex flex-row items-center text-lg font-medium text-gray-900 dark:text-gray-100">
                                <span class="ms-1">
                                    Święta ustawowo wolne
                                </span>
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Włącz, jeśli chcesz, aby pomijać święta ustawowo wolne.
                            </p>
                        </div>
                    </div>
                    <label class="inline-flex items-center xl:justify-end xl:w-48">
                        <input type="checkbox" class="sr-only peer"
                            name="holiday"
                            checked
                            wire:model="state.holiday">
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
    </div>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\rcp-date-step.blade.php ENDPATH**/ ?>