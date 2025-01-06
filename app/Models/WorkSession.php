<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'status',
        'start_time',
        'end_time',
        'time_in_work',
        'start_day_of_week',
        'end_day_of_week',
        'created_user_id'
    ];

    // Definicja relacji z użytkownikiem
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Definicja relacji z użytkownikiem
    public function created_user()
    {
        return $this->belongsTo(User::class);
    }
    // Definicja relacji z firmą
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
