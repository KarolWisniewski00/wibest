<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Imię i nazwisko</th>
            <th>Status</th>
            <th>Czas w pracy</th>
        </tr>
    </thead>
    <tbody>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($session->id); ?></td>
                <td><?php echo e($session->user->name); ?></td>
                <td><?php echo e($session->status); ?></td>
                <td><?php echo e($session->time_in_work); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </tbody>
</table>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\exports\work_session.blade.php ENDPATH**/ ?>