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
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company): ?>
        <!--SIDE BAR-->
        <?php if (isset($component)) { $__componentOriginal93e260becef192ebdfafc9d931a5f07f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93e260becef192ebdfafc9d931a5f07f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar-left','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal33e4867731ced0462908f8cc78d5ea1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $attributes = $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $component = $__componentOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal7219ead2535a81e5eac025398deddfb8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7219ead2535a81e5eac025398deddfb8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-date','data' => ['loader' => 'attendance']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['loader' => 'attendance']); ?>
                <?php echo e(route('api.v1.raport.attendance-sheet.set.date')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7219ead2535a81e5eac025398deddfb8)): ?>
<?php $attributes = $__attributesOriginal7219ead2535a81e5eac025398deddfb8; ?>
<?php unset($__attributesOriginal7219ead2535a81e5eac025398deddfb8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7219ead2535a81e5eac025398deddfb8)): ?>
<?php $component = $__componentOriginal7219ead2535a81e5eac025398deddfb8; ?>
<?php unset($__componentOriginal7219ead2535a81e5eac025398deddfb8); ?>
<?php endif; ?>
            <input type="hidden" id="start_date" value="<?php echo e($startDate); ?>">
            <input type="hidden" id="end_date" value="<?php echo e($endDate); ?>">
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $attributes = $__attributesOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__attributesOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93e260becef192ebdfafc9d931a5f07f)): ?>
<?php $component = $__componentOriginal93e260becef192ebdfafc9d931a5f07f; ?>
<?php unset($__componentOriginal93e260becef192ebdfafc9d931a5f07f); ?>
<?php endif; ?>
        <!--SIDE BAR-->
        <?php if (isset($component)) { $__componentOriginal27ace535957143cef069f9d3d7f387f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ace535957143cef069f9d3d7f387f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal05a0340e4dade378a9c74c9ec2899536 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05a0340e4dade378a9c74c9ec2899536 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.raport.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('raport.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05a0340e4dade378a9c74c9ec2899536)): ?>
<?php $attributes = $__attributesOriginal05a0340e4dade378a9c74c9ec2899536; ?>
<?php unset($__attributesOriginal05a0340e4dade378a9c74c9ec2899536); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05a0340e4dade378a9c74c9ec2899536)): ?>
<?php $component = $__componentOriginal05a0340e4dade378a9c74c9ec2899536; ?>
<?php unset($__componentOriginal05a0340e4dade378a9c74c9ec2899536); ?>
<?php endif; ?>
            <!--HEADER-->
            <?php if (isset($component)) { $__componentOriginal9a45c04d77d50dfec4b93c1cf60d7ced = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a45c04d77d50dfec4b93c1cf60d7ced = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.raport.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('raport.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <span>🕜</span> Ewidencja czasu pracy
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a45c04d77d50dfec4b93c1cf60d7ced)): ?>
<?php $attributes = $__attributesOriginal9a45c04d77d50dfec4b93c1cf60d7ced; ?>
<?php unset($__attributesOriginal9a45c04d77d50dfec4b93c1cf60d7ced); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a45c04d77d50dfec4b93c1cf60d7ced)): ?>
<?php $component = $__componentOriginal9a45c04d77d50dfec4b93c1cf60d7ced; ?>
<?php unset($__componentOriginal9a45c04d77d50dfec4b93c1cf60d7ced); ?>
<?php endif; ?>
            <!--HEADER-->
            <?php if (isset($component)) { $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-cello','data' => ['id' => 'show-filter','class' => 'mb-4 mx-4 md:m-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status-cello'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'show-filter','class' => 'mb-4 mx-4 md:m-4']); ?>
                <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')); ?> -
                <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $attributes = $__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__attributesOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925)): ?>
<?php $component = $__componentOriginal36afbd0ecd1d57b3e1ff185230d70925; ?>
<?php unset($__componentOriginal36afbd0ecd1d57b3e1ff185230d70925); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalb8699e4e7a3578705820a3da45318887 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb8699e4e7a3578705820a3da45318887 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content','data' => ['class' => 'rounded-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'rounded-lg']); ?>
                <!--PC VIEW-->
                <?php
                    $baseHeaders = [
                        'Nazwa',
                        'Zaplanowany czas pracy',
                        'Wnioski + Czas pracy',
                        'Czas pracy',
                        'Nadgodziny',
                        'Brak normy',
                        'Wnioski',
                    ];

                    $shortTypes = config('leavetypes.shortType', []);

                    $headers = array_merge($baseHeaders, array_keys($shortTypes));
                ?>
                <?php if (isset($component)) { $__componentOriginal5c15305a5a5fa986fcf15cc89d75ecb3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c15305a5a5fa986fcf15cc89d75ecb3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-sheet','data' => ['headers' => $headers,'items' => $users,'radio' => true,'showMobile' => true,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table-sheet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($headers),'items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users),'radio' => true,'showMobile' => true,'emptyMessage' => 'Brak użytkowników do wyświetlenia.']); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal1851248abe743ac86c156a7d9da5e35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1851248abe743ac86c156a7d9da5e35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.row-attendance','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('row-attendance'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1851248abe743ac86c156a7d9da5e35a)): ?>
<?php $attributes = $__attributesOriginal1851248abe743ac86c156a7d9da5e35a; ?>
<?php unset($__attributesOriginal1851248abe743ac86c156a7d9da5e35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1851248abe743ac86c156a7d9da5e35a)): ?>
<?php $component = $__componentOriginal1851248abe743ac86c156a7d9da5e35a; ?>
<?php unset($__componentOriginal1851248abe743ac86c156a7d9da5e35a); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal1e38660a906e69b451438560ec9a2184 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1e38660a906e69b451438560ec9a2184 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-attendance','data' => ['id' => 'loader']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-attendance'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'loader']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1e38660a906e69b451438560ec9a2184)): ?>
<?php $attributes = $__attributesOriginal1e38660a906e69b451438560ec9a2184; ?>
<?php unset($__attributesOriginal1e38660a906e69b451438560ec9a2184); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1e38660a906e69b451438560ec9a2184)): ?>
<?php $component = $__componentOriginal1e38660a906e69b451438560ec9a2184; ?>
<?php unset($__componentOriginal1e38660a906e69b451438560ec9a2184); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c15305a5a5fa986fcf15cc89d75ecb3)): ?>
<?php $attributes = $__attributesOriginal5c15305a5a5fa986fcf15cc89d75ecb3; ?>
<?php unset($__attributesOriginal5c15305a5a5fa986fcf15cc89d75ecb3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c15305a5a5fa986fcf15cc89d75ecb3)): ?>
<?php $component = $__componentOriginal5c15305a5a5fa986fcf15cc89d75ecb3; ?>
<?php unset($__componentOriginal5c15305a5a5fa986fcf15cc89d75ecb3); ?>
<?php endif; ?>
                <!--PC VIEW-->
                <?php
                    $file = 'ewidencja_czasu_pracy_' . '_' . str_replace(' ', '_', $company->name) . '_' . date('d_m_Y', strtotime($startDate)) . '_' . date('d_m_Y', strtotime($endDate));
                ?>
                <?php if (isset($component)) { $__componentOriginalf8c3de849da6c9423a682d90c9a2609e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8c3de849da6c9423a682d90c9a2609e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.download-pdf','data' => ['file' => $file]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('download-pdf'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['file' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($file)]); ?>
                    <?php echo e(route('api.v1.raport.attendance-sheet.export.xlsx')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8c3de849da6c9423a682d90c9a2609e)): ?>
<?php $attributes = $__attributesOriginalf8c3de849da6c9423a682d90c9a2609e; ?>
<?php unset($__attributesOriginalf8c3de849da6c9423a682d90c9a2609e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8c3de849da6c9423a682d90c9a2609e)): ?>
<?php $component = $__componentOriginalf8c3de849da6c9423a682d90c9a2609e; ?>
<?php unset($__componentOriginalf8c3de849da6c9423a682d90c9a2609e); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal1f603ed19a7f47293d24abf12f22a04b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f603ed19a7f47293d24abf12f22a04b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader-script','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader-script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo e(route('api.v1.raport.attendance-sheet.get')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f603ed19a7f47293d24abf12f22a04b)): ?>
<?php $attributes = $__attributesOriginal1f603ed19a7f47293d24abf12f22a04b; ?>
<?php unset($__attributesOriginal1f603ed19a7f47293d24abf12f22a04b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f603ed19a7f47293d24abf12f22a04b)): ?>
<?php $component = $__componentOriginal1f603ed19a7f47293d24abf12f22a04b; ?>
<?php unset($__componentOriginal1f603ed19a7f47293d24abf12f22a04b); ?>
<?php endif; ?>
                <script>
                $('#excel').on('click', function () {
                        const ids = [];
                        let name = '';
                        $('#table tbody input[type="radio"]:checked').each(function () {
                            const id = $(this).data('id');
                            name = String($(this).data('name'));
                            name = name
                                .replace(/ą/g, 'a')
                                .replace(/ć/g, 'c')
                                .replace(/ę/g, 'e')
                                .replace(/ł/g, 'l')
                                .replace(/ń/g, 'n')
                                .replace(/ó/g, 'o')
                                .replace(/ś/g, 's')
                                .replace(/ź/g, 'z')
                                .replace(/ż/g, 'z')
                                .replace(/Ą/g, 'A')
                                .replace(/Ć/g, 'C')
                                .replace(/Ę/g, 'E')
                                .replace(/Ł/g, 'L')
                                .replace(/Ń/g, 'N')
                                .replace(/Ó/g, 'O')
                                .replace(/Ś/g, 'S')
                                .replace(/Ź/g, 'Z')
                                .replace(/Ż/g, 'Z')
                                .replace(/\s+/g, '_'); // spacje → podkreślenia
                            if (id) {
                                ids.push(id);
                            }
                        });

                        if (ids.length === 0) {
                            alert('Zaznacz przynajmniej jedną pozycję.');
                            return;
                        }
                        $('#idsInput').val(ids);
                        $('#excelForm').submit();
                    });
                    </script>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $attributes = $__attributesOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__attributesOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8699e4e7a3578705820a3da45318887)): ?>
<?php $component = $__componentOriginalb8699e4e7a3578705820a3da45318887; ?>
<?php unset($__componentOriginalb8699e4e7a3578705820a3da45318887); ?>
<?php endif; ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $attributes = $__attributesOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__attributesOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27ace535957143cef069f9d3d7f387f4)): ?>
<?php $component = $__componentOriginal27ace535957143cef069f9d3d7f387f4; ?>
<?php unset($__componentOriginal27ace535957143cef069f9d3d7f387f4); ?>
<?php endif; ?>
    <?php else: ?>
        <?php echo $__env->make('admin.elements.end_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\attendance\index.blade.php ENDPATH**/ ?>