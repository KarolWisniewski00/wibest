<?php

namespace Tests\Feature;

use App\Livewire\EditUserWizard;
use App\Models\User;
use App\Steps\EditPrimaryStep;
use App\Steps\EditRoleStep;
use App\Steps\EditSupervisorStep;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Component;
use Livewire\Livewire;
use Tests\TestCase;

class UserWithoutCompanyEditTest extends TestCase
{
    private User $owner;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'user_edit_test', 'database.connections.user_edit_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '', 'foreign_key_constraints' => true,
        ]]);
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('gender')->nullable();
            $table->string('role')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            foreach (['type', 'status', 'start_date', 'end_date'] as $field) {
                $table->string($field)->nullable();
            }
            foreach (['days', 'working_days', 'non_working_days'] as $field) {
                $table->integer($field)->default(0);
            }
        });
        Schema::create('sent_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->timestamps();
        });
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('event_type');
            $table->timestamp('time');
        });
        Schema::create('leave_balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->integer('year');
        });
        DB::table('companies')->insert(['id' => 1, 'name' => 'Firma']);
        $this->owner = User::create(['name' => 'Właściciel', 'email' => 'owner@example.pl', 'password' => 'secret', 'role' => 'właściciel', 'company_id' => 1]);
        $this->user = User::create(['name' => 'Jan Kowalski', 'email' => 'jan@example.pl', 'password' => 'unchanged', 'phone' => '+48 111 222 333', 'position' => 'Specjalista', 'gender' => null, 'role' => null]);
        $this->actingAs($this->owner);
        // Render the real page and forms without unrelated dashboard widgets.
        Component::resolveComponentsUsing(fn ($component, $data) => $component === \App\View\Components\AppLayout::class
            ? new UserEditingTestLayout()
            : app($component, $data));
    }

    protected function tearDown(): void
    {
        Component::resolveComponentsUsing(null);
        parent::tearDown();
    }

    private function input(array $changes = []): array
    {
        return array_replace($this->user->only(['name', 'email', 'phone', 'position']), $changes);
    }

    public function test_profile_links_to_prefilled_form_without_company_or_wizard(): void
    {
        $this->withoutExceptionHandling();
        $this->get(route('setting.user.show', $this->user))->assertOk()
            ->assertSee(route('setting.user.edit', $this->user), false);
        $this->get(route('setting.user.edit', $this->user))->assertOk()
            ->assertViewIs('admin.user.edit-for-crm')
            ->assertSee(route('setting.user.update', $this->user), false)
            ->assertSee('value="Jan Kowalski"', false)->assertSee('value="jan@example.pl"', false)
            ->assertSee('value="+48 111 222 333"', false)->assertSee('value="Specjalista"', false)
            ->assertSee('Zalecamy podanie imienia i nazwiska')
            ->assertSee('Wpisz adres e-mail, np. jan@firma.pl.')
            ->assertSee('Pole opcjonalne. Jeśli podasz numer, wpisz 9 cyfr')
            ->assertSee('Maksymalnie 255 znaków.')
            ->assertDontSee('name="company_id"', false)->assertDontSee('name="gender"', false)
            ->assertDontSeeLivewire(EditUserWizard::class);
    }

    public function test_save_normalizes_identity_and_preserves_unedited_information(): void
    {
        $this->user->update(['gender' => 'male']);
        $before = $this->user->getAttributes();
        $this->put(route('setting.user.update', $this->user), $this->input([
            'name' => '  Łukasz   Kowalski ', 'email' => ' NOWY@EXAMPLE.PL ', 'phone' => '0048111222333',
            'company_id' => 1, 'role' => 'właściciel', 'supervisor_id' => $this->owner->id, 'password' => 'forged', 'gender' => 'female',
        ]))->assertRedirect(route('setting.user.show', $this->user))
            ->assertSessionHas('success', 'Zaktualizowano dane użytkownika.');
        $this->user->refresh();
        $this->assertSame('Łukasz Kowalski', $this->user->name);
        $this->assertSame('nowy@example.pl', $this->user->email);
        $this->assertSame('+48 111 222 333', $this->user->phone);
        foreach (['company_id', 'role', 'supervisor_id', 'password', 'position', 'gender', 'created_at'] as $field) {
            $this->assertSame($before[$field] ?? null, $this->user->getAttributes()[$field] ?? null, $field);
        }
    }

    public function test_unchanged_email_and_nullable_fields_can_be_saved(): void
    {
        $this->put(route('setting.user.update', $this->user), $this->input(['position' => null, 'phone' => '']))
            ->assertSessionHasNoErrors()->assertRedirect(route('setting.user.show', $this->user));
        $this->assertNull($this->user->refresh()->position);
        $this->assertNull($this->user->phone);
        $this->assertNull($this->user->gender);
        $this->assertNull($this->user->company_id);
    }

    public function test_invalid_fields_and_duplicate_email_do_not_change_user(): void
    {
        $before = $this->user->refresh()->getAttributes();
        User::create(['name' => 'CRM', 'email' => 'HIDDEN@EXAMPLE.PL', 'password' => 'x', 'role' => 'CRM']);
        foreach ([['email' => 'invalid'], ['email' => 'jan@firma'], ['email' => ' OWNER@EXAMPLE.PL '],
            ['email' => 'hidden@example.pl'], ['phone' => '123abc456'], ['phone' => '12345678'],
            ['phone' => '+49 111222333'], ['name' => ''], ['name' => str_repeat('a', 256)],
            ['position' => str_repeat('a', 256)]] as $invalid) {
            $this->putJson(route('setting.user.update', $this->user), $this->input($invalid))
                ->assertUnprocessable()->assertJsonValidationErrors(array_keys($invalid));
            $this->assertSame($before, $this->user->refresh()->getAttributes());
        }
    }

    public function test_validation_redirect_keeps_submitted_values(): void
    {
        $this->from(route('setting.user.edit', $this->user))
            ->put(route('setting.user.update', $this->user), $this->input(['name' => 'Nowe dane', 'email' => 'invalid']))
            ->assertRedirect(route('setting.user.edit', $this->user))
            ->assertSessionHasErrors('email')->assertSessionHasInput('name', 'Nowe dane');
        $this->get(route('setting.user.edit', $this->user))->assertOk()
            ->assertSee('value="Nowe dane"', false)->assertSee('value="invalid"', false);
    }

    public function test_unauthorized_roles_cannot_open_or_submit_form(): void
    {
        foreach (['admin', 'menedżer', 'użytkownik'] as $role) {
            $this->owner->update(['role' => $role]);
            $this->get(route('setting.user.show', $this->user))->assertForbidden();
            $this->get(route('setting.user.edit', $this->user))->assertForbidden();
            $this->put(route('setting.user.update', $this->user), $this->input())->assertForbidden();
        }
        $this->assertSame('Jan Kowalski', $this->user->refresh()->name);
    }

    public function test_guest_cannot_edit_or_save(): void
    {
        auth()->logout();
        $this->get(route('setting.user.edit', $this->user))->assertRedirect(route('login'));
        $this->putJson(route('setting.user.update', $this->user), $this->input())->assertUnauthorized();
    }

    public function test_email_hint_accepts_current_email_and_rejects_invalid_or_taken_email(): void
    {
        $endpoint = route('users.email-availability');
        $this->postJson($endpoint, ['user_id' => $this->user->id, 'email' => ' JAN@EXAMPLE.PL '])
            ->assertOk()->assertJsonPath('status', 'success');
        foreach (['invalid', 'OWNER@EXAMPLE.PL'] as $email) {
            $this->postJson($endpoint, ['user_id' => $this->user->id, 'email' => $email])
                ->assertOk()->assertJsonPath('status', 'error');
        }
        $this->assertSame('jan@example.pl', $this->user->refresh()->email);
    }

    public function test_email_hint_cannot_bypass_edit_permissions(): void
    {
        $input = ['user_id' => $this->user->id, 'email' => 'jan@example.pl'];
        $endpoint = route('users.email-availability');
        foreach (['admin', 'menedżer', 'użytkownik'] as $role) {
            $this->owner->update(['role' => $role]);
            $this->postJson($endpoint, $input)->assertForbidden();
        }
        $this->owner->update(['role' => 'właściciel']);
        $this->user->update(['company_id' => 1]);
        $this->postJson($endpoint, $input)->assertOk()->assertJsonPath('status', 'success');
        auth('web')->logout();
        auth()->forgetGuards();
        $this->postJson($endpoint, $input)->assertUnauthorized();
    }

    public function test_assigned_user_keeps_existing_wizard_and_save_flow(): void
    {
        $this->user->update(['company_id' => 1, 'role' => 'użytkownik', 'gender' => 'male', 'supervisor_id' => $this->owner->id]);
        $this->get(route('setting.user.edit', $this->user))->assertOk()->assertSeeLivewire(EditUserWizard::class)
            ->assertDontSee(route('setting.user.update', $this->user), false);
        $wizard = Livewire::test(EditUserWizard::class, ['userId' => $this->user->id, 'routeBack' => 'setting.user.show']);
        $this->assertSame([EditPrimaryStep::class, EditRoleStep::class, EditSupervisorStep::class], $wizard->get('steps'));
        $wizard->set('state.name', '')->call('save')->assertHasErrors(['state.name']);
        $wizard->set('state.name', 'Zmienione dane')->call('save')->assertHasNoErrors()
            ->assertRedirect(route('setting.user.show', $this->user));
        $this->assertSame('Zmienione dane', $this->user->refresh()->name);
        $this->assertSame(1, $this->user->company_id);
        $this->assertSame($this->owner->id, $this->user->supervisor_id);
        $this->put(route('setting.user.update', $this->user), $this->input())->assertForbidden();
    }

    public function test_crm_edit_has_identity_hints_and_accepts_its_own_email(): void
    {
        $this->user->update(['company_id' => 1, 'role' => 'CRM']);
        $this->get(route('setting.user.edit.for.crm', $this->user))->assertOk()
            ->assertSee('Zalecamy podanie imienia i nazwiska')
            ->assertSee('Wpisz adres e-mail, np. jan@firma.pl.')
            ->assertSee('Pole opcjonalne. Jeśli podasz numer, wpisz 9 cyfr')
            ->assertSee('Maksymalnie 255 znaków.')
            ->assertSee('value="jan@example.pl"', false)
            ->assertSee(route('setting.user.update.for.crm', $this->user), false);
        $this->postJson(route('users.email-availability'), ['user_id' => $this->user->id, 'email' => $this->user->email])
            ->assertOk()->assertJsonPath('status', 'success');
        $this->postJson(route('users.email-availability'), ['user_id' => $this->user->id, 'email' => $this->owner->email])
            ->assertOk()->assertJsonPath('status', 'error');
        $this->put(route('setting.user.update.for.crm', $this->user), $this->input(['position' => 'Nowe stanowisko']))
            ->assertSessionHasNoErrors()->assertRedirect(route('setting.user.show', $this->user));
        $this->assertSame('Nowe stanowisko', $this->user->refresh()->position);
    }

    public function test_company_edit_email_hint_and_first_step_work_in_team_and_settings(): void
    {
        $this->user->update(['company_id' => 1, 'role' => 'użytkownik', 'gender' => 'male', 'supervisor_id' => $this->owner->id]);
        foreach (['team.user.show' => 'admin', 'setting.user.show' => 'właściciel'] as $routeBack => $role) {
            $this->owner->update(['role' => $role]);
            $editRoute = $routeBack === 'team.user.show' ? 'team.user.edit' : 'setting.user.edit';
            $this->get(route($editRoute, $this->user))->assertOk()->assertSeeLivewire(EditUserWizard::class);
            $wizard = Livewire::test(EditUserWizard::class, ['userId' => $this->user->id, 'routeBack' => $routeBack]);
            $wizard->call('checkEmail', ' JAN@EXAMPLE.PL ')->assertReturned([
                'status' => 'success', 'message' => 'Adres e-mail jest poprawny i dostępny.',
            ])->assertSet('activeStep', 0)->assertSet('state.email', 'jan@example.pl');
            $wizard->call('checkEmail', 'OWNER@EXAMPLE.PL')->assertReturned([
                'status' => 'error', 'message' => 'Ten adres e-mail jest już wykorzystywany.',
            ]);
            $wizard->call('checkEmail', 'invalid')->assertReturned([
                'status' => 'error', 'message' => 'Wpisz poprawny adres e-mail, np. jan@firma.pl.',
            ]);
            $wizard->set('state.name', '')->call('goToNextStep')->assertHasErrors('state.name')->assertSet('activeStep', 0);
            $wizard->set('state.name', 'Jan Kowalski')->call('goToNextStep')->assertHasNoErrors()->assertSet('activeStep', 1);
            $wizard->call('goToNextStep')->assertHasNoErrors()->assertSet('activeStep', 2);
            $wizard->call('save')->assertHasNoErrors()->assertRedirect(route($routeBack, $this->user));
        }
    }

    public function test_company_edit_email_hint_denies_other_company_and_unauthorized_roles(): void
    {
        $this->user->update(['company_id' => 1, 'role' => 'użytkownik']);
        foreach (['menedżer', 'użytkownik'] as $role) {
            $this->owner->update(['role' => $role]);
            Livewire::test(EditUserWizard::class, ['userId' => $this->user->id])
                ->call('checkEmail', $this->user->email)->assertForbidden();
        }
        DB::table('companies')->insert(['id' => 2, 'name' => 'Inna firma']);
        $this->owner->update(['role' => 'admin', 'company_id' => 2]);
        Livewire::test(EditUserWizard::class, ['userId' => $this->user->id])
            ->call('checkEmail', $this->user->email)->assertForbidden();
    }
}

class UserEditingTestLayout extends Component
{
    public function render(): string
    {
        return '<div>{{ $slot }}</div>';
    }
}
