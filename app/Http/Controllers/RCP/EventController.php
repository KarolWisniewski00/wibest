<?php

namespace App\Http\Controllers\RCP;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;

class EventController extends Controller
{
    protected EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $events = $this->eventRepository->getEventsForCurrentUserPaginated(15);
        $eventsAll = $this->eventRepository->getAllEvents();
        $currentMonthString = $this->eventRepository->getCurrentMonthString();

        return view('admin.events.index', compact('events', 'eventsAll', 'currentMonthString'));
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
}
