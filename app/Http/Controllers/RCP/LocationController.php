<?php

namespace App\Http\Controllers\RCP;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Repositories\EventRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
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

        //
        $user = Auth::user();
        
        if ($user->role == 'admin') {
            $query = Event::where('company_id', $user->company_id)->where('location_id', '!=', null);
        } elseif ($user->role == 'menedżer') {
            $query = Event::where('company_id', $user->company_id)->where('location_id', '!=', null);
        } elseif ($user->role == 'właściciel') {
            $query = Event::where('company_id', $user->company_id)->where('location_id', '!=', null);
        } else {
            $query = Event::where('user_id', $user->id)->where('location_id', '!=', null);
        }

        if ($startDate) {
            $query->whereDate('time', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('time', '<=', Carbon::parse($endDate));
        }

        $events = $query->orderBy('time', 'desc')->get();
        //

        $mapEvents = $events->map(function ($event) {
            return [
                'lat' => $event->location->latitude,
                'lng' => $event->location->longitude,
                'user' => $event->user->name ?? 'Brak użytkownika',
                'time' => $event->time,
                'date' => \Carbon\Carbon::parse($event->time)->format('Y-m-d H:i'),
                'type' => $event->event_type, // zakładam: 'start' / 'stop'
            ];
        });

        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.locations.index', compact('events', 'startDate', 'endDate', 'countEvents', 'mapEvents'));
    }
}
