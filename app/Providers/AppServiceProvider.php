<?php

namespace App\Providers;

use App\Models\User;
use App\Models\WorkSession;
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
            $user_id = Auth::id();
            if($user_id === null) {
                return;
            }
            $company_id = User::find($user_id)->company_id;
            $work_sessions_logged_user = WorkSession::where('company_id', $company_id)
                ->where('user_id', auth()->id())
                ->orderBy('updated_at', 'desc')  // Sortowanie malejąco
                ->get();
            $view->with('user_id', $user_id)->with('company_id', $company_id)->with('work_sessions_logged_user', $work_sessions_logged_user);
        });
    }
}
