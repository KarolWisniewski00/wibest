<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['kind' => 'list', 'pending' => 'reportLoading']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['kind' => 'list', 'pending' => 'reportLoading']); ?>
<?php foreach (array_filter((['kind' => 'list', 'pending' => 'reportLoading']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div x-show="<?php echo e($pending); ?>" x-cloak role="status" aria-live="polite"
    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['absolute inset-x-0 bottom-0 z-10 overflow-hidden bg-white dark:bg-gray-700', 'top-0 md:top-[49px]' => $kind === 'table', 'top-0' => $kind !== 'table']); ?>">
    <span class="sr-only">Ładowanie danych…</span>
    <div class="h-full animate-pulse motion-reduce:animate-none" aria-hidden="true">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kind === 'map'): ?>
            <div class="relative h-full bg-gray-100 dark:bg-gray-700">
                <div class="absolute inset-x-0 top-1/3 h-8 -rotate-12 bg-gray-200 dark:bg-gray-600"></div>
                <div class="absolute inset-y-0 left-1/3 w-6 rotate-12 bg-gray-200 dark:bg-gray-600"></div>
                <div class="absolute left-1/2 top-1/2 h-20 w-20 -translate-x-1/2 -translate-y-1/2 rounded-full border-8 border-gray-200 dark:border-gray-600"></div>
            </div>
        <?php else: ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($kind, ['table', 'list'])): ?>
                <div class="space-y-3 p-3 md:hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 6; $i++): ?>
                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['space-y-4 border-gray-200 p-4 dark:border-gray-700', 'rounded-lg border-2 bg-white dark:bg-gray-700' => $kind === 'table', 'rounded-xl border' => $kind === 'list']); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kind === 'table'): ?>
                                <div class="flex justify-between gap-4"><div class="h-4 w-28 rounded-full bg-gray-200 dark:bg-gray-600"></div><div class="h-3 w-20 rounded bg-gray-200 dark:bg-gray-600"></div></div>
                                <div class="flex items-center gap-3"><div class="h-10 w-10 rounded bg-gray-200 dark:bg-gray-600"></div><div class="flex-1 space-y-3"><div class="h-3 w-2/3 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 w-1/3 rounded bg-gray-200 dark:bg-gray-600"></div></div></div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="flex items-center gap-3"><div class="h-10 w-10 shrink-0 rounded-full bg-gray-200 dark:bg-gray-600"></div><div class="flex-1 space-y-3"><div class="h-3 w-3/4 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 w-1/2 rounded bg-gray-200 dark:bg-gray-600"></div></div></div>
                            <div class="flex gap-4"><div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['w-16 rounded bg-gray-200 dark:bg-gray-600', 'h-8' => $kind === 'table', 'h-3' => $kind !== 'table']); ?>"></div><div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['w-16 rounded bg-gray-200 dark:bg-gray-600', 'h-8' => $kind === 'table', 'h-3' => $kind !== 'table']); ?>"></div></div>
                        </div>
                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['hidden md:block' => in_array($kind, ['table', 'list'])]); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 8; $i++): ?>
                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['flex items-center gap-4 border-gray-200 px-5 py-4 dark:border-gray-600', 'mx-3 my-3 flex-wrap rounded-xl border md:mx-0 md:my-0 md:flex-nowrap md:rounded-none md:border-0 md:border-b' => in_array($kind, ['table', 'list']), 'border-b' => $kind === 'workers']); ?>">
                    <div class="h-10 w-10 shrink-0 rounded-full bg-gray-200 dark:bg-gray-600"></div>
                    <div class="min-w-0 flex-1 space-y-3">
                        <div class="h-3 w-2/3 rounded bg-gray-200 dark:bg-gray-600"></div>
                        <div class="h-2 w-1/3 rounded bg-gray-100 dark:bg-gray-600"></div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kind === 'table'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($column = 0; $column < 5; $column++): ?>
                            <div class="hidden flex-1 space-y-3 md:block"><div class="h-3 w-2/3 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-2 w-1/2 rounded bg-gray-100 dark:bg-gray-600"></div></div>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="h-3 w-10 shrink-0 rounded bg-gray-200 dark:bg-gray-600"></div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($kind, ['table', 'list'])): ?>
                        <div class="flex w-full gap-4 md:hidden"><div class="h-3 flex-1 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 flex-1 rounded bg-gray-200 dark:bg-gray-600"></div><div class="h-3 flex-1 rounded bg-gray-200 dark:bg-gray-600"></div></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kind !== 'workers'): ?><div class="h-8 w-8 shrink-0 rounded-lg bg-gray-100 dark:bg-gray-600"></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\object\loading.blade.php ENDPATH**/ ?>