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
                    <a href="<?php echo e(route('cost')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        <i class="fa-solid fa-chevron-left mr-2"></i>Powrót do listy Faktur
                    </a>

                    <!--FORMULARZ-->
                    <div class="mt-8">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-gray-100">Edycja Faktury Kosztowej</h1>
                        <form method="POST" action="<?php echo e(route('cost.update', $cost->id)); ?>" enctype="multipart/form-data" class="mt-6">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <!-- Numer faktury -->
                            <div class="mb-6">
                                <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Numer faktury</label>
                                <input type="text" id="number" name="number" value="<?php echo e(old('number', $cost->number)); ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Kwota -->
                            <div class="mb-6">
                                <label for="total" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Do zapłaty</label>
                                <input type="number" step="0.01" id="total" name="total" value="<?php echo e(old('total', $cost->total)); ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Termin płatności -->
                            <div class="mb-6">
                                <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Termin płatności</label>
                                <input type="date" id="due_date" name="due_date" value="<?php echo e(old('due_date', $cost->due_date)); ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['due_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Uwagi -->
                            <div class="mb-6">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"><?php echo e(old('notes', $cost->notes)); ?></textarea>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Upload pliku -->
                            <div class="mb-6">
                                <label for="attachment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wgraj plik</label>
                                <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                                    <!-- Ukryty input do uploadu pliku -->
                                    <input type="file" id="file-upload" name="attachment" class="absolute inset-0 w-full h-full opacity-0 z-50" />

                                    <!-- Opis uploadu -->
                                    <div class="text-center" id="upload-description">
                                        <!-- Ikona dodawania pliku z Font Awesome -->
                                        <i class="fa-solid fa-upload text-gray-400 text-6xl w-full"></i>

                                        <!-- Instrukcje do uploadu -->
                                        <h3 class="mt-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            <span>Przeciągnij i upuść</span>
                                            <span class="text-indigo-400"> lub przeglądaj</span>
                                            <span>pliki do przesłania</span>
                                        </h3>

                                        <!-- Obsługiwane formaty -->
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            PNG, JPG, GIF, do 10MB
                                        </p>
                                    </div>

                                    <!-- Podgląd przesłanego pliku -->
                                    <img src="<?php echo e(asset('attachments/'.$cost->path)); ?>" class="mt-4 mx-auto max-h-40" id="preview" alt="Preview of uploaded file">
                                </div>
                            </div>

                            <input type="hidden" value="<?php echo e($company->id); ?>" name="company_id">

                            <!-- Przyciski końcowe -->
                            <div class="mt-8 flex justify-end space-x-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-400 focus:bg-green-700 dark:focus:bg-green-400 active:bg-green-800 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-check mr-2"></i>Zapisz
                                </button>
                                <a href="<?php echo e(route('cost')); ?>" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-400 focus:bg-red-700 dark:focus:bg-red-400 active:bg-red-800 dark:active:bg-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-trash mr-2"></i>Anuluj
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Funkcja ustawia dzisiejszą datę jako wartość domyślną dla pola daty
            const today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            $('#due_date').val(today);

            var dropzone = $('#dropzone');

            dropzone.on('dragover', function(e) {
                e.preventDefault();
                dropzone.addClass('border-indigo-600');
            });

            dropzone.on('dragleave', function(e) {
                e.preventDefault();
                dropzone.removeClass('border-indigo-600');
            });

            dropzone.on('drop', function(e) {
                e.preventDefault();
                dropzone.removeClass('border-indigo-600');
                var file = e.originalEvent.dataTransfer.files[0];
                displayPreview(file);
            });

            $('#file-upload').on('change', function(e) {
                var file = e.target.files[0];
                displayPreview(file);
            });

            function displayPreview(file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    var preview = $('#preview');
                    preview.attr('src', reader.result);
                    preview.removeClass('hidden');

                    // Ukrycie opisu uploadu
                    $('#upload-description').addClass('hidden');
                };
            }

            // Ukrycie podglądu i opisu, jeśli plik już istnieje
            if ($('#preview').attr('src')) {
                $('#upload-description').addClass('hidden');
            }
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\cost\edit.blade.php ENDPATH**/ ?>