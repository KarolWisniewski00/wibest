<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Repositories\InvitationRepository;
use App\Repositories\CompanyRepository;

class InvitationController extends Controller
{
    protected InvitationRepository $invitationRepository;
    protected CompanyRepository $companyRepository;

    public function __construct(
        InvitationRepository $invitationRepository,
        CompanyRepository $companyRepository
        )
    {
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
}
