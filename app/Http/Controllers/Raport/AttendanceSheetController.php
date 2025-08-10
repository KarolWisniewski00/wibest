<?php

namespace App\Http\Controllers\Raport;


use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Repositories\WorkSessionRepository;
use App\Services\FilterDateService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceSheetController extends Controller
{
    protected UserRepository $userRepository;
    protected FilterDateService $filterDateService;
    protected WorkSessionService $workSessionService;
    protected UserService $userService;

    public function __construct(
        UserRepository $userRepository,
        FilterDateService $filterDateService,
        WorkSessionService $workSessionService,
        UserService $userService,
    ) {
        $this->userRepository = $userRepository;
        $this->filterDateService = $filterDateService;
        $this->workSessionService = $workSessionService;
        $this->userService = $userService;
    }
    /**
     * Wyświetla stronę kalendarza
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $users = $this->userService->paginatedByRoleAddEwiByFilterDate($request);

        return view('admin.attendance.index',  compact('startDate', 'endDate', 'users'));
    }
    /**
     * Zwraca użytkowników dla paginated infinite scroll.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $users = $this->userService->paginatedByRoleAddEwiByFilterDate($request);
        return response()->json($users);
    }
    /**
     * Ustawia nową datę w filtrze zwraca użytkowników.
     *
     * @param DateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setDate(DateRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->filterDateService->initFilterDate($request);
        $users = $this->userService->getByRoleAddEwiByFilterDate($request);
        return response()->json($users);
    }
    /**
     * Zwraca export do pdfa.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportPdf(Request $request): \Symfony\Component\HttpFoundation\Response
    {
        setlocale(LC_TIME, 'pl_PL.UTF-8');
        \Carbon\Carbon::setLocale('pl');
        $filterDateService = new FilterDateService();
        $userRepository = new UserRepository();
        $workSessionRepository = new WorkSessionRepository();

        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);

        $employees = $userRepository->getByRequestIds($request->ids);
        $dates = $filterDateService->getRangeDateFilter($request);
        $employees[0]->time_in_work = 0;
        $employees[0]->time_in_work_extra = 0;
        $employees[0]->time_in_work_planned = 0;
        $employees[0]->time_in_work_hms = '';
        $employees[0]->time_in_work_hms_extra = '';
        $employees[0]->time_in_work_hms_planned = '';

        $datesAll = [];
        $datesExtra = [];
        $datesWork = [];
        foreach ($dates as $key => $date) {
            $totalDay = $workSessionRepository->getTotalOfDay($employees[0]->id, $date);
            $totalDayExtra = $workSessionRepository->getTotalOfDayExtra($employees[0]->id, $date);
            $totalDayPlanned = $workSessionRepository->getTotalOfDayPlanned($employees[0]->id, $date);
            $employees[0]->time_in_work += $totalDay;
            $employees[0]->time_in_work_extra += $totalDayExtra;
            $employees[0]->time_in_work_planned += $totalDayPlanned;
            $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

            try {
                // Pobierz pierwszą i ostatnią godzinę pracy (eventStart i eventStop) dla danego dnia
                $firstSession = WorkSession::where('user_id', $employees[0]->id)
                    ->whereHas('eventStart', function ($query) use ($formattedDate) {
                        $query->whereDate('time', $formattedDate);
                    })
                    ->first();

                $lastSession = WorkSession::where('user_id', $employees[0]->id)
                    ->whereHas('eventStop', function ($query) use ($formattedDate) {
                        $query->whereDate('time', $formattedDate);
                    })
                    ->first();

                $startTime = $firstSession && $firstSession->eventStart ? Carbon::parse($firstSession->eventStart->time)->format('H:i') : null;
                $endTime = $lastSession && $lastSession->eventStop ? Carbon::parse($lastSession->eventStop->time)->format('H:i') : null;

                $datesWork[$key] = ($startTime && $endTime) ? "$startTime - $endTime" : '';
                
            } catch (\Exception $e) {
                $datesWork[$key] = '';
            }

            if ($totalDay != 0) {
                $hours = floor($totalDay / 3600);
                $totalDay = sprintf('%02dh', $hours);

                $datesAll[$key] = $totalDay;
            } else {
                $datesAll[$key] = '';
            }

            if ($totalDayExtra != 0) {
                $hours = floor($totalDayExtra / 3600);
                $minutes = floor(($totalDayExtra % 3600) / 60);
                $totalDayExtra = sprintf('%02dh %02dmin', $hours, $minutes);

                $datesExtra[$key] = $totalDayExtra;
            } else {
                $datesExtra[$key] = null;
            }
        }

        $hours = floor($employees[0]->time_in_work / 3600);
        $employees[0]->time_in_work_hms = sprintf('%02dh', $hours);

        $hoursExtra = floor($employees[0]->time_in_work_extra / 3600);
        $minutesExtra = floor(($employees[0]->time_in_work_extra % 3600) / 60);
        $employees[0]->time_in_work_hms_extra = sprintf('%02dh %02dmin', $hoursExtra, $minutesExtra);

        $hoursPlanned = floor($employees[0]->time_in_work_planned / 3600);
        $minutesPlanned = floor(($employees[0]->time_in_work_planned % 3600) / 60);
        $secondsPlanned = $employees[0]->time_in_work_planned % 60;
        $employees[0]->time_in_work_hms_planned = sprintf('%02dh %02dmin %02ds', $hoursPlanned, $minutesPlanned, $secondsPlanned);

        $pdf = Pdf::loadView('exports.attendancesheet', [
            'employee' => $employees[0],
            'dates' => $dates,
            'datesAll' => $datesAll,
            'datesExtra' => $datesExtra,
            'datesWork' => $datesWork,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ])
            ->setPaper('a4', 'landscape')
            ->setOptions([
                'defaultFont' => 'DejaVu Sans', // obsługuje polskie znaki
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);

        return $pdf->download('eksport_dziennika_obecności.pdf');
    }
}
