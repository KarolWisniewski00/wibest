<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Models\Leave;
use App\Services\FilterDateService;
use App\Services\LeaveService;
use Illuminate\Http\Request;

class LeaveSingleController extends Controller
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
     * Wyświetla stronę kalendarza
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $leaves = $this->leaveService->paginateByUserId($request);
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave.index', compact('leaves', 'startDate', 'endDate', 'leavePending'));
    }
    /**
     * Zwraca widok do tworzenia nowego wniosku.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave.create', compact('leavePending'));
    }
    /**
     * Zwraca widok do edycji.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function edit(Leave $leave, Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leave = $this->leaveService->getLeaveById($leave);
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave.edit', compact('leave', 'leavePending'));
    }
        /**
     * Usuwa wniosek.
     *
     * @param Leave $leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Leave $leave)
    {
        if ($leave->delete()) {
            return redirect()->route('leave.single.index')->with('success', 'Operacja się powiodła.');
        }
        return redirect()->back()->with('fail', 'Wystąpił błąd.');
    }
    /**
     *  Zwraca wnioski dla użytkownika w zakresie dat.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leaves = $this->leaveService->paginateByUserId($request);
        return response()->json($leaves);
    }
    /**
     * Ustawia nową datę w filtrze zwraca wnioski.
     *
     * @param DateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setDate(DateRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDate($request);
        $leaves = $this->leaveService->getByUserId($request);
        return response()->json($leaves);
    }
}
