<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CalendarFromToAuto extends Component
{
    // Zmienne stanu komponentu
    public $currentMonth = null;
    public $startDate = null; // Zastępuje $selectedDate dla daty startowej
    public $endDate = null;   // Nowa zmienna dla daty końcowej
    public $userId;
    public $leaveId;
    public $workBlockId;
    public $workSessionId;
    public $type;
    public $calendar = null;
    public bool $work_block = false;
    public bool $work_session = false;
    public bool $leave = false;
    public bool $multi = false;

    // Pobiera daty świąt państwowych w Polsce
    public function getPublicHolidays($year)
    {
        // Logika obliczania świąt pozostaje bez zmian
        $easter = Carbon::createFromTimestamp(easter_date($year));
        $holidays = [
            $easter->copy(),               // Wielkanoc (niedziela)
            $easter->copy()->addDay(),     // Poniedziałek Wielkanocny
            Carbon::create($year, 5, 1),   // Święto Pracy
            Carbon::create($year, 5, 3),   // Święto Konstytucji 3 Maja
            $easter->copy()->addWeeks(7),  // Zielone Świątki
            $easter->copy()->addDays(60),  // Boże Ciało
            Carbon::create($year, 8, 15),  // Wniebowzięcie NMP + Święto WP
            Carbon::create($year, 11, 1),  // Wszystkich Świętych
            Carbon::create($year, 11, 11), // Święto Niepodległości
            Carbon::create($year, 12, 24),
            Carbon::create($year, 12, 25), // Boże Narodzenie (1. dzień)
            Carbon::create($year, 12, 26), // Boże Narodzenie (2. dzień)
        ];

        return collect($holidays)->map(fn($date) => $date->format('Y-m-d'));
    }

    public function selectDate($dateStr)
    {
        // Konwertujemy wejściowy ciąg znaków na obiekt Carbon i format 'Y-m-d'
        $newDateCarbon = Carbon::parse($dateStr);
        $newDateFormatted = $newDateCarbon->format('Y-m-d');

        // UWAGA: Logika zajętych dni (Leave/RCP/Holiday) MUSI być w $this->getWeeks(), 
        // aby było to poprawnie renderowane. Tutaj nie uwzględniamy tej logiki.

        // --- Inteligentna Logika Wyboru Daty Zakresu ---
        if ($this->calendar == null) {
            if ($this->startDate === null) {
                // 1. Pierwsze kliknięcie: Ustaw datę startową
                $this->startDate = $newDateFormatted;
                $this->endDate = null;
            } elseif ($this->endDate === null) {
                // 2. Drugie kliknięcie: Ustaw datę końcową z polaryzacją

                $start = Carbon::parse($this->startDate);

                if ($newDateCarbon->eq($start)) {
                    // Jeśli kliknięto tę samą datę, resetujemy (do odznaczenia)
                    $this->endDate = $newDateFormatted;
                } else {
                    // Ustawiamy endDate na nową datę
                    $this->endDate = $newDateFormatted;

                    // **Inteligentna Polaryzacja (Swap)**
                    // Jeśli nowa data jest wcześniejsza niż startDate, zamień je.
                    if ($newDateCarbon->lt($start)) {
                        $temp = $this->startDate;
                        $this->startDate = $this->endDate; // Nowa, wcześniejsza data jako Start
                        $this->endDate = $temp;             // Stara data startowa jako Koniec
                    }
                }
            } else {
                // 3. Obie daty są ustawione (startDate i endDate): 
                // Resetujemy zakres i ustawiamy nowy start na klikniętą datę
                $this->startDate = $newDateFormatted;
                $this->endDate = null;
            }
        } else {
            $this->startDate = $newDateFormatted;
            $this->endDate = $newDateFormatted;
        }

        // Wysłanie dat do komponentu nadrzędnego (Livewire Wizard)
        $this->dispatch('dateRangeSelected', [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ]);
    }

    // Używamy tego do wizualnego podświetlenia zakresu w widoku
    public function isDateInRange($dateStr)
    {
        if ($this->startDate && $this->endDate) {
            $current = Carbon::parse($dateStr);
            $start = Carbon::parse($this->startDate);
            $end = Carbon::parse($this->endDate);

            // Sprawdza, czy data jest między start a stop (włącznie)
            return $current->between($start, $end);
        }
        return false;
    }

    public function mount()
    {
        if ($this->currentMonth == null) {
            if ($this->type == 'first') {
                $this->currentMonth = Carbon::now()->startOfMonth();
            } else {
                $this->currentMonth = Carbon::now()->startOfMonth()->addMonth();
            }
        } else {
            $this->currentMonth = Carbon::createFromFormat('d.m.Y', $this->currentMonth);
        }
        if ($this->startDate == null && $this->endDate == null) {
            if ($this->type == 'first') {
                $this->currentMonth = Carbon::now()->startOfMonth();
            } else {
                $this->currentMonth = Carbon::now()->startOfMonth()->addMonth();
            }
        }
        Session::put($this->type, $this->currentMonth->format('d.m.Y'));
        // Użyj przekazanych wartości, jeśli istnieją, aby utrzymać stan
        // Domyślnie używamy null, jeśli nie są przekazane.
        // Jeśli ten komponent jest używany jako 'calendar-from-to-auto' z zewnątrz, 
        // te zmienne będą musiały być przekazane przez wire:model lub properties.
    }

    // ... (metody goToPreviousMonth, goToNextMonth pozostają bez zmian)
    public function goToPreviousMonth()
    {
        $this->currentMonth = $this->currentMonth->copy()->subMonth();
        Session::put($this->type, $this->currentMonth->format('d.m.Y'));
    }

    public function goToNextMonth()
    {
        $this->currentMonth = $this->currentMonth->copy()->addMonth();
        Session::put($this->type, $this->currentMonth->format('d.m.Y'));
    }

    // ... (metoda getWeeks pozostaje bez zmian, ale usuwamy zależność od $this->selectedDate)
    public function getWeeks()
    {
        // Zakładam, że masz dostęp do $workSessionRepository i $user w tej klasie.
        if (!$this->userId) {
            $user = auth()->user();
            $userId = $user->id;
        } else {
            $user = User::where('id', $this->userId)->first();
            $userId = $this->userId;
        }
        $workSessionRepository = app()->make(\App\Repositories\WorkSessionRepository::class);
        $userRepository = app()->make(\App\Repositories\UserRepository::class);

        $start = $this->currentMonth->copy()->startOfMonth()->startOfWeek(Carbon::MONDAY);
        $end = $this->currentMonth->copy()->endOfMonth()->endOfWeek(Carbon::SUNDAY);

        $holidays = $this->getPublicHolidays($start->year);

        $dates = [];
        while ($start <= $end) {
            $date = $start->copy();
            $dateStr = $date->format('Y-m-d');
            $rcp = null;

            $leaveFirst = $workSessionRepository->getFirstLeave($userId, $date->format('d.m.y'));
            $rcp = $workSessionRepository->getFirstRcp($userId, $date->format('d.m.y'));
            if ($rcp && $rcp->time_in_work != 0) {
                $event_start_obj = Event::where('id', $rcp->event_start_id)->first();
                $event_stop_obj = Event::where('id', $rcp->event_stop_id)->first();
                $startDateEvent = Carbon::parse($event_start_obj->time);
                $stopDateEvent = Carbon::parse($event_stop_obj->time);
                // Sprawdza, czy stopDateEvent ma inną datę niż startDateEvent
                if (!$stopDateEvent->isSameDay($startDateEvent)) {
                    $rcp->night = true; // Praca przeszła przez północ
                } else {
                    $rcp->night = false; // Praca zakończyła się w tym samym dniu
                }
            }
            if ($this->work_block) {
                $work_obj = $userRepository->getPlannedTodayWork($userId, $date->format('d.m.y'));
            }


            //if ($user->public_holidays) {
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

            if (isset($leaveFirst->type)) {
                $leave_type = $leaveFirst->type;
            } else {
                $leave_type = null;
            }
            if (isset($work_obj->type)) {
                $work_type = $work_obj->type;
            } else {
                $work_type = null;
            }

            // Uproszczona struktura danych dnia (zachowujemy oryginalną, ale z mniejszą zależnością od 'selectedDate')
            if ($this->multi) {
                $dates[] = [
                    'date' => $date,
                    'leave' => null,
                    'isHoliday' => null,
                    'rcp' => null,
                    'work_block' => null,
                    'multi' => $isHoliday,
                ];
            } elseif ($this->leave) {
                if ($this->leaveId != null && $leaveFirst != null && $leaveFirst->id == $this->leaveId) {
                    $dates[] = [
                        'date' => $date,
                        'leave' => null,
                        'isHoliday' => null,
                        'rcp' => $rcp,
                        'work_block' => null,
                        'multi' => $isHoliday,
                    ];
                } else {
                    $dates[] = [
                        'date' => $date,
                        'leave' => $leave_type,
                        'isHoliday' => null,
                        'rcp' => $rcp,
                        'work_block' => null,
                        'multi' => $isHoliday,
                    ];
                }
            } elseif ($this->work_session) {
                if ($this->workSessionId != null && $rcp != null && $rcp->id == $this->workSessionId) {
                    $dates[] = [
                        'date' => $date,
                        'leave' => $leave_type,
                        'isHoliday' => null,
                        'rcp' => null,
                        'work_block' => null,
                        'multi' => $isHoliday,
                    ];
                } else {
                    $dates[] = [
                        'date' => $date,
                        'leave' => $leave_type,
                        'isHoliday' => null,
                        'rcp' => $rcp,
                        'work_block' => null,
                        'multi' => $isHoliday,
                    ];
                }
            } elseif ($this->work_block) {
                if ($this->workBlockId != null && $work_obj != null && $work_obj->id == $this->workBlockId) {
                    $dates[] = [
                        'date' => $date,
                        'leave' => $leave_type,
                        'isHoliday' => null,
                        'rcp' => null,
                        'work_block' => null,
                        'multi' => $isHoliday,
                    ];
                } else {
                    $dates[] = [
                        'date' => $date,
                        'leave' => $leave_type,
                        'isHoliday' => null,
                        'rcp' => null,
                        'work_block' => $work_type,
                        'multi' => $isHoliday,
                    ];
                }
            } else {
                $dates[] = [
                    'date' => $date,
                    'leave' => null,
                    'isHoliday' => null,
                    'rcp' => $rcp,
                    'work_block' => null,
                    'multi' => $isHoliday,
                ];
            }
            $start->addDay();
        }

        return collect($dates)->chunk(7); // podział na tygodnie
    }

    public function render()
    {
        // Łączymy daty dla wyświetlenia w jednym polu, jeśli są oba ustawione
        $displayDate = '';
        if ($this->startDate) {
            $displayDate = Carbon::parse($this->startDate)->format('d.m.Y');
            if ($this->endDate) {
                $displayDate .= ' - ' . Carbon::parse($this->endDate)->format('d.m.Y');
            }
        }

        return view('livewire.calendar-from-to-auto', [
            'weeks' => $this->getWeeks(),
            'monthName' => $this->currentMonth->locale('pl')->translatedFormat('F Y'),
            'displayDate' => $displayDate,
            'currentMonth' => $this->currentMonth,
            'type' => $this->type,
            'user' => User::where('id', $this->userId)->first(),
            'startDate' => $this->startDate, // Przekazujemy do widoku do podświetlania
            'endDate' => $this->endDate,   // Przekazujemy do widoku do podświetlania
        ]);
    }
}
