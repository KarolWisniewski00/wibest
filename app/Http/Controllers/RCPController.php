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
        $currentMonthString = $this->getCurrentMonthString();

        return view('admin.rcp.index', compact('work_sessions', 'work_sessions_all', 'currentMonthString'));
    }
    public function show(WorkSession $work_session)
    {
        return view('admin.rcp.show', compact('work_session'));
    }
    public function delete(WorkSession $work_session)
    {
        $res = $work_session->delete();
        if ($res) {
            return redirect()->route('rcp')->with('success', 'Operacja się powiodła.');
        } else {
            return redirect()->back()->with('fail', 'Wystąpił błąd.');
        }
    }
}
