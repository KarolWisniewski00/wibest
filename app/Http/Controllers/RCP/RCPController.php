<?php

namespace App\Http\Controllers\RCP;

use App\Exports\WorkSessionsExport;
use App\Models\WorkSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkSessionRequest;
use App\Services\FilterDateService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RCPController extends Controller
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
     * Wyświetla stronę z sesjami pracy.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $work_sessions = $this->workSessionService->paginatedByRoleWithFilterDate($request);

        return view('admin.rcp.index', compact('work_sessions', 'startDate', 'endDate'));
    }

    /**
     * Wyświetla formularz do dodawania sesji pracy.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompany();
        return view('admin.rcp.create', compact('users', 'userId'));
    }
    /**
     * Zapisuje nową sesję pracy.
     *
     * @param StoreWorkSessionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreWorkSessionRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->workSessionService->storeWithEvents(
            userId: $request->user_id,
            startTime: $request->start_time,
            endTime: $request->end_time,
        );
        return redirect()->route('rcp.work-session.index')->with('success', 'Sesja pracy została dodana.');
    }
    /**
     * Wyświetla formularz do edytowania sesji pracy.
     *
     * @param WorkSession $work_session
     * @return \Illuminate\View\View
     */
    public function edit(WorkSession $work_session)
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompany();
        return view('admin.rcp.edit', compact('work_session', 'users', 'userId'));
    }

    /**
     * Aktualizuje sesję pracy.
     *
     * @param StoreWorkSessionRequest $request
     * @param WorkSession $work_session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreWorkSessionRequest $request, WorkSession $work_session): \Illuminate\Http\RedirectResponse
    {
        $this->workSessionService->updateWithEvents(
            workSession: $work_session,
            userId: $request->user_id,
            startTime: $request->start_time,
            endTime: $request->end_time,
        );
        return redirect()->route('rcp.work-session.index')->with('success', 'Sesja pracy została zaktualizowana.');
    }
    /**
     * Wyświetla szczegóły sesji pracy.
     *
     * @param WorkSession $work_session
     * @return \Illuminate\View\View
     */
    public function show(WorkSession $work_session): \Illuminate\View\View
    {
        return view('admin.rcp.show', compact('work_session'));
    }
    /**
     * Usuwa sesję pracy.
     *
     * @param WorkSession $work_session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(WorkSession $work_session): \Illuminate\Http\RedirectResponse
    {
        if ($work_session->delete()) {
            return redirect()->route('rcp.work-session.index')->with('success', 'Operacja się powiodła.');
        }
        return redirect()->back()->with('fail', 'Wystąpił błąd.');
    }
    public function get(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'menedżer') {
            $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.company_id', Auth::user()->company_id);
        } else {
            $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.user_id', Auth::id());
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereHas('eventStart', function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('time', '>=', $startDate);
                }

                if ($endDate) {
                    $query->whereDate('time', '<=', $endDate);
                }
            });
        }
        return $query->select('work_sessions.*')
            ->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
            ->orderBy('event_start.time', 'desc')
            ->paginate($perPage);

        $sessions = $query->paginate($perPage);

        return response()->json($sessions);
    }
    public function setDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $request->session()->put('start_date', $request->input('start_date'));
        $request->session()->put('end_date', $request->input('end_date'));

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'menedżer') {
            $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.company_id', Auth::user()->company_id);
        } else {
            $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.user_id', Auth::id());
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereHas('eventStart', function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('time', '>=', $startDate);
                }

                if ($endDate) {
                    $query->whereDate('time', '<=', $endDate);
                }
            });
        }
        $query->select('work_sessions.*')
            ->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
            ->orderBy('event_start.time', 'desc');

        $sessions = $query->get();

        return response()->json($sessions);
    }
    public function export_xlsx(Request $request)
    {
        $sessions = WorkSession::with(['user', 'eventStart', 'eventStop'])->whereIn('id', $request->ids)->get();

        $data = collect([
            [
                'Nazwa użytkownika' => 'Nazwa użytkownika',
                'Czas rozpoczęcia zdarzenia' => 'Czas rozpoczęcia zdarzenia',
                'Czas zakończenia zdarzenia' => 'Czas zakończenia zdarzenia',
                'Czas rozpoczęcia zdarzenia (duplikat)' => 'Czas rozpoczęcia zdarzenia (duplikat)',
                'Czas w pracy' => 'Czas w pracy',
            ]
        ])->concat(
            $sessions->map(function ($session) {
                return [
                    'Nazwa użytkownika' => (string) ($session->user->name ?? 'Brak danych'),
                    'Czas rozpoczęcia zdarzenia' => $session->eventStart->time ?? 'Brak danych',
                    'Czas zakończenia zdarzenia' => $session->eventStop->time ?? 'Brak danych',
                    'Czas rozpoczęcia zdarzenia (duplikat)' => $session->eventStart->time ?? 'Brak danych',
                    'Czas w pracy' => $session->time_in_work ?? 'Brak danych',
                ];
            })
        );

        return Excel::download(new WorkSessionsExport($data), 'eksport_sesji_pracy.xlsx');
    }
}
