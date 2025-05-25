<?php

namespace App\Livewire;


use App\Models\PlannedLeave;
use App\Repositories\UserRepository;
use App\Steps\EditPlannedLeaveDateStep;
use App\Steps\EditUserStep;
use App\Steps\PlannedLeaveDateStep;
use App\Steps\UserStep;
use Vildanbina\LivewireWizard\WizardComponent;

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
