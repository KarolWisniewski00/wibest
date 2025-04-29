<?php

namespace App\Repositories;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class LeaveRepository
{
    public function getPaginatedForCurrentUser(int $perPage = 10, ?string $startDate = null, ?string $endDate = null)
    {
        if ($this->isAdmin()) {
            return $this->getAllForCompanyPaginated($perPage, $startDate, $endDate);
        }

        return $this->getForLoggedUserPaginated($perPage, $startDate, $endDate);
    }
    public function getForLoggedUserPaginated(int $perPage, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Leave::where('user_id', Auth::id());

        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }

        return $query->orderBy('start_date', 'desc')->paginate($perPage);
    }

    private function getAllForCompanyPaginated(int $perPage, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Leave::where('company_id', Auth::user()->company_id)->where('manager_id', Auth::id());

        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }

        return $query->orderBy('start_date', 'desc')->paginate($perPage);
    }
    public function getAllForCompanyPaginatedCount(?string $startDate = null, ?string $endDate = null)
    {
        $query = Leave::where('company_id', Auth::user()->company_id)->where('manager_id', Auth::id())->where('status', 'oczekujące');

        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }

        return $query->count();
    }
    private function isAdmin(): bool
    {
        $user = User::where('id', auth()->id())->first();
        if ($user) {
            if ($user->role == 'admin') {
                return true;
            }elseif($user->role == 'menedżer'){
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    
}
