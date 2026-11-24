<div>

    <div class="mb-4">
        <div id="manager">
            <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['value' => '📋 Wprowadź dane podstawowe']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => '📋 Wprowadź dane podstawowe']); ?>
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
            <div>
                <?php if (isset($component)) { $__componentOriginal760ca5bfa557d86be74ea49bd2b7c853 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal760ca5bfa557d86be74ea49bd2b7c853 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-identity-fields','data' => ['livewire' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-identity-fields'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['livewire' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal760ca5bfa557d86be74ea49bd2b7c853)): ?>
<?php $attributes = $__attributesOriginal760ca5bfa557d86be74ea49bd2b7c853; ?>
<?php unset($__attributesOriginal760ca5bfa557d86be74ea49bd2b7c853); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal760ca5bfa557d86be74ea49bd2b7c853)): ?>
<?php $component = $__componentOriginal760ca5bfa557d86be74ea49bd2b7c853; ?>
<?php unset($__componentOriginal760ca5bfa557d86be74ea49bd2b7c853); ?>
<?php endif; ?>
                <div class="mt-2">
                    <label for="position" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>💼</span> Stanowisko <span class="text-xs text-gray-400">(opcjonalne)</span>
                    </label>
                    <input type="text" name="position" wire:model="state.position" class="w-full mt-2 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-lg font-semibold" />
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['state.position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p role="alert" class="text-sm text-red-600 dark:text-red-400"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="mt-2">
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🚻</span> Płeć
                    </label>

                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            💖 Kobieta
                        </span>
                        <input id="gender" type="checkbox" name="gender" wire:model="state.gender" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-pink-300 rounded-full peer dark:bg-pink-300
                            peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                            after:content-[''] after:absolute after:top-0.5 after:start-[2px]
                            after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                            transition-colors duration-300 ease-in-out
                            peer-checked:bg-blue-300 dark:peer-checked:bg-blue-300">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            💙 Mężczyzna
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\primary-step.blade.php ENDPATH**/ ?>