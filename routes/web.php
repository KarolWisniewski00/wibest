<?php

use App\Http\Controllers\Calendar\CalendarController;
use App\Http\Controllers\Calendar\LeaveCalendarController;
use App\Http\Controllers\Calendar\WorkScheduleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Leave\LeaveGroupController;
use App\Http\Controllers\Leave\LeaveLimitController;
use App\Http\Controllers\Leave\LeavePendingReviewController;
use App\Http\Controllers\Leave\LeaveSingleController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Raport\AttendanceSheetController;
use App\Http\Controllers\Raport\TimeSheetController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\RCP\EventController;
use App\Http\Controllers\RCP\WorkSessionController as RCPWorkSessionController;
use App\Http\Controllers\RCP\RCPController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Team\InvitationController;
use App\Http\Controllers\Team\UserController as TeamUserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkSessionController;
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
Route::prefix('api')->group(function () {
    Route::prefix('work')->group(function () {
        Route::get('/start/{user_id}', [RCPWorkSessionController::class, 'startWork'])->name('api.work.start');
        Route::get('/stop/{id}', [RCPWorkSessionController::class, 'stopWork'])->name('api.work.stop');
        Route::get('/session/{user_id}', [RCPWorkSessionController::class, 'getWorkSession'])->name('api.work.session');
    });
    Route::prefix('invoice')->group(function () {
        Route::get('/{month}/{year}/{type}', [InvoiceController::class, 'value'])->name('api.invoice.value');
    });
    Route::prefix('offer')->group(function () {
        Route::get('/{year}', [OfferController::class, 'value'])->name('api.offer.value');
    });
    Route::prefix('search')->group(function () {
        Route::get('/gus/{nip}', [InvoiceController::class, 'gus'])->name('api.search.gus');
    });
    Route::prefix('user')->group(function () {
        Route::get('update/role/{id}/{role}', [UserController::class, 'updateRole'])->name('api.user.update.role');
    });
    //API -----------------------------------------------------------------
    Route::prefix('v1')->group(function () {
        Route::prefix('rcp')->group(function () {
            Route::prefix('work-session')->group(function () {
                Route::get('/', [RCPController::class, 'get'])->name('api.v1.rcp.work-session.get');
                Route::post('/export-xlsx', [RCPController::class, 'export_xlsx'])->name('api.v1.rcp.work-session.export.xlsx');
            });
        });
    });
    //API -----------------------------------------------------------------
});

//LOGGED IN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('dashboard')->group(function () {
        //Mierzenie Czasu Pracy -----------------------------------------------------------------
        //Nazwy na podstawie zakładek

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // TEAM ---------------------------------------------------------------------------------
        Route::prefix('team')->group(function () {
            Route::prefix('user')->group(function () {
                Route::get('/', [TeamUserController::class, 'index'])->name('team.user.index');
            });
            Route::prefix('invitation')->group(function () {
                Route::get('/', [InvitationController::class, 'index'])->name('team.invitation.index');
            });
        });

        // CALENDAR ------------------------------------------------------------------------------
        Route::prefix('calendar')->group(function () {
            Route::prefix('all')->group(function () {
                Route::get('/', [CalendarController::class, 'index'])->name('calendar.all.index');
            });

            Route::prefix('work-schedule')->group(function () {
                Route::get('/', [WorkScheduleController::class, 'index'])->name('calendar.work-schedule.index');
            });

            Route::prefix('leave-application')->group(function () {
                Route::get('/', [LeaveCalendarController::class, 'index'])->name('calendar.leave-application.index');
            });
        });

        // LEAVE APPLICATIONS --------------------------------------------------------------------
        Route::prefix('leave')->group(function () {
            Route::prefix('group')->group(function () {
                Route::get('/', [LeaveGroupController::class, 'index'])->name('leave.group.index');
            });

            Route::prefix('single')->group(function () {
                Route::get('/', [LeaveSingleController::class, 'index'])->name('leave.single.index');
            });

            Route::prefix('pending-review')->group(function () {
                Route::get('/', [LeavePendingReviewController::class, 'index'])->name('leave.pending.index');
            });

            Route::prefix('limit')->group(function () {
                Route::get('/', [LeaveLimitController::class, 'index'])->name('leave.limit.index');
            });
        });

        // RCP -----------------------------------------------------------------------------------
        Route::prefix('rcp')->group(function () {
            Route::prefix('work-session')->group(function () {
                Route::get('/', [RCPController::class, 'index'])->name('rcp.work-session.index');
                Route::get('/create', [RCPController::class, 'create'])->name('rcp.work-session.create');
                Route::post('/store', [RCPController::class, 'store'])->name('rcp.work-session.store');
                Route::get('/edit/{work_session}', [RCPController::class, 'edit'])->name('rcp.work-session.edit');
                Route::put('/update/{work_session}', [RCPController::class, 'update'])->name('rcp.work-session.update');
                Route::get('/show/{work_session}', [RCPController::class, 'show'])->name('rcp.work-session.show');
                Route::delete('/delete/{work_session}', [RCPController::class, 'delete'])->name('rcp.work-session.delete');
            });

            Route::prefix('event')->group(function () {
                Route::get('/', [EventController::class, 'index'])->name('rcp.event.index');
                Route::get('/show/{event}', [EventController::class, 'show'])->name('rcp.event.show');
                Route::delete('/delete/{event}', [EventController::class, 'delete'])->name('rcp.event.delete');
            });
        });

        // RAPORTS -------------------------------------------------------------------------------
        Route::prefix('raport')->group(function () {
            Route::prefix('time-sheet')->group(function () {
                Route::get('/', [TimeSheetController::class, 'index'])->name('raport.time-sheet.index');
            });

            Route::prefix('attendance-sheet')->group(function () {
                Route::get('/', [AttendanceSheetController::class, 'index'])->name('raport.attendance-sheet.index');
            });
        });

        //Mierzenie Czasu Pracy ------------------------------------------------------------------

        Route::prefix('client')->group(function () {
            Route::get('/', [ClientController::class, 'index'])->name('client');
            Route::get('create', [ClientController::class, 'create'])->name('client.create');
            Route::post('store', [ClientController::class, 'store'])->name('client.store');
            Route::get('/search', [ClientController::class, 'search'])->name('client.search');
            Route::get('show/{client}', [ClientController::class, 'show'])->name('client.show');
            Route::get('edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
            Route::put('update/{client}', [ClientController::class, 'update'])->name('client.update');
            Route::delete('delete/{client}', [ClientController::class, 'delete'])->name('client.delete');
        });

        Route::prefix('invoice')->group(function () {
            Route::get('/', [InvoiceController::class, 'index'])->name('invoice');
            Route::get('create', [InvoiceController::class, 'create'])->name('invoice.create');
            Route::post('store', [InvoiceController::class, 'store'])->name('invoice.store');
            Route::get('show/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
            Route::get('edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoice.edit');
            Route::put('update/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
            Route::delete('delete/{invoice}', [InvoiceController::class, 'delete'])->name('invoice.delete');

            Route::get('now', [InvoiceController::class, 'index_now'])->name('invoice.now');
            Route::get('last', [InvoiceController::class, 'index_last'])->name('invoice.last');
            Route::get('search', [InvoiceController::class, 'search'])->name('invoice.search');
            Route::get('create/{client}', [InvoiceController::class, 'create_client'])->name('invoice.create.client');
            Route::get('create/pro/{client}', [InvoiceController::class, 'create_client'])->name('invoice.create.pro.client');
            Route::get('send/{invoice}', [InvoiceController::class, 'send_invoice'])->name('invoice.send');
            Route::get('file/{invoice}', [InvoiceController::class, 'file'])->name('invoice.show.file');
            Route::get('download/{invoice}', [InvoiceController::class, 'download'])->name('invoice.download');
            Route::get('store/from/{invoice}', [InvoiceController::class, 'store_from'])->name('invoice.store.from');
            Route::get('store/from/ofr/{offer}', [InvoiceController::class, 'store_from_ofr'])->name('invoice.store.from.ofr');
        });
        Route::prefix('project')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('project');
            Route::get('refresh', [ProjectController::class, 'index_refresh'])->name('project.refresh');
            Route::get('create/{client}', [ProjectController::class, 'create'])->name('project.create.client');
            Route::post('store', [ProjectController::class, 'store'])->name('project.store');
            Route::get('show/{project}', [ProjectController::class, 'show'])->name('project.show');
            Route::get('edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
            Route::put('update/{project}', [ProjectController::class, 'update'])->name('project.update');
            Route::delete('delete/{project}', [ProjectController::class, 'delete'])->name('project.delete');
            Route::get('search', [ProjectController::class, 'search'])->name('project.search');
        });
        Route::prefix('contract')->group(function () {
            Route::get('/', [ContractController::class, 'index'])->name('contract');
        });
        Route::prefix('order')->group(function () {
            Route::get('/', [ContractController::class, 'index'])->name('order');
        });

        Route::prefix('cost')->group(function () {
            Route::get('/', [CostController::class, 'index'])->name('cost');
            Route::get('create', [CostController::class, 'create'])->name('cost.create');
            Route::post('store', [CostController::class, 'store'])->name('cost.store');
            Route::get('show/{cost}', [CostController::class, 'show'])->name('cost.show');
            Route::get('edit/{cost}', [CostController::class, 'edit'])->name('cost.edit');
            Route::put('update/{cost}', [CostController::class, 'update'])->name('cost.update');
            Route::delete('delete/{cost}', [CostController::class, 'delete'])->name('cost.delete');

            Route::get('now', [CostController::class, 'index_now'])->name('cost.now');
            Route::get('last', [CostController::class, 'index_last'])->name('cost.last');
            Route::get('search', [CostController::class, 'search'])->name('cost.search');
        });

        Route::prefix('offer')->group(function () {
            Route::get('/', [OfferController::class, 'index'])->name('offer');
            Route::get('create/{project}', [OfferController::class, 'create'])->name('offer.create.project');
            Route::post('store', [OfferController::class, 'store'])->name('offer.store');
            Route::get('show/{offer}', [OfferController::class, 'show'])->name('offer.show');
            Route::get('edit/{offer}', [OfferController::class, 'edit'])->name('offer.edit');
            Route::put('update/{offer}', [OfferController::class, 'update'])->name('offer.update');
            Route::delete('delete/{offer}', [OfferController::class, 'delete'])->name('offer.delete');

            Route::get('now', [OfferController::class, 'index_now'])->name('offer.now');
            Route::get('last', [OfferController::class, 'index_last'])->name('offer.last');
            Route::get('/search', [OfferController::class, 'search'])->name('offer.search');
            Route::get('/send/{offer}', [OfferController::class, 'send_offer'])->name('offer.send');
            Route::get('file/{offer}', [OfferController::class, 'file'])->name('offer.show.file');
            Route::get('download/{offer}', [OfferController::class, 'download'])->name('offer.download');
            Route::get('store/from/{offer}', [OfferController::class, 'store_from'])->name('offer.store.from');
        });
        Route::prefix('magazine')->group(function () {
            Route::prefix('set')->group(function () {
                Route::get('/', [SetController::class, 'index'])->name('set');
                Route::get('create', [SetController::class, 'create'])->name('set.create');
                Route::post('store', [SetController::class, 'store'])->name('set.store');
                Route::get('show/{set}', [SetController::class, 'show'])->name('set.show');
                Route::get('edit/{set}', [SetController::class, 'edit'])->name('set.edit');
                Route::put('update/{set}', [SetController::class, 'update'])->name('set.update');
                Route::delete('delete/{set}', [SetController::class, 'delete'])->name('set.delete');
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
        });

        Route::prefix('setting')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('setting');
            Route::get('create', [SettingController::class, 'create'])->name('setting.create');
            Route::post('store', [SettingController::class, 'store'])->name('setting.store');
            Route::get('edit/{company}', [SettingController::class, 'edit'])->name('setting.edit');
            Route::put('update/{company}', [SettingController::class, 'update'])->name('setting.update');
            Route::get('disconnect/{user}', [SettingController::class, 'disconnect'])->name('setting.user.disconnect');
            Route::get('invitations/accept/{id}', [SettingController::class, 'acceptInvitation'])->name('setting.user.invitations.accept');
            Route::get('invitations/reject/{id}', [SettingController::class, 'rejectInvitation'])->name('setting.user.invitations.reject');

            Route::prefix('version')->group(function () {
                Route::get('/', [DashboardController::class, 'version'])->name('version');
            });
        });
    });
});
