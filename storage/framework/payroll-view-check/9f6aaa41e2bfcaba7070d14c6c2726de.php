<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Ewidencja czasu pracy</title>
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
            <td style="text-align: left;">Ewidencja czasu pracy - <?php echo e($employee->name); ?></td>
            <td style="text-align: right;"><?php echo e($startDate); ?> - <?php echo e($endDate); ?></td>
        </tr>
    </table>

    
    <table>
        <thead>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Dzień</th>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Zaplanowany czas</th>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Zdarzenia</th>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Czas pracy</th>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Nadgodziny</th>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Brak normy</th>
            <th style="font-size: 9px; padding: 2px; margin: 0; width:10%;">Wnioski</th>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($date); ?></td>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($datesPlanned[$key] != '00h'): ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($datesPlanned[$key]); ?></td>
                <?php else: ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"></td>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($datesWork[$key]); ?></td>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($datesAll[$key]); ?></td>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($datesExtra[$key] != 0): ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($datesExtra[$key]); ?></td>
                <?php else: ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"></td>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($datesUnder[$key] != "00h"): ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($datesUnder[$key]); ?></td>
                <?php else: ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"></td>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($datesLeave[$key]); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <tr>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;">Razem</td>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($employee->time_in_work_hms_planned); ?></td>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"></td>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($employee->time_in_work_hms); ?></td>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($employee->time_in_work_hms_extra); ?></td>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($employee->time_in_work_hms_under); ?></td>
                <td style="white-space: nowrap; font-size: 9px; padding: 2px; margin: 0; width:10%;"><?php echo e($employee->time_in_work_hms_leave); ?></td>
            </tr>
        </tbody>
    </table>


    
</body>

</html><?php /**PATH C:\xampp\htdocs\wibest\resources\views\exports\attendancesheet.blade.php ENDPATH**/ ?>