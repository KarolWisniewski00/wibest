<?php

namespace App\Steps;

use App\Livewire\CalendarView;
use App\Mail\LeaveMail;
use App\Models\SentMessage;
use App\Repositories\WorkSessionRepository;
use App\Services\SmsApi;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Vildanbina\LivewireWizard\Components\Step;
use Carbon\CarbonPeriod;

class LeaveDateStep extends Step
{
    protected string $view = 'livewire.steps.leave-date-step';


    public function mount()
    {
        $this->mergeState([
            'start_time' => $this->model->start_date,
            'end_time' => $this->model->end_date,
        ]);
    }
    public function save($state)
    {
        $this->validate(...$this->validate());
        $leave = $this->model;
        $user = Auth::user(); // Pobieramy obiekt użytkownika
        $calendar = new CalendarView();

        // 1. Sprawdzenie i zabezpieczenie kolumn dni pracy
        // Ponieważ kolumny są nullable, upewniamy się, że mają wartość false, jeśli są puste.
        // Chociaż lepiej jest nadać im default(false) w migracji, to jest to zabezpieczenie w kodzie.
        $userWorkingDays = [
            1 => $user->working_mon ?? false, // Poniedziałek - Carbon::MONDAY
            2 => $user->working_tue ?? false, // Wtorek
            3 => $user->working_wed ?? false, // Środa
            4 => $user->working_thu ?? false, // Czwartek
            5 => $user->working_fri ?? false, // Piątek
            6 => $user->working_sat ?? false, // Sobota
            0 => $user->working_sun ?? false, // Niedziela - Carbon::SUNDAY (dla Carbon 0 = Niedziela, 1 = Poniedziałek)
        ];

        // 2. Obliczenie dni
        $startDate = Carbon::parse($state['start_time']);
        $endDate = Carbon::parse($state['end_time']);

        $totalDays = 0;
        $workingDays = 0;
        $nonWorkingDays = 0;

        // Utworzenie okresu dat do iteracji
        $period = CarbonPeriod::create($startDate, $endDate);

        foreach ($period as $date) {
            $totalDays++;
            // Carbon::dayOfWeek zwraca 0 (Niedziela) - 6 (Sobota).
            // W naszym schemacie: 1-Mon, 2-Tue, ..., 6-Sat, 0-Sun
            $dayOfWeekIndex = $date->dayOfWeek;

            // Sprawdzamy, czy użytkownik pracuje w ten dzień (zgodnie z kolumną boolean)
            if ($userWorkingDays[$dayOfWeekIndex] == true) {
                //if ($user->public_holidays == true) {
                $holidays = $calendar->getPublicHolidays($date->year);
                $dateStr = $date->format('Y-m-d');

                // Sprawdzenie czy to Nowy Rok lub Trzech Króli
                if ($date->month == 1 && $date->day == 1) {
                    $isHoliday = true; // Nowy Rok
                } elseif ($date->month == 1 && $date->day == 6) {
                    $isHoliday = true; // Trzech Króli
                } else {
                    $isHoliday = $holidays->contains($dateStr);
                }
                //} else {
                //    $isHoliday = false;
                //}
                if ($isHoliday) {
                    $nonWorkingDays++;
                } else {
                    $workingDays++;
                }
            } else {
                $nonWorkingDays++;
            }
        }
        if (
            $user->working_mon == null &&
            $user->working_tue == null &&
            $user->working_wed == null &&
            $user->working_thu == null &&
            $user->working_fri == null &&
            $user->working_sat == null &&
            $user->working_sun == null
        ) {
            $nonWorkingDays = 0;
            $workingDays = 0;
        }
        $leave->start_date = $state['start_time'];
        $leave->end_date = $state['end_time'];
        $leave->company_id = Auth::user()->company_id;
        $leave->user_id = Auth::id();
        $leave->created_user_id = Auth::id();
        $leave->status = 'oczekujące';
        // Zapis obliczonych wartości
        $leave->days = $totalDays;
        $leave->working_days = $workingDays;
        $leave->non_working_days = $nonWorkingDays;
        $leave->save();

        $leaveMail = new LeaveMail($leave);
        try {
            Mail::to($leave->manager->email)->send($leaveMail);
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->manager->email,
                'user_id'    => $leave->manager_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Złożenie wniosku przez użytkownika ' . $leave->user->name,
                'status'     => 'SENT',
                'price'      => 0.00,
            ]);
        } catch (Exception) {
            SentMessage::create([
                'type'       => 'email',
                'recipient'  => $leave->manager->email,
                'user_id'    => $leave->manager_id,
                'company_id' => $leave->company_id,
                'subject'    => 'Wnioski',
                'body'       => 'Złożenie wniosku przez użytkownika ' . $leave->user->name,
                'status'     => 'FAILED',
                'price'      => 0.00,
            ]);
        }
        if ($leave->manager->sms) {
            $sms_api = new SmsApi();
            $phone_validated = $sms_api->normalizePhoneNumber($leave->manager->phone);

            $message = 'Złożono nowy wniosek
' . $state['type'] . '
' . $leave->user->name . '
' . $startDate->format('d.m.Y') . ' - ' . $endDate->format('d.m.Y') . '

wibest.pl/login';

            try {
                $smsResult = $sms_api->sendSms($phone_validated, $message);
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
                            'user_id'    => $leave->manager_id,
                            'company_id' => $leave->company_id,
                            'subject'    => 'Wnioski',
                            'body'       => 'Złożenie wniosku przez użytkownika ' . $leave->user->name,
                            'status'     => $messageData['status'] ?? 'SENT',
                            'price'      => $messageData['points'] ?? 0.00,
                        ]);
                    } else {
                        // Logowanie: Success=true, ale brak danych wiadomości w liście
                        SentMessage::create([
                            'type'       => 'sms',
                            'recipient'  => $phone_validated,
                            'user_id'    => $leave->manager_id,
                            'company_id' => $leave->company_id,
                            'subject'    => 'Wnioski',
                            'body'       => 'Złożenie wniosku przez użytkownika ' . $leave->user->name,
                            'status'     => 'UNKNOW',
                            'price'      => $messageData['points'] ?? 0.00,
                        ]);
                    }
                } else {
                    // Wystąpił błąd HTTP, błąd połączenia lub błąd biznesowy z API (wg logiki w sendSms)
                    SentMessage::create([
                        'type'       => 'sms',
                        'recipient'  => $phone_validated,
                        'user_id'    => $leave->manager_id,
                        'company_id' => $leave->company_id,
                        'subject'    => 'Wnioski',
                        'body'       => 'Złożenie wniosku przez użytkownika ' . $leave->user->name,
                        'status'     => 'FAILED',
                        'price'      => $messageData['points'] ?? 0.00,
                    ]);

                    // finalStatus pozostaje 'API_FAILED'
                }
            } catch (Exception) {
                SentMessage::create([
                    'type'       => 'sms',
                    'recipient'  => $phone_validated,
                    'user_id'    => $leave->manager_id,
                    'company_id' => $leave->company_id,
                    'subject'    => 'Wnioski',
                    'body'       => 'Złożenie wniosku przez użytkownika ' . $leave->user->name,
                    'status'     => 'FAILED',
                    'price'      => $messageData['points'] ?? 0.00,
                ]);
            }
        }

        return redirect()->route('leave.single.index')->with('success', 'Operacja zakończona powodzeniem.');
    }
    public function icon(): string
    {
        return 'calendar';
    }
    public function validate()
    {
        // bazowe reguły
        $rules = [
            'state.start_time'     => ['required', 'date'],
            'state.end_time'     => ['required', 'date', 'after_or_equal:state.start_time'],
        ];

        $start_time = $this->livewire->state['start_time'] ?? null;
        $end_time = $this->livewire->state['end_time'] ?? null;
        $user = Auth::user();
        // 1. Definiowanie dat
        if ($start_time != null && $end_time != null) {
            $startDate = Carbon::createFromFormat('Y-m-d', $start_time);
            $endDate = Carbon::createFromFormat('Y-m-d', $end_time);

            $workSessionRepository = new WorkSessionRepository();

            // 2. KLONOWANIE daty początkowej
            // Jest to kluczowy krok, aby nie modyfikować oryginalnej daty
            $currentDate = $startDate->copy();


            // 3. Pętla while
            // Pętla wykonuje się dopóki bieżąca data jest mniejsza lub równa dacie końcowej
            while ($currentDate->lte($endDate)) {
                $hasEvent = $workSessionRepository->hasEventForUserOnDate($user->id, $currentDate->format('d.m.y'));
                $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($user->id, $currentDate->format('d.m.y'));
                $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($user->id, $currentDate->format('d.m.y'));
                $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($user->id, $currentDate->format('d.m.y'));
                $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($user->id, $currentDate->format('d.m.y'));
                $status = $workSessionRepository->hasInProgressEventForUserOnDate($user->id, $currentDate->format('d.m.y'));
                $leave = $workSessionRepository->hasLeave($user->id, $currentDate->format('d.m.y'));

                if ($status) {
                    $rules['state.start_time'][] =
                        function ($attribute, $value, $fail) {
                            // tu wkładasz swoją logikę:
                            $fail('Użytkownik jest zalogowany w tym dniu.');
                        };
                } else if ($leave) {
                    $rules['state.start_time'][] =
                        function ($attribute, $value, $fail) {
                            // tu wkładasz swoją logikę:
                            $fail('Użytkownik ma już Wniosek w tym dniu.');
                        };
                } else if ($hasEvent) {
                    $rules['state.start_time'][] =
                        function ($attribute, $value, $fail) {
                            // tu wkładasz swoją logikę:
                            $fail('Użytkownik ma już RCP w tym dniu.');
                        };
                } else if ($hasStartEvent && $hasStopEvent) {
                    $rules['state.start_time'][] =
                        function ($attribute, $value, $fail) {
                            // tu wkładasz swoją logikę:
                            $fail('Użytkownik ma już RCP w tym dniu.');
                        };
                } else if ($hasStartEvent2 && $hasStopEvent2) {
                    $rules['state.start_time'][] =
                        function ($attribute, $value, $fail) {
                            // tu wkładasz swoją logikę:
                            $fail('Użytkownik ma już RCP w tym dniu.');
                        };
                }
                // 5. Przejście do następnego dnia
                $currentDate->addDay(); // Modyfikuje $currentDate o 1 dzień
            }
        }
        return [
            $rules,
            [],
            [],
            [
                'state.start_time'     => __('start_time'),
                'state.end_time'     => __('end_time'),
            ],
        ];
    }
    public function title(): string
    {
        return __('📅 Wybierz zakres dat');
    }
}
