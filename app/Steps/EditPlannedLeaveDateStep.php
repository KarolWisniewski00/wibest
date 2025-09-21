<?php

namespace App\Steps;

use App\Mail\EditPlannedLeaveMail;
use App\Mail\LeaveMail;
use App\Mail\PlannedLeaveMail;
use App\Models\PlannedLeave;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Vildanbina\LivewireWizard\Components\Step;

class EditPlannedLeaveDateStep extends Step
{
    protected string $view = 'livewire.steps.edit-planned-leave-date-step';

    public function mount()
    {
        $this->mergeState([
            'start_time' => $this->model->start_date,
            'end_time' => $this->model->end_date,
        ]);
    }
    public function save($state)
    {
        $leave = PlannedLeave::findOrFail($state['planned_leave_id']);
        $leave->start_date = $state['start_time'];
        $leave->end_date = $state['end_time'];
        $leave->save();

        $leaveMail = new EditPlannedLeaveMail($leave);
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
                'state.end_time'     => ['required', 'date', 'after_or_equal:state.start_time'],
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
