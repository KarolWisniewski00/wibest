<?php

namespace App\Http\Controllers\Raport;

use App\Exports\TimeSheetExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\DateRequest;
use App\Repositories\UserRepository;
use App\Repositories\WorkSessionRepository;
use App\Services\FilterDateService;
use App\Services\UserService;
use App\Services\WorkSessionService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

    public function getPublicHolidays($year)
    {
        // Obliczanie Wielkanocy
        $easter = Carbon::createFromTimestamp(easter_date($year));
        $holidays = [
            $easter->copy(),               // Wielkanoc (niedziela)
            $easter->copy()->addDay(),     // Poniedziałek Wielkanocny
            Carbon::create($year, 5, 1),   // Święto Pracy
            Carbon::create($year, 5, 3),   // Święto Konstytucji 3 Maja
            $easter->copy()->addWeeks(7),  // Zielone Świątki (50 dni po Wielkanocy)
            $easter->copy()->addDays(60),  // Boże Ciało (60 dni po Wielkanocy)
            Carbon::create($year, 8, 15),  // Wniebowzięcie NMP + Święto WP
            Carbon::create($year, 11, 1),  // Wszystkich Świętych
            Carbon::create($year, 11, 11), // Święto Niepodległości
            Carbon::create($year, 12, 25), // Boże Narodzenie (1. dzień)
            Carbon::create($year, 12, 26), // Boże Narodzenie (2. dzień)
        ];

        return collect($holidays)->map(fn($date) => $date->format('Y-m-d'));
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
        $dates = $this->filterDateService->getRangeDateFilter($request, 'd.m');
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
        $users = $this->userService->getByRoleAddDatesByFilterDate($request);
        return response()->json($users);
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

        foreach ($dates as $date) {
            $carbonDate = Carbon::createFromFormat('d.m.Y', $date);
            $formattedDates[] = [
                'day_number' => $carbonDate->format('d'), // np. "02"
                'day_name_short' => mb_substr($carbonDate->translatedFormat('l'), 0, 2), // np. "Śr"
                'date' => $carbonDate->format('Y-m-d'), // np. "2025-08-02"
            ];
        }

        $year = $year < 100 ? 2000 + $year : $year;
        $holidays = $this->getPublicHolidays($year);
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
                

                if ($leave) {
                    $userDates[$date['date']] = "W";
                } else if ($hasEvent) {
                    $userDates[$date['date']] = "O";
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date['date']] = "O";
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date['date']] = "O";
                } else if ($isHoliday == true) {
                    $userDates[$date['date']] = "Ś";
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
