<?php

namespace App\Http\Controllers\Raport;

use App\Exports\TimeSheetExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Livewire\CalendarView;
use App\Repositories\UserRepository;
use App\Repositories\WorkSessionRepository;
use App\Services\FilterDateService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class TimeSheetController extends Controller
{
    protected FilterDateService $filterDateService;
    protected WorkSessionService $workSessionService;
    protected UserService $userService;

    public function __construct(
        FilterDateService $filterDateService,
        WorkSessionService $workSessionService,
        UserService $userService,
    ) {
        $this->filterDateService = $filterDateService;
        $this->workSessionService = $workSessionService;
        $this->userService = $userService;
    }

    /**
     * Wyświetla stronę kalendarza z obecnościami.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $this->filterDateService->initFilterDateIfNotExist($request);
        $dates = $this->filterDateService->getRangeDateFilter($request, 'd.m.y');
        $startDate = $this->filterDateService->getStartDateDateFilter($request);
        $endDate = $this->filterDateService->getEndDateDateFilter($request);
        $users = $this->userService->paginatedByRoleAddDatesByFilterDate($request);

        return view('admin.raport.index', compact('dates', 'startDate', 'endDate', 'users'));
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
        $users = $this->userService->paginatedByRoleAddDatesByFilterDate($request);
        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-raport', ['user' => $user])->render());
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
        $users = $this->userService->getByRoleAddDatesByFilterDate($request);
        $rows_table = [];
        $rows_list = [];
        foreach ($users as $user) {
            // użyj partiala/komponentu blade który zwraca <tr>...</tr> lub <li>...</li>
            array_push($rows_table, View::make('components.row-raport', ['user' => $user])->render());
        }

        return response()->json([
            'table' => $rows_table,
            'list' => $rows_list,
        ]);
    }
    /**
     * Zwraca export do Excela.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportXlsx(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $data = $this->userService->getDataToExcelByRoleAddDatesByFilterDate($request);
        return Excel::download(new TimeSheetExport($data), 'eksport_dziennika_obecności.xlsx');
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
        $calendar = new CalendarView();
        $workSessionRepository = new WorkSessionRepository();
        $employees = $userRepository->getByRequestIds($request->ids);
        $dates = $filterDateService->getRangeDateFilter($request);
        $firstDate = Carbon::createFromFormat('d.m.Y', $dates[0]);
        $months = [
            "Styczeń",
            "Luty",
            "Marzec",
            "Kwiecień",
            "Maj",
            "Czerwiec",
            "Lipiec",
            "Sierpień",
            "Wrzesień",
            "Październik",
            "Listopad",
            "Grudzień"
        ];
        $monthName = $months[(int) $firstDate->format('n') - 1]; // 'n
        $year = $firstDate->year;

        $formattedDates = [];
        $daysShort = [
            1 => 'pon',
            2 => 'wt',
            3 => 'śr',
            4 => 'czw',
            5 => 'pt',
            6 => 'sob',
            7 => 'ndz',
        ];

        foreach ($dates as $date) {
            $carbonDate = Carbon::createFromFormat('d.m.Y', $date);
            $formattedDates[] = [
                'day_number' => $carbonDate->format('d'), // np. "02"
                'day_name_short' => $daysShort[$carbonDate->isoWeekday()],
                'date' => $carbonDate->format('Y-m-d'), // np. "2025-08-02"
            ];
        }

        $year = $year < 100 ? 2000 + $year : $year;
        $isHoliday = false;

        foreach ($employees as $key => $value) {
            $userDates = [];
            foreach ($formattedDates as $date) {
                $hasEvent = $workSessionRepository->hasEventForUserOnDate($value->id, \Carbon\Carbon::createFromFormat('Y-m-d', $date['date'])->format('d.m.y'));
                $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($value->id, \Carbon\Carbon::createFromFormat('Y-m-d', $date['date'])->format('d.m.y'));
                $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($value->id, \Carbon\Carbon::createFromFormat('d.m.y', \Carbon\Carbon::createFromFormat('Y-m-d', $date['date'])->format('d.m.y'))->addDay()->format('d.m.y'));
                $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($value->id, \Carbon\Carbon::createFromFormat('d.m.y', \Carbon\Carbon::createFromFormat('Y-m-d', $date['date'])->format('d.m.y'))->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($value->id, \Carbon\Carbon::createFromFormat('Y-m-d', $date['date'])->format('d.m.y'));
                $leave = $workSessionRepository->hasLeave($value->id, \Carbon\Carbon::createFromFormat('Y-m-d', $date['date'])->format('d.m.y'));
                $leaveFirst = $workSessionRepository->getFirstLeave($value->id, \Carbon\Carbon::createFromFormat('Y-m-d', $date['date'])->format('d.m.y'));

                //if ($user->public_holidays == true) {
                $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date['date']);
                if ($carbonDate->year < 100) {
                    $carbonDate->year += 2000;
                }
                $holidays = $calendar->getPublicHolidays($carbonDate->year);
                $dateStr = $carbonDate->format('Y-m-d');

                // Sprawdzenie czy to Nowy Rok lub Trzech Króli
                if ($carbonDate->month == 1 && $carbonDate->day == 1) {
                    $isHoliday = true; // Nowy Rok
                } elseif ($carbonDate->month == 1 && $carbonDate->day == 6) {
                    $isHoliday = true; // Trzech Króli
                } else {
                    $isHoliday = $holidays->contains($dateStr);
                }
                //} else {
                //    $isHoliday = false;
                //}


                if ($leave) {
                    $type = $leaveFirst->type;
                    $short = config('leavetypes.shortType')[$type] ?? null;
                    $userDates[$date['date']] = $short ?? '';
                } else if ($hasEvent) {
                    $userDates[$date['date']] = "RCP";
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date['date']] = "RCP";
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date['date']] = "RCP";
                } else if ($isHoliday == true) {
                    $userDates[$date['date']] = "ŚUW";
                } else {
                    $userDates[$date['date']] = "";
                }
            }
            $employees[$key]->dates = $userDates;
        }
        $dates = $formattedDates;
        $pdf = Pdf::loadView('exports.timesheet', [
            'employees' => $employees,
            'dates' => $dates,
            'monthName' => $monthName,
            'year' => $year,
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
