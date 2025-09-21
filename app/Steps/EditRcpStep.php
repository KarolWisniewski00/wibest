<?php

namespace App\Steps;

use App\Mail\LeaveMail;
use App\Models\Event;
use App\Models\WorkSession;
use App\Services\WorkSessionService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Vildanbina\LivewireWizard\Components\Step;
use Livewire\Attributes\On;

class EditRcpStep extends Step
{
    protected string $view = 'livewire.steps.rcp-step';
    
    public function mount()
    {
        $this->mergeState([
            'start_time' => null,
            'start_time_clock' => null,
            'end_time_clock' => null,
        ]);
    }
    public function save($state)
    {
        $dateTimeStart = \Carbon\Carbon::parse(
            $state['start_time'] . ' ' . $state['start_time_clock']
        )->format('Y-m-d H:i:s');

        $work_session = WorkSession::findOrFail($state['work_session_id']);

        $event_start = Event::findOrFail($work_session->event_start_id);
        $event_start->time = $dateTimeStart;
        $event_start->save();

        $dateTimeEnd = \Carbon\Carbon::parse(
            $state['start_time'] . ' ' . $state['end_time_clock']
        )->format('Y-m-d H:i:s');
        
        $eventStop = Event::findOrFail($work_session->event_stop_id);
        $eventStop->time = $dateTimeEnd;
        $eventStop->save();

        $timeInWork = Carbon::parse($dateTimeStart)
            ->diff(Carbon::parse($dateTimeEnd))
            ->format('%H:%I:%S');
            
        $work_session->time_in_work = $timeInWork;
        $work_session->save();

        return redirect()->route('rcp.work-session.index')->with('success', 'Operacja zakończona powodzeniem.');
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
            ],
            [],
            [
                'state.start_time'     => __('start_time'),
            ],
        ];
    }
    public function title(): string
    {
        return __('Wybierz zakres RCP');
    }
}
