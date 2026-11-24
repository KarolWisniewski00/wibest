<div class="<?php echo e($cardClasses); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($header): ?>
        <?php echo e($header); ?>

    <?php elseif($title || $action): ?>
        <div class="<?php echo e($headerClasses); ?>">
            <h3 class="font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400"><?php echo e($title); ?></h3>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($action): ?>
                <?php echo e($action); ?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div <?php echo e($attributes->merge(['class' => "{$padding} text-secondary-700 rounded-b-xl grow dark:text-secondary-400"])); ?>>
        <?php echo e($slot); ?>

    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footer): ?>
        <div class="<?php echo e($footerClasses); ?>">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\vendor\wireui\wireui\resources\views\components\card.blade.php ENDPATH**/ ?>