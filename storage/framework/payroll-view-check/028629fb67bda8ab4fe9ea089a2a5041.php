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
                    <a href="<?php echo e(route('client')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Klientów
                    </a>
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Edytuj klienta
                        </h1>
                    </div>

                    <form method="POST" action="<?php echo e(route('client.update', $client)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <!-- Nazwa -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa</label>
                            <input type="text" id="name" name="name" value="<?php echo e(old('name', $client->name)); ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                        </div>

                        <!-- NIP -->
                        <div class="mb-4">
                            <label for="tax_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP</label>
                            <div class="flex justify-end space-x-4">
                                <button type="button" id="fetch_vat_data" class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-400 focus:bg-blue-700 dark:focus:bg-blue-400 active:bg-blue-800 dark:active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Pobierz dane podatnika VAT
                                </button>
                                <input type="text" id="tax_id" name="tax_id" value="<?php echo e(old('tax_id', $client->vat_number)); ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>
                            <a href="https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat" class="text-blue-500 text-xs mt-1">Źródło: https://www.gov.pl/web/kas/api-wykazu-podatnikow-vat</a>
                        </div>

                        <!-- Adres -->
                        <div class="mb-4">
                            <label for="adress" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adres</label>
                            <input type="text" id="adress" name="adress" value="<?php echo e(old('adress', $client->adress)); ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                        </div>

                        <div class="inline-flex items-center justify-center w-full">
                            <hr class="w-64 h-px my-8 bg-gray-200 border-0 dark:bg-gray-600">
                            <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-800">Niżej pola dodatkowe</span>
                        </div>

                        <!-- Email i Email2 -->
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo e(old('email', $client->email)); ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>
                            <div>
                                <label for="email2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email dodatkowy</label>
                                <input type="email" id="email2" name="email2" value="<?php echo e(old('email2', $client->email2)); ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>
                        </div>

                        <!-- Telefon i Telefon2 -->
                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefon</label>
                                <input type="text" id="phone" name="phone" value="<?php echo e(old('phone', $client->phone)); ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>
                            <div>
                                <label for="phone2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefon dodatkowy</label>
                                <input type="text" id="phone2" name="phone2" value="<?php echo e(old('phone2', $client->phone2)); ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            </div>
                        </div>

                        <!-- Uwagi -->
                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                            <textarea id="notes" name="notes" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"><?php echo e(old('notes', $client->notes)); ?></textarea>
                        </div>

                        <!-- Przycisk zapisu -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-check mr-2"></i>Zapisz
                            </button>

                            <a href="<?php echo e(route('client')); ?>" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-trash mr-2"></i>Anuluj
                            </a>
                        </div>
                    </form>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\project\edit.blade.php ENDPATH**/ ?>