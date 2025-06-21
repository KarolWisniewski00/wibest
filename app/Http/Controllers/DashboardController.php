<?php

namespace App\Http\Controllers;

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
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $leaves = $this->leaveService->getMainByManagerId($request);
        $leavesUser = $this->leaveService->getMainByUserId($request);
        $datesBufor = [];
        $dates = [];
        // Set week to start on Sunday (0)
        $startOfWeek = now()->startOfWeek(\Carbon\Carbon::SUNDAY);
        $endOfWeek = now()->endOfWeek(\Carbon\Carbon::SUNDAY)->subDay();

        $currentDate = $startOfWeek->copy();
        while ($currentDate->lte($endOfWeek)) {
            $datesBufor[] = $currentDate->format('d.m.y');
            $currentDate->addDay();
        }
        foreach ($datesBufor as $date) {
            $workSessionRepository = new WorkSessionRepository();
            $leave = $workSessionRepository->hasLeave(Auth::user()->id, $date);
            $leaveFirst = $workSessionRepository->getFirstLeave(Auth::user()->id, $date);
            $day = Carbon::createFromFormat('d.m.y', $date)->format('d');
            if ($leave) {
                $dates[] = ['day' => $day, 'leave' => $leaveFirst->type, 'date' => $date];
            } else {
                $dates[] = ['day' => $day, 'leave' => null, 'date' => $date];
            }
        }
        return view('dashboard', compact('leaves', 'leavesUser', 'dates'));
    }

    public function version()
    {
        return view('admin.version.index');
    }
}
