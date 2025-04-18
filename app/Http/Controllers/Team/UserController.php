<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\InvitationRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected UserRepository $userRepository;
    protected InvitationRepository $invitationRepository;
    protected CompanyRepository $companyRepository;

    public function __construct(
        UserRepository $userRepository,
        InvitationRepository $invitationRepository,
        CompanyRepository $companyRepository
    ) {
        $this->userRepository = $userRepository;
        $this->invitationRepository = $invitationRepository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $userId = Auth::id();
        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyId($companyId);
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        $userCount =  $this->userRepository->countByCompanyId($companyId);

        return view('admin.team.index', compact('users', 'userId', 'invitations', 'userCount'));

    }
}
