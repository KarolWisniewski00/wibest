<?php

namespace Tests\Feature;

use App\Http\Controllers\Object\ObjectController;
use App\Models\User;
use App\Models\WorkObject;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ObjectsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        Schema::create('companies', function (Blueprint $table) { $table->id(); });
        Schema::create('users', function (Blueprint $table) {
            $table->id(); $table->string('name'); $table->unsignedBigInteger('company_id');
            $table->string('role'); $table->timestamps();
            $table->string('working_hours_regular')->default('stały planing');
            $table->integer('working_hours_custom')->default(8);
            $table->string('working_hours_start_day')->default('poniedziałek');
            $table->string('working_hours_stop_day')->default('piątek');
            $table->boolean('overtime')->default(true);
            $table->integer('overtime_threshold')->default(15);
            $table->boolean('overtime_task')->default(false);
        });
        Schema::create('locations', function (Blueprint $table) {
            $table->id(); $table->string('name'); $table->string('latitude')->nullable();
            $table->string('longitude')->nullable(); $table->string('address')->nullable(); $table->timestamps();
        });
        DB::table('companies')->insert([['id' => 1], ['id' => 2]]);
        (require database_path('migrations/2026_09_18_173431_create_objects_table.php'))->up();
        (require database_path('migrations/2026_09_18_173603_create_object_users_table.php'))->up();
        (require database_path('migrations/2026_11_10_120000_extend_objects_details.php'))->up();
        (require database_path('migrations/2026_11_13_120000_create_object_status_periods_table.php'))->up();
        Schema::create('events', function (Blueprint $table) {
            $table->id(); $table->dateTime('time'); $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('user_id'); $table->unsignedBigInteger('company_id');
        });
        (require database_path('migrations/2025_03_16_170216_create_work_sessions_table.php'))->up();
        Schema::table('work_sessions', fn (Blueprint $table) => $table->unsignedBigInteger('task_id')->nullable());
        (require database_path('migrations/2025_11_11_181114_create_work_blocks_table.php'))->up();
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Owner', 'company_id' => 1, 'role' => 'admin'],
            ['id' => 2, 'name' => 'Worker', 'company_id' => 1, 'role' => 'user'],
            ['id' => 3, 'name' => 'Other', 'company_id' => 2, 'role' => 'user'],
        ]);
        $this->withoutMiddleware([
            \App\Http\Middleware\CompanyMiddleware::class,
            \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            \Laravel\Jetstream\Http\Middleware\AuthenticateSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
        ]);
        $this->actingAs(User::findOrFail(1));
    }

    private function workObject(array $changes = [], array $assignedUserIds = [2]): WorkObject
    {
        $this->travelTo(\Carbon\Carbon::parse('2026-10-01 00:00:00'));
        $location = \App\Models\Location::create(['name' => 'GPS', 'latitude' => 52.1, 'longitude' => 19.2]);

        $object = WorkObject::create(array_replace(['name' => 'Work site', 'company_id' => 1,
            'location_id' => $location->id, 'allowed_distance' => 150, 'status' => 'active'], $changes));
        // Standard preview fixtures have a formally assigned worker; pass [] to test non-assignment.
        $object->users()->attach(DB::table('users')->where('company_id', $object->company_id)
            ->whereIn('id', $assignedUserIds)->pluck('id'));

        return $object;
    }

    private function workSession(string $start = '2026-11-02 08:00:00', string $duration = '08:00:00', ?int $location = null, array $changes = [], ?int $stopLocation = null): int
    {
        $user = $changes['user_id'] ?? 2;
        $company = $changes['company_id'] ?? 1;
        $end = \Carbon\Carbon::parse($start)->addSeconds(\App\Services\Objects\ObjectWorkReport::seconds($duration));
        $startId = DB::table('events')->insertGetId(['time' => $start, 'location_id' => $location, 'user_id' => $user, 'company_id' => $company]);
        $stopId = DB::table('events')->insertGetId(['time' => $end, 'location_id' => $stopLocation ?? $location, 'user_id' => $user, 'company_id' => $company]);

        return DB::table('work_sessions')->insertGetId(array_replace([
            'user_id' => $user, 'company_id' => $company, 'status' => 'Praca zakończona',
            'event_start_id' => $startId, 'event_stop_id' => $stopId, 'time_in_work' => $duration, 'created_at' => $start,
        ], $changes));
    }

    private function report(?WorkObject $object = null, string $month = '2026-11', int $page = 1, string $category = 'all', string $search = ''): array
    {
        $request = Request::create($object ? route('object.show', $object) : route('object.dashboard'), 'GET', ['month' => $month, 'work_page' => $page, 'work_category' => $category, 'work_search' => $search]);

        return app(\App\Services\Objects\ObjectWorkReport::class)->build(1, \Carbon\Carbon::createFromFormat('!Y-m', $month), $request, $object);
    }

    public function test_rcp_classification_filter_matches_row_labels_and_supports_multiple_choices(): void
    {
        // The legacy mobile identity's live status is unrelated to historical classification.
        \Illuminate\Support\Facades\View::composer('components.user-name', function ($view) {
            $user = $view->getData()['user'];
            $view->with('user', (object) ['name' => $user->name, 'role' => $user->role]);
        });
        $under = $this->workSession('2026-11-02 08:00:00', '04:00:00');
        $normal = $this->workSession('2026-11-03 08:00:00', '08:00:00');
        $extra = $this->workSession('2026-11-04 08:00:00', '10:00:00');
        $progress = $this->workSession('2026-11-05 08:00:00', '00:00:00', null, ['status' => 'W trakcie pracy', 'event_stop_id' => null]);
        $classifier = app(\App\Services\WorkSessionClassification::class);
        foreach ([$under => 'under', $normal => 'normal', $extra => 'overtime', $progress => 'in_progress'] as $id => $category) {
            $this->assertSame($category, $classifier->details(\App\Models\WorkSession::findOrFail($id))['category']);
        }
        $params = ['start_date' => '2026-11-01', 'end_date' => '2026-11-30', 'classification_filter' => 1];
        $data = $this->getJson(route('api.v1.rcp.work-session.set.date', $params + ['classifications' => ['under', 'overtime']]))->assertOk()->json();
        $this->assertCount(2, $data['table']);
        $this->assertStringContainsString('Brak normy', implode('', $data['table']));
        $this->assertStringContainsString('Nadgodziny', implode('', $data['table']));
        $this->assertSame(['under', 'overtime'], session('rcp.filters.classifications'));
        $this->assertTrue(session('rcp.filters.active'));
        $this->getJson(route('api.v1.rcp.work-session.set.date', $params))->assertOk()->assertJsonPath('table', []);
        Schema::table('work_sessions', fn (Blueprint $table) => $table->text('notes')->nullable());
        $task = DB::table('events')->insertGetId(['user_id' => 2, 'company_id' => 1, 'time' => '2026-11-03 16:00:00']);
        DB::table('work_sessions')->where('id', $normal)->update(['task_id' => $task, 'notes' => 'Test note']);
        DB::table('work_sessions')->where('id', $under)->update(['notes' => 'Another note']);
        DB::table('work_sessions')->where('id', $extra)->update(['notes' => '   ']);
        $base = ['start_date' => '2026-11-01', 'end_date' => '2026-11-30'];
        foreach ([['has_task' => 1], ['has_note' => 1], ['has_task' => 1, 'has_note' => 1], []] as $filters) {
            $response = $this->getJson(route('api.v1.rcp.work-session.set.date', $base + $filters))->assertOk()->json();
            $expected = isset($filters['has_task']) ? 1 : (isset($filters['has_note']) ? 2 : 4);
            $this->assertCount($expected, $response['table']);
            $this->assertCount($expected, $response['list']);
        }
        $this->getJson(route('api.v1.rcp.work-session.set.date', $base + [
            'classification_filter' => 1, 'classifications' => ['normal'], 'has_task' => 1, 'has_note' => 1,
        ]))->assertOk();
        $this->assertSame(['normal'], session('rcp.filters.classifications'));
        $this->assertTrue(session('rcp.filters.has_task'));
        $this->assertTrue(session('rcp.filters.has_note'));
    }

    public function test_events_paginate_by_three_but_date_filter_returns_all_matches(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_type')->nullable();
            $table->string('status')->nullable();
        });
        for ($day = 2; $day <= 5; $day++) {
            $this->workSession("2026-11-0{$day} 08:00:00");
        }
        DB::table('events')->update(['event_type' => 'start']);
        $params = ['start_date' => '2026-11-01', 'end_date' => '2026-11-30',
            'filter_event_types' => 1, 'event_types' => ['start'], 'per_page' => 3];
        $first = $this->getJson(route('api.v1.rcp.event.get', $params))->assertOk()->json();
        $this->assertCount(3, $first['table']);
        $this->assertNotNull($first['next_page_url']);
        $second = $this->getJson(route('api.v1.rcp.event.get', $params + ['page' => 2]))->assertOk()->json();
        $this->assertCount(3, $second['table']);
        $this->assertEmpty(array_intersect(array_column($first['data'], 'id'), array_column($second['data'], 'id')));
        $filtered = $this->getJson(route('api.v1.rcp.event.set.date', $params))->assertOk()->json();
        $this->assertCount(8, $filtered['table']);
        $this->assertCount(8, $filtered['list']);
    }

    public function test_dashboard_shell_defers_expensive_monthly_report(): void
    {
        $report = $this->createMock(\App\Services\Objects\ObjectWorkReport::class);
        $report->expects($this->never())->method('build');
        $this->app->instance(\App\Services\Objects\ObjectWorkReport::class, $report);
        $request = Request::create(route('object.dashboard'));
        $request->setLaravelSession(session()->driver());
        $data = app(ObjectController::class)->dashboard($request)->getData();
        $this->assertTrue($data['deferReport']);
        $this->assertNull($data['workReport']);
    }

    public function test_map_search_filters_employees_within_the_shared_month_and_company(): void
    {
        $object = $this->workObject();
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $params = ['start_date' => '2026-11-01', 'end_date' => '2026-11-30', 'search' => 'Worker'];
        $this->get(route('rcp.location.index', $params), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()->assertJsonCount(2, 'readings');
        $params['search'] = 'Other';
        $this->get(route('rcp.location.index', $params), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()->assertJsonCount(0, 'readings');
        $params['search'] = '';
        $this->get(route('rcp.location.index', $params), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()->assertJsonCount(2, 'readings');
    }

    public function test_dashboard_date_ranges_are_corrected_to_a_full_month_and_remembered(): void
    {
        $object = $this->workObject();
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $this->workSession('2026-12-02 08:00:00', '08:00:00', $object->location_id);
        foreach ([['2026-11-02', '2026-11-02', '08:00:00'], ['2026-11-01', '2026-12-31', '08:00:00']] as [$start, $end, $total]) {
            $data = $this->get(route('object.dashboard', ['start_date' => $start, 'end_date' => $end]), ['X-Object-Dashboard' => '1'])->assertOk()->json();
            $this->assertSame('2026-11-01', $data['startDate']);
            $this->assertSame('2026-11-30', $data['endDate']);
            $this->assertStringContainsString($total, $data['cards']);
            $this->assertSame('2026-11-01', session('start_date'));
            $this->assertSame('2026-11-30', session('end_date'));
            $this->assertNotEmpty(session('date_range_info'));
        }
        $remembered = app(ObjectController::class)->dashboard(Request::create(route('object.dashboard')))->getData();
        $this->assertSame('2026-11-01', $remembered['startDate']);
        $this->assertSame('2026-11-30', $remembered['endDate']);
        $source = file_get_contents(resource_path('views/admin/object/dashboard.blade.php'));
        $this->assertStringContainsString('<x-filter-date-user loader="objects">', $source);
        $this->assertStringNotContainsString('$role', $source);
        view()->share('errors', new \Illuminate\Support\ViewErrorBag());
        foreach (['admin', 'właściciel', 'kierownik'] as $role) {
            auth()->user()->role = $role;
            $data = app(ObjectController::class)->dashboard(Request::create(route('object.dashboard')))->getData();
            $template = str_replace(['<x-app-layout class="flex">', '</x-app-layout>'], ['<div>', '</div>'], $source);
            $html = \Illuminate\Support\Facades\Blade::render($template, $data + ['company' => true, 'role' => $role]);
            $this->assertStringContainsString('id="selected-dates"', $html);
            $this->assertStringContainsString('id="sidebar-multi-level-sidebar"', $html);
        }

    }

    public function test_work_attention_missing_outside_and_valid_locations_and_read_has_no_writes(): void
    {
        $object = $this->workObject();
        $outside = \App\Models\Location::create(['name' => 'Outside', 'latitude' => 51, 'longitude' => 18]);
        $this->workSession();
        $this->workSession('2026-11-03 08:00:00', '08:00:00', $outside->id);
        $valid = $this->workSession('2026-11-04 08:00:00', '08:00:00', $object->location_id);
        $before = DB::table('work_sessions')->get()->toJson();
        DB::enableQueryLog();
        $report = $this->report();
        $queries = DB::getQueryLog();
        DB::disableQueryLog();
        $this->assertSame(['missing_location' => 1, 'outside_objects' => 1], $report['stats']['reasons']);
        $this->assertSame(2, $report['stats']['attention']);
        $this->assertSame(57600, $report['stats']['attention_seconds']);
        $previewReport = app(\App\Services\Objects\ObjectWorkReport::class)->build(
            1, \Carbon\Carbon::parse('2026-11-01'), Request::create('/'), $object, true
        );
        $this->assertSame(1, $previewReport['stats']['attention']);
        $this->assertSame(28800, $previewReport['stats']['attention_seconds']);
        foreach ([[$report, 'dashboard', '16:00:00', '2 sesje'], [$previewReport, 'preview', '08:00:00', '1 sesja']] as [$cardsReport, $mode, $time, $caption]) {
            $html = view('admin.object.partials.work-cards', [
                'workReport' => $cardsReport, $mode => true, 'counts' => collect(),
                'month' => \Carbon\Carbon::parse('2026-11-01'),
            ])->render();
            $this->assertStringContainsString($time, $html);
            $this->assertStringContainsString($caption, $html);
        }
        $this->assertSame(1, $report['stats']['normal']['count']);
        $this->assertSame(28800, $report['stats']['seconds']);
        $this->assertSame([$valid], collect($this->report($object)['rows']->items())->pluck('id')->all());
        $this->assertSame($before, DB::table('work_sessions')->get()->toJson());
        foreach ($queries as $query) {
            $this->assertDoesNotMatchRegularExpression('/^\s*(insert|update|delete)/i', $query['query']);
        }
    }

    public function test_status_history_preserves_work_before_pause_after_resume_and_after_completion(): void
    {
        $object = $this->workObject();
        $beforePause = $this->workSession('2026-11-09 08:00:00', '08:00:00', $object->location_id);
        $this->travelTo(\Carbon\Carbon::parse('2026-11-10 00:00:00'));
        $this->patch(route('object.status', $object), ['status' => 'paused', 'month' => '2026-11'])->assertRedirect();
        $this->workSession('2026-11-12 08:00:00', '08:00:00', $object->location_id);
        $this->travelTo(\Carbon\Carbon::parse('2026-11-15 00:00:00'));
        $this->patch(route('object.status', $object), ['status' => 'active'])->assertRedirect();
        $afterResume = $this->workSession('2026-11-16 08:00:00', '08:00:00', $object->location_id);
        $this->travelTo(\Carbon\Carbon::parse('2026-11-25 00:00:00'));
        $this->patch(route('object.status', $object), ['status' => 'completed'])->assertRedirect();
        $this->workSession('2026-11-26 08:00:00', '08:00:00', $object->location_id);
        $this->assertSame([$beforePause, $afterResume], collect($this->report($object->fresh())['rows']->items())->pluck('id')->all());
        $this->assertSame(2, $this->report()['stats']['reasons']['inactive_object']);
        $this->assertSame(['active', 'paused', 'active', 'completed'], $object->statusPeriods()->orderBy('id')->pluck('status')->all());
        $this->patch(route('object.status', $object), ['status' => 'completed'])->assertRedirect();
        $this->assertSame(4, $object->statusPeriods()->count());
        $this->travelTo(\Carbon\Carbon::parse('2026-11-27 00:00:00'));
        $this->patch(route('object.status', $object), ['status' => 'cancelled'])->assertRedirect();
        $this->assertSame(2, $this->report($object->fresh())['rows']->total());
    }

    public function test_sessions_crossing_status_boundaries_are_not_counted_and_stop_at_boundary_is_allowed(): void
    {
        $object = $this->workObject();
        $this->travelTo(\Carbon\Carbon::parse('2026-11-10 12:00:00'));
        $object->update(['status' => 'paused']);
        $allowed = $this->workSession('2026-11-10 08:00:00', '04:00:00', $object->location_id);
        $this->workSession('2026-11-10 11:00:00', '02:00:00', $object->location_id);
        $this->workSession('2026-11-10 12:00:00', '01:00:00', $object->location_id);
        $this->assertSame([$allowed], collect($this->report($object)['rows']->items())->pluck('id')->all());
        $this->assertSame(2, $this->report()['stats']['attention']);
    }

    public function test_month_filter_deadlines_and_default_month_keep_cards_and_table_consistent(): void
    {
        $object = $this->workObject();
        $this->workSession('2026-10-05 08:00:00', '07:00:00', $object->location_id);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $this->assertSame(25200, $this->report($object, '2026-10')['stats']['seconds']);
        $this->assertSame(28800, $this->report($object)['stats']['seconds']);
        $object->update(['starts_at' => '2026-11-02 07:00:00', 'ends_at' => '2026-11-02 16:00:00']);
        $this->assertSame(0, $this->report($object, '2026-10')['rows']->total());
        $this->assertSame(1, $this->report($object)['rows']->total());
        $this->workSession('2026-11-03 08:00:00', '08:00:00', $object->location_id);
        $this->assertSame(1, $this->report()['stats']['reasons']['outside_period']);
        $this->travelTo(\Carbon\Carbon::parse('2027-03-01'));
        $service = app(\App\Services\Objects\ObjectWorkReport::class);
        $this->assertSame('2026-11', $service->month(Request::create('/'), $object)->format('Y-m'));
        $this->get(route('object.show', ['object' => $object, 'month' => 'bad']))->assertSessionHasErrors('month');
    }

    public function test_daily_norm_is_shared_across_sessions_and_objects_and_threshold_is_respected(): void
    {
        $object = $this->workObject();
        $other = $this->workObject(['location_id' => \App\Models\Location::create(['name' => 'Second', 'latitude' => 50, 'longitude' => 19])->id]);
        $this->workSession('2026-11-02 08:00:00', '06:00:00', $object->location_id);
        $this->workSession('2026-11-03 08:00:00', '04:00:00', $object->location_id);
        $this->workSession('2026-11-03 12:00:00', '04:00:00', $other->location_id);
        $this->workSession('2026-11-04 08:00:00', '09:00:00', $object->location_id);
        $this->workSession('2026-11-05 08:00:00', '08:15:00', $object->location_id);
        $report = $this->report($object);
        $this->assertSame(1, $report['stats']['under']['count']);
        $this->assertSame(2, $report['stats']['normal']['count']);
        $this->assertSame(1, $report['stats']['overtime']['count']);
        $this->assertSame(7200, $report['rows'][0]->day_under);
        $this->assertSame(3600, $report['rows'][2]->day_extra);
        $this->assertSame(array_sum(array_column($report['rows']->items(), 'seconds')), $report['stats']['seconds']);
        $this->assertSame(3, $this->report()['stats']['normal']['count']);
        DB::table('users')->where('id', 2)->update(['overtime' => false]);
        $this->assertSame(0, $this->report($object)['stats']['overtime']['count']);
    }

    public function test_variable_planning_reuses_existing_repository_norm_and_wraparound_regular_week(): void
    {
        $object = $this->workObject();
        DB::table('users')->where('id', 2)->update(['working_hours_regular' => 'zmienny planing']);
        $this->workSession('2026-11-02 08:00:00', '06:00:00', $object->location_id);
        \App\Models\WorkBlock::create(['user_id' => 2, 'company_id' => 1, 'starts_at' => '2026-11-02 08:00:00', 'ends_at' => '2026-11-02 14:00:00']);
        \App\Models\WorkBlock::create(['user_id' => 2, 'company_id' => 2, 'starts_at' => '2026-11-02 08:00:00', 'ends_at' => '2026-11-02 20:00:00']);
        $this->assertSame(21600, $this->report($object)['rows'][0]->planned);
        $this->assertSame(app(\App\Repositories\WorkSessionRepository::class)->getTotalOfDayPlannedNew(2, '02.11.26'), $this->report($object)['rows'][0]->planned);
        DB::table('users')->where('id', 2)->update(['working_hours_regular' => 'stały planing', 'working_hours_start_day' => 'piątek', 'working_hours_stop_day' => 'wtorek']);
        $this->assertSame(28800, $this->report($object)['rows'][0]->planned);
    }

    public function test_overlap_requires_unique_assignment_and_respects_assignment_date(): void
    {
        $first = $this->workObject([], []);
        $second = $this->workObject([], []);
        $this->workObject(['location_id' => \App\Models\Location::create(['name' => 'Eligibility only', 'latitude' => 45, 'longitude' => 10])->id]);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $first->location_id);
        $this->assertSame(1, $this->report()['stats']['reasons']['ambiguous_object']);
        $first->users()->attach(2);
        $this->assertSame(1, $this->report($first)['rows']->total());
        $this->assertSame(0, $this->report($second)['rows']->total());
        $second->users()->attach(2);
        $this->assertSame(1, $this->report()['stats']['reasons']['ambiguous_object']);
        $second->users()->detach();
        DB::table('object_user')->update(['created_at' => '2026-11-03 00:00:00']);
        $this->assertSame(1, $this->report()['stats']['reasons']['ambiguous_object']);
        $second->update(['ends_at' => '2026-11-01 00:00:00']);
        $this->assertSame(1, $this->report($first)['rows']->total());
    }

    public function test_company_isolation_applies_to_sessions_users_events_objects_and_actions(): void
    {
        $object = $this->workObject();
        $foreign = $this->workObject(['company_id' => 2]);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id, ['user_id' => 3, 'company_id' => 2]);
        $this->workSession('2026-11-03 08:00:00', '08:00:00', $object->location_id, ['user_id' => 3, 'company_id' => 1]);
        $corrupt = $this->workSession('2026-11-04 08:00:00', '08:00:00', $object->location_id);
        $startId = DB::table('work_sessions')->where('id', $corrupt)->value('event_start_id');
        DB::table('events')->where('id', $startId)->update(['company_id' => 2]);
        $this->workSession('2026-11-05 08:00:00', '08:00:00', $object->location_id);
        $this->assertSame(1, $this->report($object)['rows']->total());
        $this->assertSame(0, $this->report()['stats']['attention']);
        $this->patch(route('object.status', $foreign), ['status' => 'paused'])->assertNotFound();
        $this->patch(route('object.status', $object), ['status' => 'invented'])->assertSessionHasErrors('status');
        \Illuminate\Support\Facades\Gate::before(fn ($user, $ability) => $ability === 'update' ? false : null);
        $this->patch(route('object.status', $object), ['status' => 'paused'])->assertForbidden();
    }

    public function test_initial_active_status_allows_history_before_object_creation(): void
    {
        $migration = require database_path('migrations/2026_11_13_120000_create_object_status_periods_table.php');
        $migration->down();
        $location = \App\Models\Location::create(['name' => 'Legacy', 'latitude' => 52.1, 'longitude' => 19.2]);
        $id = DB::table('objects')->insertGetId(['name' => 'Legacy', 'company_id' => 1, 'location_id' => $location->id, 'status' => 'active', 'created_at' => '2020-01-01']);
        $this->travelTo(\Carbon\Carbon::parse('2026-11-13 12:00:00'));
        $migration->up();
        $object = WorkObject::findOrFail($id);
        $object->users()->attach(2);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $location->id);
        $this->workSession('2026-11-16 08:00:00', '08:00:00', $location->id);
        $this->assertSame(2, $this->report($object)['rows']->total());
        $this->assertSame(0, $this->report()['stats']['attention']);
        $this->assertTrue($object->statusPeriods->first()->initial_snapshot);
    }

    public function test_both_start_and_stop_require_valid_matching_locations(): void
    {
        $object = $this->workObject();
        $far = \App\Models\Location::create(['name' => 'Far', 'latitude' => 50, 'longitude' => 19]);
        $invalid = \App\Models\Location::create(['name' => 'Invalid', 'latitude' => 100, 'longitude' => 'bad']);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', null, [], $object->location_id);
        $this->workSession('2026-11-03 08:00:00', '08:00:00', $object->location_id, [], $far->id);
        $this->workSession('2026-11-04 08:00:00', '08:00:00', $invalid->id);
        $this->assertSame(0, $this->report($object)['rows']->total());
        $this->assertSame(['missing_location' => 2, 'outside_objects' => 1], $this->report()['stats']['reasons']);
    }

    public function test_pagination_and_query_count_are_bounded_and_totals_include_all_pages(): void
    {
        $object = $this->workObject();
        $object->load('location');
        $this->workSession('2026-11-02 08:00:00', '00:10:00', $object->location_id);
        DB::enableQueryLog();
        $this->report($object);
        $smallCount = count(DB::getQueryLog());
        DB::disableQueryLog();
        foreach (range(1, 54) as $index) {
            $this->workSession(\Carbon\Carbon::parse('2026-11-02 08:00:00')->addMinutes($index * 10)->toDateTimeString(), '00:10:00', $object->location_id);
        }
        DB::flushQueryLog();
        DB::enableQueryLog();
        $report = $this->report($object, '2026-11', 2);
        $largeCount = count(DB::getQueryLog());
        DB::disableQueryLog();
        $this->assertSame($smallCount, $largeCount);
        $this->assertLessThanOrEqual(10, $largeCount);
        $this->assertCount(25, $report['rows']->items());
        $this->assertSame(55, $report['rows']->total());
        $this->assertSame(33000, $report['stats']['seconds']);
    }

    public function test_status_and_history_roll_back_together_and_edit_records_status(): void
    {
        $object = $this->workObject();
        DB::beginTransaction();
        $object->update(['status' => 'paused']);
        DB::rollBack();
        $this->assertSame('active', $object->fresh()->status);
        $this->assertSame(1, $object->statusPeriods()->count());
        $this->put(route('object.update', $object), $this->payload(['status' => 'paused']))->assertRedirect();
        $this->assertSame(['active', 'paused'], $object->statusPeriods()->orderBy('id')->pluck('status')->all());
    }

    public function test_night_shift_belongs_to_start_month_and_dates_are_inclusive_at_deadline(): void
    {
        $object = $this->workObject(['starts_at' => '2026-10-31 22:00:00', 'ends_at' => '2026-11-01 06:00:00']);
        $this->workSession('2026-10-31 22:00:00', '08:00:00', $object->location_id);
        $this->assertSame(1, $this->report($object, '2026-10')['rows']->total());
        $this->assertSame(0, $this->report($object)['rows']->total());
        $object->update(['ends_at' => '2026-11-01 05:59:59']);
        $this->assertSame(0, $this->report($object, '2026-10')['rows']->total());
    }

    public function test_active_history_filters_overlap_before_assignments_and_paused_object_cannot_match(): void
    {
        $active = $this->workObject();
        $paused = $this->workObject(['status' => 'paused'], []);
        $paused->users()->attach(2);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $active->location_id);
        $this->assertSame(1, $this->report($active)['rows']->total());
        $this->assertSame(0, $this->report($paused)['rows']->total());
        $this->travelTo(\Carbon\Carbon::parse('2026-11-01'));
        $active->update(['status' => 'cancelled']);
        $this->assertSame(1, $this->report()['stats']['reasons']['inactive_object']);
    }

    public function test_invalid_missing_start_and_open_sessions_are_visible_without_mutating_rcp(): void
    {
        $object = $this->workObject();
        DB::table('work_sessions')->insert(['user_id' => 2, 'company_id' => 1, 'status' => 'Zablokowane', 'created_at' => '2026-11-02 08:00:00']);
        $this->workSession('2026-11-03 08:00:00', '01:00:00', $object->location_id, ['status' => 'Zablokowane']);
        $this->workSession('2026-11-04 08:00:00', '01:00:00', $object->location_id, ['status' => 'W trakcie pracy', 'event_stop_id' => null]);
        $this->travelTo(\Carbon\Carbon::parse('2026-11-04 09:00:00'));
        $this->assertSame(['missing_location' => 2, 'invalid_session' => 1], $this->report()['stats']['reasons']);
        $this->assertSame(0, $this->report($object)['rows']->total());
        $this->assertSame(3, DB::table('work_sessions')->count());
        $this->assertSame(4, DB::table('events')->count());
    }

    public function test_radius_boundary_and_zero_coordinates_are_valid(): void
    {
        $location = \App\Models\Location::create(['name' => 'Origin', 'latitude' => 0, 'longitude' => 0]);
        $object = $this->workObject(['location_id' => $location->id, 'allowed_distance' => 100]);
        $inside = \App\Models\Location::create(['name' => 'Inside', 'latitude' => rad2deg(99.9 / 6371000), 'longitude' => 0]);
        $outside = \App\Models\Location::create(['name' => 'Outside', 'latitude' => rad2deg(100.1 / 6371000), 'longitude' => 0]);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $location->id);
        $this->workSession('2026-11-03 08:00:00', '08:00:00', $inside->id);
        $this->workSession('2026-11-04 08:00:00', '08:00:00', $outside->id);
        $this->assertSame(2, $this->report($object)['rows']->total());
        $this->assertSame(1, $this->report()['stats']['reasons']['outside_objects']);
    }

    public function test_report_streams_multiple_batches_and_paginates_attention(): void
    {
        $this->workObject();
        foreach (range(1, 260) as $index) {
            $this->workSession('2026-11-02 08:00:00', '00:01:00');
        }
        $report = $this->report(null, '2026-11', 11);
        $this->assertSame(260, $report['stats']['attention']);
        $this->assertCount(10, $report['rows']->items());
        $this->assertSame(251, $report['rows'][0]->id);
        $this->assertStringContainsString('month=2026-11', $report['rows']->url(1));
        $this->assertStringContainsString('work_page=1', $report['rows']->url(1));
    }

    public function test_controller_and_views_share_month_and_classification_totals(): void
    {
        view()->share('errors', new \Illuminate\Support\ViewErrorBag());
        $object = $this->workObject();
        $this->workSession('2026-11-02 08:00:00', '06:00:00', $object->location_id);
        $this->workSession('2026-10-05 08:00:00', '08:00:00', $object->location_id);
        $request = Request::create(route('object.show', $object), 'GET', ['start_date' => '2026-11-01', 'end_date' => '2026-11-30']);
        $data = app(ObjectController::class)->show($object, $request)->getData();
        $this->assertSame('2026-11', $data['month']->format('Y-m'));
        $this->assertSame(1, $data['workReport']['stats']['under']['count']);
        $this->assertSame(1, $data['workReport']['rows']->total());
        $source = str_replace(['<x-app-layout class="flex">', '</x-app-layout>'], ['<div>', '</div>'], file_get_contents(resource_path('views/admin/object/show.blade.php')));
        $html = \Illuminate\Support\Facades\Blade::render($source, $data);
        foreach (['id="current-month-bt"', '06:00:00', '1 sesja', '02.11.2026', '08:00 - 14:00', 'Norma dnia', 'Brak normy', 'Historia statusów'] as $text) {
            $this->assertStringContainsString($text, $html);
        }
        $this->assertStringNotContainsString('05.10.2026 08:00', $html);
        $dashboard = app(ObjectController::class)->dashboard(Request::create(route('object.dashboard'), 'GET', ['month' => '2026-11']))->getData();
        $this->assertNull($dashboard['workReport']);
        $source = str_replace(['<x-app-layout class="flex">', '</x-app-layout>'], ['<div>', '</div>'], file_get_contents(resource_path('views/admin/object/dashboard.blade.php')));
        $html = \Illuminate\Support\Facades\Blade::render($source, $dashboard + ['company' => true]);
        $this->assertStringContainsString('aria-label="Ładowanie danych"', $html);
        $request = Request::create(route('object.dashboard'), 'GET', ['month' => '2026-11']);
        $request->headers->set('X-Object-Dashboard', '1');
        $loaded = app(ObjectController::class)->dashboard($request)->getData(true);
        $this->assertStringContainsString('06:00:00', $loaded['cards']);
        $this->assertStringContainsString('Wszystkie sesje czasu pracy z wybranego okresu · 01.11.2026 - 30.11.2026', $loaded['work']);
    }

    public function test_creation_date_does_not_limit_history_but_real_pause_and_execution_dates_do(): void
    {
        $object = $this->workObject();
        $this->workSession('2026-09-07 08:00:00', '08:00:00', $object->location_id);
        $this->assertSame(1, $this->report($object, '2026-09')['rows']->total());
        $this->travelTo(\Carbon\Carbon::parse('2026-11-01 00:00:00'));
        $object->update(['status' => 'paused']);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $this->assertSame(0, $this->report($object)['rows']->total());
        $this->assertSame(1, $this->report($object, '2026-09')['rows']->total());
        $object->update(['starts_at' => '2026-10-01 00:00:00']);
        $this->assertSame(0, $this->report($object, '2026-09')['rows']->total());
    }

    public function test_dashboard_category_filters_only_change_rows_and_keep_monthly_totals(): void
    {
        $object = $this->workObject();
        $under = $this->workSession('2026-11-02 08:00:00', '06:00:00', $object->location_id);
        $normal = $this->workSession('2026-11-03 08:00:00', '08:00:00', $object->location_id);
        $extra = $this->workSession('2026-11-04 08:00:00', '09:00:00', $object->location_id);
        $attention = $this->workSession('2026-11-05 08:00:00', '08:00:00');
        $this->workSession('2026-10-05 08:00:00', '08:00:00', $object->location_id);
        $all = $this->report();
        $this->assertSame([$under, $normal, $extra, $attention], collect($all['rows']->items())->pluck('id')->all());
        foreach (['under' => $under, 'normal' => $normal, 'overtime' => $extra, 'attention' => $attention] as $category => $id) {
            $filtered = $this->report(null, '2026-11', 1, $category);
            $this->assertSame([$id], collect($filtered['rows']->items())->pluck('id')->all());
            $this->assertSame($all['stats'], $filtered['stats']);
            $this->assertSame($all['object_seconds'], $filtered['object_seconds']);
            $this->assertStringContainsString('work_category='.$category, $filtered['rows']->url(2));
            $this->assertStringContainsString('month=2026-11', $filtered['rows']->url(2));
        }
        $this->get(route('object.dashboard', ['month' => '2026-11', 'work_category' => 'invalid']))->assertSessionHasErrors('work_category');
    }

    public function test_object_monthly_hours_exceed_24_and_are_in_ajax_list_and_cards(): void
    {
        $object = $this->workObject();
        foreach ([2, 3, 4, 5] as $day) {
            $this->workSession('2026-11-0'.$day.' 08:00:00', '08:00:00', $object->location_id);
        }
        $this->workSession('2026-10-05 08:00:00', '06:00:00', $object->location_id);
        $this->assertSame(115200, $this->report()['object_seconds'][$object->id]);
        $this->assertSame('32:00:00', \App\Services\Objects\ObjectWorkReport::duration(115200));
        $this->assertSame(21600, $this->report(null, '2026-10')['object_seconds'][$object->id]);
        $this->get(route('object.dashboard', ['month' => '2026-11']), ['X-Object-List' => '1'])->assertOk()->assertSee('32h');
        $this->get(route('object.dashboard', ['month' => '2026-10']), ['X-Object-List' => '1'])->assertOk()->assertSee('6h')->assertDontSee('32h');
        $html = view('admin.object.partials.work-cards', ['workReport' => $this->report()])->render();
        $this->assertMatchesRegularExpression('/text-3xl[^>]*><span[^>]*>32:00:00</', $html);
        $this->assertStringContainsString('4 sesje', $html);
    }

    public function test_work_table_renders_clickable_rows_badge_and_no_database_queries(): void
    {
        $object = $this->workObject();
        $valid = $this->workSession('2026-11-02 22:00:00', '08:00:00', $object->location_id);
        $attention = $this->workSession('2026-11-04 08:00:00', '08:00:00');
        $report = $this->report();
        DB::flushQueryLog();
        DB::enableQueryLog();
        $html = view('admin.object.partials.work-table', ['workReport' => $report, 'dashboard' => true, 'month' => \Carbon\Carbon::parse('2026-11-01')])->render();
        $queries = DB::getQueryLog();
        DB::disableQueryLog();
        // The shared WIBEST view composer can load the current company once.
        $this->assertLessThanOrEqual(1, count($queries));
        foreach ($queries as $query) {
            $this->assertStringContainsString('companies', $query['query']);
        }
        $this->assertStringContainsString(route('rcp.work-session.show', $valid), $html);
        $this->assertStringContainsString(route('rcp.work-session.show', $attention), $html);
        $this->assertStringContainsString('data-object-mobile-work', $html);
        $this->assertStringContainsString('block space-y-3 p-3 md:hidden', $html);
        $this->assertStringContainsString('hidden overflow-x-auto md:block', $html);
        $mobile = view('admin.object.partials.work-mobile', ['workReport' => $report, 'role' => 'admin'])->render();
        $this->assertStringContainsString('border-2 border-gray-200 rounded-lg', $mobile);
        $this->assertStringContainsString('fa-arrow-up-right-from-square', $mobile);
        $this->assertStringContainsString('Profil pracownika', $html);
        $this->assertStringContainsString(route('team.user.show', 2), $html);
        $this->assertStringNotContainsString('fa-eye', $mobile);
        $this->assertStringNotContainsString('fa-pen-to-square', $mobile);
        $this->assertStringContainsString(route('rcp.work-session.show', $valid), $mobile);
        $this->actingAs(User::findOrFail(2));
        $readonly = view('admin.object.partials.work-mobile', ['workReport' => $report])->render();
        $this->assertStringNotContainsString('fa-pen-to-square', $readonly);
        $this->actingAs(User::findOrFail(1));

        foreach (['object-results-pending', 'loading || reportLoading', 'motion-reduce:animate-none', 'Ładowanie danych…'] as $loadingMarkup) {
            $this->assertStringContainsString($loadingMarkup, $html);
        }
        foreach (['cursor-pointer', 'dark:bg-gray-700 dark:hover:bg-gray-600', 'tabindex="0"', '@keydown.enter.self.prevent', 'window.location.assign(url)', 'input, select, textarea', 'text-yellow-300', 'Wymaga uwagi', '🌙', 'work_category=overtime', '03.11.2026'] as $text) {
            $this->assertStringContainsString($text, $html);
        }
        $this->assertStringNotContainsString('<x-show-cell', $html);
        $this->assertStringNotContainsString('<th class="px-3 py-3">Podgląd', $html);
        $this->assertStringNotContainsString('type="checkbox"', $html);
        preg_match_all('/<(?:th|td)\b[^>]*class="([^"]*)"/', $html, $cells);
        foreach ($cells[1] as $classes) {
            $this->assertStringContainsString('px-5 py-4', $classes);
        }
        $this->assertStringContainsString('!text-gray-900 dark:!text-gray-50', $html);
        $this->assertStringContainsString('text-gray-500 dark:text-gray-500', $html);
    }

    public function test_work_table_uses_matching_day_night_colours_object_icon_and_daily_balance(): void
    {
        $object = $this->workObject(['object_type' => 'magazyn']);
        DB::table('users')->where('id', 2)->update(['working_hours_stop_day' => 'niedziela']);
        foreach ([['02', '08', '06'], ['03', '22', '06'], ['04', '08', '08'], ['05', '22', '08'], ['06', '08', '10'], ['07', '22', '10'], ['08', '22', '01']] as [$day, $hour, $duration]) {
            $this->workSession('2026-11-'.$day.' '.$hour.':00:00', $duration.':00:00', $object->location_id);
        }
        $report = $this->report();
        $html = view('admin.object.partials.work-table', ['workReport' => $report, 'dashboard' => true, 'month' => \Carbon\Carbon::parse('2026-11-01')])->render();
        preg_match_all('/<tr\b[^>]*x-data=.*?<\/tr>/s', $html, $matches);
        $styles = ['bg-green-300/20', 'bg-green-400/20', 'bg-green-300', 'bg-green-400', 'bg-indigo-300', 'bg-indigo-400', 'bg-green-300/20'];
        $this->assertCount(7, $matches[0]);
        foreach ($matches[0] as $index => $row) {
            // RCP and classification share exactly the same colour token.
            $this->assertSame(2, substr_count($row, 'inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium '.$styles[$index]));
            $this->assertStringContainsString('fa-warehouse', $row);
            $this->assertStringContainsString('from-orange-200', $row);
            $this->assertStringContainsString('h-9 w-9', $row);
            $this->assertStringNotContainsString('>#', $row);
            if (in_array($index, [1, 3, 5])) {
                $this->assertStringContainsString('🌙', $row);
            } else {
                $this->assertStringNotContainsString('🌙', $row);
            }
        }
        foreach (['Brakuje 02:00:00', 'Norma zrealizowana', '+02:00:00 ponad normę', 'Bilans dnia'] as $text) {
            $this->assertStringContainsString($text, $html);
        }
        $this->assertSame(-7200, $report['rows'][0]->day_difference);
        $this->assertSame(7200, $report['rows'][4]->day_difference);
    }

    public function test_display_balance_has_no_fictitious_norm_and_keeps_overtime_classification(): void
    {
        $object = $this->workObject(['object_type' => 'biuro']);
        $this->workSession('2026-11-02 08:00:00', '08:10:00', $object->location_id);
        $this->workSession('2026-11-03 08:00:00', '09:00:00', $object->location_id, ['status' => 'W trakcie pracy', 'event_stop_id' => null]);
        $report = $this->report();
        $this->assertSame('normal', $report['rows'][0]->category);
        $this->assertSame(600, $report['rows'][0]->day_difference);
        $this->assertNull($report['rows'][1]->day_difference);
        DB::table('users')->where('id', 2)->update(['overtime' => false]);
        $this->assertSame('normal', $this->report()['rows'][0]->category);
        $this->assertSame(600, $this->report()['rows'][0]->day_difference);
        DB::table('users')->where('id', 2)->update(['working_hours_custom' => 0]);
        $report = $this->report();
        $this->assertNull($report['rows'][0]->day_difference);
        $html = view('admin.object.partials.work-table', ['workReport' => $report, 'dashboard' => true, 'month' => \Carbon\Carbon::parse('2026-11-01')])->render();
        $this->assertStringContainsString('Brak określonej normy', $html);
        $this->assertStringContainsString('fa-building', $html);
        $this->assertStringNotContainsString('Brakuje ', $html);
    }

    public function test_work_search_matches_employee_and_resolved_object_before_pagination(): void
    {
        $object = $this->workObject(['name' => 'Magazyn Północ']);
        DB::table('users')->where('id', 2)->update(['name' => 'Jan Kowalski']);
        foreach (range(1, 30) as $index) {
            $this->workSession('2026-11-02 08:00:00', '00:01:00', $object->location_id);
        }
        $this->workSession('2026-11-03 08:00:00', '08:00:00');
        $this->workSession('2026-10-05 08:00:00', '08:00:00', $object->location_id);
        $all = $this->report();
        $this->assertSame(31, $this->report(null, '2026-11', 1, 'all', 'jan')['rows']->total());
        $this->assertSame(31, $this->report(null, '2026-11', 1, 'all', 'KOWALSKI')['rows']->total());
        $result = $this->report(null, '2026-11', 2, 'under', 'PÓŁNOC');
        $this->assertSame(30, $result['rows']->total());
        $this->assertCount(5, $result['rows']->items());
        $this->assertSame($all['stats'], $result['stats']);
        $this->assertSame($all['object_seconds'], $result['object_seconds']);
        parse_str(parse_url($result['rows']->url(1), PHP_URL_QUERY), $params);
        $this->assertSame('PÓŁNOC', $params['work_search']);
        $this->assertSame('under', $params['work_category']);
        $this->assertSame('2026-11', $params['month']);
        $empty = $this->report(null, '2026-11', 1, 'all', 'nie istnieje');
        $this->assertSame(0, $empty['rows']->total());
        $html = view('admin.object.partials.work-table', ['workReport' => $empty, 'dashboard' => true, 'month' => \Carbon\Carbon::parse('2026-11-01')])->render();
        $this->assertStringContainsString('Brak sesji', $html);
        $this->assertStringContainsString('Szukaj czasu pracy...', $html);
        $this->assertStringContainsString('fa-clock text-lg sm:text-2xl', $html);
        $this->assertStringNotContainsString('name="work_page"', $html);
        $html = view('admin.object.partials.work-table', ['workReport' => $result, 'dashboard' => true, 'month' => \Carbon\Carbon::parse('2026-11-01')])->render();
        $this->assertStringContainsString('aria-current="page"', $html);
        $this->assertStringContainsString('aria-disabled="true"', $html);
        $this->assertStringContainsString('dark:bg-gray-700', $html);
        $this->get(route('object.dashboard', ['work_search' => str_repeat('x', 256)]))->assertSessionHasErrors('work_search');
    }

    public function test_work_time_cell_preserves_error_and_overtime_task_warnings(): void
    {
        $object = $this->workObject();
        DB::table('users')->where('id', 2)->update(['overtime_task' => true]);
        $this->workSession('2026-11-02 08:00:00', '24:00:00', $object->location_id);
        $this->workSession('2026-11-04 08:00:00', '10:00:00', $object->location_id, ['task_id' => 42]);
        $this->workSession('2026-11-05 08:00:00', '01:00:00', $object->location_id, ['status' => 'Zablokowane']);
        $this->workSession('2026-11-06 08:00:00', '01:00:00', $object->location_id, ['status' => 'W trakcie pracy', 'event_stop_id' => null]);
        $result = $this->report();
        $this->assertTrue($result['rows'][0]->missing_task);
        $this->assertFalse($result['rows'][1]->missing_task);
        $html = view('admin.object.partials.work-table', ['workReport' => $result, 'dashboard' => true, 'month' => \Carbon\Carbon::parse('2026-11-01')])->render();
        $this->assertSame(1, substr_count($html, 'title="Brak zadania dla nadgodzin"'));
        $this->assertSame(1, substr_count($html, 'title="Automatyczne zakończenie"'));
        $this->assertSame(1, substr_count($html, 'title="Niekompletna lub nieprawidłowa sesja"'));
        $this->assertStringContainsString('bg-yellow-300 text-yellow-950', $html);
        $this->assertStringContainsString('24:00:00', $html);
    }

    public function test_work_ajax_returns_only_results_and_preserves_filters_and_authorization(): void
    {
        $object = $this->workObject();
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $this->workSession('2026-11-03 08:00:00', '08:00:00');
        $response = $this->get(route('object.dashboard', ['month' => '2026-11', 'work_category' => 'attention', 'work_search' => 'Worker']), ['X-Object-Work' => '1'])
            ->assertOk()->assertHeader('X-Object-Work', '1')->assertSee('work-list-results')->assertDontSee('Twoje obiekty');
        $response->assertSee('bg-yellow-300 text-yellow-950', false)->assertSee('>RCP</span>', false)->assertSee('Wymaga uwagi');
        $response->assertDontSee('Work site');
        $this->get(route('object.show', ['object' => $object, 'month' => '2026-11']), ['X-Object-Work' => '1'])
            ->assertOk()->assertHeader('X-Object-Work', '1')->assertSee('Work site')->assertDontSee('Informacje o obiekcie');
        $object->update(['company_id' => 2]);
        $this->get(route('object.show', $object), ['X-Object-Work' => '1'])->assertNotFound();
    }

    public function test_object_card_hours_are_truncated_without_changing_duration_format(): void
    {
        $object = $this->workObject();
        $objects = WorkObject::with('location')->withCount('users')->paginate(15);
        foreach ([3025532 => '840h', 516435 => '143h', 31500 => '8h', 2700 => '0h'] as $seconds => $expected) {
            $html = view('admin.object.partials.list-results', ['objects' => $objects, 'workReport' => ['object_seconds' => [$object->id => $seconds]]])->render();
            $this->assertStringContainsString($expected, $html);
        }
        $this->assertSame('840:25:32', \App\Services\Objects\ObjectWorkReport::duration(3025532));
    }

    public function test_dashboard_sections_have_local_loading_consistent_hover_and_month_navigation(): void
    {
        view()->share('errors', new \Illuminate\Support\ViewErrorBag());
        $object = $this->workObject();
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $data = app(ObjectController::class)->dashboard(Request::create(route('object.dashboard'), 'GET', ['month' => '2026-11']))->getData();
        $source = str_replace(['<x-app-layout class="flex">', '</x-app-layout>'], ['<div>', '</div>'], file_get_contents(resource_path('views/admin/object/dashboard.blade.php')));
        $html = \Illuminate\Support\Facades\Blade::render($source, $data + ['company' => true]);
        $this->assertTrue($data['deferReport']);
        $this->assertStringContainsString('aria-label="Ładowanie danych"', $html);
        $this->assertStringNotContainsString('id="object-list-results"', $html);
        $request = Request::create(route('object.dashboard'), 'GET', ['month' => '2026-11']);
        $request->headers->set('X-Object-Dashboard', '1');
        $loaded = app(ObjectController::class)->dashboard($request)->getData(true);
        $this->assertSame(2, substr_count($loaded['objects'].$loaded['work'], '@input="searchChanged($event.target.value)"'));
        $this->assertStringContainsString('01.11.2026 - 30.11.2026', $loaded['work']);
        $this->assertStringContainsString('sidebar-multi-level-sidebar', $html);
        $this->assertStringContainsString('object-date-range', $html);
    }

    public function test_preview_month_payload_updates_cards_workers_readings_and_table_from_one_report(): void
    {
        $object = $this->workObject(['name' => 'Site <safe>']);
        DB::table('users')->insert(['id' => 4, 'name' => 'Idle', 'company_id' => 1, 'role' => 'user']);
        $object->users()->syncWithoutDetaching([1, 2, 4]);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $this->workSession('2026-11-03 08:00:00', '00:45:00', $object->location_id, ['user_id' => 1]);
        $this->workSession('2026-10-05 08:00:00', '06:00:00', $object->location_id);
        $far = \App\Models\Location::create(['name' => 'Other site', 'latitude' => 50, 'longitude' => 19]);
        $this->workSession('2026-11-04 08:00:00', '08:00:00', $far->id);
        $this->workSession('2026-11-05 08:00:00', '08:00:00', $object->location_id, [], $far->id);
        $this->workSession('2026-11-06 08:00:00', '08:00:00');
        $this->workSession('2026-11-09 08:00:00', '08:00:00', $object->location_id, ['user_id' => 3, 'company_id' => 2]);
        $response = $this->get(route('object.show', ['object' => $object, 'month' => '2026-11']), ['X-Object-Preview' => '1'])
            ->assertOk()->assertHeader('X-Object-Preview', '1')->assertJsonPath('month', '2026-11');
        $payload = $response->json();
        $this->assertCount(4, $payload['readings']);
        $this->assertSame(['START', 'STOP', 'START', 'STOP'], array_column($payload['readings'], 'type'));
        $this->assertSame(['Worker', 'Worker', 'Owner', 'Owner'], array_column($payload['readings'], 'employee'));
        $this->assertSame('02.11.2026 08:00:00', $payload['readings'][0]['time']);
        $this->assertSame('Site <safe>', $payload['readings'][0]['object']);
        $this->assertStringContainsString('08:45:00', $payload['cards']);
        $this->assertStringContainsString('2 sesje', $payload['cards']);
        $this->assertStringContainsString('Czas na obiekcie', $payload['cards']);
        $this->assertStringContainsString('Wymaga uwagi', $payload['cards']);
        $this->assertStringContainsString('8h', $payload['workers']);
        $this->assertSame(2, substr_count($payload['workers'], '>0h</div>'));
        $this->assertStringContainsString('Site &lt;safe&gt;', $payload['work']);
        $this->assertStringNotContainsString('Other site', $payload['work']);
        $this->assertStringNotContainsString('05.10.2026', $payload['work']);
        $this->assertStringContainsString('object-period-request', $payload['period']);
        $this->assertStringNotContainsString('window.location.assign', $payload['period']);
        $this->assertStringContainsString('month=2026-10', $payload['period']);
        $october = $this->get(route('object.show', ['object' => $object, 'month' => '2026-10']), ['X-Object-Preview' => '1'])->assertOk()->json();
        $this->assertStringContainsString('06:00:00', $october['cards']);
        $this->assertStringContainsString('6h', $october['workers']);
        $this->assertCount(2, $october['readings']);
        $request = Request::create('/', 'GET', ['month' => '2026-11']);
        $report = app(\App\Services\Objects\ObjectWorkReport::class)->build(1, \Carbon\Carbon::parse('2026-11-01'), $request, $object, true);
        $this->assertSame(2, $report['stats']['attention']);
        $this->assertSame(['outside_objects' => 1, 'missing_location' => 1], $report['stats']['reasons']);
        $this->assertSame([2 => 28800, 1 => 2700], $report['worker_seconds']);
        $object->update(['company_id' => 2]);
        $this->get(route('object.show', $object), ['X-Object-Preview' => '1'])->assertNotFound();
    }

    public function test_preview_layout_places_back_month_five_cards_and_map_before_other_sections(): void
    {
        $object = $this->workObject();
        $html = $this->renderPreview($object);
        $this->assertLessThan(strpos($html, 'data-month='), strpos($html, '>Wróć'));
        $this->assertLessThan(strpos($html, 'data-object-location'), strpos($html, 'data-object-work-cards'));
        $this->assertLessThan(strpos($html, 'data-object-users'), strpos($html, 'data-object-location'));
        $source = file_get_contents(resource_path('views/admin/object/show.blade.php'));
        $this->assertStringContainsString('wibestObjectPreview', $html);
        $this->assertStringContainsString('wibest:object-readings', $html);
        $this->assertStringContainsString('updateReadings', $source);
        $this->assertStringContainsString("'radius' => \$object->allowed_distance", $source);
        $this->assertStringContainsString('2xl:grid-cols-5', $html);
        $this->assertSame(5, substr_count($html, 'class="group h-full rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-700"'));
    }

    public function test_dashboard_month_response_contains_all_monthly_sections_without_map_reload(): void
    {
        $object = $this->workObject();
        $foreign = $this->workObject(['name' => 'Foreign site', 'company_id' => 2]);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $this->workSession('2026-11-03 08:00:00', '09:00:00', $object->location_id);
        $this->workSession('2026-10-05 08:00:00', '05:00:00', $object->location_id);
        $this->workSession('2026-11-04 08:00:00', '10:00:00', $foreign->location_id, ['company_id' => 2, 'user_id' => 3]);
        $params = ['month' => '2026-11', 'search' => 'Work site', 'status' => 'active', 'work_search' => 'Worker', 'work_category' => 'overtime'];
        $response = $this->get(route('object.dashboard', $params), ['X-Object-Dashboard' => '1'])
            ->assertOk()->assertHeader('X-Object-Dashboard', '1')->assertJsonPath('month', '2026-11');
        $data = $response->json();
        $this->assertSame(['month', 'period', 'startDate', 'endDate', 'cards', 'objects', 'work'], array_keys($data));
        $this->assertStringContainsString('17:00:00', $data['cards']);
        $this->assertStringContainsString('17h', $data['objects']);
        $this->assertStringContainsString('Work site', $data['objects']);
        $this->assertStringNotContainsString('Foreign site', $data['objects']);
        $this->assertStringContainsString('03.11.2026', $data['work']);
        $this->assertStringNotContainsString('02.11.2026', $data['work']);
        $this->assertStringContainsString('value="Worker"', $data['work']);
        $this->assertStringContainsString('value="Work site"', $data['objects']);
        $this->assertSame('01.11.2026 - 30.11.2026', $data['period']);
        $this->assertStringNotContainsString('window.location.assign', $data['period']);
        $this->assertStringNotContainsString('x-ref="cardMap"', implode('', $data));
        $params['month'] = '2026-10';
        $october = $this->get(route('object.dashboard', $params), ['X-Object-Dashboard' => '1'])->assertOk()->json();
        $this->assertStringContainsString('05:00:00', $october['cards']);
        $this->assertStringContainsString('5h', $october['objects']);
        $this->assertStringContainsString('Brak sesji', $october['work']);
        $this->assertStringNotContainsString('03.11.2026', $october['work']);
    }

    public function test_preview_time_table_is_directly_above_authorized_edit_delete_controls(): void
    {
        $object = $this->workObject();
        $html = $this->renderPreview($object);
        $table = strpos($html, 'data-object-work-table');
        $edit = strpos($html, route('object.edit', $object));
        $delete = strpos($html, route('object.delete', $object));
        $this->assertLessThan($edit, $table);
        $this->assertLessThan($delete, $table);
        $source = file_get_contents(resource_path('views/admin/object/show.blade.php'));
        $this->assertSame(1, substr_count($source, "@include('admin.object.partials.work-table')"));
        $this->assertStringContainsString("@include('admin.object.partials.work-table')</div>\n            <div class=\"flex flex-col md:flex-row justify-end gap-4 mt-4\">", str_replace("\r\n", "\n", $source));
        $this->assertStringContainsString('onsubmit="return confirm(', $html);
    }

    public function test_preview_assignment_gate_applies_to_stats_attention_map_workers_and_ajax_only(): void
    {
        $object = $this->workObject();
        $object->users()->attach([1, 3]); // idle assigned owner, and a deliberately invalid foreign-company pivot
        DB::table('users')->insert(['id' => 4, 'name' => 'Visitor', 'company_id' => 1, 'role' => 'user']);
        $far = \App\Models\Location::create(['name' => 'Far', 'latitude' => 50, 'longitude' => 19]);
        $other = $this->workObject(['location_id' => $far->id, 'name' => 'Other site']);
        $assigned = $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $this->workSession('2026-11-03 08:00:00', '09:00:00', $object->location_id, ['user_id' => 4]);
        $otherSession = $this->workSession('2026-11-04 08:00:00', '03:00:00', $other->location_id);
        $attention = $this->workSession('2026-11-05 08:00:00', '08:00:00', $object->location_id, [], $far->id);
        $this->workSession('2026-11-06 08:00:00', '08:00:00', $object->location_id, ['user_id' => 4], $far->id);
        $missing = $this->workSession('2026-11-09 08:00:00', '08:00:00');
        $this->workSession('2026-11-10 08:00:00', '08:00:00', $object->location_id, ['user_id' => 3, 'company_id' => 2]);
        $this->workSession('2026-10-05 08:00:00', '06:00:00', $object->location_id);
        $service = app(\App\Services\Objects\ObjectWorkReport::class);
        $request = Request::create('/', 'GET', ['month' => '2026-11', 'user_id' => 4, 'company_id' => 2, 'include_unassigned' => 1]);
        $month = \Carbon\Carbon::parse('2026-11-01');
        $globalBefore = $this->report();
        $sessionsBefore = DB::table('work_sessions')->get()->toJson();
        $preview = $service->build(1, $month, $request, $object, true);
        $this->assertSame([$assigned, $otherSession, $attention, $missing], collect($preview['rows']->items())->pluck('id')->all());
        $this->assertSame(28800, $preview['stats']['seconds']);
        $this->assertSame(2, $preview['stats']['attention']);
        $this->assertSame([2 => 28800], $preview['worker_seconds']);
        $this->assertCount(2, $preview['readings']);
        $this->assertSame(['Worker', 'Worker'], array_column($preview['readings'], 'employee'));
        $this->assertSame(10800, $service->build(1, $month, $request, $other, true)['stats']['seconds']);
        $url = route('object.show', ['object' => $object, 'month' => '2026-11', 'user_id' => 4, 'include_unassigned' => 1]);
        $data = $this->get($url, ['X-Object-Preview' => '1'])->assertOk()->json();
        $this->assertStringContainsString('08:00:00', $data['cards']);
        $this->assertStringContainsString('8h', $data['workers']);
        $this->assertStringContainsString('>0h</div>', $data['workers']);
        $this->assertStringContainsString('Owner', $data['workers']);
        $this->assertStringNotContainsString('Visitor', $data['workers'].$data['work']);
        $this->assertStringNotContainsString('Other', $data['workers']);
        $this->assertCount(2, $data['readings']);
        $this->get($url, ['X-Object-Work' => '1'])->assertOk()->assertSee('02.11.2026')->assertDontSee('Visitor');
        $this->get(route('object.show', ['object' => $object, 'month' => '2026-11', 'work_search' => 'Visitor', 'user_id' => 4]), ['X-Object-Work' => '1'])
            ->assertOk()->assertSee('Brak sesji');
        $october = $this->get(route('object.show', ['object' => $object, 'month' => '2026-10']), ['X-Object-Preview' => '1'])->assertOk()->json();
        $this->assertStringContainsString('06:00:00', $october['cards']);
        $this->assertCount(2, $october['readings']);
        $this->assertSame(2, $globalBefore['stats']['attention']);
        $this->assertSame(1, $globalBefore['stats']['normal']['count']);
        $this->assertSame(1, $globalBefore['stats']['under']['count']);
        $this->assertSame(0, $globalBefore['stats']['overtime']['count']);
        $object->load('users'); // The SQL gate must not trust a stale, already loaded relation.
        $object->users()->detach(2);
        $detached = $service->build(1, $month, $request, $object, true);
        $this->assertSame(0, $detached['rows']->total());
        $this->assertSame(0, $detached['stats']['seconds']);
        $this->assertSame(0, $detached['stats']['attention']);
        $this->assertSame([], $detached['worker_seconds']);
        $this->assertSame([], $detached['readings']);
        $this->assertSame($globalBefore['stats'], $this->report()['stats']);
        $this->assertSame($sessionsBefore, DB::table('work_sessions')->get()->toJson());
        $after = $this->get($url, ['X-Object-Preview' => '1'])->assertOk()->json();
        $this->assertStringContainsString('>0h</div>', $after['workers']);
        $this->assertStringNotContainsString('Worker', $after['workers']);
        $this->assertSame([], $after['readings']);
    }

    public function test_worker_without_any_assignment_is_excluded_from_preview_and_dashboard(): void
    {
        $object = $this->workObject([], []);
        $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $object->load('location');
        DB::flushQueryLog();
        DB::enableQueryLog();
        $preview = $this->report($object);
        $queries = DB::getQueryLog();
        DB::disableQueryLog();
        $this->assertSame(0, $preview['rows']->total());
        $this->assertSame(0, $preview['stats']['seconds']);
        $this->assertSame([], $preview['readings']);
        $this->assertSame([], $preview['worker_seconds']);
        $this->assertCount(1, $queries);
        $this->assertStringContainsString('object_user', $queries[0]['query']);
        $this->assertSame(0, $this->report()['stats']['seconds']);
        $this->assertSame(0, $this->report()['rows']->total());
    }

    public function test_dashboard_requires_same_company_assignment_and_missing_gps_is_attention_in_both_scopes(): void
    {
        $object = $this->workObject();
        $far = \App\Models\Location::create(['name' => 'B location', 'latitude' => 50, 'longitude' => 19]);
        $other = $this->workObject(['name' => 'B', 'location_id' => $far->id], [1]);
        $foreign = $this->workObject(['name' => 'Foreign', 'company_id' => 2], [3]);
        DB::table('users')->insert([
            ['id' => 4, 'name' => 'Unassigned', 'company_id' => 1, 'role' => 'user'],
            ['id' => 5, 'name' => 'ForeignPivotOnly', 'company_id' => 1, 'role' => 'user'],
        ]);
        $foreign->users()->attach(5);
        $valid = $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $missing = $this->workSession('2026-11-03 08:00:00', '08:00:00');
        $startOnly = $this->workSession('2026-11-04 08:00:00', '08:00:00', $object->location_id);
        DB::table('events')->where('id', DB::table('work_sessions')->where('id', $startOnly)->value('event_stop_id'))->update(['location_id' => null]);
        $stopOnly = $this->workSession('2026-11-05 08:00:00', '08:00:00', null, [], $object->location_id);
        $invalid = \App\Models\Location::create(['name' => 'Invalid GPS', 'latitude' => 'bad', 'longitude' => 19]);
        $badGps = $this->workSession('2026-11-06 08:00:00', '08:00:00', $invalid->id);
        $this->workSession('2026-11-09 08:00:00', '09:00:00', $object->location_id, ['user_id' => 4]);
        $this->workSession('2026-11-10 08:00:00', '08:00:00', null, ['user_id' => 4]);
        $this->workSession('2026-11-11 08:00:00', '09:00:00', $object->location_id, ['user_id' => 5]);
        $this->workSession('2026-11-12 08:00:00', '08:00:00', null, ['user_id' => 5]);
        $before = DB::table('work_sessions')->get()->toJson();
        $dashboard = $this->report();
        $this->assertSame([$valid, $missing, $startOnly, $stopOnly, $badGps], collect($dashboard['rows']->items())->pluck('id')->all());
        $this->assertSame(28800, $dashboard['stats']['seconds']);
        $this->assertSame(1, $dashboard['stats']['normal']['count']);
        $this->assertSame(0, $dashboard['stats']['under']['count']);
        $this->assertSame(0, $dashboard['stats']['overtime']['count']);
        $this->assertSame(['missing_location' => 4], $dashboard['stats']['reasons']);
        foreach (array_slice($dashboard['rows']->items(), 1) as $row) {
            $this->assertNull($row->category);
            $this->assertNull($row->object);
            $this->assertNull($row->day_difference);
        }
        $service = app(\App\Services\Objects\ObjectWorkReport::class);
        $request = Request::create('/', 'GET', ['month' => '2026-11', 'include_unassigned' => 1, 'user_id' => 4]);
        $month = \Carbon\Carbon::parse('2026-11-01');
        $preview = $service->build(1, $month, $request, $object, true);
        $this->assertSame($dashboard['stats'], $preview['stats']);
        $this->assertSame(5, $preview['rows']->total());
        $this->assertCount(2, $preview['readings']);
        $this->assertSame([2 => 28800], $preview['worker_seconds']);
        $this->assertSame(0, $service->build(1, $month, $request, $other, true)['rows']->total());
        $this->get(route('object.dashboard', ['month' => '2026-11', 'work_category' => 'attention']), ['X-Object-Work' => '1'])
            ->assertOk()->assertSee('03.11.2026')->assertDontSee('Unassigned')->assertDontSee('ForeignPivotOnly')->assertDontSee('02.11.2026');
        $this->get(route('object.show', ['object' => $object, 'month' => '2026-11', 'work_category' => 'attention']), ['X-Object-Work' => '1'])
            ->assertOk()->assertSee('03.11.2026')->assertSee('04.11.2026')->assertSee('05.11.2026')->assertSee('06.11.2026')->assertDontSee('02.11.2026');
        $payload = $this->get(route('object.show', ['object' => $object, 'month' => '2026-11']), ['X-Object-Preview' => '1'])->assertOk()->json();
        $this->assertStringContainsString('08:00:00', $payload['cards']);
        $this->assertStringContainsString('Brak prawidłowej lokalizacji', $payload['work']);
        $this->assertCount(2, $payload['readings']);
        $emptyMonth = $this->get(route('object.show', ['object' => $object, 'month' => '2026-10']), ['X-Object-Preview' => '1'])->assertOk()->json();
        $this->assertStringNotContainsString('03.11.2026', $emptyMonth['work']);
        $object->users()->detach(2);
        $this->assertSame(0, $this->report()['rows']->total());
        $this->assertSame(0, $this->report()['stats']['attention']);
        $this->assertSame($before, DB::table('work_sessions')->get()->toJson());
    }

    public function test_missing_location_for_worker_assigned_to_two_objects_is_counted_once_on_dashboard(): void
    {
        $first = $this->workObject();
        $second = $this->workObject();
        $this->workSession();
        $dashboard = $this->report();
        $this->assertSame(1, $dashboard['rows']->total());
        $this->assertSame(1, $dashboard['stats']['attention']);
        $service = app(\App\Services\Objects\ObjectWorkReport::class);
        foreach ([$first, $second] as $object) {
            $preview = $service->build(1, \Carbon\Carbon::parse('2026-11-01'), Request::create('/'), $object, true);
            $this->assertSame(1, $preview['stats']['attention']);
            $this->assertSame(1, $preview['rows']->total());
            $this->assertSame(0, $preview['stats']['seconds']);
            $this->assertSame([], $preview['readings']);
            $this->assertSame([], $preview['worker_seconds']);
        }
    }

    public function test_employee_filter_updates_preview_cards_table_and_map_but_preserves_worker_totals(): void
    {
        $object = $this->workObject();
        DB::table('users')->insert(['id' => 4, 'name' => 'Idle', 'company_id' => 1, 'role' => 'user']);
        $object->users()->syncWithoutDetaching([1, 4]);
        $worker = $this->workSession('2026-11-02 08:00:00', '08:00:00', $object->location_id);
        $missing = $this->workSession('2026-11-03 08:00:00', '08:00:00');
        $owner = $this->workSession('2026-11-04 08:00:00', '09:00:00', $object->location_id, ['user_id' => 1]);
        $this->workSession('2026-10-05 08:00:00', '06:00:00', $object->location_id);
        $before = DB::table('work_sessions')->get()->toJson();
        $service = app(\App\Services\Objects\ObjectWorkReport::class);
        $month = \Carbon\Carbon::parse('2026-11-01');
        $request = Request::create('/', 'GET', ['month' => '2026-11', 'employee_id' => 2]);
        $report = $service->build(1, $month, $request, $object, true);
        $this->assertSame(2, $report['selected_employee_id']);
        $this->assertSame([$worker, $missing], collect($report['rows']->items())->pluck('id')->all());
        $this->assertSame(28800, $report['stats']['seconds']);
        $this->assertSame(1, $report['stats']['normal']['count']);
        $this->assertSame(1, $report['stats']['attention']);
        $this->assertSame(0, $report['stats']['overtime']['count']);
        $this->assertSame([2 => 28800, 1 => 32400], $report['worker_seconds']);
        $this->assertSame(['Worker', 'Worker'], array_column($report['readings'], 'employee'));
        $params = ['object' => $object, 'month' => '2026-11', 'employee_id' => 2];
        $payload = $this->get(route('object.show', $params), ['X-Object-Preview' => '1'])->assertOk()->assertJsonPath('selectedEmployeeId', 2)->json();
        $this->assertStringContainsString('08:00:00', $payload['cards']);
        $this->assertStringContainsString('Brak prawidłowej lokalizacji', $payload['work']);
        $this->assertStringNotContainsString('Owner', $payload['work']);
        $this->assertStringContainsString('9h', $payload['workers']);
        $this->assertStringContainsString('Wyczyść filtr', $payload['workers']);
        $this->assertStringContainsString('@keydown.space.prevent', $payload['workers']);
        $this->assertStringContainsString(':aria-pressed=', $payload['workers']);
        $this->assertStringContainsString('employee_id', $payload['work']);
        $this->get(route('object.show', $params), ['X-Object-Work' => '1'])->assertOk()->assertSee('Worker')->assertDontSee('Owner');
        $params['month'] = '2026-10';
        $october = $this->get(route('object.show', $params), ['X-Object-Preview' => '1'])->assertOk()->assertJsonPath('selectedEmployeeId', 2)->json();
        $this->assertStringContainsString('06:00:00', $october['cards']);
        $this->assertCount(2, $october['readings']);
        $params['month'] = '2026-11';
        $params['employee_id'] = 1;
        $ownerReport = $service->build(1, $month, Request::create('/', 'GET', ['employee_id' => 1]), $object, true);
        $this->assertSame([$owner], collect($ownerReport['rows']->items())->pluck('id')->all());
        $this->assertSame(32400, $ownerReport['stats']['seconds']);
        $this->assertSame(['Owner', 'Owner'], array_column($ownerReport['readings'], 'employee'));
        $this->assertSame(1, $ownerReport['stats']['overtime']['count']);
        $params['employee_id'] = 4;
        $idle = $this->get(route('object.show', $params), ['X-Object-Preview' => '1'])->assertOk()->assertJsonPath('selectedEmployeeId', 4)->json();
        $this->assertSame([], $idle['readings']);
        $this->assertStringContainsString('Brak sesji', $idle['work']);
        $this->assertStringContainsString('00:00:00', $idle['cards']);
        unset($params['employee_id']);
        $all = $this->get(route('object.show', $params), ['X-Object-Preview' => '1'])->assertOk()->assertJsonPath('selectedEmployeeId', null)->json();
        $this->assertStringContainsString('17:00:00', $all['cards']);
        $this->assertCount(4, $all['readings']);
        $this->assertSame($before, DB::table('work_sessions')->get()->toJson());
    }

    public function test_employee_filter_rejects_unassigned_foreign_and_detached_workers_in_all_preview_endpoints(): void
    {
        $object = $this->workObject();
        DB::table('users')->insert(['id' => 4, 'name' => 'Elsewhere', 'company_id' => 1, 'role' => 'user']);
        $this->workObject([], [4]);
        foreach ([1, 3, 4, 999] as $employeeId) {
            foreach ([[], ['X-Object-Preview' => '1'], ['X-Object-Work' => '1']] as $headers) {
                $this->get(route('object.show', ['object' => $object, 'employee_id' => $employeeId]), $headers)->assertForbidden();
            }
        }
        $this->get(route('object.show', ['object' => $object, 'employee_id' => 'invalid']), ['Accept' => 'application/json'])->assertUnprocessable();
        $object->users()->detach(2);
        $this->get(route('object.show', ['object' => $object, 'employee_id' => 2]), ['X-Object-Preview' => '1'])->assertForbidden();
    }

    public function test_employee_filter_pagination_keeps_employee_month_category_and_search(): void
    {
        $object = $this->workObject();
        $object->users()->attach(1);
        foreach (range(1, 30) as $number) {
            $this->workSession('2026-11-02 08:00:00', '00:01:00', $object->location_id);
        }
        $this->workSession('2026-11-03 08:00:00', '08:00:00', $object->location_id, ['user_id' => 1]);
        $request = Request::create('/', 'GET', ['employee_id' => 2, 'month' => '2026-11', 'work_category' => 'under', 'work_search' => 'Worker', 'work_page' => 2]);
        $report = app(\App\Services\Objects\ObjectWorkReport::class)->build(1, \Carbon\Carbon::parse('2026-11-01'), $request, $object, true);
        $this->assertSame(30, $report['rows']->total());
        $this->assertCount(5, $report['rows']->items());
        $this->assertSame([2], collect($report['rows']->items())->pluck('user_id')->unique()->all());
        parse_str(parse_url($report['rows']->url(1), PHP_URL_QUERY), $query);
        $this->assertSame('2', $query['employee_id']);
        $this->assertSame('2026-11', $query['month']);
        $this->assertSame('under', $query['work_category']);
        $this->assertSame('Worker', $query['work_search']);
    }

    public function test_preview_table_keeps_all_assigned_employee_sessions_without_geo_or_attention_preselection(): void
    {
        $object = $this->workObject();
        $object->users()->attach(1);
        DB::table('users')->insert(['id' => 4, 'name' => 'Unassigned', 'company_id' => 1, 'role' => 'user']);
        $otherLocation = \App\Models\Location::create(['name' => 'B', 'latitude' => 50, 'longitude' => 19]);
        $other = $this->workObject(['name' => 'Other site', 'location_id' => $otherLocation->id]);
        $outside = \App\Models\Location::create(['name' => 'Outside', 'latitude' => 40, 'longitude' => 1]);
        $under = $this->workSession('2026-11-02 08:00:00', '06:00:00', $object->location_id);
        $normal = $this->workSession('2026-11-03 08:00:00', '08:00:00', $object->location_id);
        $extra = $this->workSession('2026-11-04 08:00:00', '09:00:00', $object->location_id);
        $missing = $this->workSession('2026-11-05 08:00:00', '08:00:00');
        $elsewhere = $this->workSession('2026-11-06 08:00:00', '08:00:00', $other->location_id);
        $outsideId = $this->workSession('2026-11-09 08:00:00', '08:00:00', $outside->id);
        $blocked = $this->workSession('2026-11-10 08:00:00', '01:00:00', $object->location_id, ['status' => 'Zablokowane']);
        $inProgress = $this->workSession('2026-11-11 08:00:00', '01:00:00', $object->location_id, ['status' => 'W trakcie pracy', 'event_stop_id' => null]);
        $owner = $this->workSession('2026-11-12 08:00:00', '08:00:00', $object->location_id, ['user_id' => 1]);
        $this->workSession('2026-11-13 08:00:00', '09:00:00', $object->location_id, ['user_id' => 4]);
        $october = $this->workSession('2026-10-05 08:00:00', '05:00:00', $object->location_id);
        $service = app(\App\Services\Objects\ObjectWorkReport::class);
        $month = \Carbon\Carbon::parse('2026-11-01');
        $all = $service->build(1, $month, Request::create('/'), $object, true);
        $ids = [$under, $normal, $extra, $missing, $elsewhere, $outsideId, $blocked, $inProgress];
        $this->assertSame([...$ids, $owner], collect($all['rows']->items())->pluck('id')->all());
        $selected = $service->build(1, $month, Request::create('/', 'GET', ['employee_id' => 2]), $object, true);
        $this->assertSame($ids, collect($selected['rows']->items())->pluck('id')->all());
        $this->assertSame(['under', 'normal', 'overtime', null, 'normal', null, null, null], collect($selected['rows']->items())->pluck('category')->all());
        $this->assertSame($other->id, $selected['rows'][4]->object->id);
        $this->assertSame(82800, $selected['stats']['seconds']);
        $this->assertSame(3, $selected['stats']['attention']);
        $this->assertCount(6, $selected['readings']);
        $this->assertSame([2 => 82800, 1 => 28800], $selected['worker_seconds']);
        $params = ['object' => $object, 'month' => '2026-11', 'employee_id' => 2];
        $payload = $this->get(route('object.show', $params), ['X-Object-Preview' => '1'])->assertOk()->json();
        foreach (['02.11.2026', '03.11.2026', '04.11.2026', '05.11.2026', '06.11.2026', '09.11.2026', 'Zablokowane', 'W trakcie pracy'] as $text) {
            $this->assertStringContainsString($text, $payload['work']);
        }
        $this->assertStringNotContainsString('Owner', $payload['work']);
        $this->assertStringNotContainsString('Unassigned', $payload['work']);
        $this->assertCount(6, $payload['readings']);
        $this->get(route('object.show', $params), ['X-Object-Work' => '1'])->assertOk()->assertSee('Other site')->assertSee('02.11.2026');
        $octoberReport = $service->build(1, \Carbon\Carbon::parse('2026-10-01'), Request::create('/', 'GET', ['employee_id' => 2]), $object, true);
        $this->assertSame([$october], collect($octoberReport['rows']->items())->pluck('id')->all());
        unset($params['employee_id']);
        $this->get(route('object.show', $params), ['X-Object-Preview' => '1'])->assertOk()->assertJsonPath('selectedEmployeeId', null);
    }

    private function payload(array $changes = []): array
    {
        return array_replace([
            'name' => 'Office', 'object_type' => 'biuro', 'status' => 'active',
            'datetime_start' => '10.11.2026 08:30', 'datetime_end' => '11.11.2026 16:45',
            'allowed_distance' => 150, 'content' => '<p onclick="bad()"><strong>Info</strong></p>',
            'latitude' => 52.1, 'longitude' => 19.2, 'formatted_address' => 'Test address', 'users' => [2],
        ], $changes);
    }

    public function test_create_and_update_persist_all_details_and_sync_workers(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect(route('object.dashboard'));
        $object = WorkObject::firstOrFail();
        $this->assertSame('08:30', $object->starts_at->format('H:i'));
        $this->assertSame('biuro', $object->object_type);
        $this->assertSame('<p><strong>Info</strong></p>', $object->description);
        $this->assertSame([2], $object->users->modelKeys());
        $locationId = $object->location_id;
        $this->put(route('object.update', $object), $this->payload(['name' => 'Updated', 'status' => 'paused', 'users' => []]))->assertRedirect();
        $object->refresh();
        $this->assertSame('Updated', $object->name);
        $this->assertSame('paused', $object->status);
        $this->assertSame($locationId, $object->location_id);
        $this->assertCount(0, $object->users);
    }

    public function test_validation_rejects_foreign_workers_invalid_coordinates_and_dates(): void
    {
        $this->post(route('object.store'), $this->payload(['users' => [3], 'latitude' => 95, 'datetime_end' => '09.11.2026 10:00']))
            ->assertSessionHasErrors(['users.0', 'latitude', 'datetime_end']);
        $this->assertSame(0, WorkObject::count());
        $this->assertSame(0, DB::table('locations')->count());
    }

    public function test_foreign_object_cannot_be_edited_or_updated(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $object->update(['company_id' => 2]);
        $this->get(route('object.edit', $object))->assertNotFound();
        $this->put(route('object.update', $object), $this->payload())->assertNotFound();
    }

    public function test_dashboard_scopes_statistics_map_and_filters_to_company(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $this->post(route('object.store'), $this->payload(['name' => 'Paused', 'status' => 'paused']))->assertRedirect();
        $this->post(route('object.store'), $this->payload(['name' => 'Foreign']))->assertRedirect();
        WorkObject::where('name', 'Foreign')->update(['company_id' => 2]);
        $request = Request::create('/dashboard/objects/dashboard', 'GET', ['status' => 'paused', 'search' => 'Paused']);
        $data = app(ObjectController::class)->dashboard($request)->getData();
        $this->assertSame(2, (int) $data['total']);
        $this->assertSame(1, $data['workerCount']);
        $this->assertSame(1, $data['objects']->total());
        $this->assertCount(2, $data['mapObjects']);
        $this->assertContains('Paused', $data['mapObjects']->pluck('name')->all());
    }

    public function test_object_search_memory_is_isolated_from_legacy_employee_search_and_map_keeps_all_objects(): void
    {
        $first = $this->workObject(['name' => 'Site A']);
        $second = $this->workObject(['name' => 'Site B']);
        session(['objects.filters.1.dashboard' => ['search' => 'anna', 'status' => '']]);
        $load = function (array $parameters = []) {
            $request = Request::create(route('object.dashboard'), 'GET', $parameters);
            $request->setLaravelSession(session()->driver());
            return app(ObjectController::class)->dashboard($request)->getData();
        };
        $initial = $load();
        $this->assertSame(2, $initial['objects']->total());
        $this->assertCount(2, $initial['mapObjects']);
        $this->assertSame(1, $load(['search' => 'Site A'])['objects']->total());
        $remembered = $load();
        $this->assertSame([$first->id], $remembered['objects']->pluck('id')->all());
        $this->assertCount(2, $remembered['mapObjects']);
        $this->assertSame(2, $load(['search' => ''])['objects']->total());
    }
    public function test_location_change_preserves_original_location_and_empty_selection_is_retained(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $locationId = $object->location_id;
        $this->put(route('object.update', $object), $this->payload(['latitude' => 53.2, 'formatted_address' => 'New address']))->assertRedirect();
        $object->refresh();
        $this->assertNotSame($locationId, $object->location_id);
        $this->assertSame('Test address', DB::table('locations')->where('id', $locationId)->value('address'));
        $this->assertSame('New address', $object->location->address);
        $invalid = $this->payload(['name' => '']);
        unset($invalid['users']);
        $this->from(route('object.edit', $object))->put(route('object.update', $object), $invalid)
            ->assertSessionHasErrors('name')->assertSessionHasInput('users', []);
    }

    public function test_ajax_list_searches_all_company_objects_and_preserves_filters_across_pages(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $seed = WorkObject::firstOrFail();
        foreach (range(1, 18) as $number) {
            $object = $seed->replicate();
            $object->name = 'Match '.str_pad((string) $number, 2, '0', STR_PAD_LEFT);
            $object->save();
        }
        $foreign = $seed->replicate();
        $foreign->fill(['company_id' => 2, 'name' => 'Match foreign'])->save();
        $paused = $seed->replicate();
        $paused->fill(['name' => 'Match paused', 'status' => 'paused'])->save();
        $headers = ['X-Object-List' => '1'];
        $url = route('object.dashboard', ['search' => 'Match', 'status' => 'active']);
        $response = $this->get($url, $headers)->assertOk()->assertHeader('X-Object-List', '1');
        $response->assertSee('Wyświetlono 15 z 18 obiektów')->assertDontSee('Match foreign')->assertDontSee('Match paused');
        $response->assertSee('page=2', false)->assertSee('status=active', false)->assertSee('search=Match', false);
        $this->get($url.'&page=2', $headers)->assertOk()->assertSee('Wyświetlono 3 z 18 obiektów');
        $this->get(route('object.dashboard', ['search' => 'Match 01', 'status' => 'active']), $headers)
            ->assertOk()->assertSee('Wyświetlono 1 z 1 obiektów')->assertSee('Match 01');
        $this->get(route('object.dashboard', ['search' => 'Match', 'status' => 'paused']), $headers)
            ->assertOk()->assertSee('Match paused')->assertSee('Wyświetlono 1 z 1 obiektów');
        $this->get(route('object.dashboard', ['search' => 'missing']), $headers)
            ->assertOk()->assertSee('empty.svg')->assertSee('Wyświetlono 0 z 0 obiektów');
    }

    public function test_type_presentations_cover_all_types_and_list_escapes_object_data(): void
    {
        $this->assertSame(array_keys(WorkObject::TYPES), array_keys(config('work_objects.types')));
        $this->post(route('object.store'), $this->payload(['name' => '<script>alert(1)</script>']))->assertRedirect();
        $object = WorkObject::firstOrFail();
        $this->get(route('object.dashboard'), ['X-Object-List' => '1'])->assertOk()
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false)
            ->assertSee(route('object.show', $object), false)
            ->assertSee('fa-building')->assertSee('from-blue-200')->assertSee('dark:group-hover:text-blue-300');
        $form = file_get_contents(resource_path('views/admin/object/partials/form-fields.blade.php'));
        $start = strpos($form, '<select id="object_type"');
        $select = substr($form, $start, strpos($form, '</select>', $start) + strlen('</select>') - $start);
        $html = \Illuminate\Support\Facades\Blade::render($select, compact('object'));
        foreach (WorkObject::TYPES as $type => $label) {
            $this->assertStringContainsString('value="'.$type.'"', $html);
            $this->assertStringContainsString(e($label), $html);
        }
    }

    public function test_create_and_edit_use_separate_views_and_type_header_uses_shared_presentations(): void
    {
        $this->assertSame('admin.object.create', app(ObjectController::class)->create()->name());
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $this->assertSame('admin.object.edit', app(ObjectController::class)->edit($object)->name());
        foreach (config('work_objects.types') as $type => $presentation) {
            $html = \Illuminate\Support\Facades\Blade::render('<x-object.type-icon :type="$type" />', compact('type'));
            $this->assertStringContainsString('fa-solid '.$presentation['icon'].' text-lg sm:text-2xl', $html);
            $this->assertStringContainsString($presentation['primary'], $html);
            $this->assertStringContainsString($presentation['secondary'], $html);
        }
        foreach ([null, '', 'unknown'] as $type) {
            $html = \Illuminate\Support\Facades\Blade::render('<x-object.type-icon :type="$type" />', compact('type'));
            $this->assertStringContainsString('fa-solid fa-cube text-lg sm:text-2xl', $html);
            $this->assertStringContainsString(config('work_objects.default.primary'), $html);
        }
    }

    public function test_validation_error_keeps_selected_type_for_header_without_updating_stored_type(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $this->from(route('object.edit', $object))
            ->put(route('object.update', $object), $this->payload(['name' => '', 'object_type' => 'magazyn']))
            ->assertSessionHasErrors('name')->assertSessionHasInput('object_type', 'magazyn');
        $this->assertSame('biuro', $object->fresh()->object_type);
        $html = \Illuminate\Support\Facades\Blade::render(
            '<x-object.type-icon :type="old(\'object_type\', $object->object_type)" />', compact('object')
        );
        $this->assertStringContainsString('fa-warehouse', $html);
        $this->assertStringContainsString('from-orange-200', $html);
        $this->assertStringNotContainsString('fa-building', $html);
    }

    private function renderPreview(WorkObject $object): string
    {
        $view = app(ObjectController::class)->show($object, Request::create(route('object.show', $object)));
        $this->assertSame('admin.object.show', $view->name());
        // Render the real preview content without the application-wide navigation and its unrelated data.
        $source = str_replace(['<x-app-layout class="flex">', '</x-app-layout>'], ['<div>', '</div>'],
            file_get_contents(resource_path('views/admin/object/show.blade.php')));

        return \Illuminate\Support\Facades\Blade::render($source, $view->getData());
    }

    public function test_preview_renders_saved_details_and_dashboard_links_point_to_preview(): void
    {
        $this->post(route('object.store'), $this->payload(['name' => '<script>Object</script>', 'object_type' => 'sklep_punkt_uslugowy']))->assertRedirect();
        $object = WorkObject::firstOrFail();
        $html = $this->renderPreview($object);
        $this->assertStringContainsString('&lt;script&gt;Object&lt;/script&gt;', $html);
        $this->assertStringNotContainsString('<script>Object</script>', $html);
        foreach (['fa-store', 'from-pink-200', '10.11.2026', '08:30', '11.11.2026', '16:45', '150 m', 'Worker', 'Test address'] as $text) {
            $this->assertStringContainsString($text, $html);
        }
        $this->assertStringContainsString(route('object.edit', $object), $html);
        $this->assertStringContainsString(route('object.delete', $object), $html);
        $this->assertStringContainsString('name="_method" value="DELETE"', $html);
        $this->assertStringContainsString('name="_token"', $html);
        $this->get(route('object.dashboard'), ['X-Object-List' => '1'])->assertOk()->assertSee(route('object.show', $object), false);
        $data = app(ObjectController::class)->dashboard(Request::create(route('object.dashboard')))->getData();
        $this->assertSame(route('object.show', $object), $data['mapObjects'][0]['url']);
    }

    public function test_delete_preserves_shared_location_and_users_and_cascades_assignments(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $locationId = $object->location_id;
        $this->get(route('object.delete', $object))->assertStatus(405);
        $this->delete(route('object.delete', $object))->assertRedirect(route('object.dashboard'))->assertSessionHas('success');
        $this->assertDatabaseMissing('objects', ['id' => $object->id]);
        $this->assertDatabaseMissing('object_user', ['object_id' => $object->id]);
        $this->assertDatabaseHas('locations', ['id' => $locationId]);
        $this->assertDatabaseHas('users', ['id' => 2]);
    }

    public function test_foreign_preview_and_delete_are_blocked_and_policy_controls_buttons_and_actions(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $object->update(['company_id' => 2]);
        $this->get(route('object.show', $object))->assertNotFound();
        $this->delete(route('object.delete', $object))->assertNotFound();
        $object->update(['company_id' => 1]);
        \Illuminate\Support\Facades\Gate::before(fn ($user, $ability) => in_array($ability, ['update', 'delete'], true) ? false : null);
        $html = $this->renderPreview($object);
        $this->assertStringNotContainsString(route('object.edit', $object), $html);
        $this->assertStringNotContainsString(route('object.delete', $object), $html);
        $this->delete(route('object.delete', $object))->assertForbidden();
        $this->get(route('object.edit', $object))->assertForbidden();
        $this->assertDatabaseHas('objects', ['id' => $object->id]);
    }

    public function test_delete_reports_restricting_relationship_and_rolls_back(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        Schema::create('object_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('object_id')->constrained('objects')->restrictOnDelete();
        });
        DB::table('object_references')->insert(['object_id' => $object->id]);
        $this->delete(route('object.delete', $object))->assertRedirect(route('object.show', $object))->assertSessionHas('fail');
        $this->assertDatabaseHas('objects', ['id' => $object->id]);
        $this->assertDatabaseHas('object_user', ['object_id' => $object->id, 'user_id' => 2]);
    }

    public function test_delete_requires_csrf_and_accepts_method_spoofing(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $middleware = new class($this->app, $this->app['encrypter']) extends \App\Http\Middleware\VerifyCsrfToken {
            protected function runningUnitTests() { return false; }
        };
        $request = Request::create(route('object.delete', $object), 'DELETE');
        $request->setLaravelSession($this->app['session']->driver());
        try {
            $middleware->handle($request, fn () => $this->fail('CSRF verification accepted a request without a token.'));
            $this->fail('A token mismatch was expected.');
        } catch (\Illuminate\Session\TokenMismatchException $exception) {
            $this->assertNotEmpty($exception->getMessage());
        }
        $this->assertDatabaseHas('objects', ['id' => $object->id]);
        $token = str_repeat('a', 40);
        $this->withSession(['_token' => $token])->post(route('object.delete', $object), ['_method' => 'DELETE', '_token' => $token])
            ->assertRedirect(route('object.dashboard'));
        $this->assertDatabaseMissing('objects', ['id' => $object->id]);
    }

    public function test_model_deletion_rule_keeps_object_and_reports_failure(): void
    {
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        WorkObject::deleting(fn () => false);
        $this->delete(route('object.delete', $object))->assertRedirect(route('object.show', $object))->assertSessionHas('fail');
        $this->assertDatabaseHas('objects', ['id' => $object->id]);
        $this->assertDatabaseHas('object_user', ['object_id' => $object->id, 'user_id' => 2]);
    }

    public function test_preview_timeline_handles_current_future_past_and_missing_dates(): void
    {
        $this->travelTo(\Illuminate\Support\Carbon::parse('2026-11-11 12:00:00', config('app.timezone')));
        $this->post(route('object.store'), $this->payload())->assertRedirect();
        $object = WorkObject::firstOrFail();
        $object->update(['starts_at' => '2026-11-10 12:00:00', 'ends_at' => '2026-11-12 12:00:00']);
        $html = $this->renderPreview($object->fresh());
        $this->assertStringContainsString('aria-valuenow="50"', $html);
        $this->assertStringContainsString('Do końca: 1 dzień', $html);

        $this->travelTo(\Illuminate\Support\Carbon::parse('2026-11-09 12:00:00', config('app.timezone')));
        $this->assertStringContainsString('aria-valuenow="0"', $this->renderPreview($object->fresh()));
        $this->travelTo(\Illuminate\Support\Carbon::parse('2026-11-13 12:00:00', config('app.timezone')));
        $html = $this->renderPreview($object->fresh());
        $this->assertStringContainsString('aria-valuenow="100"', $html);
        $this->assertStringContainsString('Od terminu: 1 dzień', $html);

        $object->update(['starts_at' => null, 'ends_at' => null]);
        $html = $this->renderPreview($object->fresh());
        $this->assertStringNotContainsString('role="progressbar"', $html);
        $this->assertStringContainsString('Bez określonego terminu zakończenia', $html);
        $this->travelBack();
    }

    public function test_preview_map_accepts_zero_coordinates_and_empty_sections_use_empty_place(): void
    {
        $this->post(route('object.store'), $this->payload(['latitude' => 0, 'longitude' => 0]))->assertRedirect();
        $object = WorkObject::firstOrFail();
        $html = $this->renderPreview($object);
        $this->assertStringContainsString('Lokalizacja obiektu na mapie Google', $html);
        $this->assertStringNotContainsString('https://www.google.com/maps?q=', $html);
        $this->assertStringContainsString('Test address', $html);
        $this->assertStringContainsString('fa-pen-to-square mr-2', $html);
        $this->assertStringContainsString("onsubmit=\"return confirm('Czy na pewno chcesz usunąć?');\"", $html);
        foreach ([[null, null], [91, 19]] as [$latitude, $longitude]) {
            $object->location->update(compact('latitude', 'longitude'));
            $object->update(['description' => null]);
            $object->users()->detach();
            $html = $this->renderPreview($object->fresh());
            $this->assertSame(2, substr_count($html, 'alt="Brak danych"'));
            $this->assertStringNotContainsString('data-object-description', $html);
            $this->assertStringNotContainsString('x-ref="cardMap"', $html);
        }
    }

}
