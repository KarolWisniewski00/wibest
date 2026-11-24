<?php

use App\Http\Controllers\Api\DayInfoController;
use App\Http\Controllers\Api\LeaveBalanceApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Broadcasting\BroadcastController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/broadcasting/auth', [
    BroadcastController::class,
    'authenticate',
])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v2')->group(function () {

    Route::post('login', [AuthController::class, 'login'])->middleware('throttle:login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', fn (Request $request) => $request->user());
        Route::post('logout', [AuthController::class, 'logout']);
        
        Route::get('leave/balance', [LeaveBalanceApiController::class, 'show']);
        Route::get('day/info', [DayInfoController::class, 'show']);
    });

});
