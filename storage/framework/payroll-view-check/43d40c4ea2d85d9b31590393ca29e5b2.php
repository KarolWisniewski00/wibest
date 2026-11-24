<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12 pt-48">
        <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--WIDGET TASK-->
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('invoice')).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice')).'','class' => 'text-lg']); ?>
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Faktur
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
                    <!--POWRÓT-->

                    <!--TYTUŁ-->
                    <div class="hidden md:flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Podgląd faktury
                        </h1>
                    </div>
                    <!--TYTUŁ-->

                    <!--A4-->
                    <?php if (isset($component)) { $__componentOriginal6f8d14629f4da4fb6e764d165a83ce97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6f8d14629f4da4fb6e764d165a83ce97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.a4','data' => ['src' => ''.e(route('invoice.show.file', $invoice_obj)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('a4'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => ''.e(route('invoice.show.file', $invoice_obj)).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6f8d14629f4da4fb6e764d165a83ce97)): ?>
<?php $attributes = $__attributesOriginal6f8d14629f4da4fb6e764d165a83ce97; ?>
<?php unset($__attributesOriginal6f8d14629f4da4fb6e764d165a83ce97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6f8d14629f4da4fb6e764d165a83ce97)): ?>
<?php $component = $__componentOriginal6f8d14629f4da4fb6e764d165a83ce97; ?>
<?php unset($__componentOriginal6f8d14629f4da4fb6e764d165a83ce97); ?>
<?php endif; ?>
                    <!--A4-->

                    <!--PRZYCISKI POD A4-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- EDYTUJ -->
                        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('invoice.edit', $invoice)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.edit', $invoice)).'']); ?>
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
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
                        <!--EDYTUJ-->

                        <!--USUŃ-->
                        <form action="<?php echo e(route('invoice.delete', $invoice)); ?>" method="POST"
                            onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <?php if (isset($component)) { $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-red','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $attributes = $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $component = $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
                        </form>
                        <!--USUŃ-->
                    </div>
                    <div class="mt-8 flex justify-end items-center space-x-4">
                        <!-- Utwórz Fakturę Sprzedaży -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj['invoice_type'] == 'faktura proforma'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->invoice_id == null): ?>
                        <?php if (isset($component)) { $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-green','data' => ['href' => ''.e(route('invoice.store.from', $invoice_obj)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.store.from', $invoice_obj)).'']); ?>
                            <i class="fa-solid fa-file-invoice-dollar mr-2"></i>Utwórz Fakturę Sprzedaży
                         <?php echo $__env->renderComponent(); ?>
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
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <!-- Utwórz Fakturę Sprzedaży -->

                        <!-- Wyślij Fakturę do Klienta -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null): ?>
                        <?php if (isset($component)) { $__componentOriginal7931f85c37d345e4d89919ba1482a252 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7931f85c37d345e4d89919ba1482a252 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-orange','data' => ['href' => ''.e(route('invoice.send', $invoice_obj)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.send', $invoice_obj)).'']); ?>
                            <i class="fa-solid fa-paper-plane mr-2"></i>Wyślij Fakturę
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
                        <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginalff02ffe014354d25747fc442bb250590 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff02ffe014354d25747fc442bb250590 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-disabled','data' => ['type' => 'button','disabled' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-disabled'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','disabled' => true]); ?>
                            <i class="fa-solid fa-paper-plane mr-2"></i>Brak adresu e-mail
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff02ffe014354d25747fc442bb250590)): ?>
<?php $attributes = $__attributesOriginalff02ffe014354d25747fc442bb250590; ?>
<?php unset($__attributesOriginalff02ffe014354d25747fc442bb250590); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff02ffe014354d25747fc442bb250590)): ?>
<?php $component = $__componentOriginalff02ffe014354d25747fc442bb250590; ?>
<?php unset($__componentOriginalff02ffe014354d25747fc442bb250590); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <!-- Wyślij Fakturę do Klienta -->

                        <!-- Pobierz PDF -->
                        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('invoice.download', $invoice_obj)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.download', $invoice_obj)).'']); ?>
                            <i class="fa-solid fa-file-pdf mr-2"></i>Pobierz PDF
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
                        <!-- Pobierz PDF -->
                    </div>
                    <!--PRZYCISKI POD A4-->

                    <!--ALERT-->
                    <div class="my-8 hidden md:flex justify-end items-center space-x-4 w-full">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null): ?>
                        <?php else: ?>
                        <div class="relative mt-2 bg-yellow-100 border border-yellow-300 text-yellow-900 rounded-lg p-4 w-full flex items-center justify-between" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-light-label">
                            <div class="flex items-center justify-start">
                                <span id="hs-soft-color-light-label" class="font-bold text-sm md:text-base">
                                    <i class="fa-solid fa-exclamation-triangle mr-2"></i>Uwaga klient nie ma adresu email
                                </span>
                                <p class="text-sm md:text-base text-gray-900 dark:text-gray-50 font-semibold text-start">
                                    <a href="<?php echo e(route('client.edit', $invoice_obj->client)); ?>" class="text-yellow-900 dark:text-yellow-800 hover:underline">
                                        <span>, kliknij aby dodać adres email</span>
                                    </a>
                                </p>
                            </div>
                            <button id="close-alert" class="ml-4 text-yellow-900 hover:text-yellow-700 focus:outline-none">
                                <i class="fa-solid fa-times"></i>
                            </button>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#close-alert').click(function() {
                                $(this).closest('div[role="alert"]').fadeOut();
                            });
                        });
                    </script>
                    <!--ALERT-->

                    <!--POWRÓT-->
                    <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('invoice')).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice')).'','class' => 'text-lg']); ?>
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do listy Faktur
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
                    <!--POWRÓT-->

                    <!--GŁOWA-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <!--NUMER-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Numer
                                </p>
                                <?php if (isset($component)) { $__componentOriginalb3309cdd48f422afdad7f11bf42b86d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-label','data' => ['invoice' => $invoice_obj]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['invoice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invoice_obj)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6)): ?>
<?php $attributes = $__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6; ?>
<?php unset($__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3309cdd48f422afdad7f11bf42b86d6)): ?>
<?php $component = $__componentOriginalb3309cdd48f422afdad7f11bf42b86d6; ?>
<?php unset($__componentOriginalb3309cdd48f422afdad7f11bf42b86d6); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--NUMER-->

                            <!--TYP-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Typ
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->invoice_type); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--TYP-->

                            <!--DATY-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Data wystawienia
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->issue_date); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Data sprzedaży
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->sale_date); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--DATY-->

                            <!--PŁATNOŚCI-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Termin płatności
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->due_date); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Metoda płatności
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->payment_method); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--PŁATNOŚCI-->
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                    </div>
                    <!--NUMER PŁATNOŚCI DATY i TYP-->

                    <!--BODY-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <!--SPRZEDAJĄCY-->
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <!--NAZWA-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <?php if (isset($component)) { $__componentOriginal4678d95cf11a514277943c24d379ed0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4678d95cf11a514277943c24d379ed0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-link-company','data' => ['href' => ''.e(route('setting')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-link-company'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting')).'']); ?>
                                        <?php echo e($invoice_obj->seller_name); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $attributes = $__attributesOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__attributesOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $component = $__componentOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__componentOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--NAZWA-->

                            <!--ADRES-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Adres sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->seller_adress); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--ADRES-->

                            <!--NIP-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    NIP sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->seller_tax_id); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--NIP-->

                            <!--BANK-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Numer konta sprzedającego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->seller_bank); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--BANK-->
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                        <!--SPRZEDAJĄCY-->

                        <!--KUPUJĄCY-->
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <!--NAZWA-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Nazwa kupującego
                                </p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->client): ?>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <?php if (isset($component)) { $__componentOriginal4678d95cf11a514277943c24d379ed0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4678d95cf11a514277943c24d379ed0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-link-company','data' => ['href' => ''.e(route('client.show', $invoice->client_id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-link-company'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('client.show', $invoice->client_id)).'']); ?>
                                        <?php echo e($invoice_obj->buyer_name); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $attributes = $__attributesOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__attributesOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4678d95cf11a514277943c24d379ed0e)): ?>
<?php $component = $__componentOriginal4678d95cf11a514277943c24d379ed0e; ?>
<?php unset($__componentOriginal4678d95cf11a514277943c24d379ed0e); ?>
<?php endif; ?>
                                </p>
                                <?php else: ?>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->buyer_name); ?>

                                </p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--NAZWA-->

                            <!--ADRES-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    Adres kupującego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->buyer_adress); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--ADRES-->

                            <!--NIP-->
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-700 dark:text-gray-300 test-sm">
                                    NIP kupującego
                                </p>
                                <p class="text-sm md:text-xl text-gray-700 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->buyer_tax_id); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <!--NIP-->
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                        <!--KUPUJĄCY-->

                        <!--POZYCJE-->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $invoiceItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->product_id != null): ?>
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'col-span-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-span-2']); ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                    <a href="<?php echo e(route('product.show', $item->product)); ?>" class="text-blue-600 dark:text-blue-400 hover:underline text-sm md:text-xl font-semibold"><?php echo e($item->name); ?></a>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT <?php echo e($item->vat_amount); ?></h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm"><?php echo e($invoice_obj->subtotal); ?> PLN</p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end"><?php echo e($invoice_obj->total); ?> PLN</p>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                        <?php elseif($item->service_id != null): ?>
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'col-span-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-span-2']); ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                    <a href="<?php echo e(route('service.show', $item->service)); ?>" class="text-blue-600 dark:text-blue-400 hover:underline text-sm md:text-xl font-semibold"><?php echo e($item->name); ?></a>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT <?php echo e($item->vat_amount); ?></h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm"><?php echo e($invoice_obj->subtotal); ?> PLN</p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end"><?php echo e($invoice_obj->total); ?> PLN</p>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                        <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'col-span-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-span-2']); ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <div class="col-span-2 grid grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold"><?php echo e($item->name); ?></h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm text-end">VAT <?php echo e($item->vat_amount); ?></h2>
                                    <p class="text-gray-600 dark:text-gray-300 test-sm"><?php echo e($invoice_obj->subtotal); ?> PLN</p>
                                    <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold text-end"><?php echo e($invoice_obj->total); ?> PLN</p>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <!--POZYCJE-->

                        <!--PODSUMOWANIE-->
                        <div class="md:col-span-1 md:col-start-2">
                            <?php if (isset($component)) { $__componentOriginald9d6e99fd078b868e6ae4029c4918748 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald9d6e99fd078b868e6ae4029c4918748 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-summary','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-summary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald9d6e99fd078b868e6ae4029c4918748)): ?>
<?php $attributes = $__attributesOriginald9d6e99fd078b868e6ae4029c4918748; ?>
<?php unset($__attributesOriginald9d6e99fd078b868e6ae4029c4918748); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald9d6e99fd078b868e6ae4029c4918748)): ?>
<?php $component = $__componentOriginald9d6e99fd078b868e6ae4029c4918748; ?>
<?php unset($__componentOriginald9d6e99fd078b868e6ae4029c4918748); ?>
<?php endif; ?>
                        </div>
                        <!--PODSUMOWANIE-->

                        <!--STATUS I UWAGI-->
                        <?php if (isset($component)) { $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-gray','data' => ['class' => 'col-span-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-span-2']); ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-status','data' => ['invoice' => $invoice_obj]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['invoice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invoice_obj)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4)): ?>
<?php $attributes = $__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4; ?>
<?php unset($__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4)): ?>
<?php $component = $__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4; ?>
<?php unset($__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal76ef1cd2743640539aad4c5864b72d42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal76ef1cd2743640539aad4c5864b72d42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-progress','data' => ['invoice' => $invoice_obj]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['invoice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invoice_obj)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal76ef1cd2743640539aad4c5864b72d42)): ?>
<?php $attributes = $__attributesOriginal76ef1cd2743640539aad4c5864b72d42; ?>
<?php unset($__attributesOriginal76ef1cd2743640539aad4c5864b72d42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76ef1cd2743640539aad4c5864b72d42)): ?>
<?php $component = $__componentOriginal76ef1cd2743640539aad4c5864b72d42; ?>
<?php unset($__componentOriginal76ef1cd2743640539aad4c5864b72d42); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <p class="text-gray-600 dark:text-gray-300 test-sm">
                                    Uwagi
                                </p>
                                <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                    <?php echo e($invoice_obj->notes); ?>

                                </p>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $attributes = $__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__attributesOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a)): ?>
<?php $component = $__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a; ?>
<?php unset($__componentOriginal16ebdf493f2d9bcbc4a1e9656bb76d8a); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $attributes = $__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__attributesOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51)): ?>
<?php $component = $__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51; ?>
<?php unset($__componentOriginal47bd46e48bdfbb3b3be51d6ffaa2da51); ?>
<?php endif; ?>
                        <!--STATUS I UWAGI-->
                    </div>
                    <!--BODY-->

                    <!--PRZYCISKI POD A4-->
                    <div class="mt-8 hidden md:flex justify-end items-center space-x-4">
                        <!-- EDYTUJ -->
                        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('invoice.edit', $invoice)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.edit', $invoice)).'']); ?>
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
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
                        <!--EDYTUJ-->

                        <!--USUŃ-->
                        <form action="<?php echo e(route('invoice.delete', $invoice)); ?>" method="POST"
                            onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <?php if (isset($component)) { $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-red','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $attributes = $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18)): ?>
<?php $component = $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18; ?>
<?php unset($__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18); ?>
<?php endif; ?>
                        </form>
                        <!--USUŃ-->
                    </div>
                    <div class="mt-8 flex justify-end items-center space-x-4">
                        <!-- Utwórz Fakturę Sprzedaży -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj['invoice_type'] == 'faktura proforma'): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->invoice_id == null): ?>
                        <?php if (isset($component)) { $__componentOriginal040c6f48442b9f6fd50ce6a45905ff8c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal040c6f48442b9f6fd50ce6a45905ff8c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-green','data' => ['href' => ''.e(route('invoice.store.from', $invoice_obj)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-green'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.store.from', $invoice_obj)).'']); ?>
                            <i class="fa-solid fa-file-invoice-dollar mr-2"></i>Utwórz Fakturę Sprzedaży
                         <?php echo $__env->renderComponent(); ?>
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
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <!-- Utwórz Fakturę Sprzedaży -->

                        <!-- Wyślij Fakturę do Klienta -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null): ?>
                        <?php if (isset($component)) { $__componentOriginal7931f85c37d345e4d89919ba1482a252 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7931f85c37d345e4d89919ba1482a252 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-orange','data' => ['href' => ''.e(route('invoice.send', $invoice_obj)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-orange'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.send', $invoice_obj)).'']); ?>
                            <i class="fa-solid fa-paper-plane mr-2"></i>Wyślij Fakturę
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
                        <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginalff02ffe014354d25747fc442bb250590 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff02ffe014354d25747fc442bb250590 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-disabled','data' => ['type' => 'button','disabled' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-disabled'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','disabled' => true]); ?>
                            <i class="fa-solid fa-paper-plane mr-2"></i>Brak adresu e-mail
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff02ffe014354d25747fc442bb250590)): ?>
<?php $attributes = $__attributesOriginalff02ffe014354d25747fc442bb250590; ?>
<?php unset($__attributesOriginalff02ffe014354d25747fc442bb250590); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff02ffe014354d25747fc442bb250590)): ?>
<?php $component = $__componentOriginalff02ffe014354d25747fc442bb250590; ?>
<?php unset($__componentOriginalff02ffe014354d25747fc442bb250590); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <!-- Wyślij Fakturę do Klienta -->

                        <!-- Pobierz PDF -->
                        <?php if (isset($component)) { $__componentOriginal459c868fdb862b735c02a27231cfbfef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal459c868fdb862b735c02a27231cfbfef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-blue','data' => ['href' => ''.e(route('invoice.download', $invoice_obj)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-blue'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('invoice.download', $invoice_obj)).'']); ?>
                            <i class="fa-solid fa-file-pdf mr-2"></i>Pobierz PDF
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
                        <!-- Pobierz PDF -->
                    </div>
                    <!--PRZYCISKI POD A4-->

                    <!--ALERT-->
                    <div class="my-8 hidden md:flex justify-end items-center space-x-4 w-full">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice_obj->client->email != null || $invoice_obj->client->email2 != null): ?>
                        <?php else: ?>
                        <div class="relative mt-2 bg-yellow-100 border border-yellow-300 text-yellow-900 rounded-lg p-4 w-full flex items-center justify-between" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-light-label">
                            <div class="flex items-center justify-start">
                                <span id="hs-soft-color-light-label" class="font-bold text-sm md:text-base">
                                    <i class="fa-solid fa-exclamation-triangle mr-2"></i>Uwaga klient nie ma adresu email
                                </span>
                                <p class="text-sm md:text-base text-gray-900 dark:text-gray-50 font-semibold text-start">
                                    <a href="<?php echo e(route('client.edit', $invoice_obj->client)); ?>" class="text-yellow-900 dark:text-yellow-800 hover:underline">
                                        <span>, kliknij aby dodać adres email</span>
                                    </a>
                                </p>
                            </div>
                            <button id="close-alert" class="ml-4 text-yellow-900 hover:text-yellow-700 focus:outline-none">
                                <i class="fa-solid fa-times"></i>
                            </button>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#close-alert').click(function() {
                                $(this).closest('div[role="alert"]').fadeOut();
                            });
                        });
                    </script>
                    <!--ALERT-->
                    <!--INFO-->
                    <div class="mt-8 grid grid-cols-2 md:gap-4">
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                <?php echo e($invoice_obj->user->name ?? ''); ?>

                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-gray-900 dark:text-gray-400 text-sm md:text-xl font-semibold">
                                <?php echo e($invoice_obj->company->name ?? ''); ?>

                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">
                                <?php echo e($invoice_obj->created_at->format('d-m-Y H:i')); ?>

                            </p>
                        </div>
                        <div class="col-span-2 md:grid  md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 font-semibold">
                                <?php echo e($invoice_obj->updated_at->format('d-m-Y H:i')); ?>

                            </p>
                        </div>
                    </div>
                    <!--INFO-->
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\invoice\show.blade.php ENDPATH**/ ?>