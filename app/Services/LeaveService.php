<?php

namespace App\Services;

use App\Models\Leave;
use App\Models\User;
use App\Repositories\LeaveRepository;
use App\Repositories\WorkSessionRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveService
{
    /**
     * Zwraca wnioski dla użytkownika w zakresie dat.
     * 
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateByUserId(Request $request): \Illuminate\Pagination\LengthAwarePaginator
    {
        $leaveRepository = new LeaveRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        return $leaveRepository->paginateByUserId(10, $startDate, $endDate);
    }
    /**
     * Zwraca wnioski dla menadżera w zakresie dat.
     * 
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateByManagerId(Request $request): \Illuminate\Pagination\LengthAwarePaginator
    {
        $leaveRepository = new LeaveRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        return $leaveRepository->paginateByManagerId(10, $startDate, $endDate);
    }
    /**
     * Zwraca wnioski dla menadżera w stronie głównej
     * 
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMainByManagerId(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        $leaveRepository = new LeaveRepository();

        return $leaveRepository->getMainByManagerId();
    }
    /**
     * Zwraca wnioski dla użytkownika w stronie głównej
     * 
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMainByUserId(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        $leaveRepository = new LeaveRepository();

        return $leaveRepository->getMainByUserId();
    }
    /**
     * Zwraca liczbę wniosków dla użytkownika w zakresie dat.
     *
     * @param Request $request
     * @return int
     */
    public function countByUserId(Request $request): int
    {
        $leaveRepository = new LeaveRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        return $leaveRepository->countByUserId($startDate, $endDate);
    }
    /**
     * Zwraca wnioski dla użytkownika w zakresie dat.
     * 
     * @param Request $request
     * @param string|null $user_id
     */
    public function getByUserId(Request $request,  ?string $user_id = null)
    {
        if (is_null($user_id)) {
            $user_id = Auth::id();
        }
        $leaveRepository = new LeaveRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        return $leaveRepository->getByUserId($startDate, $endDate, $user_id);
    }
    public function getByUserIdWithCutMonth(Request $request,  ?string $user_id = null)
    {
        if (is_null($user_id)) {
            $user_id = Auth::id();
        }
        $leaveRepository = new LeaveRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        return $leaveRepository->getByUserIdWithCutMonth($startDate, $endDate, $user_id);
    }
    /**
     * Zwraca wnioski dla menadżera w zakresie dat.
     * 
     * @param Request $request
     */
    public function getByManagerId(Request $request)
    {
        $leaveRepository = new LeaveRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        return $leaveRepository->getByManagerId($startDate, $endDate);
    }
    public function getPlannedByUserAndDate(User $user, $date)
    {
        $leaveRepository = new LeaveRepository();
        $formattedDate = Carbon::createFromFormat('d.m.y', $date)->format('Y-m-d');
        return $leaveRepository->getPlannedByUserIdAndFormattedDate($user->id, $formattedDate);
    }
    public function getLeaveById(Leave $leave)
    {
        $leaveRepository = new LeaveRepository();
        return $leaveRepository->getLeaveById($leave);
    }
}
