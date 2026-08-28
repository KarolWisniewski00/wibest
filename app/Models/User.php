<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Livewire\CalendarView;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',

        'company_id',
        'role',
        'position',

        'supervisor_id',

        'working_hours_regular',
        'working_hours_custom',
        'working_hours_from',
        'working_hours_to',
        'working_hours_start_day',
        'working_hours_stop_day',

        'gender',

        'overtime',
        'overtime_threshold',
        'overtime_task',
        'overtime_accept',
        'public_holidays',

        'working_mon',
        'working_tue',
        'working_wed',
        'working_thu',
        'working_fri',
        'working_sat',
        'working_sun',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'paid_until' => 'date',
        'assigned_at' => 'date',
        'working_hours_regular' => 'string',
        'working_hours_from' => 'datetime:H:i',
        'working_hours_to' => 'datetime:H:i',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> klienci).
     * Użytkownik może mieć wielu klientów.
     */
    public function clients()
    {
        return $this->hasMany(Client::class); // Użytkownik może mieć wielu klientów
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> faktury).
     * Użytkownik może mieć wielu faktur.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class); // Użytkownik może mieć wielu faktur
    }
    public function costs()
    {
        return $this->hasMany(Cost::class);
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> usługa).
     * Użytkownik może mieć wielu usług.
     */
    public function services()
    {
        return $this->hasMany(Service::class); // Użytkownik może mieć wielu usług
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> produkt).
     * Użytkownik może mieć wielu produktów.
     */
    public function products()
    {
        return $this->hasMany(Product::class); // Użytkownik może mieć wielu produktów
    }
    public function work_sessions()
    {
        return $this->hasMany(WorkSession::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function blogs()
    {
        return $this->hasMany(Post::class);
    }
    /**
     * Hierarchia użytkowników
     */
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }

    public function subordinates()
    {
        return $this->hasMany(User::class, 'supervisor_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }

    /**
     * Permissions przypisane bezpośrednio do użytkownika
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_user')->withTimestamps();
    }

    public function workBlocks()
    {
        return $this->hasMany(WorkBlock::class);
    }


    /**
     * Sprawdzenie czy użytkownik ma konkretną permission
     */
    public function hasPermission(string $permissionName): bool
    {
        return $this->permissions()->where('name', $permissionName)->exists();
    }
    public function getToday(?Carbon $day = null)
    {
        $today = $day ?? Carbon::today();
        $yesterday = $today->copy()->subDay();
        $dayOfWeek = $today->dayOfWeekIso; // 1 = poniedziałek, 7 = niedziela
        $daysMap = [
            'poniedziałek' => 1,
            'wtorek'       => 2,
            'środa'        => 3,
            'czwartek'     => 4,
            'piątek'       => 5,
            'sobota'       => 6,
            'niedziela'    => 7,
            ''    => null,
        ];

        // 🕓 Pobierz dzisiejsze eventy użytkownika
        $logs = DB::table('events')
            ->where('user_id', $this->id)
            ->where('event_type', '!=', 'task')
            ->whereDate('time', $today)
            ->orderBy('time')
            ->get();

        $starts = $logs->where('event_type', 'start')->count();
        $stops = $logs->where('event_type', 'stop')->count();
        $lastEvent = $logs->last();
        $lastStart = $logs->where('event_type', 'start')->last();

        $logs_yesterday = DB::table('events')
            ->where('user_id', $this->id)
            ->whereDate('time', $yesterday)
            ->orderBy('time')
            ->get();

        $starts_yesterday = $logs_yesterday->where('event_type', 'start')->count();
        $stops_yesterday = $logs_yesterday->where('event_type', 'stop')->count();
        $lastEvent_yesterday = $logs_yesterday->last();
        $lastStart_yesterday = $logs_yesterday->where('event_type', 'start')->last();

        // ✳️ Domyślny status
        $status = [
            'type' => null,
            'status' => 'danger',
            'start' => null,
            'stop' => null,
            'worked_time' => null,
            'worked_time_seconds' => null,
            'timing' => '(wartość domyślna)',
            'work' => true,
            'message' => "Nieznany błąd.",
        ];

        $yesterday_info = '';
        $yesterday_added = false;

        if ($starts_yesterday > $stops_yesterday && $starts == 0 && $stops == 0) {
            return [
                'type' => 'rcp',
                'status' => 'warning',
                'start' => null,
                'stop' => null,
                'worked_time' => null,
                'worked_time_seconds' => null,
                'timing' => '(Start wczoraj)',
                'work' => true,
                'message' => "W trakcie pracy.",
            ];
        } elseif ($starts_yesterday > $stops_yesterday && $starts < $stops) {
            $starts += 1;
            $yesterday_info = ' (Start wczoraj)';
            $yesterday_added = true;
            $lastStart = $lastStart_yesterday;
        } elseif ($starts_yesterday > $stops_yesterday && $starts == $stops) {
            $starts += 1;
            $yesterday_info = ' (Start wczoraj)';
            $yesterday_added = true;
            $lastStart = $lastStart_yesterday;
        }

        // ROZPOCZĘCIE
        if ($starts > $stops) {
            if ($starts == 1) {
                // === JEDEN ODCZYT (JEST W PRACY) ===
                $workStartTime = $this->working_hours_from ? Carbon::parse($this->working_hours_from) : null;
                $actualStartTime = $lastStart ? Carbon::parse($lastStart->time) : null;
                $now = Carbon::now();

                $statusType = 'success';
                $timingText = '';

                // Sprawdzenie startu względem godzin pracy
                if ($workStartTime && $actualStartTime) {
                    if ($actualStartTime->gt($workStartTime)) {
                        $statusType = 'warning';
                        $timingText = ' (Start spóźniony)';
                    } elseif ($actualStartTime->lt($workStartTime)) {
                        $timingText = ' (Start wcześniej)';
                    }
                }

                // Obliczanie czasu pracy do teraz
                $workedTime = null;
                $diffInSeconds = null;
                if ($actualStartTime) {
                    $diffInSeconds = $now->diffInSeconds($actualStartTime);
                    $workedTime = gmdate('H:i:s', $diffInSeconds);
                }

                // Jeśli czas krótszy niż wymagane godziny — tylko informacyjnie (bo nadal w pracy)
                $requiredSeconds = $this->working_hours_custom * 3600;
                if ($diffInSeconds !== null && $diffInSeconds < $requiredSeconds) {
                    $timingText .= ' (Jeszcze niepełny dzień)';
                }

                $status = [
                    'type' => 'rcp',
                    'status' => $statusType,
                    'start' => $actualStartTime,
                    'stop' => null,
                    'worked_time' => $workedTime,
                    'worked_time_seconds' => $diffInSeconds,
                    'timing' => $timingText . $yesterday_info,
                    'work' => true,
                    'message' => 'W trakcie pracy.',
                ];
            } else {
                $actualStartTime = $lastStart ? Carbon::parse($lastStart->time) : null;
                // === WIELE ODCZYTÓW (np. START–STOP, START–STOP, START) ===
                $now = Carbon::now();
                $totalSeconds = 0;
                $events = $logs->sortBy('time')->values();
                if ($yesterday_added) {
                    $events->prepend($lastStart_yesterday);
                }

                // sumowanie wszystkich zakończonych par
                for ($i = 0; $i < $events->count(); $i += 2) {
                    if (isset($events[$i + 1])) {
                        $start = Carbon::parse($events[$i]->time);
                        $stop = Carbon::parse($events[$i + 1]->time);
                        $totalSeconds += $stop->diffInSeconds($start);
                    } else {
                        // ostatni START bez STOP — aktualnie w pracy
                        $start = Carbon::parse($events[$i]->time);
                        $totalSeconds += $now->diffInSeconds($start);
                    }
                }

                $workedTime = gmdate('H:i:s', $totalSeconds);

                // Sprawdzenie względem wymaganych godzin
                $requiredSeconds = $this->working_hours_custom * 3600;
                $statusType = $totalSeconds < $requiredSeconds ? 'warning' : 'success';
                $timingText = $totalSeconds < $requiredSeconds ? ' (Jeszcze niepełny dzień)' : '';

                $status = [
                    'type' => 'rcp',
                    'status' => $statusType,
                    'start' => $actualStartTime,
                    'stop' => null,
                    'worked_time' => $workedTime,
                    'worked_time_seconds' => $totalSeconds,
                    'timing' => $timingText . $yesterday_info,
                    'work' => true,
                    'message' => 'W trakcie pracy. Wielokrotny odczyt x' . $starts,
                ];
            }
        } elseif ($starts === $stops && $lastEvent && $lastEvent->event_type === 'stop') {
            if ($stops == 1) {
                //JEŚLI JEDNO
                $workStartTime = $this->working_hours_from ? Carbon::parse($this->working_hours_from) : null;
                $actualStartTime = $lastStart ? Carbon::parse($lastStart->time) : null;
                $workEndTime = $this->working_hours_to ? Carbon::parse($this->working_hours_to) : null;
                $actualEndTime = Carbon::parse($lastEvent->time);

                $statusType = 'success';
                $timingText = '';

                // Sprawdzenie startu
                if ($workStartTime && $actualStartTime) {
                    if ($actualStartTime->gt($workStartTime)) {
                        $timingText .= ' (Start po)';
                    } elseif ($actualStartTime->lt($workStartTime)) {
                        $timingText .= ' (Start przed)';
                    }
                }

                // Sprawdzenie końca
                if ($workEndTime) {
                    if ($actualEndTime->lt($workEndTime)) {
                        $timingText .= ' (Stop przed)';
                    } elseif ($actualEndTime->gt($workEndTime)) {
                        $timingText .= ' (Stop po)';
                    }
                }

                // Obliczanie przepracowanego czasu
                $workedTime = null;
                $diffInSeconds = null;
                if ($actualStartTime && $actualEndTime) {
                    $diffInSeconds = $actualEndTime->diffInSeconds($actualStartTime);
                    $workedTime = gmdate('H:i:s', $diffInSeconds);
                }

                // Sprawdzenie czy użytkownik był krócej niż wymagane godziny
                if ($diffInSeconds !== null) {
                    $requiredSeconds = $this->working_hours_custom * 3600; // np. 8h = 28800 sekund
                    if ($diffInSeconds < $requiredSeconds) {
                        $statusType = 'warning';
                        $timingText .= ' (Za krótko w pracy)';
                    }
                }

                $status = [
                    'type' => 'rcp',
                    'status' => $statusType,
                    'start' => $actualStartTime,
                    'stop' => $actualEndTime,
                    'worked_time' => $workedTime,
                    'worked_time_seconds' => $diffInSeconds,
                    'timing' => $timingText . $yesterday_info,
                    'work' => false,
                    'message' => 'Praca zakończona.'
                ];
            } else {
                //JEŚLI WIĘCEJ NIŻ JEDNO
                $totalSeconds = 0;
                $pairs = []; // opcjonalnie — do debugowania

                // sortuj odczyty po czasie
                $events = $logs->sortBy('time')->values();
                if ($yesterday_added) {
                    $events->prepend($lastStart_yesterday);
                }
                for ($i = 0; $i < $events->count(); $i += 2) {
                    if (isset($events[$i + 1])) {
                        $start = Carbon::parse($events[$i]->time);
                        $stop = Carbon::parse($events[$i + 1]->time);
                        $seconds = $stop->diffInSeconds($start);
                        $totalSeconds += $seconds;
                        $pairs[] = [$start->format('H:i:s'), $stop->format('H:i:s'), gmdate('H:i:s', $seconds)];
                    }
                }

                $workedTime = gmdate('H:i:s', $totalSeconds);

                // Porównanie z wymaganym czasem pracy
                $requiredSeconds = $this->working_hours_custom * 3600;
                $statusType = $totalSeconds < $requiredSeconds ? 'warning' : 'success';
                $timingText = $totalSeconds < $requiredSeconds ? ' (Za krótko w pracy)' : '';

                $status = [
                    'type' => 'rcp',
                    'status' => $statusType,
                    'start' => Carbon::parse($events->first()->time),
                    'stop' => Carbon::parse($events->last()->time),
                    'worked_time' => $workedTime,
                    'worked_time_seconds' => $totalSeconds,
                    'timing' => $timingText . $yesterday_info,
                    'work' => false,
                    'message' => 'Praca zakończona. Wielokrotny odczyt x' . $stops,
                ];
            }
        } elseif ($starts === $stops && $lastEvent && $lastEvent->event_type === 'start') {
            // === WIELE ODCZYTÓW (np. START–STOP, START–STOP, START) ===
            $now = Carbon::now();
            $totalSeconds = 0;
            $events = $logs->sortBy('time')->values();
            if ($yesterday_added) {
                $events->prepend($lastStart_yesterday);
            }

            // sumowanie wszystkich zakończonych par
            for ($i = 0; $i < $events->count(); $i += 2) {
                if (isset($events[$i + 1])) {
                    $start = Carbon::parse($events[$i]->time);
                    $stop = Carbon::parse($events[$i + 1]->time);
                    $totalSeconds += $stop->diffInSeconds($start);
                } else {
                    // ostatni START bez STOP — aktualnie w pracy
                    $start = Carbon::parse($events[$i]->time);
                    $totalSeconds += $now->diffInSeconds($start);
                }
            }

            $workedTime = gmdate('H:i:s', $totalSeconds);

            // Sprawdzenie względem wymaganych godzin
            $requiredSeconds = $this->working_hours_custom * 3600;
            $statusType = $totalSeconds < $requiredSeconds ? 'warning' : 'success';
            $timingText = $totalSeconds < $requiredSeconds ? ' (Jeszcze niepełny dzień)' : '';

            $status = [
                'type' => 'rcp',
                'status' => $statusType,
                'start' => null,
                'stop' => null,
                'worked_time' => $workedTime,
                'worked_time_seconds' => $totalSeconds,
                'timing' => $timingText . $yesterday_info,
                'work' => true,
                'message' => 'W trakcie pracy. Wielokrotny odczyt x' . $starts + 1,
            ];
        } elseif ($logs->isEmpty()) {
            if ($this->working_hours_regular == "zmienny planing") {
                $wb = WorkBlock::where('user_id', $this->id)
                    ->whereDate('starts_at', $today)
                    ->first();
                $workStart = $wb ? Carbon::parse($wb->starts_at) : null;
            } else {
                $workStart = $this->working_hours_from
                    ? Carbon::parse($this->working_hours_from)
                    : null;
            }

            $now = Carbon::now();
            $timingText = "";
            if ($workStart) {
                $workStartText = $workStart->format('H:i');

                if ($now->lt($workStart)) {
                    // Przed rozpoczęciem
                    $statusType = 'success';
                    $message = "Zaczyna o godzinie {$workStartText}.";
                } else {
                    // Po planowanym rozpoczęciu — spóźnienie
                    $diffInMinutes = $now->diffInMinutes($workStart);
                    if ($diffInMinutes <= 15) {
                        // lekkie spóźnienie
                        $statusType = 'warning';
                        $timingText = "(Start po)";
                    } else {
                        // poważniejsze spóźnienie
                        $statusType = 'danger';
                        $timingText = "(Start po)";
                    }
                    $message = "Zaczyna o godzinie {$workStartText}.";
                }
            } else {
                // brak ustawionych godzin pracy
                $statusType = 'warning';
                $message = 'Zaczyna o godzinie nieznanej.';
            }

            $status = [
                'type' => 'rcp',
                'status' => $statusType,
                'start' => null,
                'stop' => null,
                'worked_time' => null,
                'worked_time_seconds' => null,
                'timing' => $timingText . $yesterday_info,
                'work' => false,
                'message' => $message,
            ];
        }

        // 📅 Sprawdź, czy dziś jest dzień roboczy (dopiero na końcu)
        if ($this->working_hours_regular == "zmienny planing") {
            $isWorkingDay = WorkBlock::where('user_id', $this->id)
                ->whereDate('starts_at', $today)
                ->exists();
        } else {
            $isWorkingDay = (
                $daysMap[$this->working_hours_start_day] <= $dayOfWeek &&
                $daysMap[$this->working_hours_stop_day] >= $dayOfWeek
            );
        }

        // 🕒 Obsługa pracy w dzień wolny
        if (!$isWorkingDay) {
            $statusType = 'success';
            $work = false;
            $workedTime = null;
            $timing = '';
            $start = null;
            $stop = null;
            $message = '';
            $type = null;

            // Upewniamy się, że odczyty są posortowane po czasie
            $events = $logs->sortBy('time')->values();
            if ($yesterday_added) {
                $events->prepend($lastStart_yesterday);
            }
            if ($starts > 0) {
                $type = 'rcp';

                if ($starts > $stops) {
                    // 🟢 Aktualnie w pracy (dzień wolny)
                    $work = true;
                    //$start = $lastStart ? Carbon::parse($lastStart->time) : null;
                    $start = Carbon::parse($events->first()->time);
                    $now = Carbon::now();
                    $totalSeconds = 0;

                    // Zsumuj zakończone pary (start–stop)
                    for ($i = 0; $i < $events->count(); $i += 2) {
                        if (isset($events[$i + 1])) {
                            $startEv = Carbon::parse($events[$i]->time);
                            $stopEv = Carbon::parse($events[$i + 1]->time);
                            $totalSeconds += $stopEv->diffInSeconds($startEv);
                        } else {
                            // Ostatni start bez stop — pracuje do teraz
                            $startEv = Carbon::parse($events[$i]->time);
                            $totalSeconds += $now->diffInSeconds($startEv);
                        }
                    }

                    //$workedTime = gmdate('H:i:s', $totalSeconds);
                    $workedTime = null;
                    $message = 'Dzień wolny, ale w trakcie pracy.';

                    if ($starts >= 2) {
                        $message = $message . ' Wielokrotny odczyt x' . $starts;
                    }
                } elseif ($starts === $stops && $lastEvent && $lastEvent->event_type === 'stop') {
                    // 🟠 Zakończył pracę w dzień wolny
                    $stop = Carbon::parse($lastEvent->time);
                    $message = 'Dzień wolny, ale praca zakończona.';

                    // Zsumuj wszystkie pary start–stop
                    $totalSeconds = 0;
                    for ($i = 0; $i < $events->count(); $i += 2) {
                        if (isset($events[$i + 1])) {
                            $startEv = Carbon::parse($events[$i]->time);
                            $stopEv = Carbon::parse($events[$i + 1]->time);
                            $totalSeconds += $stopEv->diffInSeconds($startEv);
                        }
                    }

                    if ($events->isNotEmpty()) {
                        $start = Carbon::parse($events->first()->time);
                    }

                    $workedTime = gmdate('H:i:s', $totalSeconds);
                    if ($starts >= 2) {
                        $message = $message . ' Wielokrotny odczyt x' . $starts;
                    }
                } elseif ($starts === $stops && $lastEvent && $lastEvent->event_type === 'start') {
                    // 🟢 Aktualnie w pracy (dzień wolny)
                    $work = true;
                    //$start = $lastStart ? Carbon::parse($lastStart->time) : null;
                    $start = null;
                    $now = Carbon::now();
                    $totalSeconds = 0;

                    // Zsumuj zakończone pary (start–stop)
                    for ($i = 0; $i < $events->count(); $i += 2) {
                        if (isset($events[$i + 1])) {
                            $startEv = Carbon::parse($events[$i]->time);
                            $stopEv = Carbon::parse($events[$i + 1]->time);
                            $totalSeconds += $stopEv->diffInSeconds($startEv);
                        } else {
                            // Ostatni start bez stop — pracuje do teraz
                            $startEv = Carbon::parse($events[$i]->time);
                            $totalSeconds += $now->diffInSeconds($startEv);
                        }
                    }

                    //$workedTime = gmdate('H:i:s', $totalSeconds);
                    $workedTime = null;
                    $message = 'Dzień wolny, ale w trakcie pracy. Wielokrotny odczyt x' . $starts + 1;
                } else {
                    // 🔹 Brak aktywnej pracy, ale był start (dziwne przypadki)
                    $message = 'Dzień wolny.';
                }
            } else {
                // 🔹 Całkowicie wolny dzień, bez żadnych odczytów
                $message = 'Dzień wolny.';
            }

            // 🧾 Finalny, spójny status
            $status = [
                'type' => $type,
                'status' => $statusType,
                'start' => $start,
                'stop' => $stop,
                'worked_time' => $workedTime,
                'worked_time_seconds' => $totalSeconds ?? null,
                'timing' => $timing . $yesterday_info,
                'work' => $work,
                'message' => $message,
                'working_day' => false,
            ];
        } else {
            $status['working_day'] = true;
        }

        $calendar = new CalendarView();
        $holidays = $calendar->getPublicHolidays($today->year);
        $dateStr = $today->format('Y-m-d');

        // Sprawdzenie czy to Nowy Rok lub Trzech Króli
        if ($today->month == 1 && $today->day == 1) {
            $isHoliday = true; // Nowy Rok
        } elseif ($today->month == 1 && $today->day == 6) {
            $isHoliday = true; // Trzech Króli
        } else {
            $isHoliday = $holidays->contains($dateStr);
        }
        if ($isHoliday) {
            $statusType = 'success';
            $work = false;
            $workedTime = null;
            $timing = '';
            $start = null;
            $stop = null;
            $message = '';
            $type = null;

            // Upewniamy się, że odczyty są posortowane po czasie
            $events = $logs->sortBy('time')->values();
            if ($yesterday_added) {
                $events->prepend($lastStart_yesterday);
            }
            if ($starts > 0) {
                $type = 'rcp';

                if ($starts > $stops) {
                    // 🟢 Aktualnie w pracy (dzień wolny)
                    $work = true;
                    //$start = $lastStart ? Carbon::parse($lastStart->time) : null;
                    $start = null;
                    $now = Carbon::now();
                    $totalSeconds = 0;

                    // Zsumuj zakończone pary (start–stop)
                    for ($i = 0; $i < $events->count(); $i += 2) {
                        if (isset($events[$i + 1])) {
                            $startEv = Carbon::parse($events[$i]->time);
                            $stopEv = Carbon::parse($events[$i + 1]->time);
                            $totalSeconds += $stopEv->diffInSeconds($startEv);
                        } else {
                            // Ostatni start bez stop — pracuje do teraz
                            $startEv = Carbon::parse($events[$i]->time);
                            $totalSeconds += $now->diffInSeconds($startEv);
                        }
                    }

                    //$workedTime = gmdate('H:i:s', $totalSeconds);
                    $workedTime = null;
                    $message = 'Dzień wolny, ale w trakcie pracy.';

                    if ($starts >= 2) {
                        $message = $message . ' Wielokrotny odczyt x' . $starts;
                    }
                    if ($events->isNotEmpty()) {
                        $start = Carbon::parse($events->first()->time);
                    }
                } elseif ($starts === $stops && $lastEvent && $lastEvent->event_type === 'stop') {
                    // 🟠 Zakończył pracę w dzień wolny
                    $stop = Carbon::parse($lastEvent->time);
                    $message = 'Dzień wolny, ale praca zakończona.';

                    // Zsumuj wszystkie pary start–stop
                    $totalSeconds = 0;
                    for ($i = 0; $i < $events->count(); $i += 2) {
                        if (isset($events[$i + 1])) {
                            $startEv = Carbon::parse($events[$i]->time);
                            $stopEv = Carbon::parse($events[$i + 1]->time);
                            $totalSeconds += $stopEv->diffInSeconds($startEv);
                        }
                    }

                    if ($events->isNotEmpty()) {
                        $start = Carbon::parse($events->first()->time);
                    }

                    $workedTime = gmdate('H:i:s', $totalSeconds);
                    if ($starts >= 2) {
                        $message = $message . ' Wielokrotny odczyt x' . $starts;
                    }
                } elseif ($starts === $stops && $lastEvent && $lastEvent->event_type === 'start') {
                    // 🟢 Aktualnie w pracy (dzień wolny)
                    $work = true;
                    //$start = $lastStart ? Carbon::parse($lastStart->time) : null;
                    $start = null;
                    $now = Carbon::now();
                    $totalSeconds = 0;

                    // Zsumuj zakończone pary (start–stop)
                    for ($i = 0; $i < $events->count(); $i += 2) {
                        if (isset($events[$i + 1])) {
                            $startEv = Carbon::parse($events[$i]->time);
                            $stopEv = Carbon::parse($events[$i + 1]->time);
                            $totalSeconds += $stopEv->diffInSeconds($startEv);
                        } else {
                            // Ostatni start bez stop — pracuje do teraz
                            $startEv = Carbon::parse($events[$i]->time);
                            $totalSeconds += $now->diffInSeconds($startEv);
                        }
                    }

                    //$workedTime = gmdate('H:i:s', $totalSeconds);
                    $workedTime = null;
                    if ($events->isNotEmpty()) {
                        $start = Carbon::parse($events->first()->time);
                    }

                    $message = 'Dzień wolny, ale w trakcie pracy. Wielokrotny odczyt x' . $starts + 1;
                } else {
                    // 🔹 Brak aktywnej pracy, ale był start (dziwne przypadki)
                    $message = 'Dzień wolny.';
                }
            } else {
                // 🔹 Całkowicie wolny dzień, bez żadnych odczytów
                $message = 'Dzień wolny.';
            }

            // 🧾 Finalny, spójny status
            $status = [
                'type' => $type,
                'status' => $statusType,
                'start' => $start,
                'stop' => $stop,
                'worked_time' => $workedTime,
                'worked_time_seconds' => $totalSeconds ?? null,
                'timing' => '(Święto ustawowo wolne)',
                'work' => $work,
                'message' => $message,
                'working_day' => false,
            ];
        } else {
            $status['working_day'] = true;
        }
        //if ($isHoliday) {
        //    return [
        //        'type' => 'holiday',
        //        'status' => 'success',
        //        'start' => null,
        //        'stop' => null,
        //        'worked_time' => null,
        //        'worked_time_seconds' => null,
        //        'timing' => '(Święto ustawowo wolne)',
        //        'work' => false,
        //        'message' => 'Dzień wolny.',
        //    ];
        //}

        // 🔍 Sprawdź, czy użytkownik ma dziś wniosek urlopowy / nieobecność
        $leave = DB::table('leaves')
            ->where('user_id', $this->id)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->where('status', 'zaakceptowane')
            ->first();


        if ($leave) {
            return [
                'type' => 'leave',
                'status' => 'success',
                'start' => Carbon::parse($leave->start_date),
                'stop' => Carbon::parse($leave->end_date),
                'worked_time' => null,
                'worked_time_seconds' => null,
                'timing' => $leave->type,
                'work' => false,
                'message' => 'Wniosek.',
            ];
        }

        return $status;
    }
    public function companyHistory()
    {
        return $this->hasMany(UserCompanyHistory::class);
    }
    protected static function booted()
    {
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('name');
        });
        static::addGlobalScope('no_crm', function (Builder $builder) {
            $builder->where('role', '!=', 'CRM');
        });
    }
    public function crmEntries()
    {
        return $this->hasMany(Crm::class);
    }
    public function leaveBalances()
    {
        return $this->hasMany(LeaveBalance::class);
    }
}
