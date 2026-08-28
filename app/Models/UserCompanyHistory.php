<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanyHistory extends Model
{
    protected $table = 'user_company_history';

    protected $fillable = [
        'user_id',
        'company_id',
        'assigned_at',
        'unassigned_at',
        'employment_start',
        'employment_end',
        'paid_from',
        'paid_to',
        'user_price'
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
        'unassigned_at' => 'datetime',
        'employment_start' => 'date',
        'employment_end' => 'date',
        'paid_from' => 'date',
        'paid_to' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACJE
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | SCOPES (mega przydatne 🔥)
    |--------------------------------------------------------------------------
    */

    // aktywni w danym dniu
    public function scopeActiveAt($query, $date)
    {
        return $query->where('assigned_at', '<=', $date)
            ->where(function ($q) use ($date) {
                $q->whereNull('unassigned_at')
                    ->orWhere('unassigned_at', '>=', $date);
            });
    }

    // aktywni teraz
    public function scopeCurrentlyActive($query)
    {
        return $query->whereNull('unassigned_at');
    }

    // tylko dla firmy
    public function scopeForCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId);
    }
}
