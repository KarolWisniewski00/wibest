<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Models\User;
use App\Models\WorkBlock;
use App\Services\FilterDateService;
use App\Services\LeaveService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class WorkScheduleController extends Controller
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
     * Wyświetla stronę kalendarza
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $dates = $this->filterDateService->getRangeDateFilter($request, 'd.m.y');
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $users = $this->userService->paginatedByRoleAddDatesAndPlaningByFilterDate($request);

        return view('admin.planing.index', compact('dates', 'startDate', 'endDate', 'users'));
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
        $users = $this->userService->paginatedByRoleAddDatesAndPlaningByFilterDate($request);

        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-planing', ['user' => $user])->render());
        }

        return response()->json([
            'data' => $users->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $users->nextPageUrl(),
        ]);
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
        $users = $this->userService->getByRoleAddDatesAndPlaningByFilterDate($request);

        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-planing', ['user' => $user])->render());
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
    }
    /**
     * Wyświetla formularz do dodawania bloku.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompanyWorkBlock();
        return view('admin.planing.create', compact('users', 'userId'));
    }
    /**
     * Wyświetla formularz do dodawania bloku.
     *
     * @return \Illuminate\View\View
     */
    public function createUser(User $user, $date): \Illuminate\View\View
    {
        $userId = Auth::id();
        $date_str = $date;
        $users = $this->userService->getUsersFromCompanyWorkBlock();
        return view('admin.planing.create', compact('date_str', 'user', 'users', 'userId'));
    }
    /**
     * Wyświetla formularz do edytowania sesji pracy.
     *
     * @param WorkBlock $work_block
     * @return \Illuminate\View\View
     */
    public function edit(WorkBlock $work_block)
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompanyWorkBlock();
        return view('admin.planing.edit', compact('work_block', 'users', 'userId'));
    }
    /**
     * Usuwa .
     *
     * @param WorkBlock $work_block
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(WorkBlock $work_block)
    {
        if ($work_block->delete()) {
            return redirect()->route('calendar.work-schedule.index')->with('success', 'Operacja się powiodła.');
        }
        return redirect()->back()->with('fail', 'Wystąpił błąd.');
    }
    // W kontrolerze lub tam, gdzie obsługujesz żądanie
    public function clear()
    {
        // 1. Pobieramy klucz (który był użyty do zapisania w cache)
        // Używamy helpera session()
        $reportKey = session('report_key');

        if ($reportKey) {
            // 2. Usuwamy powiązany wpis z pamięci podręcznej (Cache)
            Cache::forget($reportKey);

            // 3. Usuwamy klucz sesji, aby nie odwoływać się do nieistniejącego cache
            session()->forget('report_key');

            // Opcjonalnie: Dodaj komunikat flash do wyświetlenia użytkownikowi
            // session()->flash('success', 'Dane raportu zostały pomyślnie usunięte z pamięci podręcznej.');
        }
    }
}
