<?php

namespace App\Services;

use App\Repositories\LeaveRepository;
use App\Repositories\WorkSessionRepository;
use Illuminate\Http\Request;

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
     */
    public function getByUserId(Request $request)
    {
        $leaveRepository = new LeaveRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        return $leaveRepository->getByUserId($startDate, $endDate);
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
}
