<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Użytkownicy przypisani do permission
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'permission_user')->withTimestamps();
    }
}
