<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['title']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['title']); ?>
<?php foreach (array_filter((['title']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<aside class="relative overflow-hidden rounded-xl bg-blue-50 p-4 text-blue-700 dark:bg-blue-900/20 dark:text-blue-300" role="note">
    <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid fa-circle-info"></i></div>
    <div class="relative flex items-start gap-3">
        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-900/20" aria-hidden="true"><i class="fa-solid fa-circle-info text-lg sm:text-2xl"></i></div>
        <div class="min-w-0"><div class="text-xs uppercase tracking-wider opacity-70">Informacja</div><p class="mt-1 font-semibold"><?php echo e($title); ?></p><div class="mt-2 text-sm leading-relaxed"><?php echo e($slot); ?></div></div>
    </div>
</aside>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\payroll\info.blade.php ENDPATH**/ ?>