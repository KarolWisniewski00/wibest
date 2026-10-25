<?php

namespace App\Livewire;

use App\Models\Leave;
use App\Models\LeaveBalance;
use App\Repositories\UserRepository;
use App\Steps\EditLeaveStep;
use App\Steps\EditUserLeaveDateStep;
use App\Steps\EditUserStepPending;
use Exception;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class EditLeaveWizardUser extends WizardComponent
{
    public Leave $leave;

    public array $steps = [
        EditUserStepPending::class,
        EditLeaveStep::class,
        EditUserLeaveDateStep::class
    ];

    // 👇 Wczytaj model z bazy na podstawie ID
    public function mount($leaveId = null)
    {
        $this->leave = Leave::findOrFail($leaveId);

        $this->mergeState([
            'user_id' => $this->leave->user_id,
            'type' => $this->leave->type,
            'start_time' => $this->leave->start_date,
            'end_time'   => $this->leave->end_date,
            'leave_id'   => $leaveId,
        ]);
        $this->getUsersChecked();
        $this->getLeaveChecked();
        $this->getDateStartEndChecked();
        $this->setStep(2);
    }
    #[On('dateRangeSelected')]
    public function handleCalendarDateSelected(array $dates)
    {
        $startDate = $dates['startDate'] ?? null;
        $endDate = $dates['endDate'] ?? null;

        $this->mergeState([
            'start_time' => $startDate,
            'end_time' => $endDate,
        ]);

        $this->getLeaveChecked();
        $this->getDateStartEndChecked();
    }
    public function model(): Leave
    {
        return $this->leave;
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        if (Auth::user()->role == 'menedżer') {
            return $userRepository->getByManager();
        }
        return $userRepository->getByAdmin();
    }
    public function getUsersChecked()
    {
        $state = $this->getState();
        $this->dispatch('user-selected', user_ids: [$state['user_id']]);
    }
    public function getLeaveChecked()
    {
        $state = $this->getState();
        $this->dispatch('leave-selected', data: [$state['type'], $state['start_time'] ?? '', $state['end_time'] ?? '']);
    }
    public function getDateStartEndChecked()
    {
        $state = $this->getState();
        $this->dispatch(
            'date-start-end-selected',
            data: [$state['start_time'] ?? '', $state['end_time'] ?? ''],
        );
    }
    public function getLeaveFree()
    {
        try {
            $state = $this->getState();
            $leave_balance = LeaveBalance::where('user_id', $state['user_id'])
                ->where('company_id', Auth::user()->company_id)
                ->where('year', now()->year)
                ->first();
            $carried_over = $leave_balance->carried_over ?? 0;
            $base_days = $leave_balance->base_days ?? 0;
            return ($carried_over + $base_days) - $leave_balance->used_days;
        } catch (Exception) {
            return 0;
        }
    }
}
