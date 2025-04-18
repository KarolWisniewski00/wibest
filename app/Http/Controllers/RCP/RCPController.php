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

    public function index()
    {
        $work_sessions = $this->workSessionRepository->getPaginatedForCurrentUser(10);
        $work_sessions_all = $this->workSessionRepository->getAll();
        $currentMonthString = $this->workSessionRepository->getCurrentMonthString();

        return view('admin.rcp.index', compact('work_sessions', 'work_sessions_all', 'currentMonthString'));
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
        $sessions = WorkSession::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

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
