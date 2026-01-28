<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Steps\EditRcpStep;
use App\Steps\EditUserRcpStep;
use Carbon\Carbon;
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

        $start = Carbon::parse($eventStart->time);
        $stop  = Carbon::parse($eventStop->time);

        $isNight = !$start->isSameDay($stop);

        $this->mergeState([
            'user_id' => $this->workSession->user_id,
            'date_edit' => date('d.m.y', strtotime($eventStart->time)),
            'start_time' => date('Y-m-d', strtotime($eventStart->time)),
            'start_time_clock' => date('H:i:s', strtotime($eventStart->time)),
            'end_time_clock' => date('H:i:s', strtotime($eventStop->time)),
            'work_session_id'   => $workSessionId,
            'night' => $isNight
        ]);

        $this->getUsersChecked();
        $this->getTimeAndTypeChecked();
        $this->setStep(1);
    }
    #[On('dateRangeSelected')]
    public function handleCalendarDateSelected(array $dates)
    {
        $startDate = $dates['startDate'] ?? null;
        $state = $this->getState();
        $night = $state['night'] ?? false;
        if ($startDate != null) {
            $startDateAddDay = Carbon::createFromFormat('Y-m-d', $startDate)->addDay()->format('Y-m-d');
            if ($night) {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDateAddDay,
                ]);
            } else {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDate,
                ]);
            }
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
        if (Auth::user()->role == 'menedżer') {
            return $userRepository->getByManager();
        }
        return $userRepository->getByAdmin();
    }
    public function getUsersChecked()
    {
        $state = $this->getState();
        $this->dispatch('user-selected', user_ids: [$state['user_id']]);
    }
    public function getTimeAndTypeChecked()
    {
        $state = $this->getState();
        $night = $state['night'] ?? false;
        $startDate = $state['start_time'] ?? null;
        if ($startDate != null) {
            $startDateAddDay = Carbon::createFromFormat('Y-m-d', $startDate)->addDay()->format('Y-m-d');
            if ($night) {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDateAddDay,
                ]);
            } else {
                $this->mergeState([
                    'start_time' => $startDate,
                    'end_time' => $startDate,
                ]);
            }
        }

        $this->dispatch(
            'time-and-type-selected',
            data: [$state['start_time_clock'], $state['end_time_clock'], $night, $startDate],
            rcp: true,
        );
    }
    public function getDateStartEndChecked()
    {
        $state = $this->getState();
        $this->dispatch(
            'date-start-end-selected',
            data: [$state['start_time'] ?? '', $state['end_time'] ?? ''],
        );
    }
}
