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

        return redirect()->route($state['route_back'], $user->id)->with('success', 'Operacja zakończona powodzeniem.');
    }
    public function icon(): string
    {
        return 'clock';
    }
    public function validate()
    {
        return [
            [
                'state.working_hours_from' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $from = $this->livewire->state['working_hours_from'];
                        $to   = $this->livewire->state['working_hours_to'];
    
                        if ($from && $to) {
                            // zamiana "HH:MM" na liczbę minut od 00:00
                            [$fromHour, $fromMinute] = explode(':', $from);
                            [$toHour, $toMinute] = explode(':', $to);

                            $fromTotal = ((int)$fromHour) * 60 + ((int)$fromMinute);
                            $toTotal   = ((int)$toHour) * 60 + ((int)$toMinute);

                            if ($fromTotal > $toTotal) {
                                $fail('Godzina rozpoczęcia nie może być późniejsza niż godzina zakończenia.');
                            }
                        }
                    },
                ],
                'state.working_hours_to' => ['required'],
            ],
            [],
            [
                'state.working_hours_from' => __('working_hours_from'),
                'state.working_hours_to'   => __('working_hours_to'),
            ],
        ];
    }

    public function title(): string
    {
        return __('🕒 Wybierz godziny pracy');
    }
}
