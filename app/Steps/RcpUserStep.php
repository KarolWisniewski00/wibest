<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;

class RcpUserStep extends Step
{
    protected string $view = 'livewire.steps.user-step';

    public function mount()
    {
        $this->mergeState([
            'user_id' => $this->model->user_id,
        ]);
    }
    public function icon(): string
    {
        return 'user';
    }
    public function validate()
    {
        return [
            [
                'state.user_id'     => ['required'],
            ],
            [],
            [
                'state.user_id'     => __('user_id'),
            ],
        ];
    }
    public function title(): string
    {
        return __('👤 Wybierz użytkownika');
    }

}
