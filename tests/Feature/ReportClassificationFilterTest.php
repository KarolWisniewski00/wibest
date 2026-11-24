<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WorkSession;
use App\Services\ReportClassificationFilter;
use App\Services\WorkSessionClassification;
use Illuminate\Http\Request;
use Tests\TestCase;

class ReportClassificationFilterTest extends TestCase
{
    public function test_first_and_second_batches_include_three_distinct_employees(): void
    {
        $users = $this->createMock(\App\Services\UserService::class);
        $users->method('getByRole')->willReturn(collect(range(1, 7))->map(fn ($id) => (new User)->forceFill(['id' => $id])));
        $users->expects($this->exactly(2))->method('getByRoleAddDatesByFilterDate')->willReturnCallback(function ($request, $batch) {
            $this->assertCount(3, $batch);
            return $batch;
        });
        $this->app->instance(\App\Services\UserService::class, $users);
        $controller = app(\App\Http\Controllers\Raport\TimeSheetController::class);
        $method = new \ReflectionMethod($controller, 'reportUsers');
        $first = $method->invoke($controller, Request::create('/'), true);
        $this->assertSame([1, 2, 3], collect($first->items())->pluck('id')->all());
        parse_str(parse_url($first->nextPageUrl(), PHP_URL_QUERY), $query);
        $second = $method->invoke($controller, Request::create('/', 'GET', $query), true);
        $this->assertSame([4, 5, 6], collect($second->items())->pluck('id')->all());
        $this->assertStringContainsString('cursor=6', $second->nextPageUrl());
    }

    public function test_filtered_batch_fills_the_third_matching_employee_and_preserves_the_next_cursor(): void
    {
        session(['rcp.filters.classifications' => ['normal']]);
        $classifier = $this->getMockBuilder(WorkSessionClassification::class)->disableOriginalConstructor()->onlyMethods(['details'])->getMock();
        $classifier->method('details')->willReturnCallback(fn ($session) => ['category' => $session->notes]);
        $this->app->instance(WorkSessionClassification::class, $classifier);
        $users = $this->createMock(\App\Services\UserService::class);
        $users->method('getByRole')->willReturn(collect(range(1, 5))->map(fn ($id) => (new User)->forceFill(['id' => $id])));
        $users->method('getByRoleAddDatesByFilterDate')->willReturnCallback(function ($request, $batch) {
            $this->assertLessThanOrEqual(3, $batch->count());
            return $batch->map(function ($user) {
                $user->dates = ['01.11.26' => 'work'];
                $user->objs = ['01.11.26' => new WorkSession(['notes' => $user->id === 2 ? 'under' : 'normal'])];
                return $user;
            });
        });
        $this->app->instance(\App\Services\UserService::class, $users);
        $controller = app(\App\Http\Controllers\Raport\TimeSheetController::class);
        $method = new \ReflectionMethod($controller, 'reportUsers');
        $first = $method->invoke($controller, Request::create('/'), true);
        $this->assertSame([1, 3, 4], collect($first->items())->pluck('id')->all());
        parse_str(parse_url($first->nextPageUrl(), PHP_URL_QUERY), $query);
        $second = $method->invoke($controller, Request::create('/', 'GET', $query), true);
        $this->assertSame([5], collect($second->items())->pluck('id')->all());
        $this->assertNull($second->nextPageUrl());
    }

    public function test_report_shells_return_without_calculating_any_employee_calendar(): void
    {
        $users = $this->createMock(\App\Services\UserService::class);
        $users->expects($this->never())->method('getByRole');
        $users->expects($this->never())->method('getByRoleAddDatesByFilterDate');
        $this->app->instance(\App\Services\UserService::class, $users);
        $controller = app(\App\Http\Controllers\Raport\TimeSheetController::class);
        foreach (['index', 'smart'] as $method) {
            $request = Request::create('/');
            $request->setLaravelSession(session()->driver());
            $data = $controller->$method($request)->getData();
            $this->assertTrue($data['deferReport']);
            $this->assertTrue($data['users']->isEmpty());
        }
    }

    public function test_both_report_endpoints_keep_classification_selection_across_requests(): void
    {
        $users = $this->createMock(\App\Services\UserService::class);
        $users->method('getByRole')->willReturn(collect());
        $users->method('getByRoleAddDatesByFilterDate')->willReturn(collect());
        $this->app->instance(\App\Services\UserService::class, $users);
        $controller = app(\App\Http\Controllers\Raport\TimeSheetController::class);
        foreach (['setDate', 'setDateSmart'] as $method) {
            $request = \App\Http\Requests\DateRequest::create('/', 'GET', [
                'start_date' => '2026-11-01', 'end_date' => '2026-11-30',
                'classification_filter' => 1, 'classifications' => ['overtime'],
            ]);
            $request->setLaravelSession(session()->driver());
            $response = $controller->$method($request);
            $this->assertSame([], $response->getData(true)['table']);
            $this->assertSame(['overtime'], session('rcp.filters.classifications'));
        }
        foreach (['get', 'getSmart'] as $method) {
            $request = Request::create('/');
            $request->setLaravelSession(session()->driver());
            $this->assertSame([], $controller->$method($request)->getData(true)['table']);
        }
    }

    public function test_report_selection_updates_shared_rcp_memory_without_clearing_other_filters(): void
    {
        session(['rcp.filters.has_note' => true, 'rcp.filters.has_task' => true]);
        $request = Request::create('/', 'GET', ['classification_filter' => 1, 'classifications' => ['normal', 'in_progress']]);
        $service = new ReportClassificationFilter;
        $this->assertSame(['normal', 'in_progress'], $service->selected($request));
        $this->assertSame(['normal', 'in_progress'], $service->selected(Request::create('/')));
        $this->assertTrue(session('rcp.filters.has_note'));
        $this->assertTrue(session('rcp.filters.has_task'));
        $this->assertTrue(session('rcp.filters.active'));
    }

    public function test_reports_use_rcp_classifier_and_remove_nonmatching_days_and_workers(): void
    {
        $classifier = $this->getMockBuilder(WorkSessionClassification::class)->disableOriginalConstructor()->onlyMethods(['details'])->getMock();
        $classifier->method('details')->willReturnCallback(fn ($session) => ['category' => $session->notes]);
        $this->app->instance(WorkSessionClassification::class, $classifier);
        $makeUser = function (array $categories) {
            $user = new User;
            $user->dates = array_fill_keys(array_keys($categories), 'work');
            $user->objs = array_map(fn ($category) => new WorkSession(['notes' => $category]), $categories);
            return $user;
        };
        $users = collect([$makeUser(['01.11.26' => 'normal', '02.11.26' => 'overtime']), $makeUser(['01.11.26' => 'under'])]);
        $filter = new ReportClassificationFilter;
        $this->assertCount(2, $filter->apply($users, ReportClassificationFilter::CATEGORIES));
        $filtered = $filter->apply($users, ['overtime']);
        $this->assertCount(1, $filtered);
        $this->assertNull($filtered->first()->dates['01.11.26']);
        $this->assertSame('work', $filtered->first()->dates['02.11.26']);
        $this->assertCount(0, $filter->apply($users, []));
    }
}
