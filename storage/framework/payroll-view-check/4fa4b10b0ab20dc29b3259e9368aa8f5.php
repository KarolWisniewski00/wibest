<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['user']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['user']); ?>
<?php foreach (array_filter((['user']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<dl class="grid min-w-0 grid-cols-1 gap-x-6 gap-y-4 text-left text-sm sm:grid-cols-2">
    <div class="min-w-0"><dt class="text-gray-500 dark:text-gray-400">📧 Email</dt><dd class="mt-1 break-all font-medium text-gray-900 dark:text-gray-100"><?php echo e($user->email ?: 'Brak adresu email'); ?></dd></div>
    <div><dt class="text-gray-500 dark:text-gray-400">📱 Telefon</dt><dd class="mt-1 font-medium text-gray-900 dark:text-gray-100"><?php echo e($user->phone ?: 'Brak telefonu'); ?></dd></div>
</dl>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\team-user-details.blade.php ENDPATH**/ ?>