<?php

namespace App\Http\Controllers\Object;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\User;
use App\Models\WorkObject;
use App\Services\Objects\ObjectWorkReport;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ObjectController extends Controller
{
    private function companyId(): int
    {
        abort_unless(auth()->user()->company_id, 403, 'Najpierw skonfiguruj firmę.');

        return (int) auth()->user()->company_id;
    }

    public function index(Request $request)
    {
        return $this->dashboard($request);
    }

    public function dashboard(Request $request): \Illuminate\View\View|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
    {
        $companyId = $this->companyId();
        $reportService = app(ObjectWorkReport::class);
        $month = $reportService->month($request);
        if ($request->header('X-Object-Work') === '1') {
            $workReport = $reportService->build($companyId, $month, $request);

            return response()->view('admin.object.partials.work-results', compact('workReport', 'month'))
                ->header('X-Object-Work', '1');
        }
        $filters = $request->validate([
            'status' => ['nullable', Rule::in(array_keys(WorkObject::STATUSES))],
            'search' => ['nullable', 'string', 'max:255'],
        ]);
        $query = WorkObject::where('company_id', $companyId);
        $filtered = (clone $query)
            ->when($filters['status'] ?? null, fn ($q, $status) => $q->where('status', $status))
            ->when($filters['search'] ?? null, fn ($q, $search) => $q->where('name', 'like', '%'.$search.'%'));
        if ($request->header('X-Object-Dashboard') === '1') {
            $objects = $filtered->with('location')->withCount('users')->latest()->paginate(15)->withQueryString();
            $counts = (clone $query)->selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status');
            $workReport = $reportService->build($companyId, $month, $request);
            $data = compact('objects', 'counts', 'workReport', 'month');

            return response()->json([
                'month' => $month->format('Y-m'),
                'period' => view('admin.object.partials.work-period', $data + ['asyncPeriod' => true])->render(),
                'cards' => view('admin.object.partials.work-cards', $data + ['dashboard' => true])->render(),
                'objects' => view('admin.object.partials.list', $data)->render(),
                'work' => view('admin.object.partials.work-table', $data + ['dashboard' => true])->render(),
            ])->header('X-Object-Dashboard', '1');
        }
        if ($request->header('X-Object-List') === '1') {
            $objects = $filtered->with('location')->withCount('users')->latest()->paginate(15)->withQueryString();
            $workReport = $reportService->build($companyId, $month, $request);

            return response()->view('admin.object.partials.list-results', compact('objects', 'workReport', 'month'))
                ->header('X-Object-List', '1');
        }
        $counts = (clone $query)->selectRaw('status, COUNT(*) as total')->groupBy('status')->pluck('total', 'status');
        $total = $counts->sum();
        $workerCount = User::where('company_id', $companyId)
            ->whereHas('objects', fn ($q) => $q->where('objects.company_id', $companyId))->count();
        $mapObjects = (clone $filtered)->with('location')->get()->filter(fn ($object) =>
            is_numeric($object->location?->latitude) && is_numeric($object->location?->longitude)
        )->map(fn ($object) => [
            'name' => $object->name,
            'address' => $object->location->address ?? $object->location->name,
            'lat' => (float) $object->location->latitude,
            'lng' => (float) $object->location->longitude,
            'status' => $object->status,
            'url' => route('object.show', $object),
        ])->values();
        $objects = $filtered->with('location')->withCount('users')->latest()->paginate(15)->withQueryString();

        $workReport = $reportService->build($companyId, $month, $request);

        return view('admin.object.dashboard', compact('objects', 'counts', 'total', 'workerCount', 'mapObjects', 'month', 'workReport'));
    }

    public function create()
    {
        $users = User::where('company_id', $this->companyId())->orderBy('name')->get();
        $object = new WorkObject(['status' => WorkObject::STATUS_ACTIVE, 'allowed_distance' => 100]);

        return view('admin.object.create', compact('users', 'object'));
    }

    public function show(WorkObject $object, Request $request)
    {
        abort_unless((int) $object->company_id === $this->companyId(), 404);
        $this->authorize('view', $object);
        $object->load(['location', 'users' => fn ($query) => $query->where('users.company_id', $this->companyId())]);

        $reportService = app(ObjectWorkReport::class);
        $month = $reportService->month($request, $object);
        $workReport = $reportService->build($this->companyId(), $month, $request, $object, true);
        if ($request->header('X-Object-Preview') === '1') {
            $data = compact('object', 'month', 'workReport');

            return response()->json([
                'month' => $month->format('Y-m'),
                'period' => view('admin.object.partials.work-period', $data + ['asyncPeriod' => true])->render(),
                'cards' => view('admin.object.partials.work-cards', $data + ['preview' => true])->render(),
                'workers' => view('admin.object.partials.preview-workers', $data)->render(),
                'work' => view('admin.object.partials.work-table', $data)->render(),
                'readings' => $workReport['readings'],
                'selectedEmployeeId' => $workReport['selected_employee_id'],
            ])->header('X-Object-Preview', '1');
        }
        if ($request->header('X-Object-Work') === '1') {
            return response()->view('admin.object.partials.work-results', compact('workReport', 'month', 'object'))
                ->header('X-Object-Work', '1');
        }
        $history = $object->statusPeriods()->orderByDesc('starts_at')->orderByDesc('id')->paginate(10, ['*'], 'history_page')->withQueryString();

        return view('admin.object.show', compact('object', 'month', 'workReport', 'history'));
    }

    public function status(Request $request, WorkObject $object)
    {
        abort_unless((int) $object->company_id === $this->companyId(), 404);
        $this->authorize('update', $object);
        $data = $request->validate([
            'status' => ['required', Rule::in(array_keys(WorkObject::STATUSES))],
            'month' => ['nullable', 'date_format:Y-m'],
        ]);
        DB::transaction(function () use ($object, $data) {
            $current = WorkObject::where('company_id', $this->companyId())->whereKey($object->id)->lockForUpdate()->firstOrFail();
            $current->update(['status' => $data['status']]);
        });

        return redirect()->route('object.show', ['object' => $object, 'month' => $data['month'] ?? null])
            ->with('success', 'Status obiektu został zmieniony i zapisany w historii.');
    }

    public function edit(WorkObject $object)
    {
        abort_unless((int) $object->company_id === $this->companyId(), 404);
        $this->authorize('update', $object);
        $object->load('location', 'users');
        $users = User::where('company_id', $this->companyId())->orderBy('name')->get();

        return view('admin.object.edit', compact('users', 'object'));
    }

    public function store(Request $request)
    {
        $companyId = $this->companyId();
        $data = $this->validated($request, $companyId);
        DB::transaction(function () use ($data, $companyId) {
            $object = new WorkObject(['company_id' => $companyId]);
            $this->saveObject($object, $data);
        });

        return redirect()->route('object.dashboard')->with('success', 'Obiekt został utworzony.');
    }

    public function update(Request $request, WorkObject $object)
    {
        abort_unless((int) $object->company_id === $this->companyId(), 404);
        $this->authorize('update', $object);
        $data = $this->validated($request, $this->companyId());
        DB::transaction(function () use ($object, $data) {
            $current = WorkObject::where('company_id', $this->companyId())->whereKey($object->id)->lockForUpdate()->firstOrFail();
            $this->saveObject($current, $data);
        });

        return redirect()->route('object.dashboard')->with('success', 'Zmiany obiektu zostały zapisane.');
    }

    public function delete(WorkObject $object)
    {
        abort_unless((int) $object->company_id === $this->companyId(), 404);
        $this->authorize('delete', $object);

        try {
            // The existing foreign keys remove worker assignments, but preserve shared locations and users.
            $deleted = DB::transaction(fn () => $object->delete());
        } catch (QueryException $exception) {
            if (!in_array((string) $exception->getCode(), ['23000', '23503'], true)) {
                throw $exception;
            }

            return redirect()->route('object.show', $object)
                ->with('fail', 'Nie można usunąć obiektu, ponieważ jest powiązany z innymi danymi.');
        }

        if (!$deleted) {
            return redirect()->route('object.show', $object)
                ->with('fail', 'Usunięcie obiektu zostało zablokowane przez reguły modułu.');
        }

        return redirect()->route('object.dashboard')->with('success', 'Obiekt został usunięty.');
    }

    private function validated(Request $request, int $companyId): array
    {
        $request->merge(['users' => $request->input('users', [])]);

        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'object_type' => ['nullable', Rule::in(array_keys(WorkObject::TYPES))],
            'status' => ['required', Rule::in(array_keys(WorkObject::STATUSES))],
            'datetime_start' => ['nullable', 'date_format:d.m.Y H:i'],
            'datetime_end' => ['nullable', 'date_format:d.m.Y H:i', 'after_or_equal:datetime_start'],
            'allowed_distance' => ['required', 'integer', 'min:1', 'max:10000'],
            'content' => ['nullable', 'string', 'max:50000'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
            'formatted_address' => ['nullable', 'string', 'max:255'],
            'users' => ['nullable', 'array'],
            'users.*' => ['integer', 'distinct', Rule::exists('users', 'id')->where('company_id', $companyId)->where('role', '!=', 'CRM')],
        ], [], [
            'name' => 'nazwa obiektu', 'object_type' => 'typ obiektu', 'status' => 'status',
            'datetime_start' => 'data rozpoczęcia', 'datetime_end' => 'data zakończenia',
            'allowed_distance' => 'dozwolona odległość', 'latitude' => 'szerokość geograficzna',
            'longitude' => 'długość geograficzna', 'users.*' => 'pracownik',
        ]);
    }

    private function saveObject(WorkObject $object, array $data): void
    {
        // Locations are shared with RCP. Create a new location only when its data changes.
        $location = $object->exists ? $object->location : null;
        if (!$location || (float) $location->latitude !== (float) $data['latitude']
            || (float) $location->longitude !== (float) $data['longitude']
            || ($location->address ?? '') !== ($data['formatted_address'] ?? '')) {
            $location = Location::create([
                'name' => $data['name'], 'latitude' => $data['latitude'],
                'longitude' => $data['longitude'], 'address' => $data['formatted_address'] ?? null,
            ]);
        }
        $object->fill([
            'name' => $data['name'], 'object_type' => $data['object_type'] ?? null,
            'location_id' => $location->id, 'status' => $data['status'],
            'allowed_distance' => $data['allowed_distance'],
            // Keep only the formatting supported by the editor; remove attributes and scripts.
            'description' => $this->cleanDescription($data['content'] ?? ''),
            'starts_at' => empty($data['datetime_start']) ? null : \Carbon\Carbon::createFromFormat('d.m.Y H:i', $data['datetime_start'])->startOfMinute(),
            'ends_at' => empty($data['datetime_end']) ? null : \Carbon\Carbon::createFromFormat('d.m.Y H:i', $data['datetime_end'])->startOfMinute(),
        ])->save();
        $object->users()->sync($data['users'] ?? []);
    }

    private function cleanDescription(string $html): ?string
    {
        $html = strip_tags($html, '<p><br><strong><b><em><i><u>');
        $html = preg_replace('/<(p|br|strong|b|em|i|u)\b[^>]*>/i', '<$1>', $html);

        return trim(strip_tags($html)) === '' ? null : $html;
    }
}
