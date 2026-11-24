<?php if (isset($component)) { $__componentOriginal3ac47c1cda82552532530fdeb1df9ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ac47c1cda82552532530fdeb1df9ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.team-info-card','data' => ['class' => 'payroll-card payroll-payment-form']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('team-info-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'payroll-card payroll-payment-form']); ?>
    <div><h2>🧮 Dane do wypłaty</h2><p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-400">Oblicz podgląd przed zapisaniem. Brutto domyślnie obejmuje pozostałą do rozliczenia część miesiąca.</p></div>
    <form method="POST" action="<?php echo e(route('raport.payroll.net.preview', $user)); ?>#payment-preview" class="space-y-6">
        <?php echo csrf_field(); ?>
        <fieldset class="grid gap-5 sm:grid-cols-2">
            <legend class="mb-4 font-semibold">📅 Okres i kwota</legend>
            <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'payment-period','label' => 'Okres wynagrodzenia','help' => 'Miesiąc, za który płacisz pracownikowi, np. październik. Nie musi być miesiącem przelewu.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'payment-period','label' => 'Okres wynagrodzenia','help' => 'Miesiąc, za który płacisz pracownikowi, np. październik. Nie musi być miesiącem przelewu.']); ?>
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'payment-period','type' => 'month','name' => 'period','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('period', $period)),'class' => 'payroll-input','aria-describedby' => 'payment-period-help']); ?>
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
            <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'paid-on','label' => 'Data wypłaty','help' => 'Dzień wypłaty decyduje o roku i miesiącu naliczeń. Przyszła data pozwala wyłącznie na symulację.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'paid-on','label' => 'Data wypłaty','help' => 'Dzień wypłaty decyduje o roku i miesiącu naliczeń. Przyszła data pozwala wyłącznie na symulację.']); ?>
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'paid-on','type' => 'date','name' => 'paid_on','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('paid_on', $input['paid_on'] ?? now('Europe/Warsaw')->toDateString())),'class' => 'payroll-input','aria-describedby' => 'paid-on-help']); ?>
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
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($row['target_net'])): ?>
                <input type="hidden" name="gross" value="0">
                <p class="payroll-help sm:col-span-2">ℹ️ Umowa netto: <strong><?php echo e(\App\Services\Payroll\Money::display($row['target_net'])); ?></strong> za okres. System obliczy potrzebne brutto.</p>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'gross','label' => 'Brutto pieniężne tej wypłaty (zł)','help' => 'Kwota przed potrąceniem składek i podatku. Możesz rozliczyć część kwoty; miesiąc będzie rozliczony w całości dopiero po zapisaniu całego brutto.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'gross','label' => 'Brutto pieniężne tej wypłaty (zł)','help' => 'Kwota przed potrąceniem składek i podatku. Możesz rozliczyć część kwoty; miesiąc będzie rozliczony w całości dopiero po zapisaniu całego brutto.']); ?>
                    <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'gross','type' => 'number','step' => '0.01','min' => '0','max' => '99999999.99','name' => 'gross','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('gross', $input['gross'])),'class' => 'payroll-input','aria-describedby' => 'gross-help']); ?>
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
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </fieldset>
        <hr>
        <fieldset class="grid gap-5 border-t border-gray-200 pt-6 dark:border-gray-700 sm:grid-cols-2">
            <legend class="font-semibold">🎁 Dodatkowe składniki</legend>
            <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'benefit','label' => 'Świadczenia niepieniężne (zł)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'benefit','label' => 'Świadczenia niepieniężne (zł)']); ?>
                 <?php $__env->slot('help', null, []); ?> Wartość korzyści otrzymanej zamiast pieniędzy, którą w tym przypadku trzeba w całości objąć składkami i PIT. Wpisanie 100 zł zwiększa podstawy naliczania, ale nie dodaje 100 zł do przelewu pracownika. Jeżeli świadczenie jest zwolnione z części składek lub podatku, to pole nie służy do jego rozliczenia. Gdy nie ma świadczeń, wpisz 0. <?php $__env->endSlot(); ?>
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'benefit','type' => 'number','step' => '0.01','min' => '0','max' => '99999999.99','name' => 'benefit','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('benefit', $input['benefit'])),'class' => 'payroll-input','aria-describedby' => 'benefit-help']); ?>
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
            <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'ppk-transferred','label' => 'Przekazane wpłaty PPK pracodawcy (zł)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'ppk-transferred','label' => 'Przekazane wpłaty PPK pracodawcy (zł)']); ?>
                 <?php $__env->slot('help', null, []); ?> Kwota finansowana przez firmę, która faktycznie trafiła do PPK w miesiącu wypłaty, najpóźniej w dniu tej wypłaty, i nie została jeszcze uwzględniona w podatku. Np. przekazane 90 zł wpisz jako 90, nie jako procent. To przychód do PIT, a nie gotówka dla pracownika. Samo naliczenie wpłaty nie wystarcza. Jeśli takich przekazanych kwot nie ma, wpisz 0. <?php $__env->endSlot(); ?>
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'ppk-transferred','type' => 'number','step' => '0.01','min' => '0','max' => '99999999.99','name' => 'ppk_transferred','required' => true,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('ppk_transferred', $input['ppk_transferred'])),'class' => 'payroll-input','aria-describedby' => 'ppk-transferred-help']); ?>
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
        </fieldset>
        <hr>
        <fieldset class="grid gap-5 border-t border-gray-200 pt-6 dark:border-gray-700 sm:grid-cols-2">
            <legend class="font-semibold">🏢 Koszt pracodawcy</legend>
            <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-400 sm:col-span-2">Te dane pozwalają obliczyć koszt firmy ponad wynagrodzenie brutto. Uzyskasz je od kadr lub księgowości. Bez potwierdzonych danych koszt będzie oznaczony jako wymagający uzupełnienia. Zapisana stawka wypadkowa firmy ma pierwszeństwo.</p>
            <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'accident-percent','label' => 'Wypadkowa (%)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'accident-percent','label' => 'Wypadkowa (%)']); ?>
                 <?php $__env->slot('help', null, []); ?> To składka na ubezpieczenie od wypadków przy pracy i chorób zawodowych, finansowana przez pracodawcę. Poproś księgowość o stopę procentową firmy obowiązującą w miesiącu wypłaty. Możesz ją sprawdzić w kartotece płatnika w ePłatniku lub w zawiadomieniu ZUS w eZUS, jeżeli ZUS ustala ją dla firmy. W pozostałych przypadkach ustala ją płatnik według zasad ZUS. Rok składkowy trwa od kwietnia do marca, więc sprawdź okres obowiązywania. Wpisujesz procent, np. 1,67, tylko jeśli taka stawka dotyczy firmy — nie kwotę w złotych. <a href="https://www.zus.pl/portal/pomoc/stopa_procentowa_sk3adki_na_ub.html" class="underline">Informacja ZUS o stawce w ePłatniku</a>. <?php $__env->endSlot(); ?>
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'accident-percent','type' => 'number','name' => 'accident_percent','min' => '0.01','max' => '10','step' => '0.01','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('accident_percent', $input['accident_percent'] ?? '')),'class' => 'payroll-input','aria-describedby' => 'accident-percent-help']); ?>
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
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['fp_fs' => ['FP i FS', 'Fundusz Pracy i Fundusz Solidarnościowy. Kadry potwierdzają obowiązek lub zwolnienie dla tego pracownika i miesiąca.'], 'fgsp' => ['FGŚP', 'Fundusz Gwarantowanych Świadczeń Pracowniczych. Sprawdź obowiązek firmy i zwolnienia pracownika osobno od FP/FS.']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => [$label, $help]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => $key,'label' => $label]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label)]); ?>
                     <?php $__env->slot('help', null, []); ?> 
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key === 'fp_fs'): ?>
                            Fundusz Pracy i Fundusz Solidarnościowy to fundusze finansowane ze składek pracodawcy. W tym polu nie wpisujesz kwoty ani procentu: wybierasz, czy składki są należne za konkretnego pracownika w miesiącu wypłaty. Poproś kadry lub księgowość o potwierdzenie na podstawie dokumentacji płacowej, podstaw składek i przysługujących zwolnień, np. związanych z wiekiem lub powrotem z urlopu rodzicielskiego. „Należne” oznacza naliczenie składek, a „Zwolnienie / nie dotyczy” — ich pominięcie. Brak wiedzy nie oznacza zwolnienia. <a href="https://www.zus.pl/pracujacy/fundusze-pozaubezpieczeniowe/fp" class="underline">Zasady ZUS dotyczące Funduszu Pracy</a>.
                        <?php else: ?>
                            Fundusz Gwarantowanych Świadczeń Pracowniczych służy ochronie należności pracowników w razie niewypłacalności pracodawcy. Składkę finansuje firma. Kadry lub księgowość powinny potwierdzić, czy firma podlega temu obowiązkowi i czy pracownik nie korzysta ze zwolnienia w miesiącu wypłaty. Na tej podstawie wybierz „Należne” albo „Zwolnienie / nie dotyczy”. Sprawdź FGŚP osobno — nie kopiuj automatycznie wyboru z FP i FS. <a href="https://www.zus.pl/pl/pracujacy/fundusze-pozaubezpieczeniowe/fgsp" class="underline">Obowiązek i zwolnienia według ZUS</a>.
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                     <?php $__env->endSlot(); ?>
                    <select id="<?php echo e($key); ?>" name="<?php echo e($key); ?>" class="payroll-input" aria-describedby="<?php echo e($key); ?>-help"><option value="">Wybierz</option><option value="1" <?php if((string)old($key,$input[$key] ?? '') === '1'): echo 'selected'; endif; ?>>Należne</option><option value="0" <?php if((string)old($key,$input[$key] ?? '') === '0'): echo 'selected'; endif; ?>>Zwolnienie / nie dotyczy</option></select>
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
            <label class="payroll-check sm:col-span-2"><input type="checkbox" name="employer_confirmed" value="1" <?php if(old('employer_confirmed',$input['employer_confirmed'] ?? false)): echo 'checked'; endif; ?>><span>Potwierdzam dane kosztu firmy: standardowe podstawy składek, brak FEP i szczególnych wyłączeń oraz właściwe zwolnienia FP/FGŚP.</span></label>
        </fieldset>
        <hr>
        <section class="space-y-4">
            <h3 class="font-semibold">🩺 Niska wypłata — ograniczenie składki zdrowotnej</h3>
            <?php if (isset($component)) { $__componentOriginal1cdddfb67f34dd053c454cb266bb8c11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cdddfb67f34dd053c454cb266bb8c11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.field','data' => ['id' => 'health-legacy','label' => 'Pomniejszenie hipotetycznej zaliczki według zasad 2021']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'health-legacy','label' => 'Pomniejszenie hipotetycznej zaliczki według zasad 2021']); ?>
                 <?php $__env->slot('help', null, []); ?> Pomocnicze wyliczenie do ustalenia maksymalnej składki zdrowotnej przy niskiej wypłacie. Nie oznacza liczenia obecnego PIT według dawnych przepisów. 43,76 zł to historyczne miesięczne pomniejszenie — stosowane tylko wtedy, gdy ten płatnik jest do niego uprawniony. Nie jest to dodatkowe 43,76 zł wypłacane pracownikowi ani obecne PIT-2 300 zł. <?php $__env->endSlot(); ?>
                <select id="health-legacy" name="health_legacy_reduction_cents" class="payroll-input" aria-describedby="health-legacy-help"><option value="">Pozostaw zapisane ustawienie</option><option value="0" <?php if((string)old('health_legacy_reduction_cents',$input['health_legacy_reduction_cents'] ?? '') === '0'): echo 'selected'; endif; ?>>0 zł — ten płatnik nie stosuje</option><option value="4376" <?php if((string)old('health_legacy_reduction_cents',$input['health_legacy_reduction_cents'] ?? '') === '4376'): echo 'selected'; endif; ?>>43,76 zł — ten płatnik jest uprawniony</option></select>
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
        </section>
        <hr>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($settings->first()?->ppk_employee_bp ?? 0) === 50): ?>
            <label class="payroll-check"><input type="checkbox" name="reduced_ppk_month_confirmed" value="1" required <?php if(old('reduced_ppk_month_confirmed', $input['reduced_ppk_month_confirmed'] ?? false)): echo 'checked'; endif; ?>><span>Potwierdzam uprawnienie do PPK 0,5%: łączne przychody ze wszystkich źródeł mieszczą się w limicie miesiąca wypłaty, także po przeliczeniu części miesiąca.</span></label>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal41595d92f85677e129a69e772b72c353 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal41595d92f85677e129a69e772b72c353 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payroll.info','data' => ['title' => 'Zakres rozliczenia']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payroll.info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Zakres rozliczenia']); ?>Formularz obsługuje standardową wypłatę z umowy o pracę. Świadczenia chorobowe, zasiłki, potrącenia komornicze, 50% KUP i szczególne podstawy wymagają odrębnego rozliczenia. <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal41595d92f85677e129a69e772b72c353)): ?>
<?php $attributes = $__attributesOriginal41595d92f85677e129a69e772b72c353; ?>
<?php unset($__attributesOriginal41595d92f85677e129a69e772b72c353); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41595d92f85677e129a69e772b72c353)): ?>
<?php $component = $__componentOriginal41595d92f85677e129a69e772b72c353; ?>
<?php unset($__componentOriginal41595d92f85677e129a69e772b72c353); ?>
<?php endif; ?>
        <label class="payroll-check"><input name="scope_confirmed" type="checkbox" value="1" required <?php if(old('scope_confirmed', $input['scope_confirmed'] ?? false)): echo 'checked'; endif; ?>><span>Potwierdzam standardowe zasady wskazanych składników. PPK pracodawcy wpisano według przekazania do instytucji, a nie samego naliczenia.</span></label>
        <div class="flex flex-wrap items-center gap-4"><?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>🧮 Oblicz wypłatę <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $attributes = $__attributesOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__attributesOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal881613893964646b4dfce1bd118c0fef)): ?>
<?php $component = $__componentOriginal881613893964646b4dfce1bd118c0fef; ?>
<?php unset($__componentOriginal881613893964646b4dfce1bd118c0fef); ?>
<?php endif; ?><p class="text-sm text-gray-600 dark:text-gray-400">Zobaczysz podgląd. Ten krok jeszcze nie zapisuje rozliczenia.</p></div>
    </form>
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
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\payroll\payment-form.blade.php ENDPATH**/ ?>