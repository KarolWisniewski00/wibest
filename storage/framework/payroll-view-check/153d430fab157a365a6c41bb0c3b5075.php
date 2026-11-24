<?php ($settled = $row['payment_status'] === 'Rozliczono'); ?>
<?php ($icon = $settled ? 'fa-circle-check' : ($row['payment_status'] === 'Częściowo rozliczono' ? 'fa-circle-half-stroke' : 'fa-clock')); ?>
<div class="relative h-full overflow-hidden rounded-xl border p-4 <?php echo e($settled ? 'bg-green-50 border-green-200 text-green-700 dark:bg-green-900/20 dark:border-green-800/40 dark:text-green-300' : 'bg-amber-50 border-amber-200 text-amber-700 dark:bg-amber-900/20 dark:border-amber-800/40 dark:text-amber-300'); ?>" role="status">
    <div class="pointer-events-none absolute -bottom-7 -right-5 text-8xl opacity-10" aria-hidden="true"><i class="fa-solid <?php echo e($icon); ?>"></i></div>
    <div class="relative flex flex-wrap items-center gap-3">
    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/40 dark:bg-gray-700/20" aria-hidden="true"><i class="fa-solid <?php echo e($icon); ?> text-lg sm:text-2xl"></i></div>
    <div class="min-w-0 flex-1">
        <div class="text-xs uppercase tracking-wider opacity-70">Status rozliczenia</div>
        <p class="mt-1 font-semibold"><?php echo e($row['payment_status']); ?></p>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settled): ?><p class="mt-1 text-sm">✅ Miesiąc rozliczono</p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <p class="mt-1 text-sm leading-relaxed"><?php echo e($settled ? 'Dane są zapisane. Zatwierdzone wypłaty i paski PDF są dostępne w historii rozliczenia.' : 'Obliczenie pokazuje podgląd. Zapis następuje dopiero po zatwierdzeniu rozliczenia.'); ?></p>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row['settled_at'] ?? null): ?><p class="mt-1 text-sm">Zapisano: <?php echo e($row['settled_at']); ?></p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row['paid_gross_cents'] ?? 0): ?><div class="text-sm tabular-nums"><p>Zapisane brutto</p><p class="mt-1 text-lg font-semibold"><?php echo e(\App\Services\Payroll\Money::display($row['paid_gross_cents'])); ?></p></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\payroll\status.blade.php ENDPATH**/ ?>