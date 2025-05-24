<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'location_id',
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
    public function isSameDay($event)
    {
        $thisTime = \Carbon\Carbon::parse($this->time);
        $eventTime = \Carbon\Carbon::parse($event);
        return $thisTime->isSameDay($eventTime);
    }
    public function format()
    {
        \Carbon\Carbon::setLocale('pl');
        return \Carbon\Carbon::parse($this->time)->translatedFormat('d.m, l');
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
