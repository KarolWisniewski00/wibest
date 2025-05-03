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
    /**
     * Zwraca liczbę wniosków dla użytkownika w zakresie dat.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @return int
     */
    public function countByUserId(?string $startDate = null, ?string $endDate = null)
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
    /**
     * Zwraca paginowane wnioski dla użytkownika w zakresie dat.
     *
     * @param int $perPage
     * @param string|null $startDate
     * @param string|null $endDate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateByUserId(int $perPage, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Leave::with('manager')->where('user_id', Auth::id());
        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }
        return $query->orderBy('start_date', 'desc')->paginate($perPage);
    }
    /**
     * Zwraca paginowane wnioski dla menadżera w zakresie dat.
     *
     * @param int $perPage
     * @param string|null $startDate
     * @param string|null $endDate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateByManagerId(int $perPage, ?string $startDate = null, ?string $endDate = null)
    {
        $query = Leave::with('user')->where('manager_id', Auth::id());
        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }
        return $query->orderBy('start_date', 'desc')->paginate($perPage);
    }
    /**
     * Zwraca pierwsze kilka wniosków dla menadżera.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMainByManagerId()
    {
        $query = Leave::with('user')->where('manager_id', Auth::id())->where('status', 'oczekujące');
        return $query->orderBy('start_date', 'desc')->take(5)->get();
    }
    /**
     * Zwraca wnioski dla użytkownika w zakresie dat.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByUserId(?string $startDate = null, ?string $endDate = null)
    {
        $query = Leave::with('manager')->where('user_id', Auth::id());
        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }
        return $query->orderBy('start_date', 'desc')->get();
    }
    /**
     * Zwraca wnioski do rozpatrzenia dla użytkownika w zakresie dat.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByManagerId(?string $startDate = null, ?string $endDate = null)
    {
        $query = Leave::with('user')->where('manager_id', Auth::id());
        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }
        return $query->orderBy('start_date', 'desc')->get();
    }
    private function isAdmin(): bool
    {
        $user = User::where('id', auth()->id())->first();
        if ($user) {
            if ($user->role == 'admin') {
                return true;
            } elseif ($user->role == 'menedżer') {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
