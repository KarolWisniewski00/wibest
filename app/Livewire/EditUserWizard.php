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
    public function mount($userId = null, $routeBack = 'team.user.show')
    {
        $this->user = User::findOrFail($userId);

        $this->mergeState([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'position' => $this->user->position,
            'role' => $this->user->role,
            'gender' => $this->user->gender === 'male',
            'supervisor_id' => $this->user->supervisor_id,
            'user_id' => $userId,
            'route_back'   => $routeBack,
        ]);
    }

    public function model(): User
    {
        return $this->user;
    }
    public function getUsers($company_id = null)
    {
        if (is_null($company_id)) {
            $company_id = Auth::user()->company_id;
        }
        $userRepository = new UserRepository();
        return $userRepository->getByAdminByCompany($company_id);
    }
}
