<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id', 'label', 'help']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id', 'label', 'help']); ?>
<?php foreach (array_filter((['id', 'label', 'help']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div <?php echo e($attributes->merge(['class' => 'payroll-field min-w-0'])); ?>>
    <label for="<?php echo e($id); ?>" class="block text-sm font-semibold"><?php echo e($label); ?></label>
    <?php echo e($slot); ?>

    <p id="<?php echo e($id); ?>-help" class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-400"><?php echo e($help); ?></p>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\payroll\field.blade.php ENDPATH**/ ?>