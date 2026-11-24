<div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <!-- START -->
            <input
                name="start_time"
                wire:model="state.start_time"
                wire:change="getTimeAndTypeChecked"
                type="hidden"
                class="" />
            <!--:workSessionId="app()->make(\App\Repositories\WorkSessionRepository::class)->getFirstRcp($this->getState()['user_id'], $this->getState()['date_edit'])->id ?? null"-->
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar-from-to-auto', ['workSession' => 'true','type' => 'first','work_session' => 'true','workSessionId' => $this->getState()['work_session_id'] ?? null,'calendar' => 'single','startDate' => $this->getState()['start_time'] ?? null,'endDate' => $this->getState()['end_time'] ?? null,'currentMonth' => session('first'),'userId' => ''.e(array_key_exists('user_id', $this->getState()) ? $this->getState()['user_id'] : auth()->user()->id).'']);

$__key = time();

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4290196490-0', $__key);

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
        <div>
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'start_time_clock','value' => '⏱️ Wybierz godzinę rozpoczęcia']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'start_time_clock','value' => '⏱️ Wybierz godzinę rozpoczęcia']); ?>
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
            <div class="relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="start_time_clock"
                    wire:model="state.start_time_clock"
                    wire:change="getTimeAndTypeChecked"
                    required
                    step="1"
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'end_time_clock','value' => '⏱️ Wybierz godzinę zakończenia']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'end_time_clock','value' => '⏱️ Wybierz godzinę zakończenia']); ?>
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
            <div class=" relative mb-4 border-gray-300">
                <input
                    type="time"
                    id="end_time_clock"
                    wire:model="state.end_time_clock"
                    wire:change="getTimeAndTypeChecked"
                    step="1"
                    required
                    class="datepicker h-12 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 pl-12 pr-4 outline-none  dark:bg-gray-700 dark:text-gray-50" />
                <span
                    id="toggleDatepicker"
                    class="toggleDatepicker absolute inset-y-0 flex h-12 w-12 items-center justify-center text-gray-50">
                    <i class="fa-regular fa-clock"></i>
                </span>
            </div>
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['for' => 'night','value' => '🌙 Wybierz czy zmiana nocna']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'night','value' => '🌙 Wybierz czy zmiana nocna']); ?>
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
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Zmiana nocna</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Włącz, jeśli chcesz, aby godzina zakończenia była następnego dnia.
                        </p>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1">
                            <i class="fa-regular fa-lightbulb text-yellow-400 mr-2"></i>
                            Możliwy zapis tylko jeśli następny dzień jest wolny lub jest zmiana nocna.
                        </div>
                    </div>
                    <label class="inline-flex items-center xl:justify-end xl:w-48">
                        <input type="checkbox" class="sr-only peer"
                            name="night"
                            wire:change="getTimeAndTypeChecked"
                            wire:model="state.night">
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
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\rcp-step.blade.php ENDPATH**/ ?>