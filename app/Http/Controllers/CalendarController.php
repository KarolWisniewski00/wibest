<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        return view('admin.calendar.index', compact('user_id'));
    }
}
