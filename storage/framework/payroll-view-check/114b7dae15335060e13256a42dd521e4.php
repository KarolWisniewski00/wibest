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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-filter','data' => ['name' => 'search','form' => 'payroll-filters','value' => request('search'),'placeholder' => 'Wyszukaj pracownika','ariaLabel' => 'Wyszukaj pracownika','oninput' => 'clearTimeout(window.payrollSearchTimer); window.payrollSearchTimer = setTimeout(() => this.form.requestSubmit(), 400)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','form' => 'payroll-filters','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request('search')),'placeholder' => 'Wyszukaj pracownika','aria-label' => 'Wyszukaj pracownika','oninput' => 'clearTimeout(window.payrollSearchTimer); window.payrollSearchTimer = setTimeout(() => this.form.requestSubmit(), 400)']); ?>
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
        <li>
            <form id="payroll-filters" method="GET">
                <label for="payroll-month" class="block text-sm mb-2">Miesiąc</label>
                <input id="payroll-month" type="month" name="month" value="<?php echo e($month->format('Y-m')); ?>" required class="w-full rounded-xl border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700" onchange="clearTimeout(window.payrollSearchTimer); this.form.requestSubmit()">
                <noscript><?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'mt-2']); ?>Pokaż <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?></noscript>
            </form>
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
        <?php if (isset($component)) { $__componentOriginal05a0340e4dade378a9c74c9ec2899536 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05a0340e4dade378a9c74c9ec2899536 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.raport.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('raport.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05a0340e4dade378a9c74c9ec2899536)): ?>
<?php $attributes = $__attributesOriginal05a0340e4dade378a9c74c9ec2899536; ?>
<?php unset($__attributesOriginal05a0340e4dade378a9c74c9ec2899536); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05a0340e4dade378a9c74c9ec2899536)): ?>
<?php $component = $__componentOriginal05a0340e4dade378a9c74c9ec2899536; ?>
<?php unset($__componentOriginal05a0340e4dade378a9c74c9ec2899536); ?>
<?php endif; ?>
        <div class="p-4 sm:p-8 text-gray-900 dark:text-gray-100">
            <div class="flex flex-wrap items-end justify-between gap-5 mb-8">
                <div><h1 class="text-3xl font-semibold tracking-tight">Wynagrodzenia</h1><p class="mt-2 text-gray-500 dark:text-gray-400">Czas pracy, podstawa i kompletność rozliczenia.</p></div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($rows)): ?>
            <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">Gotowe oznacza kompletność wyliczenia brutto. Koszt pracodawcy wymaga osobnej konfiguracji ubezpieczeń. Niezapisane zestawienia są podglądem bieżących danych.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="grid gap-4 xl:grid-cols-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php ($displayStatus = ($row['payment_status'] ?? 'Nierozliczono') !== 'Nierozliczono' ? $row['payment_status'] : $row['status']); ?>
                <a href="<?php echo e(route('raport.payroll.net', ['user' => $row['user_id'], 'month' => $month->format('Y-m')])); ?>" class="group block rounded-2xl bg-white p-5 sm:p-6 transition hover:bg-green-50 focus-visible:ring-2 focus-visible:ring-green-300 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex justify-between gap-4"><div><h2 class="text-lg font-semibold"><?php echo e($row['name']); ?></h2><p class="mt-1 text-sm text-gray-500 dark:text-gray-400"><?php echo e(\App\Models\EmployeeContract::TYPES[$row['contract']['type'] ?? ''] ?? 'Brak zatrudnienia'); ?></p></div><span class="text-sm <?php echo e(in_array($displayStatus,['Gotowe','Rozliczono']) ? 'text-green-700 dark:text-green-300' : 'text-amber-700 dark:text-amber-300'); ?>"><?php echo e($displayStatus); ?></span></div>
                    <p class="mt-6 text-sm text-gray-500 dark:text-gray-400"><?php echo e(isset($row['target_net']) ? 'Netto z umowy (przed naliczeniem brutto)' : 'Wynagrodzenie brutto'); ?></p><p class="text-3xl font-semibold tabular-nums"><?php echo e(isset($row['target_net']) ? \App\Services\Payroll\Money::display($row['target_net']) : ($row['gross'] === null ? 'Do ustalenia' : number_format($row['gross'], 2, ',', ' ').' zł')); ?></p>
                    <?php echo $__env->make('admin.payroll.time-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <dl class="mt-4 grid grid-cols-2 gap-4 text-sm"><div><dt class="text-gray-500 dark:text-gray-400">Podstawa / stawka</dt><dd><?php echo e($row['contract']['monthly_gross'] ?? $row['contract']['hourly_rate'] ?? '—'); ?> zł<?php echo e(($row['contract']['settlement'] ?? '') === 'hourly' ? '/h' : ''); ?></dd></div><div><dt class="text-gray-500 dark:text-gray-400">Koszt pracodawcy</dt><dd><?php echo e($row['cost'] === null ? 'Wymaga danych' : number_format($row['cost'], 2, ',', ' ').' zł'); ?></dd></div></dl>
                    <p class="mt-5 text-sm text-gray-500 dark:text-gray-400"><?php echo e($row['payment_status'] === 'Rozliczono' ? '✅ Miesiąc rozliczono · Zapisane dane i wypłaty' : ($row['saved_at'] ? '📄 Zapisane zestawienie · Szczegóły rozliczenia' : '📝 Podgląd · Szczegóły rozliczenia')); ?> <i class="fa-solid fa-chevron-right ml-2" aria-hidden="true"></i></p>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="rounded-2xl bg-white p-8 text-center dark:bg-gray-800 xl:col-span-2">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-3xl dark:bg-gray-700" aria-hidden="true"><?php echo e($hasContracts ? '🔎' : '📄'); ?></div>
                    <h2 class="mt-5 text-2xl font-semibold"><?php echo e($hasContracts ? 'Brak danych dla wybranych filtrów' : 'Dodaj pierwszą umowę'); ?></h2>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasContracts): ?>
                        <p class="mx-auto mt-3 max-w-xl text-gray-500 dark:text-gray-400">Dla wybranego miesiąca i wyszukiwania nie znaleziono wynagrodzeń. Zmień filtry lub sprawdź okres obowiązywania i kompletność umów.</p>
                    <?php else: ?>
                        <p class="mx-auto mt-3 max-w-xl text-gray-500 dark:text-gray-400">Pracownicy Twojej firmy nie mają jeszcze umów. Przejdź do zespołu, wybierz użytkownika i dodaj umowę, aby rozpocząć rozliczanie wynagrodzeń.</p>
                        <?php if (isset($component)) { $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-green','data' => ['class' => 'mt-6','href' => ''.e(route('team.user.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-6','href' => ''.e(route('team.user.index')).'']); ?>Przejdź do zespołu <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $attributes = $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c)): ?>
<?php $component = $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c; ?>
<?php unset($__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c); ?>
<?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($rows)): ?>
            <p class="mt-5 text-sm text-gray-500 dark:text-gray-400">Nadwyżka względem grafiku nie oznacza automatycznie nadgodzin z dodatkiem 50% lub 100%.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="mt-6"><?php echo e($users->links()); ?></div>
        </div>
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
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\payroll\index.blade.php ENDPATH**/ ?>