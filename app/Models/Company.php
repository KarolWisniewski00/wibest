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
        return $this->hasMany(User::class); // Firma ma wielu użytkowników
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
}
