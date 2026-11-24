<div name="wireui.select.option">
    <span name="wireui.select.option.data"><?php if (is_object($toArray()) || is_array($toArray())) { echo "JSON.parse(atob('".base64_encode(json_encode($toArray()))."'))"; } elseif (is_string($toArray())) { echo "'".str_replace("'", "\'", $toArray())."'"; } else { echo json_encode($toArray()); } ?></span>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->runningUnitTests()): ?>
        <div dusk="select.option">
            <?php echo json_encode($toArray()); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slot->isNotEmpty()): ?>
        <span name="wireui.select.slot"><?php echo e($slot); ?></span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\vendor\wireui\wireui\resources\views\components\select\option.blade.php ENDPATH**/ ?>