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
                    <a href="<?php echo e(route('product')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Produktów
                    </a>
                    <div class="flex flex-row justify-between items-center">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900 dark:text-gray-100">
                            Podgląd produktu
                        </h1>
                    </div>
                    <div class="mt-8">
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Nazwa
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->name); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Cena jednostkowa netto
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->unit_price ? number_format($product->unit_price, 2) . ' PLN' : ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Stawka VAT
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->vat_rate ? number_format($product->vat_rate, 2) . '%' : ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Kwota VAT
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->vat_amount ? number_format($product->vat_amount, 2) . ' PLN' : ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Wartość netto
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->subtotal ? number_format($product->subtotal, 2) . ' PLN' : ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Wartość brutto
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->total ? number_format($product->total, 2) . ' PLN' : ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Opis
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->description ?? ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-300 test-sm">
                                Stan magazynowy
                            </p>
                            <p class="text-lg text-gray-900 dark:text-gray-50 font-semibold">
                                <?php echo e($product->magazine ?? ''); ?>

                            </p>
                        </div>
                        <div class="col-span-2 md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Utworzone przez
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($product->user->name ?? ''); ?>

                            </p>
                        </div>
                        <div class="col-span-2 md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Dane należące do
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($product->company->name ?? ''); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data utworzenia
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($product->created_at->format('d-m-Y H:i')); ?>

                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 border-b dark:border-gray-700">
                            <p class="text-gray-600 dark:text-gray-400">
                                Data aktualizacji
                            </p>
                            <p class="text-sm md:text-xl text-gray-900 dark:text-gray-400 text-lg font-semibold">
                                <?php echo e($product->updated_at->format('d-m-Y H:i')); ?>

                            </p>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="<?php echo e(route('product.edit', $product)); ?>" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            <i class="fa-solid fa-pen-to-square mr-2"></i>Edytuj
                        </a>
                        <form action="<?php echo e(route('product.delete', $product)); ?>" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę usługę?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <i class="fa-solid fa-trash mr-2"></i>Usuń
                            </button>
                        </form>
                    </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\product\show.blade.php ENDPATH**/ ?>