<?php

namespace App\Steps;

use App\Jobs\BulkWorkSessionCreator;
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

class RcpDateStep extends Step
{
    protected string $view = 'livewire.steps.rcp-date-step';

    public function mount()
    {
        $this->mergeState([
            'start_time' => $this->model->start_date,
            'end_time' => $this->model->end_date,
            'holiday' => true,
            'weekdays' => [
                0 => "1",
                1 => "2",
                2 => "3",
                3 => "4",
                4 => "5",
            ],
        ]);
    }

    public function save($state)
    {
        // 1. Przygotowanie danych do przekazania do Job
        $dataToProcess = [
            'start_time' => $state['start_time_clock'],
            'end_time' => $state['end_time_clock'],
            'night' => $state['night'],
            'start_date' => $state['start_time'],
            'end_date' => $state['end_time'],
            'user_ids' => $state['user_ids'],
            'holiday' => $state['holiday'],
            'weekdays' => $state['weekdays'],
        ];


        // 2. Wygenerowanie unikalnego klucza dla raportu
        $reportKey = 'bulk_work_session_report_' . uniqid();

        // 3. Uruchomienie zlecenia w tle
        BulkWorkSessionCreator::dispatch($dataToProcess, Auth::user(), $reportKey);

        session(['report_key_rcp' => $reportKey]);

        // 4. Natychmiastowe przekierowanie z komunikatem
        return redirect()->route('rcp.work-session.index')->with('success', 'Operacja masowego dodawania została rozpoczęta.',);
    }
    public function icon(): string
    {
        return 'calendar';
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
        return __('📅 Wybierz zakres dat');
    }
}
