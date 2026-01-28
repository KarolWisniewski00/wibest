<?php

namespace App\Steps;

use App\Models\Event;
use App\Models\PlannedLeave;
use App\Models\WorkSession;
use Vildanbina\LivewireWizard\Components\Step;

class EditUserRcpStep extends Step
{
    protected string $view = 'livewire.steps.user-step';
    
    public function mount()
    {
        $this->mergeState([
            'user_id' => $this->model->user_id,
        ]);
    }
    public function save($state)
    {
        $work_session = WorkSession::findOrFail($state['work_session_id']);
        $work_session->user_id = $state['user_id'];
        
        $event_start = Event::findOrFail($work_session->event_start_id);
        $event_start->user_id = $state['user_id'];

        $event_stop = Event::findOrFail($work_session->event_stop_id);
        $event_stop->user_id = $state['user_id'];

        $work_session->save();
        $event_start->save();
        $event_stop->save();
    }
    public function icon(): string
    {
        return 'user';
    }
    public function validate()
    {
        return [
            [
                'state.user_id'     => ['required'],
            ],
            [],
            [
                'state.user_id'     => __('user_id'),
            ],
        ];
    }
    public function title(): string
    {
        return __('👤 Wybierz użytkownika');
    }

}
