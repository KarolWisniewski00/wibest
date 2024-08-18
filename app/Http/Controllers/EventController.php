<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Metoda do wyświetlania listy wydarzeń
    public function index()
    {
        // Pobierz ID zalogowanego użytkownika
        $userId = Auth::id();
        
        // Pobierz wydarzenia tylko dla zalogowanego użytkownika
        $events = Event::where('user_id', $userId)->get();
        
        return view('admin.calendar.index', compact('events'));
    }

    // Metoda do pobierania wydarzeń na podstawie zakresu dat
    public function getEvents(Request $request)
    {
        // Pobierz parametry start i end z zapytania
        $start = $request->query('start');
        $end = $request->query('end');

        // Walidacja dat
        if (!$start || !$end) {
            return response()->json(['error' => 'Invalid start or end date'], 400);
        }

        // Pobierz ID zalogowanego użytkownika
        $userId = Auth::id();
        
        // Filtrowanie wydarzeń na podstawie zakresu dat i ID użytkownika
        $events = Event::where('user_id', $userId)
                       ->where(function($query) use ($start, $end) {
                           $query->whereBetween('start', [$start, $end])
                                 ->orWhereBetween('end', [$start, $end]);
                       })
                       ->get();

        // Formatowanie wydarzeń
        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'color' => $event->color,
                'url' => route('event.show', $event->id)
            ];
        });

        return response()->json($formattedEvents);
    }

    // Metoda do wyświetlania szczegółów wydarzenia
    public function show(int $id)
    {
        // Pobierz ID zalogowanego użytkownika
        $userId = Auth::id();
        
        // Pobierz wydarzenie tylko dla zalogowanego użytkownika
        $event = Event::where('id', $id)
                      ->where('user_id', $userId)
                      ->first();
    
        if (!$event) {
            abort(404);
        }
    
        return view('admin.calendar.show', compact('event'));
    }
}
