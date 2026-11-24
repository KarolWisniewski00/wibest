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
    <?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--MAIN-->
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

        <!--CONTENT-->
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

            <!--POWRÓT-->
            <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('setting.blog')).'','class' => 'text-lg mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.blog')).'','class' => 'text-lg mb-4']); ?>
                <i class="fa-solid fa-chevron-left mr-2"></i>Wróć
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

            <?php if (isset($component)) { $__componentOriginal1ab30b3d04505c3e429884f607a359d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ab30b3d04505c3e429884f607a359d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <span>📈</span> Blog
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ab30b3d04505c3e429884f607a359d0)): ?>
<?php $attributes = $__attributesOriginal1ab30b3d04505c3e429884f607a359d0; ?>
<?php unset($__attributesOriginal1ab30b3d04505c3e429884f607a359d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ab30b3d04505c3e429884f607a359d0)): ?>
<?php $component = $__componentOriginal1ab30b3d04505c3e429884f607a359d0; ?>
<?php unset($__componentOriginal1ab30b3d04505c3e429884f607a359d0); ?>
<?php endif; ?>
            <!--POWRÓT-->
            <form id="myForm" method="POST" action="<?php echo e(route('setting.blog.store')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>
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
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        📝 Tytuł
                    </label>
                    <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>"
                        placeholder="Wpisz tytuł artykułu" required
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
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

                <div class="mb-6">
                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        🔗 Slug
                    </label>
                    <input type="text" id="slug" name="slug" value="<?php echo e(old('slug')); ?>"
                        placeholder="np. nowa-aktualizacja-systemu" required
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['slug'];
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

                <div class="mb-6">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        📄 Krótki opis
                    </label>

                    <textarea id="short_description" name="short_description" rows="4"
                        placeholder="Krótki opis artykułu wyświetlany na liście wpisów..."
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"><?php echo e(old('short_description')); ?></textarea>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['short_description'];
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

                <?php if (isset($component)) { $__componentOriginal1ab30b3d04505c3e429884f607a359d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ab30b3d04505c3e429884f607a359d0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <span>🔍</span> SEO
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ab30b3d04505c3e429884f607a359d0)): ?>
<?php $attributes = $__attributesOriginal1ab30b3d04505c3e429884f607a359d0; ?>
<?php unset($__attributesOriginal1ab30b3d04505c3e429884f607a359d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ab30b3d04505c3e429884f607a359d0)): ?>
<?php $component = $__componentOriginal1ab30b3d04505c3e429884f607a359d0; ?>
<?php unset($__componentOriginal1ab30b3d04505c3e429884f607a359d0); ?>
<?php endif; ?>

                <div class="mb-6">
                    <label for="seo_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        🏷️ SEO Title
                    </label>

                    <input type="text" id="seo_title" name="seo_title" value="<?php echo e(old('seo_title')); ?>"
                        placeholder="Tytuł SEO"
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['seo_title'];
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

                <div class="mb-6">
                    <label for="seo_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        📝 SEO Description
                    </label>

                    <textarea id="seo_description" name="seo_description" rows="4" placeholder="Opis dla Google..."
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"><?php echo e(old('seo_description')); ?></textarea>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['seo_description'];
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

                <div class="mb-6">
                    <label for="seo_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        🔑 SEO Keywords
                    </label>

                    <input type="text" id="seo_keywords" name="seo_keywords" value="<?php echo e(old('seo_keywords')); ?>"
                        placeholder="laravel, cms, blog, aktualizacja"
                        class="min-h-[46px] !text-lg mt-1 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['seo_keywords'];
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
                    document.addEventListener('DOMContentLoaded', function () {

                        const titleInput = document.getElementById('title');
                        const slugInput = document.getElementById('slug');

                        let slugEditedManually = false;

                        slugInput.addEventListener('input', () => {
                            slugEditedManually = true;
                        });

                        titleInput.addEventListener('input', () => {

                            if (slugEditedManually) {
                                return;
                            }

                            let slug = titleInput.value
                                .toLowerCase()
                                .normalize("NFD")
                                .replace(/[\u0300-\u036f]/g, "") // polskie znaki
                                .replace(/[^a-z0-9\s-]/g, "")
                                .trim()
                                .replace(/\s+/g, '-')
                                .replace(/-+/g, '-');

                            slugInput.value = slug;
                        });

                        const title = document.getElementById('title');
                        const description = document.getElementById('short_description');

                        const seoTitle = document.getElementById('seo_title');
                        const seoDescription = document.getElementById('seo_description');

                        let seoTitleEdited = false;
                        let seoDescriptionEdited = false;

                        seoTitle.addEventListener('input', () => seoTitleEdited = true);
                        seoDescription.addEventListener('input', () => seoDescriptionEdited = true);

                        title.addEventListener('input', () => {
                            if (!seoTitleEdited) {
                                seoTitle.value = title.value;
                            }
                        });

                        description.addEventListener('input', () => {
                            if (!seoDescriptionEdited) {
                                seoDescription.value = description.value;
                            }
                        });
                    });
                </script>
                <div class="mt-2">
                    <label for="type"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🏷️</span> Typ
                    </label>
                    <select id="type" name="type" autocomplete="off" class="mt-2 rounded-lg text-lg">
                        <option value="">Wybierz typ</option>
                        <option value="Wpis">Wpis</option>
                        <option value="Aktualizacja">Aktualizacja</option>
                        <option value="Regulamin">Regulamin</option>
                        <option value="Polityka prywatności">Polityka prywatności</option>
                        <option value="Polityka cookies">Polityka cookies</option>
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
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    
                    <div class="mt-2">
                        <input type="hidden" name="content" id="content-json">

                        <div class="flex gap-2 mb-4">
                            <?php if (isset($component)) { $__componentOriginalc1a6ce59269b398a58355de0e352bfae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1a6ce59269b398a58355de0e352bfae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-neutral','data' => ['type' => 'button','onclick' => 'addBlock(\'text\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','onclick' => 'addBlock(\'text\')']); ?>+ Tekst <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $attributes = $__attributesOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $component = $__componentOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__componentOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc1a6ce59269b398a58355de0e352bfae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1a6ce59269b398a58355de0e352bfae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-neutral','data' => ['type' => 'button','onclick' => 'addBlock(\'heading\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','onclick' => 'addBlock(\'heading\')']); ?>+ Nagłówek <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $attributes = $__attributesOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $component = $__componentOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__componentOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc1a6ce59269b398a58355de0e352bfae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1a6ce59269b398a58355de0e352bfae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-neutral','data' => ['type' => 'button','onclick' => 'addBlock(\'blade_component\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','onclick' => 'addBlock(\'blade_component\')']); ?>+
                                Komponent <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $attributes = $__attributesOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $component = $__componentOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__componentOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc1a6ce59269b398a58355de0e352bfae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1a6ce59269b398a58355de0e352bfae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-neutral','data' => ['type' => 'button','onclick' => 'addBlock(\'html\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','onclick' => 'addBlock(\'html\')']); ?>+ HTML <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $attributes = $__attributesOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__attributesOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1a6ce59269b398a58355de0e352bfae)): ?>
<?php $component = $__componentOriginalc1a6ce59269b398a58355de0e352bfae; ?>
<?php unset($__componentOriginalc1a6ce59269b398a58355de0e352bfae); ?>
<?php endif; ?>
                        </div>

                        <div id="blocks" class="space-y-3"></div>
                    </div>

                    
                    <div>
                        <label
                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                            Podgląd
                        </label>
                        <div
                            class="appearance-none rounded-lg shadow border border-gray-100 dark:border-gray-700 bg-gray-100 p-4 lg:p-8 outline-none dark:bg-gray-800 dark:text-gray-50">
                            <div id="preview"style='font-family: "Lato", sans-serif;' class="flex flex-col items-start justify-between gap-4 mb-8">
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    let blocks = [];

                    function uid() {
                        return Math.random().toString(36).substr(2, 9);
                    }
                    function addBlock(type) {
                        const block = {
                            id: uid(),
                            type: type,
                            data: {}
                        };

                        if (type === 'text') {
                            block.data.content = '';
                        }

                        if (type === 'heading') {
                            block.data.text = '';
                        }

                        if (type === 'blade_component') {
                            block.data.name = '';
                            block.data.props = {};
                        }
                        if (type === 'html') {
                            block.data.html = '';
                        }

                        blocks.push(block);

                        render();
                        sync();
                    }
                    function render() {
                        const container = document.getElementById('blocks');
                        container.innerHTML = '';

                        blocks.forEach((block, index) => {

                            let html = '';

                            if (block.type === 'text') {
                                html = `
                            <div class="w-full">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>💬</span> Tekst
                                </label>
                                <textarea placeholder="Tekst..." oninput="updateBlock('${block.id}', 'content', this.value)"
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-300">${block.data.content}</textarea>
                            </div>
                            `;
                            }

                            if (block.type === 'heading') {
                                html = `
                            <div class="w-full">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>💬</span> Nagłówek
                                </label>
                                <textarea placeholder="Nagłówek..." oninput="updateBlock('${block.id}', 'text', this.value)"
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-300">${block.data.text}</textarea>
                            </div>
                            `;
                            }

                            if (block.type === 'blade_component') {
                                html = `
                            <div class="w-full">
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span></span> Nazwa komponentu
                                </label>
                                <input type="text" value="${block.data.name || ''}" oninput="updateComponentName('${block.id}', this.value)" placeholder="Nazwa komponentu"
                                    class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                            </div>
                            `;
                            }
                            if (block.type === 'html') {
                                html = `
                                <div class="w-full">
                                    <label class="block text-sm font-medium">
                                        HTML
                                    </label>

                                    <textarea
                                        oninput="updateBlock('${block.id}','html',this.value)"
                                        class="w-full mt-1 px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-700"
                                    >${block.data.html || ''}</textarea>
                                </div>
                            `;
                            }

                            container.innerHTML += `
                            <div
                                class="h-full inline-flex items-center justify-between w-full p-4 text-gray-700 bg-white border-2 border-gray-200 rounded-lg dark:border-gray-700 peer-checked:border-green-400 dark:peer-checked:border-green-300 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 dark:text-gray-200 dark:bg-gray-800 transition-all duration-200">
                                <div class="flex flex-col items-center justify-center w-full gap-2">
                                    ${html}
                                    <?php if (isset($component)) { $__componentOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5d447fec2072f967bc0ffcc6bd5a18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-red','data' => ['class' => 'w-full','type' => 'button','onclick' => 'removeBlock(\'${block.id}\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-red'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full','type' => 'button','onclick' => 'removeBlock(\'${block.id}\')']); ?>
                                        <i class="fa-solid fa-trash mr-2" aria-hidden="true"></i>Usuń
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
                                </div>
                            </div>
        `;
                        });
                    }
                    function updateBlock(id, key, value) {
                        const block = blocks.find(b => b.id === id);

                        if (!block) return;

                        block.data[key] = value;

                        sync();
                    }
                    function updateComponentName(id, value) {
                        const block = blocks.find(b => b.id === id);
                        if (!block) return;

                        block.data.name = value;

                        sync();
                    }
                    function removeBlock(id) {
                        blocks = blocks.filter(b => b.id !== id);
                        render();
                        sync();
                    }
                    function sync() {
                        document.getElementById('content-json').value =
                            JSON.stringify(blocks);

                        renderPreview();
                    }
                    function renderPreview() {
                        const preview = document.getElementById('preview');

                        let html = '';

                        blocks.forEach(block => {

                            if (block.type === 'text') {
                                html += `<p class="text-gray-600 dark:text-gray-300 mb-4 leading-7">${block.data.content || ''}</p>`;
                            }

                            if (block.type === 'heading') {
                                html += `<h3 style='font-weight: 900;' class="text-3xl font-black text-gray-900 dark:text-white leading-tight">${block.data.text || ''}</h3>`;
                            }

                            if (block.type === 'blade_component') {
                                switch (block.data.name) {
                                    case "RCP":
                                        html += `
                                    <div class="flex flex-col items-center justify-center h-full w-full mt-2 md:mr-2">
                                        <span class="text-lg md:text-xl">⏱️</span>
                                        <span class="px-1 md:px-2 py-0.5 mt-1 rounded-full text-[0.5rem] md:text-xs font-semibold bg-green-300 dark:bg-green-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                            RCP
                                        </span>
                                    </div>
                                    `;
                                        break;
                                    default:
                                        html += `<div class="text-gray-600 dark:text-gray-300 mb-4 leading-7">
                                            [COMPONENT: ${block.data.name || 'brak'}]
                                        </div>`;
                                }
                            }
                            if (block.type === 'html') {
                                html += block.data.html || '';
                            }
                        });

                        preview.innerHTML = html;
                    }
                </script>

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
                        <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
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
        <!--CONTENT-->

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
    <!--MAIN-->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\blog\create.blade.php ENDPATH**/ ?>