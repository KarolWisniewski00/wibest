<?php

namespace App\Steps;

use App\Models\Event;
use App\Models\WorkSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\Components\Step;

class TimeStartStep extends Step
{
    protected string $view = 'livewire.steps.time-start-step';

    public function mount()
    {
        $this->mergeState([
            'start_time_clock' => null,
        ]);
    }

    public function save($state)
    {
        $dateTimeStart = Carbon::today()->setTimeFromTimeString(
            $state['start_time_clock']
        )->format('Y-m-d H:i:s');


        $eventStart = Event::create([
            'time' => $dateTimeStart,
            'location' => '',
            'device' => '',
            'event_type' => 'start',
            'company_id' => Auth::user()->company_id,
            'user_id' => $state['user_id'],
            'created_user_id' => Auth::id(),
        ]);

        // 2. Dodawanie planowania
        $ws = WorkSession::create([
            'company_id' => Auth::user()->company_id,
            'user_id' => $state['user_id'],
            'created_user_id' => Auth::id(),
            'event_start_id' => $eventStart->id,
            'event_stop_id' => null,
            'status' => 'W trakcie pracy',
            'time_in_work' => 0,
            'info' => 'Utworzono ręcznie',
        ]);
        return redirect()->route('rcp.work-session.show', $ws)->with('success', 'Operacja zakończona powodzeniem.');
    }
    public function icon(): string
    {
        return 'clock';
    }
    public function validate()
    {
        // bazowe reguły
        $rules = [
            'state.start_time_clock' => ['required'],
        ];

        $activeSession = WorkSession::where('user_id', $this->livewire->state['user_id'])
            ->whereNull('event_stop_id')
            ->where('status', 'W trakcie pracy')
            ->first();

        if ($activeSession) {
            $rules['state.start_time_clock'][] =
                function ($attribute, $value, $fail) {
                    // tu wkładasz swoją logikę:
                    $fail('Użytkownik jest już w trakcie pracy.');
                };
        }

        return [
            $rules,
            [],
            [
                'state.start_time_clock' => __('start_time_clock'),
                'state.night'   => __('night'),
            ],
        ];
    }
    public function title(): string
    {
        return __('🕓 Wybierz czas rozpoczęcia');
    }
}
