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
    <?php
        $company = $crm->company;

        /*
        |--------------------------------------------------------------------------
        | AI - klasyfikacja
        |--------------------------------------------------------------------------
        */

        $classificationData = match ($company->ai_classification) {
            'ideal' => [
                'label' => 'Idealny klient',
                'icon' => 'fa-solid fa-star',
                'color' => 'green',
            ],
            'potential' => [
                'label' => 'Potencjalny klient',
                'icon' => 'fa-solid fa-chart-simple',
                'color' => 'yellow',
            ],
            'weak' => [
                'label' => 'Słabe dopasowanie',
                'icon' => 'fa-solid fa-arrow-down',
                'color' => 'orange',
            ],
            'disqualified' => [
                'label' => 'Nie zakwalifikowany',
                'icon' => 'fa-solid fa-ban',
                'color' => 'red',
            ],
            'unknown' => [
                'label' => 'Brak danych',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
            default => [
                'label' => 'Nie sklasyfikowano',
                'icon' => 'fa-solid fa-circle-question',
                'color' => 'gray',
            ],
        };

        /*
        |--------------------------------------------------------------------------
        | AI - etap sprzedaży
        |--------------------------------------------------------------------------
        */

        $salesStageData = match ($crm->ai_sales_stage) {
            'unqualified' => [
                'label' => 'Niezakwalifikowany',
                'icon' => 'fa-solid fa-circle-question',
            ],
            'to_qualify' => [
                'label' => 'Do kwalifikacji',
                'icon' => 'fa-solid fa-filter',
            ],
            'qualified' => [
                'label' => 'Zakwalifikowany',
                'icon' => 'fa-solid fa-check',
            ],
            'offer' => [
                'label' => 'Oferta',
                'icon' => 'fa-solid fa-file-invoice',
            ],
            'negotiation' => [
                'label' => 'Negocjacje',
                'icon' => 'fa-solid fa-comments',
            ],
            'won' => [
                'label' => 'Wygrana',
                'icon' => 'fa-solid fa-trophy',
            ],
            'lost' => [
                'label' => 'Przegrana',
                'icon' => 'fa-solid fa-xmark',
            ],
            default => [
                'label' => 'Nie określono',
                'icon' => 'fa-solid fa-circle-question',
            ],
        };

        /*
        |--------------------------------------------------------------------------
        | AI - typ następnego kroku
        |--------------------------------------------------------------------------
        */

        $nextStepTypeData = match ($crm->ai_next_step_type) {
            'telefon' => [
                'label' => 'Telefon',
                'icon' => 'fa-solid fa-phone',
            ],
            'mail' => [
                'label' => 'E-mail',
                'icon' => 'fa-solid fa-envelope',
            ],
            'spotkanie' => [
                'label' => 'Spotkanie',
                'icon' => 'fa-solid fa-users',
            ],
            'oferta' => [
                'label' => 'Oferta',
                'icon' => 'fa-solid fa-file-invoice',
            ],
            'follow_up' => [
                'label' => 'Follow-up',
                'icon' => 'fa-solid fa-rotate',
            ],
            default => [
                'label' => 'Inne',
                'icon' => 'fa-solid fa-thumbtack',
            ],
        };

        /*
        |--------------------------------------------------------------------------
        | AI - pola JSON / tekst
        |--------------------------------------------------------------------------
        */

        $signals = $crm->ai_signals;

        if (is_string($signals)) {
            $signals = json_decode($signals, true) ?? [];
        }

        if (!is_array($signals)) {
            $signals = [];
        }

        $missingInformation = $crm->ai_missing_information;

        if (is_string($missingInformation)) {
            $missingInformation = json_decode($missingInformation, true) ?? [];
        }

        if (!is_array($missingInformation)) {
            $missingInformation = [];
        }

        // Puste wartości JSON i listy bez treści nie stanowią analizy do pokazania.
        $aiText = static function ($value) {
            if (is_string($value)) {
                $decoded = json_decode($value, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $value = $decoded;
                }
            }

            return is_string($value) || is_numeric($value) ? trim((string) $value) : '';
        };
        $signals = array_values(array_filter(array_map($aiText, $signals), fn ($value) => $value !== ''));
        $missingInformation = array_values(array_filter(array_map($aiText, $missingInformation), fn ($value) => $value !== ''));
        $aiAnalysis = $aiText($crm->ai_analysis);
        $hasAiAnalysis = $signals || $missingInformation || collect([
            $aiAnalysis, $crm->ai_problem, $crm->ai_value, $crm->ai_reason,
            $crm->ai_next_step, $crm->ai_sales_stage,
        ])->contains(fn ($value) => $aiText($value) !== '');
    ?>
    <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if (isset($component)) { $__componentOriginal6d34ed0eb01a1886d57455f1550df787 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6d34ed0eb01a1886d57455f1550df787 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main-no-filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main-no-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

        <?php if (isset($component)) { $__componentOriginal49b345aca39c685793a5b0b72a705588 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49b345aca39c685793a5b0b72a705588 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.setting.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49b345aca39c685793a5b0b72a705588)): ?>
<?php $attributes = $__attributesOriginal49b345aca39c685793a5b0b72a705588; ?>
<?php unset($__attributesOriginal49b345aca39c685793a5b0b72a705588); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b345aca39c685793a5b0b72a705588)): ?>
<?php $component = $__componentOriginal49b345aca39c685793a5b0b72a705588; ?>
<?php unset($__componentOriginal49b345aca39c685793a5b0b72a705588); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

            <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('setting.crm')).'','class' => 'text-lg mb-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.crm')).'','class' => 'text-lg mb-5']); ?>
                <i class="fa-solid fa-chevron-left mr-2"></i>
                Wróć
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


            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasAiAnalysis): ?>
            <div class="mb-4">
                <div class="flex items-center gap-3">

                    <div class="text-2xl">
                        🤖
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold dark:text-white">
                            Analiza AI
                        </h1>

                        <p class="text-sm text-gray-400 mt-1">
                            Podsumowanie aktywności i propozycja następnego kroku
                        </p>
                    </div>

                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


            <?php
                $datetimeStart = $crm->datetime_start
                    ? \Carbon\Carbon::parse($crm->datetime_start)
                    : null;

                $datetimeComplete = $crm->datetime_complete
                    ? \Carbon\Carbon::parse($crm->datetime_complete)
                    : null;

                $isCompleted = !is_null($crm->datetime_complete);
                $isOverdue = !$isCompleted && $datetimeStart && $datetimeStart->isPast();

                $typeData = match ($crm->type) {
                    'spotkanie' => ['icon' => 'fa-solid fa-users', 'label' => 'Spotkanie'],
                    'telefon' => ['icon' => 'fa-solid fa-phone', 'label' => 'Telefon'],
                    'mail' => ['icon' => 'fa-solid fa-envelope', 'label' => 'Mail'],
                    'follow_up' => ['icon' => 'fa-solid fa-rotate', 'label' => 'Follow-up'],
                    'oferta' => ['icon' => 'fa-solid fa-file-invoice', 'label' => 'Oferta'],
                    'inne' => ['icon' => 'fa-solid fa-thumbtack', 'label' => 'Inne'],
                    default => ['icon' => 'fa-solid fa-circle-question', 'label' => $crm->type],
                };
            ?>

            
            <div class="mb-4">

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

                    
                    <div
                        class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-transparent rounded-xl px-4 py-4">
                        <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                            Firma
                        </div>

                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 min-w-[40px] rounded-lg bg-gray-100 dark:bg-gray-600 flex items-center justify-center">
                                <i class="fa-solid fa-building text-gray-500 dark:text-gray-300"></i>
                            </div>

                            <div class="min-w-0">
                                <div class="font-semibold text-gray-900 dark:text-white truncate">
                                    <?php echo e($crm->company->name); ?>

                                </div>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->company->nip ?? false): ?>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        NIP: <?php echo e($crm->company->nip); ?>

                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    
                    <div
                        class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-transparent rounded-xl px-4 py-4">
                        <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                            Kontakt
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user): ?>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 min-w-[40px] rounded-full overflow-hidden bg-gray-100 dark:bg-gray-600 flex items-center justify-center">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user->profile_photo_url): ?>
                                        <img src="<?php echo e($crm->user->profile_photo_url); ?>" alt="<?php echo e($crm->user->name); ?>"
                                            class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <i class="fa-solid fa-user text-gray-500 dark:text-gray-300"></i>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="min-w-0">
                                    <div class="font-semibold text-gray-900 dark:text-white truncate">
                                        <?php echo e($crm->user->name); ?>

                                    </div>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->user->position): ?>
                                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">
                                            <?php echo e($crm->user->position); ?>

                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                <i class="fa-solid fa-user-slash"></i>
                                <span class="text-sm">Brak kontaktu</span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div
                        class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-transparent rounded-xl px-4 py-4">
                        <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                            Aktywność
                        </div>

                        <div class="flex flex-col items-start gap-2">

                            
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                    bg-gray-100 text-gray-700
                    dark:bg-gray-600 dark:text-gray-100
                    text-xs font-semibold whitespace-nowrap">
                                <i class="<?php echo e($typeData['icon']); ?>"></i>
                                <?php echo e($typeData['label']); ?>

                            </span>

                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCompleted): ?>
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                                bg-green-50 text-green-700
                                dark:bg-green-900/30 dark:text-green-300
                                text-xs font-semibold whitespace-nowrap">
                                        <i class="fa-solid fa-check"></i>
                                        Zrobione
                                    </span>
                            <?php elseif($isOverdue): ?>
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                                bg-red-50 text-red-700
                                dark:bg-red-900/30 dark:text-red-300
                                text-xs font-semibold whitespace-nowrap">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        Po terminie
                                    </span>
                            <?php else: ?>
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                                bg-yellow-50 text-yellow-700
                                dark:bg-yellow-900/30 dark:text-yellow-300
                                text-xs font-semibold whitespace-nowrap">
                                        <i class="fa-regular fa-clock"></i>
                                        Do zrobienia
                                    </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->important): ?>
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                                bg-red-50 text-red-700
                                dark:bg-red-900/30 dark:text-red-400
                                text-xs font-semibold whitespace-nowrap">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        Pilne
                                    </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        </div>
                    </div>

                    
                    <div
                        class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-transparent rounded-xl px-4 py-4">
                        <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                            Daty
                        </div>

                        <div class="space-y-2 text-xs">

                            
                            <div class="flex items-center justify-between gap-3">
                                <span class="text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    <i class="fa-regular fa-calendar mr-1"></i>
                                    Termin
                                </span>

                                <span class="font-semibold whitespace-nowrap
                        <?php echo e($isOverdue
    ? 'text-red-600 dark:text-red-400'
    : 'text-gray-900 dark:text-gray-100'); ?>">
                                    <?php echo e($datetimeStart?->format('d.m.Y H:i') ?? '—'); ?>

                                </span>
                            </div>

                            
                            <div class="flex items-center justify-between gap-3">
                                <span class="text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                    <i class="fa-solid fa-check mr-1"></i>
                                    Zrealizowano
                                </span>

                                <span class="font-semibold whitespace-nowrap
                        <?php echo e($datetimeComplete
    ? 'text-green-600 dark:text-green-400'
    : 'text-gray-400 dark:text-gray-500'); ?>">
                                    <?php echo e($datetimeComplete?->format('d.m.Y H:i') ?? '—'); ?>

                                </span>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-700 mb-4"></div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->plan): ?>
                
                <div class="mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-regular fa-calendar text-gray-500 dark:text-gray-400"></i>

                        <div class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Plan aktywności
                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-gray-700 rounded-xl px-5 py-4 border border-gray-200 dark:border-transparent border-l-4 border-l-gray-400">

                        <div class="text-start leading-6 text-gray-700 dark:text-gray-300">
                            <?php echo $crm->plan; ?>

                        </div>

                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div class="mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-check text-green-600 dark:text-green-400"></i>

                    <div class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Rezultat aktywności
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-700 rounded-xl px-5 py-4 border border-gray-200 dark:border-transparent border-l-4 border-l-green-500 dark:border-l-green-400">

                    <div class="text-start leading-6 text-gray-700 dark:text-gray-300">
                        <?php echo $crm->result; ?>

                    </div>

                </div>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasAiAnalysis): ?>
            <div id="ai-analysis">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($aiAnalysis !== ''): ?>
            <div class="mb-4">

                <div class="flex items-center gap-2 mb-2">

                    <i class="fa-solid fa-brain text-orange-500 dark:text-orange-400"></i>

                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Analiza AI
                    </span>

                </div>

                <div
                    class="bg-white dark:bg-gray-700 rounded-xl px-5 py-4 border border-gray-200 dark:border-transparent border-l-4 border-l-orange-500 dark:border-l-orange-400">

                    <p class="text-gray-800 dark:text-gray-200 leading-7">
                        <?php echo e($aiAnalysis); ?>

                    </p>

                </div>

            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-700 mb-4"></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            

<div class="mb-4">

    <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
        Ocena AI
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($classificationData['color'] === 'blue'): ?>

            <div class="relative overflow-hidden rounded-xl bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800/40 px-5 py-4">

                
                <div class="absolute -right-5 -bottom-7 text-8xl text-blue-500/10 dark:text-blue-400/10 pointer-events-none">
                    <i class="<?php echo e($classificationData['icon']); ?>"></i>
                </div>

                <div class="relative z-10">

                    <div class="text-xs uppercase tracking-wider mb-3 text-blue-700/70 dark:text-blue-300/70">
                        Klasyfikacja klienta
                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 min-w-[44px] rounded-lg bg-blue-100 dark:bg-blue-900/40 border border-blue-200 dark:border-blue-700/30 flex items-center justify-center">
                            <i class="<?php echo e($classificationData['icon']); ?> text-blue-600 dark:text-blue-300"></i>
                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold text-gray-900 dark:text-white">
                                <?php echo e($classificationData['label']); ?>

                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Aktualizacja:
                                    <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php elseif($classificationData['color'] === 'green'): ?>

            <div class="relative overflow-hidden rounded-xl bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800/40 px-5 py-4">

                
                <div class="absolute -right-5 -bottom-7 text-8xl text-green-500/10 dark:text-green-400/10 pointer-events-none">
                    <i class="<?php echo e($classificationData['icon']); ?>"></i>
                </div>

                <div class="relative z-10">

                    <div class="text-xs uppercase tracking-wider mb-3 text-green-700/70 dark:text-green-300/70">
                        Klasyfikacja klienta
                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 min-w-[44px] rounded-lg bg-green-100 dark:bg-green-900/40 border border-green-200 dark:border-green-700/30 flex items-center justify-center">
                            <i class="<?php echo e($classificationData['icon']); ?> text-green-600 dark:text-green-300"></i>
                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold text-gray-900 dark:text-white">
                                <?php echo e($classificationData['label']); ?>

                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Aktualizacja:
                                    <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php elseif($classificationData['color'] === 'red'): ?>

            <div class="relative overflow-hidden rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800/40 px-5 py-4">

                
                <div class="absolute -right-5 -bottom-7 text-8xl text-red-500/10 dark:text-red-400/10 pointer-events-none">
                    <i class="<?php echo e($classificationData['icon']); ?>"></i>
                </div>

                <div class="relative z-10">

                    <div class="text-xs uppercase tracking-wider mb-3 text-red-700/70 dark:text-red-300/70">
                        Klasyfikacja klienta
                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 min-w-[44px] rounded-lg bg-red-100 dark:bg-red-900/40 border border-red-200 dark:border-red-700/30 flex items-center justify-center">
                            <i class="<?php echo e($classificationData['icon']); ?> text-red-600 dark:text-red-300"></i>
                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold text-gray-900 dark:text-white">
                                <?php echo e($classificationData['label']); ?>

                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Aktualizacja:
                                    <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php elseif($classificationData['color'] === 'yellow'): ?>

            <div class="relative overflow-hidden rounded-xl bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800/40 px-5 py-4">

                
                <div class="absolute -right-5 -bottom-7 text-8xl text-yellow-500/10 dark:text-yellow-400/10 pointer-events-none">
                    <i class="<?php echo e($classificationData['icon']); ?>"></i>
                </div>

                <div class="relative z-10">

                    <div class="text-xs uppercase tracking-wider mb-3 text-yellow-700 dark:text-yellow-300/70">
                        Klasyfikacja klienta
                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 min-w-[44px] rounded-lg bg-yellow-100 dark:bg-yellow-900/40 border border-yellow-200 dark:border-yellow-700/30 flex items-center justify-center">
                            <i class="<?php echo e($classificationData['icon']); ?> text-yellow-700 dark:text-yellow-300"></i>
                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold text-gray-900 dark:text-white">
                                <?php echo e($classificationData['label']); ?>

                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Aktualizacja:
                                    <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php else: ?>

            
            <div class="relative overflow-hidden rounded-xl bg-gray-50 dark:bg-gray-700/40 border border-gray-200 dark:border-gray-600/40 px-5 py-4">

                
                <div class="absolute -right-5 -bottom-7 text-8xl text-gray-400/10 dark:text-gray-400/10 pointer-events-none">
                    <i class="<?php echo e($classificationData['icon']); ?>"></i>
                </div>

                <div class="relative z-10">

                    <div class="text-xs uppercase tracking-wider mb-3 text-gray-500 dark:text-gray-400">
                        Klasyfikacja klienta
                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 min-w-[44px] rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600/30 flex items-center justify-center">
                            <i class="<?php echo e($classificationData['icon']); ?> text-gray-600 dark:text-gray-300"></i>
                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold text-gray-900 dark:text-white">
                                <?php echo e($classificationData['label']); ?>

                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_updated_at): ?>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Aktualizacja:
                                    <?php echo e(\Carbon\Carbon::parse($company->ai_classification_updated_at)->format('d.m.Y H\:i')); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        

        <div class="relative overflow-hidden rounded-xl bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800/40 px-5 py-4">

            
            <div class="absolute -right-5 -bottom-7 text-8xl text-blue-500/10 dark:text-blue-400/10 pointer-events-none">
                <i class="<?php echo e($salesStageData['icon']); ?>"></i>
            </div>

            <div class="relative z-10">

                <div class="text-xs text-blue-700/70 dark:text-blue-300/70 uppercase tracking-wider mb-3">
                    Etap sprzedaży
                </div>

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 min-w-[44px] rounded-lg bg-blue-100 dark:bg-blue-900/40 border border-blue-200 dark:border-blue-700/30 flex items-center justify-center">
                        <i class="<?php echo e($salesStageData['icon']); ?> text-blue-600 dark:text-blue-300"></i>
                    </div>

                    <div class="min-w-0">

                        <div class="font-semibold text-gray-900 dark:text-white">
                            <?php echo e($salesStageData['label']); ?>

                        </div>

                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            <?php echo e($crm->ai_sales_stage ?: 'Brak danych'); ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company->ai_classification_reason): ?>
    <div class="mb-4">

        <div class="flex items-center gap-2 mb-2">

            <i class="fa-solid fa-brain text-orange-500 dark:text-orange-400"></i>

            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                Dlaczego taka klasyfikacja?
            </span>

        </div>

        <div class="bg-white dark:bg-gray-700 rounded-xl px-5 py-4 border border-gray-200 dark:border-transparent border-l-4 border-l-orange-500 dark:border-l-orange-400">

            <p class="text-gray-800 dark:text-gray-200 leading-7">
                <?php echo e($company->ai_classification_reason); ?>

            </p>

        </div>

    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <div class="border-t border-gray-200 dark:border-gray-700 mb-4"></div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->ai_problem || $crm->ai_value || true): ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->ai_problem): ?>
            <div class="relative overflow-hidden rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800/40 px-5 py-4">

                
                <div class="absolute -right-5 -bottom-7 text-8xl text-red-500/10 dark:text-red-400/10 pointer-events-none">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>

                <div class="relative z-10">

                    <div class="text-xs uppercase tracking-wider mb-3 text-red-700/70 dark:text-red-300/70">
                        Problem / potrzeba
                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 min-w-[44px] rounded-lg bg-red-100 dark:bg-red-900/40 border border-red-200 dark:border-red-700/30 flex items-center justify-center">
                            <i class="fa-solid fa-triangle-exclamation text-red-600 dark:text-red-300"></i>
                        </div>

                        <div class="min-w-0">
                            <div class="font-semibold text-gray-900 dark:text-white">
                                Problem / potrzeba
                            </div>

                            <div class="text-sm text-gray-700 dark:text-gray-300 leading-6 mt-1">
                                <?php echo e($crm->ai_problem); ?>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->ai_value): ?>
            <div class="relative overflow-hidden rounded-xl bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800/40 px-5 py-4">

                
                <div class="absolute -right-5 -bottom-7 text-8xl text-green-500/10 dark:text-green-400/10 pointer-events-none">
                    <i class="fa-solid fa-chart-line"></i>
                </div>

                <div class="relative z-10">

                    <div class="text-xs uppercase tracking-wider mb-3 text-green-700/70 dark:text-green-300/70">
                        Potencjalna wartość
                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 min-w-[44px] rounded-lg bg-green-100 dark:bg-green-900/40 border border-green-200 dark:border-green-700/30 flex items-center justify-center">
                            <i class="fa-solid fa-chart-line text-green-600 dark:text-green-300"></i>
                        </div>

                        <div class="min-w-0">
                            <div class="font-semibold text-gray-900 dark:text-white">
                                Potencjalna wartość
                            </div>

                            <div class="text-sm text-gray-700 dark:text-gray-300 leading-6 mt-1">
                                <?php echo e($crm->ai_value); ?>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <div class="relative overflow-hidden rounded-xl bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800/40 px-5 py-4">

            
            <div class="absolute -right-5 -bottom-7 text-8xl text-blue-500/10 dark:text-blue-400/10 pointer-events-none">
                <i class="fa-solid fa-bullseye"></i>
            </div>

            <div class="relative z-10">

                <div class="text-xs uppercase tracking-wider mb-3 text-blue-700/70 dark:text-blue-300/70">
                    Efekt
                </div>

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 min-w-[44px] rounded-lg bg-blue-100 dark:bg-blue-900/40 border border-blue-200 dark:border-blue-700/30 flex items-center justify-center">
                        <i class="fa-solid fa-bullseye text-blue-600 dark:text-blue-300"></i>
                    </div>

                    <div class="min-w-0">
                        <div class="font-semibold text-gray-900 dark:text-white">
                            Efekt
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 leading-6 mt-1">
                            Brak danych
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <div class="border-t border-gray-200 dark:border-gray-700 mb-4"></div>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($signals) || count($missingInformation)): ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($signals)): ?>
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-signal text-green-600 dark:text-green-400"></i>

                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Sygnały sprzedażowe
                    </span>
                </div>

                <div class="bg-white dark:bg-gray-700/80 border border-gray-200 dark:border-gray-600/50 rounded-xl p-4">
                    <div class="space-y-2">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $signals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-start gap-3 px-3 py-2.5 rounded-lg bg-gray-50 dark:bg-gray-600/30">
                                <i class="fa-solid fa-circle-check text-green-600 dark:text-green-400 mt-0.5"></i>

                                <span class="text-sm text-gray-700 dark:text-gray-300 leading-5">
                                    <?php echo e($signal); ?>

                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($missingInformation)): ?>
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-circle-question text-amber-600 dark:text-amber-400"></i>

                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Brakujące informacje
                    </span>
                </div>

                <div class="bg-white dark:bg-gray-700/80 border border-gray-200 dark:border-gray-600/50 rounded-xl p-4">
                    <div class="space-y-2">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $missingInformation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $information): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-start gap-3 px-3 py-2.5 rounded-lg bg-gray-50 dark:bg-gray-600/30">
                                <i class="fa-solid fa-circle-question text-amber-600 dark:text-amber-400 mt-0.5"></i>

                                <span class="text-sm text-gray-700 dark:text-gray-300 leading-5">
                                    <?php echo e($information); ?>

                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crm->ai_reason): ?>
    <div class="mb-4">

        <div class="flex items-center gap-2 mb-2">

            <i class="fa-solid fa-brain text-orange-500 dark:text-orange-400"></i>

            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                Uzasadnienie analizy
            </span>

        </div>

        <div class="bg-white dark:bg-gray-700 rounded-xl px-5 py-4 border border-gray-200 dark:border-transparent border-l-4 border-l-orange-500 dark:border-l-orange-400">

            <p class="text-gray-800 dark:text-gray-200 leading-7">
                <?php echo e($crm->ai_reason); ?>

            </p>

        </div>

    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


            
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form id="myForm" method="POST" action="<?php echo e(route('setting.crm.store')); ?>">

                <?php echo csrf_field(); ?>
                <input type="hidden" name="company" value="<?php echo e($crm->company->id); ?>">
                <input type="hidden" name="user" value="<?php echo e($crm->user->id); ?>">

                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">

                    <div class="mb-5">

                        <div class="flex items-center gap-2">

                            <i class="fa-solid fa-arrow-right text-green-400"></i>

                            <h2 class="text-lg font-semibold dark:text-white">
                                Następny krok
                            </h2>

                        </div>

                        <p class="text-sm text-gray-400 mt-1">
                            <?php echo e(filled($crm->ai_next_step)
                                ? 'Sprawdź propozycję AI i zdecyduj, co zrobić dalej.'
                                : 'Zaplanuj następny krok i zdecyduj, co zrobić dalej.'); ?>

                        </p>

                    </div>
                    <style>
                        @media (prefers-color-scheme: dark) {
                            .ts-dropdown .active {
                                background-color: rgb(75 85 99) !important;
                                color: #fff !important;
                            }

                            .ts-dropdown {
                                border: 1px solid rgb(75 85 99) !important;
                                border-radius: 0.5rem !important;
                            }

                            .option {
                                padding-left: 12px !important;
                            }

                            .ts-control {
                                background-color: rgb(55 65 81) !important;
                                border: 1px solid rgb(75 85 99) !important;
                                border-radius: 0.5rem !important;
                                min-height: 46px !important;
                                color: #fff !important;
                                font-size: 1.125rem !important;
                                line-height: 1.75rem !important;
                                padding-left: 12px !important;
                            }

                            .ts-control input {
                                color: #fff !important;
                                margin: auto 0 !important;
                                font-size: 1.125rem !important;
                                line-height: 1.75rem !important;
                            }

                            .item {
                                margin: auto 0 !important;
                            }
                        }
                    </style>
                    <div class="mt-2">
                        <div class="mb-4">
                            <label for="type"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                <span>🏷️</span> Typ
                            </label>
                            <select id="type" name="type" multiple autocomplete="off" placeholder="Wybierz typ"
                                class="mt-2 rounded-lg text-lg">
                                <option value="spotkanie" data-description="Spotkanie z klientem"
                                    <?php if($nextStepTypeData['label'] == "Spotkanie"): ?> selected <?php endif; ?>>
                                    👤 Spotkanie
                                </option>
                                <option value="telefon" data-description="Rozmowa telefoniczna z klientem"
                                    <?php if($nextStepTypeData['label'] == "Telefon"): ?> selected <?php endif; ?>>
                                    📱 Telefon
                                </option>
                                <option value="mail" data-description="Wiadomość e-mail do klienta"
                                    <?php if($nextStepTypeData['label'] == "E-mail"): ?> selected <?php endif; ?>>
                                    📧 E-mail
                                </option>
                                <option value="oferta" data-description="Przesłanie oferty do klienta"
                                    <?php if($nextStepTypeData['label'] == "Oferta"): ?> selected <?php endif; ?>>
                                    🛒 Oferta
                                </option>
                                <option value="follow_up" data-description="Follow up"
                                    <?php if($nextStepTypeData['label'] == "Follow-up"): ?> selected <?php endif; ?>>
                                    🔄 Follow up
                                </option>
                                <option value="inne" data-description="Inne" <?php if($nextStepTypeData['label'] == "Inne"): ?>
                                selected <?php endif; ?>>
                                    📌 Inne
                                </option>
                            </select>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                new TomSelect('#type', {
                                    maxItems: 1,
                                    render: {
                                        option: function (data, escape) {
                                            return `
                                        <div class="px-3 py-2 dark:bg-gray-700 dark:text-white">
                                            <div class="text-lg">
                                                ${escape(data.text)}
                                            </div>
                                            <div class="opacity-70 text-xs">
                                                ${escape(data.description || '')}
                                            </div>
                                        </div>
                                    `;
                                        },
                                        item: function (data, escape) {
                                            return `<div>${escape(data.text)}</div>`;
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                    <!--Typ-->
                    <label for="editor"
                        class="pb-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>📝</span> Notatka
                    </label>
                    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
                    <style>
                        #editor {
                            border: 0;
                        }

                        .ql-toolbar {
                            border: 0 !important;
                            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                            border-radius: 0.375rem;
                            overflow-y: auto;
                            padding: 8px 12px !important;
                            margin: 0 !important;
                            min-height: 46px !important;
                        }

                        .ql-editor {
                            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
                            padding: 8px 12px !important;
                            font-size: 1.125rem !important;
                            line-height: 1.75rem !important;
                            min-height: 46px !important;
                        }

                        @media (prefers-color-scheme: dark) {
                            .ql-toolbar {
                                background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                            }

                            .ql-editor {
                                background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                            }

                            .ql-editor.ql-blank::before {
                                color: #9ca3af;
                                /* Tailwind gray-400 */
                            }

                            .ql-toolbar {
                                background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
                            }

                            .ql-italic .ql-stroke {
                                stroke: white !important;
                            }

                            .ql-underline .ql-stroke {
                                stroke: white !important;
                            }

                            .ql-bold .ql-stroke {
                                stroke: white !important;
                            }

                            .ql-fill {
                                fill: white !important;
                            }

                            .ql-italic:hover .ql-stroke {
                                stroke: #9ca3af !important;
                            }

                            .ql-underline:hover .ql-stroke {
                                stroke: #9ca3af !important;
                            }

                            .ql-bold:hover .ql-stroke {
                                stroke: #9ca3af !important;
                            }

                            .ql-underline:hover .ql-fill {
                                fill: #9ca3af !important;
                            }
                        }
                    </style>
                    <div id="editor"
                        class="!my-4 bg-white dark:bg-gray-700 dark:text-white rounded-md h-64 overflow-y-auto">
                        <?php echo e(old('ai_next_step', $crm->ai_next_step)); ?>

                    </div>

                    <textarea id="editor-content" name="content"
                        style="display:none;"><?php echo e(old('ai_next_step', $crm->ai_next_step)); ?></textarea>
                    <script>
                        const quill = new Quill('#editor', {
                            theme: 'snow',
                            placeholder: '👈 Wpisz tutaj treść...',
                            modules: {
                                toolbar: [
                                    ['bold', 'italic', 'underline'],
                                ]
                            }
                        });
                        // Synchronizuj zawartość edytora z ukrytym polem tekstowym
                        document.getElementById('myForm').onsubmit = function () {
                            var editorContent = document.getElementById('editor-content');
                            editorContent.value = quill.root.innerHTML;
                        };
                    </script>
                    <div class="mb-4">
                        <label for="datetime_start"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                            Data rozpoczęcia</label>
                        <input type="text" id="datetime_start" name="datetime_start" value="<?php echo e(old(
    'datetime_start',
    $crm->ai_next_step_at
    ? \Carbon\Carbon::parse($crm->ai_next_step_at)->format('d.m.Y H:i')
    : ''
)); ?>" placeholder="DD.MM.YYYY HH:MM" required
                            class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['datetime_start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="datetime_end" class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                            Data
                            zakończenia</label>
                        <input type="text" id="datetime_end" name="datetime_end" value="<?php echo e(old(
    'datetime_end',
    $crm->ai_next_step_at
    ? \Carbon\Carbon::parse($crm->ai_next_step_at)->addHour()->format('d.m.Y H:i')
    : ''
)); ?>" placeholder="DD.MM.YYYY HH:MM" required
                            class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['datetime_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <script>
                        let startPicker;
                        let endPicker;

                        document.addEventListener('DOMContentLoaded', function () {

                            startPicker = flatpickr("#datetime_start", {
                                enableTime: true,
                                dateFormat: "d.m.Y H:i",
                                time_24hr: true,

                                onChange: function (selectedDates) {
                                    if (!selectedDates.length) return;

                                    let startDate = selectedDates[0];

                                    // 🔥 +1 godzina
                                    let endDate = new Date(startDate.getTime() + 60 * 60 * 1000);

                                    // ustaw w drugim pickerze
                                    endPicker.setDate(endDate);
                                }
                            });

                            endPicker = flatpickr("#datetime_end", {
                                enableTime: true,
                                dateFormat: "d.m.Y H:i",
                                time_24hr: true
                            });

                        });
                    </script>
                    
                    <div class="flex flex-col sm:flex-row gap-3">

                        <div class="flex justify-end mt-4">
                            <?php if (isset($component)) { $__componentOriginal881613893964646b4dfce1bd118c0fef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal881613893964646b4dfce1bd118c0fef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-green','data' => ['type' => 'submit','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'text-lg']); ?>
                                <i class="fa-solid fa-check mr-2"></i>
                                Zatwierdź następny krok
                             <?php echo $__env->renderComponent(); ?>
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
                    </div>

                </div>
            </form>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc)): ?>
<?php $attributes = $__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc; ?>
<?php unset($__attributesOriginaleb2cf2c6d60985109d6b19ee4f9605bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc)): ?>
<?php $component = $__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc; ?>
<?php unset($__componentOriginaleb2cf2c6d60985109d6b19ee4f9605bc); ?>
<?php endif; ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $attributes = $__attributesOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $component = $__componentOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__componentOriginal6d34ed0eb01a1886d57455f1550df787); ?>
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


<?php $__env->startPush('scripts'); ?>
    <script>

        flatpickr('#ai_next_step_at', {
            enableTime: true,
            time_24hr: true,
            dateFormat: 'd.m.Y H:i',
            locale: 'pl',
        });

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\crm\ai-analysis.blade.php ENDPATH**/ ?>