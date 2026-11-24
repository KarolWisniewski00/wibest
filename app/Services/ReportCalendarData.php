<?php

namespace App\Services;

use App\Models\{Event, Leave, WorkSession};
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ReportCalendarData
{
    private array $events = [];
    private array $sessions = [];
    private array $leaves = [];

    public function __construct(Collection $events, Collection $sessions, Collection $leaves)
    {
        foreach ($events as $event) {
            $this->events[$event->user_id][Carbon::parse($event->time)->toDateString()][$event->event_type] = true;
        }
        foreach ($sessions->sortBy('id') as $session) {
            $days = array_unique(array_filter([
                $session->eventStart ? Carbon::parse($session->eventStart->time)->toDateString() : null,
                $session->eventStop ? Carbon::parse($session->eventStop->time)->toDateString() : null,
            ]));
            foreach ($days as $day) $this->sessions[$session->user_id][$day][] = $session;
        }
        foreach ($leaves as $leave) $this->leaves[$leave->user_id][] = $leave;
    }

    public static function load(Collection $users, string $start, string $end, int $companyId): self
    {
        if ($users->isEmpty()) return new self(collect(), collect(), collect());
        $ids = $users->pluck('id');
        $from = Carbon::parse($start)->subDay()->startOfDay();
        $until = Carbon::parse($end)->addDay()->endOfDay();
        $events = Event::where('company_id', $companyId)->whereIn('user_id', $ids)->whereBetween('time', [$from, $until])->get();
        $sessions = WorkSession::with(['eventStart', 'eventStop', 'user'])->where('company_id', $companyId)->whereIn('user_id', $ids)
            ->where(fn ($q) => $q->whereHas('eventStart', fn ($q) => $q->whereBetween('time', [$from, $until]))
                ->orWhereHas('eventStop', fn ($q) => $q->whereBetween('time', [$from, $until])))->get();
        $leaves = Leave::whereIn('user_id', $ids)->whereIn('status', ['zaakceptowane', 'zrealizowane'])
            ->whereDate('start_date', '<=', $end)->whereDate('end_date', '>=', $start)->get();

        return new self($events, $sessions, $leaves);
    }

    public function day(int $userId, string $date): array
    {
        $day = Carbon::createFromFormat('d.m.y', $date)->startOfDay();
        $key = $day->toDateString();
        $sessions = collect($this->sessions[$userId][$key] ?? []);
        $leave = collect($this->leaves[$userId] ?? [])->first(fn ($leave) =>
            Carbon::parse($leave->start_date)->startOfDay()->lte($day) && Carbon::parse($leave->end_date)->endOfDay()->gte($day));
        return [
            $sessions->contains(fn ($s) => $s->eventStart && $s->eventStop
                && Carbon::parse($s->eventStart->time)->toDateString() === $key && Carbon::parse($s->eventStop->time)->toDateString() === $key),
            isset($this->events[$userId][$key]['start']),
            isset($this->events[$userId][$day->copy()->addDay()->toDateString()]['stop']),
            isset($this->events[$userId][$day->copy()->subDay()->toDateString()]['start']),
            isset($this->events[$userId][$key]['stop']),
            $sessions->contains(fn ($s) => $s->status === 'W trakcie pracy' && $s->eventStart && Carbon::parse($s->eventStart->time)->toDateString() === $key),
            (bool) $leave, $leave,
            $sessions->isNotEmpty() ? clone $sessions->first() : null,
            $sessions->isNotEmpty() ? clone $sessions->last() : null,
        ];
    }
}
