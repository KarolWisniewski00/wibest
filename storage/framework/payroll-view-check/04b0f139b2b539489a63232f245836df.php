<?php ($currentOpening = $openings->firstWhere('year', (int) $year)); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentOpening): ?>
    <aside role="note" class="relative overflow-hidden rounded-xl border border-green-200 bg-green-50 p-4 text-green-700 dark:border-green-800/40 dark:bg-green-900/20 dark:text-green-300">
        <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></div>
        <div class="relative flex items-center gap-3">
            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-700" aria-hidden="true">✅</div>
            <div><p class="text-xs uppercase tracking-wider opacity-70">Dane początkowe · <?php echo e($year); ?></p><p class="mt-1 font-semibold">Salda początkowe zapisane</p><p class="mt-2 text-sm">Historia od <?php echo e($currentOpening->starts_on); ?>. Kolejne wypłaty WIBEST dolicza automatycznie. Nie uzupełniaj sald ponownie w następnych miesiącach tego roku.</p></div>
        </div>
    </aside>
<?php else: ?>
<details class="payroll-card"><summary class="cursor-pointer font-semibold text-green-700 dark:text-green-300">📅 Dane początkowe roku — uzupełnij przed pierwszym rozliczeniem</summary>
    <aside role="note" aria-labelledby="opening-year-info" class="relative mt-4 overflow-hidden rounded-xl border border-blue-200 bg-blue-50 p-4 text-sm text-blue-700 dark:border-blue-800/40 dark:bg-blue-900/20 dark:text-blue-200">
        <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid fa-circle-info"></i></div>
        <div class="relative flex items-start gap-3">
            <span aria-hidden="true" class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 text-2xl dark:bg-gray-700">ℹ️</span>
            <div class="min-w-0 space-y-2">
                <p id="opening-year-info" class="font-semibold">Nowy rok — nowe salda początkowe 📅</p>
                <p>Jeżeli zaczynasz historię od <strong>1 stycznia 2027</strong>, ustaw tę datę i wpisz <strong>0 zł we wszystkich polach sald</strong>: przed tą datą nie było jeszcze kwot z 2027 roku. Nie przepisuj sum z 2026 roku. Potwierdź także wartości zerowe.</p>
                <p>Od tej daty uwzględnij wszystkie wypłaty styczniowe. <strong>Wynagrodzenie za grudzień wypłacone w styczniu</strong> należy do historii wypłat nowego roku. Jeśli styczniową wypłatę rozliczono już poza WIBEST, samo wpisanie zer nie uzupełni tej historii — potrzebne jest jej odrębne uwzględnienie.</p>
                <p>Salda ustalasz osobno dla każdego pracownika i roku, przed pierwszym rozliczeniem. Przy rozpoczęciu historii w późniejszym miesiącu wpisujesz wcześniejsze kwoty z tego samego roku.</p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!config('payroll_net.2027')): ?>
                    <p class="border-t border-blue-200 pt-2 dark:border-blue-800"><strong>Dostępność 2027:</strong> ten przykład wyjaśnia sposób uzupełnienia sald. Zapis danych i obliczenia dla 2027 roku wymagają najpierw dodania parametrów płacowych na ten rok.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </aside>
    <p class="mt-3 text-sm">To bilans sprzed rozpoczęcia naliczania w WIBEST. Przykład: zaczynasz od lipca — wpisujesz odpowiednie sumy od stycznia do czerwca, aby system wiedział, ile limitów już wykorzystano. Nie wpisujesz tu pensji z umowy ani kwoty netto.</p>
    <p class="mt-3 text-sm">Dochód PIT dotyczy tej firmy; podstawa limitu ZUS i wspólny limit PIT-0 mogą obejmować także inne miejsca pracy. Zera wpisz tylko wtedy, gdy rzeczywiście nie było wcześniejszych kwot. Kolejnych wypłat zapisanych w WIBEST nie dodawaj ponownie.</p>
    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Kolejne zatwierdzone wypłaty WIBEST zlicza automatycznie według daty wypłaty. Salda wpisz raz, przed pierwszą wypłatą miesiąca. Potwierdź także wartości zerowe.</p>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $openings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><p class="mt-3 text-sm"><?php echo e($opening->year); ?> · historia od <?php echo e($opening->starts_on); ?> · dochód płatnika <?php echo e(\App\Services\Payroll\Money::display($opening->payer_income_cents)); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <form method="POST" action="<?php echo e(route('raport.payroll.opening',$user)); ?>" class="mt-4 grid gap-5 sm:grid-cols-2"><?php echo csrf_field(); ?>
        <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'starts-on','label' => 'Historia od','help' => 'Pierwszy dzień miesiąca, od którego prowadzisz historię wypłat w WIBEST. Wcześniejsze salda obejmują tylko ten sam rok.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'starts-on','label' => 'Historia od','help' => 'Pierwszy dzień miesiąca, od którego prowadzisz historię wypłat w WIBEST. Wcześniejsze salda obejmują tylko ten sam rok.']); ?>
            <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'starts-on','name' => 'starts_on','type' => 'date','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('starts_on')),'class' => 'payroll-input','aria-describedby' => 'starts-on-help']); ?>
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
            'payer_income' => ['Dochód PIT u tej firmy (zł)', 'Wcześniejszy dochód podatkowy u tego pracodawcy. Przepisz z dokumentacji płacowej — nie jest to suma brutto ani przelewów netto.'],
            'pension_base' => ['Podstawa emerytalno-rentowa (zł)', 'Wcześniejsze podstawy ze wszystkich tytułów, także innych miejsc pracy. Służą do sprawdzenia rocznego limitu składek. Dane potwierdź z kadrami.'],
            'health_legacy_income' => ['Dochód do limitu zdrowotnej według zasad 2021 (zł)', 'Pomocniczy dochód do ograniczenia składki zdrowotnej. Wartość uzyskaj z wcześniejszych naliczeń lub księgowości; nie wpisuj tu dochodu z 2021 roku.'],
            'exempt_revenue' => ['Wykorzystany wspólny limit PIT-0 (zł)', 'Wcześniejsze przychody objęte wspólnym limitem zwolnień PIT-0, także u innych płatników. Jeśli limit nie był wykorzystany, wpisz 0.']
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => [$label, $help]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => $key,'label' => $label,'help' => $help]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($help)]); ?>
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'type' => 'number','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'step' => '0.01','min' => '0','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old($key)),'class' => 'payroll-input','aria-describedby' => ''.e($key).'-help']); ?>
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
        <label class="payroll-check sm:col-span-2"><input name="opening_confirmed" type="checkbox" value="1" required><span>Potwierdzam kompletność sald i brak pominiętych wypłat bieżącego miesiąca. Zapis ustala punkt startowy dla tego pracownika i roku.</span></label>
        <div class="sm:col-span-2"><?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>💾 Zapisz dane początkowe <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?><p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Zapisujesz historię początkową. Miesiąc rozliczysz osobno po obliczeniu wypłaty.</p></div>
    </form>
</details>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\payroll\opening-balances.blade.php ENDPATH**/ ?>