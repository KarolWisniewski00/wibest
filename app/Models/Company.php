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
}
