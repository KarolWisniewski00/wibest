<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Steps\EditRcpStep;
use App\Steps\EditUserRcpStep;
use App\Steps\LeaveDateStep;
use App\Steps\RcpStep;
use App\Steps\UserStep;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\WizardComponent;
use Livewire\Attributes\On;

class EditRcpWizard extends WizardComponent
{
    public WorkSession $workSession;

    public array $steps = [
        EditUserRcpStep::class,
        EditRcpStep::class,
    ];
    // 👇 Wczytaj model z bazy na podstawie ID
    public function mount($workSessionId = null)
    {
        $this->workSession = WorkSession::findOrFail($workSessionId);

        $eventStart = Event::where('id', $this->workSession->event_start_id)->first();
        $eventStop = Event::where('id', $this->workSession->event_stop_id)->first();

        $this->mergeState([
            'user_id' => $this->workSession->user_id,
            'start_time' => date('Y-m-d', strtotime($eventStart->time)),
            'start_time_clock' => date('H:i:s', strtotime($eventStart->time)),
            'end_time_clock' => date('H:i:s', strtotime($eventStop->time)),
            'work_session_id'   => $workSessionId,
        ]);
    }
    #[On('selectDate')]
    public function handleCalendarDateSelected($selectedDate, $typeTime = 'start_time')
    {
        if ($typeTime === 'start_time') {
            $this->mergeState([
                'start_time' => $selectedDate,
            ]);
        }
    }
    // 👇 Zwróć już wczytany model
    public function model(): WorkSession
    {
        return $this->workSession;
    }
    public function getUsers()
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin(Auth::user()->company_id);
    }
}
