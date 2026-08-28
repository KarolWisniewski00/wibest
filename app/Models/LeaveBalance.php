<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveBalance extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'year',
        'base_days',
        'carried_over',
        'used_days',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'date',
    ];

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

    // dostępne dni
    public function getAvailableAttribute()
    {
        return $this->base_days + $this->carried_over;
    }

    // wykorzystane + w trakcie
    public function getUsedTotalAttribute()
    {
        return $this->used_days + $this->pending_days;
    }

    // pozostało
    public function getRemainingAttribute()
    {
        return $this->available - $this->used_total;
    }
}
