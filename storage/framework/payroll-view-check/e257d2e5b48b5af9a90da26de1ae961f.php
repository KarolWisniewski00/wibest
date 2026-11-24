<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Raport obecności</title>
    <style>
        @page {
            margin: 10px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            margin: 10px;
        }

        .header {
            width: 100%;
            margin-bottom: 10px;
            border: none;
        }

        .header td {
            font-size: 12px;
            font-weight: bold;
            border: none;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 3px;
            font-size: 9px;
            text-align: center;
            word-wrap: break-word;
        }

        td:first-child,
        th:first-child {
            white-space: nowrap;
            width: 120px;
            /* lub inna konkretna szerokość */
            text-align: left;
        }

        .legend {
            margin-top: 20px;
            font-size: 9px;
        }
    </style>
</head>

<body>
    
    <table class="header">
        <tr>
            <td style="text-align: left;">Raport obecności</td>
            <td style="text-align: right;"><?php echo e($monthName); ?> <?php echo e($year); ?></td>
        </tr>
    </table>

    
    <table>
        <thead>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Imię i nazwisko</th>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th style="font-size: 9px; padding: 0px; line-height: 1.2; margin: 0;">
                    <?php echo e($date['day_number']); ?><br><?php echo e($date['day_name_short']); ?>

                </th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;">
                        <?php echo e(Str::limit($employee->name, 17, '...')); ?></td>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td style="font-size: 9px; padding: 2px; margin: 0;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($employee->dates[$date['date']])): ?>
                                <?php echo e($employee->dates[$date['date']]); ?>

                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>

    <?php
        $usedShorts = collect($employees)
            ->pluck('dates')
            ->flatten()   // zamiast flatMap
            ->filter()
            ->map(fn($v) => trim($v))
            ->unique()
            ->values();
    ?>

    
    <p class="legend">
        <strong>Legenda:</strong><br>
        RCP – Rejestracja czasu pracy,<br>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = config('leavetypes.shortType'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $short): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($usedShorts->contains($short)): ?>
                <?php echo e($short); ?> – <?php echo e(ucfirst($name)); ?><br>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </p>
</body>

</html><?php /**PATH C:\xampp\htdocs\wibest\resources\views\exports\timesheet.blade.php ENDPATH**/ ?>