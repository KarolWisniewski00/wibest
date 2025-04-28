<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Repositories\InvitationRepository;
use App\Repositories\CompanyRepository;

class InvitationController extends Controller
{
    protected InvitationRepository $invitationRepository;
    protected CompanyRepository $companyRepository;

    public function __construct(
        InvitationRepository $invitationRepository,
        CompanyRepository $companyRepository
    ) {
        $this->invitationRepository = $invitationRepository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        $invitationCount = $this->invitationRepository->countByCompanyId($companyId);

        return view('admin.team.invitation', compact('invitations', 'invitationCount'));
    }
    public function accept($id)
    {
        $invitation = Invitation::where('user_id', $id)->first();

        if (!$invitation) {
            return redirect()->route('team.invitation.index')->with('fail', 'Zaproszenie nie istnieje.');
        }

        if ($invitation->status !== 'oczekujący') {
            return redirect()->route('team.invitation.index')->with('fail', 'Zaproszenie straciło ważność.');
        }

        // Accept the invitation
        $invitation->delete();

        // Assign the user to the company
        $user = $invitation->user;
        $user->company_id = $invitation->company_id;
        $user->role = 'użytkownik';
        $user->save();

        return redirect()->route('team.user.show', $user)->with('success', 'Zaakceptowano zaproszenie.');
    }
    public function reject($id)
    {
        $invitation = Invitation::where('user_id', $id)->first();
        if (!$invitation) {
            return redirect()->route('team.invitation.index')->with('fail', 'Zaproszenie nie istnieje.');
        }
        $invitation->delete();

        return redirect()->route('team.invitation.index')->with('success', 'Odrzucono zaproszenie.');
    }
}
