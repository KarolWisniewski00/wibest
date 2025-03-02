<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $users = User::where('company_id', $this->get_company_id())->get();
        $user_count = $users->count();
        $invitations = Invitation::where('company_id', $this->get_company_id())->get();
        $user_id = auth()->id();
        return view('admin.team.index', compact('users', 'user_id', 'invitations', 'user_count'));
    }
}
