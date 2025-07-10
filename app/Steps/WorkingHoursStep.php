<?php

namespace App\Steps;

use App\Mail\LeaveMail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Vildanbina\LivewireWizard\Components\Step;
use Livewire\Attributes\On;

class WorkingHoursStep extends Step
{
    protected string $view = 'livewire.steps.working-hours-step';


    public function mount()
    {
        $this->mergeState([
            'start_time' => $this->model->start_date,
            'end_time' => $this->model->end_date,
        ]);
    }
    public function save($state) {}
    public function icon(): string
    {
        return 'check';
    }
    public function title(): string
    {
        return __('Ustaw godziny pracy');
    }
}
