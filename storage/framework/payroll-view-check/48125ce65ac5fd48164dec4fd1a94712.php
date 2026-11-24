<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['tag' => 'button']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['tag' => 'button']); ?>
<?php foreach (array_filter((['tag' => 'button']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php ($element = $tag === 'summary' ? 'summary' : 'button'); ?>
<<?php echo e($element); ?> <?php echo e($attributes->merge(['class' => 'min-h-[34px] whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 text-white dark:bg-blue-300 border border-transparent rounded-lg font-semibold dark:text-gray-900 uppercase tracking-widest hover:bg-blue-200 dark:hover:bg-blue-400 focus:bg-blue-200 dark:focus:bg-blue-300 active:bg-blue-200 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150'])); ?>>
    <?php echo e($slot); ?>

</<?php echo e($element); ?>>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\button-blue.blade.php ENDPATH**/ ?>