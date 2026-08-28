<?php

namespace App\Livewire;

use App\Models\User;
use App\Steps\PrimaryStep;
use App\Steps\RoleStep;
use App\Steps\SupervisorStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;

class UserWizard extends WizardComponent
{
    public User $user;
    public $company_id;

    public array $steps = [
        PrimaryStep::class,
        RoleStep::class,
        SupervisorStep::class,
    ];

    public function model(): User
    {
        return new User();
    }
    public function getUsersChecked()
    {
        
    }
    public function getUsers()
    {
        if($this->company_id == null){
            $this->company_id = Auth::user()->company_id;
        }
        $this->mergeState([
            'company_id' => $this->company_id,
        ]);
        return User::where('company_id', $this->company_id)
            ->whereNotNull('role')->get();
    }
}
