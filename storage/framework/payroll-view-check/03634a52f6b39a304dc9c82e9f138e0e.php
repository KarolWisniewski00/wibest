                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div role="alert" class="rounded-xl bg-red-100 p-4 text-red-800">
                        <p>Popraw dane formularza:</p>
                        <ul class="list-disc pl-5"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></ul>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                
                
                <div class="flex items-start justify-start">
                    <!--POWRÓT-->
                    <?php if (isset($component)) { $__componentOriginala3a1cf38827b336ba38d71f21422d468 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3a1cf38827b336ba38d71f21422d468 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('object.dashboard')).'','class' => 'text-lg mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('object.dashboard')).'','class' => 'text-lg mb-4']); ?>
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
                </div>



                
                
                

                <div class="grid min-w-0 grid-cols-1 gap-4 xl:grid-cols-3">


                    
                    
                    

                    <div class="space-y-4 xl:col-span-2">


                        
                        
                        

                        <div class="min-w-0 overflow-hidden rounded-2xl bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">

                            <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                                <div class="flex items-center gap-3">

                                    <?php if (isset($component)) { $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.type-icon','data' => ['type' => old('object_type', $object->object_type)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.type-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('object_type', $object->object_type))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $attributes = $__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__attributesOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8)): ?>
<?php $component = $__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8; ?>
<?php unset($__componentOriginalcd4e2c2caf45e8bb4db9c78894f7a8b8); ?>
<?php endif; ?>

                                    <div>
                                        <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                            Informacje o obiekcie
                                        </h2>

                                        <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                            Podstawowe informacje dotyczące miejsca pracy
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <div class="space-y-5 p-5">

                                <style>
                                    .object-form-control,
                                    body #object_type + .ts-wrapper .ts-control,
                                    body #object-location-search gmp-place-autocomplete {
                                        min-height: 46px;
                                        width: 100%;
                                        border: 1px solid #d1d5db !important;
                                        border-radius: 0.5rem !important;
                                        background-color: #fff !important;
                                        color: #111827 !important;
                                        font-size: 1.125rem !important;
                                        line-height: 1.75rem !important;
                                        box-shadow: none !important;
                                        transition: border-color 150ms ease, box-shadow 150ms ease;
                                    }

                                    body #object-location-search gmp-place-autocomplete {
                                        --gmpx-color-surface: #fff;
                                        --gmpx-color-on-surface: #111827;
                                        --gmpx-color-on-surface-variant: #9ca3af;
                                        --gmpx-color-primary: #22c55e;
                                        --gmpx-font-family-base: Lato, sans-serif;
                                        --gmpx-font-size-base: 18px;
                                    }

                                    .object-form-control {
                                        padding: 0.5rem 0.75rem;
                                    }

                                    .object-form-control::placeholder,
                                    #object_type + .ts-wrapper .ts-control input::placeholder {
                                        color: #9ca3af;
                                    }

                                    .object-form-control:focus,
                                    body #object_type + .ts-wrapper.focus .ts-control,
                                    body #object-location-search gmp-place-autocomplete:focus-within {
                                        border-color: #22c55e !important;
                                        outline: none !important;
                                        box-shadow: 0 0 0 1px #22c55e !important;
                                    }

                                    body #object_type + .ts-wrapper .ts-control {
                                        align-items: center;
                                        padding: 0.5rem 0.75rem !important;
                                    }

                                    body #object_type + .ts-wrapper .ts-control input,
                                    body #object_type + .ts-wrapper .item {
                                        margin: 0 !important;
                                        color: inherit !important;
                                        font-size: inherit !important;
                                        line-height: inherit !important;
                                    }

                                    .ts-dropdown {
                                        overflow: hidden !important;
                                        border: 1px solid #d1d5db !important;
                                        border-radius: 0.5rem !important;
                                        background-color: #fff !important;
                                        color: #111827 !important;
                                    }

                                    .ts-dropdown .ts-dropdown-content {
                                        max-height: 300px !important;
                                    }

                                    .ts-dropdown .active {
                                        background-color: #f3f4f6 !important;
                                        color: #111827 !important;
                                    }

                                    .ts-dropdown .optgroup-header {
                                        border-top: 1px solid #e5e7eb !important;
                                        background-color: #f9fafb !important;
                                        color: #6b7280 !important;
                                        padding: 10px 12px 7px !important;
                                        font-size: 0.7rem !important;
                                        font-weight: 700 !important;
                                        letter-spacing: 0.08em !important;
                                        text-transform: uppercase !important;
                                    }

                                    .ts-dropdown .optgroup:first-child .optgroup-header {
                                        border-top: 0 !important;
                                    }

                                    @media (prefers-color-scheme: dark) {
                                        .object-form-control,
                                        body #object_type + .ts-wrapper .ts-control,
                                        body #object-location-search gmp-place-autocomplete {
                                            border-color: #4b5563 !important;
                                            background-color: #4b5563 !important;
                                            color: #f3f4f6 !important;
                                        }

                                        body #object-location-search gmp-place-autocomplete {
                                            --gmpx-color-surface: #4b5563;
                                            --gmpx-color-on-surface: #f3f4f6;
                                            --gmpx-color-on-surface-variant: #9ca3af;
                                            --gmpx-color-primary: #22c55e;
                                        }

                                        .ts-dropdown {
                                            border-color: #4b5563 !important;
                                            background-color: #1f2937 !important;
                                            color: #fff !important;
                                        }

                                        .ts-dropdown .active {
                                            background-color: #374151 !important;
                                            color: #fff !important;
                                        }

                                        .ts-dropdown .optgroup-header {
                                            border-color: #374151 !important;
                                            background-color: #1f2937 !important;
                                            color: #9ca3af !important;
                                        }
                                    }
                                </style>

                                
                                <div class="mb-4 text-start">
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300"><span>📝</span>Nazwa
                                        obiektu</label>
                                    <input type="text" id="name" name="name" value="<?php echo e(old('name', $object->name)); ?>" autofocus
                                        placeholder="Wpisz nazwę" required
                                        class="object-form-control mt-2 block">
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

                                

                                <style>
                                    @media (prefers-color-scheme: dark) {
                                        .ts-dropdown .active {
                                            background-color: rgb(75 85 99) !important;
                                            color: #fff !important;
                                        }

                                        .ts-dropdown .ts-dropdown-content {
                                            max-height: 300px !important;
                                            overflow-y: auto !important;
                                        }

                                        .ts-control input::placeholder {
                                            color: rgb(156 163 175);
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
                                <style>
                                    @media (prefers-color-scheme: dark) {

                                        .ts-dropdown .active {
                                            background-color: rgb(55 65 81) !important;
                                            color: #fff !important;
                                        }

                                        .ts-dropdown {
                                            border: 1px solid rgb(55 65 81) !important;
                                            border-radius: 0.5rem !important;
                                            overflow: hidden !important;
                                        }

                                        .option {
                                            padding-left: 12px !important;
                                        }

                                        /* Nagłówki kategorii */
                                        .ts-dropdown .optgroup-header {
                                            background-color: rgb(31 41 55) !important;
                                            color: rgb(156 163 175) !important;
                                            font-size: 0.7rem !important;
                                            font-weight: 700 !important;
                                            text-transform: uppercase !important;
                                            letter-spacing: 0.08em !important;
                                            padding: 10px 12px 7px !important;
                                            border-top: 1px solid rgb(55 65 81) !important;
                                        }

                                        /* Pierwsza grupa bez górnego obramowania */
                                        .ts-dropdown .optgroup:first-child .optgroup-header {
                                            border-top: none !important;
                                        }

                                        .ts-control {
                                            background-color: rgb(75 85 99) !important;
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

                                    /* Jasny motyw */
                                    @media (prefers-color-scheme: light) {

                                        .ts-dropdown {
                                            border: 1px solid rgb(229 231 235) !important;
                                            border-radius: 0.5rem !important;
                                            overflow: hidden !important;
                                        }

                                        .ts-dropdown .optgroup-header {
                                            background-color: rgb(249 250 251) !important;
                                            color: rgb(107 114 128) !important;
                                            font-size: 0.7rem !important;
                                            font-weight: 700 !important;
                                            text-transform: uppercase !important;
                                            letter-spacing: 0.08em !important;
                                            padding: 10px 12px 7px !important;
                                            border-top: 1px solid rgb(229 231 235) !important;
                                        }

                                        .ts-dropdown .optgroup:first-child .optgroup-header {
                                            border-top: none !important;
                                        }
                                    }
                                </style>
                                <style>
                                    #object_type + .ts-wrapper .ts-control {
                                        border: 0 !important;
                                        box-shadow: none !important;
                                    }
                                    #object_type + .ts-wrapper.focus .ts-control {
                                        outline: 2px solid rgb(134 239 172);
                                        outline-offset: 2px;
                                    }
                                </style>
                                <div class="mb-4 text-start">
                                    <label for="object_type"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                        <span>🏷️</span>Typ obiektu
                                    </label>

                                    <select id="object_type" name="object_type" autocomplete="off"
                                        placeholder="Wybierz typ" class="mt-2 rounded-lg text-lg">

                                        <option value="">Wybierz typ</option>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = collect(config('work_objects.types'))->groupBy('group', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <optgroup label="<?php echo e($group); ?>">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $presentation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($type); ?>" <?php if(old('object_type', $object->object_type) === $type): echo 'selected'; endif; ?>
                                                        data-description="<?php echo e($presentation['description']); ?>"
                                                        data-icon="<?php echo e($presentation['icon']); ?>"
                                                        data-primary="<?php echo e($presentation['primary']); ?>"
                                                        data-secondary="<?php echo e($presentation['secondary']); ?>">
                                                        <?php echo e(\App\Models\WorkObject::TYPES[$type]); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </optgroup>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </select>
                                </div>
                                <script>

                                    $(document).ready(function () {
                                        const defaultPresentation = <?php echo e(\Illuminate\Support\Js::from(config('work_objects.default'))); ?>;
                                        const updateInfo = function (value, options) {
                                            const option = Object.prototype.hasOwnProperty.call(options, value) && options[value].icon
                                                ? options[value] : defaultPresentation;
                                            const info = document.getElementById('info');
                                            const icon = info.querySelector('i');
                                            info.className = `shrink-0 flex w-11 h-11 rounded-xl sm:w-14 sm:h-14 sm:rounded-2xl items-center justify-center bg-gradient-to-br ${option.primary} ${option.secondary}`;
                                            icon.className = `fa-solid ${option.icon} text-lg sm:text-2xl`;
                                        };
                                        let objectTypeSelect = new TomSelect('#object_type', {
                                            maxItems: 1,

                                            render: {
                                                option: function (data, escape) {
                                                    return `
                    <div class="px-3 py-2 dark:bg-gray-800 dark:text-white">
                        <div class="text-lg flex flex-row items-center gap-2">
                            <div
                                class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br ${escape(data.primary)} ${escape(data.secondary)}">
                                <i class="fa-solid ${escape(data.icon)} text-lg sm:text-2xl" aria-hidden="true"></i>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex flex-row">
                                    ${escape(data.text)}
                                </div>
                                <div class="opacity-70 text-xs">
                                    ${escape(data.description || '')}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                                                },

                                                item: function (data, escape) {
                                                    return `
                    <div>${escape(data.text)}</div>
                `;
                                                },
                                            },
                                            onInitialize: function () {
                                                updateInfo(this.getValue(), this.options);
                                            },
                                            onChange: function (value) {
                                                updateInfo(value, this.options);
                                            }
                                        });

                                    });
                                </script>
                                <div class="mb-4 text-start">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <span>🔘</span>Status obiektu
                                    </label>

                                    <div class="grid min-w-0 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mt-2">

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = \App\Models\WorkObject::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="block min-w-0 cursor-pointer">
                                                <input type="radio" name="status" value="<?php echo e($status); ?>" class="peer sr-only" <?php echo e(old('status', $object->status) === $status ? 'checked' : ''); ?>>
                                                <?php if (isset($component)) { $__componentOriginal874718d34543f77402a854255bc80739 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal874718d34543f77402a854255bc80739 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.status-card','data' => ['status' => $status,'selectable' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.status-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status),'selectable' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal874718d34543f77402a854255bc80739)): ?>
<?php $attributes = $__attributesOriginal874718d34543f77402a854255bc80739; ?>
<?php unset($__attributesOriginal874718d34543f77402a854255bc80739); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal874718d34543f77402a854255bc80739)): ?>
<?php $component = $__componentOriginal874718d34543f77402a854255bc80739; ?>
<?php unset($__componentOriginal874718d34543f77402a854255bc80739); ?>
<?php endif; ?>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['status'];
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

                                <div class="grid min-w-0 grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

                                    <div class="mb-4 text-start">
                                        <label for="datetime_start"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                                            Data rozpoczęcia</label>
                                        <input type="text" id="datetime_start" name="datetime_start" value="<?php echo e(old('datetime_start', $object->starts_at?->format('d.m.Y H:i'))); ?>"
                                            placeholder="DD.MM.YYYY HH:MM"
                                            class="h-[46px] placeholder-gray-400 mt-2 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-600 dark:border-gray-600 dark:text-gray-100 !text-lg !leading-7 !pl-3">
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
                                    <div class="mb-4 text-start">
                                        <label for="datetime_end"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                                            Data
                                            zakończenia</label>
                                        <input type="text" id="datetime_end" name="datetime_end" value="<?php echo e(old('datetime_end', $object->ends_at?->format('d.m.Y H:i'))); ?>"
                                            placeholder="DD.MM.YYYY HH:MM"
                                            class="h-[46px] placeholder-gray-400 mt-2 block w-full p-2 border border-gray-300 rounded-md shadow focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-600 dark:border-gray-600 dark:text-gray-100 !text-lg !leading-7 !pl-3">
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
                                            });

                                            endPicker = flatpickr("#datetime_end", {
                                                enableTime: true,
                                                dateFormat: "d.m.Y H:i",
                                                time_24hr: true
                                            });

                                        });
                                    </script>
                                </div>
                                <div class="mb-4 text-start">

                                    <label for="allowed_distance"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <span>📏</span>Maksymalna odległość od obiektu
                                    </label>

                                    <div class="relative mt-2 flex h-[46px]">

                                        
                                        <button type="button" id="allowed-distance-minus" class="shrink-0 w-12 flex items-center justify-center
                border border-gray-300 dark:border-gray-600
                bg-gray-100 dark:bg-gray-700
                text-gray-600 dark:text-gray-300
                hover:bg-gray-200 dark:hover:bg-gray-600
                rounded-l-md transition-colors">

                                            <i class="fa-solid fa-minus"></i>
                                        </button>

                                        
                                        <div class="relative min-w-0 flex-1">

                                            <input type="number" id="allowed_distance" name="allowed_distance"
                                                value="<?php echo e(old('allowed_distance', $object->allowed_distance)); ?>" min="1" max="10000" step="1"
                                                required class="h-[46px] block w-full
                    border-y border-gray-300 dark:border-gray-600
                    bg-white dark:bg-gray-600
                    text-center
                    shadow
                    focus:ring-blue-500 focus:border-blue-500
                    sm:text-sm dark:text-gray-100
                    !text-lg !leading-7
                    pr-10">

                                            <span class="absolute inset-y-0 right-3 flex items-center
                    text-sm font-medium text-gray-500 dark:text-gray-400
                    pointer-events-none [@media(prefers-color-scheme:light)]:text-gray-600">
                                                m
                                            </span>

                                        </div>

                                        
                                        <button type="button" id="allowed-distance-plus" class="shrink-0 w-12 flex items-center justify-center
                border border-gray-300 dark:border-gray-600
                bg-gray-100 dark:bg-gray-700
                text-gray-600 dark:text-gray-300
                hover:bg-gray-200 dark:hover:bg-gray-600
                rounded-r-md transition-colors">

                                            <i class="fa-solid fa-plus"></i>
                                        </button>

                                    </div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 [@media(prefers-color-scheme:light)]:text-gray-600">
                                        Maksymalna odległość od lokalizacji obiektu, w której pracownik może rozpocząć
                                        lub zakończyć pracę.
                                    </p>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['allowed_distance'];
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
                                    $('#allowed-distance-minus').on('click', function () {
                                        const input = $('#allowed_distance');
                                        const value = parseInt(input.val()) || 1;

                                        input.val(Math.max(1, value - 1)).trigger('change');
                                    });

                                </script>

                            </div>

                        </div>


                        
                        
                        

                        <div class="min-w-0 overflow-hidden rounded-2xl bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">

                            <div class="flex items-center gap-3 border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                                <div
                                    class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-note-sticky text-lg sm:text-2xl" aria-hidden="true"></i>
                                </div>

                                <div>
                                    <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                        Dodatkowe informacje
                                    </h2>

                                    <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                        Notatki i informacje pomocne przy obsłudze obiektu
                                    </p>
                                </div>

                            </div>

                            <div class="p-4 text-start">

                                <label for="editor"
                                    class="pb-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                    <span>📝</span> Notatka
                                </label>
                                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css"
                                    rel="stylesheet">
                                <style>
                                    #editor {
                                        border: 1px solid #d1d5db;
                                        border-radius: 0.5rem;
                                        background-color: #fff;
                                        color: #111827;
                                        transition: border-color 150ms ease, box-shadow 150ms ease;
                                    }

                                    #editor:focus-within {
                                        border-color: #22c55e;
                                        box-shadow: 0 0 0 1px #22c55e;
                                    }

                                    .ql-toolbar {
                                        border: 1px solid #d1d5db !important;
                                        background-color: #fff;
                                        border-radius: 0.5rem;
                                        overflow-y: auto;
                                        padding: 8px 12px !important;
                                        margin: 0 !important;
                                        min-height: 46px !important;
                                        margin-bottom: 16px !important;
                                    }

                                    .ql-editor {
                                        background-color: #fff;
                                        color: #111827;
                                        padding: 8px 12px !important;
                                        font-size: 1.125rem !important;
                                        line-height: 1.75rem !important;
                                        min-height: 46px !important;
                                    }

                                    @media (prefers-color-scheme: dark) {
                                        #editor {
                                            border-color: #4b5563;
                                            background-color: #4b5563;
                                            color: #f3f4f6;
                                        }

                                        .ql-toolbar {
                                            background-color: rgb(75 85 99 / var(--tw-bg-opacity)) !important;
                                            border-color: #4b5563 !important;
                                        }

                                        .ql-editor {
                                            background-color: rgb(75 85 99 / var(--tw-bg-opacity)) !important;
                                            color: #f3f4f6;
                                        }

                                        .ql-editor.ql-blank::before {
                                            color: #9ca3af;
                                            /* Tailwind gray-400 */
                                        }

                                        .ql-toolbar {
                                            background-color: rgb(75 85 99 / var(--tw-bg-opacity)) !important;
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
                                    class="h-64 overflow-y-auto">

                                </div>

                                <textarea id="editor-content" name="content" style="display:none;"><?php echo e(old('content', $object->description)); ?></textarea>
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
                                    quill.clipboard.dangerouslyPasteHTML(document.getElementById('editor-content').value);
                                    // Synchronizuj zawartość edytora z ukrytym polem tekstowym
                                    document.getElementById('myForm').onsubmit = function () {
                                        var editorContent = document.getElementById('editor-content');
                                        editorContent.value = quill.root.innerHTML;
                                    };
                                </script>

                            </div>

                        </div>

                    </div>


                    
                    
                    

                    <div class="space-y-4">


                        
                        
                        

                        <div class="min-w-0 overflow-hidden rounded-2xl bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">

                            <div class="flex items-center justify-between border-b border-gray-600 px-5 py-4 [@media(prefers-color-scheme:light)]:border-gray-300">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                        <i class="fa-solid fa-location-dot text-lg sm:text-2xl" aria-hidden="true"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                            Lokalizacja obiektu
                                        </h2>

                                        <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                            Znajdź w Google Maps
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <div class="p-5 !text-start">
                                <style>
                                    #object-location-search {
                                        width: 100%;
                                    }

                                    #object-location-search gmp-place-autocomplete {
                                        display: block;
                                        width: 100%;

                                        /*
         * WIBEST
         */
                                        --gmpx-color-surface: #4b5563;
                                        --gmpx-color-on-surface: #f3f4f6;
                                        --gmpx-color-on-surface-variant: #9ca3af;
                                        --gmpx-color-primary: #86efac;

                                        --gmpx-font-family-base: Lato, sans-serif;
                                        --gmpx-font-size-base: 12px;

                                        /*
         * Rozmiar
         */

                                        height: 46px;

                                        /*
         * Obramowanie
         */
                                        border-radius: 0.5rem;

                                        /*
         * Tło
         */
                                        background-color: #4b5563;

                                        /*
         * Animacja
         */
                                        transition:
                                            border-color 150ms ease,
                                            box-shadow 150ms ease;
                                        font-size: 1.125rem !important;
                                        line-height: 1.75rem !important;
                                    }

                                    /*
    |--------------------------------------------------------------------------
    | FOCUS
    |--------------------------------------------------------------------------
    */

                                    #object-location-search gmp-place-autocomplete:focus-within {

                                        border-color: rgb(134 239 172 / 0.5);

                                        outline: none;

                                        box-shadow: none;
                                    }

                                    /*
    |--------------------------------------------------------------------------
    | HOVER
    |--------------------------------------------------------------------------
    */

                                    #object-location-search gmp-place-autocomplete:hover {

                                        border-color: #6b7280;
                                    }

                                    /*
    |--------------------------------------------------------------------------
    | FOCUS + HOVER
    |--------------------------------------------------------------------------
    */

                                    #object-location-search gmp-place-autocomplete:focus-within:hover {

                                        border-color: rgb(134 239 172 / 0.5);
                                    }
                                </style>
                                
                                <div id="object-location-search"></div>

                                
                                <div id="object-map"
                                    class="mt-4 h-[280px] overflow-hidden rounded-xl border border-gray-600 bg-gray-900 [@media(prefers-color-scheme:light)]:border-gray-300 [@media(prefers-color-scheme:light)]:bg-gray-100">
                                </div>

                                
                                <input type="hidden" name="latitude" id="latitude" value="<?php echo e(old('latitude', $object->location?->latitude)); ?>">
                                <input type="hidden" name="longitude" id="longitude" value="<?php echo e(old('longitude', $object->location?->longitude)); ?>">
                                <input type="hidden" name="formatted_address" id="formatted_address"
                                    value="<?php echo e(old('formatted_address', $object->location?->address)); ?>">
                                <input type="hidden" name="place_id" id="place_id" value="<?php echo e(old('place_id')); ?>">

                            </div>
                            <script>
                                let objectMap = null;
                                let objectMarker = null;
                                let objectRadiusCircle = null;
                                let objectAutocomplete = null;
                                function updateObjectRadiusCircle(position = null) {
                                    if (!objectMap) {
                                        return;
                                    }

                                    // Jeżeli nie przekazano pozycji, spróbuj pobrać ją z markera
                                    if (!position && objectMarker) {
                                        if (objectMarker.position) {
                                            position = objectMarker.position;
                                        } else if (typeof objectMarker.getPosition === 'function') {
                                            position = objectMarker.getPosition();
                                        }
                                    }

                                    if (!position) {
                                        return;
                                    }

                                    const distance = Math.max(
                                        1,
                                        parseInt($('#allowed_distance').val()) || 1
                                    );

                                    if (objectRadiusCircle) {

                                        objectRadiusCircle.setCenter(position);
                                        objectRadiusCircle.setRadius(distance);
                                        objectRadiusCircle.setMap(objectMap);

                                        console.log(
                                            `WIBEST: obszar ${distance} m`
                                        );

                                        return;
                                    }

                                    objectRadiusCircle = new google.maps.Circle({
                                        map: objectMap,
                                        center: position,
                                        radius: distance,

                                        fillColor: '#86EFAC',
                                        fillOpacity: 0.15,

                                        strokeColor: '#86EFAC',
                                        strokeOpacity: 0.8,
                                        strokeWeight: 2,

                                        clickable: false
                                    });

                                    console.log(
                                        `WIBEST: utworzono obszar ${distance} m`
                                    );
                                }
                                function initObjectLocation() {
                                    console.log(
                                        'WIBEST: inicjalizacja Google Maps'
                                    );

                                    const mapElement =
                                        document.getElementById('object-map');

                                    const searchContainer =
                                        document.getElementById(
                                            'object-location-search'
                                        );

                                    if (!mapElement || !searchContainer) {
                                        console.error(
                                            'WIBEST: brak #object-map lub #object-location-search'
                                        );

                                        return;
                                    }

                                    if (
                                        typeof google === 'undefined' ||
                                        typeof google.maps === 'undefined'
                                    ) {
                                        console.error(
                                            'WIBEST: Google Maps API nie jest dostępne'
                                        );

                                        return;
                                    }

                                    const defaultPosition = {
                                        lat: 50.2649,
                                        lng: 19.0238
                                    };

                                    const latitudeInput =
                                        document.getElementById('latitude');

                                    const longitudeInput =
                                        document.getElementById('longitude');

                                    const oldLatitude =
                                        latitudeInput
                                            ? parseFloat(latitudeInput.value)
                                            : NaN;

                                    const oldLongitude =
                                        longitudeInput
                                            ? parseFloat(longitudeInput.value)
                                            : NaN;

                                    const hasOldLocation =
                                        Number.isFinite(oldLatitude) &&
                                        Number.isFinite(oldLongitude);

                                    const initialPosition =
                                        hasOldLocation
                                            ? {
                                                lat: oldLatitude,
                                                lng: oldLongitude
                                            }
                                            : defaultPosition;

                                    try {
                                        objectMap =
                                            new google.maps.Map(
                                                mapElement,
                                                {
                                                    center: initialPosition,

                                                    zoom:
                                                        hasOldLocation
                                                            ? 17
                                                            : 10,

                                                    mapTypeControl: false,
                                                    streetViewControl: false,
                                                    fullscreenControl: false,

                                                    mapId: 'DEMO_MAP_ID'
                                                }
                                            );

                                        console.log(
                                            'WIBEST: mapa utworzona'
                                        );

                                        /*
                                         * --------------------------------------------------
                                         * ISTNIEJĄCA LOKALIZACJA
                                         * --------------------------------------------------
                                         */

                                        if (hasOldLocation) {

                                            if (
                                                google.maps.marker &&
                                                google.maps.marker.AdvancedMarkerElement
                                            ) {
                                                objectMarker =
                                                    new google.maps.marker.AdvancedMarkerElement({
                                                        map: objectMap,
                                                        position: initialPosition
                                                    });

                                                console.log(
                                                    'WIBEST: utworzono AdvancedMarkerElement'
                                                );

                                            } else if (
                                                google.maps.Marker
                                            ) {
                                                objectMarker =
                                                    new google.maps.Marker({
                                                        map: objectMap,
                                                        position: initialPosition
                                                    });

                                                console.log(
                                                    'WIBEST: utworzono klasyczny Marker'
                                                );
                                            }

                                            /*
                                             * Okrąg 100 m wokół istniejącej lokalizacji
                                             */
                                            updateObjectRadiusCircle(
                                                initialPosition
                                            );
                                        }

                                        /*
                                         * --------------------------------------------------
                                         * PLACES
                                         * --------------------------------------------------
                                         */

                                        if (
                                            typeof google.maps.places ===
                                            'undefined'
                                        ) {
                                            console.error(
                                                'WIBEST: biblioteka Places nie jest dostępna'
                                            );

                                            return;
                                        }

                                        if (
                                            typeof google.maps.places
                                                .PlaceAutocompleteElement ===
                                            'undefined'
                                        ) {
                                            console.error(
                                                'WIBEST: PlaceAutocompleteElement nie jest dostępny'
                                            );

                                            return;
                                        }

                                        objectAutocomplete =
                                            new google.maps.places
                                                .PlaceAutocompleteElement();

                                        objectAutocomplete.includedRegionCodes = [
                                            'pl'
                                        ];

                                        objectAutocomplete.placeholder =
                                            'Wpisz adres obiektu...';

                                        searchContainer.innerHTML = '';

                                        searchContainer.appendChild(
                                            objectAutocomplete
                                        );

                                        console.log(
                                            'WIBEST: PlaceAutocompleteElement gotowe'
                                        );

                                        /*
                                         * --------------------------------------------------
                                         * WYBÓR ADRESU
                                         * --------------------------------------------------
                                         */

                                        objectAutocomplete.addEventListener(
                                            'gmp-select',
                                            async function (event) {

                                                try {
                                                    console.log(
                                                        'WIBEST: wybrano miejsce:',
                                                        event
                                                    );

                                                    const placePrediction =
                                                        event.placePrediction;

                                                    if (!placePrediction) {
                                                        console.error(
                                                            'WIBEST: brak placePrediction'
                                                        );

                                                        return;
                                                    }

                                                    const place =
                                                        placePrediction.toPlace();

                                                    /*
                                                     * Pobieramy dane miejsca
                                                     */
                                                    await place.fetchFields({
                                                        fields: [
                                                            'id',
                                                            'displayName',
                                                            'formattedAddress',
                                                            'location',
                                                            'viewport'
                                                        ]
                                                    });

                                                    console.log(
                                                        'WIBEST: dane miejsca:',
                                                        place
                                                    );

                                                    if (!place.location) {
                                                        console.error(
                                                            'WIBEST: wybrane miejsce nie posiada współrzędnych'
                                                        );

                                                        return;
                                                    }

                                                    const latitude =
                                                        place.location.lat();

                                                    const longitude =
                                                        place.location.lng();

                                                    const position = {
                                                        lat: latitude,
                                                        lng: longitude
                                                    };

                                                    /*
                                                     * --------------------------------------------------
                                                     * POLA FORMULARZA
                                                     * --------------------------------------------------
                                                     */

                                                    const latitudeField =
                                                        document.getElementById(
                                                            'latitude'
                                                        );

                                                    const longitudeField =
                                                        document.getElementById(
                                                            'longitude'
                                                        );

                                                    const formattedAddressField =
                                                        document.getElementById(
                                                            'formatted_address'
                                                        );

                                                    const placeIdField =
                                                        document.getElementById(
                                                            'place_id'
                                                        );

                                                    /*
                                                     * Latitude
                                                     */
                                                    if (latitudeField) {
                                                        latitudeField.value =
                                                            latitude;

                                                        latitudeField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * Longitude
                                                     */
                                                    if (longitudeField) {
                                                        longitudeField.value =
                                                            longitude;

                                                        longitudeField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * Adres
                                                     */
                                                    if (
                                                        formattedAddressField
                                                    ) {
                                                        formattedAddressField.value =
                                                            place.formattedAddress ||
                                                            '';

                                                        formattedAddressField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * Place ID
                                                     */
                                                    if (placeIdField) {
                                                        placeIdField.value =
                                                            place.id || '';

                                                        placeIdField.dispatchEvent(
                                                            new Event(
                                                                'input',
                                                                {
                                                                    bubbles: true
                                                                }
                                                            )
                                                        );
                                                    }

                                                    /*
                                                     * --------------------------------------------------
                                                     * MAPA / ZOOM
                                                     * --------------------------------------------------
                                                     */

                                                    if (place.viewport) {

                                                        objectMap.fitBounds(
                                                            place.viewport
                                                        );

                                                        console.log(
                                                            'WIBEST: zastosowano viewport miejsca'
                                                        );

                                                    } else {

                                                        objectMap.setCenter(
                                                            position
                                                        );

                                                        objectMap.setZoom(
                                                            17
                                                        );

                                                        console.log(
                                                            'WIBEST: zastosowano zoom 17'
                                                        );
                                                    }

                                                    /*
                                                     * --------------------------------------------------
                                                     * MARKER
                                                     * --------------------------------------------------
                                                     */

                                                    if (objectMarker) {

                                                        /*
                                                         * AdvancedMarkerElement
                                                         */
                                                        if (
                                                            google.maps.marker &&
                                                            google.maps.marker
                                                                .AdvancedMarkerElement &&
                                                            objectMarker instanceof
                                                            google.maps.marker
                                                                .AdvancedMarkerElement
                                                        ) {

                                                            objectMarker.position =
                                                                position;

                                                            objectMarker.map =
                                                                objectMap;

                                                            console.log(
                                                                'WIBEST: przesunięto AdvancedMarkerElement'
                                                            );

                                                            /*
                                                             * Klasyczny Marker
                                                             */
                                                        } else if (
                                                            objectMarker instanceof
                                                            google.maps.Marker
                                                        ) {

                                                            objectMarker.setPosition(
                                                                position
                                                            );

                                                            objectMarker.setMap(
                                                                objectMap
                                                            );

                                                            console.log(
                                                                'WIBEST: przesunięto Marker'
                                                            );
                                                        }

                                                    } else {

                                                        /*
                                                         * Tworzymy AdvancedMarkerElement
                                                         */
                                                        if (
                                                            google.maps.marker &&
                                                            google.maps.marker
                                                                .AdvancedMarkerElement
                                                        ) {

                                                            objectMarker =
                                                                new google.maps
                                                                    .marker
                                                                    .AdvancedMarkerElement({
                                                                        map: objectMap,
                                                                        position: position
                                                                    });

                                                            console.log(
                                                                'WIBEST: utworzono AdvancedMarkerElement'
                                                            );

                                                            /*
                                                             * Fallback do klasycznego markera
                                                             */
                                                        } else if (
                                                            google.maps.Marker
                                                        ) {

                                                            objectMarker =
                                                                new google.maps.Marker({
                                                                    map: objectMap,
                                                                    position: position
                                                                });

                                                            console.log(
                                                                'WIBEST: utworzono Marker'
                                                            );
                                                        }
                                                    }

                                                    /*
                                                     * --------------------------------------------------
                                                     * OBSZAR 100 METRÓW
                                                     * --------------------------------------------------
                                                     */

                                                    updateObjectRadiusCircle(
                                                        position
                                                    );

                                                    /*
                                                     * --------------------------------------------------
                                                     * LOG
                                                     * --------------------------------------------------
                                                     */

                                                    console.log(
                                                        'WIBEST: lokalizacja ustawiona:',
                                                        {
                                                            latitude:
                                                                latitude,

                                                            longitude:
                                                                longitude,

                                                            address:
                                                                place.formattedAddress ||
                                                                '',

                                                            place_id:
                                                                place.id ||
                                                                '',

                                                            name:
                                                                place.displayName ||
                                                                '',

                                                            viewport:
                                                                place.viewport ||
                                                                null,

                                                            radius:
                                                                100
                                                        }
                                                    );
                                                    $('#name').val(place.displayName);

                                                } catch (error) {

                                                    console.error(
                                                        'WIBEST: błąd podczas wyboru miejsca:',
                                                        error
                                                    );
                                                }
                                            }
                                        );

                                        console.log(
                                            'WIBEST: Google Maps gotowe'
                                        );

                                    } catch (error) {

                                        console.error(
                                            'WIBEST: błąd podczas inicjalizacji Google Maps:',
                                            error
                                        );
                                    }
                                }

                                /*
                                 * ------------------------------------------------------
                                 * ŁADOWANIE GOOGLE MAPS API
                                 * ------------------------------------------------------
                                 */

                                (function loadGoogleMaps() {

                                    if (
                                        typeof google !== 'undefined' &&
                                        typeof google.maps !== 'undefined'
                                    ) {

                                        console.log(
                                            'WIBEST: Google Maps już załadowane'
                                        );

                                        initObjectLocation();

                                        return;
                                    }

                                    if (
                                        document.querySelector(
                                            'script[data-wibest-google-maps]'
                                        )
                                    ) {

                                        console.log(
                                            'WIBEST: Google Maps jest już w trakcie ładowania'
                                        );

                                        return;
                                    }

                                    const googleMapsScript =
                                        document.createElement('script');

                                    googleMapsScript.src =
                                        'https://maps.googleapis.com/maps/api/js' +
                                        '?key=<?php echo e(config('services.google.maps_key')); ?>' +
                                        '&libraries=places,marker';

                                    googleMapsScript.async = true;
                                    googleMapsScript.defer = true;

                                    googleMapsScript.dataset
                                        .wibestGoogleMaps = 'true';

                                    googleMapsScript.onload =
                                        function () {

                                            console.log(
                                                'WIBEST: Google Maps API załadowane'
                                            );

                                            initObjectLocation();
                                        };

                                    googleMapsScript.onerror =
                                        function () {

                                            console.error(
                                                'WIBEST: nie udało się załadować Google Maps API'
                                            );
                                        };

                                    document.head.appendChild(
                                        googleMapsScript
                                    );

                                })();
                                $('#allowed_distance').on('input change', function () {
                                    updateObjectRadiusCircle();
                                });
                                $('#allowed-distance-minus').on('click', function () {
                                    const input = $('#allowed_distance');
                                    const value = parseInt(input.val()) || 1;

                                    input.val(Math.max(1, value - 1)).trigger('change');
                                });

                                $('#allowed-distance-plus').on('click', function () {
                                    const input = $('#allowed_distance');
                                    const value = parseInt(input.val()) || 1;

                                    input.val(value + 1).trigger('change');
                                });
                            </script>

                        </div>



                        
                        
                        

                        <div class="min-w-0 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300">

                            <div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600 sm:flex-row sm:items-center sm:justify-between [@media(prefers-color-scheme:light)]:border-gray-300">

                                <div class="flex min-w-0 items-center gap-3">
                                <div
                                    class="shrink-0 flex w-11 sm:w-14 h-11 sm:h-14 rounded-xl sm:rounded-2xl items-center justify-center bg-gradient-to-br from-green-200 to-emerald-100 dark:from-green-500/20 dark:to-emerald-500/10 text-green-700 dark:text-green-300">
                                    <i class="fa-solid fa-users text-lg sm:text-2xl" aria-hidden="true"></i>
                                </div>

                                <div>
                                    <h2 class="text-start text-gray-900 dark:text-white text-sm font-semibold">
                                        Pracownicy
                                    </h2>

                                    <p class="text-start text-xs text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600">
                                        Osoby pracujące na tym obiekcie
                                    </p>
                                </div>

                                </div>
                                <div class="relative w-full shrink-0 sm:w-56">
                                    <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
                                    <input id="user-search" type="search" placeholder="Szukaj pracownika..." aria-label="Szukaj pracownika" aria-controls="users-list"
                                        class="h-9 w-full rounded-lg border border-gray-300 bg-gray-50 pl-9 pr-9 text-xs text-gray-900 placeholder:text-gray-500 outline-none transition focus:border-green-600 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-100 dark:placeholder:text-gray-300 dark:focus:border-green-300/50 dark:focus:ring-green-300/50">
                                </div>
                            </div>


                            <div class="p-5">
                                

                                <div id="users-list" class="max-h-[330px] divide-y divide-gray-200 overflow-y-auto pr-1 dark:divide-gray-600">

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div data-employee-selection-row class="flex cursor-pointer flex-row items-center transition-all duration-200 hover:rounded-xl [&:hover:not(:has(:checked))]:bg-gray-50 dark:[&:hover:not(:has(:checked))]:bg-gray-600 focus-within:rounded-xl focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-300 has-[:checked]:rounded-xl has-[:checked]:bg-green-300/20 [&:has(:checked):hover]:bg-green-300/30 has-[:checked]:ring-1 has-[:checked]:ring-inset has-[:checked]:ring-green-300">
                                            <div class="sr-only">
                                                <input type="checkbox" name="users[]" value="<?php echo e($user->id); ?>" <?php if(in_array($user->id, old('users', $object->exists ? $object->users->modelKeys() : []))): echo 'checked'; endif; ?>
                                                    aria-label="<?php echo e($user->name); ?>"
                                                    class="sr-only"
                                                    data-id="<?php echo e($user->id); ?>">
                                            </div>
                                            <div
                                                class="min-w-0 px-3 py-3 text-gray-600 dark:text-gray-300 flex justify-start items-center gap-2 font-semibold uppercase tracking-widest">
                                                <?php if (isset($component)) { $__componentOriginal0ec60cafe8916e858762140c74715406 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ec60cafe8916e858762140c74715406 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-photo','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-photo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $attributes = $__attributesOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__attributesOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ec60cafe8916e858762140c74715406)): ?>
<?php $component = $__componentOriginal0ec60cafe8916e858762140c74715406; ?>
<?php unset($__componentOriginal0ec60cafe8916e858762140c74715406); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-name','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $attributes = $__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__attributesOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55)): ?>
<?php $component = $__componentOriginal590152d7e93f2a6ba04de164b0aa0e55; ?>
<?php unset($__componentOriginal590152d7e93f2a6ba04de164b0aa0e55); ?>
<?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                        <div class="py-8 text-center">

                                            <i class="fa-solid fa-users-slash text-xl text-gray-600"></i>

                                            <p class="mt-2 text-xs text-gray-500 [@media(prefers-color-scheme:light)]:text-gray-600">
                                                Brak pracowników
                                            </p>

                                        </div>

                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                </div>


                                <div class="mt-4 flex items-center justify-between border-t border-gray-200 pt-4 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300">

                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                        Wybrano
                                    </span>

                                    <span id="selected-users-count" class="text-sm font-semibold text-green-800 dark:text-green-300">
                                        0 pracowników
                                    </span>

                                </div>

                            </div>

                        </div>


                    </div>

                </div>


                
                
                

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

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const list = document.getElementById('users-list');
                    const updateCount = () => document.getElementById('selected-users-count').textContent =
                        list.querySelectorAll('input:checked').length + ' pracowników';
                    list.addEventListener('change', updateCount);
                    list.addEventListener('click', function (event) {
                        if (event.target.closest('input, label, a, button, select, textarea, [role="button"]')) return;
                        const row = event.target.closest('[data-employee-selection-row]');
                        if (!row || !list.contains(row)) return;
                        const checkbox = row.querySelector('input[type="checkbox"]');
                        if (checkbox && !checkbox.disabled) checkbox.click();
                    });
                    updateCount();
                    document.getElementById('user-search').addEventListener('input', function () {
                        const term = this.value.toLocaleLowerCase('pl');
                        list.querySelectorAll(':scope > div').forEach(row => {
                            row.style.display = row.textContent.toLocaleLowerCase('pl').includes(term) ? '' : 'none';
                        });
                    });
                });
            </script>

<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\partials\form-fields.blade.php ENDPATH**/ ?>