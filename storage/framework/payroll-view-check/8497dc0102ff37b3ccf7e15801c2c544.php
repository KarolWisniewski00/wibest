<?php
    $stats = $workReport['stats'];
    $cards = [];
    if ($dashboard ?? false) {
        $cards[] = ['Aktywne obiekty', $counts->get('active', 0), 'Stan bieżący', 'fa-cube'];
        $cards[] = ['Czas spędzony na obiektach', \App\Services\Objects\ObjectWorkReport::duration($stats['seconds']), 'Zakwalifikowane sesje · ' . $month->format('m.Y'), 'fa-clock'];
        $cards[] = ['Wymaga uwagi', $stats['attention'], 'Sesje bez jednoznacznego przypisania · ' . $month->format('m.Y'), 'fa-triangle-exclamation'];
    }
    if ($preview ?? false) {
        $sessionCount = $stats['under']['count'] + $stats['normal']['count'] + $stats['overtime']['count'];
        $sessionWord = $sessionCount === 1 ? 'sesja' : (in_array($sessionCount % 10, [2, 3, 4]) && !in_array($sessionCount % 100, [12, 13, 14]) ? 'sesje' : 'sesji');
        $cards[] = ['Czas na obiekcie', \App\Services\Objects\ObjectWorkReport::duration($stats['seconds']), $sessionCount . ' ' . $sessionWord, 'fa-clock'];
        $cards[] = ['Wymaga uwagi', $stats['attention'], 'Sesje bez jednoznacznego przypisania · ' . $month->format('m.Y'), 'fa-triangle-exclamation'];
    }
    foreach (['under' => 'Brak normy', 'normal' => 'Norma', 'overtime' => 'Nadgodziny'] as $key => $label) {
        $count = $stats[$key]['count'];
        $sessionsLabel = $count === 1 ? 'sesja' : (in_array($count % 10, [2, 3, 4]) && !in_array($count % 100, [12, 13, 14]) ? 'sesje' : 'sesji');
        $cards[] = [$label, \App\Services\Objects\ObjectWorkReport::duration($stats[$key]['seconds']), $count . ' ' . $sessionsLabel, 'fa-clock'];
    }
?>
<div class="my-4 grid grid-cols-1 gap-4 sm:grid-cols-2 <?php echo e(($preview ?? false) ? 'xl:grid-cols-6 2xl:grid-cols-5' : 'xl:grid-cols-6'); ?>"
    data-object-work-cards :aria-busy="reportLoading">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value, $caption, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $tone = match ($label) {
                'Wymaga uwagi' => 'from-yellow-200 to-amber-100 text-yellow-800 dark:from-yellow-500/20 dark:to-amber-500/10 dark:text-yellow-300',
                'Brak normy' => 'from-green-100/50 to-emerald-100/30 text-green-700 dark:from-green-500/10 dark:to-emerald-500/5 dark:text-green-300',
                'Nadgodziny' => 'from-indigo-200 to-indigo-100 text-indigo-700 dark:from-indigo-500/20 dark:to-indigo-500/10 dark:text-indigo-300',
                default => 'from-green-200 to-emerald-100 text-green-700 dark:from-green-500/20 dark:to-emerald-500/10 dark:text-green-300',
            };
            if (!isset($preview)) {
                $span = match ($label) {
                    default => '',
                };
            } else {
                $span = match ($label) {
                    'Wymaga uwagi' => 'sm:col-span-2 xl:col-span-3 2xl:col-span-1',
                    'Czas na obiekcie' => 'xl:col-span-3 2xl:col-span-1',
                    'Brak normy' => 'xl:col-span-2 2xl:col-span-1',
                    'Nadgodziny' => 'xl:col-span-2 2xl:col-span-1',
                    default => 'xl:col-span-2 2xl:col-span-1',
                };
            }

        ?>
        <div
            class="<?php echo e($span); ?> group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700 [@media(prefers-color-scheme:light)]:bg-gray-100 [@media(prefers-color-scheme:light)]:ring-1 [@media(prefers-color-scheme:light)]:ring-inset [@media(prefers-color-scheme:light)]:ring-gray-300 [@media(prefers-color-scheme:light)]:text-gray-900">
            <div class="flex items-start gap-4">
                <div
                    class="h-11 sm:h-14 w-11 sm:w-14 shrink-0 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br <?php echo e($tone); ?> flex">
                    <i class="fa-solid <?php echo e($icon); ?> text-lg sm:text-2xl" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 break-words text-start [overflow-wrap:anywhere]">
                    <p
                        class="text-sm text-gray-600 dark:text-gray-300 [@media(prefers-color-scheme:light)]:font-semibold [@media(prefers-color-scheme:light)]:text-gray-700">
                        <?php echo e($label); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label === 'Aktywne obiekty'): ?>
                        <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($value); ?></p>
                        <p class="mt-4 text-xs text-gray-600 dark:text-gray-300"><?php echo e($caption); ?></p>
                    <?php else: ?>
                        <p class="relative mt-2 text-3xl font-bold text-gray-900 dark:text-white"><span
                                :class="reportLoading ? 'invisible' : ''"><?php echo e($value); ?></span><span x-show="reportLoading"
                                x-cloak aria-hidden="true"
                                class="absolute inset-x-0 top-1/2 h-3 -translate-y-1/2 animate-pulse rounded bg-gray-200 motion-reduce:animate-none dark:bg-gray-600"></span>
                        </p>
                        <p class="relative mt-4 text-xs text-gray-600 dark:text-gray-300"><span
                                :class="reportLoading ? 'invisible' : ''"><?php echo e($caption); ?></span><span x-show="reportLoading"
                                x-cloak aria-hidden="true"
                                class="absolute inset-x-0 top-1/2 h-3 -translate-y-1/2 animate-pulse rounded bg-gray-200 motion-reduce:animate-none dark:bg-gray-600"></span>
                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<span x-show="reportLoading" x-cloak class="sr-only" role="status">?adowanie statystyk?</span><?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\object\partials\work-cards.blade.php ENDPATH**/ ?>