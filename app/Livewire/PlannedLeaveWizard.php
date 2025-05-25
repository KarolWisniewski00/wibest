<?php

namespace App\Livewire;


use App\Models\PlannedLeave;
use App\Repositories\UserRepository;
use App\Steps\PlannedLeaveDateStep;
use App\Steps\UserStep;
use Vildanbina\LivewireWizard\WizardComponent;

class PlannedLeaveWizard extends WizardComponent
{
    public PlannedLeave $plannedLeave;

    public array $steps = [
        UserStep::class,
        PlannedLeaveDateStep::class
    ];

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
