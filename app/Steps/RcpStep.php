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

class RcpStep extends Step
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

        $eventStart = Event::create([
            'time' => $dateTimeStart,
            'location' => '',
            'device' => '',
            'event_type' => 'start',
            'user_id' => $this->model->user_id,
            'company_id' => Auth::user()->company_id,
            'created_user_id' => Auth::id(),
        ]);

        $dateTimeEnd = \Carbon\Carbon::parse(
            $state['start_time'] . ' ' . $state['end_time_clock']
        )->format('Y-m-d H:i:s');

        $eventStop = Event::create([
            'time' => $dateTimeEnd,
            'location' => '',
            'device' => '',
            'event_type' => 'stop',
            'user_id' => $this->model->user_id,
            'company_id' => Auth::user()->company_id,
            'created_user_id' => Auth::id(),
        ]);

        $timeInWork = Carbon::parse($dateTimeStart)
            ->diff(Carbon::parse($dateTimeEnd))
            ->format('%H:%I:%S');

        WorkSession::create([
            'company_id' => Auth::user()->company_id,
            'user_id' => $this->model->user_id,
            'created_user_id' => Auth::id(),
            'event_start_id' => $eventStart->id,
            'event_stop_id' => $eventStop->id,
            'status' => 'Praca zakończona',
            'time_in_work' => $timeInWork,
        ]);

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
