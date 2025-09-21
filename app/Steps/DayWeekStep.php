<?php

namespace App\Steps;

use App\Models\User;
use Vildanbina\LivewireWizard\Components\Step;

class DayWeekStep extends Step
{
    protected string $view = 'livewire.steps.day-week-step';

    public function mount()
    {
        $this->mergeState([
            'working_hours_start_day' => $this->model->working_hours_start_day,
            'working_hours_stop_day' => $this->model->working_hours_stop_day,
        ]);
    }
    public function save($state)
    {
        $user = User::findOrFail($state['user_id']);
        $user->working_hours_start_day = $state['working_hours_start_day'];
        $user->working_hours_stop_day = $state['working_hours_stop_day'];
        $user->save();
    }
    public function icon(): string
    {
        return 'check';
    }
    public function validate()
    {
        return [
            [
                'state.working_hours_start_day'     => ['required'],
                'state.working_hours_stop_day'     => ['required'],
            ],
            [],
            [
                'state.working_hours_start_day'     => __('working_hours_start_day'),
                'state.working_hours_stop_day'     => __('working_hours_stop_day'),
            ],
        ];
    }
    public function title(): string
    {
        return __('Wybierz dni pracy');
    }

}
