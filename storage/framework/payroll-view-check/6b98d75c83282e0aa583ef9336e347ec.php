                    <div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600 sm:flex-row sm:items-center sm:justify-between [@media(prefers-color-scheme:light)]:border-gray-300">
                        <div class="flex min-w-0 items-center gap-3">
                        <div class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                            <i class="fa-solid fa-users text-lg sm:text-2xl" aria-hidden="true"></i>
                        </div>

                        <div>
                            <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                Pracownicy
                            </h2>

                            <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                Osoby pracujące na tym obiekcie
                            </p>
                        </div>

                        </div>
                        <div class="relative w-full shrink-0 sm:w-56">
                            <label for="object-worker-search" class="sr-only">Szukaj pracownika po imieniu i nazwisku</label>
                            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
                            <input id="object-worker-search" data-employee-search type="search" x-model="employeeSearch" @keydown.escape.stop.prevent="clearEmployeeSearch()" maxlength="255" placeholder="Szukaj pracownika..." aria-label="Szukaj pracownika" aria-controls="object-assigned-workers"
                                class="h-9 w-full rounded-lg border border-gray-300 bg-gray-50 pl-9 pr-9 text-xs text-gray-900 placeholder:text-gray-500 outline-none transition focus:border-green-600 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-100 dark:placeholder:text-gray-300 dark:focus:border-green-300/50 dark:focus:ring-green-300/50 [&::-webkit-search-cancel-button]:appearance-none">
                            <button type="button" x-show="employeeSearch.length > 0" x-cloak @click.stop="clearEmployeeSearch()" aria-label="Wyczyść wyszukiwanie pracowników" title="Wyczyść wyszukiwanie" class="absolute right-1 top-1/2 flex h-7 w-7 -translate-y-1/2 items-center justify-center rounded-md text-gray-500 transition-all duration-200 hover:bg-gray-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-gray-300 dark:hover:bg-gray-500 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-xmark text-xs" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="relative overflow-hidden" :aria-busy="reportLoading">
                        <div :class="reportLoading ? 'invisible' : ''" :inert="reportLoading">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($object->users->isNotEmpty()): ?>
                            <div id="object-assigned-workers" data-object-user-list class="max-h-[330px] divide-y divide-gray-200 overflow-y-auto pr-1 dark:divide-gray-600">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $object->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div role="button" tabindex="0" data-employee-id="<?php echo e($user->id); ?>" data-employee-name="<?php echo e($user->name); ?>" x-show="matchesEmployee(<?php echo e(\Illuminate\Support\Js::from($user->name)); ?>)" @click="selectEmployee(<?php echo e($user->id); ?>)" @keydown.enter.prevent="selectEmployee(<?php echo e($user->id); ?>)" @keydown.space.prevent="selectEmployee(<?php echo e($user->id); ?>)"
                                        :aria-pressed="selectedEmployeeId === <?php echo e($user->id); ?> ? 'true' : 'false'" aria-controls="work-list-results"
                                        :class="selectedEmployeeId === <?php echo e($user->id); ?> ? 'rounded-xl bg-green-300/20 hover:bg-green-300/30 ring-1 ring-inset ring-green-300' : 'rounded-none bg-transparent hover:rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600'"
                                        class="flex cursor-pointer items-center gap-2 px-3 py-3 font-semibold uppercase tracking-widest text-gray-600 transition-all duration-200 focus-visible:rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-gray-300">
                                        <div class="flex shrink-0 items-center [&>*]:m-0">
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
                                        </div>
                                        <div class="flex min-w-0 flex-1 flex-wrap items-center gap-2 text-start text-xs leading-tight [&>*]:m-0">
                                            <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => ['class' => 'min-w-0 break-words [overflow-wrap:anywhere]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'min-w-0 break-words [overflow-wrap:anywhere]']); ?><?php echo e($user->name); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginal511f850cac5424cdc86b87752ce184cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511f850cac5424cdc86b87752ce184cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-role','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-role'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511f850cac5424cdc86b87752ce184cb)): ?>
<?php $attributes = $__attributesOriginal511f850cac5424cdc86b87752ce184cb; ?>
<?php unset($__attributesOriginal511f850cac5424cdc86b87752ce184cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511f850cac5424cdc86b87752ce184cb)): ?>
<?php $component = $__componentOriginal511f850cac5424cdc86b87752ce184cb; ?>
<?php unset($__componentOriginal511f850cac5424cdc86b87752ce184cb); ?>
<?php endif; ?>
                                        </div>
                                        <div class="shrink-0 flex items-center gap-2 text-sm font-semibold text-gray-600 dark:text-gray-300" aria-label="Czas pracy na obiekcie w wybranym miesiącu"><i class="fa-solid fa-clock" aria-hidden="true"></i><?php echo e(intdiv($workReport['worker_seconds'][$user->id] ?? 0, 3600)); ?>h</div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div id="object-assigned-workers" x-show="employeeSearch.trim().length === 0"><?php if (isset($component)) { $__componentOriginal4f50f2a61d06fe83eb24347cfd68191c = $component; } ?>
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
<?php endif; ?></div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <p x-show="employeeSearch.trim().length > 0 && !hasMatchingEmployees()" x-cloak role="status" aria-live="polite" class="py-6 text-center text-sm text-gray-500 dark:text-gray-300 [@media(prefers-color-scheme:light)]:text-gray-600">Nie znaleziono pracowników</p>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal52a0caf2fbcc203749da5504fb454ea9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52a0caf2fbcc203749da5504fb454ea9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.loading','data' => ['kind' => 'workers']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['kind' => 'workers']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52a0caf2fbcc203749da5504fb454ea9)): ?>
<?php $attributes = $__attributesOriginal52a0caf2fbcc203749da5504fb454ea9; ?>
<?php unset($__attributesOriginal52a0caf2fbcc203749da5504fb454ea9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52a0caf2fbcc203749da5504fb454ea9)): ?>
<?php $component = $__componentOriginal52a0caf2fbcc203749da5504fb454ea9; ?>
<?php unset($__componentOriginal52a0caf2fbcc203749da5504fb454ea9); ?>
<?php endif; ?>
                        </div>
                        <div class="mt-4 flex min-h-8 flex-wrap items-center justify-between gap-3 border-t border-gray-200 pt-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                                <span>Pracownicy przypisani</span>
                                <span class="font-semibold text-green-800 dark:text-green-300"><?php echo e($object->users->count()); ?></span>
                            </div>
                            <button type="button" x-show="selectedEmployeeId !== null" x-cloak @click="selectEmployee(null)" class="ml-auto rounded-lg px-2 py-1 text-xs font-medium text-green-800 transition-all duration-200 hover:bg-green-300/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-300 dark:text-green-300">Wyczyść filtry</button>
                        </div>
                    </div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\partials\preview-workers.blade.php ENDPATH**/ ?>