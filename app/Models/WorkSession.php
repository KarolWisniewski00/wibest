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
        'event_start_id',
        'event_stop_id',
        'time_in_work',
        'created_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function eventStart()
    {
        return $this->belongsTo(Event::class, 'event_start_id');
    }

    public function eventStop()
    {
        return $this->belongsTo(Event::class, 'event_stop_id');
    }
}
