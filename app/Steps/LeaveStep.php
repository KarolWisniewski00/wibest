<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;

class LeaveStep extends Step
{
    protected string $view = 'livewire.steps.leave-step';

    public function mount()
    {
        $this->mergeState([
            'type' => $this->model->type,
        ]);
    }
    public function save($state)
    {
        $this->model->type = $state['type'];
    }
    public function icon(): string
    {
        return 'clipboard';
    }
    public function validate()
    {
        return [
            [
                'state.type'     => ['required'],
            ],
            [],
            [
                'state.type'     => __('type'),
            ],
        ];
    }
    public function title(): string
    {
        return __('📋 Wybierz rodzaj wniosku');
    }

}
