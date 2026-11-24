<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->role == 'admin'): ?>
<?php if (isset($component)) { $__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-green','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    Admin
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4)): ?>
<?php $attributes = $__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4; ?>
<?php unset($__attributesOriginal8a11aeb324514b2d4d552cafd0d56dd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4)): ?>
<?php $component = $__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4; ?>
<?php unset($__componentOriginal8a11aeb324514b2d4d552cafd0d56dd4); ?>
<?php endif; ?>
<?php elseif($user->role == 'menedżer'): ?>
<?php if (isset($component)) { $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-cello','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    Menedżer
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $attributes = $__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__attributesOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0)): ?>
<?php $component = $__componentOriginal78715f6f1afcdcf6d260bbfba435fef0; ?>
<?php unset($__componentOriginal78715f6f1afcdcf6d260bbfba435fef0); ?>
<?php endif; ?>
<?php elseif($user->role == 'kierownik'): ?>
<?php if (isset($component)) { $__componentOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-yellow','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-yellow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    Kierownik
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46)): ?>
<?php $attributes = $__attributesOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46; ?>
<?php unset($__attributesOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46)): ?>
<?php $component = $__componentOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46; ?>
<?php unset($__componentOriginal5d8dc24f3fbdbb0aa9a8eee797e6fb46); ?>
<?php endif; ?>
<?php elseif($user->role == 'użytkownik'): ?>
<?php if (isset($component)) { $__componentOriginal95447ef734ceee684cc0983ae43e4120 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95447ef734ceee684cc0983ae43e4120 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    Użytkownik
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95447ef734ceee684cc0983ae43e4120)): ?>
<?php $attributes = $__attributesOriginal95447ef734ceee684cc0983ae43e4120; ?>
<?php unset($__attributesOriginal95447ef734ceee684cc0983ae43e4120); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95447ef734ceee684cc0983ae43e4120)): ?>
<?php $component = $__componentOriginal95447ef734ceee684cc0983ae43e4120; ?>
<?php unset($__componentOriginal95447ef734ceee684cc0983ae43e4120); ?>
<?php endif; ?>
<?php elseif($user->role == 'właściciel'): ?>
<?php if (isset($component)) { $__componentOriginal17c0ab593f26e966966a79c2f9434ef7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17c0ab593f26e966966a79c2f9434ef7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-rose','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-rose'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    Właściciel
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal17c0ab593f26e966966a79c2f9434ef7)): ?>
<?php $attributes = $__attributesOriginal17c0ab593f26e966966a79c2f9434ef7; ?>
<?php unset($__attributesOriginal17c0ab593f26e966966a79c2f9434ef7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal17c0ab593f26e966966a79c2f9434ef7)): ?>
<?php $component = $__componentOriginal17c0ab593f26e966966a79c2f9434ef7; ?>
<?php unset($__componentOriginal17c0ab593f26e966966a79c2f9434ef7); ?>
<?php endif; ?>
<?php elseif($user->role == 'CRM'): ?>
<?php if (isset($component)) { $__componentOriginal17c0ab593f26e966966a79c2f9434ef7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17c0ab593f26e966966a79c2f9434ef7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-rose','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-rose'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    CRM
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal17c0ab593f26e966966a79c2f9434ef7)): ?>
<?php $attributes = $__attributesOriginal17c0ab593f26e966966a79c2f9434ef7; ?>
<?php unset($__attributesOriginal17c0ab593f26e966966a79c2f9434ef7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal17c0ab593f26e966966a79c2f9434ef7)): ?>
<?php $component = $__componentOriginal17c0ab593f26e966966a79c2f9434ef7; ?>
<?php unset($__componentOriginal17c0ab593f26e966966a79c2f9434ef7); ?>
<?php endif; ?>
<?php else: ?>
<?php if (isset($component)) { $__componentOriginal6d793c1620e628f2997ffd8665b00b3a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6d793c1620e628f2997ffd8665b00b3a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-violet','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-violet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    Brak Roli
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6d793c1620e628f2997ffd8665b00b3a)): ?>
<?php $attributes = $__attributesOriginal6d793c1620e628f2997ffd8665b00b3a; ?>
<?php unset($__attributesOriginal6d793c1620e628f2997ffd8665b00b3a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d793c1620e628f2997ffd8665b00b3a)): ?>
<?php $component = $__componentOriginal6d793c1620e628f2997ffd8665b00b3a; ?>
<?php unset($__componentOriginal6d793c1620e628f2997ffd8665b00b3a); ?>
<?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\user-role.blade.php ENDPATH**/ ?>