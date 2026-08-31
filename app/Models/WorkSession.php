<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class WorkSession extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAll = true;
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    protected $fillable = [
        'user_id',
        'company_id',
        'status',
        'event_start_id',
        'event_stop_id',
        'time_in_work',
        'created_user_id',
        'notes',
        'task_id',
        'info',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll() // albo konkretne pola
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }

    public function eventStart()
    {
        return $this->belongsTo(Event::class, 'event_start_id');
    }

    public function eventStop()
    {
        return $this->belongsTo(Event::class, 'event_stop_id');
    }
    public function workBlocks()
    {
        return $this->hasMany(WorkBlock::class);
    }
    public function task()
    {
        return $this->belongsTo(Event::class, 'task_id');
    }
    public function getAlertTask()
    {
        $task = null;
        $user = User::where('id', $this->user->id)->first();
        $status = $user->getToday(Carbon::parse($this->eventStart->time));
        $seconds_in_work = $status['worked_time_seconds'];

        if ($this->status == 'W trakcie pracy') {
            $seconds_calc = $status['start']->diffInSeconds(Carbon::now());
        } else {
            if ($this->eventStop) {
                $seconds_calc = Carbon::parse($this->eventStart->time)->diffInSeconds($this->eventStop->time);
            } else {
                $seconds_calc = 0;
            }
        }
        //STAŁY PLANING
        if ($this->user->working_hours_regular == 'stały planing') {
            $daysOfWeek = [
                'monday' => 'poniedziałek',
                'tuesday' => 'wtorek',
                'wednesday' => 'środa',
                'thursday' => 'czwartek',
                'friday' => 'piątek',
                'saturday' => 'sobota',
                'sunday' => 'niedziela',
            ];

            // Pobranie dnia tygodnia po angielsku
            $dayEnglish = strtolower(Carbon::parse($this->eventStart->time)->format('l')); // np. 'monday'

            // Zamiana na polski
            $dayPolish = $daysOfWeek[$dayEnglish];
            $startDay = $this->user->working_hours_start_day; // np. "poniedziałek"
            $stopDay  = $this->user->working_hours_stop_day;  // np. "piątek"

            // Mapowanie dni tygodnia na liczby (poniedziałek = 0)
            $daysMap = [
                'poniedziałek' => 0,
                'wtorek'      => 1,
                'środa'       => 2,
                'czwartek'    => 3,
                'piątek'      => 4,
                'sobota'      => 5,
                'niedziela'   => 6,
            ];

            // Zamiana na liczby
            $dayNum   = $daysMap[$dayPolish];
            $startNum = $daysMap[$startDay];
            $stopNum  = $daysMap[$stopDay];

            // Sprawdzenie, czy dzień jest w przedziale
            $inRange = false;

            if ($startNum <= $stopNum) {
                // np. poniedziałek - piątek
                $inRange = ($dayNum >= $startNum && $dayNum <= $stopNum);
            } else {
                // np. piątek - wtorek (cykliczne)
                $inRange = ($dayNum >= $startNum || $dayNum <= $stopNum);
            }

            if (!$inRange) {
                $task = true;
                return $task;
            }
            $seconds_planned = ($this->user->working_hours_custom * 3600) + ($this->user->overtime_threshold * 60);
            $seconds_planned += $this->user->overtime_threshold * 60;
            $seconds_planned_calc = $seconds_calc - $seconds_planned;
            $seconds_worked_calc = $seconds_calc - $seconds_in_work;
            if ($seconds_planned_calc >= 0 && $seconds_worked_calc >= 0) {
                if ($seconds_in_work > $seconds_planned) {
                    if ($this->user->overtime_task) {
                        $task = true;
                    }
                }
            }
        }
        //ZMIENNY PLANING
        if ($this->user->working_hours_regular == 'zmienny planing') {
            $workBlock = WorkBlock::where('user_id', $this->user->id)
                ->whereDate('starts_at', Carbon::parse($this->eventStart->time))
                ->first();
            if (!$workBlock) {
                $task = true;
                return $task;
            }
            $seconds_planned = $workBlock->duration_seconds
                + ($this->user->overtime_threshold * 60);

            $seconds_in_work_before = max(0, $seconds_in_work - $seconds_calc);

            // CASE 1 — cała sesja przed limitem
            if ($seconds_in_work_before + $seconds_calc <= $seconds_planned) {
                $task = false;
            }

            // CASE 2 — cała sesja po limicie
            elseif ($seconds_in_work_before >= $seconds_planned) {
                $task = true;
            }

            // CASE 3 - ta sesja dłuższa niż plan
            elseif ($seconds_calc >= $seconds_planned) {
                $task = true;
            }
        }

        return $task;
    }
    public function isBlocked(): bool
    {
        if ($this->eventStart == null) {
            $this->status = 'Zablokowane';
            $this->time_in_work = '00:00:00';
            $this->notes = '[SYSTEM] Sesja zablokowana z powodu braku zdarzenia rozpoczęcia pracy.';
            $this->save();
            return true;
        }

        $startDate = Carbon::parse($this->eventStart->time);
        $endDate = Carbon::parse(
            $this->eventStop ? $this->eventStop->time : Carbon::now()
        );

        return WorkSession::query()
            ->where('id', '!=', $this->id) // pomijamy aktualną sesję
            ->where('user_id', $this->user_id)
            ->whereNotNull('event_start_id')
            ->where(function ($query) use ($startDate, $endDate) {

                $query->whereHas('eventStart', function ($q) use ($endDate) {
                    $q->where('time', '<', $endDate);
                })->whereHas('eventStop', function ($q) use ($startDate) {
                    $q->where('time', '>', $startDate);
                });
            })
            ->exists();
    }
    protected static function boot()
    {
        parent::boot();

        // 🚨 Uruchamia logikę ZARAZ PO POBRANIU modelu z bazy
        static::retrieved(function ($workSession) {
            if (!$workSession->user_id) {
                return;
            }

            $isBlocked = $workSession->isBlocked();
            if ($isBlocked) {
                if ($workSession->status == 'Praca zakończona' || $workSession->status == 'W trakcie pracy') {
                    $startTime = $workSession->eventStart->time;

                    if (!$workSession->eventStop) {
                        $eventStop = Event::create([
                            'time' => $startTime,
                            'location' => '',
                            'device' => '',
                            'event_type' => 'stop',
                            'user_id' => $workSession->user_id,
                            'company_id' => $workSession->company_id,
                            'created_user_id' => $workSession->created_user_id,
                        ]);

                        $workSession->event_stop_id = $eventStop->id;
                    } else {
                        $workSession->eventStop->time = $startTime;
                        $workSession->eventStop->save();
                    }

                    $workSession->status = 'Zablokowane';
                    $workSession->time_in_work = '00:00:00';
                    $workSession->notes = '[SYSTEM] Sesja zablokowana z powodu konfliktu z inną sesją.';
                    $workSession->save();

                    Activity::where('subject_id', $workSession->id)
                        ->where('subject_type', WorkSession::class)
                        ->latest()
                        ->first()
                        ->update([
                            'causer_id' => null,
                            'causer_type' => null,
                        ]);
                    Activity::where('subject_id', $workSession->event_stop_id)
                        ->where('subject_type', Event::class)
                        ->latest()
                        ->first()
                        ->update([
                            'causer_id' => null,
                            'causer_type' => null,
                        ]);
                }
            }
        });
    }
}
