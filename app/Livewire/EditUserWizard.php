<?php

namespace App\Livewire;


use App\Models\User;
use App\Repositories\UserRepository;
use App\Steps\EditPrimaryStep;
use App\Steps\EditRoleStep;
use App\Steps\EditSupervisorStep;
use App\Steps\EditWorkingHoursStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;

class EditUserWizard extends WizardComponent
{
    public User $user;

    public array $steps = [
        EditPrimaryStep::class,
        EditRoleStep::class,
        EditSupervisorStep::class,
    ];
    // 👇 Wczytaj model z bazy na podstawie ID
    public function mount($userId = null)
    {
        $this->user = User::findOrFail($userId);

        $this->mergeState([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'position' => $this->user->position,
            'role' => $this->user->role,
            'supervisor_id' => $this->user->supervisor_id,
            'user_id' => $userId
        ]);
    }

    public function model(): User
    {
        return $this->user;
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin(Auth::user()->company_id);
    }
}
