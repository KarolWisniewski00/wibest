<?php

use App\Http\Controllers\Calendar\CalendarController;
use App\Http\Controllers\Calendar\LeaveCalendarController;
use App\Http\Controllers\Calendar\WorkScheduleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TSI\InvoiceController;
use App\Http\Controllers\Leave\LeaveGroupController;
use App\Http\Controllers\Leave\LeaveLimitController;
use App\Http\Controllers\Leave\LeavePendingReviewController;
use App\Http\Controllers\Leave\LeaveSingleController;
use App\Http\Controllers\TSI\OfferController;
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


    //API -----------------------------------------------------------------
    Route::prefix('v1')->group(function () {
        Route::prefix('search')->group(function () {
            Route::get('/gus/{nip}', [InvoiceController::class, 'gus'])->name('api.v1.search.gus'); //TSI
        });
        Route::prefix('rcp')->group(function () {
            Route::prefix('work-session')->group(function () {
                Route::get('/', [RCPController::class, 'get'])->name('api.v1.rcp.work-session.get');
                Route::get('set-date/', [RCPController::class, 'setDate'])->name('api.v1.rcp.work-session.set.date');
                Route::post('/export-xlsx', [RCPController::class, 'exportXlsx'])->name('api.v1.rcp.work-session.export.xlsx');
            });
            Route::prefix('event')->group(function () {
                Route::get('/', [EventController::class, 'get'])->name('api.v1.rcp.event.get');
                Route::get('set-date/', [EventController::class, 'setDate'])->name('api.v1.rcp.event.set.date');
                Route::post('/export-xlsx', [EventController::class, 'exportXlsx'])->name('api.v1.rcp.event.export.xlsx');
            });
        });
        Route::prefix('team')->group(function () {
            Route::prefix('user')->group(function () {
                Route::get('/', [TeamUserController::class, 'get'])->name('api.v1.team.user.get');
                Route::post('set-role/', [TeamUserController::class, 'setRole'])->name('api.v1.team.user.set.role');
                Route::post('/export-xlsx', [TeamUserController::class, 'exportXlsx'])->name('api.v1.team.user.export.xlsx');
            });
        });
        Route::prefix('setting')->group(function () {
            Route::prefix('client')->group(function () {
                Route::get('/', [ClientController::class, 'get'])->name('api.v1.setting.client.get');
            });
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'get'])->name('api.v1.setting.user.get');
            });
        });
        Route::prefix('raport')->group(function () {
            Route::prefix('time-sheet')->group(function () {
                Route::get('/', [TimeSheetController::class, 'get'])->name('api.v1.raport.time-sheet.get');
                Route::get('set-date/', [TimeSheetController::class, 'setDate'])->name('api.v1.raport.time-sheet.set.date');
                Route::post('/export-xlsx', [TimeSheetController::class, 'exportPdf'])->name('api.v1.raport.time-sheet.export.xlsx');
            });
            Route::prefix('attendance-sheet')->group(function () {
                Route::get('/', [AttendanceSheetController::class, 'get'])->name('api.v1.raport.attendance-sheet.get');
                Route::get('set-date/', [AttendanceSheetController::class, 'setDate'])->name('api.v1.raport.attendance-sheet.set.date');
                Route::post('/export-xlsx', [AttendanceSheetController::class, 'exportPdf'])->name('api.v1.raport.attendance-sheet.export.xlsx');
            });
        });
        Route::prefix('calendar')->group(function () {
            Route::prefix('all')->group(function () {
                Route::get('/', [CalendarController::class, 'get'])->name('api.v1.calendar.all.get');
                Route::get('set-date/', [CalendarController::class, 'setDate'])->name('api.v1.calendar.all.set.date');
                Route::post('/export-xlsx', [CalendarController::class, 'exportXlsx'])->name('api.v1.calendar.all.export.xlsx');
            });
        });
        Route::prefix('leave')->group(function () {
            Route::prefix('single')->group(function () {
                Route::get('/', [LeaveSingleController::class, 'get'])->name('api.v1.leave.single.get');
                Route::get('set-date/', [LeaveSingleController::class, 'setDate'])->name('api.v1.leave.single.set.date');
            });
            Route::prefix('pending-review')->group(function () {
                Route::get('/', [LeavePendingReviewController::class, 'get'])->name('api.v1.leave.pending.get');
                Route::get('set-date/', [LeavePendingReviewController::class, 'setDate'])->name('api.v1.leave.pending.set.date');
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
                Route::get('create', [TeamUserController::class, 'create'])->name('team.user.create');
                Route::post('store/{user}', [TeamUserController::class, 'store'])->name('team.user.store');
                Route::get('show/{user}', [TeamUserController::class, 'show'])->name('team.user.show');
                Route::get('edit/{user}', [TeamUserController::class, 'edit'])->name('team.user.edit');
                Route::get('planing/{user}', [TeamUserController::class, 'planing'])->name('team.user.planing');
                Route::put('update_planing/{user}', [TeamUserController::class, 'update_planing'])->name('team.user.update_planing');
                Route::get('restart/{user}', [TeamUserController::class, 'restart'])->name('team.user.restart');
                Route::put('update/{user}', [TeamUserController::class, 'update'])->name('team.user.update');
                Route::post('disconnect/{user}', [TeamUserController::class, 'disconnect'])->name('team.user.disconnect');
            });
            Route::prefix('invitation')->group(function () {
                Route::get('/', [InvitationController::class, 'index'])->name('team.invitation.index');
                Route::get('accept/{id}', [InvitationController::class, 'accept'])->name('team.invitation.accept');
                Route::get('reject/{id}', [InvitationController::class, 'reject'])->name('team.invitation.reject');
            });
        });

        // CALENDAR ------------------------------------------------------------------------------
        Route::prefix('calendar')->group(function () {
            Route::prefix('all')->group(function () {
                Route::get('/', [CalendarController::class, 'index'])->name('calendar.all.index');
                Route::get('/create', [CalendarController::class, 'create'])->name('calendar.all.create');
                Route::post('/store', [CalendarController::class, 'store'])->name('calendar.all.store');
                Route::get('/edit/{user}/{date}', [CalendarController::class, 'edit'])->name('calendar.all.edit');
                Route::post('/update/{plannedLeave}', [CalendarController::class, 'update'])->name('calendar.all.update');
                Route::delete('/delete/{plannedLeave}', [CalendarController::class, 'delete'])->name('calendar.all.delete');
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
                Route::get('/create', [LeaveSingleController::class, 'create'])->name('leave.single.create');
                Route::get('/edit/{leave}', [LeaveSingleController::class, 'edit'])->name('leave.single.edit');
                Route::delete('/delete/{leave}', [LeaveSingleController::class, 'delete'])->name('leave.single.delete');
            });

            Route::prefix('pending-review')->group(function () {
                Route::get('/', [LeavePendingReviewController::class, 'index'])->name('leave.pending.index');
                Route::get('/create', [LeavePendingReviewController::class, 'create'])->name('leave.pending.create');
                Route::get('/edit/{leave}', [LeavePendingReviewController::class, 'edit'])->name('leave.pending.edit');
                Route::get('accept/{leave}', [LeavePendingReviewController::class, 'accept'])->name('leave.pending.accept');
                Route::get('reject/{leave}', [LeavePendingReviewController::class, 'reject'])->name('leave.pending.reject');
                Route::get('cancel/{leave}', [LeavePendingReviewController::class, 'cancel'])->name('leave.pending.cancel');
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
                Route::get('/create-note/{work_session}', [RCPController::class, 'createNote'])->name('rcp.work-session.create.note');
                Route::post('/store', [RCPController::class, 'store'])->name('rcp.work-session.store');
                Route::post('/store-note/{work_session}', [RCPController::class, 'storeNote'])->name('rcp.work-session.store.note');
                Route::get('/start/plus/{work_session}', [RCPController::class, 'startPlus'])->name('rcp.work-session.start.plus');
                Route::get('/stop/minus/{work_session}', [RCPController::class, 'stopMinus'])->name('rcp.work-session.stop.minus');
                Route::get('/edit/{work_session}', [RCPController::class, 'edit'])->name('rcp.work-session.edit');
                Route::get('/edit-note/{work_session}', [RCPController::class, 'editNote'])->name('rcp.work-session.edit.note');
                Route::put('/update/{work_session}', [RCPController::class, 'update'])->name('rcp.work-session.update');
                Route::put('/update-note/{work_session}', [RCPController::class, 'updateNote'])->name('rcp.work-session.update.note');
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

        // SETTINGS -----------------------------------------------------------------------------
        Route::prefix('setting')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('setting');
            Route::get('create', [SettingController::class, 'create'])->name('setting.create');
            Route::post('store', [SettingController::class, 'store'])->name('setting.store');
            Route::get('edit/{company}', [SettingController::class, 'edit'])->name('setting.edit');
            Route::put('update/{company}', [SettingController::class, 'update'])->name('setting.update');
            Route::get('disconnect/{user}', [SettingController::class, 'disconnect'])->name('setting.user.disconnect');
            Route::get('invitations/accept/{id}', [SettingController::class, 'acceptInvitation'])->name('setting.user.invitations.accept');
            Route::get('invitations/reject/{id}', [SettingController::class, 'rejectInvitation'])->name('setting.user.invitations.reject');

            Route::prefix('invoice')->group(function () {
                Route::get('/', [InvoiceController::class, 'index'])->name('setting.invoice');
                Route::get('create', [InvoiceController::class, 'create'])->name('setting.invoice.create');
                Route::post('store', [InvoiceController::class, 'store'])->name('setting.invoice.store');
                Route::get('show/{invoice}', [InvoiceController::class, 'show'])->name('setting.invoice.show');
                Route::get('edit/{invoice}', [InvoiceController::class, 'edit'])->name('setting.invoice.edit');
                Route::put('update/{invoice}', [InvoiceController::class, 'update'])->name('setting.invoice.update');
                Route::delete('delete/{invoice}', [InvoiceController::class, 'delete'])->name('setting.invoice.delete');

                Route::get('now', [InvoiceController::class, 'index_now'])->name('setting.invoice.now');
                Route::get('last', [InvoiceController::class, 'index_last'])->name('setting.invoice.last');
                Route::get('search', [InvoiceController::class, 'search'])->name('setting.invoice.search');
                Route::get('create/{client}', [InvoiceController::class, 'create_client'])->name('setting.invoice.create.client');
                Route::get('create/pro/{client}', [InvoiceController::class, 'create_client'])->name('setting.invoice.create.pro.client');
                Route::get('send/{invoice}', [InvoiceController::class, 'send_invoice'])->name('setting.invoice.send');
                Route::get('file/{invoice}', [InvoiceController::class, 'file'])->name('setting.invoice.show.file');
                Route::get('download/{invoice}', [InvoiceController::class, 'download'])->name('setting.invoice.download');
                Route::get('store/from/{invoice}', [InvoiceController::class, 'store_from'])->name('setting.invoice.store.from');
                Route::get('store/from/ofr/{offer}', [InvoiceController::class, 'store_from_ofr'])->name('setting.invoice.store.from.ofr');
            });

            Route::prefix('offer')->group(function () {
                Route::get('/', [OfferController::class, 'index'])->name('setting.offer');
                Route::get('create/{project}', [OfferController::class, 'create'])->name('setting.offer.create.project');
                Route::post('store', [OfferController::class, 'store'])->name('setting.offer.store');
                Route::get('show/{offer}', [OfferController::class, 'show'])->name('setting.offer.show');
                Route::get('edit/{offer}', [OfferController::class, 'edit'])->name('setting.offer.edit');
                Route::put('update/{offer}', [OfferController::class, 'update'])->name('setting.offer.update');
                Route::delete('delete/{offer}', [OfferController::class, 'delete'])->name('setting.offer.delete');

                Route::get('now', [OfferController::class, 'index_now'])->name('setting.offer.now');
                Route::get('last', [OfferController::class, 'index_last'])->name('setting.offer.last');
                Route::get('/search', [OfferController::class, 'search'])->name('setting.offer.search');
                Route::get('/send/{offer}', [OfferController::class, 'send_offer'])->name('setting.offer.send');
                Route::get('file/{offer}', [OfferController::class, 'file'])->name('setting.offer.show.file');
                Route::get('download/{offer}', [OfferController::class, 'download'])->name('setting.offer.download');
                Route::get('store/from/{offer}', [OfferController::class, 'store_from'])->name('setting.offer.store.from');
            });

            Route::prefix('client')->group(function () {
                Route::get('/', [ClientController::class, 'index'])->name('setting.client');
                Route::get('create', [ClientController::class, 'create'])->name('setting.client.create');
                Route::post('store', [ClientController::class, 'store'])->name('setting.client.store');
                Route::get('show/{client}', [ClientController::class, 'show'])->name('setting.client.show');
                Route::get('edit/{client}', [ClientController::class, 'edit'])->name('setting.client.edit');
                Route::put('update/{client}', [ClientController::class, 'update'])->name('setting.client.update');
                Route::delete('delete/{client}', [ClientController::class, 'delete'])->name('setting.client.delete');
            });
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('setting.user');
                Route::get('edit-company/{user}', [UserController::class, 'editCompany'])->name('setting.user.edit-company');
                Route::get('edit-planing/{user}', [UserController::class, 'editPlaning'])->name('setting.user.edit-planing');
                Route::get('edit/{user}', [UserController::class, 'edit'])->name('setting.user.edit');
                Route::get('create/{client}', [UserController::class, 'create'])->name('setting.user.create');
                Route::put('update-company/{user}', [UserController::class, 'updateCompany'])->name('setting.user.update-company');
                Route::get('show/{user}', [UserController::class, 'show'])->name('setting.user.show');
                Route::delete('delete/{user}', [UserController::class, 'delete'])->name('setting.user.delete');
            });
        });

        //Mierzenie Czasu Pracy ------------------------------------------------------------------

        // REDIRECTS ---------------------------------------------------------------------------
        Route::redirect('/raport', '/dashboard/raport/time-sheet')->name('raport');

        Route::prefix('version')->group(function () {
            Route::redirect('/', '/dashboard/setting')->name('version');
        });

        Route::prefix('invoice')->group(function () {
            Route::redirect('/', '/dashboard/setting/invoice')->name('invoice');
            Route::redirect('/create', '/dashboard/setting/invoice/create')->name('invoice.create');
            Route::redirect('store', '/dashboard/setting/invoice/store')->name('invoice.store');
            Route::redirect('show/{invoice}', '/dashboard/setting/invoice/show/{invoice}')->name('invoice.show');
            Route::redirect('edit/{invoice}', '/dashboard/setting/invoice/edit/{invoice}')->name('invoice.edit');
            Route::redirect('update/{invoice}', '/dashboard/setting/invoice/update/{invoice}')->name('invoice.update');
            Route::redirect('delete/{invoice}', '/dashboard/setting/invoice/delete/{invoice}')->name('invoice.delete');

            Route::redirect('now', '/dashboard/setting/invoice/now')->name('invoice.now');
            Route::redirect('last', '/dashboard/setting/invoice/last')->name('invoice.last');
            Route::redirect('search', '/dashboard/setting/invoice/search')->name('invoice.search');
            Route::redirect('create/{client}', '/dashboard/setting/invoice/create/{client}')->name('invoice.create.client');
            Route::redirect('create/pro/{client}', '/dashboard/setting/invoice/create/pro/{client}')->name('invoice.create.pro.client');
            Route::redirect('send/{invoice}', '/dashboard/setting/invoice/send/{invoice}')->name('invoice.send');
            Route::redirect('file/{invoice}', '/dashboard/setting/invoice/file/{invoice}')->name('invoice.show.file');
            Route::redirect('download/{invoice}', '/dashboard/setting/invoice/download/{invoice}')->name('invoice.download');
            Route::redirect('store/from/{invoice}', '/dashboard/setting/invoice/store/from/{invoice}')->name('invoice.store.from');
            Route::redirect('store/from/ofr/{offer}', '/dashboard/setting/invoice/store/from/ofr/{offer}')->name('invoice.store.from.ofr');
        });

        Route::prefix('offer')->group(function () {
            Route::redirect('/', '/dashboard/setting/offer')->name('offer');
            Route::redirect('create/{project}', '/dashboard/setting/offer/create/{project}')->name('offer.create.project');
            Route::redirect('store', '/dashboard/setting/offer/store')->name('offer.store');
            Route::redirect('show/{offer}', '/dashboard/setting/offer/show/{offer}')->name('offer.show');
            Route::redirect('edit/{offer}', '/dashboard/setting/offer/edit/{offer}')->name('offer.edit');
            Route::redirect('update/{offer}', '/dashboard/setting/offer/update/{offer}')->name('offer.update');
            Route::redirect('delete/{offer}', '/dashboard/setting/offer/delete/{offer}')->name('offer.delete');

            Route::redirect('now', '/dashboard/setting/offer/now')->name('offer.now');
            Route::redirect('last', '/dashboard/setting/offer/last')->name('offer.last');
            Route::redirect('search', '/dashboard/setting/offer/search')->name('offer.search');
            Route::redirect('send/{offer}', '/dashboard/setting/offer/send/{offer}')->name('offer.send');
            Route::redirect('file/{offer}', '/dashboard/setting/offer/file/{offer}')->name('offer.show.file');
            Route::redirect('download/{offer}', '/dashboard/setting/offer/download/{offer}')->name('offer.download');
            Route::redirect('store/from/{offer}', '/dashboard/setting/offer/store/from/{offer}')->name('offer.store.from');
        });
        Route::prefix('client')->group(function () {
            Route::redirect('/', '/dashboard/setting/client')->name('client');
            Route::redirect('create', '/dashboard/setting/client/create')->name('client.create');
            Route::redirect('store', '/dashboard/setting/client/store')->name('client.store');
            Route::redirect('search', '/dashboard/setting/client/search')->name('client.search');
            Route::redirect('show/{client}', '/dashboard/setting/client/show/{client}')->name('client.show');
            Route::redirect('edit/{client}', '/dashboard/setting/client/edit/{client}')->name('client.edit');
            Route::redirect('update/{client}', '/dashboard/setting/client/update/{client}')->name('client.update');
            Route::redirect('delete/{client}', '/dashboard/setting/client/delete/{client}')->name('client.delete');
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
    });
});

//Przekierowania ustawione dla wystawiania faktur (bo kiedys zmieniałem z fakturowni na rcp) a żeby teraz wystawić fakture trzeba błędy notfound ogarnąć
//REDIRECTS ---------------------------------------------------------------------------
Route::get('api-search-gus-old/gus/{nip}', [InvoiceController::class, 'gus'])->name('api.search.gus'); //TSI