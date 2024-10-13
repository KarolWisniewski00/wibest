<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
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

Route::get('/login/google', [GoogleController::class, 'redirect'])->name('login.google');
Route::get('/login/google/callback', [GoogleController::class, 'callback']);

//LOGGED IN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('client')->group(function () {
            Route::get('/', [ClientController::class, 'index'])->name('client');
            Route::get('create', [ClientController::class, 'create'])->name('client.create');
            Route::post('store', [ClientController::class, 'store'])->name('client.store');
            Route::get('show/{client}', [ClientController::class, 'show'])->name('client.show');
            Route::get('edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
            Route::put('update/{client}', [ClientController::class, 'update'])->name('client.update');
            Route::delete('delete/{client}', [ClientController::class, 'delete'])->name('client.delete');
        });

        Route::prefix('invoice')->group(function () {
            Route::get('/', [InvoiceController::class, 'index'])->name('invoice');
            Route::get('now', [InvoiceController::class, 'index_now'])->name('invoice.now');
            Route::get('last', [InvoiceController::class, 'index_last'])->name('invoice.last');
            Route::get('create', [InvoiceController::class, 'create'])->name('invoice.create');
            Route::post('store', [InvoiceController::class, 'store'])->name('invoice.store');
            Route::get('show/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
            Route::get('edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoice.edit');
            Route::put('update/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
            Route::delete('delete/{invoice}', [InvoiceController::class, 'delete'])->name('invoice.delete');

            Route::get('/search', [InvoiceController::class, 'search'])->name('invoice.search');
            Route::get('create/{client}', [InvoiceController::class, 'create_client'])->name('invoice.create.client');
            Route::get('file/{invoice}', [InvoiceController::class, 'file'])->name('invoice.show.file');
            Route::get('download/{invoice}', [InvoiceController::class, 'download'])->name('invoice.download');
            Route::get('store/from/{invoice}', [InvoiceController::class, 'store_from'])->name('invoice.store.from');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product');
            Route::get('create', [ProductController::class, 'create'])->name('product.create');
            Route::post('store', [ProductController::class, 'store'])->name('product.store');
            Route::get('show/{product}', [ProductController::class, 'show'])->name('product.show');
            Route::get('edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('update/{product}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        });

        Route::prefix('service')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('service');
            Route::get('create', [ServiceController::class, 'create'])->name('service.create');
            Route::post('store', [ServiceController::class, 'store'])->name('service.store');
            Route::get('show/{service}', [ServiceController::class, 'show'])->name('service.show');
            Route::get('edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
            Route::put('update/{service}', [ServiceController::class, 'update'])->name('service.update');
            Route::delete('delete/{service}', [ServiceController::class, 'delete'])->name('service.delete');
        });

        Route::prefix('setting')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('setting');
            Route::get('create', [SettingController::class, 'create'])->name('setting.create');
            Route::post('store', [SettingController::class, 'store'])->name('setting.store');
            Route::get('edit/{company}', [SettingController::class, 'edit'])->name('setting.edit');
            Route::put('update/{company}', [SettingController::class, 'update'])->name('setting.update');
        });
        Route::prefix('version')->group(function () {
            Route::get('/', [DashboardController::class, 'version'])->name('version');
        });
    });
});
