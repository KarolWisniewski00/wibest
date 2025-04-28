<?php

namespace App\Http\Controllers\Team;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\InvitationRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function index(Request $request)
    {
        $userId = Auth::id();
        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyId($companyId);
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        $userCount =  $this->userRepository->countByCompanyId($companyId);

        return view('admin.team.index', compact('users', 'userId', 'invitations'));

    }
    public function show(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.user', compact('user', 'invitations'));
    }

    public function get(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $companyId = $this->companyRepository->getCompanyId();
        $query = User::where('company_id', $companyId)->where('role', '!=', null);

        $users = $query->paginate($perPage);
    
        return response()->json($users);
    }
    public function setRole(Request $request)
    {
        $request->validate([
            'role_filter' => 'required|array',
            'role_filter.*' => 'string',
        ]);

        $request->session()->put('role_filter', $request->input('role_filter'));

        $companyId = $this->companyRepository->getCompanyId();
        $query = User::where('company_id', $companyId);

        if ($request->filled('role_filter')) {
            $query->whereIn('role', $request->input('role_filter'));
        }

        $users = $query->get();

        return response()->json($users);
    }
    public function export_xlsx(Request $request)
    {
        $users = User::whereIn('id', $request->ids)->get();

        $data = collect([
            [
            'Nazwa użytkownika' => 'Nazwa użytkownika',
            'Rola' => 'Rola',
            ]
        ])->concat(
            $users->map(function ($user) {
            return [
                'Nazwa użytkownika' => (string) ($user->name ?? 'Brak danych'),
                'Rola' => $user->role ?? 'Brak danych',
            ];
            })
        );

        return Excel::download(new UsersExport($data), 'eksport_użytkowników.xlsx');
    }
    public function disconnect(User $user){
        $user->company_id = null;
        $user->role = null;
        $user->save();
        return redirect()->route('team.user.index')->with('success', 'Rozłączono.');
    }
    public function edit(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.edit', compact('user', 'invitations'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'nullable|string',
            'position' => 'nullable|string',
        ]);

        $user->role = $request->input('role');
        $user->position = $request->input('position');
        $user->save();

        return redirect()->route('team.user.show', $user)->with('success', 'Dane użytkownika zostały zaktualizowane.');
    }
}
