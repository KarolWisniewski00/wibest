<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class EventRepository
{
    public function getEventsForCurrentUserPaginated(int $perPage = 15)
    {
        if ($this->isAdmin()) {
            return $this->getAllCompanyEvents($perPage);
        }

        return $this->getUserEvents($perPage);
    }

    public function getAllEvents()
    {
        return Event::all(); // to może być do wykresów/statystyk, więc zostawiamy bez paginacji
    }

    public function getCurrentMonthString(): string
    {
        return Carbon::now()->translatedFormat('F Y');
    }

    private function getUserEvents(int $perPage)
    {
        return Event::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate($perPage);
    }

    private function getAllCompanyEvents(int $perPage)
    {
        $companyId = Auth::user()->company_id;
        return Event::where('company_id', $companyId)->orderBy('created_at', 'desc')->paginate($perPage);
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
}
