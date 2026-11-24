<section :inert="reportLoading" class="my-4 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300" data-object-work-table @wibest:object-month-changing.window="destroy()" x-data="wibestObjectList({ kind: 'work', endpoint: <?php echo e(\Illuminate\Support\Js::from(($dashboard ?? false) ? route('object.dashboard', ['month' => $month->format('Y-m')]) : route('object.show', ['object' => $object, 'month' => $month->format('Y-m'), 'employee_id' => $workReport['selected_employee_id']]))); ?>, search: <?php echo e(\Illuminate\Support\Js::from($workReport['search'])); ?>, status: <?php echo e(\Illuminate\Support\Js::from($workReport['category'])); ?> })">
    <div class="flex flex-col gap-4 border-b border-gray-200 px-5 py-4 dark:border-gray-600 sm:flex-row sm:items-center sm:justify-between [@media(prefers-color-scheme:light)]:border-gray-300">
        <div class="flex min-w-0 items-center gap-3">
            <div class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300 flex"><i class="fa-solid fa-clock text-lg sm:text-2xl" aria-hidden="true"></i></div>
            <div class="min-w-0 text-start">
                <h2 id="work-list-title" class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e(($dashboard ?? false) ? 'Czas pracy' : 'Czas pracy na obiekcie'); ?></h2>
                <p class="text-xs text-gray-600 dark:text-gray-300">Wszystkie sesje czasu pracy z wybranego miesiąca · <?php echo e($month->format('m.Y')); ?></p>
            </div>
        </div>
        <form @submit.prevent="load(1)" method="GET" action="<?php echo e(($dashboard ?? false) ? route('object.dashboard') : route('object.show', $object)); ?>" class="relative w-full shrink-0 sm:w-56">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_merge(request()->only('search', 'status', 'page'), ['month' => $month->format('Y-m'), 'work_category' => $workReport['category'], 'employee_id' => $workReport['selected_employee_id']]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>" <?php if($key === 'work_category'): ?> :value="status" <?php endif; ?>>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400 [@media(prefers-color-scheme:light)]:text-gray-600" aria-hidden="true"></i>
            <input type="search" name="work_search" :value="search" @input="searchChanged($event.target.value)" value="<?php echo e($workReport['search']); ?>" maxlength="255" placeholder="Szukaj czasu pracy..." aria-label="Szukaj czasu pracy po pracowniku lub obiekcie" aria-controls="work-list-results" class="h-9 w-full rounded-lg border border-gray-300 bg-gray-50 pl-9 pr-9 text-xs text-gray-900 placeholder:text-gray-500 outline-none transition focus:border-green-600 focus:ring-green-600 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-100 dark:placeholder:text-gray-300 dark:focus:border-green-300/50 dark:focus:ring-green-300/50">
            <span x-show="loading" x-cloak class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-green-700 dark:text-green-300" role="status"><i class="fa-solid fa-spinner animate-spin motion-reduce:animate-none text-xs" aria-hidden="true"></i><span class="sr-only">Ładowanie wyników…</span></span>
        </form>
    </div>
    <div class="flex flex-wrap items-center gap-2 border-b border-gray-200 px-5 py-3 dark:border-gray-600 [@media(prefers-color-scheme:light)]:border-gray-300" aria-label="Filtruj czas pracy według kategorii">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['all' => 'Wszystkie', 'under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny', 'attention' => 'Wymaga uwagi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(($dashboard ?? false) ? route('object.dashboard', array_merge(request()->only('search', 'status', 'work_search'), ['month' => $month->format('Y-m'), 'work_category' => $category])) : route('object.show', ['object' => $object, 'month' => $month->format('Y-m'), 'work_category' => $category, 'work_search' => $workReport['search'], 'employee_id' => $workReport['selected_employee_id']])); ?>"
                @click.prevent="selectStatus('<?php echo e($category); ?>')" :aria-current="status === '<?php echo e($category); ?>' ? 'true' : 'false'"
                :class="{ 'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300': status === '<?php echo e($category); ?>', 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-gray-200': status !== '<?php echo e($category); ?>' }"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'rounded-lg px-3 py-1.5 text-xs font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-600 dark:focus-visible:ring-green-300',
                    'bg-green-100 text-green-800 dark:bg-green-300/10 dark:text-green-300' => $workReport['category'] === $category,
                    'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-gray-200' => $workReport['category'] !== $category,
                ]); ?>"><?php echo e($label); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <div x-show="error" x-cloak role="alert" class="px-5 py-3 text-sm text-red-700 dark:text-red-300"><span x-text="error"></span><button type="button" @click="load(retryPage)" class="ml-2 underline">Spróbuj ponownie</button></div>
    <div class="relative overflow-hidden" :aria-busy="loading || reportLoading">
    <div x-ref="results" :aria-busy="loading || reportLoading" @click="paginate($event)" wire:ignore :inert="loading || reportLoading" :class="(loading || reportLoading) ? 'object-results-pending' : ''">
        <?php echo $__env->make('admin.object.partials.work-results', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
        <?php if (isset($component)) { $__componentOriginal52a0caf2fbcc203749da5504fb454ea9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52a0caf2fbcc203749da5504fb454ea9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.object.loading','data' => ['kind' => 'table','pending' => 'loading || reportLoading']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('object.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['kind' => 'table','pending' => 'loading || reportLoading']); ?>
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
    <span class="sr-only" role="status" aria-live="polite" x-text="loading ? 'Aktualizowanie czasu pracy…' : announcement"></span>
</section>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\partials\work-table.blade.php ENDPATH**/ ?>