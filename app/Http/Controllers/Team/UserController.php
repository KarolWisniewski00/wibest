<?php

namespace App\Http\Controllers\Team;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
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
use Illuminate\Support\Facades\View;

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
        } else if ($user->role === 'właściciel') {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
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
        return redirect()->back()->with('success', 'Hasło zostało zresetowane i wysłane e-mailem.');
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
        } else if ($user->role === 'właściciel') {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        } else {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        }

        $users = $query->paginate($perPage);

        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-team', ['user' => $user])->render());
            array_push($rows_list, View::make('components.card-team', ['user' => $user])->render());
        }

        return response()->json([
            'data' => $users->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $users->nextPageUrl(),
        ]);
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
        } else if ($user->role === 'właściciel') {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        } else {
            $query = User::where('company_id', $companyId)
                ->where('role', '!=', null);
        }

        if ($request->filled('role_filter')) {
            $query->whereIn('role', $request->input('role_filter'));
        }

        $users = $query->get();

        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-team', ['user' => $user])->render());
            array_push($rows_list, View::make('components.card-team', ['user' => $user])->render());
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
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
        $user->supervisor_id = null;
        $user->position = null;
        $user->assigned_at = null;
        $user->role = null;
        $user->save();
        return redirect(route('team.user.index'))->with('success', 'Rozłączono.');
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
    public function config(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.config', compact('user', 'invitations'));
    }
    public function update_planing(Request $request, User $user)
    {
        $request->validate([
            'overtime' => 'nullable|in:on',
            'planning_type' => 'required|in:variable,fixed-advanced,fixed-basic',
            'overtime_threshold' => 'nullable|integer|min:0',
            'overtime_task' => 'nullable|in:on',
            'overtime_accept' => 'nullable|in:on',
            'public_holidays' => 'nullable|in:on',
        ]);

        // Mapa typów z formularza na wartości enum w bazie
        $planningMap = [
            'fixed-basic' => 'stały planing',
            'fixed-advanced' => 'prosty planing',
            'variable' => 'zmienny planing',
        ];

        $planningType = $request->input('planning_type');
        $user->working_hours_regular = $planningMap[$planningType] ?? null;

        // Pozostałe pola
        $user->overtime = $request->has('overtime');
        $user->overtime_threshold = $request->input('overtime_threshold', 0);
        $user->overtime_task = $request->has('overtime_task');
        $user->overtime_accept = $request->has('overtime_accept');
        $user->public_holidays = $request->has('public_holidays');

        $user->save();

        return redirect()
            ->route('team.user.show', $user)
            ->with('success', 'Konfiguracja została zaktualizowana.');
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
