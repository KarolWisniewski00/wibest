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
            <?php if (isset($component)) { $__componentOriginal0e174ee08c37362dcfb870ae8e570b1a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a)): ?>
<?php $attributes = $__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a; ?>
<?php unset($__attributesOriginal0e174ee08c37362dcfb870ae8e570b1a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e174ee08c37362dcfb870ae8e570b1a)): ?>
<?php $component = $__componentOriginal0e174ee08c37362dcfb870ae8e570b1a; ?>
<?php unset($__componentOriginal0e174ee08c37362dcfb870ae8e570b1a); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalb8699e4e7a3578705820a3da45318887 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb8699e4e7a3578705820a3da45318887 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content','data' => ['style' => 'box-shadow: 0 0 #0000;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'box-shadow: 0 0 #0000;']); ?>
                <div class="my-4 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 sm:h-14 w-11 sm:w-14 items-center justify-center rounded-xl sm:rounded-2xl bg-green-300/10 text-green-300 [@media(prefers-color-scheme:light)]:text-green-700 [@media(prefers-color-scheme:light)]:bg-green-100">
                            <i class="fa-solid fa-cube text-2xl"></i>
                        </div>
                        <div class="text-start">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Obiekty</h1>
                            <p class="text-sm text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">Centrum zarządzania obiektami</p>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-green','data' => ['href' => ''.e(route('object.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('object.create')).'']); ?><i class="fa-solid fa-plus mr-2"></i>Dodaj obiekt <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $attributes = $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $component = $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
                </div>

                <div x-data="wibestObjectPreview({ endpoint: <?php echo e(\Illuminate\Support\Js::from(route('object.dashboard'))); ?>, month: <?php echo e(\Illuminate\Support\Js::from($month->format('Y-m'))); ?>, dashboard: true })" @object-period-request.stop="changeMonth($event.detail.url, $event.detail.step)">
                    <div x-ref="period"><?php echo $__env->make('admin.object.partials.work-period', ['asyncPeriod' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                    <p x-show="loading" x-cloak role="status" class="mb-3 text-xs text-gray-600 dark:text-gray-300"><i class="fa-solid fa-spinner animate-spin mr-2" aria-hidden="true"></i>Aktualizowanie miesiąca…</p>
                    <p x-show="error" x-cloak role="alert" class="mb-3 text-sm text-red-700 dark:text-red-300"><span x-text="error"></span><button type="button" @click="changeMonth(pendingUrl)" class="ml-2 underline">Spróbuj ponownie</button></p>
                    <div x-ref="cards"><?php echo $__env->make('admin.object.partials.work-cards', ['dashboard' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                <div class="mb-4 grid grid-cols-1 gap-4 xl:grid-cols-3">
                    <?php echo $__env->make('admin.object.partials.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">
                        <div class="flex items-center gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">
                            <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex">
                                <i class="fa-solid fa-chart-line text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>
                            <div class="text-start">
                                <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Status obiektów</h2>
                                <p class="text-xs text-gray-600 dark:text-gray-300">Aktualny podział</p>
                            </div>
                        </div>
                        <?php
                            $colors = ['planned' => '#93c5fd', 'active' => '#86efac', 'paused' => '#facc15', 'cancelled' => '#fca5a5', 'completed' => '#6b7280'];
                            $segments = []; $angle = 0;
                            foreach ($colors as $status => $color) {
                                $next = $angle + ($total ? $counts->get($status, 0) / $total * 360 : 0);
                                if ($next > $angle) {
                                    $segments[] = "$color {$angle}deg {$next}deg";
                                }
                                $angle = $next;
                            }
                            $objectLabel = $total == 1 ? 'obiekt' : (
                                in_array($total % 10, [2, 3, 4]) && !in_array($total % 100, [12, 13, 14])
                                    ? 'obiekty' : 'obiektów'
                            );
                        ?>
                        <div class="flex flex-1 flex-col justify-center gap-6 px-6 py-5">
                            <div class="mx-auto flex h-40 w-40 shrink-0 items-center justify-center rounded-full bg-gray-200 dark:bg-gray-600"
                                style="<?php echo e($total ? 'background: conic-gradient('.implode(',', $segments).')' : ''); ?>"
                                role="img" aria-label="Podział statusów: <?php echo e($total); ?> <?php echo e($objectLabel); ?>. Szczegóły na liście poniżej.">
                                <div class="flex h-28 w-28 flex-col items-center justify-center rounded-full bg-white dark:bg-gray-700">
                                    <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($total); ?></span>
                                    <span class="text-xs text-gray-600 dark:text-gray-300"><?php echo e($objectLabel); ?></span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a data-object-status-link href="<?php echo e(route('object.dashboard', ['status' => $status, 'month' => $month->format('Y-m')])); ?>" class="flex items-center justify-between gap-3 rounded-md text-sm text-gray-700 transition hover:text-green-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-600 dark:text-gray-300 dark:hover:text-green-200 dark:focus-visible:ring-green-300">
                                        <span class="flex items-center gap-3"><span class="h-2.5 w-2.5 shrink-0 rounded-full ring-1 ring-black/10" style="background: <?php echo e($color); ?>" aria-hidden="true"></span><?php echo e(\App\Models\WorkObject::STATUSES[$status]); ?></span><strong class="font-semibold tabular-nums text-gray-900 dark:text-white"><?php echo e($counts->get($status, 0)); ?></strong>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-ref="objects"><?php echo $__env->make('admin.object.partials.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                <div x-ref="work"><?php echo $__env->make('admin.object.partials.work-table', ['dashboard' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $attributes = $__attributesOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__attributesOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $component = $__componentOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__componentOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\dashboard.blade.php ENDPATH**/ ?>