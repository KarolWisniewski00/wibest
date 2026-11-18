<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class WorkObject extends Model
{
    protected $table = 'objects';

    protected $fillable = [
        'company_id',
        'name',
        'object_type',
        'location_id',
        'allowed_distance',
        'status',
        'description',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'allowed_distance' => 'integer',
    ];

    public function statusPeriods(): HasMany
    {
        return $this->hasMany(ObjectStatusPeriod::class, 'object_id');
    }

    public function firstStatusPeriod(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ObjectStatusPeriod::class, 'object_id')->oldestOfMany();
    }

    /** Keep every model save (including the edit form) atomic with its status history. */
    public function save(array $options = [])
    {
        return DB::transaction(function () use ($options) {
            $creating = !$this->exists;
            if ($this->exists) {
                static::whereKey($this->getKey())->lockForUpdate()->firstOrFail();
            }
            $saved = parent::save($options);
            if ($saved && ($creating || $this->wasChanged('status'))) {
                $period = $this->statusPeriods()->whereNull('ends_at')->lockForUpdate()->first();
                if (!$period || $period->status !== $this->status) {
                    $since = now()->startOfSecond();
                    if ($period) {
                        $period->update(['ends_at' => $since]);
                    }
                    $this->statusPeriods()->create(['status' => $this->status, 'starts_at' => $since]);
                }
            }

            return $saved;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Statusy
    |--------------------------------------------------------------------------
    */

    public const TYPES = [
        'magazyn' => 'Magazyn',
        'biuro' => 'Biuro',
        'zaklad_produkcyjny' => 'Zakład produkcyjny',
        'sklep_punkt_uslugowy' => 'Sklep / punkt usługowy',
        'baza_transportowa' => 'Baza transportowa',
        'inny' => 'Inny',
        'budowa' => 'Budowa',
        'budowa_domu' => 'Budowa domu',
        'budowa_budynku_mieszkalnego' => 'Budowa budynku mieszkalnego',
        'budowa_hali' => 'Budowa hali',
        'budowa_centrum_handlowego' => 'Budowa centrum handlowego',
        'remont' => 'Remont',
        'modernizacja' => 'Modernizacja',
        'prace_ziemne' => 'Prace ziemne',
        'droga' => 'Droga',
        'most_wiadukt' => 'Most / wiadukt',
        'instalacje' => 'Instalacje',
        'rozbiorka' => 'Rozbiórka',
    ];

    public const STATUSES = [
        'planned' => 'Planowany', 'active' => 'Aktywny', 'paused' => 'Wstrzymany',
        'cancelled' => 'Odwołany', 'completed' => 'Zakończony',
    ];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_PAUSED = 'paused';
    public const STATUS_COMPLETED = 'completed';

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'object_user', 'object_id', 'user_id')
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isPaused(): bool
    {
        return $this->status === self::STATUS_PAUSED;
    }

    public function isCompleted(): bool
    {
        return $this->status === self::STATUS_COMPLETED;
    }
}
