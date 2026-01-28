<?php

namespace App\Http\Controllers;

use App\Livewire\Calendar;
use App\Models\Event;
use App\Models\User;
use App\Models\WorkBlock;
use App\Models\WorkSession;
use App\Repositories\WorkSessionRepository;
use App\Services\LeaveService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected LeaveService $leaveService;

    public function __construct(
        LeaveService $leaveService,
    ) {
        $this->leaveService = $leaveService;
    }
    /**
     * Wyświetla stronę główną.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $task = null;
        $user = User::where('id', Auth::id())->first();
        $status = $user->getToday();
        $seconds_in_work = $status['worked_time_seconds'];
        $work_session = WorkSession::where('user_id', Auth::id())
            ->where('status', 'W trakcie pracy')
            ->with('eventStart')
            ->orderByDesc(Event::select('time')->whereColumn('events.id', 'work_sessions.event_start_id'))
            ->first();
        if ($work_session) {
            $now = Carbon::now();
            $timeDifference = Carbon::parse($work_session->eventStart->time)->diffInSeconds($now);
            $seconds_in_work += $timeDifference;

            //STAŁY PLANING
            if ($user->working_hours_regular == 'stały planing') {
                $seconds_planned = ($user->working_hours_custom * 3600) + ($user->overtime_threshold * 60);
                $seconds_remaining = max(0, $seconds_planned - $seconds_in_work);
                if ($seconds_in_work > $seconds_planned) {
                    if ($user->overtime_task) {
                        if ($work_session && $work_session->status == 'W trakcie pracy') {
                            $task = true;
                        }
                    }
                }
            } elseif ($user->working_hours_regular == 'zmienny planing') {
                $totalDayPlannedVar = WorkBlock::where('user_id', $user->id)
                    ->whereDate('starts_at', Carbon::now())
                    ->first();
                $seconds_planned = $totalDayPlannedVar->duration_seconds ?? 0;
                $seconds_planned += $user->overtime_threshold * 60;
                $seconds_remaining = max(0, $seconds_planned - $seconds_in_work);
                if ($seconds_in_work > $seconds_planned) {
                    if ($user->overtime_task) {
                        if ($work_session && $work_session->status == 'W trakcie pracy') {
                            $task = true;
                        }
                    }
                }
            }
        }

        return view('dashboard', compact('task', 'work_session'));
    }

    public function version()
    {
        return view('admin.version.index');
    }
}
