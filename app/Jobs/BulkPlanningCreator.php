<?php

namespace App\Jobs;

use App\Livewire\CalendarView;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\WorkBlock;
use App\Repositories\UserRepository;
use App\Repositories\WorkSessionRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BulkPlanningCreator implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $data;
    protected User $user;
    protected string $reportKey;

    public function __construct(array $data, User $user, string $reportKey)
    {
        $this->data = $data;
        $this->user = $user;
        $this->reportKey = $reportKey; // Klucz do zapisu postępu/raportu
    }

    public function handle()
    {
        $successful = 0;
        $failed = [];
        $totalAttempts = 0;

        // Załóżmy, że $this->data zawiera start_date, end_date i listę user_ids
        $startDate = $this->data['start_date'];
        $endDate = $this->data['end_date'];
        $startTime = $this->data['start_time'];
        $endTime = $this->data['end_time'];
        $night = $this->data['night'];
        $userIds = $this->data['user_ids'];
        $currentUserId = $this->user->id; // Poprawnie
        $companyId = $this->user->company_id; // Poprawnie

        $dateRange = CarbonPeriod::create($startDate, $endDate);

        foreach ($userIds as $userId) {
            foreach ($dateRange as $date) {
                $isFaild = false;
                $totalAttempts++;
                $currentDate = $date->format('Y-m-d');
                $startDateTime = Carbon::parse($currentDate . ' ' . $startTime);
                $user = User::where('id', $userId)->first();
                $calendar = new CalendarView();
                $workSessionRepository = new WorkSessionRepository();
                $userRepository = new UserRepository();

                $dayOfWeek = $date->format('N');
                if (!in_array($dayOfWeek, $this->data['weekdays'])) {
                    $failed[] = [
                        'user_id' => $userId,
                        'date' => $currentDate,
                        'reason' => 'Nie wybrano tego dnia w formularzu.',
                    ];
                    $isFaild = true;
                    continue;
                }
                if ($this->data['holiday'] == true) {
                    $holidays = $calendar->getPublicHolidays($date->year);

                    // Sprawdzenie czy to Nowy Rok lub Trzech Króli
                    if ($date->month == 1 && $date->day == 1) {
                        $isHoliday = true; // Nowy Rok
                    } elseif ($date->month == 1 && $date->day == 6) {
                        $isHoliday = true; // Trzech Króli
                    } else {
                        $isHoliday = $holidays->contains($date->format('Y-m-d'));
                    }
                } else {
                    $isHoliday = false;
                }
                if ($isHoliday) {
                    $failed[] = [
                        'user_id' => $userId,
                        'date' => $currentDate,
                        'reason' => 'Święto ustawowo wolne.',
                    ];
                    $isFaild = true;
                    continue;
                }
                $leave = $workSessionRepository->hasLeave($user->id, $date->format('d.m.y'));
                if ($leave) {
                    $failed[] = [
                        'user_id' => $userId,
                        'date' => $currentDate,
                        'reason' => 'Wniosek.',
                    ];
                    $isFaild = true;
                    continue;
                }

                // 🌙 Sprawdzenie czy to jest "nocna zmiana" (night = true)
                if ($night) {
                    // Jeśli to jest nocna zmiana, to data końcowa to następny dzień.
                    // Łączymy datę + end_time i dodajemy jeden dzień
                    $endDateForNight = $date->copy()->addDay()->format('Y-m-d');
                    $endDateTime = Carbon::parse($endDateForNight . ' ' . $endTime);
                    $type = 'night';
                    if ($this->data['holiday'] == true) {
                        $holidays = $calendar->getPublicHolidays($endDateTime->year);

                        // Sprawdzenie czy to Nowy Rok lub Trzech Króli
                        if ($endDateTime->month == 1 && $endDateTime->day == 1) {
                            $isHoliday = true; // Nowy Rok
                        } elseif ($endDateTime->month == 1 && $endDateTime->day == 6) {
                            $isHoliday = true; // Trzech Króli
                        } else {
                            $isHoliday = $holidays->contains($endDateTime->format('Y-m-d'));
                        }
                    } else {
                        $isHoliday = false;
                    }
                    if ($isHoliday) {
                        $failed[] = [
                            'user_id' => $userId,
                            'date' => $currentDate,
                            'reason' => 'Święto ustawowo wolne następnego dnia.',
                        ];
                        $isFaild = true;
                        continue;
                    }
                    $leave = $workSessionRepository->hasLeave($user->id, $endDateTime->format('d.m.y'));
                    if ($leave) {
                        $failed[] = [
                            'user_id' => $userId,
                            'date' => $currentDate,
                            'reason' => 'Wniosek następnego dnia.',
                        ];
                        $isFaild = true;
                        continue;
                    }
                    $work = $userRepository->hasPlannedTodayWork($user->id, $date->format('d.m.y'));
                    $work_obj = $userRepository->getPlannedTodayWork($user->id, $date->format('d.m.y'));
                    $work_end = $userRepository->hasPlannedTodayWork($user->id, $endDateTime->format('d.m.y'));
                    $work_obj_end = $userRepository->getPlannedTodayWork($user->id, $endDateTime->format('d.m.y'));
                    if ($work) {
                        if ($work_obj->type == 'work') {
                            $failed[] = [
                                'user_id' => $userId,
                                'date' => $currentDate,
                                'reason' => 'Planing.',
                            ];
                            $isFaild = true;
                            continue;
                        }
                        if ($work_obj->type == 'night') {
                            $ends_at = Carbon::parse($work_obj->ends_at);
                            $isSameDay = $ends_at->isSameDay($currentDate);
                            if (!$isSameDay) {
                                $failed[] = [
                                    'user_id' => $userId,
                                    'date' => $currentDate,
                                    'reason' => 'Planing.',
                                ];
                                $isFaild = true;
                                continue;
                            }
                        }
                    }
                    if ($work_end) {
                        if ($work_obj_end->type == 'work') {
                            $failed[] = [
                                'user_id' => $userId,
                                'date' => $currentDate,
                                'reason' => 'Planing następnego dnia.',
                            ];
                            $isFaild = true;
                            continue;
                        }
                    }
                } else {
                    // Jeśli to nie jest nocna zmiana, to data końcowa to ten sam dzień.
                    $endDateTime = Carbon::parse($currentDate . ' ' . $endTime);
                    $type = 'work';
                    $work = $userRepository->hasPlannedTodayWork($user->id, $date->format('d.m.y'));
                    if ($work) {
                        $failed[] = [
                            'user_id' => $userId,
                            'date' => $currentDate,
                            'reason' => 'Planing.',
                        ];
                        $isFaild = true;
                        continue;
                    }
                }

                try {
                    if ($isFaild == false) {
                        // 2. Dodawanie planowania
                        WorkBlock::create([
                            'user_id' => $userId,
                            // Poprawne użycie danych przekazanych do konstruktora Joba
                            'company_id' => $companyId,          // UŻYJ $companyId lub $this->user->company_id
                            'created_user_id' => $currentUserId, // UŻYJ $currentUserId lub $this->user->id
                            'starts_at' => $startDateTime,
                            'ends_at' => $endDateTime,
                            'type' => $type,
                        ]);
                        $successful++;
                    }
                } catch (\Exception $e) {
                    $failed[] = [
                        'user_id' => $userId,
                        'date' => $currentDate,
                        'reason' => 'Błąd zapisu: ' . $e->getMessage(),
                    ];
                }
            }
        }

        // 3. Zapisanie raportu w pamięci podręcznej (Cache)
        $report = [
            'total_attempts' => $totalAttempts,
            'successful' => $successful,
            'failed_count' => count($failed),
            'failed_details' => $failed,
            'user_id' => $this->user->id,
        ];

        // Zapisz raport na krótki czas (np. 1 godzina)
        \Illuminate\Support\Facades\Cache::put($this->reportKey, $report, now()->addHour());
    }
}
