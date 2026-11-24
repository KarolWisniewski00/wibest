<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->profile_photo_url): ?>
<img src="<?php echo e($user->profile_photo_url); ?>" alt="<?php echo e($user->name); ?>" class="flex-shrink-0 w-10 h-10 rounded-full">
<?php else: ?>
<div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-700">
    <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\user-photo.blade.php ENDPATH**/ ?>