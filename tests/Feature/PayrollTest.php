<?php

namespace Tests\Feature;

use App\Models\{EmployeeContract, PayrollSnapshot, User};
use App\Services\Payroll\{EmployerCostCalculator, PayrollParameters, PayrollReport};
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\{DB, Gate, Schema};
use Illuminate\View\Component;
use Tests\TestCase;

class PayrollTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'payroll_test', 'database.connections.payroll_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '', 'foreign_key_constraints' => true,
        ]]);
        Carbon::setTestNow(Carbon::parse('2026-11-20 12:00:00'));
        Schema::create('companies', function (Blueprint $t) { $t->id(); $t->string('name'); });
        Schema::create('users', function (Blueprint $t) {
            $t->id(); $t->string('name'); $t->string('email'); $t->string('password');
            $t->string('role')->nullable(); $t->unsignedBigInteger('company_id')->nullable(); $t->timestamps();
            $t->string('working_hours_regular')->nullable();
            $t->integer('working_hours_custom')->nullable();
            $t->string('working_hours_start_day')->nullable(); $t->string('working_hours_stop_day')->nullable();
            $t->boolean('public_holidays')->default(true);
            foreach (['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'] as $day) $t->boolean('working_'.$day)->default(false);
        });
        Schema::create('events', function (Blueprint $t) {
            $t->unsignedBigInteger('location_id')->nullable();
            $t->id(); $t->unsignedBigInteger('user_id'); $t->unsignedBigInteger('company_id'); $t->dateTime('time');
            $t->string('event_type')->nullable();
        });
        Schema::create('locations', function (Blueprint $t) { $t->id(); $t->decimal('latitude')->nullable(); $t->decimal('longitude')->nullable(); });
        Schema::create('work_sessions', function (Blueprint $t) {
            $t->id(); $t->unsignedBigInteger('user_id'); $t->unsignedBigInteger('company_id');
            $t->unsignedBigInteger('event_start_id')->nullable(); $t->unsignedBigInteger('event_stop_id')->nullable();
            $t->string('status'); $t->string('time_in_work')->nullable(); $t->timestamps();
        });
        Schema::create('work_blocks', function (Blueprint $t) {
            $t->id(); $t->unsignedBigInteger('user_id'); $t->unsignedBigInteger('company_id');
            $t->dateTime('starts_at'); $t->dateTime('ends_at'); $t->integer('duration_seconds');
        });
        Schema::create('leaves', function (Blueprint $t) {
            $t->id(); $t->unsignedBigInteger('user_id'); $t->unsignedBigInteger('company_id');
            $t->string('status'); $t->string('type'); $t->date('start_date'); $t->date('end_date');
        });
        (require database_path('migrations/2026_11_19_120000_create_payroll_tables.php'))->up();
        (require database_path('migrations/2026_11_20_120000_create_employee_tax_and_payments.php'))->up();
        (require database_path('migrations/2026_11_21_120000_extend_employment_configuration.php'))->up();
        (require database_path('migrations/2026_11_21_130000_add_payroll_exemption_balance.php'))->up();
        Schema::create('user_company_history',function (Blueprint $t) {
            $t->id(); $t->unsignedBigInteger('user_id'); $t->unsignedBigInteger('company_id');
            $t->dateTime('assigned_at')->nullable(); $t->dateTime('unassigned_at')->nullable();
            $t->date('employment_start')->nullable(); $t->date('employment_end')->nullable(); $t->timestamps();
        });
        DB::table('companies')->insert([['id' => 1, 'name' => 'Firma A'], ['id' => 2, 'name' => 'Firma B']]);
        Component::resolveComponentsUsing(fn ($component, $data) => $component === \App\View\Components\AppLayout::class ? new PayrollTestLayout() : app($component, $data));
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        Component::resolveComponentsUsing(null);
        parent::tearDown();
    }

    private function user(string $role = 'admin', int $company = 1): User
    {
        return User::create(['name' => 'Jan Kowalski', 'email' => uniqid().'@example.test', 'password' => 'password', 'role' => $role, 'company_id' => $company]);
    }

    private function contract(array $changes = []): EmployeeContract
    {
        return new EmployeeContract(array_replace(['type' => 'employment', 'settlement' => 'monthly', 'fte' => 1,
            'monthly_gross' => 6000, 'hourly_rate' => null, 'night_start' => 22, 'overtime_rule' => 'monthly_basic',
            'starts_on' => '2026-01-01', 'effective_from' => '2026-01-01', 'configuration_status'=>'complete',
            'details'=>['term'=>'indefinite','signed_on'=>'2026-01-01','position'=>'Specjalista','workplaces'=>'Warszawa','time_system'=>'basic',
                'period_months'=>1,'period_start'=>'2026-01-01','daily_norm'=>8,'weekly_norm'=>40,'norm_basis'=>'Standardowe','schedule_link'=>'existing']], $changes));
    }

    private function worker(): User
    {
        return (new User())->forceFill(['id' => 1, 'company_id' => 1, 'name' => 'Jan', 'working_hours_regular' => 'stały planing',
            'working_hours_custom' => 8, 'working_hours_start_day' => 'poniedziałek', 'working_hours_stop_day' => 'piątek', 'public_holidays' => true]);
    }

    private function workSession(string $date, string $start = '08:00:00', string $stop = '16:00:00', string $duration = '08:00:00'): object
    {
        return (object) ['id' => random_int(1, 99999), 'start_time' => "$date $start", 'stop_time' => "$date $stop",
            'status' => 'Praca zakończona', 'time_in_work' => $duration, 'start_company' => 1, 'stop_company' => 1, 'start_user' => 1, 'stop_user' => 1];
    }

    private function fullMonth(): \Illuminate\Support\Collection
    {
        $sessions = collect();
        for ($d = Carbon::parse('2026-10-01'); $d->month === 10; $d->addDay()) if ($d->isWeekday()) $sessions->push($this->workSession($d->toDateString()));
        return $sessions;
    }

    public function test_2026_nominal_includes_january_and_saturday_holidays_and_unknown_year_is_not_guessed(): void
    {
        $p = app(PayrollParameters::class);
        $this->assertSame(160 * 3600, $p->nominalSeconds(Carbon::parse('2026-01-01')));
        $this->assertSame(160 * 3600, $p->nominalSeconds(Carbon::parse('2026-08-01')));
        $this->assertSame(160 * 3600, $p->nominalSeconds(Carbon::parse('2026-12-01')));
        $this->assertNull($p->forMonth(Carbon::parse('2027-01-01')));
    }

    public function test_complete_month_and_fixed_salary_vacation(): void
    {
        $report = app(PayrollReport::class);
        $row = $report->calculate($this->worker(), $this->contract(), Carbon::parse('2026-10-01'), $this->fullMonth(), collect(), collect());
        $this->assertSame('Gotowe', $row['status']);
        $this->assertEquals(6000, $row['gross']);
        $sessions = $this->fullMonth(); $sessions->shift();
        $leave = (object) ['id' => 1, 'type' => 'urlop wypoczynkowy', 'status' => 'zaakceptowane', 'start_date' => '2026-10-01', 'end_date' => '2026-10-01'];
        $row = $report->calculate($this->worker(), $this->contract(), Carbon::parse('2026-10-01'), $sessions, collect(), collect([$leave]));
        $this->assertSame('Gotowe', $row['status']);
        $this->assertEquals(6000, $row['gross']);
        $this->assertSame(28800, $row['absence']);
        $leave->type = 'zwolnienie lekarskie';
        $row = $report->calculate($this->worker(), $this->contract(), Carbon::parse('2026-10-01'), $sessions, collect(), collect([$leave]));
        $this->assertSame('Wymaga uwagi', $row['status']); $this->assertNull($row['gross']);
    }

    public function test_missing_contract_empty_month_and_overtime_are_not_marked_ready(): void
    {
        $report = app(PayrollReport::class); $month = Carbon::parse('2026-10-01');
        $row = $report->calculate($this->worker(), null, $month, collect(), collect(), collect());
        $this->assertSame('Wymaga danych', $row['status']); $this->assertNull($row['gross']);
        $row = $report->calculate($this->worker(), $this->contract(), $month, collect(), collect(), collect());
        $this->assertSame('Wymaga uwagi', $row['status']);
        $sessions = $this->fullMonth(); $sessions[0] = $this->workSession('2026-10-01', '08:00:00', '18:00:00', '10:00:00');
        $row = $report->calculate($this->worker(), $this->contract(), $month, $sessions, collect(), collect());
        $this->assertSame(7200, $row['extra']); $this->assertNull($row['gross']);
    }

    public function test_night_work_is_intersected_with_configured_window_and_paid_separately(): void
    {
        $sessions = $this->fullMonth(); $sessions[0] = $this->workSession('2026-10-01', '00:00:00', '08:00:00');
        $row = app(PayrollReport::class)->calculate($this->worker(), $this->contract(), Carbon::parse('2026-10-01'), $sessions, collect(), collect());
        $this->assertSame('Gotowe', $row['status']); $this->assertSame(21600, $row['night']);
        $this->assertEquals(6032.77, $row['gross']);
    }

    public function test_mandate_uses_hours_work_contract_requires_acceptance_and_cross_month_session_blocks(): void
    {
        $report = app(PayrollReport::class); $month = Carbon::parse('2026-10-01');
        $c = $this->contract(['type' => 'mandate', 'settlement' => 'hourly', 'hourly_rate' => 40, 'monthly_gross' => null]);
        $row = $report->calculate($this->worker(), $c, $month, collect([$this->workSession('2026-10-01')]), collect(), collect());
        $this->assertSame('Wymaga danych', $row['status']); $this->assertNull($row['gross']);
        $row = $report->calculate($this->worker(), $this->contract(['type' => 'work']), $month, collect(), collect(), collect());
        $this->assertSame('Wymaga danych', $row['status']);
        $session = $this->workSession('2026-10-31', '22:00:00'); $session->stop_time = '2026-11-01 06:00:00';
        $row = $report->calculate($this->worker(), $c, $month, collect([$session]), collect(), collect());
        $this->assertNull($row['gross']);
    }

    public function test_employer_cost_requires_monthly_inputs_and_applies_annual_cap(): void
    {
        $row = ['gross' => 6000, 'contract' => ['type' => 'employment'], 'parameters' => config('payroll.versions.2026-01-01')];
        $result = (new EmployerCostCalculator())->apply($row, ['pension_base_before_month' => 281600, 'accident_percent' => 1.67, 'fp_fs' => true, 'fgsp' => true, 'ppk_percent' => 1.5]);
        $this->assertEquals(6505.8, $result['cost']);
        $this->assertEquals(97.6, $result['cost_lines'][0]['amount']);
    }

    public function test_admin_and_owner_can_access_and_other_roles_cannot_use_any_endpoint(): void
    {
        $employee = $this->user('użytkownik');
        foreach (['admin', 'właściciel'] as $role) {
            $actor = $this->user($role); $this->actingAs($actor);
            $this->get(route('raport.payroll.index', ['month' => '2026-10']))->assertOk()->assertDontSee($employee->name);
            $this->get(route('raport.payroll.show', ['user' => $employee, 'month' => '2026-10']))->assertOk();
        }
        foreach (['menedżer', 'kierownik', 'użytkownik', 'CRM'] as $role) {
            $this->actingAs($this->user($role));
            $this->get(route('raport.payroll.index'))->assertForbidden();
            $this->get(route('raport.payroll.show', $employee))->assertForbidden();
            $this->post(route('team.user.employment.store', $employee), [])->assertForbidden();
            $this->post(route('raport.payroll.snapshot', $employee), [])->assertForbidden();
            $this->post(route('raport.payroll.cost-inputs', $employee), [])->assertForbidden();
        }
        $this->actingAs($this->user('admin', 2));
        $this->get(route('raport.payroll.show', $employee))->assertNotFound();
        $this->post(route('team.user.employment.store', $employee), [])->assertNotFound();
        $this->post(route('raport.payroll.snapshot', $employee), [])->assertNotFound();
    }

    public function test_migration_preserves_users_contract_versions_and_snapshot_survives_parameter_changes(): void
    {
        $user = $this->netFixture();
        $original = PayrollSnapshot::first()->payload;
        $before = $user->fresh()->getAttributes();
        $input = ['type'=>'mandate','settlement'=>'hourly','hourly_rate'=>'40','overtime_rule'=>'review','starts_on'=>'2026-01-01','effective_from'=>'2026-01-01'];
        $this->postJson(route('team.user.employment.store',$user),$input)->assertUnprocessable();
        $this->assertEquals($before,$user->fresh()->getAttributes());
        config(['payroll.versions'=>[]]);
        $row = app(PayrollReport::class)->build(1,collect([$user]),Carbon::parse('2026-10-01'))->first();
        $this->assertEquals($original['parameters'],$row['parameters']);
    }

    public function test_team_search_and_role_filters_intersect_and_do_not_leak_financial_data(): void
    {
        $admin = $this->user(); $this->actingAs($admin);
        $manager = $this->user('kierownik');
        $other = $this->user('kierownik'); $other->update(['name' => 'Anna Nowak']);
        $this->user('kierownik', 2);
        $response = $this->getJson(route('api.v1.team.user.get', ['search' => 'Jan', 'role_filter' => ['kierownik']]));
        $response->assertOk()->assertJsonPath('count', 1)->assertJsonMissingPath('data');
        $this->assertStringContainsString(route('team.user.show', $manager), $response->json('table.0'));
        $this->assertStringContainsString('fa-chevron-right', $response->json('list.0'));
        $this->assertStringContainsString('rounded-xl', $response->json('table.0'));
        $this->assertStringNotContainsString('focus-within:ring-green', $response->json('table.0'));
        $this->assertStringContainsString('absolute top-4 right-4', $response->json('list.0'));
        $this->assertStringNotContainsString('fa-eye', $response->json('list.0'));
        $this->getJson(route('api.v1.team.user.get', ['search' => 'Nobody', 'role_filter' => ['kierownik']]))->assertOk()->assertJsonPath('count', 0);
        $this->actingAs($manager);
        $html = view('admin.team.employment', ['user' => $manager, 'employment' => $this->contract(['monthly_gross' => 12345])])->render();
        $this->assertStringNotContainsString('12345', $html);
        $this->assertStringNotContainsString('monthly_gross', $html);
    }

    public function test_employee_preview_uses_new_cards_without_daily_summary_and_leave_has_neutral_background(): void
    {
        $view = file_get_contents(resource_path('views/admin/team/user.blade.php'));
        $this->assertStringNotContainsString('Podsumowanie dnia', $view);
        $this->assertGreaterThanOrEqual(4, substr_count($view, '<x-team-info-card'));
        $this->assertStringContainsString('rounded-2xl bg-white', $view);
        $this->assertStringContainsString('dark:bg-gray-800', $view);
        $this->assertStringNotContainsString('dark:bg-gray-700 dark:hover:shadow-black/10 sm:p-6', $view);
    }

    public function test_report_reads_only_selected_month_and_scopes_events_to_tenant(): void
    {
        $user = $this->user();
        EmployeeContract::create($this->contract(['type' => 'mandate', 'settlement' => 'hourly', 'hourly_rate' => 40])->getAttributes()
            + ['user_id' => $user->id, 'company_id' => 1, 'created_by' => $user->id]);
        foreach (['2026-09-01', '2026-10-01'] as $date) {
            $start = DB::table('events')->insertGetId(['user_id' => $user->id, 'company_id' => 1, 'time' => "$date 08:00:00"]);
            $stop = DB::table('events')->insertGetId(['user_id' => $user->id, 'company_id' => 1, 'time' => "$date 16:00:00"]);
            DB::table('work_sessions')->insert(['user_id' => $user->id, 'company_id' => 1, 'event_start_id' => $start, 'event_stop_id' => $stop, 'status' => 'Praca zakończona', 'time_in_work' => '08:00:00', 'created_at' => "$date 08:00:00"]);
        }
        $row = app(PayrollReport::class)->build(1, collect([$user]), Carbon::parse('2026-10-01'))->first();
        $this->assertSame(28800, $row['worked']); $this->assertCount(1, $row['sessions']); $this->assertNull($row['gross']);
        DB::table('events')->where('id', $stop)->update(['company_id' => 2]);
        $row = app(PayrollReport::class)->build(1, collect([$user]), Carbon::parse('2026-10-01'))->first();
        $this->assertSame('Wymaga danych', $row['status']); $this->assertNull($row['gross']);
    }

    public function test_payroll_filters_use_shared_dates_and_return_monthly_reports_without_full_reload(): void
    {
        $admin = $this->user(); $this->actingAs($admin);
        $worker = $this->user('użytkownik');
        $worker->update(['name' => 'Wybrany pracownik']);
        EmployeeContract::create($this->contract()->getAttributes() + ['user_id' => $worker->id, 'company_id' => 1, 'created_by' => $admin->id]);
        $other = $this->user('użytkownik', 2);
        EmployeeContract::create($this->contract()->getAttributes() + ['user_id' => $other->id, 'company_id' => 2, 'created_by' => $other->id]);

        $this->withSession(['start_date' => '2026-10-15', 'end_date' => '2026-11-05'])
            ->get(route('raport.payroll.index', ['search' => 'Wybrany']), ['X-Payroll-Results' => '1'])
            ->assertOk()->assertHeader('X-Payroll-Results', '1')
            ->assertViewIs('admin.payroll.partials.results')
            ->assertViewHas('startDate', '2026-10-01')->assertViewHas('endDate', '2026-10-31')
            ->assertSessionHas('date_range_info')
            ->assertViewHas('rows', fn ($rows) => $rows->pluck('month')->all() === ['2026-10'])
            ->assertSee($worker->name)->assertDontSee($other->name);

        $this->get(route('raport.payroll.index', ['start_date' => '2026-10-20', 'end_date' => '2026-10-20']), ['X-Payroll-Results' => '1'])
            ->assertOk()->assertSessionHas('start_date', '2026-10-01')->assertSessionHas('end_date', '2026-10-31')
            ->assertViewHas('rows', fn ($rows) => $rows->count() === 1 && $rows->first()['month'] === '2026-10');
        $this->get(route('raport.payroll.index', ['search' => 'Nobody']), ['X-Payroll-Results' => '1'])
            ->assertOk()->assertViewHas('rows', fn ($rows) => $rows->isEmpty());
    }

    public function test_payroll_list_only_contains_employees_with_applicable_employment_data(): void
    {
        $admin = $this->user(); $this->actingAs($admin);
        $configured = $this->user('użytkownik');
        $future = $this->user('użytkownik');
        $missing = $this->user('użytkownik');
        $incomplete = $this->user('użytkownik');
        $configured->update(['name' => 'Skonfigurowany Pracownik']);
        $future->update(['name' => 'Przyszła Umowa']);
        $missing->update(['name' => 'Brak Umowy']);
        $incomplete->update(['name' => 'Niepełna Umowa']);
        EmployeeContract::create($this->contract()->getAttributes() + ['user_id' => $configured->id, 'company_id' => 1, 'created_by' => $admin->id]);
        EmployeeContract::create($this->contract(['starts_on' => '2026-12-01', 'effective_from' => '2026-12-01'])->getAttributes()
            + ['user_id' => $future->id, 'company_id' => 1, 'created_by' => $admin->id]);
        EmployeeContract::create($this->contract(['night_start' => null])->getAttributes()
            + ['user_id' => $incomplete->id, 'company_id' => 1, 'created_by' => $admin->id]);
        $response = $this->get(route('raport.payroll.index', ['month' => '2026-10']))->assertOk();
        $response->assertSee($configured->name)->assertDontSee($future->name)->assertDontSee($missing->name)->assertDontSee($incomplete->name);
    }

    private function netFixture(bool $opening = true): User
    {
        $user = $this->user(); $this->actingAs($user);
        $contract = $this->contract()->getAttributes() + ['user_id' => $user->id, 'company_id' => 1, 'created_by' => $user->id];
        EmployeeContract::create($contract);
        $row = app(PayrollReport::class)->calculate($this->worker(), $this->contract(), Carbon::parse('2026-10-01'), $this->fullMonth(), collect(), collect());
        PayrollSnapshot::create(['user_id' => $user->id, 'company_id' => 1, 'created_by' => $user->id, 'month' => '2026-10-01', 'payload' => $row]);
        $this->post(route('team.user.tax-settings', $user), ['effective_from' => '2026-01-01', 'kup_cents' => 25000, 'pit_reduction_cents' => 30000,
            'health_legacy_reduction_cents' => 4376, 'exemption' => 'none', 'ppk_employee_bp' => 0, 'ppk_employer_bp' => 0, 'declarations_confirmed' => 1])->assertRedirect()->assertSessionHasNoErrors();
        if ($opening) $this->post(route('raport.payroll.opening', $user), ['starts_on' => '2026-01-01', 'payer_income' => '0', 'pension_base' => '0',
            'health_legacy_income' => '0', 'opening_confirmed' => 1])->assertRedirect()->assertSessionHasNoErrors();
        return $user;
    }

    private function netInput(array $changes = []): array
    {
        return array_replace(['period' => '2026-10', 'paid_on' => '2026-11-10', 'gross' => '6000.00', 'benefit' => '0', 'ppk_transferred' => '0', 'scope_confirmed' => 1], $changes);
    }

    private function approvalInput(User $user, array $input): array
    {
        $response = $this->postJson(route('raport.payroll.net.preview', $user), $input);
        $this->assertSame(200,$response->status(),$response->getContent());
        $preview = $response->json();
        return $input + ['preview_hash' => hash('sha256', json_encode($preview)), 'request_key' => (string) \Illuminate\Support\Str::uuid(), 'history_confirmed' => 1];
    }

    public function test_net_workflow_multiple_payments_and_immutable_history(): void
    {
        $user = $this->netFixture();
        $input = $this->approvalInput($user, $this->netInput(['gross' => '3000']));
        $this->post(route('raport.payroll.net.approve', $user), $input)->assertRedirect()->assertSessionHasNoErrors();
        $this->post(route('raport.payroll.net.approve', $user), $input)->assertRedirect()->assertSessionHasNoErrors();
        $this->assertDatabaseCount('payroll_payments', 1);
        $this->get(route('raport.payroll.net', ['user' => $user, 'month' => '2026-10']))
            ->assertOk()->assertSee('Częściowo rozliczono')->assertSee('value="3000.00"', false);
        $input = $this->approvalInput($user, $this->netInput(['gross' => '3000', 'paid_on' => '2026-11-20']));
        $this->post(route('raport.payroll.net.approve', $user), $input)->assertRedirect()->assertSessionHasNoErrors();
        $payments = \App\Models\PayrollPayment::orderBy('id')->get();
        $this->assertCount(2, $payments); $this->assertSame(442043, $payments->sum(fn ($v) => $v->payload['amounts']['net']));
        $this->assertSame(0, $payments->last()->payload['amounts']['kup']);
        $this->get(route('raport.payroll.net', ['user' => $user, 'month' => '2026-10']))->assertOk()->assertSee('Zatwierdzone');
        $this->get(route('raport.payroll.net', ['user' => $user, 'month' => '2026-10']))
            ->assertOk()->assertSee('Miesiąc rozliczono')->assertDontSee('name="gross"', false);
        $this->assertSame('3000', $payments->first()->payload['input']['gross']);
        $this->assertTrue($payments->first()->payload['history_confirmed']);
        $original = $payments->first()->payload;
        \App\Models\EmployeeTaxSetting::create(['user_id' => $user->id, 'company_id' => 1, 'created_by' => $user->id, 'effective_from' => '2026-12-01',
            'kup_cents' => 30000, 'pit_reduction_cents' => 0, 'health_legacy_reduction_cents' => 0, 'exemption' => 'none', 'ppk_employee_bp' => 0, 'ppk_employer_bp' => 0]);
        $response = $this->postJson(route('raport.payroll.net.preview', $user), $this->netInput(['paid_on' => '2026-12-01']))->assertOk();
        $response->assertJsonPath('settings.kup_cents', 30000)->assertJsonPath('settings.pit_reduction_cents', 0);
        config(['payroll_net.2026.pit_low_bp' => 9900]);
        $this->assertEquals($original, $payments->first()->fresh()->payload);
    }

    public function test_net_missing_history_is_only_simulation_and_approval_recalculates(): void
    {
        $user = $this->netFixture(false);
        $input = $this->approvalInput($user, $this->netInput());
        $this->postJson(route('raport.payroll.net.approve', $user), $input)->assertUnprocessable();
        $this->assertDatabaseCount('payroll_payments', 0);
        $this->post(route('raport.payroll.opening', $user), ['starts_on' => '2026-01-01', 'payer_income' => '0', 'pension_base' => '0', 'health_legacy_income' => '0', 'opening_confirmed' => 1])->assertSessionHasNoErrors();
        $input = $this->approvalInput($user, $this->netInput());
        $this->postJson(route('raport.payroll.net.approve', $user), array_replace($input, ['gross' => '5999']))->assertUnprocessable();
        $this->post(route('raport.payroll.net.approve', $user), $input)->assertRedirect()->assertSessionHasNoErrors();
        $this->postJson(route('raport.payroll.net.approve', $user), $this->approvalInput($user, $this->netInput(['gross' => '1'])))->assertUnprocessable();
        $this->postJson(route('raport.payroll.net.preview', $user), $this->netInput(['paid_on' => '2027-01-10']))->assertUnprocessable();
    }

    public function test_settlement_saves_live_report_and_payment_together_and_survives_reopening(): void
    {
        $user = $this->netFixture();
        PayrollSnapshot::query()->delete();
        EmployeeContract::first()->update(['details' => $this->contract()->details]);
        DB::table('users')->where('id', $user->id)->update([
            'working_hours_regular' => 'stały planing', 'working_hours_custom' => 8,
            'working_hours_start_day' => 'poniedziałek', 'working_hours_stop_day' => 'piątek',
        ]);
        $user->refresh();
        foreach ($this->fullMonth() as $session) {
            $start = DB::table('events')->insertGetId(['company_id' => 1, 'user_id' => $user->id, 'time' => $session->start_time]);
            $stop = DB::table('events')->insertGetId(['company_id' => 1, 'user_id' => $user->id, 'time' => $session->stop_time]);
            DB::table('work_sessions')->insert(['company_id' => 1, 'user_id' => $user->id, 'event_start_id' => $start,
                'event_stop_id' => $stop, 'status' => 'Praca zakończona', 'time_in_work' => '08:00:00']);
        }
        $input = $this->approvalInput($user, $this->netInput());
        $this->assertDatabaseCount('payroll_snapshots', 0);
        $this->assertDatabaseCount('payroll_payments', 0);
        $this->postJson(route('raport.payroll.net.approve', $user), array_replace($input, ['gross' => '5999']))->assertUnprocessable();
        $this->assertDatabaseCount('payroll_snapshots', 0);
        $this->assertDatabaseCount('payroll_payments', 0);
        $this->post(route('raport.payroll.net.approve', $user), $input)->assertSessionHasNoErrors()->assertSessionHas('success', fn ($message) => str_contains($message, 'Miesiąc 2026-10 rozliczono'));
        $this->post(route('raport.payroll.net.approve', $user), $input)->assertSessionHasNoErrors();
        $this->assertDatabaseCount('payroll_snapshots', 1);
        $this->assertDatabaseCount('payroll_payments', 1);
        DB::table('work_sessions')->update(['status' => 'Zablokowane']);
        $saved = app(PayrollReport::class)->build(1, collect([$user]), Carbon::parse('2026-10-01'))->first();
        $this->assertSame('Rozliczono', $saved['payment_status']);
        $this->assertSame('Gotowe', $saved['status']);
        $this->assertSame(600000, $saved['paid_gross_cents']);
        $this->assertNotNull($saved['settled_at']);
        $this->get(route('raport.payroll.net', ['user' => $user, 'month' => '2026-10']))->assertOk()->assertSee('Miesiąc rozliczono')->assertDontSee('name="gross"', false);
        $this->get(route('raport.payroll.index', ['month' => '2026-10']))->assertOk()->assertSee('Miesiąc rozliczono');
        $this->get(route('raport.payroll.show', ['user' => $user, 'month' => '2026-10']))->assertOk()->assertSee('Miesiąc rozliczono');
        $zero = $this->approvalInput($user, $this->netInput(['gross' => '0']));
        $this->postJson(route('raport.payroll.net.approve', $user), $zero)->assertUnprocessable();
        $this->assertDatabaseCount('payroll_payments', 1);
    }

    public function test_tax_and_net_routes_enforce_roles_tenant_and_confirmation(): void
    {
        $user = $this->netFixture();
        $this->get(route('raport.payroll.net', $user))->assertOk();
        $this->post(route('raport.payroll.net.preview', $user), $this->netInput())->assertOk()->assertSee('4420,43 zł');
        foreach (['menedżer', 'kierownik', 'użytkownik'] as $role) {
            $this->actingAs($this->user($role));
            $this->get(route('raport.payroll.net', $user))->assertForbidden();
            foreach (['raport.payroll.net.preview', 'raport.payroll.net.approve', 'team.user.tax-settings', 'raport.payroll.opening'] as $route) $this->postJson(route($route, $user), $this->netInput())->assertForbidden();
        }
        $this->actingAs($this->user('właściciel', 2));
        $this->get(route('raport.payroll.net', $user))->assertNotFound();
        foreach (['raport.payroll.net.preview', 'raport.payroll.net.approve', 'team.user.tax-settings', 'raport.payroll.opening'] as $route) $this->postJson(route($route, $user), $this->netInput())->assertNotFound();
        $this->actingAs($this->user('właściciel'));
        $this->get(route('raport.payroll.net', $user))->assertOk();
        $this->postJson(route('raport.payroll.net.preview', $user), $this->netInput(['scope_confirmed' => 0]))->assertUnprocessable();
    }

    public function test_mid_month_setting_changes_and_out_of_order_payments_are_blocked(): void
    {
        $user = $this->netFixture();
        $input = $this->approvalInput($user, $this->netInput(['gross' => '3000']));
        $this->post(route('raport.payroll.net.approve', $user), $input)->assertSessionHasNoErrors();
        $this->postJson(route('raport.payroll.net.preview', $user), $this->netInput(['paid_on' => '2026-11-09']))->assertUnprocessable();
        $this->post(route('team.user.tax-settings', $user), ['effective_from' => '2026-11-15', 'kup_cents' => 30000, 'pit_reduction_cents' => 0,
            'health_legacy_reduction_cents' => 0, 'exemption' => 'none', 'ppk_employee_percent' => '0', 'ppk_employer_percent' => '0', 'declarations'=>['enhanced_kup'=>'confirmed'], 'declarations_confirmed' => 1])->assertSessionHasNoErrors();
        $this->postJson(route('raport.payroll.net.preview', $user), $this->netInput(['paid_on' => '2026-11-20']))->assertUnprocessable();
        $this->assertDatabaseCount('payroll_payments', 1);
    }

    private function simpleContractInput(array $changes = []): array
    {
        return array_replace(['form_version'=>'2','term'=>'indefinite','starts_on'=>'2026-01-01','effective_from'=>'2026-01-01',
            'birth_date'=>'1990-05-01','pay_basis'=>'monthly_gross','amount'=>'6000','fte'=>'1','night_start'=>'22',
            'pit_zero'=>'none','ppk'=>'0','pit_reduction'=>'300','kup'=>'250','confirmed'=>1],$changes);
    }

    public function test_contract_edit_preserves_previous_version_and_snapshot_and_rejects_stale_edits(): void
    {
        $worker = $this->netFixture();
        $contract = EmployeeContract::first(); $original = $contract->getAttributes();
        $snapshot = PayrollSnapshot::first()->payload;
        $html = view('admin.team.employment',['user'=>$worker,'employment'=>$contract])->render();
        $this->assertStringContainsString('Edytuj umowę',$html);
        $input = $this->simpleContractInput(['edit_contract_id'=>$contract->id,'amount'=>'6500']);
        $this->post(route('team.user.employment.store',$worker),$input)->assertSessionHasNoErrors();
        $new = EmployeeContract::orderByDesc('id')->first();
        $this->assertSame('6500.00',$new->monthly_gross);
        $this->assertSame($contract->id,$new->details['replaces_contract_id']);
        $this->assertSame($original,$contract->fresh()->getAttributes());
        $this->assertEquals($snapshot,PayrollSnapshot::first()->payload);
        $this->postJson(route('team.user.employment.store',$worker),$input)->assertUnprocessable();
        $this->assertDatabaseCount('employee_contracts',2);
        $this->actingAs($this->user('admin',2));
        $this->postJson(route('team.user.employment.store',$worker),$input)->assertNotFound();
    }

    public function test_payroll_rcp_table_uses_session_links_components_and_dark_hover(): void
    {
        $worker = $this->user();
        $session = ['id'=>5948,'start'=>'2026-10-02 10:02:00','stop'=>'2026-10-02 14:34:02',
            'duration'=>'04:32:02','status'=>'Praca zakończona','start_location'=>true,'stop_location'=>false];
        $html = view('admin.payroll.rcp-sessions',['user'=>$worker,'row'=>['sessions'=>[$session]]])->render();
        $this->assertStringContainsString(route('rcp.work-session.show',5948),$html);
        foreach (['dark:hover:bg-gray-600','04:32:02','02.10.2026','Lokalizacja START','fa-arrow-up-right-from-square','@keydown.enter.self.prevent'] as $text) $this->assertStringContainsString($text,$html);
        $this->assertStringNotContainsString('Lokalizacja STOP',$html);
        foreach (['under' => ['Brak normy', 'bg-green-300/20'], 'normal' => ['Norma', 'bg-green-300'], 'overtime' => ['Nadgodziny', 'bg-indigo-300']] as $category => [$label, $color]) {
            $session['classification'] = $category;
            $html = view('admin.payroll.rcp-sessions', ['user' => $worker, 'row' => ['sessions' => [$session]]])->render();
            $this->assertStringContainsString('>RCP</span>', $html);
            $this->assertStringContainsString('>'.$label.'</span>', $html);
            $this->assertStringContainsString($color, $html);
        }

    }

    public function test_simple_contract_saves_history_and_tax_settings_atomically_and_checks_dates(): void
    {
        $actor = $this->user(); $worker = $this->user('użytkownik'); $this->actingAs($actor);
        DB::table('user_company_history')->insert(['user_id'=>$worker->id,'company_id'=>2,'assigned_at'=>'2025-01-01','unassigned_at'=>'2025-12-31','employment_start'=>'2025-01-01']);
        $this->postJson(route('team.user.employment.store',$worker),$this->simpleContractInput(['term'=>'trial']))->assertUnprocessable();
        $this->assertDatabaseCount('employee_contracts',0);
        $this->post(route('team.user.employment.store',$worker),$this->simpleContractInput(['term'=>'trial','ends_on'=>'2026-03-31','birth_date'=>'2005-05-01']))->assertRedirect()->assertSessionHasNoErrors();
        $history = \App\Models\UserCompanyHistory::where('user_id',$worker->id)->where('company_id',1)->firstOrFail();
        $this->assertSame('2026-01-01',$history->employment_start->toDateString());
        $this->assertSame('2026-03-31',$history->employment_end->toDateString());
        $this->assertDatabaseHas('user_company_history',['user_id'=>$worker->id,'company_id'=>2,'employment_start'=>'2025-01-01']);
        $this->assertDatabaseHas('employee_tax_settings',['user_id'=>$worker->id,'exemption'=>'young','pit_reduction_cents'=>30000]);
        $this->post(route('team.user.employment.store',$worker),$this->simpleContractInput(['effective_from'=>'2026-04-01']))->assertSessionHasNoErrors();
        $this->assertDatabaseHas('user_company_history',['user_id'=>$worker->id,'company_id'=>1,'employment_end'=>null]);
        $this->assertDatabaseCount('employee_contracts',2);
        $this->postJson(route('team.user.employment.store',$worker),$this->simpleContractInput(['effective_from'=>'2026-04-01']))->assertUnprocessable();
        $this->assertDatabaseCount('employee_tax_settings',2);
    }

    public function test_four_pay_bases_and_simple_form_render_without_old_forms(): void
    {
        $this->actingAs($this->user());
        foreach (['monthly_gross','monthly_net','hourly_gross','hourly_net'] as $basis) {
            $worker = $this->user('użytkownik');
            $this->post(route('team.user.employment.store',$worker),$this->simpleContractInput(['pay_basis'=>$basis]))->assertSessionHasNoErrors();
            $contract = EmployeeContract::where('user_id',$worker->id)->first();
            $this->assertSame($basis,$contract->details['pay_basis']);
            if (str_ends_with($basis,'_net')) { $this->assertNull($contract->monthly_gross); $this->assertNull($contract->hourly_rate); }
            $html = view('admin.team.employment',['user'=>$worker,'employment'=>$contract])->render();
            $this->assertStringContainsString('Dodaj umowę',$html);
            $this->assertStringContainsString('B2B',$html);
            $this->assertStringNotContainsString('Dodaj potwierdzone ustawienia',$html);
        }
    }

    public function test_simple_contract_tenant_guard_and_reduced_ppk_confirmation(): void
    {
        $worker = $this->user('użytkownik'); $this->actingAs($this->user('admin',2));
        $this->postJson(route('team.user.employment.store',$worker),$this->simpleContractInput())->assertNotFound();
        $this->actingAs($this->user());
        $this->postJson(route('team.user.employment.store',$worker),$this->simpleContractInput(['ppk'=>1,'ppk_rate'=>'0.5']))->assertUnprocessable();
        $this->post(route('team.user.employment.store',$worker),$this->simpleContractInput(['ppk'=>1,'ppk_rate'=>'0.5','ppk_reduced_confirmed'=>1]))->assertSessionHasNoErrors();
        $this->assertDatabaseHas('employee_tax_settings',['user_id'=>$worker->id,'ppk_employee_bp'=>50,'ppk_employer_bp'=>150]);
    }

    public function test_settled_status_and_payslip_pdf_are_tenant_scoped_and_immutable(): void
    {
        $worker = $this->netFixture();
        $input = $this->approvalInput($worker,$this->netInput());
        $this->post(route('raport.payroll.net.approve',$worker),$input)->assertSessionHasNoErrors();
        $payment = \App\Models\PayrollPayment::first();
        $this->get(route('raport.payroll.net',['user'=>$worker,'month'=>'2026-10']))->assertOk()->assertSee('Rozliczono')->assertSee('Pobierz pasek');
        $pdf = $this->get(route('raport.payroll.payslip',['user'=>$worker,'payment'=>$payment]))->assertOk()->assertHeader('content-type','application/pdf');
        $this->assertStringStartsWith('%PDF-', $pdf->getContent());
        $otherWorker = $this->user();
        $this->get(route('raport.payroll.payslip',['user'=>$otherWorker,'payment'=>$payment]))->assertNotFound();
        $this->actingAs($this->user('admin',2));
        $this->get(route('raport.payroll.payslip',['user'=>$worker,'payment'=>$payment]))->assertNotFound();
        $this->actingAs($this->user('użytkownik'));
        $this->get(route('raport.payroll.payslip',['user'=>$worker,'payment'=>$payment]))->assertForbidden();
    }

    public function test_youth_relief_is_checked_on_payment_date_and_annual_limit_is_carried_forward(): void
    {
        $worker = $this->netFixture();
        $tax = \App\Models\EmployeeTaxSetting::first();
        $tax->update(['exemption'=>'young','declarations'=>['exemption_kind'=>'young','birth_date'=>'2000-11-10']]);
        DB::table('payroll_opening_balances')->update(['exempt_revenue_cents'=>0]);
        $this->postJson(route('raport.payroll.net.preview',$worker),$this->netInput())->assertOk()->assertJsonPath('amounts.pit',0);
        $this->postJson(route('raport.payroll.net.preview',$worker),$this->netInput(['paid_on'=>'2026-11-11']))->assertOk()->assertJsonPath('amounts.pit',29100);
        $tax->update(['declarations'=>['exemption_kind'=>'young','birth_date'=>'2005-11-10']]);
        DB::table('payroll_opening_balances')->update(['exempt_revenue_cents'=>8452800]);
        $input = $this->approvalInput($worker,$this->netInput());
        $this->post(route('raport.payroll.net.approve',$worker),$input)->assertSessionHasNoErrors();
        $r = $this->postJson(route('raport.payroll.net.preview',$worker),$this->netInput(['paid_on'=>'2026-12-10']))->assertOk();
        $r->assertJsonPath('year_before_month.exempt_revenue_cents',8552800)->assertJsonPath('amounts.exempt_revenue',0);
    }

    public function test_net_contract_can_be_resolved_approved_and_employer_cost_is_saved(): void
    {
        $worker = $this->netFixture();
        $snapshot = PayrollSnapshot::first(); $row = $snapshot->payload;
        $row['target_net'] = 442043; $row['gross'] = null;
        $row['contract']['details']['pay_basis'] = 'monthly_net';
        $snapshot->update(['payload'=>$row]);
        $input = $this->netInput(['gross'=>'0','employer_confirmed'=>1,'accident_percent'=>'1.67','fp_fs'=>1,'fgsp'=>1]);
        $preview = $this->postJson(route('raport.payroll.net.preview',$worker),$input)->assertOk();
        $preview->assertJsonPath('amounts.cash',600000)->assertJsonPath('amounts.net',442043)->assertJsonPath('employer_cost',722880);
        $this->post(route('raport.payroll.net.approve',$worker),$this->approvalInput($worker,$input))->assertSessionHasNoErrors();
        $this->get(route('raport.payroll.net',['user'=>$worker,'month'=>'2026-10']))->assertOk()->assertSee('Rozliczono');
    }
}

class PayrollTestLayout extends Component
{
    public function render() { return '<div>{{ $slot }}</div>'; }
}
