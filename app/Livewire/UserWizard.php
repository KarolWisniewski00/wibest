<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\UserEmailAvailability;
use App\Steps\PrimaryStep;
use App\Steps\RoleStep;
use App\Steps\SupervisorStep;
use App\Support\UserCreationAccess;
use App\Support\UserInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Vildanbina\LivewireWizard\WizardComponent;

class UserWizard extends WizardComponent
{
    public User $user;

    #[Locked]
    public $company_id;

    #[Locked]
    public bool $clients = false;

    public function mount()
    {
        $this->company_id ??= Auth::user()?->company_id;
        UserCreationAccess::authorize($this->company_id, $this->clients);
        parent::mount();
    }

    public function beforeValidate(): void
    {
        UserCreationAccess::authorize($this->company_id, $this->clients);
        $this->state = UserInput::normalize($this->state);
    }

    protected function stepsValidation($step = null): void
    {
        $this->beforeValidate();
        parent::stepsValidation($step);
    }

    public function save(): void
    {
        if ($this->model?->exists) {
            return;
        }
        try {
            parent::save();
        } catch (ValidationException $e) {
            $errors = [];
            foreach ($e->errors() as $key => $messages) {
                $errors[str_starts_with($key, 'state.') ? $key : 'state.'.$key] = $messages;
            }
            if (array_intersect(array_keys($errors), ['state.name', 'state.email', 'state.phone', 'state.position', 'state.gender'])) {
                $this->activeStep = 0;
            }
            throw ValidationException::withMessages($errors);
        }
    }

    public function checkEmail($email): array
    {
        return app(UserEmailAvailability::class)->check($email, $this->company_id, $this->clients);
    }

    #[Locked]
    public array $steps = [
        PrimaryStep::class,
        RoleStep::class,
        SupervisorStep::class,
    ];

    public function model(): User
    {
        return new User;
    }

    public function getUsersChecked() {}

    public function getUsers()
    {
        UserCreationAccess::authorize($this->company_id, $this->clients);
        if ($this->company_id == null) {
            $this->company_id = Auth::user()->company_id;
        }
        $this->mergeState([
            'company_id' => $this->company_id,
        ]);

        return User::where('company_id', $this->company_id)
            ->whereNotNull('role')->get();
    }
}
