<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['emoji', 'title', 'employee', 'period', 'description']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['emoji', 'title', 'employee', 'period', 'description']); ?>
<?php foreach (array_filter((['emoji', 'title', 'employee', 'period', 'description']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="flex items-start gap-5">
    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true"><?php echo e($emoji); ?></div>
    <div>
        <p class="text-sm text-gray-500 dark:text-gray-400">Wynagrodzenia · <?php echo e($employee); ?></p>
        <h2 class="mt-1 !text-3xl font-semibold"><?php echo e($title); ?></h2>
        <p class="mt-3">Okres wynagrodzenia · <?php echo e($period); ?></p>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($description); ?></p>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\payroll\section-heading.blade.php ENDPATH**/ ?>