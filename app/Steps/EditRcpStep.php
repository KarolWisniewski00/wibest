<?php

namespace App\Steps;

use App\Livewire\CalendarView;
use App\Models\Event;
use App\Models\Leave;
use App\Models\User;
use App\Models\WorkSession;
use Carbon\Carbon;
use DateTime;
use Vildanbina\LivewireWizard\Components\Step;

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
        $dateTimeStart = Carbon::parse(
            $state['start_time'] . ' ' . $state['start_time_clock']
        )->format('Y-m-d H:i:s');

        if (isset($state['night']) && $state['night']) {
            $dateTimeEnd = Carbon::parse(
                $state['start_time'] . ' ' . $state['end_time_clock']
            )->addDay()->format('Y-m-d H:i:s');
            $this->validate(...$this->validate());
        } else {
            $dateTimeEnd = Carbon::parse(
                $state['start_time'] . ' ' . $state['end_time_clock']
            )->format('Y-m-d H:i:s');
            $this->validate(...$this->validate());
        }

        $work_session = WorkSession::findOrFail($state['work_session_id']);

        $event_start = Event::findOrFail($work_session->event_start_id);
        $event_start->time = $dateTimeStart;
        $event_start->save();

        $eventStop = Event::findOrFail($work_session->event_stop_id);
        $eventStop->time = $dateTimeEnd;
        $eventStop->save();

        $timeInWork = Carbon::parse($dateTimeStart)
            ->diff(Carbon::parse($dateTimeEnd))
            ->format('%H:%I:%S');

        $work_session->time_in_work = $timeInWork;
        $work_session->save();

        return redirect()->route('rcp.work-session.show', ['work_session' => $work_session->id])->with('success', 'Operacja zakończona powodzeniem.');
    }

    public function icon(): string
    {
        return 'clock';
    }
    public function validate()
    {
        $isNight = $this->livewire->state['night'] ?? false;
        $isEditId = $this->livewire->state['work_session_id'];
        $userId = $this->livewire->state['user_id'];
        $startCarbon = Carbon::parse(
            $this->livewire->state['start_time'] . ' ' . $this->livewire->state['start_time_clock']
        );
        $dateTimeStart = $startCarbon->format('Y-m-d H:i:s');
        $dayStartNext = $startCarbon->startOfDay();

        if (isset($this->livewire->state['night']) && $this->livewire->state['night']) {
            $endCarbon = Carbon::parse(
                $this->livewire->state['start_time'] . ' ' . $this->livewire->state['end_time_clock']
            )->addDay();
            $dateTimeEnd = $endCarbon->format('Y-m-d H:i:s');
            $dayEndNext = $endCarbon->endOfDay();
        } else {
            $endCarbon = Carbon::parse(
                $this->livewire->state['start_time'] . ' ' . $this->livewire->state['end_time_clock']
            );
            $dateTimeEnd = $endCarbon->format('Y-m-d H:i:s');
            $dayEndNext = $endCarbon->endOfDay();
        }


        // bazowe reguły
        $rules = [
            'state.start_time' => ['required'],
            'state.start_time_clock' => ['required'],
            'state.end_time_clock' => ['required'],
        ];

        // Jeśli dzień start ma być pierwszy
        if (!$isNight) {
            $rules['state.end_time_clock'][] = 'after_or_equal:state.start_time_clock';
        }


        $exists = WorkSession::where('work_sessions.user_id', $userId)
            ->where('work_sessions.id', '!=', $isEditId)
            ->join('events as es_start', 'es_start.id', '=', 'work_sessions.event_start_id')
            ->join('events as es_end', 'es_end.id', '=', 'work_sessions.event_stop_id')
            ->where(function ($q) use ($dateTimeStart, $dateTimeEnd) {
                $q->where('es_start.time', '<', $dateTimeEnd)
                    ->where('es_end.time', '>', $dateTimeStart);
            })
            ->exists();



        //blokada
        if ($exists) {
            $rules['state.start_time'][] =
                function ($attribute, $value, $fail) {
                    // tu wkładasz swoją logikę:
                    $fail('Użytkownik ma już RCP w tym czasie.');
                };
        }

        $exists = Leave::where('user_id', $userId)
            ->whereBetween('start_date', [$dayStartNext, $dayEndNext])
            ->whereIn('status', ['zaakceptowane', 'zrealizowane'])
            ->exists();

        //blokada
        if ($exists) {
            $rules['state.start_time'][] =
                function ($attribute, $value, $fail) {
                    // tu wkładasz swoją logikę:
                    $fail('Użytkownik ma już wniosek w następnym dniu.');
                };
        }
        $intDateStart = new DateTime($dateTimeStart);
        $intDateEnd   = new DateTime($dateTimeEnd);
        $interval = $intDateStart->diff($intDateEnd);


        // Prawdopodobnie najbezpieczniejszy sposób: sprawdzenie całkowitej liczby dni.
        // Metoda format('%a') zwraca całkowitą liczbę dni (całe i niepełne)
        // lub format('%h') który zwraca godziny
        $totalHours = $interval->days * 24 + $interval->h;

        if ($totalHours >= 24) {
            $rules['state.end_time_clock'][] =
                function ($attribute, $value, $fail) {
                    // tu wkładasz swoją logikę:
                    $fail('Czas pracy nie może być większy niż 24 godziny.');
                };
        }
        if ($totalHours == 0) {
            $rules['state.end_time_clock'][] =
                function ($attribute, $value, $fail) {
                    // tu wkładasz swoją logikę:
                    $fail('Czas pracy nie może być równy 0.');
                };
        }

        return [
            $rules,
            [],
            [
                'state.start_time' => __('start_time'),
                'state.start_time_clock' => __('start_time_clock'),
                'state.end_time_clock'   => __('end_time_clock'),
            ],
        ];
    }
    public function title(): string
    {
        return __('🕓 Wybierz czas i typ');
    }
}
