<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['blog']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['blog']); ?>
<?php foreach (array_filter((['blog']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<tr class="snap-center bg-white dark:bg-gray-800 text-center">

    <td class="px-2 py-2">
        <div
            class="text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
            <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $blog->createdBy]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blog->createdBy)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $attributes = $__attributesOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__attributesOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $component = $__componentOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__componentOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name','data' => ['user' => $blog->createdBy]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blog->createdBy)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $attributes = $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $component = $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
        </div>
    </td>
        <td class="px-3 py-2">
        <div
            class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-center items-center text-center">
            <?php echo e($blog->title); ?>

        </div>
    </td>
    <td class="px-2 py-2 font-semibold text-lg  text-gray-700 dark:text-gray-50 bg-green-300">
        <?php if (isset($component)) { $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paragraf-display','data' => ['class' => 'text-xs whitespace-nowrap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paragraf-display'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xs whitespace-nowrap']); ?>
            <?php if (isset($component)) { $__componentOriginaldd68647f67a2255116b2ba7be5781704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd68647f67a2255116b2ba7be5781704 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-dark','data' => ['class' => '!text-gray-900']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-dark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!text-gray-900']); ?>
                    <?php echo e($blog->type); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $attributes = $__attributesOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__attributesOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd68647f67a2255116b2ba7be5781704)): ?>
<?php $component = $__componentOriginaldd68647f67a2255116b2ba7be5781704; ?>
<?php unset($__componentOriginaldd68647f67a2255116b2ba7be5781704); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $attributes = $__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__attributesOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7)): ?>
<?php $component = $__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7; ?>
<?php unset($__componentOriginal8a5d828e7953fc1ff5bbc467a10961d7); ?>
<?php endif; ?>
    </td>
    <td class="px-3 py-2 min-w-[600px]">
        <div
            class="text-gray-600 dark:text-gray-300 text-xs tracking-widest hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150 gap-2 flex flex-col justify-center items-center text-center">
            <?php echo e(Str::limit(json_encode($blog->content, JSON_UNESCAPED_UNICODE), 300)); ?>

        </div>
    </td>
    <td class="px-3 py-2">
        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('setting.blog.edit', $blog)).'','class' => 'min-h-[38px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.blog.edit', $blog)).'','class' => 'min-h-[38px]']); ?>
            <i class="fa-solid fa-pen-to-square"></i>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $attributes = $__attributesOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__attributesOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $component = $__componentOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__componentOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\row-blog.blade.php ENDPATH**/ ?>