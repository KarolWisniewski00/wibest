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
<div class="flex min-w-0 items-start gap-4 text-left">
    <div class="shrink-0 rounded-2xl bg-green-100 p-2 dark:bg-gray-700"><?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
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
<?php endif; ?></div>
    <div class="min-w-0"><p class="text-xs text-gray-500 dark:text-gray-400">Profil pracownika</p><a data-team-link href="<?php echo e(route('team.user.show', $user)); ?>" class="mt-1 block break-words rounded-lg text-lg font-semibold text-gray-900 focus-visible:ring-2 focus-visible:ring-green-300 dark:text-gray-100"><?php echo e($user->name); ?></a><p class="mt-2 break-words text-sm text-gray-500 dark:text-gray-400">💼 <?php echo e($user->position ?: 'Stanowisko nieuzupełnione'); ?></p><div class="mt-2"><?php if (isset($component)) { $__componentOriginal511f850cac5424cdc86b87752ce184cb = $component; } ?>
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
<?php endif; ?></div></div>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\team-user-identity.blade.php ENDPATH**/ ?>