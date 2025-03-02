<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\DailyReportMail; // Importuj swoją klasę mailową
use App\Models\User;
use App\Models\WorkSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendDailyEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Utwórz nowe zadanie.
     */
    public function __construct()
    {
        //
    }

    /**
     * Wykonaj zadanie.
     */
    public function handle()
    {
        $oneWeekAgo = Carbon::now()->subWeek();

        $work_sessions = WorkSession::where('company_id', 2)
            ->where('status', 'Praca zakończona')
            ->where('start_time', '>=', $oneWeekAgo)
            ->orderBy('updated_at', 'desc')
            ->get();
        $users = User::where('company_id', 2)->where('role', 'admin')->get();
        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new DailyReportMail($work_sessions));
        }
    }
}
