<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Repositories\CompanyRepository;
use App\Repositories\LeaveRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveSingleController extends Controller
{
    protected LeaveRepository $leaveRepository;
    protected CompanyRepository $companyRepository;
    protected UserRepository $userRepository;

    public function __construct(
        LeaveRepository $leaveRepository,
        CompanyRepository $companyRepository,
        UserRepository $userRepository
    ) {
        $this->leaveRepository = $leaveRepository;
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Wyświetla stronę kalendarza
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Check if session variables for date range exist, otherwise set default to current month
        if (!$request->session()->has('start_date') || !$request->session()->has('end_date')) {
            $startOfMonth = now()->startOfMonth()->toDateString();
            $endOfMonth = now()->endOfMonth()->toDateString();

            $request->session()->put('start_date', $startOfMonth);
            $request->session()->put('end_date', $endOfMonth);
        }

        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        //$leaves = $this->leaveRepository->getForLoggedUserPaginated(10, $startDate, $endDate);
        //$leavePending = $this->leaveRepository->getAllForCompanyPaginatedCount($startDate, $endDate);
        $leaves = Leave::where('user_id', Auth::id())->orderBy('start_date', 'desc')->get();
        $leavePending = Leave::where('manager_id', Auth::id())->orderBy('start_date', 'desc')->count();

        return view('admin.leave.index', compact('leaves', 'startDate', 'endDate', 'leavePending'));
    }
    public function create(Request $request)
    {
        // Check if session variables for date range exist, otherwise set default to current month
        if (!$request->session()->has('start_date') || !$request->session()->has('end_date')) {
            $startOfMonth = now()->startOfMonth()->toDateString();
            $endOfMonth = now()->endOfMonth()->toDateString();

            $request->session()->put('start_date', $startOfMonth);
            $request->session()->put('end_date', $endOfMonth);
        }

        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');
        
        $userId = Auth::id();
        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyId($companyId);
        $leavePending = $this->leaveRepository->getAllForCompanyPaginatedCount($startDate, $endDate);
        return view('admin.leave.create', compact('users', 'userId', 'companyId' , 'leavePending'));
    }
    public function store(Request $request)
    {
        Leave::create([
            'company_id' => $request->company_id,
            'manager_id' => $request->manager_id,
            'user_id' => $request->user_id,
            'created_user_id' => $request->user_id,
            'type' => $request->type,
            'note' => $request->note,
            'start_date' => $request->start_time,
            'end_date' => $request->end_time,
        ]);
        return redirect()->route('leave.single.index')->with('success', 'Operacja zakończona powodzeniem.');
    }
}
