<?php

namespace App\Services;

use App\Repositories\LeaveRepository;
use App\Repositories\WorkSessionRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{

    /**
     * Zwraca użytkowników w zależności od roli zalogowanego użytkownika.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginatedByRole(): \Illuminate\Pagination\LengthAwarePaginator
    {
        $userRepository = new UserRepository();

        switch (Auth::user()->role) {
            case 'admin':
                return $userRepository->paginateByAdmin();
                break;
            case 'menedżer':
                return $userRepository->paginateByManager();
                break;
            case 'kierownik':
                return $userRepository->paginateByUser();
                break;
            case 'użytkownik':
                return $userRepository->paginateByUser();
                break;
            case 'właściciel':
                return $userRepository->paginateByAdmin();
                break;
            default:
                return $userRepository->paginateByUser();
                break;
        }
        return $userRepository->paginateByUser();
    }
    /**
     * Zwraca użytkowników w zależności od roli zalogowanego użytkownika.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getByRole(): \Illuminate\Support\Collection
    {
        $userRepository = new UserRepository();

        switch (Auth::user()->role) {
            case 'admin':
                return $userRepository->getByAdmin();
                break;
            case 'menedżer':
                return $userRepository->getByManager();
                break;
            case 'kierownik':
                return $userRepository->getByUser();
                break;
            case 'użytkownik':
                return $userRepository->getByUser();
                break;
            case 'właściciel':
                return $userRepository->getByAdmin();
                break;
            default:
                return $userRepository->getByUser();
                break;
        }
        return $userRepository->getByUser();
    }
    /**
     * Zwraca użytkowników z datami w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginatedByRoleAddDatesByFilterDate(Request $request): \Illuminate\Pagination\LengthAwarePaginator
    {
        $filterDateService = new FilterDateService();
        $workSessionRepository = new WorkSessionRepository();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->paginatedByRole();

        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $hasEvent = $workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $leave = $workSessionRepository->hasLeave($user->id, $date);
                $leaveFirst = $workSessionRepository->getFirstLeave($user->id, $date);

                if ($status) {
                    $userDates[$date] = "in_progress";
                } else if ($leave) {
                    $userDates[$date] = $leaveFirst->type;
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
        return $users;
    }
    /**
     * Zwraca użytkowników z datami w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginatedByRoleAddDatesAndLeavesByFilterDate(Request $request): \Illuminate\Pagination\LengthAwarePaginator
    {
        $filterDateService = new FilterDateService();
        $workSessionRepository = new WorkSessionRepository();
        $leaveRepository = new LeaveRepository();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->paginatedByRole();

        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $leave = $leaveRepository->hasPlannedLeaveToday($user->id, $date);


                if ($status) {
                    $userDates[$date] = "in_progress";
                } elseif ($leave) {
                    $userDates[$date] = "planned_leave";
                } else {
                    $userDates[$date] = null;
                }
            }
            $user->dates = $userDates;
        }
        return $users;
    }
    /**
     * Zwraca użytkowników z datami w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function getByRoleAddDatesAndLeavesByFilterDate(Request $request): \Illuminate\Support\Collection
    {
        $filterDateService = new FilterDateService();
        $workSessionRepository = new WorkSessionRepository();
        $leaveRepository = new LeaveRepository();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->getByRole();

        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $leave = $leaveRepository->hasPlannedLeaveToday($user->id, $date);


                if ($status) {
                    $userDates[$date] = "in_progress";
                } elseif ($leave) {
                    $userDates[$date] = "planned_leave";
                } else {
                    $userDates[$date] = null;
                }
            }
            $user->dates = $userDates;
        }
        return $users;
    }
    /**
     * Zwraca użytkowników z ewidencją w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginatedByRoleAddEwiByFilterDate(Request $request): \Illuminate\Pagination\LengthAwarePaginator
    {
        $filterDateService = new FilterDateService();
        $workSessionRepository = new WorkSessionRepository();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->paginatedByRole();

        foreach ($users as &$user) {
            $user->time_in_work = 0;
            $user->time_in_work_extra = 0;
            $user->time_in_work_under = 0;
            $user->time_in_work_planned = 0;
            $user->time_in_work_hms = '';
            $user->time_in_work_hms_extra = '';
            $user->time_in_work_hms_under = '';
            $user->time_in_work_hms_planned = '';
            foreach ($dates as $date) {
                $totalDay = $workSessionRepository->getTotalOfDay($user->id, $date);
                $totalDayExtra = $workSessionRepository->getTotalOfDayExtra($user->id, $date);
                $totalDayUnder = $workSessionRepository->getTotalOfDayUnder($user->id, $date);
                $totalDayPlanned = $workSessionRepository->getTotalOfDayPlanned($user->id, $date);
                $user->time_in_work += $totalDay;
                $user->time_in_work_extra += $totalDayExtra;
                $user->time_in_work_under += $totalDayUnder;
                $user->time_in_work_planned += $totalDayPlanned;
            }
            $hours = floor($user->time_in_work / 3600);
            $minutes = floor(($user->time_in_work % 3600) / 60);
            $seconds = $user->time_in_work % 60;
            $user->time_in_work_hms = sprintf('%02dh %02dmin %02ds', $hours, $minutes, $seconds);

            $hoursExtra = floor($user->time_in_work_extra / 3600);
            $minutesExtra = floor(($user->time_in_work_extra % 3600) / 60);
            $secondsExtra = $user->time_in_work_extra % 60;
            $user->time_in_work_hms_extra = sprintf('%02dh %02dmin %02ds', $hoursExtra, $minutesExtra, $secondsExtra);

            $hoursUnder = floor($user->time_in_work_under / 3600);
            $minutesUnder = floor(($user->time_in_work_under % 3600) / 60);
            $secondsUnder = $user->time_in_work_under % 60;
            $user->time_in_work_hms_under = sprintf('%02dh %02dmin %02ds', $hoursUnder, $minutesUnder, $secondsUnder);

            $hoursPlanned = floor($user->time_in_work_planned / 3600);
            $minutesPlanned = floor(($user->time_in_work_planned % 3600) / 60);
            $secondsPlanned = $user->time_in_work_planned % 60;
            $user->time_in_work_hms_planned = sprintf('%02dh %02dmin %02ds', $hoursPlanned, $minutesPlanned, $secondsPlanned);
        }
        return $users;
    }
    /**
     * Zwraca użytkowników z ewidencją w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     */
    public function getByRoleAddEwiByFilterDate(Request $request)
    {
        $filterDateService = new FilterDateService();
        $workSessionRepository = new WorkSessionRepository();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->getByRole();

        foreach ($users as &$user) {
            $user->time_in_work = 0;
            $user->time_in_work_extra = 0;
            $user->time_in_work_under = 0;
            $user->time_in_work_planned = 0;
            $user->time_in_work_hms = '';
            $user->time_in_work_hms_extra = '';
            $user->time_in_work_hms_under = '';
            $user->time_in_work_hms_planned = '';
            foreach ($dates as $date) {
                $totalDay = $workSessionRepository->getTotalOfDay($user->id, $date);
                $totalDayExtra = $workSessionRepository->getTotalOfDayExtra($user->id, $date);
                $totalDayUnder = $workSessionRepository->getTotalOfDayUnder($user->id, $date);
                $totalDayPlanned = $workSessionRepository->getTotalOfDayPlanned($user->id, $date);
                $user->time_in_work += $totalDay;
                $user->time_in_work_extra += $totalDayExtra;
                $user->time_in_work_under += $totalDayUnder;
                $user->time_in_work_planned += $totalDayPlanned;
            }
            $hours = floor($user->time_in_work / 3600);
            $minutes = floor(($user->time_in_work % 3600) / 60);
            $seconds = $user->time_in_work % 60;
            $user->time_in_work_hms = sprintf('%02dh %02dmin %02ds', $hours, $minutes, $seconds);

            $hoursExtra = floor($user->time_in_work_extra / 3600);
            $minutesExtra = floor(($user->time_in_work_extra % 3600) / 60);
            $secondsExtra = $user->time_in_work_extra % 60;
            $user->time_in_work_hms_extra = sprintf('%02dh %02dmin %02ds', $hoursExtra, $minutesExtra, $secondsExtra);

            $hoursUnder = floor($user->time_in_work_under / 3600);
            $minutesUnder = floor(($user->time_in_work_under % 3600) / 60);
            $secondsUnder = $user->time_in_work_under % 60;
            $user->time_in_work_hms_under = sprintf('%02dh %02dmin %02ds', $hoursUnder, $minutesUnder, $secondsUnder);

            $hoursPlanned = floor($user->time_in_work_planned / 3600);
            $minutesPlanned = floor(($user->time_in_work_planned % 3600) / 60);
            $secondsPlanned = $user->time_in_work_planned % 60;
            $user->time_in_work_hms_planned = sprintf('%02dh %02dmin %02ds', $hoursPlanned, $minutesPlanned, $secondsPlanned);
        }
        return $users;
    }
    /**
     * Zwraca użytkowników z datami w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function getByRoleAddDatesByFilterDate(Request $request): \Illuminate\Support\Collection
    {
        $filterDateService = new FilterDateService();
        $workSessionRepository = new WorkSessionRepository();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->getByRole();


        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $hasEvent = $workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $leave = $workSessionRepository->hasLeave($user->id, $date);
                $leaveFirst = $workSessionRepository->getFirstLeave($user->id, $date);

                if ($status) {
                    $userDates[$date] = "in_progress";
                } else if ($leave) {
                    $userDates[$date] = $leaveFirst->type;
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
        return $users;
    }
    /**
     * Pobiera dane użytkowników do eksportu do Excela z datami w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function getDataToExcelByRoleAddDatesByFilterDate(Request $request): \Illuminate\Support\Collection
    {
        $filterDateService = new FilterDateService();
        $workSessionRepository = new WorkSessionRepository();
        $userRepository = new UserRepository();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $userRepository->getByRequestIds($request->ids);

        foreach ($users as &$user) {
            $userDates = [];
            foreach ($dates as $date) {
                $hasEvent = $workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $leave = $workSessionRepository->hasLeave($user->id, $date);

                if ($status) {
                    $userDates[$date] = "W trakcie pracy";
                } else if ($leave) {
                    $userDates[$date] = "Wniosek";
                } else if ($hasEvent) {
                    $userDates[$date] = "Obecny";
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date] = "Obecny";
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date] = "Obecny";
                } else if (!$hasEvent) {
                    $userDates[$date] = "brak obecności";
                }
            }
            $user->dates = $userDates;
        }

        $data = collect([
            array_merge(
                ['Nazwa użytkownika' => 'Nazwa użytkownika'],
                array_combine($dates, $dates)
            )
        ])->concat(
            $users->map(function ($user) use ($dates) {
                return array_merge(
                    ['Nazwa użytkownika' => (string) ($user->name ?? 'Brak danych')],
                    $user->dates
                );
            })
        );
        return $data;
    }
    /**
     * Zwraca użytkowników.
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function getUsersFromCompany(): \Illuminate\Support\Collection
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdmin();
    }
}
