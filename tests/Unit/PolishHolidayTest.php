<?php

namespace Tests\Unit;

use App\Services\PolishHoliday;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class PolishHolidayTest extends TestCase
{
    public function test_movable_holidays_use_the_correct_calendar_day_in_different_timezones(): void
    {
        foreach (['Europe/Warsaw', 'UTC', 'America/Los_Angeles'] as $timezone) {
            $this->assertSame('Niedziela Wielkanocna', PolishHoliday::name(Carbon::parse('2026-04-05', $timezone)));
            $this->assertSame('Bo' . "\u{17c}" . 'e Cia' . "\u{142}" . 'o', PolishHoliday::name(Carbon::parse('2026-06-04', $timezone)));
            $this->assertNull(PolishHoliday::name(Carbon::parse('2026-06-03', $timezone)));
        }
    }

    public function test_adjacent_christmas_holidays_have_distinct_names(): void
    {
        $first = PolishHoliday::name(Carbon::parse('2026-12-25'));
        $second = PolishHoliday::name(Carbon::parse('2026-12-26'));

        $this->assertNotNull($first);
        $this->assertNotNull($second);
        $this->assertNotSame($first, $second);
        $this->assertNull(PolishHoliday::name(Carbon::parse('2026-12-27')));
    }
}
