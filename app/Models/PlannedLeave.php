<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlannedLeave extends Model
{
    use HasFactory;

    protected $table = 'planned_leaves';

    protected $fillable = [
        'user_id',
        'company_id',
        'created_user_id',
        'start_date',
        'end_date',
        'note',
    ];

    // 📌 Relacja do użytkownika, który bierze urlop
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 📌 Relacja do firmy (jeśli wielofirmowe)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // 📌 Relacja do użytkownika, który stworzył wpis (np. HR)
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }
}
