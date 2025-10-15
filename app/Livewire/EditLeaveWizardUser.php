<?php

namespace App\Livewire;

use App\Models\Leave;
use App\Repositories\UserRepository;
use App\Steps\EditLeaveDateStep;
use App\Steps\EditLeaveStep;
use App\Steps\EditManagerStep;
use App\Steps\EditUserLeaveDateStep;
use App\Steps\EditUserStep;
use App\Steps\EditUserStepPending;
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
        return $userRepository->getByAdminWithoutLogged();
    }

}
