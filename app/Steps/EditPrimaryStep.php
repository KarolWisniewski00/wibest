<?php

namespace App\Steps;

use App\Models\User;
use Vildanbina\LivewireWizard\Components\Step;

class EditPrimaryStep extends Step
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
        $user = User::findOrFail($state['user_id']);
        $user->name = $state['name'];
        $user->email = $state['email'];
        $user->phone = $state['phone'];
        $user->position = $state['position'];
        $user->save();
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
