<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Określenie pól, które mogą być masowo wypełniane
    protected $fillable = [
        'name', // Nazwa klienta (firma lub osoba prywatna)
        'email', // Główny adres email klienta
        'email2', // Dodatkowy adres email klienta
        'phone', // Główny numer telefonu klienta
        'phone2', // Dodatkowy numer telefonu klienta
        'vat_number', // Numer VAT klienta (unikalny)
        'adress',
        'notes', // Dodatkowe uwagi dotyczące klienta
    ];

    /**
     * Definiuje relację jeden-do-wielu (klient -> faktury).
     * Klient może mieć wiele faktur wystawionych.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class); // Klient może mieć wiele faktur
    }
}
