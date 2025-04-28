<?php

namespace App\Http\Controllers\Raport;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkSessionRepository;
use Illuminate\Http\Request;

class TimeSheetController extends Controller
{
    protected UserRepository $userRepository;
    protected WorkSessionRepository $workSessionRepository;
    protected CompanyRepository $companyRepository;

    public function __construct(
        UserRepository $userRepository,
        WorkSessionRepository $workSessionRepository,
        CompanyRepository $companyRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->workSessionRepository = $workSessionRepository;
        $this->companyRepository = $companyRepository;
    }


    /**
     * Wyświetla stronę kalendarza
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Używamy repozytorium, aby uzyskać ID użytkownika
        $userId = $this->userRepository->getAuthUserId();
        // Check if session variables for date range exist, otherwise set default to current month
        if (!$request->session()->has('start_date') || !$request->session()->has('end_date')) {
            $startOfMonth = now()->startOfMonth()->toDateString();
            $endOfMonth = now()->endOfMonth()->toDateString();

            $request->session()->put('start_date', $startOfMonth);
            $request->session()->put('end_date', $endOfMonth);
        }

        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        // Generate a list of dates from start to end in Y-m-d format
        $dates = [];
        $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $startDate);
        $endDateCarbon = \Carbon\Carbon::createFromFormat('Y-m-d', $endDate);

        while ($currentDate->lte($endDateCarbon)) {
            $dates[] = $currentDate->format('d.m.y');
            $currentDate->addDay();
        }

        $work_sessions = $this->workSessionRepository->getPaginatedForCurrentUser(10, $startDate, $endDate);

        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyId($companyId);

        // Add dates with 0 or 1 for each user
        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $hasEvent = $this->workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $this->workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $this->workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $this->workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $this->workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $this->workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);

                if ($status) {
                    $userDates[$date] = "in_progress";
                } else if ($hasEvent) {
                    $userDates[$date] = 1;
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date] = 0.5;
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date] = 0.5;
                } else if (!$hasEvent) {
                    $userDates[$date] = 0;
                }
            }
            $user->dates = $userDates;
        }

        // Generate a list of dates from start to end in Y-m-d format
        $dates = [];
        $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $startDate);
        $endDateCarbon = \Carbon\Carbon::createFromFormat('Y-m-d', $endDate);

        while ($currentDate->lte($endDateCarbon)) {
            $dates[] = $currentDate->format('d.m');
            $currentDate->addDay();
        }

        return view('admin.raport.index', compact('work_sessions', 'dates', 'startDate', 'endDate', 'users'));
    }
    public function get(Request $request)
    {
        $perPage = $request->input('per_page', 10);

        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        // Generate a list of dates from start to end in Y-m-d format
        $dates = [];
        $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $startDate);
        $endDateCarbon = \Carbon\Carbon::createFromFormat('Y-m-d', $endDate);

        while ($currentDate->lte($endDateCarbon)) {
            $dates[] = $currentDate->format('d.m.y');
            $currentDate->addDay();
        }

        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyId($companyId, $request->input('page'));

        // Add dates with 0 or 1 for each user
        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $hasEvent = $this->workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $this->workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $this->workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $this->workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $this->workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $this->workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);

                if ($status) {
                    $userDates[$date] = "in_progress";
                } else if ($hasEvent) {
                    $userDates[$date] = 1;
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date] = 0.5;
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date] = 0.5;
                } else if (!$hasEvent) {
                    $userDates[$date] = 0;
                }
            }
            $user->dates = $userDates;
        }

        return response()->json($users);
    }
    public function setDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $request->session()->put('start_date', $request->input('start_date'));
        $request->session()->put('end_date', $request->input('end_date'));

        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');
        
        // Generate a list of dates from start to end in Y-m-d format
        $dates = [];
        $currentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $startDate);
        $endDateCarbon = \Carbon\Carbon::createFromFormat('Y-m-d', $endDate);

        while ($currentDate->lte($endDateCarbon)) {
            $dates[] = $currentDate->format('d.m.y');
            $currentDate->addDay();
        }

        $companyId = $this->companyRepository->getCompanyId();
        $users = $this->userRepository->getByCompanyIdAll($companyId);

        // Add dates with 0 or 1 for each user
        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $hasEvent = $this->workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $this->workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $this->workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $this->workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $this->workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $this->workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);

                if ($status) {
                    $userDates[$date] = "in_progress";
                } else if ($hasEvent) {
                    $userDates[$date] = 1;
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date] = 0.5;
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date] = 0.5;
                } else if (!$hasEvent) {
                    $userDates[$date] = 0;
                }
            }
            $user->dates = $userDates;
        }

        return response()->json($users);
    }
}
