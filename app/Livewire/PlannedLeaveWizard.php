<?php

namespace App\Livewire;


use App\Models\PlannedLeave;
use App\Repositories\UserRepository;
use App\Steps\PlannedLeaveDateStep;
use App\Steps\UserStep;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;
class PlannedLeaveWizard extends WizardComponent
{
    public PlannedLeave $plannedLeave;

    public array $steps = [
        UserStep::class,
        PlannedLeaveDateStep::class
    ];
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
    public function model(): PlannedLeave
    {
        return new PlannedLeave();
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getAllFromCompany();
    }
}
