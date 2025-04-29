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
    public function getPaginatedForCurrentUser(int $perPage = 10, ?string $startDate = null, ?string $endDate = null)
    {
        if ($this->isAdmin()) {
            return $this->getAllForCompanyPaginated($perPage, $startDate, $endDate);
        }

        return $this->getForLoggedUserPaginated($perPage, $startDate, $endDate);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return WorkSession::all();
    }

    private function getForLoggedUserPaginated(int $perPage, ?string $startDate = null, ?string $endDate = null)
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

    private function getAllForCompanyPaginated(int $perPage, ?string $startDate = null, ?string $endDate = null)
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

    private function isAdmin(): bool
    {
        $user = User::where('id', auth()->id())->first();
        if ($user) {
            if ($user->role == 'admin'  || $user->role == 'menedżer') {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    public function storeWithEvents(int $userId, string $startTime, string $endTime, int $createdUserId): WorkSession
    {
        $companyId = app(CompanyRepository::class)->getCompanyId();

        // Utwórz zdarzenia start i stop
        $eventStart = Event::create([
            'time' => $startTime,
            'location' => '',
            'device' => '',
            'event_type' => 'start',
            'user_id' => $userId,
            'company_id' => $companyId,
            'created_user_id' => $createdUserId,
        ]);

        $eventStop = Event::create([
            'time' => $endTime,
            'location' => '',
            'device' => '',
            'event_type' => 'stop',
            'user_id' => $userId,
            'company_id' => $companyId,
            'created_user_id' => $createdUserId,
        ]);

        // Oblicz czas pracy
        $timeInWork = Carbon::parse($startTime)->diff(Carbon::parse($endTime))->format('%H:%I:%S');

        // Utwórz sesję
        return WorkSession::create([
            'company_id' => $companyId,
            'user_id' => $userId,
            'created_user_id' => $createdUserId,
            'event_start_id' => $eventStart->id,
            'event_stop_id' => $eventStop->id,
            'status' => 'Praca zakończona',
            'time_in_work' => $timeInWork,
        ]);
    }

    public function updateWithEvents(WorkSession $workSession, int $userId, string $startTime, string $endTime): WorkSession
    {
        // Aktualizuj zdarzenia start i stop
        $eventStart = Event::findOrFail($workSession->event_start_id);
        $eventStart->update([
            'time' => $startTime,
            'user_id' => $userId,
        ]);

        $eventStop = Event::findOrFail($workSession->event_stop_id);
        $eventStop->update([
            'time' => $endTime,
            'user_id' => $userId,
        ]);

        // Oblicz czas pracy
        $timeInWork = Carbon::parse($startTime)->diff(Carbon::parse($endTime))->format('%H:%I:%S');

        // Aktualizuj sesję
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
}
