<?php

namespace App\Livewire;


use App\Models\User;
use App\Repositories\UserRepository;
use App\Steps\PrimaryStep;
use App\Steps\RoleStep;
use App\Steps\SupervisorStep;
use App\Steps\WorkingHoursStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;

class UserWizard extends WizardComponent
{
    public User $user;

    public array $steps = [
        PrimaryStep::class,
        RoleStep::class,
        SupervisorStep::class,
    ];

    public function model(): User
    {
        return new User();
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin(Auth::user()->company_id);
    }
}
