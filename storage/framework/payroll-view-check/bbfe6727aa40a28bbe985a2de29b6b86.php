<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type' => null, 'compact' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type' => null, 'compact' => false]); ?>
<?php foreach (array_filter((['type' => null, 'compact' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $presentation = (is_string($type) ? config('work_objects.types.'.$type) : null)
        ?? config('work_objects.default');
?>

<div <?php if(!$compact): ?> id="info" <?php endif; ?> class="shrink-0 items-center justify-center bg-gradient-to-br <?php echo e($compact ? 'flex h-9 w-9 rounded-xl' : 'flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl'); ?> <?php echo e($presentation['primary']); ?> <?php echo e($presentation['secondary']); ?>">
    <i class="fa-solid <?php echo e($presentation['icon']); ?> <?php echo e($compact ? 'text-base' : 'text-lg sm:text-2xl'); ?>" aria-hidden="true"></i>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\object\type-icon.blade.php ENDPATH**/ ?>