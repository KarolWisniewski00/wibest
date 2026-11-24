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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-link-back','data' => ['href' => ''.e(route('setting.crm')).'','class' => 'text-lg mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-link-back'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('setting.crm')).'','class' => 'text-lg mb-4']); ?>
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
                <span>🚀</span> Nowa Aktywność
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
            <form id="myForm" method="POST" action="<?php echo e(route('setting.crm.store')); ?>" class="space-y-4">
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
                <div class="mt-2">
                    <label for="company"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>🏢</span> Nazwa firmy
                    </label>
                    <select id="company" name="company" autocomplete="off" class="mt-2 rounded-lg text-lg">
                        <option value="">Wybierz firmę</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($company['id']); ?>" data-description="<?php echo e($company['description']); ?>">
                                🏢 <?php echo e($company['name']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>

                <div class="mt-2">
                    <label for="user"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>👤</span> Użytkownik
                    </label>
                    <select id="user" name="user" autocomplete="off" class="mt-2 rounded-lg text-lg">
                        <option value="">Wybierz użytkownika</option>
                    </select>
                </div>

                <script>
                    $(document).ready(function () {
                        // inicjalizacja TomSelect
                        let companySelect = new TomSelect('#company', {
                            maxItems: 1,
                            render: {
                                option: function (data, escape) {
                                    return `
                                    <div class="px-3 py-2 dark:bg-gray-700 dark:text-white">
                                        <div class="text-lg">${escape(data.text)}</div>
                                        <div class="opacity-70 text-xs">${escape(data.description || '')}</div>
                                    </div>
                                `;
                                },
                                item: function (data, escape) {
                                    return `<div>${escape(data.text)}</div>`;
                                }
                            },
                            onChange: function (value) {
                                loadUsers(value);
                            }
                        });

                        let userSelect = new TomSelect('#user', {
                            maxItems: 1,
                            render: {
                                option: function (data, escape) {
                                    // generowanie inicjałów
                                    let initials = data.text
                                        .split(' ')
                                        .filter(w => w.length)
                                        .map(w => w[0].toUpperCase())
                                        .join('+');

                                    let roleClass = '';
                                    let role = '';
                                    console.log(data);
                                    switch (data.role) {
                                        case 'admin': roleClass = 'green'; role = 'admin'; break;
                                        case 'menedżer': roleClass = 'cello'; role = 'menedżer'; break;
                                        case 'kierownik': roleClass = 'yellow'; role = 'kierownik'; break;
                                        case 'użytkownik': roleClass = 'gray'; role = 'użytkownik'; break;
                                        case 'właściciel': roleClass = 'rose'; role = 'właściciel'; break;
                                        case 'CRM': roleClass = 'rose'; role = 'CRM'; break;
                                        default: roleClass = 'violet'; role = 'brak roli';
                                    }

                                    return `
                                    <div class="px-3 py-2 dark:bg-gray-700 dark:text-white">
                                        <div class="flex flex-row gap-2 text-lg">
                                            <img src="https://ui-avatars.com/api/?name=${escape(initials)}&amp;color=7F9CF5&amp;background=EBF4FF" alt="${escape(data.text)}" class="flex-shrink-0 w-10 h-10 rounded-full">
                                            <?php if (isset($component)) { $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-gray','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-gray'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                ${escape(data.text)}
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $attributes = $__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__attributesOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c)): ?>
<?php $component = $__componentOriginal32ac5730dc9de9dee8b27ff64e45873c; ?>
<?php unset($__componentOriginal32ac5730dc9de9dee8b27ff64e45873c); ?>
<?php endif; ?>
                                            <div class="flex items-center gap-2 text-start">
                                                <span class="px-1 md:px-2 py-0.5 rounded-full text-[0.5rem] md:text-xs font-semibold bg-${roleClass}-300 dark:bg-${roleClass}-300 text-gray-900 dark:text-gray-900 uppercase tracking-widest">
                                                    ${escape(role)}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                },
                                item: function (data, escape) {
                                    return `<div>${escape(data.text)}</div>`;
                                }
                            }
                        });

                        // funkcja ładowania użytkowników
                        function loadUsers(companyId) {
                            if (!companyId) {
                                userSelect.clearOptions(); // jeśli nie ma firmy, czyść
                                return;
                            }

                            $.ajax({
                                url: `<?php echo e(route('api.v1.setting.client.users', '')); ?>/${companyId}`,
                                method: 'GET',
                                success: function (data) {
                                    userSelect.clear();
                                    // czyścimy stare opcje
                                    userSelect.clearOptions();

                                    // dodajemy nowe
                                    data.forEach(user => {
                                        userSelect.addOption({
                                            value: user.id,
                                            text: user.name,
                                            role: user.role
                                        });
                                    });

                                    // odśwież dropdown
                                    userSelect.refreshOptions(false);
                                },
                                error: function (xhr) {
                                    console.error('Błąd:', xhr.responseText);
                                }
                            });
                        }
                    });
                </script>
                <!--Typ-->
                <div class="mt-2">
                    <div class="mt-2">
                        <label for="type"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                            <span>🏷️</span> Typ
                        </label>
                        <select id="type" name="type" multiple autocomplete="off" placeholder="Wybierz typ"
                            class="mt-2 rounded-lg text-lg">
                            <option value="spotkanie" data-description="Spotkanie z klientem">
                                👤 Spotkanie
                            </option>
                            <option value="telefon" data-description="Rozmowa telefoniczna z klientem">
                                📱 Telefon
                            </option>
                            <option value="mail" data-description="Wiadomość e-mail do klienta">
                                📧 E-mail
                            </option>
                            <option value="oferta" data-description="Przesłanie oferty do klienta">
                                🛒 Oferta
                            </option>
                            <option value="follow_up" data-description="Follow up">
                                🔄 Follow up
                            </option>
                            <option value="inne" data-description="Inne">
                                📌 inne
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
                <div id="editor" class="bg-white dark:bg-gray-700 dark:text-white rounded-md h-64 overflow-y-auto">

                </div>

                <textarea id="editor-content" name="content" style="display:none;"></textarea>
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
                <div class="mb-6">
                    <label for="datetime_start" class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅
                        Data rozpoczęcia</label>
                    <input type="text" id="datetime_start" name="datetime_start" placeholder="DD.MM.YYYY HH:MM" required
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
                <div class="mb-6">
                    <label for="datetime_end" class="block text-sm font-medium text-gray-700 dark:text-gray-300">📅 Data
                        zakończenia</label>
                    <input type="text" id="datetime_end" name="datetime_end" placeholder="DD.MM.YYYY HH:MM" required
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

                <div class="mt-2 flex flex-col">
                    <label for="company"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>✅</span> Czy już realizowane?
                    </label>
                    <!-- Resetuj urlopy planowane -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" checked name="already_realized" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Zrealizowane
                        </span>
                    </label>
                    <label for="company"
                        class=" mt-2 block text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-1">
                        <span>❗</span> Czy pilne?
                    </label>
                    <!-- Resetuj urlopy planowane -->
                    <label class="inline-flex items-center cursor-pointer mt-2">
                        <input type="checkbox" name="important" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                        peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white
                        after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white
                        after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                        peer-checked:bg-green-300 dark:peer-checked:bg-green-300 cursor-pointer"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Pilne
                        </span>
                    </label>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\crm\create.blade.php ENDPATH**/ ?>