<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\SentMessage;
use App\Models\User;
use App\Models\WorkSession;
use App\Services\SmsApi;
use Exception;

class SendDelayedStartWork implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;
    protected $message;
    protected $subject;
    protected $body;

    /**
     * Utwórz nowe wystąpienie zadania.
     *
     * @return void
     */
    public function __construct(int $userId, string $message, string $subject, string $body)
    {
        $this->userId = $userId;
        $this->message = $message;
        $this->subject = $subject;
        $this->body = $body;
        // Ustawienie opóźnienia jest realizowane w kontrolerze (krok 3)
    }

    /**
     * Uruchom zadanie.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::where('id', $this->userId)->first();
        if ($user->sms) {
            $sms_api = new SmsApi();
            $phone_validated = $sms_api->normalizePhoneNumber($user->phone);

            try {
                $smsResult = $sms_api->sendSms($phone_validated, $this->message);
                // 2. Analiza wyniku zwróconego przez sendSms()
                if ($smsResult['success'] === true) {
                    // Odpowiedź API znajduje się w kluczu 'data'
                    $responseData = $smsResult['data'];

                    // Sprawdzenie, czy struktura odpowiedzi jest poprawna (jak w przykładzie)
                    if (isset($responseData['list'][0])) {
                        $messageData = $responseData['list'][0];

                        // Użycie danych z API do zapisu
                        SentMessage::create([
                            'type'       => 'sms',
                            'recipient'  => $phone_validated,
                            'user_id'    => $user->id,
                            'company_id' => $user->company_id,
                            'subject'    => $this->subject,
                            'body'       => $this->body,
                            'status'     => $messageData['status'] ?? 'SENT',
                            'price'      => $messageData['points'] ?? 0.00,
                        ]);
                    } else {
                        // Logowanie: Success=true, ale brak danych wiadomości w liście
                        SentMessage::create([
                            'type'       => 'sms',
                            'recipient'  => $phone_validated,
                            'user_id'    => $user->id,
                            'company_id' => $user->company_id,
                            'subject'    => $this->subject,
                            'body'       => $this->body,
                            'status'     => 'UNKNOW',
                            'price'      => $messageData['points'] ?? 0.00,
                        ]);
                    }
                } else {
                    // Wystąpił błąd HTTP, błąd połączenia lub błąd biznesowy z API (wg logiki w sendSms)
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $user->id,
                        'company_id' => $user->company_id,
                        'subject'    => $this->subject,
                        'body'       => $this->body,
                        'status'     => 'FAILED',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);

                    // finalStatus pozostaje 'API_FAILED'
                }
            } catch (Exception) {
                SentMessage::create([
                    'type'       => 'sms',
                    'recipient'  => $phone_validated,
                    'user_id'    => $user->id,
                    'company_id' => $user->company_id,
                    'subject'    => $this->subject,
                    'body'       => $this->body,
                    'status'     => 'FAILED',
                    'price'      => $messageData['points'] ?? 0.00,
                ]);
            }
        }
    }
}
