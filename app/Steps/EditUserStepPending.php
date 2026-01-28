<?php

namespace App\Steps;

use App\Models\Leave;
use Vildanbina\LivewireWizard\Components\Step;

class EditUserStepPending extends Step
{
    protected string $view = 'livewire.steps.user-step';
    
    public function mount()
    {
        $this->mergeState([
            'user_id' => $this->model->user_id,
        ]);
    }
    public function save($state)
    {
        $leave = Leave::findOrFail($state['leave_id']);
        $leave->user_id = $state['user_id'];
        $leave->save();
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
