<?php

namespace App\Steps;

use App\Models\User;
use Vildanbina\LivewireWizard\Components\Step;

class TimeStep extends Step
{
    protected string $view = 'livewire.steps.time-step';

    public function mount()
    {
        $this->mergeState([
            'working_hours_from' => date('H:i', strtotime($this->model->working_hours_from)),
            'working_hours_to' => date('H:i', strtotime($this->model->working_hours_to)),
        ]);
    }
    public function save($state)
    {
        $user = User::findOrFail($state['user_id']);
        $user->working_hours_from = $state['working_hours_from'];
        $user->working_hours_to = $state['working_hours_to'];
        // Calculate the difference in hours between from and to
        $from = strtotime($state['working_hours_from']);
        $to = strtotime($state['working_hours_to']);
        $diff = ($to - $from) / 3600;
        $user->working_hours_custom = (int) $diff;
        $user->save();

        return redirect()->route('team.user.show', $user->id)->with('success', 'Operacja zakończona powodzeniem.');
    }
    public function icon(): string
    {
        return 'check';
    }
    public function validate()
    {
        return [
            [
                'state.working_hours_from'     => ['required'],
                'state.working_hours_to'     => ['required'],
            ],
            [],
            [
                'state.working_hours_from'     => __('working_hours_from'),
                'state.working_hours_to'     => __('working_hours_to'),
            ],
        ];
    }
    public function title(): string
    {
        return __('Wybierz użytkownika');
    }

}
