<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//NOT LOGGED IN
Route::get('/', function () {
    return view('welcome');
});

//LOGGED IN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('event')->group(function () {
            Route::get('/', [EventController::class, 'index'])->name('calendar');
            Route::get('show/{id}', [EventController::class, 'show'])->name('event.show');
        });
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user');
        });
    });
    Route::prefix('api')->group(function () {

        Route::prefix('event')->group(function () {
            Route::get('', [EventController::class, 'getEvents'])->name('api.events.get');
        });
    });
});
