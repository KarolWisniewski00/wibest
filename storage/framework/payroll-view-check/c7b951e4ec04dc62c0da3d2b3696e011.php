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
        <?php if (isset($component)) { $__componentOriginal6bbbefdc8a42261e71f81c133905a36e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bbbefdc8a42261e71f81c133905a36e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.old-school-nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('old-school-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6bbbefdc8a42261e71f81c133905a36e)): ?>
<?php $attributes = $__attributesOriginal6bbbefdc8a42261e71f81c133905a36e; ?>
<?php unset($__attributesOriginal6bbbefdc8a42261e71f81c133905a36e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6bbbefdc8a42261e71f81c133905a36e)): ?>
<?php $component = $__componentOriginal6bbbefdc8a42261e71f81c133905a36e; ?>
<?php unset($__componentOriginal6bbbefdc8a42261e71f81c133905a36e); ?>
<?php endif; ?>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('client.show', $client)).'','class' => 'text-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('client.show', $client)).'','class' => 'text-lg']); ?>
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć do Klienta
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

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-5xl text-center font-medium text-gray-700 dark:text-gray-100">
                            Stwórz Projekt
                        </h1>
                        <form method="POST" action="<?php echo e(route('project.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <ul class="grid w-full gap-6 md:grid-cols-2 my-8">
                                <li>
                                    <!-- Nazwa -->
                                    <div class="mb-4">
                                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa</label>
                                        <input type="text" id="name" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Skrót -->
                                    <div class="mb-4">
                                        <label for="shortcut" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skrót</label>
                                        <input type="text" id="shortcut" name="shortcut" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Domena sandbox -->
                                    <div class="mb-4">
                                        <label for="sandbox_domain" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Domena sandbox</label>
                                        <input type="text" id="sandbox_domain" name="sandbox_domain" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Domena produkcja -->
                                    <div class="mb-4">
                                        <label for="production_domain" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Domena produkcja</label>
                                        <input type="text" id="production_domain" name="production_domain" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                    <!-- Technologia -->
                                    <div class="mb-4">
                                        <label for="technology" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Technologia</label>
                                        <input type="text" id="technology" name="technology" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                    </div>
                                </li>
                                <li>
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
                                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                                <?php if (isset($component)) { $__componentOriginal4678d95cf11a514277943c24d379ed0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4678d95cf11a514277943c24d379ed0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-link-company','data' => ['href' => ''.e(route('client.show', $client->id)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-link-company'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('client.show', $client->id)).'']); ?>
                                                    <?php echo e($client->name); ?>

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
                                            <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>">
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
                                                <?php echo e($client->adress); ?>

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
                                                <?php echo e($client->vat_number); ?>

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
                                </li>
                            </ul>


                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                            <div class="w-full rounded-lg max-w-4xl mx-auto flex flex-col md:flex-row gap-4 items-center justify-center">
                                <button type="submit"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Stwórz Projekt
                                </button>

                                <a href="<?php echo e(route('client.show', $client)); ?>"
                                    class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-xmark mr-2"></i>Anuluj
                                </a>
                            </div>
                            <!--ZAPISZ LUB ANULUJ FORMULARZ-->
                        </form>
                    </div>
                    <!--FORMULARZ-->
                </div>
            </div>
            <!--END WIDGET TASK-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#fetch_vat_data').click(function() {
                var taxId = $('#tax_id').val();
                var today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD

                if (taxId) {
                    $.ajax({
                        url: `https://wl-api.mf.gov.pl/api/search/nip/${taxId}?date=${today}`,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Dane podatnika VAT:', data);

                            // Wstawianie danych do formularza
                            var subject = data.result.subject;
                            $('#name').val(subject.name || '');

                            // Wstawianie pełnego adresu
                            if (subject.workingAddress) {
                                $('#adress').val(subject.workingAddress || '');
                            }

                        },
                        error: function(xhr, status, error) {
                            console.error('Błąd:', error);
                            // Możesz tutaj dodać kod do obsługi błędów
                        }
                    });
                } else {
                    alert('Proszę wprowadzić numer NIP.');
                }
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\project\create.blade.php ENDPATH**/ ?>