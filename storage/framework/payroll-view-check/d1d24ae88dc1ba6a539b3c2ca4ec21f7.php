<div data-object-mobile-list class="space-y-3 p-3 md:hidden">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $presentation = config('work_objects.types.'.$object->object_type) ?? config('work_objects.default');
            $address = trim((string) $object->location?->address);
            $locality = collect([$object->location?->postal_code, $object->location?->city])
                ->filter(fn ($part) => filled($part) && mb_stripos($address, trim($part)) === false)
                ->map(fn ($part) => trim($part))->implode(' ');
            $fullAddress = collect([$address, $locality])->filter(fn ($part) => filled($part))->implode(', ');
            $country = trim((string) $object->location?->country);
            if ($country !== '' && mb_stripos($fullAddress, $country) === false) {
                $fullAddress = $fullAddress !== '' ? $fullAddress.', '.$country : $country;
            }
            $seconds = $workReport['object_seconds'][$object->id] ?? 0;
        ?>
        <a href="<?php echo e(route('object.show', $object)); ?>" class="group block min-w-0 space-y-4 rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition-colors duration-200 hover:bg-gray-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:border-gray-300">
            <div class="flex items-center gap-3">
                <?php if (isset($component)) { $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.type-icon','data' => ['type' => $object->object_type,'compact' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.type-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($object->object_type),'compact' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $attributes = $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $component = $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
                <div class="flex min-w-0 flex-1 flex-col items-start gap-2 text-left">
                    <h3 class="break-words text-sm font-semibold text-gray-900 dark:text-white [overflow-wrap:anywhere]"><?php echo e($object->name); ?></h3>
                    <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium <?php echo e($statusStyles[$object->status] ?? $statusStyles['completed']); ?>"><?php echo e(\App\Models\WorkObject::STATUSES[$object->status] ?? $object->status); ?></span>
                </div>
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-500 transition group-hover:bg-gray-100 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:bg-gray-700 dark:group-hover:text-gray-200 [@media(prefers-color-scheme:light)]:text-gray-600"><i class="fa-solid fa-chevron-right text-xs" aria-hidden="true"></i></div>
            </div>
            <div class="flex items-start gap-2 text-xs text-gray-600 dark:text-gray-300"><i class="fa-solid fa-location-dot mt-0.5 shrink-0" aria-hidden="true"></i><span class="min-w-0 break-words [overflow-wrap:anywhere]"><?php echo e($fullAddress ?: ($object->location?->name ?: 'Brak lokalizacji')); ?></span></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($object->starts_at || $object->ends_at): ?>
                <p class="text-xs text-gray-600 dark:text-gray-300"><i class="fa-regular fa-calendar mr-1" aria-hidden="true"></i><?php echo e($object->starts_at?->format('d.m.Y') ?? '—'); ?> – <?php echo e($object->ends_at?->format('d.m.Y') ?? '—'); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs font-semibold text-gray-600 dark:text-gray-300">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($object->users_count !== null): ?><span><i class="fa-solid fa-users mr-1" aria-hidden="true"></i><?php echo e($object->users_count); ?> pracowników</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <span aria-label="Czas pracy na obiekcie w wybranym miesiącu"><i class="fa-solid fa-clock mr-1" aria-hidden="true"></i><?php echo e(intdiv($seconds, 3600)); ?>h <?php echo e(intdiv($seconds % 3600, 60)); ?>m</span>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\partials\list-mobile.blade.php ENDPATH**/ ?>