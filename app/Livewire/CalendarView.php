<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class CalendarView extends Component
{
    public $currentMonth;
    public $selectedDate;
    public $typeTime;
    public $userId;
    public bool $planned = false;

    public function getPublicHolidays($year)
    {
        // Obliczanie Wielkanocy
        $easter = Carbon::createFromTimestamp(easter_date($year));
        $holidays = [
            $easter->copy(),               // Wielkanoc (niedziela)
            $easter->copy()->addDay(),     // Poniedziałek Wielkanocny
            Carbon::create($year, 5, 1),   // Święto Pracy
            Carbon::create($year, 5, 3),   // Święto Konstytucji 3 Maja
            $easter->copy()->addWeeks(7),  // Zielone Świątki (50 dni po Wielkanocy)
            $easter->copy()->addDays(60),  // Boże Ciało (60 dni po Wielkanocy)
            Carbon::create($year, 8, 15),  // Wniebowzięcie NMP + Święto WP
            Carbon::create($year, 11, 1),  // Wszystkich Świętych
            Carbon::create($year, 11, 11), // Święto Niepodległości
            Carbon::create($year, 12, 25), // Boże Narodzenie (1. dzień)
            Carbon::create($year, 12, 26), // Boże Narodzenie (2. dzień)
        ];

        return collect($holidays)->map(fn($date) => $date->format('Y-m-d'));
    }
    public function selectDate($date, $typeTime = 'start_time')
    {
        $this->selectedDate = \Carbon\Carbon::parse($date)->format('Y-m-d');
        $this->dispatch('selectDate', selectedDate: $this->selectedDate, typeTime: $typeTime);
    }

    public function mount()
    {
        $this->currentMonth = Carbon::now()->startOfMonth();
    }
    public function goToPreviousMonth()
    {
        $this->currentMonth = $this->currentMonth->copy()->subMonth();
    }

    public function goToNextMonth()
    {
        $this->currentMonth = $this->currentMonth->copy()->addMonth();
    }

    public function getWeeks()
    {
        // Zakładam, że masz dostęp do $workSessionRepository i $user w tej klasie.
        // Jeśli nie, musisz je przekazać do komponentu lub pobrać tutaj.
        // Przykład pobrania użytkownika:
        if (!$this->userId) {
            $user = auth()->user();
            $userId = $user->id;
        } else {
            $userId = $this->userId;
        }
        // Przykład pobrania repozytorium (jeśli używasz kontenera Laravel):
        $workSessionRepository = app()->make(\App\Repositories\WorkSessionRepository::class);

        $start = $this->currentMonth->copy()->startOfMonth()->startOfWeek(Carbon::MONDAY);
        $end = $this->currentMonth->copy()->endOfMonth()->endOfWeek(Carbon::SUNDAY);

        $holidays = $this->getPublicHolidays($start->year);

        $dates = [];
        while ($start <= $end) {
            $date = $start->copy();
            $dateStr = $date->format('Y-m-d');
            $rcp = null;

            $leave = $workSessionRepository->hasLeave($userId, $date->format('d.m.y'));
            $leaveFirst = $workSessionRepository->getFirstLeave($userId, $date->format('d.m.y'));
            $rcp = $workSessionRepository->getFirstRcp($userId, $date->format('d.m.y'));

            if ($this->planned) {
                $leavePlanned = $workSessionRepository->hasPlannedLeave($userId, $date->format('d.m.y'));
                $leavePlannedFirst = $workSessionRepository->getFirstPlannedLeave($userId, $date->format('d.m.y'));
                if ($leavePlannedFirst) {
                    $leavePlannedFirst->type = 'urlop planowany';
                }
            }

            // Sprawdzenie czy to Nowy Rok lub Trzech Króli
            if ($date->month == 1 && $date->day == 1) {
                $isHoliday = true; // Nowy Rok
            } elseif ($date->month == 1 && $date->day == 6) {
                $isHoliday = true; // Trzech Króli
            } else {
                $isHoliday = $holidays->contains($dateStr);
            }

            if ($leave) {
                $dates[] = [
                    'date' => $date,
                    'leave' => $leaveFirst->type,
                    'isHoliday' => $isHoliday,
                    'rcp' => $rcp,
                ];
            } elseif ($this->planned && $leavePlanned) {
                $dates[] = [
                    'date' => $date,
                    'leave' => $leavePlannedFirst->type,
                    'isHoliday' => $isHoliday,
                    'rcp' => $rcp,
                ];
            }else {
                $dates[] = [
                    'date' => $date,
                    'leave' => null,
                    'isHoliday' => $isHoliday,
                    'rcp' => $rcp,
                ];
            }
            $start->addDay();
        }

        return collect($dates)->chunk(7); // podział na tygodnie
    }

    public function render()
    {
        return view('livewire.calendar-view', [
            'weeks' => $this->getWeeks(),
            'monthName' => $this->currentMonth->locale('pl')->translatedFormat('F Y'),
            'selectedDate' => $this->selectedDate,
        ]);
    }
}
