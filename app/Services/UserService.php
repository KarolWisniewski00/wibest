<?php

namespace App\Services;

use App\Livewire\CalendarView;
use App\Models\WorkBlock;
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
     * @param \Illuminate\Http\Request|null $request
     * @return \Illuminate\Support\Collection
     */
    public function getByRole(?\Illuminate\Http\Request $request = null): \Illuminate\Support\Collection
    {
        $userRepository = new UserRepository();

        switch (Auth::user()->role) {
            case 'admin':
                return $userRepository->getByAdmin($request);
                break;
            case 'menedżer':
                return $userRepository->getByManager($request);
                break;
            case 'kierownik':
                return $userRepository->getByUser($request);
                break;
            case 'użytkownik':
                return $userRepository->getByUser($request);
                break;
            case 'właściciel':
                return $userRepository->getByAdmin($request);
                break;
            default:
                return $userRepository->getByUser($request);
                break;
        }
        return $userRepository->getByUser($request);
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
        $calendar = new CalendarView();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->paginatedByRole();

        foreach ($users as &$user) {
            $userDates = [];
            $userObjs = [];
            foreach ($dates as $date) {
                $hasEvent = $workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $leave = $workSessionRepository->hasLeave($user->id, $date);
                $leaveFirst = $workSessionRepository->getFirstLeave($user->id, $date);
                $work_obj = $workSessionRepository->getFirstRcp($user->id, $date);
                $work_obj_last = $workSessionRepository->getLastRcp($user->id, $date);

                if ($work_obj && $work_obj_last) {
                    if ($work_obj->id != $work_obj_last->id) {
                        $work_obj->eventStop = $work_obj_last->eventStop;
                        $work_obj->multi = true;
                    } else {
                        $work_obj->false = true;
                    }
                }

                //if ($user->public_holidays == true) {
                $carbonDate = Carbon::createFromFormat('d.m.y', $date);
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

                if ($status) {
                    $userDates[$date] = "progress";
                    $userObjs[$date] = $work_obj;
                } else if ($leave) {
                    $userDates[$date] = 'leave';
                    $userObjs[$date] = $leaveFirst;
                } else if ($hasEvent) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } else if ($isHoliday) {
                    $userDates[$date] = "holiday";
                } else if (!$hasEvent) {
                    $userDates[$date] = null;
                }
            }
            $user->dates = $userDates;
            $user->objs = $userObjs;
        }
        return $users;
    }
    /**
     * Zwraca użytkowników z datami w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginatedByRoleAddDatesAndPlaningByFilterDate(Request $request): \Illuminate\Pagination\LengthAwarePaginator
    {
        $filterDateService = new FilterDateService();
        $userRepository = new UserRepository();
        $workSessionRepository = new WorkSessionRepository();
        $calendar = new CalendarView();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->paginatedByRole();

        foreach ($users as &$user) {
            $userDates = [];
            $userObjs = [];
            foreach ($dates as $date) {
                //$status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $static = $userRepository->hasPlannedToday($user->id, $date);
                $work = $userRepository->hasPlannedTodayWork($user->id, $date);
                $work_obj = $userRepository->getPlannedTodayWork($user->id, $date);
                $leave = $workSessionRepository->hasLeave($user->id, $date);
                $leaveFirst = $workSessionRepository->getFirstLeave($user->id, $date);

                //if ($user->public_holidays == true) {
                $carbonDate = Carbon::createFromFormat('d.m.y', $date);
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
                    $userDates[$date] = 'leave';
                    $userObjs[$date] = $leaveFirst;
                } elseif ($work) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } elseif ($static) {
                    $userDates[$date] = "static";
                } else if ($isHoliday) {
                    $userDates[$date] = "holiday";
                } else {
                    $userDates[$date] = null;
                }
            }
            $user->dates = $userDates;
            $user->objs = $userObjs;
        }
        return $users;
    }
    /**
     * Zwraca użytkowników z datami w zależności od roli zalogowanego użytkownika.
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function getByRoleAddDatesAndPlaningByFilterDate(Request $request): \Illuminate\Support\Collection
    {
        $filterDateService = new FilterDateService();
        $userRepository = new UserRepository();
        $workSessionRepository = new WorkSessionRepository();
        $calendar = new CalendarView();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->getByRole($request);

        foreach ($users as &$user) {
            $userDates = [];
            $userObjs = [];
            foreach ($dates as $date) {
                //$status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $static = $userRepository->hasPlannedToday($user->id, $date);
                $work = $userRepository->hasPlannedTodayWork($user->id, $date);
                $work_obj = $userRepository->getPlannedTodayWork($user->id, $date);
                $leave = $workSessionRepository->hasLeave($user->id, $date);
                $leaveFirst = $workSessionRepository->getFirstLeave($user->id, $date);

                //if ($user->public_holidays == true) {
                $carbonDate = Carbon::createFromFormat('d.m.y', $date);
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
                    $userDates[$date] = 'leave';
                    $userObjs[$date] = $leaveFirst;
                } elseif ($work) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } elseif ($static) {
                    $userDates[$date] = "static";
                } else if ($isHoliday) {
                    $userDates[$date] = "holiday";
                } else {
                    $userDates[$date] = null;
                }
            }
            $user->dates = $userDates;
            $user->objs = $userObjs;
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
        $leaveService = new LeaveService();
        $calendar = new CalendarView();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->paginatedByRole();

        foreach ($users as &$user) {
            $leaves = $leaveService->getByUserIdWithCutMonth($request, $user->id);
            $user->time_in_work = 0;
            $user->time_in_work_extra = 0;
            $user->time_in_work_under = 0;
            $user->time_in_work_planned = 0;
            $user->time_in_work_planned_var = 0;
            $user->time_in_work_leave = 0;
            $user->time_in_work_leave_minutes = 0;
            $user->time_in_work_leave_seconds = 0;
            $user->time_in_work_total = 0;
            $user->time_in_work_total_minutes = 0;
            $user->time_in_work_total_seconds = 0;
            $user->time_in_work_hms = '';
            $user->time_in_work_hms_extra = '';
            $user->time_in_work_hms_under = '';
            $user->time_in_work_hms_planned = '';
            $user->time_in_work_hms_leave = '';
            $user->time_in_work_hms_total = '';
            foreach ($dates as $date) {
                $totalDay = $workSessionRepository->getTotalOfDay($user->id, $date);
                $totalDayExtra = $workSessionRepository->getTotalOfDayExtra($user->id, $date);
                $totalDayUnder = $workSessionRepository->getTotalOfDayUnder($user->id, $date);
                $totalDayPlanned = $workSessionRepository->getTotalOfDayPlanned($user->id, $date);
                $totalDayPlannedVar = WorkBlock::where('user_id', $user->id)
                    ->whereDate('starts_at', Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d'))
                    ->first();


                $carbonDate = Carbon::createFromFormat('d.m.y', $date);
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

                if (!$isHoliday) {
                    $user->time_in_work_planned += $totalDayPlanned;
                    $user->time_in_work_planned_var += $totalDayPlannedVar->duration_seconds ?? 0;
                }
                $user->time_in_work += $totalDay;
                if ($user->overtime) {
                    if ($totalDayExtra > ($user->overtime_threshold * 60)) {
                        if ($user->overtime_task) {
                            if ($user->overtime_accept) {
                                $totalDayExtraWithTaskAccepted = $workSessionRepository->getTotalOfDayExtraWithTaskAccepted($user->id, $date);
                                $user->time_in_work_extra += $totalDayExtraWithTaskAccepted;
                                $user->time_in_work -= $totalDayExtra;
                                $user->time_in_work += $totalDayExtraWithTaskAccepted;
                            } else {
                                $totalDayExtraWithTask = $workSessionRepository->getTotalOfDayExtraWithTask($user->id, $date);
                                $user->time_in_work_extra += $totalDayExtraWithTask;
                                $user->time_in_work -= $totalDayExtra;
                                $user->time_in_work += $totalDayExtraWithTask;
                            }
                        } else {
                            $user->time_in_work_extra += $totalDayExtra;
                        }
                    } else {
                        $user->time_in_work_extra += 0;
                        $user->time_in_work -= $totalDayExtra;
                    }
                }
                $user->time_in_work_under += $totalDayUnder;
            }
            if ($user->working_hours_regular == 'stały planing') {

                $daysMap = [
                    'poniedziałek' => 1,
                    'wtorek' => 2,
                    'środa' => 3,
                    'czwartek' => 4,
                    'piątek' => 5,
                    'sobota' => 6,
                    'niedziela' => 7,
                ];

                $startWorkDay = $daysMap[$user->working_hours_start_day];
                $endWorkDay   = $daysMap[$user->working_hours_stop_day];

                foreach ($leaves as $leave) {
                    $targetStartDate = Carbon::parse($leave->start_date);
                    $targetEndDate   = Carbon::parse($leave->end_date);
                    $rangeStartDate  = Carbon::parse($request->session()->get('start_date'));
                    $rangeEndDate    = Carbon::parse($request->session()->get('end_date'));

                    // Przycięcie do zakresu
                    $effectiveStartDate = $targetStartDate->lessThan($rangeStartDate) ? $rangeStartDate : $targetStartDate;
                    $effectiveEndDate   = $targetEndDate->greaterThan($rangeEndDate) ? $rangeEndDate : $targetEndDate;

                    $leaveDays = 0;
                    $currentDate = $effectiveStartDate->copy();

                    while ($currentDate->lte($effectiveEndDate)) {
                        $dayOfWeek = $currentDate->dayOfWeekIso; // 1 (pon) – 7 (nd)

                        if ($dayOfWeek >= $startWorkDay && $dayOfWeek <= $endWorkDay) {
                            $leaveDays++;
                        }

                        $carbonDate = $currentDate->copy();
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
                        if ($isHoliday) {
                            $leaveDays--;
                        }

                        $currentDate->addDay();
                    }

                    $user->time_in_work_leave += $leaveDays * $user->working_hours_custom;
                    $user->time_in_work_total += $leaveDays * $user->working_hours_custom;
                    $user->time_in_work_hms_leave = sprintf('%02dh 00min 00s', $user->time_in_work_leave);
                }

                $hours = floor($user->time_in_work / 3600);
                $minutes = floor(($user->time_in_work % 3600) / 60);
                $seconds = $user->time_in_work % 60;
                $user->time_in_work_total += $hours;
                $user->time_in_work_total_minutes += $minutes;
                $user->time_in_work_total_seconds += $seconds;
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
                $user->time_in_work_hms_planned = sprintf('%02dh 00min 00s', $hoursPlanned);
                $user->time_in_work_hms_total = sprintf('%02dh %02dmin %02ds', $user->time_in_work_total, $user->time_in_work_total_minutes, $user->time_in_work_total_seconds);
            }

            if ($user->working_hours_regular == 'zmienny planing') {
                foreach ($leaves as $leave) {
                    $targetStartDate = Carbon::parse($leave->start_date);
                    $targetEndDate = Carbon::parse($leave->end_date);
                    $rageStartDate = Carbon::parse($request->session()->get('start_date'));
                    $rageEndDate = Carbon::parse($request->session()->get('end_date'));

                    // Ustal daty "efektywne" – przycięte do zakresu, jeśli potrzeba
                    $effectiveStartDate = $targetStartDate->lessThan($rageStartDate) ? $rageStartDate : $targetStartDate;
                    $effectiveEndDate = $targetEndDate->greaterThan($rageEndDate) ? $rageEndDate : $targetEndDate;

                    // Oblicz liczbę dni
                    $startDate = $effectiveStartDate->startOfDay();
                    $endDate   = $effectiveEndDate->endOfDay();

                    $currentDate = $startDate->copy();
                    $working_days = 0;
                    $non_working_days = 0;
                    $has_working_day = false;

                    while ($currentDate->lte($endDate)) {

                        // sprawdzamy czy w danym dniu istnieje jakikolwiek workBlock
                        $hasWorkBlock = WorkBlock::where('user_id', $leave->user_id)
                            ->whereDate('starts_at', $currentDate)
                            ->exists();
                        $getWorkBlock = WorkBlock::where('user_id', $leave->user_id)
                            ->whereDate('starts_at', $currentDate)
                            ->first();

                        if ($hasWorkBlock) {
                            $working_days++;
                            $user->time_in_work_leave += floor($getWorkBlock->duration_seconds / 3600);
                            $user->time_in_work_leave_minutes += floor(($getWorkBlock->duration_seconds % 3600) / 60);
                            $user->time_in_work_leave_seconds += $getWorkBlock->duration_seconds % 60;
                            $user->time_in_work_total += floor($getWorkBlock->duration_seconds / 3600);
                            $user->time_in_work_total_minutes += floor(($getWorkBlock->duration_seconds % 3600) / 60);
                            $user->time_in_work_total_seconds += $getWorkBlock->duration_seconds % 60;
                        } else {
                            $non_working_days++;
                        }
                        $currentDate->addDay();
                    }

                    $user->time_in_work_hms_leave = sprintf('%02dh %02dmin %02ds', $user->time_in_work_leave, $user->time_in_work_leave_minutes, $user->time_in_work_leave_seconds);
                }

                $hours = floor($user->time_in_work / 3600);
                $minutes = floor(($user->time_in_work % 3600) / 60);
                $seconds = $user->time_in_work % 60;
                $user->time_in_work_total += $hours;
                $user->time_in_work_total_minutes += $minutes;
                $user->time_in_work_total_seconds += $seconds;
                $user->time_in_work_hms = sprintf('%02dh %02dmin %02ds', $hours, $minutes, $seconds);

                $hoursExtra = floor($user->time_in_work_extra / 3600);
                $minutesExtra = floor(($user->time_in_work_extra % 3600) / 60);
                $secondsExtra = $user->time_in_work_extra % 60;
                $user->time_in_work_hms_extra = sprintf('%02dh %02dmin %02ds', $hoursExtra, $minutesExtra, $secondsExtra);

                $hoursUnder = floor($user->time_in_work_under / 3600);
                $minutesUnder = floor(($user->time_in_work_under % 3600) / 60);
                $secondsUnder = $user->time_in_work_under % 60;
                $user->time_in_work_hms_under = sprintf('%02dh %02dmin %02ds', $hoursUnder, $minutesUnder, $secondsUnder);

                $user->time_in_work_hms_planned = '00h';
                $hoursPlanned = floor($user->time_in_work_planned_var / 3600);
                $minutesPlanned = floor(($user->time_in_work_planned_var % 3600) / 60);
                $secondsPlanned = $user->time_in_work_planned_var % 60;
                $user->time_in_work_hms_planned = sprintf('%02dh %02dmin %02ds', $hoursPlanned, $minutesPlanned, $secondsPlanned);
                $user->time_in_work_hms_total = sprintf('%02dh %02dmin %02ds', $user->time_in_work_total, $user->time_in_work_total_minutes, $user->time_in_work_total_seconds);
            }
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
        $leaveService = new LeaveService();
        $calendar = new CalendarView();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->getByRole($request);

        foreach ($users as &$user) {
            $leaves = $leaveService->getByUserIdWithCutMonth($request, $user->id);
            $user->time_in_work = 0;
            $user->time_in_work_extra = 0;
            $user->time_in_work_under = 0;
            $user->time_in_work_planned = 0;
            $user->time_in_work_planned_var = 0;
            $user->time_in_work_leave = 0;
            $user->time_in_work_leave_minutes = 0;
            $user->time_in_work_leave_seconds = 0;
            $user->time_in_work_total = 0;
            $user->time_in_work_total_minutes = 0;
            $user->time_in_work_total_seconds = 0;
            $user->time_in_work_hms = '';
            $user->time_in_work_hms_extra = '';
            $user->time_in_work_hms_under = '';
            $user->time_in_work_hms_planned = '';
            $user->time_in_work_hms_leave = '';
            $user->time_in_work_hms_total = '';
            foreach ($dates as $date) {
                $totalDay = $workSessionRepository->getTotalOfDay($user->id, $date);
                $totalDayExtra = $workSessionRepository->getTotalOfDayExtra($user->id, $date);
                $totalDayUnder = $workSessionRepository->getTotalOfDayUnder($user->id, $date);
                $totalDayPlanned = $workSessionRepository->getTotalOfDayPlanned($user->id, $date);
                $totalDayPlannedVar = WorkBlock::where('user_id', $user->id)
                    ->whereDate('starts_at', Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d'))
                    ->first();

                $carbonDate = Carbon::createFromFormat('d.m.y', $date);
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

                if (!$isHoliday) {
                    $user->time_in_work_planned += $totalDayPlanned;
                    $user->time_in_work_planned_var += $totalDayPlannedVar->duration_seconds ?? 0;
                }
                $user->time_in_work += $totalDay;
                if ($user->overtime) {
                    if ($totalDayExtra > ($user->overtime_threshold * 60)) {
                        if ($user->overtime_task) {
                            if ($user->overtime_accept) {
                                $totalDayExtraWithTaskAccepted = $workSessionRepository->getTotalOfDayExtraWithTaskAccepted($user->id, $date);
                                $user->time_in_work_extra += $totalDayExtraWithTaskAccepted;
                                $user->time_in_work -= $totalDayExtra;
                                $user->time_in_work += $totalDayExtraWithTaskAccepted;
                            } else {
                                $totalDayExtraWithTask = $workSessionRepository->getTotalOfDayExtraWithTask($user->id, $date);
                                $user->time_in_work_extra += $totalDayExtraWithTask;
                                $user->time_in_work -= $totalDayExtra;
                                $user->time_in_work += $totalDayExtraWithTask;
                            }
                        } else {
                            $user->time_in_work_extra += $totalDayExtra;
                        }
                    } else {
                        $user->time_in_work_extra += 0;
                        $user->time_in_work -= $totalDayExtra;
                    }
                }
                $user->time_in_work_under += $totalDayUnder;
            }
            if ($user->working_hours_regular == 'stały planing') {

                $daysMap = [
                    'poniedziałek' => 1,
                    'wtorek' => 2,
                    'środa' => 3,
                    'czwartek' => 4,
                    'piątek' => 5,
                    'sobota' => 6,
                    'niedziela' => 7,
                ];

                $startWorkDay = $daysMap[$user->working_hours_start_day];
                $endWorkDay   = $daysMap[$user->working_hours_stop_day];

                foreach ($leaves as $leave) {
                    $targetStartDate = Carbon::parse($leave->start_date);
                    $targetEndDate   = Carbon::parse($leave->end_date);
                    $rangeStartDate  = Carbon::parse($request->session()->get('start_date'));
                    $rangeEndDate    = Carbon::parse($request->session()->get('end_date'));

                    // Przycięcie do zakresu
                    $effectiveStartDate = $targetStartDate->lessThan($rangeStartDate) ? $rangeStartDate : $targetStartDate;
                    $effectiveEndDate   = $targetEndDate->greaterThan($rangeEndDate) ? $rangeEndDate : $targetEndDate;

                    $leaveDays = 0;
                    $currentDate = $effectiveStartDate->copy();

                    while ($currentDate->lte($effectiveEndDate)) {
                        $dayOfWeek = $currentDate->dayOfWeekIso; // 1 (pon) – 7 (nd)

                        if ($dayOfWeek >= $startWorkDay && $dayOfWeek <= $endWorkDay) {
                            $leaveDays++;
                        }

                        $carbonDate = $currentDate->copy();
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
                        if ($isHoliday) {
                            $leaveDays--;
                        }

                        $currentDate->addDay();
                    }

                    $user->time_in_work_leave += $leaveDays * $user->working_hours_custom;
                    $user->time_in_work_total += $leaveDays * $user->working_hours_custom;
                    $user->time_in_work_hms_leave = sprintf('%02dh 00min 00s', $user->time_in_work_leave);
                }

                $hours = floor($user->time_in_work / 3600);
                $minutes = floor(($user->time_in_work % 3600) / 60);
                $seconds = $user->time_in_work % 60;
                $user->time_in_work_total += $hours;
                $user->time_in_work_total_minutes += $minutes;
                $user->time_in_work_total_seconds += $seconds;
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
                $user->time_in_work_hms_planned = sprintf('%02dh 00min 00s', $hoursPlanned);
                $user->time_in_work_hms_total = sprintf('%02dh %02dmin %02ds', $user->time_in_work_total, $user->time_in_work_total_minutes, $user->time_in_work_total_seconds);
            }

            if ($user->working_hours_regular == 'zmienny planing') {
                foreach ($leaves as $leave) {
                    $targetStartDate = Carbon::parse($leave->start_date);
                    $targetEndDate = Carbon::parse($leave->end_date);
                    $rageStartDate = Carbon::parse($request->session()->get('start_date'));
                    $rageEndDate = Carbon::parse($request->session()->get('end_date'));

                    // Ustal daty "efektywne" – przycięte do zakresu, jeśli potrzeba
                    $effectiveStartDate = $targetStartDate->lessThan($rageStartDate) ? $rageStartDate : $targetStartDate;
                    $effectiveEndDate = $targetEndDate->greaterThan($rageEndDate) ? $rageEndDate : $targetEndDate;

                    // Oblicz liczbę dni
                    $startDate = $effectiveStartDate->startOfDay();
                    $endDate   = $effectiveEndDate->endOfDay();

                    $currentDate = $startDate->copy();
                    $working_days = 0;
                    $non_working_days = 0;
                    $has_working_day = false;

                    while ($currentDate->lte($endDate)) {

                        // sprawdzamy czy w danym dniu istnieje jakikolwiek workBlock
                        $hasWorkBlock = WorkBlock::where('user_id', $leave->user_id)
                            ->whereDate('starts_at', $currentDate)
                            ->exists();
                        $getWorkBlock = WorkBlock::where('user_id', $leave->user_id)
                            ->whereDate('starts_at', $currentDate)
                            ->first();

                        if ($hasWorkBlock) {
                            $working_days++;
                            $user->time_in_work_leave += floor($getWorkBlock->duration_seconds / 3600);
                            $user->time_in_work_leave_minutes += floor(($getWorkBlock->duration_seconds % 3600) / 60);
                            $user->time_in_work_leave_seconds += $getWorkBlock->duration_seconds % 60;
                            $user->time_in_work_total += floor($getWorkBlock->duration_seconds / 3600);
                            $user->time_in_work_total_minutes += floor(($getWorkBlock->duration_seconds % 3600) / 60);
                            $user->time_in_work_total_seconds += $getWorkBlock->duration_seconds % 60;
                        } else {
                            $non_working_days++;
                        }
                        $currentDate->addDay();
                    }
                    $user->time_in_work_hms_leave = sprintf('%02dh %02dmin %02ds', $user->time_in_work_leave, $user->time_in_work_leave_minutes, $user->time_in_work_leave_seconds);
                }

                $hours = floor($user->time_in_work / 3600);
                $minutes = floor(($user->time_in_work % 3600) / 60);
                $seconds = $user->time_in_work % 60;
                $user->time_in_work_total += $hours;
                $user->time_in_work_total_minutes += $minutes;
                $user->time_in_work_total_seconds += $seconds;
                $user->time_in_work_hms = sprintf('%02dh %02dmin %02ds', $hours, $minutes, $seconds);

                $hoursExtra = floor($user->time_in_work_extra / 3600);
                $minutesExtra = floor(($user->time_in_work_extra % 3600) / 60);
                $secondsExtra = $user->time_in_work_extra % 60;
                $user->time_in_work_hms_extra = sprintf('%02dh %02dmin %02ds', $hoursExtra, $minutesExtra, $secondsExtra);

                $user->time_in_work_hms_planned = '00h';
                $hoursPlanned = floor($user->time_in_work_planned_var / 3600);
                $minutesPlanned = floor(($user->time_in_work_planned_var % 3600) / 60);
                $secondsPlanned = $user->time_in_work_planned_var % 60;
                $user->time_in_work_hms_planned = sprintf('%02dh %02dmin %02ds', $hoursPlanned, $minutesPlanned, $secondsPlanned);
                $user->time_in_work_hms_total = sprintf('%02dh %02dmin %02ds', $user->time_in_work_total, $user->time_in_work_total_minutes, $user->time_in_work_total_seconds);
            }
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
        $calendar = new CalendarView();
        $dates = $filterDateService->getRangeDateFilter($request);
        $users = $this->getByRole($request);


        foreach ($users as &$user) {
            $userDates = [];
            $userObjs = [];
            foreach ($dates as $date) {
                $hasEvent = $workSessionRepository->hasEventForUserOnDate($user->id, $date);
                $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($user->id, $date);
                $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->addDay()->format('d.m.y'));
                $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($user->id, \Carbon\Carbon::createFromFormat('d.m.y', $date)->subDays(1)->format('d.m.y'));
                $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($user->id, $date);
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $date);
                $leave = $workSessionRepository->hasLeave($user->id, $date);
                $leaveFirst = $workSessionRepository->getFirstLeave($user->id, $date);
                $work_obj = $workSessionRepository->getFirstRcp($user->id, $date);
                $work_obj_last = $workSessionRepository->getLastRcp($user->id, $date);

                if ($work_obj && $work_obj_last) {
                    if ($work_obj->id != $work_obj_last->id) {
                        $work_obj->eventStop = $work_obj_last->eventStop;
                        $work_obj->multi = true;
                    } else {
                        $work_obj->false = true;
                    }
                }
                //if ($user->public_holidays == true) {
                $carbonDate = Carbon::createFromFormat('d.m.y', $date);
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

                if ($status) {
                    $userDates[$date] = "progress";
                    $userObjs[$date] = $work_obj;
                } else if ($leave) {
                    $userDates[$date] = 'leave';
                    $userObjs[$date] = $leaveFirst;
                } else if ($hasEvent) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } else if ($hasStartEvent && $hasStopEvent) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $userDates[$date] = "work";
                    $userObjs[$date] = $work_obj;
                } else if ($isHoliday) {
                    $userDates[$date] = "holiday";
                } else if (!$hasEvent) {
                    $userDates[$date] = null;
                }
            }
            $user->dates = $userDates;
            $user->objs = $userObjs;
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
    /**
     * Zwraca użytkowników.
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function getUsersFromCompanyWorkBlock(): \Illuminate\Support\Collection
    {
        $userRepository = new UserRepository();
        return $userRepository->getByAdminWorkBlock();
    }
}
