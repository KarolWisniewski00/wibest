<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Repositories\LeaveRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeavePendingReviewController extends Controller
{
    protected LeaveRepository $leaveRepository;

    public function __construct(LeaveRepository $leaveRepository)
    {
        $this->leaveRepository = $leaveRepository;
    }

    /**
     * Wyświetla stronę kalendarza
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Check if session variables for date range exist, otherwise set default to current month
        if (!$request->session()->has('start_date') || !$request->session()->has('end_date')) {
            $startOfMonth = now()->startOfMonth()->toDateString();
            $endOfMonth = now()->endOfMonth()->toDateString();

            $request->session()->put('start_date', $startOfMonth);
            $request->session()->put('end_date', $endOfMonth);
        }

        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        //$leaves = $this->leaveRepository->getPaginatedForCurrentUser(10, $startDate, $endDate);
        //$leavePending = $this->leaveRepository->getAllForCompanyPaginatedCount($startDate, $endDate);
        $leaves = Leave::where('manager_id', Auth::id())->orderBy('start_date', 'desc')->get();
        $leavePending = Leave::where('manager_id', Auth::id())->orderBy('start_date', 'desc')->count();
        return view('admin.leave-pending.index', compact('leaves', 'startDate', 'endDate', 'leavePending'));
    }
    public function accept(Leave $leave)
    {
        $leave->status = 'zaakceptowane';
        $leave->save();
        if (auth()->user()->is_admin) {
            return redirect()->route('leave.pending.index')->with('success', 'Zaakceptowane.');
        } else {
            return redirect()->route('leave.single.index')->with('success', 'Zaakceptowane.');
        }
    }
    public function reject(Leave $leave)
    {
        $leave->status = 'odrzucone';
        $leave->save();

        if (auth()->user()->is_admin) {
            return redirect()->route('leave.pending.index')->with('success', 'Odrzucone.');
        } else {
            return redirect()->route('leave.single.index')->with('success', 'Odrzucone.');
        }
    }
}
