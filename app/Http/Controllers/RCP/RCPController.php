<?php

namespace App\Http\Controllers\RCP;

use App\Exports\WorkSessionsExport;
use App\Models\WorkSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkSessionRequest;
use App\Models\Event;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkSessionRepository;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RCPController extends Controller
{
    protected WorkSessionRepository $workSessionRepository;
    protected CompanyRepository $companyRepository;
    protected UserRepository $userRepository;

    public function __construct(
        WorkSessionRepository $workSessionRepository,
        CompanyRepository $companyRepository,
        UserRepository $userRepository,
    ) {
        $this->workSessionRepository = $workSessionRepository;
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
    }

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

        $work_sessions = $this->workSessionRepository->getPaginatedForCurrentUser(10, $startDate, $endDate);

        return view('admin.rcp.index', compact('work_sessions', 'startDate', 'endDate'));
    }
    public function create()
    {
        $userId = Auth::id();
        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyId($companyId);
        return view('admin.rcp.create', compact('users', 'userId'));
    }

    public function store(StoreWorkSessionRequest $request)
    {
        $this->workSessionRepository->storeWithEvents(
            userId: $request->user_id,
            startTime: $request->start_time,
            endTime: $request->end_time,
            createdUserId: Auth::id()
        );
        return redirect()->route('rcp.work-session.index')->with('success', 'Sesja pracy została dodana.');
    }

    public function edit(WorkSession $work_session)
    {
        $userId = Auth::id();
        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyId($companyId);
        return view('admin.rcp.edit', compact('work_session', 'users', 'userId'));
    }

    public function update(StoreWorkSessionRequest $request, WorkSession $work_session)
    {
        $this->workSessionRepository->updateWithEvents(
            workSession: $work_session,
            userId: $request->user_id,
            startTime: $request->start_time,
            endTime: $request->end_time,
        );
        return redirect()->route('rcp.work-session.index')->with('success', 'Sesja pracy została zaktualizowana.');
    }
    public function show(WorkSession $work_session)
    {
        return view('admin.rcp.show', compact('work_session'));
    }

    public function delete(WorkSession $work_session)
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
            $query = WorkSession::with('user')->where('work_sessions.company_id', Auth::user()->company_id);
        } else {
            $query = WorkSession::with('user')->where('work_sessions.user_id', Auth::id());
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

        $query->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
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
            $query = WorkSession::with('user')->where('work_sessions.company_id', Auth::user()->company_id);
        } else {
            $query = WorkSession::with('user')->where('work_sessions.user_id', Auth::id());
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
        $query->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
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
