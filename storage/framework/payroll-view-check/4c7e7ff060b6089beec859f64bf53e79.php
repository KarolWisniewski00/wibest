<h2>Nowa wiadomość z formularza kontaktowego WIBEST</h2>

<p>
    <strong>Imię i nazwisko:</strong>
    <?php echo e($name); ?>

</p>

<p>
    <strong>Email:</strong>
    <?php echo e($email); ?>

</p>

<p>
    <strong>Telefon:</strong>
    <?php echo e($phone ?: 'Nie podano'); ?>

</p>

<hr>

<p>
    <strong>Wiadomość:</strong>
</p>

<p>
    <?php echo nl2br(e($contactMessage)); ?>

</p><?php /**PATH C:\xampp\htdocs\wibest\resources\views\emails\contact.blade.php ENDPATH**/ ?>