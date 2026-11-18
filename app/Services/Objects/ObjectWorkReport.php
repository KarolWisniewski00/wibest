<?php

namespace App\Services\Objects;

use App\Models\User;
use App\Models\WorkBlock;
use App\Models\WorkObject;
use App\Repositories\WorkSessionRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ObjectWorkReport
{
    public function __construct(
        private WorkSessionReadQuery $sessions,
        private WorkSessionResolver $resolver,
        private WorkSessionRepository $planning,
    ) {}

    public function month(Request $request, ?WorkObject $object = null): Carbon
    {
        $data = $request->validate(['month' => ['nullable', 'date_format:Y-m'], 'work_page' => ['nullable', 'integer', 'min:1']]);
        if ($request->hasSession()) {
            if (!empty($data['month'])) {
                $request->session()->put('objects.month', $data['month']);
            } elseif ($remembered = $request->session()->get('objects.month')) {
                $data['month'] = $remembered;
            }
        }
        if (!empty($data['month'])) {
            return Carbon::createFromFormat('!Y-m', $data['month']);
        }
        $default = now();
        if ($object?->ends_at && $default->gt($object->ends_at)) {
            $default = $object->ends_at->copy();
        } elseif ($object?->starts_at && $default->lt($object->starts_at)) {
            $default = $object->starts_at->copy();
        }

        return $default->startOfMonth();
    }

    public function build(int $companyId, Carbon $month, Request $request, ?WorkObject $object = null, bool $includeAttention = false): array
    {
        abort_if($object && (int) $object->company_id !== $companyId, 404);
        $selectedEmployeeId = null;
        if ($object) {
            $employee = $request->validate(['employee_id' => ['nullable', 'integer', 'min:1']]);
            $selectedEmployeeId = isset($employee['employee_id']) ? (int) $employee['employee_id'] : null;
            if ($selectedEmployeeId !== null) {
                abort_unless($object->users()->where('users.company_id', $companyId)->whereKey($selectedEmployeeId)->exists(), 403);
            }
        }
        $filter = $request->validate(['work_category' => ['nullable', \Illuminate\Validation\Rule::in(['all', 'under', 'normal', 'overtime', 'attention'])]])['work_category'] ?? 'all';
        $search = trim($request->validate(['work_search' => ['nullable', 'string', 'max:255']])['work_search'] ?? '');
        $objectSeconds = [];
        $workerSeconds = [];
        $readings = [];
        $stats = ['under' => ['count' => 0, 'seconds' => 0], 'normal' => ['count' => 0, 'seconds' => 0],
            'overtime' => ['count' => 0, 'seconds' => 0], 'attention' => 0, 'seconds' => 0, 'reasons' => []];
        $page = max(1, (int) $request->input('work_page', 1));
        $rows = [];
        $total = 0;
        $query = $this->sessions->month($companyId, $month);
        if ($object) {
            // Current formal assignments gate every preview section, including AJAX and map readings.
            // Use the relation as an SQL subquery so a detached or foreign-company worker cannot leak in.
            $query->whereIn('s.user_id', $object->users()->where('users.company_id', $companyId)
                ->select('users.id')->reorder()->toBase());
            if (!$includeAttention) {
                $query->where('s.status', 'Praca zakończona')->whereNotNull('stop.time')
                    ->when($object->starts_at, fn ($q, $start) => $q->where('start.time', '>=', $start))
                    ->when($object->ends_at, fn ($q, $end) => $q->where('stop.time', '<=', $end));
            }
            // Missing GPS cannot pass a spatial SQL prefilter. For attention reports, examine the
            // assigned workers' selected month and let the shared resolver identify the reason.
            if (!$includeAttention) {
                $center = $this->resolver->coordinates($object->location?->latitude, $object->location?->longitude);
                if ($center) {
                    $delta = $object->allowed_distance / 110000;
                    $query->where(fn ($q) => $q->whereBetween('sl.latitude', [$center[0] - $delta, $center[0] + $delta])
                        ->orWhereBetween('el.latitude', [$center[0] - $delta, $center[0] + $delta]));
                } else {
                    $query->whereRaw('1 = 0');
                }
            }
        } else {
            $query->whereIn('s.user_id', User::query()->where('users.company_id', $companyId)
                ->whereHas('objects', fn ($q) => $q->where('objects.company_id', $companyId))
                ->select('users.id')->reorder()->toBase());
        }
        $query->chunkById(250, function ($batch) use ($companyId, $month, $object, $selectedEmployeeId, $includeAttention, $page, $filter, $search, &$objectSeconds, &$workerSeconds, &$readings, &$rows, &$total, &$stats) {
            $ids = $batch->pluck('user_id')->unique()->all();
            $users = User::where('company_id', $companyId)->whereIn('id', $ids)->get()->keyBy('id');
            $totals = $this->sessions->dailyTotals($companyId, $ids, $month);
            $blocks = WorkBlock::where('company_id', $companyId)->whereIn('user_id', $ids)
                ->where('starts_at', '>=', $month)->where('starts_at', '<', $month->copy()->addMonth())
                ->orderBy('id')->get()->groupBy(fn ($block) => $block->user_id.'|'.$block->starts_at->toDateString());
            $objects = $this->candidates($companyId, $batch, $ids, $month);
            foreach ($batch as $session) {
                $result = $this->resolver->resolve($session, $objects);
                $belongsToObject = $result instanceof WorkObject && (!$object || $result->id === $object->id);
                $relatedAttention = $object && $includeAttention && $result instanceof AttentionReason
                    && ($result === AttentionReason::MissingLocation
                        || collect($this->resolver->points($session))->contains(fn ($point) => $this->resolver->containsPoint($object, $point)));
                // Preview table eligibility is assignment + employee + month, not geolocation/category.
                // Keep the narrower geographic scope only for object totals and map readings.
                if ($object && !$includeAttention && !$belongsToObject) {
                    continue;
                }
                $contributesToObject = !$object || $belongsToObject || $relatedAttention;
                // Preserve each assigned worker's monthly total on the selectable list. Resolve once;
                // only the active employee contributes to cards, readings and table below.
                if ($object && $belongsToObject) {
                    $workerSeconds[$session->user_id] = ($workerSeconds[$session->user_id] ?? 0) + self::seconds($session->time_in_work);
                }
                if ($selectedEmployeeId !== null && (int) $session->user_id !== $selectedEmployeeId) {
                    continue;
                }
                $session->reason = $result instanceof AttentionReason ? $result : null;
                $session->object = $result instanceof WorkObject ? $result : null;
                $session->seconds = self::seconds($session->time_in_work);
                $session->category = null;
                $session->planned = $session->day_under = $session->day_extra = 0;
                $session->day_difference = null;
                if (!$session->reason) {
                    $date = Carbon::parse($session->start_time);
                    $key = $session->user_id.'|'.$date->toDateString();
                    $user = $users->get($session->user_id);
                    if (!$user) {
                        continue;
                    }
                    $session->planned = $this->planning->plannedSecondsForData($user, $date->format('d.m.y'), $blocks->get($key)?->first());
                    $daySeconds = (int) ($totals->get($key)?->seconds ?? 0);
                    // Presentation only: actual day difference, independent of overtime approval/tolerance.
                    $session->day_difference = $session->planned > 0 ? $daySeconds - $session->planned : null;
                    // RCP marks the entire employee day; never apply a separate daily norm per object/session.
                    $session->day_under = $daySeconds > 0 ? max(0, $session->planned - $daySeconds) : 0;
                    $extra = ($user->working_hours_regular === 'zmienny planing' || $user->working_hours_custom)
                        ? max(0, $daySeconds - $session->planned) : 0;
                    $session->day_extra = $user->overtime && $extra > $user->overtime_threshold * 60 ? $extra : 0;
                    $session->category = $session->day_under > 0 ? 'under' : ($session->day_extra > 0 ? 'overtime' : 'normal');
                    if ($contributesToObject) {
                        $stats[$session->category]['count']++;
                        $stats[$session->category]['seconds'] += $session->seconds;
                        $stats['seconds'] += $session->seconds;
                        $objectSeconds[$result->id] = ($objectSeconds[$result->id] ?? 0) + $session->seconds;
                    }
                    if ($object && $belongsToObject) {
                        foreach (['start' => 'START', 'stop' => 'STOP'] as $prefix => $type) {
                            $readings[] = ['lat' => (float) $session->{$prefix.'_lat'}, 'lng' => (float) $session->{$prefix.'_lng'},
                                'type' => $type, 'employee' => $session->employee, 'object' => $object->name,
                                'time' => Carbon::parse($session->{$prefix.'_time'})->format('d.m.Y H:i:s')];
                        }
                    }
                } elseif ($contributesToObject) {
                    $stats['attention']++;
                    $reason = $session->reason->value;
                    $stats['reasons'][$reason] = ($stats['reasons'][$reason] ?? 0) + 1;
                }
                $matchesSearch = $search === '' || \Illuminate\Support\Str::contains(mb_strtolower($session->employee), mb_strtolower($search))
                    || ($session->object && \Illuminate\Support\Str::contains(mb_strtolower($session->object->name), mb_strtolower($search)));
                if ($matchesSearch && ($filter === 'all' || ($filter === 'attention' ? $session->reason !== null : $session->category === $filter))) {
                    if ($total >= ($page - 1) * 25 && $total < $page * 25) {
                        $user = $users->get($session->user_id);
                        // Plain presentation data: x-user-name must not call User::getToday() per row.
                        $session->user = (object) ['name' => $session->employee, 'role' => $user?->role,
                            'profile_photo_url' => $user?->profile_photo_url];
                        $session->missing_task = (bool) ($user?->overtime_task && !$session->task_id && $session->day_extra > 0);
                        $rows[] = $session;
                    }
                    $total++;
                }
            }
        }, 's.id', 'id');

        return ['selected_employee_id' => $selectedEmployeeId, 'stats' => $stats, 'object_seconds' => $objectSeconds, 'worker_seconds' => $workerSeconds, 'readings' => $readings, 'category' => $filter, 'search' => $search, 'rows' => new LengthAwarePaginator($rows, $total, 25, $page, [
            'path' => $request->url(), 'pageName' => 'work_page', 'query' => array_merge($request->query(), ['month' => $month->format('Y-m'), 'work_category' => $filter, 'work_search' => $search]),
        ])];
    }

    private function candidates(int $companyId, Collection $batch, array $userIds, Carbon $month): Collection
    {
        $points = $batch->flatMap(fn ($session) => $this->resolver->points($session));
        if ($points->isEmpty()) {
            return collect();
        }
        $min = $points->min(fn ($point) => $point[0]);
        $max = $points->max(fn ($point) => $point[0]);

        // Conservative latitude bounding strip in SQL, exact spherical distance in the resolver.
        // 110000 is deliberately below metres/degree, so the prefilter cannot drop a radius-edge match.
        return WorkObject::where('company_id', $companyId)
            ->whereHas('location', fn ($q) => $q->whereNotNull('latitude')->whereNotNull('longitude')
                ->whereRaw('latitude >= ? - objects.allowed_distance / 110000.0', [$min])
                ->whereRaw('latitude <= ? + objects.allowed_distance / 110000.0', [$max]))
            ->with(['location', 'firstStatusPeriod', 'users' => fn ($q) => $q->where('users.company_id', $companyId)->whereIn('users.id', $userIds),
                'statusPeriods' => fn ($q) => $q->where(fn ($q) => $q->where('initial_snapshot', true)
                    ->orWhere(fn ($q) => $q->where(fn ($q) => $q->whereNull('ends_at')->orWhere('ends_at', '>=', $month))))])
            ->get();
    }

    public static function seconds(?string $time): int
    {
        if (!preg_match('/^(\d+):([0-5]\d):([0-5]\d)$/D', $time ?? '', $parts)) {
            return 0;
        }

        return (int) $parts[1] * 3600 + (int) $parts[2] * 60 + (int) $parts[3];
    }

    public static function duration(int $seconds): string
    {
        return sprintf('%02d:%02d:%02d', intdiv($seconds, 3600), intdiv($seconds % 3600, 60), $seconds % 60);
    }
}
