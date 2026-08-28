<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Leave;
use App\Models\LeaveBalance;
use App\Models\User;
use App\Models\WorkBlock;
use App\Models\WorkSession;
use App\Services\GroqApi;
use App\Services\LeaveService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        //Wykorzystane wnioski
        $yearStart = Carbon::now()->startOfYear();
        $yearEnd = Carbon::now()->endOfYear();

        $leaves = Leave::selectRaw("
        type,
        status,
        SUM(days) as days,
        SUM(working_days) as working_days,
        SUM(non_working_days) as non_working_days
    ")
            ->where('user_id', Auth::id())
            ->where('start_date', '<=', $yearEnd)
            ->where('end_date', '>=', $yearStart)
            ->whereIn('status', ['zaakceptowane', 'zrealizowane'])
            ->groupBy('type', 'status')
            ->get();

        $leaves_used = $leaves->groupBy('type')->map(function ($items) {

            $accepted = $items->firstWhere('status', 'zaakceptowane');
            $realized = $items->firstWhere('status', 'zrealizowane');

            return [
                'zaakceptowane' => [
                    'days' => $accepted->days ?? 0,
                    'working_days' => $accepted->working_days ?? 0,
                    'non_working_days' => $accepted->non_working_days ?? 0,
                ],
                'zrealizowane' => [
                    'days' => $realized->days ?? 0,
                    'working_days' => $realized->working_days ?? 0,
                    'non_working_days' => $realized->non_working_days ?? 0,
                ],
            ];
        });
        $user = Auth::user();


        try {
            $leave_balance = LeaveBalance::where('user_id', Auth::id())
                ->where('company_id', Auth::user()->company_id)
                ->where('year', now()->year)
                ->first();
            $carried_over = $leave_balance->carried_over ?? 0;
            $base_days = $leave_balance->base_days ?? 0;
            $leave_balance_left = ($carried_over + $base_days) - $leave_balance->used_days;
        } catch (Exception) {
            $leave_balance = null;
            $leave_balance_left =  0;
        }

        return view('dashboard', compact('leave_balance', 'leave_balance_left', 'task', 'work_session', 'leaves_used', 'user'));
    }
    public function version()
    {
        return view('admin.version.index');
    }
}
