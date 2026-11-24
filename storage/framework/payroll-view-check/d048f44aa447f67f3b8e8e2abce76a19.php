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

            <?php if (isset($component)) { $__componentOriginalb8699e4e7a3578705820a3da45318887 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb8699e4e7a3578705820a3da45318887 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-content','data' => ['class' => 'rounded-lg mt-4 bg-white p-4 rounded-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'rounded-lg mt-4 bg-white p-4 rounded-lg']); ?>
                <!--HEADER-->
                <?php if (isset($component)) { $__componentOriginalbeca410b003449fc279c14ce2c7a3f29 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbeca410b003449fc279c14ce2c7a3f29 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container-header','data' => ['class' => 'grid gap-2 md:flex md:gap-0 md:justify-between']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'grid gap-2 md:flex md:gap-0 md:justify-between']); ?>
                    <h1 class='text-2xl font-medium text-gray-900'>
                        <?php echo e($excel['employee']['name']); ?>

                    </h1>
                    <h1 class='text-2xl font-medium text-gray-900'>
                        <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $startDate)->format('d.m.Y')); ?> -
                        <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $endDate)->format('d.m.Y')); ?>

                    </h1>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbeca410b003449fc279c14ce2c7a3f29)): ?>
<?php $attributes = $__attributesOriginalbeca410b003449fc279c14ce2c7a3f29; ?>
<?php unset($__attributesOriginalbeca410b003449fc279c14ce2c7a3f29); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbeca410b003449fc279c14ce2c7a3f29)): ?>
<?php $component = $__componentOriginalbeca410b003449fc279c14ce2c7a3f29; ?>
<?php unset($__componentOriginalbeca410b003449fc279c14ce2c7a3f29); ?>
<?php endif; ?>
                <!--HEADER-->
                <script src="https://bossanova.uk/jspreadsheet/v5/jspreadsheet.js"></script>
                <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v5/jspreadsheet.css" type="text/css" />
                <script src="https://jsuites.net/v5/jsuites.js"></script>
                <link rel="stylesheet" href="https://jsuites.net/v5/jsuites.css" type="text/css" />

                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons" />

                <div id="spreadsheet" class="w-full"></div>
                <div class="mb-4">
                    <?php if (isset($component)) { $__componentOriginalc1a6ce59269b398a58355de0e352bfae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1a6ce59269b398a58355de0e352bfae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button-neutral','data' => ['id' => 'download-xlsx','type' => 'button','class' => 'text-xs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-neutral'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'download-xlsx','type' => 'button','class' => 'text-xs']); ?>
                        <i class="fa-solid fa-download mr-2"></i>Pobierz
                     <?php echo $__env->renderComponent(); ?>
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
                <script>
                    const excelData = <?php echo json_encode($excel, 15, 512) ?>;

                    console.log(excelData);

                    const rows = [];


                    for (let i = 0; i < excelData.dates.length; i++) {
                        let plan = null;
                        if (excelData.datesPlanned[i] != '00h') {
                            plan = excelData.datesPlanned[i];
                        }
                        let under = null;
                        if (excelData.datesUnder[i] != '00h') {
                            under = excelData.datesUnder[i];
                        }
                        rows.push([excelData.dates[i],
                            plan,
                        excelData.datesWork[i],
                        excelData.datesAll[i],
                        excelData.datesExtra[i],
                            under,
                        excelData.datesLeave[i],
                        ]);
                    }
                    rows.push(['Razem',
                        excelData.employee.time_in_work_hms_planned,
                        '',
                        excelData.employee.time_in_work_hms,
                        excelData.employee.time_in_work_hms_extra,
                        excelData.employee.time_in_work_hms_under,
                        excelData.employee.time_in_work_hms_leave,
                    ]);

                    jspreadsheet(document.getElementById('spreadsheet'), {
                        worksheets: [{
                            data: rows,
                            columns: [
                                { title: 'Dzień', width: '200px' },
                                { title: 'Zaplanowany czas', width: '200px' },
                                { title: 'Zdarzenia', width: '200px' },
                                { title: 'Czas pracy', width: '200px' },
                                { title: 'Nadgodziny', width: '200px' },
                                { title: 'Brak normy', width: '200px' },
                                { title: 'Wnioski', width: '200px' },
                            ]
                        }],
                    });
                    $('#download-xlsx').on('click', function () {
                        $.ajax({
                            url: "<?php echo e(route('api.v1.raport.attendance-sheet.export.xlsx')); ?>",
                            method: 'POST',
                            data: JSON.stringify({
                                _token: '<?php echo e(csrf_token()); ?>',
                                ids: [excelData.employee.id],
                                excel: rows,
                            }),
                            contentType: 'application/json',
                            xhrFields: {
                                responseType: 'blob' // ważne: bo XLSX to plik
                            },
                            success: function (data, status, xhr) {
                                console.log(data)
                                const blob = new Blob([data], {
                                    type: 'application/pdf'
                                });
                                const link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = 'test.pdf';
                                link.click();
                            },
                            error: function () {
                                alert('Błąd przy generowaniu pliku.');
                            }
                        });
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
<?php if (isset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $attributes = $__attributesOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__attributesOriginal6d34ed0eb01a1886d57455f1550df787); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d34ed0eb01a1886d57455f1550df787)): ?>
<?php $component = $__componentOriginal6d34ed0eb01a1886d57455f1550df787; ?>
<?php unset($__componentOriginal6d34ed0eb01a1886d57455f1550df787); ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\attendance\excel.blade.php ENDPATH**/ ?>