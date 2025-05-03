<?php

namespace App\Http\Controllers\Raport;

use App\Exports\TimeSheetExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Services\FilterDateService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TimeSheetController extends Controller
{
    protected FilterDateService $filterDateService;
    protected WorkSessionService $workSessionService;
    protected UserService $userService;

    public function __construct(
        FilterDateService $filterDateService,
        WorkSessionService $workSessionService,
        UserService $userService,
    ) {
        $this->filterDateService = $filterDateService;
        $this->workSessionService = $workSessionService;
        $this->userService = $userService;
    }


    /**
     * Wyświetla stronę kalendarza z obecnościami.
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
        $users = $this->userService->paginatedByRoleAddDatesByFilterDate($request);

        return view('admin.raport.index', compact('dates', 'startDate', 'endDate', 'users'));
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
        $users = $this->userService->paginatedByRoleAddDatesByFilterDate($request);
        return response()->json($users);
    }
    /**
     * Ustawia nową datę w filtrze zwraca użytkowników.
     *
     * @param DateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setDate(DateRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDate($request);
        $users = $this->userService->getByRoleAddDatesByFilterDate($request);
        return response()->json($users);
    }
    /**
     * Zwraca export do Excela.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportXlsx(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $data = $this->userService->getDataToExcelByRoleAddDatesByFilterDate($request);
        return Excel::download(new TimeSheetExport($data), 'eksport_dziennika_obecności.xlsx');
    }
}
