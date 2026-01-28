<?php

namespace App\Livewire;

use App\Models\Leave;
use App\Repositories\UserRepository;
use App\Steps\EditLeaveDateStep;
use App\Steps\EditLeaveStep;
use App\Steps\EditManagerStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class EditLeaveWizard extends WizardComponent
{
    public Leave $leave;

    public array $steps = [
        EditManagerStep::class,
        EditLeaveStep::class,
        EditLeaveDateStep::class
    ];

    // 👇 Wczytaj model z bazy na podstawie ID
    public function mount($leaveId = null)
    {
        $this->leave = Leave::findOrFail($leaveId);

        $this->mergeState([
            'manager_id' => $this->leave->manager_id,
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
        return $userRepository->getManagers();
    }
    public function getUsersChecked()
    {
        $state = $this->getState();
        $this->dispatch('user-selected', user_ids: [$state['manager_id']]);
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
}
