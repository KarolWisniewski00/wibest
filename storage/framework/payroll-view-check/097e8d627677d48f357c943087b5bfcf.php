<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex']); ?>
    <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company): ?>
    <!--SIDE BAR-->
    <?php if (isset($component)) { $__componentOriginal93e260becef192ebdfafc9d931a5f07f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93e260becef192ebdfafc9d931a5f07f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar-left','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <li>
            <div class="p-2 text-sm text-blue-300 rounded-lg dark:text-blue-300">
                Tworzysz wniosek w imieniu użytkownika
            </div>
        </li>
        <li>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('date-start-end-picker', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-354013087-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </li>
        <li>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('leave-picker', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-354013087-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </li>
        <li>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('users-picker', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-354013087-2', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </li>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $attributes = $__attributesOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $component = $__componentOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__componentOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
    <!--SIDE BAR-->

    <!--MAIN-->
    <?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginal60ccd5bd713ec4042154745c4ba311c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal60ccd5bd713ec4042154745c4ba311c0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.leave.nav','data' => ['role' => $role,'leavePending' => $leavePending]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('leave.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['role' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($role),'leavePending' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($leavePending)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal60ccd5bd713ec4042154745c4ba311c0)): ?>
<?php $attributes = $__attributesOriginal60ccd5bd713ec4042154745c4ba311c0; ?>
<?php unset($__attributesOriginal60ccd5bd713ec4042154745c4ba311c0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60ccd5bd713ec4042154745c4ba311c0)): ?>
<?php $component = $__componentOriginal60ccd5bd713ec4042154745c4ba311c0; ?>
<?php unset($__componentOriginal60ccd5bd713ec4042154745c4ba311c0); ?>
<?php endif; ?>
        <!--CONTENT-->
        <div class="p-4">
            <!--POWRÓT-->
            <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('leave.pending.index')).'','class' => 'text-lg mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('leave.pending.index')).'','class' => 'text-lg mb-4']); ?>
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do wniosków
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3a1cf38827b336ba38d71f21422d468)): ?>
<?php $attributes = $__attributesOriginala3a1cf38827b336ba38d71f21422d468; ?>
<?php unset($__attributesOriginala3a1cf38827b336ba38d71f21422d468); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3a1cf38827b336ba38d71f21422d468)): ?>
<?php $component = $__componentOriginala3a1cf38827b336ba38d71f21422d468; ?>
<?php unset($__componentOriginala3a1cf38827b336ba38d71f21422d468); ?>
<?php endif; ?>
            <h2 class="text-xl font-semibold dark:text-white mb-4 text-center">Złóż nowy wniosek w imieniu użytkownika</h2>
            <!--POWRÓT-->
            <span>
                <?php echo csrf_field(); ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('leave-wizard-user', []);

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-354013087-3', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <!-- Dane ogólne -->
            </span>

        </div>
        <!--CONTENT-->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $attributes = $__attributesOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__attributesOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $component = $__componentOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__componentOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
    <!--MAIN-->
    <?php else: ?>
    <?php echo $__env->make('admin.elements.end_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\leave-pending\create.blade.php ENDPATH**/ ?>