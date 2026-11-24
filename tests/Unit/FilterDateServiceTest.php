<?php

namespace Tests\Unit;

use App\Services\FilterDateService;
use Illuminate\Http\Request;
use Illuminate\Session\ArraySessionHandler;
use Illuminate\Session\Store;
use PHPUnit\Framework\TestCase;

class FilterDateServiceTest extends TestCase
{
    public function test_partial_and_cross_month_ranges_use_the_start_month_and_update_shared_memory(): void
    {
        foreach ([['2028-02-12', '2028-02-15'], ['2028-02-27', '2028-03-04']] as [$start, $end]) {
            $request = Request::create('/');
            $request->setLaravelSession(new Store('test', new ArraySessionHandler(120)));

            $dates = (new FilterDateService)->fullMonth($request, $start, $end);

            $this->assertSame(['2028-02-01', '2028-02-29'], $dates);
            $this->assertSame($dates[0], $request->session()->get('start_date'));
            $this->assertSame($dates[1], $request->input('end_date'));
            $this->assertNotEmpty($request->session()->get('date_range_info'));
        }
    }

    public function test_full_month_is_preserved_without_correction_notice(): void
    {
        $request = Request::create('/');
        $request->setLaravelSession(new Store('test', new ArraySessionHandler(120)));

        $this->assertSame(['2027-01-01', '2027-01-31'],
            (new FilterDateService)->fullMonth($request, '2027-01-01', '2027-01-31'));
        $this->assertFalse($request->session()->has('date_range_info'));
    }
}
