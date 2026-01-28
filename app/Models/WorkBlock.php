<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class WorkBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'starts_at',
        'ends_at',
        'type',
        'duration_seconds',
        'work_session_id',
        'created_user_id',
        'company_id',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | 🔗 RELACJE
    |--------------------------------------------------------------------------
    */

    /** Pracownik przypisany do tego bloku */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** Firma, w której odbywa się blok */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /** Sesja pracy (jeśli istnieje) */
    public function workSession(): BelongsTo
    {
        return $this->belongsTo(WorkSession::class);
    }

    /** Użytkownik, który utworzył wpis */
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 🧮 ACCESSORY I POMOCNICZE METODY
    |--------------------------------------------------------------------------
    */

    /** Czas trwania w godzinach (z dokładnością do 2 miejsc po przecinku) */
    public function getDurationHoursAttribute(): ?float
    {
        if (! $this->starts_at || ! $this->ends_at) return null;
        return round($this->ends_at->diffInSeconds($this->starts_at) / 3600, 2);
    }

    /** Czy blok jest nocny */
    public function getIsNightShiftAttribute(): bool
    {
        $startHour = $this->starts_at->hour;
        $endHour = $this->ends_at->hour;

        return $startHour >= 22 || $endHour <= 6;
    }

    /** Automatycznie oblicz czas trwania przy zapisie */
    protected static function booted()
    {
        static::saving(function ($block) {
            if ($block->starts_at && $block->ends_at) {
                $block->duration_seconds = $block->ends_at->diffInSeconds($block->starts_at);
            }
        });
    }
}
