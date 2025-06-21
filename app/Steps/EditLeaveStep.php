<?php

namespace App\Steps;

use App\Models\Leave;
use Vildanbina\LivewireWizard\Components\Step;

class EditLeaveStep extends Step
{
    protected string $view = 'livewire.steps.edit-leave-step';

    public function mount()
    {
        $this->mergeState([
            'type' => $this->model->type,
        ]);
    }
    public function save($state)
    {
        $leave = Leave::findOrFail($state['leave_id']);
        $leave->type = $state['type'];
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
        return __('Wybierz rodzaj wniosku');
    }

}
