<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectStatusPeriod extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'starts_at' => 'datetime', 'ends_at' => 'datetime', 'initial_snapshot' => 'boolean',
    ];
}
