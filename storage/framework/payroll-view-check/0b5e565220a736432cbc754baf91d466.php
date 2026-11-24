<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type != ''): ?>
    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4">
        <span class="text-gray-900 dark:text-white">📋 Podgląd</span>
        <div class="h-[180px] flex flex-col items-center justify-center text-center 
                            w-full bg-pink-200 dark:bg-pink-400/60
                            rounded-2xl p-2 transition-colors duration-200 
                            hover:bg-pink-300 dark:hover:bg-pink-500/70">

            <!-- Ikona i label -->
            <div class="flex flex-col items-center justify-center h-full w-fit">
                <span class="text-2xl"><?php echo e(config('leavetypes.icons.' . $type, '') ?? ''); ?></span>
                <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-pink-300 text-gray-900 uppercase tracking-widest">
                    <?php echo e(config('leavetypes.shortType.' . $type, '')); ?>

                </span>
            </div>

            <!-- Dane szczegółowe -->
            <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                <div class="font-semibold tracking-widest uppercase">
                    <?php echo e($type); ?>

                </div>

                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start_time_date != ''): ?>
                    <?php echo e(\Carbon\Carbon::parse($start_time_date)
                            ->locale('pl')
                            ->translatedFormat('D')); ?>

                    <?php else: ?>
                    Brak
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    –
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($end_time_date != ''): ?>
                    <?php echo e(\Carbon\Carbon::parse($end_time_date)
                            ->locale('pl')
                            ->translatedFormat('D')); ?>

                    <?php else: ?>
                    Brak
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <!-- Opis -->
            <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                WNIOSEK
            </p>

        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\leave-picker.blade.php ENDPATH**/ ?>