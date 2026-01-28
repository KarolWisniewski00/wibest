<?php

namespace App\Repositories;

use App\Models\Leave;
use App\Models\PlannedLeave;
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
        $query = Leave::with('manager')->where('user_id', Auth::id())->with('user');
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
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'właściciel') {
            $query = Leave::with('user')
                ->where('company_id', Auth::user()->company_id);
        } elseif (Auth::user()->role == 'menedżer') {
            $query = Leave::with('user')
                ->where('company_id', Auth::user()->company_id)
                ->whereHas('user', function ($q) {
                    $q->where('supervisor_id', Auth::user()->supervisor_id);
                });
        } else {
            $query = Leave::with('user')
                ->where('manager_id', Auth::id());
        }
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
     * Zwraca pierwsze kilka wniosków dla użytkownika.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMainByUserId()
    {
        $query = Leave::with('user')->where('user_id', Auth::id())->where('status', 'oczekujące');
        return $query->orderBy('start_date', 'desc')->take(5)->get();
    }
    /**
     * Zwraca wnioski dla użytkownika w zakresie dat.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByUserId(?string $startDate = null, ?string $endDate = null, ?string $user_id = null, $request = null)
    {
        if (is_null($user_id)) {
            $user_id = Auth::id();
        }
        $query = Leave::with('manager')->where('user_id', $user_id);
        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }
        // Filtrowanie po nazwie użytkownika, jeśli request istnieje i zawiera 'search'
        if ($request && $request->filled('search')) {
            $search = $request->input('search');

            // Użycie whereHas do filtrowania na podstawie kolumny w powiązanym modelu (User)
            $query->whereHas('manager', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }
        return $query->orderBy('start_date', 'desc')->get();
    }
    public function getByUserIdWithCutMonth(?string $startDate = null, ?string $endDate = null, ?string $user_id = null)
    {
        if (is_null($user_id)) {
            $user_id = Auth::id();
        }

        $query = Leave::with('manager')
            ->where('user_id', $user_id)
            ->whereIn('status', ['zaakceptowane', 'zrealizowane']);

        if ($startDate && $endDate) {
            // Szukamy urlopów, które nachodzą na zakres dat
            $query->where(function ($q) use ($startDate, $endDate) {
                $q->whereDate('start_date', '<=', Carbon::parse($endDate))
                    ->whereDate('end_date', '>=', Carbon::parse($startDate));
            });
        } elseif ($startDate) {
            $query->whereDate('end_date', '>=', Carbon::parse($startDate));
        } elseif ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }

        return $query->orderBy('start_date', 'desc')->get();
    }
    /**
     * Zwraca wnioski do rozpatrzenia dla użytkownika w zakresie dat.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByManagerId(?string $startDate = null, ?string $endDate = null, $request = null)
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'właściciel') {
            $query = Leave::with('user')
                ->where('company_id', Auth::user()->company_id);
        } elseif (Auth::user()->role == 'menedżer') {
            $query = Leave::with('user')
                ->where('company_id', Auth::user()->company_id)
                ->whereHas('user', function ($q) {
                    $q->where('supervisor_id', Auth::user()->supervisor_id);
                });
        } else {
            $query = Leave::with('user')
                ->where('manager_id', Auth::id());
        }
        if ($startDate) {
            $query->whereDate('start_date', '>=', Carbon::parse($startDate));
        }

        if ($endDate) {
            $query->whereDate('start_date', '<=', Carbon::parse($endDate));
        }
        // Filtrowanie po nazwie użytkownika, jeśli request istnieje i zawiera 'search'
        if ($request && $request->filled('search')) {
            $search = $request->input('search');

            // Użycie whereHas do filtrowania na podstawie kolumny w powiązanym modelu (User)
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
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
    public function hasPlannedLeaveToday(int $userId, string $date): bool
    {
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return PlannedLeave::where('user_id', $userId)
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->exists();
    }
    public function getPlannedByUserIdAndFormattedDate($userId, $formattedDate)
    {
        return PlannedLeave::where('user_id', $userId)
            ->whereDate('start_date', '<=', $formattedDate)
            ->whereDate('end_date', '>=', $formattedDate)
            ->first();
    }
    public function getLeaveById(Leave $leave)
    {
        return Leave::where('id', $leave->id)
            ->first();
    }
}
