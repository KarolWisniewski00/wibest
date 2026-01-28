<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;

class WorkBlockTimeStep extends Step
{
    protected string $view = 'livewire.steps.work-block-time-step';

    public function mount()
    {
        $this->mergeState([
            'start_time_clock' => null,
            'end_time_clock' => null,
            'night' => null,
        ]);
    }

    public function save($state)
    {
        $this->model->start_time_clock = $state['start_time_clock'];
        $this->model->end_time_clock = $state['end_time_clock'];
        $this->model->night = $state['night'] ?? false;
    }
    public function icon(): string
    {
        return 'clock';
    }
    public function validate()
    {
        $isNight = $this->livewire->state['night'] ?? false;

        // bazowe reguły
        $rules = [
            'state.start_time_clock' => ['required'],
            'state.end_time_clock' => ['required'],
            'state.night' => ['nullable'],
        ];

        // Jeśli dzień start ma być pierwszy
        if (!$isNight) {
            $rules['state.end_time_clock'][] = 'after_or_equal:state.start_time_clock';
        }else{
            $rules['state.end_time_clock'][] = 'before_or_equal:state.start_time_clock';
        }
        // Liczymy różnicę w minutach
        $start = \Carbon\Carbon::parse($this->livewire->state['start_time_clock']);
        $end   = \Carbon\Carbon::parse($this->livewire->state['end_time_clock']);

        $diffMinutes = $end->diffInMinutes($start);

        // Jeśli mniej niż 60 minut → dodajemy funkcję walidującą
        if ($diffMinutes < 60) {
            $rules['state.end_time_clock'][] =
                function ($attribute, $value, $fail) {
                    $fail('Minimalna różnica czasu to 1 godzina.');
                };
        }

        return [
            $rules,
            [],
            [
                'state.start_time_clock' => __('start_time_clock'),
                'state.end_time_clock'   => __('end_time_clock'),
                'state.night'   => __('night'),
            ],
        ];
    }
    public function title(): string
    {
        return __('🕓 Wybierz czas i typ');
    }
}
