<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WorkSession;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SecurityRegressionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:', 'app.debug' => false]);
        DB::purge('sqlite');

        Schema::create('companies', function (Blueprint $table) { $table->id(); $table->string('name')->nullable(); });
        Schema::create('users', function (Blueprint $table) {
            $table->id(); $table->string('name'); $table->string('email')->nullable();
            $table->string('password')->nullable(); $table->unsignedBigInteger('company_id')->nullable();
            $table->string('role')->default('użytkownik'); $table->rememberToken(); $table->timestamps();
        });
        Schema::create('work_sessions', function (Blueprint $table) {
            $table->id(); $table->unsignedBigInteger('user_id')->nullable(); $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('created_user_id')->nullable(); $table->string('status');
            $table->unsignedBigInteger('event_start_id')->nullable(); $table->unsignedBigInteger('event_stop_id')->nullable();
            $table->string('time_in_work')->nullable(); $table->timestamps();
        });
        Schema::create('leaves', function (Blueprint $table) {
            $table->id(); $table->unsignedBigInteger('user_id'); $table->date('start_date');
            $table->date('end_date'); $table->string('status');
        });
        Schema::create('events', function (Blueprint $table) {
            $table->id(); $table->dateTime('time')->nullable();
        });

        Route::middleware('api')->get('/_test/exception', fn () => throw new \RuntimeException('secret-internal-detail'));
    }

    private function user(int $id, int $company, string $role = 'użytkownik'): User
    {
        DB::table('users')->insert(['id' => $id, 'name' => "U{$id}", 'email' => "u{$id}@test.local", 'company_id' => $company, 'role' => $role]);
        return User::withoutGlobalScopes()->findOrFail($id);
    }

    public function test_anonymous_user_cannot_start_or_stop_work(): void
    {
        $this->postJson(route('api.work.start'))->assertUnauthorized();
        $this->postJson(route('api.work.stop'))->assertUnauthorized();
    }

    public function test_invalid_coordinates_are_rejected(): void
    {
        $this->actingAs($this->user(1, 10));
        $this->postJson(route('api.work.start'), ['lat' => 91, 'lon' => -181])->assertUnprocessable();
    }

    public function test_user_cannot_stop_another_users_session(): void
    {
        $actor = $this->user(1, 10);
        $other = $this->user(2, 10);
        $sessionId = DB::table('work_sessions')->insertGetId(['user_id' => $other->id, 'company_id' => 10, 'created_user_id' => $other->id, 'status' => 'W trakcie pracy']);
        $session = WorkSession::findOrFail($sessionId);

        $this->actingAs($actor)->postJson(route('api.work.stop'))->assertConflict();
        $this->assertSame('W trakcie pracy', $session->fresh()->status);
    }

    public function test_repeated_start_request_does_not_create_a_second_active_session(): void
    {
        $actor = $this->user(1, 10);
        DB::table('work_sessions')->insert(['user_id' => $actor->id, 'company_id' => 10, 'status' => 'W trakcie pracy']);

        $this->actingAs($actor)->postJson(route('api.work.start'))->assertConflict();
        $this->assertSame(1, DB::table('work_sessions')->where('user_id', $actor->id)->where('status', 'W trakcie pracy')->count());
    }

    public function test_tenant_and_admin_policies_reject_cross_company_and_worker_admin_access(): void
    {
        $worker = $this->user(1, 10);
        $otherTenant = $this->user(2, 20);
        $sessionId = DB::table('work_sessions')->insertGetId(['user_id' => $otherTenant->id, 'company_id' => 20, 'status' => 'W trakcie pracy']);
        $session = WorkSession::findOrFail($sessionId);

        $this->assertFalse(Gate::forUser($worker)->allows('view', $session));
        $this->assertFalse(Gate::forUser($worker)->allows('delete', $session));
    }

    public function test_api_exception_response_is_safe_and_has_correlation_id(): void
    {
        Log::spy();
        $response = $this->getJson('/_test/exception');
        $response->assertStatus(500)->assertJson(['message' => 'Wewnętrzny błąd serwera.'])
            ->assertJsonStructure(['request_id']);
        $this->assertNotEmpty($response->headers->get('X-Request-ID'));
        $this->assertStringNotContainsString('secret-internal-detail', $response->getContent());
        $this->assertStringNotContainsString('trace', strtolower($response->getContent()));
        Log::shouldHaveReceived('error')->once()->withArgs(function (string $message, array $context): bool {
            return $message === 'Unhandled application exception'
                && ($context['exception_class'] ?? null) === \RuntimeException::class
                && !str_contains(json_encode($context), 'secret-internal-detail');
        });
    }
}
