<?php

namespace App\Mail;

use App\Jobs\Middleware\SendTeamUserNotificationOnce;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;

class TeamUserCreated extends Mailable implements ShouldQueue
{
    use Queueable;

    public $tries = 1;

    public function __construct(public array $details, public int $userId)
    {
        $this->afterCommit();

        // Never perform this notification's SMTP delivery in the HTTP request.
        $connection = config('queue.default');
        $driver = config("queue.connections.{$connection}.driver");
        $this->onConnection(in_array($driver, ['sync', 'null', null], true) ? 'database' : $connection);
    }

    public function build()
    {
        return $this->subject('WIBEST – Nowy użytkownik w firmie '.$this->details['company'])
            ->view('emails.team-user-created');
    }

    public function middleware(): array
    {
        return [new SendTeamUserNotificationOnce($this->userId)];
    }

    public function failed(\Throwable $exception): void
    {
        Log::warning('Team user notification delivery failed.', [
            'user_id' => $this->userId,
            'exception' => get_class($exception),
        ]);
    }
}
