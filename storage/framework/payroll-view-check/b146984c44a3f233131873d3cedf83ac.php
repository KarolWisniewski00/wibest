<li class="group rounded-lg">
    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg dark:text-white" aria-controls="role-dropdown" data-collapse-toggle="role-dropdown">
        <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Role</span>
        <i class="fa-solid fa-chevron-up"></i>
    </button>
    <?php if (isset($component)) { $__componentOriginalf0431c9f374f40dd68513166d4fbd171 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0431c9f374f40dd68513166d4fbd171 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-team-ul','data' => ['id' => 'role-dropdown','class' => 'p-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-team-ul'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'role-dropdown','class' => 'p-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf0431c9f374f40dd68513166d4fbd171)): ?>
<?php $attributes = $__attributesOriginalf0431c9f374f40dd68513166d4fbd171; ?>
<?php unset($__attributesOriginalf0431c9f374f40dd68513166d4fbd171); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf0431c9f374f40dd68513166d4fbd171)): ?>
<?php $component = $__componentOriginalf0431c9f374f40dd68513166d4fbd171; ?>
<?php unset($__componentOriginalf0431c9f374f40dd68513166d4fbd171); ?>
<?php endif; ?>
</li><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\search-team.blade.php ENDPATH**/ ?>