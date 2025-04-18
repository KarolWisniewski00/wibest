<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\User;
use App\Models\WorkSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class WorkSessionRepository
{
    public function getPaginatedForCurrentUser(int $perPage = 10)
    {
        if ($this->isAdmin()) {
            return $this->getAllForCompanyPaginated($perPage);
        }

        return $this->getForLoggedUserPaginated($perPage);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return WorkSession::all();
    }

    public function getCurrentMonthString(): string
    {
        return Carbon::now()->translatedFormat('F Y');
    }

    private function getForLoggedUserPaginated(int $perPage)
    {
        return WorkSession::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    private function getAllForCompanyPaginated(int $perPage)
    {
        return WorkSession::where('company_id', Auth::user()->company_id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    private function isAdmin(): bool
    {
        $user = User::where('id', auth()->id())->first();
        if ($user) {
            if ($user->role == 'admin') {
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
}
