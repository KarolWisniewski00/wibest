<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Crm;
use App\Models\User;
use App\Services\CrmAnalysisService;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Component;
use OpenAI\Exceptions\ErrorException;
use OpenAI\Exceptions\RateLimitException;
use Tests\TestCase;

class CrmActivityTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Nigdy nie uruchamiaj migracji na bazie skonfigurowanej w .env.
        config(['database.default' => 'crm_test', 'database.connections.crm_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '', 'foreign_key_constraints' => true,
        ]]);
        $this->travelTo(now()->setDate(2026, 11, 15)->setTime(12, 0));
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vat_number')->nullable();
            $table->string('ai_classification')->nullable();
            $table->text('ai_classification_reason')->nullable();
            $table->timestamp('ai_classification_updated_at')->nullable();
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('role');
            $table->foreignId('company_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
        (require database_path('migrations/2026_04_04_212801_create_crm_table.php'))->up();
        (require database_path('migrations/2026_09_29_225650_update_activities_for_crm_ai.php'))->up();

        Company::create(['name' => 'Klient testowy']);
        $this->actingAs(User::create([
            'name' => 'Administrator', 'email' => 'crm@example.test', 'password' => 'test',
            'role' => 'właściciel', 'company_id' => 1, 'email_verified_at' => now(),
        ]));
        // Renderujemy prawdziwe widoki CRM, pomijając niezwiązany z CRM panel RCP w layoucie.
        config(['view.compiled' => storage_path('framework/testing/crm-views')]);
        $this->app->forgetInstance('blade.compiler');
        $this->app['view.engine.resolver']->forget('blade');
        Blade::clearResolvedInstance('blade.compiler');
        Blade::component(CrmTestLayout::class, 'app-layout');
        $this->withoutExceptionHandling();
    }

    private function activity(array $attributes = []): Crm
    {
        return Crm::create($attributes + [
            'company_id' => 1, 'user_id' => 1, 'created_user_id' => 1,
            'type' => 'telefon', 'plan' => 'Dotychczasowy plan', 'important' => true,
            'datetime_start' => now()->addDay(), 'datetime_end' => now()->addDay()->addHour(),
        ]);
    }

    private function saveActivity(string $operation, mixed $completed, ?Crm $crm = null)
    {
        $data = [
            'company' => 1, 'user' => 1, 'type' => 'telefon', 'content' => 'Nowa treść',
            'datetime_start' => '16.11.2026 10:00', 'datetime_end' => '16.11.2026 11:00',
        ];
        if ($completed !== null) {
            $data['already_realized'] = $completed;
        }

        return $operation === 'create'
            ? $this->post(route('setting.crm.store'), $data)
            : $this->put(route('setting.crm.update', $crm), $data);
    }

    public static function saves(): array
    {
        return [
            ['create', null], ['create', '0'], ['create', 'on'],
            ['update', null], ['update', '0'], ['update', '1'],
        ];
    }

    /** @dataProvider saves */
    public function test_create_and_update_respect_completion(string $operation, mixed $completed): void
    {
        $crm = $operation === 'update' ? $this->activity() : null;
        $isCompleted = in_array($completed, ['on', '1'], true);
        $service = $this->mock(CrmAnalysisService::class);
        if ($isCompleted) {
            $service->shouldReceive('analyzeActivity')->once()->andReturn([
                'summary' => 'Podsumowanie testowe', 'signals' => ['Zainteresowanie'],
                'missing_information' => ['Budżet'], 'classification' => 'potential',
            ]);
        } else {
            $service->shouldNotReceive('analyzeActivity');
        }

        $response = $this->saveActivity($operation, $completed, $crm)->assertSessionHas('success');
        $crm = Crm::first();
        $this->assertSame($isCompleted, $crm->datetime_complete !== null);
        $this->assertSame('Nowa treść', $isCompleted ? $crm->result : $crm->plan);
        if ($isCompleted) {
            $response->assertRedirect(route('setting.crm.ai-analysis', $crm));
            $this->assertSame('Podsumowanie testowe', $crm->ai_analysis);
            $this->assertSame(['Zainteresowanie'], $crm->ai_signals);
            $this->assertSame(['Budżet'], $crm->ai_missing_information);
            $this->assertSame('potential', Company::find(1)->ai_classification);
            if ($operation === 'update') {
                $this->assertSame('Dotychczasowy plan', $crm->plan);
            }
        } else {
            $response->assertRedirect(route('setting.crm'));
            $this->assertNull($crm->ai_analysis);
        }
        $this->assertSame(1, Crm::count());
    }

    public static function rateLimits(): iterable
    {
        foreach (['create', 'update'] as $operation) {
            foreach (['sdk', 'http', 'code', 'guzzle', 'wrapped', 'message'] as $kind) {
                yield "$operation-$kind" => [$operation, $kind];
            }
        }
    }

    /** @dataProvider rateLimits */
    public function test_rate_limit_keeps_saved_activity_and_logs_warning(string $operation, string $kind): void
    {
        $exception = match ($kind) {
            'sdk' => new RateLimitException(new Response(429)),
            'http' => new ErrorException(['message' => 'Too many requests'], new Response(429)),
            'code' => new ErrorException(['code' => 'rate_limit_exceeded'], new Response(400)),
            'guzzle' => new ClientException('Too many requests', new Request('POST', 'https://example.test'), new Response(429)),
            'wrapped' => new \RuntimeException('Transport error', 0, new RateLimitException(new Response(429))),
            'message' => new \RuntimeException('Request rate limit has been exceeded.'),
        };
        Company::find(1)->update(['ai_classification' => 'ideal']);
        $crm = $operation === 'update' ? $this->activity(['ai_analysis' => 'Poprzednia analiza']) : null;
        Log::spy();
        $this->mock(CrmAnalysisService::class)->shouldReceive('analyzeActivity')->once()->andThrow($exception);

        $this->saveActivity($operation, '1', $crm)
            ->assertRedirect(route('setting.crm'))->assertSessionHas('warning');

        $saved = Crm::first();
        $this->assertSame(1, Crm::count());
        $this->assertSame('Nowa treść', $saved->result);
        $this->assertNotNull($saved->datetime_complete);
        $this->assertSame($operation === 'update' ? 'Poprzednia analiza' : null, $saved->ai_analysis);
        $this->assertSame('ideal', Company::find(1)->ai_classification);
        Log::shouldHaveReceived('warning')->once()->with('CRM AI analysis rate limit exceeded.', [
            'crm_id' => $saved->id, 'company_id' => 1, 'exception' => $exception,
        ]);
    }

    public function test_unrelated_ai_error_is_not_swallowed(): void
    {
        $exception = new ErrorException(['message' => 'Invalid API key'], new Response(401));
        $this->mock(CrmAnalysisService::class)->shouldReceive('analyzeActivity')->once()->andThrow($exception);
        $this->expectExceptionObject($exception);
        $this->saveActivity('create', '1');
    }

    public function test_edit_keeps_original_completion_date(): void
    {
        $completedAt = now()->subDay()->toDateTimeString();
        $crm = $this->activity(['datetime_complete' => $completedAt]);
        $this->mock(CrmAnalysisService::class)->shouldReceive('analyzeActivity')->once()->andReturn([]);
        $this->saveActivity('update', '1', $crm)->assertRedirect();
        $this->assertSame($completedAt, $crm->fresh()->datetime_complete);
    }

    public static function completedEdits(): array
    {
        return [
            ['Nowy plan', 'Nowy rezultat', false],
            ['Nowy plan', 'Nowy rezultat', true],
            [null, null, false],
        ];
    }

    /** @dataProvider completedEdits */
    public function test_completed_activity_saves_plan_and_result_without_completion_button(
        ?string $plan, ?string $result, bool $rateLimited
    ): void {
        $completedAt = now()->subDay()->toDateTimeString();
        $crm = $this->activity(['datetime_complete' => $completedAt, 'result' => 'Dotychczasowy rezultat']);
        $analysis = $this->mock(CrmAnalysisService::class)->shouldReceive('analyzeActivity')->once();
        if ($rateLimited) {
            Log::spy();
            $analysis->andThrow(new RateLimitException(new Response(429)));
        } else {
            $analysis->andReturn([]);
        }

        $this->put(route('setting.crm.update', $crm), [
            'company' => 1, 'user' => 1, 'type' => 'telefon',
            'plan' => $plan, 'result' => $result,
            'datetime_start' => '16.11.2026 10:00', 'datetime_end' => '16.11.2026 11:00',
        ])->assertRedirect()->assertSessionHas($rateLimited ? 'warning' : 'success');

        $crm->refresh();
        $this->assertSame($plan, $crm->plan);
        $this->assertSame($result, $crm->result);
        $this->assertSame($completedAt, $crm->datetime_complete);
    }

    public function test_completed_edit_form_has_two_editors_and_one_save_button(): void
    {
        $crm = $this->activity(['datetime_complete' => now(), 'result' => 'Dotychczasowy rezultat']);
        $response = $this->get(route('setting.crm.edit', $crm))->assertOk()
            ->assertSee('id="plan-editor"', false)->assertSee('name="plan"', false)
            ->assertSee('id="editor"', false)->assertSee('name="result"', false)
            ->assertSee('Dotychczasowy plan')->assertSee('Dotychczasowy rezultat')
            ->assertDontSee('Zapisz bez kompletowania')->assertDontSee('name="already_realized"', false);

        $document = new \DOMDocument();
        // Parser HTML4 libxml traktuje znaczniki z literałów JS jak koniec skryptu.
        $html = preg_replace('~<(script|style)\b[^>]*>.*?</\1>~si', '', $response->getContent());
        @$document->loadHTML('<?xml encoding="UTF-8">'.$html);
        $buttons = (new \DOMXPath($document))->query('//form[@id="myForm"]//button[@type="submit"]');
        $this->assertCount(1, $buttons);
        $this->assertSame('Zapisz', trim($buttons->item(0)->textContent));
    }

    public static function emptyAnalyses(): array
    {
        return [[null], [''], [" \n\t "], ['null'], ['[]'], ['{}'], ['false']];
    }

    /** @dataProvider emptyAnalyses */
    public function test_empty_analysis_has_no_container_or_ai_heading(?string $summary): void
    {
        $crm = $this->activity([
            'ai_analysis' => $summary, 'ai_signals' => [null, '', '  ', []],
            'ai_missing_information' => [null, '', []], 'ai_should_create_next_step' => 'false',
        ]);
        $this->get(route('setting.crm.ai-analysis', $crm))->assertOk()
            ->assertDontSee('id="ai-analysis"', false)->assertDontSee('Analiza AI')
            ->assertDontSee('Ocena AI')->assertSee('Następny krok')
            ->assertSee('Zatwierdź następny krok')->assertSee('id="myForm"', false)
            ->assertSee('Dotychczasowy plan');
    }

    public function test_analysis_and_nonempty_lists_are_rendered(): void
    {
        $crm = $this->activity([
            'ai_analysis' => 'Podsumowanie testowe', 'ai_signals' => ['', 'Zainteresowanie'],
            'ai_missing_information' => ['Budżet'], 'ai_next_step' => 'Oddzwonić',
        ]);
        $this->get(route('setting.crm.ai-analysis', $crm))->assertOk()
            ->assertSee('id="ai-analysis"', false)->assertSee('Podsumowanie testowe')
            ->assertSee('Zainteresowanie')->assertSee('Budżet')->assertSee('Oddzwonić');

        $crm->update(['ai_analysis' => null]);
        $this->get(route('setting.crm.ai-analysis', $crm))->assertOk()
            ->assertSee('id="ai-analysis"', false)->assertSee('Zainteresowanie');
    }

    public function test_activity_order_is_consistent_across_index_and_ajax_pages(): void
    {
        $doneOld = $this->activity(['datetime_start' => now()->subMonth(), 'datetime_complete' => now()->subDays(2)]);
        $futureFar = $this->activity(['datetime_start' => now()->addWeek()]);
        $overdueRecent = $this->activity(['datetime_start' => now()->subHour()]);
        $doneNew = $this->activity(['datetime_start' => now()->addMonth(), 'datetime_complete' => now()->subHour()]);
        $futureNear = $this->activity(['datetime_start' => now()->addHour()]);
        $overdueOld = $this->activity(['datetime_start' => now()->subWeek()]);
        $withoutDeadline = $this->activity(['datetime_start' => null]);
        $atDeadline = $this->activity(['datetime_start' => now()]);
        $expected = [$overdueOld->id, $overdueRecent->id, $atDeadline->id, $futureNear->id,
            $futureFar->id, $withoutDeadline->id, $doneNew->id, $doneOld->id];

        $this->get(route('setting.crm'))->assertOk()
            ->assertViewHas('crms', fn ($items) => $items->pluck('id')->all() === array_slice($expected, 0, 3));
        $actual = [];
        foreach ([1, 2, 3] as $page) {
            $response = $this->getJson(route('api.v1.setting.crm.get', ['page' => $page]))->assertOk();
            array_push($actual, ...array_column($response->json('data'), 'id'));
        }
        $this->assertSame($expected, $actual);
    }

    public function test_edit_form_explicitly_submits_completion_action(): void
    {
        $this->get(route('setting.crm.edit', $this->activity()))->assertOk()
            ->assertSee('name="already_realized" value="1"', false)
            ->assertSee('Zapisz bez kompletowania');
    }
}

class CrmTestLayout extends Component
{
    public function render(): string
    {
        return '{{ $slot }}';
    }
}
