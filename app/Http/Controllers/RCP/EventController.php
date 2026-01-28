<?php

namespace App\Http\Controllers\RCP;

use App\Exports\EventsExport;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\RcpMailAccept;
use App\Mail\RcpMailReject;
use App\Models\SentMessage;
use App\Repositories\EventRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
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
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.events.index', compact('events', 'startDate', 'endDate', 'countEvents'));
    }

    public function show(Request $request, Event $event)
    {
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.events.show', compact('event', 'countEvents'));
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

        $query = Event::with('user')
            ->select('events.*')
            ->join('users', 'events.user_id', '=', 'users.id')
            ->orderBy('events.time', 'desc');

        // Filtrowanie po roli
        if (
            Auth::user()->role == 'admin' ||
            Auth::user()->role == 'menedżer' ||
            Auth::user()->role == 'właściciel'
        ) {
            $query->where('events.company_id', Auth::user()->company_id);
        } else {
            $query->where('events.user_id', Auth::id());
        }

        // Filtrowanie po dacie
        if ($request->filled('start_date')) {
            $query->whereDate('events.time', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('events.time', '<=', $request->input('end_date'));
        }

        // 🔍 WYSZUKIWANIE PO NAZWIE UŻYTKOWNIKA
        if ($request->filled('search')) {
            $query->where('users.name', 'like', '%' . $request->input('search') . '%');
        }

        $events = $query->paginate($perPage);

        $rows_table = [];
        $rows_list = [];

        foreach ($events as $event) {
            $rows_table[] = View::make('components.row-event', ['event' => $event])->render();
            $rows_list[] = View::make('components.card-event', ['event' => $event])->render();
        }

        return response()->json([
            'data' => $events->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $events->nextPageUrl(),
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

        $query = Event::with('user')
            ->select('events.*')
            ->join('users', 'events.user_id', '=', 'users.id')
            ->orderBy('events.time', 'desc');

        // Filtrowanie po dacie
        if ($request->filled('start_date')) {
            $query->whereDate('events.time', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('events.time', '<=', $request->input('end_date'));
        }

        // Filtrowanie po roli
        if (
            Auth::user()->role == 'admin' ||
            Auth::user()->role == 'menedżer' ||
            Auth::user()->role == 'właściciel'
        ) {
            $query->where('events.company_id', Auth::user()->company_id);
        } else {
            $query->where('events.user_id', Auth::id());
        }

        // 🔍 WYSZUKIWANIE PO NAZWIE UŻYTKOWNIKA
        if ($request->filled('search')) {
            $query->where('users.name', 'like', '%' . $request->input('search') . '%');
        }

        $events = $query->get();

        $rows_table = [];
        $rows_list = [];

        foreach ($events as $event) {
            $rows_table[] = View::make('components.row-event', ['event' => $event])->render();
            $rows_list[] = View::make('components.card-event', ['event' => $event])->render();
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
    }

    public function exportXlsx(Request $request)
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
    public function accept(Event $event)
    {
        $event->update([
            'status' => 'zaakceptowane',
        ]);

        $rcpMail = new RcpMailAccept($event);
        try {
            Mail::to($event->user->email)->send($rcpMail);
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $event->user->email,
                'user_id'    => $event->user_id,
                'company_id' => $event->company_id,
                'subject'    => 'Zadanie',
                'body'       => 'Akceptacja zadania',
                'status'     => 'SENT',
                'price'      => 0.00,
            ]);
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $event->user->email,
                'user_id'    => $event->user_id,
                'company_id' => $event->company_id,
                'subject'    => 'Zadanie',
                'body'       => 'Akceptacja zadania',
                'status'     => 'FAILED',
                'price'      => 0.00,
            ]);
        }

        return redirect()->back()->with('success', 'Zaakceptowane.');
    }
    public function reject(Event $event)
    {
        $event->update([
            'status' => 'odrzucone',
        ]);

        $rcpMail = new RcpMailReject($event);
        try {
            Mail::to($event->user->email)->send($rcpMail);
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $event->user->email,
                'user_id'    => $event->user_id,
                'company_id' => $event->company_id,
                'subject'    => 'Zadanie',
                'body'       => 'Odrzucenie zadania',
                'status'     => 'SENT',
                'price'      => 0.00,
            ]);
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $event->user->email,
                'user_id'    => $event->user_id,
                'company_id' => $event->company_id,
                'subject'    => 'Zadanie',
                'body'       => 'Odrzucenie zadania',
                'status'     => 'FAILED',
                'price'      => 0.00,
            ]);
        }

        return redirect()->back()->with('success', 'Odrzucone.');
    }
}
