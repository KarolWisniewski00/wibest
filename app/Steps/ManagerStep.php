<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;

class ManagerStep extends Step
{
    protected string $view = 'livewire.steps.manager-step';

    public function mount()
    {
        $this->mergeState([
            'manager_id' => $this->model->manager_id,
        ]);
    }
    public function save($state)
    {
        $this->model->manager_id = $state['manager_id'];
    }
    public function icon(): string
    {
        return 'check';
    }
    public function validate()
    {
        return [
            [
                'state.manager_id'     => ['required'],
            ],
            [],
            [
                'state.manager_id'     => __('manager_id'),
            ],
        ];
    }
    public function title(): string
    {
        return __('Wybierz przełożonego');
    }

}
