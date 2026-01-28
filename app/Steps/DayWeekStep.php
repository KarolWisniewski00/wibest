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
        return 'calendar';
    }
    public function validate()
    {
        return [
            [
                'state.working_hours_start_day' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $daysOrder = [
                            'poniedziałek' => 1,
                            'wtorek'       => 2,
                            'środa'        => 3,
                            'czwartek'     => 4,
                            'piątek'       => 5,
                            'sobota'       => 6,
                            'niedziela'    => 7,
                        ];

                        $start = $daysOrder[$this->livewire->state['working_hours_start_day']] ?? null;
                        $stop  = $daysOrder[$this->livewire->state['working_hours_stop_day']] ?? null;

                        if ($start && $stop && $start > $stop) {
                            $fail('Dzień rozpoczęcia nie może być późniejszy niż dzień zakończenia.');
                        }
                    },
                ],
                'state.working_hours_stop_day' => ['required'],
            ],
            [],
            [
                'state.working_hours_start_day' => __('working_hours_start_day'),
                'state.working_hours_stop_day'  => __('working_hours_stop_day'),
            ],
        ];
    }

    public function title(): string
    {
        return __('📅 Wybierz dni tygodnia');
    }
}
