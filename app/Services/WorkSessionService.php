<?php

namespace App\Services;

use App\Models\WorkSession;
use App\Repositories\WorkSessionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkSessionService
{

    /**
     * Zwraca sesje pracy w zależności od roli użytkownika w zakresie dat Date Filter.
     *
     * @param Request $request
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginatedByRoleWithFilterDate(Request $request): \Illuminate\Pagination\LengthAwarePaginator
    {
        $workSessionRepository = new WorkSessionRepository();
        $startDate = $request->session()->get('start_date');
        $endDate = $request->session()->get('end_date');

        switch (Auth::user()->role) {
            case 'admin':
                return $workSessionRepository->paginateByAdminWithFilterDate(10, $startDate, $endDate);
                break;
            case 'menedżer':
                return $workSessionRepository->paginateByAdminWithFilterDate(10, $startDate, $endDate);
                break;
            case 'kierownik':
                return $workSessionRepository->paginateByUserWithFilterDate(10, $startDate, $endDate);
                break;
            case 'użytkownik':
                return $workSessionRepository->paginateByUserWithFilterDate(10, $startDate, $endDate);
                break;
            default:
                return $workSessionRepository->paginateByUserWithFilterDate(10, $startDate, $endDate);
                break;
        }
        return $workSessionRepository->paginateByUserWithFilterDate(10, $startDate, $endDate);
    }
    /**
     * Tworzy sesję pracy z wydarzeniami.
     *
     * @param Request $request
     */
    public function storeWithEvents(int $userId, string $startTime, string $endTime)
    {
        $workSessionRepository = new WorkSessionRepository();
        return $workSessionRepository->storeWithEvents($userId, $startTime, $endTime);
    }
    /**
     * Aktualizuje sesję pracy z wydarzeniami.
     *
     * @param Request $request
     */
    public function updateWithEvents(WorkSession $workSession, int $userId, string $startTime, string $endTime)
    {
        $workSessionRepository = new WorkSessionRepository();
        return $workSessionRepository->updateWithEvents($workSession, $userId, $startTime, $endTime);
    }
}
