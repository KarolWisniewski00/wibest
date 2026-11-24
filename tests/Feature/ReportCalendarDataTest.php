<?php

namespace Tests\Feature;

use App\Models\{Event, Leave, WorkSession};
use App\Services\ReportCalendarData;
use Tests\TestCase;

class ReportCalendarDataTest extends TestCase
{
    public function test_monthly_presence_uses_a_fixed_number_of_queries_and_excludes_rejected_leave(): void
    {
        config(['database.default' => 'calendar_data_test', 'database.connections.calendar_data_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '',
        ]]);
        $schema = \Illuminate\Support\Facades\Schema::class;
        $schema::create('users', function ($t) { $t->id(); $t->unsignedBigInteger('company_id'); });
        $schema::create('events', function ($t) {
            $t->id(); $t->unsignedBigInteger('company_id'); $t->unsignedBigInteger('user_id');
            $t->string('event_type'); $t->dateTime('time');
        });
        $schema::create('work_sessions', function ($t) {
            $t->id(); $t->unsignedBigInteger('company_id'); $t->unsignedBigInteger('user_id');
            $t->unsignedBigInteger('event_start_id'); $t->unsignedBigInteger('event_stop_id'); $t->string('status');
        });
        $schema::create('leaves', function ($t) {
            $t->id(); $t->unsignedBigInteger('user_id'); $t->string('status'); $t->date('start_date'); $t->date('end_date');
        });
        $db = \Illuminate\Support\Facades\DB::class;
        $db::table('users')->insert(['id' => 2, 'company_id' => 1]);
        $db::table('events')->insert([
            ['id' => 1, 'company_id' => 1, 'user_id' => 2, 'event_type' => 'start', 'time' => '2026-11-02 08:00:00'],
            ['id' => 2, 'company_id' => 1, 'user_id' => 2, 'event_type' => 'stop', 'time' => '2026-11-02 16:00:00'],
        ]);
        $db::table('work_sessions')->insert(['company_id' => 1, 'user_id' => 2, 'event_start_id' => 1, 'event_stop_id' => 2, 'status' => 'Praca zakończona']);
        $db::table('leaves')->insert(['user_id' => 2, 'status' => 'odrzucone', 'start_date' => '2026-11-04', 'end_date' => '2026-11-04']);
        $users = \App\Models\User::where('id', 2)->get();
        $db::enableQueryLog();
        $data = ReportCalendarData::load($users, '2026-11-01', '2026-11-30', 1);
        $this->assertLessThanOrEqual(6, count($db::getQueryLog()));
        $queries = count($db::getQueryLog());
        foreach (range(1, 30) as $day) $data->day(2, sprintf('%02d.11.26', $day));
        $this->assertSame($queries, count($db::getQueryLog()));
        $this->assertTrue($data->day(2, '02.11.26')[0]);
        $this->assertFalse($data->day(2, '04.11.26')[6]);
        $db::disableQueryLog();
    }

    public function test_bulk_calendar_keeps_night_shifts_daily_order_open_sessions_and_leave(): void
    {
        $start = (new Event)->forceFill(['user_id' => 2, 'event_type' => 'start', 'time' => '2026-11-02 22:00:00']);
        $stop = (new Event)->forceFill(['user_id' => 2, 'event_type' => 'stop', 'time' => '2026-11-03 06:00:00']);
        $openStart = (new Event)->forceFill(['user_id' => 2, 'event_type' => 'start', 'time' => '2026-11-03 10:00:00']);
        $night = (new WorkSession)->forceFill(['id' => 1, 'user_id' => 2, 'status' => 'Praca zakończona']);
        $night->setRelation('eventStart', $start)->setRelation('eventStop', $stop);
        $open = (new WorkSession)->forceFill(['id' => 2, 'user_id' => 2, 'status' => 'W trakcie pracy']);
        $open->setRelation('eventStart', $openStart)->setRelation('eventStop', null);
        $leave = (new Leave)->forceFill(['user_id' => 3, 'start_date' => '2026-11-02', 'end_date' => '2026-11-03']);
        $data = new ReportCalendarData(collect([$start, $stop, $openStart]), collect([$open, $night]), collect([$leave]));
        $first = $data->day(2, '02.11.26');
        $this->assertFalse($first[0]);
        $this->assertTrue($first[1]);
        $this->assertTrue($first[2]);
        $this->assertSame(1, $first[8]->id);
        $next = $data->day(2, '03.11.26');
        $this->assertTrue($next[3]);
        $this->assertTrue($next[4]);
        $this->assertTrue($next[5]);
        $this->assertSame(1, $next[8]->id);
        $this->assertSame(2, $next[9]->id);
        $this->assertTrue($data->day(3, '03.11.26')[6]);
        $this->assertFalse($data->day(3, '04.11.26')[6]);
        $this->assertNull($data->day(4, '03.11.26')[8]);
        $first[8]->notes = 'local change';
        $this->assertNull($data->day(2, '02.11.26')[8]->notes);
    }
}
