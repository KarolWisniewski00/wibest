<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'setting_format',
        'setting_client',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> klienci).
     * Użytkownik może mieć wielu klientów.
     */
    public function clients()
    {
        return $this->hasMany(Client::class); // Użytkownik może mieć wielu klientów
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> faktury).
     * Użytkownik może mieć wielu faktur.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class); // Użytkownik może mieć wielu faktur
    }
    public function costs()
    {
        return $this->hasMany(Cost::class);
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> usługa).
     * Użytkownik może mieć wielu usług.
     */
    public function services()
    {
        return $this->hasMany(Service::class); // Użytkownik może mieć wielu usług
    }
    /**
     * Definiuje relację jeden-do-wielu (użytkownik -> produkt).
     * Użytkownik może mieć wielu produktów.
     */
    public function products()
    {
        return $this->hasMany(Product::class); // Użytkownik może mieć wielu produktów
    }
    public function work_sessions()
    {
        return $this->hasMany(WorkSession::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
