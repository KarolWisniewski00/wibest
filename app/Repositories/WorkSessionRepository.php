<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\Leave;
use App\Models\User;
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
            ->where('status', 'zaakceptowane')
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
    public function getFirstLeave(int $userId, string $date): ?Leave
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return Leave::where('user_id', $userId)
            ->where('status', 'zaakceptowane')
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->first();
    }
}
