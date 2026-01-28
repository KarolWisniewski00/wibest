<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class EventRepository
{
    public function getEventsForCurrentUserPaginated(int $perPage = 10, ?string $startDate = null, ?string $endDate = null)
    {
        if ($this->isAdmin()) {
            return $this->getAllCompanyEventsWithDateRange($perPage, $startDate, $endDate);
        }

        return $this->getUserEventsWithDateRange($perPage, $startDate, $endDate);
    }
    public function getEventsTasksForCurrentUserCount(?string $startDate = null, ?string $endDate = null)
    {
        if ($this->isAdmin()) {
            return $this->getAllCompanyEventsTasksWithDateRange($startDate, $endDate);
        }

        return $this->getUserEventsTasksWithDateRange($startDate, $endDate);
    }

    private function getUserEventsWithDateRange(int $perPage, ?string $startDate, ?string $endDate)
    {
        $query = Event::where('user_id', Auth::id());

        if ($startDate) {
            $query->whereDate('time', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('time', '<=', Carbon::parse($endDate));
        }

        return $query->orderBy('time', 'desc')->paginate($perPage);
    }
    private function getUserEventsTasksWithDateRange(string $startDate, ?string $endDate)
    {
        $query = Event::where('user_id', Auth::id());

        if ($startDate) {
            $query->whereDate('time', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('time', '<=', Carbon::parse($endDate));
        }
        $query->where('status', 'oczekujące');
        return $query->orderBy('time', 'desc')->get()->count();
    }

    private function getAllCompanyEventsWithDateRange(int $perPage, ?string $startDate, ?string $endDate)
    {
        $companyId = Auth::user()->company_id;
        $query = Event::where('company_id', $companyId);

        if ($startDate) {
            $query->whereDate('time', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('time', '<=', Carbon::parse($endDate));
        }

        return $query->orderBy('time', 'desc')->paginate($perPage);
    }
    private function getAllCompanyEventsTasksWithDateRange(?string $startDate, ?string $endDate)
    {
        $companyId = Auth::user()->company_id;
        $query = Event::where('company_id', $companyId);

        if ($startDate) {
            $query->whereDate('time', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('time', '<=', Carbon::parse($endDate));
        }
        $query->where('status', 'oczekujące');
        return $query->orderBy('time', 'desc')->get()->count();
    }

    private function isAdmin(): bool
    {
        $user = User::where('id', auth()->id())->first();
        if ($user) {
            if ($user->role == 'admin') {
                return true;
            } elseif ($user->role == 'menedżer') {
                return true;
            } elseif ($user->role == 'właściciel') {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
