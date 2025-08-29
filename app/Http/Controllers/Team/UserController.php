<?php

namespace App\Http\Controllers\Team;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Mail\UserMail;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\InvitationRepository;
use App\Repositories\CompanyRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
        $perPage = $request->input('per_page', 10);
        $userId = Auth::id();
        $user = Auth::user();
        $companyId = $this->companyRepository->getCompanyId();
        if ($user->role === 'admin') {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        } else if ($user->role === 'menadżer') {
            $query = User::where('company_id', $companyId)
                ->whereIn('role', ['kierownik', 'użytkownik', 'menadżer'])
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else if ($user->role === 'kierownik') {
            $query = User::where('company_id', $companyId)
                ->whereIn('role', ['kierownik', 'użytkownik'])
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else if ($user->role === 'użytkownik') {
            $query = User::where('company_id', $companyId)
                ->where('role', '=', 'użytkownik')
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        }
        $users = $query->paginate($perPage);
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        $userCount =  $this->userRepository->countByCompanyId($companyId);

        return view('admin.team.index', compact('users', 'userId', 'invitations'));
    }
    public function create()
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.create', compact('invitations'));
    }
    public function show(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.user', compact('user', 'invitations'));
    }
    public function restart(User $user)
    {

        $password = Str::random(10);
        $user->password = Hash::make($password);
        $user->save();
        $userMail = new PasswordMail($user, $password);
        try {
            Mail::to($user->email)->send($userMail);
        } catch (Exception) {
        }
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.user', compact('user', 'invitations'));
    }

    public function get(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $user = Auth::user();
        $companyId = $this->companyRepository->getCompanyId();
        if ($user->role === 'admin') {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        } else if ($user->role === 'menedżer') {
            $query = User::where('company_id', $companyId)
                ->whereIn('role', ['kierownik', 'użytkownik', 'menedżer'])
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else if ($user->role === 'kierownik') {
            $query = User::where('company_id', $companyId)
                ->whereIn('role', ['kierownik', 'użytkownik'])
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else if ($user->role === 'użytkownik') {
            $query = User::where('company_id', $companyId)
                ->where('role', '=', 'użytkownik')
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        }

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
        $user = Auth::user();
        $companyId = $this->companyRepository->getCompanyId();
        if ($user->role === 'admin') {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        } else if ($user->role === 'menadżer') {
            $query = User::where('company_id', $companyId)
                ->whereIn('role', ['kierownik', 'użytkownik', 'menadżer'])
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else if ($user->role === 'kierownik') {
            $query = User::where('company_id', $companyId)
                ->whereIn('role', ['kierownik', 'użytkownik'])
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else if ($user->role === 'użytkownik') {
            $query = User::where('company_id', $companyId)
                ->where('role', '=', 'użytkownik')
                ->where('supervisor_id', '=', $user->supervisor_id);
        } else {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        }

        if ($request->filled('role_filter')) {
            $query->whereIn('role', $request->input('role_filter'));
        }

        $users = $query->get();

        return response()->json($users);
    }
    public function exportXlsx(Request $request)
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
    public function disconnect(User $user)
    {
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
    public function planing(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.planing', compact('user', 'invitations'));
    }
    public function update_planing(Request $request, User $user)
    {
        $request->validate([
            'working_hours_custom' => 'nullable',
            'working_hours_from' => 'nullable',
            'working_hours_to' => 'nullable',
            'working_hours_start_day' => 'nullable',
            'working_hours_stop_day' => 'nullable',
        ]);

        $user->working_hours_custom = $request->input('working_hours_custom');
        // konwersja z formatu HTML datetime-local (2025-08-29T08:00) na MySQL (2025-08-29 08:00:00)
        if ($request->filled('working_hours_from')) {
            $user->working_hours_from = \Carbon\Carbon::parse($request->input('working_hours_from'))
                ->format('Y-m-d H:i:s');
        }

        if ($request->filled('working_hours_to')) {
            $user->working_hours_to = \Carbon\Carbon::parse($request->input('working_hours_to'))
                ->format('Y-m-d H:i:s');
        }
        $user->working_hours_start_day = $request->input('working_hours_start_day');
        $user->working_hours_stop_day = $request->input('working_hours_stop_day');
        $user->save();

        return redirect()->route('team.user.show', $user)->with('success', 'Planing zostały zaktualizowane.');
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
