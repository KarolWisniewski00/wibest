<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Models\LeaveBalance;
use App\Models\User;
use App\Services\FilterDateService;
use App\Services\LeaveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LeaveBalanceController extends Controller
{
    protected FilterDateService $filterDateService;
    protected LeaveService $leaveService;

    public function __construct(
        FilterDateService $filterDateService,
        LeaveService $leaveService,
    ) {
        $this->filterDateService = $filterDateService;
        $this->leaveService = $leaveService;
    }

    /**
     * Wyświetla stronę z wnioskami do akceptacji.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $leavePending = $this->leaveService->countByUserId($request);
        $leaveBalances = LeaveBalance::where('leave_balances.company_id', Auth::user()->company_id)
            ->join('users', 'users.id', '=', 'leave_balances.user_id')
            ->orderBy('users.name', 'asc')
            ->orderBy('leave_balances.year', 'asc')
            ->select('leave_balances.*')
            ->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(3);
        return view('admin.leave-balance.index', compact('leaveBalances', 'startDate', 'endDate', 'leavePending'));
    }
    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leaveBalances = LeaveBalance::where('leave_balances.company_id', Auth::user()->company_id)
            ->join('users', 'users.id', '=', 'leave_balances.user_id')
            ->orderBy('users.name', 'asc')
            ->orderBy('leave_balances.year', 'asc')
            ->select('leave_balances.*')
            ->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(3);
        $rows_table = [];
        $rows_list = [];
        foreach ($leaveBalances as $leave) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-leave-balance', ['leave' => $leave])->render());
        }

        return response()->json([
            'data' => $leaveBalances->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $leaveBalances->nextPageUrl(),
        ]);
    }
    public function setDate(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $leaveBalances = LeaveBalance::where('leave_balances.company_id', Auth::user()->company_id)
            ->join('users', 'users.id', '=', 'leave_balances.user_id')
            ->orderBy('users.name', 'asc')
            ->orderBy('leave_balances.year', 'asc')
            ->select('leave_balances.*')
            ->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->get();
        $rows_table = [];
        $rows_list = [];
        foreach ($leaveBalances as $leave) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-leave-balance', ['leave' => $leave])->render());
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
    }
    public function store(Request $request)
    {
        // 🔒 walidacja
        $request->validate([
            'year' => 'required|integer|min:1900|max:2100',
        ]);

        $created = 0;

        $users = User::where('company_id', Auth::user()->company_id)->get();

        foreach ($users as $user) {

            $exists = LeaveBalance::where('user_id', $user->id)
                ->where('year', $request->year)
                ->exists();

            if (!$exists) {
                LeaveBalance::create([
                    'user_id' => $user->id,
                    'company_id' => Auth::user()->company_id,
                    'year' => $request->year,
                    'base_days' => 0,
                    'carried_over' => 0,
                    'used_days' => 0,
                ]);

                $created++;
            }
        }

        // ❌ nic nie utworzono
        if ($created === 0) {
            return back()->with('fail', 'Bilans dla tego roku już istnieje dla wszystkich użytkowników.');
        }

        // ✅ sukces
        return back()->with('success', "Utworzono {$created} nowych bilansów urlopowych dla roku {$request->year}.");
    }
    public function edit(LeaveBalance $leave, Request $request)
    {
        $leavePending = $this->leaveService->countByUserId($request);
        return view('admin.leave-balance.edit', compact('leave', 'leavePending'));
    }
    public function update(LeaveBalance $leave, Request $request)
    {
        // 🔒 Walidacja
        $data = $request->validate([
            'base_days' => 'required|integer|min:0',
            'carried_over' => 'required|integer|min:0',
            'used_days' => 'required|integer|min:0',
        ]);

        // 🧠 Opcjonalna logika (ważne!)
        $total = $data['base_days'] + $data['carried_over'];

        if ($data['used_days'] > $total) {
            return back()->with('fail', 'Bilans urlopu został zaktualizowany.');;
        }

        // 💾 Zapis
        $leave->update($data);

        // 🔔 Alert
        return redirect()
            ->route('leave.balance.index')
            ->with('success', 'Bilans urlopu został zaktualizowany.');
    }
}
