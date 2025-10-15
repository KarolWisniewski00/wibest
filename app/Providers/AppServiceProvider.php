<?php

namespace App\Providers;

use App\Livewire\Calendar;
use App\Models\User;
use App\Models\WorkSession;
use App\Repositories\WorkSessionRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // jeśli użytkownik NIE jest zalogowany — zakończ działanie composera
            if (!Auth::check()) {
                return;
            }
            $liveWireCalendar = new Calendar();
            $holidays = $liveWireCalendar->getPublicHolidays(now()->year);

            $workSessionRepository = new WorkSessionRepository();
            $leave = $workSessionRepository->getFirstLeave(Auth::id(), Carbon::now()->format('d.m.y'));

            // Sprawdzenie czy to Nowy Rok lub Trzech Króli
            if (Carbon::now()->month == 1 && Carbon::now()->day == 1) {
                $isHoliday = true; // Nowy Rok
            } elseif (Carbon::now()->month == 1 && Carbon::now()->day == 6) {
                $isHoliday = true; // Trzech Króli
            } else {
                $isHoliday = $holidays->contains(Carbon::now()->format('Y-m-d'));
            }

            if ($leave) {
                $date = [
                    'date' => Carbon::now(),
                    'leave' => $leave->type,
                    'isHoliday' => $isHoliday,
                ];
            } else {
                $date = [
                    'date' => Carbon::now(),
                    'leave' => null,
                    'isHoliday' => $isHoliday,
                ];
            }
            $user_id = Auth::id();
            if ($user_id === null) {
                return;
            }
            $company_id = User::find($user_id)->company_id;
            $work_sessions_logged_user = WorkSession::where('company_id', $company_id)
                ->where('user_id', auth()->id())
                ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
                ->get();

            $view->with('user_id', $user_id)
                ->with('company_id', $company_id)
                ->with('work_sessions_logged_user', $work_sessions_logged_user)
                ->with('date', $date);
        });
    }
}
