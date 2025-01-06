<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\DailyReportMail; // Importuj swoją klasę mailową
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
        Mail::to('karol.wisniewski2901@gmail.com')->send(new DailyReportMail());
    }
}
