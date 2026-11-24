<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->status == 'W budowie'): ?>
<span class="inline-flex p-2 items-center text-yellow-500 dark:text-yellow-300 font-semibold uppercase tracking-widest hover:text-yellow-700 dark:hover:text-yellow-300 transition ease-in-out duration-150">
    <?php echo e($project->status); ?>

</span>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->status == 'Aktywne'): ?>
<span class="inline-flex p-2 items-center text-green-300 dark:text-green-300 font-semibold uppercase tracking-widest hover:text-green-700 dark:hover:text-green-300 transition ease-in-out duration-150">
    <?php echo e($project->status); ?>

</span>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->status == 'Wyłączone'): ?>
<span class="inline-flex p-2 items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
    <?php echo e($project->status); ?>

</span>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->status == 'Error'): ?>
<span class="inline-flex p-2 items-center text-red-300 dark:text-red-300 font-semibold uppercase tracking-widest hover:text-red-700 dark:hover:text-red-300 transition ease-in-out duration-150">
    <?php echo e($project->status); ?>

</span>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\project-status.blade.php ENDPATH**/ ?>