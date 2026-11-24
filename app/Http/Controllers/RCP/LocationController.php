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

        $request->validate(['start_date' => ['nullable', 'date_format:Y-m-d'], 'end_date' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:start_date']]);
        foreach (['start_date', 'end_date'] as $key) if ($request->filled($key)) $request->session()->put($key, $request->input($key));
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        [$startDate, $endDate] = app(\App\Services\FilterDateService::class)->fullMonth($request, $startDate, $endDate);

        //
        $user = Auth::user();
        
        if ($user->role == 'admin') {
            $query = Event::where('company_id', $user->company_id)->where('location_id', '!=', null);
        } elseif ($user->role == 'menedżer') {
            $query = Event::where('company_id', $user->company_id)->where('location_id', '!=', null);
        } elseif ($user->role == 'właściciel') {
            $query = Event::where('company_id', $user->company_id)->where('location_id', '!=', null);
        } else {
            $query = Event::where('company_id', $user->company_id)->where('user_id', $user->id)->where('location_id', '!=', null);
        }

        $query->where(function ($q) use ($user) {
            $q->whereIn('id', \Illuminate\Support\Facades\DB::table('work_sessions')->where('company_id', $user->company_id)->select('event_start_id'))
                ->orWhereIn('id', \Illuminate\Support\Facades\DB::table('work_sessions')->where('company_id', $user->company_id)->select('event_stop_id'));
        });
        if ($startDate) {
            $query->whereDate('time', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('time', '<=', Carbon::parse($endDate));
        }

        $request->validate(['search' => ['nullable', 'string', 'max:255']]);
        if ($request->filled('search')) {
            $query->whereHas('user', fn ($q) => $q->where('name', 'like', '%'.$request->input('search').'%'));
        }

        $events = $query->with(['location', 'user'])->orderBy('time', 'desc')->get();
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

        $mapEvents = $mapEvents->map(fn ($point) => array_merge($point, ['employee' => $point['user'], 'type' => strtoupper($point['type']), 'object' => '']));
        $mapObjects = \App\Models\WorkObject::where('company_id', $user->company_id)->with('location')->get()
            ->filter(fn ($object) => $user->can('view', $object))
            ->map(fn ($object) => ['name' => $object->name, 'lat' => $object->location?->latitude, 'lng' => $object->location?->longitude,
                'radius' => $object->allowed_distance, 'status' => $object->status, 'url' => route('object.show', $object)])->values();
        if ($request->ajax()) return response()->json(['readings' => $mapEvents]);
        $countEvents = $this->eventRepository->getEventsTasksForCurrentUserCount($startDate, $endDate);
        return view('admin.locations.index', compact('events', 'startDate', 'endDate', 'countEvents', 'mapEvents', 'mapObjects'));
    }
}
