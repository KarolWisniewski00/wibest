<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    protected $table = 'crm';

    protected $casts = [
        'ai_signals' => 'array',
        'ai_missing_information' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'company_id',
        'created_user_id',
        'type',
        'datetime_complete',
        'important',

        'plan',
        'result',

        'ai_analysis',
        'ai_next_step',
        'ai_next_step_at',
        'ai_next_step_type',
        'ai_signals',
        'ai_problem',
        'ai_value',
        'ai_missing_information',
        'ai_reason',
        'ai_should_create_next_step',
        'ai_sales_stage',
        'datetime_start',
        'datetime_end',
    ];
    /*
    |--------------------------------------------------------------------------
    | RELACJE
    |--------------------------------------------------------------------------
    */

    // 🔹 Pracownik, którego dotyczy wpis
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔹 Firma
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // 🔹 Kto utworzył wpis
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPY (przydatne w CRM)
    |--------------------------------------------------------------------------
    */

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeActivityOrder($query)
    {
        // Termin w UI jest określany przez datetime_start.
        return $query->withoutGlobalScope('order')->reorder()
            ->orderByRaw('CASE
                WHEN datetime_complete IS NOT NULL THEN 2
                WHEN datetime_start < ? THEN 0
                ELSE 1 END', [now()])
            ->orderByRaw('CASE WHEN datetime_complete IS NULL AND datetime_start IS NULL THEN 1 ELSE 0 END')
            ->orderByRaw('CASE WHEN datetime_complete IS NULL THEN datetime_start END ASC')
            ->orderByRaw('CASE WHEN datetime_complete IS NOT NULL THEN datetime_complete END DESC')
            ->orderByDesc('updated_at')
            ->orderByDesc('id');
    }

    /*
    |--------------------------------------------------------------------------
    | DOMYŚLNE SORTOWANIE (opcjonalne)
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('created_at', 'desc');
        });
    }
}
