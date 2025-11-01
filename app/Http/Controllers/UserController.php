<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invitation;
use App\Models\Leave;
use App\Models\PlannedLeave;
use App\Models\User;
use App\Models\WorkSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('company')
            ->orderByRaw('ISNULL(company_id) DESC') // najpierw NULL-e
            ->orderBy('created_at', 'desc')         // potem najnowsze
            ->paginate(10);

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }
    public function get(Request $request)
    {
        $users = User::with('company')
            ->orderByRaw('ISNULL(company_id) DESC') // najpierw NULL-e
            ->orderBy('created_at', 'desc')         // potem najnowsze
            ->paginate(10);

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
        return view('admin.user.show', compact('user'));
    }
    public function delete(User $user)
    {
        if ($user->delete()) {
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

            // sprawdź, ilu użytkowników ma ta firma
            $usersCount = User::where('company_id', $request->company)->count();
            // ustaw rolę
            $role = $usersCount === 0 ? 'admin' : 'użytkownik';

            $user->company_id = $request->company;
            $user->supervisor_id = null;
            $user->position = null;
            $user->assigned_at = Carbon::now();
            $user->role = $role;
            $user->save();
            return redirect()->route('setting.user.show', $user)->with('success', 'Zapisano firmę.');
        } else {
            //Usunięcie firmy
            $user->company_id = null;
            $user->supervisor_id = null;
            $user->position = null;
            $user->assigned_at = null;
            $user->role = null;
            $user->save();
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
    public function create(Company $client)
    {
        if ($client->getUsersCount() === 0) {
            $user =  new User();
            $user->name = 'Administrator';
            $user->company_id = $client->id;
            $user->email = 'admin';
            $user->password = Hash::make(Str::random(12));
            $user->role = 'admin';
            $user->save();
            return redirect()->route('setting.client.show', $client)->with('success', 'Dodano admina w celu zapewnienia prawidłowego działania.');
        }
        return view('admin.user.create', compact('client'));
    }
}
