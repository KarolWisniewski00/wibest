<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        if($this->isAdmin()){
            $events = $this->get_events();
        }else{
            $events = $this->get_events_logged_user();
        }
        $events_all =  $this->get_all_events();
        $currentMonthString = $this->getCurrentMonthString();

        return view('admin.events.index', compact('events', 'events_all', 'currentMonthString'));
    }
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }
    public function delete(Event $event)
    {
        $res = $event->delete();

        if ($res) {
            return redirect()->route('event')->with('success', 'Operacja się powiodła.');
        } else {
            return redirect()->back()->with('fail', 'Wystąpił błąd.');
        }
    }
}
