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
        'adress', // Adres klienta
        'notes', // Dodatkowe uwagi dotyczące klienta
        'user_id', // Id użytkownika powiązanego z klientem
        'company_id', // Id firmy powiązanej z klientem
    ];

    /**
     * Definiuje relację jeden-do-wielu (klient -> faktury).
     * Klient może mieć wiele faktur wystawionych.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class); // Klient może mieć wiele faktur
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
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
