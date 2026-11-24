<?php echo $__env->make('admin.elements.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        padding-right: 48px;
    }

    @media (min-width: 640px) {
        .sticky {
            padding-right: 96px;
        }
    }

    @media (min-width: 1024px) {
        .sticky {
            padding-right: 128px;
        }
    }

    @media (min-width: 1280px) {
        .sticky {
            position: relative;
            padding-right: 0px;
        }
    }
</style>
<script>
    $(document).ready(function() {
        var element = $('#fixed');
        var space = $('#space');
        var elementOffset = element.offset().top;
        var elementHeight = element.outerHeight(); // Pobieranie wysokości elementu

        $(window).scroll(function() {
            if ($(window).scrollTop() > elementOffset) {
                element.addClass('sticky');
                space.height(elementHeight); // Dodawanie wysokości do space
            } else {
                element.removeClass('sticky');
                space.height(0); // Usuwanie wysokości z space
            }
        });
    });
</script>

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
    <div class="p-4">
        <div class="py-12">
            <div class=" mx-auto sm:px-6 lg:px-8 mt-16">
                <!-- WIDGET TASK -->
                <div class="mb-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
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
                    <?php if (isset($component)) { $__componentOriginal8179e7dc9acafe002163f8e8838bde91 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8179e7dc9acafe002163f8e8838bde91 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.setting.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Fakury
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8179e7dc9acafe002163f8e8838bde91)): ?>
<?php $attributes = $__attributesOriginal8179e7dc9acafe002163f8e8838bde91; ?>
<?php unset($__attributesOriginal8179e7dc9acafe002163f8e8838bde91); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8179e7dc9acafe002163f8e8838bde91)): ?>
<?php $component = $__componentOriginal8179e7dc9acafe002163f8e8838bde91; ?>
<?php unset($__componentOriginal8179e7dc9acafe002163f8e8838bde91); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => ['class' => 'px-4 pb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-4 pb-4']); ?>
                        <div class="relative overflow-x-auto md:shadow sm:rounded-lg mt-8 w-full">
                            <div id="space" class="xl:hidden"></div>
                            <!-- Napis z przyciskiem tworzenia -->

                            <div class="max-w">
                                <!-- SearchBox -->
                                <div class="relative">
                                    <div id="search-container" class="relative flex flex-row justify-center items-center">
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                            <i class="text-gray-400 dark:text-gray-400 fa-solid fa-magnifying-glass"></i>
                                        </div>
                                        <input id="search" class="py-3 ps-10 pe-4 block w-full border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" type="text" aria-expanded="false" placeholder="Wyszukaj fakturę po numerze" value="">
                                    </div>
                                </div>
                                <!-- End SearchBox -->
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#suggestions-container').hide(); // Początkowo ukrywamy sugestie

                                    function toggleElements() {
                                        var windowWidth = $(window).width();

                                        // Nasłuchiwanie na focus w polu #search
                                        $('#search').on('focus', function() {
                                            if (windowWidth <= 768) {
                                                // Dla szerokości 768px i mniej, pokazujemy tylko #suggestions-container
                                                $('#suggestions-container').show();
                                                $('#list').hide();
                                                $('#links').hide();
                                            } else {
                                                // Dla szerokości powyżej 768px, chowamy tylko #table i #links
                                                $('#suggestions-container').show();
                                                $('#table').hide();
                                                $('#links').hide();
                                            }
                                        });
                                        $('#search').on('blur', function() {
                                            if (windowWidth <= 768) {
                                                // Dla szerokości 768px i mniej, chowamy listę z sugestiami
                                                $('#suggestions-container').hide();
                                                $('#list').show();
                                                $('#links').show();
                                            } else {
                                                // Dla szerokości powyżej 768px, chowamy sugestie, pokazujemy tabelę
                                                $('#suggestions-container').hide();
                                                $('#table').show();
                                                $('#links').show();
                                            }
                                        });
                                        // Wysłanie AJAX po wpisaniu tekstu
                                        $('#search').on('input', function() {
                                            $('#under-input').html('Wyniki wyszkiwania')
                                            var query = $(this).val();

                                            if (query.length > 0) {
                                                $.ajax({
                                                    url: '<?php echo e(route("invoice.search")); ?>', // Endpoint Laravel
                                                    method: 'GET',
                                                    data: {
                                                        query: query
                                                    }, // Wysłanie zapytania z inputa
                                                    success: function(data) {
                                                        // Wyczyść poprzednie wyniki
                                                        $('#suggestions-list').empty();

                                                        if (data.length > 0) {
                                                            $('#suggestions-container').show(); // Pokaż kontener z sugestiami

                                                            // Przetwarzanie wyników i dodanie do listy
                                                            data.forEach(function(invoice) {
                                                                var invoiceTypeBadge = '';
                                                                if (invoice.invoice_type === 'faktura proforma') {
                                                                    invoiceTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white mr-2">PRO</span>';
                                                                } else if (invoice.invoice_type === 'faktura sprzedażowa') {
                                                                    invoiceTypeBadge = '<span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white mr-2">FVS</span>';
                                                                }

                                                                $('#suggestions-list').append(
                                                                    '<li class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">' +
                                                                    '<div class="block w-full">' +
                                                                    '<div class="flex justify-between w-full">' +
                                                                    '<div>' +
                                                                    invoiceTypeBadge +
                                                                    '<span class="text-lg font-semibold dark:text-gray-50">' + invoice.number + '</span>' +
                                                                    '</div>' +
                                                                    '<form action="<?php echo e(route("invoice.delete","")); ?>/' + invoice.id + '" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć tą fakturę?\');">' +
                                                                    '<?php echo csrf_field(); ?> <?php echo method_field("DELETE"); ?>' +
                                                                    '<button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">' +
                                                                    '<i class="fa-solid fa-trash"></i>' +
                                                                    '</button>' +
                                                                    '</form>' +
                                                                    '</div>' +
                                                                    '<div class="text-sm text-gray-400 w-2/3">' +
                                                                    (invoice.client ? '<a href="<?php echo e(route("invoice.show","")); ?>/' + invoice.client_id + '" class="text-blue-600 dark:text-blue-400 hover:underline">' + invoice.client_name + '</a>' : invoice.buyer_name) +
                                                                    '</div>' +
                                                                    '<div class="flex flex-col items-end">' +
                                                                    '<div>Netto <span class="font-semibold">' + invoice.subtotal + '</span> zł</div>' +
                                                                    '<div>VAT <span class="font-semibold">' + invoice.vat + '</span> zł</div>' +
                                                                    '<div class="text-lg dark:text-gray-50">Brutto <span class="font-semibold">' + invoice.total + '</span> zł</div>' +
                                                                    '</div>' +
                                                                    '<div class="flex space-x-4 mt-4">' +
                                                                    '<a href="<?php echo e(route("invoice.show","")); ?>/' + invoice.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">' +
                                                                    '<i class="fa-solid fa-eye"></i>' +
                                                                    '</a>' +
                                                                    '<a href="<?php echo e(route("invoice.edit","")); ?>/' + invoice.id + '" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">' +
                                                                    '<i class="fa-solid fa-pen-to-square"></i>' +
                                                                    '</a>' +
                                                                    '</div>' +
                                                                    '</div>' +
                                                                    '</li>'
                                                                );
                                                            });
                                                        } else {
                                                            $('#under-input').html('Wyniki wyszkiwania')
                                                            // Gdy nie ma wyników
                                                            $('#suggestions-list').append(`
                                                    <div class="text-center py-8">
                                                        <img src="<?php echo e(asset('empty.svg')); ?>" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                                        <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                                    </div>
                                                    `);
                                                        }
                                                    }
                                                });
                                            } else {
                                                $('#under-input').html('Sugerowane faktury')
                                                $('#suggestions-container').hide(); // Ukryj, jeśli pole puste
                                            }
                                        });

                                        // Zapobieganie znikaniu sugestii przy klikaniu w #suggestions-container
                                        $('#suggestions-container').on('mousedown', function(event) {
                                            event.preventDefault(); // Blokujemy ukrycie kontenera podczas kliknięcia
                                        });

                                        // Nasłuchiwanie na kliknięcia poza polem wyszukiwania lub kontenerem sugestii
                                        $(document).on('click', function(event) {
                                            if (!$(event.target).closest('#search, #suggestions-container').length) {
                                                $('#suggestions-container').hide();
                                            }
                                        });
                                    }

                                    // Wywołaj funkcję na załadowanie strony
                                    toggleElements();

                                    // Wywołaj ponownie funkcję, gdy rozmiar okna się zmieni (resize event)
                                    $(window).on('resize', function() {
                                        toggleElements();
                                    });
                                });
                            </script>




                            <!--Tabela-->
                            <div class="relative overflow-x-auto md:shadow sm:rounded-lg mt-8">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($company): ?>
                                <!-- Lista sugerowanych faktur -->
                                <div id="suggestions-container">
                                    <small id="under-input" class="text-gray-400 dark:text-gray-500">Sugerowane faktury</small>
                                    <ul id="suggestions-list" class="space-y-4 mt-4">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoices_sugestion->isEmpty()): ?>
                                        <div class="text-center py-8">
                                            <img src="<?php echo e(asset('empty.svg')); ?>" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                            <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                        </div>
                                        <?php else: ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $invoices_sugestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                                <div class="block w-full">
                                                    <div class="flex justify-between w-full">
                                                        <div>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->invoice_type == "faktura proforma"): ?>
                                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                            <?php elseif($invoice->invoice_type == "faktura sprzedażowa"): ?>
                                                            <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            <span class="text-lg font-semibold dark:text-gray-50"><?php echo e($invoice->number); ?></span>
                                                        </div>
                                                        <form action="<?php echo e(route('invoice.delete', $invoice)); ?>" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="text-sm text-gray-400 w-2/3">
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->client): ?>
                                                        <a href="<?php echo e(route('client.show', $invoice->client->id)); ?>" class="text-blue-600 dark:text-blue-400 hover:underline"><?php echo e($invoice->client->name); ?></a>
                                                        <?php else: ?>
                                                        <?php echo e($invoice->buyer_name); ?>

                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </div>
                                                    <div class="flex flex-col items-end">
                                                        <div>
                                                            Netto <span class="font-semibold"><?php echo e($invoice->subtotal); ?></span> zł
                                                        </div>
                                                        <div>
                                                            VAT <span class="font-semibold"><?php echo e($invoice->vat); ?></span> zł
                                                        </div>
                                                        <div class="text-lg dark:text-gray-50">
                                                            Brutto <span class="font-semibold"><?php echo e($invoice->total); ?></span> zł
                                                        </div>
                                                    </div>
                                                    <div class="flex space-x-4 mt-4">
                                                        <a href="<?php echo e(route('invoice.show', $invoice)); ?>" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        <a href="<?php echo e(route('invoice.edit', $invoice)); ?>" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                </div>

                                <ul id="list" class="grid w-full gap-y-4 block md:hidden">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoices->isEmpty()): ?>
                                    <div class="text-center py-8">
                                        <img src="<?php echo e(asset('empty.svg')); ?>" alt="Brak danych" class="mx-auto mb-4" style="max-width: 300px;">
                                        <p class="text-gray-500 dark:text-gray-400">Brak faktur do wyświetlenia.</p>
                                    </div>
                                    <?php else: ?>
                                    <?php
                                    $currentMonth = null; // Zmienna do śledzenia aktualnego miesiąca
                                    $months = [
                                    1 => 'Styczeń',
                                    2 => 'Luty',
                                    3 => 'Marzec',
                                    4 => 'Kwiecień',
                                    5 => 'Maj',
                                    6 => 'Czerwiec',
                                    7 => 'Lipiec',
                                    8 => 'Sierpień',
                                    9 => 'Wrzesień',
                                    10 => 'Październik',
                                    11 => 'Listopad',
                                    12 => 'Grudzień'
                                    ];
                                    ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                                    $invoiceMonth = \Carbon\Carbon::parse($invoice->issue_date)->month;

                                    // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                                    if ($invoiceMonth !== $currentMonth) {
                                    $currentMonth = $invoiceMonth;
                                    $monthName = $months[$invoiceMonth];
                                    ?>
                                    <!-- Sekcja wyświetlająca nazwę miesiąca z ikoną strzałki w dół -->
                                    <div id="s-<?php echo e($key); ?>"></div>
                                    <li id="e-<?php echo e($key); ?>" class="my-4">
                                        <div class="flex items-center justify-start">
                                            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300"><?php echo e($monthName); ?></h2>
                                            <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>

                                    <!-- Kod dla faktury -->
                                    <li>
                                        <div class="h-full inline-flex items-center justify-between w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg hover:text-gray-600 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                                            <div class="block w-full">
                                                <div class="flex justify-between w-full">
                                                    <div class="flex justify-start items-center w-full">
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->invoice_type == "faktura proforma"): ?>
                                                        <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->invoice_id): ?>
                                                        <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                                        <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        <?php elseif($invoice->invoice_type == "faktura sprzedażowa"): ?>
                                                        <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->invoice_id): ?>
                                                        <p class="text-sm md:text-xl text-gray-900 dark:text-gray-50 font-semibold mr-2"><i class="fa-solid fa-arrow-right-arrow-left"></i></p>
                                                        <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-indigo-500 dark:text-white  mr-2">PRO</span>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        <?php elseif($invoice->invoice_type == "faktura"): ?>
                                                        <span class="inline-flex items-center gap-x-1 py-1 px-2 rounded-full text-xs font-bold bg-gray-800 text-white dark:bg-emerald-700 dark:text-white  mr-2">FVS</span>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        <span class="text-lg font-semibold dark:text-gray-50"><?php echo e($invoice->number); ?></span>
                                                    </div>
                                                    <form action="<?php echo e(route('invoice.delete', $invoice)); ?>" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tą fakturę?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="mb-4 ml-4 inline-flex items-center py-2 px-4 text-sm font-medium text-red-600 border border-red-600 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="text-sm text-gray-400 w-2/3">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->client): ?>
                                                    <a href="<?php echo e(route('client.show', $invoice->client->id)); ?>" class="text-blue-600 dark:text-blue-400 hover:underline"><?php echo e($invoice->client->name); ?></a>
                                                    <?php else: ?>
                                                    <?php echo e($invoice->buyer_name); ?>

                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                                <div class="flex flex-col items-end">
                                                    <div>
                                                        Netto <span class="font-semibold"><?php echo e($invoice->subtotal); ?></span> zł
                                                    </div>
                                                    <div>
                                                        VAT <span class="font-semibold"><?php echo e($invoice->vat); ?></span> zł
                                                    </div>
                                                    <div class="text-lg dark:text-gray-50">
                                                        Brutto <span class="font-semibold"><?php echo e($invoice->total); ?></span> zł
                                                    </div>
                                                </div>
                                                <div class="flex space-x-4 mt-4">
                                                    <a href="<?php echo e(route('invoice.show', $invoice)); ?>" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-600 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('invoice.edit', $invoice)); ?>" class="inline-flex items-center py-2 px-4 text-sm font-medium text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400  hidden md:table">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 hidden lg:table-cell">
                                                <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $attributes = $__attributesOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__attributesOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $component = $__componentOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__componentOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Numer faktury
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Klient
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Kwota netto
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Kwota brutto
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th colspan="2" scope="col" class="px-6 py-3">
                                                Opłacone
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Podgląd
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoices->isEmpty()): ?>
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td colspan="8" class="px-3 py-2">
                                                <?php if (isset($component)) { $__componentOriginal4f50f2a61d06fe83eb24347cfd68191c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-place','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('empty-place'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c)): ?>
<?php $attributes = $__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c; ?>
<?php unset($__attributesOriginal4f50f2a61d06fe83eb24347cfd68191c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f50f2a61d06fe83eb24347cfd68191c)): ?>
<?php $component = $__componentOriginal4f50f2a61d06fe83eb24347cfd68191c; ?>
<?php unset($__componentOriginal4f50f2a61d06fe83eb24347cfd68191c); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php else: ?>
                                        <?php
                                        $currentMonth = null; // Zmienna do śledzenia aktualnego miesiąca
                                        $months = [
                                        1 => 'Styczeń',
                                        2 => 'Luty',
                                        3 => 'Marzec',
                                        4 => 'Kwiecień',
                                        5 => 'Maj',
                                        6 => 'Czerwiec',
                                        7 => 'Lipiec',
                                        8 => 'Sierpień',
                                        9 => 'Wrzesień',
                                        10 => 'Październik',
                                        11 => 'Listopad',
                                        12 => 'Grudzień'
                                        ];
                                        ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        // Pobieramy miesiąc z daty faktury (załóżmy, że jest polem issue_date)
                                        $invoiceMonth = \Carbon\Carbon::parse($invoice->issue_date)->month;

                                        // Jeśli miesiąc zmienił się w stosunku do poprzedniego, wyświetlamy nazwę nowego miesiąca
                                        if ($invoiceMonth !== $currentMonth) {
                                        $currentMonth = $invoiceMonth;
                                        $monthName = $months[$invoiceMonth];
                                        ?>
                                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                            <td colspan="8" class="px-3 py-2">
                                                <div class="flex items-center justify-start">
                                                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300"><?php echo e($monthName); ?></h2>
                                                    <i class="fa-solid fa-chevron-down ml-2 text-gray-500 dark:text-gray-400"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>

                                        <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                            <td class="px-3 py-2 hidden lg:table-cell">
                                                <?php if (isset($component)) { $__componentOriginal2d55b40f81e721ef5c91385151f76327 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d55b40f81e721ef5c91385151f76327 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flex-center','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flex-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <input type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-id="<?php echo e($company->id); ?>">
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $attributes = $__attributesOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__attributesOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $component = $__componentOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__componentOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
                                            </td>
                                            <td class="px-3 py-2 min-w-48">
                                                <?php if (isset($component)) { $__componentOriginalb3309cdd48f422afdad7f11bf42b86d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-label','data' => ['invoice' => $invoice]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['invoice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invoice)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6)): ?>
<?php $attributes = $__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6; ?>
<?php unset($__attributesOriginalb3309cdd48f422afdad7f11bf42b86d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3309cdd48f422afdad7f11bf42b86d6)): ?>
<?php $component = $__componentOriginalb3309cdd48f422afdad7f11bf42b86d6; ?>
<?php unset($__componentOriginalb3309cdd48f422afdad7f11bf42b86d6); ?>
<?php endif; ?>
                                            </td>
                                            <td class="px-3 py-2">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invoice->clientCompany): ?>
                                                <p class="text-gray-900 dark:text-gray-50 font-semibold">
                                                    <?php if (isset($component)) { $__componentOriginal4678d95cf11a514277943c24d379ed0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4678d95cf11a514277943c24d379ed0e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label-link-company','data' => ['href' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label-link-company'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '']); ?>
                                                        <?php echo e($invoice->clientCompany->name); ?>

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
                                                <?php else: ?>
                                                <?php echo e($invoice->buyer_name); ?>

                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                            <td class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-700 dark:text-gray-50">
                                                <?php echo e($invoice->subtotal); ?> zł
                                            </td>
                                            <td class="px-3 py-2 text-sm min-w-32 text-gray-700 dark:text-gray-50">
                                                <?php echo e($invoice->total); ?> zł
                                            </td>
                                            <td class="px-3 py-2 text-sm min-w-32">
                                                <?php if (isset($component)) { $__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-status','data' => ['invoice' => $invoice]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['invoice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invoice)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4)): ?>
<?php $attributes = $__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4; ?>
<?php unset($__attributesOriginalc865cf89b0b9158191dda2d6aeeac0c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4)): ?>
<?php $component = $__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4; ?>
<?php unset($__componentOriginalc865cf89b0b9158191dda2d6aeeac0c4); ?>
<?php endif; ?>
                                            </td>
                                            <td colspan="2" class="px-3 py-2 font-semibold text-lg min-w-32 text-gray-50">
                                                <?php if (isset($component)) { $__componentOriginal76ef1cd2743640539aad4c5864b72d42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal76ef1cd2743640539aad4c5864b72d42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.invoice-progress','data' => ['invoice' => $invoice]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('invoice-progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['invoice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($invoice)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal76ef1cd2743640539aad4c5864b72d42)): ?>
<?php $attributes = $__attributesOriginal76ef1cd2743640539aad4c5864b72d42; ?>
<?php unset($__attributesOriginal76ef1cd2743640539aad4c5864b72d42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal76ef1cd2743640539aad4c5864b72d42)): ?>
<?php $component = $__componentOriginal76ef1cd2743640539aad4c5864b72d42; ?>
<?php unset($__componentOriginal76ef1cd2743640539aad4c5864b72d42); ?>
<?php endif; ?>
                                            </td>
                                            <td class="px-3 py-2">
                                                <a href="<?php echo e(route('invoice.show', $invoice)); ?>" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 focus:bg-gray-700 dark:focus:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </tbody>
                                </table>

                                <!--LINKI-->
                                <div id="links" class="md:px-2 py-4">
                                    <?php echo e($invoices->links()); ?>

                                </div>
                                <script>
                                    $(document).ready(function() {

                                    });
                                </script>

                                <?php else: ?>
                                <?php echo $__env->make('admin.elements.end_config', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $attributes = $__attributesOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__attributesOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d55b40f81e721ef5c91385151f76327)): ?>
<?php $component = $__componentOriginal2d55b40f81e721ef5c91385151f76327; ?>
<?php unset($__componentOriginal2d55b40f81e721ef5c91385151f76327); ?>
<?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\invoice\index.blade.php ENDPATH**/ ?>