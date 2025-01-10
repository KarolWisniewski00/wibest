<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkSessionRequest;
use App\Models\User;
use App\Models\WorkSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RaportController extends Controller
{
    // Funkcja do rozpoczęcia pracy
    public function startWork($user_id)
    {
        Carbon::setLocale('pl');
        $workSession = WorkSession::create([
            'company_id' => $this->get_company_id_by_user_id($user_id),
            'user_id' => $user_id,
            'created_user_id' => $user_id,
            'start_time' => Carbon::now(),
            'end_time' => null,
            'status' => 'W trakcie pracy',
            'start_day_of_week' => Carbon::now()->translatedFormat('l'), // Zapisuje dzień tygodnia jako pełną nazwę (np. Monday)
        ]);

        return response()->json([
            'message' => 'Praca rozpoczęta',
            'work_session_id' => intval($workSession->id),
            'work_session_status' => 'W trakcie pracy',
            'work_session_start_time' => $workSession->start_time,
        ], 200);
    }

    // Funkcja do zakończenia pracy
    public function stopWork($id)
    {
        Carbon::setLocale('pl');
        $workSession = WorkSession::find($id);
        if ($workSession) {
            $endTime = Carbon::now();
            $startTime = Carbon::parse($workSession->start_time);
            $timeInWork = $startTime->diff($endTime)->format('%H:%I:%S');

            $workSession->update([
                'end_time' => $endTime,
                'status' => 'Praca zakończona',
                'end_day_of_week' => $endTime->translatedFormat('l'),
                'time_in_work' => $timeInWork,
            ]);
            return response()->json([
                'message' => 'Praca zakończona',
                'work_session_id' => intval($id),
                'work_session_status' => $workSession->status,
                'work_session_start_time' => $workSession->start_time,
            ], 200);
        }

        return response()->json([
            'message' => 'Błąd przy kończeniu pracy',
        ], 200);
    }

    // Funkcja do pobrania wszystkich sesji pracy użytkownika
    public function getWorkSession($user_id)
    {
        $latestWorkSession = WorkSession::where('user_id', $user_id)
            ->orderBy('start_time', 'desc')
            ->first();
        if ($latestWorkSession->end_time == null) {
            return response()->json([
                'message' => 'W trakcie pracy',
                'work_session_id' => intval($latestWorkSession->id),
                'work_session_status' => $latestWorkSession->status,
                'work_session_start_time' => $latestWorkSession->start_time,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Brak sesji pracy'
            ], 200);
        }
    }
    public function index()
    {
        if($this->isAdmin()){
            $work_raports = $this->get_work_sessions();
        }else{
            $work_raports = $this->get_work_sessions_logged_user();
        }
        $work_raports_sugestion = $this->get_sugestion_work_sessions();
        $work_raports_all =  $this->get_all_work_sessions();

        return view('admin.work-raport.index', compact('work_raports', 'work_raports_sugestion', 'work_raports_all'));
    }
    public function index_now()
    {
        $currentMonth = now()->month; // Pobiera bieżący miesiąc
        $currentYear = now()->year;   // Pobiera bieżący rok

        $work_sessions = $this->get_work_sessions_by($currentMonth, $currentYear);
        $work_sessions_sugestion = $this->get_sugestion_work_sessions();
        $work_sessions_all =  $this->get_all_work_sessions();

        return view('admin.work-session.index', compact('work_sessions', 'work_sessions_sugestion', 'work_sessions_all'));
    }
    public function index_last()
    {
        // Pobierz datę dla poprzedniego miesiąca
        $previousMonth = now()->subMonth()->month;  // Poprzedni miesiąc
        $previousMonthYear = now()->subMonth()->year;  // Rok poprzedniego miesiąca

        $work_sessions = $this->get_work_sessions_by($previousMonth, $previousMonthYear);
        $work_sessions_sugestion = $this->get_sugestion_work_sessions();
        $work_sessions_all =  $this->get_all_work_sessions();

        return view('admin.work-session.index', compact('work_sessions', 'work_sessions_sugestion', 'work_sessions_all'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Wyszukiwanie faktur na podstawie numeru lub klienta
        $work_sessions = $this->get_work_sessions_by_query($query);

        // Zwracamy faktury jako JSON
        return response()->json($work_sessions);
    }
    public function delete(WorkSession $work_session)
    {
        // Usuń fakturę
        $res = $work_session->delete();

        if ($res) {
            return redirect()->route('work.session')->with('success', 'Sesja pracy została usunięta.');
        } else {
            return redirect()->back()->with('fail', 'Wystąpił błąd podczas usuwania sesji pracy. Proszę spróbować ponownie.');
        }
    }
    public function show(WorkSession $work_session)
    {
        return view('admin.work-session.show', compact('work_session'));
    }
    public function edit(WorkSession $work_session)
    {
        $users = User::where('company_id', $this->get_company_id())->get();
        return view('admin.work-session.edit', compact('work_session', 'users'));
    }
    public function create()
    {
        $users = User::where('company_id', $this->get_company_id())->get();
        $loggedInUser = Auth::user();

        // Move the logged-in user to the beginning of the collection
        $users = $users->sortByDesc(function ($user) use ($loggedInUser) {
            return $user->id === $loggedInUser->id ? 1 : 0;
        });

        return view('admin.work-session.create', compact('users'));
    }
    public function update(WorkSessionRequest $request, WorkSession $work_session)
    {
        Carbon::setLocale('pl');
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('end_time'));
        $timeInWork = $startTime->diff($endTime)->format('%H:%I:%S');
        // Ustawiamy obliczoną datę jako termin płatności
        $work_session->status = $request->input('status');
        $work_session->start_time = $request->input('start_time');
        $work_session->end_time = $request->input('end_time');
        $work_session->user_id = $request->input('user_id');
        $work_session->end_day_of_week = $endTime->translatedFormat('l');
        $work_session->start_day_of_week = $startTime->translatedFormat('l');
        $work_session->time_in_work = $timeInWork;
        $res = $work_session->save();


        // Przekierowanie z komunikatem o sukcesie
        if ($res) {
            return redirect()->route('work.session.show', $work_session)->with('success', 'Sesja pracy została zaktualizowana.');
        } else {
            return redirect()->back()->with('fail', 'Wystąpił błąd podczas aktualizacji sesji pracy. Proszę spróbować ponownie.');
        }
    }
    public function store(WorkSessionRequest $request)
    {
        Carbon::setLocale('pl');
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('end_time'));
        $timeInWork = $startTime->diff($endTime)->format('%H:%I:%S');

        $res = WorkSession::create([
            'company_id' => $this->get_company_id_by_user_id(auth()->id()),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id'),
            'start_day_of_week' => $startTime->translatedFormat('l'),
            'end_day_of_week' => $endTime->translatedFormat('l'),
            'time_in_work' => $timeInWork,
            'created_user_id' => auth()->id(),
        ]);
        // Przekierowanie z komunikatem o sukcesie
        if ($res) {
            return redirect()->route('work.session.show', $res)->with('success', 'Sesja pracy została utworzona.');
        } else {
            return redirect()->back()->with('fail', 'Wystąpił błąd podczas tworzenia sesji pracy. Proszę spróbować ponownie.');
        }
    }
}
