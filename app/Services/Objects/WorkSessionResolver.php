<?php

namespace App\Services\Objects;

use App\Models\WorkObject;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class WorkSessionResolver
{
    public function coordinates($latitude, $longitude): ?array
    {
        if (!is_numeric($latitude) || !is_numeric($longitude)
            || abs((float) $latitude) > 90 || abs((float) $longitude) > 180) {
            return null;
        }

        return [(float) $latitude, (float) $longitude];
    }

    public function points(object $session): array
    {
        return array_values(array_filter([
            $this->coordinates($session->start_lat, $session->start_lng),
            $this->coordinates($session->stop_lat, $session->stop_lng),
        ]));
    }

    public function containsPoint(WorkObject $object, array $point): bool
    {
        $center = $this->coordinates($object->location?->latitude, $object->location?->longitude);

        return $center && $object->allowed_distance > 0 && $this->distance($point, $center) <= $object->allowed_distance;
    }

    /** A session is indivisible: its complete interval and every available GPS point must match. */
    public function resolve(object $session, Collection $objects): WorkObject|AttentionReason
    {
        $points = $this->points($session);
        if (count($points) !== 2) {
            return AttentionReason::MissingLocation;
        }
        if (!$session->start_time || ($session->stop_time && $session->stop_time < $session->start_time)) {
            return AttentionReason::InvalidSession;
        }
        $start = Carbon::parse($session->start_time);
        $end = $session->stop_time ? Carbon::parse($session->stop_time) : now();
        $spatial = $objects->filter(function ($object) use ($session, $points) {
            if ((int) $object->company_id !== (int) $session->company_id) {
                return false;
            }
            foreach ($points as $point) {
                if (!$this->containsPoint($object, $point)) {
                    return false;
                }
            }

            return true;
        });
        if ($spatial->isEmpty()) {
            return AttentionReason::OutsideObjects;
        }
        $dated = $spatial->filter(fn ($object) => (!$object->starts_at || $start->gte($object->starts_at))
            && (!$object->ends_at || $end->lte($object->ends_at)));
        if ($dated->isEmpty()) {
            return AttentionReason::OutsidePeriod;
        }
        $active = $dated->filter(fn ($object) => ($object->firstStatusPeriod?->status === WorkObject::STATUS_ACTIVE
            && $start->lt($object->firstStatusPeriod->starts_at)
            && (!$object->firstStatusPeriod->ends_at || $end->lte($object->firstStatusPeriod->ends_at)))
            || $object->statusPeriods->contains(fn ($period) =>
            $period->status === WorkObject::STATUS_ACTIVE && $start->gte($period->starts_at)
            && (!$period->ends_at || ($start->lt($period->ends_at) && $end->lte($period->ends_at)))
        ));
        if ($active->isEmpty()) {
            $unknown = $dated->contains(fn ($object) => $object->statusPeriods->contains(fn ($period) =>
                $period->initial_snapshot && $start->lt($period->starts_at)
            ));

            return $unknown ? AttentionReason::UnknownHistory : AttentionReason::InactiveObject;
        }
        if ($active->count() > 1) {
            // Assignments only break ties; they do not override geography, dates or status.
            $assigned = $active->filter(fn ($object) => $object->users->contains(fn ($user) =>
                (int) $user->id === (int) $session->user_id
                && (int) $user->company_id === (int) $session->company_id
                && (!$user->pivot->created_at || $user->pivot->created_at->lte($start))
            ));
            if ($assigned->count() !== 1) {
                return AttentionReason::AmbiguousObject;
            }
            $active = $assigned;
        }
        if ($session->status === 'W trakcie pracy') {
            return AttentionReason::InProgress;
        }
        if ($session->status !== 'Praca zakończona' || !$session->stop_time
            || !preg_match('/^\d+:[0-5]\d:[0-5]\d$/D', $session->time_in_work ?? '')) {
            return AttentionReason::InvalidSession;
        }

        return $active->first();
    }

    private function distance(array $a, array $b): float
    {
        $lat = deg2rad($b[0] - $a[0]);
        $lng = deg2rad($b[1] - $a[1]);
        $h = sin($lat / 2) ** 2 + cos(deg2rad($a[0])) * cos(deg2rad($b[0])) * sin($lng / 2) ** 2;

        return 6371000 * 2 * asin(sqrt(min(1, max(0, $h))));
    }
}
