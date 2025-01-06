<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ustawienie zmiennych `$company` i `$role` dostępnych we wszystkich widokach
        View::composer('*', function ($view) {
            if (Auth::check()) {
            $view->with('company', Auth::user()->company);
            $view->with('role', Auth::user()->role);
            }
        });
    }
}
