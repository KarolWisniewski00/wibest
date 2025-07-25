<?php

namespace App\Steps;

use App\Mail\LeaveMail;
use App\Mail\PlannedLeaveMail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Vildanbina\LivewireWizard\Components\Step;

class PlannedLeaveDateStep extends Step
{
    protected string $view = 'livewire.steps.leave-date-step';

    public function mount()
    {
        $this->mergeState([
            'start_time' => $this->model->start_date,
            'end_time' => $this->model->end_date,
        ]);
    }
    public function save($state)
    {
        $leave = $this->model;
        $leave->start_date = $state['start_time'];
        $leave->end_date = $state['end_time'];
        $leave->company_id = Auth::user()->company_id;
        $leave->created_user_id = Auth::id();
        $leave->save();

        $leaveMail = new PlannedLeaveMail($leave);
        try {
            Mail::to($leave->user->email)->send($leaveMail);
        } catch (Exception) {
        }

        return redirect()->route('calendar.all.index')->with('success', 'Operacja zakończona powodzeniem.');
    }
    public function icon(): string
    {
        return 'check';
    }
    public function validate()
    {
        return [
            [
                'state.start_time'     => ['required', 'date'],
                'state.end_time'     => ['required', 'date', 'after_or_equal:today', 'after_or_equal:start_date'],
            ],
            [],
            [
                'state.start_time'     => __('start_time'),
                'state.end_time'     => __('end_time'),
            ],
        ];
    }
    public function title(): string
    {
        return __('Wybierz zakres dat');
    }
}
