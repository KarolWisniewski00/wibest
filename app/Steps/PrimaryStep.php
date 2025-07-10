<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;

class PrimaryStep extends Step
{
    protected string $view = 'livewire.steps.primary-step';

    public function mount()
    {
        $this->mergeState([
            'name' => $this->model->name,
            'email' => $this->model->email,
            'phone' => $this->model->phone,
            'position' => $this->model->position,
        ]);
    }
    public function save($state)
    {
        $this->model->name = $state['name'];
        $this->model->email = $state['email'];
        $this->model->phone = $state['phone'];
        $this->model->position = $state['position'];
    }
    public function validate()
    {
        return [
            [
                'state.name'     => ['required'],
                'state.email'     => ['required'],
                'state.phone'     => ['required'],
                'state.position'     => ['nullable'],
            ],
            [],
            [
                'state.name'     => __('name'),
                'state.email'     => __('email'),
                'state.phone'     => __('phone'),
                'state.position'     => __('position'),
            ],
        ];
    }
    public function icon(): string
    {
        return 'check';
    }
    public function title(): string
    {
        return __('Wprowadź dane podstawowe');
    }
}
