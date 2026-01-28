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
            'gender' => $this->model->gender ?? false,
        ]);
    }
    public function save($state)
    {
        $this->model->name = $state['name'];
        $this->model->email = $state['email'];
        $this->model->phone = $state['phone'];
        $this->model->position = $state['position'];
        $this->model->gender = ($state['gender'] ?? false) ? 'male' : 'female';
    }
    public function validate()
    {
        return [
            [
                'state.name'     => ['required'],
                'state.email'     => ['required'],
                'state.phone'     => ['required'],
                'state.gender'   => ['required'],
                'state.position'     => ['nullable'],
            ],
            [],
            [
                'state.name'     => __('name'),
                'state.email'     => __('email'),
                'state.phone'     => __('phone'),
                'state.gender'     => __('gender'),
                'state.position'     => __('position'),
            ],
        ];
    }
    public function icon(): string
    {
        return 'clipboard';
    }
    public function title(): string
    {
        return __('📋 Wprowadź dane podstawowe');
    }
}
