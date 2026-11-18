<?php

namespace App\Services\Objects;

use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class WorkSessionReadQuery
{
    /** Query Builder deliberately avoids WorkSession's mutating retrieved observer. */
    public function base(int $companyId): Builder
    {
        return DB::table('work_sessions as s')
            ->join('users as u', fn ($join) => $join->on('u.id', '=', 's.user_id')->where('u.company_id', $companyId))
            ->leftJoin('events as start', fn ($join) => $join->on('start.id', '=', 's.event_start_id')
                ->on('start.user_id', '=', 's.user_id')->where('start.company_id', $companyId))
            ->leftJoin('events as stop', fn ($join) => $join->on('stop.id', '=', 's.event_stop_id')
                ->on('stop.user_id', '=', 's.user_id')->where('stop.company_id', $companyId))
            ->where('s.company_id', $companyId)
            ->where(fn ($q) => $q->whereNull('s.event_start_id')->orWhereNotNull('start.id'))
            ->where(fn ($q) => $q->whereNull('s.event_stop_id')->orWhereNotNull('stop.id'));
    }

    public function month(int $companyId, Carbon $month): Builder
    {
        $from = $month->copy()->startOfMonth()->toDateTimeString();
        $until = $month->copy()->startOfMonth()->addMonth()->toDateTimeString();

        return $this->base($companyId)
            ->leftJoin('locations as sl', 'sl.id', '=', 'start.location_id')
            ->leftJoin('locations as el', 'el.id', '=', 'stop.location_id')
            ->where(function ($q) use ($from, $until) {
                $q->where(fn ($q) => $q->where('start.time', '>=', $from)->where('start.time', '<', $until))
                    ->orWhere(fn ($q) => $q->whereNull('start.time')->where('s.created_at', '>=', $from)->where('s.created_at', '<', $until));
            })
            ->select('s.id', 's.company_id', 's.user_id', 's.status', 's.time_in_work', 's.task_id', 's.created_at', 'u.name as employee',
                'start.time as start_time', 'stop.time as stop_time', 'sl.latitude as start_lat',
                'sl.longitude as start_lng', 'el.latitude as stop_lat', 'el.longitude as stop_lng');
    }

    public function dailyTotals(int $companyId, array $userIds, Carbon $month): \Illuminate\Support\Collection
    {
        // The stored duration is authoritative; do not recalculate START/STOP elapsed time.
        $seconds = '(CAST(SUBSTR(s.time_in_work, 1, LENGTH(s.time_in_work) - 6) AS SIGNED) * 3600'
            .' + CAST(SUBSTR(s.time_in_work, -5, 2) AS SIGNED) * 60 + CAST(SUBSTR(s.time_in_work, -2) AS SIGNED))';

        return $this->base($companyId)->whereIn('s.user_id', $userIds)->where('s.status', 'Praca zakończona')
            ->where('start.time', '>=', $month->copy()->startOfMonth())
            ->where('start.time', '<', $month->copy()->startOfMonth()->addMonth())
            ->selectRaw('s.user_id, DATE(start.time) as work_date, SUM('.$seconds.') as seconds')
            ->groupBy('s.user_id')->groupByRaw('DATE(start.time)')->get()
            ->keyBy(fn ($row) => $row->user_id.'|'.$row->work_date);
    }
}
