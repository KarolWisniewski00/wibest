<?php

namespace App\Http\Controllers;

use App\Models\WorkSession;
use Illuminate\Http\Request;

class RCPController extends Controller
{
    public function index()
    {
        if($this->isAdmin()){
            $work_sessions = $this->get_work_sessions();
        }else{
            $work_sessions = $this->get_work_sessions_logged_user();
        }
        $work_sessions_all =  $this->get_all_work_sessions();

        return view('admin.rcp.index', compact('work_sessions', 'work_sessions_all'));
    }
    public function show(WorkSession $work_session)
    {
        return view('admin.rcp.show', compact('work_session'));
    }
}
