<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Calendar\WorkScheduleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Leave\LeaveBalanceController;
use App\Http\Controllers\Object\ObjectController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\TSI\InvoiceController;
use App\Http\Controllers\Leave\LeavePendingReviewController;
use App\Http\Controllers\Leave\LeaveSingleController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Raport\AttendanceSheetController;
use App\Http\Controllers\Raport\TimeSheetController;
use App\Http\Controllers\RCP\EventController;
use App\Http\Controllers\RCP\LocationController;
use App\Http\Controllers\RCP\WorkSessionController as RCPWorkSessionController;
use App\Http\Controllers\RCP\RCPController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Team\InvitationController;
use App\Http\Controllers\Team\UserController as TeamUserController;
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
})->name('welcome');

Route::get('funkcje', function () {
    return view('function');
})->name('function');

Route::get('o-nas', function () {
    return view('about');
})->name('about');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('blog/{slug}', function ($slug) {
    return view('blog_show', compact('slug'));
})->name('blog.show');

Route::get('kontakt', function () {
    return view('contact');
})->name('contact');

Route::post('/kontakt', [ContactController::class, 'send'])
    ->name('contact.send');

Route::get('/login/google', [GoogleController::class, 'redirect'])->name('login.google');
Route::get('/login/google/callback', [GoogleController::class, 'callback']);

Route::prefix('api')->middleware(['auth:sanctum', 'throttle:api'])->group(function () {

    //API -----------------------------------------------------------------
    Route::prefix('v1')->group(function () {
        Route::prefix('work')->group(function () {
            Route::post('/start', [RCPWorkSessionController::class, 'startWork'])->middleware('throttle:work-clock')->name('api.work.start');
            Route::post('/stop', [RCPWorkSessionController::class, 'stopWork'])->middleware('throttle:work-clock')->name('api.work.stop');
            Route::get('/session', [RCPWorkSessionController::class, 'getWorkSession'])->middleware('throttle:work-clock-status')->name('api.work.session');
        });
        Route::prefix('invoice')->group(function () {
            Route::get('/{month}/{year}/{type}', [InvoiceController::class, 'value'])->name('api.invoice.value');
        });
        Route::prefix('offer')->group(function () {
            Route::get('/{year}', [OfferController::class, 'value'])->name('api.offer.value');
        });
        Route::prefix('search')->group(function () {
            Route::get('/gus/{nip}', [InvoiceController::class, 'gus'])->name('api.v1.search.gus'); //TSI
        });
        Route::prefix('rcp')->group(function () {
            Route::prefix('work-session')->group(function () {
                Route::get('/', [RCPController::class, 'get'])->name('api.v1.rcp.work-session.get');
                Route::get('set-date/', [RCPController::class, 'setDate'])->name('api.v1.rcp.work-session.set.date');
                Route::post('/export-xlsx', [RCPController::class, 'exportXlsx'])->name('api.v1.rcp.work-session.export.xlsx');
            });
            Route::prefix('work-session-calendar-user')->group(function () {
                Route::get('set-date/', [RCPController::class, 'setDateCalendarUser'])->name('api.v1.rcp.work-session-calendar-user.set.date');
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
                Route::post('set-role/', [TeamUserController::class, 'setRole'])->middleware('can:manage-company')->name('api.v1.team.user.set.role');
                Route::post('/export-xlsx', [TeamUserController::class, 'exportXlsx'])->name('api.v1.team.user.export.xlsx');
            });
        });
        Route::prefix('setting')->group(function () {
            Route::prefix('sms')->group(function () {
                Route::get('stats', [SmsController::class, 'smsStats'])->name('api.v1.setting.sms.stats');
            });
            Route::prefix('crm')->group(function () {
                Route::get('/', [CrmController::class, 'get'])->name('api.v1.setting.crm.get');
            });
            Route::prefix('blog')->group(function () {
                Route::get('/', [BlogController::class, 'get'])->name('api.v1.setting.blog.get');
            });
            Route::prefix('client')->group(function () {
                Route::get('/', [ClientController::class, 'get'])->name('api.v1.setting.client.get');
                Route::get('sms-stats/{client}', [ClientController::class, 'smsStats'])->name('api.v1.setting.client.sms.stats');
                Route::get('user-stats/{client}', [ClientController::class, 'userStats'])->name('api.v1.setting.client.user.stats');
                Route::get('users/{client}', [ClientController::class, 'users'])->name('api.v1.setting.client.users');
            });
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'get'])->name('api.v1.setting.user.get');
                Route::get('stats', [SettingController::class, 'userStats'])->name('api.v1.setting.user.stats');
            });
        });
        Route::prefix('raport')->group(function () {
            Route::prefix('time-sheet')->group(function () {
                Route::get('/', [TimeSheetController::class, 'get'])->name('api.v1.raport.time-sheet.get');
                Route::get('set-date/', [TimeSheetController::class, 'setDate'])->name('api.v1.raport.time-sheet.set.date');
                Route::post('/export-xlsx', [TimeSheetController::class, 'exportPdf'])->name('api.v1.raport.time-sheet.export.xlsx');
            });
            Route::prefix('time-smart')->group(function () {
                Route::get('/', [TimeSheetController::class, 'getSmart'])->name('api.v1.raport.time-smart.get');
                Route::get('set-date/', [TimeSheetController::class, 'setDateSmart'])->name('api.v1.raport.time-smart.set.date');
            });
            Route::prefix('attendance-sheet')->group(function () {
                Route::get('summary', [AttendanceSheetController::class, 'getAttendanceSummary'])->name('api.v1.raport.attendance-sheet.summary');
                Route::get('/', [AttendanceSheetController::class, 'get'])->name('api.v1.raport.attendance-sheet.get');
                Route::get('set-date/', [AttendanceSheetController::class, 'setDate'])->name('api.v1.raport.attendance-sheet.set.date');
                Route::post('/export-xlsx', [AttendanceSheetController::class, 'exportPdf'])->name('api.v1.raport.attendance-sheet.export.xlsx');
            });
        });
        Route::prefix('calendar')->group(function () {
            Route::prefix('work-schedule')->group(function () {
                Route::get('/', [WorkScheduleController::class, 'get'])->name('api.v1.calendar.work-schedule.get');
                Route::get('set-date/', [WorkScheduleController::class, 'setDate'])->name('api.v1.calendar.work-schedule.set.date');
                Route::post('/export-xlsx', [WorkScheduleController::class, 'exportXlsx'])->name('api.v1.calendar.work-schedule.export.xlsx');
            });
            Route::prefix('work-schedule-calendar-user')->group(function () {
                Route::get('set-date/', [WorkScheduleController::class, 'setDateCalendarUser'])->name('api.v1.calendar.work-schedule-calendar-user.set.date');
            });
            Route::prefix('work-smart')->group(function () {
                Route::get('/', [WorkScheduleController::class, 'getSmart'])->name('api.v1.calendar.work-smart.get');
                Route::get('set-date/', [WorkScheduleController::class, 'setDateSmart'])->name('api.v1.calendar.work-smart.set.date');
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
            Route::prefix('balance')->group(function () {
                Route::get('/', [LeaveBalanceController::class, 'get'])->name('api.v1.leave.balance.get');
                Route::get('set-balance/', [LeaveBalanceController::class, 'setDate'])->name('api.v1.leave.balance.set.date');
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
        Route::middleware('can:manage-payroll')->group(function () {
            Route::get('raport/payroll/{user}/payments/{payment}/payslip', [\App\Http\Controllers\EmploymentNetController::class, 'payslip'])->name('raport.payroll.payslip');
            Route::post('team/user/{user}/company-payroll-parameters', [\App\Http\Controllers\EmploymentNetController::class, 'companyParameters'])->name('team.user.company-payroll-parameters');
            Route::get('raport/payroll/{user}/net', [\App\Http\Controllers\EmploymentNetController::class, 'show'])->name('raport.payroll.net');
            Route::post('raport/payroll/{user}/net/preview', [\App\Http\Controllers\EmploymentNetController::class, 'preview'])->name('raport.payroll.net.preview');
            Route::post('raport/payroll/{user}/net/approve', [\App\Http\Controllers\EmploymentNetController::class, 'approve'])->name('raport.payroll.net.approve');
            Route::post('team/user/{user}/tax-settings', [\App\Http\Controllers\EmploymentNetController::class, 'settings'])->name('team.user.tax-settings');
            Route::post('raport/payroll/{user}/opening', [\App\Http\Controllers\EmploymentNetController::class, 'opening'])->name('raport.payroll.opening');
            Route::get('raport/payroll', [\App\Http\Controllers\PayrollController::class, 'index'])->name('raport.payroll.index');
            Route::get('raport/payroll/{user}', [\App\Http\Controllers\PayrollController::class, 'show'])->name('raport.payroll.show');
            Route::post('raport/payroll/{user}/snapshot', [\App\Http\Controllers\PayrollController::class, 'snapshot'])->name('raport.payroll.snapshot');
            Route::post('raport/payroll/{user}/cost-inputs', [\App\Http\Controllers\PayrollController::class, 'costInputs'])->name('raport.payroll.cost-inputs');
            Route::post('team/user/{user}/employment', [\App\Http\Controllers\PayrollController::class, 'storeContract'])->name('team.user.employment.store');
        });
        Route::post('user-email-availability', \App\Http\Controllers\UserEmailAvailabilityController::class)
            ->middleware('throttle:60,1')->name('users.email-availability');
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
                Route::get('config_planing/{user}', [TeamUserController::class, 'config_planing'])->name('team.user.config_planing');
                Route::put('update_planing/{user}', [TeamUserController::class, 'update_planing'])->name('team.user.update_planing');
                Route::get('config_sms/{user}', [TeamUserController::class, 'config_sms'])->name('team.user.config_sms');
                Route::put('update_sms/{user}', [TeamUserController::class, 'update_sms'])->name('team.user.update_sms');
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
            Route::prefix('work-schedule')->group(function () {
                Route::get('/', [WorkScheduleController::class, 'index'])->name('calendar.work-schedule.index');
                Route::get('/calendar', [WorkScheduleController::class, 'calendarUser'])->name('calendar.work-schedule.calendar.user');
                Route::get('/create', [WorkScheduleController::class, 'create'])->name('calendar.work-schedule.create');
                Route::get('/create/{user}/{date}', [WorkScheduleController::class, 'createUser'])->name('calendar.work-schedule.create.user');
                Route::get('/edit/{work_block}', [WorkScheduleController::class, 'edit'])->name('calendar.work-schedule.edit');
                Route::delete('/edit/{work_block}', [WorkScheduleController::class, 'delete'])->name('calendar.work-schedule.delete');
                Route::get('/clear', [WorkScheduleController::class, 'clear'])->name('calendar.work-schedule.clear');
            });
            Route::prefix('work-smart')->group(function () {
                Route::get('/', [WorkScheduleController::class, 'smart'])->name('calendar.work-smart.index');
            });
        });

        // LEAVE APPLICATIONS --------------------------------------------------------------------
        Route::prefix('leave')->group(function () {
            Route::prefix('single')->group(function () {
                Route::get('/', [LeaveSingleController::class, 'index'])->name('leave.single.index');
                Route::get('/create', [LeaveSingleController::class, 'create'])->name('leave.single.create');
                Route::get('/edit/{leave}', [LeaveSingleController::class, 'edit'])->name('leave.single.edit');
                Route::delete('/delete/{leave}', [LeaveSingleController::class, 'delete'])->name('leave.single.delete');
            });

            Route::prefix('pending-review')->group(function () {
                Route::get('/', [LeavePendingReviewController::class, 'index'])->name('leave.pending.index');
                Route::get('/create', [LeavePendingReviewController::class, 'create'])->name('leave.pending.create');
                Route::get('/refill/{leave}', [LeavePendingReviewController::class, 'refill'])->name('leave.pending.refill');
                Route::get('/edit/{leave}', [LeavePendingReviewController::class, 'edit'])->name('leave.pending.edit');
                Route::delete('/delete/{leave}', [LeavePendingReviewController::class, 'delete'])->name('leave.pending.delete');
                Route::get('/toggle/{leave}', [LeavePendingReviewController::class, 'toggle'])->name('leave.pending.toggle');
                Route::get('accept/{leave}', [LeavePendingReviewController::class, 'accept'])->name('leave.pending.accept');
                Route::get('reject/{leave}', [LeavePendingReviewController::class, 'reject'])->name('leave.pending.reject');
                Route::get('cancel/{leave}', [LeavePendingReviewController::class, 'cancel'])->name('leave.pending.cancel');
            });
            Route::prefix('balance')->group(function () {
                Route::get('/', [LeaveBalanceController::class, 'index'])->name('leave.balance.index');
                Route::get('/store', [LeaveBalanceController::class, 'store'])->name('leave.balance.store');
                Route::get('/edit/{leave}', [LeaveBalanceController::class, 'edit'])->name('leave.balance.edit');
                Route::put('/update/{leave}', [LeaveBalanceController::class, 'update'])->name('leave.balance.update');
                Route::delete('/delete/{leave}', [LeaveBalanceController::class, 'delete'])->name('leave.balance.delete');
            });
        });

        // RCP -----------------------------------------------------------------------------------
        Route::prefix('rcp')->group(function () {
            Route::prefix('work-session')->group(function () {
                Route::get('/', [RCPController::class, 'index'])->name('rcp.work-session.index');
                Route::get('/calendar', [RCPController::class, 'calendarUser'])->name('rcp.work-session.calendar.user');
                Route::get('/create', [RCPController::class, 'create'])->name('rcp.work-session.create');
                Route::get('/create/{user}/{date}', [RCPController::class, 'createUser'])->name('rcp.work-session.create.user');
                Route::get('/create-note/{work_session}', [RCPController::class, 'createNote'])->name('rcp.work-session.create.note');
                Route::get('/create-start', [RCPController::class, 'createStart'])->name('rcp.work-session.create.start');
                Route::post('/store', [RCPController::class, 'store'])->name('rcp.work-session.store');
                Route::post('/store-note/{work_session}', [RCPController::class, 'storeNote'])->name('rcp.work-session.store.note');
                Route::post('/store-task/{work_session}', [RCPController::class, 'storeTask'])->name('rcp.work-session.store.task');
                Route::get('/start/plus/{work_session}', [RCPController::class, 'startPlus'])->name('rcp.work-session.start.plus');
                Route::get('/start/plus/fix/{work_session}', [RCPController::class, 'startPlusFix'])->name('rcp.work-session.start.plus.fix');
                Route::get('/stop/minus/{work_session}', [RCPController::class, 'stopMinus'])->name('rcp.work-session.stop.minus');
                Route::get('/edit/{work_session}', [RCPController::class, 'edit'])->name('rcp.work-session.edit');
                Route::get('/edit-note/{work_session}', [RCPController::class, 'editNote'])->name('rcp.work-session.edit.note');
                Route::put('/update/{work_session}', [RCPController::class, 'update'])->name('rcp.work-session.update');
                Route::put('/update-note/{work_session}', [RCPController::class, 'updateNote'])->name('rcp.work-session.update.note');
                Route::get('/show/{work_session}', [RCPController::class, 'show'])->name('rcp.work-session.show');
                Route::get('/fix/{work_session}', [RCPController::class, 'fix'])->name('rcp.work-session.fix');
                Route::get('/stop/{work_session}', [RCPController::class, 'stop'])->name('rcp.work-session.stop');
                Route::put('/update-start/{work_session}', [RCPController::class, 'updateStart'])->name('rcp.work-session.update.start');
                Route::delete('/delete/{work_session}', [RCPController::class, 'delete'])->name('rcp.work-session.delete');
            });

            Route::prefix('event')->group(function () {
                Route::get('/', [EventController::class, 'index'])->name('rcp.event.index');
                Route::get('/show/{event}', [EventController::class, 'show'])->name('rcp.event.show');
                Route::delete('/delete/{event}', [EventController::class, 'delete'])->name('rcp.event.delete');
                Route::get('accept/{event}', [EventController::class, 'accept'])->name('rcp.event.accept');
                Route::get('reject/{event}', [EventController::class, 'reject'])->name('rcp.event.reject');
            });
            Route::prefix('location')->group(function () {
                Route::get('/', [LocationController::class, 'index'])->name('rcp.location.index');
            });
        });

        // RAPORTS -------------------------------------------------------------------------------
        Route::prefix('raport')->group(function () {
            Route::prefix('time-sheet')->group(function () {
                Route::get('/', [TimeSheetController::class, 'index'])->name('raport.time-sheet.index');
            });
            Route::prefix('time-smart')->group(function () {
                Route::get('/', [TimeSheetController::class, 'smart'])->name('raport.time-smart.index');
            });

            Route::prefix('attendance-sheet')->group(function () {
                Route::get('/', [AttendanceSheetController::class, 'index'])->name('raport.attendance-sheet.index');
                Route::post('excel', [AttendanceSheetController::class, 'excel'])->name('raport.attendance-sheet.excel');
            });
        });
        // OBJECTS -------------------------------------------------------------------------------
        Route::prefix('objects')->group(function () {
            Route::get('/dashboard', [ObjectController::class, 'dashboard'])->name('object.dashboard');
            Route::get('/', [ObjectController::class, 'index'])->name('object.index');
            Route::get('/create', [ObjectController::class, 'create'])->name('object.create');
            Route::post('/store', [ObjectController::class, 'store'])->name('object.store');
            Route::get('/show/{object}', [ObjectController::class, 'show'])->name('object.show');
            Route::get('/edit/{object}', [ObjectController::class, 'edit'])->name('object.edit');
            Route::put('/update/{object}', [ObjectController::class, 'update'])->name('object.update');
            Route::patch('/status/{object}', [ObjectController::class, 'status'])->name('object.status');
            Route::delete('/delete/{object}', [ObjectController::class, 'delete'])->name('object.delete');
        });
        // SETTINGS -----------------------------------------------------------------------------
        Route::prefix('setting')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('setting');
            Route::get('create', [SettingController::class, 'create'])->name('setting.create');
            Route::post('store', [SettingController::class, 'store'])->name('setting.store');
            Route::get('edit/{company}', [SettingController::class, 'edit'])->name('setting.edit');
            Route::put('update/{company}', [SettingController::class, 'update'])->name('setting.update');
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
            Route::prefix('sms')->group(function () {
                Route::get('/', [SmsController::class, 'index'])->name('setting.sms');
            });
            Route::prefix('blog')->group(function () {
                Route::get('/', [BlogController::class, 'index'])->name('setting.blog');
                Route::get('create', [BlogController::class, 'create'])->name('setting.blog.create');
                Route::post('store', [BlogController::class, 'store'])->name('setting.blog.store');
                Route::get('edit/{blog}', [BlogController::class, 'edit'])->name('setting.blog.edit');
                Route::put('update/{blog}', [BlogController::class, 'update'])->name('setting.blog.update');
                Route::delete('delete/{blog}', [BlogController::class, 'delete'])->name('setting.blog.delete');
            });
            Route::prefix('crm')->group(function () {
                Route::get('/', [CrmController::class, 'index'])->name('setting.crm');
                Route::get('create', [CrmController::class, 'create'])->name('setting.crm.create');
                Route::post('store', [CrmController::class, 'store'])->name('setting.crm.store');
                Route::get('edit/{crm}', [CrmController::class, 'edit'])->name('setting.crm.edit');
                Route::put('update/{crm}', [CrmController::class, 'update'])->name('setting.crm.update');
                Route::get('ai-analysis/{crm}',[CrmController::class, 'aiNextStep'])->name('setting.crm.ai-analysis');
                 Route::delete('delete/{crm}', [CrmController::class, 'delete'])->name('setting.crm.delete');
            });
            Route::prefix('client')->group(function () {
                Route::get('/', [ClientController::class, 'index'])->name('setting.client');
                Route::get('create', [ClientController::class, 'create'])->name('setting.client.create');
                Route::post('store', [ClientController::class, 'store'])->name('setting.client.store');
                Route::get('show/{client}', [ClientController::class, 'show'])->name('setting.client.show');
                Route::get('edit/{client}', [ClientController::class, 'edit'])->name('setting.client.edit');
                Route::put('update/{client}', [ClientController::class, 'update'])->name('setting.client.update');
                Route::delete('delete/{client}', [ClientController::class, 'delete'])->name('setting.client.delete');
                Route::get('sms/{client}', [ClientController::class, 'sms'])->name('setting.client.sms');
            });
            Route::prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('setting.user');
                Route::get('edit-company/{user}', [UserController::class, 'editCompany'])->name('setting.user.edit-company');
                Route::get('edit-planing/{user}', [UserController::class, 'editPlaning'])->name('setting.user.edit-planing');
                Route::get('edit/{user}', [UserController::class, 'edit'])->name('setting.user.edit');
                Route::put('update/{user}', [UserController::class, 'update'])->name('setting.user.update');
                Route::get('create/{client}', [UserController::class, 'create'])->name('setting.user.create');
                Route::get('create/for/crm/{client}', [UserController::class, 'createForCrm'])->name('setting.user.create.for.crm');
                Route::post('store/for/crm/{client}', [UserController::class, 'storeForCrm'])->name('setting.user.store.for.crm');
                Route::get('edit/for/crm/{user}', [UserController::class, 'editForCrm'])->name('setting.user.edit.for.crm');
                Route::put('update/for/crm/{user}', [UserController::class, 'updateForCrm'])->name('setting.user.update.for.crm');
                Route::put('update-company/{user}', [UserController::class, 'updateCompany'])->name('setting.user.update-company');
                Route::get('show/{user}', [UserController::class, 'show'])->name('setting.user.show');
                Route::delete('delete/{user}', [UserController::class, 'delete'])->name('setting.user.delete');
                Route::get('config_planing/{user}', [UserController::class, 'config_planing'])->name('setting.user.config_planing');
                Route::put('update_planing/{user}', [UserController::class, 'update_planing'])->name('setting.user.update_planing');
                Route::get('config_sms/{user}', [UserController::class, 'config_sms'])->name('setting.user.config_sms');
                Route::put('update_sms/{user}', [UserController::class, 'update_sms'])->name('setting.user.update_sms');
                Route::post('disconnect/{user}', [UserController::class, 'disconnect'])->name('setting.user.disconnect');
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
            //Route::redirect('/', '/dashboard/setting/offer')->name('offer');
            //Route::redirect('create/{project}', '/dashboard/setting/offer/create/{project}')->name('offer.create.project');
            //Route::redirect('store', '/dashboard/setting/offer/store')->name('offer.store');
            //Route::redirect('show/{offer}', '/dashboard/setting/offer/show/{offer}')->name('offer.show');
            //Route::redirect('edit/{offer}', '/dashboard/setting/offer/edit/{offer}')->name('offer.edit');
            //Route::redirect('update/{offer}', '/dashboard/setting/offer/update/{offer}')->name('offer.update');
            //Route::redirect('delete/{offer}', '/dashboard/setting/offer/delete/{offer}')->name('offer.delete');

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

        Route::prefix('calendar')->group(function () {
            Route::prefix('all')->group(function () {
                Route::redirect('/', '/dashboard/calendar/work-schedule')->name('calendar.all.index');
                Route::redirect('/create', '/dashboard/calendar/work-schedule')->name('calendar.all.create');
                Route::redirect('/store', '/dashboard/calendar/work-schedule')->name('calendar.all.store');
                Route::redirect('/edit/{user}/{date}', '/dashboard/calendar/work-schedule')->name('calendar.all.edit');
                Route::redirect('/update/{plannedLeave}', '/dashboard/calendar/work-schedule')->name('calendar.all.update');
                Route::redirect('/delete/{plannedLeave}', '/dashboard/calendar/work-schedule')->name('calendar.all.delete');
            });
            Route::prefix('leave-application')->group(function () {
                Route::redirect('/', '/dashboard/calendar/work-schedule')->name('calendar.leave-application.index');
            });
        });
        Route::prefix('leave')->group(function () {
            Route::prefix('limit')->group(function () {
                Route::redirect('/', '/dashboard/leave/single')->name('leave.limit.index');
            });
            Route::prefix('group')->group(function () {
                Route::redirect('/', '/dashboard/leave/single')->name('leave.group.index');
            });
        });
    });
});

//Przekierowania ustawione dla wystawiania faktur (bo kiedys zmieniałem z fakturowni na rcp) a żeby teraz wystawić fakture trzeba błędy notfound ogarnąć
//REDIRECTS ---------------------------------------------------------------------------
Route::get('api-search-gus-old/gus/{nip}', [InvoiceController::class, 'gus'])
    ->middleware(['auth:sanctum', 'throttle:10,1'])->name('api.search.gus'); // legacy TSI

//todo
//poprawić kolorystykę ogólną
//poprawić marginesy i ramki wygladu kalendarza dark i light
//zrobić spójne inputy
//spolszyć walidacje logowanie i formularze krokowe
//liczenie dni urlopowych
//poprawić przyciski powrót następny zapisz w formularzach krokowych ring active focus
//poprawić kolorystykę rcp kalendarz i podgląd po lewej
//dodać możliwość mierzenia czasu pracy przy winosku praca zdalna i delegacja
