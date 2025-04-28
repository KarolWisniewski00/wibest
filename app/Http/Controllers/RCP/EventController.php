<?php

namespace App\Http\Controllers\RCP;

use App\Exports\EventsExport;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    protected EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
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

        $events = $this->eventRepository->getEventsForCurrentUserPaginated(10, $startDate, $endDate);

        return view('admin.events.index', compact('events', 'startDate', 'endDate'));
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function delete(Event $event)
    {
        $deleted = $event->delete();

        return $deleted
            ? redirect()->route('rcp.event.index')->with('success', 'Operacja się powiodła.')
            : redirect()->back()->with('fail', 'Wystąpił błąd.');
    }
    public function get(Request $request)
    {
        $perPage = $request->input('per_page', 10);
    
        $query = Event::with('user')->orderBy('created_at', 'desc');

        if(Auth::user()->role == 'admin') {
            $query->where('company_id', Auth::user()->company_id);
        } else {
            $query->where('user_id', Auth::id());
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }
    
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }
    
        $events = $query->paginate($perPage);
    
        return response()->json($events);
    }
    public function setDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $request->session()->put('start_date', $request->input('start_date'));
        $request->session()->put('end_date', $request->input('end_date'));

        $query = Event::with('user')->orderBy('created_at', 'desc');
    
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }
    
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }
        if(Auth::user()->role == 'admin') {
            $query->where('company_id', Auth::user()->company_id);
        } else {
            $query->where('user_id', Auth::id());
        }
        $event = $query->get();

        return response()->json($event);
    }
    public function export_xlsx(Request $request)
    {
        $events = Event::with(['user'])->whereIn('id', $request->ids)->get();

        $data = collect([
            [
            'Nazwa użytkownika' => 'Nazwa użytkownika',
            'Zdarzenie' => 'Zdarzenie',
            'Czas' => 'Czas',
            ]
        ])->concat(
            $events->map(function ($event) {
            return [
                'Nazwa użytkownika' => (string) ($event->user->name ?? 'Brak danych'),
                'Zdarzenie' => $event->event_type ?? 'Brak danych',
                'Czas' => $event->time ?? 'Brak danych',
            ];
            })
        );
        return Excel::download(new EventsExport($data), 'eksport_zdarzen.xlsx');
    }
}
