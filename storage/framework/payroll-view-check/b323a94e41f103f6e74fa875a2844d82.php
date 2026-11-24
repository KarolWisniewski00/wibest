<div>
    <!-- Start i Stop -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="">
            <!-- START -->
            <input
                name="start_time"
                wire:model="state.start_time"
                type="hidden"
                class="" />
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar-from-to-auto', ['type' => 'first','startDate' => $this->getState()['start_time'] ?? null,'endDate' => $this->getState()['end_time'] ?? null,'currentMonth' => session('first'),'leaveId' => $this->getState()['leave_id'] ?? null,'leave' => 'true','userId' => ''.e(array_key_exists('user_id', $this->getState()) ? $this->getState()['user_id'] : auth()->user()->id).'']);

$__key = time();

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2052690341-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <!-- STOP -->
        <div class="">
            <input
                type="hidden"
                wire:model="state.end_time"
                name="end_time"
                class="">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar-from-to-auto', ['type' => 'second','startDate' => $this->getState()['start_time'] ?? null,'endDate' => $this->getState()['end_time'] ?? null,'currentMonth' => session('second'),'leaveId' => $this->getState()['leave_id'] ?? null,'leave' => 'true','userId' => ''.e(array_key_exists('user_id', $this->getState()) ? $this->getState()['user_id'] : auth()->user()->id).'']);

$__key = time();

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2052690341-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wibest\resources\views\livewire\steps\leave-date-step.blade.php ENDPATH**/ ?>