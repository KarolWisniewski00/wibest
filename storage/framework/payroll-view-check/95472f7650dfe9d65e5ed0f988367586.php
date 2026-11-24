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
            <!-- Formularz tworzenia firmy -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!--POWRÓT-->
                    <a href="<?php echo e(route('setting')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 dark:bg-gray-700 border border-transparent rounded-lg font-semibold text-lg dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 hover:text-white dark:hover:bg-gray-300 dark:hover:text-gray-900 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
                    </a>
                    <!-- Napis z przyciskiem tworzenia -->
                    <div class="pb-4 flex flex-col justify-between items-center">
                        <div class="flex flex-row justify-between items-center w-full bg-white dark:bg-gray-800">
                            <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-700 dark:text-gray-100">
                                Wprowadź dane firmy
                            </h1>
                        </div>
                    </div>

                    <form method="POST" action="<?php echo e(route('setting.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwa firmy</label>
                            <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" autofocus required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
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

                        <!-- Adres -->
                        <div class="mb-6">
                            <label for="adress" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adres</label>
                            <input type="text" id="adress" name="adress" value="<?php echo e(old('adress')); ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['adress'];
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

                        <!-- nip -->
                        <div class="flex flex-col relative mb-6">
                            <label for="vat_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIP</label>
                            <div class="flex items-center justify-between">
                                <button id="fetch_vat_data" type="button" class="whitespace-nowrap w-min min-h-[44px] mt-1 inline-flex items-center px-4 py-2 bg-orange-300 dark:bg-orange-300 border border-transparent rounded-l-md font-semibold text-xs md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-orange-700 dark:hover:bg-orange-400 focus:bg-orange-700 dark:focus:bg-orange-300 active:bg-orange-900 dark:active:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-orange-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-magnifying-glass mr-2"></i>Znajdź w GUS
                                </button>
                                <input type="text" id="vat_number" name="vat_number" value="<?php echo e(old('vat_number')); ?>" class="min-h-[44px] mt-1 block w-full p-2 border bg-gray-100 text-gray-700 border-gray-100 rounded-r-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['vat_number'];
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
                        <input type="hidden" id="api-link-gus" value="<?php echo e(route('api.v1.search.gus',[''])); ?>">
                        <script>
                            $(document).ready(function() {
                                $('#fetch_vat_data').click(function() {
                                    let apiLinkGus = $('#api-link-gus');
                                    var nip = $('#vat_number').val();

                                    if (nip) {
                                        $.ajax({
                                            url: apiLinkGus.val() + '/' + nip,
                                            method: 'GET',
                                            dataType: 'json',
                                            success: function(data) {
                                                console.log('Dane podatnika VAT:', data['response']);
                                                $('#name').val(data['response']['name'] || '');
                                                $('#adress').val(data['response']['adres'] || '');
                                                toastr.success('Operacja zakończona powodzeniem!');
                                            },
                                            error: function(xhr, status, error) {
                                                console.error('Błąd:', error);
                                                // Możesz tutaj dodać kod do obsługi błędów
                                                toastr.error('Operacja zakończona niepowodzeniem!');
                                            }
                                        });
                                    } else {
                                        alert('Proszę wprowadzić numer NIP.');
                                    }
                                });
                            });
                        </script>

                        <!-- Przycisk edytowania faktury -->
                        <div class="mt-8 flex justify-end space-x-4">
                            <!-- Green button for saving changes -->
                            <button type="submit" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-check mr-2"></i>Zapisz
                            </button>
                            <a href="<?php echo e(route('setting')); ?>" class="whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-sm md:text-lg text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-300 active:bg-red-900 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                <i class="fa-solid fa-trash mr-2"></i>Anuluj
                            </a>
                        </div>
                    </form>
                </div>
            </div>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\setting\create.blade.php ENDPATH**/ ?>