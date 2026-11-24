<section :inert="reportLoading" class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 xl:col-span-3 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300" aria-labelledby="object-list-title" @wibest:object-month-changing.window="destroy()"
    x-data="wibestObjectList({ endpoint: <?php echo e(\Illuminate\Support\Js::from(route('object.dashboard', ['month' => isset($month) ? $month->format('Y-m') : request('month'), 'work_search' => request('work_search'), 'work_category' => request('work_category'), 'work_page' => request('work_page')]))); ?>, search: <?php echo e(\Illuminate\Support\Js::from(request('search', ''))); ?>, status: <?php echo e(\Illuminate\Support\Js::from(request('status', ''))); ?> })">
    <div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600 sm:flex-row sm:items-center sm:justify-between [@media(prefers-color-scheme:light)]:border-gray-300">
        <div class="flex min-w-0 items-center gap-3">
            <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex">
                <i class="fa-solid fa-cube text-lg sm:text-2xl" aria-hidden="true"></i>
            </div>
            <div class="min-w-0 text-start">
                <h2 id="object-list-title" class="text-sm font-semibold text-gray-900 dark:text-white">Twoje obiekty</h2>
                <p class="text-xs text-gray-600 dark:text-gray-300">Wszystkie obiekty przypisane do firmy</p>
            </div>
        </div>
        <form action="<?php echo e(route('object.dashboard')); ?>" method="GET" @submit.prevent="load(1)" class="relative w-full shrink-0 sm:w-56">
            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
            <input type="search" name="search" value="<?php echo e(request('search')); ?>" :value="search" @input="searchChanged($event.target.value)" maxlength="255" placeholder="Szukaj obiektu..." aria-label="Szukaj obiektu po nazwie" aria-controls="object-list-results"
                class="h-9 w-full rounded-lg border border-gray-300 bg-gray-50 pl-9 pr-9 text-xs text-gray-900 placeholder:text-gray-500 outline-none transition focus:border-green-600 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-100 dark:placeholder:text-gray-300 dark:focus:border-green-300/50 dark:focus:ring-green-300/50">
            <input type="hidden" name="status" :value="status" value="<?php echo e(request('status')); ?>">
            <span x-show="loading" x-cloak class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-green-700 dark:text-green-300" role="status"><i class="fa-solid fa-spinner animate-spin motion-reduce:animate-none text-xs" aria-hidden="true"></i><span class="sr-only">Ładowanie wyników…</span></span>
        </form>
    </div>
    <div class="flex flex-wrap items-center gap-2 border-b border-gray-200 px-5 py-3 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300" aria-label="Filtruj obiekty według statusu">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['' => 'Wszystkie', 'planned' => 'Planowane', 'active' => 'Aktywne', 'paused' => 'Wstrzymane', 'cancelled' => 'Odwołane', 'completed' => 'Zakończone']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('object.dashboard', array_filter(['search' => request('search'), 'status' => $status, 'month' => request('month')], fn ($value) => $value !== null && $value !== ''))); ?>"
                @click.prevent="selectStatus('<?php echo e($status); ?>')" :aria-current="status === '<?php echo e($status); ?>' ? 'true' : null"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'rounded-lg px-3 py-1.5 text-xs font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-600 dark:focus-visible:ring-green-300',
                    'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' => (request('status') ?? '') === $status,
                    'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-gray-200' => (request('status') ?? '') !== $status,
                ]); ?>"
                :class="{ 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300': status === '<?php echo e($status); ?>', 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-gray-200': status !== '<?php echo e($status); ?>' }"><?php echo e($label); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <div x-show="error" x-cloak role="alert" class="flex flex-wrap items-center gap-2 px-5 py-3 text-sm text-red-700 dark:text-red-300">
        <span x-text="error"></span><button type="button" @click="load(retryPage)" class="rounded underline focus-visible:ring-2 focus-visible:ring-red-600">Spróbuj ponownie</button>
    </div>
    <div class="relative overflow-hidden" :aria-busy="loading || reportLoading">
    <div id="object-list-results" x-ref="results" :aria-busy="loading || reportLoading" @click="paginate($event)" wire:ignore :inert="loading || reportLoading" :class="(loading || reportLoading) ? 'object-results-pending' : ''">
        <?php echo $__env->make('admin.object.partials.list-results', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
        <?php if (isset($component)) { $__componentOriginal52a0caf2fbcc203749da5504fb454ea9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52a0caf2fbcc203749da5504fb454ea9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.loading','data' => ['kind' => 'list','pending' => 'loading || reportLoading']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['kind' => 'list','pending' => 'loading || reportLoading']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52a0caf2fbcc203749da5504fb454ea9)): ?>
<?php $attributes = $__attributesOriginal52a0caf2fbcc203749da5504fb454ea9; ?>
<?php unset($__attributesOriginal52a0caf2fbcc203749da5504fb454ea9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52a0caf2fbcc203749da5504fb454ea9)): ?>
<?php $component = $__componentOriginal52a0caf2fbcc203749da5504fb454ea9; ?>
<?php unset($__componentOriginal52a0caf2fbcc203749da5504fb454ea9); ?>
<?php endif; ?>
    </div>
    <span class="sr-only" role="status" aria-live="polite" x-text="loading ? 'Aktualizowanie listy obiektów…' : announcement"></span>
</section>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\partials\list.blade.php ENDPATH**/ ?>