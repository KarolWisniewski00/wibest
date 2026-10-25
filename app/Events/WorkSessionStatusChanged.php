<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WorkSessionStatusChanged implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public int $userId,
        public int $workSessionId,
        public string $status,
        public ?string $startTime,
        public ?string $endTime = null,
    ) {}

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.' . $this->userId),
        ];
    }

    public function broadcastAs(): string
    {
        return 'work-session.updated';
    }

    public function broadcastWith(): array
    {
        return [
            'user_id' => $this->userId,
            'work_session_id' => $this->workSessionId,
            'status' => $this->status,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
        ];
    }
}