<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsApi
{
    protected $apiUrl;
    protected $apiToken;
    protected $fromField;

    public function __construct()
    {
        $this->apiUrl = config('services.smsapi.url');
        $this->apiToken = config('services.smsapi.token');
        $this->fromField = config('services.smsapi.from');
    }
    /**
     * Normalizuje numer telefonu: usuwa znaki niecyfrowe (w tym '+' i spacje),
     * a następnie dodaje prefiks '48', jeśli go brakuje.
     *
     * @param string $phoneNumber Numer telefonu do normalizacji.
     * @return string Znormalizowany numer telefonu z prefiksem '48'.
     */
    public function normalizePhoneNumber(?string $phoneNumber): ?string
    {
        try {
            if (empty($phoneNumber)) {
                return '';
            }

            // Usuń wszystkie znaki niebędące cyframi.
            $cleanNumber = preg_replace('/\D/', '', $phoneNumber);

            if (empty($cleanNumber)) {
                return '';
            }

            // Usuń początkowe zero.
            if (str_starts_with($cleanNumber, '0')) {
                $cleanNumber = substr($cleanNumber, 1);
            }

            // Dodaj prefiks 48, jeśli go nie ma.
            if (!str_starts_with($cleanNumber, '48')) {
                $cleanNumber = '48' . $cleanNumber;
            }

            // Sprawdź, czy numer ma prawidłową długość dla Polski.
            if (strlen($cleanNumber) !== 11) {
                return '';
            }

            return $cleanNumber;
        } catch (Exception) {
            return '';
        }
    }
    /**
     * Zamienia polskie znaki diakrytyczne na ich odpowiedniki bez akcentów.
     *
     * @param string $text
     * @return string
     */
    private function cleanPolishChars(string $text): string
    {
        $replace_map = [
            'ą' => 'a',
            'ć' => 'c',
            'ę' => 'e',
            'ł' => 'l',
            'ń' => 'n',
            'ó' => 'o',
            'ś' => 's',
            'ż' => 'z',
            'ź' => 'z',
            'Ą' => 'A',
            'Ć' => 'C',
            'Ę' => 'E',
            'Ł' => 'L',
            'Ń' => 'N',
            'Ó' => 'O',
            'Ś' => 'S',
            'Ż' => 'Z',
            'Ź' => 'Z',
        ];

        return strtr($text, $replace_map);
    }
    /**
     * Wysyła SMS do podanego numeru.
     *
     * @param string $to Numer odbiorcy z prefiksem (np. 48123456789)
     * @param string $message Treść wiadomości
     * @return array Wynik operacji (sukces/błąd)
     */
    public function sendSms(string $to, string $message): array
    {
        $cleanMessage = $this->cleanPolishChars($message);
        // Parametry wysyłane w ciele zapytania (POST)
        $data = [
            'to' => $to,
            'message' => $cleanMessage,
            'from' => $this->fromField, // Pole nadawcy
            'encoding' => 'utf-8',
            'format' => 'json', // Wymagany format odpowiedzi
        ];

        // Zbudowanie pełnego URL API
        // Zgodnie z przykładem w curl, parametry są przesyłane w zapytaniu
        // np. api.smsapi.pl/sms.do?from=FROM_POLE_NADAWCY&to=48500000000&message=tresc_wiadomosci&format=json

        try {
            // Używamy fasady Http do wysłania zapytania POST
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
            ])->post($this->apiUrl, $data);

            // Sprawdzenie statusu HTTP
            if ($response->successful()) {
                $responseData = $response->json();

                // Sprawdzenie, czy API zwróciło strukturę błędu (sekcja 'b) w przykładzie)
                if (isset($responseData['error']) || isset($responseData['invalid_numbers'])) {
                    // Logowanie i zwrócenie błędu z API
                    Log::error('SMS API Error (Business Logic):', $responseData);
                    return [
                        'success' => false,
                        'message' => 'Błąd API SMS: ' . ($responseData['message'] ?? 'Nieznany błąd')
                    ];
                }

                // Sukces
                return [
                    'success' => true,
                    'message' => 'Wiadomość wysłana pomyślnie.',
                    'data' => $responseData
                ];
            } else {
                // Błąd HTTP (np. 401 Unauthorized, 500 Internal Server Error)
                Log::error('SMS API HTTP Error:', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return [
                    'success' => false,
                    'message' => 'Błąd komunikacji HTTP: ' . $response->status()
                ];
            }
        } catch (\Exception $e) {
            // Błąd połączenia (np. brak sieci, błędny URL)
            Log::error('SMS API Connection Exception:', ['exception' => $e->getMessage()]);
            return [
                'success' => false,
                'message' => 'Wystąpił wyjątek podczas połączenia: ' . $e->getMessage()
            ];
        }
    }
}
