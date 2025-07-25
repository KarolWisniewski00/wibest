<?php

namespace App\Steps;

use App\Models\PlannedLeave;
use Vildanbina\LivewireWizard\Components\Step;

class EditUserStep extends Step
{
    protected string $view = 'livewire.steps.edit-user-step';
    
    public function mount()
    {
        $this->mergeState([
            'user_id' => $this->model->user_id,
        ]);
    }
    public function save($state)
    {
        $leave = PlannedLeave::findOrFail($state['planned_leave_id']);
        $leave->user_id = $state['user_id'];
        $leave->save();
    }
    public function icon(): string
    {
        return 'check';
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
        return __('Wybierz użytkownika');
    }

}
