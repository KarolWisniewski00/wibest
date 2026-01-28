<?php

namespace App\Steps;

use App\Models\User;
use Vildanbina\LivewireWizard\Components\Step;

class EditRoleStep extends Step
{
    protected string $view = 'livewire.steps.role-step';

    public function mount()
    {
        $this->mergeState([
            'role' => $this->model->role,
        ]);
    }
    public function save($state)
    {
        $user = User::findOrFail($state['user_id']);
        $user->role = $state['role'];
        $user->save();
    }
    public function icon(): string
    {
        return 'tag';
    }
    public function validate()
    {
        return [
            [
                'state.role'     => ['required'],
            ],
            [],
            [
                'state.role'     => __('role'),
            ],
        ];
    }
    public function title(): string
    {
        return __('🏷️ Wybierz Rolę');
    }
}
