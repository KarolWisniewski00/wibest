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
        <li>
                <div class="payroll-month flex w-full items-center gap-4 rounded-2xl bg-gray-700 p-5 dark:bg-gray-700 ">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-600" aria-hidden="true">📅</span>
                    <div><p class="text-sm text-gray-500 dark:text-gray-300">Miesiąc rozliczenia</p><p class="mt-1 text-xl font-semibold tracking-tight"><?php echo e(\Carbon\Carbon::createFromFormat('!Y-m', $period)->locale('pl')->translatedFormat('F Y')); ?></p><p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Okres wynagrodzenia</p></div>
                </div>
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
        <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php ($fieldClass = 'payroll-input'); ?>
        <?php ($settled = $row['payment_status'] === 'Rozliczono'); ?>
        <div class="payroll-workspace">
            <header class="flex flex-wrap items-start justify-between gap-6">
                <div class="flex items-start gap-5">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">💼</div>
                    <div><p class="text-sm text-gray-500 dark:text-gray-400">Wynagrodzenia · <?php echo e($user->name); ?></p>
                    <h1 class="mt-1">Rozliczenie miesiąca</h1>
                    <p class="mt-3">Umowa o pracę · <?php echo e(\Carbon\Carbon::createFromFormat('!Y-m', $period)->format('m.Y')); ?></p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Sprawdź dane, oblicz wypłatę i zapisz rozliczenie.</p>
                    <?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['class' => 'payroll-button mt-4','href' => ''.e(route('team.user.show', $user)).'#employment-title']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'payroll-button mt-4','href' => ''.e(route('team.user.show', $user)).'#employment-title']); ?>👤 Umowa i oświadczenia pracownika <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $attributes = $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $component = $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?>
                    </div>
                </div>

            </header>
            <?php echo $__env->make('admin.payroll.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div role="alert" class="rounded-2xl border border-red-200 bg-red-50 p-5 text-red-900 dark:border-red-800 dark:bg-gray-700 dark:text-red-300">
                    <p class="font-semibold">⚠️ Sprawdź dane formularza</p><ul class="mt-3 list-disc space-y-2 pl-5"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></ul>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$settled && ($row['missing'] || $row['attention'])): ?>
                <details class="payroll-card" open><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">🔎 Co wymaga uzupełnienia</summary><ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_merge($row['missing'],$row['attention']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($reason); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></ul></details>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$settled): ?>
                <?php echo $__env->make('admin.payroll.opening-balances', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.payroll.payment-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($result && !$settled): ?>
                <div id="payment-preview" class="space-y-6">
                    <?php echo $__env->make('admin.payroll.net-result', ['calculation' => $result], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$result['assumptions']): ?>
                        <?php ($completesMonth = $result['period_gross_cents'] !== null && $row['paid_gross_cents'] + $result['amounts']['cash'] === $result['period_gross_cents']); ?>
                        <form method="POST" action="<?php echo e(route('raport.payroll.net.approve', $user)); ?>" class="payroll-card space-y-5" x-data="{ saving: false }" @submit="if (saving) { $event.preventDefault(); } else { saving = true; }">
                            <?php echo csrf_field(); ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $input; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>"><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <input type="hidden" name="request_key" value="<?php echo e((string) \Illuminate\Support\Str::uuid()); ?>">
                            <input type="hidden" name="preview_hash" value="<?php echo e(hash('sha256', json_encode($result))); ?>">
                            <h2>💾 <?php echo e($completesMonth ? 'Zapisz rozliczenie miesiąca' : 'Zapisz część wypłaty'); ?></h2>
                            <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-400">Zapisz sprawdzone kwoty i dane źródłowe. <?php echo e($completesMonth ? 'Po zapisaniu miesiąc otrzyma status „Rozliczono”.' : 'Miesiąc pozostanie częściowo rozliczony, dopóki nie zapiszesz całego należnego brutto.'); ?> Zapis jest niezmienny; korekty wymagają odrębnej obsługi. To nie jest zlecenie przelewu.</p>
                            <label class="payroll-check"><input type="checkbox" name="history_confirmed" value="1" required><span>Potwierdzam kompletność wypłat i limitów. Od salda początkowego nie wystąpiły nieuwzględnione podstawy ZUS z innych tytułów ani wypłaty rozliczone poza WIBEST.</span></label>
                            <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit','xBind:disabled' => 'saving','xBind:ariaBusy' => 'saving','class' => 'w-full disabled:cursor-wait disabled:opacity-60 sm:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','x-bind:disabled' => 'saving','x-bind:aria-busy' => 'saving','class' => 'w-full disabled:cursor-wait disabled:opacity-60 sm:w-auto']); ?><span x-show="!saving"><?php echo e($completesMonth ? '✅ Rozlicz miesiąc' : '💾 Zapisz część wypłaty'); ?></span><span x-show="saving" x-cloak>Zapisywanie…</span> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
                        </form>
                    <?php else: ?>
                        <p class="payroll-help">ℹ️ To symulacja. Uzupełnij wskazane wyżej dane i oblicz ponownie, aby zapisać rozliczenie.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <section class="payroll-card">
                <?php if (isset($component)) { $__componentOriginal6e62a498b530247ad77bc1198db19a7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e62a498b530247ad77bc1198db19a7d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.section-heading','data' => ['emoji' => '⏱️','title' => 'Ewidencja czasu pracy i wnioski','employee' => $user->name,'period' => $period,'description' => 'Grafik, rejestracja czasu i zaakceptowane wnioski stanowią podstawę wyliczenia brutto.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['emoji' => '⏱️','title' => 'Ewidencja czasu pracy i wnioski','employee' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->name),'period' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($period),'description' => 'Grafik, rejestracja czasu i zaakceptowane wnioski stanowią podstawę wyliczenia brutto.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e62a498b530247ad77bc1198db19a7d)): ?>
<?php $attributes = $__attributesOriginal6e62a498b530247ad77bc1198db19a7d; ?>
<?php unset($__attributesOriginal6e62a498b530247ad77bc1198db19a7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e62a498b530247ad77bc1198db19a7d)): ?>
<?php $component = $__componentOriginal6e62a498b530247ad77bc1198db19a7d; ?>
<?php unset($__componentOriginal6e62a498b530247ad77bc1198db19a7d); ?>
<?php endif; ?>
                <?php echo $__env->make('admin.payroll.time-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.payroll.rcp-sessions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <details class="mt-4"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">🗓️ Wnioski przyjęte do rozliczenia (<?php echo e(count($row['leaves'])); ?>)</summary><ul class="mt-3 space-y-2 text-sm"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $row['leaves']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><li>#<?php echo e($leave['id']); ?> · <?php echo e($leave['type']); ?> · <?php echo e($leave['start']); ?> – <?php echo e($leave['end']); ?> · <?php echo e($leave['status']); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><li>Brak zaakceptowanych / zrealizowanych wniosków.</li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></ul></details>
            </section>
            <?php if (isset($component)) { $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team-info-card','data' => ['class' => 'payroll-card','id' => 'payment-history']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team-info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'payroll-card','id' => 'payment-history']); ?>
                <?php if (isset($component)) { $__componentOriginal6e62a498b530247ad77bc1198db19a7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e62a498b530247ad77bc1198db19a7d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.section-heading','data' => ['emoji' => '💸','title' => 'Zatwierdzone wypłaty','employee' => $user->name,'period' => $period,'description' => 'Zapisane rozliczenia i paski PDF pozostają dostępne po ponownym otwarciu miesiąca.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.section-heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['emoji' => '💸','title' => 'Zatwierdzone wypłaty','employee' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->name),'period' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($period),'description' => 'Zapisane rozliczenia i paski PDF pozostają dostępne po ponownym otwarciu miesiąca.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e62a498b530247ad77bc1198db19a7d)): ?>
<?php $attributes = $__attributesOriginal6e62a498b530247ad77bc1198db19a7d; ?>
<?php unset($__attributesOriginal6e62a498b530247ad77bc1198db19a7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e62a498b530247ad77bc1198db19a7d)): ?>
<?php $component = $__componentOriginal6e62a498b530247ad77bc1198db19a7d; ?>
<?php unset($__componentOriginal6e62a498b530247ad77bc1198db19a7d); ?>
<?php endif; ?>
            <section class="payroll-card">
                <h3 class="font-semibold">📊 Zatwierdzone wypłaty w <?php echo e($year); ?> roku</h3>
                <dl class="mt-4 grid gap-4 sm:grid-cols-2 xl:grid-cols-4"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['cash'=>'Brutto','net'=>'Netto','income'=>'Dochód PIT u tego płatnika','pit'=>'Pobrane zaliczki PIT']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="payroll-metric"><dt class="text-sm text-gray-600 dark:text-gray-400"><?php echo e($label); ?></dt><dd class="mt-2 text-lg font-semibold tabular-nums"><?php echo e(\App\Services\Payroll\Money::display($annual[$key])); ?></dd></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></dl>
                <p class="mt-4 text-sm leading-relaxed text-gray-600 dark:text-gray-400">Suma zapisanych wypłat według daty wypłaty. Przy obliczaniu progów doliczamy potwierdzone salda początkowe. Kwota wolna jest uwzględniana przez pomniejszenie PIT — nie odejmujemy jej ponownie od dochodu. Próg podatkowy dotyczy dochodu, nie brutto.</p>
            </section>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="payroll-payment rounded-xl bg-gray-50 p-4 sm:p-5 dark:bg-gray-900">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div class="flex min-w-0 items-start gap-4">
                                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-2xl dark:bg-gray-800" aria-hidden="true">📄</span>
                                <div class="min-w-0">
                                    <p class="font-semibold">Zatwierdzona wypłata #<?php echo e($payment->id); ?></p>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Data wypłaty: <?php echo e(\Carbon\Carbon::parse($payment->paid_on)->format('d.m.Y')); ?> · Okres: <?php echo e(\Carbon\Carbon::parse($payment->period)->format('m.Y')); ?></p>
                                    <p class="mt-2 font-medium"><?php echo e(\App\Services\Payroll\Money::display($payment->payload['amounts']['net'])); ?> netto</p>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Zapisano <?php echo e($payment->created_at->format('d.m.Y H:i')); ?></p>
                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['class' => 'payroll-button ml-auto','href' => ''.e(route('raport.payroll.payslip',['user'=>$user,'payment'=>$payment])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'payroll-button ml-auto','href' => ''.e(route('raport.payroll.payslip',['user'=>$user,'payment'=>$payment])).'']); ?>📄 Pobierz pasek wypłaty (PDF) <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $attributes = $__attributesOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__attributesOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal459c868fdb862b735c02a27231cfbfef)): ?>
<?php $component = $__componentOriginal459c868fdb862b735c02a27231cfbfef; ?>
<?php unset($__componentOriginal459c868fdb862b735c02a27231cfbfef); ?>
<?php endif; ?>
                        </div>
                        <details id="payment-details-<?php echo e($payment->id); ?>" class="mt-4">
                        <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Szczegóły wypłaty</summary>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Zapisano <?php echo e($payment->created_at->format('d.m.Y H:i')); ?>. Poniżej wartości z zatwierdzonego rozliczenia.</p>
                        <?php echo $__env->make('admin.payroll.net-result', ['calculation' => $payment->payload], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </details>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="rounded-xl bg-gray-50 p-5 text-sm text-gray-600 dark:bg-gray-700 dark:text-gray-400">📭 Brak zapisanych wypłat. Po obliczeniu i zatwierdzeniu rozliczenia pojawią się tutaj.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php echo e($payments->links()); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $attributes = $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7)): ?>
<?php $component = $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7; ?>
<?php unset($__componentOriginal3ac47c1cda82552532530fdeb1df9ee7); ?>
<?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\payroll\net.blade.php ENDPATH**/ ?>