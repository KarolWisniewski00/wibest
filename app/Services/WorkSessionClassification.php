<?php

namespace App\Services;

use App\Models\WorkBlock;
use App\Models\WorkSession;
use App\Repositories\WorkSessionRepository;
use App\Services\Objects\WorkSessionReadQuery;
use Carbon\Carbon;

class WorkSessionClassification
{
    private array $days = [];

    public function __construct(private WorkSessionRepository $planning, private WorkSessionReadQuery $sessions) {}

    public function details(WorkSession $session): array
    {
        $result = ['category' => null, 'planned' => 0, 'daySeconds' => 0];
        $user = $session->user;
        $start = $session->eventStart ? Carbon::parse($session->eventStart->time) : null;
        $stop = $session->eventStop ? Carbon::parse($session->eventStop->time) : null;
        if (!$user || !$start || (int) $user->company_id !== (int) $session->company_id) return $result;
        if ($session->status === 'W trakcie pracy' && !$stop) return array_replace($result, ['category' => 'in_progress']);
        if ($session->status !== 'Praca zakończona' || !$stop || $stop->lt($start)) return $result;

        $key = $session->company_id.'|'.$user->id.'|'.$start->toDateString();
        if (!isset($this->days[$key])) {
            $block = $user->working_hours_regular === 'zmienny planing'
                ? WorkBlock::where('company_id', $session->company_id)->where('user_id', $user->id)->whereDate('starts_at', $start->toDateString())->first() : null;
            $planned = $this->planning->plannedSecondsForData($user, $start->format('d.m.y'), $block);
            $daily = $this->sessions->dailyTotals($session->company_id, [$user->id], $start, $start);
            $seconds = (int) ($daily->get($user->id.'|'.$start->toDateString())?->seconds ?? 0);
            $extra = ($user->working_hours_regular === 'zmienny planing' || $user->working_hours_custom) ? max(0, $seconds - $planned) : 0;
            $category = $seconds > 0 && $seconds < $planned ? 'under'
                : ($user->overtime && $extra > $user->overtime_threshold * 60 ? 'overtime' : 'normal');
            $this->days[$key] = ['category' => $category, 'planned' => $planned, 'daySeconds' => $seconds];
        }
        return $this->days[$key];
    }
}
