<?php

namespace App\Services;

use App\Models\Crm;
use App\Models\Company;
use OpenAI;
use OpenAI\Client;

class CrmAnalysisService
{
    public function analyzeActivity(Crm $activity): array
    {
        $activity->load('company');

        $company = $activity->company;

        $previousActivities = Crm::query()
            ->where('company_id', $company->id)
            ->where('id', '!=', $activity->id)
            ->orderByDesc('datetime_start')
            ->limit(20)
            ->get([
                'type',
                'datetime_start',
                'datetime_complete',
                'plan',
                'result',
                'ai_analysis',
                'ai_next_step',
            ]);

        $prompt = $this->buildPrompt(
            company: $company,
            activity: $activity,
            previousActivities: $previousActivities,
        );

$client = OpenAI::client(
    config('services.openai.api_key')
);

$response = $client->chat()->create([
    'model' => config('services.openai.model'),

    'messages' => [
        [
            'role' => 'system',
            'content' => $this->systemPrompt(),
        ],
        [
            'role' => 'user',
            'content' => $prompt,
        ],
    ],

    'response_format' => [
        'type' => 'json_object',
    ],
]);

$output = $response->choices[0]->message->content;

if (!$output) {
    throw new \RuntimeException(
        'OpenAI nie zwróciło treści odpowiedzi.'
    );
}

return $this->parseResponse($output);
    }

private function systemPrompt(): string
{
    return <<<'PROMPT'
Jesteś asystentem CRM wspierającym sprzedaż B2B.

Analizujesz historię kontaktów handlowych firmy oraz najnowszy rezultat działania.

Twoim zadaniem jest:
1. ocenić aktualny status klienta,
2. wyciągnąć najważniejsze fakty,
3. rozpoznać sygnały sprzedażowe,
4. wskazać problem lub potrzebę klienta, jeśli istnieje,
5. wskazać brakujące informacje,
6. zaproponować konkretny następny krok,
7. określić, czy kolejny krok powinien zostać zaplanowany.

Nie wymyślaj informacji, których nie ma w danych.

Jeżeli z informacji wynika, że klient nie ma obecnie potrzeby, nie jest zainteresowany albo nie spełnia kryteriów, nie twórz sztucznego następnego kroku.

Jeżeli brakuje danych do kwalifikacji, zaznacz to.

KLASYFIKACJA KLIENTA

Pole "classification" opisuje dopasowanie firmy do profilu idealnego klienta, a NIE etap sprzedaży.

Dozwolone wartości:
- ideal
- potential
- weak
- disqualified
- unknown

Znaczenie:
- ideal — firma wyraźnie pasuje do profilu idealnego klienta.
- potential — firma może pasować, ale brakuje części informacji lub nie wszystkie kryteria są potwierdzone.
- weak — firma ma niewielkie dopasowanie do profilu klienta.
- disqualified — wiadomo, że firma nie spełnia istotnych kryteriów albo została jednoznacznie odrzucona.
- unknown — brakuje wystarczających danych do oceny.

ETAP SPRZEDAŻY

Pole "sales_stage" opisuje miejsce firmy w procesie sprzedaży.

Dozwolone wartości:
- unqualified
- to_qualify
- qualified
- offer
- negotiation
- won
- lost

TYP NASTĘPNEGO KROKU

Pole "next_step_type" musi określać RODZAJ działania, które należy wykonać jako następne.

Dozwolone wartości:
- telefon
- mail
- spotkanie
- oferta
- follow_up
- Inne

Zasady wyboru:

- telefon — gdy kolejnym działaniem powinien być telefon, np. ponowny kontakt, zebranie informacji, kwalifikacja lub omówienie sytuacji.
- mail — gdy kolejnym działaniem powinno być wysłanie wiadomości e-mail, informacji lub materiałów.
- spotkanie — gdy potrzebne jest spotkanie z klientem.
- oferta — gdy należy przygotować lub wysłać ofertę.
- follow_up — gdy należy wrócić do klienta po wcześniejszym kontakcie, bez potrzeby określania innego konkretnego rodzaju działania.
- Inne — tylko wtedy, gdy następne działanie nie pasuje do żadnej z powyższych kategorii.

WAŻNE:
"next_step_type" musi być zgodne z treścią pola "next_step".

Przykłady:
- next_step: "Zadzwonić za tydzień i sprawdzić, czy klient jest gotowy wrócić do rozmowy."
  next_step_type: "call"
  next_step_at: "2024-06-15 10:00"

- next_step: "Wysłać klientowi informacje o systemie oraz cennik."
  next_step_type: "email"
  next_step_at: "2024-06-15 10:00"

- next_step: "Umówić spotkanie z właścicielem firmy."
  next_step_type: "meeting"
  next_step_at: "2024-06-15 10:00"

- next_step: "Przeprowadzić prezentację WIBEST dla kierownika."
  next_step_type: "presentation"
  next_step_at: "2024-06-15 10:00"

- next_step: "Przygotować i wysłać ofertę."
  next_step_type: "offer"
  next_step_at: "2024-06-15 10:00"

- next_step: "Pokazać klientowi działanie systemu na jego przykładzie."
  next_step_type: "demo"
  next_step_at: "2024-06-15 10:00"

- next_step: "Ustalić warunki cenowe i zakres wdrożenia."
  next_step_type: "negotiation"
  next_step_at: "2024-06-15 10:00"

Jeżeli nie ma uzasadnionego następnego kroku:
- "next_step" = null
- "next_step_type" = null
- "next_step_at" = null
- "should_create_next_step" = false

Nie twórz następnego kroku tylko dlatego, że istnieje historia kontaktów.

DATA NASTĘPNEGO KROKU

"next_step_at" określa proponowaną datę i godzinę wykonania następnego kroku.

Ustal ją tylko wtedy, gdy z historii wynika konkretny termin albo można racjonalnie określić termin kolejnego kontaktu.

Jeżeli nie ma wystarczających informacji do ustalenia terminu:
- "next_step_at" = null

Nie wymyślaj konkretnych dat bez podstawy w danych.

Zwróć odpowiedź WYŁĄCZNIE jako poprawny JSON.
PROMPT;
}

    private function buildPrompt(
        Company $company,
        Crm $activity,
        $previousActivities
    ): string {
        return json_encode([
            'company' => [
                'name' => $company->name,
                'nip' => $company->nip,
            ],

            'current_activity' => [
                'type' => $activity->type,
                'datetime_start' => $activity->datetime_start,
                'datetime_end' => $activity->datetime_end,
                'datetime_complete' => $activity->datetime_complete,
                'plan' => $activity->plan,
                'result' => $activity->result,
            ],

            'previous_activities' => $previousActivities->map(function ($item) {
                return [
                    'type' => $item->type,
                    'datetime_start' => $item->datetime_start,
                    'datetime_complete' => $item->datetime_complete,
                    'plan' => $item->plan,
                    'result' => $item->result,
                    'ai_analysis' => $item->ai_analysis,
                    'ai_next_step' => $item->ai_next_step,
                ];
            })->values()->all(),

            'required_output' => [
                'classification',
                'sales_stage',
                'classification_reason',
                'summary',
                'signals',
                'problem',
                'value',
                'missing_information',
                'reason',
                'next_step',
                'next_step_at',
                'next_step_type',
                'should_create_next_step',
            ],
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    private function parseResponse(string $output): array
    {
        $output = trim($output);

        // Na wszelki wypadek usuwamy markdownowe ```json
        $output = preg_replace('/^```json\s*/', '', $output);
        $output = preg_replace('/\s*```$/', '', $output);

        $data = json_decode($output, true);

        if (!is_array($data)) {
            throw new \RuntimeException(
                'OpenAI zwróciło niepoprawny JSON: ' . $output
            );
        }

        return $data;
    }
}