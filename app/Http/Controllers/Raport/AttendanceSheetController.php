<?php

namespace App\Http\Controllers\Raport;


use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Livewire\CalendarView;
use App\Models\WorkBlock;
use App\Models\WorkSession;
use App\Repositories\UserRepository;
use App\Repositories\WorkSessionRepository;
use App\Services\FilterDateService;
use App\Services\LeaveService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-attendance', ['user' => $user])->render());
        }

        return response()->json([
            'data' => $users->items(),
            'table' => $rows_table,
            'list' => $rows_list,
            'next_page_url' => $users->nextPageUrl(),
        ]);
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
        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-attendance', ['user' => $user])->render());
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
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
        $leaveService = new LeaveService();
        $calendar = new CalendarView();

        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);

        $employees = $userRepository->getByRequestIds($request->ids);
        $dates = $filterDateService->getRangeDateFilter($request);
        $leaves = $leaveService->getByUserIdWithCutMonth($request, $employees[0]->id);
        $employees[0]->time_in_work = 0;
        $employees[0]->time_in_work_extra = 0;
        $employees[0]->time_in_work_planned = 0;
        $employees[0]->time_in_work_leave = 0;
        $employees[0]->time_in_work_under = 0;
        $employees[0]->time_in_work_hms = '';
        $employees[0]->time_in_work_hms_extra = '';
        $employees[0]->time_in_work_hms_planned = '';
        $employees[0]->time_in_work_hms_leave = '';
        $employees[0]->time_in_work_hms_under = '';
        $datesAll = [];
        $datesPlanned = [];
        $datesLeave = [];
        $datesUnder = [];
        $datesExtra = [];
        $datesWork = [];
        foreach ($dates as $key => $date) {
            $totalDay = $workSessionRepository->getTotalOfDay($employees[0]->id, $date);
            $totalDayExtra = $workSessionRepository->getTotalOfDayExtra($employees[0]->id, $date);
            $totalDayPlanned = $workSessionRepository->getTotalOfDayPlanned($employees[0]->id, $date);
            $totalDayUnder = $workSessionRepository->getTotalOfDayUnder($employees[0]->id, $date);
            $totalDayPlannedVar = WorkBlock::where('user_id', $employees[0]->id)
                ->whereDate('starts_at', Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d'))
                ->first();
            $carbonDate = Carbon::createFromFormat('d.m.y', $date);
            $holidays = $calendar->getPublicHolidays($carbonDate->year);
            $dateStr = $carbonDate->format('Y-m-d');

            $employees[0]->time_in_work_under += $totalDayUnder;
            $employees[0]->time_in_work += $totalDay;
            $employees[0]->time_in_work_extra += $totalDayExtra;
            if ($totalDayUnder != 0) {
                $datesUnder[$key] = sprintf('%02dh %02dmin', floor($totalDayUnder / 3600), floor(($totalDayUnder % 3600) / 60));
            } else {
                $datesUnder[$key] = sprintf('%02dh', 0);
            }
            $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
            // Sprawdzenie czy to Nowy Rok lub Trzech Króli
            if ($carbonDate->month == 1 && $carbonDate->day == 1) {
                $isHoliday = true; // Nowy Rok
            } elseif ($carbonDate->month == 1 && $carbonDate->day == 6) {
                $isHoliday = true; // Trzech Króli
            } else {
                $isHoliday = $holidays->contains($dateStr);
            }

            if (!$isHoliday) {
                if ($employees[0]->working_hours_regular == 'zmienny planing') {
                    $totalDayPlannedVarBufor = $totalDayPlannedVar->duration_seconds ?? 0;
                    $employees[0]->time_in_work_planned += $totalDayPlannedVarBufor;
                    if ($totalDayPlannedVarBufor != 0) {
                        $datesPlanned[$key] = sprintf('%02dh %02dmin', floor($totalDayPlannedVarBufor / 3600), floor(($totalDayPlannedVarBufor % 3600) / 60));
                    } else {
                        $datesPlanned[$key] = sprintf('%02dh', 0);
                    }
                } else {
                    $employees[0]->time_in_work_planned += $totalDayPlanned;
                    $datesPlanned[$key] = sprintf('%02dh', floor($totalDayPlanned / 3600));
                }
            } else {
                $datesPlanned[$key] = sprintf('%02dh', 0);
            }
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
                if ($startTime != null && $endTime == null) {
                    $datesWork[$key] = 'ERROR';
                } else {
                    $datesWork[$key] = ($startTime && $endTime) ? "$startTime - $endTime" : '';
                }
            } catch (\Exception $e) {
                $datesWork[$key] = '';
            }

            if ($totalDay != 0) {
                $hours = floor($totalDay / 3600);
                $min = floor(($totalDay % 3600) / 60);
                $totalDay = sprintf('%02dh  %02dmin', $hours, $min);

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

            // 🔹 NOWA CZĘŚĆ — obsługa urlopów
            $isLeaveDay = false;
            $leaveSeconds = 0;

            foreach ($leaves as $leave) {
                $leaveStart = Carbon::parse($leave->start_date);
                $leaveEnd = Carbon::parse($leave->end_date);

                if (Carbon::parse($formattedDate)->betweenIncluded($leaveStart, $leaveEnd)) {
                    $isLeaveDay = true;
                    if ($employees[0]->working_hours_regular == 'zmienny planing') {
                        $totalDayPlannedVarBufor = $totalDayPlannedVar->duration_seconds ?? 0;
                        if ($totalDayPlannedVarBufor != 0) {
                            $leaveSeconds += $totalDayPlannedVarBufor;
                        } else {
                            $leaveSeconds += 0;
                        }
                    } else {
                        if ($employees[0]->working_hours_custom) {
                            $leaveSeconds += $employees[0]->working_hours_custom * 60 * 60;
                        } else {
                            $leaveSeconds += 0;
                        }
                    }
                }
            }

            if ($isLeaveDay) {
                $datesLeave[$key] = sprintf('%02dh  %02dmin', floor($leaveSeconds / 3600), floor(($leaveSeconds % 3600) / 60));
                $employees[0]->time_in_work_leave += $leaveSeconds;
            } else {
                $datesLeave[$key] = '';
            }
        }

        $hours = floor($employees[0]->time_in_work / 3600);
        $minutes = floor(($employees[0]->time_in_work % 3600) / 60);
        $employees[0]->time_in_work_hms = sprintf('%02dh %02dmin', $hours, $minutes);

        $hoursExtra = floor($employees[0]->time_in_work_extra / 3600);
        $minutesExtra = floor(($employees[0]->time_in_work_extra % 3600) / 60);
        $employees[0]->time_in_work_hms_extra = sprintf('%02dh %02dmin', $hoursExtra, $minutesExtra);

        $hoursUnder = floor($employees[0]->time_in_work_under / 3600);
        $minutesUnder = floor(($employees[0]->time_in_work_under % 3600) / 60);
        $employees[0]->time_in_work_hms_under = sprintf('%02dh %02dmin', $hoursUnder, $minutesUnder);

        $hoursPlanned = floor($employees[0]->time_in_work_planned / 3600);
        $minutesPlanned = floor(($employees[0]->time_in_work_planned % 3600) / 60);
        $employees[0]->time_in_work_hms_planned = sprintf('%02dh %02dmin', $hoursPlanned, $minutesPlanned);

        $hoursLeave = floor($employees[0]->time_in_work_leave / 3600);
        $minutesLeave = floor(($employees[0]->time_in_work_leave % 3600) / 60);
        $employees[0]->time_in_work_hms_leave = sprintf('%02dh %02dmin', $hoursLeave, $minutesLeave);

        $pdf = Pdf::loadView('exports.attendancesheet', [
            'employee' => $employees[0],
            'dates' => $dates,
            'datesAll' => $datesAll,
            'datesPlanned' => $datesPlanned,
            'datesUnder' => $datesUnder,
            'datesLeave' => $datesLeave,
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
