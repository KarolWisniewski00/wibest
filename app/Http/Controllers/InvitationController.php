<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::where('company_id', $this->get_company_id())->get();
        $invitationCount = $invitations->count();
        return view('admin.team.invitation', compact('invitations', 'invitationCount'));
    }
}
