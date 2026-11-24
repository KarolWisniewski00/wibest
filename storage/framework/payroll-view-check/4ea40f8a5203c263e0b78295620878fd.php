<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-payroll')): ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if((int) $user->company_id === (int) auth()->user()->company_id): ?>
<?php
    $tax = \App\Models\EmployeeTaxSetting::where('company_id',$user->company_id)->where('user_id',$user->id)->orderByDesc('effective_from')->orderByDesc('id')->first();
    $fieldClass = 'mt-2 block w-full rounded-xl border-gray-200 bg-gray-50 text-gray-900 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-green-300 focus:border-green-300';
?>
<section class="my-6 rounded-2xl bg-white p-6 sm:p-8 dark:bg-gray-800 text-gray-900 dark:text-gray-100" aria-labelledby="employment-title">
    <div class="flex flex-wrap items-start justify-between gap-5">
        <div class="order-last ml-auto flex flex-wrap justify-end gap-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($employment): ?><?php if (isset($component)) { $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-neutral','data' => ['href' => ''.e(route('raport.payroll.net',['user'=>$user,'month'=>now()->format('Y-m')])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('raport.payroll.net',['user'=>$user,'month'=>now()->format('Y-m')])).'']); ?>Rozlicz miesiąc <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $attributes = $__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__attributesOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8)): ?>
<?php $component = $__componentOriginal8b9f9b2ffaef010baf6c759746b434f8; ?>
<?php unset($__componentOriginal8b9f9b2ffaef010baf6c759746b434f8); ?>
<?php endif; ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'button','onclick' => 'const panel = document.getElementById(\'add-employment\'); panel.open = !panel.open; this.setAttribute(\'aria-expanded\', panel.open)','ariaControls' => 'add-employment','ariaExpanded' => ''.e($errors->any() ? 'true' : 'false').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','onclick' => 'const panel = document.getElementById(\'add-employment\'); panel.open = !panel.open; this.setAttribute(\'aria-expanded\', panel.open)','aria-controls' => 'add-employment','aria-expanded' => ''.e($errors->any() ? 'true' : 'false').'']); ?>＋ Dodaj umowę <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
        </div>
        <div class="flex items-start gap-5"><div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-2xl dark:bg-gray-700" aria-hidden="true">💼</div>
            <div><p class="text-sm text-gray-500 dark:text-gray-400">Warunki zatrudnienia</p><h2 id="employment-title" class="mt-1 text-3xl font-semibold">Umowa</h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($employment): ?>
                <p class="mt-3"><?php echo e(\App\Models\EmployeeContract::TYPES[$employment->type] ?? $employment->type); ?> · <?php echo e(['trial'=>'okres próbny','fixed'=>'czas określony','indefinite'=>'czas nieokreślony'][$employment->details['term'] ?? ''] ?? 'uzupełnij rodzaj'); ?></p>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><?php echo e($employment->starts_on->format('d.m.Y')); ?> – <?php echo e($employment->ends_on?->format('d.m.Y') ?? 'bezterminowo'); ?></p>
                <p class="mt-2 font-medium"><?php echo e($employment->details['amount'] ?? $employment->monthly_gross ?? $employment->hourly_rate); ?> zł <?php echo e(str_ends_with($employment->details['pay_basis'] ?? '', '_net') ? 'netto' : 'brutto'); ?> <?php echo e($employment->settlement === 'hourly' ? '/ godzinę' : '/ miesiąc'); ?></p>
            <?php else: ?><p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Brak umowy. Dodaj ją, aby rozpocząć rozliczanie wynagrodzenia.</p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

    </div>
    <details id="add-employment" class="mt-6" <?php if($errors->any()): ?> open <?php endif; ?>>
        <summary class="hidden">Dodaj umowę</summary>
        <div class="mt-5 grid text-left gap-3 sm:grid-cols-2">
            <details class="sm:col-span-2 rounded-xl bg-gray-50 p-4 dark:bg-gray-900" <?php if($errors->any()): ?> open <?php endif; ?>>
                <summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">Umowa o pracę <i class="fa-solid fa-chevron-down ml-2 text-xs" aria-hidden="true"></i></summary>
                <?php echo $__env->make('admin.team.simple-employment-form',['editing'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </details>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Umowa zlecenia'=>'Wkrótce dostępna','Umowa o dzieło'=>'Wkrótce dostępna','B2B'=>'Wkrótce dostępne']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label=>$soon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" disabled class="flex items-center justify-between gap-3 rounded-xl bg-gray-50 p-4 text-left text-gray-400 dark:bg-gray-900 dark:text-gray-500"><span><?php echo e($label); ?></span><span class="text-xs"><?php echo e($soon); ?></span></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </details>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($employment): ?>
    <section class="mt-8 border-t border-gray-100 pt-6 dark:border-gray-700" aria-labelledby="contract-history-title">
        <h3 id="contract-history-title" class="text-xl font-semibold">Historia umów</h3>
        <div class="mt-4 space-y-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = \App\Models\EmployeeContract::where('company_id',$user->company_id)->where('user_id',$user->id)->orderByDesc('effective_from')->orderByDesc('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="rounded-xl bg-gray-50 p-4 sm:p-5 dark:bg-gray-900">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div class="flex min-w-0 items-start gap-4">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-2xl dark:bg-gray-800" aria-hidden="true">📄</span>
                        <div class="min-w-0"><p class="font-semibold"><?php echo e(\App\Models\EmployeeContract::TYPES[$version->type] ?? $version->type); ?></p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Wersja #<?php echo e($version->id); ?> · obowiązuje od <?php echo e($version->effective_from->format('d.m.Y')); ?></p>
                            <p class="mt-2 font-medium"><?php echo e($version->details['amount'] ?? $version->monthly_gross ?? $version->hourly_rate); ?> zł <?php echo e(str_ends_with($version->details['pay_basis'] ?? '', '_net') ? 'netto' : 'brutto'); ?></p>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Zapisano <?php echo e($version->created_at->format('d.m.Y H:i')); ?></p>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($version->id === $employment->id && $employment->type === 'employment'): ?>
                        <?php if (isset($component)) { $__componentOriginale36cdaaa17b72535ca0c67059982048f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale36cdaaa17b72535ca0c67059982048f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-blue','data' => ['type' => 'button','class' => 'ml-auto','onclick' => 'const panel = document.getElementById(\'edit-employment\'); panel.open = !panel.open; this.setAttribute(\'aria-expanded\', panel.open)','ariaControls' => 'edit-employment','ariaExpanded' => ''.e(old('edit_contract_id') ? 'true' : 'false').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'ml-auto','onclick' => 'const panel = document.getElementById(\'edit-employment\'); panel.open = !panel.open; this.setAttribute(\'aria-expanded\', panel.open)','aria-controls' => 'edit-employment','aria-expanded' => ''.e(old('edit_contract_id') ? 'true' : 'false').'']); ?>Edytuj umowę <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale36cdaaa17b72535ca0c67059982048f)): ?>
<?php $attributes = $__attributesOriginale36cdaaa17b72535ca0c67059982048f; ?>
<?php unset($__attributesOriginale36cdaaa17b72535ca0c67059982048f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale36cdaaa17b72535ca0c67059982048f)): ?>
<?php $component = $__componentOriginale36cdaaa17b72535ca0c67059982048f; ?>
<?php unset($__componentOriginale36cdaaa17b72535ca0c67059982048f); ?>
<?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($version->id === $employment->id && $employment->type === 'employment'): ?>
                    <details id="edit-employment" <?php if(old('edit_contract_id')): ?> open <?php endif; ?>>
                        <summary class="hidden">Edytuj umowę</summary>
                        <p class="mt-5 text-sm text-gray-500 dark:text-gray-400">Zapis tworzy kolejną wersję w historii. Zatwierdzone wypłaty i zapisane zestawienia pozostają bez zmian. Przy podwyżce ustaw datę rozpoczęcia nowych warunków.</p>
                        <?php echo $__env->make('admin.team.simple-employment-form',['editing'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </details>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\team\employment.blade.php ENDPATH**/ ?>