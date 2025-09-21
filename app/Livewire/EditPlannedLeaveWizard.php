<?php

namespace App\Livewire;


use App\Models\PlannedLeave;
use App\Repositories\UserRepository;
use App\Steps\EditPlannedLeaveDateStep;
use App\Steps\EditUserStep;
use App\Steps\PlannedLeaveDateStep;
use App\Steps\UserStep;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;
class EditPlannedLeaveWizard extends WizardComponent
{
    public PlannedLeave $plannedLeave;

    public array $steps = [
        EditUserStep::class,
        EditPlannedLeaveDateStep::class
    ];

    // 👇 Wczytaj model z bazy na podstawie ID
    public function mount($plannedLeaveId = null)
    {
        $this->plannedLeave = PlannedLeave::findOrFail($plannedLeaveId);

        $this->mergeState([
            'user_id' => $this->plannedLeave->user_id,
            'start_time' => $this->plannedLeave->start_date,
            'end_time'   => $this->plannedLeave->end_date,
            'planned_leave_id'   => $plannedLeaveId,
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
    // 👇 Zwróć już wczytany model
    public function model(): PlannedLeave
    {
        return $this->plannedLeave;
    }

    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getAllFromCompany();
    }
}
