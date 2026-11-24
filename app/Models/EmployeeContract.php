<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeContract extends Model
{
    protected $guarded = ['id'];
    protected $casts = ['details' => 'array', 'effective_from' => 'date', 'starts_on' => 'date', 'ends_on' => 'date',
        'fte' => 'decimal:4', 'monthly_gross' => 'decimal:2', 'hourly_rate' => 'decimal:2'];

    public const TYPES = ['employment' => 'Umowa o pracę', 'mandate' => 'Umowa zlecenie', 'work' => 'Umowa o dzieło'];
}
