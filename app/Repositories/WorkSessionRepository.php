<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\Leave;
use App\Models\PlannedLeave;
use App\Models\User;
use App\Models\WorkBlock;
use App\Models\WorkSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class WorkSessionRepository
{
    /**
     * Zwraca sesje pracy dla użytkownika w zakresie dat.
     *
     * @param int $perPage
     * @param string|null $startDate
     * @param string|null $endDate
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateByUserWithFilterDate(int $perPage, ?string $startDate = null, ?string $endDate = null): \Illuminate\Pagination\LengthAwarePaginator
    {
        $query = WorkSession::where('work_sessions.user_id', Auth::id())
            ->whereHas('eventStart', function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('time', '>=', $startDate);
                }

                if ($endDate) {
                    $query->whereDate('time', '<=', $endDate);
                }
            });

        return $query->select('work_sessions.*')
            ->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
            ->orderBy('event_start.time', 'desc')
            ->paginate($perPage);
    }
    /**
     * Zwraca sesje pracy dla admina w zakresie dat.
     *
     * @param int $perPage
     * @param string|null $startDate
     * @param string|null $endDate
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateByAdminWithFilterDate(int $perPage, ?string $startDate = null, ?string $endDate = null): \Illuminate\Pagination\LengthAwarePaginator
    {
        $query = WorkSession::where('work_sessions.company_id', Auth::user()->company_id)
            ->whereHas('eventStart', function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('time', '>=', $startDate);
                }

                if ($endDate) {
                    $query->whereDate('time', '<=', $endDate);
                }
            });

        return $query->select('work_sessions.*')
            ->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
            ->orderBy('event_start.time', 'desc')
            ->paginate($perPage);
    }
    public function paginateByManagerWithFilterDate(int $perPage, ?string $startDate = null, ?string $endDate = null)
    {
        $query = WorkSession::with('user')
            ->where('work_sessions.company_id', Auth::user()->company_id)
            ->whereHas('eventStart', function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('time', '>=', $startDate);
                }

                if ($endDate) {
                    $query->whereDate('time', '<=', $endDate);
                }
            })->whereHas('user', function ($q) {
                $q->where('supervisor_id', Auth::user()->supervisor_id);
            });

        return $query->select('work_sessions.*')
            ->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
            ->orderBy('event_start.time', 'desc')
            ->paginate($perPage);
    }
    public function paginateByFilterUserIdWithFilterDate(int $perPage, int $filterUserId, ?string $startDate = null, ?string $endDate = null)
    {
        $query = WorkSession::where('work_sessions.user_id', $filterUserId)
            ->whereHas('eventStart', function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('time', '>=', $startDate);
                }

                if ($endDate) {
                    $query->whereDate('time', '<=', $endDate);
                }
            });

        return $query->select('work_sessions.*')
            ->join('events as event_start', 'work_sessions.event_start_id', '=', 'event_start.id')
            ->orderBy('event_start.time', 'desc')
            ->paginate($perPage);
    }
    /**
     * Tworzy nową sesję pracy i zdarzenia start i stop.
     *
     * @param int $perPage
     * @param string|null $startDate
     * @param string|null $endDate
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function storeWithEvents(int $userId, string $startTime, string $endTime): WorkSession
    {
        $eventStart = Event::create([
            'time' => $startTime,
            'location' => '',
            'device' => '',
            'event_type' => 'start',
            'user_id' => $userId,
            'company_id' => Auth::user()->company_id,
            'created_user_id' => Auth::id(),
        ]);

        $eventStop = Event::create([
            'time' => $endTime,
            'location' => '',
            'device' => '',
            'event_type' => 'stop',
            'user_id' => $userId,
            'company_id' => Auth::user()->company_id,
            'created_user_id' => Auth::id(),
        ]);

        $timeInWork = Carbon::parse($startTime)
            ->diff(Carbon::parse($endTime))
            ->format('%H:%I:%S');

        return WorkSession::create([
            'company_id' => Auth::user()->company_id,
            'user_id' => $userId,
            'created_user_id' => Auth::id(),
            'event_start_id' => $eventStart->id,
            'event_stop_id' => $eventStop->id,
            'status' => 'Praca zakończona',
            'time_in_work' => $timeInWork,
        ]);
    }

    /**
     * Zwraca zaktualizowaną sesję pracy.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function updateWithEvents(WorkSession $workSession, int $userId, string $startTime, string $endTime): WorkSession
    {
        $eventStart = Event::findOrFail($workSession->event_start_id);
        $eventStop = Event::findOrFail($workSession->event_stop_id);
        $timeInWork = Carbon::parse($startTime)->diff(Carbon::parse($endTime))->format('%H:%I:%S');

        $eventStart->update([
            'time' => $startTime,
            'user_id' => $userId,
        ]);
        $eventStop->update([
            'time' => $endTime,
            'user_id' => $userId,
        ]);
        $workSession->update([
            'user_id' => $userId,
            'time_in_work' => $timeInWork,
        ]);

        return $workSession;
    }
    public function hasEventForUserOnDate(int $userId, string $date): bool
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        return WorkSession::where('user_id', $userId)
            ->whereHas('eventStart', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })
            ->whereHas('eventStop', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })
            ->exists();
    }
    public function hasStartEventForUserOnDate(int $userId, string $date): bool
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        return Event::where('user_id', $userId)
            ->where('event_type', 'start')
            ->whereDate('time', $formattedDate)
            ->exists();
    }
    public function hasStopEventForUserOnDate(int $userId, string $date): bool
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        return Event::where('user_id', $userId)
            ->where('event_type', 'stop')
            ->whereDate('time', $formattedDate)
            ->exists();
    }

    public function hasInProgressEventForUserOnDate(int $userId, string $date): bool
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        return WorkSession::where('user_id', $userId)
            ->where('status', 'W trakcie pracy')
            ->whereHas('eventStart', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })
            ->exists();
    }
    public function hasLeave(int $userId, string $date): bool
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return Leave::where('user_id', $userId)
            ->whereIn('status', ['zaakceptowane', 'zrealizowane'])
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->exists();
    }
    public function hasPlannedLeave(int $userId, string $date): bool
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return PlannedLeave::where('user_id', $userId)
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->exists();
    }
    /**
     * Zwraca wniosek urlopowy dla użytkownika na dany dzień.
     *
     * @param int $userId
     * @param string $date
     * @return Leave|null
     */
    public function getFirstPlannedLeave(int $userId, string $date): ?PlannedLeave
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return PlannedLeave::where('user_id', $userId)
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->first();
    }
    /**
     * Zwraca urlop planowany dla użytkownika na dany dzień.
     *
     * @param int $userId
     * @param string $date
     * @return Leave|null
     */
    public function getFirstLeave(int $userId, string $date): ?Leave
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return Leave::where('user_id', $userId)
            ->whereIn('status', ['zaakceptowane', 'zrealizowane'])
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->first();
    }
    /**
     * Zwraca rcp dla użytkownika na dany dzień.
     *
     * @param int $userId
     * @param string $date
     * @return WorkSession|null
     */
    public function getFirstRcp(int $userId, string $date): ?WorkSession
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return WorkSession::where('user_id', $userId)
            ->where(function ($query) use ($formattedDate) {
                $query->whereHas('eventStart', function ($q) use ($formattedDate) {
                    $q->whereDate('time', $formattedDate);
                })
                    ->orWhereHas('eventStop', function ($q) use ($formattedDate) {
                        $q->whereDate('time', $formattedDate);
                    });
            })
            ->first();
    }
    public function getLastRcp(int $userId, string $date)
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return WorkSession::where('user_id', $userId)
            ->where(function ($query) use ($formattedDate) {
                $query->whereHas('eventStart', function ($q) use ($formattedDate) {
                    $q->whereDate('time', $formattedDate);
                })
                    ->orWhereHas('eventStop', function ($q) use ($formattedDate) {
                        $q->whereDate('time', $formattedDate);
                    });
            })
            ->orderByDesc('id')
            ->first();
    }
    /**
     * Zwraca sume czasu pracy z dnia
     */
    public function getTotalOfDay(int $userId, string $date): int
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        $workSessions = WorkSession::where('user_id', $userId)
            ->where('status', 'Praca zakończona')
            ->whereHas('eventStart', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })->get();
        $total = 0;
        foreach ($workSessions as $key => $value) {
            list($hours, $minutes, $seconds) = explode(':', $value->time_in_work);
            $seconds = ((int)$hours * 3600) + ((int)$minutes * 60) + (int)$seconds;
            $total += $seconds;
        }
        return $total;
    }
    /**
     * Zwraca sume czasu nadgodzin pracy z dnia
     */
    public function getTotalOfDayExtra(int $userId, string $date): int
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        $user = User::findOrFail($userId);
        if ($user->working_hours_regular == 'zmienny planing') {
            $workBlock = WorkBlock::where('user_id', $userId)
                ->where('company_id', $user->company_id)
                ->whereDate('starts_at', $formattedDate)
                ->first();
            if ($workBlock && $workBlock->duration_seconds) {
                $workingSeconds = (int)$workBlock->duration_seconds;
            } else {
                $workingSeconds = 0;
            }
        } else {
            if (!$user->working_hours_custom) {
                return 0;
            }
            $daysOfWeek = [
                'monday' => 'poniedziałek',
                'tuesday' => 'wtorek',
                'wednesday' => 'środa',
                'thursday' => 'czwartek',
                'friday' => 'piątek',
                'saturday' => 'sobota',
                'sunday' => 'niedziela',
            ];
            // Pobranie dnia tygodnia po angielsku
            $dayEnglish = strtolower(Carbon::createFromFormat('d.m.y', $date)->format('l')); // np. 'monday'

            // Zamiana na polski
            $dayPolish = $daysOfWeek[$dayEnglish];
            $startDay = $user->working_hours_start_day; // np. "poniedziałek"
            $stopDay  = $user->working_hours_stop_day;  // np. "piątek"

            // Mapowanie dni tygodnia na liczby (poniedziałek = 0)
            $daysMap = [
                'poniedziałek' => 0,
                'wtorek'      => 1,
                'środa'       => 2,
                'czwartek'    => 3,
                'piątek'      => 4,
                'sobota'      => 5,
                'niedziela'   => 6,
            ];

            // Zamiana na liczby
            $dayNum   = $daysMap[$dayPolish];
            $startNum = $daysMap[$startDay];
            $stopNum  = $daysMap[$stopDay];

            // Sprawdzenie, czy dzień jest w przedziale
            $inRange = false;

            if ($startNum <= $stopNum) {
                // np. poniedziałek - piątek
                $inRange = ($dayNum >= $startNum && $dayNum <= $stopNum);
            } else {
                // np. piątek - wtorek (cykliczne)
                $inRange = ($dayNum >= $startNum || $dayNum <= $stopNum);
            }

            if ($inRange) {
                $workingSeconds = (int)$user->working_hours_custom * 3600;
            } else {
                $workingSeconds = 0;
            }
        }

        $workSessions = WorkSession::where('user_id', $userId)
            ->where('status', 'Praca zakończona')
            ->whereHas('eventStart', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })->get();

        $total = 0;
        foreach ($workSessions as $value) {
            list($hours, $minutes, $seconds) = explode(':', $value->time_in_work);
            $sessionSeconds = ((int)$hours * 3600) + ((int)$minutes * 60) + (int)$seconds;
            $total += $sessionSeconds;
        }

        $extra = $total - $workingSeconds;
        return $extra > 0 ? $extra : 0;
    }
    public function getTotalOfDayExtraWithTask(int $userId, string $date)
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        $user = User::findOrFail($userId);
        if ($user->working_hours_regular == 'zmienny planing') {
            $workBlock = WorkBlock::where('user_id', $userId)
                ->where('company_id', $user->company_id)
                ->whereDate('starts_at', $formattedDate)
                ->first();
            if ($workBlock && $workBlock->duration_seconds) {
                $workingSeconds = (int)$workBlock->duration_seconds;
            } else {
                $workingSeconds = 0;
            }
        } else {
            if (!$user->working_hours_custom) {
                return 0;
            }
            $daysOfWeek = [
                'monday' => 'poniedziałek',
                'tuesday' => 'wtorek',
                'wednesday' => 'środa',
                'thursday' => 'czwartek',
                'friday' => 'piątek',
                'saturday' => 'sobota',
                'sunday' => 'niedziela',
            ];
            // Pobranie dnia tygodnia po angielsku
            $dayEnglish = strtolower(Carbon::createFromFormat('d.m.y', $date)->format('l')); // np. 'monday'

            // Zamiana na polski
            $dayPolish = $daysOfWeek[$dayEnglish];
            $startDay = $user->working_hours_start_day; // np. "poniedziałek"
            $stopDay  = $user->working_hours_stop_day;  // np. "piątek"

            // Mapowanie dni tygodnia na liczby (poniedziałek = 0)
            $daysMap = [
                'poniedziałek' => 0,
                'wtorek'      => 1,
                'środa'       => 2,
                'czwartek'    => 3,
                'piątek'      => 4,
                'sobota'      => 5,
                'niedziela'   => 6,
            ];

            // Zamiana na liczby
            $dayNum   = $daysMap[$dayPolish];
            $startNum = $daysMap[$startDay];
            $stopNum  = $daysMap[$stopDay];

            // Sprawdzenie, czy dzień jest w przedziale
            $inRange = false;

            if ($startNum <= $stopNum) {
                // np. poniedziałek - piątek
                $inRange = ($dayNum >= $startNum && $dayNum <= $stopNum);
            } else {
                // np. piątek - wtorek (cykliczne)
                $inRange = ($dayNum >= $startNum || $dayNum <= $stopNum);
            }

            if ($inRange) {
                $workingSeconds = (int)$user->working_hours_custom * 3600;
            } else {
                $workingSeconds = 0;
            }
        }

        $workSessions = WorkSession::where('user_id', $userId)
            ->where('status', 'Praca zakończona')
            ->whereHas('eventStart', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })->get();

        $total = 0;
        foreach ($workSessions as $value) {
            list($hours, $minutes, $seconds) = explode(':', $value->time_in_work);
            $sessionSeconds = ((int)$hours * 3600) + ((int)$minutes * 60) + (int)$seconds;
            $total += $sessionSeconds;
            if ($total > $workingSeconds) {
                if (!$value->task_id) {
                    $total -= $sessionSeconds;
                }
            }
        }

        $extra = $total - $workingSeconds;
        return $extra > 0 ? $extra : 0;
    }
    public function getTotalOfDayExtraWithTaskAccepted(int $userId, string $date)
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        $user = User::findOrFail($userId);
        if ($user->working_hours_regular == 'zmienny planing') {
            $workBlock = WorkBlock::where('user_id', $userId)
                ->where('company_id', $user->company_id)
                ->whereDate('starts_at', $formattedDate)
                ->first();
            if ($workBlock && $workBlock->duration_seconds) {
                $workingSeconds = (int)$workBlock->duration_seconds;
            } else {
                $workingSeconds = 0;
            }
        } else {
            if (!$user->working_hours_custom) {
                return 0;
            }
            $daysOfWeek = [
                'monday' => 'poniedziałek',
                'tuesday' => 'wtorek',
                'wednesday' => 'środa',
                'thursday' => 'czwartek',
                'friday' => 'piątek',
                'saturday' => 'sobota',
                'sunday' => 'niedziela',
            ];
            // Pobranie dnia tygodnia po angielsku
            $dayEnglish = strtolower(Carbon::createFromFormat('d.m.y', $date)->format('l')); // np. 'monday'

            // Zamiana na polski
            $dayPolish = $daysOfWeek[$dayEnglish];
            $startDay = $user->working_hours_start_day; // np. "poniedziałek"
            $stopDay  = $user->working_hours_stop_day;  // np. "piątek"

            // Mapowanie dni tygodnia na liczby (poniedziałek = 0)
            $daysMap = [
                'poniedziałek' => 0,
                'wtorek'      => 1,
                'środa'       => 2,
                'czwartek'    => 3,
                'piątek'      => 4,
                'sobota'      => 5,
                'niedziela'   => 6,
            ];

            // Zamiana na liczby
            $dayNum   = $daysMap[$dayPolish];
            $startNum = $daysMap[$startDay];
            $stopNum  = $daysMap[$stopDay];

            // Sprawdzenie, czy dzień jest w przedziale
            $inRange = false;

            if ($startNum <= $stopNum) {
                // np. poniedziałek - piątek
                $inRange = ($dayNum >= $startNum && $dayNum <= $stopNum);
            } else {
                // np. piątek - wtorek (cykliczne)
                $inRange = ($dayNum >= $startNum || $dayNum <= $stopNum);
            }

            if ($inRange) {
                $workingSeconds = (int)$user->working_hours_custom * 3600;
            } else {
                $workingSeconds = 0;
            }
        }

        $workSessions = WorkSession::where('user_id', $userId)
            ->where('status', 'Praca zakończona')
            ->whereHas('eventStart', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })->get();

        $total = 0;
        foreach ($workSessions as $value) {
            list($hours, $minutes, $seconds) = explode(':', $value->time_in_work);
            $sessionSeconds = ((int)$hours * 3600) + ((int)$minutes * 60) + (int)$seconds;
            $total += $sessionSeconds;
            if ($total > $workingSeconds) {
                if (!$value->task_id) {
                    // brak zadania, odejmujemy czas
                    $total -= $sessionSeconds;
                } else {
                    if ($value->task->status == 'zaakceptowane') {
                        // zadanie zaakceptowane, liczymy czas
                    } elseif ($value->task->status == null) {
                        // zadanie zaakceptowane, liczymy czas
                    } else {
                        // zadanie niezaakceptowane, odejmujemy czas
                        $total -= $sessionSeconds;
                    }
                }
            }
        }

        $extra = $total - $workingSeconds;
        return $extra > 0 ? $extra : 0;
    }
    /**
     * Zwraca sumę czasu niedogodzin pracy z dnia (brak normy).
     */
    public function getTotalOfDayUnder(int $userId, string $date): int
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');

        $user = User::findOrFail($userId);
        if ($user->working_hours_regular == 'zmienny planing') {
            $workBlock = WorkBlock::where('user_id', $userId)
                ->where('company_id', $user->company_id)
                ->whereDate('starts_at', $formattedDate)
                ->first();
            if ($workBlock && $workBlock->duration_seconds) {
                $workingSeconds = (int)$workBlock->duration_seconds;
            } else {
                $workingSeconds = 0;
            }
        } else {
            if (!$user->working_hours_custom) {
                return 0;
            }
            $daysOfWeek = [
                'monday' => 'poniedziałek',
                'tuesday' => 'wtorek',
                'wednesday' => 'środa',
                'thursday' => 'czwartek',
                'friday' => 'piątek',
                'saturday' => 'sobota',
                'sunday' => 'niedziela',
            ];
            // Pobranie dnia tygodnia po angielsku
            $dayEnglish = strtolower(Carbon::createFromFormat('d.m.y', $date)->format('l')); // np. 'monday'

            // Zamiana na polski
            $dayPolish = $daysOfWeek[$dayEnglish];
            $startDay = $user->working_hours_start_day; // np. "poniedziałek"
            $stopDay  = $user->working_hours_stop_day;  // np. "piątek"

            // Mapowanie dni tygodnia na liczby (poniedziałek = 0)
            $daysMap = [
                'poniedziałek' => 0,
                'wtorek'      => 1,
                'środa'       => 2,
                'czwartek'    => 3,
                'piątek'      => 4,
                'sobota'      => 5,
                'niedziela'   => 6,
            ];

            // Zamiana na liczby
            $dayNum   = $daysMap[$dayPolish];
            $startNum = $daysMap[$startDay];
            $stopNum  = $daysMap[$stopDay];

            // Sprawdzenie, czy dzień jest w przedziale
            $inRange = false;

            if ($startNum <= $stopNum) {
                // np. poniedziałek - piątek
                $inRange = ($dayNum >= $startNum && $dayNum <= $stopNum);
            } else {
                // np. piątek - wtorek (cykliczne)
                $inRange = ($dayNum >= $startNum || $dayNum <= $stopNum);
            }

            if ($inRange) {
                $workingSeconds = (int)$user->working_hours_custom * 3600;
            } else {
                $workingSeconds = 0;
            }
        }

        $workSessions = WorkSession::where('user_id', $userId)
            ->where('status', 'Praca zakończona')
            ->whereHas('eventStart', function ($query) use ($formattedDate) {
                $query->whereDate('time', $formattedDate);
            })->get();

        $total = 0;
        foreach ($workSessions as $value) {
            list($hours, $minutes, $seconds) = explode(':', $value->time_in_work);
            $sessionSeconds = ((int)$hours * 3600) + ((int)$minutes * 60) + (int)$seconds;
            $total += $sessionSeconds;
        }

        if ($workingSeconds > $total) {
            if ($workingSeconds - $total != $workingSeconds) {
                return $workingSeconds - $total;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    /**
     * Zwraca sumę czasu niedogodzin pracy z dnia (brak normy).
     */
    public function getTotalOfDayPlanned(int $userId, string $date): int
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        $user = User::findOrFail($userId);
        if (!$user->working_hours_custom) {
            return 0;
        }

        // Mapowanie polskich dni na numery ISO (1 = pon, 7 = niedziela)
        $daysMap = [
            'poniedziałek' => 1,
            'wtorek'       => 2,
            'środa'        => 3,
            'czwartek'     => 4,
            'piątek'       => 5,
            'sobota'       => 6,
            'niedziela'    => 7,
        ];

        $startDay = $daysMap[$user->working_hours_start_day] ?? null;
        $stopDay = $daysMap[$user->working_hours_stop_day] ?? null;

        if (!$startDay || !$stopDay) {
            // Niepoprawne dane w bazie
            return 0;
        }

        $dateDay = Carbon::parse($formattedDate)->dayOfWeekIso;

        // Sprawdzamy przedział (przechodzący lub nie przez koniec tygodnia)
        if ($startDay <= $stopDay) {
            // np. Poniedziałek - Piątek
            $isInRange = ($dateDay >= $startDay && $dateDay <= $stopDay);
        } else {
            // przedział przechodzi przez koniec tygodnia, np. Piątek - Wtorek
            $isInRange = ($dateDay >= $startDay || $dateDay <= $stopDay);
        }

        if ($isInRange) {
            return (int)$user->working_hours_custom * 3600;
        }

        return 0;
    }
}
