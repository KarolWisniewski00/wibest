<?php

namespace App\Jobs\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Throwable;

class SendTeamUserNotificationOnce
{
    public function __construct(public int $userId) {}

    public function handle($job, Closure $next): void
    {
        // A permanent, atomic claim also protects against parallel workers and
        // redelivery after SMTP accepted a message but the worker lost its ACK.
        $claimed = DB::table('team_user_notifications')->insertOrIgnore([
            'user_id' => $this->userId,
            'started_at' => now(),
        ]);

        if (! $claimed) {
            return;
        }

        try {
            $next($job);
            DB::table('team_user_notifications')->where('user_id', $this->userId)
                ->update(['sent_at' => now()]);
        } catch (Throwable $exception) {
            DB::table('team_user_notifications')->where('user_id', $this->userId)
                ->update(['failed_at' => now()]);

            throw $exception;
        }
    }
}
