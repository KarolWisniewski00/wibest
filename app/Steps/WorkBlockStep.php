<?php

namespace App\Steps;

use App\Livewire\CalendarView;
use App\Models\Leave;
use App\Models\User;
use App\Models\WorkBlock;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Vildanbina\LivewireWizard\Components\Step;

class WorkBlockStep extends Step
{
    protected string $view = 'livewire.steps.work-block-step';

    public function mount()
    {
        $this->mergeState([
            'start_time' => null,
            'start_time_clock' => null,
            'end_time_clock' => null,
        ]);
    }

    public function save($state)
    {
        $dateTimeStart = \Carbon\Carbon::parse(
            $state['start_time'] . ' ' . $state['start_time_clock']
        )->format('Y-m-d H:i:s');

        if (isset($state['night']) && $state['night'] == true) {
            $dateTimeEnd = \Carbon\Carbon::parse(
                $state['start_time'] . ' ' . $state['end_time_clock']
            )->addDay()->format('Y-m-d H:i:s');
            $this->validate(...$this->validate());
        } else {
            $dateTimeEnd = \Carbon\Carbon::parse(
                $state['start_time'] . ' ' . $state['end_time_clock']
            )->format('Y-m-d H:i:s');
            $this->validate(...$this->validate());
        }
        // ZMIANA TUTAJ: Użycie diffInSeconds() na obiektach Carbon
        $timeInWorkSeconds = \Carbon\Carbon::parse($dateTimeStart)
            ->diffInSeconds(\Carbon\Carbon::parse($dateTimeEnd));

        $start = \Carbon\Carbon::parse($dateTimeStart); // Użyj pełnej ścieżki lub use
        $end = \Carbon\Carbon::parse($dateTimeEnd); // Użyj pełnej ścieżki lub use

        // Porównanie dni
        if ($start->isSameDay($end)) {
            $shiftType = 'work';
        } else {
            $shiftType = 'night';
        }

        WorkBlock::create([
            'company_id' => Auth::user()->company_id,
            'user_id' => $state['user_id'],
            'created_user_id' => Auth::id(),
            'starts_at' => $dateTimeStart,
            'ends_at' => $dateTimeEnd,
            'type' => $shiftType,
            'duration_seconds' => $timeInWorkSeconds,
        ]);

        return redirect()->route('calendar.work-schedule.index')->with('success', 'Operacja zakończona powodzeniem.');
    }
    public function icon(): string
    {
        return 'clock';
    }
    public function validate()
    {
        $isNight = $this->livewire->state['night'] ?? false;

        // bazowe reguły
        $rules = [
            'state.start_time' => ['required'],
            'state.start_time_clock' => ['required'],
            'state.end_time_clock' => ['required'],
        ];

        // Jeśli dzień start ma być pierwszy
        if (!$isNight) {
            $rules['state.end_time_clock'][] = 'after_or_equal:state.start_time_clock';
        }

        // Jeśli jest już zmiana nocna
        $dateTimeStart = Carbon::parse(
            $this->livewire->state['start_time'] . ' ' . $this->livewire->state['start_time_clock']
        );
        $userId = $this->livewire->state['user_id'];
        $user = User::where('id', $userId)->first();
        $dayStart = $dateTimeStart->copy()->startOfDay();
        $dayEnd   = $dateTimeStart->copy()->endOfDay();

        //A dodajesz nocna to blokuj tylko start
        $exists = WorkBlock::where('user_id', $userId)
            ->where('type', 'night')
            ->whereBetween('starts_at', [$dayStart, $dayEnd])
            ->exists();

        //A dodajesz dzienna to blokuj oba
        if (!$isNight) {
            $exists = WorkBlock::where('user_id', $userId)
                ->where('type', 'night')
                ->where(function ($query) use ($dayStart, $dayEnd) {
                    $query->whereBetween('starts_at', [$dayStart, $dayEnd])
                        ->orWhereBetween('ends_at', [$dayStart, $dayEnd]);
                })
                ->exists();
        }

        //blokada
        if ($exists) {
            $rules['state.start_time'][] =
                function ($attribute, $value, $fail) {
                    // tu wkładasz swoją logikę:
                    $fail('Użytkownik ma już planing pracy w tym dniu.');
                };
        }

        //jeśli jest już coś nastepnego dnia
        $dateTimeEnd = Carbon::parse(
            $this->livewire->state['start_time'] . ' ' . $this->livewire->state['end_time_clock']
        )->addDay();

        $dayStartNext = $dateTimeEnd->copy()->startOfDay();
        $dayEndNext   = $dateTimeEnd->copy()->endOfDay();

        //A dodajesz nocna to blokuj tylko start
        if ($isNight) {
            $exists = WorkBlock::where('user_id', $userId)
                ->where('type', 'work')
                ->whereBetween('starts_at', [$dayStartNext, $dayEndNext])
                ->exists();

            //blokada
            if ($exists) {
                $rules['state.start_time'][] =
                    function ($attribute, $value, $fail) {
                        // tu wkładasz swoją logikę:
                        $fail('Użytkownik ma już planing pracy w następnym dniu.');
                    };
            }

            $exists = WorkBlock::where('user_id', $userId)
                ->where('type', 'night')
                ->whereBetween('starts_at', [$dayStartNext, $dateTimeEnd])
                ->exists();

            //blokada
            if ($exists) {
                $rules['state.end_time_clock'][] =
                    function ($attribute, $value, $fail) {
                        // tu wkładasz swoją logikę:
                        $fail('Użytkownik ma już planing pracy w następnym dniu. Godzina zakończenia pracy nie może się powielać z godziną rozpoczęcia następnego dnia.');
                    };
            }

            //A dodajesz nocna to blokuj tylko start
            $exists = Leave::where('user_id', $userId)
                ->whereBetween('start_date', [$dayStartNext, $dayEndNext])
                ->exists();

            //blokada
            if ($exists) {
                $rules['state.start_time'][] =
                    function ($attribute, $value, $fail) {
                        // tu wkładasz swoją logikę:
                        $fail('Użytkownik ma już wniosek w następnym dniu.');
                    };
            }
            $calendar = new CalendarView();
            //A dodajesz nocna to blokuj tylko start
            if ($user->public_holidays == true) {
                $holidays = $calendar->getPublicHolidays($dayStartNext->year);
                $dateStr = $dayStartNext->format('Y-m-d');

                // Sprawdzenie czy to Nowy Rok lub Trzech Króli
                if ($dayStartNext->month == 1 && $dayStartNext->day == 1) {
                    $isHoliday = true; // Nowy Rok
                } elseif ($dayStartNext->month == 1 && $dayStartNext->day == 6) {
                    $isHoliday = true; // Trzech Króli
                } else {
                    $isHoliday = $holidays->contains($dateStr);
                }
            } else {
                $isHoliday = false;
            }

            //blokada
            if ($isHoliday) {
                $rules['state.start_time'][] =
                    function ($attribute, $value, $fail) {
                        // tu wkładasz swoją logikę:
                        $fail('Użytkownik ma już ustawowo wolne w następnym dniu.');
                    };
            }
            // Przykład użycia - zakładamy, że te zmienne są już zdefiniowane
            // $dateTimeStart = new DateTime('2025-11-14 10:00:00');
            // $dateTimeEnd   = new DateTime('2025-11-15 11:00:00'); // 25 godzin

            $interval = $dateTimeStart->diff($dateTimeEnd);

            // Prawdopodobnie najbezpieczniejszy sposób: sprawdzenie całkowitej liczby dni.
            // Metoda format('%a') zwraca całkowitą liczbę dni (całe i niepełne)
            // lub format('%h') który zwraca godziny
            $totalHours = $interval->days * 24 + $interval->h;

            if ($totalHours > 24) {
                $rules['state.end_time_clock'][] =
                    function ($attribute, $value, $fail) {
                        // tu wkładasz swoją logikę:
                        $fail('Zaplanowany czas pracy nie może być większy niż 24 godziny.');
                    };
            }
        }

        return [
            $rules,
            [],
            [
                'state.start_time' => __('start_time'),
                'state.start_time_clock' => __('start_time_clock'),
                'state.end_time_clock'   => __('end_time_clock'),
            ],
        ];
    }
    public function title(): string
    {
        return __('🕓 Wybierz czas i typ');
    }
}
