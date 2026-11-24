<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($row['contract']['type'] ?? '') === 'employment' && !$row['saved_at']): ?>
<details class="mt-6"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">🏢 Dane do szacowanego kosztu pracodawcy</summary>
    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Dla standardowego zatrudnienia w Polsce, bez FEP, szczególnych podstaw i wyłączeń składkowych. Podaj podstawę emerytalno-rentową od początku roku ze wszystkich tytułów, przed tym miesiącem. Ustal obowiązek FP/FS i FGŚP z uwzględnieniem wieku, zwolnień i innych tytułów.</p>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?><ul class="my-3 text-red-600"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></ul><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <form method="POST" action="<?php echo e(route('raport.payroll.cost-inputs', $user)); ?>" class="mt-4 grid gap-4 sm:grid-cols-2">
        <?php echo csrf_field(); ?><input type="hidden" name="month" value="<?php echo e($month->format('Y-m')); ?>">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['pension_base_before_month' => 'Podstawa emerytalno-rentowa przed miesiącem (zł)', 'accident_percent' => 'Składka wypadkowa (%)', 'ppk_percent' => 'PPK pracodawcy (%) — 0 przy braku obowiązku']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($help = match($field) {
            'pension_base_before_month' => 'Suma podstaw emerytalno-rentowych od początku roku do końca poprzedniego miesiąca, ze wszystkich tytułów. Uzyskaj ją z dokumentacji płacowej.',
            'accident_percent' => 'Stopa firmy obowiązująca w tym miesiącu. Sprawdź ją u księgowości, w ePłatniku lub zawiadomieniu ZUS; 1,67% nie dotyczy każdej firmy.',
            'ppk_percent' => 'Procent wpłaty finansowanej przez firmę, potwierdzony w dokumentacji PPK. To stawka do szacowania kosztu, nie kwota przekazana do instytucji.'
        }); ?>
        <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'cost-'.$field,'label' => $label,'help' => $help]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('cost-'.$field),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($help)]); ?>
            <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('cost-'.$field),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field),'type' => 'number','step' => '0.01','min' => '0','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old($field, $row['cost_input'][$field] ?? '')),'class' => 'payroll-input','aria-describedby' => 'cost-'.e($field).'-help']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e)): ?>
<?php $attributes = $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e; ?>
<?php unset($__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e)): ?>
<?php $component = $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e; ?>
<?php unset($__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11)): ?>
<?php $attributes = $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11; ?>
<?php unset($__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1cdddfb67f34dd053c454cb266bb8c11)): ?>
<?php $component = $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11; ?>
<?php unset($__componentOriginal1cdddfb67f34dd053c454cb266bb8c11); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['fp_fs' => 'FP i FS', 'fgsp' => 'FGŚP']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'cost-'.$field,'label' => $label,'help' => $field === 'fp_fs' ? 'Fundusz Pracy i Fundusz Solidarnościowy. Kadry potwierdzają obowiązek lub zwolnienie pracownika w tym miesiącu.' : 'Fundusz Gwarantowanych Świadczeń Pracowniczych. Księgowość ustala obowiązek firmy i zwolnienia pracownika; sprawdź osobno od FP/FS.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('cost-'.$field),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field === 'fp_fs' ? 'Fundusz Pracy i Fundusz Solidarnościowy. Kadry potwierdzają obowiązek lub zwolnienie pracownika w tym miesiącu.' : 'Fundusz Gwarantowanych Świadczeń Pracowniczych. Księgowość ustala obowiązek firmy i zwolnienia pracownika; sprawdź osobno od FP/FS.')]); ?>
            <select id="cost-<?php echo e($field); ?>" name="<?php echo e($field); ?>" required class="payroll-input" aria-describedby="cost-<?php echo e($field); ?>-help"><option value="">Wybierz obowiązek</option><option value="1" <?php if((string) old($field, $row['cost_input'][$field] ?? '') === '1'): echo 'selected'; endif; ?>>Należne</option><option value="0" <?php if((string) old($field, $row['cost_input'][$field] ?? '') === '0'): echo 'selected'; endif; ?>>Zwolnienie / brak obowiązku</option></select>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11)): ?>
<?php $attributes = $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11; ?>
<?php unset($__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1cdddfb67f34dd053c454cb266bb8c11)): ?>
<?php $component = $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11; ?>
<?php unset($__componentOriginal1cdddfb67f34dd053c454cb266bb8c11); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <label class="payroll-check sm:col-span-2"><input type="checkbox" name="standard_employment_confirmed" value="1" required><span>Potwierdzam standardowy zakres ubezpieczeń, brak FEP i szczególnych wyłączeń oraz sprawdzenie danych za ten miesiąc.</span></label>
        <div class="sm:col-span-2"><?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>💾 Zapisz dane kosztu <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?><p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Aktualizuje szacunek kosztu. Nie zapisuje wypłaty i nie oznacza miesiąca jako rozliczony.</p></div>
    </form>
</details>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\payroll\cost-inputs.blade.php ENDPATH**/ ?>