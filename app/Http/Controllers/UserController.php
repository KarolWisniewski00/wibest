<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invitation;
use App\Models\Leave;
use App\Models\LeaveBalance;
use App\Models\PlannedLeave;
use App\Models\SentMessage;
use App\Models\User;
use App\Models\UserCompanyHistory;
use App\Models\WorkSession;
use App\Repositories\CompanyRepository;
use App\Repositories\InvitationRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = User::withoutGlobalScope('no_crm')->with('company')
            ->orderByRaw('ISNULL(company_id) DESC') // najpierw NULL-e
            ->orderBy('created_at', 'desc')         // potem najnowsze
            ->paginate(3);

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }
    public function get(Request $request)
    {
        $users = User::withoutGlobalScope('no_crm')->with('company')
            ->orderByRaw('ISNULL(company_id) DESC') // najpierw NULL-e
            ->orderBy('created_at', 'desc')         // potem najnowsze
            ->paginate(3);

        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-user', ['user' => $user])->render());
            array_push($rows_list, View::make('components.card-user', ['user' => $user])->render());
        }

        return response()->json([
            'data' => $users->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $users->nextPageUrl(),
        ]);
    }
    public function show(User $user)
    {
        $user->load('company');
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
                ->where('company_id', $user->id->company_id)
                ->where('year', now()->year)
                ->first();
            $carried_over = $leave_balance->carried_over ?? 0;
            $base_days = $leave_balance->base_days ?? 0;
            $leave_balance_left = ($carried_over + $base_days) - $leave_balance->used_days;
        } catch (Exception) {
            $leave_balance = null;
            $leave_balance_left =  0;
        }

        return view('admin.user.show', compact('leave_balance', 'leave_balance_left', 'user', 'leaves_used', 'msg', 'msg_sms', 'msg_email'));
    }
    public function delete(User $user)
    {
        $user_id = $user->id;
        if ($user->delete()) {
            UserCompanyHistory::where('user_id', $user_id)->update(
                [
                    'unassigned_at' => Carbon::now(),
                    'paid_to' => Carbon::now()->endOfMonth()
                ]
            );
            return redirect()->route('setting.user')->with('success', 'Operacja się powiodła.');
        }
        return redirect()->back()->with('fail', 'Wystąpił błąd.');
    }
    public function editCompany(User $user)
    {
        $companies = Company::select('id', 'name', 'vat_number')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'description' => $company->vat_number,
                ];
            });
        return view('admin.user.edit-company', compact('user', 'companies'));
    }
    public function updateCompany(Request $request, User $user)
    {
        if ($request->boolean('reset_planned_holidays')) {
            try {
                // Pobierz wszystkie planowane urlopy użytkownika
                $plannedLeaves = PlannedLeave::where('user_id', $user->id)->get();

                foreach ($plannedLeaves as $leave) {
                    $leave->delete();
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('fail', 'Wystąpił błąd podczas resetu urlopów planowanych: ' . $e->getMessage());
            }
        }

        if ($request->boolean('reset_requests')) {
            try {
                // Pobierz wszystkie wnioski użytkownika
                $leaves = Leave::where('user_id', $user->id)->get();

                foreach ($leaves as $leave) {
                    $leave->delete();
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('fail', 'Wystąpił błąd podczas resetu wniosków: ' . $e->getMessage());
            }
        }

        if ($request->boolean('reset_rcp')) {
            try {
                // Pobierz wszystkie sesje pracy danego użytkownika
                $work_sessions = WorkSession::where('user_id', $user->id)->get();

                foreach ($work_sessions as $session) {
                    // Usuń lokalizacje powiązane z eventStart i eventStop
                    if ($session->eventStart && $session->eventStart->location) {
                        $session->eventStart->location->delete();
                    }
                    if ($session->eventStop && $session->eventStop->location) {
                        $session->eventStop->location->delete();
                    }

                    // Usuń eventStart i eventStop
                    if ($session->eventStart) {
                        $session->eventStart->delete();
                    }
                    if ($session->eventStop) {
                        $session->eventStop->delete();
                    }

                    // Usuń sesję pracy
                    $session->delete();
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('fail', 'Wystąpił błąd podczas resetu RCP: ' . $e->getMessage());
            }
        }

        if ($request->boolean('reset_planning')) {
            $user->working_hours_custom = null;
            $user->working_hours_from = null;
            $user->working_hours_to = null;
            $user->working_hours_start_day = null;
            $user->working_hours_stop_day = null;
        }

        if ($request->company != null) {
            //Aktualizacja
            $user->load('company');
            if ($user->role != 'CRM') {
                // sprawdź, ilu użytkowników ma ta firma
                $usersCount = User::withoutGlobalScope('no_crm')->where('company_id', $request->company)->count();
                // ustaw rolę
                $role = $usersCount === 0 ? 'admin' : 'użytkownik';
                try {
                    $user_price = $user->company->user_price;
                } catch (Exception) {
                    $user_price = 10;
                }
            } else {
                $role = 'CRM';
                $user_price = 0;
            }


            if ($user->company_id != $request->company) {
                $user->company_id = $request->company;
                $user->supervisor_id = null;
                $user->position = null;
                $user->role = $role;
                $user->save();
                UserCompanyHistory::where('user_id', $user->id)->update(
                    [
                        'unassigned_at' => Carbon::now(),
                        'paid_to' => Carbon::now()->endOfMonth()
                    ]
                );
                UserCompanyHistory::create([
                    'company_id' => $user->company_id,
                    'user_id' => $user->id,
                    'assigned_at' => Carbon::now(),
                    'paid_from' => Carbon::now()->startOfMonth(),
                    'user_price' => $user_price,
                ]);
            }

            return redirect()->route('setting.user.show', $user)->with('success', 'Zapisano firmę.');
        } else {
            //Usunięcie firmy
            $user->company_id = null;
            $user->supervisor_id = null;
            $user->position = null;
            $user->role = null;
            $user->save();
            UserCompanyHistory::where('user_id', $user->id)->update(
                [
                    'unassigned_at' => Carbon::now(),
                    'paid_to' => Carbon::now()->endOfMonth()
                ]
            );
            return redirect()->route('setting.user.show', $user)->with('success', 'Usunięto firmę.');
        }
    }
    public function editPlaning(User $user)
    {
        return view('admin.user.edit-planing', compact('user'));
    }
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function prefabCreate(Company $client)
    {
        $user =  new User();
        $user->name = 'Administrator';
        $user->company_id = $client->id;
        $user->email = Str::random(12);
        $user->password = Hash::make(Str::random(12));
        $user->role = 'admin';
        $user->save();
        UserCompanyHistory::create([
            'company_id' => $client->id,
            'user_id' => $user->id,
            'assigned_at' => Carbon::now(),
            'paid_from' => Carbon::now()->startOfMonth(),
            'user_price' => 0,
        ]);
    }
    public function create(Company $client)
    {
        if ($client->getUsersCount() === 0) {
            $this->prefabCreate($client);
            return redirect()->route('setting.client.show', $client)->with('success', 'Dodano admina w celu zapewnienia prawidłowego działania.');
        }
        return view('admin.user.create', compact('client'));
    }
    public function createForCrm(Company $client)
    {
        if ($client->getUsersCount() === 0) {
            $this->prefabCreate($client);
            return redirect()->route('setting.client.show', $client)->with('success', 'Dodano admina w celu zapewnienia prawidłowego działania.');
        }
        return view('admin.user.create-for-crm', compact('client'));
    }
    public function editForCrm(User $user)
    {
        return view('admin.user.edit-for-crm', compact('user'));
    }
    public function updateForCrm(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'email', 'phone', 'position']));

        return redirect()->route('setting.user.show', $user)->with('success', 'Zaktualizowano dane użytkownika.');
    }
    public function storeForCrm(Request $request, Company $client)
    {
        $user = User::create([
            'name' => $request->name ?? 'Użytkownik CRM',
            'email' => $request->email ?? Str::random(12),
            'password' => Hash::make(Str::random(12)),
            'phone' => $request->phone ?? null,
            'position' => $request->position ?? null,
            'company_id' => $client->id,
            'role' => 'CRM',
        ]);
        UserCompanyHistory::create([
            'company_id' => $client->id,
            'user_id' => $user->id,
            'assigned_at' => Carbon::now(),
            'paid_from' => Carbon::now()->startOfMonth(),
            'user_price' => 0,
        ]);
        return redirect()->route('setting.client.show', $client)->with('success', 'Dodano użytkownika dla CRM.');
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
        return redirect(route('setting.user'))->with('success', 'Rozłączono.');
    }
    public function config_planing(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.user.config', compact('user', 'invitations'));
    }
    public function config_sms(User $user)
    {
        $companyId = $this->companyRepository->getCompanyId();
        $invitations = $this->invitationRepository->getByCompanyId($companyId);
        return view('admin.user.sms', compact('user', 'invitations'));
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
            ->route('setting.user.show', $user)
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
            ->route('setting.user.show', $user)
            ->with('success', 'Konfiguracja została zaktualizowana.');
    }
}
