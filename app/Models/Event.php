<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'location',
        'device',
        'event_type',
        'user_id',
        'company_id',
        'created_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function work_sessions()
    {
        return $this->hasOne(WorkSession::class, 'event_start_id');
    }
    public function work_sessions2()
    {
        return $this->hasOne(WorkSession::class, 'event_stop_id');
    }
}
