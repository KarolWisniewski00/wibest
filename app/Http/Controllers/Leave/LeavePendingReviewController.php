<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Mail\LeaveMail;
use App\Mail\LeaveMailAccept;
use App\Mail\LeaveMailReject;
use App\Mail\LeaveMailCancel;
use App\Models\Leave;
use App\Repositories\LeaveRepository;
use App\Repositories\UserRepository;
use App\Services\FilterDateService;
use App\Services\LeaveService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LeavePendingReviewController extends Controller
{
    protected FilterDateService $filterDateService;
    protected LeaveService $leaveService;

    public function __construct(
        FilterDateService $filterDateService,
        LeaveService $leaveService,
    ) {
        $this->filterDateService = $filterDateService;
        $this->leaveService = $leaveService;
    }

    /**
     * Wyświetla stronę z wnioskami do akceptacji.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $leaves = $this->leaveService->paginateByManagerId($request);
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave-pending.index', compact('leaves', 'startDate', 'endDate', 'leavePending'));
    }
    /**
     *  Zwraca wnioski do rozpatrzenia dla menadżera w zakresie dat.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leaves = $this->leaveService->paginateByManagerId($request);
        return response()->json($leaves);
    }
    /**
     * Ustawia nową datę w filtrze zwraca wnioski do rozpatrzenia.
     *
     * @param DateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setDate(DateRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDate($request);
        $leaves = $this->leaveService->getByManagerId($request);
        return response()->json($leaves);
    }
    /**
     * Akceptuje wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Leave $leave): \Illuminate\Http\RedirectResponse
    {
        $leave->status = 'zaakceptowane';
        $leave->save();

        $leaveMail = new LeaveMailAccept($leave);
        try {
            Mail::to($leave->user->email)->send($leaveMail);
        } catch (Exception) {
        }

        if (auth()->user()->is_admin) {
            return redirect()->route('leave.pending.index')->with('success', 'Zaakceptowane.');
        } else {
            return redirect()->route('leave.single.index')->with('success', 'Zaakceptowane.');
        }
    }
    /**
     * Odrzuca wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Leave $leave): \Illuminate\Http\RedirectResponse
    {
        $leave->status = 'odrzucone';
        $leave->save();

        $leaveMail = new LeaveMailReject($leave);
        try {
            Mail::to($leave->user->email)->send($leaveMail);
        } catch (Exception) {
        }

        if (auth()->user()->is_admin) {
            return redirect()->route('leave.pending.index')->with('success', 'Odrzucone.');
        } else {
            return redirect()->route('leave.single.index')->with('success', 'Odrzucone.');
        }
    }
        /**
     * Anuluje wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Leave $leave): \Illuminate\Http\RedirectResponse
    {
        $leave->status = 'anulowane';
        $leave->save();

        $leaveMail = new LeaveMailCancel($leave);
        try {
            Mail::to($leave->user->email)->send($leaveMail);
        } catch (Exception) {
        }

        if (auth()->user()->is_admin) {
            return redirect()->route('leave.pending.index')->with('success', 'Anulowane.');
        } else {
            return redirect()->route('leave.single.index')->with('success', 'Anulowane.');
        }
    }
}
