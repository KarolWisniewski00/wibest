<?php

namespace Tests\Feature;

use App\Livewire\UserWizard;
use App\Mail\TeamUserCreated;
use App\Mail\UserMail;
use App\Models\User;
use App\Services\CreateUser;
use App\Services\UserEmailAvailability;
use App\Support\UserInput;
use Illuminate\Database\QueryException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Mail\PendingMail;
use Illuminate\Mail\MailManager;
use Illuminate\Queue\WorkerOptions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Features\SupportLockedProperties\CannotUpdateLockedPropertyException;
use Livewire\Livewire;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\TestCase;

class UserCreationTest extends TestCase
{
    private User $actor;

    protected function setUp(): void
    {
        parent::setUp();
        // Dedicated connection: never run the project's historical migrations or touch .env DB.
        config(['database.default' => 'creation_test', 'database.connections.creation_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '', 'foreign_key_constraints' => true,
        ], 'mail.default' => 'array', 'queue.default' => 'sync']);
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('user_price')->default(10);
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('gender')->nullable();
            $table->string('role');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
        Schema::create('user_company_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('assigned_at');
            $table->date('paid_from');
            $table->decimal('user_price');
            $table->timestamps();
        });
        (require database_path('migrations/2026_11_11_120000_add_canonical_email_unique_to_users.php'))->up();
        (require database_path('migrations/2026_11_15_120000_create_team_user_notifications_table.php'))->up();
        DB::table('companies')->insert([['id' => 1, 'name' => 'Firma A'], ['id' => 2, 'name' => 'Firma B']]);
        $this->actor = User::create(['name' => 'Administrator', 'email' => 'admin@firma.pl', 'password' => 'test', 'role' => 'admin', 'company_id' => 1]);
        $this->actingAs($this->actor);
        Mail::fake();
    }

    private function input(array $changes = []): array
    {
        return array_replace(['name' => '  Łukasz   Żółć-Kowalski ', 'email' => ' JAN@Firma.EU ',
            'phone' => '0048111222333', 'position' => null, 'gender' => false,
            'role' => 'użytkownik', 'supervisor_id' => $this->actor->id], $changes);
    }

    public function test_team_creation_is_normalized_and_sends_exactly_one_notification(): void
    {
        $user = app(CreateUser::class)->create($this->input(['company_id' => 2]), 1);
        $this->assertSame('Łukasz Żółć-Kowalski', $user->name);
        $this->assertSame('jan@firma.eu', $user->email);
        $this->assertSame('+48 111 222 333', $user->phone);
        $this->assertSame(1, $user->company_id);
        $this->assertSame('użytkownik', $user->role);
        $this->assertSame($this->actor->id, $user->supervisor_id);
        $this->assertSame(1, DB::table('user_company_history')->count());
        Mail::assertSent(UserMail::class, 1);
        Mail::assertQueued(TeamUserCreated::class, fn ($mail) => $mail->hasTo('biuro@wibest.pl') && $mail->details['company'] === 'Firma A');
        Mail::assertQueued(TeamUserCreated::class, 1);
        try {
            app(CreateUser::class)->create($this->input(), 1);
            $this->fail('Duplicate accepted');
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('email', $e->errors());
        }
        Mail::assertQueued(TeamUserCreated::class, 1);
    }

    public function test_client_and_crm_creation_preserve_roles_without_office_email(): void
    {
        $this->actor->role = 'właściciel';
        $this->actor->save();
        $supervisor = User::create(['name' => 'Admin B', 'email' => 'admin@b.de', 'password' => 'test', 'role' => 'admin', 'company_id' => 2]);
        $user = app(CreateUser::class)->create($this->input(['supervisor_id' => $supervisor->id]), 2, true);
        $this->assertSame(2, $user->company_id);
        $crm = app(CreateUser::class)->create(['email' => 'crm@firma.com', 'phone' => '', 'name' => null], 2, true, true);
        $this->assertSame('CRM', $crm->role);
        $this->assertNull($crm->phone);
        Mail::assertNotOutgoing(TeamUserCreated::class);
        Mail::assertSent(UserMail::class, 1);
    }

    public function test_email_formats_and_case_insensitive_global_uniqueness(): void
    {
        foreach (['', 'jan', 'jan.firma.pl', 'jan@firma', 'jan@', '@firma.pl', 'jan@@firma.pl', 'jan@firma..pl', 'jan@-firma.pl', 'jan@firma_.pl', 'jan@firma.123', 'ADMIN@FIRMA.PL'] as $email) {
            $data = UserInput::normalize($this->input(['email' => $email]));
            $this->assertTrue(Validator::make($data, UserInput::rules())->fails(), $email);
        }
        foreach (['jan@firma.pl', 'jan@firma.com', 'jan@firma.eu', 'jan@firma.de', 'jan+test@sub.firma.org'] as $email) {
            $this->assertFalse(Validator::make(UserInput::normalize($this->input(['email' => $email])), UserInput::rules())->fails(), $email);
        }
        DB::table('users')->insert(['name' => 'CRM', 'email' => ' HIDDEN@firma.pl ', 'password' => 'x', 'role' => 'CRM']);
        $this->assertSame('error', app(UserEmailAvailability::class)->check('hidden@firma.pl', 1, false)['status']);
    }

    public function test_phone_formats_and_invalid_values(): void
    {
        foreach (['111222333', '111 222 333', '+48111222333', '+48 111 222 333', '48111222333', '0048111222333', '111-222-333'] as $phone) {
            $data = UserInput::normalize($this->input(['phone' => $phone]));
            $this->assertSame('+48 111 222 333', $data['phone']);
            $this->assertFalse(Validator::make($data, UserInput::rules())->fails());
        }
        foreach (['11122233', '1112223334', '+481112223334', '111abc222333', '111/222/333', '+49 111222333', '++48111222333'] as $phone) {
            $this->assertTrue(Validator::make(UserInput::normalize($this->input(['phone' => $phone])), UserInput::rules())->fails(), $phone);
        }
        $this->assertFalse(Validator::make(UserInput::normalize($this->input(['name' => 'Łukasz'])), UserInput::rules())->fails());
    }

    public function test_database_constraint_prevents_racing_case_variants(): void
    {
        $this->assertFalse(DB::table('users')->where('email', 'race@firma.pl')->exists());
        $this->assertFalse(DB::table('users')->where('email', 'RACE@firma.pl')->exists());
        DB::table('users')->insert(['name' => 'First', 'email' => 'race@firma.pl', 'password' => 'x', 'role' => 'admin']);
        $this->expectException(QueryException::class);
        DB::table('users')->insert(['name' => 'Second', 'email' => ' RACE@firma.pl ', 'password' => 'x', 'role' => 'admin']);
    }

    public function test_invalid_direct_crm_http_request_cannot_create_user(): void
    {
        $this->actor->role = 'właściciel';
        $this->actor->save();
        $this->postJson(route('setting.user.store.for.crm', 2), ['email' => 'invalid', 'phone' => '123'])
            ->assertUnprocessable()->assertJsonValidationErrors(['email', 'phone']);
        $this->assertSame(1, DB::table('users')->count());
        Mail::assertNothingOutgoing();
    }

    public function test_regular_admin_cannot_create_in_clients_or_another_company(): void
    {
        $this->postJson(route('setting.user.store.for.crm', 2), $this->input())->assertForbidden();
        $this->get(route('setting.user.create', 2))->assertForbidden();
        $this->expectException(HttpException::class);
        app(CreateUser::class)->create($this->input(), 2);
    }

    public function test_foreign_supervisor_and_forged_role_are_rejected(): void
    {
        $other = User::create(['name' => 'Other', 'email' => 'other@firma.pl', 'password' => 'x', 'role' => 'admin', 'company_id' => 2]);
        try {
            app(CreateUser::class)->create($this->input(['supervisor_id' => $other->id, 'role' => 'właściciel']), 1);
            $this->fail();
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('supervisor_id', $e->errors());
            $this->assertArrayHasKey('role', $e->errors());
        }
        Mail::assertNothingOutgoing();
        $this->assertSame(0, DB::table('user_company_history')->count());
    }

    public function test_emails_wait_for_commit_and_rollback_sends_nothing(): void
    {
        DB::beginTransaction();
        app(CreateUser::class)->create($this->input(), 1);
        Mail::assertNothingOutgoing();
        DB::rollBack();
        Mail::assertNothingOutgoing();
        $this->assertSame(1, DB::table('users')->count());
        DB::beginTransaction();
        app(CreateUser::class)->create($this->input(), 1);
        Mail::assertNothingOutgoing();
        DB::commit();
        Mail::assertQueued(TeamUserCreated::class, 1);
    }

    public function test_notification_uses_configured_async_queue(): void
    {
        config(['queue.default' => 'database']);
        app(CreateUser::class)->create($this->input(), 1);
        Mail::assertQueued(TeamUserCreated::class, 1);
        Mail::assertNotSent(TeamUserCreated::class);
        Mail::assertQueued(TeamUserCreated::class, fn ($mail) => $mail->connection === 'database' && $mail->afterCommit);
    }

    public function test_livewire_save_validates_and_preserves_input(): void
    {
        Livewire::test(UserWizard::class)->set('state', $this->input(['email' => 'invalid']))
            ->call('save')->assertHasErrors(['state.email'])->assertSet('state.email', 'invalid');
        $this->assertFalse(session()->has('success'));
        $this->assertSame(1, DB::table('users')->count());
        Mail::assertNothingOutgoing();
    }

    public function test_livewire_success_cannot_be_resubmitted(): void
    {
        $component = Livewire::test(UserWizard::class)->set('state', $this->input())
            ->call('save')->assertHasNoErrors()->assertRedirect(route('team.user.index'));
        $this->assertSame('Użytkownik został pomyślnie utworzony.', session('success'));
        $component->call('save');
        $this->assertSame(2, DB::table('users')->count());
        Mail::assertQueued(TeamUserCreated::class, 1);
    }

    public function test_livewire_context_is_locked_and_availability_is_rate_limited(): void
    {
        $component = Livewire::test(UserWizard::class);
        $component->call('checkEmail', 'new@firma.pl')->assertReturned(['status' => 'success', 'message' => 'Adres e-mail jest poprawny i dostępny.']);
        for ($i = 0; $i < 60; $i++) {
            app(UserEmailAvailability::class)->check('new@firma.pl', 1, false);
        }
        $this->assertSame('error', app(UserEmailAvailability::class)->check('new@firma.pl', 1, false)['status']);
        $this->expectException(CannotUpdateLockedPropertyException::class);
        $component->set('company_id', 2);
    }

    public function test_notification_template_contains_no_password_or_token(): void
    {
        $mail = new TeamUserCreated(['name' => '<script>test</script>', 'email' => 'jan@firma.pl', 'company' => 'Firma', 'role' => 'admin', 'created_at' => '11.11.2026 12:00:00', 'creator' => 'Admin'], 1);
        $html = $mail->render();
        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringNotContainsString('password', $html);
        $this->assertStringNotContainsString('token', $html);
    }

    public function test_history_failure_rolls_back_user_and_sends_no_mail(): void
    {
        Schema::drop('user_company_history');
        try {
            app(CreateUser::class)->create($this->input(), 1);
            $this->fail();
        } catch (QueryException $e) {
            $this->assertSame(1, DB::table('users')->count());
        }
        Mail::assertNothingOutgoing();
    }

    public function test_smtp_failure_does_not_undo_committed_account(): void
    {
        $pending = \Mockery::mock(PendingMail::class);
        $pending->shouldReceive('send')->andThrow(new \RuntimeException('SMTP unavailable'));
        $pending->shouldReceive('queue')->once()->with(\Mockery::type(TeamUserCreated::class));
        Mail::shouldReceive('to')->andReturn($pending);
        $user = app(CreateUser::class)->create($this->input(), 1);
        $this->assertTrue($user->exists);
        $this->assertSame(2, DB::table('users')->count());
        $this->assertSame(1, DB::table('user_company_history')->count());
    }

    public function test_team_notification_includes_company_b_and_every_available_role(): void
    {
        $this->actor->update(['company_id' => 2]);
        $this->travelTo(\Carbon\Carbon::parse('2026-11-15 14:35:42', 'Europe/Warsaw'));

        foreach (['użytkownik', 'kierownik', 'admin'] as $index => $role) {
            $user = app(CreateUser::class)->create($this->input([
                'email' => "person{$index}@firma.pl", 'role' => $role,
            ]), 2);
            Mail::assertQueued(TeamUserCreated::class, function ($mail) use ($user, $role) {
                if ($mail->userId !== $user->id) {
                    return false;
                }
                $this->assertSame([
                    'company' => 'Firma B', 'name' => 'Łukasz Żółć-Kowalski',
                    'email' => $user->email, 'role' => $role, 'created_at' => '15.11.2026 14',
                ], $mail->details);
                $mail->assertHasSubject('WIBEST – Nowy użytkownik w firmie Firma B');
                $mail->assertSeeInHtml('Firma B');
                $mail->assertSeeInHtml('Konto zostało pomyślnie utworzone w systemie WIBEST.');

                return $mail->userId === $user->id && $mail->hasTo('biuro@wibest.pl');
            });
        }

        Mail::assertQueued(TeamUserCreated::class, 3);
        Mail::assertNotSent(TeamUserCreated::class);
    }

    public function test_edit_and_direct_model_creation_send_no_team_notification(): void
    {
        $user = User::create(['name' => 'Existing', 'email' => 'existing@firma.pl',
            'password' => 'test', 'role' => 'użytkownik', 'company_id' => 1]);
        $this->put(route('team.user.update', $user), ['role' => 'kierownik', 'position' => 'Brygadzista'])
            ->assertRedirect(route('team.user.show', $user));

        $this->assertSame('kierownik', $user->fresh()->role);
        Mail::assertNothingOutgoing();
    }

    public function test_queue_failure_is_logged_without_undoing_account(): void
    {
        Log::spy();
        $pending = \Mockery::mock(PendingMail::class);
        $pending->shouldReceive('send')->once();
        $pending->shouldReceive('queue')->once()->andThrow(new \RuntimeException('Queue unavailable'));
        Mail::shouldReceive('to')->andReturn($pending);

        $user = app(CreateUser::class)->create($this->input(), 1);

        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertSame(1, DB::table('user_company_history')->count());
        Log::shouldHaveReceived('warning')->with('Team user notification failed.', [
            'user_id' => $user->id, 'exception' => \RuntimeException::class,
        ])->once();
    }

    public function test_synchronous_or_null_queue_configuration_falls_back_to_database(): void
    {
        foreach (['sync', 'null', 'custom_sync'] as $connection) {
            config(['queue.default' => $connection, 'queue.connections.custom_sync.driver' => 'sync']);
            $mail = new TeamUserCreated(['company' => 'Firma A'], 1);
            $this->assertSame('database', $mail->connection);
        }
        config(['queue.default' => 'redis']);
        $this->assertSame('redis', (new TeamUserCreated(['company' => 'Firma A'], 1))->connection);
    }

    private function useRealNotificationQueue(): \Illuminate\Mail\Mailer
    {
        (require database_path('migrations/2025_01_06_123956_create_jobs_table.php'))->up();
        config(['queue.connections.database.connection' => 'creation_test']);
        Mail::swap(new MailManager($this->app));

        return Mail::mailer('array');
    }

    private function workNotification(): void
    {
        app('queue.worker')->runNextJob('database', 'default', new WorkerOptions(sleep: 0));
    }

    public function test_real_queue_waits_for_commit_and_duplicate_jobs_deliver_only_once(): void
    {
        $mailer = $this->useRealNotificationQueue();
        DB::beginTransaction();
        app(CreateUser::class)->create($this->input(), 1);
        $this->assertSame(0, DB::table('jobs')->count());
        DB::rollBack();
        $this->assertSame(0, DB::table('jobs')->count());

        DB::beginTransaction();
        $user = app(CreateUser::class)->create($this->input(), 1);
        $this->assertSame(0, DB::table('jobs')->count());
        DB::commit();
        $this->assertSame(1, DB::table('jobs')->count());
        $this->assertSame(0, DB::table('team_user_notifications')->count());
        $mailer->getSymfonyTransport()->flush();

        $duplicate = (array) DB::table('jobs')->first();
        unset($duplicate['id']);
        DB::table('jobs')->insert($duplicate);
        $this->workNotification();
        $this->workNotification();

        $messages = $mailer->getSymfonyTransport()->messages();
        $this->assertCount(1, $messages);
        $message = $messages->first()->getOriginalMessage();
        $this->assertSame('biuro@wibest.pl', $message->getTo()[0]->getAddress());
        $this->assertSame('WIBEST – Nowy użytkownik w firmie Firma A', $message->getSubject());
        $this->assertSame(0, DB::table('jobs')->count());
        $this->assertNotNull(DB::table('team_user_notifications')->where('user_id', $user->id)->value('sent_at'));
    }

    public function test_worker_smtp_failure_is_logged_and_account_survives_without_duplicate_retry(): void
    {
        $mailer = $this->useRealNotificationQueue();
        $user = app(CreateUser::class)->create($this->input(), 1);
        $duplicate = (array) DB::table('jobs')->first();
        unset($duplicate['id']);

        Log::spy();
        $transport = \Mockery::mock(\Symfony\Component\Mailer\Transport\TransportInterface::class);
        $transport->shouldReceive('send')->once()->andThrow(new \Symfony\Component\Mailer\Exception\TransportException('SMTP unavailable'));
        $mailer->setSymfonyTransport($transport);
        $this->workNotification();

        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertSame(1, DB::table('user_company_history')->count());
        $this->assertSame(0, DB::table('jobs')->count());
        $record = DB::table('team_user_notifications')->where('user_id', $user->id)->first();
        $this->assertNotNull($record->failed_at);
        $this->assertNull($record->sent_at);
        Log::shouldHaveReceived('warning')->with('Team user notification delivery failed.', [
            'user_id' => $user->id,
            'exception' => \Symfony\Component\Mailer\Exception\TransportException::class,
        ])->once();

        DB::table('jobs')->insert($duplicate);
        $this->workNotification();
        $this->assertSame(0, DB::table('jobs')->count());
    }

    public function test_notification_omits_missing_email_and_escapes_company_name(): void
    {
        $mail = new TeamUserCreated(['company' => '<b>Firma</b>', 'name' => 'Jan Kowalski',
            'email' => null, 'role' => 'admin', 'created_at' => '15.11.2026 14'], 1);
        $mail->assertSeeInHtml('&lt;b&gt;Firma&lt;/b&gt;', false);
        $mail->assertDontSeeInHtml('Adres e-mail');
    }

    public function test_migration_stops_on_existing_collisions_without_modifying_accounts(): void
    {
        $migration = require database_path('migrations/2026_11_11_120000_add_canonical_email_unique_to_users.php');
        $migration->down();
        DB::table('users')->insert(['name' => 'Duplicate', 'email' => ' ADMIN@FIRMA.PL ', 'password' => 'x', 'role' => 'CRM']);
        try {
            $migration->up();
            $this->fail();
        } catch (\RuntimeException $e) {
            $this->assertStringContainsString('kolizje', $e->getMessage());
        }
        $this->assertSame(2, DB::table('users')->count());
    }

    public function test_successful_direct_crm_http_creation_and_old_values_after_error(): void
    {
        $this->actor->role = 'właściciel';
        $this->actor->save();
        $this->post(route('setting.user.store.for.crm', 2), ['email' => 'crm@firma.de', 'phone' => '111-222-333'])
            ->assertRedirect(route('setting.client.show', 2));
        $this->assertDatabaseHas('users', ['email' => 'crm@firma.de', 'role' => 'CRM', 'company_id' => 2, 'phone' => '+48 111 222 333']);
        $this->from(route('setting.user.create.for.crm', 2))->post(route('setting.user.store.for.crm', 2), ['email' => 'invalid'])
            ->assertSessionHasErrors('email')->assertSessionHasInput('email', 'invalid');
        Mail::assertNothingOutgoing();
    }

    public function test_livewire_client_context_sends_no_office_email(): void
    {
        $this->actor->role = 'właściciel';
        $this->actor->save();
        Livewire::test(UserWizard::class, ['company_id' => 1, 'clients' => true])
            ->set('state', $this->input())->call('save')->assertHasNoErrors()
            ->assertRedirect(route('setting.client.show', 1));
        $this->assertSame('Użytkownik został pomyślnie utworzony.', session('success'));
        Mail::assertNotOutgoing(TeamUserCreated::class);
        Mail::assertSent(UserMail::class, 1);
    }

    public function test_email_endpoint_is_authorized_and_returns_server_result(): void
    {
        $this->postJson(route('users.email-availability'), ['email' => 'jan@firma.pl', 'company_id' => 2])->assertForbidden();
        $this->actor->role = 'właściciel';
        $this->actor->save();
        $this->postJson(route('users.email-availability'), ['email' => 'jan@firma.pl', 'company_id' => 2])
            ->assertOk()->assertJsonPath('status', 'success');
        $this->postJson(route('users.email-availability'), ['email' => 'ADMIN@FIRMA.PL', 'company_id' => 2])
            ->assertOk()->assertJsonPath('status', 'error');
    }

    public function test_crm_without_email_generates_unique_technical_emails_in_not_null_column(): void
    {
        $this->actor->role = 'właściciel';
        $this->actor->save();
        foreach ([[], ['email' => ''], ['email' => '   '], ['email' => null]] as $input) {
            $this->post(route('setting.user.store.for.crm', 2), $input + ['position' => 'brygadzista'])
                ->assertRedirect(route('setting.client.show', 2))
                ->assertSessionHas('success', 'Dodano użytkownika dla CRM.');
        }
        $this->assertSame(0, DB::table('users')->whereNull('email')->count());
        $this->assertSame(4, DB::table('users')->where('role', 'CRM')->distinct()->count('email'));
        $this->assertSame(4, DB::table('users')->where('position', 'brygadzista')->count());
        $this->assertSame(0, DB::table('users')->where('email', '')->count());
        $this->assertSame(4, DB::table('user_company_history')->count());
        foreach (User::withoutGlobalScopes()->where('role', 'CRM')->get() as $user) {
            $this->assertNotEmpty($user->password);
            $this->assertMatchesRegularExpression('/^crm-[a-f0-9-]{36}@users\.wibest\.invalid$/', $user->email);
            $this->assertNull($user->contact_email);
        }
        Mail::assertNothingOutgoing();
    }

    public function test_supplied_crm_email_is_still_validated_and_unique(): void
    {
        $this->actor->role = 'właściciel';
        $this->actor->save();
        foreach (['bad', 'jan@firma', ' ADMIN@FIRMA.PL '] as $email) {
            $this->postJson(route('setting.user.store.for.crm', 2), ['email' => $email])
                ->assertUnprocessable()->assertJsonValidationErrors('email');
            $this->assertFalse(session()->has('success'));
        }
        $this->post(route('setting.user.store.for.crm', 2), ['email' => ' NEW@FIRMA.EU '])
            ->assertRedirect(route('setting.client.show', 2))->assertSessionHas('success');
        $this->assertDatabaseHas('users', ['role' => 'CRM', 'email' => 'new@firma.eu']);
        Mail::assertNothingOutgoing();
    }

    public function test_regular_user_still_requires_email_and_failure_has_no_success_toast(): void
    {
        Livewire::test(UserWizard::class)->set('state', $this->input(['email' => '   ']))
            ->call('save')->assertHasErrors(['state.email']);
        $this->assertFalse(session()->has('success'));
        $this->assertSame(1, DB::table('users')->count());
        Mail::assertNothingOutgoing();
    }

    public function test_technical_email_skips_existing_addresses_including_hidden_crm_users(): void
    {
        $this->actor->role = 'właściciel';
        $this->actor->save();
        $first = '00000000-0000-4000-8000-000000000001';
        $second = '00000000-0000-4000-8000-000000000002';
        DB::table('users')->insert(['name' => 'Existing CRM', 'email' => 'CRM-'.$first.'@USERS.WIBEST.INVALID', 'password' => 'x', 'role' => 'CRM']);
        $sequence = [$first, $second];
        Str::createUuidsUsing(function () use (&$sequence) {
            return array_shift($sequence);
        });
        try {
            $user = app(CreateUser::class)->create(['position' => 'brygadzista'], 2, true, true);
            $this->assertSame('crm-'.$second.'@users.wibest.invalid', $user->email);
            $this->assertSame('brygadzista', $user->position);
            $this->assertNull($user->contact_email);
        } finally {
            Str::createUuidsNormally();
        }
        Mail::assertNothingOutgoing();
        $this->assertSame('admin@firma.pl', $this->actor->contact_email);
    }
}
