<!doctype html><html lang="pl"><head><meta charset="utf-8"><title>Pasek wypłaty</title><style>
body { font-family: DejaVu Sans, sans-serif; font-size: 10px; color: #17231c; } h1 { font-size: 22px; } h3 { margin-top: 24px; } table { border-collapse: collapse; width: 100%; margin-top: 12px; } th, td { padding: 7px; text-align: left; border-bottom: 1px solid #ddd; } th { background: #eef6ef; } tr { page-break-inside: avoid; } td:last-child { text-align: right; white-space: nowrap; } .note { color: #666; }
</style></head><body>
<h1>Pasek wypłaty</h1><p><?php echo e($calculation['employee_name'] ?? 'Pracownik #'.$payment->user_id); ?> · <?php echo e($calculation['company_name'] ?? 'Firma #'.$payment->company_id); ?></p>
<p>Okres: <?php echo e($calculation['period']); ?> · Data wypłaty: <?php echo e($calculation['paid_on']); ?> · Zatwierdzone rozliczenie #<?php echo e($payment->id); ?></p>
<?php echo $__env->make('admin.payroll.calculation-tables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<p class="note">Parametry: <?php echo e($calculation['parameters']['version']); ?>. Zapisano <?php echo e($payment->created_at); ?>. Dokument przedstawia naliczenie wynagrodzenia; nie jest potwierdzeniem przelewu. Wartości według danych zatwierdzonych dla tej wypłaty.</p>
</body></html>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\admin\payroll\payslip.blade.php ENDPATH**/ ?>