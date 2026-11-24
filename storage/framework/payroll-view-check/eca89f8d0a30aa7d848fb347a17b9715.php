<header class="my-6 rounded-2xl bg-white p-6 sm:p-8 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <div class="flex flex-wrap items-start gap-5">
        <div class="shrink-0 rounded-2xl bg-green-100 p-3 dark:bg-gray-700"><?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
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
        <div class="min-w-0 flex-1"><p class="text-sm text-gray-500 dark:text-gray-400">Profil pracownika</p><h1 class="mt-1 break-words text-3xl font-semibold tracking-tight"><?php echo e($user->name); ?></h1>
            <div class="mt-3 flex flex-wrap items-center gap-3"><?php if (isset($component)) { $__componentOriginal511f850cac5424cdc86b87752ce184cb = $component; } ?>
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
<?php endif; ?><span class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($user->position ?: 'Stanowisko nieuzupełnione'); ?></span></div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($user->supervisor || $user->position) && $user->company && in_array($role, ['admin', 'właściciel'])): ?>
            <div class="ml-auto flex flex-wrap justify-end gap-3">
                <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('team.user.edit', $user)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.edit', $user)).'']); ?>
                    <i class="fa-solid fa-pen-to-square mr-2" aria-hidden="true"></i>Edytuj użytkownika
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
                <?php if (isset($component)) { $__componentOriginal7931f85c37d345e4d89919ba1482a252 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7931f85c37d345e4d89919ba1482a252 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-orange','data' => ['href' => ''.e(route('team.user.restart', $user)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('team.user.restart', $user)).'']); ?>
                    <i class="fa-solid fa-paper-plane mr-2" aria-hidden="true"></i>Reset hasła
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7931f85c37d345e4d89919ba1482a252)): ?>
<?php $attributes = $__attributesOriginal7931f85c37d345e4d89919ba1482a252; ?>
<?php unset($__attributesOriginal7931f85c37d345e4d89919ba1482a252); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7931f85c37d345e4d89919ba1482a252)): ?>
<?php $component = $__componentOriginal7931f85c37d345e4d89919ba1482a252; ?>
<?php unset($__componentOriginal7931f85c37d345e4d89919ba1482a252); ?>
<?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <dl class="mt-7 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 text-sm">
        <div><dt class="text-gray-500 dark:text-gray-400">📧 Email</dt><dd class="mt-1 break-all"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->email): ?><a href="mailto:<?php echo e($user->email); ?>" class="hover:underline"><?php echo e($user->email); ?></a><?php else: ?> Brak danych <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></dd></div>
        <div><dt class="text-gray-500 dark:text-gray-400">📱 Telefon</dt><dd class="mt-1"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->phone): ?><a href="tel:<?php echo e($user->phone); ?>" class="hover:underline"><?php echo e($user->phone); ?></a><?php else: ?> Brak danych <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></dd></div>
        <div><dt class="text-gray-500 dark:text-gray-400">👤 Bezpośredni przełożony</dt><dd class="mt-1"><?php echo e($user->supervisor?->name ?? 'Brak przełożonego'); ?></dd></div>
        <div><dt class="text-gray-500 dark:text-gray-400">👤 Płeć</dt><dd class="mt-1"><?php echo e(match($user->gender) { 'male' => 'Mężczyzna', 'female' => 'Kobieta', default => 'Brak danych' }); ?></dd></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->oauth_id): ?><div><dt class="text-gray-500 dark:text-gray-400">Logowanie przez Google</dt><dd class="mt-1"><i class="fa-brands fa-google mr-2" aria-hidden="true"></i>Połączono</dd></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </dl>
</header>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\team\employee-header.blade.php ENDPATH**/ ?>