<?php

namespace App\Steps;

use App\Models\Leave;
use Vildanbina\LivewireWizard\Components\Step;

class EditManagerStep extends Step
{
    protected string $view = 'livewire.steps.edit-manager-step';

    public function mount()
    {
        $this->mergeState([
            'manager_id' => $this->model->manager_id,
        ]);
    }
    public function save($state)
    {
        $leave = Leave::findOrFail($state['leave_id']);
        $leave->manager_id = $state['manager_id'];
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
