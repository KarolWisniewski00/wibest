<?php

namespace App\Steps;

use Illuminate\Validation\Rule;
use Vildanbina\LivewireWizard\Components\Step;

class RoleStep extends Step
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
        $this->model->role = $state['role'];
    }

    public function icon(): string
    {
        return 'tag';
    }

    public function validate()
    {
        return [
            [
                'state.role' => ['required', Rule::in(['admin', 'kierownik', 'użytkownik'])],
            ],
            [],
            [
                'state.role' => __('role'),
            ],
        ];
    }

    public function title(): string
    {
        return __('🏷️ Wybierz Rolę');
    }
}
