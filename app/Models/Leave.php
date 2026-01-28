<?php

namespace App\Models;

use App\Repositories\WorkSessionRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'manager_id',
        'company_id',
        'created_user_id',
        'type',
        'status',
        'start_date',
        'end_date',
        'note',
        'is_used',
        'days',
        'working_days',
        'non_working_days'
    ];

    /**
     * Relacja do użytkownika, który składa wniosek.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }

    /**
     * Relacja do menadżera zatwierdzającego wniosek.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }

    /**
     * Relacja do firmy.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relacja do użytkownika, który stworzył wniosek (może być inny niż user_id).
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_user_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }
    public function isBlocked()
    {
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        $isBlocked = false;
        $workSessionRepository = new WorkSessionRepository();

        // 2. KLONOWANIE daty początkowej
        // Jest to kluczowy krok, aby nie modyfikować oryginalnej daty
        $currentDate = $startDate->copy();


        // 3. Pętla while
        // Pętla wykonuje się dopóki bieżąca data jest mniejsza lub równa dacie końcowej
        while ($currentDate->lte($endDate)) {
            $hasEvent = $workSessionRepository->hasEventForUserOnDate($this->user->id, $currentDate->format('d.m.y'));
            $hasStartEvent = $workSessionRepository->hasStartEventForUserOnDate($this->user->id, $currentDate->format('d.m.y'));
            $hasStopEvent = $workSessionRepository->hasStopEventForUserOnDate($this->user->id, $currentDate->format('d.m.y'));
            $hasStartEvent2 = $workSessionRepository->hasStartEventForUserOnDate($this->user->id, $currentDate->format('d.m.y'));
            $hasStopEvent2 = $workSessionRepository->hasStopEventForUserOnDate($this->user->id, $currentDate->format('d.m.y'));
            $status = $workSessionRepository->hasInProgressEventForUserOnDate($this->user->id, $currentDate->format('d.m.y'));
            $leave = $workSessionRepository->hasLeave($this->user->id, $currentDate->format('d.m.y'));

            if ($status) {
                $isBlocked = true;
            } else if ($leave) {
                $isBlocked = true;
            } else if ($hasEvent) {
                $isBlocked = true;
            } else if ($hasStartEvent && $hasStopEvent) {
                $isBlocked = true;
            } else if ($hasStartEvent2 && $hasStopEvent2) {
                $isBlocked = true;
            }
            // 5. Przejście do następnego dnia
            $currentDate->addDay(); // Modyfikuje $currentDate o 1 dzień
        }
        return $isBlocked;
    }
    protected static function boot()
    {
        parent::boot();

        // 🚨 Uruchamia logikę ZARAZ PO POBRANIU modelu z bazy
        static::retrieved(function ($leave) {
            $isBlocked = $leave->isBlocked();
            if ($isBlocked) {
                if ($leave->status == 'odblokowane' || $leave->status == 'oczekujące' || $leave->status == 'anulowane' || $leave->status == 'odrzucone') {
                $leave->status = 'zablokowane';
                $leave->save();
                }
            } else {
                if ($leave->status == 'zablokowane') {
                    $leave->status = 'odblokowane';
                    $leave->save();
                }
            }
        });
    }
}
