<?php
if($night){

if($night == true){
$isNight = true;
}else{
$isNight = false;
}

}else{
$isNight = false;
}

if($start_time_clock){
$start_time = $start_time_clock;
}else{
$start_time = '';
}
if($end_time_clock){
$end_time = $end_time_clock;
}else{
$end_time = '';
}
if($isNight){
$rcp_seconds = \Carbon\Carbon::parse($start_time)->diffInSeconds(\Carbon\Carbon::parse($end_time)->addDay()) ?? 0;
}else{
$rcp_seconds = \Carbon\Carbon::parse($start_time)->diffInSeconds(\Carbon\Carbon::parse($end_time)) ?? 0;
}
?>

<?php
$allOk = true;
$alert = false;
$alert_kind = '';
?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($work_session->time_in_work) && $work_session->time_in_work == '24:00:00'): ?>
<?php
$alert = true;
$alert_kind = 'Automatyczne zakończenie';
?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($work_session->user) && $work_session->user->overtime_task): ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($work_session->getAlertTask() && $work_session->task_id == null): ?>
<?php
$alert = true;
$alert_kind = 'Brak zadania';
?>
<?php elseif($work_session->getAlertTask() && $work_session->task->status == 'oczekujące'): ?>
<?php
$alert = true;
$alert_kind = 'Oczekujące';
?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start_time != ''): ?>
    <div class="p-2 pt-0 text-sm rounded-lg flex flex-col gap-4">
        <span class="text-gray-900 dark:text-white">🕓 Podgląd</span>
        <div class="h-[180px] flex flex-col items-center justify-center text-center 
            w-full rounded-2xl p-2
            <?php if($alert): ?>
            bg-yellow-300 dark:bg-yellow-400
            hover:bg-yellow-400 dark:hover:bg-yellow-500
            <?php else: ?>
                <?php if($isNight): ?>
                    <?php if($planned_seconds == null): ?>
                    bg-green-400 dark:bg-green-500
                    hover:bg-green-300 dark:hover:bg-green-400
                    <?php elseif($planned_seconds == $rcp_seconds): ?>
                    bg-green-400 dark:bg-green-500
                    hover:bg-green-300 dark:hover:bg-green-400
                    <?php elseif($planned_seconds > $rcp_seconds): ?>
                    bg-green-400/60 dark:bg-green-500/60
                    hover:bg-green-300/70 dark:hover:bg-green-400/70
                    <?php elseif($planned_seconds < $rcp_seconds): ?>
                    bg-indigo-400 dark:bg-indigo-500
                    hover:bg-indigo-300 dark:hover:bg-indigo-400
                    <?php endif; ?>
                <?php else: ?>
                    <?php if($planned_seconds == null): ?>
                    bg-green-300 dark:bg-green-400
                    hover:bg-green-400 dark:hover:bg-green-500
                    <?php elseif($planned_seconds == $rcp_seconds): ?>
                    bg-green-300 dark:bg-green-400
                    hover:bg-green-400 dark:hover:bg-green-500
                    <?php elseif($planned_seconds > $rcp_seconds): ?>
                    bg-green-300/60 dark:bg-green-400/60
                    hover:bg-green-400/70 dark:hover:bg-green-500/70
                    <?php elseif($planned_seconds < $rcp_seconds): ?>
                    bg-indigo-300 dark:bg-indigo-400
                    hover:bg-indigo-400 dark:hover:bg-indigo-500
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            transition-colors duration-200 
            ">

            <!-- Ikona i label -->
            <div class="flex flex-col items-center justify-center h-full">
                <span class="text-2xl">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isNight == 'night'): ?>
                    🌙
                    <?php else: ?>
                    ⏱️
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </span>
                <span class="px-2 py-0.5 mt-1 rounded-full text-[0.6rem] font-bold 
                                    bg-white/60 text-gray-900 uppercase tracking-widest">
                    RCP
                </span>
            </div>

            <!-- Godziny i dni -->
            <div class="mt-2 flex flex-col items-center text-[0.65rem] md:text-sm text-gray-800 dark:text-gray-100 leading-tight">
                <div class="font-semibold tracking-widest uppercase">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start_time != ''): ?>
                    <?php echo e(\Carbon\Carbon::parse($start_time)->format('H:i')); ?>

                    <?php else: ?>
                    Brak
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    –
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($end_time != ''): ?>
                    <?php echo e(\Carbon\Carbon::parse($end_time)->format('H:i')); ?>

                    <?php else: ?>
                    Brak
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <div class="text-[0.6rem] mt-1 font-medium tracking-widest text-gray-700 dark:text-gray-200">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start_time_date != ''): ?>
                    <?php echo e(\Carbon\Carbon::parse($start_time_date)
                    ->locale('pl')
                    ->translatedFormat('D')); ?>

                    –
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isNight == 'night'): ?>
                    <?php echo e(\Carbon\Carbon::parse($start_time_date)->addDay()
                        ->locale('pl')
                        ->translatedFormat('D')); ?>

                    <?php else: ?>
                    <?php echo e(\Carbon\Carbon::parse($start_time_date)
                    ->locale('pl')
                    ->translatedFormat('D')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                    OD
                    –
                    DO
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <!-- Opis -->
            <p class="text-[0.7rem] font-semibold text-gray-800 dark:text-gray-900 tracking-wide uppercase">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($alert): ?>
                <?php echo e($alert_kind); ?>

                <?php else: ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($start_time && $end_time): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isNight == 'night'): ?>
                <?php echo e(\Carbon\Carbon::parse($start_time)
            ->diff(\Carbon\Carbon::parse($end_time)->addDay())
            ->format('%H:%I:%S')); ?>

                <?php else: ?>
                <?php echo e(\Carbon\Carbon::parse($start_time)
            ->diff(\Carbon\Carbon::parse($end_time))
            ->format('%H:%I:%S')); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php else: ?>
                Brak
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>

        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\rcp-time-and-type-picker.blade.php ENDPATH**/ ?>