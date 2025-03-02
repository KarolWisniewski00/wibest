<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'name',
        'sandbox_domain',
        'production_domain',
        'shortcut',
        'technology',
        'company_id',
        'user_id',
        'status',
        'git_link',
        'domain_date',
        'domain_service',
        'domain_service_login',
        'domain_service_password',
        'server_date',
        'server_service',
        'server_service_login',
        'server_service_password',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Definiuje relację odwrotną jeden-do-wielu (użytkownik -> klient).
     * Każdy klient należy do jednego użytkownika.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Klient należy do jednego użytkownika
    }
    /**
     * Definiuje relację odwrotną jeden-do-wielu (firma -> klient).
     * Każdy klient należy do jednego firmy.
     */
    public function company()
    {
        return $this->belongsTo(Company::class); // Klient należy do jednego firmy
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
