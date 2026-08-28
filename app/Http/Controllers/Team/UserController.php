<?php

namespace App\Http\Controllers\Team;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Models\Leave;
use App\Models\LeaveBalance;
use App\Models\SentMessage;
use App\Models\User;
use App\Models\UserCompanyHistory;
use App\Repositories\UserRepository;
use App\Repositories\InvitationRepository;
use App\Repositories\CompanyRepository;
use Carbon\Carbon;
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
        $perPage = $request->input('per_page', 3);
        $userId = Auth::id();
        $user = Auth::user();
        $companyId = $this->companyRepository->getCompanyId();
        $query = User::where('company_id', $companyId)
            ->where('role', '!=', null);
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
        //Wykorzystane wnioski
        $yearStart = Carbon::now()->startOfYear();
        $yearEnd = Carbon::now()->endOfYear();

        $leaves = Leave::selectRaw("
        type,
        status,
        SUM(days) as days,
        SUM(working_days) as working_days,
        SUM(non_working_days) as non_working_days
    ")
            ->where('user_id', $user->id)
            ->where('start_date', '<=', $yearEnd)
            ->where('end_date', '>=', $yearStart)
            ->whereIn('status', ['zaakceptowane', 'zrealizowane'])
            ->groupBy('type', 'status')
            ->get();

        $leaves_used = $leaves->groupBy('type')->map(function ($items) {

            $accepted = $items->firstWhere('status', 'zaakceptowane');
            $realized = $items->firstWhere('status', 'zrealizowane');

            return [
                'zaakceptowane' => [
                    'days' => $accepted->days ?? 0,
                    'working_days' => $accepted->working_days ?? 0,
                    'non_working_days' => $accepted->non_working_days ?? 0,
                ],
                'zrealizowane' => [
                    'days' => $realized->days ?? 0,
                    'working_days' => $realized->working_days ?? 0,
                    'non_working_days' => $realized->non_working_days ?? 0,
                ],
            ];
        });
        $msg = SentMessage::where('user_id', $user->id)->orderByDesc('created_at')->get();
        $msg_sms = SentMessage::where('user_id', $user->id)->where('type', 'sms')->orderByDesc('created_at')->get();
        $msg_email = SentMessage::where('user_id', $user->id)->where('type', 'email')->orderByDesc('created_at')->get();

        try {
            $leave_balance = LeaveBalance::where('user_id', $user->id)
                ->where('company_id', $user->company_id)
                ->where('year', now()->year)
                ->first();
            $carried_over = $leave_balance->carried_over ?? 0;
            $base_days = $leave_balance->base_days ?? 0;
            $leave_balance_left = ($carried_over + $base_days) - $leave_balance->used_days;
        } catch (Exception) {
            $leave_balance = null;
            $leave_balance_left =  0;
        }

        return view('admin.team.user', compact('leave_balance', 'leave_balance_left', 'user', 'invitations', 'leaves_used', 'msg', 'msg_sms', 'msg_email'));
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
        $perPage = $request->input('per_page', 3);
        $user = Auth::user();
        $companyId = $this->companyRepository->getCompanyId();
        $query = User::where('company_id', $companyId)
            ->where('role', '!=', null);
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
        $query = User::where('company_id', $companyId)
            ->where('role', '!=', null);
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
        UserCompanyHistory::where('user_id', $user->id)->update(
            [
                'unassigned_at' => Carbon::now(),
                'paid_to' => Carbon::now()->endOfMonth()
            ]
        );
        $user->company_id = null;
        $user->supervisor_id = null;
        $user->position = null;
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
    public function config_planing(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.config', compact('user', 'invitations'));
    }
    public function config_sms(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.team.sms', compact('user', 'invitations'));
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
    public function update_sms(Request $request, User $user)
    {
        $request->validate([
            'sms' => 'nullable|in:on',
        ]);

        // Pozostałe pola
        $user->sms = $request->has('sms');

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
