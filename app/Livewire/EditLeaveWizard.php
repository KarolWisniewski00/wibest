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
    }
    #[On('selectDate')]
    public function handleCalendarDateSelected($selectedDate, $typeTime = 'start_time')
    {
        if ($typeTime === 'start_time') {
            $this->mergeState([
                'start_time' => $selectedDate,
            ]);
        } else {
            $this->mergeState([
                'end_time' => $selectedDate,
            ]);
        }
    }
    public function model(): Leave
    {
        return $this->leave;
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin(Auth::user()->company_id);;
    }

}
