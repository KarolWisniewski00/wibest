<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'manager_id',
        'company_id',
        'created_user_id',
        'type',
        'status',
        'start_date',
        'end_date',
        'note',
    ];

    /**
     * Relacja do użytkownika, który składa wniosek.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacja do menadżera zatwierdzającego wniosek.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Relacja do firmy.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relacja do użytkownika, który stworzył wniosek (może być inny niż user_id).
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }
}
