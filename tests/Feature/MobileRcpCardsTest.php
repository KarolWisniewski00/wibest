<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use App\Models\WorkSession;
use App\Services\WorkSessionClassification;
use Tests\TestCase;

class MobileRcpCardsTest extends TestCase
{
    private function employee(): User
    {
        return (new User)->forceFill(['id' => 12, 'name' => 'Anna Testowa', 'role' => 'użytkownik', 'overtime_task' => false]);
    }

    private function workSession(?string $start, ?string $stop, string $status): WorkSession
    {
        $session = (new WorkSession)->forceFill(['id' => 34, 'status' => $status, 'time_in_work' => '08:00:00']);
        $session->setRelation('user', $this->employee());
        $session->setRelation('eventStart', $start ? (new Event)->forceFill(['time' => $start, 'location_id' => 1]) : null);
        $session->setRelation('eventStop', $stop ? (new Event)->forceFill(['time' => $stop, 'location_id' => 2]) : null);
        $session->setRelation('task', null);

        return $session;
    }

    public function test_open_session_shows_start_time_and_a_yellow_type_without_a_stop(): void
    {
        $this->mock(WorkSessionClassification::class)->shouldReceive('details')->once()->andReturn(['category' => 'in_progress', 'planned' => 0, 'daySeconds' => 0]);
        $html = view('components.card-work-session', ['work_session' => $this->workSession('2026-11-24 08:15:00', null, 'W trakcie pracy')])->render();

        $this->assertStringContainsString('08:15 - —', $html);
        $this->assertMatchesRegularExpression('/bg-yellow-300 text-gray-900[^>]*>RCP</u', $html);
        $this->assertStringNotContainsString('Nieprawidłowa sesja', $html);
        $this->assertStringContainsString('Anna Testowa', $html);
        $this->assertStringContainsString(route('rcp.work-session.show', 34), $html);
    }

    public function test_night_session_keeps_classification_notes_and_both_locations(): void
    {
        $this->mock(WorkSessionClassification::class)->shouldReceive('details')->once()->andReturn(['category' => 'overtime', 'planned' => 28800, 'daySeconds' => 32400]);
        $session = $this->workSession('2026-11-23 22:00:00', '2026-11-24 06:00:00', 'Praca zakończona');
        $session->notes = 'Notatka z nocnej zmiany';
        $html = view('components.card-work-session', ['work_session' => $session])->render();

        foreach (['Zmiana przez północ', '22:00 - 06:00', 'Nadgodziny', 'ponad normę', 'Notatka z nocnej zmiany', 'Lokalizacja START', 'Lokalizacja STOP', 'Anna Testowa'] as $text) {
            $this->assertStringContainsString($text, $html);
        }
    }

    public function test_missing_start_is_reported_without_crashing(): void
    {
        $this->mock(WorkSessionClassification::class)->shouldReceive('details')->once()->andReturn(['category' => null, 'planned' => 0, 'daySeconds' => 0]);
        $html = view('components.card-work-session', ['work_session' => $this->workSession(null, null, 'Praca zakończona')])->render();

        $this->assertStringContainsString('Brak START', $html);
        $this->assertStringContainsString('Nieprawidłowa sesja', $html);
    }

    public function test_event_card_keeps_status_time_note_employee_and_detail_link(): void
    {
        $event = (new Event)->forceFill(['id' => 56, 'event_type' => 'start', 'status' => 'oczekujące', 'time' => '2026-11-24 08:15:32', 'location_id' => 1, 'note' => 'Wejście boczne']);
        $event->setRelation('user', $this->employee());
        $html = view('components.card-event', ['event' => $event])->render();

        foreach (['oczekujące', '08:15:32', 'Start', 'Wejście boczne', 'Anna Testowa', 'Lokalizacja START', route('rcp.event.show', 56)] as $text) {
            $this->assertStringContainsString($text, $html);
        }
    }
}
