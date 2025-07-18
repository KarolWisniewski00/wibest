<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Models\PlannedLeave;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\FilterDateService;
use App\Services\LeaveService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    protected FilterDateService $filterDateService;
    protected WorkSessionService $workSessionService;
    protected UserService $userService;
    protected LeaveService $leaveService;

    public function __construct(
        FilterDateService $filterDateService,
        WorkSessionService $workSessionService,
        UserService $userService,
        LeaveService $leaveService,
    ) {
        $this->filterDateService = $filterDateService;
        $this->workSessionService = $workSessionService;
        $this->userService = $userService;
        $this->leaveService = $leaveService;
    }


    /**
     * Wyświetla stronę kalendarza.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $dates = $this->filterDateService->getRangeDateFilter($request, 'd.m');
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $users = $this->userService->paginatedByRoleAddDatesAndLeavesByFilterDate($request);

        return view('admin.calendar.index', compact('dates', 'startDate', 'endDate', 'users'));
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
        return view('admin.calendar.create');
    }
    /**
     * Zwraca użytkowników dla paginated infinite scroll.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $users = $this->userService->paginatedByRoleAddDatesAndLeavesByFilterDate($request);
        return response()->json($users);
    }
    /**
     * Zwraca widok do edycji.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function edit(User $user, $date, Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $plannedLeave = $this->leaveService->getPlannedByUserAndDate($user, $date);
        return view('admin.calendar.edit', compact('plannedLeave'));
    }
    /**
     * Usuwa urlop planowany.
     *
     * @param PlannedLeave $planned_leave
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(PlannedLeave $plannedLeave)
    {
        if ($plannedLeave->delete()) {
            return redirect()->route('calendar.all.index')->with('success', 'Operacja się powiodła.');
        }
        return redirect()->back()->with('fail', 'Wystąpił błąd.');
    }
    /**
     * Ustawia nową datę w filtrze zwraca urlop planowany.
     *
     * @param DateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setDate(DateRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDate($request);
        $users = $this->userService->getByRoleAddDatesAndLeavesByFilterDate($request);
        return response()->json($users);
    }
}
