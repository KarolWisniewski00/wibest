<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Określenie pól, które mogą być masowo wypełniane
    protected $fillable = [
        'name', // Nazwa firmy
        'adress',
        'bank',
        'vat_number', // Numer VAT firmy
    ];

    /**
     * Definiuje relację jeden-do-wielu (firma -> użytkownicy).
     * Firma może mieć wielu użytkowników.
     */
    public function users()
    {
        return $this->hasMany(User::class)->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]); // Firma ma wielu użytkowników
    }
    public function getUsersCount()
    {
        // Jeśli firma nie istnieje (np. $this->id == null), zwróć 0
        if (!$this->id) {
            return 0;
        }

        // Policz użytkowników powiązanych z firmą
        return User::where('company_id', $this->id)->count() ?? 0;
    }
    /**
     * Definiuje relację jeden-do-wielu (firma -> faktury).
     * Firma może wystawiać wiele faktur.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class); // Firma może mieć wiele faktur
    }
    public function costs()
    {
        return $this->hasMany(Cost::class);
    }
    /**
     * Definiuje relację jeden-do-wielu (firma -> klienci).
     * Firma może mieć wielu klientów.
     */
    public function clients()
    {
        return $this->hasMany(Client::class); // Firma może mieć wielu klientów
    }
    /**
     * Definiuje relację jeden-do-wielu (firma -> klienci).
     * Firma może mieć wielu klientów.
     */
    public function companies()
    {
        return $this->hasMany(Company::class); // Firma może mieć wielu klientów
    }
    /**
     * Definiuje relację jeden-do-wielu (firma -> produkty).
     * Firma może mieć wiele produktów.
     */
    public function products()
    {
        return $this->hasMany(Client::class); // Firma może mieć wiele produktów
    }
    /**
     * Definiuje relację jeden-do-wielu (firma -> usługa).
     * Firma może mieć wiele usług.
     */
    public function servises()
    {
        return $this->hasMany(Client::class); // Firma może mieć wiele usług
    }
    public function work_sessions()
    {
        return $this->hasMany(WorkSession::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id')->withDefault([
            'name' => 'Usunięto',
            'profile_photo_url' => null,
        ]);
    }
    public function workBlocks()
    {
        return $this->hasMany(WorkBlock::class);
    }
}
