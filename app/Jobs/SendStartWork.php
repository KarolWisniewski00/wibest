<?php

namespace App\Jobs;

use App\Models\SentMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;
use App\Models\WorkBlock;
use App\Services\SmsApi;
use Carbon\Carbon;
use Exception;

class SendStartWork implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function handle()
    {
        $users = User::all();

        foreach ($users as $k => $user) {

            if ($user->working_hours_regular == "zmienny planing") {
                $wb = WorkBlock::where('user_id', $user->id)
                    ->whereDate('starts_at', Carbon::today())
                    ->first();
                $workStart = $wb ? Carbon::parse($wb->starts_at) : null;
                $workStop = $wb ? Carbon::parse($wb->ends_at) : null;
            } else {
                $workStart = $user->working_hours_from
                    ? Carbon::parse($user->working_hours_from)
                    : null;
                $workStop = $user->working_hours_to
                    ? Carbon::parse($user->working_hours_to)
                    : null;
            }

            if (!$workStart) {
                continue;
            }

            $sendAt = $workStart->copy()->subMinutes(15);


            if ($sendAt->isPast()) {
                continue;
            }
            SendDelayedStartWork::dispatch(
                $user->id,
                $this->buildMessage($user, $workStart->format('H:i'), $workStop->format('H:i')),
                'RCP',
                'Przypomnienie o rozpoczęciu pracy'
            )->delay($sendAt);
        }
    }

    private function buildMessage($user, $workStart, $workStop)
    {
        return "Start pracy za 15 minut
Dzisiejszy plan:
{$workStart} - {$workStop}

wibest.pl/login";
    }
}
