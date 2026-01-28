<?php

namespace App\Http\Controllers\RCP;

use App\Exports\WorkSessionsExport;
use App\Models\WorkSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkSessionRequest;
use App\Mail\RcpMailTask;
use App\Models\Event;
use App\Models\SentMessage;
use App\Models\User;
use App\Models\WorkBlock;
use App\Repositories\EventRepository;
use App\Services\FilterDateService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;

class RCPController extends Controller
{
    protected FilterDateService $filterDateService;
    protected WorkSessionService $workSessionService;
    protected EventRepository $eventRepository;
    protected UserService $userService;

    public function __construct(
        FilterDateService $filterDateService,
        WorkSessionService $workSessionService,
        EventRepository $eventRepository,
        UserService $userService,
    ) {
        $this->filterDateService = $filterDateService;
        $this->workSessionService = $workSessionService;
        $this->eventRepository = $eventRepository;
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
        if ($request->filled('start_date')) {
            $startDate =  $request->start_date;
        }
        if ($request->filled('end_date')) {
            $endDate =  $request->end_date;
        }
        if ($request->filled('filter_user_id')) {
            $filter_user_id =  $request->filter_user_id;
        } else {
            $filter_user_id = null;
        }
        $work_sessions = $this->workSessionService->paginatedByRoleWithFilterDate($request);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.rcp.index', compact('work_sessions', 'startDate', 'endDate', 'countEvents', 'filter_user_id'));
    }

    /**
     * Wyświetla formularz do dodawania sesji pracy.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request): \Illuminate\View\View
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompany();
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.rcp.create', compact('users', 'userId', 'countEvents'));
    }
    /**
     * Wyświetla formularz do dodawania notatki.
     *
     * @return \Illuminate\View\View
     */
    public function createNote(Request $request, WorkSession $work_session): \Illuminate\View\View
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompany();
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.rcp.create-note', compact('work_session', 'users', 'userId', 'countEvents'));
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
     * Zapisuje nową notatkę.
     *
     * @param Request $request
     */
    public function storeNote(WorkSession $work_session, Request $request)
    {
        $work_session->notes = $request->content;
        $work_session->save();
        return redirect()->route('rcp.work-session.show', $work_session)->with('success', 'Notatka sesji pracy została dodana.');
    }
    public function storeTask(WorkSession $work_session, Request $request)
    {
        if ($work_session->user->overtime_accept) {
            $status = 'oczekujące';
        } else {
            $status = null;
        }
        $task = Event::create([
            'time' => Carbon::now(),
            'location_id' => null,
            'device' => '',
            'event_type' => 'task',
            'status' => $status,
            'note' => $request->content,
            'user_id' => Auth::id(),
            'company_id' => $this->get_company_id_by_user_id(Auth::id()),
            'created_user_id' => Auth::id(),
        ]);
        $work_session->update([
            'task_id' => $task->id,
        ]);
        if ($work_session->user->overtime_accept) {
            $work_session_mail = new RcpMailTask($work_session);
            try {
                Mail::to($work_session->user->supervisor->email)->send($work_session_mail);
                SentMessage::create([
                    'type'       => 'email',
                    'recipient'  => $work_session->user->supervisor->email,
                    'user_id'    => $work_session->user->id,
                    'company_id' => $work_session->company_id,
                    'subject'    => 'Zadanie',
                    'body'       => 'Pojawiło się nowe zadanie do zatwierdzenia',
                    'status'     => 'SENT',
                    'price'      => 0.00,
                ]);
            } catch (Exception) {
                SentMessage::create([
                    'type'       => 'email',
                    'recipient'  => $work_session->user->supervisor->email,
                    'user_id'    => $work_session->user->id,
                    'company_id' => $work_session->company_id,
                    'subject'    => 'Zadanie',
                    'body'       => 'Pojawiło się nowe zadanie do zatwierdzenia',
                    'status'     => 'FAILED',
                    'price'      => 0.00,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Zadanie sesji pracy zostało dodane.');
    }

    /**
     * Wyświetla formularz do edytowania sesji pracy.
     *
     * @param WorkSession $work_session
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, WorkSession $work_session)
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompany();
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.rcp.edit', compact('work_session', 'users', 'userId', 'countEvents'));
    }
    /**
     * Wyświetla formularz do edytowania notatki.
     *
     * @param WorkSession $work_session
     * @return \Illuminate\View\View
     */
    public function editNote(Request $request, WorkSession $work_session)
    {
        $userId = Auth::id();
        $users = $this->userService->getUsersFromCompany();
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.rcp.edit-note', compact('work_session', 'users', 'userId', 'countEvents'));
    }
    /**
     * Aktualizuje sesję pracy.
     *
     * @param StoreWorkSessionRequest $request
     * @param WorkSession $work_session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateNote(Request $request, WorkSession $work_session): \Illuminate\Http\RedirectResponse
    {
        $work_session->notes = $request->content;
        $work_session->save();
        return redirect()->route('rcp.work-session.show', $work_session)->with('success', 'Notatka sesji pracy została zaktualizowana.');
    }
    /**
     * Wyświetla szczegóły sesji pracy.
     *
     * @param WorkSession $work_session
     * @return \Illuminate\View\View
     */
    public function show(Request $request, WorkSession $work_session): \Illuminate\View\View
    {
        $task = null;
        $task = $work_session->getAlertTask();

        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.rcp.show', compact('work_session', 'task', 'countEvents'));
    }
    /**
     * przesuwa stop, do startu dodaje liczbe godzin.
     *
     * @param WorkSession $work_session
     */
    public function startPlus(WorkSession $work_session)
    {
        $workingHours = (int) $work_session->user->working_hours_custom;
        $newStop = \Carbon\Carbon::parse($work_session->eventStart->time)->addHours($workingHours);
        $work_session->eventStop->time = $newStop;
        $work_session->eventStop->save();
        $timeInWork = Carbon::parse($work_session->eventStart->time)->diff(Carbon::parse($newStop))->format('%H:%I:%S');
        $work_session->time_in_work = $timeInWork;
        $work_session->save();
        return redirect()->route('rcp.work-session.show', $work_session)->with('success', 'Operacja się powiodła.');
    }
    public function startPlusFix(WorkSession $work_session)
    {
        $workingHours = 1;
        $newStop = \Carbon\Carbon::parse($work_session->eventStart->time)->addHours($workingHours);

        $stopEvent = Event::create([
            'time' => $newStop,
            'device' => '',
            'event_type' => 'stop',
            'user_id' => $work_session->user_id,
            'company_id' => $work_session->company_id,
            'created_user_id' => Auth::id(),
        ]);

        $timeInWork = Carbon::parse($work_session->eventStart->time)->diff(Carbon::parse($newStop))->format('%H:%I:%S');
        $work_session->event_stop_id = $stopEvent->id;
        $work_session->time_in_work = $timeInWork;
        $work_session->save();
        return redirect()->route('rcp.work-session.show', $work_session)->with('success', 'Operacja się powiodła.');
    }
    /**
     * przesuwa start, do stopu odejmuje liczbe godzin.
     *
     * @param WorkSession $work_session
     */
    public function stopMinus(WorkSession $work_session)
    {
        $workingHours = (int) $work_session->user->working_hours_custom;
        $newStart = \Carbon\Carbon::parse($work_session->eventStop->time)->subHours($workingHours);
        $work_session->eventStart->time = $newStart;
        $work_session->eventStart->save();
        $timeInWork = Carbon::parse($newStart)->diff(Carbon::parse($work_session->eventStop->time))->format('%H:%I:%S');
        $work_session->time_in_work = $timeInWork;
        $work_session->save();
        return redirect()->route('rcp.work-session.show', $work_session)->with('success', 'Operacja się powiodła.');
    }
    /**
     * Usuwa sesję pracy wraz z powiązanymi eventami i lokalizacjami eventów.
     *
     * @param WorkSession $work_session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(WorkSession $work_session): \Illuminate\Http\RedirectResponse
    {
        try {
            // Usuń lokalizacje eventów powiązane z eventStart i eventStop
            if ($work_session->eventStart && $work_session->eventStart->location) {
                $work_session->eventStart->location->delete();
            }
            if ($work_session->eventStop && $work_session->eventStop->location) {
                $work_session->eventStop->location->delete();
            }

            // Usuń eventStart i eventStop
            if ($work_session->eventStart) {
                $work_session->eventStart->delete();
            }
            if ($work_session->eventStop) {
                $work_session->eventStop->delete();
            }

            // Usuń sesję pracy
            $work_session->delete();

            return redirect()->route('rcp.work-session.index')->with('success', 'Operacja się powiodła.');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Wystąpił błąd.');
        }
    }
    public function get(Request $request)
    {
        $perPage = $request->input('per_page', 10);


        if ($request->filled('filter_user_id')) {
            $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.user_id', $request->input('filter_user_id'));
        } else {
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'właściciel') {
                $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.company_id', Auth::user()->company_id);
            } elseif (Auth::user()->role == 'menedżer') {
                $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.company_id', Auth::user()->company_id)->whereHas('user', function ($q) {
                    $q->where('supervisor_id', Auth::user()->supervisor_id);
                });
            } else {
                $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.user_id', Auth::id());
            }
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
            // DOŁĄCZ TABELĘ UŻYTKOWNIKÓW
            ->join('users', 'work_sessions.user_id', '=', 'users.id') // Zmień 'user_id' na faktyczną kolumnę FK w work_sessions
            ->orderBy('event_start.time', 'desc');

        // Filtrowanie po nazwie użytkownika, jeśli request istnieje i zawiera 'search'
        if ($request && $request->filled('search')) {
            // Użyj nazwy tabeli 'users.' aby upewnić się, że filtrujesz kolumnę 'name' w tabeli users
            $query->where('users.name', 'like', '%' . $request->input('search') . '%');
        }

        $sessions = $query->paginate($perPage);

        $rows_table = [];
        $rows_list = [];
        foreach ($sessions as $session) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-work-session', ['work_session' => $session])->render());
            array_push($rows_list, View::make('components.card-work-session', ['work_session' => $session])->render());
        }

        return response()->json([
            'data' => $sessions->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $sessions->nextPageUrl(),
        ]);
    }
    public function setDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $request->session()->put('start_date', $request->input('start_date'));
        $request->session()->put('end_date', $request->input('end_date'));

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'menedżer' || Auth::user()->role == 'właściciel') {
            $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.company_id', Auth::user()->company_id);
        } elseif (Auth::user()->role == 'menedżer') {
            $query = WorkSession::with('user', 'eventStart', 'eventStop')->where('work_sessions.company_id', Auth::user()->company_id)->whereHas('user', function ($q) {
                $q->where('supervisor_id', Auth::user()->supervisor_id);
            });
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
            // DOŁĄCZ TABELĘ UŻYTKOWNIKÓW
            ->join('users', 'work_sessions.user_id', '=', 'users.id') // Zmień 'user_id' na faktyczną kolumnę FK w work_sessions
            ->orderBy('event_start.time', 'desc');

        // Filtrowanie po nazwie użytkownika, jeśli request istnieje i zawiera 'search'
        if ($request && $request->filled('search')) {
            // Użyj nazwy tabeli 'users.' aby upewnić się, że filtrujesz kolumnę 'name' w tabeli users
            $query->where('users.name', 'like', '%' . $request->input('search') . '%');
        }

        $sessions = $query->get();

        $rows_table = [];
        $rows_list = [];
        foreach ($sessions as $session) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-work-session', ['work_session' => $session])->render());
            array_push($rows_list, View::make('components.card-work-session', ['work_session' => $session])->render());
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
    }
    public function exportXlsx(Request $request)
    {
        $sessions = WorkSession::with(['user', 'eventStart', 'eventStop'])->whereIn('id', $request->ids)->get();

        $data = collect([
            [
                'Nazwa użytkownika' => 'Nazwa użytkownika',
                'Czas rozpoczęcia zdarzenia' => 'Czas rozpoczęcia zdarzenia',
                'Czas zakończenia zdarzenia' => 'Czas zakończenia zdarzenia',
                'Czas w pracy' => 'Czas w pracy',
            ]
        ])->concat(
            $sessions->map(function ($session) {
                return [
                    'Nazwa użytkownika' => (string) ($session->user->name ?? 'Brak danych'),
                    'Czas rozpoczęcia zdarzenia' => $session->eventStart->time ?? 'Brak danych',
                    'Czas zakończenia zdarzenia' => $session->eventStop->time ?? 'Brak danych',
                    'Czas w pracy' => $session->time_in_work ?? 'Brak danych',
                ];
            })
        );

        return Excel::download(new WorkSessionsExport($data), 'eksport_sesji_pracy.xlsx');
    }
    public function createUser(Request $request, User $user, $date)
    {
        $userId = Auth::id();
        $date_str = $date;
        $users = $this->userService->getUsersFromCompanyWorkBlock();
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.rcp.create', compact('date_str', 'user', 'users', 'userId', 'countEvents'));
    }
}
