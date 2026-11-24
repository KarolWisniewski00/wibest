<div>
    <?php
        $users = $this->getUsers();
        $this->getUsersChecked();
        $userCount = $users->count();

        $loggedInUser = auth()->user();
        $supervisorId = $loggedInUser->supervisor_id ?? null;
    ?>

    <div class="mb-4" id="manager">
        <?php if (isset($component)) { $__componentOriginale846a3f4bf16d9b022b2a902d94ae75b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale846a3f4bf16d9b022b2a902d94ae75b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-form','data' => ['value' => '👤 Wybierz przełożonego']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => '👤 Wybierz przełożonego']); ?>
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

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($users->isEmpty()): ?>
            <?php if (isset($component)) { $__componentOriginal4f50f2a61d06fe83eb24347cfd68191c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-place','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('empty-place'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c)): ?>
<?php $attributes = $__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c; ?>
<?php unset($__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f50f2a61d06fe83eb24347cfd68191c)): ?>
<?php $component = $__componentOriginal4f50f2a61d06fe83eb24347cfd68191c; ?>
<?php unset($__componentOriginal4f50f2a61d06fe83eb24347cfd68191c); ?>
<?php endif; ?>
        <?php else: ?>
            <div x-data="{
                        showAll: false,
                        search: '',
                        limit: 3,
                        userCount: <?php echo e($userCount); ?>,

                        updateLimit() {
                            this.limit = window.matchMedia('(min-width: 768px)').matches
                                ? 9
                                : 3;
                        },

                        matches(name, role) {
                            const query = this.search.trim().toLocaleLowerCase('pl-PL');

                            if (!query) {
                                return true;
                            }

                            return name.toLocaleLowerCase('pl-PL').includes(query)
                                || role.toLocaleLowerCase('pl-PL').includes(query);
                        },

                        get hasSearch() {
                            return this.search.trim().length > 0;
                        },

                        get canShowMore() {
                            return this.userCount > this.limit;
                        }
                    }" x-init="updateLimit(); window.addEventListener('resize', () => updateLimit())" class="relative">
                
                <div class="relative mb-4">
                    <input type="search" x-model="search" @input="showAll = hasSearch" placeholder="Szukaj przełożonego..."
                        aria-label="Szukaj przełożonego" class="w-full rounded-xl border border-gray-200 bg-white
                                   p-3 pr-11 text-sm text-gray-800
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

                
                <p x-cloak x-show="hasSearch" class="mb-3 text-sm text-gray-500 dark:text-gray-400" aria-live="polite">
                    Wyniki wyszukiwania
                </p>

                
                <ul class="grid w-full gap-4 md:grid-cols-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $userName = trim(
                                ($user->name ?? '') . ' ' . ($user->surname ?? '')
                            );
                        ?>

                        <li x-cloak x-show="matches(<?php echo \Illuminate\Support\Js::from($userName)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($user->role)->toHtml() ?>) &&
                                        (hasSearch || showAll || <?php echo e($index); ?> < limit)">
                            <input name="manager_id" wire:model.live="state.manager_id" type="radio"
                                id="manager-<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" class="hidden peer" />

                            <label for="manager-<?php echo e($user->id); ?>" class="flex-wrap gap-4 h-full inline-flex items-center
                                               justify-between w-full p-4 text-gray-500
                                               bg-white border-2 border-gray-200 rounded-lg
                                               cursor-pointer transition-all duration-200
                                               dark:hover:text-gray-300 dark:border-gray-700
                                               peer-checked:border-green-300
                                               dark:peer-checked:border-green-300
                                               hover:text-gray-600 peer-checked:text-gray-600
                                               hover:bg-gray-50 dark:text-gray-400
                                               dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="flex items-center gap-2">
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

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($supervisorId && $user->id == $supervisorId): ?>
                                    <span class="text-xs font-semibold text-green-300
                                                           uppercase tracking-widest
                                                           transition ease-in-out duration-150
                                                           whitespace-normal mt-1">
                                        Bezpośredni przełożony
                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </label>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($userCount > 3): ?>
                    <div x-cloak x-show="!hasSearch && !showAll && canShowMore" class="pointer-events-none absolute bottom-[62px] left-0
                                       w-full h-24 bg-gradient-to-t from-white
                                       dark:from-gray-800/70 to-transparent"></div>

                    <div class="flex items-center justify-center w-full">
                        <?php if (isset($component)) { $__componentOriginal2206b3edd9b3a7dd03d6501764573069 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2206b3edd9b3a7dd03d6501764573069 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-back','data' => ['xCloak' => true,'xShow' => '!hasSearch && !showAll && canShowMore','type' => 'button','class' => 'mt-4 text-lg w-full md:w-fit
                                           flex items-center justify-center','@click' => 'showAll = true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => '!hasSearch && !showAll && canShowMore','type' => 'button','class' => 'mt-4 text-lg w-full md:w-fit
                                           flex items-center justify-center','@click' => 'showAll = true']); ?>
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
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\manager-step.blade.php ENDPATH**/ ?>