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
    <style>
        [data-team-record] { position: relative; isolation: isolate; }
        #table { border-collapse: separate; border-spacing: 0 12px; }
        #table thead th:first-child { border-radius: .75rem 0 0 .75rem; }
        #table thead th:last-child { border-radius: 0 .75rem .75rem 0; }
        #table thead th { padding-top: 1rem; padding-bottom: 1rem; }
        #table tr[data-team-record] > td { background-color: #fff; transition: background-color 150ms ease; }
        #table tr[data-team-record]:hover > td { background-color: #f3f4f6; }
        #table tr[data-team-record] > td:first-child { border-radius: .75rem 0 0 .75rem; }
        #table tr[data-team-record] > td:last-child { border-radius: 0 .75rem .75rem 0; }
        @media (prefers-color-scheme: dark) {
            #table tr[data-team-record] > td { background-color: #1f2937; }
            #table tr[data-team-record]:hover > td { background-color: #374151; }
        }
        [data-team-link]::after { content: ''; position: absolute; inset: 0; z-index: 1; border-radius: inherit; }
        [data-team-link]:focus-visible::after { outline: 2px solid #9ca3af; outline-offset: -2px; }
        [data-team-record] a:not([data-team-link]), [data-team-record] button,
        [data-team-record] input, [data-team-record] select { position: relative; z-index: 2; }
    </style>
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
        <?php if (isset($component)) { $__componentOriginal33e4867731ced0462908f8cc78d5ea1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-filter','data' => ['ariaLabel' => 'Szukaj użytkownika po nazwie']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['aria-label' => 'Szukaj użytkownika po nazwie']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $attributes = $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $component = $__componentOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal93b19dcd5a972d8db1675422e003c44d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93b19dcd5a972d8db1675422e003c44d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-team','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93b19dcd5a972d8db1675422e003c44d)): ?>
<?php $attributes = $__attributesOriginal93b19dcd5a972d8db1675422e003c44d; ?>
<?php unset($__attributesOriginal93b19dcd5a972d8db1675422e003c44d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93b19dcd5a972d8db1675422e003c44d)): ?>
<?php $component = $__componentOriginal93b19dcd5a972d8db1675422e003c44d; ?>
<?php unset($__componentOriginal93b19dcd5a972d8db1675422e003c44d); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalcc97824972f5ba335094ca17c2cc1aad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc97824972f5ba335094ca17c2cc1aad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-team-script','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-team-script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php echo e(route('api.v1.team.user.set.role')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc97824972f5ba335094ca17c2cc1aad)): ?>
<?php $attributes = $__attributesOriginalcc97824972f5ba335094ca17c2cc1aad; ?>
<?php unset($__attributesOriginalcc97824972f5ba335094ca17c2cc1aad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc97824972f5ba335094ca17c2cc1aad)): ?>
<?php $component = $__componentOriginalcc97824972f5ba335094ca17c2cc1aad; ?>
<?php unset($__componentOriginalcc97824972f5ba335094ca17c2cc1aad); ?>
<?php endif; ?>
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
        <?php if (isset($component)) { $__componentOriginal47af182a1e8be46798b32f44aa5e0356 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47af182a1e8be46798b32f44aa5e0356 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team.nav','data' => ['role' => $role,'invitations' => $invitations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['role' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($role),'invitations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invitations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47af182a1e8be46798b32f44aa5e0356)): ?>
<?php $attributes = $__attributesOriginal47af182a1e8be46798b32f44aa5e0356; ?>
<?php unset($__attributesOriginal47af182a1e8be46798b32f44aa5e0356); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47af182a1e8be46798b32f44aa5e0356)): ?>
<?php $component = $__componentOriginal47af182a1e8be46798b32f44aa5e0356; ?>
<?php unset($__componentOriginal47af182a1e8be46798b32f44aa5e0356); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalccd9d2a7e480dbfccc87c0b7a644bf24 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd9d2a7e480dbfccc87c0b7a644bf24 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <span>👤</span> Mój zespół
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd9d2a7e480dbfccc87c0b7a644bf24)): ?>
<?php $attributes = $__attributesOriginalccd9d2a7e480dbfccc87c0b7a644bf24; ?>
<?php unset($__attributesOriginalccd9d2a7e480dbfccc87c0b7a644bf24); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd9d2a7e480dbfccc87c0b7a644bf24)): ?>
<?php $component = $__componentOriginalccd9d2a7e480dbfccc87c0b7a644bf24; ?>
<?php unset($__componentOriginalccd9d2a7e480dbfccc87c0b7a644bf24); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => ['id' => 'show-filter','class' => 'mb-4 mx-4 md:m-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'show-filter','class' => 'mb-4 mx-4 md:m-4']); ?>
            WSZYSTKO
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $attributes = $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $component = $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
        <!--CONTENT-->
        <?php if (isset($component)) { $__componentOriginalb8699e4e7a3578705820a3da45318887 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb8699e4e7a3578705820a3da45318887 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <!--MOBILE VIEW-->
            <?php if (isset($component)) { $__componentOriginal52edc5f3d6de46edf4e1debed7575931 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52edc5f3d6de46edf4e1debed7575931 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.list','data' => ['items' => $users,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal0d470134e1d99a5138e22f91eff57b62 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d470134e1d99a5138e22f91eff57b62 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-team','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d470134e1d99a5138e22f91eff57b62)): ?>
<?php $attributes = $__attributesOriginal0d470134e1d99a5138e22f91eff57b62; ?>
<?php unset($__attributesOriginal0d470134e1d99a5138e22f91eff57b62); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d470134e1d99a5138e22f91eff57b62)): ?>
<?php $component = $__componentOriginal0d470134e1d99a5138e22f91eff57b62; ?>
<?php unset($__componentOriginal0d470134e1d99a5138e22f91eff57b62); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5f3171486c026203a53d5016ee42669d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f3171486c026203a53d5016ee42669d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-team-card','data' => ['id' => 'loader-card']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-team-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader-card']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f3171486c026203a53d5016ee42669d)): ?>
<?php $attributes = $__attributesOriginal5f3171486c026203a53d5016ee42669d; ?>
<?php unset($__attributesOriginal5f3171486c026203a53d5016ee42669d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f3171486c026203a53d5016ee42669d)): ?>
<?php $component = $__componentOriginal5f3171486c026203a53d5016ee42669d; ?>
<?php unset($__componentOriginal5f3171486c026203a53d5016ee42669d); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52edc5f3d6de46edf4e1debed7575931)): ?>
<?php $attributes = $__attributesOriginal52edc5f3d6de46edf4e1debed7575931; ?>
<?php unset($__attributesOriginal52edc5f3d6de46edf4e1debed7575931); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52edc5f3d6de46edf4e1debed7575931)): ?>
<?php $component = $__componentOriginal52edc5f3d6de46edf4e1debed7575931; ?>
<?php unset($__componentOriginal52edc5f3d6de46edf4e1debed7575931); ?>
<?php endif; ?>
            <!--MOBILE VIEW-->

            <!--PC VIEW-->
            <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => ['headers' => ['Pracownik', 'Dane kontaktowe', 'Obecność', ''],'items' => $users,'checkBox' => false,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Pracownik', 'Dane kontaktowe', 'Obecność', '']),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users),'checkBox' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal2290d8c5f85a942fe8a5bc17e163c685 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2290d8c5f85a942fe8a5bc17e163c685 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.row-team','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('row-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2290d8c5f85a942fe8a5bc17e163c685)): ?>
<?php $attributes = $__attributesOriginal2290d8c5f85a942fe8a5bc17e163c685; ?>
<?php unset($__attributesOriginal2290d8c5f85a942fe8a5bc17e163c685); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2290d8c5f85a942fe8a5bc17e163c685)): ?>
<?php $component = $__componentOriginal2290d8c5f85a942fe8a5bc17e163c685; ?>
<?php unset($__componentOriginal2290d8c5f85a942fe8a5bc17e163c685); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal309d54056f706545b663afb2fc42a79d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal309d54056f706545b663afb2fc42a79d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-team','data' => ['id' => 'loader']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal309d54056f706545b663afb2fc42a79d)): ?>
<?php $attributes = $__attributesOriginal309d54056f706545b663afb2fc42a79d; ?>
<?php unset($__attributesOriginal309d54056f706545b663afb2fc42a79d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal309d54056f706545b663afb2fc42a79d)): ?>
<?php $component = $__componentOriginal309d54056f706545b663afb2fc42a79d; ?>
<?php unset($__componentOriginal309d54056f706545b663afb2fc42a79d); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal84bc13f46ede078ae58666238de3da00 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84bc13f46ede078ae58666238de3da00 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loading','data' => ['id' => 'team-loading','class' => 'hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'team-loading','class' => 'hidden']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal84bc13f46ede078ae58666238de3da00)): ?>
<?php $attributes = $__attributesOriginal84bc13f46ede078ae58666238de3da00; ?>
<?php unset($__attributesOriginal84bc13f46ede078ae58666238de3da00); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal84bc13f46ede078ae58666238de3da00)): ?>
<?php $component = $__componentOriginal84bc13f46ede078ae58666238de3da00; ?>
<?php unset($__componentOriginal84bc13f46ede078ae58666238de3da00); ?>
<?php endif; ?>
            <!--PC VIEW-->

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $attributes = $__attributesOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__attributesOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $component = $__componentOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__componentOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>
        <!--CONTENT-->
        <p id="team-feedback" role="status" aria-live="polite" class="px-4 mb-8 pb-4 text-sm text-gray-600 dark:text-gray-300"></p>
        <?php if (isset($component)) { $__componentOriginal24504361cd823d18e547d1ed201d4a99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal24504361cd823d18e547d1ed201d4a99 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.download-only-counting','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('download-only-counting'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal24504361cd823d18e547d1ed201d4a99)): ?>
<?php $attributes = $__attributesOriginal24504361cd823d18e547d1ed201d4a99; ?>
<?php unset($__attributesOriginal24504361cd823d18e547d1ed201d4a99); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal24504361cd823d18e547d1ed201d4a99)): ?>
<?php $component = $__componentOriginal24504361cd823d18e547d1ed201d4a99; ?>
<?php unset($__componentOriginal24504361cd823d18e547d1ed201d4a99); ?>
<?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\team\index.blade.php ENDPATH**/ ?>