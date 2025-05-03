<?php

namespace App\Livewire;


use App\Models\Leave;
use App\Repositories\UserRepository;
use App\Steps\LeaveDateStep;
use App\Steps\LeaveStep;
use App\Steps\ManagerStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;

class LeaveWizard extends WizardComponent
{
    public Leave $leave;

    public array $steps = [
        ManagerStep::class,
        LeaveStep::class,
        LeaveDateStep::class
    ];

    public function model(): Leave
    {
        return new Leave();
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin(Auth::user()->company_id);;
    }
}
